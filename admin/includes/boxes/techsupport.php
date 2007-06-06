<?php
  /*
  Module: Technical Support Center

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
 
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $LastChangedBy$
  Last Modifed on : $LastChangedDate$
  Latest Revision : $Revision: 707 $

  Released under the GNU General Public License
  */
?>
<!-- Tech Support //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_TECH_SUPPORT,
                     'link'  => tep_href_link('FILENAME_INSTALL_EXPLAIN'));

if ($selected_box == 'information' || $menu_dhtml == true) {
  $contents[] = array('text'  =>  tep_admin_files_boxes(FILENAME_INSTALL_EXPLAIN, BOX_HEADING_INSTALL_EXPLAIN) .
                                  tep_admin_files_boxes(FILENAME_STATS_EXPLAIN,BOX_REPORTS_EXPLAIN)); 
  }
  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- Tech Support_eof //-->
