<?php
// WebMakers.com Added: Down for Maintenance
// Hide header if not to show
if (DOWN_FOR_MAINTENANCE_HEADER_OFF =='false') {
if (SITE_WIDTH!='100%') {
?>
<table width="<?php echo SITE_WIDTH; ?>" cellpadding="0" cellspacing="0" border="0" align="center">
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
            <div align="center">
              <br>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                  <td width="500">
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_title.gif" width="421" height="73" alt="<?php echo IMAGE_ALT;?>"></td>
           <td style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/header_background.gif)" width="100%" height="73">
      <?php if (SHOW_CART_IN_HEADER=='yes') { ?>
                  <table border="0" width="100%" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr class="header">
                      <td class="ShowCartDetails" align="right" height="30" valign="middle">
                      <?php echo '<a class="ShowCartDetails" href="' . tep_href_link(FILENAME_SHOPPING_CART) . '">' . tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/kart1.gif') . '</a>&nbsp;&nbsp;[ ' . $cart->count_contents() . ($cart->count_contents() == "1" ? " Item" : " Items "); ?> &nbsp;&nbsp; <?php echo $currencies->format($cart->show_total()); ?> &nbsp;&nbsp; <?php echo $cart->show_weight() . ($cart->show_weight() == "1" ? " lb" : " lbs ");?>&nbsp;] </td>
                    </tr>
                  </tbody>
                  </table>
<?php
// Bof Shopping Cart Box Enhancement
$showcheckoutbutton = 1; // set to 1: show checkout button (default); set to 0: never show checkout button
$showhowmuchmore = 1;    // set to 1: show how much more to spend for free shipping (default); set to 0: don't show

echo '<table border="0" cellpadding="0" cellspacing="0" width="100%">';



if (($showcheckoutbutton==1)&&($cart->count_contents() > 0)) {
  echo '<tr><td align="center"><a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">' . tep_template_image_button('button_checkout.gif', IMAGE_BUTTON_CHECKOUT) . '</a></td></tr>';
}
echo '</table>';

// Eof Shopping Cart Box Enhancement


      } ?>
                  </td>
                  <td>
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/header_right.gif" width="80" height="73" alt="<?php echo IMAGE_ALT;?>"></td>
                </tr>
              </tbody>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                  <td width="345">
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/slogan.gif" width="345" height="23" alt="<?php echo IMAGE_ALT;?>"></td>
           <td width="100%" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/slogan_middle.gif)">
                  </td>
                  <td width="1" bgcolor="#798CCC">
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt=<?php echo IMAGE_ALT;?>"></td>
                </tr>
              </tbody>
              </table>
               <table width="100%" style="height: 20" border="0" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                  <td width="1" bgcolor="#798CCC">
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="<?php echo IMAGE_ALT;?>"></td>
                  <td width="33%" bgcolor="#D2DBF5"></td>
                  <td width="77%" bgcolor="#D2DBF5" align="right">

<?php
// show languages in header
  if (SHOW_LANGUAGES_IN_HEADER=='yes') require(DIR_WS_INCLUDES . 'languages_in_header.php'); ?></td>
                  <td width="5" bgcolor="#D2DBF5">&#160;</td>
                  <td width="1" bgcolor="#798CCC">
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="<?php echo IMAGE_ALT;?>"></td>
                </tr>
              </tbody>
              </table>
<?php
// show link buttons in header
 if (SHOW_HEADER_LINK_BUTTONS=='yes')  include(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/links.htm');
?>
              <table width="100%" style="height: 20" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="1" bgcolor="#798CCC">
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="<?php echo IMAGE_ALT;?>"></td>
                  <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                  <td bgcolor="#D2DBF5">&nbsp;</td>
                  <td width="5" bgcolor="#D2DBF5">&nbsp;</td>
                  <td width="1" bgcolor="#798CCC">
                  <img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/Pixel.gif" width="1" height="1" alt="<?php echo IMAGE_ALT;?>"></td>
                </tr>
              </table>
            </div>

<?php } ?>
<!-- header_eof //-->