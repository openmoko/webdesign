<?php echo tep_draw_form('order', tep_href_link(FILENAME_CHECKOUT_SUCCESS, 'action=update', 'SSL')); ?>
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

  <?php require('add_checkout_success.php'); //ICW CREDIT CLASS/GV SYSTEM ?>

  <!-- checkout_success_modules - start -->
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <?php
      if (MODULE_CHECKOUT_SUCCESS_INSTALLED) {
        $checkout_success_modules->process();
        echo $checkout_success_modules->output();
      }
      ?>
    </table></td>
  </tr>
  <!-- checkout_success_modules - end -->
  <tr>
    <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
  </tr>
  <tr> 
    <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" class="main"><?php echo '<a href="javascript:popupWindow(\'' .  (HTTP_SERVER . DIR_WS_CATALOG . FILENAME_ORDERS_PRINTABLE) . '?' . (tep_get_all_get_params(array('order_id')) . 'order_id=' . $HTTP_GET_VARS['order_id']) . '\')">' . tep_template_image_button('button_printorder.gif', IMAGE_BUTTON_PRINT_ORDER) . '</a>'; ?></td>
        <td align="right" class="main"><?php echo tep_template_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
  </tr>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%" align="right"><?php echo tep_draw_separator('pixel_silver.gif', '1', '5'); ?></td>
            <td width="50%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
          </tr>
        </table></td>
        <td width="25%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
        <td width="25%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
        <td width="25%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%"><?php echo tep_draw_separator('pixel_silver.gif', '100%', '1'); ?></td>
            <td width="50%"><?php echo tep_image(DIR_WS_IMAGES . 'checkout_bullet.gif'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_DELIVERY; ?></td>
        <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_PAYMENT; ?></td>
        <td align="center" width="25%" class="checkoutBarFrom"><?php echo CHECKOUT_BAR_CONFIRMATION; ?></td>
        <td align="center" width="25%" class="checkoutBarCurrent"><?php echo CHECKOUT_BAR_FINISHED; ?></td>
      </tr>
    </table></td>
  </tr>
  <?php if (DOWNLOAD_ENABLED == 'true') include(DIR_WS_MODULES . 'downloads.php'); ?>
</table></form>