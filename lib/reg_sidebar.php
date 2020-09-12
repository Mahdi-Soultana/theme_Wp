<?php 
function _theme_Name_register_sidebar(){

    register_sidebar(array(
        "id"=>"primary_sidebar",
        "name"=>esc_html__("primary_sidebar"),
        "description"=>esc_html__("this sidebar arpeare in the blog page posts !"),
        "before_widget"=>'<section id="%1$s" class="c-sidebar-widget u-margin-bottom-20 %2$s">',
        "after_widget"=>'</section>',
        "before_title"=>"<h5>",
        "after_title"=>"</h5>"
    ));

}

$footer_layout="3,3,3,3";
$column=explode(",",$footer_layout);
$footer_bg="dark";
$widget_theme="";
if($footer_bg=="light"){
    $widget_theme="c-footer-widget--dark";
}else{
    $widget_theme="c-footer-widget--light";

}

foreach($column as $i =>$column){
    register_sidebar(array(
        "id"=>"footer_sidebar-".($i+1) ,
        "name"=>sprintf(esc_html__("footer Widget Column %s","_themeName"),$i+1),
        "description"=>esc_html__("Footer Widget",'_themeName'),
        "before_widget"=>'<section id="%1$s" class="c-footer-widget'.$widget_theme.' %2$s">',
        "after_widget"=>'</section>',
        "before_title"=>"<h5>",
        "after_title"=>"</h5>"
    ));
}

add_action("widgets_init","_theme_Name_register_sidebar");