#!/usr/bin/env python
# -*- coding: iso-8859-1 -*-

from setuptools import setup

setup(
    name = 'TracMunin',
    version = '1.0',
    packages = ['munin'],
    package_data = { 'munin': ['templates/*.html', 'htdocs/*.png', 'htdocs/*.css' ] },

    author = 'Joachim Steiger',
    author_email = 'roh@openmoko.org',
    description = 'Embed munin in Trac.',
    license = 'BSD',
    keywords = 'trac plugin',
    url = 'http://',
    classifiers = [
        'Framework :: Trac',
    ],
    
    install_requires = ['Trac'],

    entry_points = {
        'trac.plugins': [
            'munin.web_ui = munin.web_ui',
        ],
    },
)
