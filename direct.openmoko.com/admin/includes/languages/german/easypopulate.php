<?php
/*
  $Id: easypopulate.php,v 1.4 2004/09/21  zip1 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 Chainreactionworks.com

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Easy Populate Konfiguration');
define('EASY_VERSION_A', 'Easy Populate Erweitert ');
define('EASY_VERSION_B', 'Easy Populate Basic ');
define('EASY_EXPORT', ' Export');
define('EASY_IMPORT', ' Import');
define('EASY_VER_A', ' 3.01');
define('EASY_VER_B', ' 3.01');
define('EASY_DEFAULT_LANGUAGE', '  -  Standard Sprache ');
define('EASY_UPLOAD_FILE', 'Datei hochgeladen. ');
define('EASY_UPLOAD_TEMP', 'Tempor&auml;rer Dateiname: ');
define('EASY_UPLOAD_USER_FILE', 'Spezifischer Dateiname: ');
define('EASY_SIZE', 'Gr&ouml;sse: ');
define('EASY_FILENAME', 'Dateiname: ');
define('EASY_SPLIT_DOWN', 'Datei erfolgreich in mehrere Dateien aufgeteilt. Die Teildateien liegen hier: ');
define('EASY_UPLOAD_EP_FILE', 'EP Datei f&uuml;r Import hochladen');
define('EASY_SPLIT_EP_FILE', 'EP Datei hochladen und aufteilen');
define('EASY_SPLIT_EP_LOCAL', 'EP Datei auf dem Server aufteilen');

define('TEXT_IMPORT_TEMP', 'Importiere Datei von %s');
define('TEXT_INSERT_INTO_DB', 'In DB einf&uuml;gen');
define('TEXT_SELECT_ONE', 'EP Datei f&uuml;r Import ausw&auml;hlen');
define('TEXT_SELECT_TWO', 'EP Datei f&uuml;r Aufteilung ausw&auml;hlen');

define('TEXT_SPLIT_FILE', 'EP Datei ausw&auml;hlen');
define('TEXT_SPLIT', 'EP Datei aufteilen');

define('EASY_LABEL_CREATE', 'Export Datei erzeugen');
define('EASY_LABEL_CREATE_SELECT', 'Methode w&auml;hlen um die Datei zu speichern');
define('EASY_LABEL_CREATE_SAVE', 'Im Temp Verzeichnis des Servers ablegen');
define('EASY_LABEL_SELECT_DOWN', 'Felder w&auml;hlen die zu exportieren sind');
define('EASY_LABEL_SORT', 'Sortierreihenfolge w&auml;hlen');
define('EASY_LABEL_PRODUCT_RANGE', 'Nach Produkt ID sortieren');
define('EASY_LABEL_LIMIT_CAT', 'Einschr&auml;nken nach Kategorie');
define('EASY_LABEL_LIMIT_MAN', 'Einschr&auml;nken nach Hersteller');

define('EASY_LABEL_PRODUCT_AVAIL', 'Verf&uuml;gbarer Bereich: ');
define('EASY_LABEL_PRODUCT_TO', ' bis ');
define('EASY_LABEL_PRODUCT_RECORDS', '    Anzahl an Eintr&auml;gen: ');
define('EASY_LABEL_PRODUCT_BEGIN', 'Start: ');
define('EASY_LABEL_PRODUCT_END', 'Ende: ');
define('EASY_LABEL_PRODUCT_START', 'Mit erzeugen der Datei beginnen ');

define('EASY_FILE_LOCATE', 'Das erzeugen Ihrer Exportdatei wird durchgef&uuml;hrt. Ihre Datei hat folgenden Namen: ');
define('EASY_FILE_LOCATE2', 'Die Exportdatei wird zu Ihrem lokalen Computer gesendet und gespeichert. Ihre Datei hat folgenden Namen: ');

define('EASY_FILE_LOCATE_2', ' wenn Sie diesen Link klicken wechseln Sie zum Dateimanager');
define('EASY_FILE_RETURN', ' Sie k&ouml;nnen zu EP wechseln wenn sie diesen Link klicken.');
define('EASY_IMPORT_TEMP_DIR', 'Importieren aus Temp Verzeichnis ');
define('EASY_LABEL_DOWNLOAD', 'Download');
define('EASY_LABEL_COMPLETE', 'Komplett');
define('EASY_LABEL_TAB', 'tab-getrenntes .txt Datei zum bearbeiten');
define('EASY_LABEL_MPQ', 'Modell/Preis/Stk');
define('EASY_LABEL_EP_MC', 'Modell/Kategorie');

define('EASY_LABEL_EP_ATTRIB', 'Attribute');
define('EASY_LABEL_NONE', 'Keine');
define('EASY_LABEL_CATEGORY', 'erster Kategorie Name');
define('PULL_DOWN_MANUFACTURES', 'Hersteller');
define('EASY_LABEL_PRODUCT', 'Produkt Nummer');
define('EASY_LABEL_MANUFACTURE', 'Hersteller Nummer');
define('EASY_LABEL_EP_MA', 'Modell/Attribute');
define('EASY_LABEL_EP_FR_TITLE', 'Erzeuge EP oder Froogle Datei im Temp Verzeichnis ');
define('EASY_LABEL_EP_DOWN_TAB', 'Erzeuge <b>Komplette</b> tab-getrenntes .txt Datei im Temp Verzeichnis');
define('EASY_LABEL_EP_DOWN_MPQ', 'Erzeuge <b>Modell/Preis/Stk</b> tab-getrennte .txt Datei im Temp Verzeichnis');
define('EASY_LABEL_EP_DOWN_MC', 'Erzeuge <b>Modell/Kategorie</b> tab-getrennte .txt Datei im Temp Verzeichnis');
define('EASY_LABEL_EP_DOWN_MA', 'Erzeuge <b>Modell/Attribute</b> tab-getrennte .txt Datei im Temp Verzeichnis');
define('EASY_LABEL_EP_LIMIT', 'Beschr&auml;nken Sie die Anzahl der Produkte die exportiert werden sollen');
define('EASY_LABEL_NEW_PRODUCT', "<font color='green'> !Neues Produkt!</font><br>");
define('EASY_LABEL_UPDATED', "<font color='blue'> Aktuallisiert</font><br>");
define('EASY_LABEL_DELETE_STATUS_1', "<font color='red'> !!Produkt gel&ouml;scht ");
define('EASY_LABEL_DELETE_STATUS_2', " von der Datenbank !!</font><br>");
define('EASY_LABEL_LINE_COUNT_1', 'hinzugef&uuml;gt ');
define('EASY_LABEL_LINE_COUNT_2', 'Aufzeichnungen und schließende Datei... ');
define('EASY_LABEL_FILE_COUNT_1A', 'Erzeuge EPA_Aufgeteilte Datei ');
define('EASY_LABEL_FILE_COUNT_1B', 'Erzeuge EPA_Aufgeteilte Datei ');
define('EASY_LABEL_FILE_COUNT_2', '.txt ...  ');
define('EASY_LABEL_FILE_CLOSE_1', 'hinzugef&uuml;gt ');
define('EASY_LABEL_FILE_CLOSE_2', ' Aufzeichnungen und schließende Datei...');
define('EASY_LABEL_FILE_INSERT_LOCAL', 'Lokale Datei importieren: ');
define('TEXT_INFO_TIMER', 'Script timer:');
define('TEXT_INFO_SECOND', 'sekunden.');

//errormessages
define('EASY_ERROR_1', 'Fehler 01 - Merkw&uuml;rdig aber es gibt keine Standard Sprache, zum arbeiten… Das kann m&ouml;glicherweise nicht abgearbeitet werden, gerade deswegen…');
define('EASY_ERROR_2', '... Fehler 02 - Zu viele Buchstaben in Modellnummer.<br>
      25 ist das Maximum in diesem Shop.<br>
      Ihre maximale Zeichenl&auml;nge von Produkt_Modell ist auf folgenden Wert gesetzt ');
define('EASY_ERROR_2A', ' <br>Sie m&uuml;ssen entweder die Modell Nummer k&uuml;rzen oder die Datenbank dementsprechend &auml;ndern</font>');
define('EASY_ERROR_2B',  "<font color='red'>");
define('EASY_ERROR_3', '<p class=smallText> Fehler 03 - Keine Produkt Nummer vorhanden oder an der falschen Position. Diese Zeile wurde nicht importiert.<br><br>');
define('EASY_ERROR_4', '<font color=red>Fehler 04 - Kundengruppen Nummer und Kundenpreis m&uuml;ssen zusammen passen</font>');
define('EASY_ERROR_5', '</b><font color=red>Fehler 05 - Sie versuchen eine Mit EP Erweitert erstellte Datei zu verwenden bitte versuchen Sie es auch mit EP Erweitert die Datei zu nutzen </font>');
define('EASY_ERROR_5a', '<font color=red><b><u>  Klicken Sie hier um zu EP Basic zu wechseln </u></b></font>');
define('EASY_ERROR_6', '</b><font color=red>Fehler 06 - Sie versuchen eine Mit EP Basic erstellte Datei zu verwenden bitte versuchen Sie es auch mit EP Basic die Datei zu nutzen </font>');
define('EASY_ERROR_6a', '<font color=red><b><u>  Klicken Sie hier um zu EP Erweitert zu wechseln </u></b></font>');
define('EASY_ERROR_7', '<p class=smallText> Fehler 07 - Keine Modul Nummer vorhanden oder an der falschen Position. Diese Zeile wurde nicht importiert. <br><br>');

// Eversun mod for Easy Populate Products Options, Values and Attributes
define('EASY_VERSION_C', 'Easy Populate Optionen');
define('EASY_LABEL_OPTIONS_ID', 'Option ID');
define('EASY_LABEL_OPTIONS_NAME', 'Option Name');
define('EASY_VERSION_D', 'Easy Populate Werte');
define('EASY_LABEL_VALUES_ID', 'Wert ID');
define('EASY_LABEL_VALUES_NAME', 'Wert Name');
define('EASY_VERSION_E', 'Easy Populate Attribute');
define('TEXT_SELECT_ONE_OPTIONS', 'W&aumlHlen Sie eine EP Options Datei f&uuml;r Import');
define('TEXT_SELECT_ONE_VALUES', 'W&aumlHlen Sie eine EP Werte Datei f&uuml;r Import');
define('TEXT_SELECT_ONE_ATTRIBUTES', 'W&aumlHlen Sie eine EP Attribute Datei f&uuml;r Import');
define('EASY_ERROR_8', '<b><font color=red>Error - Sie haben keine Datei gew&auml;hlt</font></b>');
define('EASY_INFO_SUCCESS', '<b><font color=red>Import Erfolgreich</font></b>');
define('EASY_INFO_FILE_NOT_FOUND', '<b><font color=red>Datei nicht gefunden</font></b>');
define('EASY_INFO_CHECK_ERROR1', '<b><font color=red>Feld %s Ist nicht in der Tabelle %s vorhanden.</font></b>');
// Eversun mod end for Easy Populate Products Options, Values and Attributes
?>
