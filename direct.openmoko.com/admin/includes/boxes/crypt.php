<?php
/*
  $Id: crypt.php,v 1.1.1.1 2004/03/04 23:39:43  $

  Chain Reaction Works, Inc.
  Copyright &copy; 2005-2006 
  
  Last Modified By : $Author: Author $
  Last Modifed On :  $Date: LastChangeDate$
  Latest Revision :  $Revision: 2308 $

  Released under the GNU General Public License
*/
?>
<!-- customers //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_CRYPT,
                     'link'  => tep_href_link(FILENAME_CRYPT, 'selected_box=crypt'));

  if ($selected_box == 'crypt' || $menu_dhtml == true) {
    $contents[] = array('text'  =>
//Admin begin
                                   tep_admin_files_boxes(FILENAME_CRYPT, BOX_CRYPT_CONFIGURATION, 'SSL') .
                                   tep_admin_files_boxes(FILENAME_EDIT_KEY, BOX_CRYPT_KEYS, 'SSL') . 
                                   tep_admin_files_boxes('', BOX_CRYPT_CC_DATA) . 
                                   '&nbsp;&nbsp;' . tep_admin_files_boxes(FILENAME_CRYPT_UPDATE, BOX_CRYPT_UPDATE, 'SSL') .
                               // '&nbsp;&nbsp;' . tep_admin_files_boxes(FILENAME_CRYPT_CONVERT, BOX_CRYPT_CONVERT, 'SSL') .
                                   '&nbsp;&nbsp;' . tep_admin_files_boxes(FILENAME_CRYPT_PURGE, BOX_CRYPT_PURGE, 'SSL') .
                                   tep_admin_files_boxes(FILENAME_EDIT_KEY_HELP, BOX_CRYPT_HELP) .
                                   tep_admin_files_boxes(FILENAME_CRYPT_TEST, BOX_CRYPT_TEST, 'SSL'));


//Admin end
  }

  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- customers_eof //-->
