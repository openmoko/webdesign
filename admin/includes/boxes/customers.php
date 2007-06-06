<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Chain Reaction Works, Inc
  Copyright (c) 2005 - 2006 Chain Reaction Works, Inc.

  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 774 $

  Released under the GNU General Public License
*/
?>
<!-- customers //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_CUSTOMERS,
                     'link'  => tep_href_link(FILENAME_ORDERS, 'selected_box=customers', 'SSL'));

 if ($selected_box == 'customers' || $menu_dhtml == true) {
    $contents[] = array('text'  => tep_admin_files_boxes(FILENAME_ORDERS, BOX_CUSTOMERS_ORDERS, 'SSL') .
                                   tep_admin_files_boxes(FILENAME_CREATE_ORDER, BOX_MANUAL_ORDER_CREATE_ORDER, 'SSL') .
                                   tep_admin_files_boxes(FILENAME_CREATE_ORDERS_ADMIN, BOX_CREATE_ORDERS_ADMIN, 'SSL') .
                                   tep_admin_files_boxes(FILENAME_PAYPAL, BOX_CUSTOMERS_PAYPAL, 'SSL') .
                                   tep_admin_files_boxes('', BOX_CUSTOMERS_MENU).
           tep_admin_files_boxes(FILENAME_CUSTOMERS, BOX_CUSTOMERS_CUSTOMERS, 'SSL') .
           tep_admin_files_boxes(FILENAME_CUSTOMERS_GROUPS, BOX_CUSTOMERS_GROUPS, 'SSL') .
                                   tep_admin_files_boxes(FILENAME_CREATE_ACCOUNT, BOX_MANUAL_ORDER_CREATE_ACCOUNT, 'SSL' ) .
                                   tep_admin_files_boxes(FILENAME_SHIPWIRE, BOX_SHIPWIRE)
);
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- customers_eof //-->
