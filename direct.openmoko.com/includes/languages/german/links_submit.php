<?php
/*
  $Id: links_submit.php,v 1.1 2004/03/05 01:39:14 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Links');
define('NAVBAR_TITLE_2', 'Link eintragen');

define('HEADING_TITLE', 'Link Information');

define('TEXT_MAIN', 'Bitte geben Sie die folgenden Informationen an, um Ihre Webseite einzutragen.');

define('EMAIL_SUBJECT', 'Willkommen beim ' . STORE_NAME . ' link exchange.');
define('EMAIL_GREET_NONE', 'Hallo %s' . "\n\n");
define('EMAIL_WELCOME', 'Wir heissen Sie willkommen beim <b>' . STORE_NAME . '</b> Link-Tausch.' . "\n\n");
define('EMAIL_TEXT', 'Ihr Link wurde erfolgreich bei ' . STORE_NAME . ' eingetragen. Er wird angezeigt, sobald wir diesen Link positiv begutachtet haben. Sie werden eine Email &uuml;ber den Status des Eintrags erhalten. Sollten Sie diese Email nicht innerhalb von 48 Stunden nach Eintrag erhalten, kontaktieren Sie uns bitte, bevor Sie den Link abermals eintragen.' . "\n\n");
define('EMAIL_CONTACT', 'F&uuml;r Hilfe zu unserem Link-Tausch Programm kontaktieren Sie uns bitte: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Achtung:</b> Diese Emailadresse wurde uns im Zuge eines Linkeintrags genannt. Wenn Sie auf Probleme stossen, kontaktieren Sie und bitte: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_OWNER_SUBJECT', 'Link Eintrag bei ' . STORE_NAME);
define('EMAIL_OWNER_TEXT', 'Ein neuer Link wurde bei ' . STORE_NAME . ' eingetragen. Er ist noch nicht begutachtet. Bitte &uuml;berpr&uuml;fen und aktivieren Sie den Link' . "\n\n");

define('TEXT_LINKS_HELP_LINK', '&nbsp;Hilfe&nbsp;[?]');

define('HEADING_LINKS_HELP', 'Links Hilfe');
define('TEXT_LINKS_HELP', '<b>Seitentitel:</b> Ein aussagekr&auml;ftiger Titel f&uuml;r Ihre Webseite.<br><br><b>URL:</b> Die absolute Web-Adresse Ihrer Seite, welche das \'http://\' beinhaltet.<br><br><b>Kategorie:</b> Meist zutreffende Kategorie unter die Ihre Webseite f&auml;llt.<br><br><b>Beschreibung:</b> Eine kurze Beschreibung Ihrer Webseite.<br><br><b>Bild URL:</b> Die absolute URL des Bildes, welches Sie eintragen m&ouml;chten, inklusive dem \'http://\' davor. Dieses Bild wird gemeinsam mit Ihrem Webseiten-Link angezeigt.<br>zB: http://ihre-domain.com/pfad/zu/ihrem/bild.gif <br><br><b>Name:</b> Ihr ganzer Name.<br><br><b>Email:</b> Ihre Emailadresse. Bitte geben Sie eine g&uuml;ltige Emailadresse an, da Sie per Email &uuml;ber den Status benachrichtigt werden.<br><br><b>Reziprokale Seite:</b> Die absolute URL von Ihrer Links Seite, wo ein Link zu unserer Webseite angef&uuml;hrt ist.<br>zB: http://ihre-domain.com/pfad/zu/ihrer/links_seite.php');
define('TEXT_CLOSE_WINDOW', '<u>Fenster schliessen</u> [x]');

// VJ todo - move to common language file
define('CATEGORY_WEBSITE', 'Webseiten Details');
define('CATEGORY_RECIPROCAL', 'Details zur Reziprokalen Seite');

define('ENTRY_LINKS_TITLE', 'Seitentitel:');
define('ENTRY_LINKS_TITLE_ERROR', 'Linktitel muss zumindest ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' Zeichen enthalten.');
define('ENTRY_LINKS_TITLE_TEXT', '*');
define('ENTRY_LINKS_URL', 'URL:');
define('ENTRY_LINKS_URL_ERROR', 'URL muss zumindest ' . ENTRY_LINKS_URL_MIN_LENGTH . ' Zeichen enthalten.');
define('ENTRY_LINKS_URL_TEXT', '*');
define('ENTRY_LINKS_CATEGORY', 'Kategorie:');
define('ENTRY_LINKS_CATEGORY_TEXT', '*');
define('ENTRY_LINKS_DESCRIPTION', 'Beschreibung:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'Beschreibung muss zumindest ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' Zeichen enthalten.');
define('ENTRY_LINKS_DESCRIPTION_TEXT', '*');
define('ENTRY_LINKS_IMAGE', 'Bild URL:');
define('ENTRY_LINKS_IMAGE_TEXT', '');
define('ENTRY_LINKS_CONTACT_NAME', 'Name:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Ihr ganzer Name muss zumindest ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' Zeichen enthalten.');
define('ENTRY_LINKS_CONTACT_NAME_TEXT', '*');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Reziprokale Seite:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'Reziprokale Seite muss zumindest ' . ENTRY_LINKS_URL_MIN_LENGTH . ' Zeichen enthalten.');
define('ENTRY_LINKS_RECIPROCAL_URL_TEXT', '*');
?>
