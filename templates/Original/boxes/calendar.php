<?php
/*
$ID
  ~ events_calendar v2.00 2003/06/16 18:09:20 ip chilipepper.it 
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce
  Released under the GNU General Public License

   CRE Loaded , Open Source E-Commerce Solutions
   http://www.creloaded.com
  Chain Reaction Works, Inc
  Portions: Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 2426 $

*/


?>
<!-- events_calendar //-->
          <tr>
            <td>
<?php

    $info_box_contents = array();
    $info_box_contents[] = array('text'  => '<font color="' . $font_color . '">' . BOX_HEADING_CALENDER . '</font>');
    new infoBoxHeading($info_box_contents, false, false,tep_href_link(FILENAME_EVENTS_CALENDER));

   $info_box_contents = array();
   $info_box_contents[] = array('align' => 'center',
                                'text' => '<iframe name="calendar" id="calendar" align="center" marginwidth="0" marginheight="0" ' .
                                          'src='  . FILENAME_EVENTS_CALENDAR_CONTENT . '?_month=' . $_month .'&amp;_year='. $_year .' frameborder=0 height=220 width=162 scrolling=no> ' .IFRAME_ERROR.'</iframe> ');
   
 
    new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- events_calendar //-->
