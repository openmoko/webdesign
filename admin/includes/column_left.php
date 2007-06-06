<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Chain Reaction Works, Inc
  Copyright (c) 2005 - 2006 Chain Reaction Works, Inc.

  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 1042 $

  Released under the GNU General Public License
*/

  if (MENU_DHTML != 'True') {
 define('BOX_WIDTH', 170);

    if (tep_admin_check_boxes('administrator.php') == true) {
    require(DIR_WS_BOXES . 'administrator.php');
  }
    if (tep_admin_check_boxes('configuration.php') == true) {
    require(DIR_WS_BOXES . 'configuration.php');
  }
    if (tep_admin_check_boxes('catalog.php') == true) {
    require(DIR_WS_BOXES . 'catalog.php');
  }
    if (tep_admin_check_boxes('customers.php') == true) {
    require(DIR_WS_BOXES . 'customers.php');
  }
    if (tep_admin_check_boxes('marketing.php') == true) {
    require(DIR_WS_BOXES . 'marketing.php');
  }
    if (tep_admin_check_boxes('gv_admin.php') == true) {
    require(DIR_WS_BOXES . 'gv_admin.php');
  }
    if (tep_admin_check_boxes('affiliate.php') == true) {
    require(DIR_WS_BOXES . 'affiliate.php');
  }
  if (tep_admin_check_boxes('reports.php') == true) {
    require(DIR_WS_BOXES . 'reports.php');
  }
  if (tep_admin_check_boxes('data.php') == true) {
    require(DIR_WS_BOXES . 'data.php');
  }
    if (tep_admin_check_boxes('information.php') == true) {
    require(DIR_WS_BOXES . 'information.php');
  }
    if (tep_admin_check_boxes('articles.php') == true) {
    require(DIR_WS_BOXES . 'articles.php');
  }
    if (tep_admin_check_boxes('design_controls.php') == true) {
    require(DIR_WS_BOXES . 'design_controls.php');
  }
   if (tep_admin_check_boxes('links.php') == true) {
    require(DIR_WS_BOXES . 'links.php');
  }
  if (tep_admin_check_boxes('modules.php') == true) {
    require(DIR_WS_BOXES . 'modules.php');
  }
  if (tep_admin_check_boxes('taxes.php') == true) {
    require(DIR_WS_BOXES . 'taxes.php');
  }
  if (tep_admin_check_boxes('localization.php') == true) {
    require(DIR_WS_BOXES . 'localization.php');
  }
   if (tep_admin_check_boxes('crypt.php') == true) {
    require(DIR_WS_BOXES . 'crypt.php');
  }
  if (tep_admin_check_boxes('tools.php') == true) {
   require(DIR_WS_BOXES . 'tools.php');
  }
  if (tep_admin_check_boxes('techsupport.php') == true) {
   require(DIR_WS_BOXES . 'techsupport.php');
  }
if (file_exists('includes/boxes/newsdesk.php')){
  if (tep_admin_check_boxes('newsdesk.php') == true) {
   require(DIR_WS_BOXES . 'newsdesk.php');
  }
}
if (file_exists('includes/boxes/faqdesk.php')){
  if (tep_admin_check_boxes('faqdesk.php') == true) {
   require(DIR_WS_BOXES . 'faqdesk.php');
  }
}
//Admin Column Left end
}
?>
