<?php get_header() ?>

<div class="o-container u-margin-bottom-40">
    <div class="o-row">
        <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo is_active_sidebar("primary_sidebar")
                                                                                    ? "8" : "12" ?>@medium">
            <main role="main">
                <?php get_template_part("/templete_part/posts/loop", "archive") ?>
            </main>
        </div>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
            <?php if (is_active_sidebar("primary_sidebar")) get_sidebar(); ?>
        </div>
    </div>
</div>



<?php get_footer() ?>