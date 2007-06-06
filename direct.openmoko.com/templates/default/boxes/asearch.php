<?php
/*
  $Id: asearch.php
  searches articles using article_manager
  by AlDaffodil (aldaffodil@hotmail.com

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2001 osCommerce
   CRE Loaded , Open Source E-Commerce Solutions
   http://www.creloaded.com
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision:$

  Released under the GNU General Public License
*/
?>
<!-- article search //-->
          <tr>
            <td>
<?php
 //if (ALLOW_QUICK_SEARCH_DESCRIPTION == 'true') {
  //  $param = '<input type="hidden" name="search_in_description" value="1">';
 //  } else {
      $param = '';
// }
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_ASEARCH . '</font>');
     new infoBoxHeading($info_box_contents);

  $hide = tep_hide_session_id();
  $info_box_contents = array();
  $info_box_contents[] = array('form'  => '<form name="quick_find_article" method="get" action="' . tep_href_link(FILENAME_ARTICLE_SEARCH, '', 'NONSSL', false) . '">',
                               'align' => 'center',
                               'text'  => $hide . $param . '<input type="text" name="akeywords" size="10" maxlength="30" value="' . htmlspecialchars(StripSlashes(@$HTTP_GET_VARS["akeywords"])) . '">' . tep_template_image_submit('button_quick_find.gif', BOX_HEADING_SEARCH) . '<br><input type="checkbox" name="description">' . BOX_ASEARCH_TEXT . '<br>');
  new infoBox($info_box_contents);
   if (TEMPLATE_INCLUDE_FOOTER =='true'){
       $info_box_contents = array();
        $info_box_contents[] = array('align' => 'left',
                                      'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                                    );
   new infoboxFooter($info_box_contents);
 }
?>
            </td>
          </tr>
<!-- article_search //-->
