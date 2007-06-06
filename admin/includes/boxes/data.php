<?php
/*
  $Id: data.php,v 1.1.1.1 2004/03/04 23:39:43 zip1 Exp $
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce
  
  Chain Reaction Works, Inc
  Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision:$

  Released under the GNU General Public License
*/
?>
<!-- data //-->
          <tr>
            <td>
<?php
//Note: this file uses a modified function tep_admin_files_boxes to that you canhave a title and subtitle with offseet.
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_DATA,
                     'link'  => tep_href_link(FILENAME_DATA, 'selected_box=data'));

  if ($selected_box == 'data' || $menu_dhtml == true) {
    $contents[] = array('text'  =>
                                   tep_admin_files_boxes('', BOX_DATA_EASYPOPULATE) .
                                   tep_admin_files_boxes(FILENAME_EASYPOPULATE_EXPORT, BOX_DATA_EASYPOPULATE_EXPORT, 'NONSSL' , '', '2') .
                                   tep_admin_files_boxes(FILENAME_EASYPOPULATE_IMPORT, BOX_DATA_EASYPOPULATE_IMPORT, 'NONSSL' , '', '2') .
                                  
                                   tep_admin_files_boxes('', BOX_DATA_EASYPOPULATE_BASIC) .
                                   tep_admin_files_boxes(FILENAME_EASYPOPULATE_BASIC_EXPORT, BOX_DATA_EASYPOPULATE_BASIC_EXPORT, 'NONSSL' , '', '2') .
                                   tep_admin_files_boxes(FILENAME_EASYPOPULATE_BASIC_IMPORT, BOX_DATA_EASYPOPULATE_BASIC_IMPORT, 'NONSSL' , '', '2') .
                                   
                                   tep_admin_files_boxes('', BOX_DATA) . 
                                 //  tep_admin_files_boxes(FILENAME_BIZRATE_ADMIN, BOX_FEEDERS_BIZRATE, 'NONSSL' , '', '2') .
                                   tep_admin_files_boxes(FILENAME_FROOGLE_ADMIN, BOX_FEEDERS_FROOGLE, 'NONSSL' , '', '2') .
                                  // tep_admin_files_boxes(FILENAME_YAHOO_ADMIN, BOX_FEEDERS_YAHOO, 'NONSSL' , '', '2') .
                                   tep_admin_files_boxes(FILENAME_DATA, BOX_DATA_HELP) );

//Admin end
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- data_eof //-->
