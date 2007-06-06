<?php
/*
  $Id: edit_orders.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Verlassene / nicht abgeschlossene Bestellungen');
define('HEADING_TITLE_NUMBER', 'Nr.');
define('HEADING_TITLE_DATE', 'von');
define('HEADING_SUBTITLE', 'Redigieren Sie bitte alle Teile, wie gew&uuml;nscht und klicken Sie "Aktuallisieren" Button unten an.');
define('HEADING_TITLE_SEARCH', 'Bestell ID:');
define('HEADING_TITLE_STATUS', 'Status:');
define('ADDING_TITLE', 'Produkt zu dieser Bestellung hinzuf&uuml;gen');

define('ADD_PRODUCT', 'Produkt zu Bestellung hinzuf&uuml;gen');
define('HEADING_ABANDONED', '<B>Der Warenkorb f&uuml;r diesen Vorgang wurde abgebrochen!!! Bestell ID:  </B>');
define('TEXT_INFO_ABANDONDED', 'Abgebrochen / Verlassen');

define('ENTRY_UPDATE_TO_CC', '(Aktuallisiren zu <b>Kreditkarte</b> um Kreditkartenfelder zu lesen.)');
define('HINT_DELETE_POSITION', '<font color="#FF0000">Hinweis: </font>Um ein Produkt zu l&ouml;schen wird die St&uuml;ckzahl auf "0" gesetzt.');
define('HINT_TOTALS', '<font color="#FF0000">Hinweis: </font>Feel free to give discounts by adding negative amounts to the list.<br>Fields with "0" values are deleted when updating the order (exception: shipping).');
define('HINT_PRESS_UPDATE', 'Klicken Sie auf "Update" um alle &Auml;nderungen zu &uuml;bernehmen.');
define('TABLE_HEADING_COMMENTS', 'Kommentare');
define('TABLE_HEADING_CUSTOMERS', 'Kunden');
define('TABLE_HEADING_ORDER_TOTAL', 'Bestellungen gesamt');
define('TABLE_HEADING_DATE_PURCHASED', 'Gekauft am');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_QUANTITY', 'Stk.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Modell');
define('TABLE_HEADING_PRODUCTS', 'Produkte');
define('TABLE_HEADING_TAX', 'MwSt.');
define('TABLE_HEADING_TOTAL', 'Gesamt');
define('TABLE_HEADING_UNIT_PRICE', 'Verpackungs Einheit Preis');
define('TABLE_HEADING_BASE_PRICE', 'Basis Preis');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Preis (inkl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Gesamt Preis');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Gesamt (inkl.)');
define('TABLE_HEADING_TOTAL_MODULE', 'Gesamt Preis Komponente');
define('TABLE_HEADING_TOTAL_AMOUNT', 'Menge');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Kunde benachrichtigt');
define('TABLE_HEADING_DATE_ADDED', 'hinzugef&uuml;gt am');

define('ENTRY_CUSTOMER', 'Kunde Allgemein');
define('ENTRY_CUSTOMER_NAME', 'Name');
define('ENTRY_CUSTOMER_COMPANY', 'Firma');
define('ENTRY_CUSTOMER_ADDRESS', 'Adresse');
define('ENTRY_CUSTOMER_SUBURB', 'Stadtteil');
define('ENTRY_CUSTOMER_CITY', 'Stadt');
define('ENTRY_CUSTOMER_STATE', 'Bundesland');
define('ENTRY_CUSTOMER_POSTCODE', 'PLZ');
define('ENTRY_CUSTOMER_COUNTRY', 'Land');
define('ENTRY_CUSTOMER_PHONE', 'Telefon');
define('ENTRY_CUSTOMER_EMAIL', 'EMail');
define('ENTRY_SOLD_TO', 'Bezahlt an:');
define('ENTRY_DELIVERY_TO', 'Versenden an:');
define('ENTRY_SHIP_TO', 'Versandt an:');
define('ENTRY_SHIPPING_ADDRESS', 'Versand Adresse:');
define('ENTRY_BILLING_ADDRESS', 'Zahlungs Adresse:');
define('ENTRY_PAYMENT_METHOD', 'Bezahl Methode:');
define('ENTRY_CREDIT_CARD_TYPE', 'Type: ');
define('ENTRY_CREDIT_CARD_OWNER', 'Eigent&uuml;mer: ');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kreditkarten Nummer: ');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Verf&auml;llt am: ');
define('ENTRY_CREDIT_CARD_CCV', 'CCV/CVC/CSC Nummer: ');
define('ENTRY_CREDIT_CARD_START_DATE', 'Start Datum: ');
define('ENTRY_CREDIT_CARD_ISSUE', 'Fehler Nummer: ');
define('ENTRY_SUB_TOTAL', 'Zwischensumme:');
define('ENTRY_TAX', 'MwSt.:');
define('ENTRY_SHIPPING', 'Versand:');
define('ENTRY_TOTAL', 'Gesamt:');
define('ENTRY_DATE_PURCHASED', 'Gekauft am:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_DATE_LAST_UPDATED', 'Letzte aktuallisierung:');
define('ENTRY_NOTIFY_CUSTOMER', 'Kunde benachtichtigt:');
define('ENTRY_NOTIFY_COMMENTS', 'F&uuml;gen Sie Anmerkungen an:');
define('ENTRY_PRINTABLE', 'Rechnung drucken');
define('ENTRY_CUSTOMER_DISCOUNT', 'Nutzen Sie bitte Negativ Werte -1.00 ');
define('ENTRY_CUSTOMER_GV', 'Nachlass/Geschenkgutschein: ');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Bestellung l&ouml;schen');
define('TEXT_INFO_DELETE_INTRO', 'Wollen Sie diese Bestellung wirklich l&ouml;schen?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Ware dem Lager gutschreiben');
define('TEXT_DATE_ORDER_CREATED', 'Erstellt am:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Letzte &Auml;nderung:');
define('TEXT_DATE_ORDER_ADDNEW', 'Neues Produkt hinzuf&uuml;gen');
define('TEXT_INFO_PAYMENT_METHOD', 'Bezahl Methode:');

define('TEXT_ALL_ORDERS', 'Alle Bestellungen');
define('TEXT_NO_ORDER_HISTORY', 'Kein Bericht verf&uuml;gbar');


define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Bestellung aktuallisiert');
define('EMAIL_TEXT_ORDER_NUMBER', 'Bestell Nummer:');
define('EMAIL_TEXT_INVOICE_URL', 'Detailierte Rechnung:');
define('EMAIL_TEXT_DATE_ORDERED', 'Bestelldatum:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Ihre Bestellung wurde auf den folgenden Status gesetzt.' . "\n\n" . 'Neuer Status: %s' . "\n\n" . 'Sollten sich daraus Fragen ergeben, kontaktieren Sie uns bitte per EMail.' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Folgende Kommentare wurde an Ihre Bestellung angef&uuml;gt' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Fehler: Bestellung existiert nicht.');
define('SUCCESS_ORDER_UPDATED', 'Erfolgreich: Bestellung wurde erfolgreich aktuallisiert.');
define('WARNING_ORDER_NOT_UPDATED', 'Warnung: Es sind keine &Auml;nderungen durchzuf&uuml;hren. Die Bestellung wurde somit nicht ver&auml;ndert.');
define('ADDPRODUCT_TEXT_CATEGORY_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_PRODUCT', 'W&auml;hlen Sie ein Produkt');
define('ADDPRODUCT_TEXT_PRODUCT_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_OPTIONS', 'W&auml;hlen Sie eine Option');
define('ADDPRODUCT_TEXT_OPTIONS_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_OPTIONS_NOTEXIST', 'Zu diesem Produkt sind keine Optionen verf&uuml;gbar...');
define('ADDPRODUCT_TEXT_CONFIRM_QUANTITY', 'St&uuml;ckzahl des Produktes');
define('ADDPRODUCT_TEXT_CONFIRM_ADDNOW', 'hinzuf&uuml;gen');
define('ADDPRODUCT_TEXT_STEP', 'Schritt');
define('ADDPRODUCT_TEXT_STEP1', ' &laquo; Katalog w&auml;hlen. ');
define('ADDPRODUCT_TEXT_STEP2', ' &laquo; Produkt w&auml;hlen. ');
define('ADDPRODUCT_TEXT_STEP3', ' &laquo; Option w&auml;hlen. ');

define('MENUE_TITLE_CUSTOMER', '1. Kunden Daten');
define('MENUE_TITLE_PAYMENT', '2. Bezahl Methode');
define('MENUE_TITLE_ORDER', '3. Bestellte Produkte');
define('MENUE_TITLE_TOTAL', '4. Einzelpreis, Versand und Gesamt');
define('MENUE_TITLE_STATUS', '5. Status und Benachrichtigung');
define('MENUE_TITLE_UPDATE', '6. Update Daten');


define('DISPLAY_BASKET', Anzeige Korb');
define('DONT_ADD_NEW_PRODUCT', 'Addieren Sie Nicht Neues Produkt');
?>
