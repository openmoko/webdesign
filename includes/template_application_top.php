<?php
/*
  $Id: template_application_top.php,v 1.1.1.1 2004/03/04 23:40:40 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
//Detect template Site template configuration

//get customer selected template if there is a customer selected template
  $customer_pref_template_query = tep_db_query("select  customers_selected_template as template_selected from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "'");
  $cptemplate = tep_db_fetch_array($customer_pref_template_query);

   if (tep_not_null($cptemplate['template_selected'])) {
   //use customer selected template
  define(TEMPLATE_NAME, $cptemplate['template_selected']);
    }else if  (tep_not_null(DEFAULT_TEMPLATE)){
    //use store default  
  define(TEMPLATE_NAME, DEFAULT_TEMPLATE);  
    } else {
    //use default   
    define(TEMPLATE_NAME, 'default');
    }
   
    define(TEMPLATE_STYLE, DIR_WS_TEMPLATES . TEMPLATE_NAME . "/stylesheet.css");
  
    define(TEMPLATE_STYLE_ORIGINAL, DIR_WS_TEMPLATES . "/default/stylesheet.css");

    //detect template version
    if ( file_exists(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/template.php')) {
  require(DIR_WS_INCLUDES . 'ATS_template_application_top.php');
     } else {
  require(DIR_WS_INCLUDES . 'CRE_template_application_top.php');    
    }

?>