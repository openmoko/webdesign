<?php
/*
  $Id: server_info.php,v 1.6 2003/06/30 13:13:49 dgw_ Exp $


  Copyright (c) 2005 Chainreactionworks.com
  Released under the GNU General Public License
*/

  require('includes/application_top.php');
include (DIR_WS_LANGUAGES . $language . '/' . FILENAME_DATA);
?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/menu.js"></script>
<script language="javascript" src="includes/general.js"></script>
<script language="javascript"><!--
function popupWindow(url) {
  window.open(url,'popupWindow','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=450,height=300%,screenX=150,screenY=150,top=150,left=150')
}
//--></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2" class="menuBoxHeading">
                         <tr>
                     <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                       <tr>
                         <td class="pageHeading"><?php echo HEADING_TITLE . TEXT_FEED_FROOGLE; ?></td>
                        </tr>
                        <tr>
                        <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                       </tr>
                     </table></td>
                   </tr>
<tr class="attributeBoxContent">

 <td>
 <?php echo tep_draw_separator('pixel_trans.gif', '24', '15') . '&nbsp;'  ; ?>
</td>
</tr>
    <tr>
        <td><?php
        // froogle
        $data_query = tep_db_query("select data_files_id, data_name from " . TABLE_DATA_FILES . " where data_status = '1' and data_files_service = 'froogle' ");
        while ($data = tep_db_fetch_array($data_query)) {
        
              $file_type_array[] = array('id' => $data['data_files_id'], 'text' => $data['data_name']) ;
         }

    ?>

      <tr>
       <td>
        <?php 
          //configure
        
          echo '&nbsp;' . TEXT_CONFIGURE . tep_draw_form('run', FILENAME_DATA_ADMIN, 'page=1', 'post', ''); 
          echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . TEXT_FEED_CONFIGURE_HELP1 ;
          echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . tep_image_submit('button_run.gif', TEXT_SET_CATEGORIES) . '</form>'; 

          echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp; &nbsp; <a href="javascript:popupWindow(\'' . tep_href_link(FILENAME_POPUP_DATA_HELP,'action=froogle_configure') . '\')">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a> ';

         //set category string
         echo '<br> &nbsp;' . TEXT_SET_CATEGORIES . tep_draw_form('run', FILENAME_FROOGLE_PRE1, 'action=run', 'post', ''); 
   echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . TEXT_SET_CATEGORIES_HELP1 ;
   echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . tep_image_submit('button_run.gif', TEXT_SET_CATEGORIES) . '</form>'; 
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp; &nbsp; <a href="javascript:popupWindow(\'' . tep_href_link(FILENAME_POPUP_DATA_HELP,'action=froogle_category') . '\')">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a> ';

         //run pre feed
         echo '<br> &nbsp;' . TEXT_FEED_PRE_FEED . tep_draw_form('run', FILENAME_FROOGLE_PRE, 'action=run', 'post', ''); 
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . TEXT_FEED_PRE_FEED_HELP1 ;      
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . tep_draw_pull_down_menu('feed_froogle', $file_type_array, $data['data_files_id']) ;
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . tep_image_submit('button_run.gif', TEXT_FEED_FROOGLE) . '</form>'; 
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp; &nbsp; <a href="javascript:popupWindow(\'' . tep_href_link(FILENAME_POPUP_DATA_HELP,'action=froogle_preprocess') . '\')">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a> ';

        // send to froogle
         echo '<br> &nbsp;' . TEXT_FEED_RUN . tep_draw_form('run_feed', FILENAME_FROOGLE, 'action=run', 'post', ''); 
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . TEXT_FEED_RUN_HELP1 ;     
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . tep_draw_pull_down_menu('feed_froogle', $file_type_array, $data['data_files_id']) ;
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp;' . tep_image_submit('button_run.gif', TEXT_FEED_FROOGLE);
         echo tep_draw_separator('pixel_trans.gif', '5', '15') . '&nbsp; &nbsp; <a href="javascript:popupWindow(\'' . tep_href_link(FILENAME_POPUP_DATA_HELP,'action=froogle_send') . '\')">' . tep_image(DIR_WS_IMAGES . 'icon_info.gif', IMAGE_ICON_INFO) . '</a> ';

        ?>
        </td> </form>
      </tr>
      <tr>
              <td>
              <?php echo TEXT_FEED_HELP . '<br>';?>
              <?php echo TEXT_FEED_HELP_CONFIGURE . '<br>';?>
              <?php echo TEXT_FEED_HELP_SELECT . '<br>';?>
              <?php echo TEXT_FEED_HELP_PREFEED . '<br>';?>
              <?php echo TEXT_FEED_HELP_RUN . '<br>';?>
          
             </td>

      </tr>

    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
