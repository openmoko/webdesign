<?php
/*
  $Id: plugnpay.php,v 1.48 2003/04/10 21:42:30 project3000 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce
  Released under the GNU General Public License

  Last Updated: 10/25/04 
*/

  class plugnpay {
    var $code, $title, $description, $enabled, $sort_order;
    var $accepted_cc, $card_types, $allowed_types;

// class constructor
    function plugnpay() {
      $this->code = 'plugnpay';
      $this->title = MODULE_PAYMENT_PLUGNPAY_TEXT_TITLE;
      $this->description = MODULE_PAYMENT_PLUGNPAY_TEXT_DESCRIPTION;
      $this->sort_order = MODULE_PAYMENT_PLUGNPAY_SORT_ORDER;
      $this->enabled = ((MODULE_PAYMENT_PLUGNPAY_STATUS == 'True') ? true : false);
      $this->accepted_cc = MODULE_PAYMENT_PLUGNPAY_ACCEPTED_CC;

      //array for credit card selection
      $this->card_types = array('Amex' => MODULE_PAYMENT_PLUGNPAY_TEXT_AMEX,
                                'Mastercard' => MODULE_PAYMENT_PLUGNPAY_TEXT_MASTERCARD,
                                'Discover' => MODULE_PAYMENT_PLUGNPAY_TEXT_DISCOVER,
                                'Visa' => MODULE_PAYMENT_PLUGNPAY_TEXT_VISA);
        
      $this->allowed_types = array();

      // Credit card pulldown list
      $cc_array = explode(', ', MODULE_PAYMENT_PLUGNPAY_ACCEPTED_CC);
      while (list($key, $value) = each($cc_array)) {
        $this->allowed_types[$value] = $this->card_types[$value];
      }

      // Processing via PlugnPay API 
      $this->form_action_url = tep_href_link(FILENAME_CHECKOUT_PROCESS, '', 'SSL', false);
    }

// class methods

//concatenate to get CC images
function get_cc_images() {
  $cc_images = '';
  reset($this->allowed_types);
  while (list($key, $value) = each($this->allowed_types)) {
    $cc_images .= tep_image(DIR_WS_ICONS . $key . '.gif', $value);
  }
  return $cc_images;
}

function javascript_validation() {
#      $js = '  if (payment_value == "' . $this->code . '") {' . "\n" .
#            '    var cc_owner = document.checkout_payment.plugnpay_cc_owner.value;' . "\n" .
#            '    var cc_number = document.checkout_payment.plugnpay_cc_number.value;' . "\n" .
#            '    var cc_cvv = document.checkout_payment.cvv.value;' . "\n" .
#            '    if (cc_owner == "" || cc_owner.length < ' . CC_OWNER_MIN_LENGTH . ') {' . "\n" .
#            '      error_message = error_message + "' . MODULE_PAYMENT_PLUGNPAY_TEXT_JS_CC_OWNER . '";' . "\n" .
#            '      error = 1;' . "\n" .
#            '    }' . "\n" .
#            '    if (cc_number == "" || cc_number.length < ' . CC_NUMBER_MIN_LENGTH . ') {' . "\n" .
#            '      error_message = error_message + "' . MODULE_PAYMENT_PLUGNPAY_TEXT_JS_CC_NUMBER . '";' . "\n" .
#            '      error = 1;' . "\n" .
#            '    }' . "\n" .
#            '    if (cc_cvv != "" && cc_cvv.length < "3") {' . "\n".
#            '      error_message = error_message + "' . MODULE_PAYMENT_PLUGNPAY_TEXT_JS_CC_CVV . '";' . "\n" .
#            '      error = 1;' . "\n" .
#            '    }' . "\n" .
#            '  }' . "\n";
#
      return $js;
    }

    function selection() {
      global $order;

      reset($this->allowed_types);
      while (list($key, $value) = each($this->allowed_types)) {
        $card_menu[] = array('id' => $key, 'text' => $value);
      }

      if (MODULE_PAYMENT_PLUGNPAY_PAYMETHOD == 'onlinecheck') {
        # set accttype menu
        $accttype_menu[] = array('id' => 'checking', 'text' => 'checking');
        $accttype_menu[] = array('id' => 'savings', 'text' => 'savings');

        # set paytype menu
        $paytype_menu[] = array('id' => 'credit_card', 'text' => 'Credit Card');
        $paytype_menu[] = array('id' => 'echeck', 'text' => 'Electronic Check');
      }

      for ($i=1; $i<13; $i++) {
        $expires_month[] = array('id' => sprintf('%02d', $i), 'text' => strftime('%B',mktime(0,0,0,$i,1,2000)));
      }

      $today = getdate(); 
      for ($i=$today['year']; $i < $today['year']+10; $i++) {
        $expires_year[] = array('id' => strftime('%y',mktime(0,0,0,1,1,$i)), 'text' => strftime('%Y',mktime(0,0,0,1,1,$i)));
      }

      if ((MODULE_PAYMENT_PLUGNPAY_PAYMETHOD == 'onlinecheck') && (MODULE_PAYMENT_PLUGNPAY_CVV == 'no')) {
  $selection = array('id' => $this->code,
               'module' => $this->title . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $this->get_cc_images() . '&nbsp; or Electronic Check',
               'fields' => array(
                                             // credit & echeck selection
                                             array('title' => '<b>Select Your Method Of Payment:</b>',
                                 'field' => ''),
                                             array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_PAYTYPE,
                                 'field' => tep_draw_pull_down_menu('plugnpay_paytype', $paytype_menu)),
                                             // credit card stuff here
                                             array('title' => '&nbsp;<p><b>Credit Card Info:</b>',
                                 'field' => ''),
                                             array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_TYPE,
                                 'field' => tep_draw_pull_down_menu('credit_card_type', $card_menu)),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_OWNER,
                                 'field' => tep_draw_input_field('plugnpay_cc_owner', $order->billing['firstname'] . ' ' . $order->billing['lastname'])),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_NUMBER,
                                 'field' => tep_draw_input_field('plugnpay_cc_number')),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_EXPIRES,
                                 'field' => tep_draw_pull_down_menu('plugnpay_cc_expires_month', $expires_month) . '&nbsp;' . tep_draw_pull_down_menu('plugnpay_cc_expires_year', $expires_year)),
                                            // echeck stuff here
                                             array('title' => '&nbsp;<p><b>Electronic Checking Info:</b>',
                                 'field' => ''),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ACCTTYPE,
                                 'field' => tep_draw_pull_down_menu('plugnpay_echeck_accttype', $accttype_menu)),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ROUTINGNUM,
                                  'field' => tep_draw_input_field('plugnpay_echeck_routingnum','',"SIZE=12, MAXLENGTH=9")),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ACCOUNTNUM,
                                 'field' => tep_draw_input_field('plugnpay_echeck_accountnum','',"SIZE=12")),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_CHECKNUM,
                                 'field' => tep_draw_input_field('plugnpay_echeck_checknum','',"SIZE=6"))
                                ));
      }
      else if ((MODULE_PAYMENT_PLUGNPAY_PAYMETHOD == 'onlinecheck') && (MODULE_PAYMENT_PLUGNPAY_CVV == 'yes')) {
  $selection = array('id' => $this->code,
               'module' => $this->title . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $this->get_cc_images() . '&nbsp; or Electronic Check',
               'fields' => array(
                                             // credit & echeck selection
                                             array('title' => '<b>Select Your Method Of Payment:</b>',
                                 'field' => ''),
                                             array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_PAYTYPE,
                                 'field' => tep_draw_pull_down_menu('plugnpay_paytype', $paytype_menu)),
                                             // credit card stuff here
                                             array('title' => '&nbsp;<p><b>Credit Card Info:</b>',
                                 'field' => ''),
                                             array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_TYPE,
                                 'field' => tep_draw_pull_down_menu('credit_card_type', $card_menu)),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_OWNER,
                                 'field' => tep_draw_input_field('plugnpay_cc_owner', $order->billing['firstname'] . ' ' . $order->billing['lastname'])),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_NUMBER,
                                 'field' => tep_draw_input_field('plugnpay_cc_number')),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_EXPIRES,
                                 'field' => tep_draw_pull_down_menu('plugnpay_cc_expires_month', $expires_month) . '&nbsp;' . tep_draw_pull_down_menu('plugnpay_cc_expires_year', $expires_year)),
                                             array('title' => 'CVV number ' . ' ' .'<a href="javascript:CVVPopUpWindow(\'' . tep_href_link('cvv.html') . '\')">' . '<u><i>' . '(' . MODULE_PAYMENT_PLUGNPAY_TEXT_CVV_LINK . ')' . '</i></u></a>',
      'field' => tep_draw_input_field('cvv','',"SIZE=4, MAXLENGTH=4")),
                                             // echeck stuff here
                                             array('title' => '&nbsp;<p><b>Electronic Checking Info:</b>',
                                 'field' => ''),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ACCTTYPE,
                                 'field' => tep_draw_pull_down_menu('plugnpay_echeck_accttype', $accttype_menu)),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ROUTINGNUM,
                                  'field' => tep_draw_input_field('plugnpay_echeck_routingnum','',"SIZE=12, MAXLENGTH=9")),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ACCOUNTNUM,
                                 'field' => tep_draw_input_field('plugnpay_echeck_accountnum','',"SIZE=12")),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_CHECKNUM,
                                 'field' => tep_draw_input_field('plugnpay_echeck_checknum','',"SIZE=6"))
                                ));
      }
      else if (MODULE_PAYMENT_PLUGNPAY_CVV == 'no') {
  $selection = array('id' => $this->code,
               'module' => $this->title . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $this->get_cc_images(),
               'fields' => array(array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_TYPE,
                                 'field' => tep_draw_pull_down_menu('credit_card_type', $card_menu)),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_OWNER,
                                  'field' => tep_draw_input_field('plugnpay_cc_owner', $order->billing['firstname'] . ' ' . $order->billing['lastname'])),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_NUMBER,
                                 'field' => tep_draw_input_field('plugnpay_cc_number')),
                                 array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_EXPIRES,
                                 'field' => tep_draw_pull_down_menu('plugnpay_cc_expires_month', $expires_month) . '&nbsp;' . tep_draw_pull_down_menu('plugnpay_cc_expires_year', $expires_year))
                                            ));
      }
      else {
        $selection = array('id' => $this->code,
                           'module' => $this->title . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $this->get_cc_images(),
                           'fields' => array(array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_TYPE,
                                                   'field' => tep_draw_pull_down_menu('credit_card_type', $card_menu)),
                                             array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_OWNER,
                                                   'field' => tep_draw_input_field('plugnpay_cc_owner', $order->billing['firstname'] . ' ' . $order->billing['lastname'])),
                                             array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_NUMBER,
                                                   'field' => tep_draw_input_field('plugnpay_cc_number')),
                                             array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_EXPIRES,
                                                   'field' => tep_draw_pull_down_menu('plugnpay_cc_expires_month', $expires_month) . '&nbsp;' . tep_draw_pull_down_menu('plugnpay_cc_expires_year', $expires_year)),
                                             array('title' => 'CVV number ' . ' ' .'<a href="javascript:CVVPopUpWindow(\'' . tep_href_link('cvv.html') . '\')">' . '<u><i>' . '(' . MODULE_PAYMENT_PLUGNPAY_TEXT_CVV_LINK . ')' . '</i></u></a>',
'field' => tep_draw_input_field('cvv','',"SIZE=4, MAXLENGTH=4"))
                                            ));
      }

      return $selection;
    }

    function pre_confirmation_check() {
      global $HTTP_POST_VARS, $cvv;

      if ((MODULE_PAYMENT_PLUGNPAY_PAYMETHOD == 'onlinecheck') && ($HTTP_POST_VARS['plugnpay_paytype'] != 'credit_card')) {
        $this->plugnpay_paytype = $HTTP_POST_VARS['plugnpay_paytype'];
        $this->echeck_accttype = $HTTP_POST_VARS['plugnpay_echeck_accttype'];
        $this->echeck_accountnum = $HTTP_POST_VARS['plugnpay_echeck_accountnum'];
        $this->echeck_routingnum = $HTTP_POST_VARS['plugnpay_echeck_routingnum'];
        $this->echeck_checknum = $HTTP_POST_VARS['plugnpay_echeck_checknum'];
      }
      else {
        # Note: section assumes the payment method is credit card
        include(DIR_WS_CLASSES . 'cc_validation.php');
        $cc_validation = new cc_validation();
        $result = $cc_validation->validate($HTTP_POST_VARS['plugnpay_cc_number'], $HTTP_POST_VARS['plugnpay_cc_expires_month'], $HTTP_POST_VARS['plugnpay_cc_expires_year'], $HTTP_POST_VARS['cvv'], $HTTP_POST_VARS['credit_card_type']);
        $error = '';
        switch ($result) {
          case -1:
            $error = sprintf(TEXT_CCVAL_ERROR_UNKNOWN_CARD, substr($cc_validation->cc_number, 0, 4));
            break;
          case -2:
          case -3:
          case -4:
            $error = TEXT_CCVAL_ERROR_INVALID_DATE;
            break;
          case -5:
            $error = TEXT_CCVAL_ERROR_CARD_TYPE_MISMATCH;
            break;
          case -6;
            $error = TEXT_CCVAL_ERROR_CVV_LENGTH;
            break; 
          case false:
            $error = TEXT_CCVAL_ERROR_INVALID_NUMBER;
            break;
        }

        if ( ($result == false) || ($result < 1) ) {
          $payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&plugnpay_cc_owner=' . urlencode($HTTP_POST_VARS['plugnpay_cc_owner']) . '&plugnpay_cc_expires_month=' . $HTTP_POST_VARS['plugnpay_cc_expires_month'] . '&plugnpay_cc_expires_year=' . $HTTP_POST_VARS['plugnpay_cc_expires_year'];
          tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
        }

        $this->cc_card_type = $cc_validation->cc_type;
        $this->cc_card_number = $cc_validation->cc_number;
        $this->cc_expiry_month = $cc_validation->cc_expiry_month;
        $this->cc_expiry_year = $cc_validation->cc_expiry_year;
        $card_cvv = $HTTP_POST_VARS['cvv'];
      }
    }

    function confirmation() {
      global $HTTP_POST_VARS, $card_cvv;

      if ((MODULE_PAYMENT_PLUGNPAY_PAYMETHOD == 'onlinecheck') && ($this->plugnpay_paytype == 'echeck')) {
        $confirmation = array('title' => $this->title . ': Electronic Check Payments',
                              'fields' => array(array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ACCTTYPE,
                                                      'field' => $this->echeck_accttype),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ROUTINGNUM,
                                                      'field' => $this->echeck_routingnum),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_ACCOUNTNUM,
                                                      'field' => $this->echeck_accountnum),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ECHECK_CHECKNUM,
                                                      'field' => $this->echeck_checknum)
                                                ));
      }
      else if (MODULE_PAYMENT_PLUGNPAY_CVV == 'no') {
        $confirmation = array('title' => $this->title . ': ' . $this->cc_card_type,
                              'fields' => array(array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_OWNER,
                                                      'field' => $HTTP_POST_VARS['plugnpay_cc_owner']),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_NUMBER,
                                                      'field' => substr($this->cc_card_number, 0, 4) . str_repeat('X', (strlen($this->cc_card_number) - 8)) . substr($this->cc_card_number, -4)),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_EXPIRES,
                                                      'field' => strftime('%B, %Y', mktime(0,0,0,$HTTP_POST_VARS['plugnpay_cc_expires_month'], 1, '20' . $HTTP_POST_VARS['plugnpay_cc_expires_year'])))));
      }  
      else {
        $card_cvv=$HTTP_POST_VARS['cvv'];
        $confirmation = array('title' => $this->title . ': ' . $this->cc_card_type,
                              'fields' => array(array('title' => 'CVV number',
                                                      'field' => $HTTP_POST_VARS['cvv']),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_OWNER,
                                                      'field' => $HTTP_POST_VARS['plugnpay_cc_owner']),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_NUMBER,
                                                      'field' => substr($this->cc_card_number, 0, 4) . str_repeat('X', (strlen($this->cc_card_number) - 8)) . substr($this->cc_card_number, -4)),
                                                array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_CREDIT_CARD_EXPIRES,
                                                      'field' => strftime('%B, %Y', mktime(0,0,0,$HTTP_POST_VARS['plugnpay_cc_expires_month'], 1, '20' . $HTTP_POST_VARS['plugnpay_cc_expires_year'])))));
        $card_cvv=$HTTP_POST_VARS['cvv'];
      }
      return $confirmation;
    }

    function process_button() {
      // Change made by using PlugnPay API Connection
      $card_cvv=$HTTP_POST_VARS['cvv'];

      $process_button_string = tep_draw_hidden_field('card_cvv', $HTTP_POST_VARS['cvv']) . 
                               tep_draw_hidden_field('card_number', $this->cc_card_number) .
                               tep_draw_hidden_field('card_exp', $this->cc_expiry_month . substr($this->cc_expiry_year, -2));

      $process_button_string .= tep_draw_hidden_field(tep_session_name(), tep_session_id());
      return $process_button_string;
    }

    function before_process() {
      global $response;
      # Note: $response is an array that holds various pieces if cURL response info
      #       $response[0] will hold the entire response string from the pnpremote.cgi script

      ## Note: Enable this code to record the response string to a text file for debug purposes
      if (MODULE_PAYMENT_PLUGNPAY_TESTMODE == 'Test And Debug') {
        $filename = './plugnpay_debug.txt';
        $fp = fopen($filename, "a");
        $write = fputs($fp, "POSTAUTH: $response[0]\n\n");
        fclose($fp);
      }

      # NOTE: windows server users, you must have 'register_globals' ON in your php.ini for parse_str to work correctly.
      parse_str($response[0]);

      if($FinalStatus == 'success') {
        tep_db_query("delete from " . TABLE_ORDERS . " where orders_id = '" . (int)$insert_id . "'"); //Remove order
        #tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode('SUCCESSFUL - ORDER APPROVED'), 'SSL', true, false));  // uncomment this line for testing.
      }
      else if($FinalStatus == 'badcard') {
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode('Your authorization was declined.  Please try another card.') . urlencode(" -- $MErrMsg"), 'SSL', true, false));
      }
      else if($FinalStatus == 'fraud') {
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode('Your transaction was rejected.  Please contact the merchant for ordering assistance.') . urlencode(" -- $MErrMsg"), 'SSL', true, false));
      }
      else if($FinalStatus == 'problem') {
        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode('There was an error processing your transaction.  Please contact the merchant for ordering assistance.') . urlencode(" -- $MErrMsg"), 'SSL', true, false));
      }
      else {
        if ($response[0] == '') {
          tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode("There was an unspecified error processing your transaction.<br>Received empty cURL response - check cURL connectivity to PnP server.") . urlencode(" -- $MErrMsg"), 'SSL', true, false));
        }
        else {
          tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode("There was an unspecified error processing your transaction.") . urlencode(" -- $MErrMsg"), 'SSL', true, false));
        }
      }
    }

    function after_process() {
      return false;
    }

    function get_error() {
      global $HTTP_GET_VARS;

      $error = array('title' => MODULE_PAYMENT_PLUGNPAY_TEXT_ERROR,
                     'error' => stripslashes(urldecode($HTTP_GET_VARS['error'])));
      return $error;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PLUGNPAY_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable PlugnPay Module', 'MODULE_PAYMENT_PLUGNPAY_STATUS', 'True', 'Do you want to accept payments through PlugnPay?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Login Username', 'MODULE_PAYMENT_PLUGNPAY_LOGIN', 'Your Login Name', 'Enter your PlugnPay account username', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Publisher Email', 'MODULE_PAYMENT_PLUGNPAY_PUBLISHER_EMAIL', 'Enter Your Email Address', 'The email address you want PlugnPay conformations sent to', '6', '0', now())");
  tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('cURL Setup', 'MODULE_PAYMENT_PLUGNPAY_CURL', 'Not Compiled', 'Whether cURL is compiled into PHP or not.  Windows users, select not compiled.', '6', '0', 'tep_cfg_select_option(array(\'Not Compiled\', \'Compiled\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('cURL Path', 'MODULE_PAYMENT_PLUGNPAY_CURL_PATH', 'The Path To cURL', 'For Not Compiled mode only, input path to the cURL binary (i.e. c:/curl/curl)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Mode', 'MODULE_PAYMENT_PLUGNPAY_TESTMODE', 'Test', 'Transaction mode used for processing orders', '6', '0', 'tep_cfg_select_option(array(\'Test\', \'Test And Debug\', \'Production\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Require CVV', 'MODULE_PAYMENT_PLUGNPAY_CVV', 'yes', 'Ask For CVV information', '6', '0', 'tep_cfg_select_option(array(\'yes\', \'no\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Send 2-Letter State', 'MODULE_PAYMENT_PLUGNPAY_SEND_STATE_CODE', 'yes', 'Send PnP 2-Letter State Where Possible', '6', '0', 'tep_cfg_select_option(array(\'yes\', \'no\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Method', 'MODULE_PAYMENT_PLUGNPAY_PAYMETHOD', 'credit', 'Transaction method used for processing orders.<br><b>NOTE:</b> Selecting \'onlinecheck\' assumes you\'ll offer \'credit\' as well.', '6', '0', 'tep_cfg_select_option(array(\'credit\', \'onlinecheck\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Authorization Type', 'MODULE_PAYMENT_PLUGNPAY_CCMODE', 'authpostauth', 'Credit card processing mode', '6', '0', 'tep_cfg_select_option(array(\'authpostauth\', \'authonly\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order Of Display', 'MODULE_PAYMENT_PLUGNPAY_SORT_ORDER', '1', 'The order in which this payment type is dislayed. Lowest is displayed first.', '6', '0' , now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Customer Notifications', 'MODULE_PAYMENT_PLUGNPAY_DONTSNDMAIL', 'yes', 'Should PlugnPay not email a receipt to the customer?', '6', '0', 'tep_cfg_select_option(array(\'yes\', \'no\'), ', now())");
  tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Accepted Credit Cards', 'MODULE_PAYMENT_PLUGNPAY_ACCEPTED_CC', 'Mastercard, Visa', 'The credit cards you currently accept', '6', '0', '_selectStuff(array(\'Amex\',\'Discover\', \'Mastercard\', \'Visa\'), ', now())");
    }

    function remove() {
      $keys = '';
      $keys_array = $this->keys();
      for ($i=0; $i<sizeof($keys_array); $i++) {
        $keys .= "'" . $keys_array[$i] . "',";
      }
      $keys = substr($keys, 0, -1);
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in (" . $keys . ")");
    }

    function keys() {
      return array('MODULE_PAYMENT_PLUGNPAY_STATUS', 'MODULE_PAYMENT_PLUGNPAY_LOGIN', 'MODULE_PAYMENT_PLUGNPAY_PUBLISHER_EMAIL', 'MODULE_PAYMENT_PLUGNPAY_CURL', 'MODULE_PAYMENT_PLUGNPAY_CURL_PATH', 'MODULE_PAYMENT_PLUGNPAY_TESTMODE', 'MODULE_PAYMENT_PLUGNPAY_CVV', 'MODULE_PAYMENT_PLUGNPAY_SEND_STATE_CODE', 'MODULE_PAYMENT_PLUGNPAY_PAYMETHOD', 'MODULE_PAYMENT_PLUGNPAY_CCMODE', 'MODULE_PAYMENT_PLUGNPAY_SORT_ORDER', 'MODULE_PAYMENT_PLUGNPAY_DONTSNDMAIL', 'MODULE_PAYMENT_PLUGNPAY_ACCEPTED_CC');
    }
  }

// PlugnPay Consolidated Credit Card Checkbox Implementation
// Code from UPS Choice v1.7
function _selectStuff($select_array, $key_value, $key = '') {
  for ($i=0; $i<(sizeof($select_array)); $i++) {
    $name = (($key) ? 'configuration[' . $key . '][]' : 'configuration_value');
    $string .= '<br><input type="checkbox" name="' . $name . '" value="' . $select_array[$i] . '"';
    $key_values = explode(", ", $key_value);
    if (in_array($select_array[$i], $key_values)) $string .= ' checked="checked"';
    $string .= '> ' . $select_array[$i];
  } 
  return $string;
}
?>
