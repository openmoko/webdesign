<?php
/*
  $Id: salemaker.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'SaleMaker');

define('TABLE_HEADING_SALE_NAME', 'Abverkaufsbezeichnung');
define('TABLE_HEADING_SALE_DEDUCTION', 'Reduzierung');
define('TABLE_HEADING_SALE_DATE_START', 'Startdatum');
define('TABLE_HEADING_SALE_DATE_END', 'Enddatum');
define('TABLE_HEADING_STATUS', 'Status');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_SALEMAKER_NAME', 'Abverkaufsbezeichnung:');
define('TEXT_SALEMAKER_DEDUCTION', 'Reduzierung:');
define('TEXT_SALEMAKER_DEDUCTION_TYPE', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Typ:&nbsp;&nbsp;');
define('TEXT_SALEMAKER_PRICERANGE_FROM', 'Produkt Preisspanne:');
define('TEXT_SALEMAKER_PRICERANGE_TO', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bis&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
define('TEXT_SALEMAKER_SPECIALS_CONDITION', 'Wenn ein Produkt ein Angebot ist:');
define('TEXT_SALEMAKER_DATE_START', 'Startdatum:');
define('TEXT_SALEMAKER_DATE_END', 'Enddatum:');
define('TEXT_SALEMAKER_CATEGORIES','<b>oder</b> &uuml;berpr&uuml;fen Sie die Kategorien f&uuml;r die dieser Abverkauf gelten soll:');
define('TEXT_SALEMAKER_POPUP','<a href="javascript:session_win();"><span class="errorText"><b>F&uuml;r Tipps bitte hier klicken.</b></span></a>');
define('TEXT_SALEMAKER_IMMEDIATELY','Sofort');
define('TEXT_SALEMAKER_NEVER', 'Nie');
define('TEXT_SALEMAKER_ENTIRE_CATALOG', 'W&auml;hlen Sie diese Box wenn der Abverkauf f&uuml;r <b>Alle Produkte</b> gelten soll:');
define('TEXT_SALEMAKER_TOP', 'Gesamter Katalog');

define('TEXT_INFO_DATE_ADDED', 'Hinzugef&uuml;gt am:');
define('TEXT_INFO_DATE_MODIFIED', 'Zuletzt ge&auml;ndert:');
define('TEXT_INFO_DATE_STATUS_CHANGE', 'Letzte Status &Auml;nderung:');
define('TEXT_INFO_SPECIALS_CONDITION','Sonderkonditionen:');
define('TEXT_INFO_DEDUCTION','Reduzierung:');
define('TEXT_INFO_PRICERANGE_FROM', 'Preisspanne:');
define('TEXT_INFO_PRICERANGE_TO', ' bis ');
define('TEXT_INFO_DATE_START', 'Startet:');
define('TEXT_INFO_DATE_END', 'Endet am:');

define('SPECIALS_CONDITION_DROPDOWN_0','Sonderpreise ignorieren - Auf Produktpreis anwenden und Sonderpreis ersetzen');
define('SPECIALS_CONDITION_DROPDOWN_1','Abverkaufsoptionen ignorieren - Keinen Abverkaufspreis anwenden wenn ein Sonderpreis existiert');
define('SPECIALS_CONDITION_DROPDOWN_2','Abverkaufspreis zu Sonderpreis hinzuf&uuml;gen - sonst auf den Preis anwenden');

define('DEDUCTION_TYPE_DROPDOWN_0','Betrag der Reduzierung:');
define('DEDUCTION_TYPE_DROPDOWN_1', 'Prozent');
define('DEDUCTION_TYPE_DROPDOWN_2', 'Neuer Preis');

define('TEXT_INFO_HEADING_COPY_SALE', 'Abverkauf kopieren');
define('TEXT_INFO_COPY_INTRO', 'Eingabe eines neue Names f&uuml;r die Kopie von<br>&nbsp;&nbsp;"%s"');

define('TEXT_INFO_HEADING_DELETE_SALE', 'Abverkauf l&ouml;schen');
define('TEXT_INFO_DELETE_INTRO', 'Sind Sie sicher, dass Sie diesen Abverkauf dauerhaft l&ouml;schen wollen?');
?>