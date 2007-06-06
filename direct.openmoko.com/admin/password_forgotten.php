<?php
/*
  $Id: login.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGIN);

  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $firstname = tep_db_prepare_input($HTTP_POST_VARS['firstname']);
    $log_times = $HTTP_POST_VARS['log_times']+1;
    if ($log_times >= 4) {
      tep_session_register('password_forgotten');
    }

// Check if email exists
    $check_admin_query = tep_db_query("select admin_id as check_id, admin_firstname as check_firstname, admin_lastname as check_lastname, admin_email_address as check_email_address from " . TABLE_ADMIN . " where admin_email_address = '" . tep_db_input($email_address) . "'");
    if (!tep_db_num_rows($check_admin_query)) {
      $HTTP_GET_VARS['login'] = 'fail';
    } else {
      $check_admin = tep_db_fetch_array($check_admin_query);
      if ($check_admin['check_firstname'] != $firstname) {
        $HTTP_GET_VARS['login'] = 'fail';
      } else {
        $HTTP_GET_VARS['login'] = 'success';

        function randomize() {
          $salt = "ABCDEFGHIJKLMNOPQRSTUVWXWZabchefghjkmnpqrstuvwxyz0123456789";
          srand((double)microtime()*1000000);
          $i = 0;

          while ($i <= 7) {
            $num = rand() % 33;
          $tmp = substr($salt, $num, 1);
          $pass = $pass . $tmp;
          $i++;
      }
      return $pass;
        }
        $makePassword = randomize();

        tep_mail($check_admin['check_firstname'] . ' ' . $check_admin['admin_lastname'], $check_admin['check_email_address'], ADMIN_EMAIL_SUBJECT, sprintf(ADMIN_EMAIL_TEXT, $check_admin['check_firstname'], HTTP_SERVER . DIR_WS_ADMIN, $check_admin['check_email_address'], $makePassword, STORE_OWNER), STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
        tep_db_query("update " . TABLE_ADMIN . " set admin_password = '" . tep_encrypt_password($makePassword) . "' where admin_id = '" . $check_admin['check_id'] . "'");
      }
    }
  }
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DEFAULT);
  include('includes/functions/rss2html.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<!-- Code related to index.php only -->
<link type="text/css" rel="StyleSheet" href="includes/index.css" />
<link type="text/css" rel="StyleSheet" href="includes/helptip.css" />
<script type="text/javascript" src="includes/javascript/helptip.js"></script>
<!-- code related to index.php EOF -->
</head>
<body>
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->
<table width="100%"  border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <td valign="top" width="150">&nbsp;</td>
    <td valign="top">
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" style="border:1px solid #CCCCCC; " summary="Title Table">
        <tr>
          <td align="center" class="pageHeading"><?php echo PROJECT_VERSION .'[' . PROJECT_PATCH .']';?><br>
            <?php echo tep_draw_separator('pixel_trans.gif', '100%', '7'); ?>
            <input type="submit" name="Submit" value="     <?php echo TEXT_CHECK_UPDATES;?>     " onclick="javascript:window.open('http://store.creloaded.com/index.php?cPath=27','k')">
&nbsp;&nbsp;&nbsp;
            <input type="submit" name="Submit" value="     <?php echo TEXT_GET_PRO;?>     " onclick="javascript:window.open('http://store.creloaded.com/index.php?cPath=27','k')">
            <?php echo tep_draw_separator('pixel_trans.gif', '100%', '7'); ?></td>
        </tr>
      </table>
      <?php echo tep_draw_separator('pixel_trans.gif', '100%', '40'); ?>
      <table align="center" width="50%"  border="0" cellspacing="0" cellpadding="0" summary="Login Table">
        <tr>
          <td><fieldset>
            <legend><?php echo HEADING_PASSWORD_FORGOTTEN; ?></legend>
      <?php echo tep_draw_separator('pixel_trans.gif', '100%', '5'); ?>
           <?php echo tep_draw_form('login', FILENAME_PASSWORD_FORGOTTEN, 'action=process'); ?>
            <table border="0" width="100%" cellspacing="3" cellpadding="2" align="center" summary="Password Forgoten Table">

<?php
  if ($HTTP_GET_VARS['login'] == 'success') {
    $success_message = TEXT_FORGOTTEN_SUCCESS;
  } elseif ($HTTP_GET_VARS['login'] == 'fail') {
    $info_message = TEXT_FORGOTTEN_ERROR;
  }
  if (tep_session_is_registered('password_forgotten')) {
?>
<table align="center" border="0" cellspacing="3" cellpadding="5" style="border:1px solid red;" summary="Error Message Table">
                                    <tr>
                                      <td class="smallText"><?php echo TEXT_FORGOTTEN_FAIL; ?></td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="top"><?php echo '<a href="' . tep_href_link(FILENAME_LOGIN, '' , 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
                                    </tr>
                  </table>
<?php
  } elseif (isset($success_message)) {
?><table align="center" border="0" cellspacing="3" cellpadding="5" summary="Success Message Table">
                                    <tr>
                                      <td class="smallText"><?php echo $success_message; ?></td>
                                    </tr>
                                    <tr>
                                      <td align="center" valign="top"><?php echo '<a href="' . tep_href_link(FILENAME_LOGIN, '' , 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a>'; ?></td>
                                    </tr>
                  </table>
<?php
  } else {
    if (isset($info_message)) {
?><table align="center" border="0" cellspacing="3" cellpadding="5" style="border:1px solid red;" summary="Error Message Table">
                                    <tr>
                                      <td colspan="2" class="smallText" align="center"><?php echo $info_message; ?><?php echo tep_draw_hidden_field('log_times', $log_times); ?></td>
                                    </tr>
                  </table>
                  
<?php
    } else {
?>
                                    <tr>
                                      <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?><?php echo tep_draw_hidden_field('log_times', '0'); ?></td>
                                    </tr>
                  </table>
<?php
    }
?>

<table border="0" width="100%" cellspacing="3" cellpadding="2" align="center" summary="Password Forgoten Table">
                                    <tr>
                                      <td class="login"><?php echo ENTRY_FIRSTNAME; ?></td>
                                      <td class="login"><?php echo tep_draw_input_field('firstname'); ?></td>
                                    </tr>
                                    <tr>
                                      <td class="login"><?php echo ENTRY_EMAIL_ADDRESS; ?></td>
                                      <td class="login"><?php echo tep_draw_input_field('email_address'); ?></td>
                                    </tr>
                                    <tr>
                  <td>&nbsp;</td>
                                      <td valign="top"><?php echo '<a href="' . tep_href_link(FILENAME_LOGIN, '' , 'SSL') . '">' . tep_image_button('button_back.gif', IMAGE_BACK) . '</a> ' . tep_image_submit('button_confirm.gif', IMAGE_BUTTON_LOGIN); ?>&nbsp;</td>
                                    </tr>
                  </table>
<?php
  }
?>
                                  
            </form>
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
      Supercharged by <a href="http://creloaded.com" target="_blank">CRE Loaded</a> --><?php echo PASS_FORGOTTEN_FOOTER?></td>
  </tr>
</table>
</body>
</html>
