<?php
/*
  $Id: server_info.php,v 1.6 2003/06/30 13:13:49 dgw_ Exp $


  Copyright (c) 2005 Chainreactionworks.com
  Released under the GNU General Public License
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
    <tr class="content_heading">
        <td>
        <!-- Welcome to the Data Export/Import system -->
    <?php echo WELCOME_TO_DATA_EXPORT_IMPORT_SYSTEM?>
        </td>
        </tr>
        <tr class="content">
        <td>
  <!--  Please use the menu box to the left to select your task.<br><br>
   
   For in depth help use one of the links below <br><br> -->
   <?php echo MSG_1?>
     
</td></tr><tr class="content"><td> <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=1') . '"> '.MSG_2.' </a> <br><br>'; ?>
</td></tr><tr class="content"><td>&nbsp; <?php echo MSG_3?> 
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=2') . '"> '.MSG_4.' </a>'; ?>
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=3') . '"> '.MSG_5.' </a>'; ?>                  
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=4') . '"> '.MSG_6.'</a>'; ?>              
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=5') . '"> '.MSG_7.'</a>'; ?>              
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=6') . '"> '.MSG_8.'</a>'; ?>              
   
</td></tr><tr><td class="content"> &nbsp; <!-- Data Feeder: --> <?php echo MSG_9?>
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=9') . '">'.MSG_10.'</a>'; ?>
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=10') . '"> '.MSG_11.'</a>'; ?>
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=11') . '"> '.MSG_12.'</a>'; ?>
</td></tr><tr><td> &nbsp;&nbsp;&nbsp; <?php echo '<a href="' . tep_href_link(FILENAME_DATA_HELP, 'help_id=12') . '"> '.MSG_13.'</a>'; ?>

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
