<article class="media">
    <h1 class="h2"><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to &lt;?php the_title(); ?&gt;" rel="bookmark"><?php the_title(); ?></a></h1>
    <p class="byline">by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time></p>
    <a class="pull-left" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to &lt;?php the_title(); ?&gt;" rel="bookmark">
        <img class="media-object img-polaroid" <?php the_post_thumbnail('thumbnail'); ?>
    </a>
    <div class="media-body">
        <?php the_excerpt(); ?>
        <a href="<?php esc_url( the_permalink() ); ?>" class="pull-right btn btn-primary">Read more</a>
    </div>
</article>