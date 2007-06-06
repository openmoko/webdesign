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
  /*  Removed because the configuration keys are already loaded
  $crypt_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_PATH'");
  $crypt = tep_db_fetch_array($crypt_query);
  $CURR_CRYPT = $crypt['configuration_value'];
  $crypt_query1 = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_FILE'");
  $crypt1 = tep_db_fetch_array($crypt_query1);
  $file_name = $crypt1['configuration_value'];
  */
  if ( defined('PAYMENT_CC_CRYPT_PATH') ) $CURR_CRYPT = PAYMENT_CC_CRYPT_PATH;
  if ( defined('PAYMENT_CC_CRYPT_FILE') ) $file_name  = PAYMENT_CC_CRYPT_FILE;
  
  $fs_dir = DIR_FS_CATALOG.DIR_WS_INCLUDES.$CURR_CRYPT;
  $ws_dir = DIR_WS_CATALOG.DIR_WS_INCLUDES.$CURR_CRYPT;
  $dir1 = $fs_dir ;
  $gID = '209';
  $crypt_file = $dir1 . $file_name;
  $crypt_file_new = $dir1 . 'new_' . $file_name;
  $crypt_file_base = $dir1 . 'cc_key.bkp' ;
  $crypt_file_base_1 = $dir1 . 'new_cc_key.bkp' ;
  
 // $crypt_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_PATH'");
 // $crypt = tep_db_fetch_array($crypt_query);
 // $CURR_CRYPT = $crypt['configuration_value'];

 // $file_name= 'cc_key.php';
 // $file_name_new1= 'new_cc_key.php';
 // $fs_dir = DIR_FS_CATALOG.DIR_WS_INCLUDES.$CURR_CRYPT;
 // $ws_dir = DIR_WS_CATALOG.DIR_WS_INCLUDES.$CURR_CRYPT;
 // $dir1 = $fs_dir ;
  
  
// set these variables, so none can get passwords... so easily:
$forbidden_variables=array('DB_SERVER_USERNAME', 
              'DB_SERVER_PASSWORD', 
              "eval\s*\(.*?\)", 
              "system\s*\(.*?\)", 
              "execute\s*\(.*?\)", 
              "eval\s*\(.*?\)" );
require('includes/functions/edit_key.php');
$action = (isset($HTTP_GET_VARS['action']) ? $HTTP_GET_VARS['action'] : '');    
              
    global $languages_array;
    global $HTTP_GET_VARS;
    global $HTTP_POST_VARS;

if ($action == 'restore'){
            $backup = getVAR ('backup');
            $file   = getVAR ('file');
            copy ($backup, $file);
}

if ($action == 'create'){
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
if ($action == 'save'){
//         echo 'Saved :';
    if (!$skip)
      {
        if (file_exists ($file))
        {
            $backup = $file . ".bkp";
            $flag = 0;
            if (file_exists ($backup))
                $flag = 1;
               $num_defines=parseFile ($file);
   
  }
}
             $file = $dir1  . $filename;
            if (!is_writeable ($file))
            {
$err_msg = ERROR_TEXT_FILE_LOCKED . "XX:" . $filename  . ":" . $dir1 . ":" .  $file . ":";
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
                $text = str_replace("'", "\\'",str_replace("\\", "\\\\", $HTTP_POST_VARS[$string4]));

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
                $fin = fopen ($file, "rb");
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

                        if (strstr($text,"'"))
                        {
              // if the string has a quote inside it will be written like it is 
              // (with quotes at start and end)
              
              // all quotes have been slashed and only quotes, that follow a "." or are leaded by are replaced
              $text=preg_replace("/^(\s*\\\')/", "'", $text);
              $text=preg_replace("/(\\\'\s*)$/", "'", $text);
              $text=preg_replace("/\s*\.\s*\\\'/", " . '", $text);
              $text=preg_replace("/\\\'\s*\.\s*/", "' . ", $text);
              foreach($forbidden_variables as $forbidden){
                $text=preg_replace("/".$forbidden."/i", "____", $text);
              }
                            $string .= $text . ");\n";
                        }
                        else
                        {
                            $string .= "'" . $text . "');\n";
                        }
                        fwrite ($fout, $string . "\n");
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
                            $text = str_replace("'", "\\'", str_replace("\\", "\\\\", $HTTP_POST_VARS[$string41]));
                        }
                    }
                }
                fclose ($fin);
                fclose ($fout);
                // save a copy of the original
                $backup = $file . ".bkp";
                copy ($file, $backup);
                copy ($temp_fname, $file);
                unlink ($temp_fname);
            }
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
<?php
          
     if (is_writeable($crypt_file)) {
      $err_msg1 = '2' ;
      } else {
      $err_msg1 = '1' ;
      }
      
         if (isset($err_msg)){
         ?>  <tr>
                <td colspan=10><?php echo printf(ERROR_TEXT_FILE_LOCKED, $err_msg)?></td>
             </tr>
<?php
}
 
          if((isset($err_msg1)) && ($err_msg1 == 1) ){
         ?>
         <tr>
                <td bgcolor= "#ff0000" colspan=10><font color= "#ffffff"> <?php echo sprintf(ERROR_TEXT_FILE_LOCKED1, $file_name) ?> </font></td>
         </tr>
<?php
}
          if((isset($err_msg1)) && ($err_msg1 == 2) ){
         ?>
         <tr>
                <td bgcolor= "#0AC92B" colspan=10><font color= "#ffffff"> <?php echo sprintf(ERROR_TEXT_FILE_OK, $file_name) ?> </font></td>
         </tr>
<?php
}
?> 
     <tr> 
     <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', '1', HEADING_IMAGE_HEIGHT); ?></td>
     <?php  if ($err_msg) { ;?>
        <tr><td colspan=5>><?php echo $err_msg ;?></td></tr>
    <?php  } ;?>        
        </tr>
        </table></td>
      </tr>
      <tr>
        <td>
<?php
//if no action then do list of directory
if (($action == '')||($action == 'create') ){
       ;  ?>
           <tr>
             <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
               
               <tr class="dataTableHeadingRow">
                <td class="dataTableHeadingContent" align="left"><?php echo TABLE_HEADING_FILE_TYPE; ?></td>
                <td class="dataTableHeadingContent" align="left"><?php echo TABLE_HEADING_FILE_NAME; ?>&nbsp;</td>
                <td class="dataTableHeadingContent" align="left"><?php echo TABLE_HEADING_FILE_ACTION; ?>&nbsp;</td>
              </tr>

<?php
   listFiles($dir1);
 ?>
  <tr>
<td colspan="3" width="100%"><?php echo tep_draw_separator('pixel_black.gif', '100%', '2'); ?></td>
        </tr>
          </table>
        </td>
    </tr>
 <?php  
    }
// if action is edit,save or restore show edit form
 if ( ($action == 'edit') || ($action == 'save') || ($action == 'restore') ){
          $file = $dir1  . getVAR ('filename');
              if (file_exists ($file))
              {
                  $backup = $file . ".bkp";
                  $flag = 0;
                  if (file_exists ($backup))
                      $flag = 1;
                  $num_defines=parseFile ($file);
      if  ($action == 'edit') {
         //echo 'Edit :'  . $file;
         echo EDIT_ACTION  . $file;
         }
         
        if  ($action == 'save') {
         //echo 'Saved file :'  . $file;
         echo SAVED_ACTION  . $file;
         }   
           ?>
            <table border=0 cellpadding="1" cellspacing="0" >
      <?php
                  for ($i = 0; $i < $num_defines; ++$i)
                  {
      ?>
                          <tr>
       <?php echo tep_draw_form('edit_key', FILENAME_EDIT_KEY, '&action=save', 'post', '', 'SSL');?>
                       
                          <input type=hidden name="num_defines" value="1">
                          <input type=hidden name="filename" value="<?php echo $filename ; ?>">
                          <input type=hidden name="name_0" value="<?php echo $defines[$i]['name']; ?>">
                          <input type=hidden name="start_0" value="<?php echo $defines[$i]['start_line']; ?>">
                          <input type=hidden name="end_0" value="<?php echo $defines[$i]['end_line']; ?>">
                          <td>&nbsp;&nbsp;<?php echo $defines[$i]['name']; ?>&nbsp;&nbsp;</td>
                          <td>
      <TEXTAREA name="text_0" rows=<?php 
      if (strlen($defines[$i]['data']) > 1000) echo 25; 
      else if (strlen($defines[$i]['data']) > 500) echo 15; else echo 2;
      ?> cols=60>
      <?php echo htmlspecialchars(stripslashes($defines[$i]['data'])); ?>
      </TEXTAREA>
                          </td>
                          <td>
          <?php echo tep_image_submit('button_save.gif', IMAGE_SAVE) ; ?>

                          </form>
                          </td>
                          </tr>
      <?php
                  }
     //show restore button if file has been saved
              if  ($action == 'save') {
                              if ($flag)
                        {
        ?>
                                <td>
                <?php echo tep_draw_form('restore', FILENAME_EDIT_KEY, '&action=restore', 'post', '', 'SSL');?>
                  <input type=hidden name="filename" value="<?php echo getVAR ('filename'); ?>">
                  <input type=hidden name="backup" value="<?php echo $backup; ?>">
                  <input type=hidden name="file" value="<?php echo $file; ?>">
                  <?php echo tep_image_submit('button_restore.gif', IMAGE_RESTORE) ; ?>              
                               </form>
                                </td></tr>
        <?php
                        }
               }   
           ?>
                          <tr>
                          <td colspan=6>
                          <table>
                         <tr>
       <?php
 echo '<!-- end edit-->' ;      
   }  
}
//always show footer
?>
<!-- Begin_footer -->
      <tr>
            <td colspan=5>
              <table>
                  <tr>
                  <td>
                 <?php echo tep_draw_form('search', FILENAME_EDIT_KEY, 'action=search', 'post', '', 'SSL'); ?>
                  <?php echo tep_draw_input_field('search') ?>
                   </td>
                   <td>
              <?php echo tep_image_submit('button_search.gif', IMAGE_SEARCH);?>
                </form>
                  </td>
                  <td>
             <?php echo tep_draw_separator('pixel_trans.gif', '1', '25'); ?>     
                  </td>
                  <td>
              <?php echo tep_draw_form('return', FILENAME_EDIT_KEY, '', 'post', '', 'SSL');?>
              <?php echo tep_image_submit('button_return.gif', IMAGE_RETURN) ; ?>
                     </form>
                   </td>
                   <td>
              <?php echo tep_draw_form('help', FILENAME_EDIT_KEY_HELP, '&help_id=1', 'post', '', 'SSL');?>
              <?php echo tep_image_submit('button_help.gif', IMAGE_HELP) ; ?>
                    </form>
                   </td>
                   <td>
              <?php echo tep_draw_form('create', FILENAME_EDIT_KEY, '&action=create', 'post', '', 'SSL');?>
              <?php echo tep_image_submit('button_create.gif', IMAGE_CREATE) ; ?>
                   </form>
                 </td>
                </tr>
              </table
            </td>
            <td>
             </td>
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
             </td>
          </tr>
          </table>
          </tr>
        </table></td>
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
