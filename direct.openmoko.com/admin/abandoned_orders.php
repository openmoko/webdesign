<?php
/*
  $Id: edit_orders.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  Written by Jonathan Hilgeman of SiteCreative.com (osc@sitecreative.com)
  Version History
 
*/

  require('includes/application_top.php');
  require(DIR_WS_FUNCTIONS . 'c_orders.php');
  require(DIR_WS_CLASSES . 'currencies.php');
//    require('../' . DIR_WS_CLASSES . 'shopping_cart.php');
  $currencies = new currencies();

  include(DIR_WS_CLASSES . 'order.php');

  // New "Status History" table has different format.
  $OldNewStatusValues = (tep_field_exists(TABLE_ORDERS_STATUS_HISTORY, "old_value") && tep_field_exists(TABLE_ORDERS_STATUS_HISTORY, "new_value"));
  $CommentsWithStatus = tep_field_exists(TABLE_ORDERS_STATUS_HISTORY, "comments");
  $SeparateBillingFields = tep_field_exists(TABLE_ORDERS, "billing_name");

  // Optional Tax Rate/Percent
  $AddShippingTax = "0.0"; // e.g. shipping tax of 17.5% is "17.5"

  $orders_statuses = array();
  $orders_status_array = array();
  $orders_status_query = tep_db_query("select orders_status_id, orders_status_name from " . TABLE_ORDERS_STATUS . " where language_id = '" . (int)$languages_id . "'");
  while ($orders_status = tep_db_fetch_array($orders_status_query)) {
    $orders_statuses[] = array('id' => $orders_status['orders_status_id'],
                               'text' => $orders_status['orders_status_name']);
    $orders_status_array[$orders_status['orders_status_id']] = $orders_status['orders_status_name'];
  }

  $orders_ship_method = array();
  $orders_ship_method_array = array();
  $orders_ship_method_query = tep_db_query("select ship_method from orders_ship_methods where ship_method_language = '" . (int)$languages_id . "'");
  while ($orders_ship_methods = tep_db_fetch_array($orders_ship_method_query)) {
    $orders_ship_method[] = array('id'   => $orders_ship_methods['ship_method'],
                                  'text' => $orders_ship_methods['ship_method']);
    $orders_ship_method_array[$orders_ship_methods['ship_method']] = $orders_ship_methods['ship_method'];
  }

  $orders_pay_method = array();
  $orders_pay_method_array = array();
  $orders_pay_method_query = tep_db_query("select pay_method from orders_pay_methods where pay_method_language =  '" . (int)$languages_id . "'");
  while ($orders_pay_methods = tep_db_fetch_array($orders_pay_method_query)) {
    $orders_pay_method[] = array('id'   => $orders_pay_methods['pay_method'],
                                  'text' => $orders_pay_methods['pay_method']);
    $orders_pay_method_array[$orders_pay_methods['pay_method']] = $orders_pay_methods['pay_method'];
  }

  //$action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : 'edit');
//UPDATE_INVENTORY_QUANTITY_START##############################################################################################################
$order_query = tep_db_query("select products_id, products_quantity from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$oID . "'");
//UPDATE_INVENTORY_QUANTITY_START##############################################################################################################

  if (tep_not_null($action)) {
    switch ($action) {

  // Update Order
  case 'update_order':

    $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
    $order = new order($oID);
    $status = tep_db_prepare_input($HTTP_POST_VARS['status']);
    $comments = tep_db_prepare_input($HTTP_POST_VARS['comments']);

    // Update Order Info
    $UpdateOrders = "update " . TABLE_ORDERS . " set
      customers_name = '" . tep_db_input(stripslashes($update_customer_name)) . "',
      customers_company = '" . tep_db_input(stripslashes($update_customer_company)) . "',
      customers_street_address = '" . tep_db_input(stripslashes($update_customer_street_address)) . "',
      customers_suburb = '" . tep_db_input(stripslashes($update_customer_suburb)) . "',
      customers_city = '" . tep_db_input(stripslashes($update_customer_city)) . "',
      customers_state = '" . tep_db_input(stripslashes($update_customer_state)) . "',
      customers_postcode = '" . tep_db_input($update_customer_postcode) . "',
      customers_country = '" . tep_db_input(stripslashes($update_customer_country)) . "',
      customers_telephone = '" . tep_db_input($update_customer_telephone) . "',
      customers_email_address = '" . tep_db_input($update_customer_email_address) . "',";

    if($SeparateBillingFields)
    {
    $UpdateOrders .= "billing_name = '" . tep_db_input(stripslashes($update_billing_name)) . "',
      billing_company = '" . tep_db_input(stripslashes($update_billing_company)) . "',
      billing_street_address = '" . tep_db_input(stripslashes($update_billing_street_address)) . "',
      billing_suburb = '" . tep_db_input(stripslashes($update_billing_suburb)) . "',
      billing_city = '" . tep_db_input(stripslashes($update_billing_city)) . "',
      billing_state = '" . tep_db_input(stripslashes($update_billing_state)) . "',
      billing_postcode = '" . tep_db_input($update_billing_postcode) . "',
      billing_country = '" . tep_db_input(stripslashes($update_billing_country)) . "',";
    }

    $UpdateOrders .= "delivery_name = '" . tep_db_input(stripslashes($update_delivery_name)) . "',
      delivery_company = '" . tep_db_input(stripslashes($update_delivery_company)) . "',
      delivery_street_address = '" . tep_db_input(stripslashes($update_delivery_street_address)) . "',
      delivery_suburb = '" . tep_db_input(stripslashes($update_delivery_suburb)) . "',
      delivery_city = '" . tep_db_input(stripslashes($update_delivery_city)) . "',
      delivery_state = '" . tep_db_input(stripslashes($update_delivery_state)) . "',
      delivery_postcode = '" . tep_db_input($update_delivery_postcode) . "',
      delivery_country = '" . tep_db_input(stripslashes($update_delivery_country)) . "',
      payment_method = '" . tep_db_input($update_info_payment_method) . "',
      account_name = '" . tep_db_input($account_name) . "',
      account_number = '" . tep_db_input($account_number) . "',
      po_number = '" . tep_db_input($po_number) . "',
      cc_type = '" . tep_db_input($update_info_cc_type) . "',
      cc_owner = '" . tep_db_input($update_info_cc_owner) . "',
      cc_ccv = '" . tep_db_input($update_info_cc_ccv) . "',     
      cc_start = '" . tep_db_input($update_info_cc_start) . "',
      cc_issue = '" . tep_db_input($update_info_cc_issue) . "',

      
      last_modified = now(),";

    if(substr($update_info_cc_number,0,8) != "(Last 4)")
    $UpdateOrders .= "cc_number = '$update_info_cc_number',";
    $UpdateOrders .= "cc_expires = '$update_info_cc_expires',
      orders_status = '" . tep_db_input($status) . "'";

    if(!$CommentsWithStatus)
    {
      $UpdateOrders .= ", comments = '" . tep_db_input($comments) . "'";
    }

    $UpdateOrders .= " where orders_id = '" . tep_db_input($oID) . "';";

    tep_db_query($UpdateOrders);

    $Query1 = "update orders set last_modified = now() where orders_id = '" . tep_db_input($oID) . "';";
    tep_db_query($Query1);
    $order_updated = true;


          $check_status_query = tep_db_query("select customers_name, customers_email_address, orders_status, date_purchased from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");
          $check_status = tep_db_fetch_array($check_status_query);

    // Update Status History & Email Customer if Necessary
    if ($order->info['orders_status'] != $status)
    {
      // Notify Customer
              $customer_notified = '0';
      if (isset($HTTP_POST_VARS['notify']) && ($HTTP_POST_VARS['notify'] == 'on'))
      {
        $notify_comments = '';
        if (isset($HTTP_POST_VARS['notify_comments']) && ($HTTP_POST_VARS['notify_comments'] == 'on')) {
          $notify_comments = sprintf(EMAIL_TEXT_COMMENTS_UPDATE, $comments) . "\n\n";
        }
        $email = STORE_NAME . "\n" . EMAIL_SEPARATOR . "\n" . EMAIL_TEXT_ORDER_NUMBER . ' ' . $oID . "\n" . EMAIL_TEXT_INVOICE_URL . ' ' . tep_catalog_href_link(FILENAME_CATALOG_ACCOUNT_HISTORY_INFO, 'order_id=' . $oID, 'SSL') . "\n" . EMAIL_TEXT_DATE_ORDERED . ' ' . tep_date_long($check_status['date_purchased']) . "\n\n" . $notify_comments . sprintf(EMAIL_TEXT_STATUS_UPDATE, $orders_status_array[$status]);
        tep_mail($check_status['customers_name'], $check_status['customers_email_address'], EMAIL_TEXT_SUBJECT, $email, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
        $customer_notified = '1';
      }

      // "Status History" table has gone through a few
      // different changes, so here are different versions of
      // the status update.

      // NOTE: Theoretically, there shouldn't be a
      //       orders_status field in the ORDERS table. It
      //       should really just use the latest value from
      //       this status history table.

      if($CommentsWithStatus)
      {
      tep_db_query("insert into " . TABLE_ORDERS_STATUS_HISTORY . "
        (orders_id, orders_status_id, date_added, customer_notified, comments)
        values ('" . tep_db_input($oID) . "', '" . tep_db_input($status) . "', now(), " . tep_db_input($customer_notified) . ", '" . tep_db_input($comments)  . "')");
      }
      else
      {
        if($OldNewStatusValues)
        {
        tep_db_query("insert into " . TABLE_ORDERS_STATUS_HISTORY . "
          (orders_id, new_value, old_value, date_added, customer_notified)
          values ('" . tep_db_input($oID) . "', '" . tep_db_input($status) . "', '" . $order->info['orders_status'] . "', now(), " . tep_db_input($customer_notified) . ")");
        }
        else
        {
        tep_db_query("insert into " . TABLE_ORDERS_STATUS_HISTORY . "
          (orders_id, orders_status_id, date_added, customer_notified)
          values ('" . tep_db_input($oID) . "', '" . tep_db_input($status) . "', now(), " . tep_db_input($customer_notified) . ")");
        }
      }
    }

    // check to see if there are products to update
    if (count($update_products) > 0)
    {
    // Update Products
    $RunningSubTotal = 0;
    $RunningTax = 0;
        // CWS EDIT (start) -- Check for existence of subtotals...
        // Do pre-check for subtotal field existence
    $ot_subtotal_found = false;
      foreach($update_totals as $total_details)
    {
        extract($total_details,EXTR_PREFIX_ALL,"ot");
      if($ot_class == "ot_subtotal")
      {
          $ot_subtotal_found = true;
          break;
      }
    }
    // CWS EDIT (end) -- Check for existence of subtotals...

    foreach($update_products as $orders_products_id => $products_details)
    {
      // Update orders_products Table
      //UPDATE_INVENTORY_QUANTITY_START##############################################################################################################
      $order = tep_db_fetch_array($order_query);
      if ($products_details["qty"] != $order['products_quantity']) {
        $quantity_difference = ($products_details["qty"] - $order['products_quantity']);
          tep_db_query("update " . TABLE_PRODUCTS . " set products_quantity = products_quantity - " . $quantity_difference . ", products_ordered = products_ordered + " . $quantity_difference . " where products_id = '" . (int)$order['products_id'] . "'");
      }
      //UPDATE_INVENTORY_QUANTITY_END##############################################################################################################
      if($products_details["qty"] > 0)
      {
        $Query = "update " . TABLE_ORDERS_PRODUCTS . " set
          products_model = '" . $products_details["model"] . "',
          products_name = '" . str_replace("'", "&#39;", $products_details["name"]) . "',
          final_price = '" . $products_details["final_price"] . "',
          products_tax = '" . $products_details["tax"] . "',
          products_quantity = '" . $products_details["qty"] . "'
          where orders_products_id = '$orders_products_id';";
        tep_db_query($Query);

        // Update Tax and Subtotals
        $RunningSubTotal += $products_details["qty"] * $products_details["final_price"];
        $RunningTax += (($products_details["tax"]/100) * ($products_details["qty"] * $products_details["final_price"]));

        // Update Any Attributes
        if(IsSet($products_details[attributes]))
        {
          foreach($products_details["attributes"] as $orders_products_attributes_id => $attributes_details)
          {
            $Query = "update " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " set
              products_options = '" . $attributes_details["option"] . "',
              products_options_values = '" . $attributes_details["value"] . "'
              where orders_products_attributes_id = '$orders_products_attributes_id';";
            tep_db_query($Query);
          }
        }
      }
      else
      {
        // 0 Quantity = Delete
        $Query = "delete from " . TABLE_ORDERS_PRODUCTS . " where orders_products_id = '$orders_products_id';";
        tep_db_query($Query);
          //UPDATE_INVENTORY_QUANTITY_START##############################################################################################################
        $order = tep_db_fetch_array($order_query);
          if ($products_details["qty"] != $order['products_quantity']){
          $quantity_difference = ($products_details["qty"] - $order['products_quantity']);
          tep_db_query("update " . TABLE_PRODUCTS . " set products_quantity = products_quantity - " . $quantity_difference . ", products_ordered = products_ordered + " . $quantity_difference . " where products_id = '" . (int)$order['products_id'] . "'");
          }
          //UPDATE_INVENTORY_QUANTITY_END##############################################################################################################
        $Query = "delete from " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " where orders_products_id = '$orders_products_id';";
        tep_db_query($Query);
      }
    }

    // 1.4. UPDATE SHIPPING, DISCOUNT & CUSTOM TAXES #####
    // Shipping Tax
      foreach($update_totals as $total_index => $total_details)
      {
        extract($total_details,EXTR_PREFIX_ALL,"ot");
        if($ot_class == "ot_shipping")
        {
          $RunningTax += (($AddShippingTax / 100) * $ot_value);
        }
      }

    // Update Totals

      $RunningTotal = 0;
      $sort_order = 0;

      // Do pre-check for Tax field existence
        $ot_tax_found = 0;
        foreach($update_totals as $total_details)
        {
          extract($total_details,EXTR_PREFIX_ALL,"ot");
          if($ot_class == "ot_tax")
          {
            $ot_tax_found = 1;
            break;
          }
        }

      foreach($update_totals as $total_index => $total_details)
      {
        extract($total_details,EXTR_PREFIX_ALL,"ot");

        if( trim(strtolower($ot_title)) == "tax" || trim(strtolower($ot_title)) == "tax:" )
        {
          if($ot_class != "ot_tax" && $ot_tax_found == 0)
          {
            // Inserting Tax
            $ot_class = "ot_tax";
            $ot_value = "x"; // This gets updated in the next step
            $ot_tax_found = 1;
          }
        }

        if( trim($ot_title) && trim($ot_value) )
        {
          $sort_order++;

          // Update ot_subtotal, ot_tax, and ot_total classes
            if($ot_class == "ot_subtotal")
            $ot_value = $RunningSubTotal;

            if($ot_class == "ot_tax")
            {
            $ot_value = $RunningTax;
            // print "ot_value = $ot_value<br>\n";
            }
//disocunt



     // CWS EDIT (start) -- Check for existence of subtotals...
            if($ot_class == "ot_total")
                        {

                $ot_value = $RunningTotal ;
                            if ( !$ot_subtotal_found )
                            {
                                // There was no subtotal on this order, lets add the running subtotal in.
                                $ot_value = $ot_value + $RunningSubTotal;
                            }
                        }
     // CWS EDIT (end) -- Check for existence of subtotals...

          // Set $ot_text (display-formatted value)
            // $ot_text = "\$" . number_format($ot_value, 2, '.', ',');

            $order = new order($oID);
            $ot_text = $currencies->format($ot_value, true, $order->info['currency'], $order->info['currency_value']);

            if($ot_class == "ot_total")
            $ot_text = "<b>" . $ot_text . "</b>";

          if($ot_total_id > 0)
          {
            // In Database Already - Update
            $Query = "update " . TABLE_ORDERS_TOTAL . " set
              title = '$ot_title',
              text = '$ot_text',
              value = '$ot_value',
              sort_order = '$sort_order'
              where orders_total_id = '$ot_total_id'";
            tep_db_query($Query);
          }
          else
          {

            // New Insert
            $Query = "insert into " . TABLE_ORDERS_TOTAL . " set
              orders_id = '$oID',
              title = '$ot_title',
              text = '$ot_text',
              value = '$ot_value',
              class = '$ot_class',
              sort_order = '$sort_order'";
            tep_db_query($Query);
          }

          if ($ot_class == "ot_shipping" || $ot_class == "ot_lev_discount" || $ot_class == "ot_customer_discount" || $ot_class == "ot_custom" || $ot_class == "ot_cod_fee") {
            // Again, because products are calculated in terms of default currency, we need to align shipping, custom etc. values with default currency
            $RunningTotal += $ot_value / $order->info['currency_value'];
          }
          else
          {
            if($ot_class != "ot_tax") {
              $RunningTotal += $ot_value;
            }
            else if ( DISPLAY_PRICE_WITH_TAX == 'false') {
               // For German friends, the tax is included in the price and should not be
               // taken in account when calculating total (not sure about shipping part, though :) )
               $RunningTotal += $ot_value;
            }
          }
        
            //  print $ot_value."<br>";
        }
      elseif (($ot_total_id > 0) && ($ot_class != "ot_shipping")) { // Delete Total Piece
        
          // Delete Total Piece
          $Query = "delete from " . TABLE_ORDERS_TOTAL . " where orders_total_id = '$ot_total_id'";
          tep_db_query($Query);
        }

      }
    }
    if ($order_updated)
    {
      $messageStack->add_session('search', SUCCESS_ORDER_UPDATED, 'success');
    }

            tep_redirect(tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('action')) . 'oID=' . $HTTP_GET_VARS['oID'] . '&action=edit', 'SSL'));

  break;

  // Add a Product
  case 'add_product':
    if($step == 5)
    {
      // Get Order Info
      $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
      $order = new order($oID);

      $AddedOptionsPrice = 0;

      // Get Product Attribute Info
      if(IsSet($add_product_options))
      {
        foreach($add_product_options as $option_id => $option_value_id)
        {
          if (DOWNLOAD_ENABLED == 'true') {

            $result = tep_db_query("SELECT * FROM " . TABLE_PRODUCTS_ATTRIBUTES . " pa LEFT JOIN " . TABLE_PRODUCTS_OPTIONS . " po ON po.products_options_id=pa.options_id LEFT JOIN " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov ON pov.products_options_values_id=pa.options_values_id LEFT JOIN " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad on pad.products_attributes_id=pa.products_attributes_id WHERE products_id='$add_product_products_id' and options_id=$option_id and options_values_id=$option_value_id");
          } else {

            $result = tep_db_query("SELECT * FROM " . TABLE_PRODUCTS_ATTRIBUTES . " pa LEFT JOIN " . TABLE_PRODUCTS_OPTIONS . " po ON po.products_options_id=pa.options_id LEFT JOIN " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov ON pov.products_options_values_id=pa.options_values_id WHERE products_id='$add_product_products_id' and options_id=$option_id and options_values_id=$option_value_id");
          }
          $row = tep_db_fetch_array($result);
          extract($row, EXTR_PREFIX_ALL, "opt");
          $AddedOptionsPrice += $opt_options_values_price;
          $option_value_details[$option_id][$option_value_id] = array ("options_values_price" => $opt_options_values_price);
          $option_names[$option_id] = $opt_products_options_name;
          $option_values_names[$option_value_id] = $opt_products_options_values_name;
        }
      }

      // Get Product Info
      $InfoQuery = "select p.products_model,p.products_price,pd.products_name,p.products_tax_class_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id='$add_product_products_id' and p.products_id=pd.products_id";
      $result = tep_db_query($InfoQuery);
      $row = tep_db_fetch_array($result);
      extract($row, EXTR_PREFIX_ALL, "p");

      // risolviamo il bug delle offerte
      $rs_offerte = tep_db_query("select * from specials where products_id ='". $add_product_products_id."' and status = 1 "  );
      $offerte = tep_db_fetch_array($rs_offerte);
      
      
      if ($offerte) 
      {
      $p_products_price = $offerte['specials_new_products_price'];
      }
      // Following functions are defined at the bottom of this file
      $CountryID = tep_get_country_id($order->delivery["country"]);
      $ZoneID = tep_get_zone_id($CountryID, $order->delivery["state"]);

      $ProductsTax = tep_get_tax_rate($p_products_tax_class_id, $CountryID, $ZoneID);

      $Query = "insert into " . TABLE_ORDERS_PRODUCTS . " set
        orders_id = $oID,
        products_id = $add_product_products_id,
        products_model = '$p_products_model',
        products_name = '" . str_replace("'", "&#39;", $p_products_name) . "',
        products_price = '$p_products_price',
        final_price = '" . ($p_products_price + $AddedOptionsPrice) . "',
        products_tax = '$ProductsTax',
        products_quantity = $add_product_quantity;";
      tep_db_query($Query);
      $new_product_id = tep_db_insert_id();
      //UPDATE_INVENTORY_QUANTITY_START##############################################################################################################
      tep_db_query("update " . TABLE_PRODUCTS . " set products_quantity = products_quantity - " . $add_product_quantity . ", products_ordered = products_ordered + " . $add_product_quantity . " where products_id = '" . $add_product_products_id . "'");
      //UPDATE_INVENTORY_QUANTITY_END##############################################################################################################
      if(IsSet($add_product_options))
      {
        foreach($add_product_options as $option_id => $option_value_id)
        {
          $Query = "insert into " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " set
            orders_id = $oID,
            orders_products_id = $new_product_id,
            products_options = '" . $option_names[$option_id] . "',
            products_options_values = '" . $option_values_names[$option_value_id] . "',
            options_values_price = '" . $option_value_details[$option_id][$option_value_id]["options_values_price"] . "',
            price_prefix = '+';";
          tep_db_query($Query);

          if ((DOWNLOAD_ENABLED == 'true') && isset($opt_products_attributes_filename) && tep_not_null($opt_products_attributes_filename)) {
            $sql_data_array = array('orders_id' => $oID,
                                    'orders_products_id' => $new_product_id,
                                    'orders_products_filename' => $opt_products_attributes_filename,
                                    'download_maxdays' => $opt_products_attributes_maxdays,
                                    'download_count' => $opt_products_attributes_maxcount);
            tep_db_perform(TABLE_ORDERS_PRODUCTS_DOWNLOAD, $sql_data_array);
          }
        }
      }

      // Stock Update
      $stock_chk_query = tep_db_query("select products_quantity from products where products_id = '" . $add_product_products_id . "'");
      $stock_chk_values = tep_db_fetch_array($stock_chk_query);
        $stock_chk_left = $stock_chk_values['products_quantity'] - $add_product_quantity;
      tep_db_query("update products set products_quantity = '" . $stock_chk_left . "' where products_id = '" . $add_product_products_id . "'");

      // Update products_ordered (for bestsellers list)
      tep_db_query("update products set products_ordered = products_ordered + " . $add_product_quantity . " where products_id = '" . $add_product_products_id . "'");


      // Calculate Tax and Sub-Totals
      $order = new order($oID);
      $RunningSubTotal = 0;
      $RunningTax = 0;

      for ($i=0; $i<sizeof($order->products); $i++)
      {
      $RunningSubTotal += ($order->products[$i]['qty'] * $order->products[$i]['final_price']);
      $RunningTax += (($order->products[$i]['tax'] / 100) * ($order->products[$i]['qty'] * $order->products[$i]['final_price']));
      }
        //   echo 'running_tax ' . $RunningTax ;
    if ($ot_class == "ot_shipping" || $ot_class == "ot_lev_discount" || $ot_class == "ot_customer_discount" || $ot_class == "ot_custom" || $ot_class == "ot_cod_fee") {
      // Again, because products are calculated in terms of default currency, we need to align shipping, custom etc. values with default currency
      $RunningTotal += $ot_value / $order->info['currency_value'];
      }

      // Tax
      $Query = "update " . TABLE_ORDERS_TOTAL . " set
        text = '\$" . number_format($RunningTax, 2, '.', ',') . "',
        value = '" . $RunningTax . "'
        where class='ot_tax' and orders_id=$oID";
      tep_db_query($Query);

      // Sub-Total
      $Query = "update " . TABLE_ORDERS_TOTAL . " set
        text = '\$" . number_format($RunningSubTotal, 2, '.', ',') . "',
        value = '" . $RunningSubTotal . "'
        where class='ot_subtotal' and orders_id=$oID";
      tep_db_query($Query);

      // Total
      $Query = "select sum(value) as total_value from " . TABLE_ORDERS_TOTAL . " where class != 'ot_total' and orders_id=$oID";
      $result = tep_db_query($Query);
      $row = tep_db_fetch_array($result);
      $Total = $row["total_value"];

      $Query = "update " . TABLE_ORDERS_TOTAL . " set
        text = '<b>\$" . number_format($Total, 2, '.', ',') . "</b>',
        value = '" . $Total . "'
        where class='ot_total' and orders_id=$oID";
      tep_db_query($Query);


tep_redirect(tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('action')) . 'oID=' . $HTTP_GET_VARS['oID'] . '&action=edit', 'SSL'));

    }
  break;
// BMC Delete CC info Start
// Remove CVV Number
    case 'deleteccinfo':
      $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);


      tep_db_query("update " . TABLE_ORDERS . " set cc_ccv = null where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_number = '0000000000000000' where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_expires = null where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_start = null where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_issue = null where orders_id = '" . tep_db_input($oID) . "'");

      tep_redirect(tep_href_link(FILENAME_ABANDONED_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=edit'));
      break;
    }
  }

  if (($action == 'edit') && isset($HTTP_GET_VARS['oID'])) {
    $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);

    $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");
    $order_exists = true;
    if (!tep_db_num_rows($orders_query)) {
      $order_exists = false;
      $messageStack->add(sprintf('search', ERROR_ORDER_DOES_NOT_EXIST, $oID), 'error');
    }
  }
// BOF: WebMakers.com Added: Additional info for Orders
// Look up things in orders
$the_extra_query= tep_db_query("select * from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_id= $the_extra['customers_id'];
// Look up things in customers
$the_extra_query= tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $the_customers_id . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_fax= $the_extra['customers_fax'];
// EOF: WebMakers.com Added: Additional info for Orders

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script language="javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=650,height=500,screenX=150,screenY=150,top=150,left=150')
}
//--></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
<?php
  require(DIR_WS_INCLUDES . 'header.php');
?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
$totals_check_query = tep_db_query("select * from " . TABLE_ORDERS_TOTAL . " where orders_id = '" . (int)$oID . "' order by sort_order");
if (tep_db_num_rows($totals_check_query) < 1) { 
 $abandoned = 1;
 }

  if (($action == 'edit') && ($order_exists == true)) {
    $order = new order($oID);
?>
      <tr>
        <td width="100%">
          <table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
     if ($abandoned == '1'){
     ?>
           <tr>     
            <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
      <td class="messageStackError"><?php echo HEADING_ABANDONED . $oID; ?></td></tr>
      <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
    </table></td>
   </tr>

  <?php
    } else{
    ?>
           <tr>     
            <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                <tr>
                  <td class="pageHeading"><?php echo HEADING_TITLE . '  ' .$oID;  ?></td>
                  <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
                </tr>
              </table></td>
 </tr>
<?php   
    }
?>

          <tr>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            <td class="pageHeading" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('action')),  'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
          </tr>
        </table></td>
      </tr>


<!-- Begin Addresses Block -->
      <tr>
      <?php // echo tep_draw_form('edit_order', FILENAME_ABANDONED_ORDERS,  tep_get_all_get_params(array('action','paycc')), 'action=update_order', 'post'); 
      ?>

<tr><?php echo tep_draw_form('edit_order', FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('action','paycc'), 'post', '', 'SSL') . 'action=update_order', 'post', '', 'SSL'); ?>
  <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
    </tr>
    <tr>
      <td valign="top">
      <!-- Customer Info Block -->
    <table border="0" cellspacing="0" cellpadding="2">
    <tr>
    <td colspan='2' class="main" valign="top"><b><?php echo ENTRY_CUSTOMER; ?></b></td>
    <td colspan='2' class="main" valign="top"><b><?php echo ENTRY_BILLING_ADDRESS; ?></b></td>
    </tr>
    <tr>
    <td colspan='2' class="main">
    <table border="0" cellspacing="0" cellpadding="2" class="infoBox">
      <tr>
      <td class="editOrder"><b><?php echo ENTRY_NAME ?></b></font></td>
      <td><input name='update_customer_name' size='37' value='<?php echo tep_html_quotes($order->customer['name']); ?>'></td>
      </tr>
      <tr>
        <td class="editOrder"><b><?php echo ENTRY_COMPANY ?></b></font></td>
        <td><input name='update_customer_company' size='37' value='<?php echo tep_html_quotes($order->customer['company']); ?>'></td>
      </tr>
      <tr>
        <td class="editOrder"><b><?php echo CATEGORY_ADDRESS ?></b></font></td>
        <td><input name='update_customer_street_address' size='37' value='<?php echo tep_html_quotes($order->customer['street_address']); ?>'></td>
      </tr>
      <tr>
        <td class="editOrder"><b><?php echo ENTRY_SUBURB ?></b></font></td>
        <td><input name='update_customer_suburb' size='37' value='<?php echo tep_html_quotes($order->customer['suburb']); ?>'></td>
      </tr>
      <tr>
        <td class="editOrder"><b><?php echo ENTRY_CITY ?></b></font></td>
        <td><input name='update_customer_city' size='15' value='<?php echo tep_html_quotes($order->customer['city']); ?>'> </td>
      </tr>
      <tr>
        <td class="editOrder"><b><?php echo ENTRY_STATE ?></b></font></td>
        <td><input name='update_customer_state' size='15' value='<?php echo tep_html_quotes($order->customer['state']); ?>'> </td>
      </tr>
      <tr>
        <td class="editOrder"><b><?php echo ENTRY_POST_CODE ?></b></font></td>
        <td><input name='update_customer_postcode' size='5' value='<?php echo $order->customer['postcode']; ?>'></td>
      </tr>
      <tr>
        <td class="editOrder"><b><?php echo ENTRY_COUNTRY ?></b></font></td>
        <td><input name='update_customer_country' size='37' value='<?php echo tep_html_quotes($order->customer['country']); ?>'></td>
      </tr>
     </table>
    </td>


<?php if($SeparateBillingFields) { ?>
      <td>
       <!-- Billing Address Block -->
       <table border="0" cellspacing="0" cellpadding="2">

      <tr>
        <td colspan='2' class="main">
          <table border="0" cellspacing="0" cellpadding="2" class="infoBox">
          <tr>
            <td class="editOrder"><b><?php echo ENTRY_NAME ?></b></font></td>
              <td><input name='update_billing_name' size='37' value='<?php echo tep_html_quotes($order->billing['name']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_COMPANY ?></b></font></td>
              <td><input name='update_billing_company' size='37' value='<?php echo tep_html_quotes($order->billing['company']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo CATEGORY_ADDRESS ?></b></font></td>
              <td><input name='update_billing_street_address' size='37' value='<?php echo tep_html_quotes($order->billing['street_address']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_SUBURB ?></b></font></td>
              <td><input name='update_billing_suburb' size='37' value='<?php echo tep_html_quotes($order->billing['suburb']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_CITY ?></b></font></td>
              <td><input name='update_billing_city' size='15' value='<?php echo tep_html_quotes($order->billing['city']); ?>'> </td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_STATE ?></b></font></td>
              <td><input name='update_billing_state' size='15' value='<?php echo tep_html_quotes($order->billing['state']); ?>'> </td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_POST_CODE ?></b></font></td>
              <td><input name='update_billing_postcode' size='5' value='<?php echo $order->billing['postcode']; ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_COUNTRY ?></b></font></td>
              <td><input name='update_billing_country' size='37' value='<?php echo tep_html_quotes($order->billing['country']); ?>'></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
      </td>
<?php } ?>

    </tr>
    </table>
      </td>
      </tr>

      <tr>
      <td valign="top">
      <!-- Shipping Address Block -->
    <table border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td class="main" valign="top"><b><?php echo ENTRY_SHIPPING_ADDRESS; ?></b></td>
      </tr>
      <tr>
        <td colspan='1' class="main">
          <table border="0" cellspacing="0" cellpadding="2" class="infoBox">
          <tr>
            <td class="editOrder"><b><?php echo ENTRY_NAME ?></b></font></td>
              <td><input name='update_delivery_name' size='37' value='<?php echo tep_html_quotes($order->delivery['name']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_COMPANY ?></b></font></td>
              <td><input name='update_delivery_company' size='37' value='<?php echo tep_html_quotes($order->delivery['company']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo CATEGORY_ADDRESS ?></b></font></td>
              <td><input name='update_delivery_street_address' size='37' value='<?php echo tep_html_quotes($order->delivery['street_address']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_SUBURB ?></b></font></td>
              <td><input name='update_delivery_suburb' size='37' value='<?php echo tep_html_quotes($order->delivery['suburb']); ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_CITY ?></b></font></td>
              <td><input name='update_delivery_city' size='15' value='<?php echo tep_html_quotes($order->delivery['city']); ?>'> </td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_STATE ?></b></font></td>
              <td><input name='update_delivery_state' size='15' value='<?php echo tep_html_quotes($order->delivery['state']); ?>'> </td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_POST_CODE ?></b></font></td>
              <td><input name='update_delivery_postcode' size='5' value='<?php echo $order->delivery['postcode']; ?>'></td>
            </tr>
            <tr>
              <td class="editOrder"><b><?php echo ENTRY_COUNTRY ?></b></font></td>
              <td><input name='update_delivery_country' size='37' value='<?php echo tep_html_quotes($order->delivery['country']); ?>'></td>
            </tr>
          </table>
        </td>
        <td class="main" align="center" valign="middle">
          <font size="2" face="Arial,Helvetica,Geneva,Swiss,SunSans-Regular" color="red"><b><?php echo HEADING_INSTRUCT1 ?></b></font><br><br>
          <?php echo HEADING_INSTRUCT2 ?>

        </td>
       </tr>
      </table>
      </td>
    </tr>
  </table></td>
      </tr>
<!-- End Addresses Block -->

      <tr>
  <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>

<!-- Begin Phone/Email Block -->
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2" class="infoBox">
          <tr>
            <td class="main"><b><?php echo ENTRY_TELEPHONE_NUMBER; ?></b></td>
            <td class="main"><input name='update_customer_telephone' size='15' value='<?php echo $order->customer['telephone']; ?>'></td>
          </tr>
          <tr>
            <td class="main"><b><?php echo ENTRY_EMAIL_ADDRESS; ?></b></td>
            <td class="main"><input name='update_customer_email_address' size='35' value='<?php echo $order->customer['email_address']; ?>'></td>
          </tr>
        </table></td>
      </tr>
<!-- End Phone/Email Block -->

      <tr>
  <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>

<!-- Begin Payment Block -->
      <tr>
   <?php   
    if (strtolower($order->info['payment_method']) == 'paypal') {

include(DIR_FS_CATALOG_MODULES . 'payment/paypal/admin/TransactionSummaryLogs.inc.php');

}else{
?> 
  <td><table border="0" cellspacing="0" cellpadding="2" class="infoBox">
    <tr valine="middle">
      <td class="main"><b><?php echo ENTRY_PAYMENT_METHOD; ?></b></td>
      <?php
            //list exsisting payment if not in current order_pay_meahtods table
                 $orders_pay_methodA[] = array('id'   => $order->info['payment_method'],
                                                       'text' => $order->info['payment_method']);
                          // check to see if meathod in totals  is in same as in order_pay_meahtods table
                          // if false merge if true dont merge
                          if (!array_intersect ($orders_pay_method, $orders_pay_methodA)){
                         $orders_pay_method1 = array_merge($orders_pay_methodA, $orders_pay_method) ;
                                  }else{
                               $orders_pay_method1 = $orders_pay_method;
                                  }
    
//begin PayPal_Shopping_Cart_IPN V3.15 DMG
    


//}//else not paypal
//end PayPal_Shopping_Cart_IPN
?>
      <td class="main"><?php echo tep_draw_pull_down_menu('update_info_payment_method', $orders_pay_method1, $order->info['payment_method']); ?>
      <?php echo tep_image_submit('button_update.gif', IMAGE_UPDATE); ?>
      <?php
      if($order->info['payment_method'] != "Credit Card")
      echo TEXT_VIEW_CC;
      ?>
      <?php
    if($order->info['payment_method'] != "Purchase Order")
    echo TEXT_VIEW_PO;
      ?>
      </td>
    </tr>
<?php
// BMC CC Mod Start
if ($order->info['cc_number'] != '0000000000000000') { 
  if ( strtolower(CC_ENC) == 'true' ) {
    $key = changeme;
    $cipher_data = $order->info['cc_number'];
    $order->info['cc_number'] = changedataout($cipher_data,$key);
  }
}
// BMC CC Mod End
    if (tep_not_null($order->info['cc_type']) || tep_not_null($order->info['cc_owner']) || tep_not_null($order->info['cc_number'])) {
?>
    <!-- Begin Credit Card Info Block -->
    <tr>
      <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
    </tr>
    <tr>
      <td class="main"><?php echo ENTRY_CREDIT_CARD_TYPE; ?></td>
      <td class="main"><input name='update_info_cc_type' size='10' value='<?php echo $order->info['cc_type']; ?>'></td>
    </tr>
    <tr>
      <td class="main"><?php echo ENTRY_CREDIT_CARD_OWNER; ?></td>
      <td class="main"><input name='update_info_cc_owner' size='20' value='<?php echo $order->info['cc_owner']; ?>'></td>
    </tr>
    <tr>
      <td class="main"><?php echo ENTRY_CREDIT_CARD_NUMBER; ?></td>
      <td class="main"><input name='update_info_cc_number' size='20' value='<?php echo $order->info['cc_number']; ?>'></td>
    </tr>
          <tr>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_CCV; ?></td>
            <td class="main"><input name='update_info_cc_ccv' size='4' value='<?php echo $order->info['cc_ccv']; ?>'></td>
          </tr>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_START_DATE; ?></td>
            <td class="main"><input name='update_info_cc_start' size='4' value='<?php echo $order->info['cc_start']; ?>'></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_ISSUE; ?></td>
            <td class="main"><input name='update_info_cc_issue' size='4' value='<?php echo $order->info['cc_issue']; ?>'></td>
          </tr>
          <tr>
      <td class="main"><?php echo ENTRY_CREDIT_CARD_EXPIRES; ?></td>
      <td class="main"><input name='update_info_cc_expires' size='4' value='<?php echo $order->info['cc_expires']; ?>'></td>
    </tr>
    <!-- End Credit Card Info Block -->


    <?php
        // purchaseorder start
            } else if( (($order->info['account_name']) || ($order->info['account_number']) || $order->info['payment_method'] == "Purchase Order"|| ($order->info['po_number'])) ) {
        ?>
    <tr>
          <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
    </tr>
    <tr>
    <td class="main" valign="top" align="left"><b><?php echo TEXT_INFO_PO ?></b></td>
    <td>
    <table border="0" cellspacing="0" cellpadding="2">
    <tr>
      <td width="10"><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
      <td class="main"><?php echo TEXT_INFO_NAME ?></td>
      <td><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
      <td class="main"><input type="text" name="account_name" value='<?php echo $order->info['account_name']; ?>'></td></td>
      <td width="10"><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
    </tr>
    <tr>
      <td width="10"><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
      <td class="main"><?php echo TEXT_INFO_AC_NR ?></td>
      <td><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
      <td class="main"><input type="text" name="account_number" value='<?php echo $order->info['account_number']; ?>'></td>
      <td width="10"><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
    </tr>
    <tr>
      <td width="10"><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
      <td class="main"><?php echo TEXT_INFO_PO_NR ?></td>
      <td><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
      <td class="main"><input type="text" name="po_number" value='<?php echo $order->info['po_number']; ?>'></td>
      <td width="10"><img src="images/pixel_trans.gif" border="0" alt="" width="10" height="1"></td>
    </tr>
   </table>
   </td>
     </tr>
  <?php } }?>
  </table></td>
      </tr>
<!-- End Payment Block -->
   <?php
     if ($abandoned == '1'){
     ?>
           <tr>     
            <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
            <tr>
              <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
      <td class="messageStackError"><?php echo HEADING_ABANDONED . $oID; ?></td></tr>
      <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
    </table></td>
   </tr>
<?php 
} else {
?>
      <tr>
  <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
<?php
}
?>
<!-- Begin Products Listing Block -->
      <tr>
  <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
    <tr class="dataTableHeadingRow">
      <td class="dataTableHeadingContent" colspan="2"><?php echo TABLE_HEADING_PRODUCTS; ?></td>
      <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PRODUCTS_MODEL; ?></td>
      <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_TAX; ?></td>
      <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_BASE_PRICE; ?></td>
      <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_UNIT_PRICE; ?></td>
      <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_TOTAL_PRICE; ?></td>
    </tr>

  <!-- Begin Products Listings Block -->
  <?php
        // Override order.php Class's Field Limitations
    $index = 0;
    $order->products = array();
    $orders_products_query = tep_db_query("select * from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$oID . "'");
    while ($orders_products = tep_db_fetch_array($orders_products_query)) {
    $order->products[$index] = array('qty' => $orders_products['products_quantity'],
                                        'name' => str_replace("'", "&#39;", $orders_products['products_name']),
                                        'model' => $orders_products['products_model'],
                                        'tax' => $orders_products['products_tax'],
                                        'price' => $orders_products['products_price'],
                                        'final_price' => $orders_products['final_price'],
                                        'orders_products_id' => $orders_products['orders_products_id']);

    $subindex = 0;
    $attributes_query_string = "select * from " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " where orders_id = '" . (int)$oID . "' and orders_products_id = '" . (int)$orders_products['orders_products_id'] . "'";
    $attributes_query = tep_db_query($attributes_query_string);

    if (tep_db_num_rows($attributes_query)) {
    while ($attributes = tep_db_fetch_array($attributes_query)) {
      $order->products[$index]['attributes'][$subindex] = array('option' => $attributes['products_options'],
                                                               'value' => $attributes['products_options_values'],
                                                               'prefix' => $attributes['price_prefix'],
                                                               'price' => $attributes['options_values_price'],
                                                               'orders_products_attributes_id' => $attributes['orders_products_attributes_id']);
    $subindex++;
    }
    }
    $index++;
    }

  for ($i=0; $i<sizeof($order->products); $i++) {
    $orders_products_id = $order->products[$i]['orders_products_id'];

    $RowStyle = "dataTableContent";

    echo '    <tr class="dataTableRow">' . "\n" .
       '      <td class="' . $RowStyle . '" valign="top" align="right">' . "<input name='update_products[$orders_products_id][qty]' size='2' value='" . $order->products[$i]['qty'] . "'>&nbsp;x</td>\n" .
       '      <td class="' . $RowStyle . '" valign="top">' . "<input name='update_products[$orders_products_id][name]' size='25' value='" . $order->products[$i]['name'] . "'>";

    // Has Attributes?
    if (sizeof($order->products[$i]['attributes']) > 0) {
      for ($j=0; $j<sizeof($order->products[$i]['attributes']); $j++) {
        $orders_products_attributes_id = $order->products[$i]['attributes'][$j]['orders_products_attributes_id'];
        echo '<br><nobr><small>&nbsp;<i> - ' . "<input name='update_products[$orders_products_id][attributes][$orders_products_attributes_id][option]' size='6' value='" . $order->products[$i]['attributes'][$j]['option'] . "'>" . ': ' . "<input name='update_products[$orders_products_id][attributes][$orders_products_attributes_id][value]' size='10' value='" . $order->products[$i]['attributes'][$j]['value'] . "' >" . $order->products[$i]['attributes'][$j]['prefix'] . ' ' . $currencies->format($order->products[$i]['attributes'][$j]['price']) ;
        echo '</i></small></nobr>';
      }
    }

    echo '      </td>' . "\n" .
         '      <td class="' . $RowStyle . '" valign="top">' . "<input name='update_products[$orders_products_id][model]' size='12' value='" . $order->products[$i]['model'] . "'>" . '</td>' . "\n" .
         '      <td class="' . $RowStyle . '" align="center" valign="top">' . "<input name='update_products[$orders_products_id][tax]' size='3' value='" . tep_display_tax_value($order->products[$i]['tax']) . "'>" . '%</td>' . "\n" .
         '      <td class="' . $RowStyle . '" align="right" valign="top">' . "<input name='update_products[$orders_products_id][price]' size='5' value='" . number_format($order->products[$i]['price'], 2, '.', '') . "'>" . '</td>' . "\n" .
         '      <td class="' . $RowStyle . '" align="right" valign="top">' . "<input name='update_products[$orders_products_id][final_price]' size='5' value='" . number_format($order->products[$i]['final_price'], 2, '.', '') . "'>" . '</td>' . "\n" .
         '      <td class="' . $RowStyle . '" align="right" valign="top">' . $currencies->format($order->products[$i]['final_price'] * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . '</td>' . "\n" .
         '    </tr>' . "\n";
  }
  ?>
   <?php
     if ($abandoned == '1'){
     ?>
<tr><td>Display basket</td></tr>
   <?php
}
     ?>

  <!-- Begin Order Total Block -->
    <tr>
      <td align="right" colspan="7">
        <table border="0" cellspacing="0" cellpadding="2" width="100%">
        <tr>
        <td align='center' valign='top'><br><?php echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=add_product&step=1') . '">'. tep_image_button('button_add_product.gif', 'Add a product') . '&nbsp;</a></td>' ;?>
        <td align='right'>
        <table border="0" cellspacing="0" cellpadding="2">
<?php

        // Override order.php Class's Field Limitations
    $totals_query = tep_db_query("select * from " . TABLE_ORDERS_TOTAL . " where orders_id = '" . (int)$oID . "' order by sort_order");
    $order->totals = array();
    while ($totals = tep_db_fetch_array($totals_query)) { $order->totals[] = array('title' => $totals['title'], 'text' => $totals['text'], 'class' => $totals['class'], 'value' => $totals['value'], 'orders_total_id' => $totals['orders_total_id']); }

  $TotalsArray = array();
  for ($i=0; $i<sizeof($order->totals); $i++) {
    $TotalsArray[] = array("Name" => $order->totals[$i]['title'], "Price" => number_format($order->totals[$i]['value'], 2, '.', ''), "Class" => $order->totals[$i]['class'], "TotalID" => $order->totals[$i]['orders_total_id']);
    $TotalsArray[] = array("Name" => "          ", "Price" => "", "Class" => "ot_custom", "TotalID" => "0");
  }

  array_pop($TotalsArray);
  foreach($TotalsArray as $TotalIndex => $TotalDetails)
  {
    $TotalStyle = "smallText";
    if(($TotalDetails["Class"] == "ot_subtotal") || ($TotalDetails["Class"] == "ot_total"))
    {
      echo  '       <tr>' . "\n" .
        '   <td class="main" align="right"><b>' . $TotalDetails["Name"] . '</b></td>' .
        '   <td class="main" align="right"><b>' . $TotalDetails["Price"] .
            "<input name='update_totals[$TotalIndex][title]' type='hidden' value='" . trim($TotalDetails["Name"]) . "' >" .
            "<input name='update_totals[$TotalIndex][value]' type='hidden' value='" . $TotalDetails["Price"] . "' size='6' >" .
            "<input name='update_totals[$TotalIndex][class]' type='hidden' value='" . $TotalDetails["Class"] . "'>\n" .
            "<input type='hidden' name='update_totals[$TotalIndex][total_id]' value='" . $TotalDetails["TotalID"] . "'>" . '</b></td>' .
        '       </tr>' . "\n";
    }
    elseif($TotalDetails["Class"] == "ot_customer_discount")
        {
          echo  '       <tr>' . "\n" .
            '   <td class="main" align="right">' . ENTRY_CUSTOMER_DISCOUNT . '<b>' . $TotalDetails["Name"] . '</b></td>' .
            '   <td align="right" class="' . $TotalStyle . '">' . "<input name='update_totals[$TotalIndex][value]' size='6' value=' " . $TotalDetails["Price"] . "'>" .
                    "<input name='update_totals[$TotalIndex][title]' type='hidden' value='" . trim($TotalDetails["Name"]) . "' >" .
                "<input name='update_totals[$TotalIndex][class]' type='hidden' value='" . $TotalDetails["Class"] . "'>\n" .
                "<input type='hidden' name='update_totals[$TotalIndex][total_id]' value='" . $TotalDetails["TotalID"] . "'>" . '</b></td>' .
            '       </tr>' . "\n";
    }

    elseif($TotalDetails["Class"] == "ot_gv")
        {
          echo  '       <tr>' . "\n" .
            '   <td class="main" align="right">' . ENTRY_CUSTOMER_GV . '<b>' . $TotalDetails["Name"] . '</b></td>' .
            '   <td align="right" class="' . $TotalStyle . '">' . "<input name='update_totals[$TotalIndex][value]' size='6' value=' " . $TotalDetails["Price"] . "'>" .
                    "<input name='update_totals[$TotalIndex][title]' type='hidden' value='" . trim($TotalDetails["Name"]) . "' >" .
                "<input name='update_totals[$TotalIndex][class]' type='hidden' value='" . $TotalDetails["Class"] . "'>\n" .
                "<input type='hidden' name='update_totals[$TotalIndex][total_id]' value='" . $TotalDetails["TotalID"] . "'>" . '</b></td>' .
            '       </tr>' . "\n";
    }
    elseif($TotalDetails["Class"] == "ot_subtotal") 
    {
      echo '  <tr>' . "\n" .
           '    <td align="right" class="' . $TotalStyle . '"><b>' . $TotalDetails["Name"] . '</b></td>' .
           '    <td align="right" class="' . $TotalStyle . '"><b>' . $currencies->format($TotalDetails["Price"], true, $order->info['currency'], $order->info['currency_value']) . '</b>' . 
                "<input name='update_totals[$TotalIndex][title]' type='hidden' value='" . trim($TotalDetails["Name"]) . "' size='" . strlen($TotalDetails["Name"]) . "' >" . 
                "<input name='update_totals[$TotalIndex][value]' type='hidden' value='" . $TotalDetails["Price"] . "' size='6' >" . 
                "<input name='update_totals[$TotalIndex][class]' type='hidden' value='" . $TotalDetails["Class"] . "'>\n" . 
                "<input type='hidden' name='update_totals[$TotalIndex][total_id]' value='" . $TotalDetails["TotalID"] . "'>" . '</b></td>' . 
           '    <td align="right" class="' . $TotalStyle . '"><b>' . tep_draw_separator('pixel_trans.gif', '1', '17') . '</b>' . 
           '  </tr>' . "\n";
    }
    elseif($TotalDetails["Class"] == "ot_tax")
    {
      echo  '       <tr>' . "\n" .
        '   <td class="main" align="right"><b>' . $TotalDetails["Name"] . '</b></td>' .
        '   <td class="main" align="right"><b>' . $TotalDetails["Price"] .
                        "<input name='update_totals[$TotalIndex][title]' type='hidden' value='" . trim($TotalDetails["Name"]) . "' >" .
            "<input name='update_totals[$TotalIndex][value]' type='hidden' value='" . $TotalDetails["Price"] . "' size='6' >" .
            "<input name='update_totals[$TotalIndex][class]' type='hidden' value='" . $TotalDetails["Class"] . "'>\n" .
            "<input type='hidden' name='update_totals[$TotalIndex][total_id]' value='" . $TotalDetails["TotalID"] . "'>" . '</b></td>' .
        '       </tr>' . "\n";
    }
        //  Shipping
    elseif($TotalDetails["Class"] == "ot_shipping")
    { 
      //list exsisting shipping if not in current order_ship_meahtods table
           $orders_ship_methodA[] = array('id'   => $TotalDetails["Name"],
                                                    'text' => $TotalDetails["Name"]);
          
                  //  $orders_ship_method1 = array_merge($orders_ship_method, $orders_ship_methodA) ;
                  // check to see if meathod in totals  is in same as in order_ship_meahtods table
                          // if false merge if true dont merge

                         $orders_ship_method1 = array_merge($orders_ship_methodA, $orders_ship_method) ;
     
    
      echo  ' <tr>' . "\n" .
          '       <td align="right" class="' . $TotalStyle . '"><b><?php echo HEADING_SHIPPING ?></b>' . tep_draw_pull_down_menu('update_totals[$TotalIndex][title]', $orders_ship_method1, $TotalDetails["Name"]) . '</td>' . "\n";
      echo  ' <td align="right" class="' . $TotalStyle . '">' . "<input name='update_totals[$TotalIndex][value]' size='6' value='" . $TotalDetails["Price"] . "'>" .
            "<input type='hidden' name='update_totals[$TotalIndex][class]' value='" . $TotalDetails["Class"] . "'>" .
            "<input type='hidden' name='update_totals[$TotalIndex][total_id]' value='" . $TotalDetails["TotalID"] . "'>" . '</td>' .
        '       </tr>' . "\n";
    }
    // End Shipping
    else
    {
      echo  '       <tr>' . "\n" .
          '   <td class="main" align="right"><b>' . $TotalDetails["Name"] . '</b></td>' .
        '   <td align="right" class="' . $TotalStyle . '">' . "<input type='hidden' name='update_totals[$TotalIndex][value]' size='6' value='" . $TotalDetails["Price"] . "'>" .
            "<input type='hidden' name='update_totals[$TotalIndex][title]' value='" . trim($TotalDetails["Name"]) . "' >" .
            "<input type='hidden' name='update_totals[$TotalIndex][class]' value='" . $TotalDetails["Class"] . "'>" .
            "<input type='hidden' name='update_totals[$TotalIndex][total_id]' value='" . $TotalDetails["TotalID"] . "'>" .
            '</td>' . "\n" .
        '       </tr>' . "\n";
    }
  }
?>
        </table>
        </td>
        </tr>
        </table>
      </td>
    </tr>
  <!-- End Order Total Block -->

  </table></td>
      </tr>

      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>

      <tr>
        <td class="main"><table border="1" cellspacing="0" cellpadding="5">
          <tr>
            <td class="smallText" align="center"><b><?php echo TABLE_HEADING_DATE_ADDED; ?></b></td>
            <td class="smallText" align="center"><b><?php echo TABLE_HEADING_CUSTOMER_NOTIFIED; ?></b></td>
            <td class="smallText" align="center"><b><?php echo TABLE_HEADING_STATUS; ?></b></td>
            <?php if($CommentsWithStatus) { ?>
            <td class="smallText" align="center"><b><?php echo TABLE_HEADING_COMMENTS; ?></b></td>
            <?php } ?>
          </tr>
<?php
    $orders_history_query = tep_db_query("select * from " . TABLE_ORDERS_STATUS_HISTORY . " where orders_id = '" . tep_db_input($oID) . "' order by date_added");
    if (tep_db_num_rows($orders_history_query)) {
      while ($orders_history = tep_db_fetch_array($orders_history_query)) {
        echo '          <tr>' . "\n" .
             '            <td class="smallText" align="center">' . tep_datetime_short($orders_history['date_added']) . '</td>' . "\n" .
             '            <td class="smallText" align="center">';
        if ($orders_history['customer_notified'] == '1') {
          echo tep_image(DIR_WS_ICONS . 'tick.gif', ICON_TICK) . "</td>\n";
        } else {
          echo tep_image(DIR_WS_ICONS . 'cross.gif', ICON_CROSS) . "</td>\n";
        }
        echo '            <td class="smallText">' . $orders_status_array[$orders_history['orders_status_id']] . '</td>' . "\n";

        if($CommentsWithStatus) {
        echo '            <td class="smallText">' . nl2br(tep_db_output($orders_history['comments'])) . '&nbsp;</td>' . "\n";
        }

        echo '          </tr>' . "\n";
      }
    } else {
        echo '          <tr>' . "\n" .
             '            <td class="smallText" colspan="5">' . TEXT_NO_ORDER_HISTORY . '</td>' . "\n" .
             '          </tr>' . "\n";
    }
?>
        </table></td>
      </tr>

      <tr>
        <td class="main"><br><b><?php echo TABLE_HEADING_COMMENTS; ?></b></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '5'); ?></td>
      </tr>
      <tr>
        <td class="main">
        <?php
        if($CommentsWithStatus) {
          echo tep_draw_textarea_field('comments', 'soft', '60', '5');
  }
  else
  {
    echo tep_draw_textarea_field('comments', 'soft', '60', '5', $order->info['comments']);
  }
  ?>
        </td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>

      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main"><b><?php echo ENTRY_STATUS; ?></b> <?php echo tep_draw_pull_down_menu('status', $orders_statuses, $order->info['orders_status']); ?></td>
          </tr>
          <tr>
            <td class="main"><b><?php echo ENTRY_NOTIFY_CUSTOMER; ?></b> <?php echo tep_draw_checkbox_field('notify', '', false); ?></td>
          </tr>
          <?php if($CommentsWithStatus) { ?>
          <tr>
                <td class="main"><b><?php echo ENTRY_NOTIFY_COMMENTS; ?></b> <?php echo tep_draw_checkbox_field('notify_comments', '', false); ?></td>
          </tr>
          <?php } ?>
        </table></td>
      </tr>

      <tr>
  <td align='center' valign="top"><?php echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=deleteccinfo') . '">' . tep_image_button('button_removeccinfo.gif', RemoveCCV) . '&nbsp;</a>' . tep_image_submit('button_update.gif', IMAGE_UPDATE); ?></td>
      </tr>
      </form></tr>
  <tr>
        <?php  //Begin Paypal IPN V3.15 DMG (I improvised here.)

if (strtolower($order->info['payment_method']) == 'paypal' && isset($HTTP_GET_VARS['referer']) && $HTTP_GET_VARS['referer'] == 'ipn'){
?>
<td colspan="2" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=deleteccinfo') . '">' . tep_image_button('button_removeccinfo.gif', RemoveCVV) . '&nbsp;</a> <a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ABANDONED_ORDERS_INVOICE) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . '\')">' . tep_image_button('button_invoice.gif', IMAGE_ORDERS_INVOICE) . '</a><a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ABANDONED_ORDERS_PACKINGSLIP) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . '\')">' . tep_image_button('button_packingslip.gif', IMAGE_ORDERS_PACKINGSLIP) . '</a><a href="' . tep_href_link(FILENAME_PAYPAL, tep_get_all_get_params(array('action'))) . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>

<?php } else { //not paypal
?>
<td colspan="2" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=deleteccinfo') . '">' . tep_image_button('button_removeccinfo.gif', RemoveCVV) . '&nbsp;</a><a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ABANDONED_ORDERS_INVOICE) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . '\')">' . tep_image_button('button_invoice.gif', IMAGE_ORDERS_INVOICE) . '</a><a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ABANDONED_ORDERS_PACKINGSLIP) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . '\')">' . tep_image_button('button_packingslip.gif', IMAGE_ORDERS_PACKINGSLIP) . '</a><a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('action'))) . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
<?php
 }  //end PapPal IPN V3.15
?>
     </tr>
<?php
}else{
?>
      <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr><?php echo tep_draw_form('orders', FILENAME_ABANDONED_ORDERS, '', 'get', '', 'SSL'); ?>
                <td class="smallText" align="right"><?php echo HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('oID', '', 'size="12"') . tep_draw_hidden_field('action', 'edit'); ?></td>
              </form></tr>
              <tr><?php echo tep_draw_form('status', FILENAME_ABANDONED_ORDERS, '', 'get', '', 'SSL'); ?>
                <td class="smallText" align="right"><?php echo HEADING_TITLE_STATUS . ' ' . tep_draw_pull_down_menu('status', array_merge(array(array('id' => '', 'text' => TEXT_ALL_ORDERS)), $orders_statuses), '', 'onChange="this.form.submit();"'); ?></td>
              </form></tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  $HEADING_CUSTOMERS = TABLE_HEADING_CUSTOMERS;
  $HEADING_CUSTOMERS .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=customer&order=ascending">';
  $HEADING_CUSTOMERS .= '&nbsp;<img src="images/arrow_up.gif" border="0"></a>';
  $HEADING_CUSTOMERS .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=customer&order=decending">';
  $HEADING_CUSTOMERS .= '&nbsp;<img src="images/arrow_down.gif" border="0"></a>';
  $HEADING_DATE_PURCHASED = TABLE_HEADING_DATE_PURCHASED;
  $HEADING_DATE_PURCHASED .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=date&order=ascending">';
  $HEADING_DATE_PURCHASED .= '&nbsp;<img src="images/arrow_up.gif" border="0"></a>';
  $HEADING_DATE_PURCHASED .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=date&order=decending">';
  $HEADING_DATE_PURCHASED .= '&nbsp;<img src="images/arrow_down.gif" border="0"></a>';
 ?>
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo $HEADING_CUSTOMERS; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ORDER_TOTAL; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo $HEADING_DATE_PURCHASED; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
    $sortorder = 'order by ';
    if($_GET["sort"] == 'customer') {
      if($_GET["order"] == 'ascending') {
        $sortorder .= 'o.customers_name  asc, ';
      } else {
        $sortorder .= 'o.customers_name desc, ';
      }
    } elseif($_GET["sort"] == 'date') {
      if($_GET["order"] == 'ascending') {
        $sortorder .= 'o.date_purchased  asc, ';
      } else {
        $sortorder .= 'o.date_purchased desc, ';
      }
    }
    $sortorder .= 'o.orders_id DESC';
    if (isset($HTTP_GET_VARS['cID'])) {
      $cID = tep_db_prepare_input($HTTP_GET_VARS['cID']);
      $orders_query_raw = "select o.orders_id, o.customers_name, o.customers_id, o.payment_method, o.date_purchased, o.last_modified, o.currency, o.currency_value, s.orders_status_name, ot.text as order_total from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.customers_id = '" . (int)$cID . "' and ot.orders_id = o.orders_id and o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' and ot.class = 'ot_total' order by orders_id DESC";
    } elseif (isset($HTTP_GET_VARS['status']) && (tep_not_null($HTTP_GET_VARS['status']))) {
      $status = tep_db_prepare_input($HTTP_GET_VARS['status']);
      $orders_query_raw = "select o.orders_id, o.customers_name, o.payment_method, o.date_purchased, o.last_modified, o.currency, o.currency_value, s.orders_status_name from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_STATUS . " s where o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' and s.orders_status_id = '" . (int)$status . "' order by o.orders_id DESC";
    } else {
      $orders_query_raw = "select o.orders_id, o.customers_name, o.customers_id, o.payment_method, o.date_purchased, o.last_modified, o.currency, o.currency_value, s.orders_status_name from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_STATUS . " s where o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' " . $sortorder;
    }
    
    $orders_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $orders_query_raw, $orders_query_numrows);
    $orders_query = tep_db_query($orders_query_raw);
    while ($orders = tep_db_fetch_array($orders_query)) {
   unset($order_total1);
   $order_total1 = TEXT_INFO_ABANDONDED;
   $orders_total_query_raw = "select ot.text as order_total from " . TABLE_ORDERS_TOTAL . " ot where  ot.orders_id = '" . $orders['orders_id'] . "' and ot.class = 'ot_total' ";
   $orders_query_total = tep_db_query($orders_total_query_raw);
    while ($orders1 = tep_db_fetch_array($orders_query_total)) {
      $order_total1 = $orders1['order_total'];
   
     if (!$order_total1){
      $order_total1 = TEXT_INFO_ABANDONDED;
      }
    }
    
    if ((!isset($HTTP_GET_VARS['oID']) || (isset($HTTP_GET_VARS['oID']) && ($HTTP_GET_VARS['oID'] == $orders['orders_id']))) && !isset($oInfo)) {
        $oInfo = new objectInfo($orders);
      }
   if ($order_total1 == TEXT_INFO_ABANDONDED){;
      if (isset($oInfo) && is_object($oInfo) && ($orders['orders_id'] == $oInfo->orders_id)) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID', 'action'), 'SSL') . 'oID=' . $oInfo->orders_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID')) . 'oID=' . $orders['orders_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $orders['orders_id'] . '&action=edit', 'SSL') . '">' . tep_image(DIR_WS_ICONS . 'preview.gif', ICON_PREVIEW) . '</a>&nbsp;' . $orders['customers_name']; ?></td>
                <td class="dataTableContent" align="right"><?php echo strip_tags($order_total1); ?></td>
                <td class="dataTableContent" align="center"><?php echo tep_datetime_short($orders['date_purchased']); ?></td>
                <td class="dataTableContent" align="right"><?php echo $orders['orders_status_name']; ?></td>
                <td class="dataTableContent" align="right"><?php if (isset($oInfo) && is_object($oInfo) && ($orders['orders_id'] == $oInfo->orders_id)) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID')) . 'oID=' . $orders['orders_id'], 'SSL') . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    } }
?>
              <tr>
                <td colspan="5"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText" valign="top"><?php echo $orders_split->display_count($orders_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_ORDERS); ?></td>
                    <td class="smallText" align="right"><?php echo $orders_split->display_links($orders_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'oID', 'action'))); ?></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
  $heading = array();
  $contents = array();

  switch ($action) {
    case 'delete':
      $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_ORDER . '</b>');

      $contents = array('form' => tep_draw_form('orders', FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id . '&action=deleteconfirm', 'post' , '', 'SSL'));
      $contents[] = array('text' => TEXT_INFO_DELETE_INTRO . '<br><br>');
      $contents[] = array('text' => TEXT_INFO_DELETE_DATA . '&nbsp;' . $oInfo->customers_name . '<br>');
      $contents[] = array('text' => TEXT_INFO_DELETE_DATA_OID . '&nbsp;<b>' . $oInfo->orders_id . '</b><br>');
      $contents[] = array('text' => '<br>' . tep_draw_checkbox_field('restock') . ' ' . TEXT_INFO_RESTOCK_PRODUCT_QUANTITY);
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id, 'SSL') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;


    default:
      if (isset($oInfo) && is_object($oInfo)) {
        $heading[] = array('text' => '<b>[' . $oInfo->orders_id . ']&nbsp;&nbsp;' . tep_datetime_short($oInfo->date_purchased) . '</b>');

        if (tep_not_null($oInfo->last_modified)) $contents[] = array('text' => TEXT_DATE_ORDER_LAST_MODIFIED . ' ' . tep_date_short($oInfo->last_modified));
     $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id . '&action=edit', 'SSL') . '">' . tep_image_button('button_edit_status.gif', IMAGE_EDIT_STATUS) . '</a> <a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id . '&action=delete', 'SSL') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a> <a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, 'oID=' . $oInfo->orders_id . '&action=edit', 'SSL'). '">' . tep_image_button('button_edit_order.gif', IMAGE_EDIT_ORDER) . '</a>');

//     $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS_INVOICE, 'oID=' . $oInfo->orders_id) . '" TARGET="_blank">' . tep_image_button('button_invoice.gif', IMAGE_ORDERS_INVOICE) . '</a> <a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS_PACKINGSLIP, 'oID=' . $oInfo->orders_id) . '" TARGET="_blank">' . tep_image_button('button_packingslip.gif', IMAGE_ORDERS_PACKINGSLIP) . '</a>');
     $contents[] = array('text' => '<br>' . TEXT_DATE_ORDER_CREATED . ' ' . tep_date_short($oInfo->date_purchased));
        $contents[] = array('text' => '<br>' . TEXT_INFO_PAYMENT_METHOD . ' '  . $oInfo->payment_method);
//begin PayPal_Shopping_Cart_IPN V3.15 DMG
        if (strtolower($oInfo->payment_method) == 'paypal') {
        include_once(DIR_FS_CATALOG_MODULES . 'payment/paypal/functions/general.func.php');
        $contents[] = array('text' => TABLE_HEADING_PAYMENT_STATUS . ': ' .paypal_payment_status($oInfo->orders_id) );
    }
//end PayPal_shopping_Cart_IPN
      }
      break;
  }

  if ( (tep_not_null($heading)) && (tep_not_null($contents)) ) {
    echo '            <td width="25%" valign="top">' . "\n";

    $box = new box;
    echo $box->infoBox($heading, $contents);

    echo '            </td>' . "\n";
}  }
?>
<?php
if($action == "add_product")
{
?>
      <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo ADDING_TITLE; ?> #<?php echo $oID; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            <td class="pageHeading" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ABANDONED_ORDERS, tep_get_all_get_params(array('action', 'add_product')), 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
          </tr>
        </table></td>
      </tr>

<?php
  // ############################################################################
  //   Get List of All Products
  // ############################################################################

    $result = tep_db_query("SELECT products_name, p.products_id, cd.categories_name, ptc.categories_id FROM " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " ptc, " . TABLE_CATEGORIES_DESCRIPTION . " cd where cd.categories_id=ptc.categories_id and ptc.products_id=p.products_id and p.products_status = '1' and p.products_id=pd.products_id and pd.language_id = '" . (int)$languages_id . "' ORDER BY cd.categories_name");
    while($row = tep_db_fetch_array($result))
    {
      extract($row,EXTR_PREFIX_ALL,"db");
      $ProductList[$db_categories_id][$db_products_id] = $db_products_name;
      $CategoryList[$db_categories_id] = $db_categories_name;
      $LastCategory = $db_categories_name;
    }

    // ksort($ProductList);

    $LastOptionTag = "";
    //$ProductSelectOptions = "<option value='0'>Don't Add New Product" . $LastOptionTag . "\n";

    $ProductSelectOptions = "<option value='0'>".DONT_ADD_NEW_PRODUCT . $LastOptionTag . "\n";
    $ProductSelectOptions .= "<option value='0'>&nbsp;" . $LastOptionTag . "\n";
    foreach($ProductList as $Category => $Products)
    {
      $ProductSelectOptions .= "<option value='0'>$Category" . $LastOptionTag . "\n";
      $ProductSelectOptions .= "<option value='0'>---------------------------" . $LastOptionTag . "\n";
      asort($Products);
      foreach($Products as $Product_ID => $Product_Name)
      {
        $ProductSelectOptions .= "<option value='$Product_ID'> &nbsp; $Product_Name" . $LastOptionTag . "\n";
      }

      if($Category != $LastCategory)
      {
        $ProductSelectOptions .= "<option value='0'>&nbsp;" . $LastOptionTag . "\n";
        $ProductSelectOptions .= "<option value='0'>&nbsp;" . $LastOptionTag . "\n";
      }
    }


  // ############################################################################
  //   Add Products Steps
  // ############################################################################

    print "<tr><td><table border='0'>\n";

    // Set Defaults
      if(!IsSet($add_product_categories_id))
      $add_product_categories_id = 0;

      if(!IsSet($add_product_products_id))
      $add_product_products_id = 0;

    // Step 1: Choose Category
      print "<tr class=\"dataTableRow\"><form action='$PHP_SELF?oID=$oID&action=add_product' method='POST'>\n";
      print "<td class='dataTableContent' align='right'><b><?php echo TEXT_ADD_PROD_STEP1 ?></b></td><td class='dataTableContent' valign='top'>";

      $tree = tep_get_category_tree();
      $dropdown= tep_draw_pull_down_menu('add_product_categories_id', $tree, '', ''); //single
      echo $dropdown;


      // print "<select name='add_product_categories_id'>\n";
      // $CategoryOptions = "<option value='0'> TEXT_ADD_CAT_CHOOSE ";
      // foreach($CategoryList as $CategoryID => $CategoryName)
      // {
      // $CategoryOptions .= "<option value='$CategoryID'> $CategoryName\n";
      // }

      $CategoryOptions = str_replace("value='$add_product_categories_id'","value='$add_product_categories_id' selected", $CategoryOptions);
      print $CategoryOptions;
      print "</td>\n";
      print "<td class='dataTableContent' align='center'><input type='submit' value='" . TEXT_SELECT_CAT . "'>";
      print "<input type='hidden' name='step' value='2'>";
      print "</td>\n";
      print "</form></tr>\n";

      print "<tr><td colspan='3'>&nbsp;</td></tr>\n";

    // Step 2: Choose Product
    if(($step > 1) && ($add_product_categories_id > 0))
    {
      print "<tr class=\"dataTableRow\"><form action='$PHP_SELF?oID=$oID&action=$action' method='POST'>\n";
      print "<td class='dataTableContent' align='right'><b><?php echo TEXT_ADD_STEP2 ?></b></td><td class='dataTableContent' valign='top'><select name='add_product_products_id'>";
      $ProductOptions = "<option value='0'> " . TEXT_ADD_PROD_CHOOSE;
      asort($ProductList[$add_product_categories_id]);
      foreach($ProductList[$add_product_categories_id] as $ProductID => $ProductName)
      {
      $ProductOptions .= "<option value='$ProductID'> $ProductName\n";
      }
      $ProductOptions = str_replace("value='$add_product_products_id'","value='$add_product_products_id' selected", $ProductOptions);
      print $ProductOptions;
      print "</select></td>\n";
      print "<td class='dataTableContent' align='center'><input type='submit' value='" . TEXT_SELECT_PROD . "'>";
      print "<input type='hidden' name='add_product_categories_id' value='$add_product_categories_id'>";
      print "<input type='hidden' name='step' value='3'>";
      print "</td>\n";
      print "</form></tr>\n";

      print "<tr><td colspan='3'>&nbsp;</td></tr>\n";
    }

    // Step 3: Choose Options
    echo TEXT_ADD_PROD . $add_product_products_id;
    if(($step > 2) && ($add_product_products_id > 0))
    {
      // Get Options for Products
$result = tep_db_query("SELECT * FROM
" . TABLE_PRODUCTS_ATTRIBUTES . " pa,
" . TABLE_PRODUCTS_OPTIONS . " po,
" . TABLE_PRODUCTS_OPTIONS_VALUES . " pov
WHERE
pa.options_id = po.products_options_id and
pa.options_values_id = pov.products_options_values_id and
products_id ='$add_product_products_id' ");


      // Skip to Step 4 if no Options
      if(tep_db_num_rows($result) == 0)
      {
        echo "<tr class=\"dataTableRow\">\n";
        echo "<td class='dataTableContent' align='right'><b>" . TEXT_ADD_STEP3  . "</b></td><td class='dataTableContent' valign='top' colspan='2'><i>" . TEXT_SELECT_OPT_SKIP . "</i></td>";
        echo "</tr>\n";
        $step = 4;
      }
      else
      {
        while($row = tep_db_fetch_array($result))
        {
          extract($row,EXTR_PREFIX_ALL,"db");
          $Options[$db_products_options_id] = $db_products_options_name;
          $ProductOptionValues[$db_products_options_id][$db_products_options_values_id] = $db_products_options_values_name;
        }
                                 echo '<tr class=\"dataTableRow\">' . tep_draw_form('select_product', FILENAME_C_ORDERS, 'oID='.$oID . '&action=add_product', 'post', '', 'SSL') . "\n";

        //echo "<tr class=\"dataTableRow\"><form action='$PHP_SELF?oID=$oID&action=$action' method='POST'>\n";
        print "<td class='dataTableContent' align='right'><b>" . TEXT_ADD_STEP3 . "</b></td><td class='dataTableContent' valign='top'>";
        foreach($ProductOptionValues as $OptionID => $OptionValues)
        {
          $OptionOption = "<b>" . $Options[$OptionID] . "</b> - <select name='add_product_options[$OptionID]'>";
          foreach($OptionValues as $OptionValueID => $OptionValueName)
          {
          $OptionOption .= "<option value='$OptionValueID'> $OptionValueName\n";
          }
          $OptionOption .= "</select><br>\n";

          if(IsSet($add_product_options))
          $OptionOption = str_replace("value='" . $add_product_options[$OptionID] . "'","value='" . $add_product_options[$OptionID] . "' selected",$OptionOption);

          print $OptionOption;
        }
        print "</td>";
        print "<td class='dataTableContent' align='center'><input type='submit' value='Select These Options'>";
        print "<input type='hidden' name='add_product_categories_id' value='$add_product_categories_id'>";
        print "<input type='hidden' name='add_product_products_id' value='$add_product_products_id'>";
        print "<input type='hidden' name='step' value='4'>";
        print "</td>\n";
        print "</form></tr>\n";
      }

      print "<tr><td colspan='3'>&nbsp;</td></tr>\n";
    }

    // Step 4: Confirm
    if($step > 3)
    {
    
         echo '<tr class=\"dataTableRow\">' . tep_draw_form('select_product', FILENAME_C_ORDERS, 'oID='.$oID . '&action=add_product', 'post', '', 'SSL') . "\n";
                      //  echo "<tr class=\"dataTableRow\"><form action='$PHP_SELF?oID=$oID&action=$action' method='POST'>\n";
      print "<td class='dataTableContent' align='right'><b>" . TEXT_ADD_STEP4 . "</b></td>";
      print "<td class='dataTableContent' valign='top'><input name='add_product_quantity' size='2' value='1'>" . TEXT_ADD_QUANTITY . "</td>";
      print "<td class='dataTableContent' align='center'><input type='submit' value='" . TEXT_ADD_NOW . "'>";

      if(IsSet($add_product_options))
      {
        foreach($add_product_options as $option_id => $option_value_id)
        {
          echo "<input type='hidden' name='add_product_options[$option_id]' value='$option_value_id'>";
        }
      }
      print "<input type='hidden' name='add_product_categories_id' value='$add_product_categories_id'>";
      print "<input type='hidden' name='add_product_products_id' value='$add_product_products_id'>";
      print "<input type='hidden' name='step' value='5'>";
      print "</td>\n";
      print "</form></tr>\n";
    }

    print "</table></td></tr>\n";
}
?>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php
require(DIR_WS_INCLUDES . 'application_bottom.php');
?>