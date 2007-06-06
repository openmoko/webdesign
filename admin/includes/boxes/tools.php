<?php
/*
  $Id: tools.php,v 1.1.1.1 2004/03/04 23:39:44 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
  
  Chain Reaction Works, Inc.
  Copyright &copy; 2005-2006 
  
  Last Modified By : $Author: Author $
  Last Modifed On :  $Date: LastChangeDate$
  Latest Revision :  $Revision: 1444 $
*/
?>
<!-- tools //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_TOOLS,
                     'link'  => tep_href_link(FILENAME_BACKUP_MYSQL, 'selected_box=tools'));

  if ($selected_box == 'tools' || $menu_dhtml == true) {
    $contents[] = array('text'  => tep_admin_files_boxes(FILENAME_BACKUP_MYSQL, BOX_TOOLS_MYSQL_BACKUP, 'SSL') .
                                   tep_admin_files_boxes(FILENAME_BACKUP,BOX_TOOLS_BACKUP) .
                                   tep_admin_files_boxes(FILENAME_CACHE, BOX_TOOLS_CACHE) .
                                   tep_admin_files_boxes(FILENAME_EDIT_LANGUAGES, BOX_TOOLS_DEFINE_LANGUAGE) .
                                   tep_admin_files_boxes(FILENAME_EMAIL_SUBJECTS, BOX_TOOLS_EMAIL_SUBJECTS ) .
                                   tep_admin_files_boxes(FILENAME_MAIL, BOX_TOOLS_MAIL) .
                                   tep_admin_files_boxes(FILENAME_NEWSLETTERS, BOX_TOOLS_NEWSLETTER_MANAGER) .
                                   tep_admin_files_boxes(FILENAME_SERVER_INFO, BOX_TOOLS_SERVER_INFO) .
                                   tep_admin_files_boxes(FILENAME_WHOS_ONLINE, BOX_TOOLS_WHOS_ONLINE));
//Admin end
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- tools_eof //-->
