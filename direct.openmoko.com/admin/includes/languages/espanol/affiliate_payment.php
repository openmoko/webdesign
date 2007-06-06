<?php
/*
  $Id: affiliate_payment.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  OSC-Affiliate
  
  Contribution based on:
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Pagos a asociados');
define('HEADING_TITLE_SEARCH', 'Buscar:');
define('HEADING_TITLE_STATUS','Estado:');

define('TEXT_ALL_PAYMENTS','Todos los pagos');
define('TEXT_NO_PAYMENT_HISTORY', 'No hay histórico de pagos');

define('TABLE_HEADING_ACTION', 'Acción');
define('TABLE_HEADING_STATUS', 'Estado');
define('TABLE_HEADING_AFILIATE_NAME', 'Asociado');
define('TABLE_HEADING_PAYMENT','Pago (incl.)');
define('TABLE_HEADING_NET_PAYMENT','Pago (excl.)');
define('TABLE_HEADING_DATE_BILLED','Fecha de facturación');
define('TABLE_HEADING_NEW_VALUE', 'Nuevo valor');
define('TABLE_HEADING_OLD_VALUE', 'Valor anterior');
define('TABLE_HEADING_AFFILIATE_NOTIFIED', 'Asociado notificado');
define('TABLE_HEADING_DATE_ADDED', 'Fecha añadido');

define('TEXT_DATE_PAYMENT_BILLED','Facturado:');
define('TEXT_DATE_ORDER_LAST_MODIFIED','Ultima modificación:');
define('TEXT_AFFILIATE_PAYMENT','Pago ganado por el asociado');
define('TEXT_AFFILIATE_BILLED','Día de pago');
define('TEXT_AFFILIATE','Asociado');

define('TEXT_INFO_HEADING_DELETE_PAYMENT', 'Eliminar pago');
define('TEXT_INFO_DELETE_INTRO','¿Está seguro de que quiere eliminar este pago?');
define('TEXT_DISPLAY_NUMBER_OF_PAYMENTS', 'Mostrando desde <b>%d</b> a <b>%d</b> (de <b>%d</b> pagos)');

define('TEXT_AFFILIATE_PAYING_POSSIBILITIES','Puede pagar a su asociado por:');
define('TEXT_AFFILIATE_PAYMENT_CHECK','Cheque:');
define('TEXT_AFFILIATE_PAYMENT_CHECK_PAYEE','Pagable a:');
define('TEXT_AFFILIATE_PAYMENT_PAYPAL','PayPal:');
define('TEXT_AFFILIATE_PAYMENT_PAYPAL_EMAIL','Email en cuenta PayPal:');
define('TEXT_AFFILIATE_PAYMENT_BANK_TRANSFER','Transferencia:');
define('TEXT_AFFILIATE_PAYMENT_BANK_NAME','Nombre del banco:');
define('TEXT_AFFILIATE_PAYMENT_BANK_ACCOUNT_NAME','Nombre de la cuenta:');
define('TEXT_AFFILIATE_PAYMENT_BANK_ACCOUNT_NUMBER','Número de la cuenta:');
define('TEXT_AFFILIATE_PAYMENT_BANK_BRANCH_NUMBER','Número ABA/BSB (branch number):');
define('TEXT_AFFILIATE_PAYMENT_BANK_SWIFT_CODE','Código SWIFT:');

define('IMAGE_AFFILIATE_BILLING','Iniciar el motor de facturación');

define('ERROR_PAYMENT_DOES_NOT_EXIST','El pago no existe');

define('SUCCESS_BILLING','Sus peticiones del pago de los afiliados sucessfully se han generado');
define('SUCCESS_PAYMENT_UPDATED','El estado del pago se ha actualizado correctamente');

define('PAYMENT_STATUS','Estado de pagos');
define('PAYMENT_NOTIFY_AFFILIATE', 'Notificar al asociado');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Actualización de pago');
define('EMAIL_TEXT_AFFILIATE_PAYMENT_NUMBER', 'Número de pago:');
define('EMAIL_TEXT_INVOICE_URL', 'Factura detallada:');
define('EMAIL_TEXT_PAYMENT_BILLED', 'Fecha de facturación');
define('EMAIL_TEXT_STATUS_UPDATE', 'Su pago se ha actualizado de acuerdo al siguiente estado.' . "\n\n" . 'Nuevo estado: %s' . "\n\n" . 'Por favor responda a este email si tiene alguna pregunta.' . "\n");
define('EMAIL_TEXT_NEW_PAYMENT', 'Le ha llegado una nueva factura a sus pagos' . "\n");
?>
