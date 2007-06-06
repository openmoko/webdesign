<?php
/*
  $Id: login.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('NAVBAR_TITLE', 'Login');
  define('HEADING_TITLE', 'Welcome, Please Sign In');

define('HEADING_RETURNING_ADMIN', 'Login Panel:');
define('HEADING_PASSWORD_FORGOTTEN', 'Password forgotten:');
define('TEXT_RETURNING_ADMIN', 'Staff only!');
define('ENTRY_EMAIL_ADDRESS', 'Email Address:');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_FIRSTNAME', 'First Name:');
define('IMAGE_BUTTON_LOGIN', 'Submit');

define('TEXT_PASSWORD_FORGOTTEN', 'Password forgotten?');

define('TEXT_LOGIN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> Wrong username or password!');
define('TEXT_FORGOTTEN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> First name or email do not match!');
define('TEXT_FORGOTTEN_FAIL', '<font color="#ff0000"><b>You have tried more than 3 times. For security reasons, please contact the Webmaster to get a new password.</b></font>');
define('TEXT_FORGOTTEN_SUCCESS', '<b>The new password has been sent to your Email address. Please check your Email and click Back to login again.</b>');

define('ADMIN_EMAIL_SUBJECT', 'New Password');
define('ADMIN_EMAIL_TEXT', 'Hi %s,' . "\n\n" . 'You can access the admin panel with the following password. Once you accessed the admin, please change your password immediately!' . "\n\n" . 'Website: %s' . "\n" . 'Username: %s' . "\n" . 'Password: %s' . "\n\n" . 'Thanks!' . "\n" . '%s' . "\n\n" . 'This is a system automated response, please do not reply, as your answer would be unread!');
?>
