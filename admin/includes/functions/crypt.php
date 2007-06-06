<?php
/*
  $Id: crypt.php,v 1.1.1.1 2004/03/04 23:40:48 ccwjr Exp $

    Copyright (c) 2005 

  Released under the GNU General Public License
*/
// This function makes a new key from a plaintext phrase.
 function get_encrypt_config(){
  //this is entended to be used to get configuration data
  }

  function tep_encrypt_key($plain) {
    $key = '';
    for ($i=0; $i<24; $i++) {
      $key .= tep_rand();
    }
    $salt = substr(md5($key), 0, 2);
    $key = md5($salt . $plain) . ':' . $salt;
    return $key;
  }

  function cc_encrypt($text) {
    /*  Removed because the configuration keys are already loaded
    $encrypt_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_PATH'");
    $encrypt = tep_db_fetch_array($encrypt_query);
    $encrypt_path = $encrypt['configuration_value'];
    $crypt_query1 = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_FILE'");
    $encrypt1 = tep_db_fetch_array($crypt_query1);
    $encrypt_file = $encrypt1['configuration_value'];
    */
    if ( defined('PAYMENT_CC_CRYPT_PATH') ) $encrypt_path = PAYMENT_CC_CRYPT_PATH;
    if ( defined('PAYMENT_CC_CRYPT_FILE') ) $encrypt_file = PAYMENT_CC_CRYPT_FILE;

  //get key 
    include (DIR_FS_CATALOG . DIR_WS_INCLUDES . $encrypt_path . $encrypt_file);

   $key = CC_KEY;
   $key = md5($key);
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
   $crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_ECB, $iv);
   
  
  return base64_encode($crypttext);
   }
   
function cc_decrypt($enc) {
  /*  Removed because the configuration keys are already loaded
  $encrypt_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_PATH'");
  $encrypt = tep_db_fetch_array($encrypt_query);
  $encrypt_path = $encrypt['configuration_value'];
  $crypt_query1 = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_FILE'");
  $encrypt1 = tep_db_fetch_array($crypt_query1);
  $encrypt_file = $encrypt1['configuration_value'];
  */
  if ( defined('PAYMENT_CC_CRYPT_PATH') ) $encrypt_path = PAYMENT_CC_CRYPT_PATH;
  if ( defined('PAYMENT_CC_CRYPT_FILE') ) $encrypt_file = PAYMENT_CC_CRYPT_FILE;

  //get key 
include (DIR_FS_CATALOG . DIR_WS_INCLUDES . $encrypt_path . $encrypt_file);
$key = CC_KEY;
$enc =base64_decode($enc);
$key = md5($key);
$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
$decrypttext = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, $enc, MCRYPT_MODE_ECB, $iv);
$decrypttext1 = trim($decrypttext);
return ($decrypttext1) ;
}

  function cc_encrypt_conv($text1) {
  //get key path and key filename
  $encrypt_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_PATH'");
  $encrypt = tep_db_fetch_array($encrypt_query);
  $encrypt_path = $encrypt['configuration_value'];
  $crypt_query1 = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_FILE'");
  $encrypt1 = tep_db_fetch_array($crypt_query1);
  $encrypt_file1 = $encrypt1['configuration_value'];
  $encrypt_file1a = 'new_' . $encrypt_file1;
   
     include (DIR_FS_CATALOG . DIR_WS_INCLUDES . $encrypt_path . 'new_' . $encrypt_file1);
   $key1 = CC_KEY1;
   $key1 = md5($key1);
   $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
   $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
   $crypttext1 = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key1, $text1, MCRYPT_MODE_ECB, $iv);
   
 
 return base64_encode($crypttext1);
   }
   
/* run a self-test through every listed cipher and mode */
function mcrypt_check_sanity() {
$modes = mcrypt_list_modes();
$algorithms = mcrypt_list_algorithms();
echo "<!-- start list -->";
echo "<table border=0>";
//echo "<tr><td align=center><strong>Mcrypt Algorithms and Modes</strong>";
echo "<tr><td align=center><strong>".MCRYPT_ALGORITHMS_AND_MODES."</strong>";
//echo "<tr><td align=center><strong>Algorithm</strong></td align=center><td><strong>Status</strong></td>";
echo "<tr><td align=center><strong>".MCRYPT_ALGORITHM."</strong></td align=center><td><strong>".MCRYPT_Status."</strong></td>";
foreach ($modes as $mode) echo "<td align=center><strong>".strtoupper($mode)."</strong></td>";
echo "</tr>";
 foreach ($algorithms as $cipher) {
   echo "<tr><td bgcolor=f0f0ff align=left>".strtoupper($cipher)."</td>";
   if(mcrypt_module_self_test($cipher)) {
     //  print "<td bgcolor=green align=center>OK</td>";
       print "<td bgcolor=green align=center>".MCRYPT_OK."</td>";
   } else {
       //print "<td bgcolor=red align=center>NOT OK</td>";
       print "<td bgcolor=red align=center>".MCRYPT_NOT_OK."</td>";
   }
 
   
   foreach ($modes as $mode) {
       if($mode == 'stream') {
          // $result = "<td bgcolor=gray align=center>NOT TESTED</td>";
           $result = "<td bgcolor=gray align=center>".MCRYPT_NOT_TESTED."</td>";
       } else if(mcrypt_test_module_mode($cipher,$mode)) {
             //$result = "<td bgcolor=green align=center><strong>OK</strong></td>";
             $result = "<td bgcolor=green align=center><strong>".MCRYPT_OK."</strong></td>";
       } else {
            // $result = "<td bgcolor=red align=center>NOT OK</td>";
             $result = "<td bgcolor=red align=center>".MCRYPT_NOT_OK."</td>";
       }
       print $result;
   }
   echo "</tr>";
 }
echo "</table>";

  $td = mcrypt_module_open($cipher, '', $mode, '');
  //$size = mcrypt_module_get_supported_key_sizes($cipher, $modes);
  $algorithms = mcrypt_list_algorithms();

//echo "<tr><td align=center><strong>Maximum Key Sizes Allowed</strong></td align=center></tr>";
echo "<tr><td align=center><strong>".MCRYPT_MAXIMUM_KEY_SIZES_ALLOWED."</strong></td align=center></tr>";

echo "<td align=center><table border=1>\n";

//echo "<tr><td align=center><strong>Algorithm</strong></td align=center>";
echo "<tr><td align=center><strong>".MCRYPT_ALGORITHM."</strong></td align=center>";
//echo "<td align=center><strong>Maximum Key Size</strong></td> </tr>";
echo "<td align=center><strong>".MCRYPT_MAXIMUM_KEY_SIZE."</strong></td> </tr>";

foreach ($algorithms as $cipher) {

       echo "<tr><td>" . $cipher . "</td><td bgcolor=green align=center>";
       $ksizes = mcrypt_module_get_supported_key_sizes($cipher);
       if($ksizes==NULL) echo mcrypt_module_get_algo_key_size($cipher);
       else foreach ($ksizes as $size) {
               echo $size . " ";
       }
       echo "</td></tr>\n";
}
echo "</td></table>\n";

 }

// a variant on the example posted in mdecrypt_generic
function mcrypt_test_module_mode($module,$mode) {
 /* Data */
// $key = 'this is a very long key, even too long for the cipher';
 $key = MCRYPT_KEY_TEXT;
 //$plain_text = 'very important data';
 $plain_text = MCRYPT_PLAIN_TEXT;

 /* Open module, and create IV */
 $td = mcrypt_module_open($module, '',$mode, '');
 $key = substr($key, 0, mcrypt_enc_get_key_size($td));
 $iv_size = mcrypt_enc_get_iv_size($td);
 $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

 /* Initialize encryption handle */
if (mcrypt_generic_init($td, $key, $iv) != -1) {

 /* Encrypt data */
 $c_t = mcrypt_generic($td, $plain_text);
 mcrypt_generic_deinit($td);
 
 // close the module
 mcrypt_module_close($td);

 /* Reinitialize buffers for decryption */
 /* Open module */
 $td = mcrypt_module_open($module, '', $mode, '');
 $key = substr($key, 0, mcrypt_enc_get_key_size($td));

 mcrypt_generic_init($td, $key, $iv);
 $p_t = trim(mdecrypt_generic($td, $c_t)); //trim to remove padding

 /* Clean up */
mcrypt_generic_deinit($td);
 mcrypt_module_close($td);
 }
 
 if (strncmp($p_t, $plain_text, strlen($plain_text)) == 0) {
   return TRUE;
 } else {
   return FALSE;
 }
 }

?>
