<?php
/*-----------------------------------------------------------------------------*\
#################################################################################
# Script name: admin/install-explain.php
# Version: v1.0
#
# Copyright (C) 2005 Bobby Easland
# Internet moniker: Chemo
# Contact: chemo@mesoimpact.com
#
# This script is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# Script is intended to be used with:
# osCommerce, Open Source E-Commerce Solutions
# http://www.oscommerce.com
# Copyright (c) 2003 osCommerce
################################################################################
\*-----------------------------------------------------------------------------*/

require('includes/application_top.php');
# Configuration  group insert SQL
$insert_group = "INSERT INTO `configuration_group` VALUES ('', 'Explain Queries', 'Options for explain queries', 99, 1)";
# Configuration insert SQL
$insert_values = array();
$insert_values[] = "INSERT INTO `configuration` VALUES ('', 'Enable explain queries', 'EXPLAIN_QUERIES', 'false', 'This enables the explain queries feature.', GROUP_INSERT_ID, 0, '', '', NULL, 'tep_cfg_select_option(array(''true'', ''false''),')";
$insert_values[] = "INSERT INTO `configuration` VALUES ('', 'Limit to certain scripts?', 'EXPLAIN_USE_INCLUDE', 'false', 'This will limit the scripts which will be explained and hence reported on.  Set the values below.', GROUP_INSERT_ID, 1, '', '', NULL, 'tep_cfg_select_option(array(''true'', ''false''),')";
$insert_values[] = "INSERT INTO `configuration` VALUES ('', 'Included scripts', 'EXPLAIN_INCLUDE_FILES', '', 'These are the scripts that will be explained.  Enter them separated by a comma!', GROUP_INSERT_ID, 2, '', '', NULL, NULL)";
$insert_values[] = "INSERT INTO `configuration` VALUES ('', 'Exclude certain scripts?', 'EXPLAIN_USE_EXCLUDE', 'false', 'Exclude certain scripts from being explained?', GROUP_INSERT_ID, 3, '', '', NULL, 'tep_cfg_select_option(array(''true'', ''false''),')";
$insert_values[] = "INSERT INTO `configuration` VALUES ('', 'Excluded scripts', 'EXPLAIN_EXCLUDE_FILES', '', 'These are the scripts that will be excluded from being explained.  Enter them separated by a comma!', GROUP_INSERT_ID, 4, '', '', NULL, NULL)";
# Create explain table SQL
$insert_table = "CREATE TABLE `explain_queries` (`explain_id` int(11) NOT NULL auto_increment, `md5query` varchar(32) NOT NULL default '', `query` text, `time` tinytext, `script` tinytext, `request_string` tinytext, `table` tinytext, `type` tinytext, `possible_keys` tinytext, `key` tinytext, `key_len` tinytext, `ref` tinytext, `rows` tinytext, `Extra` tinytext, `Comment` tinytext, PRIMARY KEY  (`explain_id`), KEY `md5query` (`md5query`), KEY `script` (`script`(25)) ) TYPE=MyISAM AUTO_INCREMENT=1" ;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><!-- Install (and Uninstall) Database Settings script for osC-Explain - by Chemo --><?php echo INSTALL_EXPLAIN_TXT_1?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<?php
if ( isset($_GET['action']) && $_GET['action'] == 'install' ){
  //echo '<p><b>Install option selected...running queries</b></p>';
  echo INSTALL_EXPLAIN_TXT_2;
  echo INSTALL_EXPLAIN_TXT_3;
  tep_db_query($insert_group);
  $group_id = tep_db_insert_id();
  //echo "<p>Added the configuration group (id=$group_id) successfully...adding configuration values</p>";
  echo INSTALL_EXPLAIN_TXT_4." (id=$group_id) ".INSTALL_EXPLAIN_TXT_5;
  //echo '<p>STEP 2 => Add configuration settings</p>';
  echo INSTALL_EXPLAIN_TXT_6;
  foreach ($insert_values as $index => $value_query){
    $value_query = str_replace('GROUP_INSERT_ID', $group_id, $value_query);
    tep_db_query($value_query);
    //echo "<blockquote>Success...</blockquote>";
    echo INSTALL_EXPLAIN_TXT_7;
  }
  //echo "<p>Added the configuration settings successfully...adding the 'explain_queries' table</p>";
  echo INSTALL_EXPLAIN_TXT_8;
  //echo '<p>STEP 3 => Creating explain_queries table</p>';
  echo INSTALL_EXPLAIN_TXT_9;
  tep_db_query($insert_table);
  //echo '<blockquote>Successfully created the table.</blockquote>';
  echo INSTALL_EXPLAIN_TXT_10;
  //echo "<p><b>All done!  You should delete this script from the server...or not...you're choice.</b></p>";  
  echo INSTALL_EXPLAIN_TXT_11;  
}
elseif ( isset($_GET['action']) && $_GET['action'] == 'delete' ){
  /*echo '<p><b>Uninstall optin selected...running queries</b></p>';
  echo '<p>STEP 1 => Delete the configuration group from configuration_group table</p>';*/
  echo INSTALL_EXPLAIN_TXT_12;

  tep_db_query("DELETE FROM `configuration_group` WHERE `configuration_group_title` LIKE '%Explain Queries%'");
  /*
  echo '<blockquote>Deleted the configuration group successfully...removing configuration values</blockquote>';
  echo '<p>STEP 2 => Delete configuraton values</p>';
  */
  echo INSTALL_EXPLAIN_TXT_13;

  tep_db_query("DELETE FROM `configuration` WHERE `configuration_key` LIKE '%EXPLAIN%'");
  /*
  echo '<blockquote>Deleted the configuration values successfully...dropping the explain_queries table</blockquote>';
  echo '<p>STEP 3 => Dropping explain_queries table</p>';
  */
  echo INSTALL_EXPLAIN_TXT_14;

  tep_db_query("DROP TABLE `explain_queries`");
  /*
  echo '<blockquote>Table dropped successfully...analyzing tables</blockquote>';
  echo '<p>STEP 4 => Analyzing configuration_group and configuration table</p>';
  */
  echo INSTALL_EXPLAIN_TXT_15;

  tep_db_query("ANALYZE TABLE `configuration_group`");
    //echo "<blockquote>Analyze configuration_group success...</blockquote>";
    echo INSTALL_EXPLAIN_TXT_16;
  tep_db_query("ANALYZE TABLE `configuration`");
    //echo "<blockquote>Analyze configuration success...</blockquote>";
    echo INSTALL_EXPLAIN_TXT_17;
  tep_db_query("OPTIMIZE TABLE `configuration_group`");
    //echo "<blockquote>Optimize configuration_group success...</blockquote>";
    echo INSTALL_EXPLAIN_TXT_18;
  tep_db_query("OPTIMIZE TABLE `configuration`");
    /*echo "<blockquote>Optimize configuration success...</blockquote>";
  echo "<p><b>All done!  You should delete this script from the server...or not...you're choice.</b></p>";  */
  echo INSTALL_EXPLAIN_TXT_19;
}
else {
?>
<!-- <p>Welcome to the barebones osC-Explain installation script (<a href="http://forums.oscommerce.com/index.php?showuser=9196">by 
  Chemo</a>)!</p>
<p>This contribution is GPL and the target audience is fellow coders, optimizers, 
  and knowledgeable webmasters.&nbsp; I encourage each of you to look over the 
  code and add functionality so that the rest of us can benefit as well.</p>
<p>There are two options for this script:</p>
<p><strong>INSTALL</strong></p>
<blockquote>
  <p>This option is self explanatory :)&nbsp; It will add a configuration group 
    with the title &quot;Explain Queries&quot; and set the sort order to 99 (making 
    it the last listed).&nbsp; The script will then add values to the configuration 
    table that is the options for this contribution.&nbsp; Currently, these are 
    available:</p>
  <ul>
    <li> Global on / off</li>
    <li>Enable on for specific scripts (add one or list separated by comma).&nbsp; 
      This will be handy for contribution coders since they can enable only for 
      their development scripts and not waste room for storing other page queries.&nbsp; 
      In addition, it will speed up the admin report if there are 1,000 rows instead 
      of 500,000 :)</li>
    <li>Enable page exclusion for specific scripts.&nbsp; This is handy to exclude 
      certain scripts (for instance, ones already optimized) but capture the rest.</li>
  </ul>
  <p>The last thing this install script does is add a new table called 'explain_queries'.&nbsp; 
    This is needed to store the data.&nbsp; Do not change the name since the table 
    name is hardcoded all over the place.&nbsp; Why not add a new define to filenames.php?&nbsp; 
    If there is room to trim install steps and decrease the number of file changes 
    I'll take it any day of the week and twice on Sunday.&nbsp; You are (hopefully) 
    an experienced osC developer so if you want to do define table names the standard 
    way edit your own files.</p>
</blockquote>
<p align="center"><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=install">INSTALL</strong> THE DATABASE VALUES FOR OSC-EXPLAIN</a></p>
<p align="left"><strong>UNINSTALL</strong></p>
<blockquote>
  <p align="left">Hopefully, this option is self-explanatory too :)&nbsp; This 
    will delete all the values associated with osC-Explain from the configuration_group 
    and configuration tables.&nbsp; Then it will analyze the tables to reset the 
    cardinality of the tables.&nbsp; Next, the script will drop the 'explain_queries' 
    table.</p>
</blockquote>
<p align="center"><strong><a href="<?php echo $_SERVER['PHP_SELF']; ?>?action=delete">UNINSTALL</strong> THE DATABASE VALUES FOR OSC-EXPLAIN</a></p>
<p align="left"><strong>NOTES</strong>: By default all values are set to false.&nbsp; 
  So, once you have the files uploaded and necessary changes have been made you'll 
  have to enable it through the admin control panel.&nbsp; </p>
<blockquote>
  <p align="left">Configuration -&gt; Explain Queries -&gt; Enable explain queries 
    -&gt; true</p>
</blockquote> -->
<?php echo INSTALL_EXPLAIN_TXT_20?>
<?php
} # End default page
?>
</body>
</html>
