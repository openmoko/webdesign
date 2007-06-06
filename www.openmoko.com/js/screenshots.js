var screenshots_data = new Array();

function setScreenshot(screen_id) {
	
	description_block = document.getElementById('screenshot_caption');
	screenshot = document.getElementById('screenshot_image');
	
	description_block.innerHTML = '<h3>'+screenshots_data[screen_id]['title']+'</h3>'+screenshots_data[screen_id]['description'];
	screenshot.style.width = screenshots_data[screen_id]['width'] +"px";
	screenshot.style.height = screenshots_data[screen_id]['height'] +"px";
	screenshot.src = images_dir+screenshots_data[screen_id]['filename'];
}