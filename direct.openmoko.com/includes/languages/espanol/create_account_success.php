<?php
/*
  $Id: create_account_success.php,v 1.1.1.1 2004/03/04 23:41:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Crear una Cuenta');
define('NAVBAR_TITLE_2', 'Exito');
define('HEADING_TITLE', 'Su cuenta ha sido creada!');

define('TEXT_ACCOUNT_CREATED', 'Congratulations, Your new account has been successfully created, You can now take advantage of member privileges to enhance your online shopping experience with us. If you have <small><b>ANY</b></small> questions about the operation of this online shop, please email the <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">store owner</a>.<P>
A confirmation email with a validation/activation code has been sent to the email address that you provided us with.<P>
You Must <b>Validate/Activate</b> Your Account Before You Can Login, Please Follow The Instructions In The Email That We Have Sent You.<P>
If you have not received this email within five minutes, one of two things has happened:<P>
1. Your Confirmation email was mistakenly sent to your "BULK MAIL" or "SPAM MAIL" folder by your Internet Service Provider, please check for it there.
<P> OR <P>2. You entered your email address in wrong, please double check it or re-sign up again for an account.
<P> If after you have checked those things, you still have not received a confirmation email please <U><a href="' . tep_href_link(FILENAME_CONTACT_US) . '">contact us</a></U> for assistence.');

define('TEXT_ACCOUNT_CREATED1', 'Congratulations, Your new account has been successfully created, You can now take advantage of member privileges to enhance your online shopping experience with us. If you have <small><b>ANY</b></small> questions about the operation of this online shop, please email the <a href="' . tep_href_link(FILENAME_CONTACT_US) . '">store owner</a> ' );
?>