<?php
/*
  $Id: banner_manager.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Banner Manager');

define('TABLE_HEADING_BANNERS', 'Bannerwerbung');
define('TABLE_HEADING_GROUPS', 'Gruppen');
define('TABLE_HEADING_STATISTICS', 'Anzeigen / Klicks');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_BANNERS_TITLE', 'Titel des Banners:'); 
define('TEXT_BANNERS_URL', 'Banner-URL:'); 
define('TEXT_BANNERS_GROUP', 'Bannergruppe:');
define('TEXT_BANNERS_NEW_GROUP', ', oder tragen Sie unten eine neue Bannergruppe ein');
define('TEXT_BANNERS_IMAGE', 'Bild (Datei):'); 
define('TEXT_BANNERS_IMAGE_LOCAL', ', oder tragen Sie unten die lokale Datei auf Ihrem Server an'); 
define('TEXT_BANNERS_IMAGE_TARGET', 'Ziel der Bilddatei (speichern unter):'); 
define('TEXT_BANNERS_HTML_TEXT', 'HTML Text:');
define('TEXT_BANNERS_EXPIRES_ON', 'G&uuml;ltig bis:');
define('TEXT_BANNERS_OR_AT', ', oder nach');
define('TEXT_BANNERS_IMPRESSIONS', 'Einblendungen');
define('TEXT_BANNERS_SCHEDULED_AT', 'G&uuml;ltig ab:');
define('TEXT_BANNERS_BANNER_NOTE','<b>Banner Hinweis:</b><ul><li>Benutzen Sie entweder ein Bild oder einen HTML Text ,aber nicht beides.</li><li>HTML Text hat eine h&ouml;here Priorit&auml;t als ein Bild</li></ul>');
define('TEXT_BANNERS_INSERT_NOTE','<b>Bemerkung:</b><ul><li>Sie m&uuml;ssen Schreibrechte auf das Uploadverzeichnis haben!</li><li>Wenn Sie kein Bild auf den Server laden wollen, lassen Sie das Eingabefeld "speichern unter" leer (z.B. wenn Sie ein lokales Bild (serverseitig) verwenden.</li><li>Im Eingabefeld "speichern unter" muss ein bereits existierendes Verzeichnis und ein abschlie&szlig;ender "slash" eingetragen werden (z.B.: banners/).</li></ul>');
define('TEXT_BANNERS_EXPIRCY_NOTE','<b>"G&uuml;ltig bis" Hinweis:</b><ul><li>Nur eines der beiden Felder sollten ver&ouml;ffentlicht werden</li><li>Wenn der Banner zeitlich nicht automatisch enden soll, lassen Sie diese Felder leer</li></ul>');
define('TEXT_BANNERS_SCHEDULE_NOTE','<b>Zeitplan Hinweis:</b><ul><li>Wenn ein Zeitplan erstellt wurde, wird der Banner mit diesem Datum aktiviert.</li><li>Alle geplanten Banner sind bis zum erstellten Zeitplan als inaktiv markiert. Danach werden sie automatisch aktiviert</li></ul>');

define('TEXT_BANNERS_DATE_ADDED', 'Hinzugef&uuml;gt am:');
define('TEXT_BANNERS_SCHEDULED_AT_DATE', 'G&uuml;ltig ab: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_DATE', 'G&uuml;ltig bis zum: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', 'G&uuml;ltig bis: <b>%s</b> Impressionen/Anzeigen');
define('TEXT_BANNERS_STATUS_CHANGE', 'Status ge&auml;ndert: %s');

define('TEXT_BANNERS_DATA', 'D<br>A<br>T<br>E<br>N');
define('TEXT_BANNERS_LAST_3_DAYS', 'letzten 3 Tage');
define('TEXT_BANNERS_BANNER_VIEWS', 'Banneranzeigen');
define('TEXT_BANNERS_BANNER_CLICKS', 'Bannerklicks');

define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sicher, dass Sie diesen Banner l&ouml;schen m&ouml;chten?');
define('TEXT_INFO_DELETE_IMAGE', 'Bannerbild l&ouml;schen');

define('SUCCESS_BANNER_INSERTED', 'Erfolg: Der Banner wurde eingef&uuml;gt.');
define('SUCCESS_BANNER_UPDATED', 'Erfolg: Der Banner wurde aktualisiert.');
define('SUCCESS_BANNER_REMOVED', 'Erfolg: Der Banner wurde gel&ouml;scht.');
define('SUCCESS_BANNER_STATUS_UPDATED', 'Erfolgt: Der Bannerstatus wurde aktualisiert.');

define('ERROR_BANNER_TITLE_REQUIRED', 'Fehler: Ein Bannertitel wird ben&ouml;tigt.');
define('ERROR_BANNER_GROUP_REQUIRED', 'Fehler: Eine Bannergruppe wird ben&ouml;tigt.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Fehler: Das Zielverzeichnis %s existiert nicht.');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Fehler: Das Zielverzeichnis %s ist nicht beschreibbar.');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'Fehler: Bild existiert nicht.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Fehler: Bild kann nicht gel&ouml;scht werden.');
define('ERROR_UNKNOWN_STATUS_FLAG', 'Fehler: Unbekanntes Status Flag.');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', 'Fehler: Das Verzeichnis \'graphs\' ist nicht vorhanden! Bitte erstellen Sie ein Verzeichnis \'graphs\' im Verzeichnis \'images\'.');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'Fehler: Das Verzeichnis \'graphs\' ist schreibgesch&uuml;tzt!');

define('DATE_FORMAT', '(dd/mm/yyyy)');

?>