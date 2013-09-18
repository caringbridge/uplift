<?php get_template_parts( array('parts/shared/header') ); ?>
<div class="fluid-container">
    <div class="row-fluid">
        <div class="span8">
            <div id="content" role="main">
                <?php get_template_parts(array('parts/shared/uplift-logo')); ?>
                <?php if ( have_posts() ): ?>
                    <h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
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
                    <h2>No results found for '<?php echo get_search_query(); ?>'</h2>
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