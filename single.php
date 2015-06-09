<?php get_template_parts( array('parts/page-head') ); ?>
<?php get_template_parts( array('parts/top-navigation') ); ?>
<?php get_template_parts( array('parts/offcanvas-wrapper-top') ); ?>
<?php if (have_posts()): ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <article>
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
                <div class="col-md-12">
                    <section class="social-sharing">
                        <?php get_template_parts(array('parts/sharing') ); ?>
                    </section>
                </div>
            </div>
            <?php if (get_the_author_meta('description')): ?>
                <?php get_template_parts(array('parts/about-author') ); ?>
            <?php endif; ?>
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
            <section class="comment-container">
                <?php comments_template(); ?>
            </section>
        </article>
    <?php endwhile; ?>
<?php else: ?>
    <h1>No posts to display</h1>
<?php endif; ?>
<?php get_template_parts( array('parts/offcanvas-wrapper-bottom') ); ?>
