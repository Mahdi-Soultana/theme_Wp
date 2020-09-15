<?php
// $inline_style_selectors = array(
//     "a" => array(
//         "color" => "_themeName_accent_color"
//     ),
//     ":focus" => array(
//         "outline-color" => "_themeName_accent_color"
//     ),
//     ".c-post.sticky" => array(
//         "border-left-color" => "_themeName_accent_color"
//     ),
//     ".submit-button" => array(
//         "background-colorr" => "_themeName_accent_color"
//     ),
//     ".header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a" => array(
//         "background-color" => "_themeName_accent_color"
//     )
// );

// $inline_style = "";
// foreach ($inline_style_selectors as $selector => $props) {
//     $inline_style .= "{$selector} {";
//     foreach ($props as $prop => $value) {
//         $inline_style .= "{$prpo} :" . sanitize_hex_color(get_theme_mod($value , "#20ddae")) . ";";
//     }
//     $inline_style .= "}";
// }

$general_color_setting = sanitize_hex_color(get_theme_mod("_themeName_accent_color", "#20ddae"));
$inline_style = "
a{
    color:{$general_color_setting};
}
:focus{
    outline-color:{$general_color_setting};
}
.c-post.sticky{
    border-left-color:{$general_color_setting};
}
.submit-button{
    background-color:{$general_color_setting};

}
.header-nav .menu > .menu-item:not(.mega) .sub-menu .menu-item:hover > a {
    background-color:{$general_color_setting};

}
";
