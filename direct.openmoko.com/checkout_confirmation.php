<?php
/*
  $Id: checkout_confirmation.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_CHECKOUT_PAYMENT));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

// if there is nothing in the customers cart, redirect them to the shopping cart page
  if ($cart->count_contents() < 1) {
    tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
  }

// avoid hack attempts during the checkout procedure by checking the internal cartID
  if (isset($cart->cartID) && tep_session_is_registered('cartID')) {
    if ($cart->cartID != $cartID) {
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
    }
  }

// if no shipping method has been selected, redirect the customer to the shipping method selection page
  if (!tep_session_is_registered('shipping')) {
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  }

  if (!tep_session_is_registered('payment')) tep_session_register('payment');
  if (isset($HTTP_POST_VARS['payment'])) $payment = $HTTP_POST_VARS['payment'];

  if (!tep_session_is_registered('comments')) tep_session_register('comments');
  if (tep_not_null($HTTP_POST_VARS['comments'])) {
    $comments = tep_db_prepare_input($HTTP_POST_VARS['comments']);
  }

// load the selected payment module
  require(DIR_WS_CLASSES . 'payment.php');
  if ($credit_covers) $payment=''; //ICW added for CREDIT CLASS
  $payment_modules = new payment($payment);
  $payment_modules->update_status();

  require(DIR_WS_CLASSES . 'order.php');
  $order = new order;

  // Stock Check
  $any_out_of_stock = false;
  if (STOCK_CHECK == 'true') {
    for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
      if (tep_check_stock($order->products[$i]['id'], $order->products[$i]['qty'])) {
        $any_out_of_stock = true;
      }
    }
    // Out of Stock
    if ( (STOCK_ALLOW_CHECKOUT != 'true') && ($any_out_of_stock == true) ) {
      tep_redirect(tep_href_link(FILENAME_SHOPPING_CART));
    }
  }

// Ok, the various checks have been applied.  Now if this is thesecond time thru
// we want to proceed.  The checks are to be applied before the confirmation screen is presented
// and once again after the confirm button is clicked to reduce possible errors in the order.
  if ( isset($HTTP_POST_VARS['action']) && $HTTP_POST_VARS['action'] == 'proceed' ) {
    if (isset($$payment->form_action_url)) {
      tep_redirect($$payment->form_action_url);
    } else {
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL'));
    }
  }  

  
//ICW ADDED FOR CREDIT CLASS SYSTEM
  require(DIR_WS_CLASSES . 'order_total.php');
//ICW ADDED FOR CREDIT CLASS SYSTEM
  $order_total_modules = new order_total;
//ICW ADDED FOR CREDIT CLASS SYSTEM
  $order_total_modules->collect_posts();
//ICW ADDED FOR CREDIT CLASS SYSTEM
  $order_total_modules->pre_confirmation_check();

// ICW CREDIT CLASS Amended Line
//  if ( ( is_array($payment_modules->modules) && (sizeof($payment_modules->modules) > 1) && !is_object($$payment) ) || (is_object($$payment) && ($$payment->enabled == false)) ) {
  if ( (is_array($payment_modules->modules)) && (sizeof($payment_modules->modules) > 1) && (!is_object($$payment)) && (!$credit_covers) ) {
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(ERROR_NO_PAYMENT_MODULE_SELECTED), 'SSL'));
  }

  if (is_array($payment_modules->modules)) {
    $payment_modules->pre_confirmation_check();
  }

// load the selected shipping module
  require(DIR_WS_CLASSES . 'shipping.php');
  $shipping_modules = new shipping($shipping);
//ICW Credit class amendment Lines below repositioned
//  require(DIR_WS_CLASSES . 'order_total.php');
//  $order_total_modules = new order_total;

  
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_CONFIRMATION);

  $breadcrumb->add(NAVBAR_TITLE_1, tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
  $breadcrumb->add(NAVBAR_TITLE_2);

  $content = CONTENT_CHECKOUT_CONFIRMATION;
  
  if (ACCOUNT_CONDITIONS_REQUIRED == 'true') $javascript = 'checkout_confirmation.js.php';

  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);

  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
