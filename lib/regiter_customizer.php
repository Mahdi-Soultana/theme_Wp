<?php
function _themeName_regiter_customizer($wp_customize)
{ //Refresh ////////////////////////////
    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial("blogname", array(
        // "settings"=>array("_themeName_site_info"),
        "selector" => ".c-header__blogname",
        "container_inclusive" => false,
        "render_callback" => function () {
            bloginfo("name");
        }
    ));
/*******************************General Setting****************/ 
$wp_customize->add_section('_themeName_general_setting', array(
    "title" => esc_html__("General Setting", "_themeName"),
    "description" => esc_html__("You can change your General Setting Here!", "_themeName")
));


 //////////////////Settiing////////////////////////////
 $wp_customize->add_setting('_themeName_accent_color',"_themeName_accent_color",array(
    "default" => "#20ddae",
    "sanitize_callback" => "sanitize_hex_color",
    
));
 
//////Control /////////////////

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,"_themeName_accent_color",array(
    "label" => __("Accent Color", "_themeName"),
    "section" => "_themeName_general_setting"
)));


/*******************************Footer Setting****************/ 
    $wp_customize->selective_refresh->add_partial("_themeName_footer_partial", array(
        "settings" => array("_themeName_site_info", "_themeName_footer_bg","_themeName_footer_layout_widget"),
        "selector" => "#footer",
        "container_inclusive" => false,
        "render_callback" => function () {
            get_template_part("/templete_part/footer/widget");
            get_template_part("/templete_part/footer/info");
        }
    ));
    //Section////////////////////////////
    $wp_customize->add_section('_themeName_footer_options', array(
        "title" => esc_html__("Footer Options", "_themeName"),
        "description" => esc_html__("You can change your footer Option Here!", "_themeName")
    ));
    //Settiing////////////////////////////
    $wp_customize->add_setting('_themeName_site_info', array(
        "default" => "",
        "sanitize_callback" => "_themeName_sanitize_site_info",
        "transport" => "postMessage"
    ));

    $wp_customize->add_setting('_themeName_footer_bg', array(
        "default" => "dark",
        "transport" => "postMessage",
        "sanitize_callback" => "_themeName_sanitize_footer_bg"
    ));

    $wp_customize->add_setting('_themeName_footer_layout_widget', array(
        "default" => "3,3,3,3",
        "transport" => "postMessage",
        "sanitize_callback" => "sanitize_text_field",
        "validate_callback" => "_themeName_footer_layout_widget_validate"
    ));
    //Info Controle////////////////////////////
    $wp_customize->add_control('_themeName_site_info', array(
        "type" => "text",
        "label" => esc_html__("Site Info", "_themeName"),
        "section" => "_themeName_footer_options"
    ));

    $wp_customize->add_control('_themeName_footer_layout_widget', array(
        "type" => "text",
        "label" => esc_html__("Footer Widget", "_themeName"),
        "section" => "_themeName_footer_options"
    ));

    $wp_customize->add_control('_themeName_footer_bg', array(
        "type" => "select",
        "label" => esc_html__("Footer Background", "_themeName"),
        "choices" => array(
            "dark" => esc_html__("dark", "_themeName"),
            "light" => esc_html__("light", "_themeName"),
        ),
        "section" => "_themeName_footer_options"
    ));
}

////////////////////////////FUNCTION ////////////////////////////
function _themeName_sanitize_site_info($input)
{
    $alowed = array("a" => array(
        "href" => array(),
        "title" => array()
    ));

    return wp_kses($input, $alowed);
}

function _themeName_sanitize_footer_bg($value)
{
    $valid = array("dark", "light");
    if (in_array($value, $valid, true)) {
        return $value;
    }
}

function _themeName_footer_layout_widget_validate($validity, $value)
{
    if (!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)) {
        $validity->add('invalid_footer_layout', esc_html__("Footer Layout is Invalid", "_themeName"));
    }
    return $validity;
}
////////////////////////////Action Customize
add_action("customize_register", "_themeName_regiter_customizer");
