<?php
/*
  $Id: crypt_purge.php,v 1.1 2005/08/16 00:36:41 zip1 Exp $

    Copyright (c) 2005 
    
  Released under the GNU General Public License
*/

define('TABLE_HEADING_CONFIGURATION_TITLE', 'Titel');
define('TABLE_HEADING_CONFIGURATION_VALUE', 'Wert');

define('HEADING_TITLE_OID', 'Bestell ID:');
define('HEADING_TITLE', 'Kreditkarten Informationen aus Warenkorb entfernen');
define('HEADING_TITLE_SEARCH', 'Bestell ID:');
define('HEADING_TITLE_STATUS', 'Status:');
define('TABLE_HEADING_CUSTOMERS', 'Kunden');
define('TABLE_HEADING_ORDER_TOTAL', 'Bestellung Total');
define('TABLE_HEADING_DATE_PURCHASED', 'Bezahlt am');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_CARD_ENCRPYT', '<font color=green> <b>  Verschl&uuml;sselt </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b> Unverschl&uuml;sselt </b></font>');
define('TABLE_HEADING_IS_ENCRYPTED', 'Verschl&uuml;sselungs Status');

define('TEXT_KEY_CURRENT', 'Derzeitiger key lautet: ');
define('TEXT_CONVRT_ALL', 'Konvertiere alle Kreditkarten Daten zu einem neuen Key');
define('TEXT_KEY_NEW', 'Der neue Key ist: ');
define('TEXT_KEY_STATUS_01', '<font color=red> <b> Diese Datei hat keinen Key </b></font>');
define('TEXT_KEY_STATUS_02', '<font color=blue> <b> OK! Diese Datei hat einen Key</b></font>');
define('TEXT_KEY_STATUS_03', '<font color=red> <b> Bitte editieren Sie die Keys in der Key Verwaltung </b></font>');


define('TEXT_PURGE_ALL', 'Purge all CC data from cart');
define('TEXT_INFO_DELETE_DATA', 'Customers Name  ');
define('TEXT_INFO_DELETE_DATA_OID', 'Order Number  ');
define('TEXT_INFO_HEADING_DELETE_ORDER', 'Delete Order');
define('TEXT_INFO_DELETE_INTRO', 'Are you sure you want to delete this order?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Restock product quantity');
define('TEXT_DATE_ORDER_CREATED', 'Date Created:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Last Modified:');
define('TEXT_INFO_PAYMENT_METHOD', 'Payment Method:');

define('TEXT_INFO_EDIT_INTRO', 'Please make any necessary changes');
define('TEXT_INFO_DATE_ADDED', 'Date Added:');
define('TEXT_INFO_LAST_MODIFIED', 'Last Modified:');

define('ERROR_KEY_DIRECTORY_DOES_NOT_EXIST', 'Warning!!!!  key directory does not exsists.');
define('ERROR_KEY_DIRECTORY_NOT_WRITEABLE', 'Warning!!!!  key directory is not writeable so you can uploaded new key files');
?>
