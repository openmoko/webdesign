<?php
/*
  $Id: popup_infobox_help.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Ayuda Infobox');
define('TEXT_INFO_HEADING_NEW_INFOBOX', 'Ayuda Infobox');
define('TEXT_INFOBOX_HELP_FILENAME', 'Representa el nombre del archivo de panel que ha colocado en su carpeta de <u>catalog/includes/boxes</u>.<br><br> Debe ser en minúsculas, puede tener espacios en vez de usar subrayados (_)<br><br>Por ejemplo:<br>Si su nueva Infobox se llama <b>nuevo_panel.php</b>, escribiría aquí "<b> nuevo panel</b>".<br><br>Otro ejemplo sería el del panel <b>whats_new</b>.<br> Obviamente el archivo se llama <b>whats_new.php </b>, pero podría escribir aquí <b>what\'s new</b>');
define('TEXT_INFOBOX_HELP_HEADING', 'Esto es lo que se va a ver sobre el panel en su catálogo.<br><div align="center"><img border="0" src="images/help1.gif"><br></div>');
define('TEXT_INFOBOX_HELP_DEFINE', 'Un ejemplo para esto podría ser: <b>BOX_HEADING_WHATS_NEW</b>.<br> Esto sería utilizado en el flujo principal de la tienda como: <b> define(\'BOX_HEADING_WHATS_NEW\', \'What\'s New?\');</b><br><br> Si abre el archivo <u>catalog/includes/languages/english.php</u> podrá ver cantidad de ejemplos, los que contienen BOX_HEADING ya no son necesarios, ya que ahora están almacenados en la base de datos y definidos en los archivos <b>column_left.php</b> y <b>column_right.php</b>.<br>¡Aunque no hay necesidad de borralos!');
define('TEXT_INFOBOX_HELP_COLUMN', 'Seleccione <b>izquierda</b> o <b>derecha</b><br> para que el panel se muestre en la columna izquierda o la derecha.<br><br>Por defecto se muestra en la <b>izquierda</b>');
define('TEXT_INFOBOX_HELP_POSITION', 'Se espera que introduzca un número. Cuanto más alto sea el número, más abajo aparecerá el panel en la columna seleccionada.<br><br> Si introduce el mismo número para más de un panel, se mostrarán en orden alfabético.<br><br>Si no aporta ningún número, entonces se mostrará el panel en orden alfabético.');
define('TEXT_INFOBOX_HELP_ACTIVE', 'Seleccione <b>sí</b> o <b>no</b> para mostrar (si) o no mostrar (no) el panel.<br><br>El valor por defecto es <b>sí</b>');
define('TEXT_INFOBOX_HELP_TEMPLATE', 'Debe representar el nombre de archivo del panel, donde están ubicadas las funciones para sus paneles. Si tiene un archivo especial para su función, debe estar en <u>catalog/templates/(nombre de la plantilla)/boxes.tpl.php</u> <br><br> Debe estar en minúsculas.<br><br>Por ejemplo:<br>Su nuevo archivo de función de plantilla de panel es estándar, ponga <b>infobox</b> y utilizará las funciones estándar. Si utiliza funciones especiales para su panel, ponga <b>box.tpl.php</b> aquí y ponga el archivo en <u>catalog/templates/(nombre de la plantilla)/boxes.tpl.php</u>.');
define('TEXT_INFOBOX_HELP_COLOR', 'Puede utilizar la carta de colores para seleccionar el color para el tipo de letra utilizado en las cabeceras de los paneles, <br> Simplemente pulse sobre el color y el código de color correpondiente aparecerá en el texto..');
define('TEXT_CLOSE_WINDOW', '<u>Cerrar ventana</u> [x]');

?>
