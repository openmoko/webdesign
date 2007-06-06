<?php
/*
  $Id: PriceFormatter.php,v 1.6 2003/06/25 08:29:26 petri Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

/*
    PriceFormatter.php - module to support quantity pricing

    Created 2003, Beezle Software based on some code mods by WasaLab Oy (Thanks!)
*/

class PriceFormatter {
  var $hiPrice;
  var $lowPrice;
  var $quantity;
  var $hasQuantityPrice;
  var $hasCustomersGroupPrice;
  var $customers_group_thePrice;
 var $customers_group_lowPrice;
  var $customers_group_hiPrice;
  
 
  function PriceFormatter($prices=NULL) {
    $this->productsID = -1;

    $this->hasQuantityPrice=false;

    $this->hasSpecialPrice=false;
   $this->hasCustomersGroupPrice=false;
    $this->hiPrice=-1;
    $this->lowPrice=-1;
  $this->customers_group_thePrice=-1;
  $this->customers_group_lowPrice=-1;
  $this->customers_group_hiPrice=-1;
    for ($i=1; $i<=11; $i++){
      $this->quantity[$i] = -1;
      $this->prices[$i] = -1;
    }
    $this->thePrice = -1;
    $this->specialPrice = -1;
    $this->qtyBlocks = 1;

    if($prices)
      $this->parse($prices);
  }

  function encode() {
  $str = $this->productsID . ":"
         . (($this->hasQuantityPrice == true) ? "1" : "0") . ":"
         . (($this->hasSpecialPrice == true) ? "1" : "0") . ":"
         . $this->quantity[1] . ":"
         . $this->quantity[2] . ":"
         . $this->quantity[3] . ":"
         . $this->quantity[4] . ":"
       . $this->quantity[5] . ":"
       . $this->quantity[6] . ":"
       . $this->quantity[7] . ":"
         . $this->quantity[8] . ":"
       . $this->quantity[9] . ":"
       . $this->quantity[10] . ":"
       . $this->quantity[11] . ":"
         . $this->price[1] . ":"
         . $this->price[2] . ":"
         . $this->price[3] . ":"
         . $this->price[4] . ":"
       . $this->price[5] . ":"
       . $this->price[6] . ":"
       . $this->price[7] . ":"
         . $this->price[8] . ":"
       . $this->price[9] . ":"
       . $this->price[10] . ":"
       . $this->price[11] . ":"
         . $this->thePrice . ":"
         . $this->specialPrice . ":"
         . $this->qtyBlocks . ":"
         . $this->taxClass;
  return $str;
  }

  function decode($str) {
  list($this->productsID,
       $this->hasQuantityPrice,
       $this->hasSpecialPrice,
       $this->quantity[1],
       $this->quantity[2],
       $this->quantity[3],
       $this->quantity[4],
       $this->quantity[5],
       $this->quantity[6],
       $this->quantity[7],
       $this->quantity[8],
     $this->quantity[9],
     $this->quantity[10],
     $this->quantity[11],
       $this->price[1],
       $this->price[2],
       $this->price[3],
       $this->price[4],
       $this->price[5],
       $this->price[6],
       $this->price[7],
       $this->price[8],
     $this->price[9],
     $this->price[10],
    $this->price[11],
       $this->thePrice,
       $this->specialPrice,
       $this->qtyBlocks,
       $this->taxClass) = explode(":", $str);

  $this->hasQuantityPrice = (($this->hasQuantityPrice == 1) ? true : false);
  $this->hasSpecialPrice = (($this->hasSpecialPrice == 1) ? true : false);
  }

  function parse($prices) {
  
    $this->productsID = $prices['products_id'];
    $this->hasQuantityPrice=false;
    $this->hasSpecialPrice=false;
$this->hasCustomersGroupPrice='false';
    $this->quantity[1]=$prices['products_price1_qty'];
    $this->quantity[2]=$prices['products_price2_qty'];
    $this->quantity[3]=$prices['products_price3_qty'];
    $this->quantity[4]=$prices['products_price4_qty'];
    $this->quantity[5]=$prices['products_price5_qty'];
    $this->quantity[6]=$prices['products_price6_qty'];
    $this->quantity[7]=$prices['products_price7_qty'];
    $this->quantity[8]=$prices['products_price8_qty'];
  $this->quantity[9]=$prices['products_price9_qty'];
  $this->quantity[10]=$prices['products_price10_qty'];
  $this->quantity[11]=$prices['products_price11_qty'];

    $this->thePrice=$prices['products_price'];
//    $this->specialPrice=$prices['specials_new_products_price'];

// BOF QTY Price Break
    $this->specialPrice=tep_get_products_special_price($prices['products_id']);
// EOF QTY Price Break

  $this->hasSpecialPrice=tep_not_null($this->specialPrice);

  $this->price[1]=$prices['products_price1'];
    $this->price[2]=$prices['products_price2'];
    $this->price[3]=$prices['products_price3'];
    $this->price[4]=$prices['products_price4'];
  $this->price[5]=$prices['products_price5'];
  $this->price[6]=$prices['products_price6'];
  $this->price[7]=$prices['products_price7'];
    $this->price[8]=$prices['products_price8'];
  $this->price[9]=$prices['products_price9'];
    $this->price[10]=$prices['products_price10'];
  $this->price[11]=$prices['products_price11'];
    /*
       Change support special prices
     If any price level has a price greater than the special
     price lower it to the special price
  */
  if ($this->hasSpecialPrice == true) {
    for($i=1; $i<=11; $i++) {
      if ($this->price[$i] > $this->specialPrice)
        $this->price[$i] = $this->specialPrice;
    }
  }
  //end changes to support special prices


if ( $prices['customers_group_flag']=='true')
    {
    $this->hasCustomersGroupPrice='true';
    $this->customers_group_thePrice=$prices['customers_group_price'];
      $this->customers_group_price[1]= $prices['customers_group_price1'];
      $this->customers_group_price[2]= $prices['customers_group_price2'];
      $this->customers_group_price[3]= $prices['customers_group_price3'];
      $this->customers_group_price[4]= $prices['customers_group_price4'];
      $this->customers_group_price[5]= $prices['customers_group_price5'];
      $this->customers_group_price[6]= $prices['customers_group_price6'];
      $this->customers_group_price[7]= $prices['customers_group_price7'];
      $this->customers_group_price[8]= $prices['customers_group_price8'];
      $this->customers_group_price[9]= $prices['customers_group_price9'];
      $this->customers_group_price[10]= $prices['customers_group_price10'];
      $this->customers_group_price[11]= $prices['customers_group_price11'];
    }
else
    {
      $this->hasCustomersGroupPrice='false';
      $this->customers_group_thePrice=0;
      $this->customers_group_price[1]= 0;
      $this->customers_group_price[2]= 0;
      $this->customers_group_price[3]= 0;
      $this->customers_group_price[4]= 0;
      $this->customers_group_price[5]= 0;
      $this->customers_group_price[6]= 0;
      $this->customers_group_price[7]= 0;
      $this->customers_group_price[8]= 0;
      $this->customers_group_price[9]= 0;
      $this->customers_group_price[10]= 0;
      $this->customers_group_price[11]= 0;
      
    }
    // Eversun mod end for SPPP Qty Price Break Enhancement

   
    $this->qtyBlocks=$prices['products_qty_blocks'];

    $this->taxClass=$prices['products_tax_class_id'];

    if ($this->quantity[1] > 0) {
      $this->hasQuantityPrice = true;
      $this->hiPrice = $this->thePrice;
      $this->lowPrice = $this->thePrice;
// Eversun mod for SPPP Qty Price Break Enhancement
if ( $prices['customers_group_flag']=='true')
    {
    $this->customers_group_hiPrice = $this->customers_group_thePrice;
      $this->customers_group_lowPrice = $this->customers_group_thePrice;
   // echo $this->customers_group_lowPrice.'{'.$this->customers_group_thePrice;
    }
   else
    {
      $this->customers_group_hiPrice = 0;
      $this->customers_group_lowPrice = 0;
    }
// Eversun mod end for SPPP Qty Price Break Enhancement
      for($i=1; $i<=11; $i++) {
    if($this->quantity[$i] > 0) {
      if ($this->price[$i] > $this->hiPrice) {
        $this->hiPrice = $this->price[$i];
      }
      if ($this->price[$i] < $this->lowPrice) {
        $this->lowPrice = $this->price[$i];
      }
    }
    }

// Eversun mod for SPPP Qty Price Break Enhancement
if ( $prices['customers_group_flag']=='true')
    {
for($i=1; $i<=11; $i++) {
  // echo '{'.$this->customers_group_lowPrice.'--'.$this->customers_group_thePrice.'--'.$this->customers_group_hiPrice.'}';
    if($this->quantity[$i] > 0) {
      if ($this->customers_group_price[$i] > $this->customers_group_hiPrice) {
        $this->customers_group_hiPrice = $this->customers_group_price[$i];
      }
      if ($this->customers_group_price[$i] < $this->customers_group_lowPrice) {
        $this->customers_group_lowPrice = $this->customers_group_price[$i];
      }
    }
    }
    }
// Eversun mod end for SPPP Qty Price Break Enhancement
    }

  }

  function loadProduct($product_id, $language_id=1)
  {
    
  
    $sql="select pd.products_name, p.products_model, p.products_image, p.products_id," .
        " p.manufacturers_id, p.products_price, p.products_weight," .
        " p.products_price1,p.products_price2,p.products_price3,p.products_price4, p.products_price5,p.products_price6,p.products_price7,p.products_price8,p.products_price9,p.products_price10,p.products_price11," .
        " p.products_price1_qty,p.products_price2_qty,p.products_price3_qty,p.products_price4_qty, p.products_price5_qty,p.products_price6_qty,p.products_price7_qty,p.products_price8_qty,p.products_price9_qty,p.products_price10_qty,p.products_price11_qty," .
        " p.products_qty_blocks," .
        " p.products_tax_class_id," .
        " IF(s.status, s.specials_new_products_price, NULL) as specials_new_products_price," .
        " IF(s.status, s.specials_new_products_price, p.products_price) as final_price" .
        " from " . TABLE_PRODUCTS . " p " .
        " left join " . TABLE_SPECIALS . " s using(products_id), " .
        "      " . TABLE_PRODUCTS_DESCRIPTION . " pd " .
        " where  p.products_id = '" . (int)$product_id . "'" .
        "   and pd.products_id = '" . (int)$product_id . "'" .
        "   and pd.language_id = '". (int)$language_id . "'";

    $product_info_query = tep_db_query($sql);
    $product_info = tep_db_fetch_array($product_info_query);
    
  // Eversun mod for SPPP Qty Price Break Enhancement
      $product_info['customers_group_price1']= 0;
      $product_info['customers_group_price2']= 0;
      $product_info['customers_group_price3']= 0;
      $product_info['customers_group_price4']= 0;
      $product_info['customers_group_price5']= 0;
      $product_info['customers_group_price6']= 0;
      $product_info['customers_group_price7']= 0;
      $product_info['customers_group_price8']= 0;
      $product_info['customers_group_price9']= 0;
      $product_info['customers_group_price10']= 0;
      $product_info['customers_group_price11']= 0;
      $product_info['customers_group_flag']='false';

 $sql1="select  pg.customers_group_price , pg.customers_group_price1 ,pg.customers_group_price2 ,pg.customers_group_price3 ,pg.customers_group_price4 , pg.customers_group_price5 ,pg.customers_group_price6 ,pg.customers_group_price7 ,pg.customers_group_price8 ,pg.customers_group_price9 ,pg.customers_group_price10 ,pg.customers_group_price11" . " from " .TABLE_PRODUCTS_GROUPS ." pg " .    
        " where  pg.products_id = '". (int)$product_id ."'".
    "   and pg.customers_group_id = '". (int)$GLOBALS['sppc_customer_group_id'] ."'"  ;
    
  $scustomer_group_price_query = tep_db_query($sql1);
  if(tep_db_num_rows( $scustomer_group_price_query)>0){
    
       $scustomer_group_price = tep_db_fetch_array($scustomer_group_price_query) ;
      
      
      $product_info['customers_group_price']= $scustomer_group_price['customers_group_price'];
      $product_info['customers_group_price1']= $scustomer_group_price['customers_group_price1'];
      $product_info['customers_group_price2']= $scustomer_group_price['customers_group_price2'];
      $product_info['customers_group_price3']= $scustomer_group_price['customers_group_price3'];
      $product_info['customers_group_price4']= $scustomer_group_price['customers_group_price4'];
      $product_info['customers_group_price5']= $scustomer_group_price['customers_group_price5'];
      $product_info['customers_group_price6']= $scustomer_group_price['customers_group_price6'];
      $product_info['customers_group_price7']= $scustomer_group_price['customers_group_price7'];
      $product_info['customers_group_price8']= $scustomer_group_price['customers_group_price8'];
      $product_info['customers_group_price9']= $scustomer_group_price['customers_group_price9'];
      $product_info['customers_group_price10']= $scustomer_group_price['customers_group_price10'];
      $product_info['customers_group_price11']= $scustomer_group_price['customers_group_price11'];
      $product_info['customers_group_flag']='true';
      
    }
    
// Eversun mod end for SPPP Qty Price Break Enhancement
    $this->parse($product_info);
    return $product_info;
  }

  function computePrice($qty)
  {
  $qty = $this->adjustQty($qty);

  // Compute base price, taking into account the possibility of a special
  $price = ($this->hasSpecialPrice === TRUE) ? $this->specialPrice : $this->thePrice;

  for ($i=1; $i<=11; $i++)
    if (($this->quantity[$i] > 0) && ($qty > $this->quantity[$i]))
      $price = $this->price[$i];
 // Eversun mod  for SPPP Qty Price Break Enhancement
 /*
 if($this->hasCustomersGroupPrice=='true')
    {
   $price =$this->customers_group_thePrice;
for ($i=1; $i<=11; $i++)
    if (($this->quantity[$i] > 0) && ($qty >= $this->quantity[$i]))
      $price = $this->customers_group_price[$i];
    }
 // Eversun mod end for SPPP Qty Price Break Enhancement
  //echo $price;
  */
  return $price;
  }

  function adjustQty($qty) {
  // Force QTY_BLOCKS granularity
  $qb = $this->getQtyBlocks();
  if ($qty < 1)
    $qty = 1;

  if ($qb >= 1)
  {
    if ($qty < $qb)
      $qty = $qb;

    if (($qty % $qb) != 0)
      $qty += ($qb - ($qty % $qb));
  }
  return $qty;
  }

  function getQtyBlocks() {
    return $this->qtyBlocks;
  }

  function getPrice() {
    return $this->thePrice;
  }

  function getLowPrice() {
    return $this->lowPrice;
  }

  function getHiPrice() {
    return $this->hiPrice;
  }

  function hasSpecialPrice() {
    return $this->hasSpecialPrice;
  }

  function hasQuantityPrice() {
    return $this->hasQuantityPrice;
  }

  function getPriceString($style='productPriceInBox') {
    global $currencies;

    if ($this->hasSpecialPrice == true) {
      $lc_text = '<table align="top" border="1" cellspacing="0" cellpadding="0">';
        $lc_text .= '<tr><td align="center" class=' . $style. ' colspan="2">';
        $lc_text .= '&nbsp;<s>'
    . $currencies->display_price($this->thePrice,
             tep_get_tax_rate($this->taxClass))
    . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">'
    . $currencies->display_price($this->specialPrice,
             tep_get_tax_rate($this->taxClass))
    . '</span>&nbsp;'
    .'</td></tr>';
    }
    else
    {
    // Eversun mod  for SPPP Qty Price Break Enhancement
    if($this->hasCustomersGroupPrice=='true')
    {
    $lc_text = '<table align="top" border="1" cellspacing="0" cellpadding="0">';
    $lc_text .= '<tr><td align="center" class=' . $style. ' colspan="2">'
    . $currencies->display_price($this->customers_group_thePrice,
    tep_get_tax_rate($this->taxClass))
    . '</td></tr>';
    }
    else
    {
      $lc_text = '<table align="top" border="1" cellspacing="0" cellpadding="0">';
    $lc_text .= '<tr><td align="center" class=' . $style. ' colspan="2">'
    . $currencies->display_price($this->thePrice,
    tep_get_tax_rate($this->taxClass))
    . '</td></tr>';
    }
    // Eversun end mod  for SPPP Qty Price Break Enhancement
    }
      // If you want to change the format of the price/quantity table
      // displayed on the product information page, here is where you do it.

    if($this->hasQuantityPrice == true) {
// Eversun mod  for SPPP Qty Price Break Enhancement
    if($this->hasCustomersGroupPrice=='true')
    {
      for($i=1; $i<=11; $i++) {
      if($this->quantity[$i] > 0) {
        $lc_text .= '<tr><td class='.$style.'>'
        . $this->quantity[$i]
        .'+&nbsp;</td><td class='.$style.'>'
        . $currencies->display_price($this->customers_group_price[$i],
        tep_get_tax_rate($this->taxClass))
        .'</td></tr>';
    }
    }
    }
    else
    {
      
    for($i=1; $i<=11; $i++) {
      if($this->quantity[$i] > 0) {
        $lc_text .= '<tr><td class='.$style.'>'
        . $this->quantity[$i]
        .'+&nbsp;</td><td class='.$style.'>'
        . $currencies->display_price($this->price[$i],
        tep_get_tax_rate($this->taxClass))
        .'</td></tr>';
      }
    }
  }
  // Eversun mod end for SPPP Qty Price Break Enhancement
    $lc_text .= '</table>';

      }
      else {
    if ($this->hasSpecialPrice == true) {
      $lc_text = '&nbsp;<s>'
        . $currencies->display_price($this->thePrice, tep_get_tax_rate($this->taxClass))
        . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">'
        . $currencies->display_price($this->specialPrice, tep_get_tax_rate($this->taxClass))
        . '</span>&nbsp;';
    }
    else {
    // Eversun mod  for SPPP Qty Price Break Enhancement
      if($this->hasCustomersGroupPrice=='true')
      {
        $lc_text = '&nbsp;'
        . $currencies->display_price($this->customers_group_thePrice,
               tep_get_tax_rate($this->taxClass))
        . '&nbsp;';
      }
      else
      {
      $lc_text = '&nbsp;'
        . $currencies->display_price($this->thePrice,
               tep_get_tax_rate($this->taxClass))
        . '&nbsp;';
      }
      // Eversun mod end for SPPP Qty Price Break Enhancement
    }
        }

    return $lc_text;
  }

  function getPriceStringShort() {
    global $currencies;

    if ($this->hasSpecialPrice == true) {
      $lc_text = '&nbsp;<s>'
  . $currencies->display_price($this->thePrice,
             tep_get_tax_rate($this->taxClass))
  . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">'
  . $currencies->display_price($this->specialPrice,
             tep_get_tax_rate($this->taxClass))
  . '</span>&nbsp;';
    }
    else {
      if($this->hasQuantityPrice == true) {
if($this->hasCustomersGroupPrice=='true')
      {
  $lc_text = '&nbsp;'
    . $currencies->display_price($this->customers_group_lowPrice,
               tep_get_tax_rate($this->taxClass))
    . ' - '
    . $currencies->display_price($this->customers_group_hiPrice,
               tep_get_tax_rate($this->taxClass))
    . '&nbsp;';
      }
    else
      {
      $lc_text = '&nbsp;'
    . $currencies->display_price($this->lowPrice,
               tep_get_tax_rate($this->taxClass))
    . ' - '. $currencies->display_price($this->hiPrice,
               tep_get_tax_rate($this->taxClass)) . '&nbsp;';
      }
      }
      else {
      if($this->hasCustomersGroupPrice=='true')
      {
  $lc_text = '&nbsp;'
    . $currencies->display_price($this->customers_group_thePrice,
               tep_get_tax_rate($this->taxClass))
    . '&nbsp;';
      }
    else
      {
      $lc_text = '&nbsp;'
    . $currencies->display_price($this->thePrice,
               tep_get_tax_rate($this->taxClass))
    . '&nbsp;';
      }
      }
    }
    return $lc_text;
  }


// Eversun mod  for SPPP Qty Price Break Enhancement
 function getCustomerGroupPrice() {
    return $this->customers_group_thePrice;
  }
 function getCustomerGroupLowPrice() {
    return $this->customers_group_lowPrice;
  }

  function getCustomerGroupHiPrice() {
   
    return $this->customers_group_hiPrice;
  }



  function hasCustomerGroupPrice() {
  
    return $this->hasCustomersGroupPrice;
  }

  function hasCustomerGroupcomputePrice($qty)
  {
  $qty = $this->adjustQty($qty);

  // Compute base price, taking into account the possibility of a special
  $price = ($this->hasSpecialPrice === TRUE) ? $this->specialPrice : $this->thePrice;

  for ($i=1; $i<=11; $i++)
    if (($this->quantity[$i] > 0) && ($qty >= $this->quantity[$i]))
      $price = $this->price[$i];
 // Eversun mod  for SPPP Qty Price Break Enhancement
 if($this->hasCustomersGroupPrice=='true')
    {
   $price =$this->customers_group_thePrice;
for ($i=1; $i<=11; $i++)
    if (($this->quantity[$i] > 0) && ($qty > $this->quantity[$i]))
      $price = $this->customers_group_price[$i];
    }
 // Eversun mod end for SPPP Qty Price Break Enhancement
  //echo '{price='.$price.'}';
  return $price;
  }
// Eversun mod end for SPPP Qty Price Break Enhancement
}
?>
