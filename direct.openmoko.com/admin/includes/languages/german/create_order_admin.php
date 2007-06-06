<?php
/*
  $Id: create_order_admin.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Bestellung anlegen');

define('TEXT_CREATE_ORDERS_ADMIN_HELP', 'Mit den beiden Links k&ouml;nnen Sie die Versand- und Zahlart editieren.');
define('TABLE_HEADING_CREATE_ORDERS_ADMIN', 'Bestellung anlegen');
define('TEXT_LABEL_CREATE_ORDERS_ADMIN_PAYMENT', 'Zahlart editieren');
define('TEXT_LABEL_CREATE_ORDERS_ADMIN_SHIPPING', 'Versandart editieren');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_INFO_EDIT_INTRO', 'Bitte f&uuml;hren Sie die notwendigen &Auml;nderungen durch');
define('TEXT_INFO_ORDERS_STATUS_NAME', 'Status der Bestellung:');
define('TEXT_INFO_INSERT_INTRO', 'Bitte geben Sie eine Versandart mit allen Angaben ein');
define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sicher das Sie die Bezahlart l&ouml;schen wollen?');
define('TEXT_INFO_HEADING_NEW_PAYMENT', 'Neue Zahlart');
define('TEXT_INFO_HEADING_EDIT_PAYMENT', 'Zahlart editieren');
define('TEXT_INFO_HEADING_DELETE_PAYMENT', 'Zahlart l&ouml;schen');
define('TEXT_INFO_HEADING_NEW_SHIPPING', 'Neue Versandart');
define('TEXT_INFO_HEADING_EDIT_SHIPPING', 'Versandart editieren');
define('TEXT_INFO_HEADING_DELETE_SHIPPING', 'Versandart l&ouml;schen');
define('ERROR_REMOVE_DEFAULT_ORDER_STATUS', 'Fehler: Der standard Bestellstatus kann nicht gel&ouml;scht werden. Please set another order status as default, and try again.');
define('ERROR_STATUS_USED_IN_ORDERS', 'Fehler: Dieser Bestellstatus wird von dieser Bestellung bereits benutzt.');
define('ERROR_STATUS_USED_IN_HISTORY', 'Fehler: Dieser Bestellstatus ist bereits in der Bestellhistorie verwendet worden.');
?>
