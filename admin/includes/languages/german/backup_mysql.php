<?php
//
// +----------------------------------------------------------------------+
// |zen-cart Open Source E-commerce                                       |
// +----------------------------------------------------------------------+
// | Copyright (c) 2003 The zen-cart developers                           |
// |                                                                      |
// | http://www.zen-cart.com/index.php                                    |
// |                                                                      |
// | Portions Copyright (c) 2003 osCommerce                               |
// +----------------------------------------------------------------------+
// | This source file is subject to version 2.0 of the GPL license,       |
// | that is bundled with this package in the file LICENSE, and is        |
// | available through the world-wide-web at the following url:           |
// | http://www.zen-cart.com/license/2_0.txt.                             |
// | If you did not receive a copy of the zen-cart license and are unable |
// | to obtain it through the world-wide-web, please send a note to       |
// | license@zen-cart.com so we can mail you a copy immediately.          |
// +----------------------------------------------------------------------+
// $Id: backup_mysql.php,v 1.2.0.1 2004/08/03 00:00:00 DrByteZen Exp $
//

// define the locations of the mysql utilities.  Typical location is in '/usr/bin/' ... but not on Windows servers.
// try 'c:/mysql/bin/mysql.exe' and 'c:/mysql/bin/mysqldump.exe' on Windows hosts ... change drive letter and path as needed
define('LOCAL_EXE_MYSQL',     '/usr/local/bin/mysql');  // used for restores
define('LOCAL_EXE_MYSQLDUMP', '/usr/local/bin/mysqldump');  // used for backups

// the following are the language definitions
define('HEADING_TITLE', 'Datenbank Sicherungs Manager - MySQL');
define('WARNING_NOT_SECURE_FOR_DOWNLOADS','<span class="errorText">ANMERKUNG: SSL ist nicht aktiviert. Alle Downloads werden nicht durch die SSL Verschl&uuml;sselung gesch&uuml;tzt.');
define('TABLE_HEADING_TITLE', 'Bezeichnung');
define('TABLE_HEADING_FILE_DATE', 'Datum');
define('TABLE_HEADING_FILE_SIZE', 'Gr&ouml;sse');
define('TABLE_HEADING_ACTION', 'Aktion');

define('TEXT_INFO_HEADING_NEW_BACKUP', 'Neues Backup');
define('TEXT_INFO_HEADING_RESTORE_LOCAL', 'R&uuml;cksichern auf Server');
define('TEXT_INFO_NEW_BACKUP', 'Unterbrechen Sie diesen Vorgang auf keinen Fall. Sie riskieren einen korrupten Datensatz der nicht mehr verwendet werden kann. Beachten Sie ausserdem das jede Sicherung Plattenplatz auf Ihrem Server ben&ouml;tigt.');
define('TEXT_INFO_UNPACK', '<br><br>(nach dem entpacken der Daten vom Archiv)');
define('TEXT_INFO_RESTORE', 'Den Vorgang auf keinen Fall unterbrechen.<br><br>Um so gr&ouml;sser der Shop desto l&auml;nger ben&ouml;tigt die Sicherung!!<br><br>Sollte es m&ouml;glich sein einen MYSQL Client zu verwenden, so tun Sie dies.<br><br>Beispiel Script:<br><br><b>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </b> %s');
define('TEXT_INFO_RESTORE_LOCAL', 'Den Vorgang auf keinen Fall unterbrechen!<br><br>Je gr&ouml;sser der Shop desto l&auml;nger ben&ouml;tigt das Backup');
define('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', 'Die SQL Datei muß im raw sql (text) Format vorliegen.');
define('TEXT_INFO_DATE', 'Datum:');
define('TEXT_INFO_SIZE', 'Gr&oumlsse:');
define('TEXT_INFO_COMPRESSION', 'Komprimierung:');
define('TEXT_INFO_USE_GZIP', 'GZIP verwenden');
define('TEXT_INFO_USE_ZIP', 'ZIP verwenden');
define('TEXT_INFO_USE_NO_COMPRESSION', 'Keine Komprimierung (Reines SQL)');
define('TEXT_INFO_DOWNLOAD_ONLY', 'Sicherung herunterladen und nicht auf dem Server speichern.');
define('TEXT_INFO_BEST_THROUGH_HTTPS', '(Sicherer über einen gesicherten HTTPS Anschluss)');
define('TEXT_DELETE_INTRO', 'Sind Sie sich sicher dass Sie diese Sicherung unwiederruflich l&ouml;schen m&ouml;chten?');
define('TEXT_NO_EXTENSION', 'Keine');
define('TEXT_BACKUP_DIRECTORY', 'Backup Verzeichnis:');
define('TEXT_LAST_RESTORATION', 'Letzte R&uuml;cksicherung:');
define('TEXT_FORGET', '(vergessen)');

define('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', 'Fehler: Das Sicherungsverzeichnis existiert nicht.');
define('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', 'Fehler: Sie haben keinen Schreibzugriff.');
define('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', 'Fehler: Ein Download der Datei ist derzeit nicht m&ouml;glich.');
define('ERROR_CANT_BACKUP_IN_SAFE_MODE','Fehler: Das Backup Script kann im SAFE-MODE nicht gestartet werden.');

define('SUCCESS_LAST_RESTORE_CLEARED', 'Erfolgreich: Die Datei wurde erfolgreich entfernt.');
define('SUCCESS_DATABASE_SAVED', 'Erfolgreich: Die Datenbank wurde gesichert.');
define('SUCCESS_DATABASE_RESTORED', 'Erfolgreich: Die Datenbank wurde erfolgreich r&uuml;ckgesichert.');
define('SUCCESS_BACKUP_DELETED', 'Erfolgreich: Die Sicherungsdatei wurde erfolgreich gel&ouml;scht.');
define('FAILURE_DATABASE_NOT_SAVED', 'Fehler: Die Datenbank wurde NICHT erfolgreich gesichert.');
define('FAILURE_DATABASE_NOT_SAVED_UTIL_NOT_FOUND', 'Fehler: Die Sicherungsdatei wurde nicht gefunden. BACKUP FEHLGESCHLAGEN.');
define('FAILURE_DATABASE_NOT_RESTORED', 'Fehler: Die Datenbank konnte nicht gesichert werden. Bitte &uuml;berpr&uuml;fen Sie Ihre Einstellungen.');
define('FAILURE_DATABASE_NOT_RESTORED_FILE_NOT_FOUND', 'Fehler: Die Datenbank konnte nicht zur&uuml;ck gesichert werden.  Fehler: Datei nicht gefunden: %s');
define('FAILURE_DATABASE_NOT_RESTORED_UTIL_NOT_FOUND', 'Fehler: Das R&uuml;cksicherungsmodul konnte nicht geladen werden. R&Uuml;cksicherung fehlgeschlagen.');


define('BACKUP_MYSQl_ERROR_MSG_1', 'Checking Path: ');
define('BACKUP_MYSQl_ERROR_MSG_2', 'COMMAND FILES FOUND/SELECTED:');
define('BACKUP_MYSQl_ERROR_MSG_3', 'COMMAND: ');
define('BACKUP_MYSQl_ERROR_MSG_4', "valueA: ");
define('BACKUP_MYSQl_ERROR_MSG_5', "valueB: ");
define('BACKUP_MYSQl_ERROR_MSG_6', 'Result code: ');
define('BYTES', ' bytes');
?>
