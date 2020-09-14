<?php

$footer_layout = sanitize_text_field(get_theme_mod("_themeName_footer_layout_widget","3,3,3,3"));
$footer_layout=preg_replace("/\s+/","",$footer_layout);
$columns = explode(",", $footer_layout);
$footer_bg = _themeName_sanitize_footer_bg(get_theme_mod("_themeName_footer_bg","dark"));
$widget_active = false;
foreach ($columns as $i => $column) {
    if (is_active_sidebar("footer_sidebar-" . ($i + 1))) {
        $widget_active = true;
    }
}
if ($widget_active) { ?>
    <div class="c-footer c-footer--<?php echo $footer_bg ?>">
        <div class="o-container">
            <div class="o-row">
                <?php foreach ($columns as $i => $column) {
                ?>
                    <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo $column ?>@medium">
                        <?php
                        if (is_active_sidebar("footer_sidebar-" . ($i + 1))) {
                            dynamic_sidebar("footer_sidebar-" . ($i + 1));
                        }
                        ?>
                    </div>
                <?php
                }  ?>
            </div>
        </div>

    </div>
<?php
}
?>