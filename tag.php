<?php get_template_parts( array('parts/shared/header') ); ?>
<div class="layout container-fluid">
<?php get_template_parts(array('parts/shared/uplift-logo')); ?>
    <div class="row">
        <section class="col-md-8">
            <?php if ( have_posts() ): ?>
                <h1>Tag Archive: <?php echo single_tag_title( '', false ); ?></h1>
                <hr>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_parts(array('parts/shared/article-preview') ); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
            <?php endif; ?>
            <div class="pagingNav">
                <?php wp_paginate() ?>
            </div>
        </section>
        <aside class="col-md-4">
            <?php get_template_parts(array('parts/shared/sidebar') ); ?>
        </aside>
    </div>
    <?php get_template_parts(array('parts/shared/footer') ); ?>
</div>
<?php get_template_parts(array('parts/shared/fine-print') ); ?>
<div class="home" id="happy-little-trees"></div>