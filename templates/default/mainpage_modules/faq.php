<?php
  require(DIR_WS_LANGUAGES . $language . '/faq_mainpage.php');

$faq_categories_query_1 = tep_db_query("select ic.categories_id, icd.categories_name from " . TABLE_FAQ_CATEGORIES . " ic, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " icd where icd.categories_id = ic.categories_id and icd.language_id = '" . (int)$languages_id . "' and ic.categories_status = '1' order by rand() limit " . MAX_DISPLAY_MODULES_FAQ_CATEGORY);
?>
<tr>
<td valign="top" width="100%">
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB;?>">

<?php
//header
  $info_box_contents = array();
  $info_box_contents[] = array('text' => TABLE_HEADING_NEW_FAQ);

  new contentBoxHeading($info_box_contents, '');

?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
       <td cellpadding="0" align="left"  width="<?php echo SIDE_BOX_LEFT_WIDTH ;?>" style="background-image: url('<?php echo TEMPLATE_BOX_MIDDLE_LEFT_IMAGE ;?>');background-repeat: repeat-y;"><img src="<?php echo TEMPLATE_BOX_MIDDLE_LEFT_IMAGE ;?>" alt="box" width="<?php echo SIDE_BOX_LEFT_WIDTH ;?>" height="1"></td>
          <td class="main_table_heading"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class ="templateinfobox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                        <td class= "boxText">
                         <table width="100%"  border="0" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB ;?>">
  
<?php
echo '<tr><td class="main" valign="top">';
  while ($faq_categories_1 = tep_db_fetch_array($faq_categories_query_1)) {
   $faq_categories_1_id = $faq_categories_1['categories_id'];
   echo '<a href="' . tep_href_link(FILENAME_FAQ, 'cID=' . $faq_categories_1['categories_id']) . '">' . $faq_categories_1['categories_name'] . '</a><br>';
    
  $faq_query_a = tep_db_query("select ip.faq_id, ip.question from " . TABLE_FAQ . " ip, " . TABLE_FAQ_TO_CATEGORIES . " ip2c where ip.faq_id = ip2c.faq_id and ip2c.categories_id = '" . $faq_categories_1_id . "' and ip.visible = '1' ");
  while ($faq_a = tep_db_fetch_array($faq_query_a)) {
    echo '<a href="' . tep_href_link(FILENAME_FAQ, 'fID=' . $faq_a['faq_id']) . '">' . $faq_a['question'] . '</a><br>';

   }
 } 
echo '</td></tr>';  
?>

          <tr>
            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
  
                      </tr>
                     </table></td>  
                   </tr>
               </table></td> 
            </tr> 
         </table></td> 
  <td cellpadding="0" cellspacing="0" align="left" width="<?php echo SIDE_BOX_RIGHT_WIDTH ;?>" style="background-image: url('<?php echo TEMPLATE_BOX_MIDDLE_RIGHT_IMAGE ;?>');background-repeat: repeat-y;"><img src="<?php echo TEMPLATE_BOX_MIDDLE_RIGHT_IMAGE ;?>" alt="box" width="<?php echo SIDE_BOX_RIGHT_WIDTH ;?>" height="1"></td>
      </tr>
  </table></td>    
  </tr>
</table>

<?php

 if (TEMPLATE_INCLUDE_FOOTER =='true'){
   $info_box_contents = array();
   $info_box_contents[] = array('align' => 'left',
                                 'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                               );
  new contentBoxFooter($info_box_contents);
}
?>

<!--faq mainpage //-->