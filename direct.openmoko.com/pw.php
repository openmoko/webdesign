<?php
/*
  $Id: index.php,v 1.2 2004/03/09 19:56:29 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

// the following cPath references come from application_top.php
  $category_depth = 'top';
  if (isset($cPath) && tep_not_null($cPath)) {
    $categories_products_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where categories_id = '" . (int)$current_category_id . "'");
    $cateqories_products = tep_db_fetch_array($categories_products_query);
    if ($cateqories_products['total'] > 0) {
      $category_depth = 'products'; // display products
    } else {
      $category_parent_query = tep_db_query("select count(*) as total from " . TABLE_CATEGORIES . " where parent_id = '" . (int)$current_category_id . "'");
      $category_parent = tep_db_fetch_array($category_parent_query);
      if ($category_parent['total'] > 0) {
        $category_depth = 'nested'; // navigate through the categories
      } else {
        $category_depth = 'products'; // category has no products, but display the 'no products' message
      }
    }
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PW);

  if ($category_depth == 'nested') {
//Code change for Categories Description 1.5
//    $category_query = tep_db_query("select cd.categories_name, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");
//Changed to the following
    $category_query = tep_db_query("select cd.categories_name, cd.categories_heading_title, cd.categories_description, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");
//End Categories Description 1.5

    $category = tep_db_fetch_array($category_query);

    $content = CONTENT_INDEX_NESTED;

  } elseif ($category_depth == 'products' || isset($HTTP_GET_VARS['manufacturers_id'])) {
// create column list
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
// Eversun mod for sppc and qty price breaks
   if(!tep_session_is_registered('sppc_customer_group_id')) {
     $customer_group_id = '0';
     } else {
      $customer_group_id = $sppc_customer_group_id;
   }
   // this will build the table with specials prices for the retail group or update it if needed
   // this function should have been added to includes/functions/database.php
   if ($customer_group_id == '0') {
     tep_db_check_age_specials_retail_table();
   }
   $status_product_prices_table = false;
   $status_need_to_get_prices = false;

   // find out if sorting by price has been requested
   if ( (isset($HTTP_GET_VARS['sort'])) && (ereg('[1-8][ad]', $HTTP_GET_VARS['sort'])) && (substr($HTTP_GET_VARS['sort'], 0, 1) <= sizeof($column_list)) && $customer_group_id != '0' ){
    $_sort_col = substr($HTTP_GET_VARS['sort'], 0 , 1);
    if ($column_list[$_sort_col-1] == 'PRODUCT_LIST_PRICE') {
      $status_need_to_get_prices = true;
      }
   }

   if ($status_need_to_get_prices == true && $customer_group_id != '0') {
     $product_prices_table = TABLE_PRODUCTS_GROUP_PRICES.$customer_group_id;
   // the table with product prices for a particular customer group is re-built only a number of times per hour
   // (setting in /includes/database_tables.php called MAXIMUM_DELAY_UPDATE_PG_PRICES_TABLE, in minutes)
   // to trigger the update the next function is called (new function that should have been
   // added to includes/functions/database.php)
     tep_db_check_age_products_group_prices_cg_table($customer_group_id);
     $status_product_prices_table = true;
   } // end if ($status_need_to_get_prices == true && $customer_group_id != '0')
// Eversun mod end for sppc and qty price breaks
    $select_column_list = '';

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
 // Get the category name and description
    $category_query = tep_db_query("select cd.categories_name, cd.categories_heading_title, cd.categories_description, c.categories_image from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = '" . (int)$current_category_id . "' and cd.categories_id = '" . (int)$current_category_id . "' and cd.language_id = '" . (int)$languages_id . "'");
    $category = tep_db_fetch_array($category_query);


// show the products of a specified manufacturer
    if (isset($HTTP_GET_VARS['manufacturers_id'])) {
      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {

// We are asked to show only a specific category
//Eversun mod for sppc and qty price breaks

/*
        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
      } else {
// We show them all
        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where p.products_status = '1' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";
      }
    } else {
// show the products in a given categorie
      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// We are asked to show only specific catgeory
        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_MANUFACTURERS . " m, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where p.products_status = '1' and p.manufacturers_id = m.manufacturers_id and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";
      } else {
// We show them all
        $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price from " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS . " p left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where p.products_status = '1' and p.products_id = p2c.products_id and pd.products_id = p2c.products_id and pd.language_id = '" . (int)$languages_id . "' and p2c.categories_id = '" . (int)$current_category_id . "'";
    */
      
    if ($status_product_prices_table == true) {
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p
                      left join " . $product_prices_table . " as tmp_pp using(products_id)),
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_MANUFACTURERS . " m,
                           " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
                      where p.products_status = '1'
                        and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'
                        and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'
                        and p.products_id = p2c.products_id
                        and pd.products_id = p2c.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
    } else { // either retail or no need to get correct special prices
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p
                      left join " . TABLE_SPECIALS_RETAIL_PRICES . " s using(products_id)),
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_MANUFACTURERS . " m,
                           " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
                      where p.products_status = '1'
                        and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'
                        and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'
                        and p.products_id = p2c.products_id
                        and pd.products_id = p2c.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p2c.categories_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'";
    } // end else { // either retail...
    } else {
// We show them all
        if ($status_product_prices_table == true) {
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p
                      left join " . $product_prices_table . " as tmp_pp using(products_id)),
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_MANUFACTURERS . " m
                      where p.products_status = '1'
                        and pd.products_id = p.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'
                        and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";
    } else { // either retail or no need to get correct special prices
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p
                      left join " . TABLE_SPECIALS_RETAIL_PRICES . " s using(products_id)),
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_MANUFACTURERS . " m
                      where p.products_status = '1'
                        and pd.products_id = p.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'
                        and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'";
    } // end else { // either retail...
    }
  } else {
// show the products in a given categorie
      if (isset($HTTP_GET_VARS['filter_id']) && tep_not_null($HTTP_GET_VARS['filter_id'])) {
// We are asked to show only specific catgeory;
        if ($status_product_prices_table == true) {
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p
                      left join " . $product_prices_table . " as tmp_pp using(products_id)),
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_MANUFACTURERS . " m,
                           " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
                      where p.products_status = '1'
                        and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'
                        and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'
                        and p.products_id = p2c.products_id
                        and pd.products_id = p2c.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p2c.categories_id = '" . (int)$current_category_id . "'";
        } else { // either retail or no need to get correct special prices
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p 
                      left join " . TABLE_SPECIALS_RETAIL_PRICES . " s using(products_id)),
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_MANUFACTURERS . " m,
                           " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
                      where p.products_status = '1'
                        and p.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'
                        and m.manufacturers_id = '" . (int)$HTTP_GET_VARS['filter_id'] . "'
                        and p.products_id = p2c.products_id
                        and pd.products_id = p2c.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p2c.categories_id = '" . (int)$current_category_id . "'";
        } // end else { // either retail...
      } else {
// We show them all
        if ($status_product_prices_table == true) {
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, tmp_pp.products_price, p.products_tax_class_id, IF(tmp_pp.status, tmp_pp.specials_new_products_price, NULL) as specials_new_products_price, IF(tmp_pp.status, tmp_pp.specials_new_products_price, tmp_pp.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p
                      left join " . $product_prices_table . " as tmp_pp using(products_id))
                      left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id,
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
                      where p.products_status = '1'
                        and p.products_id = p2c.products_id
                        and pd.products_id = p2c.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p2c.categories_id = '" . (int)$current_category_id . "'";
        } else { // either retail or no need to get correct special prices
      $listing_sql = "select " . $select_column_list . " p.products_id, p.manufacturers_id, p.products_price, p.products_tax_class_id, IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price, IF(s.status, s.specials_new_products_price, p.products_price) as final_price
                      from (" . TABLE_PRODUCTS . " p
                      left join " . TABLE_SPECIALS_RETAIL_PRICES . " s using(products_id))
                      left join " . TABLE_MANUFACTURERS . " m on p.manufacturers_id = m.manufacturers_id,
                           " . TABLE_PRODUCTS_DESCRIPTION . " pd,
                           " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c
                      where p.products_status = '1'
                        and p.products_id = p2c.products_id
                        and pd.products_id = p2c.products_id
                        and pd.language_id = '" . (int)$languages_id . "'
                        and p2c.categories_id = '" . (int)$current_category_id . "'";
    } // end else { // either retail...
// Eversun mod for sppc and qty price breaks
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

    $content = CONTENT_INDEX_PRODUCTS;

  } else { // default page

    $content = CONTENT_PW;

  }

  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);

  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
