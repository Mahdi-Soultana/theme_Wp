<?php $footer_bg = _themeName_sanitize_footer_bg(get_theme_mod("_themeName_footer_bg","dark"));
$site_info = get_theme_mod("_themeName_site_info", "");
?>

<div class="c-site-info c-site-info--<?php echo $footer_bg ?>">
    <div class="o-container">
     
        <div class="o-row">
            <div class="o-row__column o-row__column--span-12 c-site-info__text">
                <?php
                $alowed = array("a" => array(
                    "href" => array(),
                    "title" => array()
                ));
                echo wp_kses($site_info,$alowed); ?>
            </div>
        </div>
    </div>
</div>