<?php
/*
  $Id: customers.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

$user_ip = getenv('REMOTE_ADDR');;

define('HEADING_TITLE', 'Erneut Best&auml;tigungsemail versenden');
define('TEXT_EMAIL_CONFIRMATION','Sind Sie sicher, dass die Bestätigungsemail versendet werden soll');
define('ENTRY_EMAIL_ADDRESS', 'Emailadresse: ');
define('SUCCESS_REGISTRATION_CODE_SENT', 'Neue Best&auml;tigungsemail verschickt');
define('TEXT_NO_EMAIL_ADDRESS_FOUND', 'Diese Email-Anschrift ist nicht registriert');
define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - Ihr Best&auml;tigungskode lautet');
define('EMAIL_PASSWORD_REMINDER_BODY', "\n\n".'Erneutes versenden Ihres Bestätigungskode.' . "\n\n" . 'Ihr Bestätigungskode für \'' . STORE_NAME . '\' :' . "\n\n" . '%s' . "\n\n");
define('EMAIL_PASSWORD_REMINDER_BODY2', 'Folgen Sie dem Link um Ihre Konto zu best&auml;tigen;: %s' . "\n\n");
define('TEXT_ACCOUNT_ALREADY_EXIST', 'This Account is already active!');
define('IMAGE_BUTTON_BACK',"Go Back");
?>
