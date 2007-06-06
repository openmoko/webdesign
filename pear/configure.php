<?php 
/*
  configure.php, v 1.0 09/06/2005

  Copyright (c) 2005 POSTOSC.COM

  Released under the GNU General Public License

  Absolutely no warranty. Use at your own risk.
*/

$include_path = ini_get('include_path'); 
$paths = explode(PATH_SEPARATOR, $include_path); 
$pear_path = dirname(__FILE__);

if(!in_array($pear_path, $paths)) {
  ini_set('include_path', $pear_path . PATH_SEPARATOR . $include_path);
}

?>
