<?php
/*
  $Id: cc.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_CC_TEXT_TITLE', 'Carte de cr&eacute;dit');
  define('MODULE_PAYMENT_CC_TEXT_DESCRIPTION', 'No de carte de cr&eacute;dit test<br><br>CC# : 4111111111111111<br>Date d\'expiration : n\'importe');
  define('MODULE_PAYMENT_CC_TEXT_TYPE', 'Type:');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_TYPE', 'Type de la carte :');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_OWNER', 'Propri&eacute;taire de la carte :');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_NUMBER', 'Num&eacute;ro de la carte :');
  define('MODULE_PAYMENT_CC_TEXT_CREDIT_CARD_EXPIRES', 'Date d\'expiration de la carte :');
  define('MODULE_PAYMENT_CC_TEXT_JS_CC_OWNER', '* Le nom du propriétaire de la carte doit avoir au moins ' . CC_OWNER_MIN_LENGTH . ' caractères.\n');
  define('MODULE_PAYMENT_CC_TEXT_CVV_LINK', 'What is it?');
  define('MODULE_PAYMENT_CC_TEXT_JS_CC_NUMBER', '* The credit card number must be at least ' . CC_NUMBER_MIN_LENGTH . ' characters.\n');
  define('MODULE_PAYMENT_CC_TEXT_ERROR', 'Erreur carte de cr&eacute;dit !');
  define('MODULE_PAYMENT_CC_TEXT_DECLINED_MESSAGE', 'Your credit card was declined. Please try another card or contact your bank for more info.');
  define('MODULE_PAYMENT_CC_TEXT_JS_CC_CVV', '* You must enter a CVV number to proceed. Please click (What is it?) for help.\n');
  define('TEXT_CCVAL_ERROR_CARD_TYPE_MISMATCH', 'The credit card type you\'ve chosen does not match the credit card number entered. Please check the number and credit card type and try again.');
  define('TEXT_CCVAL_ERROR_CVV_LENGTH', 'The CVV number entered is incorrect. Please try again.');
  define('MODULE_PAYMENT_CC_TEXT_AMEX', 'Amex');
  define('MODULE_PAYMENT_CC_TEXT_DISCOVER', 'Discover');
  define('MODULE_PAYMENT_CC_TEXT_MASTERCARD', 'Mastercard');
  define('MODULE_PAYMENT_CC_TEXT_VISA', 'Visa');
?>
