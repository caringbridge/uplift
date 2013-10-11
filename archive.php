<?php get_template_parts( array('parts/shared/header') ); ?>

    <div class="container clearfix">
        <div class="row">
            <div class="span8">
                <?php get_template_parts(array('parts/shared/uplift-logo')); ?>


<?php if ( have_posts() ): ?>

<?php if ( is_day() ) : ?>
<h2>Archive: <?php echo  get_the_date( 'D M Y' ); ?></h2>							
<?php elseif ( is_month() ) : ?>
<h2>Archive: <?php echo  get_the_date( 'M Y' ); ?></h2>	
<?php elseif ( is_year() ) : ?>
<h2>Archive: <?php echo  get_the_date( 'Y' ); ?></h2>								
<?php else : ?>
<h2>Archive</h2>	
<?php endif; ?>

<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
			<?php the_content(); ?>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<?php else: ?>
<h2>No posts to display</h2>	
<?php endif; ?>

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
