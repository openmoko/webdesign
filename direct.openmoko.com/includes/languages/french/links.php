<?php
/*
  $Id: links.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Liens');

if ($display_mode == 'links') {
  define('HEADING_TITLE', 'Liens');
  define('TABLE_HEADING_LINKS_IMAGE', '');
  define('TABLE_HEADING_LINKS_TITLE', 'Titre');
  define('TABLE_HEADING_LINKS_URL', 'URL');
  define('TABLE_HEADING_LINKS_DESCRIPTION', 'Description');
  define('TABLE_HEADING_LINKS_COUNT', 'Clics');
  define('TEXT_NO_LINKS', 'Il n\' y a pas de liens pour cette cat&eacute;gorie.');
} elseif ($display_mode == 'categories') {
  define('HEADING_TITLE', 'Liens Cat&eacute;gories');
  define('TEXT_NO_CATEGORIES', 'Il n\' y a pas de liens pour cette cat&eacute;gorie pour le moment.');
}

// VJ todo - move to common language file
define('TEXT_DISPLAY_NUMBER_OF_LINKS', 'Voir de <b>%d</b> à <b>%d</b> (sur <b>%d</b> liens)');

define('IMAGE_BUTTON_SUBMIT_LINK', 'Soumettre un lien');
?>
