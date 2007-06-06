<?php
/*
  $Id: login.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Connexion');
define('HEADING_TITLE', 'Bienvenue, signez vous SVP !');

define('HEADING_RETURNING_ADMIN', 'Panneau de connexion :');
define('HEADING_PASSWORD_FORGOTTEN', 'Mot de passe oubli&eacute; :');
define('TEXT_RETURNING_ADMIN', 'Personnel seulement !');
define('ENTRY_EMAIL_ADDRESS', 'Adresse Email :');
define('ENTRY_PASSWORD', 'Mot de passe :');
define('ENTRY_FIRSTNAME', 'Pr&eacute;nom :');
define('IMAGE_BUTTON_LOGIN', 'Confirmer');

define('TEXT_PASSWORD_FORGOTTEN', 'Mot de passe oubli&eacute; ?');

define('TEXT_LOGIN_ERROR', '<font color="#ff0000"><b>ERREUR :</b></font> Mauvais email ou mot de passe !');
define('TEXT_FORGOTTEN_ERROR', '<font color="#ff0000"><b>ERREUR :</b></font> Probl&egrave;me de pr&eacute;nom ou de mot de passe !');
define('TEXT_FORGOTTEN_FAIL', 'Vous avez que 3 essais pour des raisons de s&eacute;curit&eacute;, contactez SVP votre administrateur pour obtenir un nouveau mot de passe.<br>&nbsp;<br>&nbsp;');
define('TEXT_FORGOTTEN_SUCCESS', 'Le nouveau mot de passe va &ecirc;tre envoy&eacute; &agrave; votre adresse email. Veuillez v&eacute;rifier votre email et essayer de vous reconnecter.<br>&nbsp;<br>&nbsp;');

define('ADMIN_EMAIL_SUBJECT', 'Nouveau mot de passe'); 
define('ADMIN_EMAIL_TEXT', 'Bonjour %s,' . "\n\n" . 'Vous pouvez acc&eacute;der au panneau d\'administration avec le mot de passe suivant. Une fois que vous acc&eacute;dez à l\'administration, changez svp votre mot de passe ! ' . "\n\n" . 'Site Web : %s' . "\n" . 'Nom d\'utilisateur : %s' . "\n" . 'Mot de passe: %s' . "\n\n" . 'Merci !' . "\n" . '%s' . "\n\n" . 'Ceci est un message automatis&eacute;, veuillez ne pas repondre !'); 
?>
