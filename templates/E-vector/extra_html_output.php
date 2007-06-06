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
<td valign="top" width="100%"><table width="100%" border="0" class="maintableBorder" cellspacing="0" cellpadding="0">
  <tbody>

<?php
// BOF: WebMakers.com Added: Show Featured Products
if ((SHOW_HEADING_TITLE_ORIGINAL!='yes') && (tep_not_null($header)) ) {
?>

    <tr>
      <td main_table_heading>
      <table width="100%" border="0" cellpadding="0" cellspacing="4">
        <tbody>
          <tr>
            <td class="productlisting-heading"><?php echo $header;?></td></tr></tbody>
      </table>
      </td>
    </tr>

<?php
}
?>

  <tr>
<td valign="top" width="100%"><table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
<td valign="top" width="100%"><table width="100%" border="0" class="maintableBackground" cellspacing="0" cellpadding="4">
<?php
}

}
  function table_image_border_bottom(){
if (MAIN_TABLE_BORDER == 'yes'){
?>
      </table>
      </td>
    </tr>
      </table>
      </td>
    </tr>
  </tbody>
</table>
      </td>
    </tr>
      <!--Lango Added for Template MOD: EOF-->
<?php
}
}
?>
