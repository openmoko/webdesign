<?php
/*
  $Id: customer_gv.php,v 1.1.1.1 2003/09/18 19:05:49 wilt Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

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
<!-- D Tell Customer he has a gift voucher-->
<?php
  if ($customer_id) {
    $gv_query=tep_db_query("select amount from " . TABLE_COUPON_GV_CUSTOMER . " where customer_id='".$customer_id."'");
    if ($gv_result=tep_db_fetch_array($gv_query)) $customer_gv_amount=$gv_result['amount'];
  }
if ($customer_gv_amount>0) {
?>
          <tr>
            <td>
<?php
 $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_GIFT_VOUCHER . '</font>'
                               );

  new infoBoxHeading($info_box_contents);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<div align="center">'.GIFT_VOUCHER_ACCOUNT_BALANCE_1.$currencies->format($customer_gv_amount).GIFT_VOUCHER_ACCOUNT_BALANCE_2.'<a href="'.tep_href_link(FILENAME_GV_SEND).'">'.GIFT_VOUCHER_ACCOUNT_BALANCE_3.'</a>'
                              );

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
<!--D Tell Customer he has a gift voucher_eof //-->
