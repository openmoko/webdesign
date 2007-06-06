<?php
/*
  $Id: currencies.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'W&auml;hrungen');

define('TABLE_HEADING_CURRENCY_NAME', 'W&auml;hrung');
define('TABLE_HEADING_CURRENCY_CODES', 'K&uuml;rzel');
define('TABLE_HEADING_CURRENCY_VALUE', 'Wert');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_INFO_EDIT_INTRO', 'Bitte f&uuml;hren Sie alle notwendigen &Auml;nderungen durch');
define('TEXT_INFO_CURRENCY_TITLE', 'Name:');
define('TEXT_INFO_CURRENCY_CODE', 'K&uuml;rzel:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'W&auml;hrungssymbol Links:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'W&auml;hrungssymbol Rechts:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'Dezimalstellen Trennzeichen:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', '1000er Trennzeichen:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Dezimalstellen:');
define('TEXT_INFO_CURRENCY_LAST_UPDATED', 'Letzte Aktualisierung:');
define('TEXT_INFO_CURRENCY_VALUE', 'Wert:');
define('TEXT_INFO_CURRENCY_EXAMPLE', 'Beispiel:');
define('TEXT_INFO_INSERT_INTRO', 'Bitte tragen Sie die neue W&auml;hrung mit allen relevanten Daten ein');
define('TEXT_INFO_DELETE_INTRO', 'Wollen Sie diese W&auml;hrung wirklich l&ouml;schen?');
define('TEXT_INFO_HEADING_NEW_CURRENCY', 'neue W&auml;hrung');
define('TEXT_INFO_HEADING_EDIT_CURRENCY', 'W&auml;hrung bearbeiten');
define('TEXT_INFO_HEADING_DELETE_CURRENCY', 'W&auml;hrung l&ouml;schen');
define('TEXT_INFO_SET_AS_DEFAULT', TEXT_SET_DEFAULT . ' (Ein manuelles Update der W&auml;hrungskurse ist notwendig)');
define('TEXT_INFO_CURRENCY_UPDATED', 'Der Umrechnungskurs f&uuml;r %s (%s) wurde mit %s aktualisiert.');

define('ERROR_REMOVE_DEFAULT_CURRENCY','Fehler: Die Standardw&auml;hrung kann nicht gel&ouml;scht werden. Legen Sie eine andere W&auml;hrung als Standard fest und versuchen Sie es noch einmal.');
define('ERROR_CURRENCY_INVALID','Fehler: Der Umrechnungskurss f&uuml;r %s (%s) konnte mit %s nicht aktualisiert werden. Haben Sie den richtigen W&auml;hrungs-Code eingeben?');
define('WARNING_PRIMARY_SERVER_FAILED','Warnung: Der prim&auml;re Aktualisierungs-Server (%s) konnte nach %s (%s) Versuchen nicht erreicht werden - Es wird versucht, die Aktualisierung &uuml;ber den sekund&auml;ren Server durchzuf&uuml;hren.');
?>