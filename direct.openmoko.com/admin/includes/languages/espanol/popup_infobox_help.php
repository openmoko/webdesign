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
define('TEXT_INFOBOX_HELP_FILENAME', 'Representa el nombre del archivo de panel que ha colocado en su carpeta de <u>catalog/includes/boxes</u>.<br><br> Debe ser en min�sculas, puede tener espacios en vez de usar subrayados (_)<br><br>Por ejemplo:<br>Si su nueva Infobox se llama <b>nuevo_panel.php</b>, escribir�a aqu� "<b> nuevo panel</b>".<br><br>Otro ejemplo ser�a el del panel <b>whats_new</b>.<br> Obviamente el archivo se llama <b>whats_new.php </b>, pero podr�a escribir aqu� <b>what\'s new</b>');
define('TEXT_INFOBOX_HELP_HEADING', 'Esto es lo que se va a ver sobre el panel en su cat�logo.<br><div align="center"><img border="0" src="images/help1.gif"><br></div>');
define('TEXT_INFOBOX_HELP_DEFINE', 'Un ejemplo para esto podr�a ser: <b>BOX_HEADING_WHATS_NEW</b>.<br> Esto ser�a utilizado en el flujo principal de la tienda como: <b> define(\'BOX_HEADING_WHATS_NEW\', \'What\'s New?\');</b><br><br> Si abre el archivo <u>catalog/includes/languages/english.php</u> podr� ver cantidad de ejemplos, los que contienen BOX_HEADING ya no son necesarios, ya que ahora est�n almacenados en la base de datos y definidos en los archivos <b>column_left.php</b> y <b>column_right.php</b>.<br>�Aunque no hay necesidad de borralos!');
define('TEXT_INFOBOX_HELP_COLUMN', 'Seleccione <b>izquierda</b> o <b>derecha</b><br> para que el panel se muestre en la columna izquierda o la derecha.<br><br>Por defecto se muestra en la <b>izquierda</b>');
define('TEXT_INFOBOX_HELP_POSITION', 'Se espera que introduzca un n�mero. Cuanto m�s alto sea el n�mero, m�s abajo aparecer� el panel en la columna seleccionada.<br><br> Si introduce el mismo n�mero para m�s de un panel, se mostrar�n en orden alfab�tico.<br><br>Si no aporta ning�n n�mero, entonces se mostrar� el panel en orden alfab�tico.');
define('TEXT_INFOBOX_HELP_ACTIVE', 'Seleccione <b>s�</b> o <b>no</b> para mostrar (si) o no mostrar (no) el panel.<br><br>El valor por defecto es <b>s�</b>');
define('TEXT_INFOBOX_HELP_TEMPLATE', 'Debe representar el nombre de archivo del panel, donde est�n ubicadas las funciones para sus paneles. Si tiene un archivo especial para su funci�n, debe estar en <u>catalog/templates/(nombre de la plantilla)/boxes.tpl.php</u> <br><br> Debe estar en min�sculas.<br><br>Por ejemplo:<br>Su nuevo archivo de funci�n de plantilla de panel es est�ndar, ponga <b>infobox</b> y utilizar� las funciones est�ndar. Si utiliza funciones especiales para su panel, ponga <b>box.tpl.php</b> aqu� y ponga el archivo en <u>catalog/templates/(nombre de la plantilla)/boxes.tpl.php</u>.');
define('TEXT_INFOBOX_HELP_COLOR', 'Puede utilizar la carta de colores para seleccionar el color para el tipo de letra utilizado en las cabeceras de los paneles, <br> Simplemente pulse sobre el color y el c�digo de color correpondiente aparecer� en el texto..');
define('TEXT_CLOSE_WINDOW', '<u>Cerrar ventana</u> [x]');

?>
