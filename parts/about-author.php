<section class="about-author clearfix">
    <h3>About the Author:</h3>
    <div class="pull-left">
        <?php if (validate_gravatar(get_the_author_email())): ?>
            <img class="author-thumb img-thumbnail" <?php echo get_avatar(get_the_author_email(), 100); ?>
        <?php else: ?>
            <img class="author-thumb img-thumbnail" src="<?php bloginfo('template_directory'); ?>/img/no-100x100.png"/>
        <?php endif; ?>
    </div>
        <?php the_author_meta( 'description' ); ?>
    </p>
</section>
