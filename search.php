<?php get_template_parts( array('parts/page-head') ); ?>
<?php get_template_parts( array('parts/top-navigation') ); ?>
<?php get_template_parts( array('parts/offcanvas-wrapper-top') ); ?>
<?php if ( have_posts() ): ?>
    <h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_parts(array('parts/article-preview') ); ?>
    <?php endwhile; ?>
<?php else: ?>
    <h1>No results found for '<?php echo get_search_query(); ?>'</h1>
<?php endif; ?>
<div class="pagingNav">
    <?php wp_paginate() ?>
</div>
<?php get_template_parts( array('parts/offcanvas-wrapper-bottom') ); ?>
