<?php
/*
  $Id: coupon_restrict.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('TOP_BAR_TITLE', 'Estadísticas');
define('HEADING_TITLE', 'Cupones de descuento');
define('HEADING_TITLE_STATUS', 'Estado : ');
define('TEXT_CUSTOMER', 'Cliente:');
define('TEXT_COUPON', 'Nombre del cupón');
define('TEXT_COUPON_ALL', 'Todos los cupones');
define('TEXT_COUPON_ACTIVE', 'Cupones activos');
define('TEXT_COUPON_INACTIVE', 'Cupones inactivos');
define('TEXT_SUBJECT', 'Tema:');
define('TEXT_FROM', 'De:');
define('TEXT_FREE_SHIPPING', 'Portes gratis');
define('TEXT_MESSAGE', 'Mensaje:');
define('TEXT_SELECT_CUSTOMER', 'Seleccionar cliente');
define('TEXT_ALL_CUSTOMERS', 'Todos los clientes');
define('TEXT_NEWSLETTER_CUSTOMERS', 'A todos los suscriptores de las noticias');
define('TEXT_CONFIRM_DELETE', '¿Está seguro de que quiere eliminar este cupón?');

define('TEXT_TO_REDEEM', 'Puede amortizar este cupón al finalizar el pedido. Simplemente introduzca el código en el lugar previsto, y pulse en el botón de amortizar.');
define('TEXT_IN_CASE', ' en caso de tener algún problema. ');
define('TEXT_VOUCHER_IS', 'El código del cupón es ');
define('TEXT_REMEMBER', 'No pierda el código del cupón, guárdelo en lugar seguro para poder aprovecharse de esta oferta especial.');
define('TEXT_VISIT', 'cuando visite ' . HTTP_SERVER . DIR_WS_CATALOG);
define('TEXT_ENTER_CODE', ' e introduzca el código ');

define('TABLE_HEADING_ACTION', 'Acción');



define('NOTICE_EMAIL_SENT_TO', 'Nota: Email enviado a: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Error: No se ha seleccionado a ningún cliente.');
define('COUPON_NAME', 'Nombre del cupón');
//define('COUPON_VALUE', 'Valor del cupón');
define('COUPON_AMOUNT', 'Cantidad del cupón');
define('COUPON_CODE', 'Código del cupón');
define('COUPON_STARTDATE', 'Fecha de inicio');
define('COUPON_FINISHDATE', 'Fecha de final');
define('COUPON_FREE_SHIP', 'Portes gratis');
define('COUPON_DESC', 'Descripción del cupón');
define('COUPON_MIN_ORDER', 'Pedido mímino');
define('COUPON_USES_COUPON', 'Usos por cupón');
define('COUPON_USES_USER', 'Usos por cliente');
define('COUPON_PRODUCTS', 'Lista de productos válidos');
define('COUPON_CATEGORIES', 'Lista de categorías válidas');
define('VOUCHER_NUMBER_USED', 'Veces que se ha usado');
define('DATE_CREATED', 'Fecha de creación');
define('DATE_MODIFIED', 'Fecha de modificación');
define('TEXT_HEADING_NEW_COUPON', 'Crear un nuevo cupón');
define('TEXT_NEW_INTRO', 'Por favor, rellene la siguiente información para el nuevo cupón.<br>');


define('COUPON_NAME_HELP', 'Un nombre para el cupón');
define('COUPON_AMOUNT_HELP', 'El valor del descuento con este cupón, puede ser fijo o un porcentaje del total del pedido.');
define('COUPON_CODE_HELP', 'Puede incluir su propio código aquí, o dejarlo en blanco para que se autogenere uno.');
define('COUPON_STARTDATE_HELP', 'Fecha a partir de la que el cupón es válido');
define('COUPON_FINISHDATE_HELP', 'Fecha en la que caducará el cupón');
define('COUPON_FREE_SHIP_HELP', 'El cupón da portes gratuítos en un pedido. Nota. Esto sobrepasa el valor de coupon_amount pero respeta el valor del pedido mínimo');
define('COUPON_DESC_HELP', 'Una descripción del cupón para el cliente');
define('COUPON_MIN_ORDER_HELP', 'Valor mínimo de pedido antes de que se active el cupón');
define('COUPON_USES_COUPON_HELP', 'Máximo número de veces que se puede utilizar el cupón, déjese en blanco si no se quiere límite.');
define('COUPON_USES_USER_HELP', 'Número de veces que un mismo usuario puede utilizar el cupón, déjese en blanco si no se quiere límite.');
define('COUPON_PRODUCTS_HELP', 'Una lista de los product_ids, separados por comas, con los que se puede utilizar este cupón. Déjese en blanco si no se quieren restricciones.');
define('COUPON_CATEGORIES_HELP', 'Una lista de los cpaths, separados por comas, con los que se puede utilizar este cupón. Déjese en blanco si no se quieren restricciones.');
?>
