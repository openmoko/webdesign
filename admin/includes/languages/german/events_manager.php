<?php
/*
  $Id: events_calendar v2.00 2003/06/16 18:09:20 ip chilipepper.it Exp $
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce
  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Event Verwaltung');
define('DELETE_EVENTS_ERROR', 'Bitte Datum selektieren.');
define('EVENTS_ERROR', 'Fehler.\n\n');

define('TABLE_HEADING_ID', 'Event ID');
define('TABLE_HEADING_SIZE', 'Gr&ouml;&szlig;e');
define('TABLE_HEADING_TITLE', 'Titl');
define('TABLE_HEADING_DATE_ADDED', 'Datum hinzugef&uuml;gt');
define('TABLE_HEADING_DATE_START', 'Start Datum');
define('TABLE_HEADING_DATE_END', 'Ende Datum');
define('TABLE_HEADING_LINKS', 'Link / OSClink');
define('TABLE_HEADING_OSC_LINK', 'OSC Link');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TEXT_NO_EVENTS', 'Keine Events gefunden.');

define('TEXT_EVENT_TITLE', 'Titel:');
define('TEXT_EVENT_DESCRIPTION', 'Event:');

define('TEXT_EVENT_ID', 'Event ID:');
define('TEXT_EVENT_DATE_ADDED', 'Datum hinzugef&uuml;gt:');

define('TEXT_EVENT_START', 'Start Datum:');
define('TEXT_EVENT_END', 'Ende Datum:');
define('TEXT_CHOOSE_MANUFACTURER', 'Hersteller:');
define('TEXT_CHOOSE_CATEGORY', 'Kategorie:');
define('TEXT_CHOOSE_PRODUCT', 'Produkt:');
define('TEXT_NO_PRODUCTS', 'Kein Produkte');
define('TEXT_CHOOSE_UPCOMING', 'Neuerscheinungen:');
define('TEXT_NO_UPCOMING_PRODUCTS', 'Keine Neuerscheinungen:');

define('TEXT_EVENT_OSC_LINK', 'OSC Link:');
define('TEXT_EVENT_OSC_LINK_HELP', '( Link zu einem Hersteller / Kategorie / Produkt oder Neuerscheinung )');
define('TEXT_CURRENT_OSC_LINK', 'Momentaner OSC link: ');
define('TEXT_START_DATE_NOTE', 'Hinweis Neuerscheinungen: <b>Start Datum</b> dieser Wert muss unter "products_date_available" gesetzt werden.');
define('TEXT_EVENT_LINK', 'Link:');
define('TEXT_EVENT_LINK_HELP', 'Zus&auml;tzlicher Link, wie: www.mysite.com/event_page.html (kein http://)');
define('TEXT_EVENT_IMAGE', 'Abbildung:');
define('TEXT_EVENT_NO_IMAGE', 'Keine Abbildung:');

define('TEXT_EVENT_PREVIEW', 'Vorschau:');

define('TEXT_EVENT_DELETE_CONFIRM', 'Sind sie sicher das Sie das Event l&ouml;schen wollen <a href="'. FILENAME_EVENTS_MANAGER .'?eID='. $eID .'&action=edit"><font color="red"><b>'. $eID .'</b></font></a> ?');
define('TEXT_DELETE_EVENTS', 'Alle vorherigen Events l&ouml;schen:');
define('TEXT_EVENTS_DELETE_CONFIRM', 'Sind Sie siche das Sie alle vorherigen Events l&ouml;schen wollen<b>'. $before .'</b> ?');


define('TEXT_INFO_DELETE_EVENT_INTRO', 'Sind Sie sich sicher das Sie l&ouml;schen wollen?');

define('ERROR_EVENT_TITLE', 'Fehler: Event Titel ist notwendig');
define('ERROR_EVENT_START_DATE', 'Fehler: Event Start Datum ist notwendig');


define('ERROR_REQUIRED_FIELDS', ' * required');

?>
