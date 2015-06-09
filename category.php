<?php get_template_parts( array('parts/page-head') ); ?>
<?php get_template_parts( array('parts/top-navigation') ); ?>
<?php get_template_parts( array('parts/offcanvas-wrapper-top') ); ?>
<?php if ( have_posts() ): ?>
    <h1>Posts categorized under '<?php echo single_cat_title( '', false ); ?>'</h1>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_parts(array('parts/article-preview') ); ?>
    <?php endwhile; ?>
<?php else: ?>
    <h1>No posts categorized in <?php echo single_cat_title( '', false ); ?></h1>
<?php endif; ?>
<div class="pagingNav">
    <p><?php wp_paginate() ?></p>
</div>
<?php get_template_parts( array('parts/offcanvas-wrapper-bottom') ); ?>
