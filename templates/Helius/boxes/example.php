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
  Latest Revision : $Revision: 1601 $

*/
?>
<!-- Example_infobox Box //-->
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'left',
                               'text'  => '<font color="' . $font_color . '">' . BOX_HEADING_EXAMPLE . '</font>'
                 // Change BOX_HEADING_EXAMPLE to your name, which you can find it easily.
                 //and use the same in Infobox Admin to configure infobox.
                              );
  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('align' => 'center',
                // add infobox content below.
                //'text'  => 'Your Content here'
                'text'  => TEXT_YOUR_CONTENT_HERE
                               );

new infoBox($info_box_contents);

$info_box_contents = array();
$info_box_contents[] = array('align' => 'left',
                                'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                              );
new infoboxFooter($info_box_contents, true, true);
?>
</td></tr>
<!-- Example_infobox_eof //-->
