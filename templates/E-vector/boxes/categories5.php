<?php
/*
  $Id: all_categories.php,v 1.6 2002/04/22 20:34:00 clescuyer Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com/

  Copyright (c) 2002 Goélette
  Christian Lescuyer <cl@goelette.net>
  http://www.goelette.net/
  http://oscommerce.goelette.net/

  History: 1.1 Creation
           1.2 Modified query for compatibility with older databases
           1.3 Query in 1.2 was wrong for older databases
           1.4 SHOW_COUNTS test corrected
           1.5 Added COMPACT_CATEGORIES option to display all sub-categories on one line
           1.6 Removed COMPACT_CATEGORIES option
               Corrected the cpath generation
               Bold categories "path" to selected category, an idea from Peter Fürsicht
           1.7 Cleaned the way in which the categories are displayed - bold for the path,
               ">" to indicate the current category, removed link to current category,
               only indent subcategories (top level are flush left)

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 3433 $

  Released under the GNU General Public License

*/

// Keep out parts category
    $excluded_parts_category_id = 28;


// Preorder tree traversal
  function preorder($cid, $level5, $foo5, $cpath) {
    global $categories_string5, $HTTP_GET_VARS;

    if ($cid != 0) {
  // 1.7 Get the current path info
      $category_path = explode('_',$HTTP_GET_VARS['cPath']);
      $in_path = in_array($cid, $category_path);
      $this_category = array_pop($category_path);

      for ($i=0; $i<$level5; $i++)
      // 1.7 only indent subcategories (top level are flush left)
        if ($i>0) {
          $categories_string5 .=  '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        }
        // 1.7 indicate the current category
        if ($this_category == $cid) {
          $categories_string5 .=  '> ';
        }

        // 1.7  don't link the current category
        if ($this_category != $cid) {
          $categories_string5 .= '<a href="' . tep_href_link(FILENAME_DEFAULT, 'cPath=' . $cpath . $cid) . '">';
        }
  // 1.6 Are we on the "path" to selected category? If yes, use <b>
        if ($in_path) {
          $categories_string5 .=  '<b>';
        }
        $categories_string5 .=  $foo5[$cid]['name'];
        if ($in_path)
          $categories_string5 .=  '</b>';
        // 1.7  don't link the current category
        if ($this_category != $cid) {
          $categories_string5 .= '</a>';
        }
    // 1.4 SHOW_COUNTS is 'true' or 'false', not true or false
          if (SHOW_COUNTS == 'true') {
            $products_in_category = tep_count_products_in_category($cid);
            if ($products_in_category > 0) {
              $categories_string5 .= '&nbsp;(' . $products_in_category . ')';
            }
          }
        $categories_string5 .= '<br>' ."\n";
      }

// Traverse category tree
      foreach ($foo5 as $key => $value) {
        if ($foo5[$key]['parent'] == $cid) {
  //        print "$key, $level5, $cid, $cpath<br>";
          preorder($key, $level5+1, $foo5, ($level5 != 0 ? $cpath . $cid . '_' : ''));
        }
      }
  }

?>
<!--  categories 5//-->
          <tr>
            <td>
<?php
//////////
// Display box heading
//////////
  $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_CATEGORIES5 . '</font>');
  new infoBoxHeading($info_box_contents, false, false);


//////////
// Get categories list
//////////
// 1.2 Test for presence of status field for compatibility with older versions
  $status = tep_db_num_rows(tep_db_query('describe categories status'));
  $query5 = "select 
    c.categories_id, 
    cd.categories_name, 
    c.categories_image,
    c.parent_id from 
    " . TABLE_CATEGORIES . " c,
    " . TABLE_CATEGORIES_DESCRIPTION . " cd 
    where 
    c.parent_id = '0' 
   and c.categories_id = cd.categories_id 
   and cd.language_id='" . $languages_id ."' 
 order by sort_order, cd.categories_name";
 

  $categories_query5 = tep_db_query($query5);

// Stuff in an array
  while ($categories5 = tep_db_fetch_array($categories_query5))  {
    $foo5[$categories5['categories_id']] = array('name' => $categories5['categories_name'], 'parent' => $categories5['parent_id']);
  }

// Initiate tree traverse
  $categories_string5 = '';
  preorder(0, 0, $foo5, '');

//////////
// Display box contents
//////////
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left', 'text'  => $categories_string5);
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- categories5_eof //-->
