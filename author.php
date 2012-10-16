<?php
/**
 * The template for displaying Author Archive pages
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="container clearfix">
    <div class="row">
        <div class="span8">
            <?php get_template_parts(array('parts/shared/uplift-logo')); ?>
            <?php if ( have_posts() ): the_post(); ?>
                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                    <section class="author-info well">
                        <h1><?php echo get_the_author(); ?></h1>
                    <?php the_author_meta( 'description' ); ?>
                    </section>
                <?php endif; ?>
    
                <?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
                    <article>
                        <h1>
                            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h1>
                        <p class="byline">
                        by <?php the_author_posts_link(); ?> &#183;
                        <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time> &#183;
                        Find plugin for views
                        </p>
    
                        <div class="row">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="span2 hidden-phone thumbnail-container">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                                <div class="span6">
                                    <?php the_excerpt(); ?>
                                    <div>
                                        <a href="<?php esc_url( the_permalink() ); ?>" class="pull-right btn btn-primary">More</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="span8">
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
                <h2>No posts to display for <?php echo get_the_author() ; ?></h2>	
            <?php endif; ?>
        </div>
        <div class="span3 offset1">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<div id="happy-little-trees"></div>
<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>
