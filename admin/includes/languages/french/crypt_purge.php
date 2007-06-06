<?php
/*
  $Id: crypt_convert.php,v 1.1 2005/08/16 00:36:41 zip1 Exp $

    Copyright (c) 2005 
    
  Released under the GNU General Public License
*/

define('TABLE_HEADING_CONFIGURATION_TITLE', 'Title');
define('TABLE_HEADING_CONFIGURATION_VALUE', 'Value');

define('HEADING_TITLE_OID', 'Order ID:');
define('HEADING_TITLE', 'Remove cc data from cart');
define('HEADING_TITLE_SEARCH', 'Order ID:');
define('HEADING_TITLE_STATUS', 'Status:');
define('TABLE_HEADING_CUSTOMERS', 'Customers');
define('TABLE_HEADING_ORDER_TOTAL', 'Order Total');
define('TABLE_HEADING_DATE_PURCHASED', 'Date Purchased');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_CARD_ENCRPYT', '<font color=green> <b>  Encrypted </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b> Unencrypted </b></font>');
define('TABLE_HEADING_IS_ENCRYPTED', 'Encryption Status');

define('TEXT_KEY_CURRENT', 'Current key is: ');
define('TEXT_CONVRT_ALL', 'Convert all CC data to new key');
define('TEXT_KEY_NEW', 'New key is: ');
define('TEXT_KEY_STATUS_01', '<font color=red> <b> This file does not have a key </b></font>');
define('TEXT_KEY_STATUS_02', '<font color=blue> <b> OK! This file has a key</b></font>');
define('TEXT_KEY_STATUS_03', '<font color=red> <b> Please edit the key files(s) in the key manager </b></font>');


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
