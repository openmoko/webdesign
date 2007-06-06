<?php
/*
  $Id: contact_us.php,v 1.1.1.1 2004/03/04 23:37:58 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce
Email security fix added 
  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONTACT_US);

  $vccCheckOk="True";
  //VISUAL VERIFY CODE start
    $code_query = tep_db_query("select code from visual_verify_code where oscsid = '" . tep_session_id() . "'");
    $code_array = tep_db_fetch_array($code_query);
    $code = $code_array['code'];

    tep_db_query("DELETE FROM " . TABLE_VISUAL_VERIFY_CODE . " WHERE oscsid='" . tep_session_id() . "'"); //remove the visual verify code associated with this session to clean database and ensure new results

    $user_entered_code = $HTTP_POST_VARS['visual_verify_code'];
    if (!(strcasecmp($user_entered_code, $code) == 0)) {    //make the check case insensitive
        $error = true;
        
    if(($HTTP_GET_VARS['action'] == 'send'))
    {
      $messageStack->add('contact', VISUAL_VERIFY_CODE_ENTRY_ERROR);
    }
    
    $vccCheckOk="False";    
    }
//VISUAL VERIFY CODE stop

  $error = false;
  if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'send') && $vccCheckOk=='True') {
    $name = tep_db_prepare_input($HTTP_POST_VARS['name']);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email']);
    $enquiry = tep_db_prepare_input($HTTP_POST_VARS['enquiry']);

    // VJ enhancement begin
    $telephone = tep_db_prepare_input($HTTP_POST_VARS['telephone']);
    $company = tep_db_prepare_input($HTTP_POST_VARS['company']);
    $street = tep_db_prepare_input($HTTP_POST_VARS['street']);
    $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
    $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
    $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
    $country = tep_db_prepare_input($HTTP_POST_VARS['country']);

    $topic = tep_db_prepare_input($HTTP_POST_VARS['topic']);
    $subject = tep_db_prepare_input($HTTP_POST_VARS['subject']);

    $urgent = (tep_db_prepare_input($HTTP_POST_VARS['urgent']) == 'on') ? '1' : '0';
    $self = (tep_db_prepare_input($HTTP_POST_VARS['self']) == 'on') ? '1' : '0';

    $urgent_string = '';
    if ($urgent == '1') {
      $urgent_string = '(' . TEXT_SUBJECT_URGENT . ')';
    }

    $subject_string = TEXT_SUBJECT_PREFIX . ' ' . $subject . $urgent_string;
    $message_string = $topic . ": " . $subject . "\n\n" . 
      $enquiry . "\n\n" . 
      ENTRY_COMPANY . ' ' . $company . "\n" . 
      ENTRY_NAME . ' ' . $name . "\n" . 
      ENTRY_EMAIL . ' ' . $email_address . "\n" . 
      ENTRY_STREET_ADDRESS . ' ' . $street . "\n" . 
      ENTRY_CITY . ' ' . $city . "\n" . 
      ENTRY_STATE . ' ' . $state . "\n" . 
      ENTRY_POST_CODE . ' ' . $postcode . "\n" . 
      ENTRY_COUNTRY . ' ' . tep_get_country_name($country) . "\n" . 
      ENTRY_TELEPHONE_NUMBER . ' ' . $telephone . "\n";

    $ipaddress = $HTTP_SERVER_VARS["REMOTE_ADDR"];
    $message_string .= "\n\n" . 'IP: ' . $ipaddress . "\n";
    // VJ enhancement end

    if (tep_validate_email($email_address)) {
      // VJ enhancement begin
      tep_mail(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, $subject_string, $message_string, $name, $email_address); 

      // email a copy to sender, if opted
    if ($self == '1') {
        tep_mail($name, $email_address, $subject_string, $message_string, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS); 
      }
      // VJ enhancement end

      tep_redirect(tep_href_link(FILENAME_CONTACT_US, 'action=success', 'SSL'));
    } 
  else
  {
      $error = true;
      $messageStack->add('contact', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
      $enquiry = "";
      $name = "";
      $email = "";      
    }
 } 
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CONTACT_US, '', 'SSL'));

  $content = CONTENT_CONTACT_US;

  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);

  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
