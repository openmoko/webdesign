<?php
/*
  $Id: product_listing_col.php,v 1.1.1.1 2004/03/04 23:41:11 ccwjr Exp $
*/

  if (strstr($PHP_SELF, FILENAME_SPECIALS)) {
    $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SPECIAL_PRODUCTS, 'p.products_id');
  }else{
    $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');
  }

  if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>
<!--product-listin-col -->
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr>
    <td class="smallText"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
    <td class="smallText" align="right">
    	<?php //echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y'))); var_dump($listing_split);?>
    	<?php
    		$current_page = $listing_split->current_page_number;
    		$total_pages = $listing_split->number_of_pages;
    		
    		$page = $current_page -1;
    		
    		$getcpath = isset($_GET['cPath']) ? $_GET['cPath'] : 0;
    		
    		$base_url = '?cPath='.$getcpath.'&amp;page=';
    		
			echo "<div class='pagination'>";
    		
			if ($current_page !=1) {
				echo "<a href='".$base_url."1' class='pag_first'>First</a>";
				echo "<a href='$base_url".($current_page-1)."' class='pag_previous'>Previous</a>";
			} else {
				echo "<a href='##' class='pag_first disabled'>First</a>";
				echo "<a href='##' class='pag_previous disabled'>Previous</a>";
			}
			for ($x=1;$x<($total_pages+1);$x++) {
				echo "<a href='$base_url".($x)."'";
				if (($x-1)==$page) echo " class='selected'";
				echo">$x</a>";
			};
			
			if ($current_page != $total_pages) {
				echo "<a href='$base_url".($current_page+1)."' class='pag_next'>Next</a>";
				echo "<a href='$base_url".($total_pages)."' class='pag_last'>Last</a>";
			} else {
				echo "<a href='##' class='pag_next disabled'>Next</a>";
				echo "<a href='##' class='pag_last disabled'>Last</a>";
			}
			
			echo "</div>";
		?>
    </td>
  </tr>
</table>
<?php
  }
  $list_box_contents = array();

  if ($listing_split->number_of_rows > 0) {
    $listing_query = tep_db_query($listing_split->sql_query);

    $row = 0;
    $column = 0;
    $no_of_listings = tep_db_num_rows($listing_query);

    while ($_listing = tep_db_fetch_array($listing_query)) {
      $listing[] = $_listing;
    }

    for ($x = 0; $x < $no_of_listings; $x++) {
      $rows++;
      $product_contents = array();
      for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
        $lc_align = '';
        switch ($column_list[$col]) {

          case 'PRODUCT_LIST_MODEL':
            $lc_align = '';
            $lc_text = '&nbsp;' . $listing[$x]['products_model'] . '&nbsp;';
            break;

          case 'PRODUCT_LIST_NAME':
            $lc_align = '';
            if (isset($HTTP_GET_VARS['manufacturers_id'])) {
              $lc_text = '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id'] . '&amp;products_id=' . $listing[$x]['products_id'], 'SSL') . '">' . $listing[$x]['products_name'] . '</a>';
            } else {
              $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&amp;' : '') . 'products_id=' . $listing[$x]['products_id'], 'SSL') . '">' . $listing[$x]['products_name'] . '</a>&nbsp;';
            }
            break;

          case 'PRODUCT_LIST_MANUFACTURER':
            $lc_align = '';
            $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing[$x]['manufacturers_id'], 'SSL') . '">' . $listing[$x]['manufacturers_name'] . '</a>&nbsp;';
            break;
            
          case 'PRODUCT_LIST_PRICE':
            $lc_align = 'right';
            $pf->loadProduct($listing[$x]['products_id'],$languages_id);
            $lc_text = $pf->getPriceStringShort();
            break;

          case 'PRODUCT_LIST_QUANTITY':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing[$x]['products_quantity'] . '&nbsp;';
            break;

          case 'PRODUCT_LIST_WEIGHT':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing[$x]['products_weight'] . '&nbsp;';
            break;

          case 'PRODUCT_LIST_IMAGE':
            $lc_align = 'center';
            if (isset($HTTP_GET_VARS['manufacturers_id'])) {
              $lc_text = '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id'] . '&amp;products_id=' . $listing[$x]['products_id'], 'SSL') . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>';
            } else {
              $lc_text = '&nbsp;<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&amp;' : '') . 'products_id=' . $listing[$x]['products_id'], 'SSL') . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>&nbsp;';
            }
            break;
            case 'PRODUCT_LIST_DATE_EXPECTED':
           //  $duedate= date( "M, d, Y", $listing[$x]['products_date_available'])
              $duedate= str_replace("00:00:00", "" , $listing[$x]['products_date_available']);  
                  $lc_align = 'center';
                  $lc_text = '&nbsp;' .  $duedate . '&nbsp;';
            break;
            
          // This change to the buy_now is backed out
          // VJ product quantity begin 

          case 'PRODUCT_LIST_BUY_NOW':
            $lc_align = 'center';
            $lc_text = '<a href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action')) . 'action=buy_now&amp;products_id=' . $listing[$x]['products_id'], 'SSL') . '">' . tep_template_image_button('button_buy_now.gif', IMAGE_BUTTON_BUY_NOW) . '</a>&nbsp;';
            break;
        }
        $product_contents[] = $lc_text;
      }
      
/*      var_dump($product_contents);*/
		
      for ($cntr=0;$cntr<count($product_contents);$cntr++) {
      	$product_contents[$cntr] = str_replace("&nbsp;",'',$product_contents[$cntr]);
      }
      
     
      $lc_text = '<table class="product_list_table_'.($column+1).'">';
      $lc_text.= '<tr>';
      $lc_text.= '<td class="product_list_col1">'.$product_contents[0].'</td>';
      $lc_text.= '<td class="product_list_col2"><span class="plist_name">'.$product_contents[1].'</span><span class="plist_price">'.$product_contents[2].'</span><span class="plist_button">'.$product_contents[3].'</span></td></tr></table>';
      
      //$lc_text = implode('<br>', $product_contents);
      
      $list_box_contents[$row][$column] = array('align' => 'center',
                                                'params' => 'class="productListing-data"',
                                                'text'  => $lc_text);

      $column ++;
      if ($column >= COLUMN_COUNT) {
        $row ++;
        $column = 0;
      }
    }

    new productListingBox($list_box_contents);
  } else {
    $list_box_contents = array();
    $list_box_contents[0] = array('params' => 'class="productListing-odd"');
    $list_box_contents[0][] = array('params' => 'class="productListing-data"',
                                   'text' => TEXT_NO_PRODUCTS);
    new productListingBox($list_box_contents);
  }
  if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2" class="bottom_pagination_table">
  <tr>
    <td class="smallText"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
    <td class="smallText" align="right">
    	<?php   		
    		$getcpath = isset($_GET['cPath']) ? $_GET['cPath'] : 0;
    		
    		$base_url = '?cPath='.$getcpath.'&amp;page=';
    		
			echo "<div class='pagination'>";
    		
			if ($current_page !=1) {
				echo "<a href='".$base_url."1' class='pag_first'>First</a>";
				echo "<a href='$base_url".($current_page-1)."' class='pag_previous'>Previous</a>";
			} else {
				echo "<a href='##' class='pag_first disabled'>First</a>";
				echo "<a href='##' class='pag_previous disabled'>Previous</a>";
			}
			for ($x=1;$x<($total_pages+1);$x++) {
				echo "<a href='$base_url".($x)."'";
				if (($x-1)==$page) echo " class='selected'";
				echo">$x</a>";
			};
			
			if ($current_page != $total_pages) {
				echo "<a href='$base_url".($current_page+1)."' class='pag_next'>Next</a>";
				echo "<a href='$base_url".($total_pages)."' class='pag_last'>Last</a>";
			} else {
				echo "<a href='##' class='pag_next disabled'>Next</a>";
				echo "<a href='##' class='pag_last disabled'>Last</a>";
			}
			
			echo "</div>";
		?>
    </td>
  </tr>
</table>
<?php
  }
?>