<?php
/*
  $Id: salemaker.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Generador de rebajas');

define('TABLE_HEADING_SALE_NAME', 'Nombre del saldo');
define('TABLE_HEADING_SALE_DEDUCTION', 'Deducción');
define('TABLE_HEADING_SALE_DATE_START', 'Fecha de inicio');
define('TABLE_HEADING_SALE_DATE_END', 'Fecha de remate');
define('TABLE_HEADING_STATUS', 'Estado');
define('TABLE_HEADING_ACTION', 'Acción');

define('TEXT_SALEMAKER_NAME', 'Nombre del saldo:');
define('TEXT_SALEMAKER_DEDUCTION', 'Deducción:');
define('TEXT_SALEMAKER_DEDUCTION_TYPE', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tipo:&nbsp;&nbsp;');
define('TEXT_SALEMAKER_PRICERANGE_FROM', 'Rango de precio del producto:');
define('TEXT_SALEMAKER_PRICERANGE_TO', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
define('TEXT_SALEMAKER_SPECIALS_CONDITION', 'Si un producto está en oferta:');
define('TEXT_SALEMAKER_DATE_START', 'Fecha de inicio:');
define('TEXT_SALEMAKER_DATE_END', 'Fecha de remate:');
define('TEXT_SALEMAKER_CATEGORIES', '<b>O</b> compruebe las categorías a las que se aplica esta rebaja:');
define('TEXT_SALEMAKER_POPUP', '<a href="javascript:session_win();"><span class="errorText"><b>Pulse aquí para consejos sobre cómo usar el generador de rebajas.</b></span></a>');
define('TEXT_SALEMAKER_IMMEDIATELY', 'Inmediatamente');
define('TEXT_SALEMAKER_NEVER', 'Nunca');
define('TEXT_SALEMAKER_ENTIRE_CATALOG', 'Marque esta casilla si quiere que la rebaja se aplique a <b>todos los productos</b>:');
define('TEXT_SALEMAKER_TOP', 'Catálogo entero');

define('TEXT_INFO_DATE_ADDED', 'Fecha añadida:');
define('TEXT_INFO_DATE_MODIFIED', 'Última modificación:');
define('TEXT_INFO_DATE_STATUS_CHANGE', 'Último cambio de estado:');
define('TEXT_INFO_SPECIALS_CONDITION', 'Condición de oferta:');
define('TEXT_INFO_DEDUCTION', 'Deducción:');
define('TEXT_INFO_PRICERANGE_FROM', 'Rango de precio:');
define('TEXT_INFO_PRICERANGE_TO', ' a ');
define('TEXT_INFO_DATE_START', 'Comienza:');
define('TEXT_INFO_DATE_END', 'Termina:');

define('SPECIALS_CONDITION_DROPDOWN_0', 'Ignorar el precio de oferta');
define('SPECIALS_CONDITION_DROPDOWN_1', 'Ignorar la condición de rebaja');
define('SPECIALS_CONDITION_DROPDOWN_2', 'Aplicar la deducción de la rebaja a los productos en oferta');

define('DEDUCTION_TYPE_DROPDOWN_0', 'Deducir cantidad');
define('DEDUCTION_TYPE_DROPDOWN_1', 'Porcentaje');
define('DEDUCTION_TYPE_DROPDOWN_2', 'Nuevo precio');

define('TEXT_INFO_HEADING_COPY_SALE', 'Copiar rebaja');
define('TEXT_INFO_COPY_INTRO', 'Introduzca un nombre para la copia de<br>&nbsp;&nbsp;"%s"');

define('TEXT_INFO_HEADING_DELETE_SALE', 'Eliminar rebaja');
define('TEXT_INFO_DELETE_INTRO', '¿Está seguro de que quiere eliminar de forma permanente esta rebaja?');
?>
