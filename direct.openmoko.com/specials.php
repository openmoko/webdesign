<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_SPECIALS);

    $define_list = array('PRODUCT_LIST_MODEL' => PRODUCT_LIST_MODEL,
                         'PRODUCT_LIST_NAME' => PRODUCT_LIST_NAME,
                         'PRODUCT_LIST_MANUFACTURER' => PRODUCT_LIST_MANUFACTURER,
                         'PRODUCT_LIST_PRICE' => PRODUCT_LIST_PRICE,
                         'PRODUCT_LIST_QUANTITY' => PRODUCT_LIST_QUANTITY,
                         'PRODUCT_LIST_WEIGHT' => PRODUCT_LIST_WEIGHT,
                         'PRODUCT_LIST_IMAGE' => PRODUCT_LIST_IMAGE,
                         'PRODUCT_LIST_BUY_NOW' => PRODUCT_LIST_BUY_NOW);

    asort($define_list);

    $column_list = array();
    reset($define_list);
    while (list($key, $value) = each($define_list)) {
      if ($value > 0) $column_list[] = $key;
    }

       // find out if sorting by price has been requested
       if ( (isset($HTTP_GET_VARS['sort'])) && (ereg('[1-8][ad]', $HTTP_GET_VARS['sort'])) && (substr($HTTP_GET_VARS['sort'], 0, 1) <= sizeof($column_list)) && $customer_group_id != '0' ){
        $_sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
        if ($column_list[$_sort_col-1] == 'PRODUCT_LIST_PRICE') {
          $status_need_to_get_prices = true;
          }
       }
 if ( (!isset($HTTP_GET_VARS['sort'])) || (!ereg('[1-8][ad]', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'], 0, 1) > sizeof($column_list)) ) {
      $sort_column = CATEGORIES_SORT_ORDER;
      $sort_order = 'a';
    } else {
      $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
      $sort_column = $column_list[$sort_col-1];
      $sort_order = substr($HTTP_GET_VARS['sort'], 1);
    }

        $select_column_list = '';
    
    $listing_sql .= ' order by ';    
        for ($i=0, $n=sizeof($column_list); $i<$n; $i++) {
          switch ($column_list[$i]) {
            case 'PRODUCT_LIST_MODEL':
              $select_column_list .= 'p.products_model, ';
              break;
            case 'PRODUCT_LIST_NAME':
              $select_column_list .= 'pd.products_name, ';
              break;
            case 'PRODUCT_LIST_MANUFACTURER':
              $select_column_list .= 'm.manufacturers_name, ';
              break;
            case 'PRODUCT_LIST_QUANTITY':
              $select_column_list .= 'p.products_quantity, ';
              break;
            case 'PRODUCT_LIST_IMAGE':
              $select_column_list .= 'p.products_image, ';
              break;
            case 'PRODUCT_LIST_WEIGHT':
              $select_column_list .= 'p.products_weight, ';
              break;
             }
    }
   
    // We show them all
   // either retail or no need to get correct special prices
          $listing_sql = "select distinct " . $select_column_list . "  
                          p.products_id,
                          p.products_price,
                          p.products_tax_class_id,
                          p.products_image, 
                          IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, 
        IF(s.status, s.specials_new_products_price, p.products_price) as final_price
                        from " . TABLE_PRODUCTS . " p, 
                        " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                        " . TABLE_SPECIALS . " s 
                        where 
                         p.products_status = '1' 
                         and s.products_id = p.products_id 
                         and pd.products_id = p.products_id
                         and pd.language_id = '" . $languages_id . "' 
                         and s.status = '1'";
                          
 if ( (!isset($HTTP_GET_VARS['sort'])) || (!ereg('[1-8][ad]', $HTTP_GET_VARS['sort'])) || (substr($HTTP_GET_VARS['sort'], 0, 1) > sizeof($column_list)) ) {
      $sort_column = CATEGORIES_SORT_ORDER;
      $sort_order = 'a';
   //   $sort = ;
    } else {
      $sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
      $sort_column = $column_list[$sort_col-1];
      $sort_order = substr($HTTP_GET_VARS['sort'], 1);
    
    $listing_sql .= ' order by ';
    switch ($sort_column) {
      case 'PRODUCT_LIST_MODEL':
        $listing_sql .= "p.products_model " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
        break;
      case 'PRODUCT_LIST_NAME':
        $listing_sql .= "pd.products_name " . ($sort_order == 'd' ? 'desc' : '');
        break;
      case 'PRODUCT_LIST_MANUFACTURER':
        $listing_sql .= "m.manufacturers_name " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
        break;
      case 'PRODUCT_LIST_QUANTITY':
        $listing_sql .= "p.products_quantity " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
        break;
      case 'PRODUCT_LIST_IMAGE':
        $listing_sql .= "pd.products_name";
        break;
      case 'PRODUCT_LIST_WEIGHT':
        $listing_sql .= "p.products_weight " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
        break;
      case 'PRODUCT_LIST_PRICE':
        $listing_sql .= "final_price " . ($sort_order == 'd' ? 'desc' : '') . ", pd.products_name";
        break;
      }
   }
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_SPECIALS));

  $content = CONTENT_SPECIALS;

  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);

  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
