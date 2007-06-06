    <table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB; ?>">
<?php
// BOF: Lango Added for template MOD
if (SHOW_HEADING_TITLE_ORIGINAL == 'yes') {
$header_text = '&nbsp;'
//EOF: Lango Added for template MOD
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_image(DIR_WS_IMAGES . 'table_background_history.gif', HEADING_TITLE, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
<?php
// BOF: Lango Added for template MOD
}else{
$header_text = HEADING_TITLE;
}
// EOF: Lango Added for template MOD
?>

      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2" style="background: #F1f1f1; padding: 8px;">
          <tr>
            <td class="main" colspan="2" style="font-size: 13px;"><b><?php echo sprintf(HEADING_ORDER_NUMBER, $HTTP_GET_VARS['order_id']) . ' <small>(' . $order->info['orders_status'] . ')</small>'; ?></b></td>
          </tr>
          <tr>
            <td class="smallText"><?php echo HEADING_ORDER_DATE . ' ' . tep_date_long($order->info['date_purchased']); ?></td>
            <td class="smallText" align="right" style="font-size: 13px;"><b><?php echo HEADING_ORDER_TOTAL . '</b> <span class="price">' . $order->info['total']; ?></span></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
<?php
  if ($order->delivery != false) {
?>
            <td width="30%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td class="main bulleted"><b><?php echo HEADING_DELIVERY_ADDRESS; ?></b></td>
              </tr>
              <tr>
                <td class="main idented"><?php echo tep_address_format($order->delivery['format_id'], $order->delivery, 1, ' ', '<br>'); ?></td>
              </tr>
<?php
    if (tep_not_null($order->info['shipping_method'])) {
?>
              <tr>
                <td class="main bulleted"><b><?php echo HEADING_SHIPPING_METHOD; ?></b></td>
              </tr>
              <tr>
                <td class="main idented"><?php echo $order->info['shipping_method']; ?></td>
              </tr>
<?php
    }
?>
            </table></td>
<?php
  }
?>
            <td width="<?php echo (($order->delivery != false) ? '70%' : '100%'); ?>" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  if (sizeof($order->info['tax_groups']) > 1) {
?>
                  <tr>
                    <td class="main" colspan="2"><b><?php echo HEADING_PRODUCTS; ?></b></td>
                    <td class="smallText" align="right"><b><?php echo HEADING_TAX; ?></b></td>
                    <td class="smallText" align="right"><b><?php echo HEADING_TOTAL; ?></b></td>
                  </tr>
<?php
  } else {
?>
                  <tr>
                    <td class="main" colspan="2"><b><?php echo HEADING_PRODUCTS; ?></b></td>
                    <td class="main" align="right"><b><?php echo HEADING_PRODUCTS_BASE_PRICE; ?></b></td>
                    <td class="main" align="right"><b><?php echo HEADING_PRODUCTS_FINAL_PRICE; ?></b></td>
                  </tr>
<?php
  }

  for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
    echo '          <tr>' . "\n" .
         '            <td class="main" align="right" valign="top" width="30">' . $order->products[$i]['qty'] . '&nbsp;x</td>' . "\n" .
         '            <td class="main" valign="top" style="padding-bottom: 10px;">' . $order->products[$i]['name'] ; 
    echo '<br><b>' . HEADING_OPTIONS  . '</b></small>';

//attibute_query 
//check for attibutes:

          $attributes_check_query = tep_db_query("select *
            from " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . "
           where 
           orders_id = '" .$order_id . "' and
           orders_products_id = '" . $order->products[$i]['orders_products_id'] . "' ");
 if (tep_db_num_rows($attributes_check_query)) {
      while ($attributes = tep_db_fetch_array($attributes_check_query)) {
          echo '<br><small><i> *' . $attributes['products_options'] . ' : ' . $attributes['products_options_values'] . '</i></small>';
          echo '<br><small> ' . $attributes['price_prefix'] . ' ' . $currencies->display_price($attributes['options_values_price'], tep_get_tax_rate($products[$i]['tax_class_id']), 1) . '</small>';

        }
      }

    echo '</td>' . "\n";
 echo '</td><td class="main" valign="top" align="right">' .  $currencies->display_price($order->products[$i]['price'], tep_get_tax_rate($products[$i]['tax_class_id']), 1) . '</td>' . "\n";
    if (sizeof($order->info['tax_groups']) > 1) {
      echo '            <td class="main" valign="top" align="right">' . tep_display_tax_value($order->products[$i]['tax']) . '%</td>' . "\n";
    }

    echo '            <td class="main" align="right" valign="top">' . $currencies->format(tep_add_tax($order->products[$i]['final_price'], $order->products[$i]['tax']) * $order->products[$i]['qty'], true, $order->info['currency'], $order->info['currency_value']) . '</td>' . "\n" .
         '          </tr>' . "\n";
  }
?>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>

      <tr style="display:none">
        <td class="main"><b><?php echo HEADING_BILLING_INFORMATION; ?></b></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td width="30%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td class="main bulleted"><b><?php echo HEADING_BILLING_ADDRESS; ?></b></td>
              </tr>
              <tr>
                <td class="main idented"><?php echo tep_address_format($order->billing['format_id'], $order->billing, 1, ' ', '<br>'); ?></td>
              </tr>
		      <tr>
		        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
		      </tr>
              <tr>
                <td class="main bulleted spaced"><b><?php echo HEADING_PAYMENT_METHOD; ?></b></td>
              </tr>
              <tr>
                <td class="main idented"><?php echo $order->info['payment_method']; ?></td>
              </tr>
            </table></td>
            <td width="70%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2" style="border-top: 1px solid #ccc;padding-top: 10px">
<?php
  for ($i=0, $n=sizeof($order->totals); $i<$n; $i++) {
    echo '              <tr>' . "\n" .
         '                <td class="main" align="right" width="100%">' . $order->totals[$i]['title'] . '</td>' . "\n" .
         '                <td class="main" align="right">' . $order->totals[$i]['text'] . '</td>' . "\n" .
         '              </tr>' . "\n";
  }
?>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td class="main underlined"><b><?php echo HEADING_ORDER_HISTORY; ?></b></td>
      </tr>
      <tr>
        <td colspan="2"><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents">
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php
  $statuses_query = tep_db_query("select os.orders_status_name, osh.date_added, osh.comments from " . TABLE_ORDERS_STATUS . " os, " . TABLE_ORDERS_STATUS_HISTORY . " osh where osh.orders_id = '" . (int)$HTTP_GET_VARS['order_id'] . "' and osh.orders_status_id = os.orders_status_id and os.language_id = '" . (int)$languages_id . "' order by osh.date_added");
  while ($statuses = tep_db_fetch_array($statuses_query)) {
    echo '              <tr>' . "\n" .
         '                <td class="main" valign="top" width="70">' . tep_date_short($statuses['date_added']) . '</td>' . "\n" .
         '                <td class="main" valign="top" width="170">' . $statuses['orders_status_name'] . '</td>' . "\n" .
         '                <td class="main" valign="top">' . (empty($statuses['comments']) ? '&nbsp;' : nl2br(tep_output_string_protected($statuses['comments']))) . '</td>' . "\n" .
         '              </tr>' . "\n";
  }
?>
            </table></td>
          </tr>
        </table></td>
      </tr>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>
<?php
  //if (DOWNLOAD_ENABLED == 'true') include(DIR_WS_MODULES . 'downloads.php');
  if (DOWNLOAD_ENABLED == 'true') include(DIR_WS_MODULES . FILENAME_DOWNLOADS);
?>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox cartoptions">
          <tr class="infoBoxContents">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td align="right" class="main"><?php echo '<a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_CATALOG . FILENAME_ORDERS_PRINTABLE) . '?' . (tep_get_all_get_params(array('order_id')) . 'order_id=' . (int)$HTTP_GET_VARS['order_id']) . '\')">' . tep_template_image_button('button_printorder.gif', IMAGE_BUTTON_PRINT_ORDER) . '</a>'; ?></td>
        <td align="right" class="main"><?php echo '<a href="' . tep_href_link(FILENAME_ACCOUNT_HISTORY, tep_get_all_get_params(array('order_id')), 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></div>
                    <?php require(DIR_WS_MODULES . 'payment/paypal/catalog/order_send_money.inc.php'); ?>
                </td>
<?php /* end PayPal_Shopping_Cart_IPN */ ?>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
      </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table>
