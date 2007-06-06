<?php
/*
  $Id: design_controls.php,v 1.1.1.1 2004/03/04 23:39:43 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
  
  Chainreaction Works, Inc
  Copyright &copy; 2005 Chainreaction Works, Inc
  
  Last Modifed by : $Author$
  Last Modified on : $Date$
  Latest Revision : $Revision: 2482 $
*/
?>
<!-- Design Controls //-->
          <tr>
            <td>
<?php

$template_id_select_query = tep_db_query("select template_id from " . TABLE_TEMPLATE . "  where template_name = '" . DEFAULT_TEMPLATE . "'");
$template_id_select =  tep_db_fetch_array($template_id_select_query);

if (MENU_DHTML != 'True') {
$default_temp_link = '&amp;cID=' . $template_id_select[template_id];
}

  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_DESIGN_CONTROLS,
                   'link'  => tep_href_link(FILENAME_TEMPLATE_CONFIGURATION, 'selected_box=design_controls' . $default_temp_link));

  if ($selected_box == 'design_controls' || $menu_dhtml == true) {
    $contents[] = array('text'  =>  tep_admin_files_boxes('',BOX_HEADING_TEMPLATE_HEADER_TAGS ) .
                                    tep_admin_files_boxes(FILENAME_HEADER_TAGS_CONTROLLER, BOX_HEADER_TAGS_ADD_A_PAGE, 'NONSSL' , '', '2' ) .
                                    tep_admin_files_boxes(FILENAME_HEADER_TAGS_ENGLISH, BOX_HEADER_TAGS_ENGLISH, 'NONSSL' , '', '2' ).
                                    tep_admin_files_boxes(FILENAME_HEADER_TAGS_FILL_TAGS,  BOX_HEADER_TAGS_FILL_TAGS, 'NONSSL' , '', '2') .
                                    //Template Admin
                                    tep_admin_files_boxes('', BOX_HEADING_DESIGN_TEMPLATE) .
                                    tep_admin_files_boxes(FILENAME_TEMPLATE_ADMIN, BOX_HEADING_TEMPLATE_MANAGEMENT , 'NONSSL' , '', '2') .
                                    tep_admin_files_boxes(FILENAME_TEMPLATE_CONFIGURATION, BOX_HEADING_TEMPLATE_CONFIGURATION, 'NONSSL' ,'cID=' . $template_id_select[template_id],'2') .
                                    //Infobox Admin
                                    tep_admin_files_boxes('', BOX_HEADING_DESIGN_INFOBOX) .
                                  //  tep_admin_files_boxes(FILENAME_INFOBOX_ADMIN, BOX_HEADING_BOXES, 'NONSSL' , '', '2') .
                                    tep_admin_files_boxes(FILENAME_INFOBOX_CONFIGURATION, BOX_HEADING_BOXES_ADMIN, 'NONSSL', 'gID=' . $template_id_select[template_id],'2') );
                                  //  tep_admin_files_boxes(FILENAME_NAVMENU, BOX_TEMPLATE_NAVMENU, 'NONSSL' , '', '2') .
                                  //  Layout Admin
                                  //  tep_admin_files_boxes('', BOX_HEADING_DESIGN_LAYOUT) .
                                  //  tep_admin_files_boxes(FILENAME_PRODUCT_LIST_ADMIN, BOX_HEADING_DESIGN_PRODUCT_LISTING, 'NONSSL' , '', '2')

//Admin end
  }

   $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- design controls _eof //-->
