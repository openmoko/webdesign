<?php
/*
  $Id: admin_account.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Cuenta de administraci�n');

define('TABLE_HEADING_ACCOUNT', 'Mi cuenta');

define('TEXT_INFO_FULLNAME', '<b>Nombre completo: </b>');
define('TEXT_INFO_FIRSTNAME', '<b>Nombre: </b>');
define('TEXT_INFO_LASTNAME', '<b>Apellidos: </b>');
define('TEXT_INFO_EMAIL', '<b>Direcci�n de email: </b>');
define('TEXT_INFO_PASSWORD', '<b>Contrase�a: </b>');
define('TEXT_INFO_PASSWORD_HIDDEN', '-Oculto-');
define('TEXT_INFO_PASSWORD_CONFIRM', '<b>Confirmar contrase�a: </b>');
define('TEXT_INFO_CREATED', '<b>Cuenta creada: </b>');
define('TEXT_INFO_LOGDATE', '<b>�ltimo acceso: </b>');
define('TEXT_INFO_LOGNUM', '<b>N�mero de log: </b>');
define('TEXT_INFO_GROUP', '<b>Nivel de grupo: </b>');
define('TEXT_INFO_ERROR', '<font color="red">�Esta direcci�n de email ya existe aqu�! Int�ntelo de nuevo.</font>');
define('TEXT_INFO_MODIFIED', 'Modificado: ');

define('TEXT_INFO_HEADING_DEFAULT', 'Editar cuenta ');
define('TEXT_INFO_HEADING_CONFIRM_PASSWORD', 'Confirmaci�n de contrase�a ');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD', 'Contrase�a:');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD_ERROR', '<font color="red"><b>ERROR:</b> �contrase�a incorrecta!</font>');
define('TEXT_INFO_INTRO_DEFAULT', 'Pulse el <b>bot�n de edici�n</b> debajo para hacer cambios en su cuenta.');
define('TEXT_INFO_INTRO_DEFAULT_FIRST_TIME', '<br><b>ATENCI�N:</b><br>Hola <b>%s</b>, esta es la primera vez que accede aqu�. �Le recomendamos cambiar su contrase�a!');
define('TEXT_INFO_INTRO_DEFAULT_FIRST', '<br><b>ATENCI�N:</b><br>Hola <b>%s</b>, le recomendamos que cambie su email (<font color="red">admin@localhost</font>) y contrase�a');
define('TEXT_INFO_INTRO_EDIT_PROCESS', 'Todos los campos son necesarios. Pulse en guardar para enviar.');

define('JS_ALERT_FIRSTNAME',        '- Necesario: Nombre \n');
define('JS_ALERT_LASTNAME',         '- Necesario: Apellidos \n');
define('JS_ALERT_EMAIL',            '- Necesario: Direcci�n de email \n');
define('JS_ALERT_PASSWORD',         '- Necesario: Contrase�a \n');
define('JS_ALERT_FIRSTNAME_LENGTH', '- La longitud del nombre debe ser mayor de ');
define('JS_ALERT_LASTNAME_LENGTH',  '- La longitud de los apellidos debe ser mayor de ');
define('JS_ALERT_PASSWORD_LENGTH',  '- La longitud de la contrase�a debe ser mayor de ');
define('JS_ALERT_EMAIL_FORMAT',     '- �El formato de la direcci�n de email no es valido! \n');
define('JS_ALERT_EMAIL_USED',       '- �La direcci�n de email ya se esta utilizando! \n');
define('JS_ALERT_PASSWORD_CONFIRM', '- �Se ha confundido en el campo de comprobaci�n de contrase�a! \n');

define('ADMIN_EMAIL_SUBJECT', 'Cambio de la informaci�n personal');
define('ADMIN_EMAIL_TEXT', 'Hola %s,' . "\n\n" . 'Su informaci�n personal, pudiendo inclu�r su contrase�a, ha sido cambiada.  �Si esto se ha hecho sin su conocimiento o consentimiento por favor contacte con el administrador inmediatamente!' . "\n\n" . 'P�gina : %s' . "\n" . 'Nombre: %s' . "\n" . 'Contrase�a: %s' . "\n\n" . '�Gracias!' . "\n" . '%s' . "\n\n" . '�Esa es una respuesta automatizada, por favor no la responda!');

define('JS_ALERT_FIRSTNAME_1','- Firstname length must over ');
define('JS_ALERT_LASTNAME_1','- Firstname length must over ');
define('JS_ALERT_ERROR','The following error(s) occurred:');


?>
