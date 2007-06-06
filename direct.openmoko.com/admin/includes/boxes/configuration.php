<?php
/*
  $Id: configuration.php,v 1.1.1.1 2004/03/04 

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce
       
       Chain Reaction Works, Inc
  Copyright (c) 2005 - 2006 Chain Reaction Works, Inc.

  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 1075 $

  Released under the GNU General Public License
*/
?>
<!-- configuration //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_CONFIGURATION,
                     'link'  => tep_href_link(FILENAME_CONFIGURATION, 'gID=1&selected_box=configuration'));

  if ($selected_box == 'configuration' || $menu_dhtml == true) {
    $cfg_groups = '';
    $configuration_groups_query = tep_db_query("select configuration_group_id as cgID, configuration_group_title as cgTitle from " . TABLE_CONFIGURATION_GROUP . " where visible = '1' order by sort_order");
    while ($configuration_groups = tep_db_fetch_array($configuration_groups_query)) { 
      $cfg_groups .=  tep_admin_files_boxes(FILENAME_CONFIGURATION,  $configuration_groups['cgTitle'], 'NONSSL', 'gID=' . $configuration_groups['cgID'] );
    }

    $contents[] = array('text'  => $cfg_groups);
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- configuration_eof //-->
