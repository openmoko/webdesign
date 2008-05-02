import os
from trac.core import *
from trac.web.api import IRequestFilter

class UserPrefsHookModule(Component):

    implements(IRequestFilter)

    def pre_process_request(self, req, handler):
        if req.path_info == '/prefs' and req.method == 'POST':
#            self.log.info('invoking PRE /bin/touch req.path_info = %s req.method = %s req.args = %s' % (req.path_info, req.method, req.args))
            self.log.info('saving user prefs -> calling hook /var/www/bin/mail_fullname_sync/run.sh');
            os.system("/var/www/bin/mail_fullname_sync/run.sh ")
        return handler

    def post_process_request(self, req, template, data, content_type):
        return (template, data, content_type)
