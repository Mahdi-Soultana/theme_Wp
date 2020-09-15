<?php 

function _themeName_assets(){

    wp_enqueue_style("_themeName_StyleSheet",get_template_directory_uri() ."/dist/asset/src/css/bundle.css"
    ,NULL,microtime(),"all");

    include(get_template_directory()."./lib/general_style.php");

    wp_add_inline_style("_themeName_StyleSheet",$inline_style);
    
    wp_enqueue_script( "_themeName_Main_Js", get_template_directory_uri() .'/dist/asset/js/bundle.js', array("jquery"),microtime(), true );
    
    
    

}

add_action("wp_enqueue_scripts","_themeName_assets");

function _themeName_admin_assets(){

    wp_enqueue_style("_themeName_StyleSheet",get_template_directory_uri() ."/dist/asset/src/css/admin.css"
    ,NULL,microtime(),"all");

    wp_enqueue_script( "_themeName_admin_Js", get_template_directory_uri() .'/dist/asset/js/admin.js', array(),microtime(), true );



}

add_action("admin_enqueue_scripts","_themeName_admin_assets");

function customize_perview_js(){
    include(get_template_directory(). "/lib/general_style.php");
    wp_enqueue_script("_themeName_customize_preview",get_template_directory_uri().
    "/dist/asset/js/customize-preview.js",
    array("customize-preview","jquery"),'1.0.0',true);
    wp_localize_script("_themeName_customize_preview","_themeName",array("inline_style"=>$inline_style_selectors));
    
}
add_action("customize_preview_init","customize_perview_js");

