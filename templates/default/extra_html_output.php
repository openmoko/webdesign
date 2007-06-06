<?php

////
// The HTML form submit button wrapper function
// Outputs a button in the selected language
  function tep_template_image_submit($image, $alt = '', $parameters = '') {
    global $language;

    $image_submit = '<input type="image" src="' . tep_output_string(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/buttons/' . $language . '/' .  $image) . '" border="0" alt="' . tep_output_string($alt) . '"';

    if (tep_not_null($alt)) $image_submit .= ' title=" ' . tep_output_string($alt) . ' "';

    if (tep_not_null($parameters)) $image_submit .= ' ' . $parameters;

    $image_submit .= '>';

    return $image_submit;
  }

////
// Output a function button in the selected language
  function tep_template_image_button($image, $alt = '', $parameters = '') {
    global $language;

    return tep_image(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/buttons/' . $language . '/' .  $image, $alt, '', '', $parameters);
  }


  function table_image_border_top($left, $right,$header){
if (MAIN_TABLE_BORDER == 'yes'){
?>
      <!--Lango Added for Template MOD: BOF-->
  <tr>
<td valign="top" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
<td valign="top" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                     <tr>
                      <td class="main_table_heading"><table width="100%" border="0" cellspacing="0" cellpadding="1">
                          <tr>

                            <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
                                <tr>
                                  <td class="main_table_heading_inner"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                                      <tr>
                                        <td>

<?php
}

}
  function table_image_border_bottom(){
if (MAIN_TABLE_BORDER == 'yes'){
?>
                                    </table></td>
                                </tr>
                              </table></td>
                          </tr>
      </table></td>
  </tr>
      </table></td>
  </tr>
      </table>
      <!--Lango Added for Template MOD: EOF-->
<?php
}
}


  function table_image_main_border_top($left, $right, $header){
if (MAIN_TABLE_BORDER == 'yes'){
?>
      <!--Lango Added for Template MOD: BOF-->
  <tr>
<td valign="top" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                      <td><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                          <tr>

                            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td><table width="100%" border="0" cellspacing="0" cellpadding="4">
                                      <tr>
                                        <td class="infoBoxHeading"><?php echo $header;?></td>
                                      </tr>
                                    </table></td>
                                </tr>

                              </table></td>
                          </tr>

      </table></td>
  </tr>
  <tr>
<td valign="top" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                     <tr>
                      <td class="main_table_heading"><table width="100%" border="0" cellspacing="0" cellpadding="1">
                          <tr>

                            <td><table width="100%" border="0" cellspacing="0" cellpadding="1">
                                <tr>
                                  <td class="main_table_heading_inner"><table width="100%" border="0" cellspacing="0" cellpadding="4">
                                      <tr>
                                        <td>

<?php
}

}


  function table_image_main_border_bottom(){
if (MAIN_TABLE_BORDER == 'yes'){
?>
         </table></td>
        </tr>
         </table></td>
        </tr>
      </table></td>
  </tr>
      </table></td>
  </tr>
      </table>
      <!--Lango Added for Template MOD: EOF-->
<?php
}
}


// this function is used to product a header for module sused as center content.
//it is used with the function table_center_module_footer
  function table_center_module_header($header1){
?>
      <!--Lango Added for Template MOD: BOF-->
  <tr><td>    
<?php
echo '<table border="' . tep_output_string(TEMPLATE_TABLE_BORDER) . '" width="' . tep_output_string(TEMPLATE_TABLE_WIDTH) . '" cellspacing="' . tep_output_string(TEMPLATE_TABLE_CELLSPACING) . '" cellpadding="' . tep_output_string(TEMPLATE_TABLE_CELLPADDIING) . '">';

?>

  <tr>
    <td height="14" class="infoBoxHeading"><?php echo tep_image(TEMPLATE_BOX_IMAGE_TOP_LEFT,  'image', '', '', 'border=\"0\"');?></td>
    <td width="100%" align ="center" height="14" class="infoBoxHeadingImage"><?php echo $header1 ;?></td>
    <td height="14" class="infoBoxHeading" nowrap><?php echo tep_image(TEMPLATE_BOX_IMAGE_TOP_RIGHT,  'image', '', '', 'border=\"0\"');?></td>
  </tr>
</table>
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo TEMPLATE_TABLE_CENTER_CONTENT_CELLPADING;?>" class="templateinfoBox">
  <tr>
<?php echo '<td align="left"  width="'. CELLPADDING_SUB .'" style="background-image: url(\'' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/infobox/box_bg_l.gif\');background-repeat: repeat-y; background-width: ' . CELLPADDING_SUB . ';"></td>  <td';
 ?>
 <table border="0" width="100%" cellspacing="0" cellpadding="' . TEMPLATE_TABLE_CENTER_CONTENT_CELLPADING . '" >
   <tr>
    <td><img src="images/pixel_trans.gif" border="0" alt="" width="100%" height="1"></td>
  </tr>
      <?php
      //begin body
      ?>
<?php
}


function table_center_module_footer(){
?>
</table>
</td>
<?php echo '<td width="'.SIDE_BOX_RIGHT_WIDTH.'" style="background-image: url(\'' . DIR_WS_TEMPLATES . TEMPLATE_NAME . '/images/infobox/box_bg_r.gif\');background-repeat: repeat-y;"></td>' . "\n";
  ?>
  </tr>
</table>
<?php
 //footer code
 if (TEMPLATE_INCLUDE_FOOTER =='true'){
 ?>
 <table border="0" width="100%" cellspacing="0" cellpadding="0">
   <tr>
     <td class="infoBoxFooter"><img src="<?php echo TEMPLATE_BOX_IMAGE_FOOT_LEFT ;?>" border="0" alt=""></td>
     <td  align="center" style="background-image: url(<?php echo TEMPLATE_BOX_IMAGE_FOOT_BACKGROUND ;?>); background-repeat: repeat-x; background-position: right;" width="100%"  class="infoBoxFooterImage"><img src="images/pixel_trans.gif" border="0" alt="image" width="100%" height="1"></td>
     <td class="infoBoxFooter"><img src="<?php echo TEMPLATE_BOX_IMAGE_FOOT_RIGHT ;?>" border="0" alt="image" ></td>
   </tr>
</table>
<?php
} else{

}


 ?>
 </td></tr>
<?php
}
?>
