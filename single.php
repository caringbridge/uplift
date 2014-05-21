<?php get_template_parts( array('parts/header') ); ?>
<div class="layout container-fluid">
<?php get_template_parts(array('parts/uplift-logo')); ?>
    <div class="row">
        <article class="col-sm-8">
            <?php if (have_posts()): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <div class="row">
                            <div class="col-xs-6">
                                <p class="byline">by <?php the_author_posts_link(); ?></p>
                                <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time>
                            </div>
                            <div class="col-xs-6">
                                <div class="social-sharing pull-right">
                                    <?php get_template_parts(array('parts/sharing') ); ?>
                                </div>
                            </div>
                        </div>
                    </header>
                    <?php the_post_thumbnail('full'); ?>
                    <?php the_content(); ?>
                    <div class="row">
                        <div class="col-sm-4 col-sm-push-8">
                            <section class="social-sharing">
                                <?php get_template_parts(array('parts/sharing') ); ?>
                            </section>
                        </div>
                        <div class="col-sm-8 col-sm-pull-4">
                            <?php if (get_the_author_meta('description')): ?>
                                <?php get_template_parts(array('parts/about-author') ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
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
                    <section ="comment-container">
                        <?php comments_template(); ?>
                    </section>
                <?php endwhile; ?>
            <?php else: ?>
                <h2>No posts to display</h2>
            <?php endif; ?>
        </article>
        <aside class="col-sm-4">
            <?php get_template_parts(array('parts/sidebar') ); ?>
        </aside>
    </div>
    <?php get_template_parts(array('parts/footer') ); ?>
</div>
<?php get_template_parts(array('parts/fine-print') ); ?>