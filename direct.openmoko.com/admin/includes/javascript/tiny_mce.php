<?php
function tep_load_html_editor() {
if (( HTML_EDITOR_COMPRESS  == 'true' ) && (!extension_loaded('zlib')) )  {
    if ( strpos($_SERVER['HTTP_USER_AGENT'], 'Gecko') ){ 
         define('HTML_EDITOR_LOADER','tiny_mce_gzip.php'); 
    } else if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') ) {
         define('HTML_EDITOR_LOADER','tiny_mce.js'); 
    } else {
         define('HTML_EDITOR_LOADER','tiny_mce.js');
         }
    } else { 

        define('HTML_EDITOR_LOADER','tiny_mce.js');
        }
    echo "\n" . '<script type="text/javascript" src="' . HTTP_SERVER . DIR_WS_ADMIN . DIR_WS_INCLUDES . 'javascript/tiny_mce/' . HTML_EDITOR_LOADER . '"></script>' . "\n";
    echo '<script language="javascript" type="text/javascript" src=' . HTTP_SERVER . DIR_WS_ADMIN . DIR_WS_INCLUDES . 'javascript/tiny_mce/utils/form_utils.js"></script>' . "\n";
}// end tep_insert_html_editor

  function tep_insert_html_editor ( $textarea, $tool_bar_set = HTML_EDITOR_TOOLBAR_SET, $editor_height = HTML_EDITOR_HEIGHT ) { 
// Current stylesheet to be loaded into editor for enhanced editing.
if (HTML_EDITOR_LOAD_CSS == 'true') {
$template_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'DEFAULT_TEMPLATE'");
$template = tep_db_fetch_array($template_query);
$template_default_style_css = 'content_css : "' . HTTP_SERVER . DIR_WS_TEMPLATES . $template['configuration_value'] . '/stylesheet.css",';
}
// End CSS Code
    switch ($tool_bar_set) {
    case "simple":
    echo '<script language="javascript" type="text/javascript">
    tinyMCE.init({
    theme : "advanced",
    mode : "exact",
    elements : "'.$textarea.'",
    width : "'.HTML_EDITOR_WIDTH.'",
    height : "'.$editor_height.'",
    convert_urls : "false",
    convert_newlines_to_brs : "'.HTML_EDITOR_CONVERT_NEW_LINE.'",
    language : "'.DEFAULT_LANGUAGE.'",
    lang_list : "en,de,fr,pt_br,nl,pl,se",
    theme_advanced_toolbar_location : "'.HTML_EDITOR_TOOLBAR_LOCATION.'",
    theme_advanced_toolbar_align : "'.HTML_EDITOR_TOOLBAR_ALIGN.'",
    theme_advanced_path_location : "'.HTML_EDITOR_PATH_LOCATION.'",
    plugin_preview_pageurl : "../../plugins/preview/preview.php",
    plugins : "advimage,advlink,iespell,preview,searchreplace,contextmenu,paste,lorem",
    theme_advanced_buttons1 : "newdocument,|,bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink,|,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,outdent,indent,|,search,replace,separator,cleanup,removeformat,hr,sub,sup,forecolor,backcolor,charmap,visualaid,anchor,|,code,lorem",
    theme_advanced_buttons3 : ""
  });
  </script>';
  break;
    case "advanced":
  echo '<script language="javascript" type="text/javascript">
  tinyMCE.init({
    mode : "exact",
    elements : "'.$textarea.'",
    width : "'.HTML_EDITOR_WIDTH.'",
    height : "'.$editor_height.'",
    theme : "advanced",
    convert_urls : "false",
    convert_newlines_to_brs : "'.HTML_EDITOR_CONVERT_NEW_LINE.'",
    language : "'.DEFAULT_LANGUAGE.'",
    lang_list : "en,de,fr,pt_br,nl,pl,se",
    plugins : "style,layer,table,advimage,advlink,iespell,preview,flash,searchreplace,contextmenu,paste,directionality,fullscreen,ibrowser,filemanager,lorem",
    theme_advanced_buttons1_add_before : "newdocument,separator",
    theme_advanced_buttons1_add : "fontselect,fontsizeselect",
    theme_advanced_buttons2_add : "separator,preview,separator,forecolor,backcolor,separator,ltr,rtl",
    theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
    theme_advanced_buttons3_add_before : "tablecontrols,separator,insertlayer,moveforward,movebackward,absolute",
    theme_advanced_buttons3_add : "iespell,flash,separator,fullscreen,|,styleprops",
    theme_advanced_buttons4 : "ibrowser,|,filemanager,|,lorem",
    theme_advanced_toolbar_location : "'.HTML_EDITOR_TOOLBAR_LOCATION.'",
    theme_advanced_toolbar_align : "'.HTML_EDITOR_TOOLBAR_ALIGN.'",
    theme_advanced_path_location : "'.HTML_EDITOR_PATH_LOCATION.'",
    '.$template_default_style_css.'
    plugin_preview_pageurl : "../../plugins/preview/preview.php",
    paste_use_dialog : false,
    theme_advanced_resizing : true,
    theme_advanced_resize_horizontal : true,
    paste_auto_cleanup_on_paste : true,
    paste_convert_headers_to_strong : false,
    paste_strip_class_attributes : "all",
    paste_remove_spans : true,
    paste_remove_styles : true,
    debug : false 
  });
  </script>';
    break;
  }
} 
?>