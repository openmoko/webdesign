<?php
/*
  $Id: categories.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

// BOF MaxiDVD: Added For Ultimate-Images Pack!
define('TEXT_PRODUCTS_IMAGE_NOTE','<b>Imagen del producto:</b><small><br> Imagen principal, usada en el <br><u>catálogo y páginas de descripción</u>.<small>');
define('TEXT_PRODUCTS_IMAGE_MEDIUM', '<b>Imagen pequeña:</b><br><small> Imagen para las páginas de la <br><u>lista de productos</u>.</small>');
define('TEXT_PRODUCTS_IMAGE_LARGE', '<b>Imagen ampliada:</b><br><small> Imagen grande, para aparecer en su propia <br><u>ventana</u> al ampliar.</small>');
define('TEXT_PRODUCTS_IMAGE_LINKED', '<u>Productos del almacen que comparten esta imagen =</u>');
define('TEXT_PRODUCTS_IMAGE_REMOVE', '¿<b>Quitar</b> esta imagen de este producto?');
define('TEXT_PRODUCTS_IMAGE_DELETE', '¿<b>Eliminar</b> esta imagen de este servidor (¡Permanente!)?');
define('TEXT_PRODUCTS_IMAGE_REMOVE_SHORT', 'Quitar');
define('TEXT_PRODUCTS_IMAGE_DELETE_SHORT', 'Eliminar');
define('TEXT_PRODUCTS_IMAGE_TH_NOTICE', '<b>SM = Imágenes pequeñas.</b> Si se usa una imagen "SM" <br>(Sola) NO se creará un enlace para ampliación, la imagen "SM"<br> se colocará directamente bajo la <br>descripción del producto. Si se utiliza en conjunto con una imagen <br>"XL" a la derecha, se creará un enlace<br> y la imagen "XL" se mostrará como <br>ampliación en su propia ventana.<br><br>');
define('TEXT_PRODUCTS_IMAGE_XL_NOTICE', '<b>XL = Imágenes grandes.</b> Usadas para las ampliaciones<br><br><br>');
define('TEXT_PRODUCTS_IMAGE_ADDITIONAL', 'Imágenes adicionales - Aparecerán bajo la descripción del producto si se usan.');
define('TEXT_PRODUCTS_IMAGE_SM_1', 'Imagen SM 1:');
define('TEXT_PRODUCTS_IMAGE_XL_1', 'Imagen XL 1:');
define('TEXT_PRODUCTS_IMAGE_SM_2', 'Imagen SM 2:');
define('TEXT_PRODUCTS_IMAGE_XL_2', 'Imagen XL 2:');
define('TEXT_PRODUCTS_IMAGE_SM_3', 'Imagen SM 3:');
define('TEXT_PRODUCTS_IMAGE_XL_3', 'Imagen XL 3:');
define('TEXT_PRODUCTS_IMAGE_SM_4', 'Imagen SM 4:');
define('TEXT_PRODUCTS_IMAGE_XL_4', 'Imagen XL 4:');
define('TEXT_PRODUCTS_IMAGE_SM_5', 'Imagen SM 5:');
define('TEXT_PRODUCTS_IMAGE_XL_5', 'Imagen XL 5:');
define('TEXT_PRODUCTS_IMAGE_SM_6', 'Imagen SM 6:');
define('TEXT_PRODUCTS_IMAGE_XL_6', 'Imagen XL 6:');
// EOF MaxiDVD: Added For Ultimate-Images Pack!

define('HEADING_TITLE', 'Categorías / Productos');
define('HEADING_TITLE_SEARCH', 'Buscar:');
define('HEADING_TITLE_GOTO', 'Ir a:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', 'Categorías / Productos');
define('TABLE_HEADING_ACTION', 'Acción');
define('TABLE_HEADING_STATUS', 'Estado');

define('TEXT_NEW_PRODUCT', 'Nuevo producto en &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Categorías:');
define('TEXT_SUBCATEGORIES', 'Subcategorías:');
define('TEXT_PRODUCTS', 'Productos:');
define('TEXT_PRODUCTS_PRICE_INFO', 'Precio:');
define('TEXT_PRODUCTS_TAX_CLASS', 'Clase de impuesto:');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'Valoración media:');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Cantidad:');
define('TEXT_DATE_ADDED', 'Añadido el:');
define('TEXT_DELETE_IMAGE', 'Eliminar imagen');

define('TEXT_DATE_AVAILABLE', 'Fecha disponibilidad:');
define('TEXT_LAST_MODIFIED', 'Modificado el:');
define('TEXT_IMAGE_NONEXISTENT', 'NO EXISTE IMAGEN');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Por favor, inserte una nueva categoría o producto en este nivel.');
define('TEXT_PRODUCT_MORE_INFORMATION', 'Si quiere más información, visite la <a href="http://%s" target="blank"><u>página</u></a> de este producto.');
define('TEXT_PRODUCT_DATE_ADDED', 'Este producto fue añadido el %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'Este producto estará disponible el %s.');

define('TEXT_EDIT_INTRO', 'Por favor, haga los cambios necesarios');
define('TEXT_EDIT_CATEGORIES_ID', 'ID de categoría:');
define('TEXT_EDIT_CATEGORIES_NAME', 'Nombre de categoría:');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Imagen de categoría:');
define('TEXT_EXISTING_CATEGORIES_IMAGE','Existing Image');
define('TEXT_EDIT_SORT_ORDER', 'Orden:');
define('TEXT_EDIT_CATEGORIES_HEADING_TITLE', 'Encabezado para la categoría:');
define('TEXT_EDIT_CATEGORIES_DESCRIPTION', 'Descripción para el encabezado:');
define('TEXT_EDIT_CATEGORIES_TITLE_TAG', 'Meta Tag para el encabezado:');
define('TEXT_EDIT_CATEGORIES_DESC_TAG', 'Meta Tag para la descripción:');
define('TEXT_EDIT_CATEGORIES_KEYWORDS_TAG', 'KeyWord para Meta Tag de la categoría:');

define('TEXT_INFO_COPY_TO_INTRO', 'Elija la categoría donde quiere copiar este producto');
define('TEXT_INFO_CURRENT_CATEGORIES', 'Categorías:');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'Nueva categoría');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Editar categoría');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Eliminar categoría');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'Mover categoría');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Eliminar producto');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', 'Mover producto');
define('TEXT_INFO_HEADING_COPY_TO', 'Copiar a');

define('TEXT_DELETE_CATEGORY_INTRO', '¿Seguro que desea eliminar esta categoría?');
define('TEXT_DELETE_PRODUCT_INTRO', '¿Está usted seguro de que desea suprimir permanentemente este producto?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>ATENCIÓN:</b> ¡Hay %s subcategorías que pertenecen a esta categoría!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>ATENCIÓN:</b> ¡Hay %s productos en esta categoría!');

define('TEXT_MOVE_PRODUCTS_INTRO', 'Elija la categoría hacia donde quiera mover <b>%s</b>');
define('TEXT_MOVE_CATEGORIES_INTRO', 'Elija la categoría hacia donde quiera mover <b>%s</b>');
define('TEXT_MOVE', 'Mover <b>%s</b> a:');

define('TEXT_NEW_CATEGORY_INTRO', 'Por favor, rellene los siguientes datos para la nueva categoría');
define('TEXT_CATEGORIES_NAME', 'Nombre de la categoría:');
define('TEXT_CATEGORIES_IMAGE', 'Imagen de la categoría:');
define('TEXT_SORT_ORDER', 'Orden:');

define('TEXT_PRODUCTS_STATUS', 'Estado de los productos:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', 'Fecha disponibilidad:');
define('TEXT_PRODUCT_AVAILABLE', 'Disponible');
define('TEXT_PRODUCT_NOT_AVAILABLE', 'Agotado');
define('TEXT_PRODUCTS_MANUFACTURER', 'Fabricante del producto:');
define('TEXT_PRODUCTS_NAME', 'Nombre del producto:');
define('TEXT_PRODUCTS_DESCRIPTION', 'Descripción del producto:');
define('TEXT_PRODUCTS_QUANTITY', 'Cantidad:');
define('TEXT_PRODUCTS_MODEL', 'Modelo:');
define('TEXT_PRODUCTS_IMAGE', 'Imagen:');
define('TEXT_PRODUCTS_URL', 'URL del producto:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(sin http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', 'Precio del producto (neto):');
define('TEXT_PRODUCTS_PRICE_GROSS', 'Precio del producto (PVP):');
define('TEXT_PRODUCTS_WEIGHT', 'Peso:');
define('TEXT_NONE', '--ninguno--');

define('EMPTY_CATEGORY', 'Categoría vacía');

define('TEXT_HOW_TO_COPY', 'Método de copia:');
define('TEXT_COPY_AS_LINK', 'Enlazar el producto');
define('TEXT_COPY_AS_DUPLICATE', 'Duplicar el producto');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Error: No se pueden enlazar productos en la misma categoría.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: No se puede escribir en el directorio de imágenes del catálogo: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: No existe el directorio de imágenes del catálogo: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Error: La categoría no se puede mover a una subcategoría.');

//Header Tags Controller Admin
define('TEXT_PRODUCT_METTA_INFO', '<b>Información de Meta Tag</b>');
define('TEXT_PRODUCTS_PAGE_TITLE', 'Título de la página del producto :');
define('TEXT_PRODUCTS_HEADER_DESCRIPTION', 'Descripción del encabezado de página :');
define('TEXT_PRODUCTS_KEYWORDS', 'Palabras clave del producto :');

define('IMAGE_EDIT_ATTRIBUTES', 'Editar los atributos del producto');

// mod for sub products
define('MAX_PRODUCT_SUB_ROWS', '5');
define('TEXT_SUB_PRODUCT','Sub Product:');
define('TEXT_SUB_PRODUCT_DELETE','Delete');
define('TEXT_SUB_PRODUCT_NAME','Name');
define('TEXT_SUB_PRODUCT_PRICE','Price');
define('TEXT_SUB_PRODUCT_MODEL','Model');
define('TEXT_SUB_PRODUCT_QTY','Qty');
define('TEXT_SUB_PRODUCT_WEIGHT','Weight');
define('TEXT_SUB_PRODUCT_IMAGE','Image');
define('TEXT_SUB_PRODUCT_NOTE_1','* additional subproducts available upon insert');
define('TEXT_SUB_PRODUCT_NOTE_2','* zero quantity disables the subproduct');

// Eversun mod for sppc and qty price breaks
define('TEXT_PRODUCTS_PRICE', 'Retail Price:');
define('TEXT_PRODUCTS_GROUPS', 'Groups:');
define('TEXT_PRODUCTS_BASE', 'Base');
define('TEXT_PRODUCTS_ABOVE', 'Above');
define('TEXT_PRODUCTS_QTY', 'Qty');
define('TEXT_PRODUCTS_QTY_BLOCKS', 'Quantity Blocks:');
define('TEXT_PRODUCTS_QTY_BLOCKS_INFO', '(can only order in blocks of X quantity)');
define('TEXT_PRODUCTS_SPPP_NOTE', 'Note that if a field is filled, but the checkbox is unchecked no price will be inserted.<br />If a price is already inserted in the database, but the checkbox unchecked it will be removed from the database.');
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
