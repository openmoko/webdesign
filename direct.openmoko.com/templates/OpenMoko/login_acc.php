<?php
//BOF: MaxiDVD Returning Customer Info SECTION
//===========================================================
$returning_customer_title = HEADING_RETURNING_CUSTOMER; // DDB - 040620 - PWA - change TEXT by HEADING
if ($setme != '')
{
$returning_customer_info = "
<!--Confirm Block-->
<td width=\"50%\" height=\"100%\" valign=\"top\"><table border=\"0\" width=\"100%\" height=\"100%\" cellspacing=\"1\" cellpadding=\"2\" class=\"infoBox\">
<tr class=\"infoBoxContents\">
<td>
<table border=\"0\" width=\"100%\" height=\"100%\" cellspacing=\"0\" cellpadding=\"2\">
 <tr>
   <td colspan=\"2\">".tep_draw_separator('pixel_trans.gif', '100%', '10')."</td>
 </tr>
 <tr>
   <td class=\"main\" colspan=\"2\">".TEXT_YOU_HAVE_TO_VALIDATE."</td>
 </tr>
 <tr>
   <td colspan=\"2\">".tep_draw_separator('pixel_trans.gif', '100%', '10')."</td>
 </tr>
 <tr>
   <td class=\"main\"><b>". ENTRY_EMAIL_ADDRESS."</b></td>
   <td class=\"main\">". tep_draw_input_field('email_address')."</td>
 </tr>
 <tr>
   <td class=\"main\"><b>". ENTRY_VALIDATION_CODE."</b></td>
   <td class=\"main\">".tep_draw_input_field('pass').tep_draw_input_field('password',$HTTP_POST_VARS['password'],'','hidden')."</td>
 </tr>
 <tr>
   <td colspan=\"2\">".tep_draw_separator('pixel_trans.gif', '100%', '10')."</td>
 </tr>
 <tr>
   <td class=\"smallText\" colspan=\"2\">". '<a href="' . tep_href_link('validate_new.php', '', 'SSL') . '">' . TEXT_NEW_VALIDATION_CODE . '</a>'."</td>
 </tr>
 <tr>
   <td colspan=\"2\">". tep_draw_separator('pixel_trans.gif', '100%', '10')."</td>
 </tr>
 <tr>
   <td colspan=\"2\"><table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"2\">
     <tr>
       <td width=\"10\">". tep_draw_separator('pixel_trans.gif', '10', '1')."</td>
       <td align=\"right\">".tep_template_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE)."</td>
       <td width=\"10\">".tep_draw_separator('pixel_trans.gif', '10', '1')."</td>
     </tr>
</table>
        </table></td>
      </tr>
    </table></form></td>

<!--Confirm Block END-->
";  

}else 
{
$returning_customer_info = "
<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" width=\"100%\" id=\"AutoNumber1\">
  <tr>
    <td width=\"100%\" class=\"main\" colspan=\"2\">" . tep_draw_separator('pixel_trans.gif', '100%', '10') . "</td>
  </tr>
  
  <tr>
    <td class=\"main login_col1\">" . ENTRY_EMAIL_ADDRESS . "</td>
    <td class='total_input'>" . tep_draw_input_field('email_address') . "</td>
  </tr>
  
  <tr>
    <td class=\"main\">" . ENTRY_PASSWORD . "</td>
  	<td class='total_input'>" . tep_draw_password_field('password') . "</td>
  </tr>
  
  <tr>
  	<td colspan='2' style='text-align:right; padding-top: 10px;'>".
	tep_template_image_submit('button_login.gif', IMAGE_BUTTON_LOGIN)  . '<a style="display:block; margin-top: 10px" href="' . tep_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">'  . TEXT_PASSWORD_FORGOTTEN . '</a>'
  	."</td>
  </tr>
</table>
";
}

//===========================================================
$create_account_title = HEADING_NEW_CUSTOMER;
$create_account_info = "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\"  width=\"100%\" id=\"AutoNumber1\">
  <tr>
    <td width=\"100%\" class=\"main\" colspan=\"3\">" . TEXT_NEW_CUSTOMER_INTRODUCTION . "</td>
  </tr>
  <tr>
    <td width=\"100%\" class=\"main\" colspan=\"3\">" . tep_draw_separator('pixel_trans.gif', '100%', '10') . "</td>
  </tr>
  <tr>
    <td width=\"33%\" class=\"main\"></td>
    <td width=\"33%\"></td>
    <td width=\"34%\" rowspan=\"3\" align=\"center\">" . '<a href="' . tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL') . '">' . tep_template_image_button('button_create_account.gif', IMAGE_BUTTON_CREATE_ACCOUNT) . '</a>' . "<br><br></td>
  </tr>
</table>";
//===========================================================
?>

<table width="100%" cellpadding="5" cellspacing="0" border="0">
    <tr>
     <td class="main" width=48% valign="top" align="center">
     
     <table width="100%">
     	<tr>
     		<td class="my_account_title bordered"><?php echo $returning_customer_title ?></td>
     	</tr>
     	<tr>
     		<td style="line-height: 140%; padding-top: 10px;" class="form_table">
     			<?php echo $returning_customer_info ?>
     		</td>
     	</tr>
     </table>
  </td>
  <td>&nbsp;</td>
  <td width="48%" valign="top">
     <table width="100%">
     	<tr>
     		<td class="my_account_title bordered"><?php echo $create_account_title ?></td>
     	</tr>
     	<tr>
     		<td style="line-height: 140%; padding-top: 10px;">
     			<?php echo $create_account_info ?>
     		</td>
     	</tr>
     </table>
  </td>
 </tr>
</table>