<?php
/*
  paypal_ec.php, v 1.0 09/06/2005

  Copyright (c) 2005 POSTOSC.COM

  Released under the GNU General Public License
  
  Absolutely no warranty. Use at your own risk.
*/

include_once(realpath(dirname(__FILE__) . '/../../../pear/configure.php'));

require_once('Services/PayPal.php');
require_once('Services/PayPal/Profile/Handler/Array.php');
require_once('Services/PayPal/Profile/API.php');
require_once('Log.php');

class paypal_ec {
  var $code, $title, $description, $enabled, $paypal_url;

  function paypal_ec() {
    global $order;

    $this->code = 'paypal_ec';
    $this->title = MODULE_PAYMENT_PAYPAL_EC_TEXT_TITLE;
    $this->description = MODULE_PAYMENT_PAYPAL_EC_TEXT_DESCRIPTION;
    $this->sort_order = MODULE_PAYMENT_PAYPAL_EC_SORT_ORDER;
    $this->enabled = ((MODULE_PAYMENT_PAYPAL_EC_STATUS == 'True') ? true : false);

    if((int)MODULE_PAYMENT_PAYPAL_EC_ORDER_STATUS_ID > 0) $this->order_status = MODULE_PAYMENT_PAYPAL_EC_ORDER_STATUS_ID;
    if(is_object($order)) $this->update_status();

    if(MODULE_PAYMENT_PAYPAL_EC_GATEWAY_SERVER == 'Live') {
      $this->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
    } else {
      $this->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
    }
    }
    
  function get_caller() {
    $certfile = MODULE_PAYMENT_PAYPAL_EC_CERT_FILE;
    $certpass = '';
    $apiusername = MODULE_PAYMENT_PAYPAL_EC_USERNAME;
    $apipassword = MODULE_PAYMENT_PAYPAL_EC_PASSWORD;
    $subject = '';
    $environment = MODULE_PAYMENT_PAYPAL_EC_GATEWAY_SERVER;

    $handler =& ProfileHandler_Array::getInstance(array(
      'username' => $apiusername,
      'certificateFile' => $certfile,
      'subject' => $subject,
      'environment' => $environment));

    $profile =& APIProfile::getInstance($apiusername, $handler);
    $profile->setAPIPassword($apipassword);
    $profile->setAPIPassword($apipassword);

    if(MODULE_PAYMENT_PAYPAL_EC_LOG_LEVEL == 'Debug')
      $logLevel = PEAR_LOG_DEBUG;
    elseif(MODULE_PAYMENT_PAYPAL_EC_LOG_LEVEL == 'Off')
      $logLevel = PEAR_LOG_NONE;
    else
      $logLevel = PEAR_LOG_INFO;

    $caller =& Services_PayPal::getCallerServices($profile, $logLevel, MODULE_PAYMENT_PAYPAL_EC_LOG_DIR);

    if(Services_PayPal::isError($caller)) {
      //print "Could not create CallerServices instance: ". $caller->getMessage();
      $payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode(MODULE_PAYMENT_PAYPAL_EC_TEXT_PROCESS_ERROR);
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
    } else {
      return $caller;
    }
  }
  
  function update_status() {
    global $order;

    if(($this->enabled == true) && ((int)MODULE_PAYMENT_PAYPAL_EC_ZONE > 0)) {
      $check_flag = false;
      $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYPAL_EC_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");

      while($check = tep_db_fetch_array($check_query)) {
          if($check['zone_id'] < 1) {
          $check_flag = true;
          break;
          } elseif($check['zone_id'] == $order->billing['zone_id']) {
          $check_flag = true;
          break;
          }
      }

      if($check_flag == false) {
        $this->enabled = false;
      }
    }
    }

    function javascript_validation() {
    return false;
    }

    function selection() {
    return array('id' => $this->code,
          'module' => MODULE_PAYMENT_PAYPAL_EC_IMAGE_DESCRIPTION);
    }

    function pre_confirmation_check() {
    global $order, $languages_id, $paypal_token, $paypal_payer_id;
    
    $caller = $this->get_caller();

    if(!tep_session_is_registered('paypal_token')) {
      // redirect user to paypal site
      $amount =& Services_PayPal::getType('BasicAmountType');
      $amount->setval(number_format($order->info['total'], 2));
      $amount->setattr('currencyID', $order->info['currency']); // only USD supported

      $ecd =& Services_PayPal::getType('SetExpressCheckoutRequestDetailsType');
      $ecd->setOrderTotal($amount);
      $ecd->setReturnURL(tep_href_link('ext/modules/payment/paypal_wpp/ec.php', '', 'SSL'));
      $ecd->setCancelURL(tep_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL'));
      $ecd->setNoShipping(1); // don't display shipping address at paypal site so user can't change it

      if(MODULE_PAYMENT_PAYPAL_EC_REQUIRE_CONFIRMED == 'Yes') {
        $ecd->setReqConfirmShipping(1);
      }

      // display local page when user gets to paypal site
      $language_code = "US";
      $languages_query = tep_db_query("select code from " . TABLE_LANGUAGES . " where languages_id = ".$languages_id);

      if(tep_db_num_rows($languages_query) > 0) {
        $languages = tep_db_fetch_array($languages_query);

        switch ($languages['code']) {
          case 'en':
              // default
              break;
          case 'de':
              $language_code = 'DE';
              break;
          case 'fr':
              $language_code = 'FR';
              break;
          case 'it':
              $language_code = 'IT';
              break;
          case 'ja':
              $language_code = 'JP';
              break;
          default:
            break;
        }
      }

      $ecd->setLocaleCode($language_code);

      if(MODULE_PAYMENT_PAYPAL_EC_PAGE_STYLE) {
        $ecd->setPageStyle(MODULE_PAYMENT_PAYPAL_EC_PAGE_STYLE);
      }
/*
      if(MODULE_PAYMENT_PAYPAL_EC_HEADER_IMAGE) {
        $ecd->setcpp_header_image(urlencode(MODULE_PAYMENT_PAYPAL_EC_HEADER_IMAGE));
      }

      if(MODULE_PAYMENT_PAYPAL_EC_BORDER_COLOR) {
        $ecd->setcpp_header_border_color(MODULE_PAYMENT_PAYPAL_EC_BORDER_COLOR);
      }

      if(MODULE_PAYMENT_PAYPAL_EC_BACK_COLOR) {
        $ecd->setcpp_header_back_color(MODULE_PAYMENT_PAYPAL_EC_BACK_COLOR);
      }

      if(MODULE_PAYMENT_PAYPAL_EC_PAYFLOW_COLOR) {
        $ecd->setcpp_payflow_color(MODULE_PAYMENT_PAYPAL_EC_PAYFLOW_COLOR);
      }
*/
      $ecd->setBuyerEmail($order->customer['email_address']);

      $ec =& Services_PayPal::getType('SetExpressCheckoutRequestType');
      $ec->setSetExpressCheckoutRequestDetails($ecd);

      $response = $caller->SetExpressCheckout($ec);

      if(Services_PayPal::isError($response)  || ($response->getAck() != 'Success' && $response->getAck() != 'SuccessWithWarning')) {
        $payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode(MODULE_PAYMENT_PAYPAL_EC_TEXT_PROCESS_ERROR);
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
      } else {
        $paypal_token = $response->getToken();
        tep_redirect($this->paypal_url."?cmd=_express-checkout&token=".$paypal_token); // https response 302 "object moved" ?
      }
    } elseif(!tep_session_is_registered('paypal_payer_id')) {
      // user comes back from paypal site
      $ecd =& Services_PayPal::getType('GetExpressCheckoutDetailsRequestType');
      $ecd->setToken($paypal_token);
      $response = $caller->GetExpressCheckoutDetails($ecd);

      if(Services_PayPal::isError($response)  || ($response->getAck() != 'Success' && $response->getAck() != 'SuccessWithWarning')) {
        tep_session_unregister($paypal_token);
        $payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode(MODULE_PAYMENT_PAYPAL_EC_TEXT_PROCESS_ERROR);
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
      } else {
        $details = $response->getGetExpressCheckoutDetailsResponseDetails();
        $payer_info = $details->getPayerInfo();

        if(!tep_session_is_registered('paypal_payer_id'))
          tep_session_register('paypal_payer_id');

        $paypal_payer_id = $payer_info->getPayerID();
      }
    }
    }

    function confirmation() {
    $confirmation = array('title' => MODULE_PAYMENT_PAYPAL_EC_CLIENT_DESCRIPTION);
    return $confirmation;
    }

    function process_button() {
    return "";
    }

    function before_process() {
    global $order, $paypal_token, $paypal_payer_id;
    
    $caller = $this->get_caller();

    $pdt =& Services_PayPal::getType('PaymentDetailsType');
    $order_total =& Services_PayPal::getType('BasicAmountType');
    $order_total->setval(number_format($order->info['total'], 2));
    $order_total->setattr('currencyID', $order->info['currency']);
    $pdt->setOrderTotal($order_total);

    if($order->info['total'] == ($order->info['subtotal'] + $order->info['shipping_cost']+ $order->info['tax'])) {
      $item_total =& Services_PayPal::getType('BasicAmountType');
      $item_total->setval(number_format($order->info['subtotal'], 2));
      $item_total->setattr('currencyID', $order->info['currency']);

      $ship_total =& Services_PayPal::getType('BasicAmountType');
      $ship_total->setval(number_format($order->info['shipping_cost'], 2));
      $ship_total->setattr('currencyID', $order->info['currency']);

      $tax_total =& Services_PayPal::getType('BasicAmountType');
      $tax_total->setval(number_format($order->info['tax'], 2));
      $tax_total->setattr('currencyID', $order->info['currency']);

      $pdt->setItemTotal($item_total);
      $pdt->setShippingTotal($ship_total);
      //$pdt->setHandlingTotal($handling_total);
      $pdt->setTaxTotal($tax_total);
/*
      $payment_item = array();
      $item_tax = 0;
      $item_amount = 0;

      for($i = 0; $i < sizeof($order->products); $i++) {
        $payment_item[$i] =& Services_PayPal::getType('PaymentDetailsItemType');
        $payment_item[$i]->setName($order->products[$i]['name']);
        $amount =& Services_PayPal::getType('BasicAmountType');
        $amount->setval(number_format($order->products[$i]['final_price'], 2));
        $amount->setattr('currencyID', $order->info['currency']);
        $payment_item[$i]->setAmount($amount);
        $payment_item[$i]->setNumber($order->products[$i]['id']);
        $payment_item[$i]->setQuantity($order->products[$i]['qty']);
        $tax =& Services_PayPal::getType('BasicAmountType');
        $tax->setval(number_format($order->products[$i]['tax'], 2));
        $tax->setattr('currencyID', $order->info['currency']);
        $payment_item[$i]->setTax($tax);
        $item_amount += $order->products[$i]['final_price'] * $order->products[$i]['qty'];
        $item_tax += $order->products[$i]['tax'] * $order->products[$i]['qty'];
      }

      if($item_amount == $order->info['subtotal'] && $item_tax == $order->info['tax']) {
        $pdt->setPaymentDetailsItem($payment_item);
      }*/
    }
    
    if($order->delivery['zone_id']) {
      $zone_query = tep_db_query("select zone_code from ". TABLE_ZONES . " where zone_id = '".$order->delivery['zone_id']."'");
      $zone = tep_db_fetch_array($zone_query);
      $ship2state = $zone['zone_code'];
    } else {
      $ship2state = $order->delivery['state'];
    }

    if(($order->delivery['firstname'] || $order->delivery['lastname']) &&
      $order->delivery['street_address'] && $order->delivery['city'] &&
      $order->delivery['country']['iso_code_2']) {
      $ship2address =& Services_PayPal::getType('AddressType');
      $ship2address->setName($order->delivery['firstname'].' '.$order->delivery['lastname']);
      $ship2address->setStreet1($order->delivery['street_address']);
      $ship2address->setCityName($order->delivery['city']);
      $ship2address->setStateOrProvince($ship2state);
      $ship2address->setCountry($order->delivery['country']['iso_code_2']);
      $ship2address->setPostalCode($order->delivery['postcode']);

      $pdt->setShipToAddress($ship2address);
      }
      
    //$pdt->setNotifyURL(tep_href_link('ext/modules/payment/paypal_wpp/ec.php', '', 'SSL', false, false));

    $pdt->setButtonSource(POSTOSC_PRODUCT_NAME);

    $details =& Services_PayPal::getType('DoExpressCheckoutPaymentRequestDetailsType');
    $details->setPaymentAction(MODULE_PAYMENT_PAYPAL_DP_PAYMENT_ACTION);
    $details->setToken($paypal_token);
    $details->setPayerID($paypal_payer_id);
    $details->setPaymentDetails($pdt);

    $ecprt =& Services_PayPal::getType('DoExpressCheckoutPaymentRequestType');
    $ecprt->setDoExpressCheckoutPaymentRequestDetails($details);

    $response = $caller->DoExpressCheckoutPayment($ecprt);

    tep_session_unregister('paypal_token');
    tep_session_unregister('paypal_payer_id');

    if(Services_PayPal::isError($response)  || ($response->getAck() != 'Success' && $response->getAck() != 'SuccessWithWarning')) {
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_PAYPAL_EC_TEXT_PROCESS_ERROR), 'SSL', true, false));
    } else {
      $details = $response->getDoExpressCheckoutPaymentResponseDetails();
      $payment_info = $details->getPaymentInfo();
      $this->trans_id = $payment_info->getTransactionID();
      $this->payment_status = $payment_info->getPaymentStatus();
      $this->payment_type = $payment_info->getPaymentType();

      switch ($this->payment_status) {
        case 'Completed': // default status
          break;
        case 'Pending':
          // set order status to 'Pending'
          $this->pending_reason = $payment_info->getPendingReason();
          $order->info['order_status'] = 1;
          break;
        default:
          tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_PAYPAL_EC_TEXT_DECLINED_MESSAGE), 'SSL', true, false));
          break;
      }
    }
    }

    function after_process() {
    global $insert_id;
    tep_db_query("update ".TABLE_ORDERS_STATUS_HISTORY. " set comments = concat(if(trim(comments) != '', concat(trim(comments), '\n'), ''), 'Transaction ID: ".$this->trans_id."\nPayment Type: ".$this->payment_type."\nPayment Status: ".$this->payment_status.(isset($this->pending_reason) ? '\nPending Reason:'.$this->pending_reason : '')."') where orders_id = ". $insert_id);
    }

    function get_error() {
    global $HTTP_GET_VARS;

    $error = array('title' => MODULE_PAYMENT_PAYPAL_EC_TEXT_ERROR,
                 'error' => stripslashes(urldecode($HTTP_GET_VARS['error'])));

    return $error;
    }

    function check() {
    if(!isset($this->_check)) {
      $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYPAL_EC_STATUS'");
      $this->_check = tep_db_num_rows($check_query);
    }
    
    return $this->_check;
    }

    function install() {
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PayPal Express Checkout Module', 'MODULE_PAYMENT_PAYPAL_EC_STATUS', 'True', 'Do you want to accept credit/debit card payments through PayPal Express Checkout?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_PAYPAL_EC_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '1' , now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_PAYPAL_EC_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_PAYPAL_EC_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value.', '6', '3', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Gateway Server', 'MODULE_PAYMENT_PAYPAL_EC_GATEWAY_SERVER', 'Sandbox', 'Use the testing (sandbox) or live gateway server for transactions?', '6', '4', 'tep_cfg_select_option(array(\'Sandbox\',\'Live\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('API Certificate File', 'MODULE_PAYMENT_PAYPAL_EC_CERT_FILE', '', 'Enter the absolute path of your API certificate file.', '6', '5', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('API Account Username', 'MODULE_PAYMENT_PAYPAL_EC_USERNAME', '', 'Enter your username for PayPal API account.', '6', '6', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('API Account Password', 'MODULE_PAYMENT_PAYPAL_EC_PASSWORD', '', 'Enter your password for PayPal API account.', '6', '7', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Payment Action', 'MODULE_PAYMENT_PAYPAL_EC_PAYMENT_ACTION', 'Sale', 'Sale, Order, or Authorization (Capture later)?', '6', '9',  'tep_cfg_select_option(array(\'Sale\', \'Order\', \'Authorization\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Require Confirmed Address', 'MODULE_PAYMENT_PAYPAL_EC_REQUIRE_CONFIRMED', 'No', 'Do you require that the customers shipping address on file with PayPal be a confirmed address?', '6', '10',  'tep_cfg_select_option(array(\'Yes\', \'No\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayPal Page Style', 'MODULE_PAYMENT_PAYPAL_EC_PAGE_STYLE', '', 'Set the Custom Payment Page Style for payment pages.', '6', '11', now())");
    //tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Header Image', 'MODULE_PAYMENT_PAYPAL_EC_HEADER_IMAGE', '', 'URL of the image you want to appear at the top left of the payment page.', '6', '12', now())");
    //tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Header Border Color', 'MODULE_PAYMENT_PAYPAL_EC_BORDER_COLOR', '', 'Set the border color around the header of the payment page.', '6', '13', now())");
    //tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Header Background Color', 'MODULE_PAYMENT_PAYPAL_EC_BACK_COLOR', '', 'Set the background color for the header of the payment page.', '6', '14', now())");
    //tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Page Background Color', 'MODULE_PAYMENT_PAYPAL_EC_PAYFLOW_COLOR', '', 'Set the background color for the payment page.', '6', '15', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Log Level', 'MODULE_PAYMENT_PAYPAL_EC_LOG_LEVEL', 'Off', 'Do you want to turn on logging?', '6', '16', 'tep_cfg_select_option(array(\'Debug\', \'Normal\', \'Off\'), ',now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Log Directory', 'MODULE_PAYMENT_PAYPAL_EC_LOG_DIR', '', 'Enter the absolute path to your log directory. It must be writable.', '6', '17', now())");
  }

    function remove() {
    tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
  }

    function keys() {
    return array('MODULE_PAYMENT_PAYPAL_EC_STATUS', 'MODULE_PAYMENT_PAYPAL_EC_ZONE', 'MODULE_PAYMENT_PAYPAL_EC_ORDER_STATUS_ID', 'MODULE_PAYMENT_PAYPAL_EC_SORT_ORDER', 'MODULE_PAYMENT_PAYPAL_EC_GATEWAY_SERVER', 'MODULE_PAYMENT_PAYPAL_EC_CERT_FILE', 'MODULE_PAYMENT_PAYPAL_EC_USERNAME', 'MODULE_PAYMENT_PAYPAL_EC_PASSWORD', 'MODULE_PAYMENT_PAYPAL_EC_PAYMENT_ACTION', 'MODULE_PAYMENT_PAYPAL_EC_REQUIRE_CONFIRMED', 'MODULE_PAYMENT_PAYPAL_EC_PAGE_STYLE', //'MODULE_PAYMENT_PAYPAL_EC_HEADER_IMAGE', 'MODULE_PAYMENT_PAYPAL_EC_BORDER_COLOR', 'MODULE_PAYMENT_PAYPAL_EC_BACK_COLOR', 'MODULE_PAYMENT_PAYPAL_EC_PAYFLOW_COLOR',
          'MODULE_PAYMENT_PAYPAL_EC_LOG_LEVEL', 'MODULE_PAYMENT_PAYPAL_EC_LOG_DIR');
    }
  }
?>
