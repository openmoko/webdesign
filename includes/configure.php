<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require_once '../openmoko_config-inc.php';
require_once '../openmoko_common-inc.php';

// Define the webserver and path parameters
// * DIR_FS_* = Filesystem directories (local/physical)
// * DIR_WS_* = Webserver directories (virtual/URL)
  define('HTTP_SERVER',			'http://'.OPENMOKO_SHOP_HOST); // eg, http://localhost - should not be empty for productive servers
  define('HTTPS_SERVER',		'https://'.OPENMOKO_SHOP_HOST); // eg, https://localhost - should not be empty for productive servers
  define('ENABLE_SSL',			true); // secure webserver for checkout procedure?
  define('HTTP_COOKIE_DOMAIN',		OPENMOKO_SHOP_HOST);
  define('HTTPS_COOKIE_DOMAIN',		OPENMOKO_SHOP_HOST);
  define('HTTP_COOKIE_PATH',		OPENMOKO_SHOP_WS_PATH.'/');
  define('HTTPS_COOKIE_PATH',		OPENMOKO_SHOP_WS_PATH.'/');
  define('DIR_WS_HTTP_CATALOG',		OPENMOKO_SHOP_WS_PATH.'/');
  define('DIR_WS_HTTPS_CATALOG',	OPENMOKO_SHOP_WS_PATH.'/');
  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_ICONS', DIR_WS_IMAGES . 'icons/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');

//Added for BTS1.0
  define('DIR_WS_TEMPLATES', 'templates/');
  define('DIR_WS_CONTENT', DIR_WS_TEMPLATES . 'content/');
  define('DIR_WS_JAVASCRIPT', DIR_WS_INCLUDES . 'javascript/');
//End BTS1.0
  define('DIR_WS_DOWNLOAD_PUBLIC', 'pub/');
  define('DIR_FS_CATALOG',		OPENMOKO_SHOP_FS_PATH);
  define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
  define('DIR_FS_DOWNLOAD_PUBLIC', DIR_FS_CATALOG . 'pub/');

// define our database connection
  define('DB_SERVER',		OPENMOKO_SHOP_DB_HOST); // eg, localhost - should not be empty for productive servers
  define('DB_SERVER_USERNAME',	OPENMOKO_SHOP_DB_USER);
  define('DB_SERVER_PASSWORD',	OPENMOKO_SHOP_DB_PASSWD);
  define('DB_DATABASE',		OPENMOKO_SHOP_DB_NAME);
  define('USE_PCONNECT', 'true'); // use persistent connections?
  define('STORE_SESSIONS', ''); // leave empty '' for default handler or set to 'mysql'
?>