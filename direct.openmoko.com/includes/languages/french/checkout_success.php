<?php
/*
  $Id: checkout_success.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Commande');
define('NAVBAR_TITLE_2', 'Succ&egrave;s');

define('HEADING_TITLE', 'Votre commande a &eacute;t&eacute; valid&eacute;e !');

define('TEXT_SUCCESS', 'Votre commande a &eacute;t&eacute; enregistr&eacute;e avec succ&egrave;s ! Vos produits arriveront &agrave; destination d\'ici 2 à 5 jours ouvrables.');
define('TEXT_NOTIFY_PRODUCTS', 'Veuillez m\'avertir des mises &agrave; jour des produits que j\'ai s&eacute;lectionn&eacute;s ci-dessous :');
define('TEXT_SEE_ORDERS', 'Vous pouvez consulter l\'historique de vos commandes en allant à la page <a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">\'Mon compte\'</a> et en cliquant sur <a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, '', 'SSL') . '">\'Historique\'</a>.');
define('TEXT_CONTACT_STORE_OWNER', 'Pour toutes questions, veuillez vous adresser au <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">responsable de la boutique en ligne</a>.');
define('TEXT_THANKS_FOR_SHOPPING', 'Merci d\'avoir effectu&eacute; vos achats en ligne chez nous !');

define('TABLE_HEADING_COMMENTS', 'Ajouter un commentaire à propos de la commande trait&eacute;e');

define('TABLE_HEADING_DOWNLOAD_DATE', 'Date d\'expiration : ');
define('TABLE_HEADING_DOWNLOAD_COUNT', ' t&eacute;l&eacute;chargements restant.');
define('HEADING_DOWNLOAD', 'T&eacute;l&eacute;charger vos produits ici :');
define('FOOTER_DOWNLOAD', 'Vous pouvez aussi t&eacute;l&eacute;charger vos produits ult&eacute;rieurement à \'%s\'');

define('PAYPAL_NAVBAR_TITLE_2_OK', 'Succ&egrave;s'); // PAYPALIPN
define('PAYPAL_NAVBAR_TITLE_2_PENDING', 'Vote commande est en cours de traitement.'); // PAYPALIPN
define('PAYPAL_NAVBAR_TITLE_2_FAILED', 'Echec du paiement!'); // PAYPALIPN
define('PAYPAL_HEADING_TITLE_OK', 'Votre commande a &eacute;t&eacute; trait&eacute;e avec succ&egrave;s !'); // PAYPALIPN
define('PAYPAL_HEADING_TITLE_PENDING', 'Vote commande est en cours de traitement'); // PAYPALIPN
define('PAYPAL_HEADING_TITLE_FAILED', 'Echec du paiement!'); // PAYPALIPN
define('PAYPAL_TEXT_SUCCESS_OK', 'Votre commande a &eacute;t&eacute; trait&eacute;e avec succ&egrave;s ! Vos produits arriveront &agrave; destination d\'ici 2 à 5 jours ouvr&eacute;s.'); // PAYPALIPN
define('PAYPAL_TEXT_SUCCESS_PENDING', 'Vote commande est en cours de traitement.'); // PAYPALIPN
define('PAYPAL_TEXT_SUCCESS_FAILED', 'Echec du paiement! V&eacute;rifiez que les informations Paypal sont correctes.'); // PAYPALIPN
?>