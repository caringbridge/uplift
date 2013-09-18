<?php get_template_parts( array('parts/shared/header') ); ?>
<div class="fluid-container">
    <div class="row-fluid">
        <div class="span8">
            <div id="content" role="main">
                <?php get_template_parts(array('parts/shared/uplift-logo')); ?>
                <?php if ( have_posts() ): ?>
                    <?php if ( is_day() ) : ?>
                        <h1>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h1>
                    <?php elseif ( is_month() ) : ?>
                        <h1>Archive: <?php echo  get_the_date( 'M Y' ); ?></h1>
                    <?php elseif ( is_year() ) : ?>
                        <h1>Archive: <?php echo  get_the_date( 'Y' ); ?></h1>
                    <?php else : ?>
                        <h1>Archive</h1>
                    <?php endif; ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="media">
                        <h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to &lt;?php the_title(); ?&gt;" rel="bookmark"><?php the_title(); ?></a></h2>
                        <p class="byline">by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time></p>
                        <a class="pull-left" href="<?php esc_url( the_permalink() ); ?>" title="Permalink to &lt;?php the_title(); ?&gt;" rel="bookmark">
                            <img class="media-object img-polaroid" <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                            <div class="media-body">
                                <?php the_excerpt(); ?>
                                <a href="<?php esc_url( the_permalink() ); ?>" class="pull-right btn btn-primary">Read more</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <h2>No posts to display</h2>
                <?php endif; ?>
            </div>
            <div class="pagingNav">
                <?php wp_paginate() ?>
            </div>
        </div>

        <div class="span4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<div class="home" id="happy-little-trees"></div>
<?php get_template_parts(array('parts/shared/footer') ); ?>
