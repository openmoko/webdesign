<?php
/*
  $Id: header_tags.php,v 1.6 2005/04/10 14:07:36 hpdl Exp $
  Created by Jack York from http://www.oscommerce-solution.com
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
define('HEADING_TITLE_CONTROLLER', 'Header Tags Controller');
define('HEADING_TITLE_ENGLISH', 'Header Tags - English');
define('HEADING_TITLE_FILL_TAGS', 'Header Tags - Fill Tags');
define('TEXT_INFORMATION_ADD_PAGE', '<b>Add a New Page</b> - This option adds the code for a page into the files mentioned 
above. Note that it does not add an actual page. To add a page, enter the name of the file, with or without the .php extension..');
define('TEXT_INFORMATION_DELETE_PAGE', '<b>Delete a New Page</b> - This option will remove the code for a page from the
above files.'); 
define('TEXT_INFORMATION_CHECK_PAGES', '<b>Check Missing Pages</b> - This option allows you to check which files in your
shop do not have entries in the above files. Note that not all pages should have entries. For example,
any page that will use SSL like Login or Create Account. To view the pages, click Update and then select the drop down list.'); 

define('TEXT_PAGE_TAGS', 'In order for Header Tags to display information on a page, an entry for that
page must be made into the includes/header_tags.php and includes/languages/english/header_tags.php files
(where english would be the language you are using). The options on this page will allow you to add, delete
and check the code in those files.');
define('TEXT_ENGLISH_TAGS', 'The main purpose of Header Tags is to give each of the pages in your shop a 
unique title and meta tags for each page. The default settings will not do your shop any good and need to 
be changed on this page. The individual sections are named after the page they belong to. So, to change the 
title of your home page, edit the title in the index section.');
define('TEXT_FILL_TAGS', 'This option allows you to fill in the meta tags added by
Header Tags. Select the appropriate setting for both the categories and products tags
and then click Update. If you select the Fill Only Empty Tags, then tags already
filled in will not be overwritten. ');
define('ERROR_FILE_NOT_WRITEABLE', 'Error: I can not write to this file. Please set the right user permissions on: %s');


define('ERROR_PAGE_NAME_IS_ALREADY_ENTERED', 'Page name is already entered -> ');
define('ERROR_DELETE_FROM_ENGLISH_1', 'delete from English  ');
define('ERROR_DELETE_FROM_ENGLISH_2', ' for  ');
define('PAGE_NAME', 'Page Name');
define('SWITCHES', 'Switches:');
define('HTTA', 'HTTA:');
define('HTDA', 'HTDA:');
define('HTKA', 'HTKA:');
define('HTCA', 'HTCA:');
define('EXPLAIN', '(Explain)');
define('TITLE_TITLE', 'Title');
define('DESCRIPTIONS', 'Descriptions');
define('KEYWORD', 'Keyword(s)');
?>
