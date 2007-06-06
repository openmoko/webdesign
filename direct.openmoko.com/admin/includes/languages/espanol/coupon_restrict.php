<?php
/*
  $Id: coupon_restrict.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('TOP_BAR_TITLE', 'Estad�sticas');
define('HEADING_TITLE', 'Cupones de descuento');
define('HEADING_TITLE_STATUS', 'Estado : ');
define('TEXT_CUSTOMER', 'Cliente:');
define('TEXT_COUPON', 'Nombre del cup�n');
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
define('TEXT_CONFIRM_DELETE', '�Est� seguro de que quiere eliminar este cup�n?');

define('TEXT_TO_REDEEM', 'Puede amortizar este cup�n al finalizar el pedido. Simplemente introduzca el c�digo en el lugar previsto, y pulse en el bot�n de amortizar.');
define('TEXT_IN_CASE', ' en caso de tener alg�n problema. ');
define('TEXT_VOUCHER_IS', 'El c�digo del cup�n es ');
define('TEXT_REMEMBER', 'No pierda el c�digo del cup�n, gu�rdelo en lugar seguro para poder aprovecharse de esta oferta especial.');
define('TEXT_VISIT', 'cuando visite ' . HTTP_SERVER . DIR_WS_CATALOG);
define('TEXT_ENTER_CODE', ' e introduzca el c�digo ');

define('TABLE_HEADING_ACTION', 'Acci�n');



define('NOTICE_EMAIL_SENT_TO', 'Nota: Email enviado a: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Error: No se ha seleccionado a ning�n cliente.');
define('COUPON_NAME', 'Nombre del cup�n');
//define('COUPON_VALUE', 'Valor del cup�n');
define('COUPON_AMOUNT', 'Cantidad del cup�n');
define('COUPON_CODE', 'C�digo del cup�n');
define('COUPON_STARTDATE', 'Fecha de inicio');
define('COUPON_FINISHDATE', 'Fecha de final');
define('COUPON_FREE_SHIP', 'Portes gratis');
define('COUPON_DESC', 'Descripci�n del cup�n');
define('COUPON_MIN_ORDER', 'Pedido m�mino');
define('COUPON_USES_COUPON', 'Usos por cup�n');
define('COUPON_USES_USER', 'Usos por cliente');
define('COUPON_PRODUCTS', 'Lista de productos v�lidos');
define('COUPON_CATEGORIES', 'Lista de categor�as v�lidas');
define('VOUCHER_NUMBER_USED', 'Veces que se ha usado');
define('DATE_CREATED', 'Fecha de creaci�n');
define('DATE_MODIFIED', 'Fecha de modificaci�n');
define('TEXT_HEADING_NEW_COUPON', 'Crear un nuevo cup�n');
define('TEXT_NEW_INTRO', 'Por favor, rellene la siguiente informaci�n para el nuevo cup�n.<br>');


define('COUPON_NAME_HELP', 'Un nombre para el cup�n');
define('COUPON_AMOUNT_HELP', 'El valor del descuento con este cup�n, puede ser fijo o un porcentaje del total del pedido.');
define('COUPON_CODE_HELP', 'Puede incluir su propio c�digo aqu�, o dejarlo en blanco para que se autogenere uno.');
define('COUPON_STARTDATE_HELP', 'Fecha a partir de la que el cup�n es v�lido');
define('COUPON_FINISHDATE_HELP', 'Fecha en la que caducar� el cup�n');
define('COUPON_FREE_SHIP_HELP', 'El cup�n da portes gratu�tos en un pedido. Nota. Esto sobrepasa el valor de coupon_amount pero respeta el valor del pedido m�nimo');
define('COUPON_DESC_HELP', 'Una descripci�n del cup�n para el cliente');
define('COUPON_MIN_ORDER_HELP', 'Valor m�nimo de pedido antes de que se active el cup�n');
define('COUPON_USES_COUPON_HELP', 'M�ximo n�mero de veces que se puede utilizar el cup�n, d�jese en blanco si no se quiere l�mite.');
define('COUPON_USES_USER_HELP', 'N�mero de veces que un mismo usuario puede utilizar el cup�n, d�jese en blanco si no se quiere l�mite.');
define('COUPON_PRODUCTS_HELP', 'Una lista de los product_ids, separados por comas, con los que se puede utilizar este cup�n. D�jese en blanco si no se quieren restricciones.');
define('COUPON_CATEGORIES_HELP', 'Una lista de los cpaths, separados por comas, con los que se puede utilizar este cup�n. D�jese en blanco si no se quieren restricciones.');
?>
