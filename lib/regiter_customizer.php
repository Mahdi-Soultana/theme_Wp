<?php
function _themeName_regiter_customizer($wp_customize)
{
    $wp_customize->add_section('_themeName_footer_options', array(
        "title" => esc_html__("Footer Options", "_themeName"),
        "description" => esc_html__("You can change your footer Option Here!", "_themeName")
    ));

    $wp_customize->add_setting('_themeName_site_info', array(
        "default" => "",
        "sanitize_callback" => "_themeName_sanitize_site_info"
    ));

    $wp_customize->add_control('_themeName_site_info', array(
        "type" => "text",
        "label" => esc_html__("Site Info", "_themeName"),
        "section" => "_themeName_footer_options"
    ));
}

function _themeName_sanitize_site_info($input)
{
    $alowed = array("a" => array(
        "href" => array(),
        "title" => array()
    ));

    return wp_kses($input, $alowed);
}

add_action("customize_register", "_themeName_regiter_customizer");
