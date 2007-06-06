<?php
/*
  $Id: backup.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Copia de seguridad de la base de datos');

define('TABLE_HEADING_TITLE', 'T�tulo');
define('TABLE_HEADING_FILE_DATE', 'Fecha');
define('TABLE_HEADING_FILE_SIZE', 'Tama�o');
define('TABLE_HEADING_ACTION', 'Acci�n');

define('TEXT_INFO_HEADING_NEW_BACKUP', 'Nueva copia de seguridad');
define('TEXT_INFO_HEADING_RESTORE_LOCAL', 'Restaurar localmente');
define('TEXT_INFO_NEW_BACKUP', 'No interrumpa el proceso de copia, que puede durar unos minutos.');
define('TEXT_INFO_UNPACK', '<br><br>(despues de descomprimir el archivo)');
define('TEXT_INFO_RESTORE', 'No interrumpa el proceso de restauraci�n.<br><br>�Cuanto m�s grande sea la copia de seguridad, m�s tardar� este proceso!<br><br>Si es posible, use el cliente de mysql.<br><br>Por ejemplo:<br><br><b>mysql -h' . DB_SERVER . ' -u' . DB_SERVER_USERNAME . ' -p ' . DB_DATABASE . ' < %s </b> %s');
define('TEXT_INFO_RESTORE_LOCAL', 'No interrumpa el proceso de restauraci�n.<br><br>�Cuanto m�s grande sea la copia de seguridad, m�s tardar� este proceso!');
define('TEXT_INFO_RESTORE_LOCAL_RAW_FILE', 'El archivo subido debe ser de texto.');
define('TEXT_INFO_DATE', 'Fecha:');
define('TEXT_INFO_SIZE', 'Tama�o:');
define('TEXT_INFO_COMPRESSION', 'Compresi�n:');
define('TEXT_INFO_USE_GZIP', 'Usar GZIP');
define('TEXT_INFO_USE_ZIP', 'Usar ZIP');
define('TEXT_INFO_USE_NO_COMPRESSION', 'Sin compresi�n (directamente SQL)');
define('TEXT_INFO_DOWNLOAD_ONLY', 'Descargar s�lo (no guardar en el servidor)');
define('TEXT_INFO_BEST_THROUGH_HTTPS', 'Preferiblemente con una conexi�n segura HTTPS');
define('TEXT_DELETE_INTRO', '�Seguro que quiere eliminar esta copia de seguridad?');
define('TEXT_NO_EXTENSION', 'Ninguna');
define('TEXT_BACKUP_DIRECTORY', 'Directorio para copias de seguridad:');
define('TEXT_LAST_RESTORATION', '�ltima restauraci�n:');
define('TEXT_FORGET', '(<u>descartar</u>)');

define('ERROR_BACKUP_DIRECTORY_DOES_NOT_EXIST', 'Error: No existe el directorio de copias de seguridad. Por favor ind�quelo en configure.php');
define('ERROR_BACKUP_DIRECTORY_NOT_WRITEABLE', 'Error: No hay permiso de escritura en el directorio de copias de seguridad.');
define('ERROR_DOWNLOAD_LINK_NOT_ACCEPTABLE', 'Error: No se aceptan enlaces.');

define('SUCCESS_LAST_RESTORE_CLEARED', 'OK: La fecha de �ltima restauraci�n ha sido borrada.');
define('SUCCESS_DATABASE_SAVED', 'OK: Se ha guardado la base de datos.');
define('SUCCESS_DATABASE_RESTORED', 'OK: Se ha restaurado la base de datos.');
define('SUCCESS_BACKUP_DELETED', 'OK: Se ha eliminado la copia de seguridad.');

define('BYTES', ' bytes');
?>
