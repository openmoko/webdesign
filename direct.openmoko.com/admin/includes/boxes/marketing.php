<?php
/*
  $Id: marketing.php,v 1.1.1.1 2004/03/04 23:39:44 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
  
  Chain Reaction Works, Inc.
  Copyright &copy; 2005-2006 
  
  Last Modified By : $Author$
  Last Modifed On :  $Date$
  Latest Revision :  $Revision: 263 $
 Released under the GNU General Public License  
*/
?>
<!-- marketing //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_MARKETING,
            'link'  => tep_href_link(FILENAME_EVENTS_MANAGER, 'selected_box=marketing'));

  if ($selected_box == 'marketing' || $menu_dhtml == true) {
    $contents[] = array('text'  => tep_admin_files_boxes(FILENAME_EVENTS_MANAGER, BOX_MARKETING_EVENTS_MANAGER).
                                   tep_admin_files_boxes(FILENAME_BANNER_MANAGER, BOX_MARKETING_BANNER_MANAGER) .
                                   tep_admin_files_boxes(FILENAME_SALEMAKER, BOX_MARKETING_SALEMAKER) .
                             tep_admin_files_boxes(FILENAME_SPECIALS, BOX_MARKETING_SPECIALS) .
           tep_admin_files_boxes(FILENAME_SPECIALSBYCAT, BOX_MARKETING_SPECIALSBYCAT) 
                                   );
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- marketing_eof //-->
