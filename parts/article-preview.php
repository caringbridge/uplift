<article class="clearfix">
    <?php
        /* @todo find a more concise way to render this */
        if (is_front_page()) {
            echo "<h1>";
        }
        elseif (is_author()) {
            echo "<h3>";
        }
        else {
            echo "<h2>";
        }
    ?>
    <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>;" rel="bookmark"><?php the_title(); ?></a>
    <?php
        if (is_front_page()) {
            echo "</h1>";
        }
        elseif (is_author()) {
            echo "</h3>";
        }
        else {
            echo "</h2>";
        }
    ?>
    <p class="byline">by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time></p>
    <?php if ( '' != get_the_post_thumbnail()): ?>
        <div class="pull-left">
            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
                <?php the_post_thumbnail('thumbnail'); ?>
            </a>
        </div>
    <?php endif; ?>
    <?php the_excerpt(); ?>
    <a href="<?php esc_url( the_permalink() ); ?>">Read More</a>
</article>
