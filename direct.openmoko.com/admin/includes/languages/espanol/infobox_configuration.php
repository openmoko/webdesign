<?php
/*
  $Id: infobox_configuration.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
define('HEADING_TITLE', 'Creación, actualización y visualización de paneles informativos');
define('TABLE_HEADING_INFOBOX_FILE_NAME', 'Título');
define('TABLE_HEADING_ACTIVE', '¿Activar el panel?');
define('TABLE_HEADING_KEY', 'Definir el encabezado del panel');
define('TABLE_HEADING_ACTION', 'Acción');
define('TABLE_HEADING_COLUMN', 'Ajustar columnas');
define('TABLE_HEADING_SORT_ORDER', 'Posición');
define('TABLE_HEADING_TEMPLATE', 'Plantilla para el panel');
define('TABLE_HEADING_FONT_COLOR', 'Color del texto');
define('TABLE_HEADING_BOX_DIRECTORY', 'Location of boxes for this template: ');
define('TEXT_INFO_EDIT_INTRO', 'Por favor, haga los cambios necesarios');
define('TEXT_INFO_DATE_ADDED', 'Fecha añadido:');
define('TEXT_INFO_LAST_MODIFIED', 'Última modificación:');
define('TEXT_INFO_HEADING_NEW_INFOBOX', 'Crear un nuevo panel');
define('TEXT_INFO_INSERT_INTRO', 'Se ha seleccionado el panel<b> what\'s_new.php</b>');
define('TEXT_INFO_DELETE_INTRO', '<P STYLE="color: red; font-weight: bold;">Confirme si quiere eliminar el panel');
define('TEXT_INFO_HEADING_DELETE_INFOBOX', '¿Eliminar el panel?');
define('TEXT_INFO_HEADING_UPDATE_INFOBOX', 'Actualizar el panel');
define('IMAGE_INFOBOX_STATUS_UP', 'Arriba');
define('IMAGE_ICON_STATUS_UP_LIGHT', 'Mover ariba');
define('IMAGE_INFOBOX_STATUS_down', 'Abajo');
define('IMAGE_ICON_STATUS_DOWN_LIGHT', 'Mover abajo');
define('IMAGE_INFOBOX_STATUS_GREEN', 'Izquierda');
define('IMAGE_INFOBOX_STATUS_GREEN_LIGHT', 'Ajustar izquierda');
define('IMAGE_INFOBOX_STATUS_RED', 'Derecha');
define('IMAGE_INFOBOX_STATUS_RED_LIGHT', 'Ajustar derecha');
define('BOX_HEADING_BOXES', 'Administración de paneles');
define('TEXT_HEADING_SET_ACTIVE', '¿Activar este panel? ');
define('TEXT_HEADING_DEFINE_KEY', '  Clave de definición ');
define('TEXT_HEADING_WHAT_POS', '¿Qué posición? ');
define('TEXT_HEADING_WHICH_TEMPLATE', '¿Qué plantilla? ');
define('TEXT_HEADING_HEADING', 'El encabezado del panel ');
define('TEXT_HEADING_WHICH_COL', '¿Qué columna? ');
define('TEXT_HEADING_FILENAME', 'Archivo ');
define('TEXT_HEADING_FONT_COLOR', 'Color del texto del encabezado ');
define('TEXT_NOTE_REQUIRED', '* Campo obligatorio');
define('JS_BOX_HEADING', '* La \'Clave de definición\' es necesaria. Por ejemplo: BOX_HEADING_WHATS_NEW');
define('JS_INFO_BOX_HEADING', '* El \'Encabezado de panel\' es necesario.');
define('JS_BOX_LOCATION', '* Debe designar una columna para mostrar el panel');
define('JS_INFO_BOX_FILENAME', '* Debe seleccionar un nombre de archivo para su panel');
define('JS_BOX_COLOR', '* Seleccionar por favor un color para el color de la fuente.');
define('TEXT_INFO_MESSAGE_COUNT_1', '<br>Actualmente hay <br>');
define('TEXT_INFO_MESSAGE_COUNT_2', ' paneles activos en la columna izquierda y <br>');
define('TEXT_INFO_MESSAGE_COUNT_3', ' paneles activos en la columna derecha');
//error messages
define('infobox_error1', 'Esta plantilla no contiene ningún panel para instalar. Por favor sitúe los paneles que quiera instalar en la carpeta de paneles de esta plantilla');
define('infobox_error2', 'ATENCIÓN: No hay ningún panel seleccionado en la columna IZQUIERDA');
define('infobox_error3', 'ATENCIÓN: No hay ningún panel seleccionado en la columna DERECHA');

define('INFOBOX_ACTIVE_BOXES', ' active boxes in the right column');

?>
