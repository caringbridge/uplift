<?php get_template_parts( array('parts/shared/header') ); ?>
<div class="layout container-fluid">
<?php get_template_parts(array('parts/shared/uplift-logo')); ?>
    <div class="row">
        <article class="col-sm-8">
            <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <p class="byline">by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time></p>
                    </header>
                        <?php the_post_thumbnail(); ?>
                        <?php the_content(); ?>
                    <section class="social-sharing">
                        <h2>Share this Post:</h2>
                        <div class="sharing-buttons">
                            <?php do_action('addthis_widget',get_permalink($post->ID), get_the_title($post->ID), 'large_toolbox'); ?>
                        </div>
                    </section>
                    <hr/>
                    <section class="pagingNav">
                        <ul class="pager">
                            <li class="previous">
                                <?php next_post('%','&laquo; previous', 'no'); ?>
                            </li>
                            <li class="next">
                                <?php previous_post('%','next &raquo;', 'no'); ?>
                            </li>
                        </ul>
                    </section>
                    <section class="related-posts">
                        <?php related_posts(); ?>
                    </section>
                    <section id="comment-container">
                        <?php comments_template( '', true ); ?>
                    </section>
                <?php endwhile; ?>
            <?php else: ?>
                <h2>No posts to display</h2>
            <?php endif; ?>
        </article>
        <aside class="col-sm-4">
            <?php get_template_parts(array('parts/shared/sidebar') ); ?>
        </aside>
    </div>
    <?php get_template_parts(array('parts/shared/footer') ); ?>
</div>
<?php get_template_parts(array('parts/shared/fine-print') ); ?>
<div class="home" id="happy-little-trees"></div>