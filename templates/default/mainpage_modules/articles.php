<!-- articles //-->
<?php
  require(DIR_WS_LANGUAGES . $language . '/article_mainpage.php');
  
        $listing_sql = "select a.articles_id, a.authors_id, a.articles_date_added, ad.articles_name, ad.articles_head_desc_tag, au.authors_name, td.topics_name, a2t.topics_id
                        from " . TABLE_ARTICLES . " a,
                             " . TABLE_ARTICLES_DESCRIPTION . " ad,
                             " . TABLE_AUTHORS . " au,
                             " . TABLE_ARTICLES_TO_TOPICS . " a2t,
                             " . TABLE_TOPICS_DESCRIPTION . " td
                        where a.articles_status = '1'
                          and (a.articles_date_available IS NULL or to_days(a.articles_date_available) <= to_days(now()))
                          and a.authors_id = au.authors_id
                          and a.articles_id = a2t.articles_id
                          and ad.articles_id = a2t.articles_id
                          and td.topics_id = a2t.topics_id
                          and ad.language_id = '" . (int)$languages_id . "'
                          and td.language_id = '" . (int)$languages_id . "'
                        order by rand(), a.articles_date_added desc, ad.articles_name limit " . MAX_DISPLAY_MODULES_ARTICLES ;

$header_text =  TABLE_HEADING_NEW_ARTICLES;
?>
<tr>
<td valign="top" width="100%">
<table border="0" width="100%" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB;?>">

<?php
//header
  $info_box_contents = array();
  $info_box_contents[] = array('text' => TABLE_HEADING_NEW_ARTICLES);

  new contentBoxHeading($info_box_contents, '');

?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
       <tr>
       <td cellpadding="0" align="left"  width="<?php echo SIDE_BOX_LEFT_WIDTH ;?>" style="background-image: url('<?php echo TEMPLATE_BOX_MIDDLE_LEFT_IMAGE ;?>');background-repeat: repeat-y;"><img src="<?php echo TEMPLATE_BOX_MIDDLE_LEFT_IMAGE ;?>" alt="box" width="<?php echo SIDE_BOX_LEFT_WIDTH ;?>" height="1"></td>
          <td class="main_table_heading"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class ="templateinfobox"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                        <td class= "boxText">
                         <table width="100%"  border="0" cellspacing="0" cellpadding="<?php echo CELLPADDING_SUB ;?>">
  

            <tr>
              <td class="main"><?php echo $topic['topics_description']; ?></td>
            </tr>
            <?php if (tep_not_null($authors_description)) { ?>
            <tr>
              <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
            </tr>
            <tr>
              <td class="main" valign="top"><?php echo $authors_description; ?></td>
            <tr>
              <?php } ?>
              <?php
              if (tep_not_null($authors_url)) { 
              ?>
            <tr>
              <td><?php echo tep_draw_separator('pixel_trans.gif', '1', '10'); ?></td>
            </tr>
            <tr">
              <td class="main" valign="top"><?php echo sprintf(TEXT_MORE_INFORMATION, $authors_url); ?></td>
            </tr>
            <?php }
            ?>

 
       </tr> 
       <tr>
         <td class="main"><?php echo TEXT_ARTICLES; ?></td>
      </tr>

<?php
           $articles_listing_query = tep_db_query($listing_sql);
    while ($articles_listing = tep_db_fetch_array($articles_listing_query)) {
?>
          <tr>
            <td valign="top" class="main" width="75%">
<?php
  echo '<a href="' . tep_href_link(FILENAME_ARTICLE_INFO, 'articles_id=' . $articles_listing['articles_id']) . '"><b>' . $articles_listing['articles_name'] . '</b></a> ';
  if (DISPLAY_AUTHOR_ARTICLE_LISTING == 'true' && tep_not_null($articles_listing['authors_name'])) {
   echo TEXT_BY . ' ' . '<a href="' . tep_href_link(FILENAME_ARTICLES, 'authors_id=' . $articles_listing['authors_id']) . '"> ' . $articles_listing['authors_name'] . '</a>';
  }
?>
            </td>
<?php
   //   if (DISPLAY_TOPIC_ARTICLE_LISTING == 'true' && tep_not_null($articles_listing['topics_name'])) {
?>
            <td valign="top" class="main" width="25%" nowrap><?php echo TEXT_TOPIC . '&nbsp;<a href="' . tep_href_link(FILENAME_ARTICLES, 'tPath=' . $articles_listing['topics_id']) . '">' . $articles_listing['topics_name'] . '</a>'; ?></td>
<?php
   //   }
?>
          </tr>
<?php
   //   if (DISPLAY_ABSTRACT_ARTICLE_LISTING == 'true') {
?>
          <tr>
            <td class="main" style="padding-left:15px"><?php echo clean_html_comments(substr($articles_listing['articles_head_desc_tag'],0, MAX_ARTICLE_ABSTRACT_LENGTH)) . ((strlen($articles_listing['articles_head_desc_tag']) >= MAX_ARTICLE_ABSTRACT_LENGTH) ? '...' : ''); ?></td>
          </tr>
<?php
   //   }
      if (DISPLAY_DATE_ADDED_ARTICLE_LISTING == 'true') {
?>
          <tr>
            <td class="smalltext" style="padding-left:15px"><?php echo TEXT_DATE_ADDED . ' ' . tep_date_long($articles_listing['articles_date_added']); ?></td>
          </tr>

<?php
 }
    } // End of listing loop
 ?>
          <tr>
            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
          </tr>
  
                      </tr>
                     </table></td>  
                   </tr>
               </table></td> 
            </tr> 
         </table></td> 
  <td cellpadding="0" cellspacing="0" align="left" width="<?php echo SIDE_BOX_RIGHT_WIDTH ;?>" style="background-image: url('<?php echo TEMPLATE_BOX_MIDDLE_RIGHT_IMAGE ;?>');background-repeat: repeat-y;"><img src="<?php echo TEMPLATE_BOX_MIDDLE_RIGHT_IMAGE ;?>" alt="box" width="<?php echo SIDE_BOX_RIGHT_WIDTH ;?>" height="1"></td>
      </tr>
  </table></td>    
  </tr>
</table>

<?php

 if (TEMPLATE_INCLUDE_FOOTER =='true'){
   $info_box_contents = array();
   $info_box_contents[] = array('align' => 'left',
                                 'text'  => tep_draw_separator('pixel_trans.gif', '100%', '1')
                               );
  new contentBoxFooter($info_box_contents);
}
?>
<!--articles_eof //-->