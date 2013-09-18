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
<div id="comments">
	<h2 class="h3">Comments</h2>
	<?php if ( post_password_required() ) : ?>
	<p>This post is password protected. Enter the password to view any comments</p>
</div>

	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>



	<?php if ( have_comments() ) : ?>

	<ol>
		<?php wp_list_comments( array( 'callback' => 'starkers_comment' ) ); ?>
	</ol>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>

	<p>Comments are closed</p>

	<?php endif; ?>

	<br/>

	<button type="button" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#demo">
	  <icon class="icon-comments"></i> Write a Reply or Comment
	</button>

	<div id="demo" class="collapse">
	<?php
		$comments_args = array(
			// change the title of send button
		    'label_submit' => 'Submit Comment',

		    // change the title of the reply section
		    'title_reply' => '',

		    // change Text before the set of comment form fields.
		    'comment_notes_before' => 'Only your name will be displayed with your comment.',

		    // remove "Text or HTML to be displayed after the set of comment fields"
		    'comment_notes_after' => '',

		    'comment_field' =>
		    	'<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
		    	'</label><textarea id="comment" name="comment" rows="3" aria-required="true"></textarea></p>',

		    'fields' => apply_filters( 'comment_form_default_fields', array(

		        'author' =>
		        	'<div class="row-fluid">
		        		<div class="span6">
		        			<p class="comment-form-author">' .
		        				'<label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
		        				( $req ? '<span class="required">*</span>' : '' ) .
		        				'<input class="span6" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
		        				'""' . $aria_req . ' /></p>
		        		</div>',

		        'email' =>
		        		'<div class="span6">
		        			<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
		        			( $req ? '<span class="required">*</span>' : '' ) .
		        			'<input class="span6" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		        			'""' . $aria_req . ' /></p>
		        		</div>
		        	</div>',
		       	)
		    ),
		);
		comment_form($comments_args);
	?>
	</div>
</div>