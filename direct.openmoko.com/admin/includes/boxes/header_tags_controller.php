<?php
/*
  $Id: header_tags_controller.php,v 1.00 2003/10/02 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
  
  Chain Reaction Works, Inc.
  Copyright &copy; 2006
  
  Last Modified By : $Author$
  Last Modified On : $Date$
  Latest Revision  : $Revision$
*/
?>
<!-- header_tags_controller //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_HEADER_TAGS_CONTROLLER,
                     'link'  => tep_href_link(FILENAME_HEADER_TAGS_CONTROLLER, 'selected_box=header tags'));

  if ($selected_box == 'header tags' || $menu_dhtml == true) {
    $contents[] = array('text'  => tep_admin_files_boxes(FILENAME_HEADER_TAGS_CONTROLLER, BOX_HEADER_TAGS_ADD_A_PAGE ) .
                                   tep_admin_files_boxes(FILENAME_HEADER_TAGS_ENGLISH, BOX_HEADER_TAGS_ENGLISH ).
                                   tep_admin_files_boxes(FILENAME_HEADER_TAGS_FILL_TAGS,  BOX_HEADER_TAGS_FILL_TAGS));
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- header_tags_controller_eof //-->
