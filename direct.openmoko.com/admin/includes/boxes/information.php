<?php
  /*
  Module: Information Pages Unlimited
        File date: 2003/03/02
      Based on the FAQ script of adgrafics
        Adjusted by Joeri Stegeman (joeri210 at yahoo.com), The Netherlands

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
 
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 1186 $

  Released under the GNU General Public License
  */
?>
<!-- information //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_INFORMATION,
                     'link'  => tep_href_link(FILENAME_PAGES_CATEGORIES, 'selected_box=information'));

if ($selected_box == 'information' || $menu_dhtml == true) {
  $contents[] = array('text'  =>  tep_admin_files_boxes('', BOX_HEADING_PAGE_MANAGER, '', '', '') . 
          tep_admin_files_boxes(FILENAME_PAGES_CATEGORIES, BOX_PAGES_CATEGORIES, 'NONSSL', '', '2') .
          tep_admin_files_boxes(FILENAME_PAGES, BOX_PAGES, 'NONSSL' , '', '1') . 
          tep_admin_files_boxes('','FAQ System') .
          tep_admin_files_boxes(FILENAME_FAQ_MANAGER, BOX_FAQ_MANAGER, 'NONSSL' , '', '1') .
                                        tep_admin_files_boxes(FILENAME_FAQ_CATEGORIES, BOX_FAQ_CATEGORIES, 'NONSSL' , '', '1') .
                                    //tep_admin_files_boxes(FILENAME_FAQ_VIEW, BOX_FAQ_VIEW, 'NONSSL' , '', '1') .
                                    //tep_admin_files_boxes(FILENAME_FAQ_VIEW_ALL,BOX_FAQ_VIEW_ALL, 'NONSSL' , '', '1') .
          tep_admin_files_boxes(FILENAME_DEFINE_MAINPAGE, BOX_CATALOG_DEFINE_MAINPAGE) . 
          tep_admin_files_boxes(FILENAME_INFORMATION_MANAGER, BOX_INFORMATION_MANAGER)); 
  }
  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- information_eof //-->
