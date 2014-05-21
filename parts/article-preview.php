<article class="clearfix">
    <h1><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to &lt;?php the_title(); ?&gt;" rel="bookmark"><?php the_title(); ?></a></h1>
    <p class="byline">by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time></p>
    <?php if ( '' != get_the_post_thumbnail()): ?>
        <div class="pull-left">
            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to &lt;?php the_title(); ?&gt;" rel="bookmark">
                <img class="img-thumbnail" <?php the_post_thumbnail('thumbnail'); ?>
            </a>
        </div>
    <?php endif; ?>
    <?php the_excerpt(); ?>
    <a href="<?php esc_url( the_permalink() ); ?>">Read More</a>
</article>