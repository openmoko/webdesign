<?php
/*
  $Id: geotrust.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce / Paul Kim

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_GEOTRUST_TEXT_TITLE', 'Paiement express GeoTrust');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_DESCRIPTION', 'Informations Tests pour carte de cr&eacute;dit:<br><br>N°#: 4445999922225<br>Expire: jamais');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_ERROR', 'Erreur carte de cr&eacute;dit !');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_ERROR_MESSAGE', 'Une erreur est survenue pendant le traitement de votre carte de cr&eacute;dit. Veuillez recommencer.');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_CREDIT_CARD_OWNER_FIRST_NAME', 'Pr&eacute;nom :');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_CREDIT_CARD_OWNER_LAST_NAME', 'Nom :');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_CREDIT_CARD_OWNER', 'Nom complet :');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_CREDIT_CARD_NUMBER', 'Num&eacute;ro de carte de cr&eacute;dit :');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_CREDIT_CARD_EXPIRES', 'Date d\'expiration carte de cr&eacute;dit :');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_CREDIT_CARD_CVV2', 'Valeur v&eacute;rification de carte :');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_CREDIT_CARD_CVV2_LOCATION', '(Les 3 derniers chiffres, présents au dos de votre carte de cr&eacute;dit)');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_JS_CC_OWNER', '* Le nom de propriétaire de la carte doit contenir au moins ' . CC_OWNER_MIN_LENGTH . ' caratères.\n');
  define('MODULE_PAYMENT_GEOTRUST_TEXT_JS_CC_NUMBER', '* Le numéro de carte de crédit doit comporter au moins ' . CC_NUMBER_MIN_LENGTH . ' caractères.\n');

?>