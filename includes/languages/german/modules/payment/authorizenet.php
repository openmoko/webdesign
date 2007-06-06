<?php
/*
  $Id: authorizenet.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

*/

  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TITLE', 'Authorize.net');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DESCRIPTION', 'Kreditkarten Test Info:<br><br>CC#: 4111111111111111<br>G&uuml;ltig bis: Any');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TYPE', 'Typ:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_OWNER', 'Kreditkarteninhaber:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_NUMBER', 'Kreditkarten-Nr.:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_EXPIRES', 'G&uuml;ltig bis:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_TYPE', 'Credit Card Type:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_OWNER', '* Der Name des Kreditkarteninhabers muss mindestens aus  ' . CC_OWNER_MIN_LENGTH . ' Zeichen bestehen.\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CVV_LINK', 'What is it?');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_NUMBER', '* Die \'Kreditkarten-Nr.\' muss mindestens aus ' . CC_NUMBER_MIN_LENGTH . ' Zahlen bestehen.\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR_MESSAGE', 'Fehler bei der &Uuml;berp&uuml;fung der Kreditkarte!');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DECLINED_MESSAGE', 'Ihre Kreditkarte wurde abgelehnt. Bitte versuchen Sie es mit einer anderen Karte oder kontaktieren Sie Ihre Bank f&uuml;r weitere Informationen.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR', 'Credit Card Error!');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_CVV', '* You must enter a CVV number to proceed.\n');
  define('TEXT_CCVAL_ERROR_CARD_TYPE_MISMATCH', 'The credit card type you\'ve chosen does not match the credit card number entered. Please check the number and credit card type and try again.');
  define('TEXT_CCVAL_ERROR_CVV_LENGTH', 'The CVV number entered is incorrect. Please try again.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_AMEX', 'Amex');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DISCOVER', 'Discover');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_MASTERCARD', 'Mastercard');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_VISA', 'Visa');
  define('MODULE_PAYMENT_AUTHORIZENET_CVV_NUMBER', 'CVV number');
?>
