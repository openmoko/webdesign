<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once '../../openmoko_config-inc.php';
require_once '../../openmoko_common-inc.php';

// Define the webserver and path parameters
// * DIR_FS_* = Filesystem directories (local/physical)
// * DIR_WS_* = Webserver directories (virtual/URL)
  define('HTTP_SERVER',			'http://'.OPENMOKO_SHOP_HOST); // eg, http://localhost - should not be empty for productive servers
  define('HTTPS_SERVER',		'https://'.OPENMOKO_SHOP_HOST); // eg, https://localhost - should not be empty for productive servers
  define('HTTP_CATALOG_SERVER',		'http://'.OPENMOKO_SHOP_HOST);
  define('HTTPS_CATALOG_SERVER',	'https://'.OPENMOKO_SHOP_HOST);
  define('HTTPS_ADMIN_SERVER', '');
  define('HTTP_COOKIE_DOMAIN',		OPENMOKO_SHOP_HOST);
  define('HTTPS_COOKIE_DOMAIN',		OPENMOKO_SHOP_HOST);
  define('HTTP_COOKIE_PATH',		OPENMOKO_SHOP_WS_PATH.'/');
  define('HTTPS_COOKIE_PATH',		OPENMOKO_SHOP_WS_PATH.'/');
  define('ENABLE_SSL',			'true'); // secure webserver for checkout procedure?
  define('ENABLE_SSL_CATALOG',		'true'); // secure webserver for catalog module
  define('DIR_WS_HTTP_ADMIN',		OPENMOKO_SHOP_WS_PATH.'/admin/');
  define('DIR_WS_HTTPS_ADMIN',		OPENMOKO_SHOP_WS_PATH.'/admin/');
  define('DIR_FS_DOCUMENT_ROOT',	OPENMOKO_SHOP_FS_PATH.'/'); // where the pages are located on the server
  define('DIR_FS_ADMIN',		OPENMOKO_SHOP_FS_PATH.'/admin/'); // absolute path required
  define('DIR_WS_CATALOG',		OPENMOKO_SHOP_WS_PATH.'/'); // absolute path required
  define('DIR_WS_HTTP_CATALOG',		OPENMOKO_SHOP_WS_PATH);
  define('DIR_WS_HTTPS_CATALOG',	OPENMOKO_SHOP_WS_PATH);
  define('DIR_FS_CATALOG',		OPENMOKO_SHOP_FS_PATH.'/'); // absolute path required
  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_ICONS', DIR_WS_IMAGES . 'icons/');
  define('DIR_WS_CATALOG_IMAGES', DIR_WS_CATALOG . 'images/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');
  define('DIR_WS_CATALOG_LANGUAGES', DIR_WS_CATALOG . 'includes/languages/');
  define('DIR_FS_CATALOG_LANGUAGES', DIR_FS_CATALOG . 'includes/languages/');
  define('DIR_FS_CATALOG_IMAGES', DIR_FS_CATALOG . 'images/');
  define('DIR_FS_CATALOG_MODULES', DIR_FS_CATALOG . 'includes/modules/');
  define('DIR_FS_BACKUP', DIR_FS_ADMIN . 'backups/');

// Added for Templating
  define('DIR_FS_CATALOG_MAINPAGE_MODULES', DIR_FS_CATALOG_MODULES . 'mainpage_modules/');
  define('DIR_WS_TEMPLATES', DIR_WS_CATALOG . 'templates/');
  define('DIR_FS_TEMPLATES', DIR_FS_CATALOG . 'templates/');

// define our database connection
  define('DB_SERVER',		OPENMOKO_SHOP_DB_HOST); // eg, localhost - should not be empty for productive servers
  define('DB_SERVER_USERNAME',	OPENMOKO_SHOP_DB_USER);
  define('DB_SERVER_PASSWORD',	OPENMOKO_SHOP_DB_PASSWD);
  define('DB_DATABASE',		OPENMOKO_SHOP_DB_NAME);
  define('USE_PCONNECT', 'true'); // use persisstent connections?
  define('STORE_SESSIONS', ''); // leave empty '' for default handler or set to 'mysql'
?>