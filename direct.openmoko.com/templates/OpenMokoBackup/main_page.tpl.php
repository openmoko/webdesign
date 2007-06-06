<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<?php
if ( file_exists(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS) ) {
  require(DIR_WS_INCLUDES . FILENAME_HEADER_TAGS);
} else {
?>
  <title><?php echo TITLE ?></title>
<?php
}
?>


<base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_STYLE;?>">
<?php if (isset($javascript) && file_exists(DIR_WS_JAVASCRIPT . basename($javascript))) { require(DIR_WS_JAVASCRIPT . basename($javascript)); } ?>
</head>
<body>
<!-- warnings //-->
<?php require(DIR_WS_INCLUDES . FILENAME_WARNINGS); ?>
<!-- warning_eof //-->

<!-- header //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/'.FILENAME_HEADER); ?>
<!-- header_eof //-->

<div class="left_container">
	<div class="sidebox"><div class="inner"><div class="inner_2">
		<form id="searchform" method="get" action="http://38one.servehttp.com/openmoko/">
			<label>Search openmoko</label>
			<input type="hidden" name="s" value="search" />
			<input type="text" class="input_text" name="q" />

			<input type="image" class="input_submit" src="http://38one.servehttp.com/openmoko/images/button_go.png" alt="GO"/>
		</form>
	</div></div></div>
	
	<a href="#" class="side_banner"><img src="http://38one.servehttp.com/openmoko/images/__sample_banner_1.png" alt="baner" /></a>
	
	<a href="#" class="side_banner"><img src="http://38one.servehttp.com/openmoko/images/__sample_banner_2.png" alt="baner" /></a>
</div>


<div class="right_container">
		<!-- body //-->
		<table border="0" width="100%" cellspacing="3" cellpadding="<?php echo CELLPADDING_MAIN; ?>">
		  <tr>
		<?php
		if (DISPLAY_COLUMN_LEFT == 'yes')  {
		// WebMakers.com Added: Down for Maintenance
		// Hide column_left.php if not to show
		if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_LEFT_OFF =='false') {
		?>
		    <td width="<?php echo BOX_WIDTH_LEFT; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH_LEFT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_LEFT; ?>">
		<!-- left_navigation //-->
		<?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_LEFT); ?>
		<!-- left_navigation_eof //-->
		    </table></td>
		<?php
		}
		}
		?>
		<!-- content //-->
		    <td width="100%" valign="top">
		<?php
		if (isset($content_template) && file_exists(DIR_WS_CONTENT . basename($content_template))) {
		    require(DIR_WS_CONTENT . basename($content_template));
		  } else {
		    require(DIR_WS_CONTENT . $content . '.tpl.php');
		  }
		?>
		    </td>
		<!-- content_eof //-->
		<?php
		// WebMakers.com Added: Down for Maintenance
		// Hide column_right.php if not to show
		
		
		if (DISPLAY_COLUMN_RIGHT == 'yes')  {
		if (DOWN_FOR_MAINTENANCE =='false' || DOWN_FOR_MAINTENANCE_COLUMN_RIGHT_OFF =='false') {
		?>
		    <td width="<?php echo BOX_WIDTH_RIGHT; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH_RIGHT; ?>" cellspacing="0" cellpadding="<?php echo CELLPADDING_RIGHT; ?>">
		<!-- right_navigation //-->
		<?php require(DIR_WS_INCLUDES . FILENAME_COLUMN_RIGHT); ?>
		<!-- right_navigation_eof //-->
		    </table></td>
		<?php
		}
		}
		?>
		  </tr>
		</table>
		<!-- body_eof //-->
</div>

<!-- footer //-->
<?php require(DIR_WS_TEMPLATES . TEMPLATE_NAME .'/'.FILENAME_FOOTER); ?>
<!-- footer_eof //-->
<br>
</body>
</html>
