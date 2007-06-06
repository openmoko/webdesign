<?php
/*
  $Id: stats_monthly_sales.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Ventas mensuales/Resumen de impuestos');
define('HEADING_TITLE_STATUS','Estado');
define('HEADING_TITLE_REPORTED','Informado');
define('TEXT_DETAIL','Detalle');
define('TEXT_ALL_ORDERS', 'Todos los pedidos');
define('TEXT_NOTHING_FOUND', 'No se ha encontrado nada en esta fecha/selecci�n');
define('TEXT_BUTTON_REPORT_BACK','Atr�s');
define('TEXT_BUTTON_REPORT_INVERT','Invertir');
define('TEXT_BUTTON_REPORT_PRINT','Imprimir');
define('TEXT_BUTTON_REPORT_HELP','Ayuda');
define('TEXT_BUTTON_REPORT_SAVE','Guardar CSV');
define('TEXT_BUTTON_REPORT_BACK_DESC', 'Volver a resumen por meses');
define('TEXT_BUTTON_REPORT_INVERT_DESC', 'Invertir las filas de arriba a abajo');
define('TEXT_BUTTON_REPORT_PRINT_DESC', 'Mostrar el informe en formato imprimible');
define('TEXT_BUTTON_REPORT_HELP_DESC', 'Sobre este informe y c�mo utilizar sus posibilidades');
define('TEXT_BUTTON_REPORT_GET_DETAIL', 'Pulsar para ver un informe diario de este mes');
define('TEXT_REPORT_DATE_FORMAT', 'j M Y -   g:i a'); // date format string
//  as specified in php manual here: http://www.php.net/manual/en/function.date.php

define('TABLE_HEADING_YEAR','A�o');
define('TABLE_HEADING_MONTH', 'Mes');
define('TABLE_HEADING_DAY', 'D�as');
define('TABLE_HEADING_INCOME', 'Ingresos<br> brutos');
define('TABLE_HEADING_SALES', 'Ventas de<br> productos');
define('TABLE_HEADING_NONTAXED', 'Ventas<br> exentas');
define('TABLE_HEADING_TAXED', 'Ventas<br> sujetas a impuestos');
define('TABLE_HEADING_TAX_COLL', 'Impuestos<br> pagados');
define('TABLE_HEADING_SHIPHNDL', 'Portes<br> & Manipulaci�n');
define('TABLE_HEADING_SHIP_TAX', 'Tax on<br /> Shipping');
define('TABLE_HEADING_LOWORDER', 'Pagos <br> menores');
define('TABLE_HEADING_OTHER', 'Cheques<br> regalo');  // could be any other extra class value
define('TABLE_FOOTER_YTD','YTD');
define('TABLE_FOOTER_YEAR','A�O');
define('TEXT_HELP', '<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title>Ventas mensuales/Resumen de impuestos</title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
</head>
<BODY>
<center>
<table width="95%"><tr><td>
<p class="main" align="center">
<b>Como ver y utilizar el informe de ingresos de la tienda</b>
<p class="main" align="justify">
<b>Informes mensuales de la tienda</b>
<p class="smallText" align="justify">
Cuando se selecciona desde el men� de informes, este informe muestra un resumen financiero de todos los pedidos en la base de datos de la tienda, por meses.  Cada mes en el hist�rico de la tienda se totaliza en un fila, mostrando los beneficios y sus componentes, y listando las cantidades de impuestos, cargos por portes y manipulaci�n, peque�os pagos y cheques regalo. (Si la tienda no tiene activados los cheques regalo o los peque�os gastos, se omiten estas columnas.) Se informa de las actividades a fecha de compra.
<p class="smallText" align="justify">
La fila superior es el mes en curso, y las filas siguientes totalizan el hist�rico de pedidos de cada mes.  Bajo las filas de cada a�o del calendario hay una l�nea al pie, resumiendo los totales de ese a�o en cada columna del informe.
<p class="smallText" align="justify">
Para invertir el orden de las filas, pulse el bot�n "Invertir".
<p class="main" align="justify">
<b>Informe de resumen mensual por d�as</b>
<p class="smallText" align="justify">
El resumen de la actividad diaria dentro de cada mes se puede ver pulsando en el nombre del mes, a la izquierda de la fila.  Para volver al resumen diario desde el resumen mensual, pulse el bot�n de "Atr�s" en la pantalla de diario.
<p class="main" align="justify">
<b>Qu� representan las columnas (explicaci�n de las cabeceras)</b>
<p class="smallText" align="justify">
A la izquierda, se muestran el mes y el a�o de cada fila.  Las otras columnas son, de izquierda a derecha:
<ul><li class="smallText"><b>Ingresos brutos</b> - total de todos los pedidos
<li class="smallText"><b>Subtotal de pedidos</b> - Ventas totales de productos comprados en el mes
<br>Entonces, las ventas de productos est�n partidas en dos categor�as:
<li class="smallText"><b>Ventas exentas de impuestos</b> - el subtotal de las ventas exentas de impuestos, y
<li class="smallText"><b>Ventas con impuestos</b> - el subtotal de las ventas con impuestos
<li class="smallText"><b>Impuestos cobrados</b> - cantidad ingresada de los clientes por impuestos
<li class="smallText"><b>Portes & Manipulaci�n</b> - el total cobrado en concepto de portes y manipulaci�n
<li class="smallText"><b>Peque�os gastos</b> y <b>Cheques regalo</b> - si la tienda tiene activados los peque�os gastos, y/o los cheques regalos, se muestran los totales en columnas separadas
<li class="smallText"><b>Low order fees</b> and <b>Gift Vouchers</b> - if the store has low order fees enabled, and/or gift vouchers, the totals of these are shown in separate columns
</ul>
<p class="main" align="justify">
<b>Seleccionar informe resumen por estado</b>
<p class="smallText" align="justify">
Para mostrar el resumen de informaci�n diaria o mensual para s�lo un estado de pedidos, seleccionar el estado en el selector arriba a la derecha de la ventana de informes.  Dependiendo de los ajustes en la tienda para estos valores, puede haber estados para "Pendiente" o "Enviado" por ejemplo.  Si el estado cambia el informe ser� recalculado y mostrado.
<p class="main" align="justify">
<b>Mostrar los impuestos en detalle</b>
<p class="smallText" align="justify">
La cantidad del impuesto en cualquier fila del informe es un enlace a una ventana nueva, que mostrar� el nombre de los tipos de impuesto cargados y sus cantidades individuales.
<p class="main" align="justify">
<b>Imprimir el informe</b>
<p class="smallText" align="justify">
Para ver el informe en formato imprimible, pulse en el bot�n de "Imprimir", utilice entonces el comando imprimir de su navegador en el men� de Archivo.  Se a�aden encabezados y el nombre de la tienda para mostrar qu� pedidos est�n seleccionados, y cuando se gener� el informe.
<p class="main" align="justify">
<b>Guardar los valores del informe en un archivo</b>
<p class="smallText" align="justify">
Para guardar los valores del informe en un archivo local, pulse el bot�n de "Guardar CSV" en la parte baja del informe.  Los valores del informe se enviar�n al navegador en un archivo de texto, y se le preguntar� d�nde quiere guardarlo.  Los contenidos del archivo est�n en formato de valores separados por comas (CSV), con una l�nea por cada fila del informe comenzando con el encabezado, y cada valor en la fila est� separado por comas. Este archivo se puede importar de forma conveniente en aplicaciones de hoja de c�lculo o estad�stica, como Excel y QuattroPro. El archivo se sirve al navegador con un nombre de archivo que proviene del nombre del informe, estado seleccionado, y la fecha y hora. <br><br>
<p class="smallText">v 2.1.1
</td></tr>
</table>
</BODY>
</HTML>');
?>
