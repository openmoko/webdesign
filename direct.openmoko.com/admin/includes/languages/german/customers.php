<?php
/*
  $Id: customers.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Kunden');
define('HEADING_TITLE_SEARCH', 'Suche:');

define('TABLE_HEADING_FIRSTNAME', 'Vorname');
define('TABLE_HEADING_LASTNAME', 'Nachname');
define('TABLE_HEADING_ACCOUNT_CREATED', 'Konto erstellt am');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_DATE_ACCOUNT_CREATED', 'Konto erstellt am:');
define('TEXT_DATE_ACCOUNT_LAST_MODIFIED', 'letzte &Auml;nderung:');
define('TEXT_INFO_DATE_LAST_LOGON', 'letzte Anmeldung:');
define('TEXT_INFO_NUMBER_OF_LOGONS', 'Anzahl der Anmeldungen:');
define('TEXT_INFO_COUNTRY', 'Land:');
define('TEXT_INFO_NUMBER_OF_REVIEWS', 'Anzahl der Produktbewertungen:');
define('TEXT_DELETE_INTRO', 'Wollen Sie diesen Kunden wirklich l&ouml;schen?');
define('TEXT_DELETE_REVIEWS', '%s Bewertung(en) l&ouml;schen');
define('TEXT_INFO_HEADING_DELETE_CUSTOMER', 'Kunden l&ouml;schen');
define('TYPE_BELOW', 'Bitte unten eingeben');
define('PLEASE_SELECT', 'Ausw&auml;hlen');

// Eversun mod for sppc and qty price breaks
define('TABLE_HEADING_CUSTOMERS_GROUPS', 'Kunden&#160;Gruppen');
define('TABLE_HEADING_REQUEST_AUTHENTICATION', 'RA');
define('ENTRY_CUSTOMERS_PAYMENT_SET', 'Zahlart f&uuml; diesen Kunden definieren');
define('ENTRY_CUSTOMERS_PAYMENT_DEFAULT', 'Die Einstellungen der Gruppe verwenden');
define('ENTRY_CUSTOMERS_PAYMENT_SET_EXPLAIN', 'If you choose <b><i>Set payment modules for the customer</i></b> but do not check any of the boxes, default settings (Group settings or Configuration) will still be used.'); //DE
define('ENTRY_CUSTOMERS_SHIPPING_SET', 'Versandart f&uuml;r diesen Kunden definieren');
define('ENTRY_CUSTOMERS_SHIPPING_DEFAULT', 'Die Einstellungen der Gruppe verwenden');
define('ENTRY_CUSTOMERS_SHIPPING_SET_EXPLAIN', 'If you choose <b><i>Set shipping modules for the customer</i></b> but do not check any of the boxes, default settings (Group settings or Configuration) will still be used.'); //DE
define('ENTRY_CUSTOMERS_EMAIL_VALIDATED', 'Email Validierung');
define('ENTRY_EMAILVALIDATE_YES', 'Ja');
define('ENTRY_EMAILVALIDATE_NO', 'Nein');
define('TEXT_EMAIL_VALIDATE_FEATURE','Require E-mail confirmation on account creation is set off.');

define('ALT_IC_UP',' --> A-B-C From Top ');
define('ALT_IC_DOWN',' --> Z-X-Y From Top ');
define('ALT_IC_UP_NUM',' --> 1-2-3 From Top ');
define('ALT_IC_DOWN_NUM',' --> 3-2-1 From Top ');
define('TABLE_HEADING_CUSTOMERS_NO','No.');
// Eversun mod end for sppc and qty price breaks
?>