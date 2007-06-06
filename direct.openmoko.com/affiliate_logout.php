<?php

/*

  $Id: affiliate_logout.php,v 1.1.1.1 2004/03/04 23:37:54 ccwjr Exp $



  OSC-Affiliate



  Contribution based on:



  osCommerce, Open Source E-Commerce Solutions

  http://www.oscommerce.com



  Copyright (c) 2002 - 2003 osCommerce



  Released under the GNU General Public License

*/





  require('includes/application_top.php');



  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_AFFILIATE_LOGOUT);



  $breadcrumb->add(NAVBAR_TITLE);



  $content = affiliate_logout; 



  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);



  require(DIR_WS_INCLUDES . 'application_bottom.php'); 

?>
