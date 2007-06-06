<?php
/*
  $Id: coupon_restrict.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('TOP_BAR_TITLE', 'Statistiques');
define('HEADING_TITLE', 'Coupons de r&eacute;duction');
define('HEADING_TITLE_STATUS', 'Statut : ');
define('TEXT_CUSTOMER', 'Client :');
define('TEXT_COUPON', 'Nom du coupon');
define('TEXT_COUPON_ALL', 'Tous les coupons');
define('TEXT_COUPON_ACTIVE', 'Coupons actifs');
define('TEXT_COUPON_INACTIVE', 'Coupons inactifs');
define('TEXT_SUBJECT', 'Sujet :');
define('TEXT_FROM', 'De :');
define('TEXT_FREE_SHIPPING', 'Livraison gratuite');
define('TEXT_MESSAGE', 'Message :');
define('TEXT_SELECT_CUSTOMER', 'S&eacute;lection du client');
define('TEXT_ALL_CUSTOMERS', 'Tous les clients');
define('TEXT_NEWSLETTER_CUSTOMERS', 'A tous ceux qui ont soucrit la newsletter');
define('TEXT_CONFIRM_DELETE', 'Etes vous sur de vouloir d&eacute;sactiver ce coupon ?<br><br>Les coupons ne sont pas supprim&eacute;s mais juste marqu&eacute;s comme inactifs.');

define('TEXT_TO_REDEEM', 'Vous pouvez changer les coupons pendant la proc&eacute;dure de paiement. Entrez simplement le code dans la case appropri&eacute;e, et cliquez sur &eacute;change.');
define('TEXT_IN_CASE', ' en cas de probl&eacute;me. ');
define('TEXT_VOUCHER_IS', 'Le code du coupon est ');
define('TEXT_REMEMBER', 'Ne perdez pas le code du coupon, assurez vous de le garder pour pouvoir profiter de cette offre sp&eacute;ciale.');
define('TEXT_VISIT', 'quand vous visitez ' . HTTP_SERVER . DIR_WS_CATALOG);
define('TEXT_ENTER_CODE', ' et entrez le code ');

define('TABLE_HEADING_ACTION', 'Action');



define('NOTICE_EMAIL_SENT_TO', 'Note : Email envoy&eacute; a : %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Erreur : aucun client n\'a &eacute;t&eacute; s&eacute;lectionn&eacute;.');
define('COUPON_NAME', 'Nom du coupon');
//define('COUPON_VALUE', 'Coupon Value');
define('COUPON_AMOUNT', 'Montant du coupon');
define('COUPON_CODE', 'Code du coupon');
define('COUPON_STARTDATE', 'Date d\'effet');
define('COUPON_FINISHDATE', 'Date de fin d\'effet');
define('COUPON_FREE_SHIP', 'Livraison gratuite');
define('COUPON_DESC', 'Description du coupon');
define('COUPON_MIN_ORDER', 'Montant minimum d\'achat du coupon');
define('COUPON_USES_COUPON', 'Utilisations par coupon');
define('COUPON_USES_USER', 'Utilisations par client');
define('COUPON_PRODUCTS', 'Liste des produits valides');
define('COUPON_CATEGORIES', 'Liste des cat&eacute;gories valides');
define('VOUCHER_NUMBER_USED', 'Numbre utilis&eacute;');
define('DATE_CREATED', 'Date de cr&eacute;ation');
define('DATE_MODIFIED', 'Date de modification');
define('TEXT_HEADING_NEW_COUPON', 'Creer un nouveau coupon');
define('TEXT_NEW_INTRO', 'Merci de renseigner les diff&eacute;rentes informations du coupon.<br>');


define('COUPON_NAME_HELP', 'Un nom court pour le coupon');
define('COUPON_AMOUNT_HELP', 'Le montant de la r&eacute;duction du coupon, soit fixe soit ajouter un  % a la fin pour un pourcentage de r&eacute;duction.');
define('COUPON_CODE_HELP', 'Vous pouvez rentrer votre propre code ici, ou laisser vide pour qu\'il soit automatiquement g&eacute;n&eacute;r&eacute;.');
define('COUPON_STARTDATE_HELP', 'La date du coupon a partir de laquelle il sera valide');
define('COUPON_FINISHDATE_HELP', 'La date d\'expiration');
define('COUPON_FREE_SHIP_HELP', 'Le coupon donne la livraison gratuite sur une commande. Attention, cela annule le montant du coupon mais respecte le minimum de commande');
define('COUPON_DESC_HELP', 'Une description du coupon pour le client');
define('COUPON_MIN_ORDER_HELP', 'Le montant minimum de commande a partir duquel le coupon deviens valide');
define('COUPON_USES_COUPON_HELP', 'Le nombre maximum de fois que le coupon peut etre utilis&eacute;, laisser vide si on ne veut pas de limite.');
define('COUPON_USES_USER_HELP', 'Nombre de fois que le client peut utilis&eacute; ce coupon, laisser vide si on ne veut pas de limite.');
define('COUPON_PRODUCTS_HELP', 'Liste des identifiants de produits (s&eacute;par&eacute; par une virgule) qui peuvent etre associ&eacute;s au coupon. Laisser vide si on ne veut pas de limite.');
define('COUPON_CATEGORIES_HELP', 'Liste des \'cpaths\' qui peuvent etre associ&eacute;s au coupon, laisser vide si on ne veut pas de limite.');
?>