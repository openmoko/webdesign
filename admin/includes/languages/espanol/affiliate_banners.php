<?php
/*
  $Id: affiliate_banners.php,v 2.0 2002/09/29 SDK
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 -2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Gestor de banners de asociados ');

define('TABLE_HEADING_BANNERS', 'Banners');
define('TABLE_HEADING_GROUPS', 'Grupos');
define('TABLE_HEADING_ACTION', 'Acción');
define('TABLE_HEADING_STATISTICS', 'Estadísticas');
define('TABLE_HEADING_PRODUCT_ID', 'ID de producto');
define('TEXT_VALID_CATEGORIES_LIST', 'Available Categories List');
define('TEXT_VALID_CATEGORIES_ID', 'Category #');
define('TEXT_VALID_CATEGORIES_NAME', 'Categories Name');
define('TABLE_HEADING_CATEGORY_ID', 'Cat ID');
define('TEXT_BANNERS_LINKED_CATEGORY','Category ID');
define('TEXT_BANNERS_LINKED_CATEGORY_NOTE','If you want to link the Banner to a specific CATEGORY enter its CATEGORY ID here. If you want to link to the default page enter "0"');
define('TEXT_AFFILIATE_VALIDCATS', 'Click Here:');
define('TEXT_AFFILIATE_CATEGORY_BANNER_VIEW', 'to view available CATEGORIES.');
define('TEXT_AFFILIATE_CATEGORY_BANNER_HELP', 'Select the category number from the popup window and enter the number in the Category ID field.');

define('TEXT_BANNERS_TITLE', 'Título del banner:');
define('TEXT_BANNERS_GROUP', 'Grupo del banner:');
define('TEXT_BANNERS_NEW_GROUP', ', o introduzca un grupo nuevo para el banner abajo');
define('TEXT_BANNERS_IMAGE', 'Imagen:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', o introduzca un archivo local de su servidor abajo');
define('TEXT_BANNERS_IMAGE_TARGET', 'Destino de la imagen (Grabar en):');
define('TEXT_BANNERS_HTML_TEXT', 'Texto HTML:');
define('TEXT_AFFILIATE_BANNERS_NOTE', '<b>Notas sobre el Banner:</b><ul><li>Use una imagen o texto HTML para el banner - no ambos.</li><li>El texto HTML tiene prioridad sobre una imagen</li></ul>');

define('TEXT_BANNERS_LINKED_PRODUCT','ID de producto');
define('TEXT_BANNERS_LINKED_PRODUCT_NOTE','Si quiere enlazar el banner a un producto específico, introduzca su ID aquí. Si quiere enlazar a la página por defecto introduzca "0" (cero)');

define('TEXT_BANNERS_DATE_ADDED', 'Añadido el:');
define('TEXT_BANNERS_STATUS_CHANGE', 'Último cambio: %s');
define('TEXT_AFFILIATE_VALIDPRODUCTS', 'Click Here:');
define('TEXT_AFFILIATE_INDIVIDUAL_BANNER_VIEW', 'to view available products.');
define('TEXT_AFFILIATE_INDIVIDUAL_BANNER_HELP', 'Select the product number from the popup window and enter the number in the Product ID field.');

define('TEXT_VALID_PRODUCTS_LIST', 'Available Products List');
define('TEXT_VALID_PRODUCTS_ID', 'Product #');
define('TEXT_VALID_PRODUCTS_NAME', 'Products Name');

define('TEXT_CLOSE_WINDOW', '<u>Close Window</u> [x]');

define('TEXT_INFO_DELETE_INTRO', '¿Seguro que quiere eliminar este banner?');
define('TEXT_INFO_DELETE_IMAGE', 'Eliminar imagen de banner');

define('SUCCESS_BANNER_INSERTED', 'OK: Se ha insertado el banner.');
define('SUCCESS_BANNER_UPDATED', 'OK: Se ha actualizado el banner.');
define('SUCCESS_BANNER_REMOVED', 'OK: Se ha eliminado el banner.');

define('ERROR_BANNER_TITLE_REQUIRED', 'Error: Es necesario un título para el banner.');
define('ERROR_BANNER_GROUP_REQUIRED', 'Error: Es necesario un grupo para el banner.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: El directorio de destino no existe.');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: No hay permiso de escritura sobre el directorio de destino.');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'Error: La imagen no existe.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Error: No se puede eliminar la imagen.');
?>
