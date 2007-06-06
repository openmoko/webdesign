<?php
/*
  $Id: orders.php,v 1.22 2002/11/23 13:58:03 thomasamoulton Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
define('TABLE_HEADING_EDIT_ORDERS', 'To modify the order');

define('HEADING_TITLE', 'Commandes');
define('HEADING_IS_TITLE', 'IS Order');
define('HEADING_IS_RECEIPT', 'IS Receipt');
define('HEADING_TITLE_SEARCH', 'No de commande :');
define('HEADING_TITLE_STATUS', 'Statut :');

define('ENTRY_UPDATE_TO_CC', '(Update to <b>Credit Card</b> to view CC fields.)');
define('TABLE_HEADING_COMMENTS', 'Commentaires');
define('TABLE_HEADING_CUSTOMERS', 'Clients');
define('TABLE_HEADING_ORDERID', 'Order ID');
define('TABLE_HEADING_IS_ORDERNUM', 'IS Order');
define('TABLE_HEADING_ORDER_TOTAL', 'Montant Total');
define('TABLE_HEADING_DATE_PURCHASED', 'Date d\'achat');
define('TABLE_HEADING_STATUS', 'Statut');
define('TABLE_HEADING_ACTION', 'Action');
define('TABLE_HEADING_QUANTITY', 'Qt&eacute;.');
define('TABLE_HEADING_PRODUCTS_MODEL', 'Mod&egrave;le');
define('TABLE_HEADING_PRODUCTS', 'Produits');
define('TABLE_HEADING_TAX', 'Taxe');
define('TABLE_HEADING_TOTAL', 'Total');
define('TABLE_HEADING_BASE_PRICE', 'Base Price'); 

define('TABLE_HEADING_PRICE_EXCLUDING_TAX', 'Prix (ht)');
define('TABLE_HEADING_PRICE_INCLUDING_TAX', 'Prix (ttc)');
define('TABLE_HEADING_TOTAL_EXCLUDING_TAX', 'Total (ht)');
define('TABLE_HEADING_TOTAL_INCLUDING_TAX', 'Total (ttc)');

define('TABLE_HEADING_CUSTOMER_NOTIFIED', 'Client Notifi&eacute;;');
define('TABLE_HEADING_DATE_ADDED', 'Date d\'ajout');

//begin PayPal_Shopping_Cart_IPN
define('TABLE_HEADING_PAYMENT_STATUS', 'Payment Status');
//end PayPal_Shopping_Cart_IPN
define('ENTRY_SUBURB', 'Compl&eacute;ment Adresse :');
define('ENTRY_CITY', 'Ville :');
define('ENTRY_CUSTOMER', 'Client :');
define('ENTRY_STATE', 'D&eacutepartement :');
define('ENTRY_SOLD_TO', 'VENDU A :');
define('ENTRY_TELEPHONE', 'T&eacute;l&eacute;phone :');
define('ENTRY_EMAIL_ADDRESS', 'Adresse E-Mail :');
define('ENTRY_DELIVERY_TO', 'Livr&eacute; à; :');
define('ENTRY_SHIP_TO', 'Envoy&eacute; à; :');
define('ENTRY_SHIPPING_ADDRESS', 'Adresse de livraison :');
define('ENTRY_BILLING_ADDRESS', 'Adresse de facturation :');
define('ENTRY_PAYMENT_METHOD', 'Mode de paiement :');
define('ENTRY_CREDIT_CARD_TYPE', 'Carte de Cr&eacute;dit :');
define('ENTRY_CREDIT_CARD_OWNER', 'Propri&eacute;taire de la carte de cr&eacute;dit :');
define('ENTRY_CREDIT_CARD_NUMBER', 'Num&eacute;ro :');
define('ENTRY_CREDIT_CARD_EXPIRES', 'Date d\'expiration :');
define('ENTRY_CREDIT_CARD_CCV' , 'N° au dos de la CB:'); // cvv contribution
define('ENTRY_CREDIT_CARD_START','Date de d&eacute;part CB');
 define('ENTRY_CREDIT_CARD_ISSUE','Num&eacute;ro ISSUE CB');
define('ENTRY_SUB_TOTAL', 'Sous-Total :');
define('ENTRY_TAX', 'Taxe :');
define('ENTRY_SHIPPING', 'Livraison :');
define('ENTRY_TOTAL', 'Total :');
define('ENTRY_DATE_PURCHASED', 'Date d\'achat :');
define('ENTRY_STATUS', 'Statut :');
define('ENTRY_DATE_LAST_UPDATED', 'Derni&egrave;re mise à jour :');
define('ENTRY_NOTIFY_CUSTOMER', 'Client notifi&eacute; :');
define('ENTRY_NOTIFY_COMMENTS', 'Commentaires ajout&eacute;s :');
define('ENTRY_PRINTABLE', 'Imprimer Facture');

define('TEXT_INFO_HEADING_DELETE_ORDER', 'Effacer commande');
define('TEXT_INFO_DELETE_INTRO', 'Voulez vous vraiment effacer cette commande ?');
define('TEXT_INFO_DELETE_DATA', 'Customers Name  ');
define('TEXT_INFO_DELETE_DATA_OID', 'Order Number  ');
define('TEXT_INFO_RESTOCK_PRODUCT_QUANTITY', 'Remettre les produits en stock');
define('TEXT_DATE_ORDER_CREATED', 'Date Cr&eacute;ation:');
define('TEXT_DATE_ORDER_LAST_MODIFIED', 'Derni&egrave;re Modification :');
define('TEXT_INFO_PAYMENT_METHOD', 'Mode de paiement :');
define('TEXT_INFO_ABANDONDED', 'Abandoned');
define('TEXT_CARD_ENCRPYT', '<font color=green> </b> This CC number is stored Encrypted </b></font>');
define('TEXT_CARD_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC number is not stored Encrypted </b></font>');
define('TEXT_EXPIRES_ENCRPYT', '<font color=green> </b> This CC expire date is stored Encrypted </b></font>');
define('TEXT_EXPIRES_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC expire date is not stored Encrypted </b></font>');
define('TEXT_CCV_ENCRPYT', '<font color=green> </b> This CC CCV is stored Encrypted </b></font>');
define('TEXT_CCV_NOT_ENCRPYT', '<font color=red> <b>Warning !!!! This CC CCV is not stored Encrypted If blank ignore this message</b></font>');

define('TEXT_EXPIRES_REMOVED', '<font color=green> </b> This CC expire date has been removed from the store.</b></font>');
define('TEXT_CCV_REMOVED', '<font color=green> </b> CCV Code:  Not stored - due to processing regulations. Enable CCV email in module settings.</b></font>');
define('TEXT_CARD__REMOVED', '<font color=green> </b> This CC number is not store or has been removed from the store.</b></font>');


define('ENTRY_IPADDRESS', 'IP Address:');
define('ENTRY_IPISP', 'ISP:');

define('TEXT_ALL_ORDERS', 'Toutes les commandes');
define('TEXT_NO_ORDER_HISTORY', 'Pas d\'autre historique disponible');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Mise à jour de la commande');
define('EMAIL_TEXT_ORDER_NUMBER', 'Num&eacute;ro de la commande :');
define('EMAIL_TEXT_INVOICE_URL', 'Facture d&eacute;taill&eacute;e :');
define('EMAIL_TEXT_DATE_ORDERED', 'Date commande :');
define('EMAIL_TEXT_STATUS_UPDATE',  'L\'&eacute;tat de votre commande a &eacute;t&eacute; mis à jour. ' . "<br><li>" . 'Nouvel &eacute;tat :<b> %s </b>' . "</li><br><br>" . 'Merci de r&eacute;pondre à cet email pour toute question.   ' . "<br><br>");
define('EMAIL_TEXT_COMMENTS_UPDATE', 'Le commentaire pour votre commande est : ' . "<br><br>%s<br>");

define('ERROR_ORDER_DOES_NOT_EXIST', 'Erreur : La commande n\'existe pas.');
define('SUCCESS_ORDER_UPDATED', 'Succ&egrave;s : Votre commande a &eacute;t&eacute; mise à jour.');
define('WARNING_ORDER_NOT_UPDATED', 'Attention : Aucun changement. La commande n\'a pas &eacute;t&eacute; mise à jour.');
// begin replacement section for Email Subject contribution
define('EMAIL_TEXT_SUBJECT_1', ' ' . STORE_NAME. ' Order Updated');
define('EMAIL_TEXT_SUBJECT_2', ':  ');

define('ORDER', 'Order #');
define('ORDER_DATE_TIME', 'Order Date & Time');

// end replacement section for Email Subject contribution

?>
