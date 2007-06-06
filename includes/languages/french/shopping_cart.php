<?php
/*
  $Id: shopping_cart.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Votre panier');
define('HEADING_TITLE', 'Qu\'y a t\'il dans le panier ? ');
define('TABLE_HEADING_REMOVE', 'Supprimer');
define('TABLE_HEADING_QUANTITY', 'Qt&eacute;.');
define('TABLE_HEADING_MODEL', 'Mod&egrave;le');
define('TABLE_HEADING_PRODUCTS', 'Produit(s)');
define('TABLE_HEADING_TOTAL', 'Total');
define('TEXT_CART_EMPTY', 'Votre panier est vide!!');
define('SUB_TITLE_SUB_TOTAL', 'Sous-Total:');
define('SUB_TITLE_TOTAL', 'Total:');

define('OUT_OF_STOCK_CANT_CHECKOUT', 'Les articles marqu&eacute;s' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantit&eacute; d&eacute;sir&eacute;e.<br>Veuillez ajuster la quantit&eacute; des produits marqu&eacute;s (' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . '), Merci');
define('OUT_OF_STOCK_CAN_CHECKOUT', 'Les articles marqu&eacute;s' . STOCK_MARK_PRODUCT_OUT_OF_STOCK . ' ne sont pas en stock dans la quantit&eacute; d&eacute;sir&eacute;e.<br>N&eacute;anmoins vous pouvez acheter ces articles et v&eacute;rifier la quantit&eacute; que nous avons en stock pour une livraison imm&eacute;diate lors de votre achat.');
?>