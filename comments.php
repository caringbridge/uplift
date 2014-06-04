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
	<div class="alert alert-warning">
		<p>This post is password protected. Enter the password to view any comments</p>
	</div>
<?php
	/* Stop the rest of comments.php from being processed,
	* but don't kill the script entirely -- we still have
	* to fully load the template.
	*/
	return;
endif; ?>
<?php // You can start editing here -- including this comment! ?>
<h3>Comments</h3>
<?php if ( ! comments_open() ) : ?>
	<div class="alert alert-warning">
		<p>Comments are closed for this post.</p>
	</div>
<?php else: ?>
	<div class="comment-form">
    	<div class="media media-offset">
        	<div class="media-body">
				<?php
  					$comments_args = array(
        				// change the title of send button
        				'label_submit' => 'Post',

        				// change the title of the reply section
        				'title_reply' => '',

        				// change Text before the set of comment form fields.
        				'comment_notes_before' => '',

        				// remove "Text or HTML to be displayed after the set of comment fields"
        				'comment_notes_after' => '',

        				'fields' => apply_filters( 'comment_form_default_fields', array(

        					'author' =>
        	                	'<div class="form-group ">
        	                    	<label class="sr-only" for="author">' . __( 'Name', 'domainreference' ) . '</label>
        	                    	<input class="form-control" id="author" type="text" name="author" placeholder="Sign your name..." class="form-control"
        	                        	value="' . esc_attr( $commenter['comment_author'] ) . '""' . $aria_req . '">
        	                	</div>',

        					'email' =>
        	                	'<div class="form-group ">
        	                    	<label class="sr-only" for="email">' . __( 'Email', 'domainreference' ) . '</label>
        	                    	<input class="form-control" id="email" type="text" name="email"  placeholder="Email Address (Only your name will be displayed with your comment.)"
        	                        	value="' . esc_attr( $commenter['comment_author_email'] ) . '""' . $aria_req . '">
        	                	</div>',
            				)
        				),
    				);
					add_filter( 'comment_form_defaults', 'change_textarea', 9 );
						function change_textarea( $fields ) {
    						$fields['comment_field'] =
    							'<div class="form-group">
                            		<label for="comment">
                                		<span class="required">
                                    		<span aria-hidden="true" role="presentation" title="Required">*
                                    		</span>
                                    		<span class="sr-only">Required
                                    		</span>
                                		</span>' . _x( 'Post your comment', 'noun' ) . '
                            		</label>
                            		<textarea class="form-control" id="comment" name="comment" rows="4" aria-required="true" ></textarea>
                        		</div>';
    						return $fields;
						}
    				comment_form($comments_args);
				?>
			</div>
		</div>
	</div>
<?php endif; ?>
<?php if ( have_comments() ) : ?>
	<p><strong>
	 	<?php comments_number( '', '1 Reply', '% Replies' ); ?>
	</strong></p>
	<ul class="comment-replies list-group">
		<?php wp_list_comments( array( 'callback' => 'starkers_comment' ) ); ?>
	</ul>
<?php endif; ?>
