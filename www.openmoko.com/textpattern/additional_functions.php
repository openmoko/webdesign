<?php

	function printEnlargeableImage($small_image,$big_image) {
		
		global $prefs;
		$imgdir = link_to_home(array()).$prefs['img_dir'].'/';
		
		$big_image_obj = safe_row('*', 'txp_image', "id = '".$big_image."'");
		$filename = $imgdir.$big_image.$big_image_obj['ext'];
		$width = $big_image_obj['w'];
		$height = $big_image_obj['h'];
		
		echo '<a href="'.$filename.'" onclick="showLargeImage(\''.$filename.'\','.$width.','.$height.'); return false;">';
		echo image(array("id"=>$small_image));
		echo '</a>';
	
	}
	
?>