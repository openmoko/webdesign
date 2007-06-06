<?php
/*
  $Id: affiliate_payment.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  OSC-Affiliate
  
  Contribution based on:
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Paiement Partenaires');
define('HEADING_TITLE_SEARCH', 'Rechercher:');
define('HEADING_TITLE_STATUS','Status:');

define('TEXT_ALL_PAYMENTS','Tous les Paiements');
define('TEXT_NO_PAYMENT_HISTORY', 'Pas d\'historique des paiements');


define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_AFILIATE_NAME', 'Partenaires');
define('TABLE_HEADING_PAYMENT','Paiement (incl.)');
define('TABLE_HEADING_NET_PAYMENT','Paiement (excl.)');
define('TABLE_HEADING_DATE_BILLED','Date de paiement');
define('TABLE_HEADING_NEW_VALUE', 'Nouveau montant');
define('TABLE_HEADING_OLD_VALUE', 'Ancien montant');
define('TABLE_HEADING_AFFILIATE_NOTIFIED', 'Avertir Partenaire');
define('TABLE_HEADING_DATE_ADDED', 'Date d\'ajout');

define('TEXT_DATE_PAYMENT_BILLED','Factur&eacute; :');
define('TEXT_DATE_ORDER_LAST_MODIFIED','Derni&egrave;re modification :');
define('TEXT_AFFILIATE_PAYMENT','Montant des gains Partenaire');
define('TEXT_AFFILIATE_BILLED','Paiement le');
define('TEXT_AFFILIATE','Partenaire');

define('TEXT_INFO_HEADING_DELETE_PAYMENT','Supprimer le Paiement');
define('TEXT_INFO_DELETE_INTRO','Etes-vous sur de vouloir supprimer ce r&eacute;glement ?');
define('TEXT_DISPLAY_NUMBER_OF_PAYMENTS', 'Voir du <b>%d</b> au <b>%d</b> (sur <b>%d</b> paiements)');

define('TEXT_AFFILIATE_PAYING_POSSIBILITIES','Vous pouvez payer votre Partenaire par :');
define('TEXT_AFFILIATE_PAYMENT_CHECK','Ch&egrave;que :');
define('TEXT_AFFILIATE_PAYMENT_CHECK_PAYEE','Payable &agrave; :');
define('TEXT_AFFILIATE_PAYMENT_PAYPAL','PayPal :');
define('TEXT_AFFILIATE_PAYMENT_PAYPAL_EMAIL','Email du compte PayPal :');
define('TEXT_AFFILIATE_PAYMENT_BANK_TRANSFER','Virement :');
define('TEXT_AFFILIATE_PAYMENT_BANK_NAME','Nom de la banque :');
define('TEXT_AFFILIATE_PAYMENT_BANK_ACCOUNT_NAME','Nom du compte :');
define('TEXT_AFFILIATE_PAYMENT_BANK_ACCOUNT_NUMBER','Num&eacute;ro de compte :');
define('TEXT_AFFILIATE_PAYMENT_BANK_BRANCH_NUMBER','Code Banque :');
define('TEXT_AFFILIATE_PAYMENT_BANK_SWIFT_CODE','Code SWIFT :');

define('IMAGE_AFFILIATE_BILLING','D&eacute;marrer le Paiement');

define('ERROR_PAYMENT_DOES_NOT_EXIST','Le Paiement n\'existe pas');

define('SUCCESS_BILLING','Vos demandes de paiement de filiales ont été sucessfully produites');
define('SUCCESS_PAYMENT_UPDATED','Mise &agrave; jour du status du paiement effectu&eacute; avec succ&egrave;s');

define('PAYMENT_STATUS','Status des Paiement');
define('PAYMENT_NOTIFY_AFFILIATE', 'Avertir le Partenaire');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Mise à jour du paiement');
define('EMAIL_TEXT_AFFILIATE_PAYMENT_NUMBER', 'Paiement Num&eacute;ro :');
define('EMAIL_TEXT_INVOICE_URL', 'Facture D&eacute;taill&eacute;e:');
define('EMAIL_TEXT_PAYMENT_BILLED', 'Date facture');
define('EMAIL_TEXT_STATUS_UPDATE', 'Votre paiement a &eacute;t&eacute; mis à jour vers le statut suivant.' . "\n\n" . 'Nouveau statut : %s' . "\n\n" . 'Si vous avez des questions r&eacute;pondez à cet Email (R&eacute;pondre).' . "\n");
define('EMAIL_TEXT_NEW_PAYMENT', 'Une nouvelle facture est arriv&eacute;e à &eacute;ch&eacute;ance' . "\n");
?>
