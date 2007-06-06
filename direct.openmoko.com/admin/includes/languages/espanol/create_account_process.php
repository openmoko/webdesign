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
define('HEADING_TITLE', 'Informaci�n de la cuenta');
define('HEADING_NEW', 'Proceso de pedidos');
define('NAVBAR_NEW_TITLE', 'Proceso de pedidos');

define('EMAIL_SUBJECT', 'Bienvenidos a ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Estimado Sr. ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Estimada Sra. ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Estimado ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'Sea bienvenido a <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Ahora puede utilizar <b>varios servicios</b> que hemos preparado para usted. Estos servicios incluyen:' . "\n\n" . '<li><b>Carrito permanente</b> - Cualquier producto que a�ada a su carrito online permanecer� en �l hasta que lo elimine, o haga su pedido.' . "\n" . '<li><b>Libreta de direcciones</b> - �Ahora podemos enviarle sus productos a una direcci�n distinta de la suya! Esto es perfecto para enviar regalos de cumplea�os directamente a la persona indicada.' . "\n" . '<li><b>Hist�rico de pedidos</b> - Vea un registro hist�rico de las compras que ha realizaco con nosotros.' . "\n" . '<li><b>Comentarios de productos</b> - Intercambie sus opiniones con los dem�s clientes.' . "\n\n");
define('EMAIL_CONTACT', 'Para ayuda con cualquiera de nuestros servicios online, por favor env�ele un mensaje al administrador: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Nota:</b> Esta direcci�n de correo ha llegado a nuestras manos a trav�s de otro cliente. Si no inici� un proceso para abrir una cuenta con nosotros, por favor env�e un email a ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_PASS_1', 'Su contrase�a para esta cuenta es ');
define('EMAIL_PASS_2', ', gu�rdela en lugar seguro. (Nota importante: La contrase�a es sensible a may�sculas y min�sculas.)');


?>
