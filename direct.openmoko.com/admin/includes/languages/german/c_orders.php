<?php
/*
  $Id: edit_orders.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Bestellung Generieren');
define('HEADING_TITLE_NUMBER', 'Nr.');
define('HEADING_TITLE_DATE', 'of');
define('HEADING_SUBTITLE', 'Please edit all parts as desired and click on the "Update" button below.');
define('HEADING_TITLE_SEARCH', 'Bestell ID:');
define('HEADING_TITLE_STATUS', 'Status:');
define('ADDING_TITLE', 'Produkt hinzuf&uuml;gen');

define('CATEGORY_ORDER_DETAILS', 'Customer Details');
define('ENTRY_CURRENCY', 'Customer Currency');

define('ENTRY_UPDATE_TO_CC', '(Aktualisieren der <b>Kreditkarte</b> zum anzeigen des CC Feldes.)');
define('HINT_DELETE_POSITION', '<font color="#FF0000">Hint: </font>To delete a product set its quantity to "0".');
define('HINT_TOTALS', '<font color="#FF0000">Hint: </font>Feel free to give discounts by adding negative amounts to the list.<br>Fields with "0" values are deleted when updating the order (exception: shipping).');
define('HINT_PRESS_UPDATE', 'Please click on "Update" to save all changes made above.');
define('TABLE_HEADING_COMMENTS', 'Kommentare');
define('TABLE_HEADING_CUSTOMERS', 'Kunden');
define('TABLE_HEADING_ORDER_TOTAL', 'Bestellung Summe');
define('TABLE_HEADING_DATE_PURCHASED', 'Bestelldatum');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_QUANTITY', 'Stk.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Modell');
define('TABLE_HEADING_PRODUCTS', 'Produkte');
define('TABLE_HEADING_TAX', 'MwSt.');
define('TABLE_HEADING_TOTAL', 'Gesamt');
define('TABLE_HEADING_UNIT_PRICE', 'Preis pro Einheit');
define('TABLE_HEADING_BASE_PRICE', 'Base Price');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Price (incl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Summe Gesamt');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Total (incl.)');
define('TABLE_HEADING_TOTAL_MODULE', 'Total Price Component');
define('TABLE_HEADING_TOTAL_AMOUNT', 'Amount');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Kunde benachrichtigt');
define('TABLE_HEADING_DATE_ADDED', 'hinzugef&uuml;gt am:');

define('ENTRY_CUSTOMER', 'Kunde:');
define('ENTRY_CUSTOMER_NAME', 'Name');
define('ENTRY_CUSTOMER_COMPANY', 'Company');
define('ENTRY_CUSTOMER_ADDRESS', 'Address');
define('ENTRY_CUSTOMER_SUBURB', 'Suburb');
define('ENTRY_CUSTOMER_CITY', 'City');
define('ENTRY_CUSTOMER_STATE', 'State');
define('ENTRY_CUSTOMER_POSTCODE', 'Postcode');
define('ENTRY_CUSTOMER_COUNTRY', 'Country');
define('ENTRY_CUSTOMER_PHONE', 'Phone');
define('ENTRY_CUSTOMER_EMAIL', 'E-Mail');
define('ENTRY_SOLD_TO', 'Verkauft an:');
define('ENTRY_DELIVERY_TO', 'Zugestellt an:');
define('ENTRY_SHIP_TO', 'Versand an:');
define('ENTRY_SHIPPING_ADDRESS', 'Versand Adresse:');
define('ENTRY_BILLING_ADDRESS', 'Rechnungs Addresse:');
define('ENTRY_PAYMENT_METHOD', 'Bezahlverfahren:');
define('ENTRY_CREDIT_CARD_TYPE', 'Kreditkarten Type:');
define('ENTRY_CREDIT_CARD_OWNER', 'Kreditkartenbesitzer:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kreditkartennummer:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Kreditkarte g&uuml;ltig bis:');
define('ENTRY_CREDIT_CARD_CCV', 'CCV/CVC/CSC code: ');
define('ENTRY_CREDIT_CARD_START_DATE', 'Start Date: ');
define('ENTRY_CREDIT_CARD_ISSUE', 'Issue Number: ');
define('ENTRY_SUB_TOTAL', 'Zwischensumme:');
define('ENTRY_TAX', 'MwSt.:');
define('ENTRY_SHIPPING', 'Versand:');
define('ENTRY_TOTAL', 'Gesamt:');
define('ENTRY_DATE_PURCHASED', 'Kaufdatum:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_DATE_LAST_UPDATED', 'Letzte Aktuallisierung:');
define('ENTRY_NOTIFY_CUSTOMER', 'Kunde benachrichtigen:');
define('ENTRY_NOTIFY_COMMENTS', 'Eingetragene Kommentare:');
define('ENTRY_PRINTABLE', 'Rechnung drucken');
define('ENTRY_CUSTOMER_DISCOUNT', 'Nutzen Sie hier Ziffern in negierter Form -1.00 ');
define('ENTRY_CUSTOMER_GV', 'Discount/Gift Voucher: ');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Bestellung l&ouml;schen');
define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sich sicher das Sie die Bestellung l&ouml;schen wollen?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Anzahl dem Lager gutschreiben');
define('TEXT_DATE_ORDER_CREATED', 'Erstellt am:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Letzte &Auml;nderung:');
define('TEXT_DATE_ORDER_ADDNEW', 'Add New Product');
define('TEXT_INFO_PAYMENT_METHOD', 'Bezahlmetode:');

define('TEXT_CARD_ENCRPYT', '<font color=green> </b> This CC number is stored Encrypted </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC number is not stored Encrypted </b></font>');
define('TEXT_EXPIRES_ENCRPYT', '<font color=green> </b> This CC expire date is stored Encrypted </b></font>');
define('TEXT_EXPIRES_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC expire date is not stored Encrypted </b></font>');
define('TEXT_CCV_ENCRPYT', '<font color=green> </b> This CC CCV is stored Encrypted </b></font>');
define('TEXT_CCV_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC CCV is not stored Encrypted If blank ignore this message</b></font>');

define('TEXT_EXPIRES_REMOVED', '<font color=green> </b> This CC expire date has been removed from the store.</b></font>');
define('TEXT_CCV_REMOVED', '<font color=green> </b> CCV Code:  Not stored - due to processing regulations. Enable CCV email in module settings.</b></font>');
define('TEXT_CARD__REMOVED', '<font color=green> </b> This CC number is not store or has been removed from the store.</b></font>');


define('ENTRY_IPADDRESS', 'Ihre IP-Adresse');
define('ENTRY_IPISP', 'Ihr Provider');

define('TEXT_ALL_ORDERS', 'Alle Bestellungen');
define('TEXT_NO_ORDER_HISTORY', 'Keine Bestell&uuml;bersicht vorhanden');


define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Bestellung aktuallisiert');
define('EMAIL_TEXT_ORDER_NUMBER', 'Bestellnummer:');
define('EMAIL_TEXT_INVOICE_URL', 'Aufgeschl&uuml;sselte Rechnung:');
define('EMAIL_TEXT_DATE_ORDERED', 'Bestelldatum:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Ihre Bestellung wurde auf folgenden Status gesetzt.' . "\n\n" . 'Neuer Status: %s' . "\n\n" . 'Sollten Sie Fragen zu diesem Vorgang haben, so senden Sie uns eine Email.' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Folgender Kommentar wurde hinzugef&uuml;gt' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Fehler: Bestellung existiert nicht.');
define('SUCCESS_ORDER_UPDATED', 'ERFOLGREICH: Bestellung wurde aktualisiert.');
define('WARNING_ORDER_NOT_UPDATED', 'FEHLER: Nichts zu &auml;ndern. Es wurde keine &Auml;nderung durchgef&uuml;hrt.');

define('ADDPRODUCT_TEXT_CATEGORY_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_PRODUCT', 'Choose a product');
define('ADDPRODUCT_TEXT_PRODUCT_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_OPTIONS', 'Choose an option');
define('ADDPRODUCT_TEXT_OPTIONS_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_OPTIONS_NOTEXIST', 'Product has no options, so skipping...');
define('ADDPRODUCT_TEXT_CONFIRM_QUANTITY', 'pieces of this product');
define('ADDPRODUCT_TEXT_CONFIRM_ADDNOW', 'Add');
define('ADDPRODUCT_TEXT_STEP', 'Step');
define('ADDPRODUCT_TEXT_STEP1', ' &laquo; Choose a catalogue. ');
define('ADDPRODUCT_TEXT_STEP2', ' &laquo; Choose a product. ');
define('ADDPRODUCT_TEXT_STEP3', ' &laquo; Choose an option. ');

define('MENUE_TITLE_CUSTOMER', '1. Customer Data');
define('MENUE_TITLE_PAYMENT', '2. Payment Method');
define('MENUE_TITLE_ORDER', '3. Ordered Products');
define('MENUE_TITLE_TOTAL', '4. Discount, Shipping and Total');
define('MENUE_TITLE_STATUS', '5. Status and Notification');
define('MENUE_TITLE_UPDATE', '6. Update Data');

define('DONT_ADD_NEW_PRODUCT', 'Addieren Sie nicht neues Produkt');
?>
