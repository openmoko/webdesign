<?php
/*
  paypal_dp.php, v 1.0 09/06/2005

  Copyright (c) 2005 POSTOSC.COM

  Released under the GNU General Public License

  Absolutely no warranty. Use at your own risk.
*/

include_once(realpath(dirname(__FILE__) . '/../../../pear/configure.php'));
  
class paypal_dp {
  var $code, $title, $description, $enabled;

  function paypal_dp() {
    global $order;

    $this->code = 'paypal_dp';
    $this->title = MODULE_PAYMENT_PAYPAL_DP_TEXT_TITLE;
    $this->description = MODULE_PAYMENT_PAYPAL_DP_TEXT_DESCRIPTION;
    $this->sort_order = MODULE_PAYMENT_PAYPAL_DP_SORT_ORDER;
    $this->enabled = ((MODULE_PAYMENT_PAYPAL_DP_STATUS == 'True') ? true : false);

    if((int)MODULE_PAYMENT_PAYPAL_DP_ORDER_STATUS_ID > 0) $this->order_status = MODULE_PAYMENT_PAYPAL_DP_ORDER_STATUS_ID;
    if(is_object($order)) $this->update_status();
  }

  function update_status() {
    global $order;

    if(($this->enabled == true) && ((int)MODULE_PAYMENT_PAYPAL_DP_ZONE > 0)) {
      $check_flag = false;
      $check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_PAYPAL_DP_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");

      while($check = tep_db_fetch_array($check_query)) {
        if($check['zone_id'] < 1) {
          $check_flag = true;
          break;
        } elseif ($check['zone_id'] == $order->billing['zone_id']) {
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
    $js = '  if (payment_value == "' . $this->code . '") {' . "\n" .
      '    var paypal_cc_firstname = document.checkout_payment.paypal_cc_firstname.value;' . "\n" .
      '    var paypal_cc_lastname = document.checkout_payment.paypal_cc_lastname.value;' . "\n" .
      '    var paypal_cc_number = document.checkout_payment.paypal_cc_number.value;' . "\n" .
      '    var paypal_cc_cvv2 = document.checkout_payment.paypal_cc_cvv2.value;' . "\n" .
      '    if (paypal_cc_firstname == "" || paypal_cc_firstname.length < ' . ENTRY_FIRST_NAME_MIN_LENGTH . ') {' . "\n" .
      '      error_message = error_message + "' . MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_FIRSTNAME . '";' . "\n" .
      '      error = 1;' . "\n" .
      '    }' . "\n" .
      '    if (paypal_cc_lastname == "" || paypal_cc_lastname.length < ' . ENTRY_LAST_NAME_MIN_LENGTH . ') {' . "\n" .
      '      error_message = error_message + "' . MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_LASTNAME . '";' . "\n" .
      '      error = 1;' . "\n" .
      '    }' . "\n" .
      '    if (paypal_cc_number == "" || paypal_cc_number.length < ' . CC_NUMBER_MIN_LENGTH . ') {' . "\n" .
      '      error_message = error_message + "' . MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_NUMBER . '";' . "\n" .
      '      error = 1;' . "\n" .
      '    }' . "\n" .
      '    if (paypal_cc_cvv2.length > 4) {' . "\n" .
      '      error_message = error_message + "' . MODULE_PAYMENT_PAYPAL_DP_TEXT_JS_CC_CVV2 . '";' . "\n" .
      '      error = 1;' . "\n" .
      '    }' . "\n" .
      '  }' . "\n";

    return $js;
  }

  function selection() {
    global $order;

    for($i = 1; $i < 13; $i++) {
      $expires_month[] = array('id' => sprintf('%02d', $i), 'text' => strftime('%B',mktime(0,0,0,$i,1,2000)));
    }

    $today = getdate();
    
    for($i = $today['year']; $i < $today['year'] + 10; $i++) {
      $expires_year[] = array('id' => strftime('%y',mktime(0,0,0,1,1,$i)), 'text' => strftime('%Y',mktime(0,0,0,1,1,$i)));
    }

    $selection = array('id' => $this->code,
                     'module' => MODULE_PAYMENT_PAYPAL_DP_IMAGE_DESCRIPTION,
                     'fields' => array(array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_FIRSTNAME,
                                             'field' => tep_draw_input_field('paypal_cc_firstname', $order->billing['firstname'])),
                       array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_LASTNAME,
                                             'field' => tep_draw_input_field('paypal_cc_lastname', $order->billing['lastname'])),
                                       array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_NUMBER,
                                             'field' => tep_draw_input_field('paypal_cc_number')),
                                       array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_CVV2,
                                             'field' => tep_draw_input_field('paypal_cc_cvv2')),
                       array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_EXPIRES,
                                             'field' => tep_draw_pull_down_menu('paypal_cc_expires_month', $expires_month) . '&nbsp;' . tep_draw_pull_down_menu('paypal_cc_expires_year', $expires_year))));

    return $selection;
    }

    function pre_confirmation_check() {
    global $HTTP_POST_VARS, $order;

    include(DIR_WS_CLASSES . 'cc_validation1.php');

    $cc_validation = new cc_validation();
    $result = $cc_validation->validate($HTTP_POST_VARS['paypal_cc_number'], $HTTP_POST_VARS['paypal_cc_expires_month'], $HTTP_POST_VARS['paypal_cc_expires_year']);

    $error = '';
    
    switch($result) {
      case -1:
        $error = sprintf(TEXT_CCVAL_ERROR_UNKNOWN_CARD, substr($cc_validation->cc_number, 0, 4));
        break;
      case -2:
      case -3:
      case -4:
        $error = TEXT_CCVAL_ERROR_INVALID_DATE;
        break;
      case false:
        $error = TEXT_CCVAL_ERROR_INVALID_NUMBER;
        break;
    }

    if(($result == false) || ($result < 1)) {
      $payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&cc_owner=' . urlencode($HTTP_POST_VARS['paypal_cc_owner']) . '&cc_expires_month=' . $HTTP_POST_VARS['paypal_cc_expires_month'] . '&cc_expires_year=' . $HTTP_POST_VARS['paypal_cc_expires_year'];
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
    }

    switch($cc_validation->cc_type) {
      case 'Master Card':
        $this->cc_card_type = 'MasterCard';
        break;
      case 'Mastercard':
        $this->cc_card_type = 'MasterCard';
        break;
      case 'American Express':
        $this->cc_card_type = 'Amex';
        break;
      default:
        $this->cc_card_type = $cc_validation->cc_type; // Visa, Discover
        break;
    }

    $this->cc_card_number = $cc_validation->cc_number;
    $this->cc_expires_month = $cc_validation->cc_expiry_month;
    $this->cc_expires_year = $cc_validation->cc_expiry_year;
    //$this->cc_cvv2 = $HTTP_POST_VARS['cc_cvv2'];

  }

    function confirmation() {
    global $HTTP_POST_VARS;

    $confirmation = array('title' => MODULE_PAYMENT_PAYPAL_DP_CLIENT_DESCRIPTION . ': ' . $this->cc_card_type,
                        'fields' => array(array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_FIRSTNAME,
                                                'field' => $HTTP_POST_VARS['paypal_cc_firstname']),
                                  array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_LASTNAME,
                                                'field' => $HTTP_POST_VARS['paypal_cc_lastname']),
                        array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_NUMBER,
                                                'field' => substr($this->cc_card_number, 0, 4) . str_repeat('X', (strlen($this->cc_card_number) - 8)) . substr($this->cc_card_number, -4)),
                                          array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_CVV2,
                                                'field' => $HTTP_POST_VARS['paypal_cc_cvv2']),
                                          array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_CREDIT_CARD_EXPIRES,
                                                'field' => strftime('%B, %Y', mktime(0,0,0,$HTTP_POST_VARS['paypal_cc_expires_month'], 1, '20' . $HTTP_POST_VARS['paypal_cc_expires_year'])))));

    return $confirmation;
    }

    function process_button() {
    global $HTTP_POST_VARS;
    $process_button_string = tep_draw_hidden_field('paypal_cc_firstname', $HTTP_POST_VARS['paypal_cc_firstname']) .
                 tep_draw_hidden_field('paypal_cc_lastname', $HTTP_POST_VARS['paypal_cc_lastname']) .
                           tep_draw_hidden_field('paypal_cc_expires_month', $this->cc_expires_month) .
                           tep_draw_hidden_field('paypal_cc_expires_year', $this->cc_expires_year) .
                           tep_draw_hidden_field('paypal_cc_type', $this->cc_card_type) .
                           tep_draw_hidden_field('paypal_cc_number', $this->cc_card_number) .
                 tep_draw_hidden_field('paypal_cc_cvv2', $HTTP_POST_VARS['paypal_cc_cvv2']);

    return $process_button_string;
    }

    function before_process() {
    global $HTTP_POST_VARS, $order;

    $order->info['cc_type'] = tep_db_input($HTTP_POST_VARS['paypal_cc_type']);
    //bug fix module not saving whole credit card number 3/15/2006
    $order->info['cc_number'] = (int)$HTTP_POST_VARS['paypal_cc_number'];
    //$order->info['cc_number'] = substr($HTTP_POST_VARS['paypal_cc_number'], 0, 4) . str_repeat('X', (strlen($HTTP_POST_VARS['paypal_cc_number']) - 8)) . substr($HTTP_POST_VARS['paypal_cc_number'], -4);
    //end bug fix 3/15 /2006
    $order->info['cc_owner'] = tep_db_input($HTTP_POST_VARS['paypal_cc_firstname']). ' ' .tep_db_input($HTTP_POST_VARS['paypal_cc_lastname']);
    //bug fix from standard cre 6.2 paypal_dp.php 3/12/2006
    //only expires year was being saved to the database
    $order->info['cc_expires'] = (int)$HTTP_POST_VARS['paypal_cc_expires_month'] . (int)$HTTP_POST_VARS['paypal_cc_expires_year'] ;
    //end bug fix 3/12/2006

    $this->cc_middle = substr($HTTP_POST_VARS['paypal_cc_number'], 4, strlen($HTTP_POST_VARS['paypal_cc_number']) - 8);
    $this->cc_expires_month = (int)$HTTP_POST_VARS['paypal_cc_expires_month'];
    //bug fix from standard cre 6.2 paypal_dp.php 3/12/2006
    //adding missing cc expires year and CVV number so they are available in
    //the after_process function
    $this->cc_expires_year = (int)$HTTP_POST_VARS['paypal_cc_expires_year'];
    $this->cc_cvv = (int)$HTTP_POST_VARS['paypal_cc_cvv2'];
    //end bug fix 3/12/2006

    require_once('Services/PayPal.php');
    require_once('Services/PayPal/Profile/Handler/Array.php');
    require_once('Services/PayPal/Profile/API.php');
    require_once('Log.php');

    if(MODULE_PAYMENT_PAYPAL_DP_LOG_LEVEL == 'Debug')
      $logLevel = PEAR_LOG_DEBUG;
    elseif(MODULE_PAYMENT_PAYPAL_DP_LOG_LEVEL == 'Off')
      $logLevel = PEAR_LOG_NONE;
    else
      $logLevel = PEAR_LOG_INFO;

    $certfile = MODULE_PAYMENT_PAYPAL_DP_CERT_FILE;
    $certpass = '';
    $apiusername = MODULE_PAYMENT_PAYPAL_DP_USERNAME;
    $apipassword = MODULE_PAYMENT_PAYPAL_DP_PASSWORD;
    $subject = '';
    $environment = MODULE_PAYMENT_PAYPAL_DP_GATEWAY_SERVER;

    $handler =& ProfileHandler_Array::getInstance(array(
      'username' => $apiusername,
        'certificateFile' => $certfile,
        'subject' => $subject,
        'environment' => $environment));

    $profile =& APIProfile::getInstance($apiusername, $handler);
    $profile->setAPIPassword($apipassword);

    $caller =& Services_PayPal::getCallerServices($profile, $logLevel, MODULE_PAYMENT_PAYPAL_DP_LOG_DIR);

    if(Services_PayPal::isError($caller)) {
      // print $caller->getMessage();
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_PAYPAL_DP_TEXT_PROCESS_ERROR), 'SSL', true, false));
    }

    $name =& Services_PayPal::getType('PersonNameType');
    $name->setFirstName(tep_db_input($HTTP_POST_VARS['paypal_cc_firstname']));
    $name->setLastName(tep_db_input($HTTP_POST_VARS['paypal_cc_lastname']));

    if($order->billing['zone_id']) {
      $zone_query = tep_db_query("select zone_code from ". TABLE_ZONES . " where zone_id = '".$order->billing['zone_id']."'");
      $zone = tep_db_fetch_array($zone_query);
      $state = $zone['zone_code'];
    } else {
      $state = $order->billing['state'];
    }

    $address =& Services_PayPal::getType('AddressType');
    $address->setStreet1($order->billing['street_address']);
    $address->setCityName($order->billing['city']);
    $address->setStateOrProvince($state);
    $address->setCountry($order->billing['country']['iso_code_2']);
    $address->setPostalCode($order->billing['postcode']);

    $payer =& Services_PayPal::getType('PayerInfoType');
    $payer->setPayer($order->customer['email_address']);
    //$payer->setPayerID($order->customer['email_address']);
    //$payer->setPayerStatus('verified');
    $payer->setPayerName($name);
    //$payer->setPayerCountry($order->billing['country']['iso_code_2']);
    $payer->setAddress($address);

    $cc =& Services_PayPal::getType('CreditCardDetailsType');
    $cc->setCreditCardType(tep_db_input($HTTP_POST_VARS['paypal_cc_type']));
    $cc->setCreditCardNumber($HTTP_POST_VARS['paypal_cc_number']);
    $cc->setExpMonth((int)$HTTP_POST_VARS['paypal_cc_expires_month']);
    $cc->setExpYear((int)$HTTP_POST_VARS['paypal_cc_expires_year']);
    $cc->setCVV2((int)$HTTP_POST_VARS['paypal_cc_cvv2']);
    $cc->setCardOwner($payer);

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
        //$payment_item[$i]->setSalesTax(number_format($order->products[$i]['tax'], 2));
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
    
    $pdt->setButtonSource(POSTOSC_PRODUCT_NAME);

    $details =& Services_PayPal::getType('DoDirectPaymentRequestDetailsType');
    $details->setPaymentAction(MODULE_PAYMENT_PAYPAL_DP_PAYMENT_ACTION);
    $details->setPaymentDetails($pdt);
    $details->setCreditCard($cc);
    $details->setIPAddress(getenv('REMOTE_ADDR'));
    $details->setMerchantSessionId(tep_session_id());

    $ddp =& Services_PayPal::getType('DoDirectPaymentRequestType');
    $ddp->setDoDirectPaymentRequestDetails($details);

    $response = $caller->DoDirectPayment($ddp);

    if(Services_PayPal::isError($response)) {
      $msg           = $response->getErrors();
      $shortMessage  = $msg->getShortMessage();
      $longMessage   = $msg->getLongMessage();
      $errorCode     = $msg->getErrorCode();
      if (MODULE_PAYMENT_PAYPAL_DP_FAILURE_EMAIL == 'No') {
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode($shortMessage.' ('.$errorCode.')  - '.$longMessage), 'SSL', true, false));
      } else {
        //$this->order_status = MODULE_PAYMENT_PAYPAL_DP_FAILURE_STATUS;
        //bug fix from standard cre 6.2 3/12/2006
        //not sure if the other set order_status code above is needed. it does not seem to do anything
        //so I have commented it out
        $order->info['order_status'] = MODULE_PAYMENT_PAYPAL_DP_FAILURE_STATUS;
        //end bug fix 3/12/2006
      }
    } elseif($response->getAck() != 'Success' && $response->getAck() != 'SuccessWithWarning') {
      $msg           = $response->getErrors();
      $shortMessage  = $msg->getShortMessage();
      $longMessage   = $msg->getLongMessage();
      $errorCode     = $msg->getErrorCode();
      if (MODULE_PAYMENT_PAYPAL_DP_FAILURE_EMAIL == 'No') {
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode($shortMessage.' ('.$errorCode.')  - '.$longMessage), 'SSL', true, false));
      } else {
        //$this->order_status = MODULE_PAYMENT_PAYPAL_DP_FAILURE_STATUS;
        //bug fix from standard cre 6.2 3/12/2006
        //not sure if the other set order_status code above is needed. it does not seem to do anything
        //so I have commented it out
        $order->info['order_status'] = MODULE_PAYMENT_PAYPAL_DP_FAILURE_STATUS;
        //end bug fix 3/12/2006
      }
    } else {
      //$details = $response->getDoDirectPaymentResponseDetails();
      $this->trans_id = $response->getTransactionID();
      $this->avs = $response->getAVSCode();
      $this->cvv2 = $response->getCVV2Code();
    }
    }

    function after_process() {
    global $insert_id;

    if($this->trans_id) {
      tep_db_query("update ".TABLE_ORDERS_STATUS_HISTORY. " set comments = concat(if(trim(comments) != '', concat(trim(comments), '\n'), ''), 'Transaction ID: ".$this->trans_id."\nPayment Type: credit card\nPayment Status: Completed\nAVS Code: ".$this->avs."\nCVV2 Code: ".$this->cvv2."') where orders_id = ".$insert_id);
    } elseif (MODULE_PAYMENT_PAYPAL_DP_FAILURE_EMAIL == 'Yes') {
      $email_order = "Order#: ".$insert_id."\n\r";
      $email_order .= "Card Middile Number: ".$this->cc_middle."\n\r";
      //bug fix from standard 6.2 paypal_db.php 3/12/2006
      //adding expires year to manual processing e-mail
      $email_order .= "Card Expires Month: ".$this->cc_expires_month . "/" . $this->cc_expires_year ."\n\r";
      //note per Visa / MC rules you are not supposed to store the CVV number.
      //Storing the number anywhere could result in loss of your ability to accept
      //credit cards. Uncomment this line at your own risk.
      $email_order .= "CVV: ".$this->cc_cvv;
      //end bug fix 3/12/2006
      tep_mail('', STORE_OWNER_EMAIL_ADDRESS, 'Order Failure', $email_order, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
    }
  }

    function get_error() {
    global $HTTP_GET_VARS;

    $error = array('title' => MODULE_PAYMENT_PAYPAL_DP_TEXT_ERROR,
                 'error' => stripslashes(urldecode($HTTP_GET_VARS['error'])));

    return $error;
    }

    function check() {
    if(!isset($this->_check)) {
      $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYPAL_DP_STATUS'");
      $this->_check = tep_db_num_rows($check_query);
    }
    
    return $this->_check;
    }

    function install() {
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PayPal Direct Payment Module', 'MODULE_PAYMENT_PAYPAL_DP_STATUS', 'True', 'Do you want to accept credit card payments through PayPal Direct Payment?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_PAYMENT_PAYPAL_DP_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '1' , now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('Payment Zone', 'MODULE_PAYMENT_PAYPAL_DP_ZONE', '0', 'If a zone is selected, only enable this payment method for that zone.', '6', '2', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_PAYMENT_PAYPAL_DP_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value.', '6', '3', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Gateway Server', 'MODULE_PAYMENT_PAYPAL_DP_GATEWAY_SERVER', 'Sandbox', 'Use the testing (sandbox) or live gateway server for transactions?', '6', '4', 'tep_cfg_select_option(array(\'Sandbox\',\'Live\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('API Certificate File', 'MODULE_PAYMENT_PAYPAL_DP_CERT_FILE', '', 'Enter the absolute path of your API certificate file.', '6', '5', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('API Account Username', 'MODULE_PAYMENT_PAYPAL_DP_USERNAME', '', 'Enter your username for PayPal API account.', '6', '6', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('API Account Password', 'MODULE_PAYMENT_PAYPAL_DP_PASSWORD', '', 'Enter your password for PayPal API account.', '6', '7', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Payment Action', 'MODULE_PAYMENT_PAYPAL_DP_PAYMENT_ACTION', 'Sale', 'Sale or Authorization (Capture later)?', '6', '9',  'tep_cfg_select_option(array(\'Sale\', \'Authorization\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Manual Processing if Failed', 'MODULE_PAYMENT_PAYPAL_DP_FAILURE_EMAIL', 'Yes', 'Do you want to receive credit card information by email if failed?', '6', '10',  'tep_cfg_select_option(array(\'Yes\', \'No\'), ', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Order Status if Failed', 'MODULE_PAYMENT_PAYPAL_DP_FAILURE_STATUS', '1', 'Order status for manual processing.', '6', '11', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Log Level', 'MODULE_PAYMENT_PAYPAL_DP_LOG_LEVEL', 'Off', 'Do you want to turn on logging?', '6', '12', 'tep_cfg_select_option(array(\'Debug\', \'Normal\', \'Off\'), ',now())");
    tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Log Directory', 'MODULE_PAYMENT_PAYPAL_DP_LOG_DIR', '', 'Enter the absolute path to your log directory. It must be writable.', '6', '13', now())");
  }

    function remove() {
    tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
  }

    function keys() {
    return array('MODULE_PAYMENT_PAYPAL_DP_STATUS', 'MODULE_PAYMENT_PAYPAL_DP_ZONE', 'MODULE_PAYMENT_PAYPAL_DP_ORDER_STATUS_ID', 'MODULE_PAYMENT_PAYPAL_DP_SORT_ORDER', 'MODULE_PAYMENT_PAYPAL_DP_GATEWAY_SERVER', 'MODULE_PAYMENT_PAYPAL_DP_CERT_FILE', 'MODULE_PAYMENT_PAYPAL_DP_USERNAME', 'MODULE_PAYMENT_PAYPAL_DP_PASSWORD', 'MODULE_PAYMENT_PAYPAL_DP_LOG_LEVEL', 'MODULE_PAYMENT_PAYPAL_DP_LOG_DIR', 'MODULE_PAYMENT_PAYPAL_DP_PAYMENT_ACTION', 'MODULE_PAYMENT_PAYPAL_DP_FAILURE_EMAIL', 'MODULE_PAYMENT_PAYPAL_DP_FAILURE_STATUS');
    }
}
?>
