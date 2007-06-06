<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Chain Reaction Works, Inc
  Copyright (c) 2005 - 2006 Chain Reaction Works, Inc.

  Last Modified By : $Author:$
  Last Modified On : $Date:$
  Latest Revision : $Revision: 1075 $

  Released under the GNU General Public License
*/
?>
<!-- catalog //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_CATALOG,
                     'link'  => tep_href_link(FILENAME_CATEGORIES, 'selected_box=catalog'));

  if ($selected_box == 'catalog' || $menu_dhtml == true) {
    $contents[] = array('text'  =>
                                   tep_admin_files_boxes(FILENAME_CATEGORIES, BOX_CATALOG_CATEGORIES_PRODUCTS) .
                                   tep_admin_files_boxes(FILENAME_PRODUCTS_ATTRIBUTES, BOX_CATALOG_CATEGORIES_PRODUCTS_ATTRIBUTES) .
                       tep_admin_files_boxes(FILENAME_PRODUCTS_CATEGORY_OPTIONS, BOX_CATALOG_CATEGORIES_PRODUCTS_CATEGORY_OPTIONS) .
                                   tep_admin_files_boxes(FILENAME_MANUFACTURERS, BOX_CATALOG_MANUFACTURERS) .
                                   tep_admin_files_boxes(FILENAME_REVIEWS, BOX_CATALOG_REVIEWS) .
                                   tep_admin_files_boxes(FILENAME_SHOPBYPRICE, BOX_CATALOG_SHOP_BY_PRICE) .
                       tep_admin_files_boxes(FILENAME_XSELL_PRODUCTS, BOX_CATALOG_XSELL_PRODUCTS) .
                                   tep_admin_files_boxes(FILENAME_FEATURED, BOX_CATALOG_FEATURED) .
                                   tep_admin_files_boxes(FILENAME_PRODUCTS_EXPECTED, BOX_CATALOG_PRODUCTS_EXPECTED).
                       tep_admin_files_boxes(FILENAME_PRODUCTS_EXTRA_FIELDS,BOX_CATALOG_PRODUCTS_EXTRA_FIELDS));
//Admin end
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- catalog_eof //-->
