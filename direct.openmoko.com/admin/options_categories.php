<?php

  require('includes/application_top.php');

  $action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');
  
  if (tep_not_null($action)) {
    switch ($action) {
      // These are the actions that some activity must occur on before presenting the next page
      case 'save_category':
        $sort_order = tep_db_prepare_input($HTTP_POST_VARS['new_category_sort_order']);
        $category_name = tep_db_prepare_input($HTTP_POST_VARS['new_category_name']);
        $category_description = tep_db_prepare_input($HTTP_POST_VARS['new_category_description']);
        $sql_data_array['options_categories_sort_order'] = $sort_order;
        $sql_data_array['options_categories_name'] = $category_name;
        $sql_data_array['options_categories_description'] = $category_description;
        $sql_data_array['options_categories_date_added'] = 'now()';
        $sql_data_array['options_categories_last_modified'] = 'now()';
        tep_db_perform('options_categories', $sql_data_array);
        $HTTP_GET_VARS['ocID'] = tep_db_insert_id();
        $action = '';
        break;
        
      case 'update_category':
        $sort_order = tep_db_prepare_input($HTTP_POST_VARS['edit_category_sort_order']);
        $category_name = tep_db_prepare_input($HTTP_POST_VARS['edit_category_name']);
        $category_description = tep_db_prepare_input($HTTP_POST_VARS['edit_category_description']);
        $sql_data_array['options_categories_sort_order'] = $sort_order;
        $sql_data_array['options_categories_name'] = $category_name;
        $sql_data_array['options_categories_description'] = $category_description;
        $sql_data_array['options_categories_last_modified'] = 'now()';
        tep_db_perform('TABLE_OPTION_CATEGORIES', $sql_data_array, 'update', "options_categories_id = '" . (int)$HTTP_POST_VARS['oc_edit_id'] . "'");
        $HTTP_GET_VARS['ocID'] = $HTTP_POST_VARS['oc_edit_id'];
        $action = '';
        break;
        
      case 'confirm_category_delete':
        $oc_delete_id = $HTTP_POST_VARS['oc_delete_id'];
        $options_query = tep_db_query('select options_id from options where options_categories_id =\'' . (int)$oc_delete_id . '\' ');
        while ($o = tep_db_fetch_array($options_query)) {
          tep_db_query("delete from options_values where options_id = '" . $o['options_id'] . "'");
          tep_db_query("delete from options_values_to_products_id where options_id = '" . $o['options_id'] . "'");
        }
        tep_db_query("delete from options where options_categories_id = '" . $oc_delete_id . "'");
        tep_db_query("delete from TABLE_OPTION_CATEGORIES where options_categories_id = '" . $oc_delete_id . "'");
        $HTTP_GET_VARS['ocID'] = '';
        $action = '';
        break;
        
      case 'save_option':
        $sort_order = tep_db_prepare_input($HTTP_POST_VARS['new_option_sort_order']);
        $option_name = tep_db_prepare_input($HTTP_POST_VARS['new_option_name']);
        $option_type = $HTTP_POST_VARS['new_option_type'];
        $ocID = $HTTP_POST_VARS['ocID'];
        $sql_data_array['options_sort_order'] = $sort_order;
        $sql_data_array['options_name'] = $option_name;
        $sql_data_array['options_type'] = $option_type;
        $sql_data_array['options_categories_id'] = $ocID;
        $sql_data_array['options_date_added'] = 'now()';
        $sql_data_array['options_last_modified'] = 'now()';
        tep_db_perform('options', $sql_data_array);
        $oID = tep_db_insert_id();
        $HTTP_GET_VARS['oID'] = $oID;
        $HTTP_GET_VARS['ocID'] = $ocID;
        $action = 'list_options';
        // special case of a option type 1 - text input
        if ( $option_type  == 1 ) {
          $sql_data_array = array();
          $sql_data_array['options_values_name'] = 'text input field';
          $sql_data_array['options_id'] = $oID;
          tep_db_perform('options_values', $sql_data_array);
        }
        break;
        
      case 'update_option':
        $sort_order = tep_db_prepare_input($HTTP_POST_VARS['new_option_sort_order']);
        $option_name = tep_db_prepare_input($HTTP_POST_VARS['new_option_name']);
        $option_type = $HTTP_POST_VARS['new_option_type'];
        $ocID = $HTTP_POST_VARS['ocID'];
        $sql_data_array['options_sort_order'] = $sort_order;
        $sql_data_array['options_name'] = $option_name;
        $sql_data_array['options_type'] = $option_type;
        $sql_data_array['options_categories_id'] = $ocID;
        $sql_data_array['options_date_added'] = 'now()';
        $sql_data_array['options_last_modified'] = 'now()';
        tep_db_perform('options', $sql_data_array, 'update', "options_id = '" . (int)$HTTP_POST_VARS['o_edit_id'] . "'");
        $HTTP_GET_VARS['oID'] = tep_db_insert_id();
        $HTTP_GET_VARS['ocID'] = $ocID;
        $action = 'list_options';
        break;
        
      case 'confirm_option_delete':
        $o_delete_id = $HTTP_POST_VARS['o_delete_id'];
        $ocID = $HTTP_POST_VARS['ocID'];
        tep_db_query("delete from options_values where options_id = '" . $o_delete_id . "'");
        tep_db_query("delete from options_values_to_products_id where options_id = '" . $o_delete_id . "'");
        tep_db_query("delete from options where options_id = '" . $o_delete_id . "'");
        $HTTP_GET_VARS['oID'] = '';
        $HTTP_GET_VARS['ocID'] = $ocID;
        $action = 'list_options';
        break;
     
     case 'save_values':
        $option_type = $HTTP_POST_VARS['option_type'];
        $ocID = $HTTP_POST_VARS['ocID'];
        $oID = $HTTP_POST_VARS['oID'];
        switch ($option_type) {
          case 0:
          case 2:
          case 3:
            if ( isset($HTTP_POST_VARS['values_select']) ) {
              foreach ($HTTP_POST_VARS['values_select'] as $k => $v) {
                $v = trim($v);
                if ( $v == '' ) {
                  tep_db_query("delete from options_values where options_values_id = '" . $HTTP_POST_VARS['values_id'][$k] . "'");
                  tep_db_query("delete from options_values_to_products_id where options_values_id = '" . $HTTP_POST_VARS['values_id'][$k] . "'");
                } elseif ( $v != $HTTP_POST_VARS['values_old'][$k] || $HTTP_POST_VARS['values_prefix'][$k] != $HTTP_POST_VARS['values_prefix_old'][$k] || $HTTP_POST_VARS['values_price'][$k] != $HTTP_POST_VARS['values_price_old'][$k] ) {
                  $sql_data_array['options_values_name'] = $v;
                  $sql_data_array['options_values_prefix'] = $HTTP_POST_VARS['values_prefix'][$k];
                  $sql_data_array['options_values_price'] = $HTTP_POST_VARS['values_price'][$k];
                  tep_db_perform('options_values', $sql_data_array, 'update', "options_values_id = '" . (int)$HTTP_POST_VARS['values_id'][$k] . "'");
                }
              }
            }
            foreach ($HTTP_POST_VARS['values_select_new'] as $k => $v) {
              $v = trim($v);
              if ( $v != '' ) {
                $sql_data_array['options_values_name'] = $v;
                $sql_data_array['options_id'] = $oID;
                $sql_data_array['options_values_prefix'] = $HTTP_POST_VARS['values_prefix_new'][$k];
                  $sql_data_array['options_values_price'] = $HTTP_POST_VARS['values_price_new'][$k];
                  tep_db_perform('options_values', $sql_data_array);
              }
            }
            break;
          
          case 1:
            $sql_data_array['options_length'] = $HTTP_POST_VARS['values_text_length'];
            tep_db_perform('options', $sql_data_array, 'update', "options_id = '" . (int)$oID . "'");
            break;
        
        }
        $HTTP_GET_VARS['oID'] = $oID;
        $HTTP_GET_VARS['ocID'] = $ocID;
        $action = 'list_options';
        break;
        
    }
  }
  
  // Draw a pulldown for Option Types
  function draw_optiontype_pulldown($name, $default = '') {
    $values = array();
    $values[] = array('id' => 0, 'text' => 'Select');
    $values[] = array('id' => 1, 'text' => 'Text');
    $values[] = array('id' => 2, 'text' => 'Radio');
    $values[] = array('id' => 3, 'text' => 'Checkbox');
    return tep_draw_pull_down_menu($name, $values, $default);
  }


  // Translate option_type_values to english string
  function translate_type_to_name($opt_type) {
    if ($opt_type == 0) return 'Select';
    if ($opt_type == 1) return 'Text';
    if ($opt_type == 2) return 'Radio';
    if ($opt_type == 3) return 'Checkbox';
    return 'Error ' . $opt_type;
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
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<div id="spiffycalendar" class="text"></div>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top">
      <table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
      <!-- left_navigation //-->
      <?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
      <!-- left_navigation_eof //-->
      </table>
    </td>
    <!-- body_text //-->
    <td width="100%" valign="top">
<?php
  switch ($action) {
    // use the same row display for all of the related functions
    case 'new_option':
    case 'edit_option':
    case 'delete_option':
    case 'edit_values':
    case 'list_options':
?>
      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td class="pageHeading"><?php echo CATEGORY_OPTION_HEADING_TITLE; ?></td>
        </tr>
        <tr>
          <td valign="top">
            <table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_OPTIONS; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_SORT_ORDER; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_OPTION_TYPE; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
      $ocID = $HTTP_GET_VARS['ocID'];
      if ( isset($HTTP_GET_VARS['oID']) ) {
        $oID = $HTTP_GET_VARS['oID'];
      } else {
        $oID = '';
      }
      $options_categories_query_raw = 'select options_id, options_name, options_sort_order, options_type, options_length, options_date_added, options_last_modified from options where options_categories_id =\'' . (int)$ocID . '\' order by options_sort_order ';
      $options_categories_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $options_categories_query_raw, $options_categories_query_numrows);
      $options_categories_query = tep_db_query($options_categories_query_raw);
      while ($o = tep_db_fetch_array($options_categories_query)) {
        if ( $oID == '' ) $oID = $o['options_id'];
        if ( $oID == $o['options_id'] ) {
          $oInfo = new objectInfo($o);
          echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=list_options&ocID=' . $ocID . '&oID=' . $o['options_id']) . '\'">' . "\n";
        } else {
          echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=list_options&ocID=' . $ocID . '&oID=' . $o['options_id']) . '\'">' . "\n";
        }
?>
                <td class="dataTableContent"><?php echo $o['options_name']; ?></td>
                <td class="dataTableContent" align="center"><?php echo $o['options_sort_order']; ?></td>
                <td class="dataTableContent" align="center"><?php echo translate_type_to_name($o['options_type']); ?></td>
                <td class="dataTableContent" align="right"><?php if ( $oID == $o['options_id'] ) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=list_options&ocID=' . $ocID . '&oID=' . $o['options_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
      }
?>
              
<?php
      break;
      
    // use the same row display for all of the related functions
    default:
?>
      <table border="0" width="100%" cellspacing="0" cellpadding="2">
        <tr>
          <td class="pageHeading"><?php echo CATEGORY_OPTION_HEADING_TITLE; ?></td>
        </tr>
        <tr>
          <td valign="top">
            <table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CATEGORIES_OPTIONS; ?></td>
                <td class="dataTableHeadingContent" align="center"><?php echo TABLE_HEADING_SORT_ORDER; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
      if ( isset($HTTP_GET_VARS['ocID']) ) {
        $ocID = $HTTP_GET_VARS['ocID'];
      } else {
        $ocID = '';
      }
      $options_categories_query_raw = 'select options_categories_id, options_categories_name, options_categories_sort_order, options_categories_date_added, options_categories_last_modified from options_categories order by options_categories_sort_order ';
      $options_categories_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $options_categories_query_raw, $options_categories_query_numrows);
      $options_categories_query = tep_db_query($options_categories_query_raw);
      while ($oc = tep_db_fetch_array($options_categories_query)) {
        if ( $ocID == '' ) $ocID = $oc['options_categories_id'];
        if ( $ocID == $oc['options_categories_id'] ) {
          $ocInfo = new objectInfo($oc);
          echo '              <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'ocID=' . $oc['options_categories_id']) . '\'">' . "\n";
        } else {
          echo '              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'ocID=' . $oc['options_categories_id']) . '\'">' . "\n";
        }
?>
                <td class="dataTableContent"><?php echo '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=list_options&ocID=' . $oc['options_categories_id']) . '">' . tep_image(DIR_WS_ICONS . 'folder.gif', ICON_FOLDER) . '</a>&nbsp;' . $oc['options_categories_name']; ?></td>
                <td class="dataTableContent" align="center"><?php echo $oc['options_categories_sort_order']; ?></td>
                <td class="dataTableContent" align="right"><?php if ( $ocID == $oc['options_categories_id'] ) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, tep_get_all_get_params(array('ocID')) . 'ocID=' . $oc['options_categories_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
      }
      break;
  }
  // End of Switch - Back to commom code
?>
              <tr>
                <td colspan="4">
                  <table border="0" width="100%" cellspacing="0" cellpadding="2">
                    <tr>
                      <td class="smallText" valign="top"><?php echo $options_categories_split->display_count($options_categories_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF); ?></td>
<?php
                      if ($action != '') echo '<td><a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '', 'NONSSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a></td>';
?>
                      <td class="smallText" align="right"><?php echo $options_categories_split->display_links($options_categories_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'info', 'x', 'y', 'cID'))); ?></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
          <td width="25%" valign="top">
<?php
  $heading = array();
  $contents = array();
  switch ($action) {
        case 'new_option':
          $heading[] = array('text' => '<b>' . TEXT_HEADING_NEW_OPTION . '</b>');
          $contents = array('form' => tep_draw_form('new_option', FILENAME_OPTION_CATEGORIES, 'action=save_option'));
          $contents[] = array('align' => 'center', 'text' => '<br>' . TEXT_OPTION_NAME . tep_draw_input_field('new_option_name', '', 'size="32"'));
          $contents[] = array('text' => '<br>' . TEXT_SORT_ORDER . tep_draw_input_field('new_option_sort_order', '', 'size="3"'));
          $contents[] = array('text' => '<br>' . TEXT_OPTION_TYPE . draw_optiontype_pulldown('new_option_type'));
          $contents[] = array('text' => tep_draw_hidden_field('ocID', $ocID));
          $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_insert.gif', IMAGE_INSERT) . ' <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
          break;
          
        case 'edit_option':
          $heading[] = array('text' => '<b>' . TEXT_HEADING_EDIT_OPTION . '</b>');
          $contents = array('form' => tep_draw_form('edit_option', FILENAME_OPTION_CATEGORIES, 'action=update_option'));
          $contents[] = array('align' => 'center', 'text' => '<br>' . TEXT_OPTION_NAME . tep_draw_input_field('new_option_name', $oInfo->options_name, 'size="32"'));
          $contents[] = array('text' => '<br>' . TEXT_SORT_ORDER . tep_draw_input_field('new_option_sort_order', $oInfo->options_sort_order, 'size="3"'));
          $contents[] = array('text' => '<br>' . TEXT_OPTION_TYPE . draw_optiontype_pulldown('new_option_type', $oInfo->options_type));
          $contents[] = array('text' => tep_draw_hidden_field('ocID', $ocID) . tep_draw_hidden_field('o_edit_id', $oInfo->options_id));
          $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_insert.gif', IMAGE_INSERT) . ' <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
          break;
          
        case 'delete_option':
          $heading[] = array('text' => '<b>' . TEXT_HEADING_DELETE_OPTION . '</b>');
          $contents = array('form' => tep_draw_form('delete_option', FILENAME_OPTION_CATEGORIES, 'action=confirm_option_delete'));
          $contents[] = array('text' => TEXT_DELETE_OPTION_INFO);
          $contents[] = array('text' => '<br><b>' . $oInfo->options_name . '</b>');
          $contents[] = array('text' => tep_draw_hidden_field('o_delete_id', $oInfo->options_id) . tep_draw_hidden_field('ocID', $ocID));
          $contents[] = array('text' => TEXT_DELETE_OPTION_WARNING);
          $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
          break;
          
        case 'edit_values':
          $heading[] = array('text' => '<b>' . TEXT_HEADING_EDIT_VALUES . '</b>');
          $contents = array('form' => tep_draw_form('option_values', FILENAME_OPTION_CATEGORIES, 'action=save_values'));
          $contents[] = array('text' => TEXT_EDIT_VALUES_INFO);
          switch ($oInfo->options_type) {
            case 0:
            case 2:
            case 3:
              $options_values_query_raw = 'select options_values_id, options_values_name, options_values_prefix, options_values_price from options_values where options_id = \'' . $oInfo->options_id . '\' order by options_values_id';
              $options_values_query = tep_db_query($options_values_query_raw);
              $i = 0;
              while ($ov = tep_db_fetch_array($options_values_query)) {
                $i++;
                $contents[] = array('text' => '<br>' . tep_draw_input_field('values_select['. $i .']', stripslashes($ov['options_values_name']), 'size="35"') . tep_draw_hidden_field('values_id['. $i .']', $ov['options_values_id']) . tep_draw_hidden_field('values_old['. $i .']', stripslashes($ov['options_values_name'])));
                $contents[] = array('text' => 'Default&nbsp;(&nbsp;+/-&nbsp;)&nbsp;' . tep_draw_input_field('values_prefix['. $i .']', $ov['options_values_prefix'] == '' ? '+' : $ov['options_values_prefix'], 'size="1"') . '&nbsp;Price&nbsp;' . tep_draw_input_field('values_price['. $i .']', $ov['options_values_price'], 'size="10"') . 
                                    tep_draw_hidden_field('values_prefix_old['. $i .']', $ov['options_values_prefix']) . tep_draw_hidden_field('values_price_old['. $i .']', $ov['options_values_price']));
              }
              for ($i = 0; $i < 5; $i++) {
                $contents[] = array('text' => '<br>' . tep_draw_input_field('values_select_new['. $i .']', '', 'size="35"'));                 
                $contents[] = array('text' => 'Default&nbsp;(&nbsp;+/-&nbsp;)&nbsp;' . tep_draw_input_field('values_prefix_new['. $i .']', '+', 'size="1"') . '&nbsp;Price&nbsp;' . tep_draw_input_field('values_price_new['. $i .']', '0', 'size="10"'));
              }
              break;
            case 1:
              $contents[] = array('text' => '<br>' . TEXT_VALUE_TEXT_FIELD . tep_draw_input_field('values_text_length', $oInfo->options_length, 'size="3"'));
              break;
          }
          $contents[] = array('text' => tep_draw_hidden_field('oID', $oInfo->options_id) . tep_draw_hidden_field('ocID', $ocID) . tep_draw_hidden_field('option_type', $oInfo->options_type));
          $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
          break;
          
        case 'list_options':
          if ( $oID == '' ) {
            $heading[] = array('text' => '<b>' . TEXT_HEADING_EMPTY_OPTION . '</b>');
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=new_option&ocID=' . $ocID) . '">' . tep_image_button('button_new.gif', IMAGE_NEW));
          } else {
            $heading[] = array('text' => '<b>' . $ocInfo->options_categories_name . '</b>');
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=edit_option&ocID=' . $ocID . '&oID=' . $oInfo->options_id) . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=delete_option&ocID=' . $ocID . '&oID=' . $oInfo->options_id) . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a>');
            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . tep_date_short($oInfo->options_date_added));
            $contents[] = array('text' => '<br>' . TEXT_LAST_MODIFIED . ' ' . tep_date_short($oInfo->options_last_modified));
            $contents[] = array('text' => '<br>' . tep_image(DIR_WS_IMAGES . 'pixel_black.gif','','100%','3'));
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=edit_values&ocID=' . $ocID . '&oID=' . $oInfo->options_id) . '">' . tep_image_button('button_edit_values.gif', 'Edit Options Values') . '</a>');
            switch ($oInfo->options_type) {
              case 0:
              case 2:
              case 3:
                $options_values_query_raw = 'select options_values_id, options_values_name from options_values where options_id = \'' . $oInfo->options_id . '\' order by options_values_id';
                $options_values_query = tep_db_query($options_values_query_raw);
                while ($ov = tep_db_fetch_array($options_values_query)) {
                  $contents[] = array('text' => '<br>' . stripslashes($ov['options_values_name']));                 
                }
                break;
              case 1:
                $contents[] = array('text' => '<br>' . TEXT_VALUE_TEXT_FIELD . ' ' . $oInfo->options_length);
                break;
            }
            $contents[] = array('text' => '<br>' . tep_image(DIR_WS_IMAGES . 'pixel_black.gif','','100%','3'));
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'action=new_option&ocID=' . $ocID) . '">' . tep_image_button('button_new.gif', IMAGE_NEW) . '</a>');
          }
          break;
        
        case 'new_category':
          $heading[] = array('text' => '<b>' . TEXT_HEADING_NEW_CATEGORY . '</b>');
          $contents = array('form' => tep_draw_form('new_options_category', FILENAME_OPTION_CATEGORIES, 'action=save_category'));
          $contents[] = array('align' => 'center', 'text' => '<br>' . TEXT_CATEGORY_NAME . tep_draw_input_field('new_category_name', '', 'size="32"'));
          $contents[] = array('align' => 'center', 'text' => '<br>' . TEXT_CATEGORY_DESCRIPTION . tep_draw_textarea_field('new_category_description', 'soft', '40', '5', ''));
          $contents[] = array('text' => '<br>' . TEXT_SORT_ORDER . tep_draw_input_field('new_category_sort_order', '', 'size="3"'));
          $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_insert.gif', IMAGE_INSERT) . ' <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
          break;
          
        case 'edit_category':
          $heading[] = array('text' => '<b>' . TEXT_HEADING_EDIT_CATEGORY . '</b>');
          $contents = array('form' => tep_draw_form('edit_options_category', FILENAME_OPTION_CATEGORIES, 'action=update_category'));
          $contents[] = array('align' => 'center', 'text' => '<br>' . TEXT_CATEGORY_NAME . tep_draw_input_field('edit_category_name', $ocInfo->options_categories_name, 'size="32"'));
          $contents[] = array('align' => 'center', 'text' => '<br>' . TEXT_CATEGORY_DESCRIPTION . tep_draw_textarea_field('edit_category_description', 'soft', '40', '5', $ocInfo->options_categories_description, 'size="32"'));
          $contents[] = array('text' => '<br>' . TEXT_SORT_ORDER . tep_draw_input_field('edit_category_sort_order', $ocInfo->options_categories_sort_order, 'size="3"'));
          $contents[] = array('text' => tep_draw_hidden_field('oc_edit_id', $ocInfo->options_categories_id));
          $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_update.gif', IMAGE_UPDATE) . ' <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
          break;
          
        case 'delete_category':
          $heading[] = array('text' => '<b>' . TEXT_HEADING_DELETE_CATEGORY . '</b>');
          $contents = array('form' => tep_draw_form('edit_options_category', FILENAME_OPTION_CATEGORIES, 'action=confirm_category_delete'));
          $contents[] = array('text' => TEXT_DELETE_CATEGORY_INFO);
          $contents[] = array('text' => '<br><b>' . $ocInfo->options_categories_name . '</b>');
          $contents[] = array('text' => tep_draw_hidden_field('oc_delete_id', $ocInfo->options_categories_id));
          $contents[] = array('text' => TEXT_DELETE_CATEGORY_WARNING);
          $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, '') . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
          break;
          
        default:
          if ( $ocID == '' ) {
            $heading[] = array('text' => '<b>' . TEXT_HEADING_EMPTY_CATEGORY . '</b>');
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'ocID=' . $ocInfo->options_categories_id . '&action=new_category') . '">' . tep_image_button('button_new_category.gif', IMAGE_NEW_CATEGORY) . '</a>');
          } else {
            $heading[] = array('text' => '<b>' . $ocInfo->options_categories_name . '</b>');
            if ( $ocID != 0) {
              $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'ocID=' . $ocInfo->options_categories_id . '&action=edit_category') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'ocID=' . $ocInfo->options_categories_id . '&action=delete_category') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a>');
            }
            $contents[] = array('text' => '<br>' . TEXT_DATE_ADDED . ' ' . tep_date_short($ocInfo->options_categories_date_added));
            $contents[] = array('text' => '<br>' . TEXT_LAST_MODIFIED . ' ' . tep_date_short($ocInfo->options_categories_last_modified));
            $contents[] = array('text' => '<br>' . tep_image(DIR_WS_IMAGES . 'pixel_black.gif','','100%','3'));
            $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_OPTION_CATEGORIES, 'ocID=' . $ocInfo->options_categories_id . '&action=new_category') . '">' . tep_image_button('button_new_category.gif', IMAGE_NEW_CATEGORY) . '</a>');
          }
        break;
  }
  $box = new box;
  echo $box->infoBox($heading, $contents);
?>
          </td>
        </tr>
      </table>
    </td>
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
