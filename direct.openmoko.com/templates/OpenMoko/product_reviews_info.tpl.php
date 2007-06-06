<?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product', 'SSL')); ?>
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB;?>">
<?php
// BOF: Lango Added for template MOD
if (SHOW_HEADING_TITLE_ORIGINAL == 'yes') {
$header_text = '&nbsp;'
//EOF: Lango Added for template MOD
?>
      <tr>
        <td colspan="2"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading" valign="top"><?php echo $products_name; ?></td>
            <td class="pageHeading" align="right" valign="top"><?php echo $products_price; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
<?php
}else{
$header_text = $products_name . '&nbsp;&nbsp;&nbsp;&nbsp;' . $products_price;
}
?>

<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2" style="margin-right: 15px;">
              <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="main review_header"><?php echo '<b>' . sprintf(TEXT_REVIEW_BY, tep_output_string_protected($reviews_info['customers_name'])) . '</b>'; ?></td>
                    <td class="smallText review_header review_header_date" align="right"><?php echo sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($reviews_info['date_added'])); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
                  <tr class="infoBoxContents">
                    <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                      <tr>
                        <td valign="top" class="main reviewMain"><?php echo tep_break_string(nl2br(tep_output_string_protected($reviews_info['reviews_text'])), 60, '-<br>') . '<br><br><b>' . sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_TEMPLATE_IMAGES . 'stars_' . $reviews_info['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews_info['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $reviews_info['reviews_rating'])).'</b>'; ?></td>
                        <td width="10" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
                </table>
                </td>
              </tr>
              
              
            </table></td>
            
          
            <td width="<?php echo SMALL_IMAGE_WIDTH + 10; ?>" align="right" valign="top"><table border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td align="center" class="smallText">
                <?php
                  if (tep_not_null($reviews_info['products_image'])) {
                  ?>
                    <script language="javascript"><!--
                      document.write('<?php echo '<a href="javascript:popupWindow(\\\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $reviews_info['products_id'], 'SSL') . '\\\')">' . tep_image(DIR_WS_IMAGES . $reviews_info['products_image'], addslashes($reviews_info['products_name']), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '<br>' . TEXT_CLICK_TO_ENLARGE . '</a>'; ?>');
                    //--></script>
                    <noscript>
                      <?php echo '<a href="' . tep_href_link(DIR_WS_IMAGES . $reviews_info['products_image'], '', 'SSL') . '" target="_blank">' . tep_image(DIR_WS_IMAGES . $reviews_info['products_image'], $reviews_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '<br>' . TEXT_CLICK_TO_ENLARGE . '</a>'; ?>
                    </noscript>
                  <?php
                  }
                  echo '<p><a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now', 'SSL') . '">' . tep_template_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART) . '</a>';
                  // Begin Wishlist Code 
                  if (DESIGN_BUTTON_WISHLIST == 'true') {                   
                    if( (!tep_session_is_registered('customer_id')) || (!tep_session_is_registered('SESSION_WISHLIST')) ){
                      $SESSION_WISHLIST = $reviews_info['products_id'];
                      tep_session_register('SESSION_WISHLIST');
                    }
                    echo '<p><a href="javascript:document.cart_quantity.action=\'' . tep_href_link(basename(FILENAME_PRODUCT_INFO), 'action=add_wishlist', 'SSL') . '\'; document.cart_quantity.submit();">' . tep_template_image_button('button_add_wishlist.gif', IMAGE_BUTTON_ADD_WISHLIST,'align="absmiddle"') . '</a>' ;
                  }         
                  // End Wishlist Code
                  echo  '</form></p>';
                ?>
                </td>
              </tr>
              
            </table>
          </td>
        </table></td>
      </tr>
      
              <tr>
                <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox cartoptions">
                  <tr class="infoBoxContents">
                    <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                        <td class="main"><?php echo '<a href="javascript:history.go(-1)">' . tep_template_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
                        <td class="main" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, tep_get_all_get_params(array('reviews_id')), 'SSL') . '">' . tep_template_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>'; ?></td>
                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
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
    </table>
