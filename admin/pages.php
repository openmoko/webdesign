<?php
/*
  $Id: pages.php,v 1.1.1.1 2004/03/04 23:38:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

require('includes/application_top.php');

// define functions
require(DIR_WS_FUNCTIONS . 'pages.php');

$languages = tep_get_languages();

// clean variables
$pID = '';
if (isset($HTTP_POST_VARS['pID']) && tep_not_null($HTTP_POST_VARS['pID'])) {
  $pID = (int)$HTTP_POST_VARS['pID'];
} elseif (isset($HTTP_GET_VARS['pID']) && tep_not_null($HTTP_GET_VARS['pID'])) {
  $pID = (int)$HTTP_GET_VARS['pID'];
}

$action = '';
if (isset($HTTP_POST_VARS['action']) && tep_not_null($HTTP_POST_VARS['action'])) {
  $action = tep_db_prepare_input($HTTP_POST_VARS['action']);
} elseif (isset($HTTP_GET_VARS['action']) && tep_not_null($HTTP_GET_VARS['action'])) {
  $action = tep_db_prepare_input($HTTP_GET_VARS['action']);
} 

if (tep_not_null($action)) {
  switch ($action) {
  case 'setflag':
    $flag = (int)$HTTP_GET_VARS['flag'];

    if (($flag == '0') || ($flag == '1')) {
      if (tep_not_null($pID)) {
  tep_db_query("update " . TABLE_PAGES . " set pages_status = '" . $flag . "' where pages_id = '" . (int)$pID . "'");
      }
    }

    tep_redirect(tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('action'))));

    break;
  case 'insert':
  case 'update':
    $pages_title_array = tep_db_prepare_input($HTTP_POST_VARS['pages_title']);
    $pages_category = (int)$HTTP_POST_VARS['pages_category'];
    $pages_blurb_array = tep_db_prepare_input($HTTP_POST_VARS['pages_blurb']);
    $pages_body_array = tep_db_prepare_input($HTTP_POST_VARS['pages_body']);
    $pages_meta_title_array = tep_db_prepare_input($HTTP_POST_VARS['pages_meta_title']);
    $pages_meta_keywords_array = tep_db_prepare_input($HTTP_POST_VARS['pages_meta_keywords']);
    $pages_meta_description_array = tep_db_prepare_input($HTTP_POST_VARS['pages_meta_description']);
    $pages_status = ((tep_db_prepare_input($HTTP_POST_VARS['pages_status']) == 'on') ? '1' : '0');
    $pages_sort_order = tep_not_null($HTTP_POST_VARS['pages_sort_order']) ? (int)$HTTP_POST_VARS['pages_sort_order'] : '0';
    $pages_author = tep_db_prepare_input($HTTP_POST_VARS['pages_author']);

    $sql_data_array = array('pages_author' => $pages_author,
          'pages_status' => $pages_status,
          'pages_sort_order' => $pages_sort_order);

    if ($action == 'update') {
      $sql_data_array['pages_date_modified'] = 'now()';
    } elseif ($action == 'insert') {
      $sql_data_array['pages_date_added'] = 'now()';
    }

    if ($action == 'update') {
      tep_db_perform(TABLE_PAGES, $sql_data_array, 'update', "pages_id = '" . (int)$pID . "'");
    } else if($action == 'insert') {
      tep_db_perform(TABLE_PAGES, $sql_data_array);

      $pID = tep_db_insert_id();
    }

    // upload image
    if ($pages_image = new upload('pages_image', DIR_FS_CATALOG_IMAGES)) {
      tep_db_query("update " . TABLE_PAGES . " set pages_image = '" . $pages_image->filename . "' where pages_id = '" . (int)$pID . "'");
    }

    // update description tables
    $sql_data_array = array();
    for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
      $language_id = (int)$languages[$i]['id'];

      $sql_data_array = array('language_id' => $language_id, 
            'pages_title' => $pages_title_array[$language_id], 
            'pages_blurb' => $pages_blurb_array[$language_id], 
            'pages_body' => $pages_body_array[$language_id], 
            'pages_meta_title' => $pages_meta_title_array[$language_id], 
            'pages_meta_keywords' => $pages_meta_keywords_array[$language_id], 
            'pages_meta_description' => $pages_meta_description_array[$language_id]
            );

      if ($action == 'insert') {
  $sql_data_array['pages_id'] = (int)$pID;

  tep_db_perform(TABLE_PAGES_DESCRIPTION, $sql_data_array);
      } else {
  tep_db_perform(TABLE_PAGES_DESCRIPTION, $sql_data_array, 'update', "pages_id = '" . (int)$pID . "' and language_id = '" . (int)$language_id . "'");
      }
    }

    // update category info
    if ($action == 'update') {
      tep_db_query("update " . TABLE_PAGES_TO_CATEGORIES . " set categories_id = '" . (int)$pages_category . "' where pages_id = '" . (int)$pID . "'");
    } else if($action == 'insert') {
      tep_db_query("insert into " . TABLE_PAGES_TO_CATEGORIES . " (pages_id, categories_id) values ('" . (int)$pID . "', '" . (int)$pages_category . "')");
    }

    tep_redirect(tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID', 'action')) . 'pID=' . $pID));

    break;
  case 'deleteconfirm':
    tep_pages_remove_page($pID);

    tep_redirect(tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID', 'action'))));
    break;
  default:
    $pages_query = tep_db_query("select ip.pages_id, ip.pages_image, ip.pages_date_added, ip.pages_date_modified, ip.pages_author, ip.pages_status, ip.pages_sort_order, ipd.pages_title, ipd.pages_blurb from " . TABLE_PAGES . " ip left join " . TABLE_PAGES_DESCRIPTION . " ipd on ip.pages_id = ipd.pages_id where ipd.language_id = '" . (int)$languages_id . "' and ip.pages_id = '" . (int)$pID . "'");

    $pages = tep_db_fetch_array($pages_query);
    $categories_query = tep_db_query("select icd.categories_id, icd.categories_name from " . TABLE_PAGES_TO_CATEGORIES . " ip2c left join " . TABLE_PAGES_CATEGORIES_DESCRIPTION . " icd on icd.categories_id = ip2c.categories_id where ip2c.pages_id = '" . (int)$pages['pages_id'] . "' and icd.language_id = '" . (int)$languages_id . "'");
    $category = tep_db_fetch_array($categories_query);

    $pInfo_array = array_merge($pages, $category);
    $pInfo = new objectInfo($pInfo_array);
  }
}
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/general.js"></script>
<!-- Tabs code -->
<script type="text/javascript" src="includes/javascript/tabpane/local/webfxlayout.js"></script>
<link type="text/css" rel="stylesheet" href="includes/javascript/tabpane/tab.webfx.css">
<style type="text/css">
.dynamic-tab-pane-control h2 {
  text-align: center;
  width:    auto;
}

.dynamic-tab-pane-control h2 a {
  display:  inline;
  width:    auto;
}

.dynamic-tab-pane-control a:hover {
  background: transparent;
}
</style>
<script type="text/javascript" src="includes/javascript/tabpane/tabpane.js"></script>
<!-- End Tabs -->
<?php 
// Load Editor
include('includes/javascript/editor.php');
echo tep_load_html_editor();
  for ($i=0; $i<sizeof($languages); $i++) {
      $pages_blurb_elements .= 'pages_blurb[' . $languages[$i]['id'] . '],'; 
      $pages_body_elemtnts .= 'pages_body[' . $languages[$i]['id'] . '],'; 
    } 

echo tep_insert_html_editor($pages_blurb_elements,'simple','200');
echo tep_insert_html_editor($pages_body_elemtnts,'advanced','400');
?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
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
  if ($action == 'edit' || $action == 'update' || $action == 'new' || $action == 'insert') {
    if ($action == 'edit' || $action == 'update') {
      $form_action = 'update';
    } else {
      $form_action = 'insert';
    }
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>

      <tr><?php echo tep_draw_form('pages', FILENAME_PAGES, tep_get_all_get_params(array('action')) . 'action=' . $form_action, 'post', 'enctype="multipart/form-data"'); ?>
        <td>
<?php
    $categories_array = array();
    $categories_array[] = array('id' => '', 'text' => TEXT_NO_CATEGORY);
    $categories_query = tep_db_query("select icd.categories_id, icd.categories_name from " . TABLE_PAGES_CATEGORIES_DESCRIPTION . " icd where language_id = '" . (int)$languages_id . "' order by icd.categories_name");
    while ($categories_values = tep_db_fetch_array($categories_query)) {
      $categories_array[] = array('id' => $categories_values['categories_id'], 'text' => $categories_values['categories_name']);
    }
?>
<table border="0" cellspacing="0" cellpadding="0" width="80%">
  <tr valign="top">
    <td width="50%"><table border="0" cellspacing="0" cellpadding="2" width="100%">
          <tr>
            <td class="main"><?php echo ENTRY_CATEGORY; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_pull_down_menu('pages_category', $categories_array, $pInfo->categories_id); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_IMAGE; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_file_field('pages_image'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_STATUS; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_radio_field('pages_status', 'on', ($pInfo->pages_status == '1') ? true : false) . ' ' . TEXT_PAGES_ACTIVE . '&nbsp;&nbsp;' . tep_draw_radio_field('pages_status', 'off', ($pInfo->pages_status == '0') ? true : false) . ' ' . TEXT_PAGES_INACTIVE; ?></td>
          </tr>
        </table></td>
    <td width="50%">    <table border="0" cellspacing="0" cellpadding="2" width="100%">
      <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_SORT_ORDER; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('pages_sort_order', $pInfo->pages_sort_order, 'size="2"'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
          <tr>
            <td class="main"><?php echo ENTRY_AUTHOR; ?></td>
            <td class="main"><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;' . tep_draw_input_field('pages_author', $pInfo->pages_author); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
    </table></td>
  </tr>
</table>
<?php echo tep_draw_separator('pixel_trans.gif', '100%', '15'); ?>
<div class="tab-pane" id="tabPane1">
<script type="text/javascript">tp1 = new WebFXTabPane( document.getElementById( "tabPane1" ) );
</script>
<?php
    for ($i=0; $i<sizeof($languages); $i++) {
?>
              <div class="tab-page" id="<?php echo $languages[$i]['name'];?>">
                <h2 class="tab"><nobr><?php echo tep_image(HTTP_SERVER . DIR_WS_CATALOG_LANGUAGES . $languages[$i]['directory'] . '/images/' . $languages[$i]['image'], $languages[$i]['name'],'align="absmiddle" style="height:16px; width:30px;"') . '&nbsp;' .$languages[$i]['name'];?></nobr></h2>
                <script type="text/javascript">tp1.addTabPage( document.getElementById( "<?php echo $languages[$i]['name'];?>" ) );</script>
                <table width="100%"  border="0" cellspacing="0" cellpadding="0" summary="tab table">
                  <tr>
                    <td valign="top">
    <table border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main"><b><?php echo ENTRY_TITLE; ?></b></td>
            <td class="main"><?php echo tep_draw_input_field('pages_title[' . $languages[$i]['id'] . ']', tep_pages_get_page_title($pInfo->pages_id, $languages[$i]['id'])); ?></td>
          </tr>
<?php
//    }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>

<?php
//    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><b><?php  echo ENTRY_BLURB; ?></b></td>
            <td class="main"><?php echo tep_draw_textarea_field('pages_blurb[' . $languages[$i]['id'] . ']', 'hard', 40, 3, tep_pages_get_page_blurb($pInfo->pages_id, $languages[$i]['id']), 'style="width: 100%"'); ?></td>
          </tr>
<?php
//    }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
//    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><b><?php echo ENTRY_BODY; ?></b></td>
            <td class="main"><?php echo tep_draw_textarea_field('pages_body[' . $languages[$i]['id'] . ']', 'hard', 40, 5, tep_pages_get_page_body($pInfo->pages_id, $languages[$i]['id']), 'style="width: 100%;" mce_editable="true"'); ?></td>
          </tr>
<?php
//    }
?>

          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
//    for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><b><?php echo ENTRY_META_TITLE; ?></b></td>
            <td class="main"><?php echo tep_draw_input_field('pages_meta_title[' . $languages[$i]['id'] . ']', tep_pages_get_page_meta_title($pInfo->pages_id, $languages[$i]['id']), 'style="width: 80%;"'); ?></td>
          </tr>
<?php
//    }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
 //   for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><b><?php  echo ENTRY_META_KEYWORDS; ?></b></td>
            <td class="main"><?php echo tep_draw_input_field('pages_meta_keywords[' . $languages[$i]['id'] . ']', tep_pages_get_page_meta_keywords($pInfo->pages_id, $languages[$i]['id']), 'style="width: 80%;"'); ?></td>
          </tr>
<?php
 //   }
?>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
<?php
 //   for ($i=0; $i<sizeof($languages); $i++) {
?>
          <tr>
            <td class="main"><b><?php echo ENTRY_META_DESCRIPTION; ?></b></td>
            <td class="main"><?php echo tep_draw_input_field('pages_meta_description[' . $languages[$i]['id'] . ']', tep_pages_get_page_meta_description($pInfo->pages_id, $languages[$i]['id']), 'style="width: 80%;"'); ?></td>
          </tr>
          <tr>
            <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
        </table>
</td>
                  </tr>
                </table>
              </div>
<?php
    }
?>
            </div>
<script type="text/javascript">
//<![CDATA[
setupAllTabs();
//]]>
</script>
</td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
      </tr>
      <tr>
        <td align="right" class="main"><?php echo (($action == 'edit') ? tep_image_submit('button_update.gif', IMAGE_UPDATE) : tep_image_submit('button_insert.gif', IMAGE_INSERT)) . ' <a href="' . tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('action'))) .'">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>'; ?></td>
      </tr></form>
<?php
  } else {
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr><?php echo tep_draw_form('search', FILENAME_PAGES, '', 'get'); 
            if (isset($HTTP_GET_VARS[tep_session_name()])) {
              echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
            }
          ?>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', 1, HEADING_IMAGE_HEIGHT); ?></td>
            <td class="smallText" align="right"><?php echo HEADING_TITLE_SEARCH . ' ' . tep_draw_input_field('search'); ?></td>
          </form></tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_TITLE; ?></td>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_STATUS; ?></td>
                <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
              </tr>
<?php
    $search = '';
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
      $keywords = tep_db_input(tep_db_prepare_input($HTTP_GET_VARS['search']));
      $search = " and ipd.pages_title like '%" . $keywords . "%'";
    }

    $pages_query_raw = "select ip.pages_id, ip.pages_image, ip.pages_date_added, ip.pages_date_modified, ip.pages_author, ip.pages_status, ip.pages_sort_order, ipd.pages_title, ipd.pages_blurb from " . TABLE_PAGES . " ip left join " . TABLE_PAGES_DESCRIPTION . " ipd on ipd.pages_id = ip.pages_id where ipd.language_id = '" . (int)$languages_id . "'" . $search . " order by ip.pages_sort_order, ipd.pages_title";

    $pages_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $pages_query_raw, $pages_query_numrows);
    $pages_query = tep_db_query($pages_query_raw);
    while ($pages = tep_db_fetch_array($pages_query)) {
      if ((!isset($HTTP_GET_VARS['pID']) || (isset($HTTP_GET_VARS['pID']) && ($HTTP_GET_VARS['pID'] == $pages['pages_id']))) && !isset($pInfo)) {
        $categories_query = tep_db_query("select icd.categories_id, icd.categories_name from " . TABLE_PAGES_TO_CATEGORIES . " ip2c left join " . TABLE_PAGES_CATEGORIES_DESCRIPTION . " icd on icd.categories_id = ip2c.categories_id where ip2c.pages_id = '" . (int)$pages['pages_id'] . "' and icd.language_id = '" . (int)$languages_id . "'");
        $category = tep_db_fetch_array($categories_query);

        $pInfo_array = array_merge($pages, $category);
        $pInfo = new objectInfo($pInfo_array);
      }

      if (isset($pInfo) && is_object($pInfo) && ($pages['pages_id'] == $pInfo->pages_id)) {
        echo '          <tr id="defaultSelected" class="dataTableRowSelected" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID', 'action')) . 'pID=' . $pInfo->pages_id . '&action=edit') . '\'">' . "\n";
      } else {
        echo '          <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href=\'' . tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID')) . 'pID=' . $pages['pages_id']) . '\'">' . "\n";
      }
?>
                <td class="dataTableContent"><?php echo $pages['pages_title']; ?></td>
                <td  class="dataTableContent">
<?php
      if ($pages['pages_status'] == '1') {
        echo tep_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10) . '&nbsp;&nbsp;<a href="' . tep_href_link(FILENAME_PAGES, 'action=setflag&flag=0&pID=' . $pages['pages_id'], 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . 'icon_status_red_light.gif', IMAGE_ICON_STATUS_RED_LIGHT, 10, 10) . '</a>';
      } else {
        echo '<a href="' . tep_href_link(FILENAME_PAGES, 'action=setflag&flag=1&pID=' . $pages['pages_id'], 'NONSSL') . '">' . tep_image(DIR_WS_IMAGES . 'icon_status_green_light.gif', IMAGE_ICON_STATUS_GREEN_LIGHT, 10, 10) . '</a>&nbsp;&nbsp;' . tep_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
      }
?></td>
                <td class="dataTableContent" align="right"><?php if (isset($pInfo) && is_object($pInfo) && ($pages['pages_id'] == $pInfo->pages_id)) { echo tep_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ''); } else { echo '<a href="' . tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID')) . 'pID=' . $pages['pages_id']) . '">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a>'; } ?>&nbsp;</td>
              </tr>
<?php
    }
?>
              <tr>
                <td colspan="4"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                  <tr>
        <td class="smallText" valign="top"><?php echo $pages_split->display_count($pages_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_PAGES); ?></td>
                    <td class="smallText" align="right"><?php echo $pages_split->display_links($pages_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page'], tep_get_all_get_params(array('page', 'pages', 'x', 'y', 'pID'))); ?></td>
                  </tr>
                  <tr>
<?php
    if (isset($HTTP_GET_VARS['search']) && tep_not_null($HTTP_GET_VARS['search'])) {
?>
                    <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_PAGES) . '">' . tep_image_button('button_reset.gif', IMAGE_RESET) . '</a>'; ?></td>
                    <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_PAGES, 'page=' . $HTTP_GET_VARS['page'] . '&action=new') . '">' . tep_image_button('button_new.gif', IMAGE_NEW_PAGE) . '</a>'; ?></td>
<?php
    } else {
?>
                    <td align="right" colspan="2"><?php echo '<a href="' . tep_href_link(FILENAME_PAGES, 'page=' . $HTTP_GET_VARS['page'] . '&action=new') . '">' . tep_image_button('button_new.gif', IMAGE_NEW_PAGE) . '</a>'; ?></td>
<?php
    }
?>
                  </tr>
                </table></td>
              </tr>
            </table></td>
<?php
  $heading = array();
  $contents = array();

  switch ($action) {
    case 'delete':
      $heading[] = array('text' => '<b>' . TEXT_PAGES_HEADING_DELETE_PAGE . '</b>');

      $contents = array('form' => tep_draw_form('pages', FILENAME_PAGES, tep_get_all_get_params(array('pID', 'action')) . 'pID=' . $pInfo->pages_id . '&action=deleteconfirm'));
      $contents[] = array('text' => TEXT_DELETE_INTRO . '<br><br><b>' . $pInfo->pages_title . '</b>');
      $contents[] = array('align' => 'center', 'text' => '<br>' . tep_image_submit('button_delete.gif', IMAGE_DELETE) . ' <a href="' . tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID', 'action')) . 'pID=' . $pInfo->pages_id) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a>');
      break;
    default:
      if (isset($pInfo) && is_object($pInfo)) {
        $heading[] = array('text' => '<b>' . $pInfo->pages_title . '</b>');

        $contents[] = array('align' => 'center', 'text' => '<a href="' . tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID', 'action')) . 'pID=' . $pInfo->pages_id . '&action=edit') . '">' . tep_image_button('button_edit.gif', IMAGE_EDIT) . '</a> <a href="' . tep_href_link(FILENAME_PAGES, tep_get_all_get_params(array('pID', 'action')) . 'pID=' . $pInfo->pages_id . '&action=delete') . '">' . tep_image_button('button_delete.gif', IMAGE_DELETE) . '</a>');

  if (tep_not_null($pInfo->categories_name)) {
    $contents[] = array('text' => '<br>' . TEXT_PAGES_CATEGORY . ' '  . $pInfo->categories_name);
  }
        $contents[] = array('align' => 'center', 
          'text' => '<br>' . tep_info_image($pInfo->pages_image, $pInfo->pages_title, HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT));
        $contents[] = array('text' => '<br>' . $pInfo->pages_blurb);
        $contents[] = array('text' => '<br>' . TEXT_DATE_PAGES_CREATED . ' ' . tep_date_short($pInfo->pages_date_added));

  $contents[] = array('text' => '<br>' . TEXT_DATE_PAGES_LAST_MODIFIED . ' ' . tep_date_short($pInfo->pages_date_modified));
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
  }
?>
    </table></td>
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
