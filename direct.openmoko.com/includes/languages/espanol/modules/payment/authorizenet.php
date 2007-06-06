<?php
/*
  $Id: authorizenet.php,v 1.3 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License

 */

  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TITLE', 'Authorize.net');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DESCRIPTION', 'Tarjeta de Cr&eacute;dito para Pruebas:<br><br>Numero: 4111111111111111<br>Caducidad: Cualquiera');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TYPE', 'Tipo de Tarjeta:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_OWNER', 'Titular de la Tarjeta:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_NUMBER', 'N&uacute;mero de la Tarjeta:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_EXPIRES', 'Fecha de Caducidad:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CREDIT_CARD_TYPE', 'Credit Card Type:');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_OWNER', '* El nombre del titular de la tarjeta de cr&eacute;dito debe de tener al menos ' . CC_OWNER_MIN_LENGTH . ' caracteres.\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CVV_LINK', 'What is it?');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_NUMBER', '* El n&uacute;mero de la tarjeta de credito debe de tener al menos ' . CC_NUMBER_MIN_LENGTH . ' numeros.\n');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR_MESSAGE', 'Ha ocurrido un error procesando su tarjeta de cr&eacute;dito. Por favor, int&eacute;ntelo de nuevo.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DECLINED_MESSAGE', 'Su tarjeta ha sido denegada. Pruebe con otra tarjeta o consulte con su banco.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_ERROR', 'Error en Tarjeta de Cr&eacute;dito!');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_JS_CC_CVV', '* You must enter a CVV number to proceed.\n');
  define('TEXT_CCVAL_ERROR_CARD_TYPE_MISMATCH', 'The credit card type you\'ve chosen does not match the credit card number entered. Please check the number and credit card type and try again.');
  define('TEXT_CCVAL_ERROR_CVV_LENGTH', 'The CVV number entered is incorrect. Please try again.');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_AMEX', 'Amex');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DISCOVER', 'Discover');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_MASTERCARD', 'Mastercard');
  define('MODULE_PAYMENT_AUTHORIZENET_TEXT_VISA', 'Visa');
  define('MODULE_PAYMENT_AUTHORIZENET_CVV_NUMBER', 'CVV number');
?>
