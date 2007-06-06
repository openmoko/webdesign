<?php
/*
  $Id: popup_infobox_help.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $


  Copyright (c) 2004 CRE Works

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Infobox Hilfe');
define('TEXT_INFO_HEADING_NEW_INFOBOX', 'Infobox Hilfe');
define('TEXT_INFOBOX_HELP_FILENAME', 'Dies muss den Namen der Box-Datei repr&auml;sentieren, welche Sie in Ihr <u>catalog/includes/boxes</u> Verzeichnis gelegt haben.<br><br> Es muss aus kleinbuchstaben bestehen, kann aber auch Leerzeichen anstelle von Unterstrichen (_) enthalten.<br><br>Zum Beispiel:<br>Wenn Ihre neue Infobox hat den Namen <b>new_box.php</b> hat, dann w&uuml;rden Sie hier eingeben "<b> new box</b>" eingeben.<br><br>Ein anderes Beispiel w&uuml;r die <b>whats_new</b> Box sein.<br> Wahrscheinlich lautet die Datei <b>whats_new.php </b>; Sie k&ouml;nnten hier <b>what\'s new</b> eingeben');
define('TEXT_INFOBOX_HELP_HEADING', 'Dies ist, was im Katalog genau &uuml;ber der Box angezeigt wird.<br><div align="center"><img border="0" src="images/help1.gif"><br></div>');
define('TEXT_INFOBOX_HELP_DEFINE', 'Ein Beispiel w&uuml;rde sein: <b>BOX_HEADING_WHATS_NEW</b>.<br> Dies wird dann mit der Haupt-Logik des Shops so wie hier verwendet: <b> define(\'BOX_HEADING_WHATS_NEW\', \'What\'s New?\');</b><br><br> Wenn Sie die Datei <u>catalog/includes/languages/german.php</u> &ouml;ffnen, k&ouml;nnen Sie viele Beispiele davon sehen. Diejenigen welche BOX_HEADING enthalten, werden hier nicht mehr gebraucht, da sie in der Datenbank gespeichert sind, und in den Dateien <b>column_left.php</b> und <b>column_right.php</b> definiert werden.<br>Es ist aber auch nicht notwendig diese zu l&ouml;schen!');
define('TEXT_INFOBOX_HELP_COLUMN', 'W&auml;hlen Sie <b>Links</b> oder <b>Rechts</b><br> um die Infobox in derlinken oder rechten Spalt anzuzeigen.<br><br>Standardeinstellung ist <b>Links</b>');
define('TEXT_INFOBOX_HELP_POSITION', 'Geben Sie eine Ziffer Ihrer Wahl hier ein. Je h&ouml;her die Nummer, desto weiter unten wird die Infobox in der ausgew&auml;hlten Spalte sein.<br><br> Wenn Sie gleiche Ziffern für verschiedene Infoboxen in derselben Spalte vergeben, werden diese alphabetisch sortiert angezeigt.<br><br>Wenn Sie keine Ziffer eingeben erfolgt die Sortierung ebenfalls alphabetisch.');
define('TEXT_INFOBOX_HELP_ACTIVE', 'W&auml;hlen Sie <b>Ja</b> oder <b>Nein</b> um die Infobox anzuzeigen (Ja) oder nicht anzuzeigen (Nein).<br><br>BStandardeinstellung ist  <b>Ja</b>');
define('TEXT_INFOBOX_HELP_TEMPLATE', 'Dies muss den Namen der Box-Datei repr&auml;sentieren, wo die Funktionen für Ihre Boxen vorzufinden sind. Wenn Sie eine Spezielle Datei für Ihre Funktion haben, sollte Sie in <u>catalog/templates/(NAME DES TEMPLATES)/boxes.tpl.php</u> sein <br><br> Der Dateiname muss aus Kleinbuchstaben bestehen.<br><br>Zum Beispiel:<br>Ihre neue Infobox Template Funktionsdatei ist Standard, geben Sie <b>infobox</b> an, und das wird die Standardfunktionen nutzen. Wenn Sie spezielle Funktionen für Ihre Infobox verwenden, geben Sie hier <b>box.tpl.php</b> an, und legen die Datei in <u>catalog/templates/(NAME DES TEMPLATES)/boxes.tpl.php</u>. ab');
define('TEXT_INFOBOX_HELP_COLOR', 'Sie k&ouml;nnen das pop_up Farbendiagramm benutzen, um die Farbe f&uuml;r die Box&uuml;berschrift vorzuw&auml;hlen. Der Farbcode wird Ihnen dann als Hexadezemalwert angezeigt.');
define('TEXT_CLOSE_WINDOW', '<u>Fenster schliessen</u> [x]');

?>
