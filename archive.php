<?php get_template_parts( array('parts/page-head') ); ?>
<?php get_template_parts( array('parts/top-navigation') ); ?>
<?php get_template_parts( array('parts/offcanvas-wrapper-top') ); ?>
<?php if ( have_posts() ): ?>
    <?php if ( is_day() ) : ?>
        <h1>Post Archive for <?php echo  get_the_date( 'D M Y' ); ?></h1>
    <?php elseif ( is_month() ) : ?>
        <h1>Post Archive for <?php echo  get_the_date( 'M Y' ); ?></h1>
    <?php elseif ( is_year() ) : ?>
        <h1>Post Archive for <?php echo  get_the_date( 'Y' ); ?></h1>
    <?php else : ?>
        <h1>Post Archive</h1>
    <?php endif; ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_parts(array('parts/article-preview') ); ?>
    <?php endwhile; ?>
<?php else: ?>
    <h1>No posts to display</h1>
<?php endif; ?>
<div class="pagingNav">
    <?php wp_paginate() ?>
</div>
<?php get_template_parts( array('parts/offcanvas-wrapper-bottom') ); ?>
