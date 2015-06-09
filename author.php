<?php get_template_parts( array('parts/page-head') ); ?>
<?php get_template_parts( array('parts/top-navigation') ); ?>
<?php get_template_parts( array('parts/offcanvas-wrapper-top') ); ?>
<?php if ( have_posts() ): the_post(); ?>
    <?php if ( get_the_author_meta( 'description' ) ) : ?>
        <section class="author-info">
            <h1>About <?php echo get_the_author(); ?></h1>
            <p><?php the_author_meta( 'description' ); ?></p>
        </section>
    <?php endif; ?>
    <h2><?php the_author_meta('first_name'); ?>'s Posts:</h2>
    <?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
        <?php get_template_parts(array('parts/article-preview') ); ?>
    <?php endwhile; ?>
<?php else: ?>
    <h1>No posts to display for <?php echo get_the_author() ; ?></h1>
<?php endif; ?>
<div class="pagingNav">
    <p><?php wp_paginate() ?></p>
</div>
<?php get_template_parts( array('parts/offcanvas-wrapper-bottom') ); ?>
