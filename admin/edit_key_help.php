<?php
/*

  Copyright (c) 2005 Chainreactionworks.com

  Released under the GNU General Public License
  Original Auhtor:
  Updates by:
  
*/
  require('includes/application_top.php');

?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script language="javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=450,height=300%,screenX=150,screenY=150,top=150,left=150')
}
//--></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
        <!-- left_navigation //-->
        <?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
        <!-- left_navigation_eof //-->
      </table></td>
    <!-- body_text //-->
    <?php
 require(DIR_WS_LANGUAGES . $language . '/help/edit_key_help.php') ;

//print("help_id : ".$help_id."<br>");

 if ($help_id == '1') {  
define('HEADING_TITLE', HEADING_TITLE_01);
}
 if ($help_id == '2') {  
define('HEADING_TITLE', HEADING_TITLE_02);
}
if ($help_id == '3') {  
define('HEADING_TITLE', HEADING_TITLE_03);
}
 if ($help_id == '4') {  
define('HEADING_TITLE', HEADING_TITLE_04);
}
if ($help_id == '5') {  
define('HEADING_TITLE', HEADING_TITLE_05);
}
if ($help_id == '6') {  
define('HEADING_TITLE', HEADING_TITLE_06);
}
if ($help_id == '7a') {  
define('HEADING_TITLE', HEADING_TITLE_07a);
}
if ($help_id == '7b') {  
define('HEADING_TITLE', HEADING_TITLE_07b);
}
if ($help_id == '7c') {  
define('HEADING_TITLE', HEADING_TITLE_07c);
}
?>

    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2" class="menuBoxHeading">
        <tr>
          <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                     <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
              <tr>
                       <tr>
                <td class="pageHeading"><?php echo HEADING_TITLE ; ?></td>
              </tr>
              <tr>
                <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
        </tr>
        <tr class="attributeBoxContent">
          <td><?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;'  ; ?> </td>
        </tr>
        <tr valign="top">
          <td><p><font class="content_heading"><b><!-- Index --><?php echo TEXT_MAG_1?></font> <br>
              <strong><!-- Introduction:  --><?php echo HEADING_TITLE_01?></strong></p>
            <ol>
              <li><a href="edit_key_help.php?&help_id=1"><!-- Pre install and installation of Encrypt and Decrypt --><?php echo TEXT_MAG_2?></a></li>
              <li><a href="edit_key_help.php?&help_id=2"><!-- Configure Encrypt and Decrypt --><?php echo HEADING_TITLE_02?></a> </li>
              <li><a href="edit_key_help.php?&help_id=3"><!-- Key management --><?php echo HEADING_TITLE_03?></a></li>
              <li><a href="edit_key_help.php?&help_id=4"><!-- Encrypt and Decrypt data --><?php echo HEADING_TITLE_04?></a></li>
              <li><a href="edit_key_help.php?&help_id=5"><!-- Changing your key --><?php echo HEADING_TITLE_05?></a> </li>
              <li><a href="edit_key_help.php?&help_id=6"><!-- Test --><?php echo HEADING_TITLE_06?></a></li>
              <li> <!-- Specific task: --> <?php echo TEXT_MAG_3?><br>
                <a href="edit_key_help.php?&help_id=7a"><!-- A. Encrypted data --><?php echo TEXT_MAG_4?><br>
                </a><a href="edit_key_help.php?&help_id=7b"><!-- B. Decrypting data --><?php echo TEXT_MAG_5?><br>
                </a><a href="edit_key_help.php?&help_id=7c"><!-- C. Changing keys and updating encrypted data --><?php echo TEXT_MAG_6?></a></li>
          </ol></td>
        </tr>
        <tr>
          <td>
                         <tr>
                     <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                       <tr>
                         <td class="pageHeading"><?php echo HEADING_TITLE ; ?></td>
                        </tr>
                        <tr>
                        <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                       </tr>
                     </table></td>
                   </tr>
<tr class="attributeBoxContent">

 <td>
 <?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;'  ; ?>
</td>
</tr>
  <tr>
    <td>
            <font face="Arial"><b><!-- Index --><?php echo TEXT_MAG_1?>
            <br><a href="edit_key_help.php?&help_id=1"> Introduction:
            <br> 1.<!--  Pre install and installation of Encrypt and Decrypt : --><?php echo TEXT_MAG_2?></a>
            <br><a href="edit_key_help.php?&help_id=2">2. <!-- Configure Encrypt and Decrypt --><?php echo HEADING_TITLE_02?></a>
      <br><a href="edit_key_help.php?&help_id=3">3. <!-- Key management --><?php echo HEADING_TITLE_03?>:</a>
            <br><a href="edit_key_help.php?&help_id=4">4. <!-- Encrypt and Decrypt data --><?php echo HEADING_TITLE_04?>:</a>
            <br><a href="edit_key_help.php?&help_id=5">5. <!-- Changing your key --><?php echo HEADING_TITLE_05?>:</a>
            <br><a href="edit_key_help.php?&help_id=6">6. <?php echo HEADING_TITLE_06?>. </a>
            <br>7. <!-- Specific task --><?php echo TEXT_MAG_3?>:
            <br> &nbsp;&nbsp;<a href="edit_key_help.php?&help_id=7a"><!-- A. Encrypted data that is not encrypted: --><?php echo HEADING_TITLE_07a?></a>
            <br> &nbsp;&nbsp;<a href="edit_key_help.php?&help_id=7b"><!-- B. Decrypting data that is encrypted --><?php echo HEADING_TITLE_07b?></a>
            <br> &nbsp;&nbsp;<a href="edit_key_help.php?&help_id=7c"><!-- C. Changing keys and updating encrypted data --><?php echo HEADING_TITLE_07c?></b></font></a>
    </td>
   </tr>
    <tr>
        <td>
 
   </tr>
    <tr>
        <td>
 <?php if ($help_id == '1') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page1.html') ;
}
 if ($help_id == '2') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page2.html') ;
}
 if ($help_id == '3') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page3.html') ;
}
 if ($help_id == '4') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page4.html') ;
}

 if ($help_id == '5') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page5.html') ;
}

 if ($help_id == '6') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page6.html') ;
}

 if ($help_id == '7a') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page7a.html') ;
}

 if ($help_id == '7b') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page7b.html') ;
}

 if ($help_id == '7c') {  
include(DIR_WS_LANGUAGES . $language . '/help/encrypt/encrypt_page7c.html') ;
}

?>

</td>
  </tr>
<tr>
 <td>
&nbsp; &nbsp;  
               <?php echo tep_draw_form('crypt', FILENAME_EDIT_KEY_HELP, '&selected_box=crypt&help_id=1', 'post', '', 'SSL');?>
               <?php echo tep_image_submit('button_return.gif', IMAGE_return) ; ?>
                     </form>

 </td>
</tr>      
      
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
