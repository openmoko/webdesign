<?php
/*
  $Id: general.php,v 1.160 2003/07/12 08:32:47 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define ('HEADING_TITLE', 'Keydateien verwalten');
define ('HELP_URL', DIR_WS_ADMIN . 'et_help/index.html');

define('BUTTON_TEXT_SAVE_CHANGES', '&Auml;nderungen speichern');
define('BUTTON_TEXT_RESTORE_FILE', 'R&uuml;sichern der Datei');
define('BUTTON_TEXT_RETURN_MAIN_EDIT', 'Zur Konfiguration zur&uuml;ckkehren');
define('TEXT_RETURN_MAIN', 'Zur&uuml;ck zur Dateiliste');

define('ERROR_TEXT_FILE_LOCKED', "Fehler: Datei '%s' ist schreibgesch&uuml;tzt");
define('ERROR_TEXT_FILE_LOCKED1', "ERROR: The Key file: %s is not writable, to Edit the key you must change it's permissions to 777");

define('ERROR_TEXT_FILE_OK', "Ok to edit the key file: %s it is writable");


define('TEXT_HIDE_NAVIGATION', 'Navigation unterdr&uuml;cken');
define('TEXT_SHOW_NAVIGATION', 'Navigation anzeigen');

define('TEXT_HELP_HELP', 'Hilfe');
define('TEXT_HELP_HELP1', '1. Auf den editier Knopf zum editieren dr&uuml;cken .');
define('TEXT_HELP_HELP2', '2. Nach dem Editieren Speichern dr&uuml;cken.');
define('TEXT_HELP_HELP3', '3. Wenn Sie gespeichert haben, aus R&uuml;cksichern klicken, um die Orginaldatei wieder herzustellen.');
define('TEXT_HELP_HELP4', '4. Auf erstellen klicken um eine neue Keydatei zu erstellen.');
define('TEXT_HELP_HELP5', '5. Auf zur&uuml;k klicken um zum Hauptmenu zur&uuml;ckzukehren.');

define('TEXT_CRYPT_MESSAGE_1', 'Prim&auml;re Keydatei');
define('TEXT_CRYPT_MESSAGE_2', 'Neue Keydatei');
define('TEXT_CRYPT_MESSAGE_3', 'Unbekannt');

define('TABLE_HEADING_FILE_TYPE', 'Datei Typ');
define('TABLE_HEADING_FILE_NAME', 'Datei Name');
define('TABLE_HEADING_FILE_ACTION', 'Aktion');

define('EDIT_ACTION', 'Edit :');
define('SAVED_ACTION', 'Saved file :');
?>
