<?php
/*
  $Id: affiliate_signup.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  OSC-Affiliate

  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Partnerprogramm');
define('HEADING_TITLE', 'Anmeldung zu unserem Partnerprogramm');

define('MAIL_AFFILIATE_SUBJECT', 'Willkommen zum Partnerprogramm von' . STORE_NAME);
define('MAIL_GREET_NONE', 'Dear %s' . "\n\n");//em001
define('MAIL_AFFILIATE_HEADER', 'Sehr geehrter Partner

Vielen Dank für Ihre Anmeldung bei unserem Partnerprogramm.

Ihre Anmeldeinformationen:
***********************'."\n\n");
define('MAIL_AFFILIATE_ID', 'Ihre Partner-ID ist: ');
define('MAIL_AFFILIATE_USERNAME', 'Ihr Benutzername ist: ');
define('MAIL_AFFILIATE_PASSWORD', 'Ihr Passwort ist: ');
define('MAIL_AFFILIATE_LINK', 'Melden Sie sich hier an: ');
define('MAIL_AFFILIATE_FOOTER', 'Wir freuen uns auf eine gute Zusammenarbeit mit Ihnen!'."\n\n".'Ihr Partnerprogramm Team');
?>