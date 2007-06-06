<?php
/*
  $Id: gv_redeem.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Envoi des Bons Cadeaux');
define('HEADING_TITLE', 'Envoi des Bons Cadeaux');
define('TEXT_INFORMATION', 'Pour plus d\'information concernant les bons cadeaux, lisez s\'il vous plait la notice (FAQ) <a href="' . tep_href_link(FILENAME_GV_FAQ,'','NONSSL').'">'.GV_FAQ.'.</a>');
define('TEXT_INVALID_GV', 'Le nombre de bons cadeaux peut &ecirc;tre incorrect ou a &eacute;t&eacute; d&eacute;j&agrave; envoy&eacute;. Pour contacter le service client du magasin utilisez notre page de contact.');
define('TEXT_VALID_GV', 'F&eacute;licitations, vous avez envoy&eacute; un bon cadeau d\'une  valeur de %s');
?>