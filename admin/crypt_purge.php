<?php
/*
  $Id: crypt_convert.php,v 1.1.1.1 2004/03/04 23:38:18 zip1 Exp $
  Copyright (c) 2005 Chainreaction Works
  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require('includes/functions/edit_text.php');
  /*  Removed because the configuration keys are already loaded
  $crypt_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_PATH'");
  $crypt = tep_db_fetch_array($crypt_query);
  $CURR_CRYPT = $crypt['configuration_value'];
  $crypt_query1 = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_FILE'");
  $crypt1 = tep_db_fetch_array($crypt_query1);
  $file_name = $crypt1['configuration_value'];
  */
  if ( defined('PAYMENT_CC_CRYPT_PATH') ) $CURR_CRYPT = PAYMENT_CC_CRYPT_PATH;
  if ( defined('PAYMENT_CC_CRYPT_FILE') ) $file_name  = PAYMENT_CC_CRYPT_FILE;
  
  $fs_dir = DIR_FS_CATALOG.DIR_WS_INCLUDES.$CURR_CRYPT;
  $ws_dir = DIR_WS_CATALOG.DIR_WS_INCLUDES.$CURR_CRYPT;
  $dir1 = $fs_dir ;
  $gID = '209';
  $crypt_file = $dir1 . $file_name;
  $crypt_file_new = $dir1 . 'new_' . $file_name;
  $crypt_file_old = $dir1 . 'old_' . $file_name . 'bckp';
   
  if (tep_not_null($action)) {
    switch ($HTTP_GET_VARS['action']) {
  //encrypt cc number that are not encrypted
       
        // Remove CVV Number
      case 'deleteallccinfo':
        $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
        tep_db_query("update " . TABLE_ORDERS . " set cc_ccv = null");
        tep_db_query("update " . TABLE_ORDERS . " set cc_number = '0000000000000000'");
        tep_db_query("update " . TABLE_ORDERS . " set cc_expires = null");
        tep_db_query("update " . TABLE_ORDERS . " set cc_start = null ");
        tep_db_query("update " . TABLE_ORDERS . " set cc_issue = null ");
  
        tep_redirect(tep_href_link(FILENAME_CRYPT_PURGE, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=edit'));
        break;
  // Remove CVV Number
    case 'deleteccinfo':
      $oID = tep_db_prepare_input($HTTP_GET_VARS['oID']);
      tep_db_query("update " . TABLE_ORDERS . " set cc_ccv = null where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_number = '0000000000000000' where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_expires = null where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_start = null where orders_id = '" . tep_db_input($oID) . "'");
      tep_db_query("update " . TABLE_ORDERS . " set cc_issue = null where orders_id = '" . tep_db_input($oID) . "'");

      tep_redirect(tep_href_link(FILENAME_CRYPT_PURGE, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=edit'));
      break;
    

 } //end switch
}// end if


Header("Cache-control: private, no-cache");
Header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); # Past date
Header("Pragma: no-cache");

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
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
    <td width="100%" valign="top">
  <table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
        </table>
        </td>
      </tr>

 <?php   
 if ($err_msg == '1'){
   echo CC_ENCYPT_ERROR_01 ;
   unset ($err_msg);
   }
if ($err_msg == '2'){
   echo CC_ENCYPT_ERROR_02 ;
   unset ($err_msg);
       }   
//------------------------------------------------------------------             
//search for cc feild that have cc's             
$the_extra_query= tep_db_query("select * from " . TABLE_ORDERS . " where cc_number != 'NULL ' ");
$the_extra= tep_db_fetch_array($the_extra_query);
$the_customers_id= $the_extra['customers_id'];
// Look up things in customers
$the_extra_query= tep_db_query("select * from " . TABLE_CUSTOMERS . " where customers_id = '" . $the_customers_id . "'");
$the_extra= tep_db_fetch_array($the_extra_query);
 ?>            
        <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
           </tr>
        </table></td></tr>
      <tr>
 
 <?php // ckeck to see if key is empty
      If (parseFileData($crypt_file) != ''){
            $key_status = TEXT_KEY_STATUS_02;
            $key_statusA = 0 ;
            }else{
            $key_status = TEXT_KEY_STATUS_01;
            $key_statusA = 1 ;
            }
            ;?> 
    
           <td><?php echo TEXT_KEY_CURRENT . ' ' .$file_name . $key_status ;?></td>
           </td>
  </tr>
           
            </tr>
            <tr>
           <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
               <tr>
             <td> <?php echo TEXT_PURGE_ALL . '&nbsp;' . tep_draw_form('convert', FILENAME_CRYPT_PURGE, '&action=convert', 'post', '', 'SSL');
echo '<a href="' . tep_href_link(FILENAME_CRYPT_PURGE, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=deleteallccinfo') . '">' . tep_image_button('button_removeccinfo.gif', RemoveCVV);
?>
               </form>
             </td>

            </tr>   
  </table></td>
            </tr>
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
              <td class="dataTableHeadingContent"><?php echo HEADING_TITLE_OID; ?></td>
              <td class="dataTableHeadingContent" align="left"><?php echo TABLE_HEADING_IS_ENCRYPTED; ?></td>
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
      $orders_query_raw = "select o.orders_id, o.cc_number, o.customers_name, o.customers_id, o.payment_method, o.date_purchased, o.last_modified, o.currency, o.currency_value, s.orders_status_name, ot.text as order_total from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.cc_number > '1' and o.customers_id = '" . (int)$cID . "' and ot.orders_id = o.orders_id and o.orders_status = s.orders_status_id and s.language_id = '" . (int)$languages_id . "' and ot.class = 'ot_total' order by orders_id DESC";
    } elseif (isset($HTTP_GET_VARS['status']) && (tep_not_null($HTTP_GET_VARS['status']))) {
      $status = tep_db_prepare_input($HTTP_GET_VARS['status']);
      $orders_query_raw = "select o.orders_id, o.cc_number, o.customers_name, o.payment_method, o.date_purchased, o.last_modified, o.currency, o.currency_value, s.orders_status_name, ot.text as order_total from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.cc_number > '1' and o.orders_status = s.orders_status_id and ot.orders_id = o.orders_id and s.language_id = '" . (int)$languages_id . "' and s.orders_status_id = '" . (int)$status . "' and ot.class = 'ot_total' order by o.orders_id DESC";
    } else {
      $orders_query_raw = "select o.orders_id, o.cc_number, o.customers_name, o.customers_id, o.payment_method, o.date_purchased, o.last_modified, o.currency, o.currency_value, s.orders_status_name, ot.text as order_total from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot, " . TABLE_ORDERS_STATUS . " s where o.cc_number > '1' and o.orders_status = s.orders_status_id and ot.orders_id = o.orders_id and s.language_id = '" . (int)$languages_id . "' and ot.class = 'ot_total' " . $sortorder;
    }
    $orders_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $orders_query_raw, $orders_query_numrows);
    $orders_query = tep_db_query($orders_query_raw);
    while ($orders = tep_db_fetch_array($orders_query)) {
       
    
    if ((!isset($HTTP_GET_VARS['oID']) || (isset($HTTP_GET_VARS['oID']) && ($HTTP_GET_VARS['oID'] == $orders['orders_id']))) && !isset($oInfo)) {
        $oInfo = new objectInfo($orders);
      }

      if (isset($oInfo) && is_object($oInfo) && ($orders['orders_id'] == $oInfo->orders_id)) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_CRYPT_PURGE, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_CRYPT_PURGE, tep_get_all_get_params(array('oID')) . 'oID=' . $orders['orders_id']) . '\'">' . "\n";
      }

                    if ( (PAYMENT_CC_CRYPT == 'True') && (ereg ("([0-9]{6})", $orders['cc_number'])) ) { 
                     $cc_number7 = $order->info['cc_number'];
                     $text_encypt3 = TEXT_CARD_NOT_ENCRPYT ;
                  }else if ( (PAYMENT_CC_CRYPT == 'True') && !(ereg ("([0-9]{6})", $orders['cc_number'])) ) {
               $cc_number7 = cc_decrypt($order->info['cc_number']);
               $text_encypt3= TEXT_CARD_ENCRPYT;
              }else{
               $cc_number7 =$order->info['cc_number'];
               $text_encypt3 = TEXT_CARD_NOT_ENCRPYT ;
                      }
?> 
                <td class="dataTableContent"><?php echo '<a href="' . tep_href_link(FILENAME_CRYPT_PURGET, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $orders['orders_id'] . '&action=deleteccinfo') . '">' . tep_image(DIR_WS_ICONS . 'preview.gif', ICON_PREVIEW) . '</a>&nbsp;' . $orders['customers_name']; ?></td>
                <td class="dataTableContent" align="left"><?php echo $orders['orders_id'] ; ?></td>
                <td class="dataTableContent" align="left"><?php echo $text_encypt3 ; ?></td>
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

      $contents = array('form' => tep_draw_form('orders', FILENAME_CRYPT_UPDATE, 'oID=' . $oInfo->orders_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_INFO_DELETE_INTRO . '<br><br>');
      $contents[] = array('text' => TEXT_INFO_DELETE_DATA . '&nbsp;' . $oInfo->customers_name . '<br>');
      $contents[] = array('text' => TEXT_INFO_DELETE_DATA_OID . '&nbsp;<b>' . $oInfo->orders_id . '</b><br>');
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_CRYPT_UPDATE, tep_get_all_get_params(array('oID', 'action')) . 'oID=' . $oInfo->orders_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;

    default:
      if (isset($oInfo) && is_object($oInfo)) {
        $heading[] = array('text' => '<b>[' . $oInfo->orders_id . ']&nbsp;&nbsp;' . tep_datetime_short($oInfo->date_purchased) . '</b>');

        if (tep_not_null($oInfo->last_modified)) $contents[] = array('text' => TEXT_DATE_ORDER_LAST_MODIFIED . ' ' . tep_date_short($oInfo->last_modified));
     $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_CRYPT_PURGE, 'oID=' . $HTTP_GET_VARS['oID'] . '&action=deleteccinfo') . '">' . tep_image_button('button_removeccinfo.gif', RemoveCVV));
     $contents[] = array('text' => '<br>' . TEXT_DATE_ORDER_CREATED . ' ' . tep_date_short($oInfo->date_purchased));
     $contents[] = array('text' => '<br>' . TEXT_INFO_PAYMENT_METHOD . ' '  . $oInfo->payment_method);
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