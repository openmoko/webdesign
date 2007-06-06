<?php
/*
  $Id: product_notifications.php,v 1.1.1.1 2004/03/04 23:42:26 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 2746 $


  Released under the GNU General Public License
*/
if (isset($HTTP_POST_VARS['products_id']) && tep_not_null($HTTP_POST_VARS['products_id'])) {
    $products_id = tep_db_prepare_input($HTTP_POST_VARS['products_id']);
  } elseif (isset($HTTP_GET_VARS['products_id']) && tep_not_null($HTTP_GET_VARS['products_id'])) {
    $products_id = tep_db_prepare_input($HTTP_GET_VARS['products_id']);
  } 
  if ( (isset($HTTP_GET_VARS['products_id'])) || (isset($HTTP_POST_VARS['products_id'])) ) {
?>
<!-- notifications //-->
          <tr>
            <td>
<?php
    $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_NOTIFICATIONS . '</font>');
    new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_ACCOUNT_NOTIFICATIONS, '', 'SSL'));

    if (tep_session_is_registered('customer_id')) {
      $check_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and customers_id = '" . (int)$customer_id . "'");
      $check = tep_db_fetch_array($check_query);

      $notification_exists = (($check['count'] > 0) ? true : false);
    } else {
      $notification_exists = false;
    }

    $info_box_contents = array();
    if ($notification_exists == true) {
      $info_box_contents[] = array('text' => '<table border="0" cellspacing="0" cellpadding="2"><tr><td class="infoBoxContents"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify_remove', $request_type) . '">' . tep_image(DIR_WS_IMAGES . 'box_products_notifications_remove.gif', IMAGE_BUTTON_REMOVE_NOTIFICATIONS) . '</a></td><td class="infoBoxContents"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify_remove', $request_type) . '">' . sprintf(BOX_NOTIFICATIONS_NOTIFY_REMOVE, tep_get_products_name($HTTP_GET_VARS['products_id'])) .'</a></td></tr></table>');
    } else {
      $info_box_contents[] = array('text' => '<table border="0" cellspacing="0" cellpadding="2"><tr><td class="infoBoxContents"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify', $request_type) . '">' . tep_image(DIR_WS_IMAGES . 'box_products_notifications.gif', IMAGE_BUTTON_NOTIFICATIONS) . '</a></td><td class="infoBoxContents"><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=notify', $request_type) . '">' . sprintf(BOX_NOTIFICATIONS_NOTIFY, tep_get_products_name($HTTP_GET_VARS['products_id'])) .'</a></td></tr></table>');
    }

    new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- notifications_eof //-->
<?php
  }
?>
