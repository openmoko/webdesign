<?php
/*
  $Id: admin_members.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce
  Creload French Team for Creload 6.1
  Released under the GNU General Public License
*/

if ($HTTP_GET_VARS['gID']) {
  define('HEADING_TITLE', 'Groupes administration');
} elseif ($HTTP_GET_VARS['gPath']) {
  define('HEADING_TITLE', 'D&eacute;finir groupes');
} else {
  define('HEADING_TITLE', 'Membres administration');
}

define('TEXT_COUNT_GROUPS', 'Groupes : ');

define('TABLE_HEADING_NAME', 'Nom');
define('TABLE_HEADING_EMAIL', 'Adresse &eacute;lectronique');
define('TABLE_HEADING_PASSWORD', 'Mot de passe');
define('TABLE_HEADING_CONFIRM', 'Confirmer le mot de passe');
define('TABLE_HEADING_GROUPS', 'Niveau des groupes');
define('TABLE_HEADING_CREATED', 'Comptes cr&eacute;&eacute;s');
define('TABLE_HEADING_MODIFIED', 'Compte cr&eacute;&eacute;s');
define('TABLE_HEADING_LOGDATE', 'Dernier acc&egrave;s');
define('TABLE_HEADING_LOGNUM', 'LogNum');
define('TABLE_HEADING_LOG_NUM', 'Log N&deg;');
define('TABLE_HEADING_ACTION', 'Action');

define('TABLE_HEADING_GROUPS_NAME', 'Nom Groupes');
define('TABLE_HEADING_GROUPS_DEFINE', 'S&eacute;lection des boxes et des fichiers');
define('TABLE_HEADING_GROUPS_GROUP', 'Niveau');
define('TABLE_HEADING_GROUPS_CATEGORIES', 'Permission des cat&eacute;gories');


define('TEXT_INFO_HEADING_DEFAULT', 'Membre administration ');
define('TEXT_INFO_HEADING_DELETE', 'Effacer les permissions ');
define('TEXT_INFO_HEADING_EDIT', 'Editer les cat&eacute;gories / ');
define('TEXT_INFO_HEADING_NEW', 'Nouveau membre administration ');

define('TEXT_INFO_DEFAULT_INTRO', 'Groupe de membres');
define('TEXT_INFO_DELETE_INTRO', 'Supprimer <nobr><b>%s</b></nobr> des <nobr>membres administration ?</nobr>');
define('TEXT_INFO_DELETE_INTRO_NOT', 'Vous ne pouvez pas effacer le groupe <nobr>%s !</nobr>');
define('TEXT_INFO_EDIT_INTRO', 'D&eacute;finir le niveau de permission ici : ');

define('TEXT_INFO_FULLNAME', 'Nom : ');
define('TEXT_INFO_FIRSTNAME', 'Pr&eacute;nom : ');
define('TEXT_INFO_LASTNAME', 'Nom : ');
define('TEXT_INFO_EMAIL', 'Adresse &eacute;lectronique : ');
define('TEXT_INFO_PASSWORD', 'Mot de passe : ');
define('TEXT_INFO_CONFIRM', 'Confirmer le mot de passe : ');
define('TEXT_INFO_CREATED', 'Compte cr&eacute;&eacute; : ');
define('TEXT_INFO_MODIFIED', 'Compte modifi&eacute; : ');
define('TEXT_INFO_LOGDATE', 'Dernier acc&egrave;s : ');
define('TEXT_INFO_LOGNUM', 'N&deg; de log: ');
define('TEXT_INFO_GROUP', 'Niveau du groupe : ');
define('TEXT_INFO_ERROR', '<font color="red">Cette adresse &eacute;lectronique est d&eacute;j&agrave; utilis&eacute;e ! Veuillez r&eacute;essayer.</font>');

define('JS_ALERT_FIRSTNAME', '- Obligatoire : Pr&eacute;nom \n'); 
define('JS_ALERT_LASTNAME', '- Obligatoire : Nom \n'); 
define('JS_ALERT_EMAIL', '- Obligatoire : Adresse &eacute;lectronique \n'); 
define('JS_ALERT_EMAIL_FORMAT', '- Le format de votre adresse &eacute;lectronique est invalide ! \n'); 
define('JS_ALERT_EMAIL_USED', '- Cette adresse &eacute;lectronique est d&eacute;jà utilis&eacute;e ! \n');
define('JS_ALERT_LEVEL', '- Obligatoire : Membre du groupe \n');

define('ADMIN_EMAIL_SUBJECT', 'Nouveau membre administration');
define('ADMIN_EMAIL_TEXT', 'Hi %s,' . "\n\n" . 'Vous pouvez acc&eacute;der &agrave; la console d\'administration avec le mot de passe suivant. Une fois connecter à la partie admin, veuillez changer votre mot de passe!' . "\n\n" . 'Site Internet : %s' . "\n" . 'Nom d\'utilisateur : %s' . "\n" . 'Mot de passe : %s' . "\n\n" . 'Merci !' . "\n" . '%s' . "\n\n" . 'Ceci est un courrier automatique, Veuillez ne pas y r&eacute;pondre !'); 
define('ADMIN_EMAIL_EDIT_SUBJECT', 'Editer le profil du membre de l\'administration');
define('ADMIN_EMAIL_EDIT_TEXT', 'Hi %s,' . "\n\n" . 'Vos informations personnelles ont &eacute;t&eacute; mises &agrave; jour par un administrateur.' . "\n\n" . 'Site Internet : %s' . "\n" . 'Nom d\'utilisateur : %s' . "\n" . 'Mot de passe : %s' . "\n\n" . 'Merci !' . "\n" . '%s' . "\n\n" . 'Ceci est un courrier automatique, Veuillez ne pas y r&eacute;pondre!'); 

define('TEXT_INFO_HEADING_DEFAULT_GROUPS', 'Groupe administration ');
define('TEXT_INFO_HEADING_DELETE_GROUPS', 'Effacer le groupe ');

define('TEXT_INFO_DEFAULT_GROUPS_INTRO', '<b>NOTE :</b><li><b>Editer :</b> Edite le nom du groupe.</li><li><b>Effacer :</b> Efface le groupe.</li><li><b>D&eacute;finir :</b> D&eacute;finit les acc&egrave;s du groupe.</li>');
define('TEXT_INFO_DELETE_GROUPS_INTRO', 'Cela va &eacute;galement effacer tous les membres du groupe. Etes vous s&ucirc;r de vouloir effacer le groupe <nobr><b>%s</b> ?</nobr>');
define('TEXT_INFO_DELETE_GROUPS_INTRO_NOT', 'Vous ne pouvez pas effacer ce groupe!');
define('TEXT_INFO_GROUPS_INTRO', 'Donner un nom de groupe unique. Cliquer sur suivant pour soumettre.');

define('TEXT_INFO_HEADING_GROUPS', 'Nouveau groupe');
define('TEXT_INFO_GROUPS_NAME', ' <b>Nom du groupe :</b><br>Donner un nom de groupe unique. Ensuite, cliquer sur suivant pour soumettre.<br>');
define('TEXT_INFO_GROUPS_NAME_FALSE', '<font color="red"><b>ERREUR :</b> Le nom du groupe doit comporter au moins 5 caract&egrave;res!</font>');
define('TEXT_INFO_GROUPS_NAME_USED', '<font color="red"><b>ERREUR:</b> Le nom du group existe d&eacute;j&agrave; !</font>');
define('TEXT_INFO_GROUPS_LEVEL', 'Niveau du groupe: ');
define('TEXT_INFO_GROUPS_BOXES', '<b>Permissions des boxes :</b><br>Donne l\'acc&egrave;s aux boxes s&eacute;lectionn&eacute;es.');
define('TEXT_INFO_GROUPS_BOXES_INCLUDE', 'Inclure les fichiers contenus à l\'int&eacute;rieur : ');

define('TEXT_INFO_EDIT_GROUP_INTRO', 'Editer le nom du groupe: ');

define('TEXT_INFO_HEADING_DEFINE', 'D&eacute;finir le groupe');
if ($HTTP_GET_VARS['gPath'] == 1) {
  define('TEXT_INFO_DEFINE_INTRO', '<b>%s :</b><br>Vous ne pouvez pas changer les permissions des fichiers pour ce groupe.<br><br>');
} else {
  define('TEXT_INFO_DEFINE_INTRO', '<b>%s :</b><br>Changer les permissions de ce groupe en s&eacute;lectionnant et d&eacute;s&eacute;lectionnant les boxes et les fichiers fournis. Cliquer sur <b>Sauver</b> pour enregistrer les modifications.<br><br>');
}
?>
