<?php
/*
  $Id: coupon_admin.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('TOP_BAR_TITLE', 'Statistik');
define('HEADING_TITLE', 'Rabatt Kupon');
define('HEADING_TITLE_STATUS', 'Status : ');
define('TEXT_CUSTOMER', 'Kunde:');
define('TEXT_COUPON', 'Kupon Name');
define('TEXT_COUPON_ALL', 'Alle Kupons');
define('TEXT_COUPON_ACTIVE', 'Aktive Kupons');
define('TEXT_COUPON_INACTIVE', 'Inaktive Kupons');
define('TEXT_SUBJECT', 'Betreff:');
define('TEXT_FROM', 'Von:');
define('TEXT_FREE_SHIPPING', 'Versandkostenfrei');
define('TEXT_MESSAGE', 'Nachricht:');
define('TEXT_SELECT_CUSTOMER', 'Kunde w&auml;hlen');
define('TEXT_ALL_CUSTOMERS', 'Alle Kunden');
define('TEXT_NEWSLETTER_CUSTOMERS', 'An alle Newsletter-Abonnenten');
define('TEXT_CONFIRM_DELETE', 'Sind Sie sicher, dass Sie diesen Kupon l&ouml;schen wollen?');

define('TEXT_TO_REDEEM', 'Sie k&ouml;nnen diesen Kupon bei der Kasse einl&ouml;sen. Geben Sie nur den Code aus der Box ein, und klicken Sie den Einl&ouml;sen Button.');
define('TEXT_IN_CASE', ' wenn Probleme auftauchen. ');
define('TEXT_VOUCHER_IS', 'Der Kupon Code ist ');
define('TEXT_REMEMBER', 'Verlieren Sie den Code nicht. Bewahren Sie ihn an einem sicheren Ort auf, damit Sie von diesem speziellen Angebot profitieren k&ouml;nnen.');
define('TEXT_VISIT', 'wenn Sie besuchen  <a style="color: #000000" href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . STORE_NAME . '</a>' ."\n" .'(' . HTTP_SERVER . DIR_WS_CATALOG . ')');
define('TEXT_ENTER_CODE', ' und geben Sie den Code ein ');
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">The Back Button has been DISABLED while HTML WYSIWG Editor is turned ON.</b></font> WHY? - Because if you click the back button to edit your HTML email, the PHP (php.ini - "Magic Quotes = On") will automatically add "\\\\\\\" backslashes everywhere Double Quotes " appear (HTML uses them in Links, Images and More) and this distorts the HTML, the pictures will dissapear once you submit the email again. If you turn OFF WYSIWYG Editor in Admin, the HTML Ability of osCommerce is also turned OFF and the back button will re-appear. A fix for this HTML and PHP issue would be nice if someone knows a solution.<br><br><b>If you really need to Preview your emails before sending them, use the Preview Button located on the WYSIWYG Editor.<br><HR>');
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">HTML is currently Disabled!</b></font><br><br>If you want to send HTML email, Enable WYSIWYG Editor for Email in: Admin-->Configuration-->WYSIWYG Editor-->Options<br>');

define('TEXT_OR_VISIT', 'or visit ');
define('TEXT_TO_REDEEM', ' To redeem this Discount coupon, please click on the link below. Please also write down the redemption code');
define('TEXT_WHICH_IS', ' which is ');
define('TEXT_IN_CASE', ' in case you have any problems.');


define('TEXT_COUPON_REDEEMED', 'Redeemed Coupons');
define('REDEEM_DATE_LAST', 'Date Last Redeemed');
define('COUPON_STATUS', 'Status');
define('COUPON_STATUS_HELP', 'Set to ' . IMAGE_ICON_STATUS_RED . ' to disable customers\' ability to use the coupon.');
define('COUPON_BUTTON_EMAIL_VOUCHER', 'Email Voucher');
define('COUPON_BUTTON_EDIT_VOUCHER', 'Edit Voucher');
define('COUPON_BUTTON_DELETE_VOUCHER', 'Delete Voucher');
define('COUPON_BUTTON_VOUCHER_REPORT', 'Voucher Report');

define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_HEADING_COUPON_REPORT', 'Coupon Report');

define('CUSTOMER_ID', 'Kundennummer');
define('CUSTOMER_NAME', 'Name des Kunden');
define('REDEEM_DATE', 'eingel&ouml;st am');
define('IP_ADDRESS', 'IP Adresse');

define('TEXT_REDEMPTIONS', 'Einl&ouml;sung');
define('TEXT_REDEMPTIONS_TOTAL', 'In Summe');
define('TEXT_REDEMPTIONS_CUSTOMER', 'F&uuml;r diesen Kunden');
define('TEXT_NO_FREE_SHIPPING', 'Keine versandkostenfreie Lieferung');

define('NOTICE_EMAIL_SENT_TO', 'Achtung: Email an uns gesandt: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Fehler: Es wurde kein Kunde ausgew&auml;hlt!');
define('ERROR_NO_COUPON_AMOUNT', 'Error: No coupon amount has been entered. Either enter an amount or select free shipping.');
define('ERROR_COUPON_EXISTS', 'Error: A coupon with the same coupon code already exists.');

define('COUPON_NAME', 'Kupon Name');
//define('COUPON_VALUE', 'Kupon Wert');
define('COUPON_AMOUNT', 'Kupon Betrag');
define('COUPON_CODE', 'Kupon Code');
define('COUPON_STARTDATE', 'G&uuml;ltig ab');
define('COUPON_FINISHDATE', 'G&uuml;ltig bis');
define('COUPON_FREE_SHIP', 'Versandkostenfrei');
define('COUPON_DESC', 'Kupon Beschreibung');
define('COUPON_MIN_ORDER', 'Kupon Minimum Bestellung');
define('COUPON_USES_COUPON', 'Anwendungen pro Kupon');
define('COUPON_USES_USER', 'Anwendungen pro Kunde');
define('COUPON_PRODUCTS', 'G&uuml;ltige Produkt Aufz&auml;hlung');
define('COUPON_CATEGORIES', 'G&uuml;ltige Kategorien Aufz&auml;hlung');
define('VOUCHER_NUMBER_USED', 'Verwendete Anzahl');
define('DATE_CREATED', 'Erstellt am');
define('DATE_MODIFIED', 'Ge&auml;ndert am');
define('TEXT_HEADING_NEW_COUPON', 'Neuen Kupon Erstellen');
define('TEXT_NEW_INTRO', 'Bitte geben Sie die folgenden Information f&uuml;r den neuen Kupon an.<br>');


define('COUPON_NAME_HELP', 'Ein kurzer Name f&uuml;r den Kupon');
define('COUPON_AMOUNT_HELP', 'Der Wert des Rabatts für den Kupon, entweder absolut oder in % für einen Rabatt vom Gesamtbestellwert.');
define('COUPON_CODE_HELP', 'Sie k&ouml;nnen Ihren eigenen Code eingeben, oder das Feld leer lassen, f&uuml;r einen automatisch generierten Code.');
define('COUPON_STARTDATE_HELP', 'Das Datum, ab dem der Kupon g&uuml;ltig ist');
define('COUPON_FINISHDATE_HELP', 'Das Datum an dem der Kupon abl&auml;uft');
define('COUPON_FREE_SHIP_HELP', 'Der Kupon macht eine Bestellung versandkostenfrei. Achtung: Dies lässt die coupon_amount Einstellung unbeachtet, aber respektiert den Minimum-Bestellwert');
define('COUPON_DESC_HELP', 'Eine Beschreibung des Kupons f&uuml;r den Kunden');
define('COUPON_MIN_ORDER_HELP', 'Der Minimumbestellwert, bevor dieser Kupon g&uuml;ltig ist');
define('COUPON_USES_COUPON_HELP', 'Die maximale Anzahl, die dieser Kupon benutzt werden kann; leer lassen für kein Limit.');
define('COUPON_USES_USER_HELP', 'Anzahl, wie oft dieser Kupon benutzt werden kann; leer lassen für kein Limit.');
define('COUPON_PRODUCTS_HELP', 'Eine Komma-getrennte Liste von product_ids, mit denen dieser Kupon benutzt werden kann; leer lassen für kein Einschr&auml;nkung.');
define('COUPON_CATEGORIES_HELP', 'Eine Komma-getrennte Liste von cpaths, mit denen dieser Kupon benutzt werden kann; leer lassen für kein Einschr&auml;nkung.');


define('ALT_CONFIRM_DELETE_VOUCHER', 'Confirm Delete Voucher');
define('ALT_CANCEL', 'Cancel');
define('VIEW', 'View');
define('ALT_EMAIL_VOUCHER', 'Email Voucher');
define('ALT_EDIT_VOUCHER', 'Edit Voucher');
define('ALT_DELETE_VOUCHER', 'Delete Voucher');
define('ALT_VOUCHER_REPORT', 'Voucher Report');
define('COUPON_BUTTON_EMAIL_VOUCHER', 'Email Voucher');
define('COUPON_BUTTON_EDIT_VOUCHER', 'Edit Voucher');
define('COUPON_BUTTON_DELETE_VOUCHER', 'Delete Voucher');
define('COUPON_BUTTON_VOUCHER_REPORT', 'Voucher Report');
define('COUPON_BUTTON_PREVIEW', 'Preview');
define('COUPON_BUTTON_BACK', 'Back');
define('COUPON_STATUS', 'Status');
define('COUPON_STATUS_HELP', 'Set to ' . IMAGE_ICON_STATUS_RED . ' to disable customers\' ability to use the coupon.');
?>