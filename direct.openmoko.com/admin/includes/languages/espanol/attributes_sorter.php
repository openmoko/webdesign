<?php
/*
  Translated by: jparis v1.0
  Definitions for Attributes Sorter
*/

// Turn things off
define('I_AM_OFF',true);

// WebMakers.com Added: Attributes - Definitions to move to attribute_sorter.php
define('TABLE_HEADING_PRODUCT_ATTRIBUTE_ONE_TIME','Cobrar sólo una vez');

// WebMakers.com Added: Attribute Copy Option
define('TEXT_COPY_ATTRIBUTES_ONLY','Sólo se usa para duplicar productos ...');
define('TEXT_COPY_ATTRIBUTES','¿Copiar los atributos del producto al duplicado?');
define('TEXT_COPY_ATTRIBUTES_YES','Sí');
define('TEXT_COPY_ATTRIBUTES_NO','No');

// WebMakers.com Added: Attributes Copy from Existing Product to Existing Product
define('PRODUCT_NAMES_HELPER','<FONT COLOR="FF0000"><a href="' . 'quick_products_popup.php' . '" onclick="NewWindow(this.href,\'name\',\'700\',\'500\',\'yes\');return false;">[ Búsqueda por ID de producto ]</a>');
define('ATTRIBUTES_NAMES_HELPER','<FONT COLOR="FF0000"><a href="' . 'quick_attributes_popup.php?look_it_up=' . $pID . '&my_languages_id=' . $languages_id . '" onclick="NewWindow2(this.href,\'name2\',\'700\',\'400\',\'yes\');return false;">[ Lisa rápida de atributos para el número de ID ' . $pID . ' ]</a>');

// WebMakers.com Added: Product Option Attributes Sort Order - products_attributes.php
define('TABLE_HEADING_OPTION_SORT_ORDER','Ordenados por');
?>
