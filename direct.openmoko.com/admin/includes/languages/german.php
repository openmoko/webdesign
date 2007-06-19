<?php
/*
  $Id: german.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

//Admin begin
define('TEXT_ADMIN_HOME','Admin Home');
define('TEXT_VIEW_CATALOG','Katalog anzeigen');
define('TEXT_FORUMS','CRE Forums');
define('TEXT_PURCHASE_SUPPORT','Purchase CRE Support');
define('TEXT_HOSTING','Certified CRE Hosting');
define('TEXT_ADMIN_LANG','Admin Sprache:');
define('TEXT_CHANGE_PASWORD','Passwort &auml;ndern');
define('TEXT_LOGOUT','Abmelden');
define('TEXT_CHECK_UPDATES','auf Aktuelle Version pr&uuml;fen');
define('TEXT_GET_PRO','Pro Version kaufen');
define('TEXT_GET_B2B','Get B2B Version');

// header text in includes/header.php
define('HEADER_TITLE_ACCOUNT', 'Mein Konto');
define('HEADER_TITLE_LOGOFF', 'Beenden');
define('TEXT_SELECT_LANGUAGE', 'Bitte w&auml;hlen Sie die Sprache f&uuml;r diese Administrations Sitzung ');
define('BOX_REPORTS_NOT_VALID_USER', 'Kunde nicht validiert');

// Admin Account
define('BOX_HEADING_MY_ACCOUNT', 'Mein Konto');

//MARKETING BOX
define('BOX_HEADING_MARKETING', 'Marketing');
define('BOX_MARKETING_EVENTS_MANAGER', 'Events/Kalender Verwalten');
define('BOX_MARKETING_SALEMAKER', 'SaleMaker');
define('BOX_MARKETING_SPECIALS', 'Sonderangebote');
define('BOX_MARKETING_SPECIALSBYCAT','Sonderangebot in Kategorie');
define('BOX_MARKETING_BANNER_MANAGER','Banner Verwalten');

// configuration box text in includes/boxes/administrator.php
define('BOX_HEADING_ADMINISTRATOR', 'Administrator');
define('BOX_ADMINISTRATOR_MEMBERS', 'Mitglieder Gruppen');
define('BOX_ADMINISTRATOR_GROUPS', 'Admin Groups');
define('BOX_ADMINISTRATOR_MEMBER', 'Mitglieder');
define('BOX_ADMINISTRATOR_BOXES', 'Zugang zu Dateien');
define('BOX_ADMINISTRATOR_ACCOUNT_UPDATE', 'Konto updaten');

// images
define('IMAGE_FILE_PERMISSION', 'Dateien Zugangsrechte');
define('IMAGE_GROUPS', 'Gruppenliste');
define('IMAGE_INSERT_FILE', 'Datei einf&uuml;gen');
define('IMAGE_MEMBERS', 'Mitgliederliste');
define('IMAGE_NEW_GROUP', 'Neue Gruppe');
define('IMAGE_NEW_MEMBER', 'Neues Mitglied');
define('IMAGE_NEXT', 'Weiter');

// constants for use in tep_prev_next_display function
define('TEXT_DISPLAY_NUMBER_OF_FILENAMES', 'Zeige <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Dateinamen)');
define('TEXT_DISPLAY_NUMBER_OF_MEMBERS', 'Zeige <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Mitgliedern)');
//Admin end

// look in your $PATH_LOCALE/locale directory for available locales..
// on RedHat6.0 I used 'de_DE'
// on FreeBSD 4.0 I use 'de_DE.ISO_8859-1'
// this may not work under win32 environments..
setlocale(LC_TIME, 'de_DE.ISO_8859-1');
define('DATE_FORMAT_SHORT', '%d.%m.%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A, %d. %B %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd.m.Y');  // this is used for strftime()
define('PHP_DATE_TIME_FORMAT', 'd.m.Y H:i:s'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// Global entries for the <html> tag
define('HTML_PARAMS','dir="ltr" lang="de"');

// charset for web pages and emails
define('CHARSET', 'iso-8859-1');

// page title
define('TITLE', STORE_NAME);

// CCGV
define('BOX_HEADING_GV_ADMIN', 'Gutschein/Rabatt');
define('BOX_GV_ADMIN_QUEUE', 'Ausgestellte Gutscheine');
define('BOX_GV_ADMIN_MAIL', 'EMail Gutscheine');
define('BOX_GV_ADMIN_SENT', 'Versandte Gutscheine');
define('BOX_COUPON_ADMIN','Rabatt Admin');
define('BOX_GV_REPORT','Rabatt Bericht');
define('IMAGE_RELEASE', 'Zufalls Gutschein');

define('_JANUARY', 'Januar');
define('_FEBRUARY', 'Februar');
define('_MARCH', 'M&auml;rz');
define('_APRIL', 'April');
define('_MAY', 'Mai');
define('_JUNE', 'Juni');
define('_JULY', 'Juli');
define('_AUGUST', 'August');
define('_SEPTEMBER', 'September');
define('_OCTOBER', 'Oktober');
define('_NOVEMBER', 'November');
define('_DECEMBER', 'Dezember');

define('TEXT_DISPLAY_NUMBER_OF_GIFT_VOUCHERS', 'Anzeigen <b>%d</b> bis <b>%d</b> (von <b>%d</b> Gutscheinen)');
define('TEXT_DISPLAY_NUMBER_OF_COUPONS', 'Anzeigen <b>%d</b> bis <b>%d</b> (von <b>%d</b> Rabattgutscheinen)');

define('TEXT_VALID_PRODUCTS_LIST', 'Produktliste');
define('TEXT_VALID_PRODUCTS_ID', 'Produkt ID');
define('TEXT_VALID_PRODUCTS_NAME', 'Produkt Name');
define('TEXT_VALID_PRODUCTS_MODEL', 'Produkt Modell');

define('TEXT_VALID_CATEGORIES_LIST', 'Kategorie Liste');
define('TEXT_VALID_CATEGORIES_ID', 'Kategorie ID');
define('TEXT_VALID_CATEGORIES_NAME', 'Kategorie Name');

// ############### end added #########################
// header text in includes/header.php
define('HEADER_TITLE_TOP', 'Administration');
define('HEADER_TITLE_SUPPORT_SITE', 'Supportseite');
define('HEADER_TITLE_ONLINE_CATALOG', 'Online Katalog');
define('HEADER_TITLE_ADMINISTRATION', 'Administration');
define('HEADER_TITLE_CHAINREACTION', 'Chainreactionweb');
define('HEADER_TITLE_CRELOADED', 'CRE Loaded Project');
// MaxiDVD Added Line For WYSIWYG HTML Area: BOF
define('BOX_CATALOG_DEFINE_MAINPAGE', 'Startseite definieren');
// MaxiDVD Added Line For WYSIWYG HTML Area: EOF

// text for gender
define('MALE', 'Herr');
define('FEMALE', 'Frau');

// text for date of birth example
define('DOB_FORMAT_STRING', 'tt.mm.jjjj');

// configuration box text in includes/boxes/configuration.php
define('BOX_HEADING_CONFIGURATION', 'Konfiguration');
define('BOX_CONFIGURATION_MYSTORE', 'Mein Shop');
define('BOX_CONFIGURATION_LOGGING', 'Logging');
define('BOX_CONFIGURATION_CACHE', 'Cache');

// added for super-friendly admin menu:
define('BOX_CONFIGURATION_MIN_VALUES', 'Min Werte');
define('BOX_CONFIGURATION_MAX_VALUES', 'Max Werte');
define('BOX_CONFIGURATION_IMAGES', 'Bilder Konfiguration');
define('BOX_CONFIGURATION_CUSTOMER_DETAILS', 'Kunden Details');
define('BOX_CONFIGURATION_SHIPPING', 'Default Versand Einstellungen');
define('BOX_CONFIGURATION_PRODUCT_LISTING', 'Produkt Auflistung');
define('BOX_CONFIGURATION_EMAIL', 'Email');
define('BOX_CONFIGURATION_DOWNLOAD', 'Download Verwaltung');
define('BOX_CONFIGURATION_GZIP', 'GZip');
define('BOX_CONFIGURATION_SESSIONS', 'Sessions');
define('BOX_CONFIGURATION_STOCK', 'Lagerverwaltung');
define('BOX_CONFIGURATION_WYSIWYG', 'WYSIWYG Editor 1.7');
define('BOX_CONFIGURATION_AFFILIATE', 'Partnerprogram');
define('BOX_CONFIGURATION_MAINT', 'Wartungsmodus');
define('BOX_CONFIGURATION_ACCOUNTS', 'Einkaufen ohne Kundenkonto');
define('BOX_CONFIGURATION_CHECKOUT', 'Einstellungen Bestellvorgang');
define('BOX_CONFIGURATION_LINKS', 'Links Verwaltung');

// modules box text in includes/boxes/modules.php
define('BOX_HEADING_MODULES', 'Module');
define('BOX_MODULES_PAYMENT', 'Zahlungsweise');
define('BOX_MODULES_SHIPPING', 'Versandart');
define('BOX_MODULES_ORDER_TOTAL', 'Zusammenfassung');

// categories box text in includes/boxes/catalog.php
define('BOX_HEADING_CATALOG', 'Katalog');
define('BOX_CATALOG_CATEGORIES_PRODUCTS', 'Kategorien / Artikel');
define('BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES', 'Produktmerkmale');
define('BOX_CATALOG_CATEGORIES_PRODUCTS_CATEGORY_OPTIONS', 'Products Categories Options');
define('BOX_CATALOG_MANUFACTURERS', 'Hersteller');
define('BOX_CATALOG_REVIEWS', 'Produktbewertungen');
define('BOX_CATALOG_SPECIALS', 'Sonderangebote');
define('BOX_CATALOG_PRODUCTS_EXPECTED', 'erwartete Artikel');
define('BOX_CATALOG_EASYPOPULATE', 'EasyPopulate');
define('BOX_CATALOG_EASYPOPULATE_BASIC', 'Easy Populate Basic');

define('BOX_CATALOG_SALEMAKER', 'SaleMaker');

define('BOX_CATALOG_SHOP_BY_PRICE', 'Nach Preis einkaufen');
// customers box text in includes/boxes/customers.php
define('BOX_HEADING_CUSTOMERS', 'Kunden');
define('BOX_CUSTOMERS_CUSTOMERS', 'Kunden');
//added for Super-Friendly Admin Menu:
define('BOX_CUSTOMERS_ORDERS', 'Bestellungen');
define('BOX_CUSTOMERS_EDIT_ORDERS', 'Bestellungen Editieren');
//begin PayPal_Shopping_Cart_IPN
//end PayPal_Shopping_Cart_IPN

define('BOX_CREATE_ACCOUNT', 'Neues Konto erstellen');
define('BOX_CREATE_ORDER', 'Neue Bestellung erstellen');
define('BOX_CREATE_ORDERS_ADMIN', 'Bestellung erstellen Admin');
// taxes box text in includes/boxes/taxes.php
define('BOX_HEADING_LOCATION_AND_TAXES', 'L&auml;nder / Steuern');
define('BOX_TAXES_COUNTRIES', 'L&auml;nder');
define('BOX_TAXES_ZONES', 'Bundesl&auml;nder');
define('BOX_TAXES_GEO_ZONES', 'Steuerzonen');
define('BOX_TAXES_TAX_CLASSES', 'Steuerklassen');
define('BOX_TAXES_TAX_RATES', 'Steuers&auml;tze');

// reports box text in includes/boxes/reports.php
define('BOX_HEADING_REPORTS', 'Berichte');
define('BOX_REPORTS_PRODUCTS_VIEWED', 'besuchte Artikel');
define('BOX_REPORTS_PRODUCTS_PURCHASED', 'gekaufte Artikel');
define('BOX_REPORTS_ORDERS_TOTAL', 'Kunden-Bestellstatistik');
define('BOX_REPORTS_CUSTOMER_WISHLIST', 'Kunden Wunschliste');
define('BOX_CUSTOMERS_MENU','Customer Menu');

// tools text in includes/boxes/tools.php
define('BOX_HEADING_TOOLS', 'Hilfsprogramme');
define('BOX_TOOLS_BACKUP', 'Datenbanksicherung');
define('BOX_TOOLS_BANNER_MANAGER', 'Banner Manager');
define('BOX_TOOLS_CACHE', 'Cache Steuerung');
define('BOX_TOOLS_DEFINE_LANGUAGE', 'Sprachen definieren');
define('BOX_TOOLS_FILE_MANAGER', 'Datei-Manager');
define('BOX_TOOLS_MAIL', 'Email versenden');
define('BOX_TOOLS_NEWSLETTER_MANAGER', 'Rundschreiben Manager');
define('BOX_TOOLS_SERVER_INFO', 'Server Info');
define('BOX_TOOLS_WHOS_ONLINE', 'Wer ist Online');

// BMC CC Mod Start
define('BOX_TOOLS_BLACKLIST', 'Credit Card Blacklist');
// BMC CC Mod End
// localizaion box text in includes/boxes/localization.php
define('BOX_HEADING_LOCALIZATION', 'Sprachen/W&auml;hrungen');
define('BOX_LOCALIZATION_CURRENCIES', 'W&auml;hrungen');
define('BOX_LOCALIZATION_LANGUAGES', 'Sprachen');
define('BOX_LOCALIZATION_ORDERS_STATUS', 'Bestellstatus');

define('BOX_HEADING_HEADER_TAGS_CONTROLLER', 'Header Tags');
define('BOX_HEADER_TAGS_ADD_A_PAGE', 'Page Control');
define('BOX_HEADER_TAGS_ENGLISH', 'Text Control');
define('BOX_HEADER_TAGS_FILL_TAGS', 'Fill Tags');

// infobox box text in includes/boxes/info_boxes.php
define('BOX_HEADING_DESIGN_CONTROLS', 'Design Verwaltung');
define('BOX_HEADING_BOXES', 'Administration Of boxes');
define('BOX_HEADING_DESIGN_TEMPLATE', 'Template');
define('BOX_HEADING_TEMPLATE_CONFIGURATION', 'Template Konfiguration');
define('BOX_HEADING_TEMPLATE_MANAGEMENT', 'Template Manager');
define('BOX_HEADING_TEMPLATE_MANAGEMENT1', 'Neues Template verwalten');
define('BOX_HEADING_DESIGN_INFOBOX', 'Infobox');
define('BOX_HEADING_BOXES', 'Infobox Verwaltung');
define('BOX_HEADING_BOXES_ADMIN', 'Infobox Konfiguration');
define('BOX_HEADING_DESIGN_BRANDING', 'Branding');
define('BOX_HEADING_TEMPLATE_HEADER_TAGS','Header Tags');


define('BOX_HEADING_DESIGN_LAYOUT', 'Layout');
define('BOX_HEADING_DESIGN_PRODUCT_LISTING', 'Produkt anzeige');
define('BOX_HEADING_DESIGN_HOME_PAGE', 'Home Seite');
define('BOX_HEADING_DESIGN_INDEX_PAGE', 'Index Seite');
define('BOX_HEADING_DESIGN_PRODUCT_PAGE', 'Produkt Seite');

define('BOX_TEMPLATE_NAVMENU','Navigation Verwaltung');

// VJ Links Manager v1.00 begin
// links manager box text in includes/boxes/links.php
define('BOX_HEADING_LINKS', 'Links Verwaltung');
define('BOX_LINKS_LINKS', 'Links');
define('BOX_LINKS_LINK_CATEGORIES', 'Link Kategorien');
define('BOX_LINKS_LINKS_CONTACT', 'Links Kontakt');
// VJ Links Manager v1.00 end

// javascript messages
define('JS_ERROR', 'W�hrend der Eingabe sind Fehler aufgetreten!\nBitte korrigieren Sie folgendes:\n\n');

define('JS_OPTIONS_VALUE_PRICE', '* Sie m�ssen diesem Wert einen Preis zuordnen\n');
define('JS_OPTIONS_VALUE_PRICE_PREFIX', '* Sie m�ssen ein Vorzeichen f�r den Preis angeben (+/-)\n');

define('JS_PRODUCTS_NAME', '* Der neue Artikel muss einen Namen haben\n');
define('JS_PRODUCTS_DESCRIPTION', '* Der neue Artikel muss eine Beschreibung haben\n');
define('JS_PRODUCTS_PRICE', '* Der neue Artikel muss einen Preis haben\n');
define('JS_PRODUCTS_WEIGHT', '* Der neue Artikel muss eine Gewichtsangabe haben\n');
define('JS_PRODUCTS_QUANTITY', '* Sie m�ssen dem neuen Artikel eine verf�gbare Anzahl zuordnen\n');
define('JS_PRODUCTS_MODEL', '* Sie m�ssen dem neuen Artikel eine Artikel-Nr. zuordnen\n');
define('JS_PRODUCTS_IMAGE', '* Sie m�ssen dem Artikel ein Bild zuordnen\n');

define('JS_SPECIALS_PRODUCTS_PRICE', '* Es muss ein neuer Preis f�r diesen Artikel festgelegt werden\n');

define('JS_GENDER', '* Die \'Anrede\' muss ausgew�hlt werden.\n');
define('JS_FIRST_NAME', '* Der \'Vorname\' muss mindestens aus ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_LAST_NAME', '* Der \'Nachname\' muss mindestens aus ' . ENTRY_LAST_NAME_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_DOB', '* Das \'Geburtsdatum\' muss folgendes Format haben: xx.xx.xxxx (Tag/Jahr/Monat).\n');
define('JS_EMAIL_ADDRESS', '* Die \'Email-Adresse\' muss mindestens aus ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_ADDRESS', '* Die \'Strasse\' muss mindestens aus ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_POST_CODE', '* Die \'Postleitzahl\' muss mindestens aus ' . ENTRY_POSTCODE_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_CITY', '* Die \'Stadt\' muss mindestens aus ' . ENTRY_CITY_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_STATE', '* Das \'Bundesland\' muss ausgew�hlt werden.\n');
define('JS_STATE_SELECT', '-- W�hlen Sie oberhalb --');
define('JS_ZONE', '* Das \'Bundesland\' muss aus der Liste f�r dieses Land ausgew�hlt werden.');
define('JS_COUNTRY', '* Das \'Land\' muss ausgew�hlt werden.\n');
define('JS_TELEPHONE', '* Die \'Telefonnummer\' muss aus mindestens ' . ENTRY_TELEPHONE_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_PASSWORD', '* Das \'Passwort\' sowie die \'Passwortbest�tigung\' m�ssen �bereinstimmen und aus mindestens ' . ENTRY_PASSWORD_MIN_LENGTH . ' Zeichen bestehen.\n');

define('JS_ORDER_DOES_NOT_EXIST', 'Auftragsnummer %s existiert nicht!');
/* User Friendly Admin Menu */
define('CATALOG_CATEGORIES', 'Kategorien');
define('CATALOG_ATTRIBUTES', 'Produkt Attribute');
define('CATALOG_REVIEWS', 'Produkt Berichte');
define('CATALOG_SPECIALS', 'Sonderangebote');
define('CATALOG_EXPECTED', 'Produkt erwartet');
define('REPORTS_PRODUCTS_VIEWED', 'Betrachtete Produkte');
define('REPORTS_PRODUCTS_PURCHASED', 'gekaufte Produkte');
define('TOOLS_FILE_MANAGER', 'Datei-Explorer');
define('TOOLS_CACHE', 'Cache Verwaltung');
define('TOOLS_DEFINE_LANGUAGES', 'Definiere Sprachen');
define('TOOLS_EMAIL', 'Email Kunden');
define('TOOLS_NEWSLETTER', 'Newsletters');
define('TOOLS_SERVER_INFO', 'Server Info');
define('TOOLS_WHOS_ONLINE', 'Wer ist Online');
define('BOX_HEADING_GV', 'Gutschein/Rabatt');
define('GV_COUPON_ADMIN', 'Discount Gutscheine');
define('GV_EMAIL', 'Gutschein versenden');
define('GV_QUEUE', 'Gift Voucher Redeem');
define('GV_SENT', 'Gift Voucher\'s Sent');
define('BOX_GV_SENT', 'Gift Voucher\'s Sent');
/* User Friedly Admin Menu */

define('CATEGORY_PERSONAL', 'Pers&ouml;nliche Daten');
define('CATEGORY_ADDRESS', 'Adresse');
define('CATEGORY_CONTACT', 'Kontakt');
define('CATEGORY_COMPANY', 'Firma');
define('CATEGORY_OPTIONS', 'Optionen');
define('CATEGORY_PASSWORD', 'Ihr Passwort');

define('ENTRY_COMPANY', 'Firmen Name:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Gender:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">notwendige Eingabe</span>');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Vorname:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Nachname:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_LAST_NAME_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Geburtsdatum:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(z.B. 21.05.1970)</span>');
define('ENTRY_EMAIL_ADDRESS', 'Email Adresse:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">ung&uuml;ltige Email-Adresse!</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">Diese Email-Adresse existiert schon!</span>');
define('ENTRY_COMPANY', 'Firmenname:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_STREET_ADDRESS', 'Strasse:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_SUBURB', 'weitere Anschrift:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_POST_CODE', 'Postleitzahl:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_POSTCODE_MIN_LENGTH . ' Zahlen</span>');
define('ENTRY_CITY', 'Stadt:');
define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_CITY_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_STATE', 'Bundesland:');
define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">notwendige Eingabe</font></small>');
define('ENTRY_COUNTRY', 'Land:');
define('ENTRY_COUNTRY_ERROR', 'You must select a country from the Countries pull down menu.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Telefonnummer:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_TELEPHONE_MIN_LENGTH . ' Zahlen</span>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Telefaxnummer:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Rundschreiben:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'abonniert');
define('ENTRY_NEWSLETTER_NO', 'nicht abonniert');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_PASSWORD_ERROR', 'Your Password must contain a minimum of ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'The Password Confirmation must match your Password.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Password Confirmation:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Current Password:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Your Password must contain a minimum of ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.');
define('ENTRY_PASSWORD_NEW', 'New Password:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Your new Password must contain a minimum of ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'The Password Confirmation must match your new Password.');
define('PASSWORD_HIDDEN', '--HIDDEN--');

define('FORM_REQUIRED_INFORMATION', '* Ben&ouml;tigte Information');
define('ENTRY_NEWSLETTER_ERROR', '');
define('CATEGORY_ORDER_DETAILS', 'Kunden Details');
define('ENTRY_CURRENCY', 'Kunden W&auml;hrung');

// images
define('IMAGE_ANI_SEND_EMAIL', 'Email versenden');
define('IMAGE_BACK', 'Zur&uuml;ck');
define('IMAGE_BACKUP', 'Datensicherung');
define('IMAGE_CANCEL', 'Abbruch');
define('IMAGE_BUTTON_CONTINUE', 'Weiter');
define('IMAGE_CONFIRM', 'Best&auml;tigen');
define('IMAGE_COPY', 'Kopieren');
define('IMAGE_COPY_TO', 'Kopieren nach');
define('IMAGE_DETAILS', 'Details');
define('IMAGE_DELETE', 'L&ouml;schen');
define('IMAGE_EDIT', 'Bearbeiten');
define('IMAGE_EDIT_STATUS', 'Bestellstatus &auml;ndern');
define('IMAGE_EDIT_ORDER', 'Bestellung bearbeiten');
define('IMAGE_EDIT_LANG_DEFINE', 'Edit Language Defines');
define('IMAGE_EMAIL', 'Email versenden');
define('IMAGE_FILE_MANAGER', 'Datei-Manager');
define('IMAGE_ICON_STATUS_GREEN', 'aktiv');
define('IMAGE_ICON_STATUS_GREEN_LIGHT', 'aktivieren');
define('IMAGE_ICON_STATUS_RED', 'inaktiv');
define('IMAGE_ICON_STATUS_RED_LIGHT', 'deaktivieren');
define('IMAGE_ICON_INFO', 'Information');
define('IMAGE_INSERT', 'Einf&uuml;gen');
define('IMAGE_LOCK', 'Sperren');
define('IMAGE_MODULE_INSTALL', 'Modul Installieren');
define('IMAGE_MODULE_REMOVE', 'Modul Entfernen');
define('IMAGE_MOVE', 'Verschieben');
define('IMAGE_NEW_BANNER', 'Neuen Banner aufnehmen');
define('IMAGE_NEW_CATEGORY', 'Neue Kategorie erstellen');
define('IMAGE_NEW_COUNTRY', 'Neues Land aufnehmen');
define('IMAGE_NEW_CURRENCY', 'Neue W&auml;hrung einf&uuml;gen');
define('IMAGE_NEW_FILE', 'Neue Datei');
define('IMAGE_NEW_FOLDER', 'Neues Verzeichnis');
define('IMAGE_NEW_LANGUAGE', 'Neue Sprache anlegen');
define('IMAGE_NEW_NEWSLETTER', 'Neues Rundschreiben');
define('IMAGE_NEW_PRODUCT', 'Neuen Artikel aufnehmen');
define('IMAGE_NEW_SALE', 'New Sale');
define('IMAGE_NEW_TAX_CLASS', 'Neue Steuerklasse erstellen');
define('IMAGE_NEW_TAX_RATE', 'Neuen Steuersatz anlegen');
define('IMAGE_NEW_TAX_ZONE', 'Neue Steuerzone erstellen');
define('IMAGE_NEW_ZONE', 'Neues Bundesland einf&uuml;gen');
define('IMAGE_ORDERS', 'Bestellungen');
define('IMAGE_ORDERS_INVOICE', 'Rechnung');
define('IMAGE_ORDERS_PACKINGSLIP', 'Lieferschein');
define('IMAGE_PREVIEW', 'Vorschau');
define('IMAGE_RESET', 'Zur&uuml;cksetzen');
define('IMAGE_RESTORE', 'Zur&uuml;cksichern');
define('IMAGE_SAVE', 'Speichern');
define('IMAGE_SEARCH', 'Suchen');
define('IMAGE_SELECT', 'Ausw&auml;hlen');
define('IMAGE_SEND', 'Versenden');
define('IMAGE_SEND_EMAIL', 'Email versenden');
define('IMAGE_UNLOCK', 'Entsperren');
define('IMAGE_UPDATE', 'Aktualisieren');
define('IMAGE_UPDATE_CURRENCIES', 'Wechselkurse aktualisieren');
define('IMAGE_UPLOAD', 'Hochladen');

define('ICON_CROSS', 'Falsch');
define('ICON_CURRENT_FOLDER', 'aktueller Ordner');
define('ICON_DELETE', 'L&ouml;schen');
//added for quick product edit DMG
define('ICON_EDIT','Editieren');
define('ICON_ERROR', 'Fehler');
define('ICON_FILE', 'Datei');
define('ICON_FILE_DOWNLOAD', 'Herunterladen');
define('ICON_FOLDER', 'Ordner');
define('ICON_LOCKED', 'Gesperrt');
define('ICON_PREVIOUS_LEVEL', 'Vorherige Ebene');
define('ICON_PREVIEW', 'Vorschau');
define('ICON_STATISTICS', 'Statistik');
define('ICON_SUCCESS', 'Erfolg');
define('ICON_TICK', 'Wahr');
define('ICON_UNLOCKED', 'Entsperrt');
define('ICON_WARNING', 'Warnung');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Seite %s von %d');
define('TEXT_DISPLAY_NUMBER_OF_BANNERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bannern)');
define('TEXT_DISPLAY_NUMBER_OF_COUNTRIES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> L&auml;ndern)');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Kunden)');
define('TEXT_DISPLAY_NUMBER_OF_CURRENCIES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> W&auml;hrungen)');
define('TEXT_DISPLAY_NUMBER_OF_LANGUAGES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Sprachen)');
define('TEXT_DISPLAY_NUMBER_OF_MANUFACTURERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Herstellern)');
define('TEXT_DISPLAY_NUMBER_OF_NEWSLETTERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Rundschreiben)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bestellungen)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS_STATUS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bestellstatus)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Artikeln)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_EXPECTED', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> erwarteten Artikeln)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bewertungen)');
define('TEXT_DISPLAY_NUMBER_OF_SALES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> sales)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Sonderangeboten)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_CLASSES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Steuerklassen)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_ZONES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Steuerzonen)');
define('TEXT_DISPLAY_NUMBER_OF_TAX_RATES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Steuers&auml;tzen)');
define('TEXT_DISPLAY_NUMBER_OF_ZONES', 'Angezeigt werden <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Bundesl&auml;ndern)');

define('PREVNEXT_BUTTON_PREV', '&lt;&lt;');
define('PREVNEXT_BUTTON_NEXT', '&gt;&gt;');

define('TEXT_DEFAULT', 'Standard');
define('TEXT_SET_DEFAULT', 'als Standard definieren');
define('TEXT_FIELD_REQUIRED', '&nbsp;<span class="fieldRequired">* erforderlich</span>');

define('ERROR_NO_DEFAULT_CURRENCY_DEFINED', 'Fehler: Es wurde keine Standardw&auml;hrung definiert. Bitte definieren Sie unter Adminstration -> Sprachen/W&auml;hrungen -> W&auml;hrungen eine Standardw&auml;hrung.');

define('TEXT_NONE', '--keine--');
define('TEXT_TOP', 'Top');

define('ERROR_DESTINATION_DOES_NOT_EXIST', 'Fehler: Ziel existiert nicht.');
define('ERROR_DESTINATION_NOT_WRITEABLE', 'Fehler: Ziel hat keine Schreibrechte.');
define('ERROR_FILE_NOT_SAVED', 'Fehler: Dateiupload nicht gespeichert.');
define('ERROR_FILETYPE_NOT_ALLOWED', 'Fehler: Dateiupload Typ nicht erlaubt.');
define('SUCCESS_FILE_SAVED_SUCCESSFULLY', 'Erfolg: Dateiupload erfolgreich gespeichert.');
define('WARNING_NO_FILE_UPLOADED', 'Warnung: Keine Datei hochgeladen.');
define('WARNING_FILE_UPLOADS_DISABLED', 'Warnung: Dateiuploads sind in der php.ini Konfigurationsdatei abgeschaltet.');
define('TEXT_DISPLAY_NUMBER_OF_PAYPALIPN_TRANSACTIONS', 'Zeige <b>%d</b> bis <b>%d</b> (von insgesamt <b>%d</b> Transaktionen)'); // PAYPALIPN
define('ERROR_TEP_MAIL', '<font face="Verdana, Arial" size="2" color="#ff0000"><b><small>TEP ERROR:</small> Cannot send the email through the specified SMTP server. Please check your php.ini setting and correct the SMTP server if necessary.</b></font>');
define('WARNING_INSTALL_DIRECTORY_EXISTS', 'Warning: Installation directory exists at: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install. Please remove this directory for security reasons.');
define('WARNING_UPGRADES_DIRECTORY_EXISTS', 'Warning: Upgrades directory exists at: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/upgrades. Please remove this directory for security reasons.');
define('WARNING_CONFIG_FILE_WRITEABLE', 'Warning: I am able to write to the configuration file: ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php. This is a potential security risk - please set the right user permissions on this file.');
define('WARNING_CONFIG_FILE_WRITEABLE_CATALOG', 'Warning: I am able to write to the configuration file: ' . DIR_FS_CATALOG . 'includes/configure.php. This is a potential security risk - please set the right user permissions on this file.');
define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', 'Warning: The sessions directory does not exist: ' . tep_session_save_path() . '. Sessions will not work until this directory is created.');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', 'Warning: I am not able to write to the sessions directory: ' . tep_session_save_path() . '. Sessions will not work until the right user permissions are set.');
define('WARNING_SESSION_AUTO_START', 'Warning: session.auto_start is enabled - please disable this php feature in php.ini and restart the web server.');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'Warning: The downloadable products directory does not exist: ' . DIR_FS_CATALOG . 'download/' . '. Downloadable products will not work until this directory is valid.');
define('WARNING_ENCRYPT_FILE_MISSING', 'Warning: The Encryption key file is missing.');
define('WARNING_TMP_DIRECTORY_NON_EXISTENT', 'Warning: The /tmp is not writable: ' . DIR_FS_CATALOG . 'tmp/' . '. The page cacheing will not work until this directory is writable.');


define('BOX_HEADING_PAYPALIPN_ADMIN', 'Paypal IPN'); // PAYPALIPN
define('BOX_PAYPALIPN_ADMIN_TRANSACTIONS', 'Transactions'); // PAYPALIPN
define('BOX_PAYPALIPN_ADMIN_TESTS', 'Send Test IPN'); // PAYPALIPN
define('BOX_CATALOG_XSELL_PRODUCTS', 'Cross Sell Products'); // X-Sell

define('TEXT_CSCAL_ERROR_CARD_TYPE_MISMATCH', 'Error: 01 The Credit Card number does not match the Card Type:');
define('TEXT_CCVAL_ERROR_INVALID_MONTH', 'Error: 02 The expiry date Motnth entered for the credit card is invalid.Please check the date and try again.');
define('TEXT_CCVAL_ERROR_INVALID_YEAR', 'Error: 03 The expiry date year entered for the credit card is invalid.Please check the date and try again.');
define('TEXT_CCVAL_ERROR_INVALID_DATE', 'Error: 04 The expiry date entered for the credit card is invalid.Please check the date and try again.');
define('TEXT_CCVAL_ERROR_INVALID_NUMBER', 'Error: 05 The credit card number entered is invalid. Please check the number for misstyped numbers and try again.');
define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', 'Error: 06 The first four digits of the number entered are: %s If that number is correct, we do not accept that type of credit card.If it is wrong, please try again.');
define('TEXT_CCVAL_ERROR_NOT_ACCEPTED', 'Error: 07 The credit card number you have entered appears to be a %s card. Unfortunately at this time we do not accept %s as payment.');
define('TEXT_CCVAL_ERROR_BLACKLIST', 'Error: 08 We cannot accept your card as it is blacklisted, if you feel you have recieved this message in error please contact your card issuer.');
define('TEXT_CCVAL_ERROR_SHORT', 'Error: 09 You have not entered the correct amount of digits. Please ensure you have entered all of the long number displayed on the front of your card');
define('TEXT_CCVAL_ERROR_CVV_LENGTH', 'Error: 10 The CCV/CVV/CID number entered is the incorrect length. Please try again.');
REQUIRE(DIR_WS_LANGUAGES . 'add_ccgvdc_german.php');

define('IMAGE_BUTTON_PRINT_ORDER', 'Druckf&auml;hige Bestellung');

// BOF: Lango Added for print order MOD
define('IMAGE_BUTTON_PRINT', 'Drucken');
// EOF: Lango Added for print order MOD

// BOF: Lango Added for Featured product MOD
  define('BOX_CATALOG_FEATURED', 'Erwartete Produkte');
// EOF: Lango Added for Featured product MOD

// BOF: Lango Added for Sales Stats MOD
define('BOX_REPORTS_MONTHLY_SALES', 'Monatlicher Verkauf/Steuer');
// EOF: Lango Added for Sales Stats MOD

// BOF: Lango Added for template MOD
// WebMakers.com Added: Attribute Sorter, Copier and Catalog additions
require(DIR_WS_LANGUAGES . $language . '/' . 'attributes_sorter.php');

//DWD Modify: Information Page Unlimited 1.1f - PT
  define('BOX_HEADING_INFORMATION', 'Info System');
  define('BOX_INFORMATION_MANAGER', 'Info Verwaltung');
//DWD Modify End

include('includes/languages/order_edit_german.php');

 define('BOX_TITLE_CRELOADED', 'CRE Loaded Project');
 define('LINK_CRE_FORUMS','CRE Loaded Forums');
 define('LINK_CRW_SUPPORT','Technical Support');
// General Release Edition
 define('LINK_SF_CRELOADED','Source Forge Home');
 define('LINK_SF_BUGTRACKER','Bug Tracker');
 define('LINK_SF_SUPPORT','Support Request');
 define('LINK_SF_TASK','Task Tracker');
 define('LINK_SF_CVS','Browse CVS');
 define('LINK_CRE_FILES','CRE Downloads');
 define('LINK_SF_FEATURE','Feature Request');
//included for Backup mySQL (courtesy Zen-Cart Team) DMG
 define('BOX_TOOLS_MYSQL_BACKUP','Backup mySQL');
//included for Orderlist 3.1 report DMG
 define('BOX_REPORTS_ORDERLIST', 'Generate orderlist');

// Included for Events Calendar 2.0 DMG
define('BOX_TOOLS_EVENTS_MANAGER', 'Events Manager');
define('IMAGE_NEW_EVENT', 'Neues Event');

// VJ member approval added
define('BOX_CUSTOMERS_APPROVAL', 'Waiting Approval');

// DMG Sales Report 2
  define('BOX_REPORTS_SALES_REPORT2', 'SalesReport2');
  
// DMG Zipcode Matching
  define('BOX_REPORTS_ZIPCODE_MATCH','Customer Zip/State Mismatch');
  
//DMG FAQ System 2.1
  define('BOX_HEADING_FAQ', 'FAQ System');
  define('BOX_FAQ_MANAGER', 'FAQ Manager');
  define('BOX_FAQ_CATEGORIES', 'FAQ Categories');
  define('BOX_FAQ_VIEW', 'FAQ View');
  define('BOX_FAQ_VIEW_ALL', 'FAQ View All');
  
  
// DMG Article Manager
define('BOX_HEADING_ARTICLES', 'Artikel Verwalten');
define('BOX_TOPICS_ARTICLES', 'Topics/Articles');
define('BOX_ARTICLES_CONFIG', 'Configuration');
define('BOX_ARTICLES_AUTHORS', 'Authors');
define('BOX_ARTICLES_REVIEWS', 'Reviews');
define('BOX_ARTICLES_XSELL', 'Cross-Sell Articles');
define('IMAGE_NEW_TOPIC', 'New Topic');
define('IMAGE_NEW_ARTICLE', 'New Article');
define('TEXT_DISPLAY_NUMBER_OF_AUTHORS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> authors)');
define('IMAGE_NEW_AUTHOR', 'Neuer Autor');
define('TEXT_WARNING_NO_AUTHORS', 'WARNING: Leere Autoren Table!&nbsp;&nbsp;You M�SSEN mindestens einen Autor addieren, bevor Sie in der LageSIND, alle m�gliche Artikel zu addieren');

// Article Statistics Report DMG
  define('BOX_REPORTS_ARTICLES_VIEWED', 'Articles Viewed');
  define('TEXT_DISPLAY_NUMBER_OF_ARTICLES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> products)');
  
// DMG :  Mulitple Products Manager

define('BOX_CATALOG_CATEGORIES_PRODUCTS_MULTI', 'Multiple Products Manager');


// DMG : Specials by Category



// START: Product Extra Fields DMG
  define('BOX_CATALOG_PRODUCTS_EXTRA_FIELDS', 'Product Extra Fields');
// END: Product Extra Fields DMG

// Customers Order Reports DMG

define('BOX_REPORTS_CUSTOMERS_ORDERS', 'Kunden Statistik');

// Daily Sales Products reports  DMG
define('BOX_REPORTS_DAILY_PRODUCTS_ORDERS', 'T&auml;glicher Produkt Bericht');

// Contact US Email Subject DMG
define('BOX_TOOLS_EMAIL_SUBJECTS', 'Email Subjects');
define('TEXT_DISPLAY_NUMBER_OF_EMAIL_SUBJECTS', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> email subjects)');

define('BOX_REPORTS_EXPLAIN','osC Explain Queries');
 
//define('BOX_HEADING_CRYPT', 'Encryption and Decryption'); 
define('BOX_HEADING_CRYPT', 'Encrypt & Decrypt');
define('BOX_CRYPT_CONFIGURATION', 'Configuration'); 
define('BOX_CRYPT_TEST', 'Test'); 
define('BOX_CRYPT_CC_DATA', 'CC Data'); 
define('BOX_CRYPT_CONVERT', 'Convert CC Data');
define('BOX_CRYPT_PURGE', 'Purge CC Data');
define('BOX_CRYPT_UPDATE', 'Update CC Data');
define('BOX_CRYPT_KEYS', 'Manage Keys');
define('BOX_CRYPT_HELP', 'Help');

define('IMAGE_CONVERT', 'Convert info to new key');
define('IMAGE_ENCRYPT', 'Encrypt data');
define('IMAGE_DECRYPT', 'Decrypt data');
define('IMAGE_RETURN', 'Return to main');
define('IMAGE_EDIT_KEY', 'Edit Key File');
define('IMAGE_CREATE', 'Create key');
define('IMAGE_HELP', 'Help');
define('IMAGE_RUN', 'Run');
  define('BOX_DATA_EASYPOPULATE_BASIC', 'Easy Populate Basic');
  define('BOX_DATA_EASYPOPULATE', 'Easy Populate Advance');
  define('BOX_DATA_EASYPOPULATE_EXPORT', 'EPA Export');
  define('BOX_DATA_EASYPOPULATE_IMPORT', 'EPA Import');
  define('BOX_DATA_EASYPOPULATE_BASIC_EXPORT', 'EPB Export');
  define('BOX_DATA_EASYPOPULATE_BASIC_IMPORT', 'EPB Import');
  define('BOX_DATA_EASYPOPULATE_OPTIONS_EXPORT', 'Options Export');
  define('BOX_DATA_EASYPOPULATE_OPTIONS_IMPORT', 'Options Import');
  define('BOX_HEADING_DATA', 'Im- und Export Funktionen');
  define('BOX_DATA', 'Data Feeds');
  define('BOX_DATA_ADMIN', 'Data Configure');
  define('BOX_HEADING_FEEDERS', 'Feeder Systems');
  define('BOX_DATA_HELP', 'Data Help');
  define('BOX_FEEDERS_AMAZON', 'Amazon Marketplace');
  define('BOX_FEEDERS_BIZRATE', 'Biz Rate');
  define('BOX_FEEDERS_FROOGLE', 'Froogle');
  define('BOX_FEEDERS_MYSIMON', 'MySimon');
  define('BOX_FEEDERS_PRICE_GRABBER', 'Price Grabber');
  define('BOX_FEEDERS_SHOPPING', 'Shopping.com');
  define('BOX_FEEDERS_YAHOO', 'Yahoo');

define('BOX_HEADING_DOC', 'Documentation');
define('BOX_DOC_ADMIN', 'Admin');
define('BOX_DOC_CAT', 'Catalog');
define('BOX_DOC_MISC', 'Miscellaneous');



// Eversun mod for sppc and qty price breaks
define('ENTRY_CUSTOMERS_GROUP_NAME', 'Kunden Gruppe:');
define('BOX_CUSTOMERS_GROUPS', 'Kunden Gruppe');
define('ENTRY_COMPANY_TAX_ID', 'Umsatz-Steuer-Ident-Nummer (UStId-Nr.):');
define('ENTRY_COMPANY_TAX_ID_ERROR', '');
define('ENTRY_CUSTOMERS_GROUP_REQUEST_AUTHENTICATION', 'Switch off alert for authentication:');
define('ENTRY_CUSTOMERS_GROUP_RA_NO', 'Alert off');
define('ENTRY_CUSTOMERS_GROUP_RA_YES', 'Alert on');
define('ENTRY_CUSTOMERS_GROUP_RA_ERROR', '');
// Eversun mod end for sppc and qty price breaks
// DMG Mod for Customer Notification Report
define('BOX_REPORTS_PRODUCTS_NOTIFICATIONS', 'Prod Notifications');//Products Notifications V3

define('FOOTER_TEXT_BODY', 'Copyright &copy; 2003 <a href="http://www.oscommerce.com" target="_blank">Oscommerce</a> and <a href="http://www.chainreactionweb.com" target="_blank">CRE Loaded Team</a><br>Powered by <a href="http://www.oscommerce.com" target="_blank">Oscommerce</a><font color="red"> Supercharged by</font> <a href="http://www.chainreactionweb.com" target="_blank">CRE Loaded Team</a><br>Using Version ' . PROJECT_VERSION);

// VJ infosystem begin
define('BOX_HEADING_PAGE_MANAGER', 'Page Manager');
define('BOX_PAGES', 'Pages');
define('BOX_PAGES_CATEGORIES', 'Categories');
// VJ infosystem end

define('BOX_SHIPWIRE', 'Amerika ShipWire');
define('BOX_MODULES_CHECKOUT_SUCCESS', 'Checkout Success');

define('BOX_HEADING_TECH_SUPPORT','Tech Support');
define('BOX_HEADING_INSTALL_EXPLAIN','Explain Quires');
define('IMAGE_BUTTON_BACK','Back');
define('IMAGE_BUTTON_CONFIRM','Confirm');

if(file_exists('includes/languages/german_newsdesk.php')) {
include('includes/languages/german_newsdesk.php');
include('includes/languages/german_faqdesk.php');
}

//coupons redeemed report
define('BOX_REPORTS_COUPONS_REDEEMED','Coupons Redeemed');

define("PAYPAL_HELP_CONFIGURATION_GUIDE","Configuration Guide");
define("PAYPAL_HELP_FREQUENTLY_ASKED_QUESTIONS","Frequently Asked Questions");
define("PAYPAL_CONTENTS","Contents");
define("PAYPAL_HELP_CONTENTS1","The following is a guide towards configuring your store's PayPal payment module settings:");

define("PAYPAL_HELP_CONTENTS2",'<ul style="margin: 10px 0px 0px 0px; padding: 0px 0px 0px 5px; list-style-type: none;">
      <li><b class="ppem380">Enable PayPal Module</b><br />Since you have just done the installation, by default it will say yes.</li><br /><br class="h6" />
      <li><b class="ppem380">E-Mail Address</b><br />Enter your Primary PayPal email address here, if you have more than one email address registered with PayPal then you must login your PayPal account to determine which one is your <b>Primary</b> email address.</li><br /><br class="h6" />
      <li><b class="ppem380">Business ID</b><br />If you have configured a secondary email address to be your Business ID (email address) in your PayPal profile account, then enter this here, otherwise enter the one used above.</li><br /><br class="h6" />
      <li><b class="ppem380">Transaction Currency</b><br />Choose which currencies you want to accept PayPal payments with.</li><br /><br class="h6" />
      <li><b class="ppem380">Payment Zone</b><br />If a zone is selected, only enable this payment method for that zone.</li><br /><br class="h6" />
      <li><b class="ppem380">Set <b>Pending Notification</b> Order Status</b><br />Set the Pending Notification status of orders made with this payment module to this value, \'<b style="color:blue">Pending</b>\' is suggested or alternatively the optional order status created in step 4 above.</li><br /><br class="h6" />
      <li><b class="ppem380">Set <b>Order</b> Status</b><br />Set the status of orders made with this payment module to this value <b style="color:red">Do not set it to \'default\' but specifically choose the status required</b>, \'<b style="color:blue">Processing</b>\' is suggested.</li><br /><br class="h6" />
      <li><b class="ppem380">Set <b>On Hold Order</b> Status</b><br />This order status is used when the Cart Test has failed, eg. the expected payment amount did not match.</li><br /><br class="h6" />
      <li><b class="ppem380">Set <b>Canceled Order</b> Status</b><br />Refunded, Reversed, Failed or Denied payments will be set to this order status.</li><br /><br class="h6" />
      <li><b class="ppem380">Synchronize Invoice</b><br />Specify whether the osCommerce order number should be used as a <b>unique</b> PayPal invoice number, similiar to PayPal\'s Send Money feature, this will enable customers to resume an order via their osCommerce account history info page for that order for pending transactions which were not previously completed.</li><br /><br class="h6" />
      <li><b class="ppem380">Sort order of display</b><br />Sort order of display. Lowest is displayed first.</li><br /><br class="h6" />
      <li><b class="ppem380">Background Color</b><br />Select the background color of PayPal\'s payment pages, either black or white.</li><br /><br class="h6" />
      <li><b class="ppem380">Processing logo</b><br />Specify the image file name to be used in the store\'s checkout process splash page, must be located in <code>catalog/images</code> directory.</li><br /><br class="h6" />
      <li><b class="ppem380">Store logo</b><br />Specify the image file name for PayPal to display on their payment pages pages, must be located in <code>catalog/images</code> directory. If you do not have SSL then leave this field blank.</li><br /><br class="h6" />
      <li><b class="ppem380">PayPal Page Style Name</b><br />Specify the name of the page style you have configured in your PayPal account profile.</li><br /><br class="h6" />
      <li><b class="ppem380">Include a note with payment</b><br />When a customer arrives at the PayPal payment page you can choose whether or not to show them another note field which will have seperate contents from that of the one provided in your store\'s checkout process but will be included in PayPal\'s invoice and receipt.<br />To change the title appearing above this field on the PayPal payment page look in the corresponding catalog langauge file (<code>catalog/includes/langauges/english/modules/payment/paypal.php</code>).</li><br /><br class="h6" />
      <li><b class="ppem380">Shopping Cart Method</b><br />Choose which type of PayPal Shopping Cart you want to use, Aggregate simply means the total amount is passed (with a list of the products shown in a single item field), whereas an Itemized Cart will list indivudally all the items the customer has selected in their PayPal invoice.</li><br /><br class="h6" />
      <li><b class="ppem380">Enable PayPal Shipping Address</b><br />Allow the customer to choose their own PayPal shipping address. (See <a href="'.tep_href_link(FILENAME_PAYPAL,'action=help-faqs','NONSSL') .'">FAQ\'s</a> for more info)</li><br /><br class="h6" />
      <li><b class="ppem380">Digest Key</b><br />Specify a unique digest key, this will then be used similiar to a password while testing via the IPN Test Panel <b>and</b> also the store\'s PayPal transaction signature digest key.</li><br /><br class="h6" />
      <li><b class="ppem380">Test Mode</b><br />This should be off for live environments.<br />You can simulate your own IPNs via the <a href="'. tep_href_link(FILENAME_PAYPAL,'action=itp') .'">IPN Test Panel</a>.</li><br /><br class="h6" />
      <li><b class="ppem380">Cart Test</b><br />This test verifies that the amount received via PayPal matches to what is expected (See <a href="'. tep_href_link(FILENAME_PAYPAL,'action=help-faqs','NONSSL').'">FAQ\'s</a> for more info).</li><br /><br class="h6" />
      <li><b class="ppem380">Debug Email Notifications</b><br />Choose whether you want to receive debug emails.</li><br /><br class="h6" />
      <li><b class="ppem380">Debug Email Notification Address</b><br />Enter a seperate email address where you wish to receive <b>debug</b> emails.</li><br /><br class="h6" />
      <li><b class="ppem380">PayPal Domain</b><br />This must be set to <b>paypal.com</b> for live production environments, this setting is to facilate PayPal\'s sandbox and is not related to the IPN Test Panel or the above Test Mode option.</li><br /><br class="h6" />
      <li><b class="ppem380">Return URL behavior</b><br />This determines what method PayPal should use when returning the customer back to the store, leave this set to 1 (GET).</li><br /><br class="h6" />
    </ul>');



define("PAYPAL_FAQ_CONTENTS1","The following are some frequently asked questions about this payment module:");

define("PAYPAL_FAQ_CONTENTS2",'<ul style="margin: 10px 0px 0px 0px; padding: 0px 0px 0px 5px; list-style-type: none;">
      <li><b class="ppem380">My shipping costs are different once the customer arrives at the PayPal site.</b></legend><div>In your PayPal account profile in the shipping section, check the box that allows overriding the shipping costs.</li><br /><br class="h6" />
      <li><b class="ppem380">Do I need to enable IPN in my PayPal account profile.</b><br />No.</li><br /><br class="h6" />
      <li><b class="ppem380">What url should I specify for the IPN feature to be used.</b><br />You don\'t need to, it will automatically be specified.</li><br /><br class="h6" />
      <li><b class="ppem380">Why doesn\'t the Auto-Return feature work.</b><br />You must enable it first in your PayPal account profile.</li><br /><br class="h6" />
      <li><b class="ppem380">What url should I specify for the Auto-Return feature.</b><br />It doesn\'t matter, this contribution will automatically specify the correct script url location, which is now <code>catalog/checkout_success.php</code></li><br /><br class="h6" />
      <li><b class="ppem380">Does this contribution support PayPal Credit Card payments.</b><br />Yes.</li><br /><br class="h6" />
      <li><b class="ppem380">Why am I getting so many emails per transaction.</b><br />You get <b>one</b> from PayPal and <b>one</b> osCommerce order confirmation email, and another which is the <b>debug email</b>, either disable <b>debug</b> email notification or specify a sperate email address for <b>debug</b> emails.</li><br /><br class="h6" />
      <li><b class="ppem380">Why am I not receiving any IPNs.</b><br />You must ensure that your <b>Primary Email Address</b> and <b>Business ID</b> are configured correctly.<br />Login to your PayPal Account and see what and how many email addresses you are using and which one is the Primary address.<br />Also check your debug emails as it will also specify the Primary Email Address of the intended receiver.</li><br /><br class="h6" />
      <li><b class="ppem380">I\'m having problems with Multi-Currencies.</b><br />This problem should now be resolved, previously the <b>Cart Test</b> was comparing the currency and amounts of the actual order to what PayPal received as opposed to actually comparing the currency and amounts prior to transfering the customer to PayPal.<br /><br /><b>However</b>, if you\'re using the Itemized Shopping Cart then discrepancies may arise due to PayPal\'s two decimal place calculations, in such an event the order will be placed on hold. Although this type of discrepancy may not affect all orders it does however exist and now adds a future requirement to enable you to finalize the transaction via your store\'s admin.</li><br /><br class="h6" />
      <li><b class="ppem380">I\'m having problems verifying the Cart Totals.</b><br />See above.</li><br /><br class="h6" />
      <li><b class="ppem380">Why is there no PayPal shipping address details in the IPN info?</b><br />Set Enable PayPal Shipping Address to \'No\' if you require a PayPal verified shipping address or set to \'Yes\' if you do not.</li><br /><br class="h6" />
      <li><b class="ppem380">How can I customize the Checkout redirect page.</b><br />The splash template page shown while transfering the customer to PayPal is:<br /><code>catalog/includes/modules/payment/paypal/catalog/checkout_splash.inc.php</code></li><br /><br class="h6" />
      <li><b class="ppem380">Where can I find more PayPal logo buttons.</b><br />Login to your PayPal account and click Merchant Tools or Auction Tools.</li><br /><br class="h6" />
      <li><b class="ppem380">Where can I find PayPal documentation.</b><br /><ul style="margin-left: 15px; margin-top: 5px; padding-left: 5px;"><li><a href="https://www.paypal.com/en_US/pdf/integration_guide.pdf">PayPal Integration Manual</a></li></ul></li><br /><br class="h6" />

      <li><b class="ppem380">How do I use PayPal\'s Sandbox.</b>
        <ul style="margin-left: 15px; margin-top: 5px; padding-left: 5px;">
          <li>Register with <a href="https://developer.paypal.com/" target="PPDC">PayPal Developer Central</a></li><br class="h6" />
          <li>Then create <b>two virtual accounts</b> types:<ul style="margin-top: 5px; margin-left: 10px; padding-left: 10px;"><li>Personal Account</li><li>Premier or Business Account</li></ul></li><br class="h6" />
          <li>Confirm both accounts (each is just a single click option).</li><br class="h6" />
          <li>Transfer some virtual money into your personal account (Click the add funds link).</li><br class="h6" />
          <li>Emails to both accounts will appear in the section where you initially login into the PayPal Developer Central, no real emails are sent so the email addresses for your virtual accounts should be fictitious.</li><br class="h6" />
          <li>Now in your <a href="'. tep_href_link(FILENAME_MODULES,'set=payment&module=paypal&action=edit').'" target="_blank">osCommerce::Admin::Modules::Payment::PayPal</a> configuration section<ul style="margin-top: 5px; margin-left: 10px; padding-left: 10px;"><li>Enter the virtual business account email address into both the Primary Email Address and Business ID fields</li><li>Set the domain to www.sandbox.paypal.com</li></ul></li><br class="h6" />
          <li>Now checkout as a customer via the store, this account should have a real email address (so that you can receive the osC customer order confirmation email), and when you arrive at the PayPal Sandbox site (look for their logo) then login using the virtual personal account details and finalize the payment process.</li>
        </ul>
       <br /><p class="ppsmallerrorbold">Note that you must first login via the PayPal Developer Central prior to testing the Sandbox/Checkout process.</p>
      </li><br /><br class="h6" />

      <li><b class="ppem380">What\'s the difference between the IPN Test Panel and using PayPal\'s Sandbox.</b><br />The <a href="'. tep_href_link(FILENAME_PAYPAL,'action=itp').'" target="itp">IPN Test Panel</a> is an independent osCommerce Contribution feature, for testing and development purposes, which allows you to simmulate your own IPNs without having to interact with PayPal.<br /><br /><p class="ppsmallerrorbold">All Test IPNs via the IPN Test Panel will be invalid according to PayPal since they\'re not authentic transactions.</p></li><br /><br class="h6" />
      <li><b class="ppem380">Is the IPN Test Panel related to PayPal\'s Sandbox.</b><br />No, see above.</li><br /><br class="h6" />
      <li><b class="ppem380">What\'s the purpose of the digest key.</b><br />Currently the digest key serves two purposes, it authenticates and allows you to use the <a href="'. tep_href_link(FILENAME_PAYPAL,'action=itp').'" target="itp">IPN Test Panel</a>, secondly, untill such time that PayPal provides a secure method of associating an IPN specifically to a particular order, it serves as a unique transaction signature identifier.</li><br /><br class="h6" />
      <li><b class="ppem380">Should I change the digest key default value.</b><br />Yes, but remember what it is if uninstalling and reinstalling this contrib payment module in the admin since there might be existing pending orders which will require it in order to associate with to their corresponding IPN(s).</li><br /><br class="h6" />
      <li><b class="ppem380">How are IPNs deleted.</b><br />Currently, an IPN appearing the admin section is deleted automatically when deleting it\'s corresponding order.</li><br /><br class="h6" />
      <li><b class="ppem380">How can a customer resume their order.</b><br />Currently, if the customer abandons the checkout process at the PayPal site, e.g for some reason they did not actually pay at that time, then they can log into their osCommerce account and click the confirm order button when viewing the details of that particular order in their account_history_info.<br /><br />This feature is only available when <b>synchronizing invoices</b> with PayPal.<br /><br />This means that if you ever reset the osCommerce <code>orders</code> database table then you must also update it\'s auto-increment value to be greater than the last known <code>order_id</code>.</li><br /><br class="h6" />
      <li><b class="ppem380">I\'m getting errors after installing the contribution.</b><br />First, go through the installation edits and remove any blank spaces at the beginning of the line(s), some text editors will insert hidden characters which is a side effect of copying and pasting from HTML documentation.<br />Make sure that the alterations have been performed as well as running the paypal_ipn.sql script.</li><br /><br class="h6" />

      <li><b class="ppem380">What type of PayPal account do I need.</b><br />You will need either a Premier or Merchant Business Account. <a href="https://www.paypal.com/refer/pal=PS2X9Q773CKG4" target="_blank">Click&nbsp;here&nbsp;to&nbsp;register&nbsp;for&nbsp;an&nbsp;account</a> if you do not already have one.</li><br /><br class="h6" />
    </ul>');



define("PAYPAL_IPN_TEST_MODE1","Test Mode must be enabled!");
define("PAYPAL_IPN_TEST_MODE_ADVANCED","Advanced");
define("PAYPAL_IPN_TEST_MODE_HELP_WITH_THIS_PAGE","Help with this page");
define("PAYPAL_IPN_TEST_MODE_PRIMARY_PAYPAL_EMAIL_ADDRESS","Primary PayPal Email Address");
define("PAYPAL_IPN_TEST_MODE_BUSINESS_ID","Business ID");
define("PAYPAL_IPN_TEST_MODE_DEBUG_EMAIL_ADDRESS","Debug Email Address");

define("PAYPAL_IPN_TEST_MODE_FIRST_NAME","First Name");
define("PAYPAL_IPN_TEST_MODE_LAST_NAME","Last Name");
define("PAYPAL_IPN_TEST_MODE_BUSINESS_NAME","Business Name");
define("PAYPAL_IPN_TEST_MODE_EMAIL_ADDRESS","Email Address");
define("PAYPAL_IPN_TEST_MODE_PAYER_ID","Payer ID");
define("PAYPAL_IPN_TEST_MODE_PAYER_STATUS","Payer Status");
define("PAYPAL_IPN_TEST_MODE_VERIFIED","verified");
define("PAYPAL_IPN_TEST_MODE_UNVERIFIED","unverified");
define("PAYPAL_IPN_TEST_MODE_INVOICE","Invoice");

define("PAYPAL_IPN_TEST_MODE_ADDRESS_NAME","Address Name");
define("PAYPAL_IPN_TEST_MODE_ADDRESS_STREET","Address Street");
define("PAYPAL_IPN_TEST_MODE_ADDRESS_CITY","Address City");
define("PAYPAL_IPN_TEST_MODE_ADDRESS_STATE","Address State");
define("PAYPAL_IPN_TEST_MODE_ADDRESS_ZIP","Address Zip");
define("PAYPAL_IPN_TEST_MODE_ADDRESS_COUNTRY","Address Country");
define("PAYPAL_IPN_TEST_MODE_ADDRESS_STATUS","Address Status");
define("PAYPAL_IPN_TEST_MODE_CONFIRMED","confirmed");
define("PAYPAL_IPN_TEST_MODE_UNCONFIRMED","unconfirmed");

define("PAYPAL_IPN_TEST_MODE_PAYMENT_TYPE","Payment Type");
define("PAYPAL_IPN_TEST_MODE_INSTANT","instant");
define("PAYPAL_IPN_TEST_MODE_ECHECK","echeck");
define("PAYPAL_IPN_TEST_MODE_TRANSACTION_TYPE","Transaction Type");
define("PAYPAL_IPN_TEST_MODE_SELECT","--select--");
define("PAYPAL_IPN_TEST_MODE_CART","cart");
define("PAYPAL_IPN_TEST_MODE_WEB_ACCEPT","web_accept");
define("PAYPAL_IPN_TEST_MODE_SEND_MONEY","send_money");
define("PAYPAL_IPN_TEST_MODE_CUSTOM","Custom");
define("PAYPAL_IPN_TEST_MODE_TRANSACTION_ID","Transaction ID");
define("PAYPAL_IPN_TEST_MODE_PARENT_TRANSACTION_ID","Parent Transaction ID");
define("PAYPAL_IPN_TEST_MODE_NO_CART_ITEMS","No. Cart Items");
define("PAYPAL_IPN_TEST_MODE_NOTIFY_VERSION","Notify Version");
define("PAYPAL_IPN_TEST_MODE_NOTIFY_VERSION_VALUE","1.6");
define("PAYPAL_IPN_TEST_MODE_MEMO","Memo");

define("PAYPAL_IPN_TEST_MODE_MC_CURRENCY","MC Currency");
define("PAYPAL_IPN_TEST_MODE_USD","USD");
define("PAYPAL_IPN_TEST_MODE_GBP","GBP");
define("PAYPAL_IPN_TEST_MODE_EUR","EUR");
define("PAYPAL_IPN_TEST_MODE_CAD","CAD");
define("PAYPAL_IPN_TEST_MODE_JPY","JPY");
define("PAYPAL_IPN_TEST_MODE_MC_GROSS","MC Gross");
define("PAYPAL_IPN_TEST_MODE_MC_FEE","MC Fee");

define("PAYPAL_IPN_TEST_MODE_SETTLE_AMOUNT","Settle Amount");
define("PAYPAL_IPN_TEST_MODE_SETTLE_CURRENCY","Settle Currency");
define("PAYPAL_IPN_TEST_MODE_EXCHANGE_RATE","Exchange Rate");

define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS","Payment Status");
define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS_COMPLETED","Completed");
define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS_PENDING","Pending");
define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS_FAILED","Failed");
define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS_DENIED","Denied");
define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS_REFUNDED","Refunded");
define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS_REVERSED","Reversed");
define("PAYPAL_IPN_TEST_MODE_PAYMENT_STATUS_CANCELED_REVERSAL","Canceled_Reversal");

define("PAYPAL_IPN_TEST_MODE_PENDING_REASON","Pending Reason");
define("PAYPAL_IPN_TEST_MODE_MULTI_CURRENCY","multi_currency");
define("PAYPAL_IPN_TEST_MODE_INTL","intl");
define("PAYPAL_IPN_TEST_MODE_VERIFY","verify");
define("PAYPAL_IPN_TEST_MODE_ADDRESS","address");
define("PAYPAL_IPN_TEST_MODE_UPGRADE","upgrade");
define("PAYPAL_IPN_TEST_MODE_UNILATERAL","unilateral");
define("PAYPAL_IPN_TEST_MODE_OTHER","other");

define("PAYPAL_IPN_TEST_MODE_REASON_CODE","Reason Code");
define("PAYPAL_IPN_TEST_MODE_CHARGEBACK","chargeback");
define("PAYPAL_IPN_TEST_MODE_GUARANTEE","guarantee");
define("PAYPAL_IPN_TEST_MODE_BUYER_COMPLAINT","buyer_complaint");
define("PAYPAL_IPN_TEST_MODE_REFUND","refund");

define("PAYPAL_IPN_TEST_MODE_TAX","Tax");
define("PAYPAL_IPN_TEST_MODE_FOR_AUCTION","For Auction");
define("PAYPAL_IPN_TEST_MODE_NO","No");
define("PAYPAL_IPN_TEST_MODE_YES","Yes");
define("PAYPAL_IPN_TEST_MODE_AUCTION_BUYER_ID","Auction Buyer ID");
define("PAYPAL_IPN_TEST_MODE_AUCTION_CLOSING_DATE","Auction Closing Date");
define("PAYPAL_IPN_TEST_MODE_AUCTION_MULTI_ITEM","Auction Multi-Item");

define("PAYPAL_IPN_TEST_MODE_ITEM_NAME","Item Name");
define("PAYPAL_IPN_TEST_MODE_ITEM_NUMBER","Item Number");
define("PAYPAL_IPN_TEST_MODE_QUANTITY","Quantity");


define("PAYPAL_IPN_TEST_MODE_HELP1","The following is a quick guide towards simmulating your own IPNs:");


define("PAYPAL_IPN_TEST_MODE_HELP2",' <br><ol>
      <li>Begin to check out as a customer via the store, stop when you get to the PayPal site</li><br><br class="h6">
      <li>Go into the store admin orders section and find the last order (just created)</li><br><br class="h6">
      <li>Select a <b>Transaction Type</b>, usually cart or web_accept, but nothing for refunds, reversals, or canceled_reversals payments</li><br><br class="h6">
      <li>Copy and paste the <b>Transaction Signature</b> into the <b>Custom</b> field and into the <b>Transaction ID</b> field</li><br><br class="h6">
      <li>If the <b>Cart Test</b> is on, then make sure that the above <b>MC Gross</b> amount is the same as the order total and that the <b>MC&nbsp;Currency</b> field is set to the same currency as the order.</li><br><br class="h6">
      <li>Submit the Test IPN</li><br><br class="h6">
      <li>Now check the admin order status</li><br><br class="h6">
    </ol>');

define("PAYPAL_IPN_TEST_MODE_HELP3","When testing Pending payments etc, remember to use the same Transction ID");

##################### 03/07/2006 Start  ####################

define("NON_TTF_FONT_ERROR","Non-TTF font size must be 1,2,3,4 or 5");
define("SETLEGEND_ERROR","Error: SetLegend argument must be an array");

define("UNABLE_TO_OPEN_ERROR","Unable to open ");
define("UNABLE_TO_OPEN_GIF_ERROR"," as a GIF");
define("UNABLE_TO_OPEN_PNG_ERROR"," as a PNG");
define("UNABLE_TO_OPEN_JPG_ERROR"," as a JPG");
define("SELECT_IMAGE_ERROR","Please select wbmp,gif,jpg, or png for image type!");
define("SELECT_IMAGE_TYPE_ERROR","Please select an image type!");
define("NOT_ACCEPTABLE_PLOT_TYPE_ERROR"," not an acceptable plot type");
define("UNKNOWN_CHART_TYPE_ERROR","ERROR: unknown chart type");
define("LOG_PLOTS_DATA_GREATER_ERROR","Log plots need data greater than 0");
define("ERROR_IN_DATA","Error in Data - max not gt min");
define("FATAL_ERROR","Fatal error");
define("THINBARLINES_DATA_TYPE_ERROR","Data Type for ThinBarLines must be data-data");
define("BAR_PLOTS_DATA_TYPE_ERROR",'Bar plots must be text-data: use function SetDataType("text-data")');
define("NO_IMAGE_DEFINED_DRAWGRAPH_ERROR","No Image Defined: DrawGraph");
define("NO_ARRAY_OF_DATA_IN_ERROR","No array of data in ");



##################### 03/07/2006 End  ####################


##################### 04/07/2006 Start  ####################

define("SESSION_FILE_OPEN_ERROR_1",'Could not open session file (');
define("SESSION_FILE_OPEN_ERROR_2",').');
define("SESSION_FILE_WRITE_ERROR_1",'Could not write session file (');
define("SESSION_FILE_WRITE_ERROR_2",').');
define("CACHING_METHOD_ERROR_1",'Caching method ');
define("CACHING_METHOD_ERROR_2",' not implemented.');
define("INITIALIZE_SESSION_MODULE_ERROR",'Failed to initialize session module.');
define("SESSION_NOT_SAVED_ERROR",'Session could not be saved.');
define("SESSION_NOT_CLOSED_ERROR",'Session could not be closed.');
define("SESSION_NOT_STARTED_ERROR",'Session could not be started.');


define("CANNOT_COPY_PRODUCT_ERROR_1",'<b>WARNING: Cannot copy from Product ID #');
define("CANNOT_COPY_PRODUCT_ERROR_2",' to Product ID # ');
define("CANNOT_COPY_PRODUCT_ERROR_3",' ... No copy was made</b>');
define("NO_ATTRIBUTES_COPY_ERROR_1",'<b>WARNING: No Attributes to copy from Product ID #');
define("NO_ATTRIBUTES_COPY_ERROR_2",' for: ');
define("NO_ATTRIBUTES_COPY_ERROR_3",' ... No copy was made</b>');
define("NO_PRODUCT_ERROR_1",'<b>WARNING: There is no Product ID #');
define("NO_PRODUCT_ERROR_2",' ... No copy was made</b>');


define("MCRYPT_ALGORITHMS_AND_MODES",'Mcrypt Algorithms and Modes');
define("MCRYPT_ALGORITHM",'Algorithm');
define("MCRYPT_Status",'Status');
define("MCRYPT_OK",'OK');
define("MCRYPT_NOT_OK",'NOT OK');
define("MCRYPT_NOT_TESTED",'NOT TESTED');
define("MCRYPT_MAXIMUM_KEY_SIZES_ALLOWED",'Maximum Key Sizes Allowed');
define("MCRYPT_MAXIMUM_KEY_SIZE",'Maximum Key Size');
define("MCRYPT_KEY_TEXT",'this is a very long key, even too long for the cipher');
define("MCRYPT_PLAIN_TEXT",'very important data');

define("DATABASE_TEP_DB_ERROR",'[TEP STOP]');

define("CANNOT_CHANGE_THE_MODE_OF_FILE","Cannot change the mode of file");
define("FAILED_TO_OPEN_FILE",'Failed to open file ');
define("CANNOT_WRITE_TO_FILE",'Cannot write to file ');

define("UNABLE_TO_DETERMINE_PAGE_LINK",'<b>Error!</b></font><br><br><b>Unable to determine the page link!<br><br>Function used:<br><br>');
define("UNABLE_TO_DETERMINE_CONNECTION_METHOD_ON_PAGE_LINK",'<b>Error!</b></font><br><br><b>Unable to determine connection method on a link!<br><br>Known methods: NONSSL SSL<br><br>Function used:<br><br>');


define("SUPPORT_DESK",'Support Desk');

define("FRAUDSCREENCLIENT_AFS",'AFS');
define("FRAUDSCREENCLIENT_QUERY_RESULT",'query result');
define("FRAUDSCREENCLIENT_SERVER_UNAVAILABLE","Algozone Fraud Screen Server currently unavailable. Please try again later.");
define("FRAUDSCREENCLIENT_AFS_INPUTS","AFS Inputs");
define("FRAUDSCREENCLIENT_INPUT","input");
define("FRAUDSCREENCLIENT_INVALID_INPUT","invalid input");
define("FRAUDSCREENCLIENT_MISSPELLED_FIELD","- perhaps misspelled field?");
define("FRAUDSCREENCLIENT_AFS_USING_CURL","AFS using curl");
define("FRAUDSCREENCLIENT_AFS_CURL_PARAMS","AFS curl params");
define("FRAUDSCREENCLIENT_AFS_CURL_NOT_SUPPORT","<br>error: this version of curl does not support HTTPS try build curl with SSL or specify");
define("FRAUDSCREENCLIENT_AFS_RECEIVED_ERROR_MESSAGE_1","Received error message");
define("FRAUDSCREENCLIENT_AFS_RECEIVED_ERROR_MESSAGE_2","from curl");
define("FRAUDSCREENCLIENT_AFS_CURL_PROXY","<p>using curl thru proxy");
define("FRAUDSCREENCLIENT_AFS_USING_FSOCKOPEN","<p><b>AFS using fsockopen</b>");
define("FRAUDSCREENCLIENT_AFS_SOCKET_PARAM","AFS socket url param");
define("FRAUDSCREENCLIENT_AFS_FSOCKOPEN_PROXY","<p><b>AFS using fsockopen proxy<b><br>");
define("FRAUDSCREENCLIENT_AFS_PROXY_PORT","<br>error: you need to provide the proxy port number to use the proxy port provided");
define("FRAUDSCREENCLIENT_AFS_INSTALL_CURL","<br>error: you need to install curl if you want secure HTTPS or specify the variable to be");
define("FRAUDSCREENCLIENT_AFS_QUERY_RESULTS","<p><b>AFS query results: </b>");
define("FRAUDSCREENCLIENT_AFS_OUTPUT","output");

define("MAP_MSG","<p>Courtesy of the U.S. Census Bureau's TIGER Mapping Service");

define("ATTRIBUTES_DISPLAY_MSG","**Discounts may vary based on selected options");

define("FOOTER_TEXT_1",'E-Commerce Engine Copyright &copy; 2003 <a href="http://www.oscommerce.com" target="_blank">osCommerce</a> Portions Copyright &copy; 2003 - 2006 <a href="http://www.creloaded.com" target="_blank">CRE Loaded Project</a><br>osCommerce provides no warranty and is redistributable under the <a href="http://www.fsf.org/licenses/gpl.txt" target="_blank">GNU General Public License</a><br><a href="http://www.chainreactionworks.com" target="_blank">Chain Reaction Works, Inc</a> provides no warranty except as to associated support contracts<br>which are limited by and to the Service Level Agreement.</br>');
define("FOOTER_TEXT_2",'Powered by <a href="http://www.oscommerce.com" target="_blank">Oscommerce</a><font color="red"> Supercharged by</font> <a href="http://www.creloaded.com" target="_blank">CRE Loaded</a>');


##################### 04/07/2006 End  ####################


##################### 05/07/2006 End  ####################

define("AUTHORIZE_NET_HELP_TITLE","Authorize.net Consolidated CRE Help Screen");
define("AUTHORIZE_NET_HELP_MSG_1","Authorize.net Consolidated CRE Edition");
define("AUTHORIZE_NET_HELP_MSG_2","Configuration Help Screen");
define("AUTHORIZE_NET_HELP_MSG_3",'<a href="http://ecommexchange.com"><h2>Link to Apply for Authorize.net account</h2></a><br>(support the CRE project by using our Authorize.net partner)');
define("AUTHORIZE_NET_HELP_MSG_4",'User your browser back button to return to the Authorize.net edit screen

<li>Credit Cart Test Info</li>
<p>This is an internal cart test number only.
 For Authorize.net testing you should use :
<li>Visa : 4007000000027</li>
<li>MasterCard : 5424000000000015</li>
 <LI>Discover :  6011000000000012</li>
 <li>American Express : 370000000000002</li>
 <br>
 Any expiration date after the current date should work.
 Any CVV code should work.
</p>
<li>Enable Authorize.net Module</li>
<p>True or False. True is on - False is off</p>
<li>Login Username</li>
<p>Your Authorize.net User ID goes here.</p>
<li>Login Transaction Key</li>
<p>Authorize.net Consolidated uses the AIM method of
connecting to Authorize.net.  You must use set the
 Password Required mode to ON on your gateway.
  Generate a Transaction Key and enter it here.
   Do not use your Authorize.net gateway
    password here. It will not work.
 </p>
<li>cURL Setup</li>
<p>Generally, enter Compiled if your Host has
cURL support compiled into the server.  Enter Not
 Compiled otherwise.  If you don\'t know - ask your
  Technical Support department.</p>
<li>cURL Path</li>
<p>The correct path to the cURL command on your server if it
is not compiled.  Some other server
  settings may prevent cURL from working even if it
   is compiled. In this case, you may be able to make
    this module work by setting the cURL path to various default
     locations where cURL might usually be found on a UNIX server
    (/usr/bin/curl, /usr/local/bin/curl, /bin/curl etc.</p>
<li>Transaction Mode</li>
<p>There are three alternatives.  Test, Test and Debug, and
Production. Test mode runs tests with no recording of
module function. Test and Debug mode runs tests and
prints certain variables contents in a file.  This filename is
currently hardcoded - look in catalog/temp for a file named authdebug.txt
You may have to change this filename depending on your servers security
settings.  You may also have to create a blank file with that name and chmod it to 777.
</p>
<li>Transaction Method</li>
<p>Select Credit Card.  Echeck support is not yet implemented.</p>
<li>Processing Mode</li>
<p>Authorize only approves the transaction, but does not transfer funds.  Authorize and Capture does both.</p>
<li>Sort Order of Display</li>
<p>This is the order in which the payment module is displayed on the
payment method selection screen by the checkout process module.
It should be three digits and be a higher number than that of the
paypal module if you are using this module with Paypal IPN.</p>
<li>Customer Notifications</li>
<p>True if you want authorize.net to send customer notifications, false if not.</p>
<li>Accepted Credit Cards</li>
<p>Select only  cards your merchant account allows you to accept.</p>
<li>Authorize.net Payment Zone</li>
<p>You may create a zone in which you wish to accept cards by this method. If you enter a zone here, only
those geographical areas within that zone will see this
module on checkout.</p>
<li>Authorize.net Set Order Status</li>
<p>This is the order status to which this module will set an order if it is successfully completed. Processing is suggested.</p>
<li>Enable CCV Code</li>
<p>Enable or disable CCV code.  Some merchant banks DO NOT USE CCV security checks.  If your gateway
is generating a lot of denials you should check to make sure this is set in accordance with
your merchant banks policies.</p>
<li>Trouble Shooting Notes </li>
<p>If you experience high levels of transaction failure, you may need to adjust your sessions configuration.  Consult your technical support team for more information</p> ');

##################### 05/07/2006 End  ####################
##################### 06/07/2006 Start  ####################

define("FEATURE_NOT_PRESENT_TEXT",'<p class="style4">CRE Loaded Standard Version is the perfect application
        to power your e-Commerce websites. However, if you need features that
        only a Pro-level application can deliver, please take a look at all the
        powerful options our Pro Version adds. If you are looking to deploy a
        powerful Business to Business solution, our Pro B2B has added features
        to enhance sales and productivity.</p>

        <p class="style4">Feel free to contact us for more details or usage guidlines. </p>');

define("HEADER_TAGS_ENGLISH_TXT_1","Default Title");
define("HEADER_TAGS_ENGLISH_TXT_2","Default Descriptions");
define("HEADER_TAGS_ENGLISH_TXT_3","Default Keyword(s)");
define("HEADER_TAGS_ENGLISH_TXT_4","HTTA: ");
define("HEADER_TAGS_ENGLISH_TXT_5","HTDA: ");
define("HEADER_TAGS_ENGLISH_TXT_6","HTKA: ");
define("HEADER_TAGS_ENGLISH_TXT_7","HTCA: ");
define("HEADER_TAGS_ENGLISH_TXT_8","(Explain) ");
define('HEADER_TAGS_ENGLISH_TXT_9', 'Title');
define('HEADER_TAGS_ENGLISH_TXT_10', 'Descriptions');
define('HEADER_TAGS_ENGLISH_TXT_11', 'Keyword(s)');


define('HEADER_TAGS_FILL_TAGS_TXT_1', 'CATEGORIES');
define('HEADER_TAGS_FILL_TAGS_TXT_2', 'PRODUCTS');
define('HEADER_TAGS_FILL_TAGS_TXT_3', 'Skip all tags');
define('HEADER_TAGS_FILL_TAGS_TXT_4', 'Fill only empty tags');
define('HEADER_TAGS_FILL_TAGS_TXT_5', 'Fill all tags');
define('HEADER_TAGS_FILL_TAGS_TXT_6', 'Clear all tags');

define("INSTALL_EXPLAIN_TXT_1","Install (and Uninstall) Database Settings script for osC-Explain - by Chemo");
define("INSTALL_EXPLAIN_TXT_2",'<p><b>Install option selected...running queries</b></p>');
define("INSTALL_EXPLAIN_TXT_3",'<p>STEP 1 => Add configuration group</p>');
define("INSTALL_EXPLAIN_TXT_4",'<p>Added the configuration group ');
define("INSTALL_EXPLAIN_TXT_5",'successfully...adding configuration values</p>');
define("INSTALL_EXPLAIN_TXT_6",'<p>STEP 2 => Add configuration settings</p>');
define("INSTALL_EXPLAIN_TXT_7","<blockquote>Success...</blockquote>");
define("INSTALL_EXPLAIN_TXT_8","<p>Added the configuration settings successfully...adding the 'explain_queries' table</p>");
define("INSTALL_EXPLAIN_TXT_9",'<p>STEP 3 => Creating explain_queries table</p>');
define("INSTALL_EXPLAIN_TXT_10",'<blockquote>Successfully created the table.</blockquote>');
define("INSTALL_EXPLAIN_TXT_11","<p><b>All done!  You should delete this script from the server...or not...you're choice.</b></p>");

define("INSTALL_EXPLAIN_TXT_12","<p><b>Uninstall optin selected...running queries</b></p><p>STEP 1 => Delete the configuration group from configuration_group table</p>");

define("INSTALL_EXPLAIN_TXT_13",'<blockquote>Deleted the configuration group successfully...removing configuration values</blockquote><p>STEP 2 => Delete configuraton values</p>');

define("INSTALL_EXPLAIN_TXT_14",'<blockquote>Deleted the configuration values successfully...dropping the explain_queries table</blockquote><p>STEP 3 => Dropping explain_queries table</p>');


define("INSTALL_EXPLAIN_TXT_15",'<blockquote>Table dropped successfully...analyzing tables</blockquote><p>STEP 4 => Analyzing configuration_group and configuration table</p>');

define("INSTALL_EXPLAIN_TXT_16","<blockquote>Analyze configuration_group success...</blockquote>");

define("INSTALL_EXPLAIN_TXT_17","<blockquote>Analyze configuration success...</blockquote>");

define("INSTALL_EXPLAIN_TXT_18","<blockquote>Optimize configuration_group success...</blockquote>");

define("INSTALL_EXPLAIN_TXT_19","<blockquote>Optimize configuration success...</blockquote><p><b>All done!  You should delete this script from the server...or not...you're choice.</b></p>");

define("INSTALL_EXPLAIN_TXT_20",'<p>Welcome to the barebones osC-Explain installation script (<a href="http://forums.oscommerce.com/index.php?showuser=9196">by   Chemo</a>)!</p><p>This contribution is GPL and the target audience is fellow coders, optimizers,   and knowledgeable webmasters. I encourage each of you to look over the   code and add functionality so that the rest of us can benefit as well.</p><p>There are two options for this script:</p><p><strong>INSTALL</strong></p><blockquote>  <p>This option is self explanatory :) It will add a configuration group     with the title &quot;Explain Queries&quot; and set the sort order to 99 (making     it the last listed). The script will then add values to the configuration     table that is the options for this contribution. Currently, these are     available:</p>  <ul>    <li> Global on / off</li>    <li>Enable on for specific scripts (add one or list separated by comma).       This will be handy for contribution coders since they can enable only for       their development scripts and not waste room for storing other page queries.       In addition, it will speed up the admin report if there are 1,000 rows instead       of 500,000 :)</li>    <li>Enable page exclusion for specific scripts. This is handy to exclude       certain scripts (for instance, ones already optimized) but capture the rest.</li>  </ul>  <p>The last thing this install script does is add a new table called \'explain_queries\'.    This is needed to store the data. Do not change the name since the table     name is hardcoded all over the place. Why not add a new define to filenames.php?     If there is room to trim install steps and decrease the number of file changes     I\'ll take it any day of the week and twice on Sunday. You are (hopefully)     an experienced osC developer so if you want to do define table names the standard     way edit your own files.</p></blockquote><p align="center"><strong><a href="'.$_SERVER['PHP_SELF'].'?action=install">INSTALL</strong> THE DATABASE VALUES FOR OSC-EXPLAIN</a></p><p align="left"><strong>UNINSTALL</strong></p><blockquote>  <p align="left">Hopefully, this option is self-explanatory too :) This     will delete all the values associated with osC-Explain from the configuration_group     and configuration tables. Then it will analyze the tables to reset the     cardinality of the tables. Next, the script will drop the \'explain_queries\'     table.</p></blockquote><p align="center"><strong><a href="'.$_SERVER['PHP_SELF'].'?action=delete">UNINSTALL</strong> THE DATABASE VALUES FOR OSC-EXPLAIN</a></p><p align="left"><strong>NOTES</strong>: By default all values are set to false.   So, once you have the files uploaded and necessary changes have been made you\'ll   have to enable it through the admin control panel. </p><blockquote>  <p align="left">Configuration -> Explain Queries -> Enable explain queries     -> true</p></blockquote>');

define("VALID_CATEGORIES_PRODUCTS_LIST","Valid Categories/Products List");
define("VALID_CATEGORIES_LIST","Valid Categories List");
define("VALID_PRODUCTS_LIST","Valid Products List");


define("CRE_LOADED_OSCOMMERCE","CRE Loaded osCommerce");
define("PASS_FORGOTTEN_FOOTER",'E-Commerce Engine Copyright &copy; 2003 <a href="http://oscommerce.com" target="_blank">osCommerce</a> <br>      Supercharged by <a href="http://creloaded.com" target="_blank">CRE Loaded</a>');

##################### 06/07/2006 End  ####################


##################### 07/07/2006 End  ####################

define("QUICK_ATTRIBUTES_POPUP_TXT_0",'Current Attributes');
define("QUICK_ATTRIBUTES_POPUP_TXT_1","Current ID#");
define("QUICK_ATTRIBUTES_POPUP_TXT_2","Model:");
define("QUICK_ATTRIBUTES_POPUP_TXT_3","NO CURRENT ATTRIBUTES ...");
define("QUICK_ATTRIBUTES_POPUP_TXT_4",'CURRENT ATTRIBUTES:');
define("QUICK_ATTRIBUTES_POPUP_TXT_5",'Close Window');

define("QUICK_PRODUCTS_POPUP_TXT_0",'Quick Products Listing');
define("QUICK_PRODUCTS_POPUP_TXT_1",'Quick Product Locator');
define("QUICK_PRODUCTS_POPUP_TXT_2",'All categories:');
define("QUICK_PRODUCTS_POPUP_TXT_3",'Click to:');
define("QUICK_PRODUCTS_POPUP_TXT_4",'Show Attributes');


define("QUICKCOM_HELP_TXT_1",'Quickcommerce Consolidated CRE Help Screen');
define("QUICKCOM_HELP_TXT_2",'Quickcommerce Consolidated CRE Edition');
define("QUICKCOM_HELP_TXT_3",'Configuration Help Screen');
define("QUICKCOM_HELP_TXT_4",'<a href=" https://freecreditcardprocessing.com/applynow/online_application.asp?code=chainreaction"> <h2>Link to Apply for Quickcommerce account</h2></a><br>(support the CRE project by using our authorize.net partner)');
define("QUICKCOM_HELP_TXT_5",'User your browser back button to return to the Quickcommerce edit screen

<li>Credit Cart Test Info</li>
<p>This is an internal cart test number only.
 For Quickcommerce testing you should use :
<li>Visa : 4007000000027</li>
<li>MasterCard : 5424000000000015</li>
 <LI>Discover :  6011000000000012</li>
 <li>American Express : 370000000000002</li>
 <br>
 Any expiration date after the current date should work.
 Any CVV code should work.
</p>
<li>Enable Quickcommerce Module</li>
<p>True or False. True is on - False is off</p>
<li>Login Username</li>
<p>Your Quickcommerce User ID goes here.</p>
<li>Login Transaction Key</li>
<p>Quickcommerce Consolidated uses the AIM method of
connecting to Quickcommerce.  You must use set the
 Password Required mode to ON on your gateway.
  Generate a Transaction Key and enter it here.
   Do not use your Quickcommerce gateway
    password here. It will not work.
 </p>
<li>cURL Setup</li>
<p>Generally, enter Compiled if your Host has
cURL support compiled into the server.  Enter Not
 Compiled otherwise.  If you don\'t know - ask your
  Technical Support department.</p>
<li>cURL Path</li>
<p>The correct path to the cURL command on your server if it
is not compiled.  Some other server
  settings may prevent cURL from working even if it
   is compiled. In this case, you may be able to make
    this module work by setting the cURL path to various default
     locations where cURL might usually be found on a UNIX server
    (/usr/bin/curl, /usr/local/bin/curl, /bin/curl etc.</p>
<li>Transaction Mode</li>
<p>There are three alternatives.  Test, Test and Debug, and
Production. Test mode runs tests with no recording of
module function. Test and Debug mode runs tests and
prints certain variables contents in a file.  This filename is
currently hardcoded - look in catalog/temp for a file named authdebug.txt
You may have to change this filename depending on your servers security
settings.  You may also have to create a blank file with that name and chmod it to 777.
</p>
<li>Transaction Method</li>
<p>Select Credit Card.  Echeck support is not yet implemented.</p>
<li>Processing Mode</li>
<p>Authorize only approves the transaction, but does not transfer funds.  Authorize and Capture does both.</p>
<li>Sort Order of Display</li>
<p>This is the order in which the payment module is displayed on the
payment method selection screen by the checkout process module.
It should be three digits and be a higher number than that of the
paypal module if you are using this module with Paypal IPN.</p>
<li>Customer Notifications</li>
<p>True if you want authorize.net to send customer notifications, false if not.</p>
<li>Accepted Credit Cards</li>
<p>Select only  cards your merchant account allows you to accept.</p>
<li>Quickcommerce Payment Zone</li>
<p>You may create a zone in which you wish to accept cards by this method. If you enter a zone here, only
those geographical areas within that zone will see this
module on checkout.</p>
<li>Quickcommerce Set Order Status</li>
<p>This is the order status to which this module will set an order if it is successfully completed. Processing is suggested.</p>
<li>Enable CCV Code</li>
<p>Enable or disable CCV code.  Some merchant banks DO NOT USE CCV security checks.  If your gateway
is generating a lot of denials you should check to make sure this is set in accordance with
your merchant banks policies.</p>');


define("STATS_EXPLAIN_QUERIES_TXT_1","Explain Queries v1.0 - by Chemo");
define("STATS_EXPLAIN_QUERIES_TXT_2",'Explain Queries Report v1.0 <a href="http://forums.oscommerce.com/index.php?showuser=9196">- by Chemo</a>');

define("STATS_EXPLAIN_QUERIES_TXT_3",'Export Format');
define("STATS_EXPLAIN_QUERIES_TXT_4",'CVS');
define("STATS_EXPLAIN_QUERIES_TXT_5",'HTML');
define("STATS_EXPLAIN_QUERIES_TXT_6",'Limit to');
define("STATS_EXPLAIN_QUERIES_TXT_7",'rows starting with row#');
define("STATS_EXPLAIN_QUERIES_TXT_8",'Back to Explain Queries');
define("STATS_EXPLAIN_QUERIES_TXT_9",'results returned for:');
define("STATS_EXPLAIN_QUERIES_TXT_10",'Query#');
define("STATS_EXPLAIN_QUERIES_TXT_11",'Time (ms): ');
define("STATS_EXPLAIN_QUERIES_TXT_12",'# Records:');
define("STATS_EXPLAIN_QUERIES_TXT_13",'Script: ');
define("STATS_EXPLAIN_QUERIES_TXT_14",'Request String:');
define("STATS_EXPLAIN_QUERIES_TXT_15",'Table: ');
define("STATS_EXPLAIN_QUERIES_TXT_16",'Type: ');
define("STATS_EXPLAIN_QUERIES_TXT_17",'Possible / Used Key: ');
define("STATS_EXPLAIN_QUERIES_TXT_18",'Key Len:');
define("STATS_EXPLAIN_QUERIES_TXT_19",'Rows: ');
define("STATS_EXPLAIN_QUERIES_TXT_20",'Ref: ');
define("STATS_EXPLAIN_QUERIES_TXT_21",'Extra: ');
define("STATS_EXPLAIN_QUERIES_TXT_22",'Comment: ');

define("TEMPLATE_CONFIGURATION1_TXT_1","Link Button Name 1");
define("TEMPLATE_CONFIGURATION1_TXT_2","Link Button Name 2");
define("TEMPLATE_CONFIGURATION1_TXT_3","Link Button Name 3");
define("TEMPLATE_CONFIGURATION1_TXT_4","Link Button Name 4");
define("TEMPLATE_CONFIGURATION1_TXT_5","Link Button Name 5");
define("TEMPLATE_CONFIGURATION1_TXT_6","Link Button Name 6");

define("TEMPLATE_CONFIGURATION1_TXT_7","<br> There are ");
define("TEMPLATE_CONFIGURATION1_TXT_8"," active infoboxes in your Right Column<br>");
define("TEMPLATE_CONFIGURATION1_TXT_9","WARNING: You have the RIGHT Column Active BUT <br>No boxes selected in your RIGHT column");
define("TEMPLATE_CONFIGURATION1_TXT_10","Left column cellpadding");
define("TEMPLATE_CONFIGURATION1_TXT_11","Show Page descriptions");
define("TEMPLATE_CONFIGURATION1_TXT_12","Right Column cell padding");
define("TEMPLATE_CONFIGURATION1_TXT_13","Include Main Table Border");
define("TEMPLATE_CONFIGURATION1_TXT_14","Show Customer Greeting?");
define("TEMPLATE_CONFIGURATION1_TXT_15","<br>edit text for Customer Logged On<br>");
define("TEMPLATE_CONFIGURATION1_TXT_16",'<br>edit text for Customer Re-Logged On<br>');
define("TEMPLATE_CONFIGURATION1_TXT_17",'<br>edit text for Guest greeting<br>');
define("TEMPLATE_CONFIGURATION1_TXT_18",'Include Which Modules On Catalog index Page?');


define("TREEVIEW_TXT_1","Catalog Tree");
define("TREEVIEW_TXT_2","open all");
define("TREEVIEW_TXT_3","close all");

##################### 07/07/2006 End  ####################




define("ADMIN_JS_FILE_BROWSER","File Browser");
define("ADMIN_JS_INSERT_FILE","Insert File");

define("ADMIN_JS_IBROWSER_MSG_1",'<strong>net<span class="hilight">4</span>visions.com</strong> - the image browser plugin for WYSIWYG editors like FCKeditor, SPAW, tinyMCE, Xinha, and HTMLarea!</p>
              <p> <strong> <span class="hilight">i</span>Browser</strong> does upload images and supply file management functions. Images can be resized on the fly. If you need even more advanced features, have a look at <strong> <span class="hilight">i</span>Manager</strong>, another <strong>net<span class="hilight">4</span>visions.com</strong> plugin - it adds truecolor image editing functions like: resize, flip, crop, add text, gamma correct, merge into other image, and many others.</p>
              <p><strong> <span class="hilight">i</span>Browser</strong> is written and distributed under the GNU General Public License which means that its source code is freely-distributed and available to the general public.</p>
              <p>&nbsp;</p>');

define("ADMIN_JS_IBROWSER_MSG_2",'Lorem ipsum, Dolor sit amet, consectetuer adipiscing loreum ipsum edipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Loreum ipsum edipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exercitation ullamcorper suscipit. Lorem ipsum, Dolor sit amet, consectetuer adipiscing loreum ipsum edipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.');

define("ADMIN_JS_PREVIEW_PAGE","Preview page");
define("ADMIN_JS_EDITOR_CONTENTS","Editor contents:");
define("ADMIN_JS_CLOSE","Close");
define("ADMIN_JS_PRINT","Print");

##################### 08/07/2006 End  ####################


define("DOCUMENT_INDEX","Document Index");

define("CUSTOMER_ZIP_CODE_VALIDATOR","Customer Zip Code Validator");
define("SEND_EMAIL_TO_ALL","Send Email to All");
define("MISMATCHED_STATE_AND_ZIPCODE","Mismatched State and Zipcode");
define("ADDRESS_BOOK_ID","Address Book ID");
define("CUSTOMER_ID","Customer ID");
define("CUSTOMER","Customer");
define("REMOVE","Remove");
?>