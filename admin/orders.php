<?php
/*
  $Id: orders.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require(DIR_WS_FUNCTIONS . 'c_orders.php');
  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();
  // New "Status History" table has different format.
  $OldNewStatusValues = (tep_field_exists(TABLE_ORDERS_STATUS_HISTORY, "old_value") && tep_field_exists(TABLE_ORDERS_STATUS_HISTORY, "new_value"));
  $CommentsWithStatus = tep_field_exists(TABLE_ORDERS_STATUS_HISTORY, "comments");
  $SeparateBillingFields = tep_field_exists(TABLE_ORDERS, "billing_name");

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

  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : 'edit');
//UPDATE_INVENTORY_QUANTITY_START##############################################################################################################
$order_query = tep_db_query("select products_id, products_quantity from " . TABLE_ORDERS_PRODUCTS . " where orders_id = '" . (int)$oID . "'");
//UPDATE_INVENTORY_QUANTITY_START##############################################################################################################
  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');

  if (tep_not_null($action)) {
    switch ($action) {

  case 'update_admin_comments':
      $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
    $comments = tep_db_prepare_input($HTTP_POST_VARS['admin_comments']);
    $order_updated = false;
    
    tep_db_query("insert into admin_comments (orders_id, date_added, comments) values ('" . (int)$oID . "', now(), '" . tep_db_input($comments)  . "')");

        $order_updated = true;
      
        if ($order_updated == true) {
          $messageStack->add_session('search', 'Admin Comments Updated', 'success');
        } else {
          $messageStack->add_session('search', 'Admin Comments Not Updated', 'warning');
        }

        tep_redirect(tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('action')) . 'action=edit'));
        break;
    // EOF Admin Only Comments Box v1.2
//begin PayPal_Shopping_Cart_IPN  V2.8 DMG    
        case 'accept_order':
            include(DIR_FS_CATALOG_MODULES.'payment/paypal/admin/AcceptOrder.inc.php');
            break;
//end PayPal_Shopping_Cart_IPN
      case 'update_order':
        $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
        $status = tep_db_prepare_input($HTTP_POST_VARS['status']);
        $comments = tep_db_prepare_input($HTTP_POST_VARS['comments']);

        $order_updated = false;
        $check_status_query = tep_db_query("select customers_name, customers_email_address, orders_status, date_purchased from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");
        $check_status = tep_db_fetch_array($check_status_query);
// BOF: WebMakers.com Added: Downloads Controller
// always update date and time on order_status
// original        if ( ($check_status['orders_status'] != $status) || tep_not_null($comments)) {
                   if ( ($check_status['orders_status'] != $status) || $comments != '' || ($status ==DOWNLOADS_ORDERS_STATUS_UPDATED_VALUE) ) {
          tep_db_query("update " . TABLE_ORDERS . " set orders_status = '" . tep_db_input($status) . "', last_modified = now() where orders_id = '" . (int)$oID . "'");
        $check_status_query2 = tep_db_query("select customers_name, customers_email_address, orders_status, date_purchased from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");
        $check_status2 = tep_db_fetch_array($check_status_query2);
      if ( $check_status2['orders_status']==DOWNLOADS_ORDERS_STATUS_UPDATED_VALUE ) {
        tep_db_query("update " . TABLE_ORDERS_PRODUCTS_DOWNLOAD . " set download_maxdays = '" . tep_get_configuration_key_value('DOWNLOAD_MAX_DAYS') . "', download_count = '" . tep_get_configuration_key_value('DOWNLOAD_MAX_COUNT') . "' where orders_id = '" . (int)$oID . "'");
      }
// EOF: WebMakers.com Added: Downloads Controller

          $customer_notified = '0';
          if (isset($HTTP_POST_VARS['notify']) && ($HTTP_POST_VARS['notify'] == 'on')) {
            $notify_comments = '';
// BOF: WebMakers.com Added: Downloads Controller - Only tell of comments if there are comments
            if (isset($HTTP_POST_VARS['notify_comments']) && ($HTTP_POST_VARS['notify_comments'] == 'on')) {
              $notify_comments = sprintf(EMAIL_TEXT_COMMENTS_UPDATE, $comments) . "\n\n";
            }
// EOF: WebMakers.com Added: Downloads Controller
            $email = STORE_NAME . "\n" . EMAIL_SEPARATOR . "\n" . EMAIL_TEXT_ORDER_NUMBER . ' ' . $oID . "\n" . EMAIL_TEXT_INVOICE_URL . ' ' . tep_catalog_href_link(FILENAME_CATALOG_ACCOUNT_HISTORY_INFO, 'order_id=' . $oID, 'SSL') . "\n" . EMAIL_TEXT_DATE_ORDERED . ' ' . tep_date_long($check_status['date_purchased']) . "\n\n" . $notify_comments . sprintf(EMAIL_TEXT_STATUS_UPDATE, $orders_status_array[$status]);
            
      tep_mail($check_status['customers_name'], $check_status['customers_email_address'], EMAIL_TEXT_SUBJECT_1 . $oID . EMAIL_TEXT_SUBJECT_2, nl2br($email), STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
            $customer_notified = '1';
          }elseif ($HTTP_POST_VARS['notify'] == 'on' & tep_not_null($CP_track_num) ) {
            $notify_comments = '';
            if ($HTTP_POST_VARS['notify_comments'] == 'on') {
                      $notify_comments = sprintf(EMAIL_TEXT_COMMENTS_UPDATE, $comments) . "\n\n";
            }
      
        // begin replacement section for Email Subject contribution
            $email = STORE_NAME . "\n" . EMAIL_SEPARATOR . "\n" . EMAIL_TEXT_ORDER_NUMBER . ' ' . $oID . "\n" . EMAIL_TEXT_INVOICE_URL . ' ' . 
        HTTP_SERVER . tep_catalog_href_link(FILENAME_CATALOG_ACCOUNT_HISTORY_INFO, 'order_id=' . $oID, 'SSL') . "\n" . EMAIL_TEXT_DATE_ORDERED . 
        ' ' . tep_date_long($check_status['date_purchased']) . "\n\n" . EMAIL_TEXT_TRACKING_NUMBER . ' ' . HTTP_SERVER . 
        tep_catalog_href_link(FILENAME_CATALOG_ACCOUNT_HISTORY_INFO, 'order_id=' . $oID, 'SSL') . "\n\n" . $notify_comments . 
        sprintf(EMAIL_TEXT_STATUS_UPDATE, $orders_status_array[$status]);

            tep_mail($check_status['customers_name'], $check_status['customers_email_address'], EMAIL_TEXT_SUBJECT, $email, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);

            $customer_notified = '1';
          }

          tep_db_query("insert into " . TABLE_ORDERS_STATUS_HISTORY . " (orders_id, orders_status_id, date_added, customer_notified, comments) values ('" . (int)$oID . "', '" . tep_db_input($status) . "', now(), '" . tep_db_input($customer_notified) . "', '" . tep_db_input($comments)  . "')");

          $order_updated = true;
        }

        if ($order_updated == true) {
         $messageStack->add_session('search', SUCCESS_ORDER_UPDATED, 'success');
        } else {
          $messageStack->add_session('search', WARNING_ORDER_NOT_UPDATED, 'warning');
        }

        tep_redirect(tep_href_link(FILENAME_ORDERS, 'page=' . $HTTP_GET_VARS['page'] . '&oID=' . $HTTP_GET_VARS['oID'] . '&action=edit', 'SSL'));
        break;
      case 'deleteconfirm':
      
        $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
        $restock1 = $HTTP_POST_VARS['restock'];
         if ($restock1== 'on'){
                $restock11 = 'true' ;
                }
        tep_remove_order($oID, $HTTP_POST_VARS['restock']);

     //   tep_redirect(tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID', 'action')), 'SSL'));
        tep_redirect(tep_href_link(FILENAME_ORDERS, 'page=' . $HTTP_GET_VARS['page'], 'SSL'));
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

      tep_redirect(tep_href_link(FILENAME_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=edit'));
      break;
    }
  }

  if (($action == 'edit') && isset($HTTP_GET_VARS['oID'])) {
    $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);

    $orders_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where orders_id = '" . (int)$oID . "'");
    $order_exists = true;
    if (!tep_db_num_rows($orders_query)) {
      $order_exists = false;
      $messageStack->add('search', sprintf(ERROR_ORDER_DOES_NOT_EXIST, $oID), 'error');
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

  include(DIR_WS_CLASSES . 'order.php');
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
  if (($action == 'edit') && ($order_exists == true)) {
    $order = new order($oID);
?>
      <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
<?php  //begin PayPal_Shopping_Cart_IPN V3.15 DMG;
if  ((strtolower($order->info['payment_method']) == 'paypal') && (isset($HTTP_GET_VARS['referer'])) && ($HTTP_GET_VARS['referer'] == 'ipn')) { ?>
            <td class="pageHeading" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_PAYPAL, tep_get_all_get_params(array('action','oID','referer')), 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
<?php } else { ?>

            <td class="pageHeading" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('action','referer')), 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
<?php
}
//end PayPal_Shopping_Cart_IPN
?>
<td class="pageHeading" align="right">
<?php echo '<a href="' . tep_href_link(FILENAME_EDIT_ORDERS, tep_get_all_get_params(array('action')), 'SSL') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> &nbsp; '; ?>
</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="main" valign="top"><b><?php echo ENTRY_CUSTOMER; ?></b></td>
                <td class="main"><?php echo tep_address_format($order->customer['format_id'], $order->customer, 1, '', '<br>'); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '5'); ?></td>
              </tr>
              <tr>
                <td class="main"><b><?php echo ENTRY_TELEPHONE_NUMBER; ?></b></td>
                <td class="main"><?php echo $order->customer['telephone']; ?></td>
              </tr>
<?php
// BOF: WebMakers.com Added: Downloads Controller - Extra order info
?>
              <tr>
                <td class="main"><b><?php echo 'FAX #:'; ?></b></td>
                <td class="main"><?php echo $the_customers_fax; ?></td>
              </tr>
<?php
// EOF: WebMakers.com Added: Downloads Controller
?>
              <tr>
                <td class="main"><b><?php echo ENTRY_EMAIL_ADDRESS; ?></b></td>
                <td class="main"><?php echo '<a href="mailto:' . $order->customer['email_address'] . '"><u>' . $order->customer['email_address'] . '</u></a>'; ?></td>
              </tr>
         <tr>
        
            <td class="main">&nbsp;</td>
               </tr>
               <tr>
                <td class="main"><b><?php echo ENTRY_IPADDRESS; ?></b></td>
                <td class="main"><?php echo $order->customer['ipaddy']; ?></td>
    </tr>
    <tr>
    <td class="main"><b><?php echo ENTRY_IPISP; ?></b></td>
    <td class="main"><?php echo $order->customer['ipisp']; ?></td>
    </tr>
    
        
            </table></td>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="main" valign="top"><b><?php echo ENTRY_SHIPPING_ADDRESS; ?></b></td>
                <td class="main"><?php echo tep_address_format($order->delivery['format_id'], $order->delivery, 1, '', '<br>'); ?></td>
              </tr>
            </table></td>
            <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="main" valign="top"><b><?php echo ENTRY_BILLING_ADDRESS; ?></b></td>
                <td class="main"><?php echo tep_address_format($order->billing['format_id'], $order->billing, 1, '', '<br>'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
// BOF: WebMakers.com Added: Show Order Info
?>
<!-- add Order # // -->
<tr>
<td class="main"><b><!-- Order # --> <?php echo ORDER?></b></td>
<td class="main"><?php echo tep_db_input($oID); ?></td>
</tr>
<!-- add date/time // -->
<tr>
<td class="main"><b><!-- Order Date & Time --><?php echo ORDER_DATE_TIME?></b></td>
<td class="main"><?php echo tep_datetime_short($order->info['date_purchased']); ?></td>
</tr>
<?php
// EOF: WebMakers.com Added: Show Order Info

//begin PayPal_Shopping_Cart_IPN V3.15 DMG
if (strtolower($order->info['payment_method']) == 'paypal') {
echo '<tr><td class="main"><b>'. ENTRY_PAYMENT_METHOD . '</b></td></tr>';
echo ' ';

include(DIR_FS_CATALOG_MODULES . 'payment/paypal/admin/TransactionSummaryLogs.inc.php');

}

?>

          <tr>
            <td class="main"><b><?php echo ENTRY_PAYMENT_METHOD; ?></b></td>
            <td class="main"><?php echo $order->info['payment_method']; ?></td>
          </tr>
<?php
//}//else not paypal
//end PayPal_Shopping_Cart_IPN
    if (tep_not_null($order->info['cc_type']) || tep_not_null($order->info['cc_owner']) || tep_not_null($order->info['cc_number'])) {
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_TYPE; ?></td>
            <td class="main"><?php echo $order->info['cc_type']; ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_OWNER; ?></td>
            <td class="main"><?php echo $order->info['cc_owner']; ?></td>
          </tr>
          <tr>
<?php  
unset ($cc_number7) ;

                   if ( (PAYMENT_CC_CRYPT == 'True') && (ereg ("([0-9]{6})", $order->info['cc_number'])) && !($order->info['cc_number'] == '0000000000000000') ) { 
                 $cc_number7 = $order->info['cc_number'];
                 $text_encypt3 = TEXT_CARD_NOT_ENCRPYT ;
              
              }else if ( (PAYMENT_CC_CRYPT == 'True') && !(ereg ("([0-9]{6})", $order->info['cc_number'])) ) {
           $cc_number7 = cc_decrypt($order->info['cc_number']);
           $text_encypt3= TEXT_CARD_ENCRPYT;
          
          }else if($order->info['cc_number'] == '0000000000000000') {
            $cc_number7 = $order->info['cc_number'];
          $text_encypt3= TEXT_CCV_REMOVED;
 
           }else{
            $cc_number7 = $order->info['cc_number'];
            $text_encypt3 = TEXT_CARD_NOT_ENCRPYT ;
                  }
                  ?>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_NUMBER; ?></td>
            <td class="main"><?php echo $cc_number7; ?></td>
            <td class="main"><?php echo $text_encypt3; ?></td>
          </tr>
          <tr>
       <?php
                   if ( (PAYMENT_CC_CRYPT == 'True') && (ereg ("([0-9]{4})", $order->info['cc_expires'])) ) { 
                 $cc_expires7 = $order->info['cc_expires'];
                 $text_encypt4 = TEXT_EXPIRES_NOT_ENCRPYT ;
                
              }else if ( (PAYMENT_CC_CRYPT == 'True') && !(ereg ("([0-9]{4})", $order->info['cc_expires'])) && !($order->info['cc_expires'] == '')  ) {
           $cc_expires7 = cc_decrypt($order->info['cc_expires']);
           $text_encypt4= TEXT_EXPIRES_ENCRPYT;
           
          }else if($order->info['cc_expires'] == '') {
           $cc_expires7 = $order->info['cc_expires'];
           $text_encypt4 =  TEXT_EXPIRES_REMOVED ;
           
              }else{
           $cc_expires7 =$order->info['cc_expires'];
           $text_encypt4 =  TEXT_EXPIRES_NOT_ENCRPYT ;
                  }
                  ?>
          
            <td class="main"><?php echo ENTRY_CREDIT_CARD_EXPIRES; ?></td>
            <td class="main"><?php echo $cc_expires7; ?></td>
            <td class="main"><?php echo $text_encypt4; ?></td>

          </tr>
                    <tr>
           <?php
                 //    if ( (PAYMENT_CC_CRYPT == 'True') && (ereg ("([0-9]{4})", $order->info['cc_expires'])) ) { 

                       if ( (PAYMENT_CC_CRYPT == 'True') && (ereg ("([0-9]{3})", substr($order->info['cc_ccv'],0 , 3))) ) {
                     $cc_ccv7 = $order->info['cc_ccv'];
                     $text_encypt5 = TEXT_CCV_NOT_ENCRPYT ;
                           
                  }else if ( (PAYMENT_CC_CRYPT == 'True') &&  !(ereg ("([0-9]{3})", substr($order->info['cc_ccv'],0 ,3))) && !($order->info['cc_ccv'] == '')  ) {
               $cc_ccv7 = cc_decrypt($order->info['cc_ccv']);
               $text_encypt5= TEXT_CCV_ENCRPYT;
               
              }else if($order->info['cc_ccv'] == '') {
               $cc_ccv7 = $order->info['cc_ccv'];
           $text_encypt5= TEXT_CCV_REMOVED;

              }else {
               $cc_ccv7 =$order->info['cc_ccv'];
               $text_encypt5=  TEXT_CCV_NOT_ENCRPYT;
                      }
                      ?>
              
                <td class="main"><?php echo ENTRY_CREDIT_CARD_CCV; ?></td>
                <td class="main"><?php echo  $cc_ccv7; ?></td>
                <td class="main"><?php echo $text_encypt5; ?></td>
    
              </tr>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_START_DATE; ?></td>
            <td class="main"><?php echo $order->info['cc_start']; ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_CREDIT_CARD_ISSUE; ?></td>
            <td class="main"><?php echo $order->info['cc_issue']; ?></td>
          </tr>
    <!-- End Credit Card Info Block -->
<?php
    }
?>
        </table>
                <?php
  require(DIR_WS_MODULES . 'afs_v1.0/algo_fraud_screener.php');
?> 
        </td>
        
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
            
      
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr class="dataTableHeadingRow">
            <td class="dataTableHeadingContent" colspan="2"><?php echo TABLE_HEADING_PRODUCTS; ?></td>
            <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_PRODUCTS_MODEL; ?></td>
            <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_TAX; ?></td>
      <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_BASE_PRICE; ?></td>
            <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_PRICE_EXCLUDING_TAX; ?></td>
            <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_PRICE_INCLUDING_TAX; ?></td>
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
       '      <td class="' . $RowStyle . '" valign="top" align="right">' . $order->products[$i]['qty'] ."&nbsp;x</td>\n" .
       '      <td class="' . $RowStyle . '" valign="top">' . $order->products[$i]['name'] ;

    // Has Attributes?
    if (sizeof($order->products[$i]['attributes']) > 0) {
      for ($j=0; $j<sizeof($order->products[$i]['attributes']); $j++) {
        $orders_products_attributes_id = $order->products[$i]['attributes'][$j]['orders_products_attributes_id'];
        echo '<br><nobr><small>&nbsp;<i> - ' . $order->products[$i]['attributes'][$j]['option'] . ' : ' . $order->products[$i]['attributes'][$j]['value'] . ' ' . $order->products[$i]['attributes'][$j]['prefix'] . ' ' . $currencies->format($order->products[$i]['attributes'][$j]['price']) ;
        echo '</i></small></nobr>';
      }
    }

      echo '            </td>' . "\n" .
           '            <td class="dataTableContent" valign="top">' . $order->products[$i]['model'] . '</td>' . "\n" .
           '            <td class="dataTableContent" align="right" valign="top">' . tep_display_tax_value($order->products[$i]['tax']) . '%</td>' . "\n" .
         '  <td class="dataTableContent" align="right" valign="top"><b>' . number_format($order->products[$i]['price'], 2, '.', '') . '</b></td>' . "\n" .
       //    '          <td class="dataTableContent" align="right" valign="top"><b>' . $currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']), true, $order->info['currency'], $order->info['currency_value']) . '</b></td>' . "\n" .
           '            <td class="dataTableContent" align="right" valign="top"><b>' . $currencies->format($order->products[$i]['final_price'] * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . '</b></td>' . "\n" .
           '            <td class="dataTableContent" align="right" valign="top"><b>' . $currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . '</b></td>' . "\n";
      echo '          </tr>' . "\n";
    }
?>
          <tr>
            <td align="right" colspan="8"><table border="0" cellspacing="0" cellpadding="2">
<?php
    for ($i = 0, $n = sizeof($order->totals); $i < $n; $i++) {
      echo '              <tr>' . "\n" .
           '                <td align="right" class="smallText">' . $order->totals[$i]['title'] . '</td>' . "\n" .
           '                <td align="right" class="smallText">' . $order->totals[$i]['text'] . '</td>' . "\n" .
           '              </tr>' . "\n";
    }
?>
            </table></td>
          </tr>
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
            <td class="smallText" align="center"><b><?php echo TABLE_HEADING_COMMENTS; ?></b></td>
          </tr>
<?php
    $orders_history_query = tep_db_query("select orders_status_id, date_added, customer_notified, comments from " . TABLE_ORDERS_STATUS_HISTORY . " where orders_id = '" . tep_db_input($oID) . "' order by date_added");
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
        echo '            <td class="smallText">' . $orders_status_array[$orders_history['orders_status_id']] . '</td>' . "\n" .
             '            <td class="smallText">' . nl2br(tep_db_output($orders_history['comments'])) . '&nbsp;</td>' . "\n" .
             '          </tr>' . "\n";
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
<tr><?php echo tep_draw_form('status', FILENAME_ORDERS, tep_get_all_get_params(array('action')) . 'action=update_order', 'post', '', 'SSL'); ?>
        <td class="main"><?php echo tep_draw_textarea_field('comments', 'soft', '60', '5'); ?></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td><table border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="main"><b><?php echo ENTRY_STATUS; ?></b> <?php echo tep_draw_pull_down_menu('status', $orders_statuses, $order->info['orders_status_number']); ?></td>
              </tr>
              <tr>
                <td class="main"><b><?php echo ENTRY_NOTIFY_CUSTOMER; ?></b> <?php echo tep_draw_checkbox_field('notify', '', true); ?></td>
                <td class="main"><b><?php echo ENTRY_NOTIFY_COMMENTS; ?></b> <?php echo tep_draw_checkbox_field('notify_comments', '', true); ?></td>
              </tr>
            </table></td>
            <td valign="top"><?php echo tep_image_submit('button_update.gif', IMAGE_UPDATE); ?></td>
          </tr>
        </table></td>
      </form></tr>
  <tr>
        <?php  //Begin Paypal IPN V3.15 DMG (I improvised here.)
if (isset($HTTP_GET_VARS[tep_session_name()])) {
  $oscid = '&' . tep_session_name() . '=' . $HTTP_GET_VARS[tep_session_name()];
} else {
  $oscid = '';
}
if (strtolower($order->info['payment_method']) == 'paypal' && isset($HTTP_GET_VARS['referer']) && $HTTP_GET_VARS['referer'] == 'ipn'){
?>
<td colspan="2" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=deleteccinfo') . '">' . tep_image_button('button_removeccinfo.gif', RemoveCVV) . '&nbsp;</a> <a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ORDERS_INVOICE) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . $oscid . '\')">' . tep_image_button('button_invoice.gif', IMAGE_ORDERS_INVOICE) . '</a><a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ORDERS_PACKINGSLIP) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . $oscid . '\')">' . tep_image_button('button_packingslip.gif', IMAGE_ORDERS_PACKINGSLIP) . '</a><a href="' . tep_href_link(FILENAME_PAYPAL, tep_get_all_get_params(array('action'))) . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>

<?php } else { //not paypal
?>
<td colspan="2" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_ORDERS, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=deleteccinfo') . '">' . tep_image_button('button_removeccinfo.gif', RemoveCVV) . '&nbsp;</a> <a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ORDERS_INVOICE) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . $oscid . '\')">' . tep_image_button('button_invoice.gif', IMAGE_ORDERS_INVOICE) . '</a><a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_ADMIN . FILENAME_ORDERS_PACKINGSLIP) . '?' . (tep_get_all_get_params(array('oID')) . 'oID=' . $HTTP_GET_VARS['oID']) . $oscid . '\')">' . tep_image_button('button_packingslip.gif', IMAGE_ORDERS_PACKINGSLIP) . '</a><a href="' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('action'))) . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
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
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr><?php 
                  echo tep_draw_form('orders', FILENAME_ORDERS, '', 'get', '', 'SSL'); 
                  if (isset($HTTP_GET_VARS[tep_session_name()])) {
                    echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
                  }
                ?>
                <td class="smallText" align="right"><?php echo HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('oID', '', 'size="12"') . tep_draw_hidden_field('action', 'edit'); ?></td>
              </form></tr>
              <tr><?php echo tep_draw_form('status', FILENAME_ORDERS, '', 'get', '', 'SSL'); ?>
                <td class="smallText" align="right"><?php echo HEADING_TITLE_STATUS . ' ' . tep_draw_pull_down_menu('status', array_merge(array(array('id' => '', 'text' => TEXT_ALL_ORDERS)), $orders_statuses), '', 'onChange="this.form.submit();"'); 
                  if (isset($HTTP_GET_VARS[tep_session_name()])) {
                    echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
                  }
                ?></td>
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
  if (isset($HTTP_GET_VARS[tep_session_name()])) {
    $oscid = '&' . tep_session_name() . '=' . $HTTP_GET_VARS[tep_session_name()];
  } else {
    $oscid = '';
  }
  $HEADING_CUSTOMERS = TABLE_HEADING_CUSTOMERS;
  $HEADING_CUSTOMERS .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=customer&order=ascending' . $oscid . '">';
  $HEADING_CUSTOMERS .= '&nbsp;<img src="images/arrow_up.gif" border="0"></a>';
  $HEADING_CUSTOMERS .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=customer&order=decending' . $oscid . '">';
  $HEADING_CUSTOMERS .= '&nbsp;<img src="images/arrow_down.gif" border="0"></a>';
  $HEADING_DATE_PURCHASED = TABLE_HEADING_DATE_PURCHASED;
  $HEADING_DATE_PURCHASED .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=date&order=ascending' . $oscid . '">';
  $HEADING_DATE_PURCHASED .= '&nbsp;<img src="images/arrow_up.gif" border="0"></a>';
  $HEADING_DATE_PURCHASED .= '<a href="' . $_SERVER['PHP_SELF'] . '?sort=date&order=decending' . $oscid . '">';
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

      if (isset($oInfo) && is_object($oInfo) && ($orders['orders_id'] == $oInfo->orders_id)) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID', 'action'), 'SSL') . 'oID=' . $oInfo->orders_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID')) . 'oID=' . $orders['orders_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo '<a href="' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $orders['orders_id'] . '&action=edit', 'SSL') . '">' . tep_image(DIR_WS_ICONS . 'preview.gif', ICON_PREVIEW) . '</a>&nbsp;' . $orders['customers_name']; ?></td>
                <td class="dataTableContent" align="right"><?php echo strip_tags($order_total1); ?></td>
                <td class="dataTableContent" align="center"><?php echo tep_datetime_short($orders['date_purchased']); ?></td>
                <td class="dataTableContent" align="right"><?php echo $orders['orders_status_name']; ?></td>
                <td class="dataTableContent" align="right"><?php if (isset($oInfo) && is_object($oInfo) && ($orders['orders_id'] == $oInfo->orders_id)) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID')) . 'oID=' . $orders['orders_id'], 'SSL') . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }
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

      $contents = array('form' => tep_draw_form('orders', FILENAME_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id . '&action=deleteconfirm', 'post' , '', 'SSL'));
      $contents[] = array('text' => TEXT_INFO_DELETE_INTRO . '<br><br>');
      $contents[] = array('text' => TEXT_INFO_DELETE_DATA . '&nbsp;' . $oInfo->customers_name . '<br>');
      $contents[] = array('text' => TEXT_INFO_DELETE_DATA_OID . '&nbsp;<b>' . $oInfo->orders_id . '</b><br>');
      $contents[] = array('text' => '<br>' . tep_draw_checkbox_field('restock') . ' ' . TEXT_INFO_RESTOCK_PRODUCT_QUANTITY);
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id, 'SSL') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;


    default:
      if (isset($oInfo) && is_object($oInfo)) {
        $heading[] = array('text' => '<b>[' . $oInfo->orders_id . ']&nbsp;&nbsp;' . tep_datetime_short($oInfo->date_purchased) . '</b>');

        if (tep_not_null($oInfo->last_modified)) $contents[] = array('text' => TEXT_DATE_ORDER_LAST_MODIFIED . ' ' . tep_date_short($oInfo->last_modified));
     $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id . '&action=edit', 'SSL') . '">' . tep_image_button('button_edit_status.gif', IMAGE_EDIT_STATUS) . '</a> <a href="' . tep_href_link(FILENAME_ORDERS, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id . '&action=delete', 'SSL') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a> <a href="' . tep_href_link(FILENAME_EDIT_ORDERS, 'oID=' . $oInfo->orders_id, 'SSL'). '">' . tep_image_button('button_edit_order.gif', IMAGE_EDIT_ORDER) . '</a>');

     $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_ORDERS_INVOICE, 'oID=' . $oInfo->orders_id) . '" TARGET="_blank">' . tep_image_button('button_invoice.gif', IMAGE_ORDERS_INVOICE) . '</a> <a href="' . tep_href_link(FILENAME_ORDERS_PACKINGSLIP, 'oID=' . $oInfo->orders_id) . '" TARGET="_blank">' . tep_image_button('button_packingslip.gif', IMAGE_ORDERS_PACKINGSLIP) . '</a>');
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
  }
?>
          </tr>
        </table></td>
      </tr>
<?php
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
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
