<?php
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
