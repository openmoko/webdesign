<?php
/*
  $Id: links.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Acoplamiento');

if ($display_mode == 'links') {
  define('HEADING_TITLE', 'Acoplamiento');
  define('TABLE_HEADING_LINKS_IMAGE', '');
  define('TABLE_HEADING_LINKS_TITLE', 'Titulo');
  define('TABLE_HEADING_LINKS_URL', 'URL');
  define('TABLE_HEADING_LINKS_DESCRIPTION', 'Descripcion');
  define('TABLE_HEADING_LINKS_COUNT', 'Tecleo');
  define('TEXT_NO_LINKS', 'No hay acoplamientos a enumerar e esta categoria.');
} elseif ($display_mode == 'categories') {
  define('HEADING_TITLE', 'Categorias del Acoplamiento');
  define('TEXT_NO_CATEGORIES', 'No hay categorias del acoplamiento a enumerar todavia.');
}

// VJ todo - move to common language file
define('TEXT_DISPLAY_NUMBER_OF_LINKS', 'Exibir <b>%d</b> to <b>%d</b> (of <b>%d</b> acoplamiento)');

define('IMAGE_BUTTON_SUBMIT_LINK', 'Somete el Acoplamiento');
?>
