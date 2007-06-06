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
define('HEADING_TITLE', 'Sauvegarde BDD - MySQL');
define('WARNING_NOT_SECURE_FOR_DOWNLOADS','<span class="errorText">NOTE: LLe SSL n\'est pas activ&eacute;. Tout les t&eacute;l&eacute;chargements de cette page ne seront pas encrypt&eacute;s. Faire des sauvegardes et des restaurations sera bon, mais t&eacute;l&eacute;charger/envoyer des dossiers de/vers le serveur pr&eacute;sente un risque de s&eacute;curit&eacute;.');

define('TABLE_HEADING_TITLE', 'titre');
define('TABLE_HEADING_FILE_DATE', 'date');
define('TABLE_HEADING_FILE_SIZE', 'taille');
define('TABLE_HEADING_ACTION', 'action');

define('TEXT_INFO_HEADING_NEW_BACKUP', 'nouvelle sauvegarde');
define('TEXT_INFO_HEADING_RESTORE_LOCAL', 'restaurer localement');
define('TEXT_INFO_NEW_BACKUP', 'n\'interrompez pas la sauvegarde : elle peut durer quelques minutes...');
define('TEXT_INFO_UNPACK', '<br><br>(apr&egrave;s extraction des fichiers de l\'archive)');
define('TEXT_INFO_RESTORE', 'n\'interrompez pas la restauration et utilisez un client Mysql : <br><br><b>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </b> %s');
define('TEXT_INFO_RESTORE_LOCAL', 'n\'interrompez pas le processus de restauration... <br>');
define('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', 'le fichier transf&eacute;rl&eacute; doit &ecirc;tre au format SQL brut (texte).');
define('TEXT_INFO_DATE', 'date :');
define('TEXT_INFO_SIZE', 'taille :');
define('TEXT_INFO_COMPRESSION', 'compression :');
define('TEXT_INFO_USE_GZIP', 'utiliser GZIP');
define('TEXT_INFO_USE_ZIP', 'utiliser ZIP');
define('TEXT_INFO_USE_NO_COMPRESSION', 'pas de compression (pur SQL)');
define('TEXT_INFO_DOWNLOAD_ONLY', 't&eacute;l&eacute;charger sans stocker c&ocirc;t&eacute; serveur');
define('TEXT_INFO_BEST_THROUGH_HTTPS', 'meilleure solution dans le cas d\'une connexion HTTPS');
define('TEXT_DELETE_INTRO', 'voulez-vous supprimer cette sauvegarde ?');
define('TEXT_NO_EXTENSION', 'aucune');
define('TEXT_BACKUP_DIRECTORY', 'r&eacute;pertoire de sauvegarde :');
define('TEXT_LAST_RESTORATION', 'derni&egrave;re restauration :');
define('TEXT_FORGET', '(<u>oubli&eacute;</u>)');

define('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', 'erreur : r&eacute;pertoire de savegarde inexistant.');
define('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', 'erreur : CHMOD de r&eacute;pertoire.');
define('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', 'erreur : pas de lien.');
define('ERROR_CANT_BACKUP_IN_SAFE_MODE','ERROR: Cannot use backup script when safe_mode is enabled.');

define('SUCCESS_LAST_RESTORE_CLEARED', 'succ&egrave;s : la date de derni&egrave;re restauration a &eacute;t&eacute; modifi&eacute;e.');
define('SUCCESS_DATABASE_SAVED', 'succ&egrave;s : la base de donn&eacute;es a &eacute;t&eacute; sauvegard&eacute;e.');
define('SUCCESS_DATABASE_RESTORED', 'succ&egrave;s : la base de donn&eacute;es a &eacute;t&eacute; restaur&eacute;e.');
define('SUCCESS_BACKUP_DELETED', 'succ&egrave;s : la base de donn&eacute;es a &eacute;t&eacute; supprim&eacute;e.');
define('FAILURE_DATABASE_NOT_SAVED', 'Echec: La base de donn&eacute;es n\'a pas &eacute;t&eacute; sauvegard&eacute;e.');
define('FAILURE_DATABASE_NOT_SAVED_UTIL_NOT_FOUND', 'ERREUR: Impossible de trouver l\'utilitaire MYSQLDUMP. SAUVEGARDE ANNULEE.');
define('FAILURE_DATABASE_NOT_RESTORED', 'Echec: La base de donn&eacute;es n\'a pas &eacute;t&eacute; restaurer correctement. Veuillez faire une v&eacute;rification.');
define('FAILURE_DATABASE_NOT_RESTORED_FILE_NOT_FOUND', 'Echec: La base de donn&eacute;es n\'est pas restaur&eacute;e.  ERREUR: FICHIER NON TROUVE: %s');
define('FAILURE_DATABASE_NOT_RESTORED_UTIL_NOT_FOUND', 'ERREUR: Impossible de trouver l\'utilitaire de restauration MYSQL. RESTAURATION ECHOUEE.');

define('BACKUP_MYSQl_ERROR_MSG_1', 'Checking Path: ');
define('BACKUP_MYSQl_ERROR_MSG_2', 'COMMAND FILES FOUND/SELECTED:');
define('BACKUP_MYSQl_ERROR_MSG_3', 'COMMAND: ');
define('BACKUP_MYSQl_ERROR_MSG_4', "valueA: ");
define('BACKUP_MYSQl_ERROR_MSG_5', "valueB: ");
define('BACKUP_MYSQl_ERROR_MSG_6', 'Result code: ');
define('BYTES', ' bytes');
?>