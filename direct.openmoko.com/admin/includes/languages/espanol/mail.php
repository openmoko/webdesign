<?php
/*
  $Id: mail.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Enviar email a clientes');

define('TEXT_CUSTOMER', 'Cliente:');
define('TEXT_SUBJECT', 'Asunto:');
define('TEXT_FROM', 'De:');
define('TEXT_MESSAGE', 'Mensaje:');
define('TEXT_SELECT_CUSTOMER', 'Seleccionar cliente');
define('TEXT_ALL_CUSTOMERS', 'Todos los clientes');
define('TEXT_NEWSLETTER_CUSTOMERS', 'A todos los suscriptores del bolet�n de noticias');

define('NOTICE_EMAIL_SENT_TO', 'Nota: Email enviado a: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Error: No ha seleccionado ning�n cliente.');
// MaxiDVD Added Line For WYSIWYG HTML Area: BOF
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">El bot�n de ATRAS est� DESACTIVADO mientras el editor HTML WYSIWYG est� ACTIVADO.</b></font> �POR QU�? - Porque si pulsa el bot�n ATRAS para editar su email HTML, el PHP (php.ini - "Magic Quotes = On") a�adir� autom�ticamente "\\\\\\\" en todos los lugares donde aparezcan comillas dobles " (El HTML las utiliza para enlaces, im�genes y m�s) y esto distorsionar� el c�digo HTML, las im�genes desaparecer�n una vez que env�e el email de nuevo. Si DESCONECTA el editor WYSIWYG en Admin, la compatibilidad HTML de osCommerce tambi�n se DESCONECTA y el bot�n de ATRAS volver� a aparecer. Ser�a bueno si alguien encuentra una soluci�n para este problema del HTML y PHP.<br><br><b>Si realmente necesita previsualizar sus emails antes de enviarlos, utilice el bot�n de PREVIEW del editor WYSIWYG.<br><HR>');
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">�El HTML est� DESCONECTADO!</b></font><br><br>Si quiere enviar un email HTML, active el editor WYSIWYG para email en: Admin-->Configuraci�n-->Editor WYSIWYG-->Opciones<br>');
// MaxiDVD Added Line For WYSIWYG HTML Area: EOF

// Contact US Email Subject DMG
define('TEXT_EMAIL_SUBJECTS', '* select a subject *');
define('EMAIL_SUBJECT', 'Message from ' . STORE_NAME. ': ');
?>
