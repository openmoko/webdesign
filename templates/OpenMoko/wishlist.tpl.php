<!-- wishlist.tpl.php //start -->
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
	<tr>
		<td><?php echo tep_image(DIR_WS_IMAGES . 'pixel_trans.gif', '', '100%', '5'); ?></td>
	</tr>
  <?php
  // BOF: Lango Added for template MOD
}else{
  $header_text = HEADING_TITLE;
}
// EOF: Lango Added for template MOD
?>
  <tr>
    <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <?php
      // BOF: Lango Added for template MOD
      if (MAIN_TABLE_BORDER == 'yes'){
        table_image_border_top(false, false, $header_text);
      }
      // EOF: Lango Added for template MOD
      ?> 
      <td width="100%" valign="top" align="center"><table border="0" width="100%" cellspacing="0" cellpadding="0">   
        <!-- wishlist content //start -->
        <?php
        $wishlist_sql = "select * from " . TABLE_WISHLIST . " where customers_id = '" . $customer_id . "' and products_id > 0 order by products_name";      
        $wishlist_split = new splitPageResults($wishlist_sql, MAX_DISPLAY_WISHLIST_PRODUCTS);
        $wishlist_query = tep_db_query($wishlist_split->sql_query);

        $info_box_contents = array();
        if (tep_db_num_rows($wishlist_query)) {
          $product_ids = '';
          while ($wishlist = tep_db_fetch_array($wishlist_query)) {
            $product_ids .= $wishlist['products_id'] . ',';
          }
          $product_ids = substr($product_ids, 0, -1);
        
          $products_query = tep_db_query("select pd.products_id, pd.products_name, pd.products_description, p.products_image, p.products_price, p.products_tax_class_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where pd.products_id in (" . $product_ids . ") and p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' order by products_name");
           
          if ( ($wishlist_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
          ?>

            <tr>
              <td><table border="0" width="100%" cellspacing="0" cellpadding="2" class="alt_pag">
                <tr>
                  <td class="smallText bordered1"  style="padding-bottom: 15px"><?php echo $wishlist_split->display_count(TEXT_DISPLAY_NUMBER_OF_WISHLIST); ?></td>
                  <td class="smallText bordered1" align="right"  style="padding-bottom: 15px"><?php echo TEXT_RESULT_PAGE . ' ' . $wishlist_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
                </tr>
              </table></td>
            </tr>
          <?php
          }
          ?>  
          <tr>
            <td colspan="4">
              <table border="0" width="100%" cellspacing="0" cellpadding="2">
                <tr>
                  <td colspan="4"width="100%" valign="top">
                    <?php echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_WISHLIST, tep_get_all_get_params(array('action')) . 'action=add_del_products_wishlist', 'SSL')); ?>
                  </td>
                </tr>
              <tr>
                  <?php
                  $col = 0;
                  while ($products = tep_db_fetch_array($products_query)) {
                    $col++;
                    ?>
                    <td><table class="linkListing bordered1" width="100%" border="0" cellspacing="0" cellpadding="6">
                      <tr>
                        <td width="20%" valign="top" align="center" class="smallText">
                          <a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO, 'cPath=' . tep_get_product_path($products['products_id']) . '&amp;products_id=' . $products['products_id'], 'SSL'); ?>"><?php echo tep_image(DIR_WS_IMAGES . $products['products_image'], $products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT); ?></a>
                        </td>
                        <td valign="top" align="left" class="smallText">
                          <b>
                          	<div style="padding-bottom: 4px;">
                          	<a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO, 'cPath=' . tep_get_product_path($products['products_id']) . '&amp;products_id=' . $products['products_id'], 'SSL'); ?>"><?php echo $products['products_name']; ?></a></b>
                          	</div>
                          <?php
                          // Begin Wish List Code w/Attributes
                          $attributes_addon_price = 0;
                          
                          // Now get and populate product attributes
                          if ($customer_id > 0) {
                            $wishlist_products_attributes_query = tep_db_query("select products_options_id as po, products_options_value_id as pov from " . TABLE_WISHLIST_ATTRIBUTES . " where customers_id='" . $customer_id . "' and products_id = '" . $products['products_id'] . "'");
                            while ($wishlist_products_attributes = tep_db_fetch_array($wishlist_products_attributes_query)) {
                              // We now populate $id[] hidden form field with product attributes
                              echo tep_draw_hidden_field('id['.$products['products_id'].']['.$wishlist_products_attributes['po'].']', $wishlist_products_attributes['pov']);
                              // And Output the appropriate attribute name
                              $attributes = tep_db_query("select poptt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix
                                from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_TEXT . " poptt,  " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                where pa.products_id = '" . $products['products_id'] . "'
                                and pa.options_id = '" . $wishlist_products_attributes['po'] . "'
                                and pa.options_id = popt.products_options_id
                                and pa.options_values_id = '" . $wishlist_products_attributes['pov'] . "'
                                and pa.options_values_id = poval.products_options_values_id
                                and poptt.products_options_text_id = popt.products_options_id
                                and poptt.language_id = '" . $languages_id . "'
                                and poval.language_id = '" . $languages_id . "'");
                              $attributes_values = tep_db_fetch_array($attributes);
                              if ($attributes_values['price_prefix'] == '+')
                                 { $attributes_addon_price += $attributes_values['options_values_price']; }
                              else if ($attributes_values['price_prefix'] == '-')
                                 { $attributes_addon_price -= $attributes_values['options_values_price']; }
                                 echo '<br><small><i>' . $attributes_values['products_options_name'] . ' ' . $attributes_values['products_options_values_name'] . '</i></small>';
                            } // end while attributes for product
                               
                            if ($new_price = tep_get_products_special_price($products['products_id'])) {
                              $products_price = '<s>' . $currencies->display_price($products['products_price']+$attributes_addon_price, tep_get_tax_rate($products['products_tax_class_id'])) . '</s> <span class="productSpecialPrice">' . $currencies->display_price($new_price+$attributes_addon_price, tep_get_tax_rate($products['products_tax_class_id'])) . '</span>';
                            } else {
                              $products_price = $currencies->display_price($products['products_price']+$attributes_addon_price, tep_get_tax_rate($products['products_tax_class_id']));
                            }
                          } 
                          echo tep_image(DIR_WS_IMAGES . 'pixel_trans.gif', '', '1', '5').'<br>';
                          echo BOX_TEXT_PRICE . '&nbsp;' . $products_price. '<br>';
                          // End Wish List Code w/Attributes
                          ?>
                          <br>
                          <!-- move/delete checkboxes_start -->
                          <table class="productListing" border="0" width="96%" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left">
                                <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">          
                                  <tr>
                                    <td class="main" align="left" width="90"><b><?php echo BOX_TEXT_MOVE_TO_CART ?></b></td>
                                    <td class="main" align="left"><?php echo  tep_draw_checkbox_field('add_wishprod[]',$products['products_id']); ?></td>
                                    <td class="main" align="right"><?php echo BOX_TEXT_DELETE; ?>&nbsp;&nbsp;</td>
                                    <td class="main" align="left"><?php echo tep_draw_checkbox_field('del_wishprod[]',$products['products_id']); ?></td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </table>
                          <?php echo tep_image(DIR_WS_IMAGES . 'pixel_trans.gif', '', '1', '5'); ?>
                        </td> 
                      </tr>
                    </table></td>
                    <!-- move/delete checkboxes_end -->
                    <?php
                      if ( ($col / 1) == floor($col / 1) ) {
                      // if ((($col / MAX_DISPLAY_WISHLIST_COLS) == floor($col / MAX_DISPLAY_WISHLIST_COLS))) {
                      ?>
                        </tr>
<!--                        <tr><td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td></tr>-->
                        <tr>
                      <?php
                      }
                  } //end while
                  ?>
                </tr>
              </table>
             </td>
          </tr>
			<?php
              if ( ($wishlist_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
              ?>
              <tr>
              <table border="0" width="100%" cellspacing="0" cellpadding="2" class="alt_pag" >
                <tr>
                  <td class="smallText" style="padding-top: 15px;"><?php echo $wishlist_split->display_count(TEXT_DISPLAY_NUMBER_OF_WISHLIST); ?></td>
                  <td align="right" class="smallText"  style="padding-top: 15px;"><?php echo TEXT_RESULT_PAGE . ' ' . $wishlist_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); ?></td>
                </tr>
              </table></td>
              </tr>
              <?php
              }
              ?>        
          
          <tr><td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '40'); ?></td></tr>
          <tr>
            <td class="main" colspan="2">
              <table border="0" width="100%" cellspacing="0" cellpadding="0" class="cartoptions">
                <tr>
                  <td class="main" width="33%" align="left"><a href="<?php echo tep_href_link(FILENAME_DEFAULT, '', 'SSL'); ?>"><?php echo tep_template_image_button('button_continue_shopping.gif', IMAGE_BUTTON_CONTINUE_SHOPPING); ?></a></td>
                  <td class="main" width="33%" align="center"><a href="<?php echo tep_href_link(FILENAME_SHOPPING_CART, '', 'SSL'); ?>"><?php echo tep_template_image_button('button_view_cart.gif', IMAGE_BUTTON_IN_CART); ?></a></td>
                  <td class="main" width="33%" align="right"><?php echo tep_template_image_submit('button_update.gif', IMAGE_BUTTON_UPDATE); ?></td>
                </tr>
              </table>
            </td>
          </tr>
          
          </form>
          <tr>
            <td colspan="4"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '40'); ?></td>
          </tr>
           <tr>
            <td colspan="4" align="center">
			<!-- tell_a_friend //-->
			
			<table width="50%">
			<tr>
				<td class="review_product_box">
			<form method="get" action="<?php echo FILENAME_WISHLIST_SEND; ?>" name="tell_a_friend" style="text-align: left;">
            <?php
            	echo "<div class='estimator_title'>".BOX_TEXT_SEND."</div>";
            	echo tep_draw_hidden_field('products_ids', $HTTP_GET_VARS['products_ids']) . tep_hide_session_id();
            	echo "<div class='send_to_friend_form'><span class='label'>Friends email address:</span><input type='text' size='20' name='send_to' class='input_text' /> <span class='submit'>".tep_template_image_submit('button_tell_a_friend.gif', BOX_TEXT_SEND)."</span></div>";
                         
              // tell_a_friend_eof 
            ?>
            </form>
            	</td>
            </tr>
            </table>
            
            <?php 
            } else { // Nothing in the customers wishlist
            ?>
              <tr>
                <td>
                  <table border="0" width="100%" cellspacing="0" cellpadding="0">
                     <tr>
                        <td class="main"><?php echo BOX_TEXT_NO_ITEMS;?></td>
                     </tr>
                   </table>
            <?php
             }
            ?>
            <!-- customer_wishlist_eof //-->
            </td>
        </tr>
      </table></td>
      <?php
      // BOF: Lango Added for template MOD
      if (MAIN_TABLE_BORDER == 'yes'){
        table_image_border_bottom();
      }
      // EOF: Lango Added for template MOD
      ?>
    </table></td>
  </tr>
  <tr>
    <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
  </tr>
</table>
