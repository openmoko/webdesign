<?php
/*
  $Id: modules.php,v 1.1.1.1 2004/03/04 23:39:43 ccwjr Exp $

  
  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 707 $

  Released under the GNU General Public License
*/
?>
<!-- modules //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_MODULES,
                     'link'  => tep_href_link(FILENAME_MODULES, 'set=payment&selected_box=modules', 'SSL'));

  if ($selected_box == 'modules' || $menu_dhtml == true) {

  $contents[] = array('text'  =>tep_admin_files_boxes(FILENAME_MODULES, BOX_MODULES_PAYMENT, 'SSL' , 'set=payment') . 
          tep_admin_files_boxes(FILENAME_MODULES, BOX_MODULES_SHIPPING, 'NONSSL' , 'set=shipping') . 
          tep_admin_files_boxes(FILENAME_MODULES, BOX_MODULES_ORDER_TOTAL, 'NONSSL' , 'set=ordertotal') . 
          tep_admin_files_boxes(FILENAME_MODULES, BOX_MODULES_CHECKOUT_SUCCESS, 'NONSSL' , 'set=checkout_success'));
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- modules_eof //-->
