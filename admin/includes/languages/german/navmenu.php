<?php
/*
  $Id: categories.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Navigations Menu');
define('HEADING_TITLE_SEARCH', 'Suchen:');
define('HEADING_TITLE_GOTO', 'Gehe nach:');

define('TABLE_HEADING_CATEGORIES_LINKS', 'Kategorien / Links');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_STATUS', 'Status');



// BOF MaxiDVD: Added For Ultimate-Images Pack!
define('TEXT_PRODUCTS_IMAGE_NOTE','<b>Produkt Grafik:</b><small><br>Hauptgrafik wird im<br><u>Katalog und der Beschreibung</u> dargestellt.<small>');
define('TEXT_PRODUCTS_IMAGE_MEDIUM', '<b>Small Grafik:</b><br><small> Image on<br><u>products list</u> pages.</small>');
define('TEXT_PRODUCTS_IMAGE_LARGE', '<b>Pop-up Grafik:</b><br><small> Large Image on<br><u>pop-up window</u> page.</small>');
define('TEXT_PRODUCTS_IMAGE_LINKED', '<u>Shop Produkte teilen sich diese Grafik =</u>');
define('TEXT_PRODUCTS_IMAGE_REMOVE', '<b>Entferne</b> diese Grafik vom Produkt?');
define('TEXT_PRODUCTS_IMAGE_DELETE', '<b>L&ouml;sche</b> diese Grafik auf dem Server (Permanent!)?');
define('TEXT_PRODUCTS_IMAGE_REMOVE_SHORT', 'Entfernen');
define('TEXT_PRODUCTS_IMAGE_DELETE_SHORT', 'L&ouml;schen');
define('TEXT_PRODUCTS_IMAGE_TH_NOTICE', '<b>SM = Kleine Grafiken.</b> Wenn nur eine "SM" Grafik benutzt wird<br>(Alone) wird kein Pop-up Fenster generiert, die "SM" Grafik<br> wird unmittelbar unter der Produktbeschreibung<br>angezeigt. Wenn die Grafik in Verbindung mit einer <br>"XL" Grafik verwendet wird, steht ein Pop-up Link<br> zur Verf&uuml;gung<br> und die "XL" Grafik wird<br>in einem Pop-up Fenster angezeigt.<br><br>');
define('TEXT_PRODUCTS_IMAGE_XL_NOTICE', '<b>XL = Grosse Grafiken.</b> Diese Graik wird als Pop-up ben&ouml;tigt<br><br><br>');
define('TEXT_PRODUCTS_IMAGE_ADDITIONAL', 'Zus&auml;tzliche Grafiken - werden unterhalb der Produktbeschreibung angezeigt.');
define('TEXT_PRODUCTS_IMAGE_SM_1', 'SM Produkt 1:');
define('TEXT_PRODUCTS_IMAGE_XL_1', 'XL Produkt 1:');
define('TEXT_PRODUCTS_IMAGE_SM_2', 'SM Produkt 2:');
define('TEXT_PRODUCTS_IMAGE_XL_2', 'XL Produkt 2:');
define('TEXT_PRODUCTS_IMAGE_SM_3', 'SM Produkt 3:');
define('TEXT_PRODUCTS_IMAGE_XL_3', 'XL Produkt 3:');
define('TEXT_PRODUCTS_IMAGE_SM_4', 'SM Produkt 4:');
define('TEXT_PRODUCTS_IMAGE_XL_4', 'XL Produkt 4:');
define('TEXT_PRODUCTS_IMAGE_SM_5', 'SM Produkt 5:');
define('TEXT_PRODUCTS_IMAGE_XL_5', 'XL Produkt 5:');
define('TEXT_PRODUCTS_IMAGE_SM_6', 'SM Produkt 6:');
define('TEXT_PRODUCTS_IMAGE_XL_6', 'XL Produkt 6:');
// EOF MaxiDVD: Added For Ultimate-Images Pack!



define('TEXT_NEW_PRODUCT', 'Neues Produkt in &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Kategorie:');
define('TEXT_SUBCATEGORIES', 'Unterkategorie:');
define('TEXT_PRODUCTS', 'Produkt:');
define('TEXT_PRODUCTS_PRICE_INFO', 'Preis:');
define('TEXT_PRODUCTS_TAX_CLASS', 'Steuerklasse:');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'Durchschnittliche Wertung:');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Menge:');
define('TEXT_DATE_ADDED', 'Datum hinzugef&uuml;gt:');
define('TEXT_DELETE_IMAGE', 'L&ouml;sche Grafik');

define('TEXT_DATE_AVAILABLE', 'Datum verf&uuml;gbar:');
define('TEXT_LAST_MODIFIED', 'Letzte &Auml;nderung:');
define('TEXT_IMAGE_NONEXISTENT', 'GRAFIK EXISTIERT NICHT');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Bitt f&uuml;gen Sie eine neue Kategorie oder ein neues Produkt in dieser Ebene ein.');
define('TEXT_PRODUCT_MORE_INFORMATION', 'F&uuml;r weiter Informationen schauen Sie sich das Produkt dort an <a href="http://%s" target="blank"><u>Webseite</u></a>.');
define('TEXT_PRODUCT_DATE_ADDED', 'Diese Produkt wurde hinzugef&uuml;gt am %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'Dieses Produkt wird wieder ab dem <b>%s</b> verf&uuml;gbar sein.');

define('TEXT_EDIT_INTRO', 'Please make any necessary changes');
define('TEXT_EDIT_CATEGORIES_ID', 'Kategorie ID:');
define('TEXT_EDIT_CATEGORIES_NAME', 'Kategorie Name:');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Kategorie Grafik:');
define('TEXT_EDIT_SORT_ORDER', 'Sort Order:');
define('TEXT_EDIT_CATEGORIES_HEADING_TITLE', 'Category heading title:');
define('TEXT_EDIT_CATEGORIES_DESCRIPTION', 'Category heading Description:');
define('TEXT_EDIT_CATEGORIES_TITLE_TAG', 'Category Title Meta Tag :');
define('TEXT_EDIT_CATEGORIES_DESC_TAG', 'Category Description Meta Tag :');
define('TEXT_EDIT_CATEGORIES_KEYWORDS_TAG', 'Category Key Word Meta Tag :');

define('TEXT_INFO_COPY_TO_INTRO', 'Please choose a new category you wish to copy this product to');
define('TEXT_INFO_CURRENT_CATEGORIES', 'Aktuelle Kategorie:');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'Kategorie neu');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Kategorie editieren');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Kategorie l&ouml;schen');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'Kategorie verschieben');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Produkt l&ouml;schen');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', 'Produkt verschieben');
define('TEXT_INFO_HEADING_COPY_TO', 'Kopieren nach');

define('TEXT_DELETE_CATEGORY_INTRO', 'Sind Sie sicher das die Kategorie gel&ouml;scht werden soll?');
define('TEXT_DELETE_PRODUCT_INTRO', 'Sind Sie sicher das dieses Produkt permanent gel&ouml;scht werden soll?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>WARNUNG:</b> Es sind bereits %s Unterkategorien mit dieser Kategorie verlinkt!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>WARNUNG:</b> Es sind bereits %s Produkte mit dieser Kategorie verlinkt!');

define('TEXT_MOVE_PRODUCTS_INTRO', 'Please select which category you wish <b>%s</b> to reside in');
define('TEXT_MOVE_CATEGORIES_INTRO', 'Please select which category you wish <b>%s</b> to reside in');
define('TEXT_MOVE', 'Move <b>%s</b> to:');

define('TEXT_NEW_CATEGORY_INTRO', 'Please fill out the following information for the new category');
define('TEXT_CATEGORIES_NAME', 'Kategorie Name:');
define('TEXT_CATEGORIES_IMAGE', 'Kategorie Grafik:');
define('TEXT_SORT_ORDER', 'Sortierreihenfolge:');

define('TEXT_PRODUCTS_STATUS', 'Produkt Status:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', 'Datum verf&uuml;gbar:');
define('TEXT_PRODUCT_AVAILABLE', 'Im Lager');
define('TEXT_PRODUCT_NOT_AVAILABLE', 'Ausverkauft');
define('TEXT_PRODUCTS_MANUFACTURER', 'Produkt Hersteller:');
define('TEXT_PRODUCTS_NAME', 'Produkt Name:');
define('TEXT_PRODUCTS_DESCRIPTION', 'Produkt Beschreibung:');
define('TEXT_PRODUCTS_QUANTITY', 'Produkt Menge:');
define('TEXT_PRODUCTS_MODEL', 'Produkt Modell:');
define('TEXT_PRODUCTS_IMAGE', 'Produkt Grafik:');
define('TEXT_PRODUCTS_URL', 'Produkt URL:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(ohne http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', 'Produkt Preis (exl. MwSt):');
define('TEXT_PRODUCTS_PRICE_GROSS', 'Products Price (inkl. MwSt):');
define('TEXT_PRODUCTS_WEIGHT', 'Produkt Gewicht:');
define('TEXT_NONE', '--none--');

define('EMPTY_CATEGORY', 'Leere Kategorie');

define('TEXT_HOW_TO_COPY', 'Kopier Methode :');
define('TEXT_COPY_AS_LINK', 'Produkt verlinken');
define('TEXT_COPY_AS_DUPLICATE', 'Doppeltes Produkt');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Fehler: Produkte k&ouml;nnen nicht in der gleichen Kategorie verlinkt werden.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Fehler: Das Grafikverzeichnis ist schreibgesch&uuml;tzt: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Fehler: Das Grfikverzeichnis existiert nicht: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Fehler: Category cannot be moved into child category.');

//Header Tags Controller Admin
define('TEXT_PRODUCT_METTA_INFO', '<b>Meta Tag Information</b>');
define('TEXT_PRODUCTS_PAGE_TITLE', 'Produkt Seitentitel :');
define('TEXT_PRODUCTS_HEADER_DESCRIPTION', 'Page Header Description :');
define('TEXT_PRODUCTS_KEYWORDS', 'Produkt Schl&uuml;sselbegriffe :');

define('IMAGE_EDIT_ATTRIBUTES', 'editiere Produkt Attribute');

// Added for Navigation Menu DMG

define('TEXT_LINKS','Links');
define('TEXT_HEADING_EDIT_CATEGORY','Navigationskategorie erstellen');
define('TEXT_HEADING_NEW_LINK','Neuen Navigationslink erstellen');
define('TEXT_LINK_NAME','Link Text : ');
define('TEXT_LINK_PAGE','Link Ziel : ');
define('TEXT_STATUS','Link Status : ');


?>
