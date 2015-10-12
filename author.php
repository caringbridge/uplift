<?php get_template_parts( array('parts/header') ); ?>
<div class="layout container-fluid">
<?php get_template_parts(array('parts/uplift-logo')); ?>
    <div class="row">
        <section class="col-md-8">
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
            <?php if (function_exists('wp_paginate')) : ?>
            <div class="pagingNav">
                <p><?php wp_paginate() ?></p>
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
