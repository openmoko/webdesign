<?php
/*

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
 Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision:$


  Released under the GNU General Public License
*/

// VJ navmenu begin
define('TABLE_NAVMENU_CATEGORIES', 'navmenu_categories');
define('TABLE_NAVMENU_CATEGORIES_DESCRIPTION', 'navmenu_categories_description');
define('TABLE_NAVMENU_LINKS', 'navmenu_links');
define('TABLE_NAVMENU_LINKS_DESCRIPTION', 'navmenu_links_description');
define('TABLE_NAVMENU_LINKS_TO_CATEGORIES', 'navmenu_links_to_categories');
// VJ navmenu end

function tep_nm_get_navmenu_list($pid = 0, $list_string = '', $style_id = '') {
  global $languages_id;

  $categories_query = tep_db_query("select c.nmc_id, cd.nmc_name
                                    from " . TABLE_NAVMENU_CATEGORIES . " c,
                                         " . TABLE_NAVMENU_CATEGORIES_DESCRIPTION . " cd
                                    where c.nmc_parent_id = '" . (int)$pid . "'
                                      and cd.nmc_id = c.nmc_id
                                      and cd.language_id = '" . (int)$languages_id . "'
                                    order by c.nmc_sort_order, cd.nmc_name");

  $links_query = tep_db_query("select l.nml_id, l.nml_url, ld.nml_name
                               from " . TABLE_NAVMENU_CATEGORIES . " c,
                                    " . TABLE_NAVMENU_LINKS_TO_CATEGORIES . " l2c,
                                    " . TABLE_NAVMENU_LINKS . " l,
                                    " . TABLE_NAVMENU_LINKS_DESCRIPTION . " ld
                               where c.nmc_id = '" . (int)$pid . "'
                                 and c.nmc_id = l2c.nmc_id
                                 and l2c.nml_id = l.nml_id
                                 and ld.nml_id = l.nml_id
                                 and ld.language_id = '" . (int)$languages_id . "'
                               order by l.nml_sort_order, ld.nml_name");

  if ((tep_db_num_rows($categories_query) > 0) || (tep_db_num_rows($links_query) > 0)) {
    if (empty($list_string)) {
      $list_string .= '<ul id="' . $style_id . '">' . "\n";
    } else {
      $list_string .= '<ul>' . "\n";
    }

    while ($categories = tep_db_fetch_array($categories_query)) {
      $list_string .= '<li><a href="#">' . $categories['nmc_name'] . '</a>';

      $list_string = tep_nm_get_navmenu_list((int)$categories['nmc_id'], $list_string);

      $list_string .= '</li>' . "\n";
    } 

    while ($links = tep_db_fetch_array($links_query)) {
      $list_string .= '<li><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $links['nml_url'], 'NONSSL') . '">' . $links['nml_name'] . '</li>' . "\n";
    } 

    $list_string .= '</ul>' . "\n";
  }

  return $list_string;
}
?>
<!-- navmenu //-->
<script type="text/javascript"><!--
sfHover = function() {
   var sfEls = document.getElementById("navMenu").getElementsByTagName("LI");
   for (var i=0; i<sfEls.length; i++) {
     sfEls[i].onmouseover=function() {
       this.className+=" sfhover";
     }
     sfEls[i].onmouseout=function() {
       this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
     }
   }
}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--></script>
                  <tr>
                    <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="100%">
<?php
$info_box_contents = array();
$info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_NAVMENU . '</font>');
new infoBoxHeading($info_box_contents, false, false);

$menu_string = tep_nm_get_navmenu_list(0, '', 'navMenu');

// VJ debug
//print_r($menu_string);

$info_box_contents = array(array('text' =>  $menu_string));

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
                    </table>
                    </td>
                  </tr>
<!--D information_eof //-->
