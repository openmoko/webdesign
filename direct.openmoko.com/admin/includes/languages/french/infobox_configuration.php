<?php
/*
  $Id: infobox_configuration.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Afficher, Mettre à jour et cr&eacute;er des Infobox');
define('TABLE_HEADING_INFOBOX_FILE_NAME', 'Titre');
define('TABLE_HEADING_ACTIVE', 'Activer Box?');
define('TABLE_HEADING_KEY', 'D&eacute;finir Box Heading');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_COLUMN', 'Colonne');
define('TABLE_HEADING_SORT_ORDER', 'Position');
define('TABLE_HEADING_TEMPLATE', 'Box Template');
define('TABLE_HEADING_FONT_COLOR', 'Couleur Police');
define('TABLE_HEADING_BOX_DIRECTORY', 'Location of boxes for this template: ');

define('TEXT_INFO_EDIT_INTRO', 'Faites les changements n&eacute;cessaires');
define('TEXT_INFO_DATE_ADDED', 'Date d\'ajout:');
define('TEXT_INFO_LAST_MODIFIED', 'Derni&egrave;re Modification:');
define('TEXT_INFO_HEADING_NEW_INFOBOX', 'Ajouter une nouvelle Infobox');
define('TEXT_INFO_INSERT_INTRO', 'Un exemple pour la box<b> what\'s_new.php</b> infobox est s&eacute;lect&eacute;e');
define('TEXT_INFO_DELETE_INTRO', '<P STYLE="color: red; font-weight: bold;">Confirmer OK pour d&eacute;truire l\'Infobox');
define('TEXT_INFO_HEADING_DELETE_INFOBOX', 'Supprimer Infobox?');
define('TEXT_INFO_HEADING_UPDATE_INFOBOX', 'Mettre à jour Infobox ');

define('IMAGE_INFOBOX_STATUS_UP', 'UP');
define('IMAGE_ICON_STATUS_UP_LIGHT', 'Move Up');
define('IMAGE_INFOBOX_STATUS_down', 'Down');
define('IMAGE_ICON_STATUS_DOWN_LIGHT', 'Move Down');

define('IMAGE_INFOBOX_STATUS_GREEN', 'Gauche');
define('IMAGE_INFOBOX_STATUS_GREEN_LIGHT', 'Positionner gauche');
define('IMAGE_INFOBOX_STATUS_RED', 'Droite');
define('IMAGE_INFOBOX_STATUS_RED_LIGHT', 'Positionner droite');


define('BOX_HEADING_BOXES', 'Admin Boxes');

define('TEXT_HEADING_SET_ACTIVE', 'Set this box Active? ');
define('TEXT_HEADING_DEFINE_KEY', '  Define key ');
define('TEXT_HEADING_WHAT_POS', 'Column Position? ');
define('TEXT_HEADING_WHICH_TEMPLATE', 'Which box Template? ');
define('TEXT_HEADING_HEADING', 'The infoBox heading ');
define('TEXT_HEADING_WHICH_COL', 'Which column? ');
define('TEXT_HEADING_FILENAME', 'Filename ');
define('TEXT_HEADING_FONT_COLOR', 'Header Font Color ');

define('TEXT_NOTE_REQUIRED', '* Denotes required field');

define('JS_BOX_HEADING', '* La \'Define Key\' doit être saisie.    Exemple BOX_HEADING_WHATS_NEW');
define('JS_INFO_BOX_HEADING', '* Le \'Box heading\' doit être saisie.');
define('JS_BOX_LOCATION', '* Vous devez choisir une colonne pour l\'affichage de l\'infobox');
define('JS_INFO_BOX_FILENAME', '* Vous devez choisir un nom de fichier pour cette infobox');
define('JS_BOX_COLOR', '* Please select a color for the font color.');


define('TEXT_INFO_MESSAGE_COUNT_1', '<br>There are currently <br>');
define('TEXT_INFO_MESSAGE_COUNT_2', ' active boxes in the left column and <br>');
define('TEXT_INFO_MESSAGE_COUNT_3', ' active boxes in the right column');
//error messages
define('infobox_error1', 'This template does not have any infoboxes to install. Please put the infoboxes that you want to install in this template\'s boxes directory');
define('infobox_error2', 'WARNING: No boxes selected in your LEFT column');
define('infobox_error3', 'WARNING: No boxes selected in your RIGHT column');

define('INFOBOX_ACTIVE_BOXES', ' active boxes in the right column');
?>