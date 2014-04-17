<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to starkers_comment() which is
 * located in the functions.php file.
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>


<?php if ( post_password_required() ) : ?>
<p>This post is password protected. Enter the password to view any comments</p>
<?php
	/* Stop the rest of comments.php from being processed,
	* but don't kill the script entirely -- we still have
	* to fully load the template.
	*/
	return;
endif; ?>
<?php // You can start editing here -- including this comment! ?>

<?php
	$fields = array(

		'comment_field' =>
		    '<div class="comment-form">
		        <div class="media media-offset">
		            <span class="pull-left">
		                <!--thumbnail here-->
		            </span>
		            <div class="media-body">
		                <div class="form-group">
		                    <label for="comment">
		                        <span class="required">
		                            <span aria-hidden="true" role="presentation" title="Required">*
		                            </span>
		                            <span class="sr-only">Required
		                            </span>
		                        </span>' . _x( 'Post your comment', 'noun' ) . '
		                    </label>
		                    <textarea class="form-control" id="comment" name="comment" rows="4" aria-required="true" ></textarea>
		                </div>',

		'author' =>
	        '<div class="form-group">' . '<label class="sr-only" for="name">' . __( 'Name', 'domainreference' ) . '</label>' .
	        '<input class="form-control" id="author" type="text" name="name" placeholder="Sign your name..." value="' . esc_attr( $commenter['comment_author'] ) . '""' . $aria_req . '"></div>',

	    'email' =>
	       	'<div class="form-group">' . '<label class="sr-only" for="email">' . __( 'Email', 'domainreference' ) . '</label>' .
	        '<input class="form-control" id="email" type="text" name="email" placeholder="Only your name will be displayed with your comment." value="' . esc_attr( $commenter['comment_author_email'] ) . '""' . $aria_req . '"></div>',
	);

	comment_form(array(
	'id_form' => 'comment',
	'title_reply' => 'Comments',
	'fields' => $fields
	));
?>

<?php if ( have_comments() ) : ?>
	<ul class="comment-replies list-group">
		<?php wp_list_comments( array( 'callback' => 'starkers_comment' ) ); ?>
	</ul>
<?php
	/* If there are no comments and comments are closed, let's leave a little note, shall we?
	 * But we don't want the note on pages or post types that do not support comments.
	*/
	elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
?>
<p>Comments are closed</p>
<?php endif; ?>