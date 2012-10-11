<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span8">
            <img src="http://blog.devsvd.cbeagan.org/wp-content/themes/blog/img/uplift-logo.svg" alt="Uplift Logo">
            <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <hr>
            		<article>
                        <h1>
                            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h1>
            			<!-- <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?> -->
                        <div class="row-fluid">
                            <?php if (has_post_thumbnail()): ?>
                    			<div class="span3">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                    			<div class="span9">
                                    <?php the_excerpt(); ?>
                                    <div>
                                        <a href="<?php esc_url( the_permalink() ); ?>" class="pull-right btn btn-primary">More</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="span12">
                                    <?php the_excerpt(); ?>
                                    <div>
                                        <a href="<?php esc_url( the_permalink() ); ?>" class="pull-right btn btn-primary">More</a>
                                    </div>
                                </div>
                            <?php endif ?>
            			</div>
            		</article>
            <?php endwhile; ?>
            <?php else: ?>
            <h2>No posts to display</h2>
            <?php endif; ?>
        </div>
        <div class="span3 offset1" style="background:#ff0;">
            <?php get_sidebar(); ?>
        </div>
    </div> <!-- div.row-fluid -->
</div>
<?php get_template_parts(array('parts/shared/footer', 'parts/shared/html-footer')); ?>