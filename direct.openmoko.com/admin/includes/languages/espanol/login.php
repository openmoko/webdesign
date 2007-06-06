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
define('HEADING_TITLE', 'Bienvenido, por favor regístrese');

define('HEADING_RETURNING_ADMIN', 'Panel de registro:');
define('HEADING_PASSWORD_FORGOTTEN', 'Contraseña olvidada:');
define('TEXT_RETURNING_ADMIN', '¡Sólo para personal!');
define('ENTRY_EMAIL_ADDRESS', 'Dirección de e-mail:');
define('ENTRY_PASSWORD', 'Contraseña:');
define('ENTRY_FIRSTNAME', 'Nombre:');
define('IMAGE_BUTTON_LOGIN', 'Enviar');

define('TEXT_PASSWORD_FORGOTTEN', '¿Ha olvidado la contraseña?');

define('TEXT_LOGIN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> ¡Nombre de usuario y/o contraseña incorrectos!');
define('TEXT_FORGOTTEN_ERROR', '<font color="#ff0000"><b>ERROR:</b></font> ¡Nombre y contraseña no coinciden!');
define('TEXT_FORGOTTEN_FAIL', 'Lo ha intentado 3 veces. Por razones de seguridad, por favor contace con el administrador para conseguir una contraseña nueva.<br>&nbsp;<br>&nbsp;');
define('TEXT_FORGOTTEN_SUCCESS', 'La contraseña nueva ha sido enviada a su dirección de email. Por favor compruebe su email y pulse atrás para volver a intentarlo.<br>&nbsp;<br>&nbsp;');

define('ADMIN_EMAIL_SUBJECT', 'Contraseña nueva'); 
define('ADMIN_EMAIL_TEXT', 'Hola %s,' . "\n\n" . 'Puedes acceder al panel de administración con la siguiente contraseña. Una vez acceda al panel de administración, ¡por favor, cambie su contraseña!' . "\n\n" . 'Sitio : %s' . "\n" . 'Usuario: %s' . "\n" . 'Contraseña: %s' . "\n\n" . 'Gracias!' . "\n" . '%s' . "\n\n" . 'Esta es una respuesta automática, ¡por favor no intente responder!'); 
?>
