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

    add_filter( 'body_class', 'add_slug_to_body_class' );
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

    /**
     * Different post excerpt lengths on different pages
     *
     * @return void
     * @author Olaf - http://stackoverflow.com/questions/4082662/multiple-excerpt-lengths-in-wordpress
     */
    add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
    function custom_excerpt_length( $length ) {
        return (is_front_page() || is_archive() || is_author() || is_category() || is_search() || is_tag()) ? 60 : 20;
    }

    /**
     * Make Wordpress SEO plugin use the Thumbnail image instead of Main Post Image
     *
     * @return void
     * @author http://webgilde.com/en/wordpress-seo-facebook-image-open-graph/
     */
    add_filter('wpseo_opengraph_image_size', 'mysite_opengraph_image_size');
    function mysite_opengraph_image_size($val) {
        return 'thumbnail';
    }

    /**
     * Enable Sidebar Widgets, and add markup around each to hang Bootstrap Styles upon
     *
     * @return void
     * @author Craig
     */
    if (function_exists('register_sidebar')) {
        register_sidebar( array(
            'before_widget' => '<div class="panel panel-widget">',
            'after_widget'  => '</div>',
            'before_title'  =>  '<div class="panel-heading"><h3 class="panel-title">',
            'after_title'   =>  '</h3></div>'
        ));
    }

    /**
     * Check to see if Author email has a Gravatar
     *
     * @return void
     * @author Wordpress - http://codex.wordpress.org/Using_Gravatars
     */
    function validate_gravatar($email) {
        // Craft a potential url and test its headers
        $hash = md5(strtolower(trim($email)));
        $uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
        $headers = @get_headers($uri);
        if (!preg_match("|200|", $headers[0])) {
            $has_valid_avatar = FALSE;
        } else {
            $has_valid_avatar = TRUE;
        }
        return $has_valid_avatar;
    }

    /**
     * Remove URL Field from comment form
     *
     * @return void
     * @author Stephen Van Dahm (I think?)
     */
    add_filter('comment_form_default_fields', 'mytheme_remove_url' );
    function mytheme_remove_url($arg) {
        $arg['url'] = '';
        return $arg;
    }

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
    <li class="comment-reply list-group-item">
        <article id="comment-<?php comment_ID() ?>">
            <div class="media">
                <div class="media-body">
                    <header>
                        <h5 class="media-heading">By <?php comment_author_link() ?>
                            <span class="text-muted">&mdash; <time><?php comment_date() ?> at <?php comment_time() ?></time></span>
                        </h5>
                    </header>
                    <div class="user-generated">
                        <?php comment_text() ?>
                    </div>
                </div>
            </div>
        </article>
    </li>
<?php elseif ($comment->comment_approved == '0') : ?>
    <li class="comment-reply list-group-item list-group-item-warning">
        <article id="comment-<?php comment_ID() ?>">
            <div class="media">
                <span class="pull-left">
                    <?php if (validate_gravatar(get_the_author_email())): ?>
                        <img class="author-thumb" <?php echo get_avatar( $comment, 30); ?>
                    <?php else: ?>
                        <img class="author-thumb" src="<?php bloginfo('template_directory'); ?>/img/no-30x30.png"/>
                    <?php endif; ?>
                </span>
                <div class="media-body">
                    <p>Comment awaiting approval.</p>
                </div>
            </div>
        </article>
    </li>
<?php endif; ?>
<?php
    }
?>