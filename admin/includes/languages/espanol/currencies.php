<?php
/*
  $Id: currencies.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Monedas');

define('TABLE_HEADING_CURRENCY_NAME', 'Moneda');
define('TABLE_HEADING_CURRENCY_CODES', 'C�digo');
define('TABLE_HEADING_CURRENCY_VALUE', 'Valor');
define('TABLE_HEADING_ACTION', 'Acci�n');

define('TEXT_INFO_EDIT_INTRO', 'Haga los cambios necesarios');
define('TEXT_INFO_CURRENCY_TITLE', 'T�tulo:');
define('TEXT_INFO_CURRENCY_CODE', 'C�digo:');
define('TEXT_INFO_CURRENCY_SYMBOL_LEFT', 'S�mbolo a la izquierda:');
define('TEXT_INFO_CURRENCY_SYMBOL_RIGHT', 'S�mbolo a la derecha:');
define('TEXT_INFO_CURRENCY_DECIMAL_POINT', 'Punto decimal:');
define('TEXT_INFO_CURRENCY_THOUSANDS_POINT', 'Separador de miles:');
define('TEXT_INFO_CURRENCY_DECIMAL_PLACES', 'Lugares decimales:');
define('TEXT_INFO_CURRENCY_LAST_UPDATED', 'Actualizado el:');
define('TEXT_INFO_CURRENCY_VALUE', 'Valor:');
define('TEXT_INFO_CURRENCY_EXAMPLE', 'Ejemplo:');
define('TEXT_INFO_INSERT_INTRO', 'Introduzca los datos de la nueva moneda');
define('TEXT_INFO_DELETE_INTRO', '�Seguro que quiere eliminar esta moneda?');
define('TEXT_INFO_HEADING_NEW_CURRENCY', 'Nueva moneda');
define('TEXT_INFO_HEADING_EDIT_CURRENCY', 'Editar moneda');
define('TEXT_INFO_HEADING_DELETE_CURRENCY', 'Eliminar moneda');
define('TEXT_INFO_SET_AS_DEFAULT', TEXT_SET_DEFAULT . ' (requiere una actualizaci�n manual de los cambios de moneda)');
define('TEXT_INFO_CURRENCY_UPDATED', 'El valor de %s (%s) se ha actualizado v�a %s.');

define('ERROR_REMOVE_DEFAULT_CURRENCY', 'Error: La moneda predeterminada no se puede eliminar. Seleccione otra moneda como predeterminada y vuelva a intentarlo.');
define('ERROR_CURRENCY_INVALID', 'Error: El valor de %s (%s) no ha sido actualizado v�a %s. Compruebe la validez del c�digo.');
define('WARNING_PRIMARY_SERVER_FAILED', 'Advertencia: El servidor primario (%s) ha fallado actualizando %s (%s) - probando con el servidor secundario.');
?>
