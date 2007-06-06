<?php
/*
  $Id: links_submit.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Acoplamiento');
define('NAVBAR_TITLE_2', 'Someta un Acomplamiento');

define('HEADING_TITLE', 'Informacion del Acomplamiento');

define('TEXT_MAIN', 'Favor de llenar la siguiente forma para sometir a su website.');

define('EMAIL_SUBJECT', 'Bien venido a' . STORE_NAME . ' Intercambio del Acoplamiento.');
define('EMAIL_GREET_NONE', 'Querido %s' . "\n\n");
define('EMAIL_WELCOME', 'Nosotros le damos la bien venida <b>' . STORE_NAME . '</b> Programa de acoplamiento y intercambio.' . "\n\n");
define('EMAIL_TEXT', 'Su acoplamiento ha sido submitido con exito ' . STORE_NAME . '. El sera agregado a nuestro listado tan pronto cuando el sea aprovado. Uster recibira un email en referencia con el estado de su submittal. Si usted no lo ha recibido dentro de las proximas 48 horas, Porfavor contacte nos antes de someter su acoplamiento otra vez.' . "\n\n");
define('EMAIL_CONTACT', 'Para la ayuda dentro de nuestro programa de intercambio del acoplamiento, Porfavor email al dueno de la tienda: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> Esta direccion del email fue proporcionada a nosotros cuando su acoplamiento fue sometido. Si usted tiene problemas, favor de enviar un email to ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_OWNER_SUBJECT', 'Acoplamiento submitido at ' . STORE_NAME);
define('EMAIL_OWNER_TEXT', 'An nuevo acoplamiento fue submitido al ' . STORE_NAME . '. Si el no ha sido aprovado. por favor de verificar que el acoplamiento este activo.' . "\n\n");

define('TEXT_LINKS_HELP_LINK', '&nbsp;Help&nbsp;[?]');

define('HEADING_LINKS_HELP', 'Links Help');
define('TEXT_LINKS_HELP', '<b>Titulo del Sitio:</b> Un descriptive titulo para su website.<br><br><b>URL:</b> La  absoluta direccion de su website, incluyendo las \'http://\'.<br><br><b>Categorias:</b> las mas appopiadas categorias bajo dela cual su website caiga.<br><br><b>Description:</b> Una breve escripcion de su website.<br><br><b>Image URL:</b> La absoluta URL de la image que usted desea submitir, incluyendo el \'http://\'. Esta image sera exibida junto con su website acoplamiento.<br>Eg: http://your-domain.com/path/to/your/image.gif <br><br><b>Full Name:</b> Su Nombre Completo.<br><br><b>Email:</b> La direccion de su email. Por favor entre un email valido, Usted sera notificado via email.<br><br><b>Reciprocal Page:</b> El absolute URL del acoplamiento de su pagina, adonde el acoplamiento a nuestra website sera mencionado/displayed.<br>Eg: http://your-domain.com/path/to/your/links_page.php');
define('TEXT_CLOSE_WINDOW', '<u>Close Window</u> [x]');

// VJ todo - move to common language file
define('CATEGORY_WEBSITE', 'Detalles del Website');
define('CATEGORY_RECIPROCAL', 'Detalles Reciprocal de la Pagina');

define('ENTRY_LINKS_TITLE', 'Titulo del Sitio:');
define('ENTRY_LINKS_TITLE_ERROR', 'El Titulo del acoplamiento debe de contener un minimo de ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_TITLE_TEXT', '*');
define('ENTRY_LINKS_URL', 'URL:');
define('ENTRY_LINKS_URL_ERROR', 'URL debe de contener un minimo de ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_URL_TEXT', '*');
define('ENTRY_LINKS_CATEGORY', 'Categoria:');
define('ENTRY_LINKS_CATEGORY_TEXT', '*');
define('ENTRY_LINKS_DESCRIPTION', 'Descripcion:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'Descripcion debe de contener un minimo de ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_DESCRIPTION_TEXT', '*');
define('ENTRY_LINKS_IMAGE', 'Image URL:');
define('ENTRY_LINKS_IMAGE_TEXT', '');
define('ENTRY_LINKS_CONTACT_NAME', 'Nombre completo:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Su Nombre completo debe de contener un minimo de ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_CONTACT_NAME_TEXT', '*');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Reciprocal Pagina:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'Reciprocal pagina debe de contener un minimo de ' . ENTRY_LINKS_URL_MIN_LENGTH . ' characters.');
define('ENTRY_LINKS_RECIPROCAL_URL_TEXT', '*');
?>
