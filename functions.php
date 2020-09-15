<?php

require_once("lib/regiter_customizer.php");
require_once("lib/enqueue_asset.php");
require_once("lib/reg_sidebar.php");
require_once("lib/regiter_Menu.php");
require_once("lib/support_theme.php");
require_once("lib/helpers.php");

function _themeName_handel_delete_post()
{
    if (isset($_GET["action"]) && $_GET["action"] == "_themeName_delete_post") {
        if(! isset($_GET["nonce"]) || !wp_verify_nonce($_GET["nonce"],"_theme_delete_post", $_GET['post'])){
            return ;
        }
            $post_id = isset($_GET['post']) ? $_GET["post"] : null;
            $post = get_post((int) $post_id);
            if (empty($post)) {
                return;
            }
            if (!current_user_can("delete_post", $post_id)) {
                return;
        }

        wp_trash_post($post_id);
        wp_safe_redirect(home_url());
        die;
    
    }
}
add_action("init", '_themeName_handel_delete_post');
