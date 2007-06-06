<?php
/*
  $Id: admin_account.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Cuenta de administración');

define('TABLE_HEADING_ACCOUNT', 'Mi cuenta');

define('TEXT_INFO_FULLNAME', '<b>Nombre completo: </b>');
define('TEXT_INFO_FIRSTNAME', '<b>Nombre: </b>');
define('TEXT_INFO_LASTNAME', '<b>Apellidos: </b>');
define('TEXT_INFO_EMAIL', '<b>Dirección de email: </b>');
define('TEXT_INFO_PASSWORD', '<b>Contraseña: </b>');
define('TEXT_INFO_PASSWORD_HIDDEN', '-Oculto-');
define('TEXT_INFO_PASSWORD_CONFIRM', '<b>Confirmar contraseña: </b>');
define('TEXT_INFO_CREATED', '<b>Cuenta creada: </b>');
define('TEXT_INFO_LOGDATE', '<b>Último acceso: </b>');
define('TEXT_INFO_LOGNUM', '<b>Número de log: </b>');
define('TEXT_INFO_GROUP', '<b>Nivel de grupo: </b>');
define('TEXT_INFO_ERROR', '<font color="red">¡Esta dirección de email ya existe aquí! Inténtelo de nuevo.</font>');
define('TEXT_INFO_MODIFIED', 'Modificado: ');

define('TEXT_INFO_HEADING_DEFAULT', 'Editar cuenta ');
define('TEXT_INFO_HEADING_CONFIRM_PASSWORD', 'Confirmación de contraseña ');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD', 'Contraseña:');
define('TEXT_INFO_INTRO_CONFIRM_PASSWORD_ERROR', '<font color="red"><b>ERROR:</b> ¡contraseña incorrecta!</font>');
define('TEXT_INFO_INTRO_DEFAULT', 'Pulse el <b>botón de edición</b> debajo para hacer cambios en su cuenta.');
define('TEXT_INFO_INTRO_DEFAULT_FIRST_TIME', '<br><b>ATENCIÓN:</b><br>Hola <b>%s</b>, esta es la primera vez que accede aquí. ¡Le recomendamos cambiar su contraseña!');
define('TEXT_INFO_INTRO_DEFAULT_FIRST', '<br><b>ATENCIÓN:</b><br>Hola <b>%s</b>, le recomendamos que cambie su email (<font color="red">admin@localhost</font>) y contraseña');
define('TEXT_INFO_INTRO_EDIT_PROCESS', 'Todos los campos son necesarios. Pulse en guardar para enviar.');

define('JS_ALERT_FIRSTNAME',        '- Necesario: Nombre \n');
define('JS_ALERT_LASTNAME',         '- Necesario: Apellidos \n');
define('JS_ALERT_EMAIL',            '- Necesario: Dirección de email \n');
define('JS_ALERT_PASSWORD',         '- Necesario: Contraseña \n');
define('JS_ALERT_FIRSTNAME_LENGTH', '- La longitud del nombre debe ser mayor de ');
define('JS_ALERT_LASTNAME_LENGTH',  '- La longitud de los apellidos debe ser mayor de ');
define('JS_ALERT_PASSWORD_LENGTH',  '- La longitud de la contraseña debe ser mayor de ');
define('JS_ALERT_EMAIL_FORMAT',     '- ¡El formato de la dirección de email no es valido! \n');
define('JS_ALERT_EMAIL_USED',       '- ¡La dirección de email ya se esta utilizando! \n');
define('JS_ALERT_PASSWORD_CONFIRM', '- ¡Se ha confundido en el campo de comprobación de contraseña! \n');

define('ADMIN_EMAIL_SUBJECT', 'Cambio de la información personal');
define('ADMIN_EMAIL_TEXT', 'Hola %s,' . "\n\n" . 'Su información personal, pudiendo incluír su contraseña, ha sido cambiada.  ¡Si esto se ha hecho sin su conocimiento o consentimiento por favor contacte con el administrador inmediatamente!' . "\n\n" . 'Página : %s' . "\n" . 'Nombre: %s' . "\n" . 'Contraseña: %s' . "\n\n" . '¡Gracias!' . "\n" . '%s' . "\n\n" . '¡Esa es una respuesta automatizada, por favor no la responda!');

define('JS_ALERT_FIRSTNAME_1','- Firstname length must over ');
define('JS_ALERT_LASTNAME_1','- Firstname length must over ');
define('JS_ALERT_ERROR','The following error(s) occurred:');


?>
