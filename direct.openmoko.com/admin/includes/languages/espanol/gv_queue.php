<?php
/*
  $Id: gv_queue.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Cola de salida de cheques regalo');

define('TABLE_HEADING_CUSTOMERS', 'Clientes');
define('TABLE_HEADING_ORDERS_ID', 'Núm. de pedido');
define('TABLE_HEADING_VOUCHER_VALUE', 'Valor del cheque');
define('TABLE_HEADING_DATE_PURCHASED', 'Fecha de compra');
define('TABLE_HEADING_ACTION', 'Acción');

define('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'Recientemente ha comprado un cheque regalo en nuestra tienda.' . "\n"
                                          . 'Por razones de seguridad no ha estado disponible de forma inmediata.' . "\n"
                                          . 'De todas formas la cantidad ya está liberada. Puede visitar nuestra tienda' . "\n"
                                          . 'y enviar el valor vía email a quien quiera.' . "\n\n");

define('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', 'El/Los cheque(s) regalo que ha comprado tienen un valor de %s' . "\n\n");

define('TEXT_REDEEM_COUPON_MESSAGE_BODY', '');
define('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', '');
define('TEXT_REDEEM_COUPON_SUBJECT', 'Compra de cheques regalo');
?>