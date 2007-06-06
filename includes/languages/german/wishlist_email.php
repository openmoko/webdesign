<?php
/*
  $Id: wishlist_email.php,v 1 2003/11/20

  OS Commerce - Community Made Shopping!
  http://www.oscommerce.com

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
*/


define('NAVBAR_TITLE', 'Wunschliste versenden');
define('HEADING_TITLE', 'Schicken Sie den Wunschzettel an Ihre Freunde.');
define('FORM_TITLE_CUSTOMER_DETAILS', 'Ihre Informationen');
define('FORM_FIELD_CUSTOMER_NAME', 'Ihr Name:');
define('FORM_FIELD_CUSTOMER_EMAIL', 'Ihre Email Adresse:');
define('FORM_TITLE_FRIEND_DETAILS', 'Empf&auml;nger Informationen');
define('FORM_FIELD_FRIEND_NAME', 'Der Name Ihres Freundes');
define('FORM_FIELD_FRIEND_EMAIL', 'Die Email Adresse Ihres Freundes:');
define('FORM_TITLE_FRIEND_MESSAGE', 'Ihre Nachricht');
define('FORM_FIELD_TEXT_AREA', 'Meine Wunschliste:'. "\n\n");

define('FORM_FIELD_PRODUCTS', 'Products on my wish list'. "\n\n");


define('TEXT_EMAIL_SUCCESSFUL_SENT', 'Ihre Email zu <b>%s</b> wurde an <b>%s</b> erfoglrech versendet.');
define('TEXT_EMAIL_SUBJECT', 'Ihr Freund %s möchte Ihnen gerne seine Wunschliste %s zeigen.');
define('TEXT_EMAIL_INTRO', 'Hi %s!' . "\n\n" . 'Ihr Freund, %s, dachte, dass Sie seine Wunschliste bei %s %s sehen möchten.');
define('TEXT_EMAIL_SIGNATURE', 'Viele Grüße,' . "\n\n");
define('TEXT_EMAIL_LINK', 'To view the product click on the link below :' . "\n");
define('TEXT_EMAIL_LINK_TEXT', 'To view the product copy and paste the link into your web browser:' . "\n");

define('ERROR_TO_NAME', 'Error: Your friends name must not be empty.');
define('ERROR_TO_ADDRESS', 'Error: Your friends e-mail address must be a valid e-mail address.');
define('ERROR_FROM_NAME', 'Error: Your name must not be empty.');
define('ERROR_FROM_ADDRESS', 'Error: Your e-mail address must be a valid e-mail address.');
?>
