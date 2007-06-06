<?php

define('TEXT_CRELOADED','CRE Loaded.com');
define('TEXT_OSC','osCommerce.com');


//common
define('TEXT_MANAGE','Manage');
define('TEXT_ADD','Add');
define('TEXT_VIEW','View');
define('TEXT_INSTALLED','Installed');
define('TEXT_ENABLED','Enabled');

// Store box
define('BLOCK_TITLE_STORE_INFO','Store Info');
$storename="<a class='adminLink' href='".tep_href_link(FILENAME_CONFIGURATION,"gID=1&cID=1&action=edit")."'>Store Name</a>";
define('BLOCK_CONTENT_STORE_INFO_STORE_NAME',$storename);
$storestatus="<a class='adminLink' href='".tep_href_link(FILENAME_CONFIGURATION,"gID=16&cID=153")."'>Store Status</a>";
define('BLOCK_CONTENT_STORE_INFO_STORE_STATUS',$storestatus);
$storeemail="<a class='adminLink' href='".tep_href_link(FILENAME_CONFIGURATION,"gID=1&cID=4")."'>Store Email</a>";
define('BLOCK_CONTENT_STORE_INFO_STORE_EMAIL',$storeemail); 
$defaulttemplate="<a class='adminLink' href='".tep_href_link(FILENAME_TEMPLATE_CONFIGURATION,"cID=7")."'>Default Template</a>";
define('BLOCK_CONTENT_STORE_INFO_STORE_TEMPLATE',$defaulttemplate); 
$primarylang="<a class='adminLink' href='".tep_href_link(FILENAME_LANGUAGES)."'>Primary Language</a>";
define('BLOCK_CONTENT_STORE_INFO_STORE_LANGUAGE',$primarylang); 
$primarycurr="<a class='adminLink' href='".tep_href_link(FILENAME_CURRENCIES)."'>Primary Currency</a>";
define('BLOCK_CONTENT_STORE_INFO_STORE_CURRENCY',$primarycurr);
define('BLOCK_CONTENT_STORE_INFO_STORE_TAX_RATE','Tax Rate');
define('BLOCK_CONTENT_STORE_INFO_STORE_TAX_ZONE','Tax Zone');
define('BLOCK_CONTENT_STORE_INFO_STORE_BACKUPS','Database Backups'); 
// Store tips
define('BLOCK_HELP_STORE_INFO','<ul><li><strong>Store Info</strong><br>Store info which you have in database.<br> You can visit Configuration >> My Store to edit / modify the same.</li></ul>');
define('BLOCK_HELP_STORE_STATUS','<ul><li><font color=#009900><strong>Active</strong></font><br>Store is open for business.</li><li><font color=#FF0000><strong>Maintanace</strong></font><br>Down for maintananace</li></ul>');
define('BLOCK_HELP_STORE_BACKUP','Create Fresh Backup Now!');

// Order Box
define('BLOCK_TITLE_ORDERS','Orders');
define('BLOCK_HELP_ORDERS','<ul><li><strong>Total Orders</strong><br> This is total count of Order records available in database, irrespective of status.</li><li><strong>Orders Pending</strong><br>Total count of orders, whose status is <font color=red>Pending</font></li><li><strong>Processing<br></strong>Total count of orders, whose status is <font color=red>Processing</font></li>  </ul>');

// reports
define('BLOCK_TITLE_REPORTS','Reports');    
define('BLOCK_CONTENT_REPORTS_PRODUCTS_VIEWED','Products Viewed');
define('BLOCK_CONTENT_REPORTS_PRODUCTS_PURCHASED','Products Purchased');
define('BLOCK_CONTENT_REPORTS_CUSTOMER_ORDERS_TOTAL','Customer Orders-Total');
define('BLOCK_CONTENT_REPORTS_MONTHLY_SALES_TAX','Monthly Sales/Tax');
define('BLOCK_HELP_REPORTS','<ul><li><strong>Reports</strong><br> Click on the links below to view the reports.</li>  </ul>');

// Products
define('BLOCK_TITLE_PRODUCTS','Products');
define('BLOCK_CONTENT_PRODUCTS_CATEGORIES','Total Number of Categories');
define('BLOCK_CONTENT_PRODUCTS_TOTAL_PRODUCTS','Total Number of Products');
define('BLOCK_CONTENT_PRODUCTS_ACTIVE','Active Products');
define('BLOCK_CONTENT_PRODUCTS_NOSTOCK','Out of Stock');
define('BLOCK_HELP_PRODUCTS','<ul><li><strong>Total Number of Products</strong><br>This is total count of products in database irrespective of categories and status.</li><li><strong>Active Products</strong><br>This is total count of live products which are online for sales. This record didcuscts products deactiveated by store admin and out of stocks.</li><li><strong>Out Of Stock<br></strong>This is total count of products, which are not in stock.</li></ul>');

//reviews
define('BLOCK_TITLE_REVIEWS','Reviews');
define('BLOCK_CONTENT_REVIEWS_TOTAL_REVIEWS','Total Number of Reviews');
define('BLOCK_CONTENT_REVIEWS_WAITING_APPROVAL','Waiting Approval');
define('BLOCK_HELP_REVIEWS','<ul><li><strong>Total Number Reviews</strong><br>This is total count of product records available in database, irrespective of categories, products and status.</li><li><strong>Waiting Approval</strong><br>  Total count of review waiting for admin approval.</li></ul>');

//Customers
define('BLOCK_TITLE_CUSTOMERS','Customers');
define('BLOCK_CONTENT_CUSTOMERS_TOTAL','Total Customers');
define('BLOCK_CONTENT_CUSTOMERS_SUBSCRIBED','Subscribed');
define('BLOCK_HELP_CUSTOMERS','<ul>  <li><strong>Total Customers</strong><br>This is total count of customers who signedup with store.</li><li><strong>Subscribed</strong><br>Total count of customers who subscribed for Newsletter and or Product Notifications.</li></ul>');

// Affiliates
define('BLOCK_TITLE_AFFILIATE','Affiliates');
define('BLOCK_CONTENT_AFFILIATE_TOTAL','Total Affiliates');
define('BLOCK_CONTENT_AFFILIATE_SALES','Affiliate Sales');
define('BLOCK_CONTENT_AFFILIATE_COMMISSION','Total Affiliate Commission');
define('BLOCK_HELP_AFFILIATE','<ul><li><strong>Affiliates</strong><br>Details of Affiliates. Use <strong>Manage</strong> link to manage affiliates.</li></ul>');

//Links
define('BLOCK_TITLE_LINKS','Links');
define('BLOCK_CONTENT_LINKS_TOTAL','Total Links');
define('BLOCK_CONTENT_LINKS_CATEGORIES','Link Categories');
define('BLOCK_CONTENT_LINKS_WAITING','Waiting Approval');

//Shipping Module
define('BLOCK_TITLE_SHIPPING_MODULES','Shipping Modules');
define('BLOCK_CONTENT_SHIPPING_MODULES_INSTALLED','Modules Installed');
define('BLOCK_CONTENT_SHIPPING_MODULES_ENABLED','Modules Enabled');
define('BLOCK_HELP_SHIPPING_MODULES','<ul><li><strong>Shipping Modules</strong><br>Number of Shipping modules Installed and you are currently using. Use <strong>Manage</strong> link to manage shipping modules.</li></ul>');

// Payment Modules
define('BLOCK_TITLE_PAYMENT_MODULES','Payment Modules');
define('BLOCK_CONTENT_PAYMENT_MODULES_INSTALLED','Modules Installed');
define('BLOCK_CONTENT_PAYMENT_MODULES_ENABLED','Modules Enabled');
define('BLOCK_HELP_PAYMENT_MODULES','<ul><li><strong>Payment Modules</strong><br>Number of Payment modules Installed and you are currently using. Use <strong>Manage</strong> link to manage payment modules.</li></ul>');

//Taxes
define('BLOCK_TITLE_TAX_RATES','Tax Rates');
define('BLOCK_HELP_TAXES','<ul><li><strong>Taxes</strong><br>Number of Zones Installed</li></ul>');

// CRE Forge
define('BLOCK_TITLE_CRE_FORGE',"CRE Forge");
define('BLOCK_CONTENT_CRE_FORGE_BUG_TRACKER',"Bug Tracker");
define('BLOCK_CONTENT_CRE_FORGE_FEATURE_REQUESTS',"Feature Requests");
define('BLOCK_CONTENT_CRE_FORGE_SVN_REPOSITORY',"SVN Repository");
define('BLOCK_CONTENT_CRE_FORGE_SUPPORT_REQUEST',"Support Request");
define('BLOCK_CONTENT_CRE_FORGE_FILE_RELEASES',"File Releases");
define('BLOCK_TITLE_CRE_NEWS',"CRE Loaded News");

?>