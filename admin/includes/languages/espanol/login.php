<?php
/*
  $Id: login.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Login');
define('HEADING_TITLE', 'Bienvenido, por favor reg�strese');

define('HEADING_RETURNING_ADMIN', 'Panel de registro:');
define('HEADING_PASSWORD_FORGOTTEN', 'Contrase�a olvidada:');
define('TEXT_RETURNING_ADMIN', '�S�lo para personal!');
define('ENTRY_EMAIL_ADDRESS', 'Direcci�n de e-mail:');
define('ENTRY_PASSWORD', 'Contrase�a:');
define('ENTRY_FIRSTNAME', 'Nombre:');
define('IMAGE_BUTTON_LOGIN', 'Enviar');

define('TEXT_PASSWORD_FORGOTTEN', '�Ha olvidado la contrase�a?');

define('TEXT_LOGIN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> �Nombre de usuario y/o contrase�a incorrectos!');
define('TEXT_FORGOTTEN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> �Nombre y contrase�a no coinciden!');
define('TEXT_FORGOTTEN_FAIL', 'Lo ha intentado 3 veces. Por razones de seguridad, por favor contace con el administrador para conseguir una contrase�a nueva.<br>&nbsp;<br>&nbsp;');
define('TEXT_FORGOTTEN_SUCCESS', 'La contrase�a nueva ha sido enviada a su direcci�n de email. Por favor compruebe su email y pulse atr�s para volver a intentarlo.<br>&nbsp;<br>&nbsp;');

define('ADMIN_EMAIL_SUBJECT', 'Contrase�a nueva'); 
define('ADMIN_EMAIL_TEXT', 'Hola %s,' . "\n\n" . 'Puedes acceder al panel de administraci�n con la siguiente contrase�a. Una vez acceda al panel de administraci�n, �por favor, cambie su contrase�a!' . "\n\n" . 'Sitio : %s' . "\n" . 'Usuario: %s' . "\n" . 'Contrase�a: %s' . "\n\n" . 'Gracias!' . "\n" . '%s' . "\n\n" . 'Esta es una respuesta autom�tica, �por favor no intente responder!'); 
?>
