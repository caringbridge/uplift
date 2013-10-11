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

function yourthemeslug_title_filter( $title, $sep, $seplocation ) {
    // account for $seplocation
    $left_sep = ( $seplocation != 'right' ? ' ' . $sep . ' ' : '' );
    $right_sep = ( $seplocation != 'right' ? '' : ' ' . $sep . ' ' );
 
    // get special page type (if any)
    if( is_category() ) $page_type = $left_sep . 'Category' . $right_sep;
    elseif( is_tag() ) $page_type = $left_sep . 'Tag' . $right_sep;
    elseif( is_author() ) $page_type = $left_sep . 'Author' . $right_sep;
    elseif( is_archive() || is_date() ) $page_type = $left_sep . 'Archives'. $right_sep;
    else $page_type = '';
 
    // get the page number
    if( get_query_var( 'paged' ) ) $page_num = $left_sep. get_query_var( 'paged' ) . $right_sep; // on index
    elseif( get_query_var( 'page' ) ) $page_num = $left_sep . get_query_var( 'page' ) . $right_sep; // on single
    else $page_num = '';
 
    // concoct and return title
    if( !is_feed() ) return get_bloginfo( 'name' ) . $page_type . $title . $page_num;
    else return $old_title;
}

add_filter('comment_form_default_fields', 'mytheme_remove_url' );

function mytheme_remove_url($arg) {
    $arg['url'] = '';
    return $arg;
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
			<h4 class="normal-case"><?php comment_author_link() ?> &bull; </h4> 
			<time class="normal-case"><?php comment_date() ?> at <?php comment_time() ?></time>
			<div class="commentBody">
			<?php comment_text() ?>
			</div>
		</article>
		
	<?php elseif ($comment->comment_approved == '0') : ?>
	<article id="comment-<?php comment_ID() ?>" class="normal-case">
			<?php echo get_avatar( $comment ); ?>
			<h4 class="normal-case"><?php comment_author_link() ?> &bull; </h4> 
			<time class="normal-case"><?php comment_date() ?> at <?php comment_time() ?></time>
			<div class="alert alert-info">
			<p>Your comment is awaiting moderation.</p>
			</div>
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