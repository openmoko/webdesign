<?php
/*
  $Id: whats_new.php,v 1.1.1.1 2004/03/04 23:42:16 ccwjr Exp $

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
  $random_product27 = tep_db_query("select distinct
                          p.products_id,
                          p.products_image, 
                          p.products_price, 
                          p.manufacturers_id,
                          pd.products_name,
                          p.products_tax_class_id, 
                          p.products_date_added, 
                           p.products_image 
                          from " . TABLE_PRODUCTS . " p, 
      " . TABLE_PRODUCTS_DESCRIPTION . " pd
      where 
       p.products_status = '1' 
       and pd.products_id = p.products_id
       and pd.language_id = '" . $languages_id . "' 
       and DATE_SUB(CURDATE(),INTERVAL " .NEW_PRODUCT_INTERVAL ." DAY) <= p.products_date_added  
      order by rand(), products_date_added desc limit " . MAX_RANDOM_SELECT_NEW);
 
$random_product27_side_row = tep_db_num_rows($random_product27);
   if ($random_product27_side_row > 0){

  ?>
<!--D whats_new //-->
 <tr>
            <td>
<?php      
    
while ($whatsnew_product21 = tep_db_fetch_array($random_product27)){
  $whatsnew_product21_id = $whatsnew_product21['products_id'];
  $whatsnew_product21_image = tep_get_products_image($whatsnew_product21['products_id']);
  $whatsnew_product21_name = tep_get_products_name($whatsnew_product21['products_id']);

  $pf->loadProduct($whatsnew_product21['products_id'],$languages_id);
         $whats_new_price = $pf->getPriceStringShort();
}
// EOF Separate Pricing Per Customer
//Eversun mod end for sppc and qty price breaks
    $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_WHATS_NEW . '</font>');
    new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_PRODUCTS_NEW));

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',           
         'text' => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $whatsnew_product21_id) . '">' . tep_image(DIR_WS_IMAGES . $whatsnew_product21_image, $whatsnew_product21_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $whatsnew_product21_id) . '">' . $whatsnew_product21_name . '</a><br>' . $whats_new_price .'<br />');
//Eversun mod for sppc and qty price breaks

    new infoBox($info_box_contents);
$info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
  new infoboxFooter($info_box_contents, true, true);

?>
            </td>
          </tr>
<!-- whats_new_eof //-->
<?php
  }
?>
