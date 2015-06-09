<?php get_template_parts( array('parts/page-head') ); ?>
<?php get_template_parts( array('parts/top-navigation') ); ?>
<?php get_template_parts( array('parts/offcanvas-wrapper-top') ); ?>
<?php if ( have_posts() ): ?>
    <h1>Posts tagged with '<?php echo single_tag_title( '', false ); ?>'</h1>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_parts(array('parts/article-preview') ); ?>
    <?php endwhile; ?>
<?php else: ?>
    <h1>No posts tagged with '<?php echo single_tag_title( '', false ); ?>'</h1>
<?php endif; ?>
<div class="pagingNav">
    <?php wp_paginate() ?>
</div>
<?php get_template_parts( array('parts/offcanvas-wrapper-bottom') ); ?>
