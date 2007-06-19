<?php
/*
  $Id: tell_a_friend.php,v 1.1.1.1 2004/03/04 23:38:03 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_TELL_A_FRIEND_ARTICLE);
  
//check for valid product
   $valid_article = "false";

  $tell_articles_id = $HTTP_GET_VARS['articles_id'];

  if (!tep_session_is_registered('customer_id') && (ALLOW_GUEST_TO_TELL_A_FRIEND == 'false')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  } elseif (tep_session_is_registered('customer_id')) {
    $account_query = tep_db_query("select customers_firstname, customers_lastname, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
    $account = tep_db_fetch_array($account_query);
    $from_name = $account['customers_firstname'] . ' ' . $account['customers_lastname'];
    $from_email_address = $account['customers_email_address'];
  }

    $article_info_query = tep_db_query("select pd.articles_name from " . TABLE_ARTICLES . " p, " . TABLE_ARTICLES_DESCRIPTION . " pd where p.articles_status = '1' and p.articles_id = '" . (int)$HTTP_GET_VARS['articles_id'] . "' and p.articles_id = pd.articles_id and pd.language_id = '" . (int)$languages_id . "'");
    if (tep_db_num_rows($article_info_query)) {
      $valid_article = "true";
      $article_info = tep_db_fetch_array($article_info_query);
    } else {
     $valid_article = "false";
 //    tep_redirect(tep_href_link(FILENAME_ARTICLE_INFO, 'articles_id=' . $tell_articles_id));
    }

//VISUAL VERIFY CODE start  
  $vccCheckOk="True"; 
    $code_query = tep_db_query("select code from visual_verify_code where oscsid = '" . tep_session_id() . "'");
    $code_array = tep_db_fetch_array($code_query);
    $code = $code_array['code'];

    tep_db_query("DELETE FROM " . TABLE_VISUAL_VERIFY_CODE . " WHERE oscsid='" . tep_session_id() . "'"); //remove the visual verify code associated with this session to clean database and ensure new results

    $user_entered_code = $HTTP_POST_VARS['visual_verify_code'];
    if (!(strcasecmp($user_entered_code, $code) == 0)) {    //make the check case insensitive
        $error = true;
        
    if(($HTTP_GET_VARS['action'] == 'process'))
    {
      $messageStack->add('friend', VISUAL_VERIFY_CODE_ENTRY_ERROR);
    }
    
    $vccCheckOk="False";    
    }
    
 
if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process') && $vccCheckOk=="True") 
  {   
    $error = "false";
    $_POST['to_email_address'] = preg_replace( "/\n/", " ", $_POST['to_email_address'] );
    $_POST['to_name'] = preg_replace( "/\n/", " ", $_POST['to_name'] );
    $_POST['to_email_address'] = preg_replace( "/\r/", " ", $_POST['to_email_address'] );
    $_POST['to_name'] = preg_replace( "/\r/", " ", $_POST['to_name'] );
    $_POST['to_email_address'] = str_replace("Content-Type:","",$_POST['to_email_address']);
    $_POST['to_name'] = str_replace("Content-Type:","",$_POST['to_name']);
    
    $to_email_address = tep_db_prepare_input($HTTP_POST_VARS['to_email_address']);
    $to_name = tep_db_prepare_input($HTTP_POST_VARS['to_name']);
    $from_email_address = tep_db_prepare_input($HTTP_POST_VARS['from_email_address']);
    $from_name = tep_db_prepare_input($HTTP_POST_VARS['from_name']);
    $message = tep_db_prepare_input($HTTP_POST_VARS['message']);
    
       if (empty($from_name)) {
          $error = "true";
          $messageStack->add('friend', ERROR_FROM_NAME);
        }

        if (!tep_validate_email($from_email_address)) {
          $error = "true";
          $messageStack->add('friend', ERROR_FROM_ADDRESS);
        }
    
        if (empty($to_name)) {
          $error = "true";
          $messageStack->add('friend', ERROR_TO_NAME);
        }
    
        if (!tep_validate_email($to_email_address)) {
          $error = "true";
          $messageStack->add('friend', ERROR_TO_ADDRESS);
        }

          $email_subject = sprintf(TEXT_EMAIL_SUBJECT, $from_name, STORE_NAME);
          $email_body_article = sprintf(TEXT_EMAIL_INTRO, $to_name, $from_name, $article_info['articles_name'], STORE_NAME) . "\n\n";
          if (tep_not_null($message)) {
            $email_body_article .= $message . "\n\n";
          }
     if (TELL_ARTICLE_EMAIL_USE_HTML == 'false') {
            $email_body_article .= TEXT_EMAIL_LINK_TEXT . '<a href="' . HTTP_SERVER  . DIR_WS_CATALOG . FILENAME_ARTICLE_INFO . '?articles_id='.$tell_articles_id .'">' .  HTTP_SERVER  . DIR_WS_CATALOG . FILENAME_ARTICLE_INFO . '?articles_id='. $tell_articles_id . '</a>' . "\n\n";
      $email_body_article .= TEXT_EMAIL_SIGNATURE. STORE_NAME . "\n" . '<a href="' . HTTP_SERVER  . DIR_WS_CATALOG .'">' .  HTTP_SERVER  . DIR_WS_CATALOG . '</a>';
 
    }else{ 
            $email_body_article .= TEXT_EMAIL_LINK . '<a href="' . HTTP_SERVER  . DIR_WS_CATALOG . FILENAME_ARTICLE_INFO . '?articles_id='.$tell_articles_id .'">' .  HTTP_SERVER  . DIR_WS_CATALOG . FILENAME_ARTICLE_INFO . '?articles_id='. $tell_articles_id . '</a>' . "\n\n";
      $email_body_article .= TEXT_EMAIL_SIGNATURE. STORE_NAME . "\n" . '<a href="' . HTTP_SERVER  . DIR_WS_CATALOG .'">' .  HTTP_SERVER  . DIR_WS_CATALOG . '</a>';
      
                }
                
         $mimemessage = new email(array('X-Mailer: osCommerce bulk mailer'));
  
 
          if (TELL_ARTICLE_EMAIL_USE_HTML == 'false') {
              $mimemessage->add_text($email_body_article);
           } else {
              $mimemessage->add_html($email_body_article);
           }                
  
            $mimemessage->build_message();
            $mimemessage->send($to_name, $to_email_address, $from_name, $from_email_address, $email_subject);

  $messageStack->add_session('header', sprintf(TEXT_EMAIL_SUCCESSFUL_SENT, $article_info['articles_name'], tep_output_string_protected($to_name)), 'success');  
    tep_redirect(tep_href_link(FILENAME_ARTICLE_INFO, 'articles_id=' . $tell_articles_id));
 
}         

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_TELL_A_FRIEND_ARTICLE, 'articles_id=' . $tell_articles_id));

  $content = CONTENT_TELL_A_FRIEND_ARTICLE;

  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);

  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>