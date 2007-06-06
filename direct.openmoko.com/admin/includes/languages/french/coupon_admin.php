<?php
/*
  $Id: coupon_admin.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

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

define('TEXT_TO_REDEEM1', 'Vous pouvez changer les coupons pendant la proc&eacute;dure de paiement. Entrez simplement le code dans la case appropri&eacute;e, et cliquez sur &eacute;change.'); 
define('TEXT_IN_CASE', ' en cas de probl&egrave;me. '); 
define('TEXT_VOUCHER_IS', 'Le code du coupon est '); 
define('TEXT_REMEMBER', 'Ne perdez pas le code du coupon, assurez vous de le garder pour pouvoir profiter de cette offre sp&eacute;ciale.'); 
define('TEXT_VISIT', 'quand vous visitez <a style="color: #000000" href="' . HTTP_SERVER . DIR_WS_CATALOG . '">' . STORE_NAME . '</a>' ."\n" .'(' . HTTP_SERVER . DIR_WS_CATALOG . ')');
define('TEXT_ENTER_CODE', ' et entrez le code '); 
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">The Back Button has been DISABLED while HTML WYSIWG Editor is turned ON.</b></font> WHY? - Because if you click the back button to edit your HTML email, the PHP (php.ini - "Magic Quotes = On") will automatically add "\\\\\\\" backslashes everywhere Double Quotes " appear (HTML uses them in Links, Images and More) and this distorts the HTML, the pictures will dissapear once you submit the email again. If you turn OFF WYSIWYG Editor in Admin, the HTML Ability of osCommerce is also turned OFF and the back button will re-appear. A fix for this HTML and PHP issue would be nice if someone knows a solution.<br><br><b>If you really need to Preview your emails before sending them, use the Preview Button located on the WYSIWYG Editor.<br><HR>');
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">HTML is currently Disabled!</b></font><br><br>If you want to send HTML email, Enable WYSIWYG Editor for Email in: Admin-->Configuration-->WYSIWYG Editor-->Options<br>');

define('TEXT_OR_VISIT', 'or visit ');
define('TEXT_TO_REDEEM', ' To redeem this Discount coupon, please click on the link below. Please also write down the redemption code');
define('TEXT_WHICH_IS', ' which is ');
define('TEXT_IN_CASE', ' in case you have any problems.');


define('TEXT_COUPON_REDEEMED', 'Redeemed Coupons');
define('REDEEM_DATE_LAST', 'Date Last Redeemed');
define('COUPON_STATUS', 'Status');
define('COUPON_STATUS_HELP', 'Set to ' . IMAGE_ICON_STATUS_RED . ' to disable customers\' ability to use the coupon.');
define('COUPON_BUTTON_EMAIL_VOUCHER', 'Email Voucher');
define('COUPON_BUTTON_EDIT_VOUCHER', 'Edit Voucher');
define('COUPON_BUTTON_DELETE_VOUCHER', 'Delete Voucher');
define('COUPON_BUTTON_VOUCHER_REPORT', 'Voucher Report');

define('TABLE_HEADING_ACTION', 'Action'); 

define('TEXT_HEADING_COUPON_REPORT', 'Coupon Report');

define('CUSTOMER_ID', 'ID Client'); 
define('CUSTOMER_NAME', 'Nom Client'); 
define('REDEEM_DATE', 'Date de Rachat'); 
define('IP_ADDRESS', 'Adresse IP'); 

define('TEXT_REDEMPTIONS', 'Rachat'); 
define('TEXT_REDEMPTIONS_TOTAL', 'Au Total'); 
define('TEXT_REDEMPTIONS_CUSTOMER', 'Pour ce client'); 
define('TEXT_NO_FREE_SHIPPING', 'Pas de livraison gratuite'); 

define('NOTICE_EMAIL_SENT_TO', 'Note : Email envoy&eacute; &agrave; : %s'); 
define('ERROR_NO_CUSTOMER_SELECTED', 'Erreur : Aucun client n\'a &eacute;t&eacute; s&eacute;lectionn&eacute;.'); 
define('ERROR_NO_COUPON_AMOUNT', 'Error: No coupon amount has been entered. Either enter an amount or select free shipping.');
define('ERROR_COUPON_EXISTS', 'Error: A coupon with the same coupon code already exists.');

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
define('VOUCHER_NUMBER_USED', 'Nombre utilis&eacute;'); 
define('DATE_CREATED', 'Date de cr&eacute;ation'); 
define('DATE_MODIFIED', 'Date de modification'); 
define('TEXT_HEADING_NEW_COUPON', 'Cr&eacute;er un nouveau coupon'); 
define('TEXT_NEW_INTRO', 'Merci de renseigner les diff&eacute;rentes informations du coupon.<br>'); 


define('COUPON_NAME_HELP', 'Un nom court pour le coupon'); 
define('COUPON_AMOUNT_HELP', 'Le montant de la r&eacute;duction du coupon, soit fixe soit ajouter un  % &agrave; la fin pour un pourcentage de r&eacute;duction.'); 
define('COUPON_CODE_HELP', 'Vous pouvez rentrer votre propre code ici, ou laisser vide pour qu\'il soit automatiquement g&eacute;n&eacute;r&eacute;.'); 
define('COUPON_STARTDATE_HELP', 'La date du coupon &agrave; partir de laquelle il sera valide'); 
define('COUPON_FINISHDATE_HELP', 'La date d\'expiration'); 
define('COUPON_FREE_SHIP_HELP', 'Le coupon donne la livraison gratuite sur une commande. Attention, cela annule le montant du coupon mais respecte le minimum de commande'); 
define('COUPON_DESC_HELP', 'Une description du coupon pour le client'); 
define('COUPON_MIN_ORDER_HELP', 'Le montant minimum de commande &agrave; partir duquel le coupon deviens valide'); 
define('COUPON_USES_COUPON_HELP', 'Le nombre maximum de fois que le coupon peut &ecirc;tre utilis&eacute;, laisser vide si on ne veut pas de limite.'); 
define('COUPON_USES_USER_HELP', 'Nombre de fois que le client peut utilis&eacute; ce coupon, laisser vide si on ne veut pas de limite.'); 
define('COUPON_PRODUCTS_HELP', 'Liste des identifiants de produits (s&eacute;par&eacute; par une virgule) qui peuvent &ecirc;tre associ&eacute;s au coupon. Laisser vide si on ne veut pas de limite.'); 
define('COUPON_CATEGORIES_HELP', 'Liste des \'cpaths\' qui peuvent &ecirc;tre associ&eacute;s au coupon, laisser vide si on ne veut pas de limite.'); 


define('ALT_CONFIRM_DELETE_VOUCHER', 'Confirm Delete Voucher');
define('ALT_CANCEL', 'Cancel');
define('VIEW', 'View');
define('ALT_EMAIL_VOUCHER', 'Email Voucher');
define('ALT_EDIT_VOUCHER', 'Edit Voucher');
define('ALT_DELETE_VOUCHER', 'Delete Voucher');
define('ALT_VOUCHER_REPORT', 'Voucher Report');
define('COUPON_BUTTON_EMAIL_VOUCHER', 'Email Voucher');
define('COUPON_BUTTON_EDIT_VOUCHER', 'Edit Voucher');
define('COUPON_BUTTON_DELETE_VOUCHER', 'Delete Voucher');
define('COUPON_BUTTON_VOUCHER_REPORT', 'Voucher Report');
define('COUPON_BUTTON_PREVIEW', 'Preview');
define('COUPON_BUTTON_BACK', 'Back');
define('COUPON_STATUS', 'Status');
define('COUPON_STATUS_HELP', 'Set to ' . IMAGE_ICON_STATUS_RED . ' to disable customers\' ability to use the coupon.');
?>