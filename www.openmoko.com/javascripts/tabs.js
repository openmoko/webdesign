var _pageTabs = new Array();

var showTab = function (tab_group,tab_index) {
	for (x=0; x<_pageTabs[tab_group]; x++) {
		if (current_obj = document.getElementById('tab_'+tab_group+'_article_'+x)) {
			if (x == tab_index) {
				current_obj.style.display="block";
			} else {
				current_obj.style.display="none";
			}
		}
		
		if (current_obj_title = document.getElementById('tab_'+tab_group+'_article_'+x+'_link')) {
			if (x == tab_index) {
				current_obj_title.className="selected";
			} else {
				current_obj_title.className="";
			}
		}
		
	}
	
	return false;
}