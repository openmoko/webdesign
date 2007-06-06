<?php
/*
  $Id: admin_account.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Admin Konto');

define('TABLE_HEADING_ACCOUNT', 'Mein Konto');

define('TEXT_INFO_FULLNAME', '<b>Name: </b>');
define('TEXT_INFO_FIRSTNAME', '<b>Vorname: </b>');
define('TEXT_INFO_LASTNAME', '<b>Nachname: </b>');
define('TEXT_INFO_EMAIL', '<b>Email Adresse: </b>');
define('TEXT_INFO_PASSWORD', '<b>Passwort: </b>');
define('TEXT_INFO_PASSWORD_HIDDEN', '-Versteckt-');
define('TEXT_INFO_PASSWORD_CONFIRM', '<b>Passwort best&auml;tigen: </b>');
define('TEXT_INFO_CREATED', '<b>Konto erstellt am: </b>');
define('TEXT_INFO_LOGDATE', '<b>Letzter Zugriff am: </b>');
define('TEXT_INFO_LOGNUM', '<b>Log Nummer: </b>');
define('TEXT_INFO_GROUP', '<b>Gruppen Ebene: </b>');
define('TEXT_INFO_ERROR', '<font color="red">Email Adresse wurde bereits benutzt! Bitte versuchen Sie es noch einmal.</font>');
define('TEXT_INFO_MODIFIED', 'Ge&auml;ndert am: ');

define('TEXT_INFO_HEADING_DEFAULT', 'Konto editieren ');
define('TEXT_INFO_HEADING_CONFIRM_PASSWORD', 'Passwort Best&auml;tigung ');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD', 'Passwort:');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD_ERROR', '<font color="red"><b>FEHLER:</b> Falsches Passwort!</font>');
define('TEXT_INFO_INTRO_DEFAULT', 'Klicken Sie den <b>&Auml;ndern Button</b> unten, um Ihr Konto zu editieren.');
define('TEXT_INFO_INTRO_DEFAULT_FIRST_TIME', '<br><b>WARNUNG:</b><br>Hallo <b>%s</b>, Sie sind zum ersten mal hier. Wir empfehlen Ihnen, Ihr Passwort zu &auml;ndern!');
define('TEXT_INFO_INTRO_DEFAULT_FIRST', '<br><b>WARNUNG:</b><br>Hallo <b>%s</b>, wir empfehlen Ihnen, Ihre Email Adresse (<font color="red">admin@localhost</font>) und passwort zu &auml;ndern!');
define('TEXT_INFO_INTRO_EDIT_PROCESS', 'Alle Felder sind erforderlich. Klicken Sie Speichern zur Eingabe.');

define('JS_ALERT_FIRSTNAME',        '- Notwendig: Vorname \n');
define('JS_ALERT_LASTNAME',         '- Notwendig: Nachname \n');
define('JS_ALERT_EMAIL',            '- Notwendig: Email Adresse \n');
define('JS_ALERT_PASSWORD',         '- Notwendig: Passwort \n');
define('JS_ALERT_FIRSTNAME_LENGTH', '- Vorname muss l&auml;nger sein als ');
define('JS_ALERT_LASTNAME_LENGTH',  '- Nachname muss l&auml;nger sein als ');
define('JS_ALERT_PASSWORD_LENGTH',  '- Passwort muss l&auml;nger sein als ');
define('JS_ALERT_EMAIL_FORMAT',     '- Email Adressen-Format ist ung&uuml;ltig! \n');
define('JS_ALERT_EMAIL_USED',       '- Email Adresse wurde bereits benutzt! \n');
define('JS_ALERT_PASSWORD_CONFIRM', '- Tippfehler im Passwort-Best&auml;tigungs-Feld! \n');

define('ADMIN_EMAIL_SUBJECT', 'Pers&ouml;nliche Daten &Auml;ndern');
define('ADMIN_EMAIL_TEXT', 'Hallo %s,' . "\n\n" . 'Ihre pers&ouml;nlichen Daten und m&ouml;glicherweise Ihr Passwort, wurden geändert.  Wenn dies ohne Ihr Wissen oder Ihre Zustimmung erfolgte, kontaktieren Sie uns bitte umgehend!' . "\n\n" . 'Webseite : %s' . "\n" . 'Username: %s' . "\n" . 'Passwort: %s' . "\n\n" . 'Danke!' . "\n" . '%s' . "\n\n" . 'Dies ist eine vom System automatisch generierte Antwort. Eine Antwort Ihrerseits bliebe ungelesen!');

define('JS_ALERT_FIRSTNAME_1','- Firstname length must over ');
define('JS_ALERT_LASTNAME_1','- Firstname length must over ');
define('JS_ALERT_ERROR','The following error(s) occurred:');

?>
