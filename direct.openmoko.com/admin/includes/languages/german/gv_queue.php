<?php
/*
  $Id: gv_queue.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Geschenk-Gutschein Freigabe-Warteschlange');

define('TABLE_HEADING_CUSTOMERS', 'Kunden');
define('TABLE_HEADING_ORDERS_ID', 'Bestell-Nr.');
define('TABLE_HEADING_VOUCHER_VALUE', 'Gutscheinwert');
define('TABLE_HEADING_DATE_PURCHASED', 'Bestelldatum');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'Sie haben k&uuml;rzlich einen Geschenk-Gutschein von unserem Online-Shop erworben.' . "\n"
                                          . 'Aus Sicherheitsgr&uuml;nden wurde Ihnen dieser nicht unmittelbar danach zur Verf&uuml;gung gestellt.' . "\n"
                                          . 'Nun wurde der Gutscheinbetrag freigegeben. Sie k&ouml;nnen nun unseren Online-Shop besuchen' . "\n"
                                          . 'und diesen Gutschein per Email an jemanden versenden.' . "\n\n");

define('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', 'Ihr erworbener Geschenk-Gutschein ist %s wert' . "\n\n");

define('TEXT_REDEEM_COUPON_MESSAGE_BODY', '');
define('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', '');
define('TEXT_REDEEM_COUPON_SUBJECT', 'Geschenk-Gutschein Einkauf');?>