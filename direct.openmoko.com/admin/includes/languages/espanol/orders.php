<?php
/*
  $Id: orders.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Trasnlated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/
define('TABLE_HEADING_EDIT_ORDERS', 'To modify the order');

define('HEADING_TITLE', 'Pedidos');
define('HEADING_IS_TITLE', 'IS Order');
define('HEADING_IS_RECEIPT', 'IS Receipt');
define('HEADING_TITLE_SEARCH', 'ID de pedido:');
define('HEADING_TITLE_STATUS', 'Estado:');

define('ENTRY_UPDATE_TO_CC', '(Update to <b>Credit Card</b> to view CC fields.)');
define('TABLE_HEADING_COMMENTS', 'Comentarios');
define('TABLE_HEADING_CUSTOMERS', 'Clientes');
define('TABLE_HEADING_ORDERID', 'Order ID');
define('TABLE_HEADING_IS_ORDERNUM', 'IS Order');
define('TABLE_HEADING_ORDER_TOTAL', 'Total del pedido');
define('TABLE_HEADING_DATE_PURCHASED', 'Fecha de compra');
define('TABLE_HEADING_STATUS', 'Estado');
define('TABLE_HEADING_ACTION', 'Acción');
define('TABLE_HEADING_QUANTITY', 'Cantidad');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Modelo');
define('TABLE_HEADING_PRODUCTS', 'Productos');
define('TABLE_HEADING_TAX', 'Impuestos');
define('TABLE_HEADING_TOTAL', 'Total');
define('TABLE_HEADING_BASE_PRICE', 'Base Price'); 

define('TABLE_HEADING_PRICE_EXCLUDING_TAX', 'Precio (ex)');
define('TABLE_HEADING_PRICE_INCLUDING_TAX', 'Precio (inc)');
define('TABLE_HEADING_TOTAL_EXCLUDING_TAX', 'Total (ex)');
define('TABLE_HEADING_TOTAL_INCLUDING_TAX', 'Total (inc)');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Cliente notificado');
define('TABLE_HEADING_DATE_ADDED', 'Añadido el');

//begin PayPal_Shopping_Cart_IPN
define('TABLE_HEADING_PAYMENT_STATUS', 'Estado del pago');
//end PayPal_Shopping_Cart_IPN
define('ENTRY_SUBURB', 'Suburb :');
define('ENTRY_CITY', 'City :');
define('ENTRY_CUSTOMER', 'Cliente:');
define('ENTRY_STATE', 'State :');
define('ENTRY_SOLD_TO', 'VENDIDO A:');
define('ENTRY_TELEPHONE', 'Entery Telephone :');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail Address:');
define('ENTRY_DELIVERY_TO', 'Entregar a:');
define('ENTRY_SHIP_TO', 'Enviar a:');
define('ENTRY_SHIPPING_ADDRESS', 'Dirección de envío:');
define('ENTRY_BILLING_ADDRESS', 'Dirección de facturación:');
define('ENTRY_PAYMENT_METHOD', 'Forma de pago:');
define('ENTRY_CREDIT_CARD_TYPE', 'Tipo de tarjeta de crédito:');
define('ENTRY_CREDIT_CARD_OWNER', 'Titular de la tarjeta crédito:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Número de la tarjeta crédito:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Caducidad de la tarjeta crédito:');
define('ENTRY_CREDIT_CARD_CCV', 'CCV Code:');
define('ENTRY_CREDIT_CARD_START_DATE', 'Start Date: ');
define('ENTRY_CREDIT_CARD_ISSUE', 'Issue Number: ');
define('ENTRY_SUB_TOTAL', 'Subtotal:');
define('ENTRY_TAX', 'Impuestos:');
define('ENTRY_SHIPPING', 'Gastos de envío:');
define('ENTRY_TOTAL', 'Total:');
define('ENTRY_DATE_PURCHASED', 'Fecha de compra:');
define('ENTRY_STATUS', 'Estado:');
define('ENTRY_DATE_LAST_UPDATED', 'Última modificación:');
define('ENTRY_NOTIFY_CUSTOMER', 'Notificar cliente:');
define('ENTRY_NOTIFY_COMMENTS', 'Añadir comentarios:');
define('ENTRY_PRINTABLE', 'Imprimir factura');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Eliminar pedido');
define('TEXT_INFO_DELETE_INTRO', '¿Seguro que quiere eliminar este pedido?');
define('TEXT_INFO_DELETE_DATA', 'Nombre del cliente  ');
define('TEXT_INFO_DELETE_DATA_OID', 'Número de pedido  ');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Devolver productos al almacen');
define('TEXT_DATE_ORDER_CREATED', 'Añadido el:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Última modificación:');
define('TEXT_INFO_PAYMENT_METHOD', 'Forma de pago:');
define('TEXT_INFO_ABANDONDED', 'Abandoned');
define('TEXT_CARD_ENCRPYT', '<font color=green> </b> This CC number is stored Encrypted </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC number is not stored Encrypted </b></font>');
define('TEXT_EXPIRES_ENCRPYT', '<font color=green> </b> This CC expire date is stored Encrypted </b></font>');
define('TEXT_EXPIRES_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC expire date is not stored Encrypted </b></font>');
define('TEXT_CCV_ENCRPYT', '<font color=green> </b> This CC CCV is stored Encrypted </b></font>');
define('TEXT_CCV_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC CCV is not stored Encrypted If blank ignore this message</b></font>');

define('TEXT_EXPIRES_REMOVED', '<font color=green> </b> This CC expire date has been removed from the store.</b></font>');
define('TEXT_CCV_REMOVED', '<font color=green> </b> This CCV is not store or has been removed from the store.</b></font>');
define('TEXT_CARD__REMOVED', '<font color=green> </b> This CC number is not store or has been removed from the store.</b></font>');


define('ENTRY_IPADDRESS', 'IP Address:');
define('ENTRY_IPISP', 'ISP:');

define('TEXT_ALL_ORDERS', 'Todos los pedidos');
define('TEXT_NO_ORDER_HISTORY', 'No hay archivo histórico');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Actualización del pedido');
define('EMAIL_TEXT_ORDER_NUMBER', 'Número de pedido:');
define('EMAIL_TEXT_INVOICE_URL', 'Factura detallada:');
define('EMAIL_TEXT_DATE_ORDERED', 'Fecha del pedido:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Su pedido ha sido actualizado al siguiente estado.' . "\n\n" . 'Nuevo estado: %s' . "\n\n" . 'Por favor responda a este email si tiene alguna pregunta que hacer.' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Los comentarios sobre su pedido son' . "\n\n%s\n\n");

// begin replacement section for Email Subject contribution
define('EMAIL_TEXT_SUBJECT_1', ' ' . STORE_NAME. ' Order Updated');
define('EMAIL_TEXT_SUBJECT_2', ':  ');


define('ORDER', 'Order #');
define('ORDER_DATE_TIME', 'Order Date & Time');

// end replacement section for Email Subject contribution
define('ERROR_ORDER_DOES_NOT_EXIST', 'Error: No existe pedido.');
define('SUCCESS_ORDER_UPDATED', 'OK: Pedido actualizado correctamente.');
define('WARNING_ORDER_NOT_UPDATED', 'Atención: No se ha actualizado el pedido, no había nada que actualizar.');
?>
