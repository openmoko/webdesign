<?php
/*
  $Id: edit_orders.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Editar pedido');
define('HEADING_TITLE_NUMBER', 'Nr.');
define('HEADING_TITLE_DATE', 'of');
define('HEADING_SUBTITLE', 'Please edit all parts as desired and click on the "Update" button below.');
define('HEADING_TITLE_SEARCH', 'ID de pedido:');
define('HEADING_TITLE_STATUS', 'Estado:');
define('ADDING_TITLE', 'Añadir un producto al pedido');

define('CATEGORY_ORDER_DETAILS', 'Customer Details');
define('ENTRY_CURRENCY', 'Customer Currency');

define('ENTRY_UPDATE_TO_CC', '(Update to <b>Credit Card</b> to view CC fields.)');
define('HINT_DELETE_POSITION', '<font color="#FF0000">Hint: </font>To delete a product set its quantity to "0".');
define('HINT_TOTALS', '<font color="#FF0000">Hint: </font>Feel free to give discounts by adding negative amounts to the list.<br>Fields with "0" values are deleted when updating the order (exception: shipping).');
define('HINT_PRESS_UPDATE', 'Please click on "Update" to save all changes made above.');
define('TABLE_HEADING_COMMENTS', 'Comentarios');
define('TABLE_HEADING_CUSTOMERS', 'Clientes');
define('TABLE_HEADING_ORDER_TOTAL', 'Total del pedido');
define('TABLE_HEADING_DATE_PURCHASED', 'Fecha de compra');
define('TABLE_HEADING_STATUS', 'Estado');
define('TABLE_HEADING_ACTION', 'Acción');
define('TABLE_HEADING_QUANTITY', 'Cant.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Modelo');
define('TABLE_HEADING_PRODUCTS', 'Productos');
define('TABLE_HEADING_TAX', 'Impuesto');
define('TABLE_HEADING_TOTAL', 'Total');
define('TABLE_HEADING_UNIT_PRICE', 'Precio unitario');
define('TABLE_HEADING_BASE_PRICE', 'Base Price');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Price (incl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Precio total');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Total (incl.)');
define('TABLE_HEADING_TOTAL_MODULE', 'Total Price Component');
define('TABLE_HEADING_TOTAL_AMOUNT', 'Amount');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Cliente notificado');
define('TABLE_HEADING_DATE_ADDED', 'Fecha añadido');

define('ENTRY_CUSTOMER', 'Cliente:');
define('ENTRY_CUSTOMER_NAME', 'Name');
define('ENTRY_CUSTOMER_COMPANY', 'Company');
define('ENTRY_CUSTOMER_ADDRESS', 'Address');
define('ENTRY_CUSTOMER_SUBURB', 'Suburb');
define('ENTRY_CUSTOMER_CITY', 'City');
define('ENTRY_CUSTOMER_STATE', 'State');
define('ENTRY_CUSTOMER_POSTCODE', 'Postcode');
define('ENTRY_CUSTOMER_COUNTRY', 'Country');
define('ENTRY_CUSTOMER_PHONE', 'Phone');
define('ENTRY_CUSTOMER_EMAIL', 'E-Mail');
define('ENTRY_SOLD_TO', 'Vendido a:');
define('ENTRY_DELIVERY_TO', 'Facturado a:');
define('ENTRY_SHIP_TO', 'Enviado a:');
define('ENTRY_SHIPPING_ADDRESS', 'Dirección de envio:');
define('ENTRY_BILLING_ADDRESS', 'Dirección de facturación:');
define('ENTRY_PAYMENT_METHOD', 'Método de pago:');
define('ENTRY_CREDIT_CARD_TYPE', 'Tipo de tarjeta de crédito:');
define('ENTRY_CREDIT_CARD_OWNER', 'Propietario de la tarjeta:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Número de la tarjeta de crédito:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Fecha de caducidad de la tarjeta:');
define('ENTRY_CREDIT_CARD_CCV', 'CCV/CVC/CSC code: ');
define('ENTRY_CREDIT_CARD_START_DATE', 'Start Date: ');
define('ENTRY_CREDIT_CARD_ISSUE', 'Issue Number: ');
define('ENTRY_SUB_TOTAL', 'Sub-Total:');
define('ENTRY_TAX', 'Impuesto:');
define('ENTRY_SHIPPING', 'Portes:');
define('ENTRY_TOTAL', 'Total:');
define('ENTRY_DATE_PURCHASED', 'Fecha de compra:');
define('ENTRY_STATUS', 'Estado:');
define('ENTRY_DATE_LAST_UPDATED', 'Fecha de la última actualización:');
define('ENTRY_NOTIFY_CUSTOMER', 'Notificar al cliente:');
define('ENTRY_NOTIFY_COMMENTS', 'Añadir comentarios:');
define('ENTRY_PRINTABLE', 'Imprimir factura');
define('ENTRY_CUSTOMER_DISCOUNT', 'Utilizar un número negativo -1.00 ');
define('ENTRY_CUSTOMER_GV', 'Discount/Gift Voucher: ');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Eliminar pedido');
define('TEXT_INFO_DELETE_INTRO', '¿Está seguro de eliminar este pedido?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Recargar los productos en el stock');
define('TEXT_DATE_ORDER_CREATED', 'Fecha de creación:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Última modificacion:');
define('TEXT_DATE_ORDER_ADDNEW', 'Add New Product');
define('TEXT_INFO_PAYMENT_METHOD', 'Método de pago:');

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
define('TEXT_NO_ORDER_HISTORY', 'No hay histórico de pedidos');


define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Actualización de pedido');
define('EMAIL_TEXT_ORDER_NUMBER', 'Número de pedido:');
define('EMAIL_TEXT_INVOICE_URL', 'Factura detallada:');
define('EMAIL_TEXT_DATE_ORDERED', 'Fecha de pedido:');
define('EMAIL_TEXT_STATUS_UPDATE', 'Su pedido ha sido actualizado con el siguiente estado.' . "\n\n" . 'Nuevo estado: %s' . "\n\n" . 'Por favor responda a este email si tiene alguna duda o pregunta.' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Los comentarios para su pedido son' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Error: El pedido no existe.');
define('SUCCESS_ORDER_UPDATED', 'OK: El pedido ha sido actualizado.');
define('WARNING_ORDER_NOT_UPDATED', 'Atención: No hay ningún cambio. El pedido no ha sido actualizado.');

define('ADDPRODUCT_TEXT_CATEGORY_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_PRODUCT', 'Choose a product');
define('ADDPRODUCT_TEXT_PRODUCT_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_OPTIONS', 'Choose an option');
define('ADDPRODUCT_TEXT_OPTIONS_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_OPTIONS_NOTEXIST', 'Product has no options, so skipping...');
define('ADDPRODUCT_TEXT_CONFIRM_QUANTITY', 'pieces of this product');
define('ADDPRODUCT_TEXT_CONFIRM_ADDNOW', 'Add');
define('ADDPRODUCT_TEXT_STEP', 'Step');
define('ADDPRODUCT_TEXT_STEP1', ' &laquo; Choose a catalogue. ');
define('ADDPRODUCT_TEXT_STEP2', ' &laquo; Choose a product. ');
define('ADDPRODUCT_TEXT_STEP3', ' &laquo; Choose an option. ');

define('MENUE_TITLE_CUSTOMER', '1. Customer Data');
define('MENUE_TITLE_PAYMENT', '2. Payment Method');
define('MENUE_TITLE_ORDER', '3. Ordered Products');
define('MENUE_TITLE_TOTAL', '4. Discount, Shipping and Total');
define('MENUE_TITLE_STATUS', '5. Status and Notification');
define('MENUE_TITLE_UPDATE', '6. Update Data');

define('DONT_ADD_NEW_PRODUCT', 'No agregue el producto nuevo');
?>
