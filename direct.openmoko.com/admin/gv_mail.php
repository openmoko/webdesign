<?php
/*
  $Id: gv_mail.php,v 1.1.1.1 2004/03/04 23:38:35 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();


function tep_get_current_language($language_id) {
    $languages_query = tep_db_query("select languages_id, name, code, image, directory from " . TABLE_LANGUAGES . " where languages_id = '" . $language_id . "' order by sort_order");
    while ($languages = tep_db_fetch_array($languages_query)) {
      $languages_array1 = array('id' => $languages['languages_id'],
                                 'name' => $languages['name'],
                                 'code' => $languages['code'],
                                 'image' => $languages['image'],
                                 'directory' => $languages['directory']);
    }

    return $languages_array1;
  }

$languages = tep_get_languages();
//    $languages_name = $lng->language['name'];
//    $languages_image = $lng->language['image'];
//    $languages_directory = $lng->$languages['directory'];
  
$cur_language = tep_get_current_language($languages_id);
     $languages_name = $cur_language['name'];
     $languages_image = $cur_language['image'];
     $languages_directory = $cur_language['directory'];



//print_r($cur_language);


  if ( ($HTTP_GET_VARS['action'] == 'send_email_to_user') && ($HTTP_POST_VARS['customers_email_address'] || $HTTP_POST_VARS['email_to']) && (!$HTTP_POST_VARS['back_x']) ) {
    switch ($HTTP_POST_VARS['customers_email_address']) {
      case '***':
        $mail_query = tep_db_query("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS);
        $mail_sent_to = TEXT_ALL_CUSTOMERS;
        break;
      case '**D':
        $mail_query = tep_db_query("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_newsletter = '1'");
        $mail_sent_to = TEXT_NEWSLETTER_CUSTOMERS;
        break;
      default:
        $customers_email_address = tep_db_prepare_input($HTTP_POST_VARS['customers_email_address']);
        $mail_query = tep_db_query("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($customers_email_address) . "'");
        $mail_sent_to = $HTTP_POST_VARS['customers_email_address'];
        if ($HTTP_POST_VARS['email_to']) {
          $mail_sent_to = $HTTP_POST_VARS['email_to'];
        }
        break;
    }



    $from = tep_db_prepare_input($HTTP_POST_VARS['from']);
    $subject = tep_db_prepare_input($HTTP_POST_VARS['subject']);
    if ($HTTP_POST_VARS['email_to']) {
      $id1 = create_coupon_code($HTTP_POST_VARS['email_to']);
      $message = tep_db_prepare_input($HTTP_POST_VARS['message']);
      $message .= "\n\n" . TEXT_GV_WORTH  . $currencies->format($HTTP_POST_VARS['amount']) . "\n\n";
      $message .= TEXT_TO_REDEEM;
      $message .= TEXT_WHICH_IS . $id1 . TEXT_IN_CASE . "\n\n";
      $message .= '<a href="' . HTTP_SERVER  . DIR_WS_CATALOG . 'gv_redeem.php' . '?gv_no='.$id1 .'">' .  HTTP_SERVER  . DIR_WS_CATALOG . 'gv_redeem.php' . '?gv_no='.$id1 . '</a>' . "\n\n";
      $message .= TEXT_OR_VISIT . '<a href="' .  HTTP_SERVER  . DIR_WS_CATALOG . '">' . HTTP_SERVER  . DIR_WS_CATALOG  . '</a>' . TEXT_ENTER_CODE;
      $message .= TEXT_TO_REDEEM1 ;
      $message .= TEXT_REMEMBER . "\n";

      //Let's build a message object using the email class
      $mimemessage = new email(array('X-Mailer: osCommerce bulk mailer'));
      // add the message to the object
    if (EMAIL_USE_HTML == 'false') {
    $mimemessage->add_text($message);
    } else {
    $mimemessage->add_html($message);
    }

      $mimemessage->build_message();
      $mimemessage->send('Friend', $HTTP_POST_VARS['email_to'], '', $from, $subject);
      // Now create the coupon email entry
      $insert_query = tep_db_query("insert into " . TABLE_COUPONS . " (coupon_code, coupon_type, coupon_amount, date_created) values ('" . $id1 . "', 'G', '" . $HTTP_POST_VARS['amount'] . "', now())");
      $insert_id = tep_db_insert_id($insert_query);
      $insert_query = tep_db_query("insert into " . TABLE_COUPON_EMAIL_TRACK . " (coupon_id, customer_id_sent, sent_firstname, emailed_to, date_sent) values ('" . $insert_id ."', '0', 'Admin', '" . $HTTP_POST_VARS['email_to'] . "', now() )");
    }
    tep_redirect(tep_href_link(FILENAME_GV_MAIL, 'mail_sent_to=' . urlencode($mail_sent_to)));
  }

  if ( ($HTTP_GET_VARS['action'] == 'preview') && (!$HTTP_POST_VARS['customers_email_address']) && (!$HTTP_POST_VARS['email_to']) ) {
    $messageStack->add('search', ERROR_NO_CUSTOMER_SELECTED, 'error');
  }

  if ( ($HTTP_GET_VARS['action'] == 'preview') && (!$HTTP_POST_VARS['amount']) ) {
    $messageStack->add('search', ERROR_NO_AMOUNT_SELECTED, 'error');
  }

  if ($HTTP_GET_VARS['mail_sent_to']) {
    $messageStack->add('search', sprintf(NOTICE_EMAIL_SENT_TO, $HTTP_GET_VARS['mail_sent_to']), 'success');
  }
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/javascript/menu.js"></script>
<!-- Tabs code -->
<script type="text/javascript" src="includes/javascript/tabpane/local/webfxlayout.js"></script>
<link type="text/css" rel="stylesheet" href="includes/javascript/tabpane/tab.webfx.css">
<style type="text/css">
.dynamic-tab-pane-control h2 {
  text-align: center;
  width:    auto;
}

.dynamic-tab-pane-control h2 a {
  display:  inline;
  width:    auto;
}

.dynamic-tab-pane-control a:hover {
  background: transparent;
}
</style>
<script type="text/javascript" src="includes/javascript/tabpane/tabpane.js"></script>
<!-- End Tabs -->

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
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%"><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
<?php
  if ( ($HTTP_GET_VARS['action'] == 'preview') && ($HTTP_POST_VARS['customers_email_address'] || $HTTP_POST_VARS['email_to']) ) {
    switch ($HTTP_POST_VARS['customers_email_address']) {
      case '***':
        $mail_sent_to = TEXT_ALL_CUSTOMERS;
        break;
      case '**D':
        $mail_sent_to = TEXT_NEWSLETTER_CUSTOMERS;
        break;
      default:
        $mail_sent_to = $HTTP_POST_VARS['customers_email_address'];
        if ($HTTP_POST_VARS['email_to']) {
          $mail_sent_to = $HTTP_POST_VARS['email_to'];
        }
        break;
    }
    
?>
          <tr><?php echo tep_draw_form('mail', FILENAME_GV_MAIL, 'action=send_email_to_user'); ?>
            <td><table border="0" width="100%" cellpadding="2" cellspacing="2">
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_CUSTOMER; ?></b><br><?php echo $mail_sent_to; ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_FROM; ?></b><br><?php echo htmlspecialchars(stripslashes($HTTP_POST_VARS['from'])); ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_SUBJECT; ?></b><br><?php echo htmlspecialchars(stripslashes($HTTP_POST_VARS['subject'])); ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b><?php echo TEXT_AMOUNT; ?></b><br><?php echo nl2br(htmlspecialchars(stripslashes($HTTP_POST_VARS['amount']))); ?></td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="smallText"><b>
                <?php if (EMAIL_USE_HTML == 'false') { 
                echo (stripslashes($HTTP_POST_VARS['message']));
                } else { 
                echo htmlspecialchars(stripslashes($HTTP_POST_VARS['message'])); 
                } 
                ?>
                </td>
              </tr>
              <tr>
                <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td>
<?php
/* Re-Post all POST'ed variables */
    reset($HTTP_POST_VARS);
    while (list($key, $value) = each($HTTP_POST_VARS)) {
      if (!is_array($HTTP_POST_VARS[$key])) {
        echo tep_draw_hidden_field($key, htmlspecialchars(stripslashes($value)));
      }
    }
?>
                <table border="0" width="100%" cellpadding="2" cellspacing="2">
                  <tr>

                     <tr>
                    <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_MAIL) . '">' . tep_image_button('button_cancel.gif', IMAGE_CANCEL) . '</a> ' . tep_image_submit('button_send_mail.gif', IMAGE_SEND_EMAIL); ?></td>
                    </tr>
                    <td class="smallText">
                <?php if (EMAIL_USE_HTML == 'false'){
                echo tep_image_submit('button_back.gif', IMAGE_BACK, 'name="back"');
                } ?>
                <?php if (EMAIL_USE_HTML == 'false'){
                       echo(TEXT_EMAIL_BUTTON_HTML);
                 } else {
                       echo(TEXT_EMAIL_BUTTON_TEXT); 
                   } ?>
                    </td>
                  </tr>
                </table></td>
             </tr>
            </table></td>
          </form></tr>
<?php
  } else {
?>
<?php 
   if (EMAIL_USE_HTML == 'true'){
 // Load Editor
include('includes/javascript/editor.php');
echo tep_load_html_editor();
 
echo tep_insert_html_editor(message,'advanced','400');
 }
?>

<?php echo tep_draw_separator('pixel_trans.gif', '100%', '15'); ?>
<div class="tab-pane" id="tabPane1">
<script type="text/javascript">tp1 = new WebFXTabPane( document.getElementById( "tabPane1" ) );
</script>

     <?php echo tep_draw_form('mail', FILENAME_GV_MAIL, 'action=preview'); ?>
                <table width="100%"  border="0" cellspacing="0" cellpadding="0" summary="tab table">
                 <tr>
                    <td valign="top">
    <table border="0" cellspacing="0" cellpadding="2">
          <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
<?php
    $customers = array();
    $customers[] = array('id' => '', 'text' => TEXT_SELECT_CUSTOMER);
    $customers[] = array('id' => '***', 'text' => TEXT_ALL_CUSTOMERS);
    $customers[] = array('id' => '**D', 'text' => TEXT_NEWSLETTER_CUSTOMERS);
    $mail_query = tep_db_query("select customers_email_address, customers_firstname, customers_lastname from " . TABLE_CUSTOMERS . " order by customers_lastname");
    while($customers_values = tep_db_fetch_array($mail_query)) {
      $customers[] = array('id' => $customers_values['customers_email_address'],
                           'text' => $customers_values['customers_lastname'] . ', ' . $customers_values['customers_firstname'] . ' (' . $customers_values['customers_email_address'] . ')');
    }
?>
              <tr>
                <td class="main"><?php echo TEXT_CUSTOMER; ?></td>
                <td><?php echo tep_draw_pull_down_menu('customers_email_address', $customers, $HTTP_GET_VARS['customer']);?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
               <tr>
                <td class="main"><?php echo TEXT_TO; ?></td>
                <td><?php echo tep_draw_input_field('email_to'); ?><?php echo '&nbsp;&nbsp;' . TEXT_SINGLE_EMAIL; ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
             <tr>
                <td class="main"><?php echo TEXT_FROM; ?></td>
                <td><?php echo tep_draw_input_field('from', EMAIL_FROM); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td class="main"><?php echo TEXT_SUBJECT; ?></td>
                <td><?php echo tep_draw_input_field('subject'); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td valign="top" class="main"><?php echo TEXT_AMOUNT; ?></td>
                <td><?php echo tep_draw_input_field('amount'); ?></td>
              </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
              <tr>
                <td valign="top" class="main"><?php echo TEXT_MESSAGE; ?></td>
                <td class="main">
                <?php
                 echo tep_draw_textarea_field('message', 'hard', 60, 3, $message, 'style="width: 100%" '); ?></td>
           
             </tr>
              <tr>
                <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
              </tr>
                 </table>
 <?php if (EMAIL_USE_HTML == 'true'){
 ;?>
<script type="text/javascript">
//<![CDATA[
setupAllTabs();
//]]>
</script> 
  <?php  
  };?>
        <tr>   
                 <td  align="center">
                 <?php if (EMAIL_USE_HTML == 'false'){ echo tep_image_submit('button_send_mail.gif', IMAGE_SEND_EMAIL, 'onClick="validate();return returnVal;"');
                   } else {
                echo tep_image_submit('button_send_mail.gif', IMAGE_SEND_EMAIL); }?>
                </td>
              </tr>
            </table></td>
          </form></tr>
<?php
  }
?>
<!-- body_text_eof //-->
        </table></td>
      </tr>
    </table></td>
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