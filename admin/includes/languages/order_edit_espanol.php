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


define('HEADING_STEP2', 'Paso 2 - Escoja la forma de pago y de env�o para el nuevo pedido #');
define('HEADING_INSTRUCT1', '��� INSTRUCCIONES !!!');
define('HEADING_INSTRUCT2', 'Nota: Si edita las cantidades de productos del<br>
              pedido no se actualizar� el stock con esos cambios.<br>
          As� que debe asegurarse de realizar esos cambios de<br>
          forma manual en la secci�n de edici�n.<br>');
define('HEADING_STEP3', 'Paso 3 - A�ADIR UN PRODUCTO NUEVO');
define('HEADING_SHIPPING', 'Foma de env�o:');

define('TEXT_ADD_PROD_STEP1', 'PASO 1:');
define('TEXT_ADD_STEP2', 'PASO 2:');
define('TEXT_ADD_STEP3', 'PASO 3:');
define('TEXT_ADD_STEP4', 'PASO 4:');

define('TEXT_ADD_PROD', 'A�adir producto ');
define('TEXT_SELECT_PROD', 'Seleccionar este producto');

define('TEXT_ADD_CAT_CHOOSE', '--- ESCOJA UNA CATEGOR�A ---\n');
define('TEXT_SELECT_CAT', 'Seleccionar esta categor�a');
define('TEXT_ADD_PROD_CHOOSE', 'A�adir producto ');

define('TEXT_SELECT_OPT', 'Seleccionar opciones');
define('TEXT_SELECT_OPT_SKIP', 'No hay opciones para este producto');

define('TEXT_ADD_QUANTITY', ' Cantidad');
define('TEXT_ADD_NOW', '�A�adir ahora!');
define('TEXT_VIEW_CC', ' Para ver los campos CC');
define('TEXT_VIEW_PO', ' Para ver los campos PO');

define('TEXT_INFO_PO', 'Informaci�n PO:');
define('TEXT_INFO_NAME', 'Nombre de la cuenta:');
define('TEXT_INFO_AC_NR', 'N�mero de cuenta:');
define('TEXT_INFO_PO_NR', 'N�mero de pedido de compra:');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Por favor seleccione');
define('TYPE_BELOW', 'Escriba debajo');

define('JS_ERROR', '�Hubo errores procesando su ficha!\nPor favor haga las siguientes correciones:\n\n');

define('JS_GENDER', '* El campo \'G�nero\' es necesario.\n');
define('JS_FIRST_NAME', '* El campo \'Nombre\' debe tener al menos ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caracteres.\n');
define('JS_LAST_NAME', '* El campo \'Apellidos\' debe tener al menos ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caracteres.\n');
define('JS_DOB', '* El campo \'Fecha de nacimiento\' debe tener el formato: xx/xx/xxxx (dia/mes/a�o).\n');
define('JS_EMAIL_ADDRESS', '* El campo \'Direcci�n de e-mail\' debe tener al menos ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caracteres.\n');
define('JS_ADDRESS', '* El campo \'Direcci�n postal\' debe tener al menos ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caracteres.\n');
define('JS_POST_CODE', '* El campo \'C�digo postal\' debe tener al menos ' . ENTRY_POSTCODE_MIN_LENGTH . ' caracteres.\n');
define('JS_CITY', '* El campo \'Suburbio\' debe tener al menos ' . ENTRY_CITY_MIN_LENGTH . ' caracteres.\n');
define('JS_STATE', '* El campo \'Provincia\' es necesario.\n');
define('JS_STATE_SELECT', '-- Seleccionar arriba --');
define('JS_ZONE', '* El campo \'Provincia\' debe ser escogido del listado para este pa�s.\n');
define('JS_COUNTRY', '* El campo \'Pa�s\' es necesario.\n');
define('JS_TELEPHONE', '* El campo \'N�mero de tel�fono\' debe tener al menos ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caracteres.\n');
define('JS_PASSWORD', '* Los campos \'Contrase�a\' y \'Confirmaci�n\' deben coincidir y tener al menos ' . ENTRY_PASSWORD_MIN_LENGTH . ' caracteres.\n');

define('CATEGORY_COMPANY', 'Datos de la empresa');
define('CATEGORY_PERSONAL', 'Datos personales');
define('CATEGORY_ADDRESS', 'Direcci�n');
define('CATEGORY_CONTACT', 'Informaci�n de contacto');
define('CATEGORY_OPTIONS', 'Opciones');
define('CATEGORY_PASSWORD', 'Contrase�a');
define('CATEGORY_CORRECT', 'Si este es el cliente correcto, pulse el bot�n de confirmar abajo.');
define('ENTRY_CUSTOMERS_ID', 'ID:');
define('ENTRY_CUSTOMERS_ID_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_COMPANY', 'Nombre de la empresa:');
define('ENTRY_NAME', 'Nombre:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'G�nero:');
define('ENTRY_GENDER_ERROR', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_GENDER_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_FIRST_NAME', 'Nombre:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_FIRST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">necesario/font></small>');
define('ENTRY_LAST_NAME', 'Apellidos:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_LAST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_DATE_OF_BIRTH', 'Fecha de nacimiento:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<small><font color="#FF0000">(ej. 21/05/1970)</font></small>');
define('ENTRY_DATE_OF_BIRTH_TEXT', '&nbsp;<small>(ej. 21/05/1970) <font color="#AABBDD">necesario</font></small>');
define('ENTRY_EMAIL_ADDRESS', 'Direcci�n de e-mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<small><font color="#FF0000">�Su direcci�n de correo no parece v�lida!</font></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<small><font color="#FF0000">�La direcci�n de correo ya existe!</font></small>');
define('ENTRY_EMAIL_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_STREET_ADDRESS', 'Direcci�n postal:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_STREET_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_SUBURB', 'Suburbio:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'C�digo postal:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_POST_CODE_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_SUBURB', 'Suburbio:');
define('ENTRY_CITY_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_CITY_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_CITY_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_CITY', 'Ciudad:');
define('ENTRY_STATE', 'Provincia/Estado:');
define('ENTRY_STATE_ERROR', '&nbsp;<small><font color="#FF0000">necesario</font></small>');
define('ENTRY_STATE_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_COUNTRY', 'Pa�s:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_COUNTRY_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_TELEPHONE_NUMBER', 'N�mero de tel�fono:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_FAX_NUMBER', 'N�mero de fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Bolet�n de noticias:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Suscrito');
define('ENTRY_NEWSLETTER_NO', 'No suscrito');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Contrase�a:');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmaci�n de la contrase�a:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('ENTRY_PASSWORD_ERROR', '&nbsp;<small><font color="#FF0000">m�nimo de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caracteres</font></small>');
define('ENTRY_PASSWORD_TEXT', '&nbsp;<small><font color="#AABBDD">necesario</font></small>');
define('PASSWORD_HIDDEN', '--OCULTO--');

// manual order box text in includes/boxes/manual_order.php

define('BOX_HEADING_MANUAL_ORDER', 'Pedidos manuales');
define('BOX_MANUAL_ORDER_CREATE_ACCOUNT', 'Crear cuenta');
define('BOX_MANUAL_ORDER_CREATE_ORDER', 'Crear pedido');
?>
