<?php
/*
  $Id: coupon_admin.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
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

define('TEXT_TO_REDEEM1', 'Puede amortizar este cup�n al finalizar el pedido. Simplemente introduzca el c�digo en el lugar previsto, y pulse en el bot�n de amortizar.');
define('TEXT_IN_CASE', ' en caso de tener alg�n problema. ');
define('TEXT_VOUCHER_IS', 'El c�digo del cup�n es ');
define('TEXT_REMEMBER', 'No pierda el c�digo del cup�n, gu�rdelo en lugar seguro para poder aprovecharse de esta oferta especial.');
define('TEXT_VISIT', 'cuando visite <a style="color: #000000" href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . STORE_NAME . '</a>' ."\n" .'(' . HTTP_SERVER . DIR_WS_CATALOG . ')');
define('TEXT_ENTER_CODE', ' e introduzca el c�digo ');
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">The Back Button has been DISABLED while HTML WYSIWG Editor is turned ON.</b></font> WHY? - Because if you click the back button to edit your HTML email, the PHP (php.ini - "Magic Quotes = On") will automatically add "\\\\\\\" backslashes everywhere Double Quotes " appear (HTML uses them in Links, Images and More) and this distorts the HTML, the pictures will dissapear once you submit the email again. If you turn OFF WYSIWYG Editor in Admin, the HTML Ability of osCommerce is also turned OFF and the back button will re-appear. A fix for this HTML and PHP issue would be nice if someone knows a solution.<br><br><b>If you really need to Preview your emails before sending them, use the Preview Button located on the WYSIWYG Editor.<br><HR>');
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">HTML is currently Disabled!</b></font><br><br>If you want to send HTML email, Enable WYSIWYG Editor for Email in: Admin-->Configuration-->WYSIWYG Editor-->Options<br>');

define('TEXT_OR_VISIT', 'or visit ');
define('TEXT_TO_REDEEM', ' To redeem this Discount coupon, please click on the link below. Please also write down the redemption code');
define('TEXT_WHICH_IS', ' which is ');
define('TEXT_IN_CASE', ' in case you have any problems.');


define('TEXT_COUPON_REDEEMED', 'Redeemed Coupons');
define('REDEEM_DATE_LAST', 'Date Last Redeemed');
define('COUPON_STATUS', 'Status');
define('COUPON_STATUS_HELP', 'Set to ' . IMAGE_ICON_STATUS_RED . ' to disable customers\' ability to use the coupon.');
define('COUPON_BUTTON_EMAIL_VOUCHER', 'Email Voucher');
define('COUPON_BUTTON_EDIT_VOUCHER', 'Edit Voucher');
define('COUPON_BUTTON_DELETE_VOUCHER', 'Delete Voucher');
define('COUPON_BUTTON_VOUCHER_REPORT', 'Voucher Report');

define('TABLE_HEADING_ACTION', 'Acci�n');

define('TEXT_HEADING_COUPON_REPORT', 'Coupon Report');

define('CUSTOMER_ID', 'ID del cliente');
define('CUSTOMER_NAME', 'Nombre del cliente');
define('REDEEM_DATE', 'Fecha de amortizaci�n');
define('IP_ADDRESS', 'Direcci�n IP');

define('TEXT_REDEMPTIONS', 'Amortizaciones');
define('TEXT_REDEMPTIONS_TOTAL', 'En total');
define('TEXT_REDEMPTIONS_CUSTOMER', 'Para este cliente');
define('TEXT_NO_FREE_SHIPPING', 'Portes debidos');

define('NOTICE_EMAIL_SENT_TO', 'Nota: Email enviado a: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Error: No se ha seleccionado a ning�n cliente.');
define('ERROR_NO_COUPON_AMOUNT', 'Error: No coupon amount has been entered. Either enter an amount or select free shipping.');
define('ERROR_COUPON_EXISTS', 'Error: A coupon with the same coupon code already exists.');

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


define('COUPON_NAME_HELP', 'Un apodo para el cup�n');
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


define('ALT_CONFIRM_DELETE_VOUCHER', 'Confirm Delete Voucher');
define('ALT_CANCEL', 'Cancel');
define('VIEW', 'View');
define('ALT_EMAIL_VOUCHER', 'Email Voucher');
define('ALT_EDIT_VOUCHER', 'Edit Voucher');
define('ALT_DELETE_VOUCHER', 'Delete Voucher');
define('ALT_VOUCHER_REPORT', 'Voucher Report');
define('COUPON_BUTTON_EMAIL_VOUCHER', 'Email Voucher');
define('COUPON_BUTTON_EDIT_VOUCHER', 'Edit Voucher');
define('COUPON_BUTTON_DELETE_VOUCHER', 'Delete Voucher');
define('COUPON_BUTTON_VOUCHER_REPORT', 'Voucher Report');
define('COUPON_BUTTON_PREVIEW', 'Preview');
define('COUPON_BUTTON_BACK', 'Back');
define('COUPON_STATUS', 'Status');
define('COUPON_STATUS_HELP', 'Set to ' . IMAGE_ICON_STATUS_RED . ' to disable customers\' ability to use the coupon.');
?>
