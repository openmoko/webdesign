<?php
/*
  $Id: header_tags_controller.php,v 1.6 2005/04/10 14:07:36 hpdl Exp $
  Created by Jack York from http://www.oscommerce-solution.com
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
define('HEADING_TITLE_CONTROLLER', 'Header Tags Verwaltung');
define('HEADING_TITLE_ENGLISH', 'Header Tags - Deutsch');
define('HEADING_TITLE_FILL_TAGS', 'Header Tags - Tags f&uuml;llen');
define('TEXT_INFORMATION_ADD_PAGE', '<b>Eine neue Seite einf&uuml;gen</b> - Diese Wahl f&uuml;gt den Code für eine Seite in die erwähnten Dateien hinzu. Beachten Sie, dass sie nicht eine tats&auml;chliche Seite hinzuf&uuml;gt. Um eine Seite hinzuzuf&uuml;gen, tragen Sie den Namen der Datei mit oder ohne die .php Endung ein.');
define('TEXT_INFORMATION_DELETE_PAGE', '<b>Eine neue Seite l&ouml;schen</b> - Diese funktion l&ouml;scht die angegebene Datei.'); 
define('TEXT_INFORMATION_CHECK_PAGES', '<b>Fehlende Seiten &uuml;berpr&uuml;fen</b> - Diese Wahl erlaubt Ihnen, zu &uuml;berpr&uuml;fen, welche Dateien in Ihrem Shop keinen Eintrag besitzen. Beachten Sie, dass nicht alle Seiten Eintragungen haben d&uuml;rfen. Z.B.,
Seiten die SSL verwenden wie z.B. Login. Um die Seiten anzusehen, klicken Sie unten auf das Drop Down Fenster.'); 

define('TEXT_PAGE_TAGS', 'Damit Header Tags in einer Seite angezeigt werden k&ouml;nnen, m&uuml;ssen Sie die jeweilige Seite ausw&auml;hlen. Die Eintr&auml;ge m&uuml;ssen in includes/header_tags.php gebildet werden und liegen im Pfad includes/Languages/German/header_tags.php (wo Deutsch die Sprache ist, wird diese verwendet). Hier haben Sie die M&ouml;glichkeit die Daten anzusehen zu &auml;ndern und zu aktuallisieren.');
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
