<?php
/*
  $Id: faq.php,v 1.1 2004/03/05 01:39:14 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision:$


  Released under the GNU General Public License
*/

$faq_categories_query = tep_db_query("select ic.categories_id, icd.categories_name from " . TABLE_FAQ_CATEGORIES . " ic, " . TABLE_FAQ_CATEGORIES_DESCRIPTION . " icd where icd.categories_id = ic.categories_id and icd.language_id = '" . (int)$languages_id . "' and ic.categories_status = '1' order by ic.categories_sort_order, icd.categories_name");

// faq outside categories
$faq_query = tep_db_query("select ip.faq_id, ip.question from " . TABLE_FAQ . " ip left join " . TABLE_FAQ_TO_CATEGORIES . " ip2c on ip2c.faq_id = ip.faq_id where ip2c.categories_id = '0' and ip.language = '" . (int)$languages_id . "' and ip.visible = '1' order by ip.v_order, ip.question");

if ((tep_db_num_rows($faq_categories_query) > 0) || (tep_db_num_rows($faq_query) > 0)) {
?>
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_FAQ . '</font>');

  new infoBoxHeading($info_box_contents);

  $faq_string = '';
  while ($faq_categories = tep_db_fetch_array($faq_categories_query)) {
    $id_string = 'cID=' . $faq_categories['categories_id'];
    $faq_string .= '<a href="' . tep_href_link(FILENAME_FAQ, $id_string) . '">' . $faq_categories['categories_name'] . '</a><br>';
  }

  while ($faq = tep_db_fetch_array($faq_query)) {
    $id_string = 'fID=' . $faq['faq_id'];
    $faq_string .= '<a href="' . tep_href_link(FILENAME_FAQ, $id_string) . '">' . $faq['question'] . '</a><br>';
  }

  $info_box_contents = array();
  $info_box_contents[] = array('text'  => $faq_string);

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
<?php
}
?>
