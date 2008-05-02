#!/usr/bin/env python
# -*- coding: iso-8859-1 -*-

from setuptools import setup

setup(
    name = 'TracUserPrefsHook',
    version = '0.1',
    packages = ['userprefshook'],
    #package_data={ 'delegatedwiki' : [ 'templates/*.cs' ] },
    author = "Joachim Steiger",
    author_email = "roh@openmoko.org",
    description = "Make the Trac user preferences call a external script on change.",
    long_description = "",
    license = "BSD",
    keywords = "trac plugin prefs",
    url = "http://",
    classifiers = [
        'Framework :: Trac',
    ],

    entry_points = {
        'trac.plugins': [
            'userprefshook.filter = userprefshook.filter',
        ],
    },
)

