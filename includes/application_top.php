<?php
/*
  $Id: application_top.php,v 1.1.1.1 2004/03/04 23:40:37 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

// start the timer for the page parse time log
  define('PAGE_PARSE_START_TIME', microtime());
  define('UPS_LOG_FILE','D:/tmp/omshop/upslog.txt');
  define('UPS_ERROR_FILE','D:/tmp/omshop/upserror.txt');

// set the level of error reporting
  error_reporting(E_ALL & ~E_NOTICE);
  //error_reporting(E_ALL);

// check if register_globals is enabled.
// since this is a temporary measure this message is hardcoded. The requirement will be removed before 2.2 is finalized.
  if (function_exists('ini_get')) {
    ini_get('register_globals') or exit('FATAL ERROR: register_globals is disabled in php.ini, please enable it!');
  }

// Set the local configuration parameters - mainly for developers
  if (file_exists('includes/local/configure.php')) include('includes/local/configure.php');

define('TEXT_PREFIX', 'text_');
define('PRODUCTS_OPTIONS_VALUE_TEXT_ID', 4); //Must match id for user defined "TEXT" value in db table TABLE_PRODUCTS_OPTIONS_VALUES

 
// include server parameters
#  require('includes/configure.php');
if (file_exists('includes/configure.php')) {
  require('includes/configure.php');
} else {
  echo '<a href="install/index.php"><b>Proceed to installation</b></a>';
exit();
}
// define the project version
//  define('PROJECT_VERSION', '[CRE Loaded6 v6.1]');
include('includes/version.php');

// set the type of request (secure or not)
  $request_type = (getenv('HTTPS') == 'on') ? 'SSL' : 'NONSSL';

// set php_self in the local scope
  if (!isset($PHP_SELF)) $PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];

  if ($request_type == 'NONSSL') {
    define('DIR_WS_CATALOG', DIR_WS_HTTP_CATALOG);
  } else {
    define('DIR_WS_CATALOG', DIR_WS_HTTPS_CATALOG);
  }

// set php_self in the local scope
  $PHP_SELF = (isset($HTTP_SERVER_VARS['PHP_SELF']) ? $HTTP_SERVER_VARS['PHP_SELF'] : $HTTP_SERVER_VARS['SCRIPT_NAME']);
// include the list of project filenames
  require(DIR_WS_INCLUDES . 'filenames.php');

// include the list of project database tables
  require(DIR_WS_INCLUDES . 'database_tables.php');

// customization for the design layout
//define('BOX_WIDTH', 125); // how wide the boxes should be in pixels (default: 125)

// include the database functions
  require(DIR_WS_FUNCTIONS . 'database.php');

// make a connection to the database... now
  tep_db_connect() or die('Unable to connect to database server!');

// set the application parameters
  $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);
  while ($configuration = tep_db_fetch_array($configuration_query)) {
    define($configuration['cfgKey'], $configuration['cfgValue']);
  }

// if gzip_compression is enabled, start to buffer the output
  if ( (GZIP_COMPRESSION == 'true') && ($ext_zlib_loaded = extension_loaded('zlib')) && (PHP_VERSION >= '4') ) {
    if (($ini_zlib_output_compression = (int)ini_get('zlib.output_compression')) < 1) {
      if (PHP_VERSION >= '4.0.4') {
        ob_start('ob_gzhandler');
      } else {
        include(DIR_WS_FUNCTIONS . 'gzip_compression.php');
        ob_start();
        ob_implicit_flush();
      }
    } else {
      ini_set('zlib.output_compression_level', GZIP_LEVEL);
    }
  }
  
include('includes/application_top_cre_setting.php');  
  
if (TEMPLATE_USE_CONFIGURABLE_PRODUCT_INFO == 'true'){
     define('CONTENT_PRODUCT_INFO', 'product_info_configureable');
  }else{ 
     define('CONTENT_PRODUCT_INFO', 'product_info');
  }

define('FILENAME_PRODUCT_INFO', CONTENT_PRODUCT_INFO . '.php');

// define general functions used application-wide
  require(DIR_WS_FUNCTIONS . 'general.php');
  require(DIR_WS_FUNCTIONS . 'html_output.php');

// include calendar class
require(DIR_WS_CLASSES . 'calendar.php');

// set the cookie domain
  $cookie_domain = (($request_type == 'NONSSL') ? HTTP_COOKIE_DOMAIN : HTTPS_COOKIE_DOMAIN);
  $cookie_path = (($request_type == 'NONSSL') ? HTTP_COOKIE_PATH : HTTPS_COOKIE_PATH);

// include cache functions if enabled
  if (USE_CACHE == 'true') include(DIR_WS_FUNCTIONS . 'cache.php');

// include shopping cart class
  require(DIR_WS_CLASSES . 'shopping_cart.php');
// begin PayPal_Shopping_Cart_IPN 2.8 (DMG)
    require(DIR_WS_MODULES . 'payment/paypal/classes/osC/osC.class.php');
// end PayPal_Shopping_Cart_IPN

// include navigation history class
  require(DIR_WS_CLASSES . 'navigation_history.php');

// some code to solve compatibility issues
  require(DIR_WS_FUNCTIONS . 'compatibility.php');

// define how the session functions will be used
  require(DIR_WS_FUNCTIONS . 'sessions.php');

  // set the session name and save path
  tep_session_name('osCsid');
  tep_session_save_path(SESSION_WRITE_DIRECTORY);

  // set the session cookie parameters
  session_set_cookie_params(0, $cookie_path, $cookie_domain);
  
  $session_started = false;
  // If the is a coolie with the session name, use it and ignore all else
  if ( isset($_COOKIE[tep_session_name()]) ) {
    tep_session_id($_COOKIE[tep_session_name()]);
    tep_session_start();
    $session_started = true;
  // if there is a $_POST session id passed, use it
  } elseif ( isset($_POST[tep_session_name()]) ) {
    tep_session_id($_POST[tep_session_name()]);
    tep_session_start();
    $session_started = true;
  // if SSL and there is a $_GET session id, use it
  } elseif ( ($request_type == 'SSL') && isset($_GET[tep_session_name()]) ) {
    tep_session_id($_GET[tep_session_name()]);
    tep_session_start();
    $session_started = true;
  // At this point, a session needs to be created
  // Check for Forced cookie usage
  } elseif (SESSION_FORCE_COOKIE_USE == 'True') {
    tep_setcookie('cookie_test', 'please_accept_for_session', time()+60*60*24*30, $cookie_path, $cookie_domain);
    // If this is the 2nd time thru, cookies may be working
    if ( isset($_COOKIE['cookie_test']) ) {
      tep_session_start();
      $session_started = true;
    }
  // Check for spider may be required
  } elseif (SESSION_BLOCK_SPIDERS == 'True') {
    $user_agent = strtolower(getenv('HTTP_USER_AGENT'));
    $spider_flag = false;
    if ( tep_not_null($user_agent) ) {
      $spiders = file(DIR_WS_INCLUDES . 'spiders.txt');
      for ($i=0, $n=sizeof($spiders); $i<$n; ++$i) {
        if ( tep_not_null($spiders[$i]) ) {
          if ( is_integer( strpos($user_agent, trim($spiders[$i])) ) ) {
            $spider_flag = true;
            // no need to create a session
            break;
          }
        }
      }
    }
    if ($spider_flag == false) {
      tep_session_start();
      $session_started = true;
    }
  // At this point, all checks are complete, so start a session
  } else {
    tep_session_start();
    $session_started = true;
  }

// set SID once, even if empty
  $SID = (defined('SID') ? SID : '');

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

// verify the browser user agent if the feature is enabled
  if (SESSION_CHECK_USER_AGENT == 'True') {
    $http_user_agent = getenv('HTTP_USER_AGENT');
    if (!tep_session_is_registered('SESSION_USER_AGENT')) {
      $SESSION_USER_AGENT = $http_user_agent;
      tep_session_register('SESSION_USER_AGENT');
    }

    if ($SESSION_USER_AGENT != $http_user_agent) {
      tep_session_destroy();
      tep_redirect(tep_href_link(FILENAME_LOGIN));
    }
  }

// verify the IP address if the feature is enabled
  if (SESSION_CHECK_IP_ADDRESS == 'True') {
    $ip_address = tep_get_ip_address();
    if (!tep_session_is_registered('SESSION_IP_ADDRESS')) {
      $SESSION_IP_ADDRESS = $ip_address;
      tep_session_register('SESSION_IP_ADDRESS');
    }

    if ($SESSION_IP_ADDRESS != $ip_address) {
      tep_session_destroy();
      tep_redirect(tep_href_link(FILENAME_LOGIN));
    }
  }

// create the shopping cart & fix the cart if necesary
  if (tep_session_is_registered('cart') && is_object($cart)) {
    if (PHP_VERSION < 4) {
      $broken_cart = $cart;
      $cart = new shoppingCart;
      $cart->unserialize($broken_cart);
    }
  } else {
    tep_session_register('cart');
    $cart = new shoppingCart;
  }

// begin PayPal_Shopping_Cart_IPN V2.8 DMG
//   require_once DIR_WS_MODULES . 'payment/paypal/functions/paypal.fnc.php';
  PayPal_osC::check_order_status(true);
// end PayPal_Shopping_Cart_IPN

// include currencies class and create an instance
  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();
//Eversun mod for sppc and qty price breaks
require(DIR_WS_CLASSES . 'PriceFormatter.php');
  $pf = new PriceFormatter;
 // Eversun end mod for sppc and qty price breaks
// include the mail classes
  require(DIR_WS_CLASSES . 'mime.php');
  require(DIR_WS_CLASSES . 'email.php');

  // ensure that the followin variables are loaded from the session information
  $customer_id = (int)$_SESSION['customer_id'];
  
  
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

// currency
  if (!tep_session_is_registered('currency') || isset($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {
    if (!tep_session_is_registered('currency')) tep_session_register('currency');

    if (isset($HTTP_GET_VARS['currency'])) {
      if (!$currency = tep_currency_exists($HTTP_GET_VARS['currency'])) $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    } else {
      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;
    }
  }

// navigation history
  if (tep_session_is_registered('navigation')) {
    if (PHP_VERSION < 4) {
      $broken_navigation = $navigation;
      $navigation = new navigationHistory;
      $navigation->unserialize($broken_navigation);
    }
  } else {
    tep_session_register('navigation');
    $navigation = new navigationHistory;
  }
  $navigation->add_current_page();

// BOF: Down for Maintenance except for admin ip
if (EXCLUDE_ADMIN_IP_FOR_MAINTENANCE != getenv('REMOTE_ADDR')){
  if (DOWN_FOR_MAINTENANCE=='true' and !strstr($PHP_SELF,DOWN_FOR_MAINTENANCE_FILENAME)) { tep_redirect(tep_href_link(DOWN_FOR_MAINTENANCE_FILENAME)); }
  }
// do not let people get to down for maintenance page if not turned on
if (DOWN_FOR_MAINTENANCE=='false' and strstr($PHP_SELF,DOWN_FOR_MAINTENANCE_FILENAME)) {
    tep_redirect(tep_href_link(FILENAME_DEFAULT));
}
// EOF: WebMakers.com Added: Down for Maintenance


// BOF: WebMakers.com Added: Functions Library
    include(DIR_WS_FUNCTIONS . 'webmakers_added_functions.php');
// EOF: WebMakers.com Added: Functions Library

// Shopping cart actions

  if (isset($HTTP_GET_VARS['action'])) {
// redirect the customer to a friendly cookie-must-be-enabled page if cookies are disabled
    if ($session_started == false) {
      tep_redirect(tep_href_link(FILENAME_COOKIE_USAGE));
    }

    if (DISPLAY_CART == 'true') {
      $goto =  FILENAME_SHOPPING_CART;
      $parameters = array('action', 'cPath', 'products_id', 'pid');
    } else {
      $goto = basename($PHP_SELF);
      if ($HTTP_GET_VARS['action'] == 'buy_now') {
        $parameters = array('action', 'pid', 'products_id');
      } else {
        $parameters = array('action', 'pid');
      }
    }
    switch ($HTTP_GET_VARS['action']) {
      // customer wants to update the product quantity in their shopping cart
      case 'update_product' : for ($i=0, $n=sizeof($HTTP_POST_VARS['products_id']); $i<$n; $i++) {
                                if (in_array($HTTP_POST_VARS['products_id'][$i], (is_array($HTTP_POST_VARS['cart_delete']) ? $HTTP_POST_VARS['cart_delete'] : array()))) {
                                  $cart->remove($HTTP_POST_VARS['products_id'][$i]);
                                } else {
                                  if (PHP_VERSION < 4) {
                                    // if PHP3, make correction for lack of multidimensional array.
                                    reset($HTTP_POST_VARS);
                                    while (list($key, $value) = each($HTTP_POST_VARS)) {
                                      if (is_array($value)) {
                                        while (list($key2, $value2) = each($value)) {
                                          if (ereg ("(.*)\]\[(.*)", $key2, $var)) {
                                            $id2[$var[1]][$var[2]] = $value2;
                                          }
                                        }
                                      }
                                    }
                                    $attributes = ($id2[$HTTP_POST_VARS['products_id'][$i]]) ? $id2[$HTTP_POST_VARS['products_id'][$i]] : '';
                                  } else {
                                    $attributes = ($HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]]) ? $HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]] : '';
                                  }
                                  
                   //Eversun mod for sppc and qty price breaks
                                 // $cart->add_cart($HTTP_POST_VARS['products_id'][$i], $HTTP_POST_VARS['cart_quantity'][$i], $attributes, false);
/*
                  $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['id'])) + $HTTP_POST_VARS['cart_quantity'], $HTTP_POST_VARS['id']);
                  */
                   $cart->add_cart($HTTP_POST_VARS['products_id'][$i],  $HTTP_POST_VARS['cart_quantity'][$i],$attributes, false);
                  //Eversun mod end for sppc and qty price breaks
                                }
                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));
                              break;
/*
      // customer adds a product from the products page
      case 'add_product' :    if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {
                                $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['id']))+1, $HTTP_POST_VARS['id']);
                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));
                              break;
*/



      // customer adds a product from the products page
      case 'add_product' :    if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {
                  if (tep_session_is_registered('customer_id')) tep_db_query("delete from " . TABLE_WISHLIST . " WHERE customers_id=$customer_id AND products_id=$products_id");

///////////////////////////////////////////////////////////////////////////////////////////////////////////
// MOD begin of sub product, add sub products into cart
  if (isset($HTTP_POST_VARS['sub_products_qty'])) {
    $i = 0;
    foreach ($HTTP_POST_VARS['sub_products_id'] as $sub_products_id) {
      if ($sub_products_qty[$i] > 0) {
        $cart->add_cart($sub_products_id, $cart->get_quantity($sub_products_id)+$sub_products_qty[$i], $HTTP_POST_VARS['id']);
      }
      $i++;
    }
  } else {
                  /*
                  $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['id']))+$quantity, $HTTP_POST_VARS['id']); // VJ product quantity changed
*/
     // Eversun mod for SPPP Qty Price Break Enhancement
                   $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['id'])) + $HTTP_POST_VARS['cart_quantity'], $HTTP_POST_VARS['id']);
                // Eversun mod end for SPPP Qty Price Break Enhancement
                }
                // MOD end of sub product
///////////////////////////////////////////////////////////////////////////////////////////////////////////

                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters), 'NONSSL'));
   break;
      // customer adds a product from the products page

// Wishlist Checkboxes - start
case 'add_del_products_wishlist' : 
  //delete selected products from wishlist
  if (isset($HTTP_POST_VARS['del_wishprod'])) {
    foreach ($HTTP_POST_VARS['del_wishprod'] as $value) {
      if (ereg('^[0-9]+$', $value)) {
           tep_db_query("delete from " . TABLE_WISHLIST . " where products_id = $value and customers_id = '" . $customer_id . "'");
         }
     }
  }
  // add selected products to wishlist
  if (isset($HTTP_POST_VARS['add_wishprod'])) {
    foreach ($HTTP_POST_VARS['add_wishprod'] as $value) {
      if (ereg('^[0-9]+$', $value)) {
        tep_db_query("delete from " . TABLE_WISHLIST . " where products_id = $value and customers_id = '" . $customer_id . "'");
        $cart->add_cart($value, $cart->get_quantity(tep_get_uprid($value, $HTTP_POST_VARS['id'][$value]))+1, $HTTP_POST_VARS['id'][$value]);
      }
    }
  }
  $wishlist_query_raw = "select * from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and products_id > 0 and customers_id > 0 order by products_name";
  $wishlist_query = tep_db_query($wishlist_query_raw);

  if ( (!tep_db_num_rows($wishlist_query)) && ($cart->count_contents() > 0) ) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }else{
    tep_redirect(tep_href_link(FILENAME_WISHLIST));
  }
  break;
// Wishlist Checkboxes - end

// Add product to the wishlist
      case 'add_wishlist' :   if (ereg('^[0-9]+$', $HTTP_POST_VARS['products_id'])) {
                                if ($HTTP_POST_VARS['products_id']) {
                                  tep_db_query("delete from " . TABLE_WISHLIST . " where products_id = '" . $HTTP_POST_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");
                                  tep_db_query("insert into " . TABLE_WISHLIST . " (customers_id, products_id, products_model, products_name, products_price) values ('" . $customer_id . "', '" . $HTTP_POST_VARS['products_id'] . "', '" . tep_db_input($HTTP_POST_VARS['products_model']) . "', '" . tep_db_input($$HTTP_POST_VARS['products_name']) . "', '" . tep_db_input($HTTP_POST_VARS['products_price']) . "' )");
                                  // Eversun mod for wishlist attribute
                                  tep_db_query("delete from " . TABLE_WISHLIST_ATTRIBUTES . " where products_id = '" . $HTTP_POST_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");
                                  if (isset ($HTTP_POST_VARS['id'])) {
                                    foreach($HTTP_POST_VARS['id'] as $att_option => $att_value) {
                                      tep_db_query("insert into " . TABLE_WISHLIST_ATTRIBUTES . " (customers_id, products_id, products_options_id , products_options_value_id) values ('" . $customer_id . "', '" . $HTTP_POST_VARS['products_id'] . "', '" . (int)$att_option . "', '" . (int)$att_value . "' )");
                                    }
                                  }
                                  // Eversun mod end for wishlist attribute
                                }
                              }
                              tep_redirect(tep_href_link(FILENAME_WISHLIST));
                              break;


      /*  this code has been removed becuase it it is no longer used in the cart
      case 'wishlist_add_cart': reset ($lvnr);
                                reset ($lvanz);
                                  while (list($key,$elem) =each ($lvnr))
                                        {
                                        (list($key1,$elem1) =each ($lvanz));
                                        tep_db_query("update " . TABLE_WISHLIST . " set products_quantity = '" . $elem1 . "' where customers_id = '" . $customer_id . "' and products_id = '" . $elem . "'");
                                        tep_db_query("delete from " . TABLE_WISHLIST . " where customers_id= '" . $customer_id . "' and products_quantity = '999'");
                                        $produkte_mit_anzahl=tep_db_query("select * from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and products_id = '" . $elem . "' and products_quantity<>'0'");

                                  while ($HTTP_GET_VARS=tep_db_fetch_array($produkte_mit_anzahl))
                                  {
                                  $cart->add_cart($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['products_quantity']);
                                  }
                                          }
                                reset ($lvanz);
                              tep_redirect(tep_href_link(FILENAME_WISHLIST));
                              break;
      */

// remove item from the wishlist
      case 'remove_wishlist':
                              tep_db_query("delete from " . TABLE_WISHLIST . " where products_id = '" . (int)$HTTP_GET_VARS['pid'] . "' and customers_id = '" . $customer_id . "'");
                              tep_redirect(tep_href_link(FILENAME_WISHLIST));
                              break;

      // performed by the 'buy now' button in product listings and review page
      case 'buy_now' :        if ( isset($HTTP_GET_VARS['products_id']) || ereg('^[0-9]+$', $HTTP_GET_VARS['products_id']) ) {
                                //Wishlist 2.0.1 Modification
                                 if (tep_session_is_registered('customer_id')) { tep_db_query("delete from " . TABLE_WISHLIST . " WHERE customers_id=$customer_id AND products_id= '" . $HTTP_GET_VARS['products_id'] . "'"); }
                                // End Wishlist 2.0.1 Modification
                                if (tep_has_product_attributes($HTTP_GET_VARS['products_id']) || tep_has_product_subproducts($HTTP_GET_VARS['products_id']) ) {
                                  tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $HTTP_GET_VARS['products_id']));
                                } else {
                                  $cart->add_cart($HTTP_GET_VARS['products_id'], $cart->get_quantity($HTTP_GET_VARS['products_id'])+1);
                                }
                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));
                              break;

      case 'notify' :         if (tep_session_is_registered('customer_id')) {
                                if (isset($HTTP_GET_VARS['products_id'])) {
                                  $notify = $HTTP_GET_VARS['products_id'];
                                } elseif (isset($HTTP_GET_VARS['notify'])) {
                                  $notify = $HTTP_GET_VARS['notify'];
                                } elseif (isset($HTTP_POST_VARS['notify'])) {
                                  $notify = $HTTP_POST_VARS['notify'];
                                } else {
                                  tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action', 'notify'))));
                                }
                                if (!is_array($notify)) $notify = array($notify);
                                for ($i=0, $n=sizeof($notify); $i<$n; $i++) {
                                  $check_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . (int)$notify[$i] . "' and customers_id = '" . $customer_id . "'");
                                  $check = tep_db_fetch_array($check_query);
                                  if ($check['count'] < 1) {
                                    tep_db_query("insert into " . TABLE_PRODUCTS_NOTIFICATIONS . " (products_id, customers_id, date_added) values ('" . (int)$notify[$i] . "', '" . $customer_id . "', now())");
                                  }
                                }
                                tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action', 'notify'))));
                              } else {
                                $navigation->set_snapshot();
                                tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
                              }
                              break;
      case 'notify_remove' :  if (tep_session_is_registered('customer_id') && isset($HTTP_GET_VARS['products_id'])) {
                                $check_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");
                                $check = tep_db_fetch_array($check_query);
                                if ($check['count'] > 0) {
                                  tep_db_query("delete from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");
                                }
                                tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action'))));
                              } else {
                                $navigation->set_snapshot();
                                tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
                              }
                              break;


      case 'cust_order' :     if (tep_session_is_registered('customer_id') && isset($HTTP_GET_VARS['pid'])) {
                                if (tep_has_product_attributes($HTTP_GET_VARS['pid'])) {
                                  // Although the product has attributes we still delete it from the WISHLIST:
                                  if ($rfw == 1) tep_db_query("delete from " . TABLE_WISHLIST . " WHERE customers_id=$customer_id AND products_id='" . (int)$HTTP_GET_VARS['pid'] . "'");
                                  tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . (int)$HTTP_GET_VARS['pid'], 'NONSSL'));
                                } else {
                                  // First delete from wishlist:
                                  if ($rfw == 1) tep_db_query("delete from " . TABLE_WISHLIST . " WHERE customers_id=$customer_id AND products_id='" . (int)$HTTP_GET_VARS['pid'] . "'");
                                  $cart->add_cart($HTTP_GET_VARS['pid'], $cart->get_quantity($HTTP_GET_VARS['pid'])+1);
                                }
                              }
                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters), 'NONSSL'));
                              break;

    }
  }

// encrypt
if (PAYMENT_CC_CRYPT =='True'){
require(DIR_WS_FUNCTIONS . 'crypt.php');
}

// include the who's online functions
 if (basename($PHP_SELF) != FILENAME_EVENTS_CALENDAR_CONTENT){
  require(DIR_WS_FUNCTIONS . 'whos_online.php');
  tep_update_whos_online();
}
// include the password crypto functions
  require(DIR_WS_FUNCTIONS . 'password_funcs.php');

// include validation functions (right now only email address)
  require(DIR_WS_FUNCTIONS . 'validations.php');

// split-page-results
  require(DIR_WS_CLASSES . 'split_page_results.php');

// Lango added for template BOF:
  require(DIR_WS_INCLUDES . 'template_application_top.php');
// Lango added for template EOF:


// auto activate and expire banners
  require(DIR_WS_FUNCTIONS . 'banner.php');
  tep_activate_banners();
  tep_expire_banners();

// auto expire special products
  require(DIR_WS_FUNCTIONS . 'specials.php');
  tep_expire_specials();

// auto expire featured products
  require(DIR_WS_FUNCTIONS . 'featured.php');
  tep_expire_featured();
// calculate category path
  if (isset($HTTP_GET_VARS['cPath'])) {
    $cPath = $HTTP_GET_VARS['cPath'];
  } elseif (isset($HTTP_GET_VARS['products_id']) && !isset($HTTP_GET_VARS['manufacturers_id'])) {
    $cPath = tep_get_product_path($HTTP_GET_VARS['products_id']);
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

/*--------------------------------------------------------*\
# Page cache contribution - by Chemo
#   CRE Mods - by Clarocque
# Define the pages to be cached in the $cache_pages array
\*--------------------------------------------------------*/
define('PAGE_CACHE_DIR', DIR_FS_CATALOG . 'cache/'); // the path to cache folder
////////////// PAGES TO CACHE ARE LISTED HERE////////////////////
$cache_pages = array('index.php', 'product_info.php');

if (!tep_session_is_registered('customer_id') && ENABLE_PAGE_CACHE == 'true') {
   # Start the output buffer for the shopping cart
   ob_start();
    # cart info box
      $column_query = tep_db_query('select display_in_column as cfgcol, infobox_file_name as cfgtitle,
    infobox_display as cfgvalue, infobox_define as cfgkey, display_in_column as cfgcol, box_heading,
    box_template, box_heading_font_color from ' . TABLE_INFOBOX_CONFIGURATION . ' where template_id = ' .
    TEMPLATE_ID . ' and infobox_display = "yes" and infobox_file_name = "shopping_cart.php" ');

      while ($column = tep_db_fetch_array($column_query)) {
        #MOD-clarocque
        #MOD if ( file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/boxes/' . $column['cfgtitle'])) {
        define($column['cfgkey'],$column['box_heading']);
        $infobox_define = $column['box_heading'];
        $infobox_template = $column['box_template'];
        $font_color = $column['box_heading_font_color'];
        $infobox_class = $column['box_template'];
        $infobox_side = $column['cfgcol'];
     #MOD require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/boxes/' . $column['cfgtitle']);
        file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/boxes/' . $column['cfgtitle'])
         ? require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/boxes/' . $column['cfgtitle'])
      #   : require(DIR_WS_BOXES . $column['cfgtitle']);    #  DMG attempt at ATS fix
      :require(DIR_WS_TEMPLATES . 'default/boxes/' . $column['cfgtitle']);
       #MOD}# if
       }#eof while
   $cart_cache = ob_get_clean();

   # End the output buffer for cart and save as $cart_cache string

      # Loop through the $cache_pages array and start caching if found
    
     foreach ($cache_pages as $index => $page){
           if (strpos($_SERVER['PHP_SELF'], $page) ){
       include_once(DIR_WS_CLASSES . 'page_cache.php');
       $page_cache = new page_cache($cart_cache);
      $page_cache->cache_this_page();
      }# eof if
      } #eof foreach
 } #eof if enabled      
#eof page cache


// include the breadcrumb class and start the breadcrumb trail
  require(DIR_WS_CLASSES . 'breadcrumb.php');
  $breadcrumb = new breadcrumb;

  $breadcrumb->add(HEADER_TITLE_TOP, HTTP_SERVER);
  $breadcrumb->add(HEADER_TITLE_CATALOG, tep_href_link(FILENAME_DEFAULT));

// add category names or the manufacturer name to the breadcrumb trail
  if (isset($cPath_array)) {
    for ($i=0, $n=sizeof($cPath_array); $i<$n; $i++) {
      $categories_query = tep_db_query("select categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " where categories_id = '" . (int)$cPath_array[$i] . "' and language_id = '" . (int)$languages_id . "'");
      if (tep_db_num_rows($categories_query) > 0) {
        $categories = tep_db_fetch_array($categories_query);
        $breadcrumb->add($categories['categories_name'], tep_href_link(FILENAME_DEFAULT, 'cPath=' . implode('_', array_slice($cPath_array, 0, ($i+1)))));
      } else {
        break;
      }
    }
  } elseif (isset($HTTP_GET_VARS['manufacturers_id'])) {
    $manufacturers_query = tep_db_query("select manufacturers_name from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");
    if (tep_db_num_rows($manufacturers_query)) {
      $manufacturers = tep_db_fetch_array($manufacturers_query);
      $breadcrumb->add($manufacturers['manufacturers_name'], tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id']));
    }
  }

// add the products model to the breadcrumb trail
  if (isset($HTTP_GET_VARS['products_id'])) {
    $model_query = tep_db_query("select products_model from " . TABLE_PRODUCTS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");
    if (tep_db_num_rows($model_query)) {
      $model = tep_db_fetch_array($model_query);
      $breadcrumb->add($model['products_model'], tep_href_link(FILENAME_PRODUCT_INFO, 'cPath=' . $cPath . '&products_id=' . $HTTP_GET_VARS['products_id']));
    }
  }
// For Article Manager Begin DMG

// include the articles functions
  require(DIR_WS_FUNCTIONS . 'articles.php');
  require(DIR_WS_FUNCTIONS . 'article_header_tags.php'); 

// calculate topic path
  if (isset($HTTP_GET_VARS['tPath'])) {
    $tPath = $HTTP_GET_VARS['tPath'];
  } elseif (isset($HTTP_GET_VARS['articles_id']) && !isset($HTTP_GET_VARS['authors_id'])) {
    $tPath = tep_get_article_path($HTTP_GET_VARS['articles_id']);
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

// add topic names or the author name to the breadcrumb trail
  if (isset($tPath_array)) {
    for ($i=0, $n=sizeof($tPath_array); $i<$n; $i++) {
      $topics_query = tep_db_query("select topics_name from " . TABLE_TOPICS_DESCRIPTION . " where topics_id = '" . (int)$tPath_array[$i] . "' and language_id = '" . (int)$languages_id . "'");
      if (tep_db_num_rows($topics_query) > 0) {
        $topics = tep_db_fetch_array($topics_query);
        $breadcrumb->add($topics['topics_name'], tep_href_link(FILENAME_ARTICLES, 'tPath=' . implode('_', array_slice($tPath_array, 0, ($i+1)))));
      } else {
        break;
      }
    }
  } elseif (isset($HTTP_GET_VARS['authors_id'])) {
    $authors_query = tep_db_query("select authors_name from " . TABLE_AUTHORS . " where authors_id = '" . (int)$HTTP_GET_VARS['authors_id'] . "'");
    if (tep_db_num_rows($authors_query)) {
      $authors = tep_db_fetch_array($authors_query);
      $breadcrumb->add('Articles by ' . $authors['authors_name'], tep_href_link(FILENAME_ARTICLES, 'authors_id=' . $HTTP_GET_VARS['authors_id']));
    }
  }

// add the articles name to the breadcrumb trail
  if (isset($HTTP_GET_VARS['articles_id'])) {
    $article_query = tep_db_query("select articles_name from " . TABLE_ARTICLES_DESCRIPTION . " where articles_id = '" . (int)$HTTP_GET_VARS['articles_id'] . "'");
    if (tep_db_num_rows($article_query)) {
      $article = tep_db_fetch_array($article_query);
      if (isset($HTTP_GET_VARS['authors_id'])) {
        $breadcrumb->add($article['articles_name'], tep_href_link(FILENAME_ARTICLE_INFO, 'authors_id=' . $HTTP_GET_VARS['authors_id'] . '&articles_id=' . $HTTP_GET_VARS['articles_id']));
      } else {
        $breadcrumb->add($article['articles_name'], tep_href_link(FILENAME_ARTICLE_INFO, 'tPath=' . $tPath . '&articles_id=' . $HTTP_GET_VARS['articles_id']));
      }
    }
  }
    $cart_links = DIR_WS_JAVASCRIPT . 'cart_links.js.php';

//for article manager end - DMG

// initialize the message stack for output messages
  require(DIR_WS_CLASSES . 'message_stack.php');
  $messageStack = new messageStack;

// set which precautions should be checked
  define('WARN_INSTALL_EXISTENCE', 'true');
  define('WARN_CONFIG_WRITEABLE', 'true');
  define('WARN_SESSION_DIRECTORY_NOT_WRITEABLE', 'true');
  define('WARN_SESSION_AUTO_START', 'true');
  define('WARN_DOWNLOAD_DIRECTORY_NOT_READABLE', 'true');
// Include OSC-AFFILIATE
  require(DIR_WS_INCLUDES . 'affiliate_application_top.php');

if(file_exists("includes/application_top_newsdesk.php"))
   include("includes/application_top_newsdesk.php");
   
if(file_exists("includes/application_top_faqdesk.php"))
   include("includes/application_top_faqdesk.php");

  
require(DIR_WS_FUNCTIONS . 'gv_functions.php');

// BOF: WebMakers.com Added: Header Tags Controller v1.0
  require(DIR_WS_FUNCTIONS . 'header_tags.php');
// Clean out HTML comments from ALT tags etc.
    require_once(DIR_WS_FUNCTIONS . 'clean_html_comments.php');
    require_once(DIR_WS_FUNCTIONS . 'header_tags.php');
  


//DWD Modify: Information Page Unlimited 1.1f - PT
  require(DIR_WS_FUNCTIONS . 'information_html_output.php');

// down for manpatance code, moved from main_page.tpl.php
if (DOWN_FOR_MAINTENANCE == 'true') {
  $maintenance_on_at_time_raw = tep_db_query("select last_modified from " . TABLE_CONFIGURATION . " WHERE configuration_key = 'DOWN_FOR_MAINTENANCE'");
  $maintenance_on_at_time= tep_db_fetch_array($maintenance_on_at_time_raw);
  define('TEXT_DATE_TIME', $maintenance_on_at_time['last_modified']);
}
?>
