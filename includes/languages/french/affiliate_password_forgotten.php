<?php
/*
  $Id: affiliate_password_forgotten.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  OSC-Affiliate

  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Connexion');
define('NAVBAR_TITLE_2', 'Mot de passe de partenaire oubli&eacute;');
define('HEADING_TITLE', 'J\ai oubli&eacute; mon mot de passe de partenaire !');
define('TEXT_NO_EMAIL_ADDRESS_FOUND', '<font color="#ff0000"><b>NOTE:</b></font> Cette adresse E-Mail n\'a pas &eacute;t&eacute; trouv&eacute;e parmi nos inscrits. Essayez de nouveau, merci.');
define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - Nouveau mot de passe de partenaire');
define('EMAIL_PASSWORD_REMINDER_BODY', 'Un nouveau mot de passe de partenaire a &eacute;t&eacute; demand&eacute; par ' . $REMOTE_ADDR . '.' . "\n\n" . 'Votre nouveau mot de passe de partenaire pour le site \'' . STORE_NAME . '\' est :' . "\n\n" . '   %s' . "\n\n");
define('TEXT_PASSWORD_SENT', 'Un nouveau mot de passe de partenaire a &eacute;t&eacute; envoy&eacute; &agrave; votre adresse E-mail');
?>