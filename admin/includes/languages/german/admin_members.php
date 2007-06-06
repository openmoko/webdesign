<?php
/*
  $Id: admin_members.php,v 1.1 2004/03/05 01:39:13 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

if ($HTTP_GET_VARS['gID']) {
  define('HEADING_TITLE', 'Admin Gruppen');
} elseif ($HTTP_GET_VARS['gPath']) {
  define('HEADING_TITLE', 'Gruppen definieren');
} else {
  define('HEADING_TITLE', 'Admin Mitglieder');
}

define('TEXT_COUNT_GROUPS', 'Gruppen: ');

define('TABLE_HEADING_NAME', 'Name');
define('TABLE_HEADING_EMAIL', 'Email Adresse');
define('TABLE_HEADING_PASSWORD', 'Passwort');
define('TABLE_HEADING_CONFIRM', 'Passwort best&auml;tigen');
define('TABLE_HEADING_GROUPS', 'Gruppen Ebene');
define('TABLE_HEADING_CREATED', 'Konto erstellt');
define('TABLE_HEADING_MODIFIED', 'Konto ge&auml;ndert');
define('TABLE_HEADING_LOGDATE', 'Letzter Zugriff');
define('TABLE_HEADING_LOGNUM', 'LogNum');
define('TABLE_HEADING_LOG_NUM', 'Log Nummer');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TABLE_HEADING_GROUPS_NAME', 'Gruppen Name');
define('TABLE_HEADING_GROUPS_DEFINE', 'Boxen und Datei Auswahl');
define('TABLE_HEADING_GROUPS_GROUP', 'Ebene');
define('TABLE_HEADING_GROUPS_CATEGORIES', 'Kategorien Zugriffsrecht');


define('TEXT_INFO_HEADING_DEFAULT', 'Admin Mitglied ');
define('TEXT_INFO_HEADING_DELETE', 'Zugriffrecht l&ouml;schen ');
define('TEXT_INFO_HEADING_EDIT', 'Kategorie &auml;ndern / ');
define('TEXT_INFO_HEADING_NEW', 'Neues Admin Mitglied ');

define('TEXT_INFO_DEFAULT_INTRO', 'Mitgliedsgruppe');
define('TEXT_INFO_DELETE_INTRO', 'Entferne <nobr><b>%s</b></nobr> von <nobr>Admin Mitglieder?</nobr>');
define('TEXT_INFO_DELETE_INTRO_NOT', 'Sie k&ouml;nnen keine <nobr>%s Gruppe l&ouml;schen!</nobr>');
define('TEXT_INFO_EDIT_INTRO', 'Zugriffsrechte hier &auml;ndern: ');

define('TEXT_INFO_FULLNAME', 'Name: ');
define('TEXT_INFO_FIRSTNAME', 'Vorname: ');
define('TEXT_INFO_LASTNAME', 'Nachname: ');
define('TEXT_INFO_EMAIL', 'Email Adresse: ');
define('TEXT_INFO_PASSWORD', 'Passwort: ');
define('TEXT_INFO_CONFIRM', 'Passwort best&auml;tigen: ');
define('TEXT_INFO_CREATED', 'Konto erstellt: ');
define('TEXT_INFO_MODIFIED', 'Konto ge&auml;ndert: ');
define('TEXT_INFO_LOGDATE', 'Letzter Zugriff: ');
define('TEXT_INFO_LOGNUM', 'Log Nummer: ');
define('TEXT_INFO_GROUP', 'Gruppenebene: ');
define('TEXT_INFO_ERROR', '<font color="red">Email Adresse wurde bereits benutzt! Bitte versuchen Sie es nochmal.</font>');

define('JS_ALERT_FIRSTNAME', '- Notwendig: Vorname \n');
define('JS_ALERT_LASTNAME', '- Notwendig: Nachname \n');
define('JS_ALERT_EMAIL', '- Notwendig: Email Adresse \n');
define('JS_ALERT_EMAIL_FORMAT', '- Email Adressenformat ist ung&uuml;ltig! \n');
define('JS_ALERT_EMAIL_USED', '- Email Adresse wurde bereits benutzt! \n');
define('JS_ALERT_LEVEL', '- Notwendig: Gruppenmitglied \n');

define('ADMIN_EMAIL_SUBJECT', 'Neues Adminmitglied');
define('ADMIN_EMAIL_TEXT', 'Hi %s,' . "\n\n" . 'Mit dem folgenden Passwort erhalten Sie Zugang zum Admin Panel . Sobald Sie das Admin Panel betreten haben, &auml;ndern Sie bitte Ihr Passwort!' . "\n\n" . 'Webseite : %s' . "\n" . 'Benutzername: %s' . "\n" . 'Passwort: %s' . "\n\n" . 'Danke!' . "\n" . '%s' . "\n\n" . 'Dies ist eine vom System automatisch generierte Antwort. Eine Antwort Ihrerseits bliebe ungelesen!');
define('ADMIN_EMAIL_EDIT_SUBJECT', 'Admin Mitglieds-Profil &auml;ndern');
define('ADMIN_EMAIL_EDIT_TEXT', 'Hi %s,' . "\n\n" . 'Ihre pers&ouml;nlichen Daten wurden durch einen Admin ge&auml;ndert.' . "\n\n" . 'Webseite : %s' . "\n" . 'Username: %s' . "\n" . 'Passwort: %s' . "\n\n" . 'Danke!' . "\n" . '%s' . "\n\n" . 'Dies ist eine vom System automatisch generierte Antwort. Eine Antwort Ihrerseits bliebe ungelesen!');

define('TEXT_INFO_HEADING_DEFAULT_GROUPS', 'Admin Gruppe ');
define('TEXT_INFO_HEADING_DELETE_GROUPS', 'Gruppe l&ouml;schen ');

define('TEXT_INFO_DEFAULT_GROUPS_INTRO', '<b>ACHTUNG:</b><li><b>&Auml;ndern::</b> Name der Gruppe &auml;ndern.</li><li><b>L&ouml;schen:</b> Gruppe l&ouml;schen.</li><li><b>Definieren:</b> Gruppenzugang definieren.</li>');
define('TEXT_INFO_DELETE_GROUPS_INTRO', 'Es werden auch die Mitglieder dieser Gruppe gel&ouml;scht. Wollen Sie sicher diese Gruppe l&ouml;schen: <nobr><b>%s</b> group?</nobr>');
define('TEXT_INFO_DELETE_GROUPS_INTRO_NOT', 'Sie k&ouml;nnen diese Gruppen nicht l&ouml;schen!');
define('TEXT_INFO_GROUPS_INTRO', 'Vergeben Sie einen einmaligen Gruppennamen. Klicken Sie Weiter zur Eingabe');

define('TEXT_INFO_HEADING_GROUPS', 'Neue Gruppe');
define('TEXT_INFO_GROUPS_NAME', ' <b>Gruppenname:</b><br>Vergeben Sie einen einmaligen Gruppennamen. Klicken Sie Weiter zur Eingabe.<br>');
define('TEXT_INFO_GROUPS_NAME_FALSE', '<font color="red"><b>FEHLER:</b> Der Gruppenname muss aus mindestens 5 Zeichen bestehen!</font>');
define('TEXT_INFO_GROUPS_NAME_USED', '<font color="red"><b>FEHLER:</b> Gruppenname wurde bereits benutzt!</font>');
define('TEXT_INFO_GROUPS_LEVEL', 'Gruppen Ebene: ');
define('TEXT_INFO_GROUPS_BOXES', '<b>Boxen Zugriffsrecht:</b><br>Vergeben Sie die Zugriffe für die gew&auml;hlten Boxen.');
define('TEXT_INFO_GROUPS_BOXES_INCLUDE', 'Dateien miteinbeziehen, die hier gespeichert sind: ');

define('TEXT_INFO_EDIT_GROUP_INTRO', 'Gruppen-Name &auml;ndern: ');

define('TEXT_INFO_HEADING_DEFINE', 'Gruppe definieren');
if ($HTTP_GET_VARS['gPath'] == 1) {
  define('TEXT_INFO_DEFINE_INTRO', '<b>%s :</b><br>Sie k&ouml;nnen nicht die Dateizugriffs-Rechte für diese Gruppe &auml;ndern.<br><br>');
} else {
  define('TEXT_INFO_DEFINE_INTRO', '<b>%s :</b><br>&Auml;ndern Sie die Rechte für diese Gruppen durch das Setzen von H&auml;kchen bei den Boxen und Dateien. Klicken Sie <b>Speichern</b> um die &Auml;nderungen zu sichern.<br><br>');
}
?>
