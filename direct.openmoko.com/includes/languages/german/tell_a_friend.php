<?php
/*
  $Id: tell_a_friend.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Artikel weiterempfehlen');

define('HEADING_TITLE', 'Empfehlen Sie \'%s\' weiter');

define('FORM_TITLE_CUSTOMER_DETAILS', 'Ihre Angaben');
define('FORM_TITLE_FRIEND_DETAILS', 'Angaben Ihres Freundes');
define('FORM_TITLE_FRIEND_MESSAGE', 'Ihre Nachricht (wird mit der Empfehlung versendet)');

define('FORM_FIELD_CUSTOMER_NAME', 'Ihr Name:');
define('FORM_FIELD_CUSTOMER_EMAIL', 'Ihre Email-Adresse:');
define('FORM_FIELD_FRIEND_NAME', 'Name Ihres Freundes:');
define('FORM_FIELD_FRIEND_EMAIL', 'Email-Adresse Ihres Freundes:');

define('TEXT_EMAIL_SUCCESSFUL_SENT', 'Ihre Email &uuml;ber <b>%s</b> wurde gesendet an <b>%s</b>.');

define('TEXT_EMAIL_SUBJECT', 'Ihr Freund %s, hat diesen Artikel gefunden, und zwar hier: %s');
define('TEXT_EMAIL_INTRO', 'Hallo %s!' . "\n\n" . 'Ihr Freund, %s, hat diesen Artikelt %s bei %s gefunden.');
define('TEXT_EMAIL_LINK', 'Um den Artikel anzusehen, klicken Sie bitte auf den Link oder kopieren diesen und fügen Sie ihn in der Adress-Zeile Ihres Browsers ein:' . "\n\n" . '%s');
define('TEXT_EMAIL_LINK_ARTICLE', 'To view the article click on the link below or copy and paste the link into your web browser:' . "\n\n");
define('TEXT_EMAIL_LINK_TEXT', 'To view the product copy and paste the link into your web browser:' . "\n\n");
define('TEXT_EMAIL_LINK_ARTICLE_TEXT', 'To view the article copy and paste the link into your web browser:' . "\n\n");

define('TEXT_EMAIL_SIGNATURE', 'Mit freundlichen Grüssen,' . "\n\n");

define('ERROR_TO_NAME', 'Fehler: Der Empf&auml;ngername darf nicht leer sein.');
define('ERROR_TO_ADDRESS', 'Fehler: Die Empf&auml;nger-Email-Adresse darf nicht leer sein.');
define('ERROR_FROM_NAME', 'Fehler: Der Absendername (Ihr Name) muss angegeben werden.');
define('ERROR_FROM_ADDRESS', 'Fehler: Die Absenderadresse muss eine g&uuml;ltige Email-Adresse sein.');
?>
