<?php
/*
  $Id: create_account_process.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/
define('NAVBAR_TITLE', 'Crear una cuenta');
define('HEADING_TITLE', 'Información de la cuenta');
define('HEADING_NEW', 'Proceso de pedidos');
define('NAVBAR_NEW_TITLE', 'Proceso de pedidos');

define('EMAIL_SUBJECT', 'Bienvenidos a ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Estimado Sr. ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Estimada Sra. ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Estimado ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'Sea bienvenido a <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Ahora puede utilizar <b>varios servicios</b> que hemos preparado para usted. Estos servicios incluyen:' . "\n\n" . '<li><b>Carrito permanente</b> - Cualquier producto que añada a su carrito online permanecerá en él hasta que lo elimine, o haga su pedido.' . "\n" . '<li><b>Libreta de direcciones</b> - ¡Ahora podemos enviarle sus productos a una dirección distinta de la suya! Esto es perfecto para enviar regalos de cumpleaños directamente a la persona indicada.' . "\n" . '<li><b>Histórico de pedidos</b> - Vea un registro histórico de las compras que ha realizaco con nosotros.' . "\n" . '<li><b>Comentarios de productos</b> - Intercambie sus opiniones con los demás clientes.' . "\n\n");
define('EMAIL_CONTACT', 'Para ayuda con cualquiera de nuestros servicios online, por favor envíele un mensaje al administrador: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Nota:</b> Esta dirección de correo ha llegado a nuestras manos a través de otro cliente. Si no inició un proceso para abrir una cuenta con nosotros, por favor envíe un email a ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_PASS_1', 'Su contraseña para esta cuenta es ');
define('EMAIL_PASS_2', ', guárdela en lugar seguro. (Nota importante: La contraseña es sensible a mayúsculas y minúsculas.)');


?>
