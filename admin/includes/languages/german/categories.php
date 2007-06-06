<?php
/*
  $Id: categories.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

// BOF MaxiDVD: Added For Ultimate-Images Pack!
define('TEXT_PRODUCTS_IMAGE_MEDIUM', '<b>Gr&ouml;sseres Bild:</b><br><small> ERSETZT Kleines Bild in der <br><u>Produktbeschreibungs</u>-Seite.</small>');
define('TEXT_PRODUCTS_IMAGE_NOTE','<b>Produkt Bild:</b><small><br> Hauptbild benutzt in den <br><u>Katalog und Beschreibung</u> Seiten.<small>');
define('TEXT_PRODUCTS_IMAGE_LARGE', '<b>Pop-up Bild:</b><br><small>ERSETZT Kleines Bild in der <br><u>Pop-up Fenster</u> Seite.</small>');
define('TEXT_PRODUCTS_IMAGE_LINKED', '<u>Speichere Produkt, die dieses Bild gemeinsam nutzen =</u>');
define('TEXT_PRODUCTS_IMAGE_REMOVE', '<b>Entferne</b> dieses Bild von diesem Produkt?');
define('TEXT_PRODUCTS_IMAGE_DELETE', '<b>L&ouml;sche</b> dieses Bild vom Server (Dauerhaft!)?');
define('TEXT_PRODUCTS_IMAGE_REMOVE_SHORT', 'Entfernen');
define('TEXT_PRODUCTS_IMAGE_DELETE_SHORT', 'L&ouml;schen');
define('TEXT_PRODUCTS_IMAGE_TH_NOTICE', '<b>SM = Kleine Bilder</b> (<b>SM</b>all). Wenn ein "SM" Bild benutzt wird,<br>(Allein) wird KEIN Pop-up Fenster Link erzeugt, das "SM" Bild<br> wird direkt unter der <br>Produktbeschreibung<br> platziert. <br>Wenn gemeinsam mit einem <br>"XL" Bild rechts verwendet, wird ein Pop-Up Fenster-Link<br>erzeugt, und das "XL" Bild wird in <br>einem Pop-up Fenster gezeigt.<br><br>');
define('TEXT_PRODUCTS_IMAGE_XL_NOTICE', '<b>XL = Grosse Bilder</b> (<b>XL</b>arge). Werden für das Pop-up Fenster-Bild benutzt<br><br><br>');
define('TEXT_PRODUCTS_IMAGE_ADDITIONAL', 'Zus&auml;tzliche Bilder - Diese erscheinen unter dem Produkt, falls verwendet.');
define('TEXT_PRODUCTS_IMAGE_SM_1', 'SM Bild 1:');
define('TEXT_PRODUCTS_IMAGE_XL_1', 'XL Bild 1:');
define('TEXT_PRODUCTS_IMAGE_SM_2', 'SM Bild 2:');
define('TEXT_PRODUCTS_IMAGE_XL_2', 'XL Bild 2:');
define('TEXT_PRODUCTS_IMAGE_SM_3', 'SM Bild 3:');
define('TEXT_PRODUCTS_IMAGE_XL_3', 'XL Bild 3:');
define('TEXT_PRODUCTS_IMAGE_SM_4', 'SM Bild 4:');
define('TEXT_PRODUCTS_IMAGE_XL_4', 'XL Bild 4:');
define('TEXT_PRODUCTS_IMAGE_SM_5', 'SM Bild 5:');
define('TEXT_PRODUCTS_IMAGE_XL_5', 'XL Bild 5:');
define('TEXT_PRODUCTS_IMAGE_SM_6', 'SM Bild 6:');
define('TEXT_PRODUCTS_IMAGE_XL_6', 'XL Bild 6:');
// EOF MaxiDVD: Added For Ultimate-Images Pack!

define('HEADING_TITLE', 'Kategorien / Produkt');
define('HEADING_TITLE_SEARCH', 'Suche: ');
define('HEADING_TITLE_GOTO', 'Gehe zu:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', 'Kategorien / Produkt');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_STATUS', 'Status');

define('TEXT_NEW_PRODUCT', 'Neuer Produkt in &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Kategorien:');
define('TEXT_SUBCATEGORIES', 'Unterkategorien:');
define('TEXT_PRODUCTS', 'Produkt:');
define('TEXT_PRODUCTS_PRICE_INFO', 'Preis:');
define('TEXT_PRODUCTS_TAX_CLASS', 'Steuerklasse:');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'durchschnittl. Bewertung:');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Anzahl:');
define('TEXT_DATE_ADDED', 'hinzugef&uuml;gt am:');
define('TEXT_DELETE_IMAGE', 'Bild l&ouml;schen');

define('TEXT_DATE_AVAILABLE', 'Erscheinungsdatum:');
define('TEXT_LAST_MODIFIED', 'letzte &Auml;nderung:');
define('TEXT_IMAGE_NONEXISTENT', 'BILD EXISTIERT NICHT');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Bitte f&uuml;gen Sie eine neue Kategorie oder ein Produkt in dieser Ebene ein.');
define('TEXT_PRODUCT_MORE_INFORMATION', 'F&uuml;r weitere Informationen, besuchen Sie bitte die <a href="http://%s" target="blank"><u>Homepage</u></a> des Herstellers.');
define('TEXT_PRODUCT_DATE_ADDED', 'Dieses Produkt haben wir am %s in unserem Katalog aufgenommen.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'Dieses Produkt ist erh&auml;ltlich ab %s.');

define('TEXT_EDIT_INTRO', 'Bitte f&uuml;hren Sie alle notwendigen &Auml;nderungen durch.');
define('TEXT_EDIT_CATEGORIES_ID', 'Kategorie ID:');
define('TEXT_EDIT_CATEGORIES_NAME', 'Kategorie Name:');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Kategorie Bild:');
define('TEXT_EXISTING_CATEGORIES_IMAGE','Existing Image');
define('TEXT_EDIT_SORT_ORDER', 'Sortierreihenfolge:');
define('TEXT_EDIT_CATEGORIES_HEADING_TITLE', 'Kategorien-&Uuml;berschrifts-Titel:');
define('TEXT_EDIT_CATEGORIES_DESCRIPTION', 'Kategorien-&Uuml;berschrifts-Beschreibung:');
define('TEXT_EDIT_CATEGORIES_TITLE_TAG', 'Kategorie Title Meta Tag :');
define('TEXT_EDIT_CATEGORIES_DESC_TAG', 'Kategorie Discription Meta Tag:');
define('TEXT_EDIT_CATEGORIES_KEYWORDS_TAG', 'Kategorie Key Word Meta Tag:');

define('TEXT_INFO_COPY_TO_INTRO', 'Bitte w&auml;hlen Sie eine neue Kategorie aus, in die Sie das Produkt kopieren m&ouml;chten:');
define('TEXT_INFO_CURRENT_CATEGORIES', 'aktuelle Kategorien:');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'Neue Kategorie');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Kategorie bearbeiten');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Kategorie l&ouml;schen');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'Kategorie verschieben');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Produkt l&ouml;schen');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', 'Produkt verschieben');
define('TEXT_INFO_HEADING_COPY_TO', 'Kopieren nach');

define('TEXT_DELETE_CATEGORY_INTRO', 'Sind Sie sicher, dass Sie diese Kategorie l&ouml;schen m&ouml;chten?');
define('TEXT_DELETE_PRODUCT_INTRO', 'Sind Sie sicher, dass Sie dieses Produkt l&ouml;schen m&ouml;chten?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>WARNUNG:</b> Es existieren noch %s (Unter-)Kategorien, die mit dieser Kategorie verbunden sind!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>WARNING:</b> Es existieren noch %s Produkte, die mit dieser Kategorie verbunden sind!');

define('TEXT_MOVE_PRODUCTS_INTRO', 'Bitte w&auml;hlen Sie die &uuml;bergordnete Kategorie, in die Sie <b>%s</b> verschieben m&ouml;chten');
define('TEXT_MOVE_CATEGORIES_INTRO', 'Bitte w&auml;hlen Sie die &uuml;bergordnete Kategorie, in die Sie <b>%s</b> verschieben m&ouml;chten');
define('TEXT_MOVE', 'Verschiebe <b>%s</b> nach:');

define('TEXT_NEW_CATEGORY_INTRO', 'Bitte geben Sie die neue Kategorie mit allen relevanten Daten ein.');
define('TEXT_CATEGORIES_NAME', 'Kategorie Name:');
define('TEXT_CATEGORIES_IMAGE', 'Kategorie Bild:');
define('TEXT_SORT_ORDER', 'Sortierreihenfolge:');

define('TEXT_PRODUCTS_STATUS', 'Produktstatus:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', 'Erscheinungsdatum:');
define('TEXT_PRODUCT_AVAILABLE', 'auf Lager');
define('TEXT_PRODUCT_NOT_AVAILABLE', 'nicht vorr&auml;tig');
define('TEXT_PRODUCTS_MANUFACTURER', 'Produkt-Hersteller:');
define('TEXT_PRODUCTS_NAME', 'Produktname:');
define('TEXT_PRODUCTS_DESCRIPTION', 'Produktbeschreibung:');
define('TEXT_PRODUCTS_QUANTITY', 'Lagerbestand:');
define('TEXT_PRODUCTS_MODEL', 'Produktnummer:');
define('TEXT_PRODUCTS_IMAGE', 'Produktbild:');
define('TEXT_PRODUCTS_URL', 'Herstellerlink:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(ohne f&uuml;hrendes http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', 'Nettopreis:');
define('TEXT_PRODUCTS_PRICE_GROSS', 'Bruttopreis:');
define('TEXT_PRODUCTS_WEIGHT', 'Gewicht:');
define('TEXT_NONE', '--keines--');

define('EMPTY_CATEGORY', 'Leere Kategorie');

define('TEXT_HOW_TO_COPY', 'Kopiermethode:');
define('TEXT_COPY_AS_LINK', 'Produkt verlinken');
define('TEXT_COPY_AS_DUPLICATE', 'Produkt duplizieren');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Fehler: Artikel k&ouml;nnen nicht in der gleichen Kategorie verlinkt werden.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Fehler: Das Verzeichnis \'images\' im Katalogverzeichnis ist schreibgesch&uuml;tzt: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Fehler: Das Verzeichnis \'images\' im Katalogverzeichnis ist nicht vorhanden: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Fehler: Kategorie kann nicht in eine Sub-Kategurie verschoben werden');

//Header Tags Controller Admin
define('TEXT_PRODUCT_METTA_INFO', '<b>Meta Tag Information</b>');
define('TEXT_PRODUCTS_PAGE_TITLE', 'Produktseiten Titel:');
define('TEXT_PRODUCTS_HEADER_DESCRIPTION', 'Produkt Header Beschreibung:');
define('TEXT_PRODUCTS_KEYWORDS', 'Produkt Keywords:');

define('IMAGE_EDIT_ATTRIBUTES', 'Produktattribute editieren');

// mod for sub products
define('MAX_PRODUCT_SUB_ROWS', '5');
define('TEXT_SUB_PRODUCT','Sub Produkt:');
define('TEXT_SUB_PRODUCT_DELETE','L&ouml;schen');
define('TEXT_SUB_PRODUCT_NAME','Name');
define('TEXT_SUB_PRODUCT_PRICE','Preis');
define('TEXT_SUB_PRODUCT_MODEL','Modell');
define('TEXT_SUB_PRODUCT_QTY','Menge');
define('TEXT_SUB_PRODUCT_WEIGHT','Gewicht');
define('TEXT_SUB_PRODUCT_IMAGE','Bild');
define('TEXT_SUB_PRODUCT_NOTE_1','* zus&auml;tzliche Unterprodukte verf&uuml;gbar unterhalb einf&uuml;gen');
define('TEXT_SUB_PRODUCT_NOTE_2','* St&uuml;ckzahl 0 deaktiviert das Unterprodukt');

// Eversun mod for sppc and qty price breaks
define('TEXT_PRODUCTS_PRICE', 'Laden Preis:');
define('TEXT_PRODUCTS_GROUPS', 'Gruppe:');
define('TEXT_PRODUCTS_BASE', 'Grundpreis');
define('TEXT_PRODUCTS_ABOVE', '&uuml;ber');
define('TEXT_PRODUCTS_QTY', 'Stk.');
define('TEXT_PRODUCTS_QTY_BLOCKS', 'Stk. pro Verpackungseinheit:');
define('TEXT_PRODUCTS_QTY_BLOCKS_INFO', '(Kann nur in Verpackungseinheiten bestellt werden mit X Stk Inhalt)');
define('TEXT_PRODUCTS_SPPP_NOTE', 'Beachten Sie: Ist ein Feld ausgef&uuml;llt, aber nicht ausgew&auml;hlt, wird der Preis nicht ver&auml;ndert .<br />Ist der Preis berreits in der Datenbank vorhanden, aber nicht ausgew&auml;hlt wird dieser aus der Datenbank entfernt.');
define('TEXT_PRODUCTS_QTY_DISCOUNT', '10');

// Eversun mod end for sppc and qty price breaks



define('TEXT_PRODUCT_IMAGES', 'Product Images');
define('TEXT_EXTRA_FIELDS', 'Extra Fields');
define('TEXT_EXTRA_IMAGES', 'Extra Images');
define('TEXT_ACTIVE_ATTRIBUTES', 'Active Attributes');
define('TEXT_COPY_ATTRIBUTES_TO_ANOTHER_PRODUCT', 'Copy Attributes to another product');
define('TEXT_COPYING_ATTRIBUTES_FROM', 'Copying Attributes from');
define('TEXT_COPYING_ATTRIBUTES_TO', 'Copying Attributes to');
define('TEXT_DELETE_ALL_ATTRIBUTE', 'Delete ALL Attributes and Downloads before copying');
define('TEXT_OTHERWISE', 'Otherwise ...');
define('TEXT_DUPLICATE_ATTRIBUTES_SKIPPED', 'Duplicate Attributes should be skipped');
define('TEXT_DUPLICATE_ATTRIBUTES_OVERWRITTEN', 'Duplicate Attributes should be overwritten');
define('TEXT_COPY_ATTRIBUTES_WITH_DOWNLOADS', 'Copy Attributes with Downloads');
define('TEXT_SELECT_PRODUCT_FOR_DISPLAY', 'Select a product for display');
define('TEXT_COPY_PRODUCT_ATTRIBUTES_TO_CATEGORY', 'Copy Product Attributes to Category ...');
define('TEXT_COPY_PRODUCT_ATTRIBUTES_FROM_PRODUCT_ID', 'Copy Product Attributes from Product ID');
define('TEXT_COPYING_TO_ALL_PRODUCTS_IN_CATEGORY_ID', 'Copying to all products in Category ID');
define('TEXT_CATEGORY_NAME', 'Category Name: ');
define('TEXT_SELECT_PRODUCT_TO_DISPLAY_ATTRIBUTES', 'Select a product to display attributes');
define('DATE_FORMAT', '(YYYY-MM-DD)');

?>
