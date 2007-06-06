<?php
/*
  $Id: login.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

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

define('NAVBAR_TITLE', 'Identification');

define('HEADING_TITLE', 'Ouvrez une session, ouvrez un compte <br> ou faites directement un achat.');

define('HEADING_NEW_CUSTOMER', 'Nouveau client');
define('TEXT_NEW_CUSTOMER', 'Je suis un nouveau client.');
define('TEXT_NEW_CUSTOMER_INTRODUCTION', 'En cr&eacute;ant un compte sur ' . STORE_NAME . ' vous pourrez faire vos achats plus rapidement, garder votre panier d\'une visite à l\'autre et suivre vos commandes.');
define('HEADING_RETURNING_CUSTOMER', 'Client enregistr&eacute;');
define('TEXT_RETURNING_CUSTOMER', 'J\'ai d&eacute;jà command&eacute;.');

define('TEXT_PASSWORD_FORGOTTEN', 'Mot de passe oubli&eacute;&nbsp;? Cliquez ici.');

define('TEXT_LOGIN_ERROR', 'Erreur&nbsp;: Aucune correspondance pour l\'adresse email et/ou le mot de passe.');
define('TEXT_VISITORS_CART', '<font color="#ff0000"><b>Note&nbsp;:</b></font> Le contenu de votre &quot;Panier visiteur&quot; sera ajout&eacute; au contenu de votre &quot;Panier membre&quot; une fois que vous vous serez identifi&eacute;. <a href="javascript:session_win();">[Plus d\'information]</a>');
// Begin Checkout Without Account v0.70 changes

define('PWA_FAIL_ACCOUNT_EXISTS', 'Un compte existe d&eacute;jà avec cette adresse Email {EMAIL_ADDRESS}.  Vous devez vous connecter sur ce compte avec le mot de passe appropri&eacute;.');
// Begin Checkout Without Account v0.60 changes
define('HEADING_CHECKOUT', '<font size="2">Faire directement votre achat</font>');
define('TEXT_CHECKOUT_INTRODUCTION', 'En choisissant cette option, vous ouvrez un compte provisoire qui sera d&eacute;truit de nos serveurs d&egrave;s votre commande pass&eacute;e, vous ne serez pas capable de v&eacute;rifier le statut de votre commande pas plus que vous ne pourrez consulter vos commandes ant&eacute;rieures.');
define('PROCEED_TO_CHECKOUT', 'Je veux faire un achat sans ouvrir de compte.');
// End Checkout Without Account changes
// Eversun mod for sppc and qty price breaks
// define the email address that can change customer_group_id on login
define('SPPC_TOGGLE_LOGIN_PASSWORD', 'support@creloaded.com');
// Eversun mod for sppc and qty price breaks

define('LOGIN_TITLE1', 'Choose a Customer Group');
?>