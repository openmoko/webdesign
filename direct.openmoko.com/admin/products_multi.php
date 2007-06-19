<?php
/*
  $Id: products_multi.php, v 2.0

  autor: sr, 2003-07-31 / sr@ibis-project.de

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();

$cat_stat=0; // internal use -- 0 = no / 1 = yes

  if($action) {
   $selected_cnt   = count($choose);
    switch($action) {
      case 'delete_product_confirm':
        for ($i = 0; $i < $selected_cnt; $i++) {
          $product_id = $choose[$i];
          $product_categories = $HTTP_POST_VARS['product_categories'];

          if($del_art=='complete') {
        tep_remove_product($product_id);
      } elseif($del_art=='this_cat') {
        tep_db_query("delete from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . $product_id . "' and categories_id = '" . $current_category_id . "'");
      }

          if (USE_CACHE == 'true') {
            tep_reset_cache_block('categories');
            tep_reset_cache_block('also_purchased');
          }
    } // for

        tep_redirect(tep_href_link(FILENAME_PRODUCTS_MULTI, 'cPath=' . $cPath));
        break;
      case 'move_product_confirm':
        for ($i = 0; $i < $selected_cnt; $i++) {
      $products_id = $choose[$i];
          $new_parent_id = tep_db_prepare_input($HTTP_POST_VARS['categories_id']);

          $duplicate_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . tep_db_input($products_id) . "' and categories_id = '" . tep_db_input($new_parent_id) . "'");
          $duplicate_check = tep_db_fetch_array($duplicate_check_query);
          if ($duplicate_check['total'] < 1) tep_db_query("update " . TABLE_PRODUCTS_TO_CATEGORIES . " set categories_id = '" . tep_db_input($new_parent_id) . "' where products_id = '" . tep_db_input($products_id) . "' and categories_id = '" . $current_category_id . "'");

          if (USE_CACHE == 'true') {
            tep_reset_cache_block('categories');
            tep_reset_cache_block('also_purchased');
          }
    } // for

        tep_redirect(tep_href_link(FILENAME_PRODUCTS_MULTI, 'cPath=' . $new_parent_id . '&pID=' . $products_id));
        break;
      case 'copy_to_confirm':
        for ($i = 0; $i < $selected_cnt; $i++) {
      $products_id = $choose[$i];
          $categories_id = tep_db_prepare_input($HTTP_POST_VARS['categories_id']);

            if ($HTTP_POST_VARS['categories_id'] != $current_category_id) {
              $check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . tep_db_input($products_id) . "' and categories_id = '" . tep_db_input($categories_id) . "'");
              $check = tep_db_fetch_array($check_query);
              if ($check['total'] < '1') {
                tep_db_query("insert into " . TABLE_PRODUCTS_TO_CATEGORIES . " (products_id, categories_id) values ('" . tep_db_input($products_id) . "', '" . tep_db_input($categories_id) . "')");
              }
            } else {
              $messageStack->add_session('search', ERROR_CANNOT_LINK_TO_SAME_CATEGORY, 'error');
            }

          if (USE_CACHE == 'true') {
            tep_reset_cache_block('categories');
            tep_reset_cache_block('also_purchased');
          }
    } // for

        tep_redirect(tep_href_link(FILENAME_PRODUCTS_MULTI, 'cPath=' . $categories_id . '&pID=' . $products_id));
        break;
    }
  }

// check if the catalog image directory exists
  if (is_dir(DIR_FS_CATALOG_IMAGES)) {
    if (!is_writeable(DIR_FS_CATALOG_IMAGES)) $messageStack->add('search', ERROR_CATALOG_IMAGE_DIRECTORY_NOT_WRITEABLE, 'error');
  } else {
    $messageStack->add('search', ERROR_CATALOG_IMAGE_DIRECTORY_DOES_NOT_EXIST, 'error');
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/general.js"></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<div id="spiffycalendar" class="text"></div>
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
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading">
      <?php
      echo HEADING_TITLE;
      //echo $action.count($choose).$categories_id.$current_category_id; // nur zu testzwecken - only for tests
      ?>
      </td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('spacer/pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td align="right"><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr><?php echo tep_draw_form('search', FILENAME_PRODUCTS_MULTI, '', 'get'); 
                if (isset($HTTP_GET_VARS[tep_session_name()])) {
                  echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
                }
              ?>
                <td class="smallText" align="right"><?php echo HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('search', $HTTP_GET_VARS['search']); ?></td>
              </form></tr>
              <tr><?php echo tep_draw_form('goto', FILENAME_PRODUCTS_MULTI, '', 'get'); 
                if (isset($HTTP_GET_VARS[tep_session_name()])) {
                  echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
                }
              ?>
                <td class="smallText" align="right"><?php echo HEADING_TITLE_GOTO . ' ' . tep_draw_pull_down_menu('cPath', tep_get_category_tree(), $current_category_id, 'onChange="this.form.submit();"'); ?></td>
              </form></tr>            
            </table></td>
          </tr>
        </table></td>
      </tr>
    <?php echo tep_draw_form('mainForm', FILENAME_PRODUCTS_MULTI . '?cPath=' . $cPath . '&cID=' . $cID, '', 'post'); ?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CATEGORIES_CHOOSE; ?></td>
        <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CATEGORIES_PRODUCTS; ?></td>
                <td class="dataTableHeadingContent" align="left"><?php echo TABLE_HEADING_PRODUCTS_MODEL; ?> / <?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
    $categories_count = 0;
    $rows = 0;
    if ($HTTP_GET_VARS['search']) {
      if($cat_stat==1) {
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id, c.sort_order, c.date_added, c.last_modified, c.categories_status from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' and cd.categories_name like '%" . $HTTP_GET_VARS['search'] . "%' order by c.sort_order, cd.categories_name");
    } else {
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id, c.sort_order, c.date_added, c.last_modified from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' and cd.categories_name like '%" . $HTTP_GET_VARS['search'] . "%' order by c.sort_order, cd.categories_name");
    }
    } else {
      if($cat_stat==1) {
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id, c.sort_order, c.date_added, c.last_modified, c.categories_status from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' order by c.sort_order, cd.categories_name");
    } else {
      $categories_query = tep_db_query("select c.categories_id, cd.categories_name, c.categories_image, c.parent_id, c.sort_order, c.date_added, c.last_modified from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $current_category_id . "' and c.categories_id = cd.categories_id and cd.language_id = '" . $languages_id . "' order by c.sort_order, cd.categories_name");
    }
    }
    while ($categories = tep_db_fetch_array($categories_query)) {
      $categories_count++;
      $rows++;

// Get parent_id for subcategories if search 
      if ($HTTP_GET_VARS['search']) $cPath= $categories['parent_id'];

      if ( ((!$HTTP_GET_VARS['cID']) && (!$HTTP_GET_VARS['pID']) || (@$HTTP_GET_VARS['cID'] == $categories['categories_id'])) && (!$cInfo) && (substr($HTTP_GET_VARS['action'], 0, 4) != 'new_') ) {
        $category_childs = array('childs_count' => tep_childs_in_category_count($categories['categories_id']));
        $category_products = array('products_count' => tep_products_in_category_count($categories['categories_id']));

        $cInfo_array = array_merge($categories, $category_childs, $category_products);
        $cInfo = new objectInfo($cInfo_array);
      }

      if ( (is_object($cInfo)) && ($categories['categories_id'] == $cInfo->categories_id) ) {
        echo '              <tr class="dataTableRowSelected" onmouseover="this.style.cursor=\'hand\'" onclick="document.location.href=\'' . tep_href_link(FILENAME_PRODUCTS_MULTI, tep_get_path($categories['categories_id'])) . '\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'hand\'" onmouseout="this.className=\'dataTableRow\'" onclick="document.location.href=\'' . tep_href_link(FILENAME_PRODUCTS_MULTI, 'cPath=' . $cPath . '&cID=' . $categories['categories_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"></td>
        <td class="dataTableContent"><?php echo '<a href="' . tep_href_link(FILENAME_PRODUCTS_MULTI, tep_get_path($categories['categories_id'])) . '">' . tep_image(DIR_WS_ICONS . 'folder.gif', ICON_FOLDER) . '</a>&nbsp;<b>' . $categories['categories_name'] . '</b>'; ?></td>
                <!-- <td class="dataTableContent" align="center">&nbsp;</td> -->
        <td class="dataTableContent" align="center">
<?php
    if($cat_stat==1) {
      if ($categories['categories_status'] == '1') {
          echo tep_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;' . tep_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', IMAGE_ICON_STATUS_RED_LIGHT, 10, 10);
        } else {
          echo tep_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', IMAGE_ICON_STATUS_GREEN_LIGHT, 10, 10) . '&nbsp;&nbsp;' . tep_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
        }
    }
?>
                &nbsp;</td>
        <td class="dataTableContent" align="right"><?php if ( (is_object($cInfo)) && ($categories['categories_id'] == $cInfo->categories_id) ) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_PRODUCTS_MULTI, 'cPath=' . $cPath . '&cID=' . $categories['categories_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }

    $products_count = 0;
    if ($HTTP_GET_VARS['search']) {
      $products_query = tep_db_query("select p.products_tax_class_id, p.products_id, pd.products_name, p.products_quantity, p.products_image, p.products_price, p.products_date_added, p.products_last_modified, p.products_date_available, p.products_status, p.products_model, p2c.categories_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' and p.products_id = p2c.products_id and pd.products_name like '%" . $HTTP_GET_VARS['search'] . "%' order by pd.products_name"); // original
    } else {
      $products_query = tep_db_query("select p.products_tax_class_id, p.products_id, pd.products_name, p.products_quantity, p.products_image, p.products_price, p.products_date_added, p.products_last_modified, p.products_date_available, p.products_status, p.products_model from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = pd.products_id and pd.language_id = '" . $languages_id . "' and p.products_id = p2c.products_id and p2c.categories_id = '" . $current_category_id . "' order by pd.products_name"); // original
    }
    while ($products = tep_db_fetch_array($products_query)) {
      $products_count++;
      $rows++;

// Get categories_id for product if search 
      if ($HTTP_GET_VARS['search']) $cPath=$products['categories_id'];

      if ( ((!$HTTP_GET_VARS['pID']) && (!$HTTP_GET_VARS['cID']) || (@$HTTP_GET_VARS['pID'] == $products['products_id'])) && (!$pInfo) && (!$cInfo) && (substr($HTTP_GET_VARS['action'], 0, 4) != 'new_') ) {
// find out the rating average from customer reviews
        $reviews_query = tep_db_query("select (avg(reviews_rating) / 5 * 100) as average_rating from " . TABLE_REVIEWS . " where products_id = '" . $products['products_id'] . "'");
        $reviews = tep_db_fetch_array($reviews_query);
        $pInfo_array = array_merge($products, $reviews);
        $pInfo = new objectInfo($pInfo_array);
      }

      if ( (is_object($pInfo)) && ($products['products_id'] == $pInfo->products_id) ) {
        echo '              <tr class="dataTableRowSelected" onmouseover="this.style.cursor=\'hand\'">' . "\n";
      } else {
        echo '              <tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'hand\'" onmouseout="this.className=\'dataTableRow\'">' . "\n";
      }
?>
                <td class="dataTableContent">
        <input type="checkbox" name="choose[]" value="<?php echo $products['products_id']; ?>" id="checkbox_choose_<?php echo $products_count; ?>" <?php if($checkall==1) { echo 'checked'; } ?>>
        </td>
        <td class="dataTableContent"><label for="checkbox_choose_<?php echo $products_count; ?>"><?php echo $products['products_name']; ?></label></td>
                <td class="dataTableContent" align="left"><table><tr><td align="left" class="dataTableContent" width="100">
<?php
      echo '&nbsp;'.$products['products_model'].'&nbsp;</td><td align="left" class="dataTableContent">';
    if ($products['products_status'] == '1') {
        echo tep_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;' . tep_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', IMAGE_ICON_STATUS_RED_LIGHT, 10, 10);
      } else {
        echo tep_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', IMAGE_ICON_STATUS_GREEN_LIGHT, 10, 10) . '&nbsp;&nbsp;' . tep_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
      }
?>
        </td></tr></table></td>
                <td class="dataTableContent" align="right"><?php if ( (is_object($pInfo)) && ($products['products_id'] == $pInfo->products_id) ) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_PRODUCTS_MULTI, 'cPath=' . $cPath . '&pID=' . $products['products_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    } // zu: while ($products = tep_db_fetch_array($products_query)) {

    if ($cPath_array) {
      $cPath_back = '';
      for($i=0;$i<sizeof($cPath_array)-1;$i++) {
        if ($cPath_back == '') {
          $cPath_back .= $cPath_array[$i];
        } else {
          $cPath_back .= '_' . $cPath_array[$i];
        }
      }
    }

    $cPath_back = ($cPath_back) ? 'cPath=' . $cPath_back : '';
?>
              <tr>
                <td colspan="4"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                          <tr> 
                            <td width="50%"> <img src="images/icons/arrow_checkall.gif" alt="" width="38" height="22" border="0"> 
                              <a href="products_multi.php?cPath=<?php echo $cPath; ?>&cID=<?php echo $cID; ?>&checkall=1"><?php echo TEXT_CHOOSE_ALL; ?></a> 
                              &nbsp;/&nbsp; <a href="products_multi.php?cPath=<?php echo $cPath; ?>&cID=<?php echo $cID; ?>"><?php echo TEXT_CHOOSE_ALL_REMOVE; ?></a> 
                            </td>
                            <td width="50%" align="right" class="smallText"> 
                              <?php
          if ($cPath) echo '<a href="' . tep_href_link(FILENAME_PRODUCTS_MULTI, $cPath_back . '&cID=' . $current_category_id) . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>&nbsp;';
          ?>
                              &nbsp;</td>
                          </tr>
                          <input type="hidden" name="cPath" value="<?php echo $cPath; ?>">
                          <input type="hidden" name="cID" value="<?php echo $cID; ?>">
                          <tr> 
                            <td width="50%" class="smallText">
<p>&nbsp;</p></td>
                            <td width="50%" align="right" class="smallText"></td>
                          </tr>
                          <tr> 
                            <td width="50%" class="smallText"><?php echo TEXT_CATEGORIES . '&nbsp;' . $categories_count . '<br>' . TEXT_PRODUCTS . '&nbsp;' . $products_count; ?></td>
                            <td width="50%" align="right" class="smallText"> 
                              <label for="move_product_confirm"><?php echo TEXT_MOVE_TO; ?></label>
                              <input type="radio" name="action" value="move_product_confirm" id="move_product_confirm"> 
                              <label for="copy_to_confirm"><?php echo IMAGE_COPY_TO; ?></label>
                              <input type="radio" name="action" value="copy_to_confirm" id="copy_to_confirm" checked> 
                              &nbsp;<?php echo tep_draw_pull_down_menu('categories_id', tep_get_category_tree(), $current_category_id); ?></td>
                          </tr>
                          <tr> 
                            <td width="50%" class="smallText"></td>
                            <td width="50%" align="right" class="smallText"> 
                              <label for="delete_product_confirm"><?php echo DEL_DELETE; ?></label>
                              <input type="radio" name="action" value="delete_product_confirm" id="delete_product_confirm"> 
                              &nbsp; <select name="del_art" title="<?php echo DEL_CHOOSE_DELETE_ART; ?>" id="del_art">
                                <option value="this_cat" selected><?php echo DEL_THIS_CAT; ?></option>
                                <option value="complete"><?php echo DEL_COMPLETE; ?></option>
                              </select> </td>
                          </tr>
                          <tr> 
                            <td width="50%" class="smallText"></td>
                            <td width="50%" align="right" class="smallText"> 
                              <input type="submit" name="go" value=" go! " title=" go! "> 
                              &nbsp;</td>
                          </tr>
                          <tr> 
                            <td class="dataTableContent" colspan="2"> <?php echo TEXT_ATTENTION_DANGER; ?> 
                            </td>
                          </tr>
                        </table></td>
              </tr>
            </table></td>
<?php
    $heading = array();
    $contents = array();
    switch ($HTTP_GET_VARS['action']) {
      default:
        if ($rows > 0) {
          if (is_object($cInfo)) { // category info box contents
            $heading[] = array('text' => '<b>' . $cInfo->categories_name . '</b>');

            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . tep_date_short($cInfo->date_added));
            if (tep_not_null($cInfo->last_modified)) $contents[] = array('text' => TEXT_LAST_MODIFIED . ' ' . tep_date_short($cInfo->last_modified));
            $contents[] = array('text' => '<br>' . tep_info_image($cInfo->categories_image, $cInfo->categories_name, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT) . '<br>' . $cInfo->categories_image);
            $contents[] = array('text' => '<br>' . TEXT_SUBCATEGORIES . ' ' . $cInfo->childs_count . '<br>' . TEXT_PRODUCTS . ' ' . $cInfo->products_count);
          } elseif (is_object($pInfo)) { // product info box contents
            $heading[] = array('text' => '<b>' . tep_get_products_name($pInfo->products_id, $languages_id) . '</b>');

            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . tep_date_short($pInfo->products_date_added));
            if (tep_not_null($pInfo->products_last_modified)) $contents[] = array('text' => TEXT_LAST_MODIFIED . ' ' . tep_date_short($pInfo->products_last_modified));
            if (date('Y-m-d') < $pInfo->products_date_available) $contents[] = array('text' => TEXT_DATE_AVAILABLE . ' ' . tep_date_short($pInfo->products_date_available));
            $contents[] = array('text' => '<br>' . tep_info_image($pInfo->products_image, $pInfo->products_name, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '<br>' . $pInfo->products_image);
      $contents[] = array('text' => '<br>' . TEXT_PRODUCTS_PRICE_INFO . ' ' . $currencies->format($pInfo->products_price) . '<br>' . TEXT_PRODUCTS_QUANTITY_INFO . ' ' . $pInfo->products_quantity);
            $contents[] = array('text' => '<br>' . TEXT_PRODUCTS_AVERAGE_RATING . ' ' . number_format($pInfo->average_rating, 2) . '%');
          }
        } else { // create category/product info
          $heading[] = array('text' => '<b>' . EMPTY_CATEGORY . '</b>');

          $contents[] = array('text' => sprintf(TEXT_NO_CHILD_CATEGORIES_OR_PRODUCTS, $parent_categories_name));
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
<?php
  //}
?>
    </table></td>
<!-- body_text_eof //-->
  </tr>

</table></form>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>