<?php get_template_parts( array('parts/shared/header') ); ?>

    <div class="container">
        <div class="row">
            <div class="span8">
                <?php get_template_parts(array('parts/shared/uplift-logo')); ?><?php if ( have_posts() ): ?><?php while ( have_posts() ) : the_post(); ?>
                <hr>

                <article>
                    <h1><?php the_title(); ?></h1>

                    <p class="byline normal-case">by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_time('F j, Y'); ?></time></p>

                    <div class="postImage">
                        <?php the_post_thumbnail(); ?>
                    </div><br>
                    <?php the_content(); ?>
                </article>

                <section><?php comments_template( '', true ); ?></section><?php endwhile; ?><?php else: ?>

                <h2>No posts to display</h2><?php endif; ?>

                <div class="pagingNav">
                    <p><?php next_post('%','&laquo; previous', 'no'); ?></p>

                    <p><?php previous_post('%','next &raquo;', 'no'); ?></p>
                </div>
            </div>

            <div class="span4">
                <?php get_sidebar(); ?>
            
            
                 <div class="rssButton">
                    <a href="<?php bloginfo('rss2_url'); ?>">Uplift RSS Feed<img src="<?php bloginfo('template_directory'); ?>/img/rss-feed-icon.png" alt="Uplift RSS Feed Icon"></a>
                 </div>
            </div><!-- div .span4 -->

        </div><!-- div.row -->
    </div>

    <div class="home" id="happy-little-trees"></div><?php get_template_parts(array('parts/shared/footer') ); ?>
