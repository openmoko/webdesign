<?php
/*
  $Id: order_edit_espanol.php,v 1.3 2004/09/08 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0

  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2004 osCommerce

  Released under the GNU General Public License
*/


define('HEADING_STEP2', 'Paso 2 - Escoja la forma de pago y de envío para el nuevo pedido #');
define('HEADING_INSTRUCT1', '¡¡¡ INSTRUCCIONES !!!');
define('HEADING_INSTRUCT2', 'Nota: Si edita las cantidades de productos del<br>
              pedido no se actualizará el stock con esos cambios.<br>
          Así que debe asegurarse de realizar esos cambios de<br>
          forma manual en la sección de edición.<br>');
define('HEADING_STEP3', 'Paso 3 - AÑADIR UN PRODUCTO NUEVO');
define('HEADING_SHIPPING', 'Foma de envío:');

define('TEXT_ADD_PROD_STEP1', 'PASO 1:');
define('TEXT_ADD_STEP2', 'PASO 2:');
define('TEXT_ADD_STEP3', 'PASO 3:');
define('TEXT_ADD_STEP4', 'PASO 4:');

define('TEXT_ADD_PROD', 'Añadir producto ');
define('TEXT_SELECT_PROD', 'Seleccionar este producto');

define('TEXT_ADD_CAT_CHOOSE', '--- ESCOJA UNA CATEGORÍA ---\n');
define('TEXT_SELECT_CAT', 'Seleccionar esta categoría');
define('TEXT_ADD_PROD_CHOOSE', 'Añadir producto ');

define('TEXT_SELECT_OPT', 'Seleccionar opciones');
define('TEXT_SELECT_OPT_SKIP', 'No hay opciones para este producto');

define('TEXT_ADD_QUANTITY', ' Cantidad');
define('TEXT_ADD_NOW', '¡Añadir ahora!');
define('TEXT_VIEW_CC', ' Para ver los campos CC');
define('TEXT_VIEW_PO', ' Para ver los campos PO');

define('TEXT_INFO_PO', 'Información PO:');
define('TEXT_INFO_NAME', 'Nombre de la cuenta:');
define('TEXT_INFO_AC_NR', 'Número de cuenta:');
define('TEXT_INFO_PO_NR', 'Número de pedido de compra:');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Por favor seleccione');
define('TYPE_BELOW', 'Escriba debajo');

define('JS_ERROR', '¡Hubo errores procesando su ficha!\nPor favor haga las siguientes correciones:\n\n');

define('JS_GENDER', '* El campo \'Género\' es necesario.\n');
define('JS_FIRST_NAME', '* El campo \'Nombre\' debe tener al menos ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caracteres.\n');
define('JS_LAST_NAME', '* El campo \'Apellidos\' debe tener al menos ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caracteres.\n');
define('JS_DOB', '* El campo \'Fecha de nacimiento\' debe tener el formato: xx/xx/xxxx (dia/mes/año).\n');
define('JS_EMAIL_ADDRESS', '* El campo \'Dirección de e-mail\' debe tener al menos ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caracteres.\n');
define('JS_ADDRESS', '* El campo \'Dirección postal\' debe tener al menos ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caracteres.\n');
define('JS_POST_CODE', '* El campo \'Código postal\' debe tener al menos ' . ENTRY_POSTCODE_MIN_LENGTH . ' caracteres.\n');
define('JS_CITY', '* El campo \'Suburbio\' debe tener al menos ' . ENTRY_CITY_MIN_LENGTH . ' caracteres.\n');
define('JS_STATE', '* El campo \'Provincia\' es necesario.\n');
define('JS_STATE_SELECT', '-- Seleccionar arriba --');
define('JS_ZONE', '* El campo \'Provincia\' debe ser escogido del listado para este país.\n');
define('JS_COUNTRY', '* El campo \'País\' es necesario.\n');
define('JS_TELEPHONE', '* El campo \'Número de teléfono\' debe tener al menos ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caracteres.\n');
define('JS_PASSWORD', '* Los campos \'Contraseña\' y \'Confirmación\' deben coincidir y tener al menos ' . ENTRY_PASSWORD_MIN_LENGTH . ' caracteres.\n');

define('CATEGORY_COMPANY', 'Datos de la empresa');
define('CATEGORY_PERSONAL', 'Datos personales');
define('CATEGORY_ADDRESS', 'Dirección');
define('CATEGORY_CONTACT', 'Información de contacto');
define('CATEGORY_OPTIONS', 'Opciones');
define('CATEGORY_PASSWORD', 'Contraseña');
define('CATEGORY_CORRECT', 'Si este es el cliente correcto, pulse el botón de confirmar abajo.');
define('ENTRY_CUSTOMERS_ID', 'ID:');
define('ENTRY_CUSTOMERS_ID_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_COMPANY', 'Nombre de la empresa:');
define('ENTRY_NAME', 'Nombre:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Género:');
define('ENTRY_GENDER_ERROR', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_GENDER_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_FIRST_NAME', 'Nombre:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_FIRST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">necesario/font></small>');
define('ENTRY_LAST_NAME', 'Apellidos:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_LAST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_DATE_OF_BIRTH', 'Fecha de nacimiento:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<small><font color="#FF0000">(ej. 21/05/1970)</font></small>');
define('ENTRY_DATE_OF_BIRTH_TEXT', '&nbsp;<small>(ej. 21/05/1970) <font color="#AABBDD">necesario</font></small>');
define('ENTRY_EMAIL_ADDRESS', 'Dirección de e-mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<small><font color="#FF0000">¡Su dirección de correo no parece válida!</font></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<small><font color="#FF0000">¡La dirección de correo ya existe!</font></small>');
define('ENTRY_EMAIL_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_STREET_ADDRESS', 'Dirección postal:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_STREET_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_SUBURB', 'Suburbio:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Código postal:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_POST_CODE_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_SUBURB', 'Suburbio:');
define('ENTRY_CITY_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_CITY_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_CITY_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_CITY', 'Ciudad:');
define('ENTRY_STATE', 'Provincia/Estado:');
define('ENTRY_STATE_ERROR', '&nbsp;<small><font color="#FF0000">necesario</font></small>');
define('ENTRY_STATE_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_COUNTRY', 'País:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_COUNTRY_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_TELEPHONE_NUMBER', 'Número de teléfono:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_FAX_NUMBER', 'Número de fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Boletín de noticias:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Suscrito');
define('ENTRY_NEWSLETTER_NO', 'No suscrito');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Contraseña:');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmación de la contraseña:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_PASSWORD_ERROR', '&nbsp;<small><font color="#FF0000">mínimo de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_PASSWORD_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('PASSWORD_HIDDEN', '--OCULTO--');

// manual order box text in includes/boxes/manual_order.php

define('BOX_HEADING_MANUAL_ORDER', 'Pedidos manuales');
define('BOX_MANUAL_ORDER_CREATE_ACCOUNT', 'Crear cuenta');
define('BOX_MANUAL_ORDER_CREATE_ORDER', 'Crear pedido');
?>
