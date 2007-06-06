<?php
/*
  $Id: admin_members.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

if ($HTTP_GET_VARS['gID']) {
  define('HEADING_TITLE', 'Administrar grupos');
} elseif ($HTTP_GET_VARS['gPath']) {
  define('HEADING_TITLE', 'Definir grupos');
} else {
  define('HEADING_TITLE', 'Administrar miembros');
}

define('TEXT_COUNT_GROUPS', 'Grupos: ');

define('TABLE_HEADING_NAME', 'Nombre');
define('TABLE_HEADING_EMAIL', 'Direcci�n de email');
define('TABLE_HEADING_PASSWORD', 'Contrase�a');
define('TABLE_HEADING_CONFIRM', 'Confirmar contrase�a');
define('TABLE_HEADING_GROUPS', 'Nivel de grupos');
define('TABLE_HEADING_CREATED', 'Cuenta creada');
define('TABLE_HEADING_MODIFIED', 'Cuenta modificada');
define('TABLE_HEADING_LOGDATE', '�ltimo acceso');
define('TABLE_HEADING_LOGNUM', 'LogNum');
define('TABLE_HEADING_LOG_NUM', 'N�mero de log');
define('TABLE_HEADING_ACTION', 'Acci�n');

define('TABLE_HEADING_GROUPS_NAME', 'Nombre de grupos');
define('TABLE_HEADING_GROUPS_DEFINE', 'Selecci�n de paneles y archivos');
define('TABLE_HEADING_GROUPS_GROUP', 'Nivel');
define('TABLE_HEADING_GROUPS_CATEGORIES', 'Permisos de las categor�as');


define('TEXT_INFO_HEADING_DEFAULT', 'Miembro administrador ');
define('TEXT_INFO_HEADING_DELETE', 'Permiso para borrar ');
define('TEXT_INFO_HEADING_EDIT', 'Editar categor�a / ');
define('TEXT_INFO_HEADING_NEW', 'Nuevo miembro administrador ');

define('TEXT_INFO_DEFAULT_INTRO', 'Grupo de miembros');
define('TEXT_INFO_DELETE_INTRO', '�Eliminar a <nobr><b>%s</b></nobr> de <nobr>los miembros administradores?</nobr>');
define('TEXT_INFO_DELETE_INTRO_NOT', '�No puede elimiar el <nobr>grupo %s!</nobr>');
define('TEXT_INFO_EDIT_INTRO', 'Fijar el nivel de permisos aqu�: ');

define('TEXT_INFO_FULLNAME', 'Nombre completo: ');
define('TEXT_INFO_FIRSTNAME', 'Nombre: ');
define('TEXT_INFO_LASTNAME', 'Apellidos: ');
define('TEXT_INFO_EMAIL', 'Direcci�n de email: ');
define('TEXT_INFO_PASSWORD', 'Contrase�a: ');
define('TEXT_INFO_CONFIRM', 'Confirmar contrase�a: ');
define('TEXT_INFO_CREATED', 'Cuenta creada: ');
define('TEXT_INFO_MODIFIED', 'Cuenta modificada: ');
define('TEXT_INFO_LOGDATE', '�ltimo acceso: ');
define('TEXT_INFO_LOGNUM', 'N�mero de log: ');
define('TEXT_INFO_GROUP', 'Nivel de grupo: ');
define('TEXT_INFO_ERROR', '<font color="red">�La direcci�n de email ya esta siendo utilizada! Por favor int�ntelo de nuevo.</font>');

define('JS_ALERT_FIRSTNAME', '- Necesario: Nombre \n');
define('JS_ALERT_LASTNAME', '- Necesario: Apellidos \n');
define('JS_ALERT_EMAIL', '- Necesario: Direcci�n de email \n');
define('JS_ALERT_EMAIL_FORMAT', '- �El formato de la direcci�n de email no es v�lido! \n');
define('JS_ALERT_EMAIL_USED', '- �La direcci�n de email ya esta en uso! \n');
define('JS_ALERT_LEVEL', '- Necesario: Miembro de grupo \n');

define('ADMIN_EMAIL_SUBJECT', 'Nuevo miembro de administraci�n');
define('ADMIN_EMAIL_TEXT', 'Hola %s,' . "\n\n" . 'Puedes acceder al panel de administraci�n con la siguiente contrase�a. Una vez que accedas al panel, �por favor cambia la contrase�a!' . "\n\n" . 'Sitio : %s' . "\n" . 'Usuario: %s' . "\n" . 'Contrase�a: %s' . "\n\n" . 'Gracias!' . "\n" . '%s' . "\n\n" . '�Esta es una respuesta automatizada, por favor no responda ya que no valdr�a de nada!'); 
define('ADMIN_EMAIL_EDIT_SUBJECT', 'Editar perfil de miembro de administraci�n');
define('ADMIN_EMAIL_EDIT_TEXT', 'Hola %s,' . "\n\n" . 'Tu informaci�n personal ha sido actualizada por un administrador.' . "\n\n" . 'Sitio : %s' . "\n" . 'Usuario: %s' . "\n" . 'Contrase�a: %s' . "\n\n" . 'Gracias!' . "\n" . '%s' . "\n\n" . '�Esta es una respuesta automatizada, por favor no responda ya que no valdr�a de nada!'); 

define('TEXT_INFO_HEADING_DEFAULT_GROUPS', 'Administrar grupos ');
define('TEXT_INFO_HEADING_DELETE_GROUPS', 'Eliminar grupos ');

define('TEXT_INFO_DEFAULT_GROUPS_INTRO', '<b>NOTA:</b><li><b>Editar:</b> editar el nombre del grupo.</li><li><b>Eliminar:</b> eliminar el grupo.</li><li><b>Definir:</b> definir el nivel de aceso del grupo.</li>');
define('TEXT_INFO_DELETE_GROUPS_INTRO', 'Tambi�n se borrar�n los miembros del grupo. �Esta seguro de querer eliminar el <nobr><b>grupo %s</b> ?</nobr>');
define('TEXT_INFO_DELETE_GROUPS_INTRO_NOT', '�No puede eliminar estos grupos!');
define('TEXT_INFO_GROUPS_INTRO', 'De un nombre �nico para el grupo. Pulse siguiente para enviar.');

define('TEXT_INFO_HEADING_GROUPS', 'Nuevo grupo');
define('TEXT_INFO_GROUPS_NAME', ' <b>Nombre del grupo:</b><br>De un nombre �nico para el grupo. Entonces pulse siguiente para enviar.<br>');
define('TEXT_INFO_GROUPS_NAME_FALSE', '<font color="red"><b>ERROR:</b> �El nombre del grupo debe tener al menos 5 caracteres!</font>');
define('TEXT_INFO_GROUPS_NAME_USED', '<font color="red"><b>ERROR:</b> �El nombre ya esta en uso!</font>');
define('TEXT_INFO_GROUPS_LEVEL', 'Nivel del grupo: ');
define('TEXT_INFO_GROUPS_BOXES', '<b>Permisos de paneles:</b><br>Dar acceso a los paneles seleccionados.');
define('TEXT_INFO_GROUPS_BOXES_INCLUDE', 'Los archivos include estan almacenados en: ');

define('TEXT_INFO_EDIT_GROUP_INTRO', 'Editar el nombre del grupo: ');

define('TEXT_INFO_HEADING_DEFINE', 'Definir grupo');
if ($HTTP_GET_VARS['gPath'] == 1) {
  define('TEXT_INFO_DEFINE_INTRO', '<b>%s :</b><br>No puede cambiar los permisos de archivos de este grupo.<br><br>');
} else {
  define('TEXT_INFO_DEFINE_INTRO', '<b>%s :</b><br>Cambiar los permisos de este grupo seleccionando o deseleccionando los paneles y archivos que aparecen. Pulse <b>Guardar</b> para guardar los cambios.<br><br>');
}
?>
