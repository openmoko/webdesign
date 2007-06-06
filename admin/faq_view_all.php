<?php
/*
  FAQ system for OSC 2.2 MS2 v2.1  22.02.2005
  Originally Created by: http://adgrafics.com admin@adgrafics.net
  Updated by: http://www.webandpepper.ch osc@webandpepper.ch v2.0 (03.03.2004)
  Last Modified: http://shopandgo.caesium55.com timmhaas@web.de v2.1 (22.02.2005)
  Released under the GNU General Public License
  osCommerce, Open Source E-Commerce Solutions
  Copyright (c) 2004 osCommerce
*/

require('includes/application_top.php');
require(DIR_WS_LANGUAGES . $language . '/faq.php');
require(DIR_WS_FUNCTIONS . '/faq.php');

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
</head>
<style>.list {line-height: 22px;}</style>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
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
    <td width="100%" valign="top">
<table border=0 width="100%">
<tr class="pageHeading"><td><?php echo FAQ_VIEW_ALL;?></td></tr>
<?php
  $query = tep_db_query("select directory from " . TABLE_LANGUAGES . " order by languages_id desc");
  while($get_lang = tep_db_fetch_array($query)) {
?>
<tr><td><br></td></tr>
<tr><td class="dataTableContent"><?php echo $get_lang['directory']; ?></td></tr>
<tr><td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '5'); ?></td></tr>
<tr class="dataTableRow"><td class="dataTableContent">
<ol>
<?php
  while ($faq = faq_toc($get_lang['directory'])) {
?>
<li class="list"><?php echo $faq['toc'];?>
<?php
  }
?>
</ol>
</td></tr>
<tr><td><br></td></tr>
<tr class="dataTableContent"><td>
<ol>
<?php 
  while ($faq = read_faq($get_lang['directory'])) {
?>
<li>
<span id="<?php echo $faq[faq_id]?>"><b><?php echo $faq['question'];?></b></span><br>
<?php echo $faq['answer'];?>
</li><br>
<?php
  }
?>
</ol>
</td></tr>
<?php
  }
?>
<tr><td align="right">
<?php echo '<a href="' . tep_href_link(FILENAME_FAQ_MANAGER, 'faq_action=Added', 'NONSSL') . '">' . tep_image_button('button_insert.gif', ADD_FAQ) . '</a>'; ?>
</td></tr>
</table>
</td>
<!-- body_text_eof //-->
</tr>
</table>
<!-- body_eof //-->
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
