<?php
/*
  $Id: validate_New.php,v 1.1.1.1 2004/03/04 23:38:20 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License

 THIS IS BETA - Use at your own risk!
  Step-By-Step Manual Order Entry Verion 0.5
  Customer Entry through Admin
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
    <td width="30">&nbsp;</td>
    <td width="100%" valign="top">
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
           <tr>
              <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            </tr>
          </table></td>
        </tr>
        <!--    <tr><td class="smallText"><br><br>PUT YOUR TEXT HERE</td></tr> -->
        <!-- Advertising Insert Start -->
        <p><img src="<?php echo DIR_WS_IMAGES . 'loaded_3box_ad.jpg'; ?>" width="550" height="198" alt="box ad" /><br /></p>
        <table width="550" border="0" cellspacing="1" cellpadding="2">
          <tr>
            <td>
              <p class="style4">CRE Loaded Professional Version is the perfect application
              to power your e-Commerce websites. However, if you need features that
              only a powerfull Business to Business level application can deliver, please take 
              a look at all the powerful options our B2B Version adds. Our CRE Loaded B2B 
              has added features to enhance sales and productivity.</p>
              <p class="style4">Feel free to contact us for more details or usage guidelines. </p>
            </td>
          </tr>
          <tr><td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td></tr>
          <tr>
            <td align="center">
              <a href="http://www.creloaded.com/index.php?cPath=30_31)" target="_blank"><img border="0" src="<?php echo DIR_WS_IMAGES . 'button_upgrade_now.gif'; ?>" ALT="IMAGE_UPGRADE"></a>
            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
        </table>
        <!-- Advertising Insert End -->   
      </table></form>
    </td>
    <!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->
<!-- footer //-->
<?php
    require(DIR_WS_INCLUDES . 'footer.php');
?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>