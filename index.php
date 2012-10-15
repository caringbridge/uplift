<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<div class="home" id="blog-content-body">

<div class="container">
    <div class="row">
        <div class="span8">
            <div id="uplift-header" class="row">
                <div class="span4 uplift-logo-container">
                    <img src="<?php bloginfo('template_directory'); ?>/img/uplift-logo.svg" alt="Uplift Logo">
                </div>
                <div class="span4 widgets">
                    <span>
                    <strong class="visible-desktop">Share our blog:</strong>
                    </span>
                    
                    <a class="facebook" href="http://www.facebook.com/caringbridge" onclick="window.open(this.href,'facebook','menubar=yes,scrollbars=yes,resizable=yes,width=800,height=700,left=100,top=75'); stopDefaultAction(event);" data-ga-label="Facebook" data-ga-action="Click - image" title="Become a fan on Facebook"><span>Become a fan on Facebook</span></a>
                    
                    <a class="twitter" href="http://www.twitter.com/caringbridge" onclick="window.open(this.href,'help','menubar=yes,scrollbars=yes,resizable=yes,width=800,height=700,left=100,top=75'); stopDefaultAction(event);" data-ga-label="Twitter" data-ga-action="Click - image" title="Follow @CaringBridge on Twitter"><span>Follow @CaringBridge on Twitter</span></a>
                    
                    <a class="googleplus" href="https://plus.google.com/113554774990455135149" onclick="window.open(this.href,'help','menubar=yes,scrollbars=yes,resizable=yes,width=800,height=700,left=100,top=75'); stopDefaultAction(event);" data-ga-label="Google+" data-ga-action="Click - image" title="Follow CaringBridge on Google+"><span>Follow CaringBridge on Google+</span></a>
                    
                    <a class="youtube" href="http://www.youtube.com/caringbridge" onclick="window.open(this.href,'help','menubar=yes,scrollbars=yes,resizable=yes,width=800,height=700,left=100,top=75'); stopDefaultAction(event);" data-ga-label="YouTube" data-ga-action="Click - image" title="Find us on YouTube"><span>Find us on YouTube</span></a>
                </div>
            </div>
            <?php if ( have_posts() ): ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <hr>
            		<article>
                        <h1>
                            <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h1>
                        <p class="byline">
                        by <?php the_author_posts_link(); ?> &#183; <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date('F j, Y'); ?></time> &#183; Find plugin for views
                        </p>

                        <div class="row">
                            <?php if (has_post_thumbnail()): ?>
                                <div class="span2 hidden-phone thumbnail-container">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </div>
                    			<div class="span6">
                                    <?php the_excerpt(); ?>
                                    <div>
                                        <a href="<?php esc_url( the_permalink() ); ?>" class="pull-right btn btn-primary">More</a>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="span8">
                                    <?php the_excerpt(); ?>
                                    <div>
                                        <a href="<?php esc_url( the_permalink() ); ?>" class="pull-right btn btn-primary">More</a>
                                    </div>
                                </div>
                            <?php endif ?>
            			</div>
            		</article>
            <?php endwhile; ?>
            <?php else: ?>
            <h2>No posts to display</h2>
            <?php endif; ?>
        </div>
        <div class="span3 offset1">
            <?php get_sidebar(); ?>
        </div>
    </div> <!-- div.row -->
</div>

</div>


<?php get_template_parts(array('parts/shared/footer', 'parts/shared/html-footer')); ?>
