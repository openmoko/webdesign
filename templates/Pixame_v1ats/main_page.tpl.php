<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<?php
if ( file_exists(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS) ) {
  require(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS);
} else {
?>
  <title><?php echo TITLE ?></title>
<?php
}
?>
<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_STYLE;?>">
<?php if (isset($javascript) && file_exists(DIR_WS_JAVASCRIPT . basename($javascript))) { require(DIR_WS_JAVASCRIPT . basename($javascript)); } ?>
</head>
<body>
<!-- warnings //-->
<?php require(DIR_WS_INCLUDES . FILENAME_WARNINGS); ?>
<!-- warning_eof //-->
<!-- header //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/'.FILENAME_HEADER); ?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_MAIN; ?>" class="centertable" bgcolor="#798CCC">
  <tr>
<?php
if (DISPLAY_COLUMN_LEFT == 'yes')  {
// WebMakers.com Added: Down for Maintenance
// Hide column_left.php if not to show
if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false') {
?>
    <td width="<?php echo BOX_WIDTH_LEFT; ?>" valign="top" bgcolor="#D2DBF5"><table border="0" width="<?php echo BOX_WIDTH_LEFT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_LEFT; ?>">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_LEFT); ?>
<!-- left_navigation_eof //-->
    </table></td>
<?php
}
}
?>
<!-- content //-->
    <td width="100%" valign="top" bgcolor="#D2DBF5">
<?php
if (isset($content_template) && file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'.  basename($content_template))) {
    require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/' . $content . '.tpl.php');
  } else if (file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/' . $content . '.tpl.php')) {
    require(DIR_WS_TEMPLATES . TEMPLATE_NAME.'/content/'. $content . '.tpl.php');
  }else if (isset($content_template) && file_exists(DIR_WS_CONTENT . basename($content_template)) ){
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
    <td width="<?php echo BOX_WIDTH_RIGHT; ?>" valign="top" bgcolor="#D2DBF5"><table border="0" width="<?php echo BOX_WIDTH_RIGHT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_RIGHT; ?>">
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
            <table width="100%" style="height: 20" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="1" bgcolor="#798CCC">
                <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="image"></td>
                <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                <td bgcolor="#D2DBF5">&nbsp;</td>
                <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                <td width="1" bgcolor="#798CCC">
                <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="image"></td>
              </tr>
            </table>
<?php    include(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/'.FILENAME_LINKS_HTM);?>


            <!-- footer //-->
       <?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/'.FILENAME_FOOTER); ?>
<!-- footer_eof //-->
 <?php if (!(getenv('HTTPS')=='on')){
  if (tep_banner_exists('dynamic','googlefoot') ) { ?>

  <table bgcolor="#798CCC"width="100%" style="height: 20" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="1" bgcolor="#798CCC"><img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="image"></td>
                <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                <td bgcolor="#D2DBF5">
<?php 
//google banner ad
?>
<br>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php echo tep_display_banner('dynamic', 'googlefoot'); ?></td>
  </tr>
</table>

                </td>
                <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                <td width="1" bgcolor="#798CCC"><img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="image"></td>
              </tr>
            </table>
 <?php
  } }
?>
 <?php if (tep_banner_exists('dynamic', '468x50') ) { ?>

  <table bgcolor="#798CCC"width="100%" style="height:20" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="1" bgcolor="#798CCC"><img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="image"></td>
                <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                <td bgcolor="#D2DBF5">
<?php 
//google banner ad
?>
<br>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><?php echo tep_display_banner('dynamic',  '468x50'); ?></td>
  </tr>
</table>

                </td>
                <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                <td width="1" bgcolor="#798CCC"><img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="image"></td>
              </tr>
            </table>
 <?php
  }
?>
 
           
            <table width="100%" style="height: 20" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="75" height="71">
                <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/footer_left_b.gif" width="75" height="71" alt="image"></td>
             <td width="100%" align="center" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/footer_middle.gif)" height="10" class="smallText">

<?php
/*
  The following copyright announcement can only be
  appropriately modified or removed if the layout of
  the site theme has been modified to distinguish
  itself from the default osCommerce-copyrighted
  theme.

  For more information please read the following
  Frequently Asked Questions entry on the osCommerce
  support site:

  http://www.oscommerce.com/community.php/faq,26/q,50

  Please leave this comment intact together with the
  following copyright announcement.
*/

  echo FOOTER_TEXT_BODY
?>
                </td>
                <td width="75" height="71">
                <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/footer_right_b.gif" width="75" height="71" alt="image"></td>
              </tr>
            </table>
<?php
}
// BOF: WebMakers.com Added: Center Shop Bottom of the tables are in footer.php
if (SITE_WIDTH!='100%') {
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
<br>
</body>
</html>
