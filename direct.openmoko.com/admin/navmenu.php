<?php
/*
  $Id: categories.php,v 1.2 2004/03/29 00:18:17 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
//Added for Categories Description 1.5
  require('includes/functions/categories_description.php');
//End Categories Description 1.5


// define functions (move to seperate file)
  function tep_nm_childs_in_category_count($categories_id) {
    $categories_count = 0;

    $categories_query = tep_db_query("select nmc_id from " . TABLE_NAVMENU_CATEGORIES . " where nmc_parent_id = '" . (int)$categories_id . "'");
    while ($categories = tep_db_fetch_array($categories_query)) {
      $categories_count++;
      $categories_count += tep_nm_childs_in_category_count($categories['nmc_id']);
    }

    return $categories_count;
  }

  function tep_nm_links_in_category_count($categories_id) {
    $links_count = 0;

    $links_query = tep_db_query("select count(*) as total from " . TABLE_NAVMENU_LINKS . " l, " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " l2c where l.nml_id = l2c.nml_id and l.nml_status = '1' and l2c.nmc_id = '" . (int)$categories_id . "'");

    $links = tep_db_fetch_array($links_query);

    $links_count += $links['total'];

    $childs_query = tep_db_query("select nmc_id from " . TABLE_NAVMENU_CATEGORIES . " where nmc_parent_id = '" . (int)$categories_id . "'");
    if (tep_db_num_rows($childs_query)) {
      while ($childs = tep_db_fetch_array($childs_query)) {
        $links_count += tep_nm_links_in_category_count($childs['nmc_id']);
      }
    }

    return $links_count;
  }

  function tep_nm_get_path($current_category_id = '') {
    global $nPath_array;

    if ($current_category_id == '') {
      $nPath_new = implode('_', $nPath_array);
    } else {
      if (sizeof($nPath_array) == 0) {
        $nPath_new = $current_category_id;
      } else {
        $nPath_new = '';
        $last_category_query = tep_db_query("select nmc_parent_id from " . TABLE_NAVMENU_CATEGORIES . " where nmc_id = '" . (int)$nPath_array[(sizeof($nPath_array)-1)] . "'");
        $last_category = tep_db_fetch_array($last_category_query);

        $current_category_query = tep_db_query("select nmc_parent_id from " . TABLE_NAVMENU_CATEGORIES . " where nmc_id = '" . (int)$current_category_id . "'");
        $current_category = tep_db_fetch_array($current_category_query);

        if ($last_category['nmc_parent_id'] == $current_category['nmc_parent_id']) {
          for ($i = 0, $n = sizeof($nPath_array) - 1; $i < $n; $i++) {
            $nPath_new .= '_' . $nPath_array[$i];
          }
        } else {
          for ($i = 0, $n = sizeof($nPath_array); $i < $n; $i++) {
            $nPath_new .= '_' . $nPath_array[$i];
          }
        }

        $nPath_new .= '_' . $current_category_id;

        if (substr($nPath_new, 0, 1) == '_') {
          $nPath_new = substr($nPath_new, 1);
        }
      }
    }

    return 'nPath=' . $nPath_new;
  }

  function tep_nm_get_category_tree($parent_id = '0', $spacing = '', $exclude = '', $category_tree_array = '', $include_itself = false) {
    global $languages_id;

    if (!is_array($category_tree_array)) $category_tree_array = array();
    if ( (sizeof($category_tree_array) < 1) && ($exclude != '0') ) $category_tree_array[] = array('id' => '0', 'text' => TEXT_TOP);

    if ($include_itself) {
      $category_query = tep_db_query("select cd.nmc_name from " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " cd where cd.language_id = '" . (int)$languages_id . "' and cd.nmc_id = '" . (int)$parent_id . "'");
      $category = tep_db_fetch_array($category_query);
      $category_tree_array[] = array('id' => $parent_id, 'text' => $category['nmc_name']);
    }

    $categories_query = tep_db_query("select c.nmc_id, cd.nmc_name, c.nmc_parent_id from " . TABLE_NAVMENU_CATEGORIES . " c, " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " cd where c.nmc_id = cd.nmc_id and cd.language_id = '" . (int)$languages_id . "' and c.nmc_parent_id = '" . (int)$parent_id . "' order by c.nmc_sort_order, cd.nmc_name");
    while ($categories = tep_db_fetch_array($categories_query)) {
      if ($exclude != $categories['nmc_id']) $category_tree_array[] = array('id' => $categories['nmc_id'], 'text' => $spacing . $categories['nmc_name']);
      $category_tree_array = tep_nm_get_category_tree($categories['nmc_id'], $spacing . '&nbsp;&nbsp;&nbsp;', $exclude, $category_tree_array);
    }

    return $category_tree_array;
  }

  function tep_nm_get_category_name($category_id, $language_id) {
    $category_query = tep_db_query("select nmc_name from " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " where nmc_id = '" . (int)$category_id . "' and language_id = '" . (int)$language_id . "'");
    $category = tep_db_fetch_array($category_query);

    return $category['nmc_name'];
  }

  function tep_nm_get_link_name($link_id, $language_id = 0) {
    global $languages_id;

    if ($language_id == 0) $language_id = $languages_id;
    $link_query = tep_db_query("select nml_name from " . TABLE_NAVMENU_LINKS_DESCRIPTION . " where nml_id = '" . (int)$link_id . "' and language_id = '" . (int)$language_id . "'");
    $link = tep_db_fetch_array($link_query);

    return $link['nml_name'];
  }

  function tep_nm_draw_products_pull_down($name, $parameters = '', $exclude = '') {
    global $languages_id;

    if ($exclude == '') {
      $exclude = array();
    }

    $select_string = '<select name="' . $name . '"';

    if ($parameters) {
      $select_string .= ' ' . $parameters;
    }

    $select_string .= '>';

    $products_query = tep_db_query("select p.products_id, pd.products_name, p.products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by products_name");
    while ($products = tep_db_fetch_array($products_query)) {
      if (!in_array($products['products_id'], $exclude)) {
        $select_string .= '<option value="' . $products['products_id'] . '">' . $products['products_name'] . '</option>';
      }
    }

    $select_string .= '</select>';

    return $select_string;
  }

  function tep_nm_draw_links_pull_down($name, $parameters = '', $exclude = '') {
    global $currencies, $languages_id;

    if ($exclude == '') {
      $exclude = array();
    }

    $select_string = '<select name="' . $name . '"';

    if ($parameters) {
      $select_string .= ' ' . $parameters;
    }

    $select_string .= '>';

    $products_query = tep_db_query("select p.products_id, pd.products_name, p.products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by products_name");
    while ($products = tep_db_fetch_array($products_query)) {
      if (!in_array($products['products_id'], $exclude)) {
        $select_string .= '<option value="' . $products['products_id'] . '">' . $products['products_name'] . ' (' . $currencies->format($products['products_price']) . ')</option>';
      }
    }

    $select_string .= '</select>';

    return $select_string;
  }

  function tep_nm_remove_category($category_id) {
    tep_db_query("delete from " . TABLE_NAVMENU_CATEGORIES . " where nmc_id = '" . (int)$category_id . "'");
    tep_db_query("delete from " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " where nmc_id = '" . (int)$category_id . "'");
    tep_db_query("delete from " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " where nmc_id = '" . (int)$category_id . "'");
  }

  function tep_nm_remove_link($link_id) {
    tep_db_query("delete from " . TABLE_NAVMENU_LINKS . " where nml_id = '" . (int)$link_id . "'");
    tep_db_query("delete from " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " where nml_id = '" . (int)$link_id . "'");
    tep_db_query("delete from " . TABLE_NAVMENU_LINKS_DESCRIPTION . " where nml_id = '" . (int)$link_id . "'");
  }

  $languages = tep_get_languages();

  // category path
  $nPath = '';
  if (isset($HTTP_POST_VARS['nPath']) && tep_not_null($HTTP_POST_VARS['nPath'])) {
    $nPath = tep_db_prepare_input($HTTP_POST_VARS['nPath']);
  } elseif (isset($HTTP_GET_VARS['nPath']) && tep_not_null($HTTP_GET_VARS['nPath'])) {
    $nPath = tep_db_prepare_input($HTTP_GET_VARS['nPath']);
  }

  if (tep_not_null($nPath)) {
    $nPath_array = tep_parse_category_path($nPath);
    $nPath = implode('_', $nPath_array);
    $current_category_id = $nPath_array[(sizeof($nPath_array)-1)];
  } else {
    $current_category_id = 0;
  }

  // clean variables
  $cID = '';
  if (isset($HTTP_POST_VARS['cID']) && tep_not_null($HTTP_POST_VARS['cID'])) {
    $cID = (int)$HTTP_POST_VARS['cID'];
  } elseif (isset($HTTP_GET_VARS['cID']) && tep_not_null($HTTP_GET_VARS['cID'])) {
    $cID = (int)$HTTP_GET_VARS['cID'];
  }

  $lID = '';
  if (isset($HTTP_POST_VARS['lID']) && tep_not_null($HTTP_POST_VARS['lID'])) {
    $lID = (int)$HTTP_POST_VARS['lID'];
  } elseif (isset($HTTP_GET_VARS['lID']) && tep_not_null($HTTP_GET_VARS['lID'])) {
    $lID = (int)$HTTP_GET_VARS['lID'];
  }

  $action = '';
  if (isset($HTTP_POST_VARS['action']) && tep_not_null($HTTP_POST_VARS['action'])) {
    $action = tep_db_prepare_input($HTTP_POST_VARS['action']);
  } elseif (isset($HTTP_GET_VARS['action']) && tep_not_null($HTTP_GET_VARS['action'])) {
    $action = tep_db_prepare_input($HTTP_GET_VARS['action']);
  } 

  $languages = tep_get_languages();

  if (tep_not_null($action)) {
    switch ($action) {
    case 'new_category':

      break;
    case 'edit_category':
      $categories_query = tep_db_query("select c.nmc_id, cd.nmc_name, c.nmc_parent_id, c.nmc_sort_order, c.nmc_date_added from " . TABLE_NAVMENU_CATEGORIES . " c, " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " cd where c.nmc_id = '" . $cID . "' and c.nmc_id = cd.nmc_id and cd.language_id = '" . $languages_id . "'");
      $category = tep_db_fetch_array($categories_query);

      $cInfo = new objectInfo($category);

      break;
    case 'insert_category':
    case 'update_category':
      $nmc_name_array = tep_db_prepare_input($HTTP_POST_VARS['nmc_name']);
      $nmc_sort_order = tep_not_null($HTTP_POST_VARS['nmc_sort_order']) ? (int)$HTTP_POST_VARS['nmc_sort_order'] : '0';

      $sql_data_array = array('nmc_parent_id' => $current_category_id, 
            'nmc_sort_order' => $nmc_sort_order
            );

      if ($action == 'insert_category') {
  $sql_data_array['nmc_date_added'] = 'now()';

  tep_db_perform(TABLE_NAVMENU_CATEGORIES, $sql_data_array);
  $nmc_id = tep_db_insert_id();
      } else {
  $nmc_id = (int)$HTTP_POST_VARS['nmc_id'];

  tep_db_perform(TABLE_NAVMENU_CATEGORIES, $sql_data_array, 'update', "nmc_id = '" . $nmc_id . "'");
      }

      $sql_data_array = array();
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
  $language_id = (int)$languages[$i]['id'];

  if ($action == 'insert_category') {
    $sql_data_array = array('nmc_id' => (int)$nmc_id, 
          'language_id' => $language_id, 
          'nmc_name' => tep_db_prepare_input($nmc_name_array[$language_id])
          );

    tep_db_perform(TABLE_NAVMENU_CATEGORIES_DESCRIPTION, $sql_data_array);
  } else {
    $sql_data_array['nmc_name'] = tep_db_prepare_input($nmc_name_array[$language_id]);

    tep_db_perform(TABLE_NAVMENU_CATEGORIES_DESCRIPTION, $sql_data_array, 'update', "nmc_id = '" . (int)$nmc_id . "' and language_id = '" . (int)$language_id . "'");
  }
      }

      tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . (int)$nmc_id));

      break;
    case 'delete_category_confirm':
      $nmc_id = (int)$HTTP_POST_VARS['nmc_id'];

      if (isset($nmc_id)) {
  $categories = tep_nm_get_category_tree($nmc_id, '', '0', '', true);
  $links = array();
  $links_delete = array();

  for ($i = 0, $n = sizeof($categories); $i < $n; $i++) {
    $link_ids_query = tep_db_query("select nml_id from " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " where nmc_id = '" . (int)$categories[$i]['id'] . "'");

    while ($link_ids = tep_db_fetch_array($link_ids_query)) {
      $links[$link_ids['nml_id']]['categories'][] = $categories[$i]['id'];
    }
  }

  reset($links);
  while (list($key, $value) = each($links)) {
    $category_ids = '';

    for ($i=0, $n=sizeof($value['categories']); $i<$n; $i++) {
      $category_ids .= "'" . (int)$value['categories'][$i] . "', ";
    }
    $category_ids = substr($category_ids, 0, -2);

    $check_query = tep_db_query("select count(*) as total from " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " where nml_id = '" . (int)$key . "' and nmc_id not in (" . $category_ids . ")");
    $check = tep_db_fetch_array($check_query);
    if ($check['total'] < '1') {
      $links_delete[$key] = $key;
    }
  }

  // removing categories can be a lengthy process
  tep_set_time_limit(0);
  for ($i = 0, $n = sizeof($categories); $i < $n; $i++) {
    tep_nm_remove_category($categories[$i]['id']);
  }

  reset($links_delete);
  while (list($key) = each($links_delete)) {
    tep_nm_remove_link($key);
  }
      }

      tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath));
      break;
    case 'new_link':

      break;
    case 'edit_link':
      $links_query = tep_db_query("select l.nml_id, ld.nml_name, l.nml_url, l.nml_status, l.nml_sort_order, l.nml_date_added from " . TABLE_NAVMENU_LINKS . " l, " . TABLE_NAVMENU_LINKS_DESCRIPTION . " ld where l.nml_id = '" . $lID . "' and l.nml_id = ld.nml_id and ld.language_id = '" . $languages_id . "'");
      $links = tep_db_fetch_array($links_query);

      $lInfo = new objectInfo($links);

      break;
    case 'insert_link':
    case 'update_link':
      $nml_name_array = tep_db_prepare_input($HTTP_POST_VARS['nml_name']);
      $nml_url = tep_db_prepare_input($HTTP_POST_VARS['nml_url']);
      $nml_status = ($HTTP_POST_VARS['nml_status'] == 'on') ? '1' : '0';
      $nml_sort_order = tep_not_null($HTTP_POST_VARS['nml_sort_order']) ? (int)$HTTP_POST_VARS['nml_sort_order'] : '0';

      $sql_data_array = array('nml_url' => $nml_url, 
            'nml_status' => $nml_status, 
            'nml_sort_order' => $nml_sort_order
            );

      if ($action == 'insert_link') {
  $sql_data_array['nml_date_added'] = 'now()';

  tep_db_perform(TABLE_NAVMENU_LINKS, $sql_data_array);
  $nml_id = tep_db_insert_id();

  // update categories to links table
  $sql_data_array = array('nml_id' => $nml_id,  
        'nmc_id' => (int)$current_category_id
        );

  tep_db_perform(TABLE_NAVMENU_LINKS_TO_CATEGORIES, $sql_data_array);
      } else {
  $nml_id = (int)$HTTP_POST_VARS['nml_id'];

  tep_db_perform(TABLE_NAVMENU_LINKS, $sql_data_array, 'update', "nml_id = '" . $nml_id . "'");
      }

      $sql_data_array = array();
      for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
  $language_id = (int)$languages[$i]['id'];

  if ($action == 'insert_link') {
    $sql_data_array = array('nml_id' => (int)$nml_id, 
          'language_id' => $language_id, 
          'nml_name' => tep_db_prepare_input($nml_name_array[$language_id])
          );

    tep_db_perform(TABLE_NAVMENU_LINKS_DESCRIPTION, $sql_data_array);
  } else {
    $sql_data_array['nml_name'] = tep_db_prepare_input($nml_name_array[$language_id]);

    tep_db_perform(TABLE_NAVMENU_LINKS_DESCRIPTION, $sql_data_array, 'update', "nml_id = '" . (int)$nml_id . "' and language_id = '" . (int)$language_id . "'");
  }
      }

      tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . (int)$current_category_id . '&lID=' . (int)$nml_id));

      break;
    case 'link_setflag':
      $flag = (int)$HTTP_GET_VARS['flag'];

      if (($flag == '0') || ($flag == '1')) {
  if (isset($lID)) {
    tep_db_query("update " . TABLE_NAVMENU_LINKS . " set nml_status = '" . $flag . "' where nml_id = '" . (int)$lID . "'");
  }
      }

      tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . (int)$current_category_id . '&lID=' . (int)$lID));

      break;
    case 'delete_link_confirm':
      $nml_id = (int)$HTTP_POST_VARS['nml_id'];

      if (isset($nml_id)) {
  tep_nm_remove_link($nml_id);
      }

      tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath));

      break;

      /*
      case 'move_category_confirm':
        if (isset($HTTP_POST_VARS['nmc_id']) && ($HTTP_POST_VARS['nmc_id'] != $HTTP_POST_VARS['move_to_category_id'])) {
          $nmc_id = tep_db_prepare_input($HTTP_POST_VARS['nmc_id']);
          $new_parent_id = tep_db_prepare_input($HTTP_POST_VARS['move_to_category_id']);

          $path = explode('_', tep_get_generated_category_path_ids($new_parent_id));

          if (in_array($nmc_id, $path)) {
            $messageStack->add_session('search', ERROR_CANNOT_MOVE_CATEGORY_TO_PARENT, 'error');

            tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $nmc_id));
          } else {
            tep_db_query("update " . TABLE_NAVMENU_CATEGORIES . " set parent_id = '" . (int)$new_parent_id . "', last_modified = now() where nmc_id = '" . (int)$nmc_id . "'");

            if (USE_CACHE == 'true') {
              tep_reset_cache_block('categories');
              tep_reset_cache_block('also_purchased');
            }

            tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $new_parent_id . '&cID=' . $nmc_id));
          }
        }

        break;
      case 'move_product_confirm':
        $nml_id = tep_db_prepare_input($HTTP_POST_VARS['nml_id']);
        $new_parent_id = tep_db_prepare_input($HTTP_POST_VARS['move_to_category_id']);

        $duplicate_check_query = tep_db_query("select count(*) as total from " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " where nml_id = '" . (int)$nml_id . "' and nmc_id = '" . (int)$new_parent_id . "'");
        $duplicate_check = tep_db_fetch_array($duplicate_check_query);
        if ($duplicate_check['total'] < 1) tep_db_query("update " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " set nmc_id = '" . (int)$new_parent_id . "' where nml_id = '" . (int)$nml_id . "' and nmc_id = '" . (int)$current_category_id . "'");

        if (USE_CACHE == 'true') {
          tep_reset_cache_block('categories');
          tep_reset_cache_block('also_purchased');
        }

        tep_redirect(tep_href_link(FILENAME_NAVMENU, 'nPath=' . $new_parent_id . '&nID=' . $nml_id));
        break;
*/
    }
  }
?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
</head>

<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
  <!-- body_text //-->
       <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
<?php   
if ($action == 'new_category') {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo TEXT_HEADING_NEW_CATEGORY; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo tep_draw_form('newcategory', FILENAME_NAVMENU, 'nPath=' . $nPath . '&action=insert_category', 'post'); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_CATEGORIES_NAME; ?></td>
            <td class="main"><?php echo tep_image(HTTP_SERVER . DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . tep_draw_input_field('nmc_name[' . $languages[$i]['id'] . ']'); ?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_SORT_ORDER; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('nmc_sort_order', '', 'size="2"'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo tep_image_submit('button_save.gif', IMAGE_SAVE) . '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </form></tr>
<?php
} elseif ($action == 'edit_category') {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo TEXT_HEADING_EDIT_CATEGORY; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo tep_draw_form('editcategory', FILENAME_NAVMENU, 'nPath=' . $nPath . '&action=update_category', 'post') . tep_draw_hidden_field('nmc_id', $cInfo->nmc_id); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_CATEGORIES_NAME; ?></td>
            <td class="main"><?php echo tep_image(HTTP_SERVER . DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . tep_draw_input_field('nmc_name[' . $languages[$i]['id'] . ']', tep_nm_get_category_name($cInfo->nmc_id, $languages[$i]['id'])); ?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_SORT_ORDER; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('nmc_sort_order', $cInfo->nmc_sort_order, 'size="2"'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo tep_image_submit('button_save.gif', IMAGE_SAVE) . '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </form></tr>
<?php
} elseif ($action == 'new_link') {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo TEXT_HEADING_NEW_LINK; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo tep_draw_form('newlink', FILENAME_NAVMENU, 'nPath=' . $nPath . '&action=insert_link', 'post'); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_LINK_NAME; ?></td>
            <td class="main"><?php echo tep_image(HTTP_SERVER . DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . tep_draw_input_field('nml_name[' . $languages[$i]['id'] . ']'); ?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_LINK_PAGE; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_nm_draw_products_pull_down('nml_url'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_STATUS; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_checkbox_field('nml_status', '', true); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_SORT_ORDER; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('nml_sort_order', '', 'size="2"'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo tep_image_submit('button_save.gif', IMAGE_SAVE) . '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </form></tr>
<?php
} elseif ($action == 'edit_link') {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo TEXT_HEADING_EDIT_LINK; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr><?php echo tep_draw_form('editlink', FILENAME_NAVMENU, 'nPath=' . $nPath . '&action=update_link', 'post') . tep_draw_hidden_field('nml_id', $lInfo->nml_id); ?>
        <td><table border="0" cellspacing="0" cellpadding="2">
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><?php if ($i == 0) echo TEXT_LINK_NAME; ?></td>
            <td class="main"><?php echo tep_image(HTTP_SERVER . DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name']) . '&nbsp;' . tep_draw_input_field('nml_name[' . $languages[$i]['id'] . ']', tep_nm_get_link_name($lInfo->nml_id, $languages[$i]['id'])); ?></td>
          </tr>
<?php
    }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_LINK_PAGE; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_nm_draw_products_pull_down('nml_url'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_STATUS; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_checkbox_field('nml_status', $lInfo->nml_status, true); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo TEXT_SORT_ORDER; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('nml_sort_order', $lInfo->nml_sort_order, 'size="2"'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td class="main" align="right"><?php echo tep_image_submit('button_save.gif', IMAGE_SAVE) . '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </form></tr>
<?php
  } else {
?>
    <table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                <td class="smallText" align="right">
<?php
    echo tep_draw_form('search', FILENAME_NAVMENU, '', 'get');
    echo HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('search');
    echo '</form>';
?>
                </td>
              </tr>
              <tr>
                <td class="smallText" align="right">
<?php
    echo tep_draw_form('goto', FILENAME_NAVMENU, '', 'get');
    echo HEADING_TITLE_GOTO . ' ' . tep_draw_pull_down_menu('nPath', tep_nm_get_category_tree(), $current_category_id, 'onChange="this.form.submit();"');
    echo '</form>';
?>
                </td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CATEGORIES_LINKS; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
    $categories_count = 0;
    $rows = 0;
    if (isset($HTTP_GET_VARS['search'])) {
      $search = tep_db_prepare_input($HTTP_GET_VARS['search']);

      $categories_query = tep_db_query("select c.nmc_id, cd.nmc_name, c.nmc_parent_id, c.nmc_sort_order, c.nmc_date_added from " . TABLE_NAVMENU_CATEGORIES . " c, " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " cd where c.nmc_id = cd.nmc_id and cd.language_id = '" . (int)$languages_id . "' and cd.nmc_name like '%" . tep_db_input($search) . "%' order by c.nmc_sort_order, cd.nmc_name");
    } else {
      $categories_query = tep_db_query("select c.nmc_id, cd.nmc_name, c.nmc_parent_id, c.nmc_sort_order, c.nmc_date_added from " . TABLE_NAVMENU_CATEGORIES . " c, " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " cd where c.nmc_parent_id = '" . (int)$current_category_id . "' and c.nmc_id = cd.nmc_id and cd.language_id = '" . (int)$languages_id . "' order by c.nmc_sort_order, cd.nmc_name");
    }

    while ($categories = tep_db_fetch_array($categories_query)) {
      $categories_count++;
      $rows++;

      // Get parent_id for subcategories if search
      if (isset($search)) $nPath= $categories['nmc_parent_id'];

      if ((!tep_not_null($cID) && !tep_not_null($lID) || (tep_not_null($cID) && ($cID == $categories['nmc_id']))) && !isset($cInfo) && (substr($action, 0, 3) != 'new')) {
        $category_childs = array('childs_count' => tep_nm_childs_in_category_count($categories['nmc_id']));
        $category_links = array('links_count' => tep_nm_links_in_category_count($categories['nmc_id']));

        $cInfo_array = array_merge($categories, $category_childs, $category_links);
        $cInfo = new objectInfo($cInfo_array);
      }

      if (isset($cInfo) && is_object($cInfo) && ($categories['nmc_id'] == $cInfo->nmc_id) ) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_NAVMENU, tep_nm_get_path($categories['nmc_id'])) . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $categories['nmc_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo '<a href="' . tep_href_link(FILENAME_NAVMENU, tep_nm_get_path($categories['nmc_id'])) . '">' . tep_image(DIR_WS_ICONS . 'folder.gif', ICON_FOLDER) . '</a>&nbsp;<b>' . $categories['nmc_name'] . '</b>'; ?></td>
                <td class="dataTableContent" align="center">&nbsp;</td>
                <td class="dataTableContent" align="right"><?php if (isset($cInfo) && is_object($cInfo) && ($categories['nmc_id'] == $cInfo->nmc_id) ) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $categories['nmc_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }

    $links_count = 0;
    if (isset($HTTP_GET_VARS['search'])) {
      $links_query = tep_db_query("select l.nml_id, l.nml_url, ld.nml_name, l.nml_date_added, l.nml_status, l.nml_sort_order from " . TABLE_NAVMENU_LINKS . " l, " . TABLE_NAVMENU_LINKS_DESCRIPTION . " ld, " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " l2c where l.nml_id = ld.nml_id and ld.language_id = '" . (int)$languages_id . "' and l.nml_id = l2c.nml_id and ld.nml_name like '%" . tep_db_input($search) . "%' order by l.nml_sort_order, ld.nml_name");
    } else {
      $links_query = tep_db_query("select l.nml_id, l.nml_url, ld.nml_name, l.nml_date_added, l.nml_status, l.nml_sort_order from " . TABLE_NAVMENU_LINKS . " l, " . TABLE_NAVMENU_LINKS_DESCRIPTION . " ld, " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " l2c where l2c.nmc_id = '" . (int)$current_category_id . "' and l.nml_id = l2c.nml_id and l.nml_id = ld.nml_id and ld.language_id = '" . (int)$languages_id . "' order by l.nml_sort_order, ld.nml_name");
    }

    while ($links = tep_db_fetch_array($links_query)) {
      $links_count++;
      $rows++;

      // Get nmc_id for link if search
      if (isset($HTTP_GET_VARS['search'])) $nPath = $links['nml_id'];

      if ((!tep_not_null($cID) && !tep_not_null($lID) || (tep_not_null($lID) && ($lID == $links['nml_id']))) && !isset($lInfo) && !isset($cInfo) && (substr($action, 0, 3) != 'new')) {
        $lInfo = new objectInfo($links);
      }

      if (isset($lInfo) && is_object($lInfo) && ($links['nml_id'] == $lInfo->nml_id)) {
        echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $links['nml_id'] . '&action=edit_link') . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $links['nml_id']) . '\'">' . "\n";
      }

?>
                <td class="dataTableContent"><?php echo '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&nID=' . $links['nml_id']) . '">' . tep_image(DIR_WS_ICONS . 'preview.gif', ICON_PREVIEW) . '</a>&nbsp;' . $links['nml_name']; ?></td>
                <td class="dataTableContent" align="center">
<?php
      if ($links['nml_status'] == '1') {
        echo tep_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_NAVMENU, 'action=link_setflag&flag=0&lID=' . $links['nml_id'] . '&nPath=' . $nPath) . '">' . tep_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', IMAGE_ICON_STATUS_RED_LIGHT, 10, 10) . '</a>';
      } else {
        echo '<a href="' . tep_href_link(FILENAME_NAVMENU, 'action=link_setflag&flag=1&lID=' . $links['nml_id'] . '&nPath=' . $nPath) . '">' . tep_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', IMAGE_ICON_STATUS_GREEN_LIGHT, 10, 10) . '</a>&nbsp;&nbsp;' . tep_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
      }
?></td>
                <td class="dataTableContent" align="right"><?php if (isset($lInfo) && is_object($lInfo) && ($links['nml_id'] == $lInfo->nml_id)) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $links['nml_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }

    $nPath_back = '';
    if (sizeof($nPath_array) > 0) {
      for ($i=0, $n=sizeof($nPath_array)-1; $i<$n; $i++) {
        if (empty($nPath_back)) {
          $nPath_back .= $nPath_array[$i];
        } else {
          $nPath_back .= '_' . $nPath_array[$i];
        }
      }
    }

    $nPath_back = (tep_not_null($nPath_back)) ? 'nPath=' . $nPath_back . '&' : '';
?>
              <tr>
                <td colspan="3"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="smallText"><?php echo TEXT_CATEGORIES . '&nbsp;' . $categories_count . '<br>' . TEXT_LINKS . '&nbsp;' . $links_count; ?></td>
                    <td align="right" class="smallText"><?php if (sizeof($nPath_array) > 0) echo '<a href="' . tep_href_link(FILENAME_NAVMENU, $nPath_back . 'cID=' . $current_category_id) . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>&nbsp;'; if (!isset($HTTP_GET_VARS['search'])) echo '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&action=new_category') . '">' . tep_image_button('button_new_category.gif', IMAGE_NEW_CATEGORY) . '</a>&nbsp;<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&action=new_link') . '">' . tep_image_button('button_new_link.gif', IMAGE_NEW_LINK) . '</a>'; ?>&nbsp;</td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
    $heading = array();
    $contents = array();
    switch ($action) {
      case 'delete_category':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_CATEGORY . '</b>');

        $contents = array('form' => tep_draw_form('categories', FILENAME_NAVMENU, 'action=delete_category_confirm&nPath=' . $nPath) . tep_draw_hidden_field('nmc_id', $cInfo->nmc_id));
        $contents[] = array('text' => TEXT_DELETE_CATEGORY_INTRO);
        $contents[] = array('text' => '<br><b>' . $cInfo->nmc_name . '</b>');
        if ($cInfo->childs_count > 0) $contents[] = array('text' => '<br>' . sprintf(TEXT_DELETE_WARNING_CHILDS, $cInfo->childs_count));
        if ($cInfo->links_count > 0) $contents[] = array('text' => '<br>' . sprintf(TEXT_DELETE_WARNING_LINKS, $cInfo->links_count));
        $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
  /*
      case 'move_category':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_MOVE_CATEGORY . '</b>');

        $contents = array('form' => tep_draw_form('categories', FILENAME_NAVMENU, 'action=move_category_confirm&nPath=' . $nPath) . tep_draw_hidden_field('nmc_id', $cInfo->nmc_id));
        $contents[] = array('text' => sprintf(TEXT_MOVE_CATEGORIES_INTRO, $cInfo->categories_name));
        $contents[] = array('text' => '<br>' . sprintf(TEXT_MOVE, $cInfo->categories_name) . '<br>' . tep_draw_pull_down_menu('move_to_category_id', tep_get_category_tree(), $current_category_id));
        $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_move.gif', IMAGE_MOVE) . ' <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
  */
      case 'delete_link':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_LINK . '</b>');

        $contents = array('form' => tep_draw_form('links', FILENAME_NAVMENU, 'action=delete_link_confirm&nPath=' . $nPath) . tep_draw_hidden_field('nml_id', $lInfo->nml_id));
        $contents[] = array('text' => TEXT_DELETE_LINK_INTRO);
        $contents[] = array('text' => '<br><b>' . $lInfo->nml_name . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&nID=' . $lInfo->nml_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
  /*
      case 'move_product':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_MOVE_PRODUCT . '</b>');

        $contents = array('form' => tep_draw_form('links', FILENAME_NAVMENU, 'action=move_product_confirm&nPath=' . $nPath) . tep_draw_hidden_field('nml_id', $lInfo->nml_id));
        $contents[] = array('text' => sprintf(TEXT_MOVE_LINKS_INTRO, $lInfo->links_name));
        $contents[] = array('text' => '<br>' . TEXT_INFO_CURRENT_CATEGORIES . '<br><b>' . tep_output_generated_category_path($lInfo->nml_id, 'product') . '</b>');
        $contents[] = array('text' => '<br>' . sprintf(TEXT_MOVE, $lInfo->links_name) . '<br>' . tep_draw_pull_down_menu('move_to_category_id', tep_get_category_tree(), $current_category_id));
        $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_move.gif', IMAGE_MOVE) . ' <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&nID=' . $lInfo->nml_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
      case 'copy_to':
        $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_COPY_TO . '</b>');

        $contents = array('form' => tep_draw_form('copy_to', FILENAME_NAVMENU, 'action=copy_to_confirm&nPath=' . $nPath) . tep_draw_hidden_field('nml_id', $lInfo->nml_id));
        $contents[] = array('text' => TEXT_INFO_COPY_TO_INTRO);
        $contents[] = array('text' => '<br>' . TEXT_INFO_CURRENT_CATEGORIES . '<br><b>' . tep_output_generated_category_path($lInfo->nml_id, 'product') . '</b>');
        $contents[] = array('text' => '<br>' . TEXT_CATEGORIES . '<br>' . tep_draw_pull_down_menu('nmc_id', tep_get_category_tree(), $current_category_id));
        $contents[] = array('text' => '<br>' . TEXT_HOW_TO_COPY . '<br>' . tep_draw_radio_field('copy_as', 'link', true) . ' ' . TEXT_COPY_AS_LINK . '<br>' . tep_draw_radio_field('copy_as', 'duplicate') . ' ' . TEXT_COPY_AS_DUPLICATE);

        $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_copy.gif', IMAGE_COPY) . ' <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&nID=' . $lInfo->nml_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
        break;
  */
      default:
        if ($rows > 0) {
          if (isset($cInfo) && is_object($cInfo)) { // category info box contents
            $heading[] = array('text' => '<b>' . $cInfo->nmc_name . '</b>');

            //$contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id . '&action=edit_category') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id . '&action=delete_category') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a> <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id . '&action=move_category') . '">' . tep_image_button('button_move.gif', IMAGE_MOVE) . '</a>');
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id . '&action=edit_category') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&cID=' . $cInfo->nmc_id . '&action=delete_category') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a>');
            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . tep_date_short($cInfo->nmc_date_added));

            $contents[] = array('text' => '<br>' . TEXT_SUBCATEGORIES . ' ' . $cInfo->childs_count . '<br>' . TEXT_LINKS . ' ' . $cInfo->links_count);
          } elseif (isset($lInfo) && is_object($lInfo)) { // product info box contents
            $heading[] = array('text' => '<b>' . tep_nm_get_link_name($lInfo->nml_id, $languages_id) . '</b>');

            //$contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $lInfo->nml_id . '&action=edit_link') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $lInfo->nml_id . '&action=delete_link') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a> <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&nID=' . $lInfo->nml_id . '&action=move_product') . '">' . tep_image_button('button_move.gif', IMAGE_MOVE) . '</a> <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $lInfo->nml_id . '&action=copy_to') . '">' . tep_image_button('button_copy_to.gif', IMAGE_COPY_TO) . '</a>'); 
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $lInfo->nml_id . '&action=edit_link') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_NAVMENU, 'nPath=' . $nPath . '&lID=' . $lInfo->nml_id . '&action=delete_link') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a>'); 

            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . tep_date_short($lInfo->nml_date_added));
          }
        } else { 
          $heading[] = array('text' => '<b>' . EMPTY_CATEGORY . '</b>');

          $contents[] = array('text' => TEXT_NO_CHILD_CATEGORIES_OR_LINKS);
        }
        break;
    }

    if ( (tep_not_null($heading)) && (tep_not_null($contents)) ) {
      echo '            <td width="25%" valign="top">' . "\n";

      $box = new box;
      echo $box->infoBox($heading, $contents);

      echo '            </td>' . "\n";
    }
?>
          </tr>
        </table></td>
      </tr>
    </table>
<?php
  }
?>
    </td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
