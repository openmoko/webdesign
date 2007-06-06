<?php
// WebMakers.com Added: Down for Maintenance
// Hide header if not to show
if (DOWN_FOR_MAINTENANCE_HEADER_OFF =='false') {
if (SITE_WIDTH!='100%') {
?>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
 <tbody>
  <tr>
    <td>
    <table CELLSPACING="0" CELLPADDING="0" BORDER="0" width="<?php echo SITE_WIDTH; ?>" align="center">
      <tbody>
      <tr>
        <td>
        <table border="0" width="100%">
          <tbody>
          <tr>
            <td>
      <?php } ?>
<table WIDTH="<?php echo SITE_WIDTH;?>" BORDER="0" CELLSPACING="0" CELLPADDING="0">
<tr>
<td style="background-image: url('<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_01ab.gif');background-repeat: repeat-x;"  WIDTH=279 HEIGHT=16>
<?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?>
</td>
<td style="background-image: url('<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_02.gif');background-repeat: repeat-x;">
<?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?>
</td>
<tr>
<td><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_01d.gif" WIDTH=279 ALT=""></td>
<td>
<table WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">
<tr>
<td width="100%"> </td>
</tr>
<tr>
<td> <table WIDTH="100%" BORDER="0" CELLPADDING="0" CELLSPACING="0">

<tr>
<td HEIGHT="60" ALIGN="center">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
  if ($banner = tep_banner_exists('dynamic', '468x50')) {
?>
  <tr class="ShowCartDetails">
    <td align="center"><?php echo tep_display_banner('static', $banner); ?></td>
</tr>
<?php
 }
?>
<tr>
 <td>
  <table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" class="ShowCartDetails">
<?php
if (SHOW_CART_IN_HEADER =='yes'){
 require(DIR_WS_INCLUDES . FILENAME_SEARCH_IN_HEADER); 
  }?>
  </td>
    <td align="center" class="ShowCartDetails">
<?php
   if (SHOW_CART_IN_HEADER =='yes') {
      echo  $cart->count_contents() . ($cart->count_contents() == "1" ? TEXT_CART_COUNT : TEXT_CART_COUNTS); ?> &nbsp;&nbsp; <?php echo $currencies->format($cart->show_total()); ?> &nbsp;&nbsp; <?php echo $cart->show_weight() . ($cart->show_weight() == "1" ? TEXT_CART_WEIGHT : TEXT_CART_WEIGHTS);?>&nbsp;&nbsp;&nbsp;
<?php
 }
?>
   </td>
   </tr>
   </table>
   </td>
  </tr>
</table>

</td>

</tr>
</table></td>
<tr>
<td width="100%"></td>
</tr>
</table></td>
</tr>
</table>
<table WIDTH="<?php echo SITE_WIDTH;?>" BORDER="0" CELLSPACING="0" CELLPADDING="0">
<tr>
<td width="100%" style="background-image: url('<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_11.gif');background-repeat: repeat-x;"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_05.gif" WIDTH=261 HEIGHT=23 alt="<?php echo IMAGE_ALT;?>"></td>
<td WIDTH="20"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_09.gif" WIDTH=20 HEIGHT=23 ALT=""></td>
<td WIDTH="48"><a class="headerNavigation" href="<?php echo tep_href_link(FILENAME_DEFAULT);?>"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/home.gif" ALT="<?php echo ALT_HOMEPAGE;?>" WIDTH=48 HEIGHT=23 BORDER="0"></a></td>
<td WIDTH="20"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_07.gif" WIDTH=20 HEIGHT=23 ALT=""></td>

 <?php
      if (!tep_session_is_registered('noaccount')){// DDB - PWA - 040622 - no display of logoff for PWA customers
         if (!tep_session_is_registered('customer_id')) {
        echo ' <td WIDTH="94"><a class="headerNavigation" href="' . tep_href_link(FILENAME_LOGIN, "", "SSL") . '"> <img SRC="' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/login.gif" ALT="'.LOGIN_ALT.'" WIDTH=54 HEIGHT=23 BORDER="0"></a></td>';
          } else {
        echo '<td WIDTH="54"> <a class="headerNavigation" href="' . tep_href_link(FILENAME_ACCOUNT, "", "SSL") . '"><img SRC="' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/my_account.gif" ALT="'.MYACCOUNT_ALT.'" WIDTH=94 HEIGHT=23 BORDER="0"></a></td>';
          }
         }

     if (tep_session_is_registered('noaccount')) // DDB - PWA - 040622 - no display of account for PWA customers
       {
     if (!tep_session_is_registered('customer_id')) {
        echo '<td WIDTH="54"> <a class="headerNavigation" href="' . tep_href_link(FILENAME_LOGIN, "", "SSL") . '"><img SRC="' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/login.gif" ALT="'.LOGIN_ALT.'" WIDTH=94 HEIGHT=23 BORDER="0"></a></td>';
   }else{
        echo '<td WIDTH="54"> <a class="headerNavigation" href="' . tep_href_link(FILENAME_LOGOFF, "", "SSL") . '"><img SRC="' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/logoff.gif" ALT="'.LOGOFF_ALT.'" WIDTH=54 HEIGHT=23 BORDER="0"></a></td>';
      }
      }
       ?>
<td WIDTH="20"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_07.gif" WIDTH=20 HEIGHT=23 ALT=""></td>
<td WIDTH="93"><a class="headerNavigation" href="<?php echo tep_href_link(FILENAME_SPECIALS);?>"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/specials.gif" ALT="<?php echo SPECIALS_ALT;?>" WIDTH=94 HEIGHT=23 BORDER="0"></a></td>
<td WIDTH="20"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_07.gif" WIDTH=20 HEIGHT=23 ALT=""></td>
<td WIDTH="94"><a class="headerNavigation" href="<?php echo tep_href_link(FILENAME_PRODUCTS_NEW);?>"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/whatsnew.gif" ALT="<?php echo WHATS_NEW_ALT;?>" WIDTH=94 HEIGHT=23 BORDER="0"></a></td>
<td WIDTH="20"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_07.gif" WIDTH=24 HEIGHT=23 ALT=""></td>
<td WIDTH="94"><a class="headerNavigation" href="<?php echo tep_href_link(FILENAME_CONTACT_US, '', 'SSL');?>"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/contact_us.gif" ALT="<?php echo CONTACT_US_ALT;?>" WIDTH=94 HEIGHT=23 BORDER="0"></a></td>
<td WIDTH="20"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_07.gif" WIDTH=20 HEIGHT=23 ALT=""></td>
</tr>
</table>

<table WIDTH="100%" BORDER="0" CELLSPACING="0" CELLPADDING="0">

<tr>
<td WIDTH="218"><img SRC="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/under_header.gif" WIDTH="218" HEIGHT="48" alt="<?php echo IMAGE_ALT;?>"></td>
<td WIDTH="50%" align="center">

<?php  if (SHOW_LANGUAGES_IN_HEADER=='yes'){ ?>
<td ALIGN="CENTER" WIDTH="<?php echo BOX_WIDTH_RIGHT; ?>">

<?php
 require(DIR_WS_INCLUDES . FILENAME_LANGUAGES_IN_HEADER); ?></td>
<?php } ?>
</tr>
</table>

<?php } ?>
<!-- header_eof //-->
