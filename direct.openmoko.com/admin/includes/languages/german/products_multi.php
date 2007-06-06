<?php
/*
  $Id: products_multi.php, v 2.0

  autor: sr, 2003-07-31 / sr@ibis-project.de

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Produktegruppen bearbeiten');
define('HEADING_TITLE_SEARCH', 'Suche: ');
define('HEADING_TITLE_GOTO', 'Gehe zu:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_CHOOSE', 'W&auml;hle');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', 'Kategorien / Produkte');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Modell');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_STATUS', 'Status');

define('DEL_DELETE', 'Produkt l&ouml;schen');
define('DEL_CHOOSE_DELETE_ART', 'Wie soll gel&ouml;scht werden?');
define('DEL_THIS_CAT', 'nur in dieser Kategorie');
define('DEL_COMPLETE', 'Produkt vollst&auml;ndig l&ouml;schen');

define('TEXT_NEW_PRODUCT', 'Neues Produkt in &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Kategorien:');
define('TEXT_ATTENTION_DANGER', '<br><br><span class="dataTableContentRedAlert">!!! Achtung !!! Unbedingt lesen !!!</span><br><br><span class="dataTableContentRed">Das Tool ändert die Tabellen "products_to_categories" (und im Falle von \'Produkt vollständig l&ouml;schen\' auch "products" und "products_description" und einige weitere; siehe function \'tep_remove_product\') - also unbedingt vor jeder Benutzung Sicherheitskopien dieser Tabellen anfertigen, denn:<br><br>Das Tool l&ouml;scht, verschiebt bzw. kopiert alle per Checkbox ausgewählten Produkte ohne Zwischenschritt oder Warnung, also sofort, sobald man auf den Button "go!" geclickt hat.</span><br><br><span class="dataTableContentRedAlert">Dies muss beachtet werden:</span><ul><li>Ganz große Vorsicht bei der Verwendung von <strong>\'Produkt vollständig l&ouml;schen\'</strong>. Diese Funktion l&ouml;scht alle ausgewählten Produkte sofort, ohne Zwischenschritt oder Warnung, und zwar vollständig und aus sämtlichen Tabellen, in denen diese Produkte vorkommen.</li><li>Bei Auswahl von <strong>\'Produkt l&ouml;schen nur in dieser Kategorie\'</strong> werden keine Produkte komplett gel&ouml;scht, sondern nur ihre Verlinkungen in der aktuellen Kategorie - selbst wenn das die einzige Verlinkung ist, und zwar ohne Warnung, also auch Vorsicht mit dieser L&ouml;schfunktion.</li><li>Es werden beim <strong>Kopieren</strong> keine Duplikate von Produkten angelegt, sondern nur Verlinkungen zur ausgewählten Kategorie hizugefügt.</li><li>Das Produkt wird übrigens nur dann in eine neue Kategorie <strong>verschoben</strong> bzw. <strong>kopiert</strong>, wenn es dort nicht bereits vorhanden ist.</li></ul>');
define('TEXT_MOVE_TO', 'Verschieben nach');
define('TEXT_CHOOSE_ALL', 'alle ausw&auml;hlen');
define('TEXT_CHOOSE_ALL_REMOVE', 'Auswahl entfernen');
define('TEXT_SUBCATEGORIES', 'Unterkategorien:');
define('TEXT_PRODUCTS', 'Produkt:');
define('TEXT_PRODUCTS_PRICE_INFO', 'Preis:');
define('TEXT_PRODUCTS_TAX_CLASS', 'Steuerklasse:');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'durchschnittl. Bewertung:');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Anzahl:');
define('TEXT_DATE_ADDED', 'hinzugef&uuml;gt am:');
define('TEXT_DATE_AVAILABLE', 'Erscheinungsdatum:');
define('TEXT_LAST_MODIFIED', 'letzte &Auml;nderung:');
define('TEXT_IMAGE_NONEXISTENT', 'BILD EXISTIERT NICHT');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Bitte f&uuml;gen Sie eine neue Kategorie oder ein Produkt in <br>&nbsp;<br><b>%s</b> ein.');
define('TEXT_PRODUCT_MORE_INFORMATION', 'F&uuml;r weitere Informationen, besuchen Sie bitte die <a href="http://%s" target="blank"><u>Homepage</u></a> des Herstellers.');
define('TEXT_PRODUCT_DATE_ADDED', 'Dieses Produkt haben wir am %s in unseren Katalog aufgenommen.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'Dieses Produkt ist erh&auml;ltlich ab %s.');

define('TEXT_EDIT_INTRO', 'Bitte f&uuml;hren Sie alle notwendigen &Auml;nderungen durch.');
define('TEXT_EDIT_CATEGORIES_ID', 'Kategorie ID:');
define('TEXT_EDIT_CATEGORIES_NAME', 'Kategorie Name:');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Kategorie Bild:');
define('TEXT_EDIT_SORT_ORDER', 'Sortierreihenfolge:');

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
define('TEXT_PRODUCTS_QUANTITY', 'Produktanzahl:');
define('TEXT_PRODUCTS_MODEL', 'Produkt-Nr.:');
define('TEXT_PRODUCTS_IMAGE', 'Produktbild:');
define('TEXT_PRODUCTS_URL', 'Herstellerlink:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(ohne f&uuml;hrendes http://)</small>');
define('TEXT_PRODUCTS_PRICE', 'Produktpreis:');
define('TEXT_PRODUCTS_WEIGHT', 'Produktgewicht:');
define('TEXT_NONE', '--keine--');

define('EMPTY_CATEGORY', 'Leere Kategorie');

define('TEXT_HOW_TO_COPY', 'Kopiermethode:');
define('TEXT_COPY_AS_LINK', 'Produkt verlinken');
define('TEXT_COPY_AS_DUPLICATE', 'Produkt duplizieren');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Fehler: Produkte k&ouml;nnen nicht in der gleichen Kategorie verlinkt werden.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Fehler: Das Verzeichnis \'images\' im Katalogverzeichnis ist schreibgesch&uuml;tzt: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Fehler: Das Verzeichnis \'images\' im Katalogverzeichnis ist nicht vorhanden: ' . DIR_FS_CATALOG_IMAGES);
?>
