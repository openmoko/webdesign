<?php
/*
  $Id: PAYFLOWPRO.php,v 1.9 2002/01/04 10:45:18 hpdl Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_TITLE', 'Pay by Credit Card');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_TITLE1', 'Your credit card information will be kept secure and private.  We use Verisign payment processing.');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_TITLE2', '');
 
 

  define('TEXT_CSCAL_ERROR_CARD_TYPE_MISMATCH', 'The Credit Card number doe snot match the Card Type:');
 
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_TYPE', 'Card Type:');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_OWNER', 'Card Owner:');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_HOLDER_FIRST_NAME', 'First Name and Initial as shown on the card');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_HOLDER_LAST_NAME', 'Last Name and Suffix as shown on your card');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_DESCRIPTION', 'Credit Card Test Info:<br><br>CC#: 4111111111111111<br>Expiry: Any');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_TYPE', 'Type:');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_NUMBER', 'Credit Card Number:');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_EXPIRES', 'Expiration:');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC', 'Card Verification Number');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC_TEXT', '(On the back of your card, locate the final 3 digit number)');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC_HELP', 'Help Finding Card Verification Number');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC_AMEX', 'Using Amex?');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_JS_CC_NUMBER', '* The credit card number must be at least ' . CC_NUMBER_MIN_LENGTH . ' characters.n');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_ERROR_MESSAGE', 'There has been an error processing you credit card, please try again, or call us ');
  
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_ERROR1', 'Local not sent to processor');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_ERROR', 'There has been an error processing you credit card. Please double check the information you entered. 
  <p> 1)  Does the bill to address match the credit card billing address?
   </p> 2) Try to re-enter the credit card information.  Sorry that this step is necessary, the re-entry is a security requirement.
  3) If you are still having a problem, please call or email us.  Your items are stored in the system and we can easily help you during normal business hours.  We will still be able to promptly send you your merchandise. 
  Card error #');
  define('TEXT_CCVAL_ERROR_CARD_TYPE_MISMATCH', 'The credit card type you\'ve chosen does not match the credit card number entered. Please check the number and credit card type and try again.');
  define('TEXT_CCVAL_ERROR_CVV_LENGTH', 'The CVV number entered is incorrect. Please try again.');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_AMEX', 'Amex');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_DISCOVER', 'Discover');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_MASTERCARD', 'Mastercard');
  define('MODULE_PAYMENT_PAYFLOWPRO_TEXT_VISA', 'Visa');
?>
