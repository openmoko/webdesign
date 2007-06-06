<?php
  /*
  Module: Information Pages Unlimited
        File date: 2003/03/03
      Based on the FAQ script of adgrafics
        Adjusted by Joeri Stegeman (joeri210 at yahoo.com), The Netherlands

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Released under the GNU General Public License
  */

  require('includes/application_top.php');

  // Added for information pages
 // if(!$HTTP_GET_VARS['info_id']) die("No page found.");
  $info_id = $HTTP_GET_VARS['info_id'];

  $sql=tep_db_query('SELECT * FROM '.TABLE_INFORMATION.' WHERE visible=\'1\' AND information_id=\''.(int)$info_id.'\'') or die(tep_db_error());
  $row=tep_db_fetch_array($sql);
  $INFO_TITLE = stripslashes($row['info_title']);
  $INFO_DESCRIPTION = stripslashes($row['description']);

  // Only replace cariage return by <BR> if NO HTML found in text
  // Added as noticed by infopages module
  if (!preg_match("/([\<])([^\>]{1,})*([\>])/i", $INFO_DESCRIPTION)) {
    $INFO_DESCRIPTION = str_replace("\r\n", "<br>\r\n", $INFO_DESCRIPTION ); 
  }

  $breadcrumb->add($INFO_TITLE, tep_href_link(FILENAME_INFORMATION, 'info_id=' . $row['information_id'], 'NONSSL'));

  $content = CONTENT_INFORMATION;

  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);

  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
