<?php
/*
  $Id: links.php,v 1.1 2004/03/05 01:39:14 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Links');

if ($display_mode == 'links') {
  define('HEADING_TITLE', 'Links');
} elseif ($display_mode == 'categories') {
  define('HEADING_TITLE', 'Link Kategorien');
}

  define('TABLE_HEADING_LINKS_IMAGE', '');
  define('TABLE_HEADING_LINKS_TITLE', 'Titel');
  define('TABLE_HEADING_LINKS_URL', 'URL');
  define('TABLE_HEADING_LINKS_DESCRIPTION', 'Beschreibung');
  define('TABLE_HEADING_LINKS_COUNT', 'Klicks');
  define('TEXT_NO_LINKS', 'Es befinden sich keine Links in dieser Kategorie.');
  define('TEXT_NO_CATEGORIES', 'Es sind keine Link Kategorien vorhanden.');


// VJ todo - move to common language file
define('TEXT_DISPLAY_NUMBER_OF_LINKS', 'Zeige <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Links as)');

define('IMAGE_BUTTON_SUBMIT_LINK', 'Link eintragen');
?>
