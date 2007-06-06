<?php
/*
  $Id: gv_queue.php,v 1.2 2003/09/24 13:57:08 wilt Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Actions ch&egrave;ques cadeaux');

define('TABLE_HEADING_CUSTOMERS', 'Clients');
define('TABLE_HEADING_ORDERS_ID', 'No-Commande');
define('TABLE_HEADING_VOUCHER_VALUE', 'Valeur');
define('TABLE_HEADING_DATE_PURCHASED', 'Date d\'achat');
define('TABLE_HEADING_ACTION', 'Action');

define('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'Vous avez r&eacute;cemment achet&eacute; un coupon sur notre site.' . "\n"
                                          . ' Pour des raisons de s&eacute;curit&eacute;, le montant total des coupons n\'a pas &eacute;t&eacute; cr&eacute;dit&eacute; tout de suite.' . "\n"
                                          . ' Le propri&eacute;taire de la boutique vient de lib&eacute;rer ce montant.' . "\n"
                                          . ' Vous pouvez visiter notre site, vous connecter et envoyer votre coupon &agrave; la personne de votre choix.');

define('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', "\n\n" . 'La valeur du coupon est %s');

define('TEXT_REDEEM_COUPON_MESSAGE_BODY', '');
define('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', '');
define('TEXT_REDEEM_COUPON_SUBJECT', 'Achat de coupon');
?>