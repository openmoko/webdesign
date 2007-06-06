<?php
/*
  $Id: login.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

//Email Validation
define('TEXT_LOGIN_ERROR_VALIDATION', 'Error: Your account is not validated.');
define('TEXT_YOU_HAVE_TO_VALIDATE', 'Please insert your Validation-key to confirm your registration');
define('ENTRY_VALIDATION_CODE', 'Validation-key');
define('TEXT_NEW_VALIDATION_CODE', '<b>Request a new Validation-key <u>here</u></b>');

define('NAVBAR_TITLE', 'Anmelden');

define('HEADING_TITLE', 'Melden Sie sich an');

define('HEADING_NEW_CUSTOMER', 'Neuer Kunde');
define('TEXT_NEW_CUSTOMER', 'Ich bin ein neuer Kunde.');
define('TEXT_NEW_CUSTOMER_INTRODUCTION', 'Durch Ihre Anmeldung bei ' . STORE_NAME . ' sind Sie in der Lage schneller zu bestellen, kennen jederzeit den Status Ihrer Bestellungen und haben immer eine aktuelle &Uuml;bersicht &uuml;ber Ihre bisherigen Bestellungen.');
define('HEADING_RETURNING_CUSTOMER', 'Bereits Kunde');
define('TEXT_RETURNING_CUSTOMER', 'Ich bin bereits Kunde.');

define('TEXT_PASSWORD_FORGOTTEN', 'Sie haben Ihr Passwort vergessen? Dann klicken Sie <u>hier</u>');

define('TEXT_LOGIN_ERROR', 'Fehler: Keine &Uuml;bereinstimmung der eingebenen Email-Adresse und/oder dem Passwort.');
define('TEXT_VISITORS_CART', '<font color="#ff0000"><b>Achtung:</b></font> Ihre Besuchereingaben werden automatisch mit Ihrem Kundenkonto verbunden. <a href="javascript:session_win();">[Mehr Information]</a>');
// Begin Checkout Without Account v0.70 changes

define('PWA_FAIL_ACCOUNT_EXISTS', 'An account already exists for the email address {EMAIL_ADDRESS}.  You must login here with the password for that account before proceeding to checkout.');
// Begin Checkout Without Account v0.60 changes
define('HEADING_CHECKOUT', 'Proceed Directly to Checkout');
define('TEXT_CHECKOUT_INTRODUCTION', 'Proceed to Checkout without creating an account. By choosing this option none of your user information will be kept in our records, and you will not be able to review your order status, nor keep track of your previous orders.');
define('PROCEED_TO_CHECKOUT', 'Proceed to Checkout without Registering');
// End Checkout Without Account changes
// Eversun mod for sppc and qty price breaks
// define the email address that can change customer_group_id on login
define('SPPC_TOGGLE_LOGIN_PASSWORD', 'support@creloaded.com');
// Eversun mod for sppc and qty price breaks

define('LOGIN_TITLE1', 'Choose a Customer Group');
?>
