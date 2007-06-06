<?php
/*
  $Id: edit_orders.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Bestellung &auml;ndern');
define('HEADING_TITLE_NUMBER', 'Nr.');
define('HEADING_TITLE_DATE', 'of');
define('HEADING_SUBTITLE', 'Please edit all parts as desired and click on the "Update" button below.');
define('HEADING_TITLE_SEARCH', 'Bestellnummer:');
define('HEADING_TITLE_STATUS', 'Status:');
define('ADDING_TITLE', 'Produkt zu Bestellung hinzuf&uuml;gen');

define('ADD_PRODUCT', 'Add a Product to Order');
define('HEADING_ABANDONED', '<B>Dieser Auftrag wurde weder abgeschlossen noch aufgegeben!!! Bestell ID:  </B>');


define('ENTRY_UPDATE_TO_CC', '(Aktuallisier zu <b>Kreditkarte</b> um die Kreditkarten Felder zu sehen.)');
define('HINT_DELETE_POSITION', '<font color="#FF0000">Hinweis: </font>Um die Position zu l&ouml;schen setzen Sie die St&uuml;ckzahl auf "0".');
define('HINT_TOTALS', '<font color="#FF0000">Hinweis: </font>Um einen Nachlass zu geben setzen sie einen negatieven Betrag.<br>Felcder mit "0" werden gel&ouml;scht wenn die Bestellung aktuallisiert wird.r (Ausnahme: Versand).');
define('HINT_PRESS_UPDATE', 'Klicken Sie auf "Update" um alle &Auml;nderungen zu speichern.');
define('TABLE_HEADING_COMMENTS', 'Kommentar');
define('TABLE_HEADING_CUSTOMERS', 'Kunde');
define('TABLE_HEADING_ORDER_TOTAL', 'Gesamtwert');
define('TABLE_HEADING_DATE_PURCHASED', 'Bestelldatum:');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_QUANTITY', 'Anzahl');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Produkt-Nr.');
define('TABLE_HEADING_PRODUCTS', 'Produkt');
define('TABLE_HEADING_TAX', 'MwSt.');
define('TABLE_HEADING_TOTAL', 'Gesamtsumme');
define('TABLE_HEADING_UNIT_PRICE', 'St&uuml;ckpreis');
define('TABLE_HEADING_BASE_PRICE', 'Grundpreis');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Preis (inkl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Gesamtpreis');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Total (inkl.)');
define('TABLE_HEADING_TOTAL_MODULE', 'Gesamt Preis Komponente');
define('TABLE_HEADING_TOTAL_AMOUNT', 'Menge');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Kunde benachrichtigt');
define('TABLE_HEADING_DATE_ADDED', 'hinzugef&uuml;gt am:');

define('ENTRY_CUSTOMER', 'Kunde:');
define('ENTRY_CUSTOMER_NAME', 'Name');
define('ENTRY_CUSTOMER_COMPANY', 'Firma');
define('ENTRY_CUSTOMER_ADDRESS', 'Adresse');
define('ENTRY_CUSTOMER_SUBURB', 'Stadtteil');
define('ENTRY_CUSTOMER_CITY', 'Stadt');
define('ENTRY_CUSTOMER_STATE', 'Bundesland');
define('ENTRY_CUSTOMER_POSTCODE', 'PLZ');
define('ENTRY_CUSTOMER_COUNTRY', 'Land');
define('ENTRY_CUSTOMER_PHONE', 'Telefon');
define('ENTRY_CUSTOMER_EMAIL', 'E-Mail');
define('ENTRY_SOLD_TO', 'Verkauft an:');
define('ENTRY_DELIVERY_TO', 'Lieferanschrift:');
define('ENTRY_SHIP_TO', 'Lieferanschrift:');
define('ENTRY_SHIPPING_ADDRESS', 'Versandadresse:');
define('ENTRY_BILLING_ADDRESS', 'Rechnungsadresse:');
define('ENTRY_PAYMENT_METHOD', 'Zahlungsweise:');
define('ENTRY_CREDIT_CARD_TYPE', 'Kreditkartentyp:');
define('ENTRY_CREDIT_CARD_OWNER', 'Kreditkarteninhaber:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kerditkartennnummer:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Kreditkarte l&auml;uft ab am:');
define('ENTRY_CREDIT_CARD_CCV', 'CCV/CVC/CSC code: ');
define('ENTRY_CREDIT_CARD_START_DATE', 'Start Datum: ');
define('ENTRY_CREDIT_CARD_ISSUE', 'Issue Nummer: ');
define('ENTRY_SUB_TOTAL', 'Zwischensumme:');
define('ENTRY_TAX', 'MwSt.:');
define('ENTRY_SHIPPING', 'Versandkosten:');
define('ENTRY_TOTAL', 'Gesamtsumme:');
define('ENTRY_DATE_PURCHASED', 'Bestelldatum:');
define('ENTRY_STATUS', 'Status:');
define('ENTRY_DATE_LAST_UPDATED', 'letzte Aktualisierung am:');
define('ENTRY_NOTIFY_CUSTOMER', 'Kunde benachrichtigen:');
define('ENTRY_NOTIFY_COMMENTS', 'Kommentare mitsenden:');
define('ENTRY_PRINTABLE', 'Rechnung drucken');
define('ENTRY_CUSTOMER_DISCOUNT', 'Verwenden Sie einen negativen Wert -1.00 ');
define('ENTRY_CUSTOMER_GV', 'Nachlass/Geschenkgutschein: ');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Bestellung l&ouml;schen');
define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sicher, das Sie diese Bestellung l&ouml;schen m&ouml;chten?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Produktanzahl dem Lager gutschreiben');
define('TEXT_DATE_ORDER_CREATED', 'erstellt am:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'letzte &Auml;nderung:');
define('TEXT_DATE_ORDER_ADDNEW', 'Neues Produkt hinzuf&uuml;gen');
define('TEXT_INFO_PAYMENT_METHOD', 'Zahlungsweise:');

define('TEXT_CARD_ENCRPYT', '<font color=green> </b> Die Kreditkartennummer wurde verschl&uuml;sselt gespeichert </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b>WARNUNG !!!! Diese Kreditkartennummer wurde nicht verschl&uuml;sselt gespeichert</b></font>');
define('TEXT_EXPIRES_ENCRPYT', '<font color=green> </b> Das Kreditkarten Verfallsdatum wurde verschl&uuml;sselt gespeichert </b></font>');
define('TEXT_EXPIRES_NOT_ENCRPYT', '<font color=red> <b>WARNUNG !!!! Das Kreditkarten Verfallsdatum wurde unverschl&uuml;sselt gespeichert </b></font>');
define('TEXT_CCV_ENCRPYT', '<font color=green> </b> Der Kreditkartenvorgang wurde verschl&uuml;sselt gespeichert </b></font>');
define('TEXT_CCV_NOT_ENCRPYT', '<font color=red> <b>WARNUNG !!!! Der Vorgang wurde verschl&uuml;sselt gespeichert. Sollten dioe Felder leer sein ignorieren Sie diese Meldung</b></font>');

define('TEXT_EXPIRES_REMOVED', '<font color=green> </b> This CC expire date has been removed from the store.</b></font>');
define('TEXT_CCV_REMOVED', '<font color=green> </b> CCV Code:  Not stored - due to processing regulations. Enable CCV email in module settings.</b></font>');
define('TEXT_CARD__REMOVED', '<font color=green> </b> This CC number is not store or has been removed from the store.</b></font>');


define('ENTRY_IPADDRESS', 'IP Address:');
define('ENTRY_IPISP', 'ISP:');

define('TEXT_ALL_ORDERS', 'Alle Bestellungen');
define('TEXT_NO_ORDER_HISTORY', 'Keine Bestellhistorie verf&uuml;gbar');


define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Statusänderung Ihrer Bestellung');
define('EMAIL_TEXT_ORDER_NUMBER', 'Bestell-Nr.:');
define('EMAIL_TEXT_INVOICE_URL', 'Ihre Bestellung k&ouml;nnen Sie unter folgender Adresse einsehen:');
define('EMAIL_TEXT_DATE_ORDERED', 'Bestelldatum:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Der Status Ihrer Bestellung wurde geändert.' . "\n\n" . 'Neuer Status: %s' . "\n\n" . 'Bei Fragen zu Ihrer Bestellung antworten Sie bitte auf diese Email.' . "\n\n" . 'Mit freundlichen Grüssen' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Anmerkungen und Kommentare zu Ihrer Bestellung:' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Fehler: Die Bestellung existiert nicht!.');
define('SUCCESS_ORDER_UPDATED', 'Hinweis: Die Bestellung wurde erfolgreich aktualisiert.');
define('WARNING_ORDER_NOT_UPDATED', 'Hinweis: Es wurde nichts ge&auml;ndert. Daher wurde diese Bestellung nicht aktualisiert.');
define('SUCCESS_PRODUCT_ADDED', 'Success : This order has been updated and a new product has been added');
define('ADDPRODUCT_TEXT_CATEGORY_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_PRODUCT', 'Produkt w&auml;hlen');
define('ADDPRODUCT_TEXT_PRODUCT_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_OPTIONS', 'Option w&auml;hlen');
define('ADDPRODUCT_TEXT_OPTIONS_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_OPTIONS_NOTEXIST', 'Produkt hat keine Optionen, wird abgebrochen...');
define('ADDPRODUCT_TEXT_CONFIRM_QUANTITY', 'Anzahl des Produkts');
define('ADDPRODUCT_TEXT_CONFIRM_ADDNOW', 'hinzuf&uuml;gen');
define('ADDPRODUCT_TEXT_STEP', 'Schritt');
define('ADDPRODUCT_TEXT_STEP1', ' &laquo; Katalog w&auml;hlen. ');
define('ADDPRODUCT_TEXT_STEP2', ' &laquo; Produkt w&auml;hlen. ');
define('ADDPRODUCT_TEXT_STEP3', ' &laquo; Option w&auml;hlen. ');

define('MENUE_TITLE_CUSTOMER', '1. Kundendaten');
define('MENUE_TITLE_PAYMENT', '2. Bezahl Optionen');
define('MENUE_TITLE_ORDER', '3. Bestellte Produkte');
define('MENUE_TITLE_TOTAL', '4. Nachlass, Versand und Gesamt');
define('MENUE_TITLE_STATUS', '5. Status und Benachrichtigungen');
define('MENUE_TITLE_UPDATE', '6. Daten aktuallisieren');

define('DISPLAY_BASKET', 'Anzeige Korb');
define('DONT_ADD_NEW_PRODUCT', 'Addieren Sie Nicht Neues Produkt');
define('SELECT_THESE_OPTIONS', "Wählen Sie Diese Wahlen Vor");
?>
