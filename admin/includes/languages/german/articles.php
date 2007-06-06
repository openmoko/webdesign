<?php
/*
  $Id: articles.php, v1.0 2003/12/04 12:00:00 ra Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Topics / Articles');
define('HEADING_TITLE_SEARCH', 'Search:');
define('HEADING_TITLE_GOTO', 'Go To:');

define('TABLE_HEADING_ID', 'ID');
define('TABLE_HEADING_TOPICS_ARTICLES', '&Uuml;berschrift / Produkt');
define('TABLE_HEADING_ACTION', 'Aktion');
define('TABLE_HEADING_STATUS', 'Status');

define('TEXT_ARTICLES_CURRENT', 'Gegenw&auml;rtig:');

define('TEXT_NEW_ARTICLE', 'Neue Produkte in &quot;%s&quot;');
define('TEXT_TOPICS', '&Uuml;berschriften:');
define('TEXT_SUBTOPICS', 'Unterpunkte:');
define('TEXT_ARTICLES', 'Produkte:');
define('TEXT_ARTICLES_AVERAGE_RATING', 'Durchschnittliche Bewertung:');
define('TEXT_ARTICLES_HEAD_TITLE_TAG', 'HTML Seiten Titel:');
define('TEXT_ARTICLES_HEAD_DESC_TAG', 'Meta Beschreibung:<br><small>(Produkte-Auszug =<br>ersten %s Zeichen)</small>');
define('TEXT_ARTICLES_HEAD_KEYWORDS_TAG', 'Meta Keywords:');
define('TEXT_DATE_ADDED', 'Hinzugef&uuml;gt am:');
define('TEXT_DATE_AVAILABLE', 'Datum erwartet:');
define('TEXT_LAST_MODIFIED', 'Letzte &Auml;nderung:');
define('TEXT_NO_CHILD_TOPICS_OR_ARTICLES', 'Setzen Sie bitte ein neues Thema oder einen Produkt in diesem Bereich ein.');
define('TEXT_ARTICLE_MORE_INFORMATION', 'F&uuml;r mehr Information besuchen Sie bitte diesen <a href="http://%s" target="blank"><u>Produkt</u></a>.');
define('TEXT_ARTICLE_DATE_ADDED', 'Dieses Produkt wurde erstellt am %s.');
define('TEXT_ARTICLE_DATE_AVAILABLE', 'Dieses Produkt erscheint am %s.');

define('TEXT_EDIT_INTRO', 'F&uuml;hren Sie bitte alle notwendigen &Auml;nderungen durch');
define('TEXT_EDIT_TOPICS_ID', '&Uuml;berschrift ID:');
define('TEXT_EDIT_TOPICS_NAME', '&Uuml;berschrift Name:');
define('TEXT_EDIT_SORT_ORDER', 'Sortierung:');

define('TEXT_INFO_COPY_TO_INTRO', 'W&auml;hlen Sie bitte ein neues Thema, in das Sie dieses Produkt kopieren m&ouml;chten');
define('TEXT_INFO_CURRENT_TOPICS', 'Gegenw&auml;rtige Themen:');

define('TEXT_INFO_HEADING_NEW_TOPIC', 'Neuer Eintrag');
define('TEXT_INFO_HEADING_EDIT_TOPIC', 'Eintrag bearbeiten');
define('TEXT_INFO_HEADING_DELETE_TOPIC', 'Eintrag l&ouml;schen');
define('TEXT_INFO_HEADING_MOVE_TOPIC', 'Eintrag kopieren');
define('TEXT_INFO_HEADING_DELETE_ARTICLE', 'Eintrag l&ouml;schen');
define('TEXT_INFO_HEADING_MOVE_ARTICLE', 'Eintrag kopieren');
define('TEXT_INFO_HEADING_COPY_TO', 'Kopieren nach');

define('TEXT_DELETE_TOPIC_INTRO', 'Wollen Sie diesen Eintrag l&ouml;schen?');
define('TEXT_DELETE_ARTICLE_INTRO', 'Wollen Sie diesen Eintarg unwiederruflich l&ouml;schen?');

define('TEXT_DELETE_WARNING_CHILDS', '<b>WARNUNG:</b> Es sind %s Eintr&auml;ge zu diesem Bereich verlinkt!');
define('TEXT_DELETE_WARNING_ARTICLES', '<b>WARNUNG:</b> Es sind %s Eintr&auml;ge zu diesem Bereich verlinkt!');

define('TEXT_MOVE_ARTICLES_INTRO', 'Bitte w&auml;hlen Sie das Produkt <b>%s</b> den Sie verschieben m&ouml;chten');
define('TEXT_MOVE_TOPICS_INTRO', 'Bitte Produkt w&auml;hlen  <b>%s</b> den Sie verschieben m&ouml;chten');
define('TEXT_MOVE', 'Verschieben <b>%s</b> nach:');

define('TEXT_NEW_TOPIC_INTRO', 'Folgende Informationen m&uuml;ssen ausgef&uuml;llt werden, um einen neues Produkt zu erstellen');
define('TEXT_TOPICS_NAME', 'Produkt Name:');
define('TEXT_SORT_ORDER', 'Sortierung:');

define('TEXT_EDIT_TOPICS_HEADING_TITLE', 'Produkt Titel:');
define('TEXT_EDIT_TOPICS_DESCRIPTION', 'Produkt Beschreibung:');

define('TEXT_ARTICLES_STATUS', 'Produkt Status:');
define('TEXT_ARTICLES_DATE_AVAILABLE', 'Ver&ouml;ffentlichung am:');
define('TEXT_ARTICLE_AVAILABLE', 'Ver&ouml;ffentlicht');
define('TEXT_ARTICLE_NOT_AVAILABLE', 'Entwurf');
define('TEXT_ARTICLES_AUTHOR', 'Autor:');
define('TEXT_ARTICLES_NAME', 'Produkt Name:');
define('TEXT_ARTICLES_DESCRIPTION', 'Produkt Text:');
define('TEXT_ARTICLES_URL', 'Produkt URL:');
define('TEXT_ARTICLES_URL_WITHOUT_HTTP', '<small>(ohne http://)</small>');

define('EMPTY_TOPIC', 'Leeres Produkt');

define('TEXT_HOW_TO_COPY', 'Kopier Methode:');
define('TEXT_COPY_AS_LINK', 'Link Produkt');
define('TEXT_COPY_AS_DUPLICATE', 'Doppeltes Produkt');

define('ERROR_CANNOT_LINK_TO_SAME_TOPIC', 'FEHLER: Kann kein Produkt im gleichen Thema verbinden.');
define('ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE', 'FEHLER: Katalog /Images Verzeichnis ist schreibgesch&uuml;tzt: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'FEHLER: Katalog Image Verzeichnis existiert nicht: ' . DIR_FS_CATALOG_IMAGES);
define('ERROR_CANNOT_MOVE_TOPIC_TO_PARENT', 'FEHLER: Thema kann nicht in Produkt verschoben werden.');

define('DATE_FORMAT', '(YYYY-MM-DD)');

?>
