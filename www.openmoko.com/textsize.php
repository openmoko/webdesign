<?php
	$max_size = 3;
	$normal_size = 0;

	$action = isset($_GET['action']) ? $_GET['action'] : null;
	$redirect_url = isset($_GET['redirect']) ? urldecode($_GET['redirect']) : null;
	$current_size = isset($_COOKIE['openmoko_fontsize']) ? $_COOKIE['openmoko_fontsize'] : $normal_size;
	
	if ($action == 'decrease') {
		if ($current_size>0) $current_size --;
	} else {
		if ($current_size<$max_size) $current_size ++;
	}
	
	setcookie('openmoko_fontsize',$current_size);
	
	if (!$redirect_url) {
		header('Location: '.PROTOCOL.OPENMOKO_WEB_HOST.OPENMOKO_WEB_WS_PATH);
	} else {
		header("Location: ".$redirect_url);
	}	
?>