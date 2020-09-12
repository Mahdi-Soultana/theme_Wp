<?php

function _themeName_Register_Menu()
{
    register_nav_menus(array(
        "main_menu" => "Main Menu"
    ));
}

add_action("init", "_themeName_Register_Menu");

function _themeName_navigation($title, $item, $args, $depth)
{
    if ($args->theme_location == "main_menu") {
        if (in_array('menu-item-has-children', $item->classes)) {
            if ($depth == 0) {
                $title .=" <b>   >> </b>";
            } else {
                $title .="<b>   >> </b>";
            }
        }
    }
    return $title;
}
add_filter("nav_menu_item_title", "_themeName_navigation",10,4);
