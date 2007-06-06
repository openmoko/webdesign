<?php
/*
  $Id: links.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Liens');
define('HEADING_TITLE_SEARCH', 'Recherche:');

define('TABLE_HEADING_TITLE', 'Titre');
define('TABLE_HEADING_URL', 'URL');
define('TABLE_HEADING_CLICKS', 'Clics');
define('TABLE_HEADING_STATUS', 'Statut');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_INFO_HEADING_DELETE_LINK', 'Supprimer Lien');
define('TEXT_INFO_HEADING_CHECK_LINK', 'Valider Lien');

define('TEXT_DELETE_INTRO', 'Etes vous sur de vouloir supprimer ce lien ?');

define('TEXT_INFO_LINK_CHECK_RESULT', 'R&eacute;sultat de la validation lien:');
define('TEXT_INFO_LINK_CHECK_FOUND', 'Trouv&eacute;');
define('TEXT_INFO_LINK_CHECK_NOT_FOUND', 'Non trouv&eacute;');
define('TEXT_INFO_LINK_CHECK_ERROR', 'Erreur à la lecture URL');


define('TEXT_INFO_LINK_STATUS', 'Statut:');
define('TEXT_INFO_LINK_CATEGORY', 'Cat&eacute;gorie:');
define('TEXT_INFO_LINK_CONTACT_NAME', 'Nom du Contact:');
define('TEXT_INFO_LINK_CONTACT_EMAIL', 'Email du Contact:');
define('TEXT_INFO_LINK_CLICK_COUNT', 'Cliques:');
define('TEXT_INFO_LINK_DESCRIPTION', 'Description:');
define('TEXT_DATE_LINK_CREATED', 'Lien cr&eacute;&eacute;:');
define('TEXT_DATE_LINK_LAST_MODIFIED', 'Derni&egrave;re modification:');
define('TEXT_IMAGE_NONEXISTENT', 'L\'IMAGE N\'EXISTE PAS');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Mise à jour de l\'&eacute;tat du lien');
define('EMAIL_TEXT_STATUS_UPDATE', 'Cher %s,' . "\n\n" . 'l\'&eacute;tat de votre lien chez ' . STORE_NAME . ' a &eacute;t&eacute; mis à jour.' . "\n\n" . 'Nouveau statut : %s' . "\n\n" . 'SVP, r&eacute;pondez à ce message si vous avez des questions.' . "\n");

// VJ todo - move to common language file
define('CATEGORY_WEBSITE', 'D&eacute;tails du site WEB');
define('CATEGORY_RECIPROCAL', 'D&eacute;tails de la page r&eacute;ciproque');
define('CATEGORY_OPTIONS', 'Options');

define('ENTRY_LINKS_TITLE', 'Titre du lien:');
define('ENTRY_LINKS_TITLE_ERROR', 'Le titre du lien doit contenir un minimum de ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_URL', 'URL du lien:');
define('ENTRY_LINKS_URL_ERROR', 'URL du lien doit contenir un minimum de ' . ENTRY_LINKS_URL_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_CATEGORY', 'Cat&eacute;gorie:');
define('ENTRY_LINKS_DESCRIPTION', 'Description:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'La Description doit contenir un minimum de ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_IMAGE', 'Image URL:');
define('ENTRY_LINKS_CONTACT_NAME', 'Nom complet:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Votre nom complet doit contenir un minimum de ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_RECIPROCAL_URL', 'URL de la page r&eacute;ciproque:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'URL de la page r&eacute;ciproque doit contenir un minimum de ' . ENTRY_LINKS_URL_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_STATUS', 'Statut:');
define('ENTRY_LINKS_NOTIFY_CONTACT', 'Notification du Contact:');
define('ENTRY_LINKS_RATING', 'Classement:');
define('ENTRY_LINKS_RATING_ERROR', 'Le classement ne peut pas &ecirc;tre vide.');

define('TEXT_DISPLAY_NUMBER_OF_LINKS', 'Affichage <b>%d</b> à <b>%d</b> (sur <b>%d</b> liens)');

define('IMAGE_NEW_LINK', 'Nouveau Lien');
define('IMAGE_CHECK_LINK', 'Valider Lien');

define('ALL', 'All');
define('LINKS_MANAGER_CHECKED_LINKS', 'Links Manager - Checked Links');
define('ASC', 'Asc');
define('DESC', 'Desc');
define('START_AT', 'Start at:');
define('HOW_MANY', 'How many?');
?>
