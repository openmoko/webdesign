<?php
/*
  $Id: reports.php,v 1.1.1.1 2004/03/04 23:39:43 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License

  Chain Reaction Works, Inc
  Copyright &copy; 2003-2006

  Last Modified By : $Author$
  Last Modifed On :  $Date$
  Latest Revision :  $Revision: 2927 $
*/
?>
<!-- reports //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_REPORTS,
                     'link'  => tep_href_link(FILENAME_STATS_PRODUCTS_VIEWED, 'selected_box=reports'));

  if ($selected_box == 'reports' || $menu_dhtml == true) {
    $contents[] = array('text'  =>
//Admin begin
                                   tep_admin_files_boxes(FILENAME_STATS_PRODUCTS_VIEWED, BOX_REPORTS_PRODUCTS_VIEWED) .
                                   tep_admin_files_boxes(FILENAME_STATS_PRODUCTS_PURCHASED, BOX_REPORTS_PRODUCTS_PURCHASED) .
                                   tep_admin_files_boxes(FILENAME_STATS_ARTICLES_VIEWED,BOX_REPORTS_ARTICLES_VIEWED) .
                                   tep_admin_files_boxes(FILENAME_STATS_WISHLIST, BOX_REPORTS_CUSTOMER_WISHLIST) .
                                   tep_admin_files_boxes(FILENAME_STATS_CUSTOMERS, BOX_REPORTS_ORDERS_TOTAL) .
                                   tep_admin_files_boxes(FILENAME_ORDERLIST, BOX_REPORTS_ORDERLIST) .
                                   tep_admin_files_boxes(FILENAME_STATS_NOT_VALID_USER, BOX_REPORTS_NOT_VALID_USER) .
                                   tep_admin_files_boxes(FILENAME_STATS_SALES_REPORT2, BOX_REPORTS_SALES_REPORT2) .
                                   tep_admin_files_boxes(FILENAME_STATS_DAILY_SALES_REPORT, BOX_REPORTS_DAILY_PRODUCTS_ORDERS) .
                                   tep_admin_files_boxes(FILENAME_STATS_CUSTOMERS_ORDERS, BOX_REPORTS_CUSTOMERS_ORDERS) .
                         //          tep_admin_files_boxes(FILENAME_STATS_ZIPCODE_MATCH, BOX_REPORTS_ZIPCODE_MATCH) .
                                   tep_admin_files_boxes(FILENAME_STATS_PRODUCTS_NOTIFICATIONS, BOX_REPORTS_PRODUCTS_NOTIFICATIONS) .
                                   tep_admin_files_boxes(FILENAME_STATS_MONTHLY_SALES, BOX_REPORTS_MONTHLY_SALES) .
                                   tep_admin_files_boxes(FILENAME_STATS_CREDITS, BOX_REPORTS_CREDITS));
//Admin end
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- reports_eof //-->
