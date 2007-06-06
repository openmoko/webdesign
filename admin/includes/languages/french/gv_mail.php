<?php
/*
  $Id: gv_mail.php,v 1.2 2003/09/24 13:57:08 wilt Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Envoi de ch&egrave;ques cadeaux aux clients');

define('TEXT_CUSTOMER', 'Client :');
define('TEXT_SUBJECT', 'Sujet :');
define('TEXT_FROM', 'De :');
define('TEXT_TO', 'Email unique :');
define('TEXT_AMOUNT', 'Montant');
define('TEXT_MESSAGE', 'Message :');
define('TEXT_SINGLE_EMAIL', '<span class="smallText">Uutiliser ceci pour envoi de mails simples, sinon utiliser le dropdown ci-dessus</span>');
define('TEXT_SELECT_CUSTOMER', 'S&eacute;lection du client');
define('TEXT_ALL_CUSTOMERS', 'Tous les clients');
define('TEXT_NEWSLETTER_CUSTOMERS', 'A tous ceux qui ont souscrit &agrave; la newsletter');

define('NOTICE_EMAIL_SENT_TO', 'Note : Email envoy&eacute; &agrave; : %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Erreur : Aucun client n\'a &eacute;t&eacute; s&eacute;lectionn&eacute;.');
define('ERROR_NO_AMOUNT_SELECTED', 'Erreur : Aucun montant n\'a &eacute;t&eacute; s&eacute;lectionn&eacute;.');

define('TEXT_TO_REDEEM1', 'Pour &eacute;changer ce ch&egrave;que cadeau, merci de cliquer sur le lien ci dessous. Merci de renseigner aussi le code de remboursement ');
define('TEXT_GV_WORTH', 'Ch&egrave;que cadeau d\'une valeur de : ');
define('TEXT_TO_REDEEM', 'To redeem this Gift Voucher, please click on the link below. Please also write down the redemption code');
define('TEXT_REMEMBER', 'Please do not lose the coupon code, make sure to keep the code safe so you can benefit from this special offer');
define('TEXT_WHICH_IS', 'qui est ');
define('TEXT_IN_CASE', ' en cas de probl&egrave;me.');
define('TEXT_OR_VISIT', 'ou visitez ');
define('TEXT_ENTER_CODE', ' et entrez le code ');

define('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'You recently purchased a Gift Voucher from our online store.' . "\n"
                                          . 'For security reasons this was not made immediately available to you.' . "\n"
                                          . 'However this amount has now been released. You can now visit our store' . "\n"
                                          . 'and send the value via Email to someone.' . "\n\n");
define ('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', "\n\n" . 'La valeur du coupon est %s');
define ('TEXT_REDEEM_COUPON_MESSAGE_BODY', "\n\n" . 'Vous pouvez visiter notre site, vous connecter et envoyer votre coupon &agrave; la personne de votre choix.');
define ('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', "\n\n");

// MaxiDVD Added Line For WYSIWYG HTML Area: BOF 
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">Le bouton Retour a &eacute;t&eacute; d&eacute;sactiv&eacute; lorsque l\'option HTML WYSIWG Editor est active.</b></font> Pourquoi? - Parce que si vous cliquez sur le bouton retour pour &eacute;diter votre email HTML, le serveur PHP (php.ini - "Magic Quotes = On") va automatiquement rajouter "\\\\\\\" backslashes partout où les Doubles Quotes " apparaissent (HTML les utilise pour les liens, Images et autres) et cela am&egrave;nera des distorsions dans le HTML, les images vont disparaitre jusqu\'a ce que vous envoyiez votre email. Si vous d&eacute;sactivez WYSIWYG Editor dans l\'Admin, le bouton Retour r&eacute;apparaitra. <br><b>Si vous avez vraiment beson de pr&eacute;visualiser les emails avant leur envoi, utiliser le bouton Preview situ&eacute; dans l\'&eacute;diteur WYSIWYG.<br><HR>'); 
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">HTML est actuellement d&eacute;sactiv&eacute; !</b></font><br><br>Si vous voulez envoyer des emails au format HTML, Activez WYSIWYG Editor for Email in: Admin-->Configuration-->WYSIWYG Editor-->Options<br>'); 
// MaxiDVD Added Line For WYSIWYG HTML Area: EOF
?>