<?php
/*
  $Id: salemaker.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Vendeur');

define('TABLE_HEADING_SALE_NAME', 'Nom');
define('TABLE_HEADING_SALE_DEDUCTION', 'Reduction');
define('TABLE_HEADING_SALE_DATE_START', 'Date de debut');
define('TABLE_HEADING_SALE_DATE_END', 'Date de fin');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_SALEMAKER_NAME', 'Nom du vendeur :');
define('TEXT_SALEMAKER_DEDUCTION', 'R&eacute;duction :');
define('TEXT_SALEMAKER_DEDUCTION_TYPE', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Type:&nbsp;&nbsp;');
define('TEXT_SALEMAKER_PRICERANGE_FROM', 'Gamme de prix du produit :');
define('TEXT_SALEMAKER_PRICERANGE_TO', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
define('TEXT_SALEMAKER_SPECIALS_CONDITION', 'Si ce produit est sp&eacute;cial :');
define('TEXT_SALEMAKER_DATE_START', 'Date de d&eacute;but :');
define('TEXT_SALEMAKER_DATE_END', 'Date de fin :');
define('TEXT_SALEMAKER_CATEGORIES', '<b>Ou</b> v&eacute;rifiez les cat&eacute;gories auxquelles cette vente s\'applique :');
define('TEXT_SALEMAKER_POPUP', '<a href="javascript:session_win();"><span class="errorText"><b>Cliquez ici pour les voir les conseil d\'usage du vendeur.</b></span></a>');
define('TEXT_SALEMAKER_IMMEDIATELY', 'Immediatement');
define('TEXT_SALEMAKER_NEVER', 'jamais');
define('TEXT_SALEMAKER_ENTIRE_CATALOG', 'Cocher cette case si vous voulez que la vente soit appliqu&eacute;e &agrave; <b>tous les produits</b>:');
define('TEXT_SALEMAKER_TOP', 'Catalogue en entier');

define('TEXT_INFO_DATE_ADDED', 'Date d\'ajout:');
define('TEXT_INFO_DATE_MODIFIED', 'Derni&egrave;re modification:');
define('TEXT_INFO_DATE_STATUS_CHANGE', 'Dernier changement de statut:');
define('TEXT_INFO_SPECIALS_CONDITION', 'Conditions sp&eacute;ciales:');
define('TEXT_INFO_DEDUCTION', 'R&eacute;duction:');
define('TEXT_INFO_PRICERANGE_FROM', 'Rabait:');
define('TEXT_INFO_PRICERANGE_TO', ' &agrave; ');
define('TEXT_INFO_DATE_START', 'D&eacute;but&eacute; :');
define('TEXT_INFO_DATE_END', 'se termine:');

define('SPECIALS_CONDITION_DROPDOWN_0', 'Ignorer les prix sp&eacute;ciaux');
define('SPECIALS_CONDITION_DROPDOWN_1', 'Ignorer les conditions de vente');
define('SPECIALS_CONDITION_DROPDOWN_2', 'Appliquez la r&eacute;duction de vente au prix sp&eacute;cial');

define('DEDUCTION_TYPE_DROPDOWN_0', 'D&eacute;duire le montant');
define('DEDUCTION_TYPE_DROPDOWN_1', 'Pourcent');
define('DEDUCTION_TYPE_DROPDOWN_2', 'Nouveau Prix');

define('TEXT_INFO_HEADING_COPY_SALE', 'Copiez la vente');
define('TEXT_INFO_COPY_INTRO', 'Entrer un nom pour la copie de la vente<br>&nbsp;&nbsp;"%s"');

define('TEXT_INFO_HEADING_DELETE_SALE', 'Supprimer la vente');
define('TEXT_INFO_DELETE_INTRO', 'Etes vous sur vous voulez supprimer de mani&egrave;re permanente cette vente?');
?>