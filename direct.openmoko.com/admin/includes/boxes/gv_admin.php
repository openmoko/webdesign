<?php
/*
  $Id: gv_admin.php,v 1.1.1.1 2004/03/04 23:39:43 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
  
  Chainreaction Works, Inc
  Copyright &copy; 2003-2006  Chain Reaction Works, Inc
  
  Last Modified By : $Author$
  Last Modified On : $LastChangedDate$
  Latest Revision :  $Revision: 302 $
  
*/
?>
<!-- gv_admin //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_GV_ADMIN,
                     'link'  => tep_href_link(FILENAME_COUPON_ADMIN, 'selected_box=gv_admin'));

  if ($selected_box == 'gv_admin' || $menu_dhtml == true) {
 $contents[] = array('text'  => 
        tep_admin_files_boxes(FILENAME_COUPON_ADMIN , BOX_COUPON_ADMIN) .
        tep_admin_files_boxes(FILENAME_GV_REPORT , BOX_GV_REPORT) .
        tep_admin_files_boxes(FILENAME_GV_QUEUE , BOX_GV_ADMIN_QUEUE) .
        tep_admin_files_boxes(FILENAME_GV_MAIL , BOX_GV_ADMIN_MAIL) .
        tep_admin_files_boxes(FILENAME_GV_SENT , BOX_GV_ADMIN_SENT));
 }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- gv_admin_eof //-->
