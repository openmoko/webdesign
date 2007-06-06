<?php
/*
  $Id: featured.php,v 1.1.1.1 2004/03/04 23:42:14 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 3421 $


  Released under the GNU General Public License
*/
?>
<!-- featured //-->
<?php


  $random_product_side = tep_db_query("select distinct
                          p.products_id,
                          p.products_image, 
                          p.products_price, 
                          p.manufacturers_id,
                          pd.products_name,
                          p.products_tax_class_id, 
                          p.products_date_added, 
                           p.products_image 
                          from " . TABLE_PRODUCTS . " p, 
                        " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                        " . TABLE_FEATURED . " f
                                 where
                                   p.products_status = '1'
                                   and f.status = '1'
                                   and p.products_id = f.products_id
                                   and pd.products_id = f.products_id
                                   and pd.language_id = '" . $languages_id . "'
                                   order by rand(), featured_date_added DESC limit " . MAX_RANDOM_SELECT_SPECIALS);

$random_product_side_row = tep_db_num_rows($random_product_side);
   if ($random_product_side_row > 0){
?>
          <tr>
            <td>
<?php
while ($featured_random_product21 = tep_db_fetch_array($random_product_side)){

$featured_product21_id = $featured_random_product21['products_id'];
$featured_product21_image = tep_get_products_image($featured_random_product21['products_id']);
$featured_product21_name = tep_get_products_name($featured_random_product21['products_id']);

  $pf->loadProduct($featured_random_product21['products_id'],$languages_id);
        $featured_price1 = $pf->getPriceStringShort();
}
    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_FEATURED . '</font>'
                                );
    new infoBoxHeading($info_box_contents,  false, false, tep_href_link(FILENAME_FEATURED_PRODUCTS, '', 'NONSSL'));

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
            'text'  => '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $featured_product21_id) . '">' . tep_image(DIR_WS_IMAGES . $featured_product21_image, $featured_product21_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a><br><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $featured_product21_id, 'NONSSL') . '">' . $featured_product21_name . '</a><br>' . $featured_price1 );



   new infoBox($info_box_contents);
?>
            </td>
          </tr>
<?php
  
 }
?>
<!-- featured_eof //-->
