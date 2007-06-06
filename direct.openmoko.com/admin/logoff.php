<?php
/*
  $Id: login.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGOFF);

//tep_session_destroy();
  tep_session_unregister('login_id');
  tep_session_unregister('login_firstname');
  tep_session_unregister('login_groups_id');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<meta http-equiv="refresh" content="3" src="<?php echo tep_href_link(FILENAME_LOGIN);?>">
</head>
<body>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<table width="100%"  border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td valign="top" width="150">&nbsp;</td>
    <td valign="top">
      <?php echo tep_draw_separator('pixel_trans.gif', '100%', '40'); ?>
      <table align="center" width="50%"  border="0" cellspacing="0" cellpadding="0" summary="Login Table">
        <tr>
          <td><fieldset>
            <legend><?php echo HEADING_TITLE; ?></legend>
       <?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?>
            <table width="100%"  border="0" cellspacing="5" cellpadding="5">
              <tr>
                <td class="login" align="left"><?php echo TEXT_MAIN; ?></td>
              </tr>
              <tr>
                <td class="login_heading" align="right"><?php echo '<a class="login_heading" href="' . tep_href_link(FILENAME_LOGIN, '', 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
              </tr>
            </table>
       <?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?>
            </fieldset></td>
        </tr>
      </table>
      <?php echo tep_draw_separator('pixel_trans.gif', '100%', '40'); ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" summary="Footer Banner Table">
        <tr>
          <td align="center"><!--Bottom Banner Code Start-->
            <script language='JavaScript' type='text/javascript' src='http://adserver.chainreactionweb.com/adx.js'></script>
            <script language='JavaScript' type='text/javascript'>
      <!--
      if (!document.phpAds_used) document.phpAds_used = ',';
      phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);

      document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
      document.write ("http://adserver.chainreactionweb.com/adjs.php?n=" + phpAds_random);
      document.write ("&amp;what=zone:5");
      document.write ("&amp;exclude=" + document.phpAds_used);
      if (document.referrer)
      document.write ("&amp;referer=" + escape(document.referrer));
      document.write ("'><" + "/script>");
      //-->
      </script>
            <noscript>
            <a href='http://adserver.chainreactionweb.com/adclick.php?n=a3c513ce' target='_blank'><img src='http://adserver.chainreactionweb.com/adview.php?what=zone:5&amp;n=a3c513ce' border='0' alt=''></a>
            </noscript>
            <!--Bottom Banner Code End-->
          </td>
        </tr>
      </table></td>
    <td width="150" valign="top">&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><?php echo tep_draw_separator('pixel_black.gif', '100%', '1'); ?><!-- E-Commerce Engine Copyright &copy; 2003 <a href="http://oscommerce.com" target="_blank">osCommerce</a> <br>
      Supercharged by <a href="http://creloaded.com" target="_blank">CRE Loaded</a> --><?php echo TEXT_FOOTER?></td>
  </tr>
</table>
</body>
</html>
