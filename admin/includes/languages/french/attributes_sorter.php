<?php
/*
  Definitions for Attributes Sorter
*/

// Turn things off
define('I_AM_OFF',true);

// WebMakers.com Added: Attributes - Definitions to move to attribute_sorter.php
define('TABLE_HEADING_PRODUCT_ATTRIBUTE_ONE_TIME','One Time Charge');

// WebMakers.com Added: Attribute Copy Option
define('TEXT_COPY_ATTRIBUTES_ONLY','Seulement utilis&eacute; pour les produits dupliqu&eacute;s ...');
define('TEXT_COPY_ATTRIBUTES','Copier les attributs du produits pour duplication?');
define('TEXT_COPY_ATTRIBUTES_YES','Oui');
define('TEXT_COPY_ATTRIBUTES_NO','Non');

// WebMakers.com Added: Attributes Copy from Existing Product to Existing Product
define('PRODUCT_NAMES_HELPER','<FONT COLOR="FF0000">[ <a href="' . 'quick_products_popup.php' . '" onclick="NewWindow(this.href,\'name\',\'700\',\'500\',\'yes\');return false;">Recherchez l\'ID d\'un Produit</a> ]');
define('ATTRIBUTES_NAMES_HELPER','<FONT COLOR="FF0000"><a href="' . 'quick_attributes_popup.php?look_it_up=' . $pID . '&my_languages_id=' . $languages_id . '" onclick="NewWindow2(this.href,\'name2\',\'700\',\'400\',\'yes\');return false;">[ Liste rapide des attributs pour le Produit ID# ' . $pID . ' ]</a>');

// WebMakers.com Added: Product Option Attributes Sort Order - products_attributes.php
define('TABLE_HEADING_OPTION_SORT_ORDER','Ordre de tri');
?>
