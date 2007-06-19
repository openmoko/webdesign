var showLargeImage = function (image,width,height) {
	overlay_obj = $('overlay');
	wrapper_obj = $('wrapper');
	popup_image_obj = $('popup_image');
	
	ovheight = (window.opera) ? (document.body.clientHeight || document.documentElement.clientHeight || window.innerHeight) : (document.documentElement.clientHeight || window.innerHeight || document.body.clientHeight);
	ovheight = (ovheight > wrapper_obj.getHeight()) ? ovheight-10 : wrapper_obj.getHeight();

	overlay_obj.style.height = ovheight+ 10 + 'px';
	overlay_obj.style.display="block";
	
	popup_image_obj.style.width = width+'px';
	popup_image_obj.style.height = height+'px';
	popup_image_obj.style.marginLeft = (0-(width/2))+'px';
	
	if (png_fix == true) {
		popup_image_obj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src="+image+", sizingMethod='scale')";

	} else {
		popup_image_obj.style.backgroundImage = "url("+images_dir+"../images/loader.gif)";
		popup_image_obj.src = image;
	}
	
	popup_image_obj.style.display = "inline";
}

var hideLargeImage = function () {
	overlay_obj = $('overlay');
	popup_image_obj = $('popup_image');
	
	overlay_obj.style.display = "none";
	popup_image_obj.style.display = "none";
	if (png_fix == false) {
		popup_image_obj.src=null;
	} else {
		popup_image_obj.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src="+null+", sizingMethod='scale')";
	}
}

var hideProgressLoader = function () {
	popup_image_obj = $('popup_image');
	popup_image_obj.style.backgroundImage = "none";
}