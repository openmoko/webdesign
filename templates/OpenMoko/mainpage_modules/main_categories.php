<?php
/*
  $Id: main_categories.php,v 1.0a 2002/08/01 10:37:00 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com/

  Copyright (c) 2002 Barreto
  Gustavo Barreto <gustavo@barreto.net>
  http://www.barreto.net/

  Based on: all_categories.php Ver. 1.6 by Christian Lescuyer

  History: 1.0 Creation
     1.0a Correction: Extra Carriage Returns
     1.1  added parameters to change display options -- mdt

  Released under the GNU General Public License

*/

//------------------------------------------------------------------------------------------------------
// PARAMETERS
//------------------------------------------------------------------------------------------------------

$item_column_number = 3;    // range of 1 to 9
$item_title_on_newline = true;  // true or false

// for item and subcategory options, suugest that you just put in CSS code
// you can also just define a class and then change it in a template addon like BTS
$item_div_options = 'style="text-align:center;font-weight:bold;font-size:larger;margin-top:5px;"';
$item_subcategories_options = '';

//------------------------------------------------------------------------------------------------------
// CODE - do not change below here
//------------------------------------------------------------------------------------------------------

// error checking on parameters
if($item_column_number < 1)
{
  $item_column_number = 1;
}
if($item_column_number > 9)
{
  $item_column_number = 9;
}
if($item_title_on_newline)
{
  $item_separator = '<br>';
} else {
  $item_separator = '&nbsp;';
}

// preorder_mc tree traversal
  function preorder_mc($cid_cat, $level_cat, $foo_cat, $cpath_cat)
  {
    global $categories_string_cat, $HTTP_GET_VARS;

// Display link
    if ($cid_cat != 0) {
      for ($i=0; $i<$level_cat; $i++)
        $categories_string_cat .=  '&nbsp;&nbsp;';
      $categories_string_cat .= '<a href="' . tep_href_link(FILENAME_DEFAULT, 'cPath
=' . $cpath_cat . $cid_cat) . '">';
// 1.6 Are we on the "path" to selected category?
      $bold = strstr($HTTP_GET_VARS['cPath'], $cpath_cat . $cid_cat . '_') || $HTTP_GET_VARS['cPath'] == $cpath_cat . $cid_cat;
// 1.6 If yes, use <b>
      if ($bold)
        $categories_string_cat .=  '<b>';
      $categories_string_cat .=  $foo_cat[$cid_cat]['name'];
      if ($bold)
        $categories_string_cat .=  '</b>';
      $categories_string_cat .=  '</a>';
// 1.4 SHOW_COUNTS is 'true' or 'false', not true or false
      if (SHOW_COUNTS == 'true') {
        $products_in_category = tep_count_products_in_category($cid_cat);
        if ($products_in_category > 0) {
          $categories_string_cat .= '&nbsp;(' . $products_in_category . ')';
        }
      }
      $categories_string_cat .= '<br>';
    }

// Traverse category tree
    if (is_array($foo_cat)) {
      foreach ($foo_cat as $key => $value) {
        if ($foo_cat[$key]['parent'] == $cid_cat) {
          preorder_mc($key, $level_cat+1, $foo_cat, ($level_cat != 0 ? $cpath_cat . $cid_cat . '_' : ''));
        }
      }
    }
  }

?>
<!-- main_categories //-->
          <tr>
            <td>
<?php
//////////
// Display box heading
//////////
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left', 'text'  => BOX_HEADING_CATEGORIES_MAIN_PAGE);
  //new infoBoxHeading($info_box_contents, true, true);


//////////
// Get categories list
//////////

$query_cat = "select 
  c.categories_id, 
  cd.categories_name, 
  c.categories_image,
  cd.categories_description,
  c.parent_id from 
  " . TABLE_CATEGORIES . " c,
  " . TABLE_CATEGORIES_DESCRIPTION . " cd 
  where 
  c.parent_id = '0' 
 and c.categories_id = cd.categories_id 
 and cd.language_id='" . $languages_id ."' 
 order by sort_order, cd.categories_name";

  $categories_query_cat = tep_db_query($query_cat);


// Initiate tree traverse
$categories_string_cat = '';
preorder_mc(0, 0, $foo_cat, '');

//////////
// Display box contents
//////////

$info_box_contents = array();

$row = 0;
$col = 0;
while ($categories_cat = tep_db_fetch_array($categories_query_cat))
{
  if ($categories['parent_id'] == 0)
    {
      $cpath_cat_new = tep_get_path($categories_cat['categories_id']);
      $text_subcategories = '';
      $subcategories_query_cat = tep_db_query($query_cat);
      while ($subcategories_cat = tep_db_fetch_array($subcategories_query_cat))
      {
        if ($subcategories_cat['parent_id'] == $categories_cat['categories_id'])
      {
                $cPath_new_sub = "cPath="  . $categories_cat['categories_id'] . "_" . $subcategories_cat['categories_id'];
                $text_subcategories .= '� <a href="' . tep_href_link(FILENAME_DEFAULT, $cPath_new_sub, 'NONSSL') . '">';
                $text_subcategories .= $subcategories_cat['categories_name'] . '</a>' . " ";

          } // if ($subcategories['parent_id'] == $categories['categories_id'])

      } // while ($subcategories = tep_db_fetch_array($subcategories_query))

      $print_categories[] = '<div class="main_category main_category_'.strtolower($categories_cat['categories_id']).'">
      							<h3><a href="'.tep_href_link(FILENAME_DEFAULT, $cpath_cat_new).'">'.$categories_cat['categories_name'].'</a></h3>
      							<div class="main_categories_description">
      								'.$categories_cat['categories_description'].'
      							</div>
      							
      							<a class="img_button button_'.strtolower($categories_cat['categories_id']).'" href="'.tep_href_link(FILENAME_DEFAULT, $cpath_cat_new).'"><span>'.$categories_cat['categories_name'].'</span></a>
      						</div>';
      
      // determine the column position to see if we need to go to a new row
      $col ++;
      if ($col > ($item_column_number - 1))
      {
          $col = 0;
          $row ++;

      } //if ($col > ($number_of_columns - 1))

    } //if ($categories['parent_id'] == 0)

} // while ($categories = tep_db_fetch_array($categories_query))

//output the contents
//new contentBox($info_box_contents);

foreach ($print_categories as $print_category) {
	//echo $print_category;
}

// this is static page for now

?>

<div class="shop_home">
	<h3 class="shop_home_h3"><a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO,'products_id=43','SSL'); ?>">Neo Base</a></h3>
	<h3 class="shop_home_h3"><a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO,'products_id=44','SSL'); ?>">Neo Advanced</a></h3>
	
	<div class="shop_home_column">
		<p class="main_categories_description">The Neo1973 is the world's first completely open, Linux-based mobile phone. Designed with elongated oval lines and smooth rounded edges, the sleek exterior, and ergonomic feel fit the Neo1973 into the palm of your hand.</p>
		<a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO,'products_id=43','SSL'); ?>" class="button_buy_it_now img_button"><span>Buy it now</span></a>
	</div>

	<div class="shop_home_column shop_home_column_right">
		<p class="main_categories_description">The Hacker's Lunch Box is a heavy duty, mysterious black box that houses the OpenMoko development board. The Lunch Box is padded to protect your Neo1973, development board, and accessories for hackers in transport.</p>	
		<a href="<?php echo tep_href_link(FILENAME_PRODUCT_INFO,'products_id=44','SSL'); ?>" class="button_buy_it_now img_button"><span>Buy it now</span></a>
	</div>
</div>





<!-- main_categories_eof //-->
