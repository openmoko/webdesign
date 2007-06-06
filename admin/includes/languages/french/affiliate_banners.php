<?php
/*
  $Id: affiliate_banners.php,v 2.0 2002/09/29 SDK

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 -2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Manager de Banni&egrave;res Affili&eacute;s');

define('TABLE_HEADING_BANNERS', 'Banni&egrave;res');
define('TABLE_HEADING_GROUPS', 'Groupes');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_STATISTICS', 'Statistiques');
define('TABLE_HEADING_PRODUCT_ID', 'Produits ID');
define('TEXT_VALID_CATEGORIES_LIST', 'Available Categories List');
define('TEXT_VALID_CATEGORIES_ID', 'Category #');
define('TEXT_VALID_CATEGORIES_NAME', 'Categories Name');
define('TABLE_HEADING_CATEGORY_ID', 'Cat ID');
define('TEXT_BANNERS_LINKED_CATEGORY','Category ID');
define('TEXT_BANNERS_LINKED_CATEGORY_NOTE','If you want to link the Banner to a specific CATEGORY enter its CATEGORY ID here. If you want to link to the default page enter "0"');
define('TEXT_AFFILIATE_VALIDCATS', 'Click Here:');
define('TEXT_AFFILIATE_CATEGORY_BANNER_VIEW', 'to view available CATEGORIES.');
define('TEXT_AFFILIATE_CATEGORY_BANNER_HELP', 'Select the category number from the popup window and enter the number in the Category ID field.');

define('TEXT_BANNERS_TITLE', 'Titre de la banni&egrave;re:');
define('TEXT_BANNERS_GROUP', 'Groupe de la banni&egrave;re:');
define('TEXT_BANNERS_NEW_GROUP', ', ou &eacute;crivez un nouveau groupe de banni&egrave;re ci-dessous');
define('TEXT_BANNERS_IMAGE', 'Image:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', ou entrez dans le dossier local ci-dessous');
define('TEXT_BANNERS_IMAGE_TARGET', 'Cible de l\'image (Enregistrer sous):');
define('TEXT_BANNERS_HTML_TEXT', 'Texte HTML:');
define('TEXT_AFFILIATE_BANNERS_NOTE', '<b>Commentaire de la banni&egrave;re:</b><ul><li>Employez une image ou le texte de HTML pour la banni&egrave;re -pas tous les deux.</li><li>Le texte de HTML a la priorit&eacute; sur l\'image</li></ul>');

define('TEXT_BANNERS_LINKED_PRODUCT','ID du produit');
define('TEXT_BANNERS_LINKED_PRODUCT_NOTE','Si vous voulez lier la banni&egrave;re &agrave; un produit sp&eacute;cifique &eacute;crivez ici l\'ID du produit. Si vous voulez lier &agrave; la page par d&eacute;faut entrez "0"');

define('TEXT_BANNERS_DATE_ADDED', 'Date d\'ajout:');
define('TEXT_BANNERS_STATUS_CHANGE', 'Derni&egrave;re modification: %s');
define('TEXT_AFFILIATE_VALIDPRODUCTS', 'Click Here:');
define('TEXT_AFFILIATE_INDIVIDUAL_BANNER_VIEW', 'to view available products.');
define('TEXT_AFFILIATE_INDIVIDUAL_BANNER_HELP', 'Select the product number from the popup window and enter the number in the Product ID field.');

define('TEXT_VALID_PRODUCTS_LIST', 'Available Products List');
define('TEXT_VALID_PRODUCTS_ID', 'Product #');
define('TEXT_VALID_PRODUCTS_NAME', 'Products Name');

define('TEXT_CLOSE_WINDOW', '<u>Close Window</u> [x]');

define('TEXT_INFO_DELETE_INTRO', 'Are you sure you want to delete this banner?');
define('TEXT_INFO_DELETE_IMAGE', 'Supprimer la banni&egrave;re');

define('SUCCESS_BANNER_INSERTED', 'Succ&egrave;s:  La banni&egrave;re a &eacute;t&eacute; ins&eacute;r&eacute;e.');
define('SUCCESS_BANNER_UPDATED', 'Succ&egrave;s:  La banni&egrave;re a &eacute;t&eacute; mise &agrave; jour.');
define('SUCCESS_BANNER_REMOVED', 'Succ&egrave;s:  La banni&egrave;re a &eacute;t&eacute; enlev&eacute;e.');

define('ERROR_BANNER_TITLE_REQUIRED', 'Erreur:  Le titre de la banni&egrave;re est exig&eacute;.');
define('ERROR_BANNER_GROUP_REQUIRED', 'Erreur:  Groupe de banni&egrave;re requis.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Erreur:  Le r&eacute;pertoire cibl&eacute; n\'existe pas.');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Erreur: le r&eacute;pertoire cibl&eacute; n\'a pas les droits en &eacute;criture.');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'Erreur: L\'image n\'existe pas.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Erreur:  L\'image ne peut pas être supprim&eacute;e.');
?>