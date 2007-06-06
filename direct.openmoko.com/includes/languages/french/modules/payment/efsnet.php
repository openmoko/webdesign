<?php
/*
  $Id: efsnet.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
  define('MODULE_PAYMENT_EFSNET_TEXT_TITLE', 'EFSNet');
  define('MODULE_PAYMENT_EFSNET_TEXT_DESCRIPTION', 'Information Test Carte de cr&eacute;dit:<br><br>CC#: 4111111111111111<br>Expire : Jamais');
  define('MODULE_PAYMENT_EFSNET_TEXT_TYPE', 'Type:');
  define('MODULE_PAYMENT_EFSNET_TEXT_CREDIT_CARD_OWNER', 'Propri&eacute;taire de la carte de crédit:');
  define('MODULE_PAYMENT_EFSNET_TEXT_CREDIT_CARD_NUMBER', 'Num&eacute;ro carte de cr&eacute;dit :');
  define('MODULE_PAYMENT_EFSNET_TEXT_CREDIT_CARD_EXPIRES', 'Date expiration carte de cr&eacute;dit :');
  define('MODULE_PAYMENT_EFSNET_TEXT_JS_CC_OWNER', '* Le Nom du proprietaire de la carte de cr&eacute;dit doit contenir au moins ' . CC_OWNER_MIN_LENGTH . ' caract&egrave;res.\n');
  define('MODULE_PAYMENT_EFSNET_TEXT_JS_CC_NUMBER', '* Le Num&eacute;ro de carte de cr&eacute;dit doit avoir au moins ' . CC_NUMBER_MIN_LENGTH . ' caract&egrave;res.\n');
  define('MODULE_PAYMENT_EFSNET_TEXT_ERROR_MESSAGE', 'Une erreur est survenue pendant le traitement de votre carte de cr&eacute;dit. Veuillez recommencer.');
  define('MODULE_PAYMENT_EFSNET_TEXT_DECLINED_MESSAGE', 'Votre carte de cr&eacute;dit a &eacute;t&eacute; refus&eacute;e. Veuillez recommencer avec une autre carte de cr&eacute;dit ou contacter votre banque pour avoir plus d\'informations.');
  define('MODULE_PAYMENT_EFSNET_TEXT_ERROR', 'Erreur Carte de Cr&eacute;dit!');
?>
