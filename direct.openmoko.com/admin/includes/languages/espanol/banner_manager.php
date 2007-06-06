<?php
/*
  $Id: banner_manager.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Gestor de Banners');

define('TABLE_HEADING_BANNERS', 'Banners');
define('TABLE_HEADING_GROUPS', 'Grupos');
define('TABLE_HEADING_STATISTICS', 'Mostrados / Clicks');
define('TABLE_HEADING_STATUS', 'Estado');
define('TABLE_HEADING_ACTION', 'Acción');

define('TEXT_BANNERS_TITLE', 'Título:');
define('TEXT_BANNERS_URL', 'URL del banner:');
define('TEXT_BANNERS_GROUP', 'Grupo del banner:');
define('TEXT_BANNERS_NEW_GROUP', ', o introduzca un grupo nuevo');
define('TEXT_BANNERS_IMAGE', 'Imagen:');
define('TEXT_BANNERS_IMAGE_LOCAL', ', o introduzca un archivo local');
define('TEXT_BANNERS_IMAGE_TARGET', 'Destino de la imagen (Grabar en):');
define('TEXT_BANNERS_HTML_TEXT', 'Texto HTML:');
define('TEXT_BANNERS_EXPIRES_ON', 'Caduca el:');
define('TEXT_BANNERS_OR_AT', ', o tras');
define('TEXT_BANNERS_IMPRESSIONS', 'impresiones/vistas.');
define('TEXT_BANNERS_SCHEDULED_AT', 'Programado para:');
define('TEXT_BANNERS_BANNER_NOTE', '<b>Notas sobre el banner:</b><ul><li>Use una imagen o texto HTML para el banner - no ambos.</li><li>El texto HTML tiene prioridad sobre una imagen</li></ul>');
define('TEXT_BANNERS_INSERT_NOTE', '<b>Notas sobre la imagen:</b><ul><li>¡El directorio donde suba la imagen debe de tener configurados los permisos de escritura necesarios!</li><li>No rellene el campo \'Grabar en\' si no va a subir una imagen al servidor (por ejemplo, cuando use una imagen ya existente en el servidor).</li><li>El campo \'Grabar en\' debe de ser un directorio que exista y terminado en una barra (por ejemplo: banners/).</li></ul>');
define('TEXT_BANNERS_EXPIRCY_NOTE', '<b>Notas sobre la caducidad:</b><ul><li>Sólo se debe de rellenar uno de los dos campos</li><li>Si el banner no debe de caducar no rellene ninguno de los campos</li></ul>');
define('TEXT_BANNERS_SCHEDULE_NOTE', '<b>Notas sobre la programación:</b><ul><li>Si se configura una fecha de programación el banner se activará en esa fecha.</li><li>Todos los banners programados se marcan como inactivos hasta que llegue su fecha, cuando se marcan activos.</li></ul>');

define('TEXT_BANNERS_DATE_ADDED', 'Añadido el:');
define('TEXT_BANNERS_SCHEDULED_AT_DATE', 'Programado para: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_DATE', 'Caduca el: <b>%s</b>');
define('TEXT_BANNERS_EXPIRES_AT_IMPRESSIONS', 'Caduca tras: <b>%s</b> vistas');
define('TEXT_BANNERS_STATUS_CHANGE', 'Cambio estado: %s');

define('TEXT_BANNERS_DATA', 'D<br>A<br>T<br>O<br>S');
define('TEXT_BANNERS_LAST_3_DAYS', 'Últimos 3 días');
define('TEXT_BANNERS_BANNER_VIEWS', 'Vistas');
define('TEXT_BANNERS_BANNER_CLICKS', 'Clicks');

define('TEXT_INFO_DELETE_INTRO', '¿Seguro que quiere eliminar este banner?');
define('TEXT_INFO_DELETE_IMAGE', 'Borrar imagen');

define('SUCCESS_BANNER_INSERTED', 'OK: Se ha añadido el banner.');
define('SUCCESS_BANNER_UPDATED', 'OK: Se ha actualizado el banner.');
define('SUCCESS_BANNER_REMOVED', 'OK: Se ha eliminado el banner.');
define('SUCCESS_BANNER_STATUS_UPDATED', 'OK: El estado del banner se ha actualizado.');

define('ERROR_BANNER_TITLE_REQUIRED', 'Error: Es necesario el título del banner.');
define('ERROR_BANNER_GROUP_REQUIRED', 'Error: Es necesario el grupo del banner.');
define('ERROR_IMAGE_DIRECTORY_DOES_NOT_EXIST', 'Error: No existe el directorio destino: %s');
define('ERROR_IMAGE_DIRECTORY_NOT_WRITEABLE', 'Error: No se puede escribir en el directorio destino: %s');
define('ERROR_IMAGE_DOES_NOT_EXIST', 'Error: No existe imagen.');
define('ERROR_IMAGE_IS_NOT_WRITEABLE', 'Error: No se puede eliminar la imagen.');
define('ERROR_UNKNOWN_STATUS_FLAG', 'Error: Bandera de estado desconocida.');

define('ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST', 'Error: No existe el directorio de gráficos. Por favor cree un directorio llamado \'graphs\' dentro de \'images\'.');
define('ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE', 'Error: No se puede escribir en el directorio de gráficos.');

define('DATE_FORMAT', '(dd/mm/yyyy)');

?>
