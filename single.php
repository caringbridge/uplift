<?php get_template_parts( array('parts/shared/header') ); ?>
<div class="fluid-container">
    <div class="row-fluid">
        <div class="span8">
            <div id="content" role="main">
                <?php get_template_parts(array('parts/shared/uplift-logo')); ?>
                <?php if ( have_posts() ): ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article>
                            <h1 class="h2"><?php the_title(); ?></h1>
                            <p class="byline">by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time></p>
                            <?php the_post_thumbnail(); ?>
                            <section class="body">
                                <?php the_content(); ?>
                            </section>
                            <section class="social-sharing">
                                <h2 class="h3">Share this Post:</h2>
                                <div class="sharing-buttons">
                                    <?php do_action('addthis_widget',get_permalink($post->ID), get_the_title($post->ID), 'large_toolbox'); ?>
                                </div>
                            </section>
                            <hr>
                            <section class="author-info">
                                <div class="media">
                                    <img class="media-object pull-left img-polaroid" <?php echo get_avatar( get_the_author_email(), 100 ); ?>
                                    <div class="media-body">
                                        <h3 class="h4">About the Author:</h3>
                                        <p><?php the_author_meta( 'description' ); ?></p>
                                    </div>
                                </div>
                            </section>
                        </article>
                        <div class="pagingNav">
                            <ul class="pager">
                              <li class="previous">
                                <?php next_post('%','&laquo; previous', 'no'); ?>
                              </li>
                              <li class="next">
                                <?php previous_post('%','next &raquo;', 'no'); ?>
                              </li>
                            </ul>
                        </div>
                        <?php related_posts(); ?>
                        <section>
                            <?php comments_template( '', true ); ?>
                        </section>
                    <?php endwhile; ?>
                <?php else: ?>
                    <h2>No posts to display</h2>
                <?php endif; ?>
            </div>
        </div>

        <div class="span4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<div class="home" id="happy-little-trees"></div>
<?php get_template_parts(array('parts/shared/footer') ); ?>
