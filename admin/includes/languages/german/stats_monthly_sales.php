<?php
/*
  $Id: stats_monthly_sales.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Monatlicher Verkaufs- und MwSt.-Report');
define('HEADING_TITLE_STATUS','Status');
define('HEADING_TITLE_REPORTED','Berichtet');
define('TEXT_DETAIL','Detail');
define('TEXT_ALL_ORDERS', 'Alle Bestellungen');
define('TEXT_NOTHING_FOUND', 'Kein Eingang zu dieser Datum/Status-Auswahl gefunden');
define('TEXT_BUTTON_REPORT_BACK','Zur&uuml;ck');
define('TEXT_BUTTON_REPORT_INVERT','umkehren');
define('TEXT_BUTTON_REPORT_PRINT','Drucken');
define('TEXT_BUTTON_REPORT_HELP','Hilfe');
define('TEXT_BUTTON_REPORT_SAVE','Save CSV');
define('TEXT_BUTTON_REPORT_BACK_DESC', 'Return to summary by months');
define('TEXT_BUTTON_REPORT_INVERT_DESC', 'Invertieren der Liste');
define('TEXT_BUTTON_REPORT_PRINT_DESC', 'Report zum ausdrucken');
define('TEXT_BUTTON_REPORT_HELP_DESC', 'Hilfe zu diesem Report');
define('TEXT_BUTTON_REPORT_GET_DETAIL', 'T&auml;glicher Report f&uuml;r diesen Monat');
define('TEXT_REPORT_DATE_FORMAT', 'j M Y -   g:i a'); // date format string
//  as specified in php manual here: http://www.php.net/manual/en/function.date.php

define('TABLE_HEADING_YEAR','Jahr');
define('TABLE_HEADING_MONTH', 'Monat');
define('TABLE_HEADING_DAY', 'Tage');
define('TABLE_HEADING_INCOME', 'Brutto<br> Einnahmen');
define('TABLE_HEADING_SALES', 'Produkt<br> Umsatz');
define('TABLE_HEADING_NONTAXED', 'steuerfreier<br> Umsatz');
define('TABLE_HEADING_TAXED', 'zu versteuernder<br> Umsatz');
define('TABLE_HEADING_TAX_COLL', 'MwSt.<br> bezahlt');
define('TABLE_HEADING_SHIPHNDL', 'Lieferkosten<br> & Handling');
define('TABLE_HEADING_SHIP_TAX', 'Tax on<br /> Shipping');
define('TABLE_HEADING_LOWORDER', 'Mindestmengen-<br> Zuschl&auml;ge');
define('TABLE_HEADING_OTHER', 'Geschenk<br> Gutscheine');  // could be any other extra class value
define('TABLE_FOOTER_YTD','JGD');
define('TABLE_FOOTER_YEAR','JAHR');
define('TEXT_HELP', '<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title>Monthly Sales/Tax Report</title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
</head>
<BODY>
<center>
<table width="95%"><tr><td>
<p class="main" align="center">
<b>Wie man den zusammenfassenden Bericht ansieht und verwendet</b>
<p class="main" align="justify">
<b>Report Shop Aktivit&auml;ten nach Monaten</b>
<p class="smallText" align="justify">
Wenn dieser Report ausgew&auml;hlt wird, zeigt dieser Report eine finanzielle &uuml;bersicht aller Auftr&auml;ge in der Datenbank, nach Monaten sortiert.  Jeder, in der Datenbank gespeicherte, Monat im Verlauf des Shops wird in einer Reihe zusammengefasst angezeigt. Angezeigt werden die Positionen der Bestellungen sowie die Menge, Steuern, Versand, Bearbeitungsgeb&uuml;hren sowie Geb&uuml;hren und Gutschriften (Sollte eine Spalte in der Datenbank nicht vorhanden sein, z.B. Gutschein so wird dieser in diesem Bericht ausgelassen).
<p class="smallText" align="justify">
Die obere Zeile ist der gegenw&auml;rtige Monat, und die Reihen unter ihr fassen jeden Monat der Datenbank und der jeweiligen Auftr&auml;ge zusammen.  Unter den Reihen jedes Kalenderjahres ist eine Seitenende-Linie und fasst dieses Jahr nach Gesamtmengen in jeder Spalte des Reports zusammen.
<p class="smallText" align="justify">
Um die Reihenfolge der Aufträge umzukehren, klicken Sie die „umkehren“ Taste an.
<p class="main" align="justify">
<b>Report Monatlich nach Summen pro Tag</b>
<p class="smallText" align="justify">
Die Zusammenfassung der t&auml;glichen T&auml;tigkeit innerhalb irgendeines Monats kann angezeigt werden, indem man auf dem Monats Name, links von der Reihe klickt.  Um von der t&auml;glichen Zusammenfassung zur Monatszusammenfassung zur&uuml;ckzugehen, klicken Sie die „zur&uuml;ck“ Taste in der t&auml;glichen Anzeige an.
<p class="main" align="justify">
<b>Was die Spalten darstellen (die &Uuml;berschriften erkl&auml;ren)</b>
<p class="smallText" align="justify">
Auf der linken Seite werden der Monat und das Jahr der Reihe angegeben.  Die anderen Spalten sind, von links nach rechts verlaufend:
<ul><li class="smallText"><b>Bruttoeinkommen</b> - Bruttoeinkommen die Gesamtmenge aller Auftr&auml;ge
<li class="smallText"><b>Auftrag Teilsumme</b> - die Gesamtverk&auml;ufe der Produkte gekauft im Monat
<br>Die Verk&auml;fe wurde in zwei Kategorien aufgeteilt:
<li class="smallText"><b>Unversteuerte Verk&auml;fe</b> - die Teilsumme der Verkäufe, die nicht besteuert wurden und
<li class="smallText"><b>Versteuerte Verk&auml;fe</b> - die Teilsumme der Verk&auml;ufe, die besteuert wurden
<li class="smallText"><b>Steuern gesammelt</b> - Summe an Steuern der Kunden
<li class="smallText"><b>Versand & Bearbeitung</b> - Summe aus Versand und Bearbeitung
<li class="smallText"><b>Geringf&uuml;gige Geb&uuml;hren</b> und <b>Gutscheine</b> - Soweit in  der Datenbank vorhanden geringf&uuml;gige Geb&uuml;hren und/oder Gutscheine, werden die Gesamtmengen von diesen in den unterschiedlichen Spalten gezeigt
<li class="smallText"><b>Low order fees</b> and <b>Gift Vouchers</b> - if the store has low order fees enabled, and/or gift vouchers, the totals of these are shown in separate columns
</ul>
<p class="main" align="justify">
<b>Vorwählen der Reportzusammenfassung durch Status</b>
<p class="smallText" align="justify">
Um die Monatsstatistik oder die t&auml;glichen zusammenfassenden Informationen für einen Auftrag Status zu zeigen, wählen Sie den Status im Drop-Down-Kasten am oberen Rand des Reportbereichs aus.  Abh&auml;ngig von der Datenbank. Je nach dem welcher dieser Werte in dieser gespeichert ist, kann es einen Status f&uuml;r „wartend“ geben oder „Versandt“.  &Auml;ndern Sie diesen Status und der Report wird nachgerechnet und angezeigt.
<p class="main" align="justify">
<b>Zeigen der Steuer Details</b>
<p class="smallText" align="justify">
Die Summe aller Steuer in jeder m&ouml;glicher Reihe des Reports ist eine Verbindung zu einem popup Fenster, das darstellt, dass der Name der Steuer aufteilt und nach ihrer Einzelperson und Mengen klassifiziert.
<p class="main" align="justify">
<b>Report drucken</b>
<p class="smallText" align="justify">
Um den Report in einem Drucker-freundlichen Fenster anzusehen, klicken Sie auf den „Druck“ Button, dann verwenden Sie Ihren Datenbanksuchroutine- Druckbefehl im Datei Menü.  Der Speichername und -&uuml;berschriften werden hinzugef&uuml;gt, welche Auftr&auml;ge vorgew&auml;hlt w&uuml;rden, und als der Report erzeugt wurde.
<p class="main" align="justify">
<b>Bericht Werte in eine Datei speichern</b>
<p class="smallText" align="justify">
Um die Werte des Reports in eine lokalen Datei zu speichern, klicken Sie auf die Sicherungs-CSV Taste an der Unterseite des Reports.  Die Reportwerte werden zu Ihrer Datenbanksuchroutine in einer Textdatei geschrieben, und Sie werden mit einem Sicherungdatei Dialogfeld aufgefordert, zu wählen, wo die Datei gespeichert werden soll.  Der Inhalt der Datei ist im Komma getrennten Format der Werte (CSV), mit einer Zeile für jede Reihe des Reports, der mit der überschriftlinie anfängt, und jeder Wert in der Reihe wird durch Kommas getrennt. Diese Datei kann in vielseitiger Form verwendet werden. Die Datei wird zu Ihrer Datenbanksuchroutine mit einem vorgeschlagenen Dateinamen versehen, der dem vorgewähltem aus Reportnamen besteht, -status und -datum/-zeit. <br><br>
<p class="smallText">v 2.1.1
</td></tr>
</table>
</BODY>
</HTML>');
?>