<?php
/*
  $Id: banner_manager.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Gestion Banni&egrave;re');

define('TABLE_HEADING_BANNERS', 'Banni&egrave;res');
define('TABLE_HEADING_GROUPS', 'Groupes');
define('TABLE_HEADING_STATISTICS', 'Affichages / Clics');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_BANNERS_TITLE', 'Titre Banni&egrave;re:');
define('TEXT_BANNERS_URL', 'URL Banni&egrave;re:');
define('TEXT_BANNERS_GROUP', 'Groupe Banni&egrave;re:');
define('TEXT_BANNERS_NEW_GROUP', ', ou entrer un nouveau groupe ci-dessous');
define('TEXT_BANNERS_IMAGE', 'Image:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', ou entrer un nom de fichier image ci-dessous');
define('TEXT_BANNERS_IMAGE_TARGET', 'Image Cible (Sauver vers):');
define('TEXT_BANNERS_HTML_TEXT', 'Textes HTML:');
define('TEXT_BANNERS_EXPIRES_ON', 'Expires On:');
define('TEXT_BANNERS_OR_AT', ', or at');
define('TEXT_BANNERS_IMPRESSIONS', 'impressions/views.');
define('TEXT_BANNERS_SCHEDULED_AT', 'Scheduled At:');
define('TEXT_BANNERS_BANNER_NOTE', '<b>Banner Notes:</b><ul><li>Use an image or HTML text for the banner - not both.</li><li>HTML Text has priority over an image</li></ul>');
define('TEXT_BANNERS_INSERT_NOTE', '<b>Image Notes:</b><ul><li>Uploading directories must have proper user (write) permissions setup!</li><li>Do not fill out the \'Save To\' field if you are not uploading an image to the webserver (ie, you are using a local (serverside) image).</li><li>The \'Save To\' field must be an existing directory with an ending slash (eg, banners/).</li></ul>');
define('TEXT_BANNERS_EXPIRCY_NOTE', '<b>Expiry Notes:</b><ul><li>Only one of the two fields should be submitted</li><li>If the banner is not to expire automatically, then leave these fields blank</li></ul>');
define('TEXT_BANNERS_SCHEDULE_NOTE', '<b>Schedule Notes:</b><ul><li>If a schedule is set, the banner will be activated on that date.</li><li>All scheduled banners are marked as deactive until their date has arrived, to which they will then be marked active.</li></ul>');

define('TEXT_BANNERS_DATE_ADDED', 'Date d\'ajout :');
define('TEXT_BANNERS_SCHEDULED_AT_DATE', 'Planifi&eacute; &agrave; : <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_DATE', 'Expire le : <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', 'Expire au bout de : <b>%s</b> affichages');
define('TEXT_BANNERS_STATUS_CHANGE', 'Changement de l\'&eacute;tat : %s');

define('TEXT_BANNERS_DATA', 'D<br>A<br>T<br>A');
define('TEXT_BANNERS_LAST_3_DAYS', 'Les derniers 3 jours');
define('TEXT_BANNERS_BANNER_VIEWS', 'Nombre d\'impressions');
define('TEXT_BANNERS_BANNER_CLICKS', 'Nombre de clics');

define('TEXT_INFO_DELETE_INTRO', 'Etes vous sur de vouloir d&eacute;truire cette banni&egrave;re ?');
define('TEXT_INFO_DELETE_IMAGE', 'Effacer l\'image de la banni&egrave;re');

define('SUCCESS_BANNER_INSERTED', 'Succ&egrave;s : La banni&egrave;re a &eacute;t&eacute; ins&eacute;r&eacute;e.');
define('SUCCESS_BANNER_UPDATED', 'Succ&egrave;s : La banni&egrave;re a &eacute;t&eacute; mise à jour.');
define('SUCCESS_BANNER_REMOVED', 'Succ&egrave;s : La banni&egrave;re a &eacute;t&eacute; retir&eacute;e.');
define('SUCCESS_BANNER_STATUS_UPDATED', 'Succ&egrave;s : Le status de la banni&egrave;re a &eacute;t&eacute; mis à jour.');

define('ERROR_BANNER_TITLE_REQUIRED', 'Erreur : Un titre est requis pour la banni&egrave;re.');
define('ERROR_BANNER_GROUP_REQUIRED', 'Erreur : Un groupe est requis pour la banni&egrave;re.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Erreur : Le r&eacute;pertoire de destination n\'existe pas : %s');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Erreur : L\'ecriture sur la cible a &eacute;chou&eacute; : %s');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'Erreur : L\'image n\'existe pas.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Erreur : L\'image ne peut &ecirc;tre retir&eacute;e.');
define('ERROR_UNKNOWN_STATUS_FLAG', 'Erreur : Statut inconnu.');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', 'Erreur : Le r&eacute;pertoire Graphs n\'existe pas. Veuillez cr&eacute;er un r&eacute;pertoire \'graphs\' dans \'images\'.');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'Erreur : Impossible d\'&eacute;crire dans le r&eacute;pertoire Graphs.');
define('DATE_FORMAT', '(dd/mm/yyyy)');
?>