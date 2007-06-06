<?php
/*
  $Id: links.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Enlaces');
define('HEADING_TITLE_SEARCH', 'Buscar:');

define('TABLE_HEADING_TITLE', 'Título');
define('TABLE_HEADING_URL', 'URL');
define('TABLE_HEADING_CLICKS', 'Clicks');
define('TABLE_HEADING_STATUS', 'Estado');
define('TABLE_HEADING_ACTION', 'Acción');

define('TEXT_INFO_HEADING_DELETE_LINK', 'Eliminar enlace');
define('TEXT_INFO_HEADING_CHECK_LINK', 'Comprobar enlace');

define('TEXT_DELETE_INTRO', '¿Está seguro de que quiere eliminar este enlace?');

define('TEXT_INFO_LINK_CHECK_RESULT', 'Resultado de la comprobación del enlace:');
define('TEXT_INFO_LINK_CHECK_FOUND', 'Encontrado');
define('TEXT_INFO_LINK_CHECK_NOT_FOUND', 'No encontrado');
define('TEXT_INFO_LINK_CHECK_ERROR', 'Error leyendo la URL');


define('TEXT_INFO_LINK_STATUS', 'Estado:');
define('TEXT_INFO_LINK_CATEGORY', 'Categoría:');
define('TEXT_INFO_LINK_CONTACT_NAME', 'Nombre del contacto:');
define('TEXT_INFO_LINK_CONTACT_EMAIL', 'Email del contacto:');
define('TEXT_INFO_LINK_CLICK_COUNT', 'Clicks:');
define('TEXT_INFO_LINK_DESCRIPTION', 'Descripción:');
define('TEXT_DATE_LINK_CREATED', 'Fecha de creación:');
define('TEXT_DATE_LINK_LAST_MODIFIED', 'Última modificación:');
define('TEXT_IMAGE_NONEXISTENT', 'LA IMAGEN NO EXISTE');

define('EMAIL_SEPARATOR', '------------------------------------------------------');
define('EMAIL_TEXT_SUBJECT', 'Actualización del estado del enlace');
define('EMAIL_TEXT_STATUS_UPDATE', 'Estimado %s,' . "\n\n" . 'Se ha actualizado el estado de su enlace a ' . STORE_NAME . '.' . "\n\n" . 'Nuevo estado: %s' . "\n\n" . 'Por favor responda a este email si tiene alguna duda.' . "\n");

// VJ todo - move to common language file
define('CATEGORY_WEBSITE', 'Detalles del sitio Web');
define('CATEGORY_RECIPROCAL', 'Detalles de la página recíproca');
define('CATEGORY_OPTIONS', 'Opciones');

define('ENTRY_LINKS_TITLE', 'Título del sitio:');
define('ENTRY_LINKS_TITLE_ERROR', 'El título del enlace debe tener al menos ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' caracteres.');
define('ENTRY_LINKS_URL', 'URL:');
define('ENTRY_LINKS_URL_ERROR', 'La URL debe tener al menos ' . ENTRY_LINKS_URL_MIN_LENGTH . ' caracteres.');
define('ENTRY_LINKS_CATEGORY', 'Categoría:');
define('ENTRY_LINKS_DESCRIPTION', 'Descripción:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'La descripción debe tener al menos ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' caracteres.');
define('ENTRY_LINKS_IMAGE', 'URL de la imagen:');
define('ENTRY_LINKS_CONTACT_NAME', 'Nombre completo:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Su nombre completo debe tener al menos  ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' caracteres.');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Página recíproca:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'La página recíproca debe tener al menos ' . ENTRY_LINKS_URL_MIN_LENGTH . ' caracteres.');
define('ENTRY_LINKS_STATUS', 'Estado:');
define('ENTRY_LINKS_NOTIFY_CONTACT', 'Contacto de notificación:');
define('ENTRY_LINKS_RATING', 'Clasificación:');
define('ENTRY_LINKS_RATING_ERROR', 'La clasificación no debe estar vacía.');

define('TEXT_DISPLAY_NUMBER_OF_LINKS', 'Mostrando desde <b>%d</b> a <b>%d</b> (de <b>%d</b> enlaces)');

define('IMAGE_NEW_LINK', 'Nuevo enlace');
define('IMAGE_CHECK_LINK', 'Comprobar enlace');
define('ALL', 'All');
define('LINKS_MANAGER_CHECKED_LINKS', 'Links Manager - Checked Links');
define('ASC', 'Asc');
define('DESC', 'Desc');
define('START_AT', 'Start at:');
define('HOW_MANY', 'How many?');
?>
