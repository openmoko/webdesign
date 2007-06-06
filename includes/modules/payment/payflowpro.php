<?php
/*
  $Id: payflowpro.php,v 1.0 2002/05/10 01:22:51 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
  class payflowpro {
    var $code, $title, $description, $enabled, $sort_order;

// class constructor
    function payflowpro() {
    global $order;
      $this->code = 'payflowpro';
      $this->title = MODULE_PAYMENT_PAYFLOWPRO_TEXT_TITLE;
      $this->description = MODULE_PAYMENT_PAYFLOWPRO_TEXT_DESCRIPTION;
      $this->enabled = MODULE_PAYMENT_PAYFLOWPRO_STATUS;

      $this->sort_order = MODULE_PAYMENT_PAYFLO_SORT_ORDER;

     if ((int)MODULE_PAYMENT_PAYFLOWPRO_ORDER_STATUS_ID > 0) {
           $this->order_status = MODULE_PAYMENT_PAYFLOWPRO_ORDER_STATUS_ID;
         }

    //     if (is_object($order)) $this->update_status();
    //     $this->form_action_url = MODULE_PAYMENT_PAYFLOWPRO_HOSTADDRESS ;

   }

// class methods
    function javascript_validation() {
      $validation_string = 'if (payment_value == "' . $this->code . '") {' . "\n" .
                           '  var cc_number = document.checkout_payment.payflowpro_cc_number.value;' . "\n" .
                           '  if (cc_number == "" || cc_number.length < ' . CC_NUMBER_MIN_LENGTH . ') {' . "\n" .
                           '    error_message = error_message + "' . MODULE_PAYMENT_PAYFLOWPRO_TEXT_JS_CC_NUMBER . '";' . "\n" .
                           '    error = 1;' . "\n" .
                           '  }' . "\n" .
                           '}' . "\n";
     if (MODULE_PAYMENT_PAYFLOWPRO_CSC=="1"){
      $validation_string .=  'if (payment_value== "' . $this->code . '" && document.checkout_payment.payflowpro_cc_csc.value==""){ ' . "\n" .
                           '  error_message = error_message + " You must provide a CSC ";' . "\n".
                           ' error=1;} ' . "\n";}
      return $validation_string;
    }

    function selection() {
      for ($i=1; $i < 13; $i++) {
        $expires_month[] = array('id' => sprintf('%02d', $i), 'text' => strftime('%m',mktime(0,0,0,$i,1,2000)));
      }

      $today = getdate();
      for ($i=$today['year']; $i < $today['year']+10; $i++) {
        $expires_year[] = array('id' => strftime('%y',mktime(0,0,0,1,1,$i)), 'text' => strftime('%Y',mktime(0,0,0,1,1,$i)));
      }

      $fields[0]=array('title' => '<tr><td colspan=5 class=main><B>'.MODULE_PAYMENT_PAYFLOWPRO_TEXT_TITLE1.'<a href="'.tep_href_link(FILENAME_PRIVACY, '', 'NONSSL').'">'. MODULE_PAYMENT_PAYFLOWPRO_TEXT_TITLE2 .'</a> </B></td></tr>' ,
                       'field' => '<tr><td colspan=5>' .tep_image(DIR_WS_IMAGES.'cclogos.gif'). '</td></tr>');

      $fields[1]=array('title' => MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_NUMBER,
                       'field' =>tep_draw_input_field('payflowpro_cc_number','','valign=Center') );

       $fields[2]=array('title' =>  MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_EXPIRES ,
                          'field' => tep_draw_pull_down_menu('payflowpro_cc_expires_month', $expires_month) . '&nbsp;&nbsp;' . tep_draw_pull_down_menu('payflowpro_cc_expires_year', $expires_year));

     if (MODULE_PAYMENT_PAYFLOWPRO_CSC=="1"){
       $fields[3]=array('title' =>  MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC,
                          'field' => '<table border="0" cellpadding="2" cellspacing="1" style="border-collapse: collapse" bordercolor="#111111" width="100%" height="100%">'.
                          '<tr><td >'.tep_draw_input_field('payflowpro_cc_csc','','size="4" maxlenght="4" valign="center"') . '&nbsp;</td>'.
                          '<td  valign="center"><a href=javascript:{}; onclick="javascript:{window.open(\'./csc.htm\',\'test\',\'height=550,width=800,top=100,left=100\');false}">'.tep_image(DIR_WS_IMAGES.'csc.gif').'</a></td>'.
                          '<td><table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%"><tr>'.
                          '</tr><tr><td class="main" >'.MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC_TEXT.'</td>'.
                          '</tr><tr><td class="main" ><a href=javascript:{}; onclick="javascript:{window.open(\'./csc.htm\',\'test\',\'height=550,width=800,top=100,left=100\');false}">'.MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC_HELP.'</a></td>'.
                          '<td class="main" >&nbsp;&nbsp;</td>'.
                          '</tr><tr><td class="main" align="left"><a href=javascript:{}; onclick="javascript:{window.open(\'./csc_amex.htm\',\'test\',\'height=550,width=800,top=100,left=100\');false}">'.MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC_AMEX.'</a></td>'.
                          '</tr></table></tr></table>');}


      $selection = array('id' => $this->code,
                         'module' => $this->title,
                         'fields' => $fields);
      return $selection;
    }

    function pre_confirmation_check() {
      global $payment, $HTTP_POST_VARS;

      include(DIR_WS_CLASSES . 'cc_validation1.php');

      $cc_validation = new cc_validation();
      $result = $cc_validation->validate($HTTP_POST_VARS['payflowpro_cc_number'], $HTTP_POST_VARS['payflowpro_cc_expires_month'], $HTTP_POST_VARS['payflowpro_cc_expires_year']);

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
        case false:
          $error = TEXT_CCVAL_ERROR_INVALID_NUMBER;
          break;
      }

      if ( ($result == false) || ($result < 1) ) {
        $payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) .  '&cc_expires_month=' .$HTTP_POST_VARS['payflowpro_cc_expires_month'].  '&shipping_selected=' . $HTTP_POST_VARS['shipping_selected'] . '&cc_expires_year=' . $HTTP_POST_VARS['payflowpro_cc_expires_year'];

        tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
      }

      $this->cc_card_type = $cc_validation->cc_type;
      $this->cc_card_number = $cc_validation->cc_number;
      $this->cc_expiry_month = $cc_validation->cc_expiry_month;
      $this->cc_expiry_year = str_replace("20", "", $cc_validation->cc_expiry_year);

    }

    function confirmation() {
      global $HTTP_POST_VARS, $CardName, $CardNumber, $checkout_form_action;


      $fields[0]=array('title' => MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_NUMBER ,
                       'field' => $this->cc_card_number );
     if (MODULE_PAYMENT_PAYFLOWPRO_CSC=="1"){
      $fields[1]=array('title' => MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_CSC ,
                       'field' => $HTTP_POST_VARS['payflowpro_cc_csc'] );
     }else{
      $fields[1]=array('title' => '' ,
                       'field' => '' );
     }
      $fields[2]=array('title' => MODULE_PAYMENT_PAYFLOWPRO_TEXT_CREDIT_CARD_EXPIRES ,
                       'field' => strftime('%B/%Y', mktime(0,0,0,$HTTP_POST_VARS['payflowpro_cc_expires_month'], 1, '20' . $HTTP_POST_VARS['payflowpro_cc_expires_year'])) );

      $confirmation = array('title' => $this->title . ': ' . $this->cc_card_type,
                            'fields' => $fields);

      return $confirmation;
    }

    function process_button() {
      global $HTTP_POST_VARS, $CardName, $CardNumber, $order;

      $process_button_string = tep_draw_hidden_field('cc_expires', $this->cc_expiry_month . $this->cc_expiry_year) .
                               tep_draw_hidden_field('cc_type', $this->cc_card_type) .
                               tep_draw_hidden_field('cc_number', $this->cc_card_number) ;
     if (MODULE_PAYMENT_PAYFLOWPRO_CSC=="1"){
        $process_button_string .= tep_draw_hidden_field('CSC', $HTTP_POST_VARS['payflowpro_cc_csc']);
     }
     
    // add convert to state code;
     $state_query = tep_db_query("select zone_code from " . TABLE_ZONES . " where zone_name = '" . $order->customer['state'] ."' ");
      $state = tep_db_fetch_array($state_query);
    
    // convert delivery state  ;
    
      $stated_query = tep_db_query("select  zone_code from " . TABLE_ZONES . " where zone_name = '" . $order->delivery['state'] ."' ");
      $stated = tep_db_fetch_array($stated_query);

    
        $process_button_string .= tep_draw_hidden_field('AMT', number_format($order->info['total'], 2, '.', '')).
                               tep_draw_hidden_field('FREIGHTAMT', number_format($order->info['shipping_cost'], 2, '.', '')).
                               tep_draw_hidden_field('TAXAMT', number_format($order->info['tax'], 2, '.', '')).
                               tep_draw_hidden_field('FIRSTNAME', $order->customer['firstname']) .
                               tep_draw_hidden_field('LASTNAME', $order->customer['lastname']) .
                               tep_draw_hidden_field('STREET', $order->customer['street_address']) .
                               tep_draw_hidden_field('CITY', $order->customer['city']) .
                               tep_draw_hidden_field('STATE', $state['zone_code']) .
                               tep_draw_hidden_field('ZIP', $order->customer['postcode']) .
                               tep_draw_hidden_field('COUNTRY', $order->customer['country']['iso_code_2']) .
                           //    tep_draw_hidden_field('COUNTRY', $order->customer['country']['title']) .
                               tep_draw_hidden_field('EMAIL', $order->customer['email_address']) .
                               tep_draw_hidden_field('SHIPTOFIRSTNAME', $order->delivery['firstname']) .
                               tep_draw_hidden_field('SHIPTOLASTNAME', $order->delivery['lastname']) .
                               tep_draw_hidden_field('SHIPTOSTREET', $order->delivery['street_address']) .
                               tep_draw_hidden_field('SHIPTOCITY', $order->delivery['city']) .
                               tep_draw_hidden_field('SHIPTOSTATE', $state['zone_code']) .
                               tep_draw_hidden_field('COMMENT1', $order->customer['firstname'] . $order->customer['lastname']) .
                               tep_draw_hidden_field('COMMENT2', 'W' . $order_id) .
                               tep_draw_hidden_field('SHIPTOZIP', $order->delivery['postcode']) ;
      $process_button_string .= tep_draw_hidden_field(tep_session_name(), tep_session_id());
      return $process_button_string;
    }

    function before_process() {
      global $HTTP_POST_VARS,$order,$response;
          shell_exec("PFPRO_CERT_PATH=/usr/cert/");
    shell_exec ("LD_LIBRARY_PATH=/usr/lib/;export LD_LIBRARY_PATH");
     $transaction ='USER=' . trim(MODULE_PAYMENT_PAYFLOWPRO_USER) . '&';
     $transaction .='VENDOR=' . (MODULE_PAYMENT_PAYFLOWPRO_VENDOR) . '&';
     $transaction .='PARTNER=' . trim(MODULE_PAYMENT_PAYFLOWPRO_PARTNER) . '&';
     $transaction .='PWD=' . trim(MODULE_PAYMENT_PAYFLOWPRO_PWD) . '&';
     $transaction .='TRXTYPE=' . trim(MODULE_PAYMENT_PAYFLOWPRO_TRXTYPE) . '&';
     $transaction .='TENDER=' . trim(MODULE_PAYMENT_PAYFLOWPRO_TENDER) . '&';
     $transaction .='AMT=' . $HTTP_POST_VARS['AMT'] . '&';
     $transaction .='ACCT=' . $HTTP_POST_VARS['cc_number'] . '&';
     $transaction .='EXPDATE=' . $HTTP_POST_VARS['cc_expires'] . '&';
     $transaction .='FREIGHTAMT=' . $HTTP_POST_VARS['FREIGHTAMT'] . '&';
     $transaction .='TAXAMT=' . $HTTP_POST_VARS['TAXAMT'] . '&';
     $transaction .='FIRSTNAME=' . $HTTP_POST_VARS['FIRSTNAME'] . '&';
     $transaction .='LASTNAME=' . $HTTP_POST_VARS['LASTNAME'] . '&';
     $transaction .='STREET=' . $HTTP_POST_VARS['STREET'] . '&';
     $transaction .='CITY=' . $HTTP_POST_VARS['CITY'] . '&';
     $transaction .='STATE=' . $HTTP_POST_VARS['STATE'] . '&';
     $transaction .='ZIP=' . $HTTP_POST_VARS['ZIP'] . '&';
     $transaction .='COUNTRY=' . $HTTP_POST_VARS['COUNTRY'] . '&';
     $transaction .='EMAIL=' . $HTTP_POST_VARS['EMAIL'] . '&';
     $transaction .='SHIPTOFIRSTNAME=' . $HTTP_POST_VARS['SHIPTOFIRSTNAME'] . '&';
     $transaction .='SHIPTOLASTNAME=' . $HTTP_POST_VARS['SHIPTOLASTNAME'] . '&';
     $transaction .='SHIPTOSTREET=' . $HTTP_POST_VARS['SHIPTOSTREET'] . '&';
     $transaction .='SHIPTOCITY=' . $HTTP_POST_VARS['SHIPTOCITY'] . '&';
     $transaction .='SHIPTOSTATE=' . $HTTP_POST_VARS['SHIPTOSTATE'] . '&';
     $transaction .='SHIPTOZIP=' . $HTTP_POST_VARS['SHIPTOZIP'] . '&';
     $transaction .='CSC=' . $HTTP_POST_VARS['CSC'] . '&';
     $transaction .='COMMENT1=' . $HTTP_POST_VARS['COMMENT1'] . '&';
     $transaction .='COMMENT2=' . $HTTP_POST_VARS['COMMENT2'] . '&';


$path = "/sbin/pfpro" ;
$url = MODULE_PAYMENT_PAYFLOWPRO_HOSTADDRESS;
$port =  MODULE_PAYMENT_PAYFLOWPRO_HOSTPORT;
$response = shell_exec ("$path  $url  $port  \"$transaction\" 10");



             $response1= array();
                     $response1 = explode('&',$response);
                       $text1 = $response1[0];
               $text2 = $response1[1];
               $text3 = $response1[2];
               $text4 = $response1[3];
               $text5 = $response1[4];
               $text6 = $response1[5];
               $text7 = $response1[6];

                         $text1a = str_replace('RESULT=', '', $text1);
                         $text2a = str_replace('PNREF=', '', $text2);
                         $text3a = str_replace('RESPMSG=', '', $text3);
                         $text4a = str_replace('AVSADDR=', '', $text4);
                         $text5a = str_replace('AVSZIP=', '', $text5);
                         $text6a = str_replace('IAVS=', '', $text6);
                         $text7a = str_replace('PREFPSMSG=', '', $text7);

                        $response2= array();
                         $response2 = explode('=',$response1);

//if (MODULE_PAYMENT_PAYFLOWPRO_TESTMODE == 'Test And Debug') {
          $filename2 = 'propay_debug.txt';
                  // $response2a = array();
                   //$response3a = array();
                                  //      $line_num => $response2a
          $transaction2=' :Transaction String : ' . $transaction . "\n";
          $response1a = ' :Response String raw : ' . $response . "\n";

          $response2a .= ' :Response String array1 : Results ' . $text1 . ' Error Msg ' . $text7a . "\n";

                    $response3a = ' :Response String array2 : ' . $response1a . "\n";


if (MODULE_PAYMENT_PAYFLOWPRO_TESTMODE == 'Test And Debug') {

          $fp2 = fopen($filename2,"ab");
                  $write = fputs($fp2, $transaction2, strlen($transaction2));
          $write = fputs($fp2, $response1c, strlen($response1c));

          $write = fputs($fp2, $response2a, strlen($response2a));

          $write = fputs($fp2, $response3a, strlen($response3a));
          fclose($fp2);

}
 if (!$text1 ||($text1 != 'RESULT=0') ){
                 tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, 'error_message=' . urlencode(MODULE_PAYMENT_PAYFLOWPRO_TEXT_ERROR.' '.$text1a), 'SSL', true, false));
   }else{

 }

    }

    function after_process() {
             return false;
    }

    function output_error() {
      global $HTTP_GET_VARS;

      $output_error_string = '<table border="0" cellspacing="0" cellpadding="0" width="100%">' . "\n" .
                             '  <tr>' . "\n" .
                             '    <td class="main">&nbsp;<font color="#FF0000">error<b>' . MODULE_PAYMENT_PAYFLOWPRO_TEXT_ERROR . '</b></font><br>&nbsp;' . stripslashes($HTTP_GET_VARS['cc_val']) . '&nbsp;</td>' . "\n" .
                             '  </tr>' . "\n" .
                             '</table>' . "\n";

      return $output_error_string;
    }
    function get_error() {
      global $HTTP_GET_VARS;

      $error = array('title' => MODULE_PAYMENT_PAYFLOWPRO_TEXT_ERROR,
                     'error' => stripslashes(urldecode($HTTP_GET_VARS['error'])));

      return $error;
    }
    function check() {
      if (!isset($this->check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_STATUS'");
        $this->check = tep_db_num_rows($check_query);
      }
      return $this->check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Allow PayflowPro', 'MODULE_PAYMENT_PAYFLOWPRO_STATUS', '1', 'Do you want to accept PlayfowPro payments?', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Currency', 'MODULE_PAYMENT_PAYFLOWPRO_CURRENCY', 'USD', 'Currency', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Mode', 'MODULE_PAYMENT_PAYFLOWPRO_TESTMODE', 'Test', 'Transaction mode used for processing order', '6', '0', 'tep_cfg_select_option(array(\'Test\', \'Test And Debug\', \'Production\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Host Address', 'MODULE_PAYMENT_PAYFLOWPRO_HOSTADDRESS',  'test-payflow.verisign.com', 'Verisign Host Name', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Host Port', 'MODULE_PAYMENT_PAYFLOWPRO_HOSTPORT', '443', 'Verisign Host Port Number', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Transaction Type', 'MODULE_PAYMENT_PAYFLOWPRO_TRXTYPE', 'S', 'Indicates type of transaction effecting the cardholder’s account (S = sale)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Transaction Tender', 'MODULE_PAYMENT_PAYFLOWPRO_TENDER', 'C', 'Indicates type of tender being used (C = credit card)', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Partner', 'MODULE_PAYMENT_PAYFLOWPRO_PARTNER', 'PartnerId', 'VeriSign Your partner ID is provided to you by the authorized VeriSign Reseller who signed you up for the Payflow Pro service. If you signed up yourself, use VeriSign.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Vendor', 'MODULE_PAYMENT_PAYFLOWPRO_VENDOR', 'login', 'Your case-sensitive login that you defined at registration.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro User', 'MODULE_PAYMENT_PAYFLOWPRO_USER', 'login', 'For now you must use your login for this parameter.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Password', 'MODULE_PAYMENT_PAYFLOWPRO_PWD', 'password', 'Case-sensitive password.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('PayflowPro Transaction Timeout', 'MODULE_PAYMENT_PAYFLOWPRO_TIMEOUT', '45', 'This value specifies a timeout period for the transaction. If not specified, the timeout value will default to 45 seconds. The minimum recommended timeout value is 30 seconds. The VeriSign client will begin tracking the timeout value from the point that it actually sends the transaction request to the VeriSign server.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Proxy Address', 'MODULE_PAYMENT_PAYFLOWPRO_PROXY_ADDRESS', '', 'Proxy server address.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Proxy Port', 'MODULE_PAYMENT_PAYFLOWPRO_PROXY_PORT', '', 'Proxy server port.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Proxy Logon', 'MODULE_PAYMENT_PAYFLOWPRO_PROXY_LOGON', '', 'Proxy server logon ID.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Proxy Password', 'MODULE_PAYMENT_PAYFLOWPRO_PROXY_PASSWORD', '', 'Proxy server logon password.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('CSC', 'MODULE_PAYMENT_PAYFLOWPRO_CSC', '1', 'Allow CSC, or ccv checking 0 = Disable 1 = Enable', '6', '0', 'tep_cfg_select_option(array(\'0\', \'1\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Pay Flo Pro - Set Order Status', 'MODULE_PAYMENT_PAYFLOWPRO_ORDER_STATUS_ID', '0', 'Pay Flo Pro - Set the status of orders made with this payment module to this value', '6', '0', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Payflopro - Sort order of display.', 'MODULE_PAYMENT_PAYFLO_SORT_ORDER', '0', 'Pay Flo Pro - Sort order of  display. Lowest is displayed first.', '6', '0', now())");
  }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_STATUS'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_CURRENCY'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_TESTMODE'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_HOSTADDRESS'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_HOSTPORT'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_TRXTYPE'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_TENDER'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_PARTNER'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_VENDOR'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_USER'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_PWD'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_TIMEOUT'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_PROXY_ADDRESS'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_PROXY_PORT'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_PROXY_LOGON'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_PWD'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_CSC'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLOWPRO_ORDER_STATUS_ID'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_PAYFLO_SORT_ORDER'");

   }

    function keys() {
      $keys = array('MODULE_PAYMENT_PAYFLOWPRO_STATUS', 'MODULE_PAYMENT_PAYFLOWPRO_CURRENCY', 'MODULE_PAYMENT_PAYFLOWPRO_TESTMODE', 'MODULE_PAYMENT_PAYFLOWPRO_HOSTADDRESS', 'MODULE_PAYMENT_PAYFLOWPRO_HOSTPORT', 'MODULE_PAYMENT_PAYFLOWPRO_TRXTYPE', 'MODULE_PAYMENT_PAYFLOWPRO_TENDER', 'MODULE_PAYMENT_PAYFLOWPRO_PARTNER','MODULE_PAYMENT_PAYFLOWPRO_VENDOR','MODULE_PAYMENT_PAYFLOWPRO_USER','MODULE_PAYMENT_PAYFLOWPRO_PWD','MODULE_PAYMENT_PAYFLOWPRO_TIMEOUT','MODULE_PAYMENT_PAYFLOWPRO_PROXY_ADDRESS','MODULE_PAYMENT_PAYFLOWPRO_PROXY_PORT','MODULE_PAYMENT_PAYFLOWPRO_PROXY_LOGON','MODULE_PAYMENT_PAYFLOWPRO_PWD','MODULE_PAYMENT_PAYFLOWPRO_CSC', 'MODULE_PAYMENT_PAYFLOWPRO_ORDER_STATUS_ID', 'MODULE_PAYMENT_PAYFLO_SORT_ORDER');

      return $keys;
    }
  }
?>
