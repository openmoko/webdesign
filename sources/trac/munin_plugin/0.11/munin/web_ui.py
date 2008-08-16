# Original Created by Noah Kantrowitz on 2007-06-05.
# Original Copyright (c) 2007 Noah Kantrowitz. All rights reserved.

# Modified 2008 by Joachim Steiger <roh@openmoko.org> under BSD

import os.path
import re
import urllib
import urllib2

from trac.core import *
from trac.web.api import IRequestHandler
from trac.web.chrome import INavigationContributor, ITemplateProvider, add_stylesheet
from trac.perm import IPermissionRequestor
from trac.mimeview.api import MIME_MAP as BASE_MIME_MAP
from trac.config import Option, BoolOption
from trac.util.text import to_unicode
from trac.util.translation import _

from genshi.builder import tag
from genshi.core import Markup

# Make a copy to start us off
MIME_MAP = dict(BASE_MIME_MAP.iteritems())
MIME_MAP.update({
    'png': 'image/png',
})

class MuninModule(Component):
    """A plugin to embed Munin into Trac."""
    
    implements(IRequestHandler, INavigationContributor, IPermissionRequestor, ITemplateProvider)
    
    munin_url = Option('munin', 'url', doc='URL to munin')
    send_mime = BoolOption('munin', 'send_mime', default=False,
                           doc='Try to send back the correct MIME type for blob_plain pages.')
    
    patterns = [
        # (regex, replacement)
	(r'^.*?<div class', '<div class'),
	(r'<\/body.*', ''),
	(r'<a href="',lambda req: '<a href="%s' % req.href.munin()),
#	(r'<img src="/git-logo.png" width="72" height="27" alt="git" class="logo"/>',
#         lambda req: '<img src="%s" width="72" height="27" alt="git" class="git-logo"/>' % \
#		req.href.chrome('munin', 'git-logo.png')),
#	(r'<link rel="stylesheet" type="text/css" href="/gitweb.css"/>',
#         lambda req: '<link rel="stylesheet" type="text/css" href="%s"/>\n<link rel="stylesheet" type="text/css" href="%s"/>' % \
#                (req.href.chrome('munin', 'gitweb-full.css'), req.href.chrome('munin', 'gitweb-trac.css'))),
    ]
    patterns = [(re.compile(pat, re.S|re.I|re.U), rep) for pat, rep in patterns]
    
    # IRequestHandler methods
    def match_request(self, req):
        return req.path_info.startswith('/munin')
        
    def process_request(self, req):
        req.perm.assert_permission('MUNIN_VIEW')
        
        # Check for no URL being configured
        if not self.munin_url:
            raise TracError('You must configure a URL in trac.ini')
        
        # Grab the page
        urlf = urllib2.urlopen(self.munin_url+'?'+req.environ['QUERY_STRING'])
        page = urlf.read()
        
        # Check if this is a raw format send
        args = dict([(args or '=').split('=',1) for args in req.environ['QUERY_STRING'].split(';')])
        if args.get('a') == 'blob_plain':
            if self.send_mime:
                _, ext = os.path.splitext(args.get('f', ''))
                mime_type = MIME_MAP.get(ext[1:], 'text/plain')
            else:
                mime_type = 'text/plain'
            req.send(page, mime_type)
            
        # Check for RSS
        if args.get('a') in ('rss', 'opml', 'project_index', 'atom'):
            req.send(page, urlf.info().type)
        
        # Proceed with normal page serving
        page = to_unicode(page)
        for pat, rep in self.patterns:
            if callable(rep):
                rep = rep(req)
            page = pat.sub(rep, page)
            
        data = {
            'munin_page': Markup(page),
        }
        #add_link(req, 'stylesheet', 'http://dev.laptop.org/www/styles/gitbrowse.css', 'text/css')
#        add_stylesheet(req, 'gitweb/gitweb.css')
#        add_stylesheet(req, 'gitweb/gitweb-trac.css')
        return 'munin.html', data, urlf.info().type

    # INavigationContributor methods
    def get_navigation_items(self, req):
        if 'MUNIN_VIEW' in req.perm:
            yield 'mainnav', 'munin', tag.a(_('Munin'),
                                             href=req.href.munin())
                                             
    def get_active_navigation_item(self, req):
        return 'munin'
        
    # IPermissionRequestor methods
    def get_permission_actions(self):
        yield 'MUNIN_VIEW'
        
    # ITemplateProvider methods
    def get_htdocs_dirs(self):
        from pkg_resources import resource_filename
        return [('munin', resource_filename(__name__, 'htdocs'))]
            
    def get_templates_dirs(self):
        from pkg_resources import resource_filename
        return [resource_filename(__name__, 'templates')]
