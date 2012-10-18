<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>

<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="container">
    <div class="row">
        <div class="span8">
            <?php get_template_parts(array('parts/shared/uplift-logo')); ?>
            <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <hr>
            		<article>
                        <h1>
                            <?php the_title(); ?>
                        </h1>
                        <p class="byline">
                            by <?php the_author_posts_link(); ?> &#183;
                            <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time> &#183;
                            Find plugin for views
                        </p>
            			<div><?php the_post_thumbnail(); ?></div>
                        <?php the_content(); ?>
            		</article>
            		<section><?php comments_template( '', true ); ?></section>
            <?php endwhile; ?>
            <?php else: ?>
            <h2>No posts to display</h2>
            <?php endif; ?>
        </div>
        <div class="span4">
            <?php get_sidebar(); ?>
        </div>
    </div> <!-- div.row-fluid -->
</div>

<div id="happy-little-trees"></div>
<?php get_template_parts(array('parts/shared/footer', 'parts/shared/html-footer')); ?>


