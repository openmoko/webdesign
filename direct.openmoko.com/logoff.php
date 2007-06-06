<?php
/*
  $Id: logoff.php,v 1.1.1.1 2004/03/04 23:38:00 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGOFF);

  $breadcrumb->add(NAVBAR_TITLE);

  tep_session_unregister('customer_id');
  tep_session_unregister('customer_default_address_id');
  tep_session_unregister('customer_first_name');
  // Eversun mod for sppc and qty price breaks
  tep_session_unregister('sppc_customer_group_id');
  tep_session_unregister('sppc_customer_group_show_tax');
  tep_session_unregister('sppc_customer_group_tax_exempt');
// Eversun mod for sppc and qty price breaks
  tep_session_unregister('customer_country_id');
  tep_session_unregister('customer_zone_id');
  tep_session_unregister('comments');
//ICW - logout -> unregister GIFT VOUCHER sessions - Thanks Fredrik
  tep_session_unregister('gv_id');
  tep_session_unregister('cc_id');
//ICW - logout -> unregister GIFT VOUCHER sessions  - Thanks Fredrik
  $cart->reset();

  $content = CONTENT_LOGOFF;

  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);

  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
