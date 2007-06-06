<?php
/*
  $Id: infobox_configuration.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
define('HEADING_TITLE', 'Infobox Anzeigen, Erstellen und Update');
define('TABLE_HEADING_INFOBOX_FILE_NAME', 'Titel');
define('TABLE_HEADING_ACTIVE', 'Box aktivieren?');
define('TABLE_HEADING_KEY', 'Box &Uuml;berschrift definieren');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_COLUMN', 'Spalte w&auml;hlen');
define('TABLE_HEADING_SORT_ORDER', 'Position');
define('TABLE_HEADING_TEMPLATE', 'Box Template');
define('TABLE_HEADING_FONT_COLOR', 'Farbe der<br>&Uuml;berschrift');
define('TABLE_HEADING_BOX_DIRECTORY', 'Verzeichnis der Infoboxen, f&uuml;r dieses Template: ');

define('TEXT_INFO_EDIT_INTRO', 'Bitte f&uuml;hren Sie notwendige &Auml;nderungen durch');
define('TEXT_INFO_DATE_ADDED', 'Hinzugef&uuml;gt:');
define('TEXT_INFO_LAST_MODIFIED', 'Zuletzt ge&auml;ndert:');
define('TEXT_INFO_HEADING_NEW_INFOBOX', 'Neue Infobox erstellen');
define('TEXT_INFO_INSERT_INTRO', 'Ein Beispiel für die<b> what\'s_new.php</b> Infobox ist ausgew&auml;hlt');
define('TEXT_INFO_DELETE_INTRO', '<P STYLE="color: red; font-weight: bold;">Best&auml;tigen Sie mit OK / entfernen um die Infobox zu l&ouml;schen');
define('TEXT_INFO_HEADING_DELETE_INFOBOX', 'Infobox l&ouml;schen?');
define('TEXT_INFO_HEADING_UPDATE_INFOBOX', 'Infobox aktualisieren');

define('IMAGE_INFOBOX_STATUS_UP', 'Hoch');
define('IMAGE_ICON_STATUS_UP_LIGHT', 'Verschieben hoch');
define('IMAGE_INFOBOX_STATUS_down', 'Runter');
define('IMAGE_ICON_STATUS_DOWN_LIGHT', 'Verschieben runter');

define('IMAGE_INFOBOX_STATUS_GREEN', 'Links');
define('IMAGE_INFOBOX_STATUS_GREEN_LIGHT', 'Links setzen');
define('IMAGE_INFOBOX_STATUS_RED', 'Rechts');
define('IMAGE_INFOBOX_STATUS_RED_LIGHT', 'Rechts setzen');
define('BOX_HEADING_BOXES', 'Boxen Admin');
define('TEXT_HEADING_SET_ACTIVE', 'Set this box Active? ');
define('TEXT_HEADING_DEFINE_KEY', '  Define key ');
define('TEXT_HEADING_WHAT_POS', 'Position? ');
define('TEXT_HEADING_WHICH_TEMPLATE', 'Welches Box Template? ');
define('TEXT_HEADING_HEADING', 'BOX Beschreibung');
define('TEXT_HEADING_WHICH_COL', 'Welche Spalte? ');
define('TEXT_HEADING_FILENAME', 'Dateiname ');
define('TEXT_HEADING_FONT_COLOR', 'Titel Farbe ');

define('TEXT_NOTE_REQUIRED', '* bedeutet ein ben&ouml;tigte Feld');

define('JS_BOX_HEADING', '* Der \'Define Key\' Eintrag muss abgeschlossen werden. Beispiel: BOX_HEADING_WHATS_NEW\n');
define('JS_INFO_BOX_HEADING', '* Der \'Box Titel\' Eintrag muss abgeschlossen werden.\n');
define('JS_BOX_LOCATION', '* Sie m&uuml;ssen eine Spalte ausw&auml;hlen, um Ihre Infobox anzuzeigen\n');
define('JS_INFO_BOX_FILENAME', '* Sie m&uuml;ssen einen Dateinamen f&uuml;r Ihre Infobox festlegen\n');
define('JS_BOX_COLOR', '* Please select a color for the font color.');


define('TEXT_INFO_MESSAGE_COUNT_1', '<br>Derzeit sind <br>');
define('TEXT_INFO_MESSAGE_COUNT_2', ' aktive Boxen in der linken Spalte und <br>');
define('TEXT_INFO_MESSAGE_COUNT_3', ' aktive Boxen in der rechten Spalte');
//error messages
define('infobox_error1', 'Zu diesem Template gibt es keine infoBoxen die installiert werden m&uuml;ssen. Bitte kopieren Sie die infoBoxes die Sie installieren wollen in das Verzeichnis /template boxes');
define('infobox_error2', 'Achtung: keine Boxen f&uuml;r die linke Spalte aktiviert');
define('infobox_error3', 'Achtung: keine Boxen f&uuml;r die rechte Spalte aktiviert');

define('INFOBOX_ACTIVE_BOXES', ' active boxes in the right column');


?>