<?php
/*
  $Id: categories.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

// BOF MaxiDVD: Added For Ultimate-Images Pack!
define('TEXT_PRODUCTS_IMAGE_NOTE','Images du produit:<small><br>Image principale utilis&eacute;e dans la page <br><u>catalogue & description</u>.<small>');
define('TEXT_PRODUCTS_IMAGE_MEDIUM', 'Grande Image:<br><small>REMPLACE les petites images dans la page <br><u>description produits</u>.</small>');
define('TEXT_PRODUCTS_IMAGE_LARGE', 'Pop-up Image:<br><small>REMPLACE les petites images dans la page <br><u>pop-up</u>.</small>');
define('TEXT_PRODUCTS_IMAGE_LINKED', '<u>Produit partageant cette image =</u>');
define('TEXT_PRODUCTS_IMAGE_REMOVE', '<b>Enlever</b> cette image du produit?');
define('TEXT_PRODUCTS_IMAGE_DELETE', '<b>D&eacute;truire</b> cette image du serveur (Permanent!)?');
define('TEXT_PRODUCTS_IMAGE_REMOVE_SHORT', 'Enlever');
define('TEXT_PRODUCTS_IMAGE_DELETE_SHORT', 'D&eacute;truire');
define('TEXT_PRODUCTS_IMAGE_TH_NOTICE', '<b>SM = Petites Images,</b> si une image "SM" st utilis&eacute;e<br>(Seule) Aucun lien Pop-up n est cr&eacute;&eacute;, l image "SM"<br> sera plac&eacute;e directement sous la description du produit<br>. Si utilis&eacute;e en compl&eacute;ment de l image<br>"XL" à droite, un lien Pop-up est cr&eacute;&eacute;<br> et l image "XL" apparaitra<br>dans un Pop-up.<br><br>');
define('TEXT_PRODUCTS_IMAGE_XL_NOTICE', '<b>XL = Larges Images,</b> Utilis&eacute;e pour les images Pop-up<br><br><br>');
define('TEXT_PRODUCTS_IMAGE_ADDITIONAL', 'Plus d images additionnelles - celles-ci apparaîtront au-dessous de la description de produit si utilis&eacute;.');
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

define('HEADING_TITLE', 'Cat&eacute;gories / Produits');
define('HEADING_TITLE_SEARCH', 'Rechercher :');
define('HEADING_TITLE_GOTO', 'Aller &agrave; :');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_CATEGORIES_PRODUCTS', 'Cat&eacute;gories / Produits');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATUS', 'Statut');

define('TEXT_NEW_PRODUCT', 'Nouveau Produit dans &quot;%s&quot;');
define('TEXT_CATEGORIES', 'Cat&eacute;gories :');
define('TEXT_SUBCATEGORIES', 'Sous-cat&eacute;gories :');
define('TEXT_PRODUCTS', 'Produits :');
define('TEXT_PRODUCTS_PRICE_INFO', 'Prix :');
define('TEXT_PRODUCTS_TAX_CLASS', 'Classe Fiscale :');
define('TEXT_PRODUCTS_AVERAGE_RATING', 'Ratio moyen :');
define('TEXT_PRODUCTS_QUANTITY_INFO', 'Quantit&eacute; :');
define('TEXT_DATE_ADDED', 'Date d\'ajout :');
define('TEXT_DELETE_IMAGE', 'D&eacute;truire image');

define('TEXT_DATE_AVAILABLE', 'Date disponibilit&eacute; :');
define('TEXT_LAST_MODIFIED', 'Derni&egrave;re modification :');
define('TEXT_IMAGE_NONEXISTENT', 'L\'IMAGE N\'EXISTE PAS');
define('TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS', 'Merci de cr&eacute;er une nouvelle cat&eacute;gorie ou un produit dans ce niveau.');
define('TEXT_PRODUCT_MORE_INFORMATION', 'Pour plus d\'information, merci de visiter cette <a href="http://%s" target="blank"><u>page web</u></a> de produits.');
define('TEXT_PRODUCT_DATE_ADDED', 'Ce produit a &eacute;t&eacute; ajout&eacute; &agrave; notre catalogue le %s.');
define('TEXT_PRODUCT_DATE_AVAILABLE', 'Ce produit sera en stock le %s.');

define('TEXT_EDIT_INTRO', 'Merci de faire les changements n&eacute;cessaires');
define('TEXT_EDIT_CATEGORIES_ID', 'ID de la cat&eacute;gorie :');
define('TEXT_EDIT_CATEGORIES_NAME', 'Nom de la cat&eacute;gorie :');
define('TEXT_EDIT_CATEGORIES_IMAGE', 'Image de la cat&eacute;gorie :');
define('TEXT_EXISTING_CATEGORIES_IMAGE','Existing Image');
define('TEXT_EDIT_SORT_ORDER', 'Ordre de tri :');
define('TEXT_EDIT_CATEGORIES_HEADING_TITLE', 'Titre de la Cat&eacute;gorie:');
define('TEXT_EDIT_CATEGORIES_DESCRIPTION', 'Description de la Cat&eacute;gorie:');
define('TEXT_EDIT_CATEGORIES_TITLE_TAG', 'Meta Tag Titre de la Cat&eacute;gorie:');
define('TEXT_EDIT_CATEGORIES_DESC_TAG', 'Meta Tag Description de la Cat&eacute;gorie:');
define('TEXT_EDIT_CATEGORIES_KEYWORDS_TAG', 'Meta Tag Mot Cl&eacute; de la Cat&eacute;gorie:');

define('TEXT_INFO_COPY_TO_INTRO', 'Veuillez choisir une nouvelle cat&eacute;gorie dans laquelle vous voulez copier ce produit');
define('TEXT_INFO_CURRENT_CATEGORIES', 'Cat&eacute;gories courantes :');

define('TEXT_INFO_HEADING_NEW_CATEGORY', 'Nouvelle cat&eacute;gorie');
define('TEXT_INFO_HEADING_EDIT_CATEGORY', 'Editer cat&eacute;gorie');
define('TEXT_INFO_HEADING_DELETE_CATEGORY', 'Supprimer cat&eacute;gorie');
define('TEXT_INFO_HEADING_MOVE_CATEGORY', 'D&eacute;placer cat&eacute;gorie');
define('TEXT_INFO_HEADING_DELETE_PRODUCT', 'Supprimer produit');
define('TEXT_INFO_HEADING_MOVE_PRODUCT', 'D&eacute;placer produit');
define('TEXT_INFO_HEADING_COPY_TO', 'Copier vers');

define('TEXT_DELETE_CATEGORY_INTRO', 'Etes vous sur de vouloir supprimer cette cat&eacute;gorie ?');
define('TEXT_DELETE_PRODUCT_INTRO', 'Etes vous sur de vouloir supprimer d&eacute;finitivement ce produit ?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>ATTENTION :</b> Il y a %s (sous-)cat&eacute;gories li&eacute;es &aacute; cette cat&eacute;gorie !');
define('TEXT_DELETE_WARNING_PRODUCTS', '<b>ATTENTION :</b> Il y a %s produits li&eacute;es &aacute; cette cat&eacute;gorie !');

define('TEXT_MOVE_PRODUCTS_INTRO', 'Merci de s&eacute;lectionner la cat&eacute;gorie ou vous voudriez que <b>%s</b> soit plac&eacute;');
define('TEXT_MOVE_CATEGORIES_INTRO', 'Merci de s&eacute;lectionner la cat&eacute;gorie ou vous voudriez que <b>%s</b> soit plac&eacute;');
define('TEXT_MOVE', 'D&eacute;placer <b>%s</b> vers :');

define('TEXT_NEW_CATEGORY_INTRO', 'Merci de compl&eacute;ter les informations suivantes pour la nouvelle cat&eacute;gorie');
define('TEXT_CATEGORIES_NAME', 'Nom de la cat&eacute;gorie :');
define('TEXT_CATEGORIES_IMAGE', 'Image de la cat&eacute;gorie :');
define('TEXT_SORT_ORDER', 'Ordre de tri :');

define('TEXT_PRODUCTS_STATUS', 'Statut des produits :');
define('TEXT_PRODUCTS_DATE_AVAILABLE', 'Date de disponibilit&eacute; :');
define('TEXT_PRODUCT_AVAILABLE', 'En stock');
define('TEXT_PRODUCT_NOT_AVAILABLE', 'Hors stock');
define('TEXT_PRODUCTS_MANUFACTURER', 'Fabricant du produit :');
define('TEXT_PRODUCTS_NAME', 'Nom du produit :');
define('TEXT_PRODUCTS_DESCRIPTION', 'Description du produit :');
define('TEXT_PRODUCTS_QUANTITY', 'Quantit&eacute; de produit en stock :');
define('TEXT_PRODUCTS_MODEL', 'Mod&egrave;le du produit :');
define('TEXT_PRODUCTS_IMAGE', 'Image du produit :');
define('TEXT_PRODUCTS_URL', 'URL du produit :');
define('TEXT_PRODUCTS_URL_WITHOUT_HTTP', '<small>(sans http://)</small>');
define('TEXT_PRODUCTS_PRICE_NET', 'Prix du produit (HT) :');
define('TEXT_PRODUCTS_PRICE_GROSS', 'Prix du produit (TTC) :');
define('TEXT_PRODUCTS_WEIGHT', 'Poids du produit :');
define('TEXT_NONE', '--aucun--');

define('EMPTY_CATEGORY', 'Cat&eacute;gorie vide');

define('TEXT_HOW_TO_COPY', 'M&eacute;thode de copie :');
define('TEXT_COPY_AS_LINK', 'Lien produit');
define('TEXT_COPY_AS_DUPLICATE', 'Dupliquer produit');

define('ERROR_CANNOT_LINK_TO_SAME_CATEGORY', 'Erreur : Impossible de lier des produits dans la m&ecirc;me cat&eacutegorie.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Erreur : Impossible d\'&eacute;crire dans le r&eacute;pertoire images : ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Erreur : Le r&eacute;pertoire d\'images n\'existe pas : ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT', 'Erreur : La cat&eacute;gorie ne peut pas &ecirc;tre d&eacute;plac&eacute;e dans la sous-cat&eacute;gorie.');

//Header Tags Controller Admin
define('TEXT_PRODUCT_METTA_INFO', '<b>Meta Tag Information</b>');
define('TEXT_PRODUCTS_PAGE_TITLE', 'Titre de la page Produit:');
define('TEXT_PRODUCTS_HEADER_DESCRIPTION', 'Description du Page Header:');
define('TEXT_PRODUCTS_KEYWORDS', 'Mots cl&eacute;s Produits:');

define('IMAGE_EDIT_ATTRIBUTES', 'Edit Product Attributes');

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
