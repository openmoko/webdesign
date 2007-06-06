<?php
/*

  Copyright (c) 2005 Chainreactionworks.com

  Released under the GNU General Public License
  Original Auhtor:
  Updates by:
  
*/
  require('includes/application_top.php');
  //basic langage defines
require(DIR_WS_LANGUAGES . $language . '/help/data_help.php')

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

<?php if ($help_id == '1') {  
define('HEADING_TITLE', HEADING_TITLE1);
}
if ($help_id == '2') {  
define('HEADING_TITLE', HEADING_TITLE2);
}
if ($help_id == '3') {  
define('HEADING_TITLE', HEADING_TITLE3);
}
if ($help_id == '4') {  
define('HEADING_TITLE', HEADING_TITLE4);
}
if ($help_id == '5') {  
define('HEADING_TITLE', HEADING_TITLE5);
}
if ($help_id == '6') {  
define('HEADING_TITLE', HEADING_TITLE6);
}
if ($help_id == '9') {  
define('HEADING_TITLE', HEADING_TITLE9);
}
if ($help_id == '10') {  
define('HEADING_TITLE', HEADING_TITLE10);
}
if ($help_id == '11') {  
define('HEADING_TITLE', HEADING_TITLE11);
}
if ($help_id == '12') {  
define('HEADING_TITLE', HEADING_TITLE12);
}

?>
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2" class="menuBoxHeading">
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
<?php
if ($help_id == '1') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_intro.html') ;
}
if ($help_id == '2') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_import.html') ;
}
 if ($help_id == '3') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_export.html') ;
}
 if ($help_id == '4') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_basicimport.html') ;
}
 if ($help_id == '5') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_basicexport.html') ;
}
 if ($help_id == '6') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_spreadsheet.html') ;
}
if ($help_id == '9') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_feed_intro.html') ;
}
if ($help_id == '10') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_frooglebacisgettingstarted.html') ;
}
if ($help_id == '11') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_froogleconfigure.html') ;
}
if ($help_id == '12') {  
include(DIR_WS_LANGUAGES . $language . '/help/ep/data_frooglerun.html') ;
}

?>
       </td>
      </tr>
  <tr>
   <td>
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


