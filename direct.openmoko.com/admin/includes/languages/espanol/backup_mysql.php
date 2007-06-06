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
// Translated by: jparis v1.0

// define the locations of the mysql utilities.  Typical location is in '/usr/bin/' ... but not on Windows servers.
// try 'c:/mysql/bin/mysql.exe' and 'c:/mysql/bin/mysqldump.exe' on Windows hosts ... change drive letter and path as needed
define('LOCAL_EXE_MYSQL',     'e:/apache/xampp/mysql');  // para restauraciones
define('LOCAL_EXE_MYSQLDUMP', 'e:/apache/wampp/mysqldump');  // para copias de seguridad

// the following are the language definitions
define('HEADING_TITLE', 'Gestor de copias de seguridad de la base de datos - MySQL');
define('WARNING_NOT_SECURE_FOR_DOWNLOADS','<span class="errorText">NOTA: El SSL no esta activado. Cualquier descarga que haga desde esta p�gina no estar� encriptada. Las copias de seguridad y la restauraci�n funcionar�n, pero descargar o subir archvos desde/hacia el servidor representa un riesgo en la seguridad.');
define('TABLE_HEADING_TITLE', 'T�tulo');
define('TABLE_HEADING_FILE_DATE', 'Fecha');
define('TABLE_HEADING_FILE_SIZE', 'Tama�o');
define('TABLE_HEADING_ACTION', 'Acci�n');

define('TEXT_INFO_HEADING_NEW_BACKUP', 'Nueva copia de seguridad');
define('TEXT_INFO_HEADING_RESTORE_LOCAL', 'Restaurar localmente');
define('TEXT_INFO_NEW_BACKUP', 'No interrumpa el proceso de copia de seguridad, puede llevar algunos minutos.');
define('TEXT_INFO_UNPACK', '<br><br>(despu�s de descomprimir el archivo)');
define('TEXT_INFO_RESTORE', 'No interrumpa el proceso de restauraci�n.<br><br>�Cuanto m�s grande la copia de seguridad, m�s largo es el proceso!<br><br>Si es posible, utilice el cliente de mysql.<br><br>Por ejemplo:<br><br><b>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </b> %s');
define('TEXT_INFO_RESTORE_LOCAL', 'No interrumpa el proceso de restauraci�n.<br><br>�Cuanto m�s grande la copia de seguridad, m�s largo es el proceso!');
define('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', 'El archivo subido debe ser de texto.');
define('TEXT_INFO_DATE', 'Fecha:');
define('TEXT_INFO_SIZE', 'Tama�o:');
define('TEXT_INFO_COMPRESSION', 'Compresi�n:');
define('TEXT_INFO_USE_GZIP', 'Usar GZIP');
define('TEXT_INFO_USE_ZIP', 'Usar ZIP');
define('TEXT_INFO_USE_NO_COMPRESSION', 'Sin compresi�n (SQL puro)');
define('TEXT_INFO_DOWNLOAD_ONLY', 'Descargar sin almacenar en el servidor');
define('TEXT_INFO_BEST_THROUGH_HTTPS', '(Sera m�s seguro v�a conexi�n HTTPS)');
define('TEXT_DELETE_INTRO', '�Est� seguro de que quiere eliminar esta copia de seguridad?');
define('TEXT_NO_EXTENSION', 'Ninguna');
define('TEXT_BACKUP_DIRECTORY', 'Directorio de copias de seguridad:');
define('TEXT_LAST_RESTORATION', '�ltima restauraci�n:');
define('TEXT_FORGET', '(descartar)');

define('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', 'Error: El directorio de copias de seguridad no existe. Por favor ind�quelo en configure.php.');
define('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', 'Error: No hay permisos de escritura en el directorio de backup.');
define('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', 'Error: No se admiten enlaces.');
define('ERROR_CANT_BACKUP_IN_SAFE_MODE','ERROR: No se puede usar el script de copia de seguridad cuando esta activado safe_mode (modo seguro).');

define('SUCCESS_LAST_RESTORE_CLEARED', 'OK: Se ha borrado la �ltima fecha de restauraci�n.');
define('SUCCESS_DATABASE_SAVED', 'OK: Se ha guardado la base de datos.');
define('SUCCESS_DATABASE_RESTORED', 'OK: Se ha restaurado la base de datos.');
define('SUCCESS_BACKUP_DELETED', 'OK: Se ha eliminado la copia de seguridad.');
define('FAILURE_DATABASE_NOT_SAVED', 'Fallo: La base de datos NO se ha guardado.');
define('FAILURE_DATABASE_NOT_SAVED_UTIL_NOT_FOUND', 'ERROR: No se encuentra la utilidad de copia de seguridad MYSQLDUMP. FALLO EN LA COPIA DE SEGURIDAD.');
define('FAILURE_DATABASE_NOT_RESTORED', 'Fallo: Es posible que la base de datos NO se restaurase adecuadamente. Por favor compru�belo.');
define('FAILURE_DATABASE_NOT_RESTORED_FILE_NOT_FOUND', 'Fallo: La base de datos NO se ha restaurado.  ERROR: NO SE ENCUENTRA EL ARCHIVO: %s');
define('FAILURE_DATABASE_NOT_RESTORED_UTIL_NOT_FOUND', 'ERROR: No se encontr� la utilidad de restauraci�n de MYSQL. LA RESTAURACI�N HA FALLADO.');


define('BACKUP_MYSQl_ERROR_MSG_1', 'Checking Path: ');
define('BACKUP_MYSQl_ERROR_MSG_2', 'COMMAND FILES FOUND/SELECTED:');
define('BACKUP_MYSQl_ERROR_MSG_3', 'COMMAND: ');
define('BACKUP_MYSQl_ERROR_MSG_4', "valueA: ");
define('BACKUP_MYSQl_ERROR_MSG_5', "valueB: ");
define('BACKUP_MYSQl_ERROR_MSG_6', 'Result code: ');
define('BYTES', ' bytes');
?>
