<div class="o-row__column o-row__column--span-12">
     <?php the_archive_title("<h3>","</h3>")?> 
     <?php the_archive_description("<h3>","</h3>")?> 
</div>

<?php
while (have_posts()) {
    the_post();
?>
    <article <?php post_class("c-post u-margin-bottom-20") ?>>

        <h2 class="c-post__title">
            <a href="<?php the_permalink() ?>" title=" <?php the_title_attribute() ?>"><?php the_title() ?></a>
        </h2>
        <div class="c-post__meta">
            posted On:
            <a href="<?php echo get_the_permalink() ?>">
                <time datetime="<?php echo get_the_date("c") ?>"><?php echo get_the_time() ?></time>
            </a>
            By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')) ?>">
                <?php echo get_the_author(); ?>
            </a>
        </div>
        <div class="c-post__excerpt">
            <?php the_excerpt() ?>
        </div>
        <a class="c-post__readmore" href="<?php echo get_the_permalink() ?>" title="<?php the_title_attribute() ?>"> Read More <span class="u-screen-reader-text">About <?php the_title(); ?></span></a>
    </article>

<?php
}
the_posts_pagination();
?>