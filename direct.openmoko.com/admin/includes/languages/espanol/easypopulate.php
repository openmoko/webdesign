<?php
/*
  $Id: easypopulate.php,v 1.4 2004/09/21  zip1 Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Configuraci�n de Easy Populate');
define('EASY_VERSION_A', 'Easy Populate Avanzado ');
define('EASY_VERSION_B', 'Easy Populate B�sico ');
define('EASY_EXPORT', ' Export');
define('EASY_IMPORT', ' Import');
define('EASY_VER_A', ' 3.01');
define('EASY_VER_B', ' 3.01');
define('EASY_DEFAULT_LANGUAGE', '  -  Idioma por defecto ');
define('EASY_UPLOAD_FILE', 'Se ha subido el archivo. ');
define('EASY_UPLOAD_TEMP', 'Nombre para archivo temporal: ');
define('EASY_UPLOAD_USER_FILE', 'Nombre del archivo del usuario: ');
define('EASY_SIZE', 'Tama�o: ');
define('EASY_FILENAME', 'Nombre de archivo: ');
define('EASY_SPLIT_DOWN', 'Puede descargar sus archivos divididos en Tools/Files bajo /temp/');
define('EASY_UPLOAD_EP_FILE', 'Subir un archivo EP para importar');
define('EASY_SPLIT_EP_FILE', 'Subir y dividir un archivo EP');
define('EASY_SPLIT_EP_LOCAL', 'Split a EP File on the server');

define('TEXT_IMPORT_TEMP', 'Importar los datos del archivo en %s');
define('TEXT_INSERT_INTO_DB', 'Insertar en la base de datos');
define('TEXT_SELECT_ONE', 'Seleccionar un archivo EP para importar');
define('TEXT_SELECT_TWO', 'Select a EP File for Splitting');

define('TEXT_SPLIT_FILE', 'Seleccionar un archivo EP');
define('TEXT_SPLIT', 'Split a EP File');

define('EASY_LABEL_CREATE', 'Crear un archivo de exportaci�n');
define('EASY_LABEL_CREATE_SELECT', 'Seleccionar el m�todo para guardar el archivo de exportaci�n');
define('EASY_LABEL_CREATE_SAVE', 'Guardar como archivo temporal en el servidor');
define('EASY_LABEL_SELECT_DOWN', 'Seleccionar los campos para descarga');
define('EASY_LABEL_SORT', 'Seleccionar el campo para ordenar');
define('EASY_LABEL_PRODUCT_RANGE', 'Limitar por ID de productos');
define('EASY_LABEL_LIMIT_CAT', 'Limitar por categor�a');
define('EASY_LABEL_LIMIT_MAN', 'Limitar por fabricante');

define('EASY_LABEL_PRODUCT_AVAIL', 'Rango disponible: ');
define('EASY_LABEL_PRODUCT_TO', ' a ');
define('EASY_LABEL_PRODUCT_RECORDS', '    N�mero total de registros: ');
define('EASY_LABEL_PRODUCT_BEGIN', 'comienza: ');
define('EASY_LABEL_PRODUCT_END', 'termina: ');
define('EASY_LABEL_PRODUCT_START', 'Comenzar la creaci�n del archivo ');

define('EASY_FILE_LOCATE', 'Puede encontrar su archivo en Tools/Files bajo ');
define('EASY_FILE_LOCATE2', ' pulsando este enlace y llendo al gestor de archivos');

define('EASY_FILE_LOCATE_2', ' by clicking this Link and going to the file manager');
define('EASY_FILE_RETURN', ' Puede volver a EP pulsando este enlace.');
define('EASY_IMPORT_TEMP_DIR', 'Importar desde la carpeta Temp ');
define('EASY_LABEL_DOWNLOAD', 'Descarga');
define('EASY_LABEL_COMPLETE', 'Completa');
define('EASY_LABEL_TAB', 'archivo .txt delimitado por tabuladores para editar');
define('EASY_LABEL_MPQ', 'Modelo/Precio/Cant.');
define('EASY_LABEL_EP_MC', 'Modelo/Categor�a');

define('EASY_LABEL_EP_ATTRIB', 'Atributos');
define('EASY_LABEL_NONE', 'Ninguno');
define('EASY_LABEL_CATEGORY', 'Primer nombre de categor�a');
define('PULL_DOWN_MANUFACTURES', 'Fabricantes');
define('EASY_LABEL_PRODUCT', 'N�mero de ID de producto');
define('EASY_LABEL_MANUFACTURE', 'N�mero de Id de fabricante');
define('EASY_LABEL_EP_MA', 'Modelo/Atributos');
define('EASY_LABEL_EP_FR_TITLE', 'Crear archivos EP o Froogle en la carpeta Temp ');
define('EASY_LABEL_EP_DOWN_TAB', 'Crear un archivo .txt delimitado por comas <b>Completo</b> en la carpeta Temp');
define('EASY_LABEL_EP_DOWN_MPQ', 'Crear un archivo .txt delimitado por comas con <b>Modelo/Precio/Cant.</b> en la carpeta Temp');
define('EASY_LABEL_EP_DOWN_MC', 'Crear un archivo .txt delimitado por comas con <b>Modelo/Categor�a</b> en la carpeta Temp');
define('EASY_LABEL_EP_DOWN_MA', 'Crear un archivo .txt delimitado por comas <b>Modelo/Atributos</b> en la carpeta Temp');
define('EASY_LABEL_EP_LIMIT', 'Limit number of products to Export');
define('EASY_LABEL_NEW_PRODUCT',  "<font color='green'>�Producto nuevo!</font><br>");
define('EASY_LABEL_UPDATED', "<font color='black'> Actualizado</font><br>");
define('EASY_LABEL_DELETE_STATUS_1', "<font color='red'> ��Eliminando el producto ");
define('EASY_LABEL_DELETE_STATUS_2', " de la base de datos!!</font><br>");
define('EASY_LABEL_LINE_COUNT_1', 'A�adidos ');
define('EASY_LABEL_LINE_COUNT_2', 'registros y cerrando el archivo... ');
define('EASY_LABEL_FILE_COUNT_1A', 'Creando archivo EPA_Split ');
define('EASY_LABEL_FILE_COUNT_1B', 'Creando archivo EPB_Split ');
define('EASY_LABEL_FILE_COUNT_2', '.txt ...  ');
define('EASY_LABEL_FILE_CLOSE_1', 'A�adidos ');
define('EASY_LABEL_FILE_CLOSE_2', ' registros y cerando el archivo...');
define('EASY_LABEL_FILE_INSERT_LOCAL', 'Inserting local file: ');
define('TEXT_INFO_TIMER', 'Script timer:');
define('TEXT_INFO_SECOND', 'seconds.');

//errormessages
define('EASY_ERROR_1', 'Es extra�o, pero no hay ning�n idioma por defecto para trabajar... Esto no deber�a ocurrir, s�lo por si acaso... ');
define('EASY_ERROR_2', '... �ERROR! - Demasiados caracteres en el n�mero del modelo.<br>
      25 es el m�ximo en una instalaci�n est�ndar de CRE.<br>
      Su longitud m�xima de modelo de producto asignada es de ');
define('EASY_ERROR_2A', ' <br>Puede hacer sus c�digos de modelo m�s peque�os o incrementar el tama�o del campo en la base de datos.</font>');
define('EASY_ERROR_2B',  "<font color='red'>");
define('EASY_ERROR_3', '<p class=smallText>No hay campo de products_id en el registro. Esta l�nea no se ha importado <br><br>');
define('EASY_ERROR_4', '<font color=red>ERROR - v_customer_group_id y v_customer_price deben de ir en pareja</font>');
define('EASY_ERROR_5', '</b><font color=red>ERROR - Est� intentando utilizar un archivo creado con EP Advanced, por favor int�ntelo con Easy Populate Advanced </font>');
define('EASY_ERROR_5a', '<font color=red><b><u>  Pulse aqu� para volver a Easy Populate Basic </u></b></font>');
define('EASY_ERROR_6', '</b><font color=red>ERROR - Est� intentando usar un archivo creado con EP Basic, por favor int�ntelo con Easy Populate Basic </font>');
define('EASY_ERROR_6a', '<font color=red><b><u>  Pulse aqu� para volver a Easy Populate Advanced </u></b></font>');
define('EASY_ERROR_7', '<p class=smallText> Error 07 - No Module field in record or it is the last line in the file. This line was not imported. <br><br>');

// Eversun mod for Easy Populate Products Options, Values and Attributes
define('EASY_VERSION_C', 'Easy Populate Options');
define('EASY_LABEL_OPTIONS_ID', 'Options ID');
define('EASY_LABEL_OPTIONS_NAME', 'Options Name');
define('EASY_VERSION_D', 'Easy Populate Values');
define('EASY_LABEL_VALUES_ID', 'Values ID');
define('EASY_LABEL_VALUES_NAME', 'Values Name');
define('EASY_VERSION_E', 'Easy Populate Attributes');
define('TEXT_SELECT_ONE_OPTIONS', 'Select a EP Option File for Import');
define('TEXT_SELECT_ONE_VALUES', 'Select a EP Values File for Import');
define('TEXT_SELECT_ONE_ATTRIBUTES', 'Select a EP Attributes File for Import');
define('EASY_ERROR_8', '<b><font color=red>Error - You didn\'t select any file</font></b>');
define('EASY_INFO_SUCCESS', '<b><font color=red>Import Success</font></b>');
define('EASY_INFO_FILE_NOT_FOUND', '<b><font color=red>File not Found</font></b>');
define('EASY_INFO_CHECK_ERROR1', '<b><font color=red>Field %s not in the table %s.</font></b>');
// Eversun mod end for Easy Populate Products Options, Values and Attributes
?>
