<?php
/*
  $Id: application_top.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
//// Added for gzip compression
function compress_output($output) 
{ 
// We can perform additional manipulation on $output here, such  
// as stripping whitespace, etc. 
    return gzencode($output); 
} 

// Check if the browser supports gzip encoding, HTTP_ACCEPT_ENCODING 
if (strstr($HTTP_SERVER_VARS['HTTP_ACCEPT_ENCODING'], 'gzip')) {
 
// Start output buffering, and register compress_output() (see  
// below) 
  ob_start("compress_output");

// Tell the browser the content is compressed with gzip 
header("Content-Encoding: gzip"); 
} 

// End Gzip compression

// Start the clock for the page parse time log
  define('PAGE_PARSE_START_TIME', microtime());

// Set the level of error reporting
  error_reporting(E_ALL & ~E_NOTICE);

// Check if register_globals is enabled.
// Since this is a temporary measure this message is hardcoded. The requirement will be removed before 2.2 is finalized.
  if (function_exists('ini_get')) {
    ini_get('register_globals') or exit('FATAL ERROR: register_globals is disabled in php.ini, please enable it!');
  }

// Set the local configuration parameters - mainly for developers
  if (file_exists('includes/local/configure.php')) include('includes/local/configure.php');

// Include application configuration parameters
  require('includes/configure.php');

// define the project version
include('includes/version.php');

// set the type of request (secure or not)
  $request_type = (getenv('HTTPS') == 'on') ? 'SSL' : 'NONSSL';

// set php_self in the local scope
  if (!isset($PHP_SELF)) $PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];

  if ($request_type == 'NONSSL') {
    define('DIR_WS_ADMIN', DIR_WS_HTTP_ADMIN);
    define('BASE_HREF', HTTP_SERVER . DIR_WS_HTTP_ADMIN);
  } else {
    define('DIR_WS_ADMIN', DIR_WS_HTTPS_ADMIN);
    define('BASE_HREF', HTTPS_SERVER . DIR_WS_HTTPS_ADMIN);
  }
  
  // this is patch up code to support sites with configuration file built
  // before 6.2.08.  The only define was for the DIR_WS_CATALOG
  // the instal routines were updated to provide additional references
  // Values are forced to prevent problems, however this will still be a 
  // problem for sites using shared ssl certificates htat havea different 
  // file names
  if ( !defined('DIR_WS_HTTPS_CATALOG') || !defined('DIR_WS_HTTP_CATALOG') ) {
    define('DIR_WS_HTTPS_CATALOG', DIR_WS_CATALOG);
    define('DIR_WS_HTTP_CATALOG', DIR_WS_CATALOG);
  }

// set php_self in the local scope
  $PHP_SELF = (isset($HTTP_SERVER_VARS['PHP_SELF']) ? $HTTP_SERVER_VARS['PHP_SELF'] : $HTTP_SERVER_VARS['SCRIPT_NAME']);

// Used in the "Backup Manager" to compress backups
  define('LOCAL_EXE_GZIP', '/usr/bin/gzip');
  define('LOCAL_EXE_GUNZIP', '/usr/bin/gunzip');
  define('LOCAL_EXE_ZIP', '/usr/local/bin/zip');
  define('LOCAL_EXE_UNZIP', '/usr/local/bin/unzip');

// include the list of project filenames
  require(DIR_WS_INCLUDES . 'filenames.php');

// include the list of project database tables
  require(DIR_WS_INCLUDES . 'database_tables.php');

//     define('BOX_WIDTH', 125); // how wide the boxes should be in pixels (default: 125)
// define('MENU_DHTML', false);

// Define how do we update currency exchange rates
// Possible values are 'oanda' 'xe' or ''
  define('CURRENCY_SERVER_PRIMARY', 'oanda');
  define('CURRENCY_SERVER_BACKUP', 'xe');

// include the database functions
  require(DIR_WS_FUNCTIONS . 'database.php');

// make a connection to the database... now
  tep_db_connect() or die('Unable to connect to database server!');

// set application wide parameters
  $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
  while ($configuration = tep_db_fetch_array($configuration_query)) {
    define($configuration['cfgKey'], $configuration['cfgValue']);
  }

// define our general functions used application-wide
  require(DIR_WS_FUNCTIONS . 'general.php');

  require(DIR_WS_FUNCTIONS . 'html_output.php');
  
  // initialize the logger class
    require(DIR_WS_CLASSES . 'logger.php');

  
//Admin begin
// set the cookie domain
  $cookie_domain = (($request_type == 'NONSSL') ? HTTP_COOKIE_DOMAIN : HTTPS_COOKIE_DOMAIN);
  $cookie_path = (($request_type == 'NONSSL') ? HTTP_COOKIE_PATH : HTTPS_COOKIE_PATH);
 require(DIR_WS_FUNCTIONS . 'password_funcs.php');
//Admin end


// include shopping cart class
  require(DIR_WS_CLASSES . 'shopping_cart.php');
  
if (PAYMENT_CC_CRYPT == 'True'){
require(DIR_WS_FUNCTIONS . 'crypt.php');
}

// some code to solve compatibility issues
  require(DIR_WS_FUNCTIONS . 'compatibility.php');

// define how the session functions will be used
  require(DIR_WS_FUNCTIONS . 'sessions.php');

// set the session name and save path
  tep_session_name('osCAdminID');
  tep_session_save_path(SESSION_WRITE_DIRECTORY);

// set the session cookie parameters
   session_set_cookie_params(0, $cookie_path, $cookie_domain);
  
// set the session ID if it exists
   if ( isset($_COOKIE[tep_session_name()]) ) {
     tep_session_id($_COOKIE[tep_session_name()]);
   } elseif ( isset($_POST[tep_session_name()]) ) {
     tep_session_id($_POST[tep_session_name()]);
   } elseif ( ($request_type == 'SSL') && isset($_GET[tep_session_name()]) ) {
     tep_session_id($_GET[tep_session_name()]);
   }

// lets start our session
  tep_session_start();
  $session_started = true;
// verify the ssl_session_id if the feature is enabled
  if ( ($request_type == 'SSL') && (SESSION_CHECK_SSL_SESSION_ID == 'True') && (ENABLE_SSL == true) && ($session_started == true) ) {
    $ssl_session_id = getenv('SSL_SESSION_ID');
    if (!tep_session_is_registered('SSL_SESSION_ID')) {
      $SESSION_SSL_ID = $ssl_session_id;
      tep_session_register('SESSION_SSL_ID');
    }

   if ($SESSION_SSL_ID != $ssl_session_id) {
    tep_session_destroy();
      tep_redirect(tep_href_link(FILENAME_SSL_CHECK));
    }
  }


// set the language
  if (!tep_session_is_registered('language') || isset($HTTP_GET_VARS['language'])) {
    if (!tep_session_is_registered('language')) {
      tep_session_register('language');
      tep_session_register('languages_id');
    }

    include(DIR_WS_CLASSES . 'language.php');
    $lng = new language();

    if (isset($HTTP_GET_VARS['language']) && tep_not_null($HTTP_GET_VARS['language'])) {
      $lng->set_language($HTTP_GET_VARS['language']);
    } else {
      $lng->get_browser_language();
    }

    $language = $lng->language['directory'];
    $languages_id = $lng->language['id'];
  }

// include the language translations
  require(DIR_WS_LANGUAGES . $language . '.php');
  $current_page = basename($PHP_SELF);
  if (file_exists(DIR_WS_LANGUAGES . $language . '/' . $current_page)) {
    include(DIR_WS_LANGUAGES . $language . '/' . $current_page);
  }

// currency
  if (!tep_session_is_registered('currency') || isset($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {
    if (!tep_session_is_registered('currency')) tep_session_register('currency');

    if (isset($HTTP_GET_VARS['currency'])) {
      if (!$currency = tep_currency_exists($HTTP_GET_VARS['currency'])) $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } else {
      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    }
  }

// define our localization functions
  require(DIR_WS_FUNCTIONS . 'localization.php');

// Include validation functions (right now only email address)
  require(DIR_WS_FUNCTIONS . 'validations.php');

// setup our boxes
  require(DIR_WS_CLASSES . 'table_block.php');
  require(DIR_WS_CLASSES . 'box.php');

// initialize the message stack for output messages
  require(DIR_WS_CLASSES . 'message_stack.php');
  $messageStack = new messageStack;
// set which precautions should be checked
  define('WARN_INSTALL_EXISTENCE', 'true');
  define('WARN_CONFIG_WRITEABLE', 'true');
  define('WARN_SESSION_DIRECTORY_NOT_WRITEABLE', 'true');
  define('WARN_SESSION_AUTO_START', 'true');
  define('WARN_DOWNLOAD_DIRECTORY_NOT_READABLE', 'true');

// split-page-results
  require(DIR_WS_CLASSES . 'split_page_results.php');

// entry/item info classes
  require(DIR_WS_CLASSES . 'object_info.php');

// email classes
  require(DIR_WS_CLASSES . 'mime.php');
  require(DIR_WS_CLASSES . 'email.php');

// file uploading class
  require(DIR_WS_CLASSES . 'upload.php');

// calculate category path
  if (isset($HTTP_GET_VARS['cPath'])) {
    $cPath = $HTTP_GET_VARS['cPath'];
  } else {
    $cPath = '';
  }

  if (tep_not_null($cPath)) {
    $cPath_array = tep_parse_category_path($cPath);
    $cPath = implode('_', $cPath_array);
    $current_category_id = $cPath_array[(sizeof($cPath_array)-1)];
  } else {
    $current_category_id = 0;
  }

// default open navigation box
  if (!tep_session_is_registered('selected_box')) {
    tep_session_register('selected_box');
 //   $selected_box = 'configuration';
  }
 
  if (isset($HTTP_GET_VARS['selected_box'])) {
    $selected_box = $HTTP_GET_VARS['selected_box'];
  }

  //Cache control system 
//  include(DIR_WS_INCLUDES . 'cache_configure.php');
  $cache_blocks = array(array('title' => TEXT_CACHE_COOLMENU, 'code' => 'coolmenu', 'file' => 'coolmenu-language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_CATEGORIES, 'code' => 'categories', 'file' => 'categories_box-language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_CATEGORIES1, 'code' => 'categories1', 'file' => 'categories1_box-language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_CATEGORIES2, 'code' => 'categories2', 'file' => 'categories2_box-language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_CATEGORIES3, 'code' => 'categories3', 'file' => 'categories3_box-language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_CATEGORIES4, 'code' => 'categories4', 'file' => 'categories4_box-language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_CATEGORIES5, 'code' => 'categories5', 'file' => 'categories5_box-language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_MANUFACTURERS, 'code' => 'manufacturers', 'file' => 'manufacturers_box-TEMPLATE_NAME.language.cache', 'multiple' => true),
                        array('title' => TEXT_CACHE_ALSO_PURCHASED, 'code' => 'also_purchased', 'file' => 'also_purchased-language.cache', 'multiple' => true));


//Admin begin
  if (basename($PHP_SELF) != FILENAME_LOGIN && basename($PHP_SELF) != FILENAME_PASSWORD_FORGOTTEN) {
    tep_admin_check_login();
  }
//Admin end
// Include OSC-AFFILIATE
 require('includes/affiliate_application_top.php');
// include giftvoucher
 REQUIRE(DIR_WS_INCLUDES . 'add_ccgvdc_application_top.php');

// WebMakers.com Added: Includes Functions for Attribute Sorter and Copier
require(DIR_WS_FUNCTIONS . 'attributes_sorter_added_functions.php');


// Article Manager additions DMG

// include the articles functions
  require(DIR_WS_FUNCTIONS . 'articles.php');

// Article Manager
  if (isset($HTTP_GET_VARS['tPath'])) {
    $tPath = $HTTP_GET_VARS['tPath'];
  } else {
    $tPath = '';
  }

  if (tep_not_null($tPath)) {
    $tPath_array = tep_parse_topic_path($tPath);
    $tPath = implode('_', $tPath_array);
    $current_topic_id = $tPath_array[(sizeof($tPath_array)-1)];
  } else {
    $current_topic_id = 0;
  }


if (file_exists('includes/application_top_newsdesk.php'))
        include('includes/application_top_newsdesk.php');

if (file_exists('includes/application_top_faqdesk.php'))
        include('includes/application_top_faqdesk.php');

  
?>
