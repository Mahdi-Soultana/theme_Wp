<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>

    <header role="banner" class="u-margin-bottom-40">
        <div class="c-header">
            <div class="o-container">
                <div class="c-header__logo" style=" display:flex; ">
                    <a style="flex-basis: 50%;  border-bottom: none;" href="<?php echo esc_url(home_url("/")); ?>" class="c-header__blogname">
                        <?php esc_html(bloginfo("name")) ?>
                    </a>

                    <div style="flex-basis: 30%; text-align:right">
                        <?php get_search_form(true); ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="c-navigation">
            <div class="o-container">
                <nav class="header-nav" role="navigation" aria-label="<?php esc_html_e("Main Navigation", "_themeName") ?>">
                    <?php wp_nav_menu(array("theme_location" => "main_menu")) ?>
                </nav>
            </div>
        </div>
    </header>
    <div id="content">