<?php

function _themeName_delete_post()
{
    $url = add_query_arg(
        [
            "action" => "_themeName_delete_post",
            "post" => get_the_ID(),
            "nonce" => wp_create_nonce("_theme_delete_post", get_the_ID())
        ],
        home_url()
    );
    return "<a href='{$url}' >" . esc_html__("Delete Post", "_themeName") . "</a>";
}
