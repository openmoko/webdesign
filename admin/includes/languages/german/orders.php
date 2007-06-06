<?php
/*
  $Id: orders.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
define('TABLE_HEADING_EDIT_ORDERS', 'To modify the order');

define('HEADING_TITLE', 'Bestellungen');
define('HEADING_IS_TITLE', 'IS Bestellung');
define('HEADING_IS_RECEIPT', 'IS Quittung');
define('HEADING_TITLE_SEARCH', 'Bestell-Nr.:');
define('HEADING_TITLE_STATUS', 'Status:');

define('ENTRY_UPDATE_TO_CC', '(Aktualisieren um zur <b>Kreditkarte</b> die CC Felder anzeigen zu lassen.)');
define('TABLE_HEADING_COMMENTS', 'Kommentar');
define('TABLE_HEADING_CUSTOMERS', 'Kunde');
define('TABLE_HEADING_ORDERID', 'Bestell ID');
define('TABLE_HEADING_IS_ORDERNUM', 'IS Bestellung');
define('TABLE_HEADING_ORDER_TOTAL', 'Gesamtwert');
define('TABLE_HEADING_DATE_PURCHASED', 'Bestelldatum');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_QUANTITY', 'Anzahl');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Produkt-Nr.');
define('TABLE_HEADING_PRODUCTS', 'Produkt');
define('TABLE_HEADING_TAX', 'MwSt.');
define('TABLE_HEADING_TOTAL', 'Gesamtsumme');
define('TABLE_HEADING_BASE_PRICE', 'Base Price'); 

define('TABLE_HEADING_PRICE_EXCLUDING_TAX', 'Preis (exkl.)');
define('TABLE_HEADING_PRICE_INCLUDING_TAX', 'Preis (inkl.)');
define('TABLE_HEADING_TOTAL_EXCLUDING_TAX', 'Total (exkl.)');
define('TABLE_HEADING_TOTAL_INCLUDING_TAX', 'Total (inkl.)');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Kunde benachrichtigt');
define('TABLE_HEADING_DATE_ADDED', 'hinzugef&uuml;gt am:');

//begin PayPal_Shopping_Cart_IPN
define('TABLE_HEADING_PAYMENT_STATUS', 'Bezahl Status');
//end PayPal_Shopping_Cart_IPN
define('ENTRY_SUBURB', 'Suburb :');
define('ENTRY_CITY', 'City :');
define('ENTRY_CUSTOMER', 'Kunde:');
define('ENTRY_STATE', 'State :');
define('ENTRY_SOLD_TO', 'Verkauft an:');
define('ENTRY_TELEPHONE', 'Enter Telephone :');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail Address:');
define('ENTRY_DELIVERY_TO', 'Lieferanschrift:');
define('ENTRY_SHIP_TO', 'Lieferanschrift:');
define('ENTRY_SHIPPING_ADDRESS', 'Versandadresse:');
define('ENTRY_BILLING_ADDRESS', 'Rechnungsadresse:');
define('ENTRY_PAYMENT_METHOD', 'Zahlungsweise:');
define('ENTRY_CREDIT_CARD_TYPE', 'Kreditkartentyp:');
define('ENTRY_CREDIT_CARD_OWNER', 'Kreditkarteninhaber:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Kerditkartennnummer:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Kreditkarte l&auml;uft ab am:');
define('ENTRY_CREDIT_CARD_CCV', 'CCV Code:');
define('ENTRY_CREDIT_CARD_START_DATE', 'Start Date: ');
define('ENTRY_CREDIT_CARD_ISSUE', 'Issue Number: ');
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

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Bestellung l&ouml;schen');
define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sicher, das Sie diese Bestellung l&ouml;schen m&ouml;chten?');
define('TEXT_INFO_DELETE_DATA', 'Customers Name  ');
define('TEXT_INFO_DELETE_DATA_OID', 'Bestell Nr.  ');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Produktmenge aktualisieren');
define('TEXT_DATE_ORDER_CREATED', 'erstellt am:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'letzte &Auml;nderung:');
define('TEXT_INFO_PAYMENT_METHOD', 'Zahlungsweise:');
define('TEXT_INFO_ABANDONDED', 'Abandoned');
define('TEXT_CARD_ENCRPYT', '<font color=green> </b> Die Kreditkartennummer wurde verschl&uuml;sselt gespeichert </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b>WARNUNG !!!! Die Kreditkartennummer wurde unverschl&uuml;sselt gespeichert </b></font>');
define('TEXT_EXPIRES_ENCRPYT', '<font color=green> </b> Das Ablaufdatum wurde verschl&uuml;sselt gespeichert </b></font>');
define('TEXT_EXPIRES_NOT_ENCRPYT', '<font color=red> <b>WARNUNG !!!! Das Ablaufdatum wurde unverschl&uuml;sselt gespeichert </b></font>');
define('TEXT_CCV_ENCRPYT', '<font color=green> </b> Die Kreditkarten CSV Nummer wurde verschl&uuml;sselt gepeichert </b></font>');
define('TEXT_CCV_NOT_ENCRPYT', '<font color=red> <b>WARNUNG !!!! Die Kreditkarten CSV Nummer wurde unverschl&uuml;sselt gepeichert. Wenn das Feld leer ist bitte ignorieren</b></font>');

define('TEXT_EXPIRES_REMOVED', '<font color=green> </b> Das Ablaufdatum der Kreditkarte wurde nicht im Shop gespeichert oder entfernt.</b></font>');
define('TEXT_CCV_REMOVED', '<font color=green> </b> Die Kreditkarten CCV Nummer wurde nicht im Shop gespeichert oder entfernt.</b></font>');
define('TEXT_CARD__REMOVED', '<font color=green> </b> Die Kreditkartennummer wurde nicht im Shop gespeichert oder entfernt.</b></font>');


define('ENTRY_IPADDRESS', 'IP Adresse:');
define('ENTRY_IPISP', 'Provider:');

define('TEXT_ALL_ORDERS', 'Alle Bestellungen');
define('TEXT_NO_ORDER_HISTORY', 'Keine Bestellhistorie verf&uuml;gbar');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Status&auml;nderung Ihrer Bestellung');
define('EMAIL_TEXT_ORDER_NUMBER', 'Bestell-Nr.:');
define('EMAIL_TEXT_INVOICE_URL', 'Ihre Bestellung k&ouml;nnen Sie unter folgender Adresse einsehen:');
define('EMAIL_TEXT_DATE_ORDERED', 'Bestelldatum:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Der Status Ihrer Bestellung wurde ge&auml;ndert.' . "\n\n" . 'Neuer Status: %s' . "\n\n" . 'Bei Fragen zu Ihrer Bestellung antworten Sie bitte auf diese Email.' . "\n\n" . 'Mit freundlichen Gr&uuml;ssen' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Anmerkungen und Kommentare zu Ihrer Bestellung:' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Fehler: Die Bestellung existiert nicht!.');
define('SUCCESS_ORDER_UPDATED', 'Hinweis: Die Bestellung wurde erfolgreich aktualisiert.');
define('WARNING_ORDER_NOT_UPDATED', 'Hinweis: Es wurde nichts ge&auml;ndert. Daher wurde diese Bestellung nicht aktualisiert.');
// begin replacement section for Email Subject contribution
define('EMAIL_TEXT_SUBJECT_1', ' ' . STORE_NAME. ' Order Updated');
define('EMAIL_TEXT_SUBJECT_2', ':  ');


define('ORDER', 'Order #');
define('ORDER_DATE_TIME', 'Order Date & Time');

// end replacement section for Email Subject contribution

?>
