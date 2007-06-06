<?php
/*
  Definitions for Attributes Sorter
*/

// Turn things off
define('I_AM_OFF',true);

// WebMakers.com Added: Attributes - Definitions to move to attribute_sorter.php
define('TABLE_HEADING_PRODUCT_ATTRIBUTE_ONE_TIME','Einmal-Aufwand');

// WebMakers.com Added: Attribute Copy Option
define('TEXT_COPY_ATTRIBUTES_ONLY','Wird nur f&uuml;r duplizierte Artikel benutzt ...');
define('TEXT_COPY_ATTRIBUTES','Artikelattribute zu Duplikat kopieren?');
define('TEXT_COPY_ATTRIBUTES_YES','Ja');
define('TEXT_COPY_ATTRIBUTES_NO','Nein');

// WebMakers.com Added: Attributes Copy from Existing Product to Existing Product
define('PRODUCT_NAMES_HELPER','<FONT COLOR="FF0000"><a href="' . 'quick_products_popup.php' . '" onclick="NewWindow(this.href,\'name\',\'700\',\'500\',\'yes\');return false;">[ Artikelnummer # Suche ]</a>');
define('ATTRIBUTES_NAMES_HELPER','<FONT COLOR="FF0000"><a href="' . 'quick_attributes_popup.php?look_it_up=' . $pID . '&my_languages_id=' . $languages_id . '" onclick="NewWindow2(this.href,\'name2\',\'700\',\'400\',\'yes\');return false;">[ Schnellaufz&auml;hlung der Attribute zu Artikelnummer # ' . $pID . ' ]</a>');

// WebMakers.com Added: Product Option Attributes Sort Order - products_attributes.php
define('TABLE_HEADING_OPTION_SORT_ORDER','Bestellung sortieren');
?>
