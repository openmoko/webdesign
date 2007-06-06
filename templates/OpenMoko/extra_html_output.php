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
  }
  
  function table_image_border_bottom(){
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

?>