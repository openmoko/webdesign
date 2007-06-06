<?php
/*
  $Id: expressshipping.php

   Released under the GNU General Public License
*/
  class shipwire { 
    var $code, $title, $descrption, $enabled, $sort_order;

//  class constructor
    function shipwire() {
      global $order, $cart;

      $this->code = 'shipwire';
      $this->title = MODULE_CHECKOUT_SUCCESS_SHIPWIRE_TITLE;
      $this->description = MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DESCRIPTION;
      $this->enabled = ((MODULE_CHECKOUT_SUCCESS_SHIPWIRE_STATUS == 'True') ? true : false);
      $this->sort_order = MODULE_CHECKOUT_SUCCESS_SHIPWIRE_SORT_ORDER;

      $this->output = array();
    }

    function process() {
      global $customer_id, $customer_email, $full_name;

      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_STATUS != 'True') { return; }

      $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where customers_id = '" . (int)$customer_id . "' order by date_purchased desc limit 1");
      $orders = tep_db_fetch_array($orders_query);

      $shipw = $this->shipwire_process($orders['orders_id']);
    
      //BOF update orders->comments
      $orders_status_query = tep_db_query("select comments from " . TABLE_ORDERS_STATUS_HISTORY . " where orders_id = '" . (int)$orders['orders_id'] . "'");
      $orders_status = tep_db_fetch_array($orders_status_query);
      if (tep_not_null($orders_status)){
        if($orders_status['comments'] == ''){       
          $new_comments = TEXT_SHIPWIRE_TRANSACTION_ID  . ' ' . $shipw['transaction_id'];
        }else{       
          $new_comments = trim($orders_status['comments']) . "\n" . TEXT_SHIPWIRE_TRANSACTION_ID  . ' ' . $shipw['transaction_id'];
        }
        tep_db_query("update " . TABLE_ORDERS_STATUS_HISTORY . " set comments = '" . trim($new_comments) . "' where orders_id = '" . (int)$orders['orders_id'] . "'");
      }
      //EOF update orders->comments

      $output_text = '';
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_BANNER == 'True'){
        $output_text .= '<DIV align="center"><table BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%"><tr><td align="center" class="main"><a target="_blank" href="'.  MODULE_CHECKOUT_SUCCESS_SHIPWIRE_AFFILIATE_URL .'">' . tep_image(DIR_WS_IMAGES . 'shipwire_banner.gif') . '</a></td></tr><tr><td align="center" class="main">' . TEXT_SHIPWIRE_TRANSACTION_ID . '<b>' . $shipw['transaction_id'] . '</b></td></tr></table></DIV>';
      }
      $this->output[] = array('text' => $output_text);

      $email_subject = "Your Shipwire Transaction ID for Order # " . $orders['orders_id'];
      $email_order =  "\n" . 'Your Shipwire Transaction ID for Order ' . $orders['orders_id'] . ' is ' . $shipw['transaction_id'] . "\n";     
      tep_mail($full_name, $customer_email, $email_subject, $email_order, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);                  
    }

    function shipwire_process($order_id) {
      global $order, $customer_id, $customer_email, $full_name;
      
      // check to see if we are running in debug mode
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG == 'True') {
        // open the file and write the starting information
        $filename = DIR_FS_CATALOG . 'debug/shipwire_debug.txt';
        $fp = fopen($filename, "a");
        $data = 'Shipwire module entered at ' . microtime() . "\n";
        $write = fputs($fp, $data);
      }
      
      // replace the "email" & "passWd" String values with your Shipwire email and password
      $email = MODULE_CHECKOUT_SUCCESS_SHIPWIRE_EMAIL;
      $passwd = MODULE_CHECKOUT_SUCCESS_SHIPWIRE_PASSWORD;
      $server = MODULE_CHECKOUT_SUCCESS_SHIPWIRE_SERVER;
      $warehouse = "00"; // Leave "00" if you want Shipwire to determine the warehouse

      $products_array = array();
      $products_query = tep_db_query("select products_id, products_name, products_model, products_quantity, final_price, products_tax from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$order_id . "' order by products_id");
      while ($products = tep_db_fetch_array($products_query)) {
        $products_array[] = array('id' => $products['products_id'],
                                  'name' => $products['products_name'],
                                  'model' => $products['products_model'],
                                  'qty' => $products['products_quantity'],
                                  'final_price' => $products['final_price'],
                                  'tax' => $products['products_tax'],
                                 );
      }
      $items = '';
      for ($i=0;$i < sizeof($products_array);$i++) {
        $items .= '<Item num="' . $i . '">';
        $items .= '<Id>' . $products_array[$i]['id'] . '</Id>';
        $items .= '<Code>' . html_entity_decode($products_array[$i]['model'], ENT_QUOTES) . '</Code>';
        $items .= '<Quantity>' . $products_array[$i]['qty'] . '</Quantity>';
        $items .= '<Unit-Price>' . $products_array[$i]['final_price'] . '</Unit-Price>';
        $items .= '<Description>' . html_entity_decode($products_array[$i]['name'], ENT_QUOTES) . '</Description>';
        $items .= '<Taxable>' . ($products_array[$i]['tax'] != '' ? 'YES' : 'NO') . '</Taxable>';
        $items .= '<Url>' . HTTP_SERVER . '/index.php?products_id=' . $products_array[$i]['id'] . '</Url>';
        $items .= '</Item>';
      }

      $orders_query = tep_db_query("select * from " . TABLE_ORDERS . " WHERE customers_id = '" . (int)$customer_id . "' AND orders_id = '" . (int)$order_id . "'");
      $orders = tep_db_fetch_array($orders_query);

      $order_shipping_method_query = tep_db_query("select title from " . TABLE_ORDERS_TOTAL . " WHERE orders_id = '" . (int)$order_id . "' AND class = 'ot_shipping'");
      $order_shipping_method = tep_db_fetch_array($order_shipping_method_query);

      $order_totals_query = tep_db_query("select value from " . TABLE_ORDERS_TOTAL . " WHERE orders_id = '" . (int)$order_id . "' AND class = 'ot_total'");
      $order_totals = tep_db_fetch_array($order_totals_query);

      $country = ($orders['delivery_country'] == '') ? $orders['billing_country'] : $orders['delivery_country'];
      $countries_query = tep_db_query("select countries_iso_code_2 from " . TABLE_COUNTRIES . " WHERE countries_name = '" . $country . "'");
      $countries = tep_db_fetch_array($countries_query);
      $order_country = $countries['countries_iso_code_2'];

      $customer_email = $orders['customers_email_address'];
      $full_name = ($orders['delivery_name'] == '') ? $orders['billing_name'] : $orders['delivery_name'];

      $OrderList = '<OrderList StoreAccountName="CRELOADED">' .
        '<EmailAddress>' . $email . '</EmailAddress>' .
        '<Password>' . $passwd . '</Password>' .
        '<Server>'. $server .'</Server>' .
        '<Order id="' . $order_id . '">' .
        '<Time>' . date("D M j G:i:s Y") . ' GMT</Time>' .
        '<NumericTime>' . time() . '</NumericTime>' .
        '<Referer>CRELOADED</Referer>' .
        '<Warehouse>' . $warehouse . '</Warehouse>';
        if ($orders['delivery_street_address'] != '') {
          $OrderList .= '<AddressInfo type="ship">' .
            '<Name>' .
              '<Full>' . html_entity_decode($orders['delivery_name'], ENT_QUOTES) . '</Full>' .
            '</Name>' .
            '<Address1>' . html_entity_decode($orders['delivery_street_address'], ENT_QUOTES) . '</Address1>' .
            '<Address2>' . html_entity_decode($orders['delivery_suburb'], ENT_QUOTES) . '</Address2>' .
            '<City>' . $orders['delivery_city'] . '</City>' .
            '<State>' . $orders['delivery_state'] . '</State>' .
            '<Country>' . $order_country . '</Country>' .
            '<Zip>' . $orders['delivery_postcode'] . '</Zip>' .
            '<Phone>' . $orders['customers_telephone'] . '</Phone>' .
          '</AddressInfo>';
        }else{
          $OrderList .= '<AddressInfo type="ship">' .
            '<Name>' .
              '<Full>' . html_entity_decode($orders['billing_name'], ENT_QUOTES) . '</Full>' .
            '</Name>' .
            '<Address1>' . html_entity_decode($orders['billing_street_address'], ENT_QUOTES) . '</Address1>' .
            '<Address2>' . html_entity_decode($orders['billing_suburb'], ENT_QUOTES) . '</Address2>' .
            '<City>' . $orders['billing_city'] . '</City>' .
            '<State>' . $orders['billing_state'] . '</State>' .
            '<Country>' . $order_country . '</Country>' .
            '<Zip>' . $orders['billing_postcode'] . '</Zip>' .
            '<Phone>' . $orders['customers_telephone'] . '</Phone>' .
          '</AddressInfo>';
        }
        $OrderList .= '<AddressInfo type="bill">' .
          '<Name>' .
            '<Full>' . html_entity_decode($orders['billing_name'], ENT_QUOTES) . '</Full>' .
          '</Name>' .
          '<Address1>' . html_entity_decode($orders['billing_street_address'], ENT_QUOTES) . '</Address1>' .
          '<Address2>' . html_entity_decode($orders['billing_suburb'], ENT_QUOTES) . '</Address2>' .
          '<City>' . $orders['billing_city'] . '</City>' .
          '<State>' . $orders['billing_state'] . '</State>' .
          '<Country>' . $order_country . '</Country>' .
          '<Zip>' . $orders['billing_postcode'] . '</Zip>' .
          '<Phone>' . $orders['customers_telephone'] . '</Phone>' .
          '<Email>' . $orders['customers_email_address'] . '</Email>' .
        '</AddressInfo>' .
        '<Shipping>' . $order_shipping_method['title'] . '</Shipping>' .
        '<CreditCard type="' . $orders['cc_type'] . '" expiration="' . $orders['cc_expires'] . '"></CreditCard>' .
        $items . 
        '<Total>' .
          '<Line name="Total">' . $order_totals['value'] . '</Line>' .
        '</Total>' .
        '<Bogus/>' .
        '</Order>' .
      '</OrderList>';

      // check to see if we are running in debug mode
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG == 'True') {
        $data = 'Before encoding : ' . "\n";
        $write = fputs($fp, $data);
        $data = $OrderList . "\n";
        $write = fputs($fp, $data);
      }
      
      //Convert characters to proper format for post
      $OrderList = urlencode($OrderList);

      // check to see if we are running in debug mode
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG == 'True') {
        $data = 'The data to transmitted : ' . "\n";
        $write = fputs($fp, $data);
        $data = $OrderList . "\n";
        $write = fputs($fp, $data);
      }
      
      // open synchronous connection to Shipwire servlet    
      // NOTE:  you must have the cURL libraries installed with PHP on your server--
      // If you need them, see your System Administrator, who can get then at 
      // http://curl.haxx.se/download.html

      // in debug mode record the time
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG == 'True') {
        $data = 'Setting up the curl connection at ' . microtime() . "\n";
        $write = fputs($fp, $data);
      }
   
      $urlConn = curl_init (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_URL);
      curl_setopt ($urlConn, CURLOPT_POST, 1);
      curl_setopt ($urlConn, CURLOPT_HTTPHEADER, array("Content-type", "application/x-www-form-urlencoded"));
      curl_setopt ($urlConn, CURLOPT_POSTFIELDS, "OrderListXML=".$OrderList);
      
      // in debug mode record the time
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG == 'True') {
        $data = 'Starting transmission at ' . microtime() . "\n";
        $write = fputs($fp, $data);
      }
     
      ob_start();
      curl_exec($urlConn);
      $orderSubmitted = ob_get_contents();
      ob_end_clean();
      
      // in debug mode record the time
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG == 'True') {
        $data = 'Transmission completed at ' . microtime() . "\n";
        $write = fputs($fp, $data);
      }
  
      // Parse the response
      $parser= xml_parser_create(); 
      xml_parse_into_struct($parser,$orderSubmitted,$XMLvals,$XMLindex); 
      xml_parser_free($parser);

      $error_data_response = '';      
      $error_data_response = $this->get_error($XMLvals);
      $total_order_response = $this->get_total_order($XMLvals);
      $transaction_id_response = $this->get_transaction_id($XMLvals);
      
      $ret = array('error' => $error_data,
                   'total_order' => $total_order_response,
                   'transaction_id' => $transaction_id_response);     
      
      // if we are in debug mode, close it up
      if (MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG == 'True') {
        $data = 'Error Response : ' . "\n" . $error_data_response . "\n";
        $write = fputs($fp, $data);
        $data = 'Total Order Response : ' . "\n" . $total_order_response . "\n";
        $write = fputs($fp, $data);
        $data = 'Transmission ID : ' . "\n" . $transaction_id_response . "\n";
        $write = fputs($fp, $data);
        $data = "\n\n\n\n";
        $write = fputs($fp, $data);
        fclose($fp);
      }
      return $ret;
    }

    // This function will return an array of the values of an element 
    // given the $vals and $index arrays, and the element name
    function getElementValue($XMLvals, $elName) { 
      $elValue = null;
      foreach ($XMLvals as $arrkey => $arrvalue) {
        foreach ($arrvalue as $key => $value) {
          if ($value==strtoupper($elName)){
            $elValue[] = $arrvalue['value'];
          }
        }
      }
      return $elValue;
    }
    
    function get_error($XMLvals) {
      $errorMessage = $this->getElementValue($XMLvals,"ErrorMessage");
      $ret_value = '';
      if (isset($errorMessage)) {
        foreach ($errorMessage as $key => $err) {
          $ret_value .= $err;
        }
      }
      return $ret_value;
    }
    
    function get_transaction_id($XMLvals) {
      $transactionId = $this->getElementValue($XMLvals,"TransactionId");
      $ret_value = '';
      if (isset($transactionId)) {
        foreach ($transactionId as $key => $tra) {
          $ret_value .= $tra;
        }
      }else{ 
          $ret_value .= 'error';
      }
      return $ret_value;
    }
    
    function get_total_order($XMLvals) {
      $totalOrders = $this->getElementValue($XMLvals,"TotalOrders");
      $ret_value = '';
      if (isset($totalOrders)) {
        foreach ($totalOrders as $key => $tot) {
          $ret_value .= $tot;
        }
      }else{
        $ret_value = 'error';
      }
      return $ret_value;
    }
    
    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable ShipWire', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_STATUS', 'True', 'Do you want to enable ShipWire?', '6', '0', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Display ShipWire Banner', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_BANNER', 'True', 'Display ShipWire Banner and Shipwire Fullfillment ID on successful checkout?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Shipwire Affiliate URL', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_AFFILIATE_URL', 'http://www.shipwire.com/exec/creloaded.php?ref=6133361', 'Enter your Shipwire Affiliate URL.', '6', '2', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('ShipWire Host Address', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_URL', 'http://www.shipwire.com/exec/FulfillmentServices.php', 'ShipWire Host Address', '6', '3', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('ShipWire Server Address', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_SERVER', 'Test', 'ShipWire Server Name (Test or  Production)', '6', '4', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Email Address', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_EMAIL', '', 'Email Address', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('ShipWire Password', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_PASSWORD', '', 'Case-sensitive password.', '6', '6', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Transaction Debug', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG', 'False', 'Set to True to capture the information being transmitted.', '6', '11', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_SORT_ORDER', '0', 'Sort order of display.', '6', '12', now())");     
    }

    function remove() {
      $keys = '';
      $keys_array = $this->keys();
      for ($i=0; $i < sizeof($keys_array); $i++) {
        $keys .= "'" . $keys_array[$i] . "',";
      }
      $keys = substr($keys, 0, -1);

      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in (" . $keys . ")");
    }

    function keys() {
    return array('MODULE_CHECKOUT_SUCCESS_SHIPWIRE_STATUS','MODULE_CHECKOUT_SUCCESS_SHIPWIRE_BANNER','MODULE_CHECKOUT_SUCCESS_SHIPWIRE_AFFILIATE_URL','MODULE_CHECKOUT_SUCCESS_SHIPWIRE_URL','MODULE_CHECKOUT_SUCCESS_SHIPWIRE_SERVER' ,'MODULE_CHECKOUT_SUCCESS_SHIPWIRE_EMAIL','MODULE_CHECKOUT_SUCCESS_SHIPWIRE_PASSWORD','MODULE_CHECKOUT_SUCCESS_SHIPWIRE_DEBUG','MODULE_CHECKOUT_SUCCESS_SHIPWIRE_SORT_ORDER');
   }
 }
?>