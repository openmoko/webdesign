<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2001 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 2097 $

  Released under the GNU General Public License
*/
?>
<!-- categories1 //-->
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_CATEGORIES1 . '</font>'
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('form' => '<form action="' . tep_href_link(FILENAME_DEFAULT) . '" method="get">' . tep_hide_session_id(),
                               'align' => 'left',
                               'text'  => tep_draw_pull_down_menu('cPath', tep_get_categories(array(array('id' => '', 'text' => PULL_DOWN_DEFAULT))), $cPath, 'onchange="this.form.submit();"')
                              );
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- categories1_eof //-->
