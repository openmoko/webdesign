<?php
/*
  $Id: checkout_success.php,v 1.3 2004/09/25 14:36 DMG Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  // begin PayPal_Shopping_Cart_IPN 2.8 (DMG)
  require(DIR_WS_MODULES . 'payment/paypal/classes/paypal_order.class.php');
  // end PayPal_Shopping_Cart_IPN
  // if the customer is not logged on, redirect them to the shopping cart page
  if (!tep_session_is_registered('customer_id')) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'update')) {
    $notify_string = 'action=notify&';
    $notify = $HTTP_POST_VARS['notify'];
    if (!is_array($notify)) $notify = array($notify);
    for ($i=0, $n=sizeof($notify); $i<$n; $i++) {
      $notify_string .= 'notify[]=' . $notify[$i] . '&';
    }
    if (strlen($notify_string) > 0) $notify_string = substr($notify_string, 0, -1);
    // BOF: daithik change for PWA//  DMG Merge w. Paypal IPN 2.8
    if (tep_session_is_registered('noaccount')) {
      tep_session_destroy();
      tep_redirect(tep_href_link(FILENAME_DEFAULT, '$notify_string', 'NONSSL'));
    }else{
      tep_redirect(tep_href_link(FILENAME_DEFAULT, $notify_string));
    }
  } else if ((isset($HTTP_GET_VARS['action']) && $HTTP_GET_VARS['action'] == 'success')) {
    //begin PayPal_Shopping_Cart_IPN
    paypal_order::reset_checkout_cart_session();
  }
  //end PayPal_Shopping_Cart_IPN
  // EOF: daithik change for PWA

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_SUCCESS);

  $breadcrumb->add(NAVBAR_TITLE_1);
  $breadcrumb->add(NAVBAR_TITLE_2);


  // BOF: daithik change for PWA
  if (tep_session_is_registered('noaccount')) {
    $order_update = array('purchased_without_account' => '1');
    tep_db_perform(TABLE_ORDERS, $order_update, 'update', "orders_id = '".$orders['orders_id']."'");
    //  tep_db_query("insert into " . TABLE_ORDERS . " (purchased_without_account) values ('1') where orders_id = '" . (int)$orders['orders_id'] . "'");
    tep_db_query("delete from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . tep_db_input($customer_id) . "'");
    tep_db_query("delete from " . TABLE_CUSTOMERS . " where customers_id = '" . tep_db_input($customer_id) . "'");
    tep_db_query("delete from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . tep_db_input($customer_id) . "'");
    tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET . " where customers_id = '" . tep_db_input($customer_id) . "'");
    tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES . " where customers_id = '" . tep_db_input($customer_id) . "'");
    tep_db_query("delete from " . TABLE_WHOS_ONLINE . " where customer_id = '" . tep_db_input($customer_id) . "'");
    if (!tep_session_is_registered('noaccount')){ 
      tep_session_destroy();
    }
  }
  // EOF: daithik change for PWA

  // load all enabled checkout success modules
  require(DIR_WS_CLASSES . 'checkout_success.php');
  $checkout_success_modules = new checkout_success;

  $content = CONTENT_CHECKOUT_SUCCESS;
  $javascript = 'popup_window_print.js';
  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);
  
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>