<?php 
//product discription

?>

  <tr>
    <td class="main"><table width="100%" border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td class="main" valign="top">
          <?php if (tep_not_null($product_info['products_image'])) { ?>
          <table border="0" cellspacing="0" cellpadding="0" align="right">
              <tr>
                <td><!-- // BOF MaxiDVD: Modified For Ultimate Images Pack! //-->
                  <?php
      if ($product_info['products_image_med']!='') {
        $new_image = $product_info['products_image_med'];
        $image_width = MEDIUM_IMAGE_WIDTH;
        $image_height = MEDIUM_IMAGE_HEIGHT;
      } else {
        $new_image = $product_info['products_image'];
        $image_width = SMALL_IMAGE_WIDTH;
        $image_height = SMALL_IMAGE_HEIGHT;
      }
      echo tep_javascript_image(DIR_WS_IMAGES . $new_image, 'product' . $product_info['products_id'], addslashes($product_info['products_name']), $image_width, $image_height, 'hspace="5" vspace="5"', 'true');
?>
                  <!-- // EOF MaxiDVD: Modified For Ultimate Images Pack! //-->
                  <!-- // BEGIN  Affiliate program mods for 2.5a upgrade DMG  -->
                  <?php
      //affiliate build a link begin
      if (tep_session_is_registered('affiliate_id')) {
        echo '<br><br><a href="' . tep_href_link(FILENAME_AFFILIATE_BANNERS_BUILD, 'individual_banner_id=' . $product_info['products_id']) .'" target="_self">' . tep_template_image_button('button_affiliate_build_a_link.gif', 'Make a link') . ' </a>'; ?>
                  <?php
      }
      //affiliate build a link begin
?>
                  <!-- // EOF Affiliate program 2.5a upgrade mods DMG -->
                </td>
              </tr>
            </table>
          <?php    } ?>
<p><?php echo stripslashes($product_info['products_description']); ?></p>

         </td>
        </tr>
      </table></td>
