<?php
/*
  $Id: affiliate_password_forgotten.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  OSC-Affiliate

  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Entrar');
define('NAVBAR_TITLE_2', 'Affiliate Constrase�a Olvidada');
define('HEADING_TITLE', 'He olvidado mi Contrase�a!');
define('TEXT_NO_EMAIL_ADDRESS_FOUND', '<font color="#ff0000"><b>NOTA:</b></font> Ese E-Mail no figura en nuestros datos, intentelo de nuevo.');
define('EMAIL_PASSWORD_REMINDER_SUBJECT', STORE_NAME . ' - Nueva Contrase�a');
define('EMAIL_PASSWORD_REMINDER_BODY', 'Ha solicitado una Nueva Contrase�a desde ' . $REMOTE_ADDR . '.' . "\n\n" . 'Su nueva contrase�a para \'' . STORE_NAME . '\' es:' . "\n\n" . '   %s' . "\n\n");
define('TEXT_PASSWORD_SENT', 'Se Ha Enviado Una Nueva Contrase�a a Tu Email');
?>