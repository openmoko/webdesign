<?php
/*
  $Id: login.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  if ($session_started == false) {
  echo 'session not started';
  }

  $error = false;
  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);

// Check if email exists
    $check_admin_query = tep_db_query("select admin_id as login_id, admin_groups_id as login_groups_id, admin_firstname as login_firstname, admin_email_address as login_email_address, admin_password as login_password, admin_modified as login_modified, admin_logdate as login_logdate, admin_lognum as login_lognum from " . TABLE_ADMIN . " where admin_email_address = '" . tep_db_input($email_address) . "'");
    if (!tep_db_num_rows($check_admin_query)) {
      $HTTP_GET_VARS['login'] = 'fail';
    } else {
      $check_admin = tep_db_fetch_array($check_admin_query);

      //BOF code for cPanel installer - convert password to cre hash
      $check_password = $check_admin['login_password'];
      if (substr($check_password, 0, 8) == '_cPanel_'){
        $check_password = substr($check_password, 8);
        $password_hash = tep_encrypt_password($check_password);
        tep_db_query("UPDATE " . TABLE_ADMIN . " SET admin_password = '" . $password_hash . "'");
        $check_admin_query = tep_db_query("select admin_id as login_id, admin_groups_id as login_groups_id, admin_firstname as login_firstname, admin_email_address as login_email_address, admin_password as login_password, admin_modified as login_modified, admin_logdate as login_logdate, admin_lognum as login_lognum from " . TABLE_ADMIN . " where admin_email_address = '" . tep_db_input($email_address) . "'");
        $check_admin = tep_db_fetch_array($check_admin_query);
      }
      //EOF code for cPanel installer - convert password to cre hash

      // Check that password is good
      if (!tep_validate_password($password, $check_admin['login_password'])) {
        $HTTP_GET_VARS['login'] = 'fail';
      } else {
        if (tep_session_is_registered('password_forgotten')) {
          tep_session_unregister('password_forgotten');
        }

        $login_id = $check_admin['login_id'];
        $login_groups_id = $check_admin[login_groups_id];
        $login_firstname = $check_admin['login_firstname'];
        $login_email_address = $check_admin['login_email_address'];
        $login_logdate = $check_admin['login_logdate'];
        $login_lognum = $check_admin['login_lognum'];
        $login_modified = $check_admin['login_modified'];

        tep_session_register('login_id');
        tep_session_register('login_groups_id');
        tep_session_register('login_firstname');

        //$date_now = date('Ymd');
        tep_db_query("update " . TABLE_ADMIN . " set admin_logdate = now(), admin_lognum = admin_lognum+1 where admin_id = '" . $login_id . "'");

        if (($login_lognum == 0) || !($login_logdate) || ($login_email_address == 'admin@localhost') || ($login_modified == '0000-00-00 00:00:00')) {
          tep_redirect(tep_href_link(FILENAME_ADMIN_ACCOUNT, '', 'SSL'));
        } else {
          tep_redirect(tep_href_link(FILENAME_DEFAULT, '', 'SSL'));
        }

      }
    }
  }

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGIN);
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
            <?php echo tep_draw_separator('pixel_trans.gif', '100%', '7'); 
      $upgradeURL="http://store.creloaded.com/index.php?cPath=27&product_version=".urlencode(PROJECT_VERSION)."&product_patchlevel=".'[' . urlencode(PROJECT_PATCH) .']';
      ?>
            <input type="submit" name="Submit" value="     <?php echo TEXT_CHECK_UPDATES;?>     " onclick="javascript:window.open('<?php echo $upgradeURL?>','k')">
&nbsp;&nbsp;&nbsp;
            <input type="submit" name="Submit" value="     <?php echo TEXT_GET_PRO;?>     " onclick="javascript:window.open('<?php echo $upgradeURL?>','k')">
            <?php echo tep_draw_separator('pixel_trans.gif', '100%', '7'); ?></td>
        </tr>
      </table>
      <?php echo tep_draw_separator('pixel_trans.gif', '100%', '40'); ?>
      <table align="center" width="50%"  border="0" cellspacing="0" cellpadding="0" summary="Login Table">
        <tr>
          <td><fieldset>
            <legend><?php echo HEADING_RETURNING_ADMIN; ?></legend>
            <?php echo tep_draw_form('login', FILENAME_LOGIN, 'action=process', 'post', '', 'SSL'); ?>
            <?php
  if ($HTTP_GET_VARS['login'] == 'fail') {
    $info_message = TEXT_LOGIN_ERROR;
  }
  if (isset($info_message)) {
 echo tep_draw_separator('pixel_trans.gif', '100%', '5'); ?>
            <table align="center" border="0" cellspacing="3" cellpadding="5" style="border:1px solid red;" summary="Error Message Table">
              <tr>
                <td colspan="2" class="smallText" align="center"><?php echo $info_message; ?></td>
              </tr>
            </table>
            <?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); 

  } else {
  }
?>
            <table width="100%"  border="0" cellspacing="2" cellpadding="2">
              <tr>
                <td class="login"><label for="email_address"><?php echo ENTRY_EMAIL_ADDRESS; ?></label></td>
                <td class="login"><?php echo tep_draw_input_field('email_address'); ?></td>
              </tr>
              <tr>
                <td class="login"><label for="password"><?php echo ENTRY_PASSWORD; ?></label></td>
                <td class="login"><?php echo tep_draw_password_field('password'); ?></td>
              </tr>
              <tr>
                <td></td>
                <td><?php echo tep_image_submit('button_confirm.gif', IMAGE_BUTTON_LOGIN); ?></td>
              </tr>
              <tr>
                <td class="login"></td>
                <td class="login"><?php echo '<a class="sub" href="' . tep_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '"><b>' . TEXT_PASSWORD_FORGOTTEN . '</b></a>'; ?></td>
              </tr>
            </table>
            </form>
            </fieldset></td>
        </tr>
      </table>
      <?php echo tep_draw_separator('pixel_trans.gif', '100%', '40'); ?>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0" summary="Footer Banner Table">
        <tr>
          <td align="center"><!--Bottom Banner Code Start-->
<?php include(DIR_WS_INCLUDES . '/footer.php'); ?> 
            <!--Bottom Banner Code End-->
          </td>
        </tr>
      </table></td>
    <td width="150" valign="top">&nbsp;</td>
  </tr>
</table>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
  <tr>
<!--   <td align="center" valign="top"><?php echo tep_draw_separator('pixel_black.gif', '100%', '1'); ?>E-Commerce Engine Copyright &copy; 2003 <a href="http://oscommerce.com" target="_blank">osCommerce</a> <br>
      Supercharged by <a href="http://creloaded.com" target="_blank">CRE Loaded</a></td> -->
  </tr>
</table>
</body>
</html>