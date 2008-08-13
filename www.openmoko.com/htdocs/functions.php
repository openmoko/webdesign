 
<?php


	// These are core functions for the openmoko.com website
	
	
	
	// Display Flickr Thumbnails
	function disp_flickrthumbs(){
	
		$max_num = 45; // this is 5 rows
	
    	$params = array('api_key'      => '64f4c3b799d290afad40008551c4a550',
                        'method'       => 'flickr.photos.search',
                        'text'         => 'openmoko freerunner',
                        'content_type' => '1',
                        'format'       => 'php_serial',
                       );

		$encoded_params = array();

		foreach ($params as $k => $v){
			$encoded_params[] = urlencode($k).'='.urlencode($v);
		}


        $url = "http://api.flickr.com/services/rest/?".implode('&', $encoded_params);
        $rsp = file_get_contents($url);
		$rsp_obj = unserialize($rsp);


		$photosetlist = array(array());
		$n = sizeof($rsp_obj[photos][photo]);

		if ($n > $max_num){
			$n = $max_num;
		}
        
		for($i = 0; $i < $n; $i++){
        
			$id     = $rsp_obj['photos']['photo'][$i]['id'];
            $secret = $rsp_obj['photos']['photo'][$i]['secret'];
            $server = $rsp_obj['photos']['photo'][$i]['server'];
            $farm   = $rsp_obj['photos']['photo'][$i]['farm'];
            
            $img_s = "http://farm$farm.static.flickr.com/$server/{$id}_{$secret}_s.jpg";
            $img_b = "http://farm$farm.static.flickr.com/$server/{$id}_{$secret}.jpg";
                
            echo '<div class="photo_box"><a rel="facebox" href="'.$img_b.'">';
            echo '<img alt=\"\" src="'.$img_s.'">';
			echo '</img></a></div>';
			echo "\n";
			 
		}
	}
	
	
	// Function to get and display YouTube Thumbnails
	function disp_youtubethumbs(){
	
	    $feed = 'http://gdata.youtube.com/feeds/api/videos/-/openmoko/freerunner';
	
	    $sxml = simplexml_load_file($feed);

    	foreach ($sxml->entry as $entry) {
      		
	        $media = $entry->children('http://search.yahoo.com/mrss/');      
      		$attrs = $media->group->thumbnail[0]->attributes();
      		$thumbnail = $attrs['url']; 
			
	        $attrs = $media->group->player->attributes();
    	    $url = $attrs['url']; 
			
			echo '<div class="video_box"><a href="'.$url.'" target="_blank">';
			echo '<img alt=\"\" src="'.$thumbnail.'">';
			echo '</img></a></div>';
			echo "\n";
		}
            
	}


?>
