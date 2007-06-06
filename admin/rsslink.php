<?php
//rss feed
// require('includes/application_top.php');
include('includes/functions/rss2html.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link type="text/css" rel="StyleSheet" href="includes/index.css" />
</head>
<body>
<class="adminLink">
<?php
parseRDF("http://creforge.com/export/rss_sfnews.php");
?>