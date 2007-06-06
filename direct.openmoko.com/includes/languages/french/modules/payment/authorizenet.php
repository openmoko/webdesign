<?php
/*
  $Id: authorizenet.php,v 1.3 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License

*/

  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TITLE', 'Carte de crédit Via Authorize.net 1.7');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DESCRIPTION', 'No de carte de cr&eacute;dit test<br><br>CC# : 4111111111111111<br>Date d\'exiration : n\'importe');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TYPE', 'Type:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_OWNER', 'Propri&eacute;taire de la carte de cr&eacute;dit :');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_NUMBER', 'Num&eacute;ro de carte :');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_EXPIRES', 'Date d\'expiration carte :');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_TYPE', 'Type de carte:');
   define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_OWNER', '* Le nom du propriétaire de la carte de crédit doit avoir au moins  ' . CC_OWNER_MIN_LENGTH . ' caractères.\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CVV_LINK', 'What is it?');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_NUMBER', '* Le numéro de carte doit avoir au moins ' . CC_NUMBER_MIN_LENGTH . ' caractères.\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR_MESSAGE', 'Il y a eu une erreur lors du traitement de votre carte. Merci de r&eacute;essayer.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DECLINED_MESSAGE', 'Votre carte de cr&eacute;dit a &eacute;t&eacute; refus&eacute;e. Veuillez essayer une autre carte ou contactez votre banque pour plus d\'information.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR', 'Erreur carte de crédit !');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_CVV', '* Vous devez saisir un numéro CVV pour continuer.\n');
  define('TEXT_CCVAL_ERROR_CARD_TYPE_MISMATCH', 'La carte de crédit choisi ne correspond pas au numéro saisie. Veuillez vérifier le numéro et le type de carte de crédit et recommencer.');
  define('TEXT_CCVAL_ERROR_CVV_LENGTH', 'Le numéro CVV saisie est incorrect. Recommencer.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_AMEX', 'Amex');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DISCOVER', 'Discover');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_MASTERCARD', 'Mastercard');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_VISA', 'Visa');
  define('MODULE_PAYMENT_AUTHORIZENET_CVV_NUMBER', 'CVV number');
?>
