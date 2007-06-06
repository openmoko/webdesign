<?php
/*
  paypal_dp.php, v 1.0 09/06/2005
  Copyright (c) 2005 POSTOSC.COM
  Released under the GNU General Public License
  Absolutely no warranty. Use at your own risk.
*/

define('MODULE_PAYMENT_PAYPAL_DP_TEXT_TITLE', 'Paypal Pro Credit Card Payment');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_DESCRIPTION', 'PayPal Pro Credit Card Payment');
define('MODULE_PAYMENT_PAYPAL_DP_CLIENT_DESCRIPTION', 'Credit Card');
define('MODULE_PAYMENT_PAYPAL_DP_IMAGE_DESCRIPTION', '<img src="images/paypal/4cards.gif">');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_TYPE', 'Credit Card Type:');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_FIRSTNAME', 'Owner First Name:');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_LASTNAME', 'Owner Last Name:');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_NUMBER', 'Credit Card Number:');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_CVV2', '<a href="http://www.paypal.com/cgi-bin/webscr?cmd=p/acc/cvv_info_pop-outside" target="_blank"><b>Card Verification Number (<u>CLICK FOR DETAILS</u>)</b></a>:');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_EXPIRES', 'Card Expiration Date:');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_FIRSTNAME', '* The owner\'s first name of the credit card must be at least ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' characters.\n');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_LASTNAME', '* The owner\'s last name of the credit card must be at least ' . ENTRY_LAST_NAME_MIN_LENGTH . ' characters.\n');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_NUMBER', '* The credit card number must be at least ' . CC_NUMBER_MIN_LENGTH . ' characters.\n');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_CVV2', '* The card verification value cannot be more than 4 characters.\n');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_ERROR', 'Credit Card Error!');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_PROCESS_ERROR', 'There has been an error processing your credit card. Please try again.');
define('MODULE_PAYMENT_PAYPAL_DP_TEXT_DECLINED_MESSAGE', 'Your credit card was declined. Please try another card or contact your bank for more info.');
?>