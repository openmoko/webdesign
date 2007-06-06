<?php
/*
  $Id: citibank.php,v 1.0 2003/03/11 05:36:58 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 by PIGSTUY.COM

  Released under the GNU General Public License
*/

	define('MODULE_PAYMENT_CITIBANK_TEXT_TITLE', 'Citibank payment module ');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_TYPE','Credit Card Type');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_OWNER','Credit Card Owner (name on the card)');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_NUMBER', 'Credit Card Number');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_EXPIRES','Credit Card Expiration Date');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CVV_LINK','What is CVV');
	
	// labels for CreditCard types
	define('MODULE_PAYMENT_CITIBANK_TEXT_VISA', 'Visa');
	define('MODULE_PAYMENT_CITIBANK_TEXT_MASTER', 'Mastercard');
	define('MODULE_PAYMENT_CITIBANK_TEXT_JCB','JCB Card');
	define('MODULE_PAYMENT_CITIBANK_TEXT_UCARD','UCARD Card');
	
	// define cards that are accepted by payment module (VISA,AMEX,DISCOVER,MASTERCARD). Separate with ','. Uperrcase is required.
	define('MODULE_PAYMENT_CITIBANK_ACCEPTED_CC','VISA,MASTER,JCB,UCARD');
	//VISA, MASTER, JCB, or UCARD
	
	//description of payment module
	define('MODULE_PAYMENT_CITIBANK_TEXT_DESCRIPTION', "Module for Citibank");
	
	define('MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_OWNER', 'Credit Card Owner:');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_NUMBER', 'Credit Card Number:');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_EXPIRES', 'Credit Card Expiry Date:');
	
	define('MODULE_PAYMENT_CITIBANK_TEXT_DECLINED_TRANSACTION', 'Bank has declined this transaction');
	define('MODULE_PAYMENT_CITIBANK_TEXT_INVALID_PRICE', 'Your shopping cart has invalid total price');
	define('MODULE_PAYMENT_CITIBANK_TEXT_MISSING_FORM_DATA', 'Credit Card form is not filled correctly');
	define('MODULE_PAYMENT_CITIBANK_TEXT_CONFIGURATION_ERROR', 'Payment module is not configured correctly please contact site administrator');
	define('MODULE_PAYMENT_CITIBANK_TEXT_PROCESSING_ERROR', 'There was error in transaction');

?>