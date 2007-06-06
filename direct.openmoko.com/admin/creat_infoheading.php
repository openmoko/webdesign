<?php
/* create infobox heading entries
*/
    case 'add_language_files': //create language heading entries.
// pull infobox info
     $infobox_query = tep_db_query("select box_heading, date_added, infobox_id from " . TABLE_INFOBOX_CONFIGURATION);
     $infobox = tep_db_fetch_array($infobox_query);
          $languages = tep_get_languages();
          for ($i=0, $n=sizeof($languages); $i<$n; $i++) {
          $language_id = $languages[$i]['id'];
          $box_heading = $infobox['box_heading'];
          $infobox_id = $infobox['infobox_id']
          
           tep_db_query("insert into " . TABLE_INFOBOX_HEADING . " (infobox_id, language_id, box_heading) values ('" . $infobox_id . "', '" . $language_id . "', '" . $box_heading . "')");
       }
       tep_redirect(tep_href_link(FILENAME_INFOBOX_CONFIGURATION, 'gID=' . $HTTP_GET_VARS['gID'] . '&cID=' . $cID));

        break;
?>