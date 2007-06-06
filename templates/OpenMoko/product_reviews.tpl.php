    <table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB;?>">
<?php
// BOF: Lango Added for template MOD
if (SHOW_HEADING_TITLE_ORIGINAL == 'yes') {
$header_text = '&nbsp;' ;
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
  $reviews_query_raw = "select r.reviews_id, left(rd.reviews_text, 400) as reviews_text, r.reviews_rating, r.date_added, r.customers_name from " . TABLE_REVIEWS . " r, " . TABLE_REVIEWS_DESCRIPTION . " rd where r.products_id = '" . (int)$product_info['products_id'] . "' and r.reviews_id = rd.reviews_id and rd.languages_id = '" . (int)$languages_id . "' order by r.reviews_id desc";
  $reviews_split = new splitPageResults($reviews_query_raw, MAX_DISPLAY_NEW_REVIEWS);

  if ($reviews_split->number_of_rows > 0) {
    if ((PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3')) {
?>
              <tr>
                <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></td>
                    <td align="right" class="smallText"><?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))); ?></td>
                  </tr>
                </table></td>
              </tr>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
<?php
    }
    $reviews_query = tep_db_query($reviews_split->sql_query);
    while ($reviews = tep_db_fetch_array($reviews_query)) {
?>
         <tr>
            <td>
				<div class="reviewRating"><?php echo sprintf(TEXT_REVIEW_RATING, tep_image(DIR_WS_TEMPLATE_IMAGES . 'stars_' . $reviews['reviews_rating'] . '.gif', sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating'])), sprintf(TEXT_OF_5_STARS, $reviews['reviews_rating'])); ?></div>
            	<div class="reviewTitle"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_INFO, 'products_id=' . $product_info['products_id'] . '&amp;reviews_id=' . $reviews['reviews_id'], 'SSL') . '"><b>' . sprintf(TEXT_REVIEW_BY, tep_output_string_protected($reviews['customers_name'])) . '</b></a>'; ?></div>
            	<div class="reviewExcerpt">
            		<?php echo tep_break_string(tep_output_string_protected($reviews['reviews_text']), 60, '-<br>') . ((strlen($reviews['reviews_text']) >= 100) ? '...' : ''); ?>
            	</div>
				<div class="reviewAdded"><?php echo sprintf(TEXT_REVIEW_DATE_ADDED, tep_date_long($reviews['date_added'])); ?></div>
            </td>
          </tr>
<?php } ?>

<?php
  } else {
?>
<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_top(false, false, $header_text);
}
// EOF: Lango Added for template MOD
?>
              <tr>
                <td align="center" class="infoboxContents"><?php echo TEXT_NO_REVIEWS; ?></td>
              </tr>

<?php
// BOF: Lango Added for template MOD
if (MAIN_TABLE_BORDER == 'yes'){
table_image_border_bottom();
}
// EOF: Lango Added for template MOD
?>

<?php
  }
  if (($reviews_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3'))) {
?>
              <tr>
                <td colspan="2"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText"><?php echo $reviews_split->display_count(TEXT_DISPLAY_NUMBER_OF_REVIEWS); ?></td>
                    <td align="right" class="smallText">
                    	<?php echo TEXT_RESULT_PAGE . ' ' . $reviews_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info'))); ?>
                    </td>
                  </tr>
                </table></td>
              </tr>
              
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
              
              <tr>
	            <td class="review_product_box">
	            <table style="margin: auto">
	            	<tr>
	            		<td style="text-align: right; padding-right: 40px;">
	<?php
	  if (tep_not_null($product_info['products_image'])) {
	  	echo '<a onclick="popupWindow(\'' . tep_href_link(FILENAME_POPUP_IMAGE, 'pID=' . $product_info['products_id'], 'SSL') . '\'); return false" href="' . tep_href_link(DIR_WS_IMAGES . $product_info['products_image'], '', 'SSL') . '" target="_blank">' . tep_image(DIR_WS_IMAGES . $product_info['products_image'], $product_info['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'hspace="5" vspace="5"') . '<br>' . TEXT_CLICK_TO_ENLARGE . '</a>';
	  }
	?>
	            		</td>
	            		<td>
	<?php
			
			echo '<div class="review_addtocart"><a class="review_addtocart" href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now', '', 'SSL') . '">' . tep_template_image_button('button_in_cart.gif', IMAGE_BUTTON_IN_CART) . '</a></div>';
	
	//wishlist button
	  $wishlist_id_query = tep_db_query('select products_id as wPID from ' . TABLE_WISHLIST . ' where products_id= ' . $product_info['products_id'] . ' and customers_id = ' . (int)$customer_id . ' order by products_name');
	  $wishlist_Pid = tep_db_fetch_array($wishlist_id_query);
	
	echo '<div class="review_addtocart"><form name="wishlist_quantity" method="post" action="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=add_wishlist', 'SSL') . '">';
	echo '                    <input type="hidden" name="products_id" value="' . $product_info['products_id'] . '">
	                          <input type="hidden" name="products_model" value="' . $product_info['products_model'] . '">
	                          <input type="hidden" name="products_name" value="' . $product_info['products_name'] . '">
	                          <input type="hidden" name="products_price" value="' . $product_info['products_price'] . '">
	                          <input type="hidden" name="final_price" value="' . $product_info['final_price'] . '">
	                          <input type="hidden" name="products_tax" value="' . $product_info['products_tax'] . '">';
	
	if ( (!tep_not_null($wishlist_Pid[wPID])) && (tep_session_is_registered('customer_id')) )  echo tep_template_image_submit('button_add_wishlist.gif', IMAGE_BUTTON_ADD_WISHLIST);
	echo  '
	                        </form></div>';
	?>
	            		</td>
	            	</tr>
	            </table>
	            </td>
              </tr>
              

              <tr>
                <td><?php //echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
              </tr>
<?php
  }
?>
              <tr>
                <td colspan="2"><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox cartoptions">
                  <tr class="infoBoxContents">
                    <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                      <tr>
                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                        <td class="main"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(), 'SSL') . '">' . tep_template_image_button('button_back.gif', IMAGE_BUTTON_BACK) . '</a>'; ?></td>
                        <td class="main" align="right"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, tep_get_all_get_params(), 'SSL') . '">' . tep_template_image_button('button_write_review.gif', IMAGE_BUTTON_WRITE_REVIEW) . '</a>'; ?></td>
                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                      </tr>
                     </table></td>
                  </tr>
                 </table></td>
              </tr>
   </table>
