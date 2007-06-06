<?php
/*
  $Id: login.php,v 1.1.1.1 2004/03/04 23:41:02 ccwjr Exp $

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

define('NAVBAR_TITLE', 'Entrar');

define('HEADING_TITLE', 'Dejame Entrar!');

define('HEADING_NEW_CUSTOMER', 'Nuevo Cliente');
define('TEXT_NEW_CUSTOMER', 'Soy un nuevo cliente.');
define('TEXT_NEW_CUSTOMER_INTRODUCTION', 'Al crear una cuenta en ' . STORE_NAME . ' podrá realizar sus compras rapidamente, revisar el estado de sus pedidos y consultar sus operaciones anteriores.');
define('HEADING_RETURNING_CUSTOMER', 'Ya Soy Cliente');
define('TEXT_RETURNING_CUSTOMER', 'He comprado otras veces.');

define('TEXT_PASSWORD_FORGOTTEN', '&iquest;Ha olvidado su contrase&ntilde;a? Siga este enlace y se la enviamos.');

define('TEXT_LOGIN_ERROR', 'Error: El E-Mail y/o Contrase&ntilde;a no figuran en nuestros datos.');
define('TEXT_VISITORS_CART', '<font color="#ff0000"><b>Nota:</b></font> El contenido de su &quot;Cesta de Visitante&quot; ser&aacute; a&ntilde;adido a su &quot;Cesta de Asociado&quot; una vez que haya entrado. <a href="javascript:session_win();">[M&aacute;s Informaci&oacute;n]</a>');
// Begin Checkout Without Account v0.70 changes

define('PWA_FAIL_ACCOUNT_EXISTS', 'An account already exists for the email address {EMAIL_ADDRESS}.  You must login here with the password for that account before proceeding to checkout.');
// Begin Checkout Without Account v0.60 changes
define('HEADING_CHECKOUT', '<font size="2">Proceed Directly to Checkout</font>');
define('TEXT_CHECKOUT_INTRODUCTION', 'Proceed to Checkout without creating an account. By choosing this option none of your user information will be kept in our records, and you will not be able to review your order status, nor keep track of your previous orders.');
define('PROCEED_TO_CHECKOUT', 'Proceed to Checkout without Registering');
// End Checkout Without Account changes
// Eversun mod for sppc and qty price breaks
// define the email address that can change customer_group_id on login
define('SPPC_TOGGLE_LOGIN_PASSWORD', 'support@creloaded.com');
// Eversun mod for sppc and qty price breaks

define('LOGIN_TITLE1', 'Choose a Customer Group');
?>
