<?php
/*
  $Id: edit_orders.php,v 1.25 2003/08/07 00:28:44 jwh Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Edition Commande');
define('HEADING_TITLE_NUMBER', 'Nr.');
define('HEADING_TITLE_DATE', 'of');
define('HEADING_SUBTITLE', 'Please edit all parts as desired and click on the "Update" button below.');
define('HEADING_TITLE_SEARCH', 'ID Commande:');
define('HEADING_TITLE_STATUS', 'Statut:');
define('ADDING_TITLE', 'Ajout d\'un produit à la commande');

define('ADD_PRODUCT', 'Add a Product to Order');
define('HEADING_ABANDONED', '<B>This order was not completed and abandoned!!! Order ID:  </B>');


define('ENTRY_UPDATE_TO_CC', '(Update to <b>Credit Card</b> to view CC fields.)');
define('HINT_DELETE_POSITION', '<font color="#FF0000">Hint: </font>To delete a product set its quantity to "0".');
define('HINT_TOTALS', '<font color="#FF0000">Hint: </font>Feel free to give discounts by adding negative amounts to the list.<br>Fields with "0" values are deleted when updating the order (exception: shipping).');
define('HINT_PRESS_UPDATE', 'Please click on "Update" to save all changes made above.');
define('TABLE_HEADING_COMMENTS', 'Commentaires');
define('TABLE_HEADING_CUSTOMERS', 'Clients');
define('TABLE_HEADING_ORDER_TOTAL', 'Total Commande');
define('TABLE_HEADING_DATE_PURCHASED', 'Date d\'achat');
define('TABLE_HEADING_STATUS', 'Statut');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_QUANTITY', 'Qt&eacute;.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Mod&egrave;le');
define('TABLE_HEADING_PRODUCTS', 'Produits');
define('TABLE_HEADING_TAX', 'Taxe');
define('TABLE_HEADING_TOTAL', 'Total');
define('TABLE_HEADING_UNIT_PRICE', 'Prix unitaire');
define('TABLE_HEADING_BASE_PRICE', 'Base Price');
define('TABLE_HEADING_UNIT_PRICE_TAXED', 'Price (incl.)');
define('TABLE_HEADING_TOTAL_PRICE', 'Prix total');
define('TABLE_HEADING_TOTAL_PRICE_TAXED', 'Total (incl.)');
define('TABLE_HEADING_TOTAL_MODULE', 'Total Price Component');
define('TABLE_HEADING_TOTAL_AMOUNT', 'Amount');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Client notifi&eacute;');
define('TABLE_HEADING_DATE_ADDED', 'Date d\'ajout');

define('ENTRY_CUSTOMER', 'Client:');
define('ENTRY_CUSTOMER_NAME', 'Nom');
define('ENTRY_CUSTOMER_COMPANY', 'Soci&eacute;t&eacute;');
define('ENTRY_CUSTOMER_ADDRESS', 'Adresse');
define('ENTRY_CUSTOMER_SUBURB', 'Compl&eacute;ment adresse');
define('ENTRY_CUSTOMER_CITY', 'Ville');
define('ENTRY_CUSTOMER_STATE', 'Etat');
define('ENTRY_CUSTOMER_POSTCODE', 'Code Postal');
define('ENTRY_CUSTOMER_COUNTRY', 'Pays');
define('ENTRY_CUSTOMER_PHONE', 'Phone');
define('ENTRY_CUSTOMER_EMAIL', 'E-Mail');
define('ENTRY_SOLD_TO', 'VENDU A:');
define('ENTRY_DELIVERY_TO', 'Livraison &agrave;:');
define('ENTRY_SHIP_TO', 'LIVRE A:');
define('ENTRY_SHIPPING_ADDRESS', 'Adresse de livraison:');
define('ENTRY_BILLING_ADDRESS', 'Adresse de facturation:');
define('ENTRY_PAYMENT_METHOD', 'M&eacute;thode de paiement:');
define('ENTRY_CREDIT_CARD_TYPE', 'Type de carte de cr&eacute;dit:');
define('ENTRY_CREDIT_CARD_OWNER', 'Propri&eacute;taire de la carte de cr&eacute;dit:');
define('ENTRY_CREDIT_CARD_NUMBER', 'Num&eacute;ro de la carte de cr&eacute;dit:');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Date d\'expiration de la carte de cr&eacute;dit:');
define('ENTRY_CREDIT_CARD_CCV', 'CCV/CVC/CSC code: ');
define('ENTRY_CREDIT_CARD_START_DATE', 'Start Date: ');
define('ENTRY_CREDIT_CARD_ISSUE', 'Issue Number: ');
define('ENTRY_SUB_TOTAL', 'Sous-Total:');
define('ENTRY_TAX', 'Taxe:');
define('ENTRY_SHIPPING', 'Exp&eacute;dition:');
define('ENTRY_TOTAL', 'Total:');
define('ENTRY_DATE_PURCHASED', 'Date d\'achat:');
define('ENTRY_STATUS', 'Statut:');
define('ENTRY_DATE_LAST_UPDATED', 'Derni&egrave;re date de mise &agrave; jour:');
define('ENTRY_NOTIFY_CUSTOMER', 'Informer client:');
define('ENTRY_NOTIFY_COMMENTS', 'Ajouter un commentaire:');
define('ENTRY_PRINTABLE', 'Imprimer la facture');
define('ENTRY_CUSTOMER_DISCOUNT', 'Use a negative number -1.00 ');
define('ENTRY_CUSTOMER_GV', 'Discount/Gift Voucher: ');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Supprimer la commande');
define('TEXT_INFO_DELETE_INTRO', 'Etes vous sur de vouloir supprimer cette commande?');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Restaurer la valeur de stock');
define('TEXT_DATE_ORDER_CREATED', 'Date de cr&eacute;ation:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Derni&egrave;re modification:');
define('TEXT_DATE_ORDER_ADDNEW', 'Ajouter Produit(s).');
define('TEXT_INFO_PAYMENT_METHOD', 'M&eacute;thode de paiement:');

define('TEXT_CARD_ENCRPYT', '<font color=green> </b> This CC number is stored Encrypted </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC number is not stored Encrypted </b></font>');
define('TEXT_EXPIRES_ENCRPYT', '<font color=green> </b> This CC expire date is stored Encrypted </b></font>');
define('TEXT_EXPIRES_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC expire date is not stored Encrypted </b></font>');
define('TEXT_CCV_ENCRPYT', '<font color=green> </b> This CC CCV is stored Encrypted </b></font>');
define('TEXT_CCV_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC CCV is not stored Encrypted If blank ignore this message</b></font>');

define('TEXT_EXPIRES_REMOVED', '<font color=green> </b> This CC expire date has been removed from the store.</b></font>');
define('TEXT_CCV_REMOVED', '<font color=green> </b> This CCV is not store or has been removed from the store.</b></font>');
define('TEXT_CARD__REMOVED', '<font color=green> </b> This CC number is not store or has been removed from the store.</b></font>');


define('ENTRY_IPADDRESS', 'IP Address:');
define('ENTRY_IPISP', 'ISP:');

define('TEXT_ALL_ORDERS', 'Toutes les commandes');
define('TEXT_NO_ORDER_HISTORY', 'Aucun historique de commande disponible');


define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Mise à jour de la commande');
define('EMAIL_TEXT_ORDER_NUMBER', 'Num&eacute;ro de commande : ');
define('EMAIL_TEXT_INVOICE_URL', 'Facture d&eacute;taill&eacute;e : ');
define('EMAIL_TEXT_DATE_ORDERED', 'Date de commande : ');
define('EMAIL_TEXT_STATUS_UPDATE', 'Le statut de votre commande a &eacute;t&eacute; mis à jour comme suit.' . "\n\n" . 'Nouveau statut : %s' . "\n\n" . 'Merci de r&eacute;pondre à ce courrier &eacute;lectronique si vous avez des questions.' . "\n");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Les commentaires de votre commande sont : ' . "\n\n%s\n\n");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Erreur: La commande n\'existe pas.');
define('SUCCESS_ORDER_UPDATED', 'Succ&egrave;s: Commande mis &agrave; jour avec succ&egrave;s.');
define('WARNING_ORDER_NOT_UPDATED', 'Attention: Aucune modification n\'a &eacute;t&eacute; effectu&eacute;. La commande n\'a pas &eacute;t&eacute; mis &agrave; jour.');
define('SUCCESS_PRODUCT_ADDED', 'Success : This order has been updated and a new product has been added');


define('ADDPRODUCT_TEXT_CATEGORY_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_PRODUCT', 'Choisir produit');
define('ADDPRODUCT_TEXT_PRODUCT_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_SELECT_OPTIONS', 'Chosir options');
define('ADDPRODUCT_TEXT_OPTIONS_CONFIRM', 'OK');
define('ADDPRODUCT_TEXT_OPTIONS_NOTEXIST', 'Pad d\'options: Passer...');
define('ADDPRODUCT_TEXT_CONFIRM_QUANTITY', 'Qt&eacute;.');
define('ADDPRODUCT_TEXT_CONFIRM_ADDNOW', 'Ajouter maintenant');
define('ADDPRODUCT_TEXT_STEP', 'Step');
define('ADDPRODUCT_TEXT_STEP1', ' &laquo; Choose a catalogue. ');
define('ADDPRODUCT_TEXT_STEP2', ' &laquo; Choose a product. ');
define('ADDPRODUCT_TEXT_STEP3', ' &laquo; Choose an option. ');

define('MENUE_TITLE_CUSTOMER', '1. Customer Data');
define('MENUE_TITLE_PAYMENT', '2. Payment Method');
define('MENUE_TITLE_ORDER', '3. Ordered Products');
define('MENUE_TITLE_TOTAL', '4. Discount, Shipping and Total');
define('MENUE_TITLE_STATUS', '5. Status and Notification');
define('MENUE_TITLE_UPDATE', '6. Update Data');

define('DISPLAY_BASKET', 'Choisissez Ces Options');
define('DONT_ADD_NEW_PRODUCT', 'N\'ajoutez pas Le Nouveau Produit');
define('SELECT_THESE_OPTIONS', "Choisissez Ces Options");
?>