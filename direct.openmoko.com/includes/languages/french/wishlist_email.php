<?php
/*
  $Id: wishlist_email.php,v 1 2003/11/20

  OS Commerce - Community Made Shopping!
  http://www.oscommerce.com

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
*/


define('NAVBAR_TITLE', 'Envoyer votre liste à un ami');
define('HEADING_TITLE', 'Envoyer votre liste à un ami.');
define('FORM_TITLE_CUSTOMER_DETAILS', 'Vos d&eacute;tails personnels');
define('FORM_FIELD_CUSTOMER_NAME', 'Votre Nom:');
define('FORM_FIELD_CUSTOMER_EMAIL', 'Votre Adresse Email:');
define('FORM_TITLE_FRIEND_DETAILS', 'Coordonn&eacute;es de votre ami');
define('FORM_FIELD_FRIEND_NAME', 'Nom de votre ami:');
define('FORM_FIELD_FRIEND_EMAIL', 'Adresse Email de votre ami:');
define('FORM_TITLE_FRIEND_MESSAGE', 'Votre message');
define('FORM_FIELD_TEXT_AREA', 'Ma liste contient:'. "\n\n");

define('FORM_FIELD_PRODUCTS', 'Products on my wish list'. "\n\n");


define('TEXT_EMAIL_SUCCESSFUL_SENT', 'Your email has been successfully sent to <b>%s</b> at the email adress <b>%s</b>.');
define('TEXT_EMAIL_SUBJECT', 'Votre ami %s veut partager sa liste de chez %s');
define('TEXT_EMAIL_INTRO', 'Bonjour %s,' . "\n\n" . '%s a cr&eacute;er une liste chez%s %s et il souhaiterais la partager avec vous.');
define('TEXT_EMAIL_SIGNATURE', 'Cordialement,' . "\n\n");
define('TEXT_EMAIL_LINK', 'To view the product click on the link below :' . "\n");
define('TEXT_EMAIL_LINK_TEXT', 'To view the product copy and paste the link into your web browser:' . "\n");

define('ERROR_TO_NAME', 'Error: Your friends name must not be empty.');
define('ERROR_TO_ADDRESS', 'Error: Your friends e-mail address must be a valid e-mail address.');
define('ERROR_FROM_NAME', 'Error: Your name must not be empty.');
define('ERROR_FROM_ADDRESS', 'Error: Your e-mail address must be a valid e-mail address.');
?>