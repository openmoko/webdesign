<?php
/*
  $Id: admin_account.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce
  Creload French Team for Creload 6.1
  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Compte Administrateur');

define('TABLE_HEADING_ACCOUNT', 'Mon compte');

define('TEXT_INFO_FULLNAME', '<b>Nom : </b>');
define('TEXT_INFO_FIRSTNAME', '<b>Pr&eacute;nom : </b>');
define('TEXT_INFO_LASTNAME', '<b>Nom : </b>');
define('TEXT_INFO_EMAIL', '<b>Adresse &eacute;lectronique : </b>');
define('TEXT_INFO_PASSWORD', '<b>Mot de passe: </b>');
define('TEXT_INFO_PASSWORD_HIDDEN', '-Masqu&eacute;-');
define('TEXT_INFO_PASSWORD_CONFIRM', '<b>Confirmer le mot de passe : </b>');
define('TEXT_INFO_CREATED', '<b>Comptes cr&eacute;&eacute;s: </b>');
define('TEXT_INFO_LOGDATE', '<b>Dernier acc&egrave;s: </b>');
define('TEXT_INFO_LOGNUM', '<b>Num&eacute;ro de log : </b>');
define('TEXT_INFO_GROUP', '<b>Niveau du groupe: </b>');
define('TEXT_INFO_ERROR', '<font color="red">Cette adresse &eacute;lectronique est d&eacute;j&agrave; utilis&eacute;e! Veuillez r&eacute;essayer.</font>');
define('TEXT_INFO_MODIFIED', 'Modifi&eacute; : ');

define('TEXT_INFO_HEADING_DEFAULT', 'Editer le compte ');
define('TEXT_INFO_HEADING_CONFIRM_PASSWORD', 'Confirmation Mot de Passe ');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD', 'Mot de Passe :');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD_ERROR', '<font color="red"><b>ERROR:</b> Mot de Passe erron&eacute;!</font>');
define('TEXT_INFO_INTRO_DEFAULT', 'Cliquer <b>bouton &eacute;dition</b> ci-dessous pour faire des changements sur votre compte.');
define('TEXT_INFO_INTRO_DEFAULT_FIRST_TIME', '<br><b>ATTENTION :</b><br>Bonjour <b>%s</b>, C\'est votre premi&egrave;re visite ici. Nous vous conseillons de changer votre mot de passe!');
define('TEXT_INFO_INTRO_DEFAULT_FIRST', '<br><b>ATTENTION :</b><br>Bonjour <b>%s</b>, Nous vous recommandons de changer votre adresse &eacute;lectronique (<font color="red">admin@localhost</font>) et votre mot de passe!');
define('TEXT_INFO_INTRO_EDIT_PROCESS', 'Tous les champs sont obligatoires. Cliquer sur sauver pour soumettre le formulaire.');

define('JS_ALERT_FIRSTNAME', '- Obligatoire : Pr&eacute;nom \n'); 
define('JS_ALERT_LASTNAME', '- Obligatoire : Nom \n'); 
define('JS_ALERT_EMAIL', '- Obligatoire : Adresse &eacute;lectronique \n'); 
define('JS_ALERT_PASSWORD',         '- Obligatoire: Mot de Passe \n');
define('JS_ALERT_FIRSTNAME_LENGTH', '- La longueur du Pr&eacute;nom doit être sup&eacute;rieur à  ');
define('JS_ALERT_LASTNAME_LENGTH',  '- La longueur du Nom doit être sup&eacute;rieur à ');
define('JS_ALERT_PASSWORD_LENGTH',  '- La longueur du Mot de Passe doit être sup&eacute;rieur à ');
define('JS_ALERT_EMAIL_FORMAT', '- Le format de votre adresse &eacute;lectronique est invalide ! \n'); 
define('JS_ALERT_EMAIL_USED', '- Cette adresse &eacute;lectronique est d&eacute;jà utilis&eacute;e ! \n'); 
define('JS_ALERT_PASSWORD_CONFIRM', '- Miss typing in Password Confirmation field! \n');

define('ADMIN_EMAIL_SUBJECT', 'Changement des informations personnelles');
define('ADMIN_EMAIL_TEXT', 'Hi %s,' . "\n\n" . 'Vos informations personnelles, pouvant inclure votre mot de passe, ont &eacute;t&eacute; chang&eacute;es.  Si ces changements ont &eacute;t&eacute; effectu&eacute;s &agrave; votre insu ou sans votre approbation, veuillez contacter l\'administrateur imm&eacute;diatement !' . "\n\n" . 'Site Internet : %s' . "\n" . 'Username : %s' . "\n" . 'Mot de passe : %s' . "\n\n" . 'Merci !' . "\n" . '%s' . "\n\n" . 'Ceci est une r&eacute;ponse automatique, Veuillez ne pas r&eacute;pondre &agrave; ce courrier &eacute;lectronique!'); 

define('JS_ALERT_FIRSTNAME_1','- Firstname length must over ');
define('JS_ALERT_LASTNAME_1','- Firstname length must over ');
define('JS_ALERT_ERROR','The following error(s) occurred:');

?>
