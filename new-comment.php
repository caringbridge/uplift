 <section id="comment-container">
    <h3>Comments</h3>
    <form action="http://www.caringbridge.org/visit/ats5/comments/journal/527123cbcb16b4a449c3cf3f/none/add" method="post" name="comment" id="comment">
        <div class="comment-form">
            <div class="media media-offset">
                <span class="pull-left">
                    <img src="/assets/ugc/6q/5l/31/5339b1faa589b49f226d3312.jpg" class="img-profile media-object" width="50" height="50"/>
                </span>
                <div class="media-body">
                    <div class="form-group ">
                        <label for="comment-body">
                            <span class="required">
                                <span aria-hidden="true" role="presentation" title="Required">*</span>
                                <span class="sr-only">Required</span>
                            </span> Post your comment
                        </label>
                        <textarea name="body" id="comment-body" rows="4" required="required" class="form-control"></textarea>
                    </div>

                    <div class="form-group ">
                        <label class="sr-only" for="signature">Your signature</label>
                        <input type="text" name="signature" id="signature" placeholder="Sign your name..." class="form-control" value="Craig Gieselman">
                    </div>

                    <div class="form-group ">
                        <button type="submit" name="submit-btn" class="btn btn-primary submit-comment" value="">Post</button>
                    </div>
                    <input type="hidden" name="csrf" value="">
                    <input type="hidden" name="client-metrics" class="client-metrics" value="">
                </div>
            </div>
        </div>
    </form>

    <div class="comment-count">
        <h4>
            <span class="num">1</span>
            <span class="text">Reply</span>
        </h4>
    </div>

    <div class="comment-replies list-group">
        <article class="comment-reply list-group-item" id="comment-53482f93ac7ee9e81c16340c">
            <div class="media">
                <span class="pull-left">
                    <a href="http://www.caringbridge.org/profile/gazelle" class="profile-link cb-photo cb-photo-small hoverable hoverable-profile" title="CB Craig Gieselman"><img src="/assets/ugc/6q/5l/31/5339b1faa589b49f226d3312.jpg" alt="CB Craig Gieselman" class="profile-photo img-profile" width="30" height="30" /></a>
                </span>
                <div class="media-body">
                    <header>
                        <div class="btn-group pull-right">
                            <a href="#">Edit</a>
                            <a href="#"class="btn btn-default delete-reply confirm-delete">
                                <span class="sr-only">Delete comment</span>
                                <i class="icon-trash" role="presentation" aria-hidden="true"></i>
                            </a>
                        </div>
                        <h5 class="media-heading">By Craig Gieselman
                            <span class="text-muted">&mdash;<time datetime="2014-04-11T13:08:19-05:00" pubdate>37 minutes ago</time></span>
                        </h5>
                    </header>
                    <div class="user-generated">Comment Comment Comment</div>
                    <div class="comment-actions">
                        <div class="amplify">
                            <a href="#" class="btn btn-default btn-amp amplify-action-link">
                                <i class="cbicon-heart" aria-hidden="true"></i><span class="visuallyhidden">heart</span>
                            </a>
                        </div>
                    </div>
                </div>
        </article>
    </div>

</section>










/**
 * Custom comment form variables
 *
 * @return void
 * @author dmontooth - http://stackoverflow.com/questions/11333810/how-to-customize-wordpress-comment-form
 */
function modify_comment_fields($fields){
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
                            '<div class="form-group ">
                                <label class="sr-only" for="name">' . __( 'Name', 'domainreference' ) . '</label>
                                <input class="form-control" id="name" type="text" name="name" placeholder="Sign your name..." class="form-control"
                                    value="' . esc_attr( $commenter['comment_author'] ) . '""' . $aria_req . '">
                            </div>',

            'email' =>
                            '<div class="form-group ">
                                <label class="sr-only" for="email">' . __( 'Email', 'domainreference' ) . '</label>
                                <input class="form-control" id="email" type="text" name="email"  placeholder="Only your name will be displayed with your comment."
                                    value="' . esc_attr( $commenter['comment_author_email'] ) . '""' . $aria_req . '">
                            </div>
                         </div>
                    </div>
                </div>',
            );

return $fields;
}
add_filter('comment_form_default_fields','modify_comment_fields', 999);



