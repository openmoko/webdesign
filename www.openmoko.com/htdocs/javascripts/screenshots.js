var screenshots_data = new Array();
var screenshots_large_data = new Array();
var current_image = 0;

function setScreenshot(screen_id) {
	current_image = screen_id;
	
	description_block = document.getElementById('screenshot_caption');
	screenshot = document.getElementById('screenshot_image');
	
	if (!images_gallery) {
	description_block.innerHTML = '<h3>'+screenshots_data[screen_id]['title']+'</h3>'+screenshots_data[screen_id]['description'];
	}
	screenshot.style.width = screenshots_data[screen_id]['width'] +"px";
	screenshot.style.height = screenshots_data[screen_id]['height'] +"px";
	
	if (png_fix == true) {
		screenshot.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src="+images_dir+screenshots_data[screen_id]['filename']+", sizingMethod='scale')";

	} else {
	screenshot.src = images_dir+screenshots_data[screen_id]['filename'];
	}
}

function showLargePicture() {
	showLargeImage (images_dir+screenshots_large_data[current_image]['filename'],screenshots_large_data[current_image]['width'],screenshots_large_data[current_image]['height']);
}