<?php
/*
  $Id: links.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Links');
define('HEADING_TITLE_SEARCH', 'Suche:');

define('TABLE_HEADING_TITLE', 'Titel');
define('TABLE_HEADING_URL', 'URL');
define('TABLE_HEADING_CLICKS', 'Klicks');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_INFO_HEADING_DELETE_LINK', 'Link l&ouml;schen');
define('TEXT_INFO_HEADING_CHECK_LINK', 'Link pr&uuml;fen');

define('TEXT_DELETE_INTRO', 'Sind Sie sicher, dass Sie diesen Link l&ouml;schen wollen?');

define('TEXT_INFO_LINK_CHECK_RESULT', 'Link pr&uuml;fen Ergebnis:');
define('TEXT_INFO_LINK_CHECK_FOUND', 'Gefunden');
define('TEXT_INFO_LINK_CHECK_NOT_FOUND', 'Nicht Gefunden');
define('TEXT_INFO_LINK_CHECK_ERROR', 'Fehlerhafte URL');


define('TEXT_INFO_LINK_STATUS', 'Status:');
define('TEXT_INFO_LINK_CATEGORY', 'Kategorie:');
define('TEXT_INFO_LINK_CONTACT_NAME', 'Kontakt Name:');
define('TEXT_INFO_LINK_CONTACT_EMAIL', 'Kontakt Email:');
define('TEXT_INFO_LINK_CLICK_COUNT', 'Klicks:');
define('TEXT_INFO_LINK_DESCRIPTION', 'Beschreibung:');
define('TEXT_DATE_LINK_CREATED', 'Link Eingegeben:');
define('TEXT_DATE_LINK_LAST_MODIFIED', 'Zuletzt Ge&auml;ndert:');
define('TEXT_IMAGE_NONEXISTENT', 'BILD IST NICHT VORHANDEN');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Link Status aktualisieren');
define('EMAIL_TEXT_STATUS_UPDATE', 'Hallo %s,' . "\n\n" . 'Der Status Ihres Links bei ' . STORE_NAME . ' wurde aktualisiert.' . "\n\n" . 'Neuer Status: %s' . "\n\n" . 'Bei Fragen antworten Sie bitte auf diese Email.' . "\n");

// VJ todo - move to common language file
define('CATEGORY_WEBSITE', 'Details zur Webseite');
define('CATEGORY_RECIPROCAL', 'Gegenlink Seitendetails');
define('CATEGORY_OPTIONS', 'Optionen');

define('ENTRY_LINKS_TITLE', 'Seitentitel:');
define('ENTRY_LINKS_TITLE_ERROR', 'Link Titel muss eine Mindestl&auml;nge von ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' Zeichen haben.');
define('ENTRY_LINKS_URL', 'URL:');
define('ENTRY_LINKS_URL_ERROR', 'URL mu&szlig; eine Mindestl&auml;nge von ' . ENTRY_LINKS_URL_MIN_LENGTH . ' Zeichen haben.');
define('ENTRY_LINKS_CATEGORY', 'Kategorie:');
define('ENTRY_LINKS_DESCRIPTION', 'Beschreibung:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'Beschreibung mu&szlig; eine Mindestl&auml;nge von ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' Zeichen haben.');
define('ENTRY_LINKS_IMAGE', 'Bild URL:');
define('ENTRY_LINKS_CONTACT_NAME', 'Name:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Ihr Name mu&szlig; eine Mindestl&auml;nge von ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' Zeichen haben.');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Gegenlink Seite:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'Die Gegenlink Seite muss eine Mindestl&auml;nge von ' . ENTRY_LINKS_URL_MIN_LENGTH . ' Zeichen haben.');
define('ENTRY_LINKS_STATUS', 'Status:');
define('ENTRY_LINKS_NOTIFY_CONTACT', 'Benachrichtigungs-Kontakt:');
define('ENTRY_LINKS_RATING', 'Bewertung:');
define('ENTRY_LINKS_RATING_ERROR', 'Die Bewertung sollte nicht leer sein.');

define('TEXT_DISPLAY_NUMBER_OF_LINKS', 'Zeige <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Links an)');

define('IMAGE_NEW_LINK', 'Neuer Link');
define('IMAGE_CHECK_LINK', 'Link pr&uuml;fen');


define('ALL', 'All');
define('LINKS_MANAGER_CHECKED_LINKS', 'Links Manager - Checked Links');
define('ASC', 'Asc');
define('DESC', 'Desc');
define('START_AT', 'Start at:');
define('HOW_MANY', 'How many?');
?>
