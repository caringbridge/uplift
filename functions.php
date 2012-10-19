<?php
/**
 * Starkers functions and definitions
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */



require_once( 'external/starkers-utilities.php' );
add_theme_support('post-thumbnails');
add_action( 'wp_enqueue_scripts', 'script_enqueuer' );
add_filter( 'body_class', 'add_slug_to_body_class' );
function script_enqueuer() {
	wp_register_script( 'site', get_template_directory_uri().'/js/site.js', array( 'jquery' ) );
	wp_enqueue_script( 'site' );

	wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
    wp_enqueue_style( 'screen' );
}	


function new_excerpt_length($length) {
    return 100;
}
add_filter('excerpt_length', 'new_excerpt_length');


/**
 * Custom callback for outputting comments 
 *
 * @return void
 * @author Keir Whitaker
 */
function starkers_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; 
	?>
	<?php if ( $comment->comment_approved == '1' ): ?>	
	<li>
		<article id="comment-<?php comment_ID() ?>">
			<?php echo get_avatar( $comment ); ?>
			<h4><?php comment_author_link() ?> &bull; </h4> 
			<time><?php comment_date() ?> at <?php comment_time() ?></time>
			<!-- <time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time> -->
			<?php comment_text() ?>
		</article>
	<?php endif; ?>
	</li>
	<?php 
}

/**
 * Enable sidebar widgets
 */
if (function_exists('register_sidebar')) {
    register_sidebar();
}