<?php
/*
  $Id: filenames.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('FILENAME_STATS_NOT_VALID_USER', 'stats_not_valid_users.php');   

// CCGV
DEFINE('FILENAME_GV_QUEUE', 'gv_queue.php');
DEFINE('FILENAME_GV_MAIL', 'gv_mail.php');
DEFINE('FILENAME_GV_SENT', 'gv_sent.php');
define('FILENAME_COUPON_ADMIN', 'coupon_admin.php');
define('FILENAME_ZIPCODE_VALIDATE','zipcode_validate.php');

//Index Page
define('FILENAME_BUG_TRACKER','/tracker/');
define('FILENAME_FEATURE_REQUESTS','/tracker/');
define('FILENAME_SVN_REPOSITORY','/scm/');
define('FILENAME_SUPPORT_REQUEST','/tracker/');
define('FILENAME_FILE_RELEASES','/frs/');

//Index Page End

//Admin begin
  define('FILENAME_ADMIN_ACCOUNT', 'admin_account.php');
  define('FILENAME_ADMIN_FILES', 'admin_files.php');
  define('FILENAME_ADMIN_MEMBERS', 'admin_members.php');
  define('FILENAME_FORBIDEN', 'forbiden.php');
  define('FILENAME_LOGIN', 'login.php');
  define('FILENAME_LOGOFF', 'logoff.php');
  define('FILENAME_PASSWORD_FORGOTTEN', 'password_forgotten.php');
//Admin end

// MaxiDVD Added Line For WYSIWYG HTML Area: BOF
  define('FILENAME_DEFINE_MAINPAGE', 'define_mainpage.php');
// MaxiDVD Added Line For WYSIWYG HTML Area: EOF

// Lango Added Line For Infobox configuration: BOF
  define('FILENAME_TEMPLATE_ADMIN', 'template_admin.php');
  define('FILENAME_TEMPLATE_CONFIGURATION', 'template_configuration.php');
  define('FILENAME_INFOBOX_CONFIGURATION', 'infobox_configuration.php');
  define('FILENAME_TEMPLATE_CONFIGURATION1', 'template_configuration1.php');
  define('FILENAME_INFOBOX_ADMIN', 'infobox_admin.php');
  
  define('FILENAME_PRODUCT_LIST_ADMIN', 'product_list_admin.php');
  
  define('FILENAME_POPUP_INFOBOX_HELP', 'popup_infobox_help.php');
// Lango Added Line For Infobox configuration: EOF

// Lango Added Line For Salemaker Mod: BOF
  define('FILENAME_SALEMAKER', 'salemaker.php');
  define('FILENAME_SALEMAKER_INFO', 'salemaker_info.php');
// Lango Added Line For Salemaker Mod: EOF

// BOF: Lango Added for Featured product MOD
  define('FILENAME_FEATURED', 'featured.php');
// EOF: Lango Added for Featured product MOD

// BOF: Lango Added for Order_edit MOD
  define('FILENAME_CREATE_ACCOUNT', 'create_account.php');
  define('FILENAME_CREATE_ACCOUNT_PROCESS', 'create_account_process.php');
  define('FILENAME_CREATE_ACCOUNT_SUCCESS', 'create_account_success.php');
  define('FILENAME_CREATE_ORDER_PROCESS', 'create_order_process.php');
  define('FILENAME_CREATE_ORDER', 'create_order.php');
  define('FILENAME_EDIT_ORDERS', 'edit_orders.php');
  define('FILENAME_C_ORDERS', 'c_orders.php');
  define('FILENAME_ORDERS_STATUS', 'orders_status.php');
  define('FILENAME_CREATE_ORDERS_ADMIN', 'create_order_admin.php');
  define('FILENAME_CREATE_ORDERS_PAY', 'create_order_payment.php');
  define('FILENAME_CREATE_ORDERS_SHIP', 'create_order_shipping.php');
  define('FILENAME_ABANDONED_ORDERS', 'abandoned_orders.php');  

// BOF: Lango Added for Sales Stats MOD
define('FILENAME_STATS_MONTHLY_SALES', 'stats_monthly_sales.php');
// EOF: Lango Added for Sales Stats MOD

// define the filenames used in the project
  define('FILENAME_BACKUP', 'backup.php');
  define('FILENAME_BANNER_MANAGER', 'banner_manager.php');
  define('FILENAME_BANNER_STATISTICS', 'banner_statistics.php');
  define('FILENAME_CACHE', 'cache.php');
  define('FILENAME_CATALOG_ACCOUNT_HISTORY_INFO', 'account_history_info.php');
  define('FILENAME_CATEGORIES', 'categories.php');
  define('FILENAME_CONFIGURATION', 'configuration.php');
  define('FILENAME_COUNTRIES', 'countries.php');
  define('FILENAME_CURRENCIES', 'currencies.php');
  define('FILENAME_CUSTOMERS', 'customers.php');
  define('FILENAME_DEFAULT', 'index.php');
  define('FILENAME_DEFINE_LANGUAGE', 'define_language.php');
  define('FILENAME_FILE_MANAGER', 'file_manager.php');
  define('FILENAME_GEO_ZONES', 'geo_zones.php');
  define('FILENAME_LANGUAGES', 'languages.php');
  define('FILENAME_MAIL', 'mail.php');
  define('FILENAME_MANUFACTURERS', 'manufacturers.php');
  define('FILENAME_MODULES', 'modules.php');
  define('FILENAME_NEWSLETTERS', 'newsletters.php');
  define('FILENAME_ORDERS', 'orders.php');
  define('FILENAME_ORDERS_STATUS','orders_status.php');
  define('FILENAME_ORDERS_INVOICE', 'invoice.php');
  define('FILENAME_ORDERS_PACKINGSLIP', 'packingslip.php');
  define('FILENAME_CREATE_ORDERS_ADMIN', 'orders_status.php');
  define('FILENAME_POPUP_IMAGE', 'popup_image.php');
  define('FILENAME_PRODUCTS_ATTRIBUTES', 'products_attributes.php');
  define('FILENAME_PRODUCTS_EXPECTED', 'products_expected.php');
  define('FILENAME_REVIEWS', 'reviews.php');
  define('FILENAME_SERVER_INFO', 'server_info.php');
  define('FILENAME_SHIPPING_MODULES', 'shipping_modules.php');
  define('FILENAME_SPECIALS', 'specials.php');
  define('FILENAME_STATS_CUSTOMERS', 'stats_customers.php');
  define('FILENAME_STATS_PRODUCTS_PURCHASED', 'stats_products_purchased.php');
  define('FILENAME_STATS_PRODUCTS_VIEWED', 'stats_products_viewed.php');
  define('FILENAME_TAX_CLASSES', 'tax_classes.php');
  define('FILENAME_TAX_RATES', 'tax_rates.php');
  define('FILENAME_WHOS_ONLINE', 'whos_online.php');
  define('FILENAME_ZONES', 'zones.php');
  define('FILENAME_XSELL_PRODUCTS', 'xsell_products.php'); // X-Sell
  define('FILENAME_EDIT_ORDERS', 'edit_orders.php');
  define('FILENAME_PAYPAL', 'paypal.php');
  define('FILENAME_EDIT_LANGUAGES', 'edit_textdata.php');
// VJ Links Manager v1.00 begin
  define('FILENAME_LINKS', 'links.php');
  define('FILENAME_LINK_CATEGORIES', 'link_categories.php');
  define('FILENAME_LINKS_CONTACT', 'links_contact.php');
// VJ Links Manager v1.00 end

//DWD Modify: Information Page Unlimited 1.1f - PT
  define('FILENAME_INFORMATION_MANAGER', 'information_manager.php');
//DWD Modify End

  define('FILENAME_FAQ_MANAGER', 'faq_manager.php');
 define('FILENAME_SHOPBYPRICE', 'shopbyprice.php');

// product notifications
define('FILENAME_PRODUCT_NOTIFICATION','product_notifications.php');

//added for Backup mySQL (provided Courtesy Zen-Cart Team) DMG
define('FILENAME_BACKUP_MYSQL','backup_mysql.php');

define('FILENAME_EDIT_TEXT','edit_textdata.php');
define('FILENAME_EDIT_TEXT_HELP','edit_textdata_help.php');
//data import/export
  define('FILENAME_EASYPOPULATE', 'easypopulate.php');
  define('FILENAME_EASYPOPULATE_EXPORT', 'easypopulate_export.php');
  define('FILENAME_EASYPOPULATE_IMPORT', 'easypopulate_import.php');
  define('FILENAME_EASYPOPULATE_BASIC', 'easypopulate_basic.php');
  define('FILENAME_EASYPOPULATE_BASIC_IMPORT', 'easypopulate_basic_import.php');
  define('FILENAME_EASYPOPULATE_BASIC_EXPORT', 'easypopulate_basic_export.php');
  define('FILENAME_DATA_HELP', 'data_help.php');
  define('FILENAME_DATA', 'data.php');
  define('FILENAME_FROOGLE_ADMIN', 'froogle_admin.php');
  define('FILENAME_FROOGLE', 'froogle.php');
  define('FILENAME_FROOGLE_PRE1', 'froogle_pre1.php');
  define('FILENAME_FROOGLE_PRE', 'froogle_pre.php');
  define('FILENAME_POPUP_DATA_HELP', 'popup_data_help.php');
  define('FILENAME_POPUP_EP_HELP', 'popup_ep_help.php');
  define('FILENAME_DATA_ADMIN', 'data_admin.php');
  define('FILENAME_FROOGLE_ADMIN', 'froogle_admin.php');
  define('FILENAME_FEEDERS', 'feeders.php');
  define('FILENAME_AMAZON', 'amazon.php');
  define('FILENAME_BIZRATE', 'bizrate.php');

define('FILENAME_STATS_WISHLIST', 'stats_wishlist.php');

define('FILENAME_DOCUMENT', 'document.php');
define('FILENAME_DOCUMENT_HELP', 'document_help.php');

// Orderlist 3.1 report added DMG

  define('FILENAME_ORDERLIST', 'feature_not_present.php');

  define('FILENAME_EVENTS_CALENDAR', 'events_calendar.php');
  define('FILENAME_EVENTS_CALENDAR_CONTENT', 'calendar_content.php');
  define('FILENAME_EVENTS_MANAGER', 'events_manager.php');

// VJ member approval added
  define('FILENAME_MEMBERS', 'members.php');
  
// DMG Sales Report 2
  define('FILENAME_STATS_SALES_REPORT2', 'stats_sales_report2.php');
  
  define('FILENAME_STATS_DAILY_SALES_REPORT', 'stats_daily_products_sales_report.php');
//DMG Zipcode Match report
  define('FILENAME_STATS_ZIPCODE_MATCH','feature_not_present.php');
  
//DMG : Create Order Admin by Tom O'Neill
 define('FILENAME_CREATE_ORDERS_PAY','create_order_payment.php');
 define('FILENAME_CREATE_ORDERS_SHIP','create_order_shipping.php');
 
//DMG :  FAQ System 2.1

  define('FILENAME_FAQ_MANAGER', 'faq_manager.php');
  define('FILENAME_FAQ_VIEW', 'faq_view.php');
  define('FILENAME_FAQ_VIEW_ALL', 'faq_view_all.php');
  
// VJ faq manager added
  define('FILENAME_FAQ_CATEGORIES', 'faq_categories.php');
  
//DMG : Article Manager

  define('FILENAME_ARTICLE_REVIEWS', 'article_reviews.php');
  define('FILENAME_ARTICLES', 'articles.php');
  define('FILENAME_ARTICLES_CONFIG', 'articles_config.php');
  define('FILENAME_ARTICLES_XSELL', 'articles_xsell.php');
  define('FILENAME_AUTHORS', 'authors.php');
// Article Statistics DMG

  define('FILENAME_STATS_ARTICLES_VIEWED', 'stats_articles_viewed.php');
// Article Search Filename  DMG
  define('FILENAME_ARTICLE_SEARCH', 'article_search.php');
// Multiple Products Admin

define('FILENAME_PRODUCTS_MULTI', 'feature_not_present.php');

// Specials by Category
define('FILENAME_SPECIALSBYCAT', 'feature_not_present.php');
 
 define('FILENAME_CRYPT','crypt.php');
 define('FILENAME_CRYPT_TEST','crypt_test.php');
 define('FILENAME_CRYPT_CONVERT','crypt_convert.php');
 define('FILENAME_CRYPT_PURGE','crypt_purge.php');
 
// START: Product Extra Fields  DMG
  define('FILENAME_PRODUCTS_EXTRA_FIELDS', 'feature_not_present.php');
// END: Product Extra Fields DMG


// Customers Orders Report DMG
  define('FILENAME_STATS_CUSTOMERS_ORDERS', 'stats_customers_orders.php');
  
// Daily Product Reports DMG
  define('FILENAME_STATS_DAILY_SALES_REPORT', 'stats_daily_products_sales_report.php');
  
// GV Report DMG

  define('FILENAME_GV_REPORT','gv_report.php');
  
// Contact US Email Subjects : DMG

  define('FILENAME_EMAIL_SUBJECTS', 'email_subjects.php');

// VJ navmenu begin
define('FILENAME_NAVMENU', 'navmenu.php');
// VJ navmenu end

// VJ infosystem begin
define('FILENAME_PAGES_CATEGORIES','pages_categories.php');
define('FILENAME_PAGES','pages.php');
// VJ infosystem end
  
// osC Explain : DMG
define('FILENAME_INSTALL_EXPLAIN','install-explain.php');
define('FILENAME_STATS_EXPLAIN','stats_explain_queries.php');
define('FILENAME_EDIT_KEY_HELP', 'edit_key_help.php');
define('FILENAME_ENCRYPT_HELP', 'encrypt_help.php');
define('FILENAME_POPUP_ENCRYPT_HELP', 'popup_encrypt_help.php');
define('FILENAME_CRYPT','crypt.php');
define('FILENAME_CRYPT_TEST','crypt_test.php');
define('FILENAME_CRYPT_UPDATE','crypt_update.php');
define('FILENAME_CRYPT_CONVERT','crypt_convert.php');
define('FILENAME_CRYPT_CONVERT1','crypt_convert_1.php');
define('FILENAME_EDIT_KEY','edit_key.php');
// Product Extra Fields

    define('FILENAME_PRODUCTS_EXTRA_FIELDS', 'product_extra_fields.php');
    
// Eversun mod for sppp
define('FILENAME_CUSTOMERS_GROUPS', 'feature_not_present.php');
// Eversun mod end for sppp

  define('FILENAME_HEADER_TAGS_CONTROLLER', 'header_tags_controller.php');
  define('FILENAME_HEADER_TAGS_ENGLISH', 'header_tags_english.php');
  define('FILENAME_HEADER_TAGS_FILL_TAGS', 'header_tags_fill_tags.php');
  define('FILENAME_HEADER_TAGS_INCLUDES', 'header_tags_includes.php');
  
//DMG mod for product notifications v3
  define('FILENAME_STATS_PRODUCTS_NOTIFICATIONS', 'stats_products_notifications.php');//Products Notifications V3


  define('FILENAME_STATS_PRODUCTS_NOTIFICATIONS', 'stats_products_notifications.php');//Products Notifications V3

  define('FILENAME_SHIPWIRE', 'shipwire.php');
  
  define('FILENAME_OPTION_CATEGORIES','options_categories.php');
   define('FILENAME_VALIDATE_NEW','validate_new.php');
   
  define('FILENAME_INSTALL_EXPLAIN','install-explain.php');
?>
