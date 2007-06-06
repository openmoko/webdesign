<?php
/*
  $Id: specials.php,v 1.1.1.1 2004/03/04 23:42:27 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 3419 $


  Released under the GNU General Public License
*/

   $random_product25 = tep_db_query("select distinct
   p.products_id, 
   pd.products_name, 
   p.products_tax_class_id, 
   p.products_image, 
   s.specials_new_products_price 
   from " . TABLE_PRODUCTS . " p, 
    " . TABLE_PRODUCTS_DESCRIPTION . " pd,
    " . TABLE_SPECIALS . " s 
   where 
   p.products_status = '1' 
   and p.products_id = s.products_id 
   and pd.products_id = s.products_id 
   and pd.language_id = '" . (int)$languages_id . "' 
   and s.status = '1' 
   order by rand(), s.specials_date_added desc limit " . MAX_RANDOM_SELECT_SPECIALS);
 
  
  $random_product24_side_row = tep_db_num_rows($random_product25);
     if ($random_product24_side_row > 0){

?>
<!-- d specials //-->
          <tr>
            <td>
<?php

while ($product_specials22 = tep_db_fetch_array($random_product25)){
  $product_specials22_id = $product_specials22['products_id'];
  $product_specials22_image = tep_get_products_image($product_specials22['products_id']);
  $product_specials22_name = tep_get_products_name($product_specials22['products_id']);

  $pf->loadProduct($product_specials22['products_id'],$languages_id);
        $special_random_price = $pf->getPriceStringShort();
}
    $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_SPECIALS . '</font>');
    new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_SPECIALS));

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text' => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_specials22_id) . '">' . tep_image(DIR_WS_IMAGES . $product_specials22_image, $product_specials22_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $product_specials22_id) . '">' . $product_specials22_name . '</a><br>' . $special_random_price);

    new infoBox($info_box_contents);
$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
  new infoboxFooter($info_box_contents, true, true);

?>
            </td>
          </tr>
<!-- specials_eof //-->
<?php
  }
?>
