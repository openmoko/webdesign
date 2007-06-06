<?php
/*
  $Id: create_order_payment.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Bestellung manuell anlegen');

define('TABLE_HEADING_CREATE_ORDERS_ADMIN', 'Bestellung anlegen Admin');
define('TABLE_HEADING_CREATE_ORDERS_SORT', 'Reihenfolge');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_DISPLAY_NUMBER_OF_PAYMENT_MODULES', 'Anzeigen <b>%d</b> bis <b>%d</b> (von <b>%d</b> Bezahl Modulen)');
define('TEXT_INFO_EDIT_INTRO', 'Nehmen Sie bitte alle notwendigen &Auml;nderungen vor');
define('TEXT_INFO_PAYMENT_MODULES_NAME', 'Bezahl Module:');
define('TEXT_INFO_INSERT_INTRO', 'Tragen Sie die gew&uuml;nschte Bezahl Methode mit den gegebenen Daten ein');
define('TEXT_INFO_DELETE_INTRO', 'Wollen SWie dieses Modul l&ouml;schen?');
define('TEXT_INFO_HEADING_NEW_PAYMENT', 'Neue Bezahlung');
define('TEXT_INFO_HEADING_EDIT_PAYMENT', 'Bezahlung bearbeiten');
define('TEXT_INFO_HEADING_DELETE_PAYMENT', 'Zahlung l&ouml;schen');
define('TEXT_INFO_HEADING_NEW_SHIPPING', 'Neuer Versand');
define('TEXT_INFO_HEADING_EDIT_SHIPPING', 'Versand bearbeiten');
define('TEXT_INFO_HEADING_DELETE_SHIPPING', 'Versand l&ouml;schen');
define('ERROR_REMOVE_DEFAULT_ORDER_STATUS', 'FEHLER: Das Standard Bezahl Modul kann nicht gel&ouml;scht werden. Aktivieren Sie ein anderes Modul als Standard und versuchen Sie es erneut.');
define('ERROR_STATUS_USED_IN_ORDERS', 'FEHLER: Dieses Modul wird derzeit in einer Bestellung verwendet.');
define('ERROR_STATUS_USED_IN_HISTORY', 'FEHLER: Dieses Modul wird derzeit in einem abgescvhlossenen Bestellvorgang verwendet.');
define('TEXT_INFO_SORT_ORDER', 'Sortierreihenfolge');
?>
