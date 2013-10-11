<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>

<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="container">
    <div class="row">
        <div class="span8">
            <?php get_template_parts(array('parts/shared/uplift-logo')); ?>

            
   <div class="alert alert-error">
            
  <h5>Page not found</h5>
  
  <p>We can't seem to find what you're looking for, but we hope you can find something of value here instead:</p>
  <ul>
    <li><a href ="http://blog.caringbridge.org">Read one of our other blog posts</a></li>
    <li><a href="http://caringbridge.org">Learn more about CaringBridge</a></li>
  </ul>
           
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
