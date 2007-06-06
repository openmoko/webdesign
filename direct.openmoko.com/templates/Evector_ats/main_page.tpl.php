<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<?php
if ( file_exists(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS) ) {
  require(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS);
} else {
?>
  <title><?php echo TITLE ?></title>
<?php
}
?>
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_STYLE;?>">
<?php if (isset($javascript) && file_exists(DIR_WS_JAVASCRIPT . basename($javascript))) { require(DIR_WS_JAVASCRIPT . basename($javascript)); } ?>
</head>
<body BGCOLOR=#FFFFFF >
<!-- warnings //-->
<?php require(DIR_WS_INCLUDES . FILENAME_WARNINGS); ?>
<!-- warning_eof //-->
<!-- header //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/'.FILENAME_HEADER); ?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_MAIN; ?>" class="centertable">
  <tr>
<?php
if (DISPLAY_COLUMN_LEFT == 'yes')  {
// WebMakers.com Added: Down for Maintenance
// Hide column_left.php if not to show
if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false') {
?>

<td WIDTH="3" bgcolor="#2D6DC5"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/spacer.gif" WIDTH="3" HEIGHT="1" alt="<?php echo IMAGE_ALT;?>"></td>


    <td width="<?php echo BOX_WIDTH_LEFT; ?>" valign="top" class="column_left"><table border="0" width="<?php echo BOX_WIDTH_LEFT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_LEFT; ?>">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_LEFT); ?>
<!-- left_navigation_eof //-->
    </table></td>

<td WIDTH="3" bgcolor="#2D6DC5"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/spacer.gif" WIDTH="3" HEIGHT="1" alt="<?php echo IMAGE_ALT;?>"></td>
<?php
}
}
?>
<!-- content //-->
<td WIDTH="100%" ALIGN="CENTER" VALIGN="TOP">

<?php
 if (isset($content_template) && file_exists(DIR_WS_CONTENT . basename($content_template))) {

   require(DIR_WS_CONTENT . basename($content_template));
  } else {
   require(DIR_WS_CONTENT . $content . '.tpl.php');

  }
?>

</td>
<!-- content_eof //-->
<?php
// WebMakers.com Added: Down for Maintenance
// Hide column_right.php if not to show

if (DISPLAY_COLUMN_RIGHT == 'yes')  {
if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF =='false') {
?>
    <td width="<?php echo BOX_WIDTH_RIGHT; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH_RIGHT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_RIGHT; ?>">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_RIGHT); ?>
<!-- right_navigation_eof //-->
    </table></td>
<?php
}
}
?>
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php
// WebMakers.com Added: Down for Maintenance
// Hide footer.php if not to show
if (DOWN_FOR_MAINTENANCE_FOOTER_OFF =='false') {
require(DIR_WS_INCLUDES . FILENAME_COUNTER); ?>
<table BGCOLOR="#2D6EC5" WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
<tr class="footer">
    <td class="footer">&nbsp;&nbsp;<?php echo strftime(DATE_FORMAT_LONG); ?>&nbsp;&nbsp;</td>
    <td align="right" class="footer">&nbsp;&nbsp;<?php echo $counter_now . ' ' . FOOTER_TEXT_REQUESTS_SINCE . ' ' . $counter_startdate_formatted; ?>&nbsp;&nbsp;</td>
  </tr>
  </table>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tr>
<td BGCOLOR="#2D6EC5"><table WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="6">
<tr>
  <td >
<?php 
//google banner ad
if (!(getenv('HTTPS')=='on')){
if (tep_banner_exists('dynamic','googlefoot') ) {
?>
<br>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php echo tep_display_banner('dynamic', 'googlefoot'); ?></td>
  </tr>
</table>

<?php
  } }
?>

<?php 
if ( tep_banner_exists('dynamic','468x50') ) { ?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php echo tep_display_banner('dynamic', '468x50'); ?></td>
  </tr>
</table>

<?php
  }
?>
  </td>
</tr>
<tr>
<td CLASS="footer" ALIGN="CENTER">
<?php
 echo FOOTER_TEXT_BODY
?>
</td>
</tr>
</table>
<table WIDTH="<?php echo SITE_WIDTH;?>" BORDER="0" CELLPADDING="0" CELLSPACING="0">
<tr>
<td ALIGN="RIGHT"style="background-image: url('<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_007.gif');background-repeat: repeat-y;"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_17.gif" WIDTH="150" HEIGHT="23" BORDER="0" alt="image" USEMAP="#Map"></td>
</tr>
</table>
<map NAME="Map">
<area SHAPE="RECT" COORDS="2,8,147,19" HREF="http://www.themelabs.com" TARGET="_blank">
</map>
<?php
}
// BOF: WebMakers.com Added: Center Shop Bottom of the tables are in footer.php
if (SITE_WIDTH != '100%') {
?>
         </td></tr></table>
       </td></tr>
     </table>
   </td>
  </tr>
</table>
<?php
}
// EOF: WebMakers.com Added: Center Shop Bottom of the tables are in footer.php
?>
<!-- footer_eof //-->
</body>
</html>
