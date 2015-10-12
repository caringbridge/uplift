<?php get_template_parts( array('parts/header') ); ?>
<div class="layout container-fluid">
<?php get_template_parts(array('parts/uplift-logo')); ?>
    <div class="row">
        <section class="col-md-8">
            <?php if ( have_posts() ): ?>
                <h1>Search Results for '<?php echo get_search_query(); ?>'</h1>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_parts(array('parts/article-preview') ); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <h1>No results found for '<?php echo get_search_query(); ?>'</h1>
            <?php endif; ?>
            <?php if (function_exists('wp_paginate')) : ?>
            <div class="pagingNav">
                <?php wp_paginate() ?>
            </div>
            <?php endif; ?>
        </section>
        <aside class="col-md-4">
            <?php get_template_parts(array('parts/sidebar') ); ?>
        </aside>
    </div>
    <?php get_template_parts(array('parts/footer') ); ?>
</div>
<?php get_template_parts(array('parts/fine-print') ); ?>
