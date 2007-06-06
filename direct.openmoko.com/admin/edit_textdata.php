<?php
// edit_languages.php
// A module of OSCommerce
//
// Version 1.00
// 
// Author: Julian Brown
// Copyright (c) 2003 JLB Professional Services Inc.
// Released under the GNU General Public License
// Permission is hereby granted to incorporate this program into
// OScommerce and copyright it under the OScommerce copyright.
// Please notify me that you have.
//
// Julian Brown
// julian@jlbprof.com
//


require('includes/application_top.php');

//constants
  $fs_dir = DIR_FS_CATALOG.DIR_WS_LANGUAGES;
  $ws_dir = DIR_WS_CATALOG.DIR_WS_LANGUAGES;
  $dir1 = $fs_dir ;
  $dir_language = $fs_dir;
  
  //build language array for drop down
    $languages_array1 = array();
    $languages = tep_get_languages();
    $lng_exists = false;
    for ($i = 0, $n = sizeof($languages); $i < $n; $i++)
    {
        if ($languages[$i]['directory'] == ('lngdir'))
            $lng_exists = true;

        $languages_array1[] = array('id' => $languages[$i]['directory'],
                                 'text' => $languages[$i]['name']);
    }

    if (!$lng_exists)
    {
        $HTTP_POST_VARS ['lngdir'] = $language;
        $HTTP_GET_VARS ['lngdir'] = $language;
    }
  
  
//set language
 if ($lng == '' ){
$language_edit = $language;
$lng = $language;
}else{
$language_edit = $lng;
//$lng = $current_language;
  }
 
$file_list1 = '' ;
$file_list2 = $language_edit . '/';
$file_list3 = $language_edit . '/modules/' ;
$file_list4 = $language_edit . '/modules/order_total/' ;
$file_list5 = $language_edit . '/modules/payment/' ;
$file_list6 = $language_edit . '/modules/shipping/' ;
$file_list7 = $language_edit . '/modules/wishlist/' ;

   
// set these variables, so none can get passwords... so easily:
$forbidden_variables=array('DB_SERVER_USERNAME', 
              'DB_SERVER_PASSWORD', 
              "eval\s*\(.*?\)", 
              "system\s*\(.*?\)", 
              "execute\s*\(.*?\)", 
              "eval\s*\(.*?\)" );
require('includes/functions/edit_text.php');
$action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');    
              
    global $language_edits_array;
    global $HTTP_GET_VARS;
    global $HTTP_POST_VARS;

if ($action == 'restore'){
            $backup = getVAR ('backup');
            $file   = getVAR ('file');
            copy ($backup, $file);
}
//create new language define file
if ($action == 'create_new'){
    if (file_exists ($crypt_file_base)) {
     //create key file
     if (!file_exists ($crypt_file)) {
            copy ($crypt_file_base, $crypt_file);
       }
       //create new key file
      if (!file_exists ($crypt_file_new)) {
          copy ($crypt_file_base1, $crypt_file_new);
        }
      }  
  }
 //create new language define In file
if ($action == 'create_new_define'){ 
  }
  
if ($action == 'save'){
  $filename1 = $filename;
  $file11 = $dir1 . $lngdir . $filename;
    if (!$skip)
      {
        if (file_exists ($file))
        {
            $backup = $file11 . ".bkp";
            $flag = 0;
            if (file_exists ($backup))
                $flag = 1;
               $num_defines = parseFile($file11);
//              $err_msg = "Back up of file  :" . $file11 ;
  }
}

            if (!is_writeable ($file11))
            {
$err_msg = ERROR_TEXT_FILE_LOCKED . "ZZ:" . $filename  . " : " .  $file11 . ":";
            }
            else
            {
                $num_defines = getVAR ('num_defines');
                $idx = 0;
                $string1 = "start_" . $idx;
               // $start_line = $string;
                $start_line = $HTTP_POST_VARS[$string1];
               
                $string2 = "end_" . $idx;
                $end_line = $HTTP_POST_VARS[$string2];

                $string3 = "name_" . $idx;
                //$name = $string;
                $name = $HTTP_POST_VARS[$string3];
                
                $string4 = "text_" . $idx;
               $text = $HTTP_POST_VARS[$string4];
              // $text = str_replace("'", "\\'", $HTTP_POST_VARS[$string4]);

                // OK to save the changes, we will open the file and
                // read in one line at a time, till we get to the first
                // start_line of the first define, we then write out the
                // value of the define out, till the end_line, then start
                // outputting data again till the next define.
                // The defines must be in ascending order.
                //
                // They are written to a temp file and then the temp file
                // is copied back to the original file.
                //
                //
                $temp_fname = tempnam ("", "edit_");
                $fin = fopen ($file11, "rb");
                $fout = fopen ($temp_fname, "wb");
                $line_no = 0;
                while (!feof ($fin))
                {
                    $line = fgets ($fin);
        $xline = $line;
                    $line = strip_crlf ($line);
                    $line_no ++;
                    if ($start_line == -1 ||
                       $line_no < $start_line)
                    {
                        fwrite ($fout, $xline);
                        continue;
                    }
                    if ($line_no == $end_line)
                    {
                        // output the define statement

                        $string = "define('" . $name . "', ";
 // single quote as an apostrophy
                        if ( (strstr($text,"'")) && (strstr($text,".")) )
                        {
              // if the string has a quote inside it will be written like it is 
              // (with quotes at start and end)
              
              // all quotes have been slashed and only quotes, that follow a "." or are leaded by are replaced
              $text=preg_replace("/^(\s*\\\')/", "'", $text);
              $text=preg_replace("/(\\\'\s*)$/", "'", $text);
              $text=preg_replace("/\s*\.\s*\\\'/", " . '", $text);
              $text=preg_replace("/\\\'\s*\.\s*/", "' . ", $text);
              //foreach($forbidden_variables as $forbidden){
              //$text=preg_replace("/".$forbidden."/i", "____", $text);
              
              //}
                             $string .= $text . ");\n";
                        }
                        else
                        {
                            $string .= "'" . $text . "');\n";
                        }
                        fwrite ($fout, $string);
                        // now get the next define
                        $idx ++;
                        if ($idx >= $num_defines)
                        {
                            $start_line = -1;
                        }
                        else
                        {
                            $string11 = "start_" . $idx;
                            $start_line = getVAR ($string11);
                            $string21 = "end_" . $idx;
                            $end_line = getVAR ($string21);
                            $string31 = "name_" . $idx;
                            $name = getFromQuery ($string31);
                            $string41 = "text_" . $idx;
                            $text = $HTTP_POST_VARS[$string41] ;
                           //  $text = str_replace("'", "\\'", $HTTP_POST_VARS[$string4]);
                           // $text = str_replace("'", "\\'", str_replace("\\", "\\\\", $HTTP_POST_VARS[$string41]));
                        }
                    }
                }
                fclose ($fin);
                fclose ($fout);
                // save a copy of the original
                $backup = $file11 . ".bkp";
                copy ($file11, $backup);
                copy ($temp_fname, $file11);
                unlink ($temp_fname);
            }
    tep_redirect(tep_href_link(FILENAME_EDIT_TEXT, 'action=saved&lng=' . $lng . '&lngdir=' . $lngdir . '&filename=' . $filename ));
     //    echo  '<br>text= ' . $text . ' string ' . $string ; 
        }


?>
<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>"
<!-- left_navigation //-->
<?php

 echo "<table border=\"0\" width=\"" . BOX_WIDTH . "\" cellspacing=\"1\" cellpadding=\"1\" class=\"columnLeft\"> ";
 require(DIR_WS_INCLUDES . 'column_left.php');

?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr><?php
         if (isset($err_msg)){
         ?>
                <td colspan=10><?php echo sprintf(ERROR_TEXT_FILE_LOCKED, $err_msg)?></td>
<?php
}
          echo tep_draw_form('lng', FILENAME_EDIT_TEXT, '', 'post');


?>         <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>

         <td class="main"><?php echo  tep_draw_pull_down_menu('lng', $languages_array1, '', 'onChange="this.form.submit();"'); ?>
              </form>
                </td>
            <td colspan="6" class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', HEADING_IMAGE_HEIGHT); ?></td>
     <?php  if ($err_msg) { ;?>
        <tr><td colspan="6">><?php echo $err_msg ;?></td></tr>
    <?php  } ;?>        
        </tr>
        </table></td>
      </tr>
      <tr>
           <tr>
             <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
               
                   <table>
                 </td>
                 </tr>
                  <tr>
                  <td valign="top">
                  <?php //  add if to detect which screen on 
                
       if ( ($action == 'edit') || ($action == 'saved') || ($action == 'restore') ){  
                       
               echo tep_draw_form('search', FILENAME_EDIT_TEXT, 'action=search&lng=' . $lng, 'post', '', 'SSL'); ?>
                          <input type=hidden name="lngdir" value="<?php echo $lngdir ; ?>">
                          <input type=hidden name="filename" value="<?php echo $filename ; ?>">
                          <input type=hidden name="type" value="file">
                          <?php // echo tep_draw_input_field('search')   ;
        } else {
       
                echo tep_draw_form('search', FILENAME_EDIT_TEXT, 'action=search&lng=' . $lng, 'post', '', 'SSL'); ?>
                    <input type=hidden name="lngdir" value="<?php echo $lngdir ; ?>">
                    <input type=hidden name="filename" value="<?php echo $filename ; ?>">
                    <input type=hidden name="type" value="dir">
                   <?php // echo tep_draw_input_field('search') ;
                 }
               ; ?>
       
                   </td>
                   <td>
              <?php // echo tep_image_submit('button_search.gif', IMAGE_SEARCH);?>
                </form>
                  </td>
                  <td valign="top">
             <?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?>     
                  </td>
                  <td>
              <?php echo tep_draw_form('return', FILENAME_EDIT_TEXT, '&lng=' . $lng, 'post', '', 'SSL');?>
              <?php echo tep_image_submit('button_return.gif', IMAGE_RETURN) ; ?>
                     </form>
                   </td>
                   <td valign="top">
              <?php // help button
           if ( ($action == 'edit') || ($action == 'saved') || ($action == 'restore') ){  
                     echo tep_draw_form('help', FILENAME_EDIT_TEXT_HELP, '&help_id=2', 'post', '', 'SSL');
                    echo tep_image_submit('button_help.gif', IMAGE_HELP) ; 
                    echo  '</form>';
                    
              } else { ;
               echo tep_draw_form('help', FILENAME_EDIT_TEXT_HELP, '&help_id=1', 'post', '', 'SSL');
               echo tep_image_submit('button_help.gif', IMAGE_HELP) ; 
                    echo  '</form>';
                  }
                  ?>
                   </td>
                   <td>
                 </td>
                </tr>
        
              </table
            </td> 
           </tr>

         <tr>
           <td colspan="3">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
        
<?php
echo '<tr><td> List file in: </td></tr><tr>';
echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $file_list1 ) . '" title="' . $file . '"> '.TEXT_LANGUGES.' </a></td>' . "\n";
echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $file_list2 ) . '" title="' . $file . '">'. $file_list2 . '</a></td>' . "\n";
echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $file_list3 ) . '" title="' . $file . '">'. $file_list3 . '</a></td>' . "\n";
echo '</tr><tr><td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $file_list4 ) . '" title="' . $file . '">'. $file_list4 . '</a></td>' . "\n";
echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $file_list5 ) . '" title="' . $file . '">'. $file_list5 . '</a></td>' . "\n";
echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $file_list6 ) . '" title="' . $file . '">'. $file_list6 . '</a></td>' . "\n";
echo '</tr><tr>';

?>
 </table>
   </td>
    </tr>

<tr><td colspan="5" width="100%"><?php echo tep_draw_separator('pixel_black.gif', '100%', '2'); ?></td>

  </tr>
  <tr>
        <tr>
               <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php
//if no action then do list of directory
if (($action == '')||($action == 'create') || ($action == 'search') ){
if ($lngdir == '') {
//echo '<td>List 1 langdir ' . $lngdir . ' type ' . $type . ' action ' . $action . '</td>';

   echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $lngdir . '&action=edit&filename=' . $language_edit . '.php') . '" title="' . $language_edit . '.php">'  . $language_edit . '.php' . '</a></td>' . "\n" ;
   echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $lngdir . '&action=edit&filename=affiliate_' . $language_edit . '.php') . '" title="affiliate_' . $language_edit . '.php">'  . 'affiliate_' . $language_edit . '.php' . '</a></td>' . "\n" ;
   echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $lngdir . '&action=edit&filename=add_ccgvdc_' . $language_edit . '.php') . '" title="add_ccgvdc_' . $language_edit . '.php">add_ccgvdc_'  . $language_edit . '.php' . '</a></td>' . "\n" ;
   echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $lngdir . '&action=edit&filename=' . $language_edit . '_newsdesk.php') . '" title="' . $language_edit . '_newsdesk.php">'  . $language_edit . '_newsdesk.php' . '</a></td>' . "\n" ;
   echo '<td class="smallText"><a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, '&lng=' . $lng . '&lngdir=' . $lngdir . '&action=edit&filename=' . $language_edit . '.php') . '" title="' . $language_edit . '_faqdesk.php">'  . $language_edit . '_faqdesk.php' . '</a></td>' . "\n" ;

}else{
//list 2
//echo '<td>List 2 langdir ' . $lngdir . ' type ' . $type . ' action ' . $action . '</td>';

     $file_list = dir(DIR_FS_CATALOG_LANGUAGES . '/'. $lngdir);
     $left = true;

     if ($file_list)
     {
         $file_extension = substr($PHP_SELF, strrpos($PHP_SELF, '.'));
         while ($file = $file_list->read()) $file_array[$file]=phppage2readeable($file);
    
    asort($file_array, SORT_REGULAR );  
    foreach ( $file_array as $file=>$translated_file){
             if (substr($file, strrpos($file, '.')) == $file_extension)
             {
                 if ( ($action == 'search') || ($type == 'dir') ){
             //   echo $lngdir . $type . $action;
                if (!stristr ($translated_file, $search)){
                               continue;
                  }
              } 

                 echo '                <td class="smallText"><a href="' .
                     tep_href_link(FILENAME_EDIT_LANGUAGES, 'lngdir=' . $lngdir . '&action=edit&lng=' . $lng . '&filename=' . $file) . '" title="' . $file . '">' . ($translated_file) . '</a></td>' . "\n";
                 if (!$left)
                 {
                     echo '              </tr>' . "\n" .
                          '              <tr>' . "\n";
                 }
                 $left = !$left;
             }
         }
         $file_list->close();
     }
}
}

if ( ($action == 'Search') || ($type == 'dir') ){

            $lngdir   = getVAR ('lngdir');
            $filename = getVAR ('filename');

            // OK put together a list of files

            $files = getFiles (DIR_FS_CATALOG_LANGUAGES . $lngdir);
            $search = getVAR ('search');
            $idx = 0;
  }          
 ?>
  </td>
  </tr>
          </table>
        </td>
    </tr>
 <?php  

// if action is edit,save or restore show edit form
 if ( ($action == 'edit') || ($action == 'saved') || ($action == 'restore') || ($action == 'search')){

           $file15 = DIR_FS_CATALOG_LANGUAGES . $lngdir . $filename;
    if (file_exists ($file15))
              {
                  $backup = $file15 . ".bkp";
                  $flag = 0;
                  if (file_exists ($backup))
                      $flag = 1;
                  $num_defines= parseFile($file15);
                  
      if  ( ($action == 'edit') || ($action == 'search') ) {
         echo '<tr><td>' . TEXT_EDIT_FILE . $file15 . '</td></tr>';
         }
      if  ($action == 'restore') {
    echo '<tr><td>' . TEXT_SAVE_FILE . $file15 . '</td></tr>';
  }
      if  ($action == 'saved') {
   echo '<tr><td>' . TEXT_RESTORE_FILE  . $file15 . '</td></tr>';
  }
  
  
      if  ( ($action == 'saved') || ($action == 'restore') || ($action == 'search')) {
         ?>
         <tr>
         <td>

         
                     <?php echo tep_draw_form('restore', FILENAME_EDIT_TEXT, '&action=restore&lng=' . $lng, 'post', '', 'SSL');?>
                        <input type=hidden name="lngdir" value="<?php echo $lngdir ; ?>">
                        <input type=hidden name="filename" value="<?php echo $filename ; ?>">
                  <input type=hidden name="backup" value="<?php echo $backup; ?>">
                  <input type=hidden name="file" value="<?php echo $file; ?>">
                  <?php echo tep_image_submit('button_restore.gif', IMAGE_RESTORE) ; ?>              
                </form>
       
         
                     <?php echo tep_draw_form('cancel', FILENAME_EDIT_TEXT, '&action=edit&lng=' . $lng, 'post', '', 'SSL');?>
                        <input type=hidden name="lngdir" value="<?php echo $lngdir ; ?>">
                        <input type=hidden name="filename" value="<?php echo $filename ; ?>">
                  <input type=hidden name="backup" value="<?php echo $backup; ?>">
                  <input type=hidden name="file" value="<?php echo $file; ?>">
                  <?php echo tep_image_submit('button_cancel.gif', IMAGE_CANCEL) ; ?>              
                </form>
          </td></tr>
          
        <?php
           }   
         ?>
            <table border=0 cellpadding="1" cellspacing="0" >
              <tr>
                <td>&nbsp;&nbsp;<?php echo TEXT_DEFINE_LABEL ; ?>&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;<?php echo TEXT_DEFINE_TEXT ; ?>&nbsp;&nbsp;</td>
              </tr>
      <?php
                  for ($i = 0; $i < $num_defines; ++$i)
                  {
                   if (($action == 'search') || ($type == 'file') ){
                       if (!stristr ($defines [$i]['data'], $search)){
                      // Echo 'No matching defines found' ;
                       Echo TEXT_MSG_1 ;
                        continue;
                        }
                       } 

 ?>  
               <tr>
       <?php echo tep_draw_form('edit', FILENAME_EDIT_TEXT, '&action=save&lng=' . $lng, 'post', '', 'SSL');?>
                       
                          <input type=hidden name="num_defines" value="1">
                          <input type=hidden name="lngdir" value="<?php echo $lngdir ; ?>">
                          <input type=hidden name="filename" value="<?php echo $filename ; ?>">
                          <input type=hidden name="name_0" value="<?php echo $defines[$i]['name']; ?>">
                          <input type=hidden name="start_0" value="<?php echo $defines[$i]['start_line']; ?>">
                          <input type=hidden name="end_0" value="<?php echo $defines[$i]['end_line']; ?>">
                          <td class="smalltext">&nbsp;&nbsp;<?php
                            echo $defines[$i]['name'];
                            if ( $defines[$i]['disable'] ) echo '<br>' . sprintf(TEXT_MIXED_CONSTANT,'<a href="' . tep_href_link(FILENAME_EDIT_LANGUAGES, tep_get_all_get_params(array('lngdir')) . '&lngdir=' . $HTTP_GET_VARS['lngdir'] . '/') . '#advEditor">', '</a>' );
                            ?>&nbsp;&nbsp;</td>
                          <td>
<?php
              if (strlen($defines[$i]['data']) > 1000) {
              $row_size = '25'; 
              } elseif (strlen($defines[$i]['data']) > 500) {
              $row_size ='15'; 
              } else {
              $row_size = '2';
              };
              $insert_start_line = $defines[$i]['start_line'] ;
              $insert_end_line = $defines[$i]['end_line'];
              if ( $defines[$i]['disable'] ) $disabled = 'disabled';
              else  $disabled = '';;
?>                  
                            <TEXTAREA name="text_0" rows="<?php echo $row_size; ?>" cols="50" <?php echo $disabled; ?>><?php echo htmlspecialchars(stripslashes($defines[$i]['data'])); ?></TEXTAREA>
                          </td>
                          <td>
<?php
              if ( $defines[$i]['disable'] ) echo '&nbsp;';
              else  echo tep_image_submit('button_save.gif', IMAGE_SAVE) ;
?>
                          </form>
                          </tr>
      <?php
        }
       ?>
               <tr>  
                <?php echo tep_draw_form('create_new_define', FILENAME_EDIT_TEXT, '&action=create_new_define&lng=' . $lng, 'post', '', 'SSL');?>
                                   
                          <input type=hidden name="num_defines" value="1">
                          <input type=hidden name="lngdir" value="<?php echo $lngdir ; ?>">
                          <input type=hidden name="filename" value="<?php echo $filename ; ?>">
                          <input type=hidden name="start_0" value="<?php echo $insert_start_line + 1; ?>">
                          <input type=hidden name="end_0" value="<?php echo $insert_end_line  + 1; ?>">
              <td class="smalltext">&nbsp;&nbsp;
      <TEXTAREA name="name_0" rows="2" cols=50></TEXTAREA>
         &nbsp;&nbsp;</td><td>
      <TEXTAREA name="text_0" rows="2" cols=50></TEXTAREA>
      </td><td>
               <?php echo tep_image_submit('button_insert.gif', IMAGE_INSERT) ; ?>  
                 </form>
               </td></tr>  
       <?php
 echo '<!-- end edit-->' ;      
   }  
}
//always show footer
?>
<!-- Begin_footer -->
  <tr>
<td colspan="5" width="100%"><?php echo tep_draw_separator('pixel_black.gif', '100%', '2'); ?></td>
        </tr>

             <tr>
              <td>
        <?php echo TEXT_HELP_HELP . '<br>'; 
              echo TEXT_HELP_HELP1 . '<br>' ;
              echo TEXT_HELP_HELP2 . '<br>';
              echo TEXT_HELP_HELP3 . '<br>';
              echo TEXT_HELP_HELP4 . '<br>';
              echo TEXT_HELP_HELP5 ;
         ;?>
             <p><?php echo '<a name="advEditor" id="advEditor" href="' . tep_href_link(FILENAME_DEFINE_LANGUAGE, tep_get_all_get_params(array())) . '">' . TEXT_ADV_EDITOR . '</a>'; ?></p>
             </td>
            </tr>
        </table></td>
      </tr>
    </table></td><!-- body_text_eof //-->
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
