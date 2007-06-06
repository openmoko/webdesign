<?php
/*
  $Id: checkout_process.php,v 1.1.1.2 2004/03/04 23:37:57 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  include('includes/application_top.php');

  $ip = $HTTP_SERVER_VARS["REMOTE_ADDR"];
  $client = gethostbyaddr($HTTP_SERVER_VARS["REMOTE_ADDR"]);
  $str = preg_split("/\./", $client);
  $i = count($str);
  $x = $i - 1;
  $n = $i - 2;
  $isp = $str[$n] . "." . $str[$x];

// if the customer is not logged on, redirect them to the login page
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot(array('mode' => 'SSL', 'page' => FILENAME_CHECKOUT_PAYMENT));
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }

  if (!tep_session_is_registered('sendto')) {
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
  }

  if ( (tep_not_null(MODULE_PAYMENT_INSTALLED)) && (!tep_session_is_registered('payment')) ) {
    tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
 }

// avoid hack attempts during the checkout procedure by checking the internal cartID
  if (isset($cart->cartID) && tep_session_is_registered('cartID')) {
    if ($cart->cartID != $cartID) {
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL'));
    }
  }

  include(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CHECKOUT_PROCESS);

// load selected payment module
  require(DIR_WS_CLASSES . 'payment.php');
  if ($credit_covers) $payment=''; //ICW added for CREDIT CLASS
  $payment_modules = new payment($payment);

// load the selected shipping module
  require(DIR_WS_CLASSES . 'shipping.php');
  $shipping_modules = new shipping($shipping);
  require(DIR_WS_CLASSES . 'order.php');
  $order = new order;

if(!class_exists('order_total')) {
 include(DIR_WS_CLASSES . 'order_total.php');
 $order_total_modules = new order_total;
}

  $order_totals = $order_total_modules->process();



// load the before_process function from the payment modules.  
// Authorize.net/QuickCommerce/PlugnPlay processing - this called moved to a later point
// This is maintained for compatiblity with all other modules
// update for incorrect logic - start - 06/09/06 - datazen
/* old code commented out
 if (!MODULE_PAYMENT_AUTHORIZENET_STATUS)
   {
    $payment_modules->before_process();
    }
*/
 if( ((MODULE_PAYMENT_AUTHORIZENET_STATUS == 'True') && ($payment == 'authorizenet') ) || 
    ((MODULE_PAYMENT_QUICKCOMMERCE_STATUS =='True') && ($payment == 'quickcommerce') ) || 
    ((MODULE_PAYMENT_PLUGNPAY_STATUS =='True')  && ($payment == 'plugnpay')) ){
    //don't load before process
  } elseif((MODULE_PAYMENT_PAYPAL_STATUS == 'True') && ($payment == 'paypal')) {
    $payment_modules->before_process();
    include(DIR_WS_MODULES . 'payment/paypal/catalog/checkout_process.inc.php');
  } else {
    $payment_modules->before_process();
  }
// update for incorrect logic - end
  
  if ( (PAYMENT_CC_CRYPT == 'True' ) && !empty($order->info['cc_number']) ){
   $cc_number1 = cc_encrypt($order->info['cc_number']);
   $cc_expires1 = cc_encrypt($order->info['cc_expires']);
  }else{
   $cc_number1 =$order->info['cc_number'];
   $cc_expires1 =$order->info['cc_expires'];
  }
  
  
// BOF: WebMakers.com Added: Downloads Controller
  $sql_data_array = array('customers_id' => $customer_id,
                          'customers_name' => $order->customer['firstname'] . ' ' . $order->customer['lastname'],
                          'customers_company' => $order->customer['company'],
                          'customers_street_address' => $order->customer['street_address'],
                          'customers_suburb' => $order->customer['suburb'],
                          'customers_city' => $order->customer['city'],
                          'customers_postcode' => $order->customer['postcode'],
                          'customers_state' => $order->customer['state'],
                          'customers_country' => $order->customer['country']['title'],
                          'customers_telephone' => $order->customer['telephone'],
                          'customers_email_address' => $order->customer['email_address'],
                          'customers_address_format_id' => $order->customer['format_id'],
                          'delivery_name' => $order->delivery['firstname'] . ' ' . $order->delivery['lastname'],
                          'delivery_company' => $order->delivery['company'],
                          'delivery_street_address' => $order->delivery['street_address'],
                          'delivery_suburb' => $order->delivery['suburb'],
                          'delivery_city' => $order->delivery['city'],
                          'delivery_postcode' => $order->delivery['postcode'],
                          'delivery_state' => $order->delivery['state'],
                          'delivery_country' => $order->delivery['country']['title'],
                          'delivery_address_format_id' => $order->delivery['format_id'],
                          'billing_name' => $order->billing['firstname'] . ' ' . $order->billing['lastname'],
                          'billing_company' => $order->billing['company'],
                          'billing_street_address' => $order->billing['street_address'],
                          'billing_suburb' => $order->billing['suburb'],
                          'billing_city' => $order->billing['city'],
                          'billing_postcode' => $order->billing['postcode'],
                          'billing_state' => $order->billing['state'],
                          'billing_country' => $order->billing['country']['title'],
                          'billing_address_format_id' => $order->billing['format_id'],
                          'payment_method' => $order->info['payment_method'],
                          'payment_info' => $GLOBALS['payment_info'],
                          'cc_type' => $order->info['cc_type'],
                          'cc_owner' => $order->info['cc_owner'],
                          'cc_number' => $cc_number1,
                          'cc_ccv' => '',
                          'cc_start' => $order->info['cc_start'],
                          'cc_issue' => $order->info['cc_issue'],
                          'cc_expires' => $cc_expires1,
                          'date_purchased' => 'now()',
                          'last_modified' => 'now()',
                          'orders_status' => $order->info['order_status'],
                          'currency' => $order->info['currency'],
                          'currency_value' => $order->info['currency_value'],
                          'ipaddy' => $ip,
        'ipisp' => $isp);
              
// EOF: WebMakers.com Added: Downloads Controller
  tep_db_perform(TABLE_ORDERS, $sql_data_array);
  $insert_id = tep_db_insert_id();

// Make sure the /catalog/includes/class/order.php is included
// and $order object is created before this!!!
// load the before_process function from the payment modules

//************
  if(defined(MODULE_PAYMENT_AUTHORIZENET_STATUS) && MODULE_PAYMENT_AUTHORIZENET_STATUS) {
    include(DIR_WS_MODULES . 'authorizenet_direct.php');
    $payment_modules->before_process();
  }
//************************************************************

 //quickcommerce
 if(defined(MODULE_PAYMENT_QUICKCOMMERCE_STATUS) && MODULE_PAYMENT_QUICKCOMMERCE_STATUS) {
    include(DIR_WS_MODULES . 'quickcommerce_direct.php');
    $payment_modules->before_process();
  }
//***********************************
  if(defined(MODULE_PAYMENT_PLUGNPAY_STATUS) && MODULE_PAYMENT_PLUGNPAY_STATUS) {
    include(DIR_WS_MODULES . 'plugnpay_api.php');
    $payment_modules->before_process();
  }



//insert order total

  for ($i=0, $n=sizeof($order_totals); $i<$n; $i++) {
    $sql_data_array = array('orders_id' => $insert_id,
                            'title' => $order_totals[$i]['title'],
                            'text' => $order_totals[$i]['text'],
                            'value' => $order_totals[$i]['value'],
                            'class' => $order_totals[$i]['code'],
                            'sort_order' => $order_totals[$i]['sort_order']);
    tep_db_perform(TABLE_ORDERS_TOTAL, $sql_data_array);
  }

  $customer_notification = (SEND_EMAILS == 'true') ? '1' : '0';
  $sql_data_array = array('orders_id' => $insert_id,
                          'orders_status_id' => $order->info['order_status'],
                          'date_added' => 'now()',
                          'customer_notified' => $customer_notification,
                          'comments' => $order->info['comments']);
  tep_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);

// initialized for the email confirmation
  $products_ordered = '';
  $subtotal = 0;
  $total_tax = 0;

  for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
// Stock Update - Joao Correia
    if (STOCK_LIMITED == 'true') {
      $downloadable_product = false;
      if (DOWNLOAD_ENABLED == 'true') {
        // see if this product actually has a downloadable file in the attributes
        $download_check_query_raw = "SELECT products_quantity, pad.products_attributes_filename
                            FROM " . TABLE_PRODUCTS . " p, 
                            " . TABLE_PRODUCTS_ATTRIBUTES . " pa,
                            " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad
                             WHERE p.products_id = '" . tep_get_prid($order->products[$i]['id']) . "'
                             and p.products_id=pa.products_id
                             and pad.products_attributes_id=pa.products_attributes_id ";
                             
        $download_check_query = tep_db_query($download_check_query_raw);
        if (tep_db_num_rows($download_check_query) > 0) {
          $downloadable_product = true;
        }
      }  // end of downloadable product check
      if ( !$downloadable_product ) {
        $stock_query = tep_db_query("select products_quantity from " . TABLE_PRODUCTS . " where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");
        $stock_values = tep_db_fetch_array($stock_query);
        $stock_left = $stock_values['products_quantity'] - $order->products[$i]['qty'];
        tep_db_query("update " . TABLE_PRODUCTS . " set products_quantity = '" . $stock_left . "' where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");
        if ( ($stock_left < 1) && (STOCK_ALLOW_CHECKOUT == 'false') ) {
          tep_db_query("update " . TABLE_PRODUCTS . " set products_status = '0' where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");
        }
      }
    }

// Update products_ordered (for bestsellers list)
    tep_db_query("update " . TABLE_PRODUCTS . " set products_ordered = products_ordered + " . sprintf('%d', $order->products[$i]['qty']) . " where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");

    $sql_data_array = array('orders_id' => $insert_id,
                            'products_id' => tep_get_prid($order->products[$i]['id']),
                            'products_model' => $order->products[$i]['model'],
                            'products_name' => $order->products[$i]['name'],
                            'products_price' => $order->products[$i]['price'],
                            'final_price' => $order->products[$i]['final_price'],
                            'products_tax' => $order->products[$i]['tax'],
                            'products_quantity' => $order->products[$i]['qty']);
    tep_db_perform(TABLE_ORDERS_PRODUCTS, $sql_data_array);
    $order_products_id = tep_db_insert_id();
    $order_total_modules->update_credit_account($i);//ICW ADDED FOR CREDIT CLASS SYSTEM

//------insert customer choosen option to order--------
    $products_ordered_attributes = '';
    if (isset($order->products[$i]['attributes'])) {
      for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
        
        $sql_data_array = array('orders_id' => $insert_id,
                                'orders_products_id' => $order_products_id,
                                'products_options' => $order->products[$i]['attributes'][$j]['option'],
                                'products_options_values' => $order->products[$i]['attributes'][$j]['value'],
                                'options_values_price' => $order->products[$i]['attributes'][$j]['price'],
                                'price_prefix' => $order->products[$i]['attributes'][$j]['prefix'],
                                'products_options_id' => $order->products[$i]['attributes'][$j]['option_id'],
                                'products_options_values_id' => $order->products[$i]['attributes'][$j]['value_id']);
        tep_db_perform(TABLE_ORDERS_PRODUCTS_ATTRIBUTES, $sql_data_array);
        
        if (DOWNLOAD_ENABLED == 'true') {
          $attributes_query = "select pad.products_attributes_maxdays, pad.products_attributes_maxcount , pad.products_attributes_filename
                           from " . TABLE_PRODUCTS_ATTRIBUTES . " pa,
                                " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad
                              where pa.products_id = '" . $order->products[$i]['id'] . "'
                                and pa.options_id = '" . $order->products[$i]['attributes'][$j]['option_id'] . "'
                                and pa.options_values_id = '" . $order->products[$i]['attributes'][$j]['value_id'] . "'
                                and pa.products_attributes_id = pad.products_attributes_id";
          $attributes = tep_db_query($attributes_query);
          
          $attributes_values = tep_db_fetch_array($attributes);
        
          if ( isset($attributes_values['products_attributes_filename']) && tep_not_null($attributes_values['products_attributes_filename']) ) {
            $sql_data_array = array('orders_id' => $insert_id,
                                    'orders_products_id' => $order_products_id,
                                    'orders_products_filename' => $attributes_values['products_attributes_filename'],
                                    'download_maxdays' => $attributes_values['products_attributes_maxdays'],
                                    'download_count' => $attributes_values['products_attributes_maxcount']);
            tep_db_perform(TABLE_ORDERS_PRODUCTS_DOWNLOAD, $sql_data_array);
          }
        }
        $products_ordered_attributes .= "\n\t" . $order->products[$i]['attributes'][$j]['option'] . ' ' . $order->products[$i]['attributes'][$j]['value'] . ' ' . $order->products[$i]['attributes'][$j]['prefix'] . ' ' . $currencies->display_price($order->products[$i]['attributes'][$j]['price'], tep_get_tax_rate($products[$i]['tax_class_id']), 1);
      }
    }
//------insert customer choosen option eof ----
    $total_weight += ($order->products[$i]['qty'] * $order->products[$i]['weight']);
    $total_tax += tep_calculate_tax($total_products_price, $products_tax) * $order->products[$i]['qty'];
    $total_cost += $total_products_price;

    $products_ordered .= $order->products[$i]['qty'] . ' x ' . $order->products[$i]['name'] . ' (' . $order->products[$i]['model'] . ') = ' . $currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']) . $products_ordered_attributes . "\n";
  }
$order_total_modules->apply_credit();//ICW ADDED FOR CREDIT CLASS SYSTEM
// lets start with the email confirmation

  // Include OSC-AFFILIATE
  require(DIR_WS_INCLUDES . 'affiliate_checkout_process.php');

  if (!tep_session_is_registered('noaccount'))
{
$email_order = STORE_NAME . "\n" .
EMAIL_SEPARATOR . "\n" .
EMAIL_TEXT_ORDER_NUMBER . ' ' . $insert_id . "\n" .
EMAIL_TEXT_INVOICE_URL . ' ' . tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $insert_id, 'SSL', false) . "\n" .
EMAIL_TEXT_DATE_ORDERED . ' ' . strftime(DATE_FORMAT_LONG) . "\n\n";
}else{
$email_order = STORE_NAME . "\n" .
EMAIL_SEPARATOR . "\n" .
EMAIL_TEXT_ORDER_NUMBER . ' ' . $insert_id . "\n" .
EMAIL_TEXT_DATE_ORDERED . ' ' . strftime(DATE_FORMAT_LONG) . "\n\n";
}

// EOF: daithik change for PWA

  if ($order->info['comments']) {
    $email_order .= tep_db_output($order->info['comments']) . "\n\n";
  }
  $email_order .= EMAIL_TEXT_PRODUCTS . "\n" .
                  EMAIL_SEPARATOR . "\n" .
                  $products_ordered .
                  EMAIL_SEPARATOR . "\n";

  for ($i=0, $n=sizeof($order_totals); $i<$n; $i++) {
    $email_order .= strip_tags($order_totals[$i]['title']) . ' ' . strip_tags($order_totals[$i]['text']) . "\n";
  }

  if ($order->content_type != 'virtual') {
    $email_order .= "\n" . EMAIL_TEXT_DELIVERY_ADDRESS . "\n" .
                    EMAIL_SEPARATOR . "\n" .
                    tep_address_label($customer_id, $sendto, 0, '', "\n") . "\n";
  }

  $email_order .= "\n" . EMAIL_TEXT_BILLING_ADDRESS . "\n" .
                  EMAIL_SEPARATOR . "\n" .
                  tep_address_label($customer_id, $billto, 0, '', "\n") . "\n\n";
  if (is_object($$payment)) {
    $email_order .= EMAIL_TEXT_PAYMENT_METHOD . "\n" .
                    EMAIL_SEPARATOR . "\n";
    $payment_class = $$payment;
    $email_order .= $payment_class->title . "\n\n";
    if ($payment_class->email_footer) {
      $email_order .= $payment_class->email_footer . "\n\n";
    }
  }
  
  tep_mail($order->customer['firstname'] . ' ' . $order->customer['lastname'], $order->customer['email_address'], EMAIL_TEXT_SUBJECT, $email_order, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);

// send emails to other people
  if (SEND_EXTRA_ORDER_EMAILS_TO != '') {
    tep_mail('', SEND_EXTRA_ORDER_EMAILS_TO, EMAIL_TEXT_SUBJECT, $email_order, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
  }

// load the after_process function from the payment modules
  $payment_modules->after_process();
  
// AFSv1.0 - record the customers order and ip address info for fraud screening process

$ip = $REMOTE_ADDR;
$proxy = $HTTP_X_FORWARDED_FOR;
if($proxy != ''){ $ip = $proxy; }
$sql_data_array = array( 'order_id' => $insert_id,
'ip_address' => $ip);

tep_db_perform('algozone_fraud_queries', $sql_data_array);

// End AFSv1.0
  $cart->reset(true);

// unregister session variables used during checkout
  tep_session_unregister('sendto');
  tep_session_unregister('billto');
  tep_session_unregister('shipping');
  tep_session_unregister('payment');
  tep_session_unregister('comments');
  if(tep_session_is_registered('credit_covers')) tep_session_unregister('credit_covers');
  $order_total_modules->clear_posts();//ICW ADDED FOR CREDIT CLASS SYSTEM
// BOF: Lango added for print order mod
  tep_redirect(tep_href_link(FILENAME_CHECKOUT_SUCCESS, 'order_id='. $insert_id, 'SSL'));
// EOF: Lango added for print order mod
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
