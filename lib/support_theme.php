<?php
function _themeName_featured_theme(){

    add_theme_support( "title-tag" );
    add_theme_support( "post_thumbails" ); 
    add_theme_support( "html5",array("sreach-form","comment-list","comment-form","gallery","caption") ); 

}

add_action('after_setup_theme',"_themeName_featured_theme")

?>