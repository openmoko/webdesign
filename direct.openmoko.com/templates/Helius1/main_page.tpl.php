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
<?php
// WebMakers.com Added: Down for Maintenance
// Hide header if not to show
if (DOWN_FOR_MAINTENANCE_HEADER_OFF =='false') {

if (SITE_WIDTH!='100%') {
?>
    <table width="100%" cellpadding="10" cellspacing="0" border="0" BGCOLOR="#ffffff">
      <tr><td>
        <table CELLSPACING="2" CELLPADDING="4" BORDER="0" width="<?php echo SITE_WIDTH;?>" align="center" BGCOLOR="#FFFFFF">
      <tr>
        <td>
        <table border="1" width="100%" style="border-color:#000000;  border-collapse: collapse" cellpadding="0" cellspacing="0">
          <tr>
            <td>

<?php
}
?>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
        <td width="300" height="112" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/topbg2.gif)"><a href="index.php"><img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/logo.gif" border="0" alt="" width="400" height="112"></a></td>
        <td width="376" height="112" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/logo2.gif)">

<?php
// show Cart Details
 if (SHOW_CART_DETAILS_HEADER=='1') {
?>
  <table border="0" width="100%" cellspacing="0" cellpadding="0">
    <tr>
      <td class="ShowCartDetails" align="right" height="30" valign="middle">
        <?php echo '[ ' . $cart->count_contents() . ($cart->count_contents() == "1" ? " Item" : " Items "); ?> &nbsp;&nbsp; <?php echo $currencies->format($cart->show_total()); ?> &nbsp;&nbsp; <?php echo $cart->show_weight() . ($cart->show_weight() == "1" ? " lb" : " lbs ");?>&nbsp;]&nbsp;&nbsp;
      </td>
    </tr>
  </table>
<?php
}
?></td>
  </tr>
</table>
<?php
}
?>
<?php // BOF: WebMakers.com Added: Show Header Link Buttons
 if (SHOW_HEADER_LINK_BUTTONS =='yes') {
if (DOWN_FOR_MAINTENANCE =='false') {
?>
  <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/bg_cat4.gif);">
    <tr><td>
      <table border="0" cellspacing="0" cellpadding="0" align="center" class="HeaderBackground">

        <tr>
          <td height="28" width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><?php echo '<a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_DEFAULT) . '">' . HEADER_LINKS_DEFAULT . '</a>'; ?></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"> </td>
          <td height="28" width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><?php echo '<a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_PRODUCTS_NEW) . '">' . HEADER_LINKS_WHATS_NEW . '</a>'; ?></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"> </td>
          <td height="28" width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><?php echo '<a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_SPECIALS) . '">' . HEADER_LINKS_SPECIALS . '</a>'; ?></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"> </td>
          <td height="28" width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><?php echo '<a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_REVIEWS) . '">' . HEADER_LINKS_REVIEWS . '</a>'; ?></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"> </td>


 <?php
      if (!tep_session_is_registered('noaccount')){// DDB - PWA - 040622 - no display of logoff for PWA customers
         if (!tep_session_is_registered('customer_id')) {
        echo ' <td width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_LOGIN) . '">' . HEADER_LINKS_LOGIN . '</a></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"></td>';

         } else {
         echo ' <td width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"> <a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_ACCOUNT) . '">' . HEADER_LINKS_ACCOUNT_INFO . '</a></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"></td>';

        }
         }

     if (tep_session_is_registered('noaccount')) // DDB - PWA - 040622 - no display of account for PWA customers
       {
     if (!tep_session_is_registered('customer_id')) {
        echo ' <td width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_LOGIN, "", "SSL") . '">' . HEADER_LINKS_LOGIN . '</a></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"></td>';
   }else{
        echo ' <td width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_LOGOFFN, "", "SSL") . '">' . HEADER_LINKS_LOGOFF . '</a></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"></td>';
      }
      }
       ?>

            <td width="12" class="HeaderPageLinksLeft" align="left" valign="middle"> </td><td class="HeaderPageLinks" align="center" valign="middle" width="107"><?php echo '<a class="HeaderPageLinks" href="' . tep_href_link(FILENAME_ALL_PRODS) . '">' . HEADER_LINKS_PRODUCTS_ALL . '</a>'; ?></td><td width="14" class="HeaderPageLinksRight" align="right" valign="middle"></td>

        </tr>
        <tr>
          <td colspan="7"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '3'); ?></td>
        </tr>
      </table>
<?php
 }
}
?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="3" cellpadding="<?php echo CELLPADDING_MAIN; ?>" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/bg_cat4.gif);">
  <tr>
<?php
if (DISPLAY_COLUMN_LEFT == 'yes')  {
// WebMakers.com Added: Down for Maintenance
// Hide column_left.php if not to show
if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false') {
?>
    <td width="<?php echo BOX_WIDTH_LEFT; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH_LEFT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_LEFT; ?>">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_LEFT); ?>
<!-- left_navigation_eof //-->
    </table></td>
<?php
}
}
?>
<!-- content //-->
    <td width="100%" valign="top">
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
  //if (substr(basename($PHP_SELF), 0, 7) !='account') {
if (DISPLAY_COLUMN_RIGHT == 'yes')  {
if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF =='false') {
?>
    <td width="<?php echo BOX_WIDTH_RIGHT; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH_RIGHT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_RIGHT; ?>">
<!-- right_navigation //-->
<?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_RIGHT); ?>
<!-- right_navigation_eof //-->
    </table></td>
<?php
//}
}}
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
        <table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
      <tr valign="top">
        <td><img src="templates/Helius/images/7px.gif" width="1" height="1" border="0" alt=""></td>
</tr></table>
<table width="100%" border="0" cellspacing="0" cellpadding="4">
  <tr>
    <td bgcolor="#6C88AC">
<br>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="smallText">

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
<br>
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
  </tr>
</table>
<?php
}

// BOF: WebMakers.com Added: Center Shop Bottom of the tables are in footer.php
if (SITE_WIDTH!='100%') {
?>      </table> </table>
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
