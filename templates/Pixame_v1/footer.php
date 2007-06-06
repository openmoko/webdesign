<?php
/*
  $Id: footer.php,v 1.26 2003/02/10 22:30:54 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/



// WebMakers.com Added: Down for Maintenance
// Hide footer.php if not to show
if (DOWN_FOR_MAINTENANCE_FOOTER_OFF =='false') {
  require(DIR_WS_INCLUDES . FILENAME_COUNTER);
?>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr>
  <td width="5"><img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/links_left.gif" width="5" height="25" alt="image"></td>
     <td class="footer" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/links_middle.gif)"> &nbsp;&nbsp;<?php echo strftime(DATE_FORMAT_LONG); ?>&nbsp;&nbsp;</td>
       <td class="footer" style="background-image: url(<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME ;?>/images/links_middle.gif)" align ="right">&nbsp;&nbsp;<?php echo $counter_now . ' ' . FOOTER_TEXT_REQUESTS_SINCE . ' ' . $counter_startdate_formatted; ?>&nbsp;&nbsp;</td>
  <td width="5"><img src="<?php echo DIR_WS_TEMPLATES . TEMPLATE_NAME;?>/images/links_right.gif" width="5" height="25" alt="image"></td>
  </tr>
</table>
<!-- footer_eof //-->
<?php } ?>