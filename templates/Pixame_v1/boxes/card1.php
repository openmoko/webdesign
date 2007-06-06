<?php
/*
  Card Infobox, v 1.0 2002/12/04 by Kevin Park

  osCommerce
  http://www.oscommerce.com/

  Copyright (c) 2000,2001 osCommerce

  Released under the GNU General Public License


  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 1799 $

*/
?>
<!-- Card Info Box //-->
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_CARD1 . '</font>'
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'center',
//                               'text'  => tep_image(DIR_WS_IMAGES . '/cards/cards.gif') .
//elari chanegd to provide a link to your payment acount
                               'text'  => tep_image(DIR_WS_IMAGES . 'cards/logo-xclick_paypal.gif' , BOX_INFORMATION_CARD).
                               '<br>' . tep_image(DIR_WS_IMAGES . 'cards/cards2.gif', BOX_INFORMATION_CARD) . '<br>'
                               );

new infoBox($info_box_contents);
$info_box_contents = array();
$info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
new infoboxFooter($info_box_contents, true, true);


?>
</td></tr>
<!-- card_eof //-->
