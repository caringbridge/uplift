<?php get_template_parts( array('parts/shared/header') ); ?>
<div class="layout container-fluid">
<?php get_template_parts(array('parts/shared/uplift-logo')); ?>
    <div class="row">
        <section class="col-md-8">
            <?php if ( have_posts() ): the_post(); ?>


                <?php if ( get_the_author_meta( 'description' ) ) : ?>
                    <section class="author-info">
                        <div class="media">
                            <img class="media-object pull-left img-polaroid" <?php echo get_avatar( get_the_author_email(), 120 ); ?>
                            <div class="media-body">
                                <h1><?php echo get_the_author(); ?></h1>
                                <p><?php the_author_meta( 'description' ); ?></p>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>


                <?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
                    <?php get_template_parts(array('parts/shared/article-preview') ); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <h2>No posts to display for <?php echo get_the_author() ; ?></h2>
            <?php endif; ?>
            <div class="pagingNav">
                <p><?php wp_paginate() ?></p>
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