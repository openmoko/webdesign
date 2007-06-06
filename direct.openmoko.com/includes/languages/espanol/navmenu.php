<?php
/*
  $Id: categories.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Navigation Menu');
define('HEADING_TITLE_SEARCH', 'Search:');
define('HEADING_TITLE_GOTO', 'Go To:');

define('TABLE_HEADING_CATEGORIES_LINKS', 'Categories / Links');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATUS', 'Status');



// BOF MaxiDVD: Added For Ultimate-Images Pack!
define('TEXT_PRODUCTS_IMAGE_NOTE','<b>Products Image:</b><small><br>Main Image used in <br><u>catalog & description</u> pages.<small>');
define('TEXT_PRODUCTS_IMAGE_MEDIUM', '<b>Small Image:</b><br><small> Image on<br><u>products list</u> pages.</small>');
define('TEXT_PRODUCTS_IMAGE_LARGE', '<b>Pop-up Image:</b><br><small> Large Image on<br><u>pop-up window</u> page.</small>');
define('TEXT_PRODUCTS_IMAGE_LINKED', '<u>Store Product/s Sharing this Image =</u>');
define('TEXT_PRODUCTS_IMAGE_REMOVE', '<b>Remove</b> this Image from this Product?');
define('TEXT_PRODUCTS_IMAGE_DELETE', '<b>Delete</b> this Image from the Server (Permanent!)?');
define('TEXT_PRODUCTS_IMAGE_REMOVE_SHORT', 'Remove');
define('TEXT_PRODUCTS_IMAGE_DELETE_SHORT', 'Delete');
define('TEXT_PRODUCTS_IMAGE_TH_NOTICE', '<b>SM = Small Images.</b> If a "SM" image is used<br>(Alone) NO Pop-up window link is created, the "SM"<br> will be placed directly under the products<br>description. If used in conjunction with an <br>"XL" image on the right, a Pop-up Window Link<br> is created and the "XL" image will be<br>shown in a Pop-up window.<br><br>');
define('TEXT_PRODUCTS_IMAGE_XL_NOTICE', '<b>XL = Large Images.</b> Used for the Pop-up image<br><br><br>');
define('TEXT_PRODUCTS_IMAGE_ADDITIONAL', 'Additional Images - These will appear below product description if used.');
define('TEXT_PRODUCTS_IMAGE_SM_1', 'SM Image 1:');
define('TEXT_PRODUCTS_IMAGE_XL_1', 'XL Image 1:');
define('TEXT_PRODUCTS_IMAGE_SM_2', 'SM Image 2:');
define('TEXT_PRODUCTS_IMAGE_XL_2', 'XL Image 2:');
define('TEXT_PRODUCTS_IMAGE_SM_3', 'SM Image 3:');
define('TEXT_PRODUCTS_IMAGE_XL_3', 'XL Image 3:');
define('TEXT_PRODUCTS_IMAGE_SM_4', 'SM Image 4:');
define('TEXT_PRODUCTS_IMAGE_XL_4', 'XL Image 4:');
define('TEXT_PRODUCTS_IMAGE_SM_5', 'SM Image 5:');
define('TEXT_PRODUCTS_IMAGE_XL_5', 'XL Image 5:');
define('TEXT_PRODUCTS_IMAGE_SM_6', 'SM Image 6:');
define('TEXT_PRODUCTS_IMAGE_XL_6', 'XL Image 6:');
// EOF MaxiDVD: Added For Ultimate-Images Pack!



define('TEXT_NEW_PRODUCT', 'New Product in &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Categories:');
define('TEXT_SUBCATEGORIES', 'Subcategories:');
define('TEXT_PRODUCTS', 'Products:');
define('TEXT_PRODUCTS_PRICE_INFO', 'Price:');
define('TEXT_PRODUCTS_TAX_CLASS', 'Tax Class:');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'Average Rating:');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Quantity:');
define('TEXT_DATE_ADDED', 'Date Added:');
define('TEXT_DELETE_IMAGE', 'Delete Image');

define('TEXT_DATE_AVAILABLE', 'Date Available:');
define('TEXT_LAST_MODIFIED', 'Last Modified:');
define('TEXT_IMAGE_NONEXISTENT', 'IMAGE DOES NOT EXIST');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Please insert a new category or product in this level.');
define('TEXT_PRODUCT_MORE_INFORMATION', 'For more information, please visit this products <a href="http://%s" target="blank"><u>webpage</u></a>.');
define('TEXT_PRODUCT_DATE_ADDED', 'This product was added to our catalog on %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'This product will be in stock on %s.');

define('TEXT_EDIT_INTRO', 'Please make any necessary changes');
define('TEXT_EDIT_CATEGORIES_ID', 'Category ID:');
define('TEXT_EDIT_CATEGORIES_NAME', 'Category Name:');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Category Image:');
define('TEXT_EDIT_SORT_ORDER', 'Sort Order:');
define('TEXT_EDIT_CATEGORIES_HEADING_TITLE', 'Category heading title:');
define('TEXT_EDIT_CATEGORIES_DESCRIPTION', 'Category heading Description:');
define('TEXT_EDIT_CATEGORIES_TITLE_TAG', 'Category Title Meta Tag :');
define('TEXT_EDIT_CATEGORIES_DESC_TAG', 'Category Description Meta Tag :');
define('TEXT_EDIT_CATEGORIES_KEYWORDS_TAG', 'Category Key Word Meta Tag :');

define('TEXT_INFO_COPY_TO_INTRO', 'Please choose a new category you wish to copy this product to');
define('TEXT_INFO_CURRENT_CATEGORIES', 'Current Categories:');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'New Category');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Edit Category');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Delete Category');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'Move Category');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Delete Product');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', 'Move Product');
define('TEXT_INFO_HEADING_COPY_TO', 'Copy To');

define('TEXT_DELETE_CATEGORY_INTRO', 'Are you sure you want to delete this category?');
define('TEXT_DELETE_PRODUCT_INTRO', 'Are you sure you want to permanently delete this product?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>WARNING:</b> There are %s (child-)categories still linked to this category!');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>WARNING:</b> There are %s products still linked to this category!');

define('TEXT_MOVE_PRODUCTS_INTRO', 'Please select which category you wish <b>%s</b> to reside in');
define('TEXT_MOVE_CATEGORIES_INTRO', 'Please select which category you wish <b>%s</b> to reside in');
define('TEXT_MOVE', 'Move <b>%s</b> to:');

define('TEXT_NEW_CATEGORY_INTRO', 'Please fill out the following information for the new category');
define('TEXT_CATEGORIES_NAME', 'Category Name:');
define('TEXT_CATEGORIES_IMAGE', 'Category Image:');
define('TEXT_SORT_ORDER', 'Sort Order:');

define('TEXT_PRODUCTS_STATUS', 'Products Status:');
define('TEXT_PRODUCTS_DATE_AVAILABLE', 'Date Available:');
define('TEXT_PRODUCT_AVAILABLE', 'In Stock');
define('TEXT_PRODUCT_NOT_AVAILABLE', 'Out of Stock');
define('TEXT_PRODUCTS_MANUFACTURER', 'Products Manufacturer:');
define('TEXT_PRODUCTS_NAME', 'Products Name:');
define('TEXT_PRODUCTS_DESCRIPTION', 'Products Description:');
define('TEXT_PRODUCTS_QUANTITY', 'Products Quantity:');
define('TEXT_PRODUCTS_MODEL', 'Products Model:');
define('TEXT_PRODUCTS_IMAGE', 'Products Image:');
define('TEXT_PRODUCTS_URL', 'Products URL:');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(without http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', 'Products Price (Net):');
define('TEXT_PRODUCTS_PRICE_GROSS', 'Products Price (Gross):');
define('TEXT_PRODUCTS_WEIGHT', 'Products Weight:');
define('TEXT_NONE', '--none--');

define('EMPTY_CATEGORY', 'Empty Category');

define('TEXT_HOW_TO_COPY', 'Copy Method :');
define('TEXT_COPY_AS_LINK', 'Link product');
define('TEXT_COPY_AS_DUPLICATE', 'Duplicate product');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Error: Can not link products in the same category.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: Catalog images directory is not writeable: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: Catalog images directory does not exist: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Error: Category cannot be moved into child category.');

//Header Tags Controller Admin
define('TEXT_PRODUCT_METTA_INFO', '<b>Meta Tag Information</b>');
define('TEXT_PRODUCTS_PAGE_TITLE', 'Products Page Title :');
define('TEXT_PRODUCTS_HEADER_DESCRIPTION', 'Page Header Description :');
define('TEXT_PRODUCTS_KEYWORDS', 'Product Keywords :');

define('IMAGE_EDIT_ATTRIBUTES', 'Edit Product Attributes');

// Added for Navigation Menu DMG

define('TEXT_LINKS','Links');
define('TEXT_HEADING_EDIT_CATEGORY','Edit Navigation Category');
define('TEXT_HEADING_NEW_LINK','Create New Navigation Link');
define('TEXT_LINK_NAME','Link Text : ');
define('TEXT_LINK_PAGE','Link Target : ');
define('TEXT_STATUS','Link Status : ');


?>
