<?php
/*
  $Id: header.php,v 1.1.1.1 2004/03/04 23:39:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

// Langauge code
  $languages = tep_get_languages();
  $languages_array = array();
  $languages_selected = DEFAULT_LANGUAGE;
  for ($i = 0, $n = sizeof($languages); $i < $n; $i++) {
    $languages_array[] = array('id' => $languages[$i]['code'],
                               'text' => $languages[$i]['name']);
    if ($languages[$i]['directory'] == $language) {
      $languages_selected = $languages[$i]['code'];
    }
  }
 
// Langauge code EOF  

?>

<!-- warnings //-->
<?php require(DIR_WS_INCLUDES . 'warnings.php'); ?>
<!-- warning_eof //-->

<table width="100%"  border="0" cellpadding="2" cellspacing="2" bgcolor="#AEBDCC">
  <tr>
    <td width="39%" height="70"><img src="images/loaded_header_logo.gif" height="60" /></td>
    <td width="61%" align="center">

<!--Banner Script mods to fix TEXT ONLY ad area for Admin Header 
    This ad area reserved for Security Alert System - Please DO NOT change! --> 
<!--Banner Script Start-->
<script language='JavaScript' type='text/javascript' src='https://adserver.authsecure.com/adx.js'></script>
<script language='JavaScript' type='text/javascript'>
<!--
   if (!document.phpAds_used) document.phpAds_used = ',';
   phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);
   
   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("https://adserver.authsecure.com/adjs.php?n=" + phpAds_random);
   document.write ("&amp;what=zone:4&amp;block=1&amp;blockcampaign=1");
   document.write ("&amp;exclude=" + document.phpAds_used);
   if (document.referrer)
      document.write ("&amp;referer=" + escape(document.referrer));
   document.write ("'><" + "/script>");
//-->
</script><noscript><a href='https://adserver.authsecure.com/adclick.php?n=ac18b95b' target='_blank'><img src='https://adserver.authsecure.com/adview.php?what=zone:4&amp;n=ac18b95b' border='0' alt=''></a></noscript>
<!--Banner Script End-->
  
  
  
  </td>
  </tr>
  <tr class="main">
    <td align="center"><a href="http://oscommerce.com" target="_blank">osCommerce.com</a> | <a href="http://creloaded.com" target="_blank">CRE Loaded.com</a> </td>
    <td align="center"><a href="<?php echo tep_href_link(FILENAME_DEFAULT);?>" class="admin_text"><strong><?php echo TEXT_ADMIN_HOME;?></strong></a> | <a href="<?php echo tep_catalog_href_link();?>" class="admin_text"><strong><?php echo TEXT_VIEW_CATALOG;?></strong></a> | <a href="http://creloaded.com" target="_blank" class="admin_text"><strong><?php echo TEXT_FORUMS;?></strong></a> | <a href="http://www.creloaded.com/support/" target="_blank"><strong><font color="#0000FF"><?php echo TEXT_PURCHASE_SUPPORT;?></font></strong></a> | <a href="http://chainreactionworks.com" target="_blank" class="admin_text"><?php echo TEXT_HOSTING;?></a></td>
  </tr>
  <tr class="main">
    <td colspan="2" align="center"><?php echo tep_draw_separator('pixel_black.gif', '100%', '1'); ?></td>
  </tr>
</table>
<?php
// Hide tom bar when not loggedin
 if (basename($PHP_SELF) != FILENAME_LOGIN && basename($PHP_SELF) != FILENAME_PASSWORD_FORGOTTEN && basename($PHP_SELF) != FILENAME_LOGOFF) {
?>

<table width="100%"  border="0" cellspacing="2" cellpadding="2" background="images/cre_header_slice.gif">
         <tr class="main">
          <td class="admin_text"><span class="main">
      <?php echo tep_draw_form('frmcustsearch', FILENAME_CUSTOMERS, '', 'get')?>
      <?php $custparams="size=12 onblur=\"javascript:document.frmcustsearch.search.value='Customers';\" onclick=\"javascript:document.frmcustsearch.search.value='';\"";
        echo tep_draw_input_field('search','Customers',$custparams,false,'',false); 
        if (isset($HTTP_GET_VARS[tep_session_name()])) {
          echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
        }
      ?>          
      </form>     
      <?php echo tep_draw_form('frmcustnew', FILENAME_CREATE_ACCOUNT, '', 'get')?>
      <input type=submit value=new>
      <?php
        if (isset($HTTP_GET_VARS[tep_session_name()])) {
          echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
        }
      ?>
      </form>
       <?php $orderparams="size=8 onblur=\"javascript:document.frmordersearch.oID.value='Order ID';\" onfocus=\"javascript:document.frmordersearch.oID.value='';\"";?>
      | <?php echo tep_draw_form('frmordersearch', FILENAME_ORDERS, '', 'get').tep_draw_input_field('oID','Order ID',$orderparams,false,'',false).tep_draw_input_field('action','edit','',false,'hidden',false)?>     
      <?php
        if (isset($HTTP_GET_VARS[tep_session_name()])) {
          echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
        }
      ?>  
      </form> 
      <?php echo tep_draw_form('frmordernew', 'create_order.php', '', 'get')?>
      <input type=submit value=new>
      <?php
        if (isset($HTTP_GET_VARS[tep_session_name()])) {
          echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
        }
      ?>
      </form> | 
      <?php echo tep_draw_form('frmprodsearch', FILENAME_CATEGORIES, '', 'post')?>
      <?php $prodparams="size=12 onblur=\"javascript:document.frmprodsearch.search.value='Products';\" onfocus=\"javascript:document.frmprodsearch.search.value='';\"";
        echo tep_draw_input_field('search','Products',$prodparams,false,'',false);
        echo tep_draw_input_field('selected_box','catalog','',false,'hidden',false);
        if (isset($HTTP_GET_VARS[tep_session_name()])) {
          echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
        }
      ?>
      </form>     
      |       
      <?php echo tep_draw_form('frmarticlesearch', FILENAME_ARTICLES, '', 'get')?>
      <?php $articlesparams="size=12 onblur=\"javascript:document.frmarticlesearch.search.value='Articles';\" onfocus=\"javascript:document.frmarticlesearch.search.value='';\"";
        echo tep_draw_input_field('search','Articles',$articlesparams,false,'',false);
        if (isset($HTTP_GET_VARS[tep_session_name()])) {
          echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
        }
      ?>      
      </form>        
      | 
      <?php echo tep_draw_form('frmpagesearch', FILENAME_PAGES, '', 'get')?>
      <?php $articlesparams="size=12 onblur=\"javascript:document.frmpagesearch.search.value='Pages';\" onfocus=\"javascript:document.frmpagesearch.search.value='';\"";
        echo tep_draw_input_field('search','Pages',$articlesparams,false,'',false);
        if (isset($HTTP_GET_VARS[tep_session_name()])) {
          echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
        }
      ?>      
      </form>   

      <!--|  <input value=FAQ size=12> |-->
      </span></td>
          <td align="right" class="main"><span class="main"><?php echo TEXT_ADMIN_LANG . tep_draw_form('languages', 'index.php', '', 'get');
      echo tep_draw_pull_down_menu('language', $languages_array, $languages_selected, 'onChange="this.form.submit();"'); 
      if (isset($HTTP_GET_VARS[tep_session_name()])) {
        echo tep_draw_hidden_field(tep_session_name(), $HTTP_GET_VARS[tep_session_name()]);
      }
      ?>
     | <a href="<?php echo tep_href_link(FILENAME_LOGOFF);?> " class="main"><?php echo TEXT_LOGOUT;?></a>
      </form></span> </td>
        </tr>
</table>
    
 <script language="javascript" src="includes/menu.js"></script>
<?php if (MENU_DHTML == 'True') require(DIR_WS_INCLUDES . 'header_navigation.php'); 

            if ($messageStack->size('search') > 0) {
          echo $messageStack->output('search');
      }

} // End Hide
?>