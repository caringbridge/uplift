<?php
/*
YARPP Template: Brooklyn Tribox
Description: Requires a theme which supports post thumbnails
Author: CaringBridge's Ridiculously Awesome Technology Team
*/ ?>
<section class="tribox related-stories">
    <h3>Related Posts</h3>
    <div class="row">
        <?php if (have_posts()):?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-xs-12 col-md-4">
                    <div class="tribox-item tribox-releated-story">
                        <div class="well well-sm">
                            <div class="row">
                                <div class="col-xxs-5 col-sm-12">
                                    <div class="tribox-image">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xxs-7 col-md-12">
                                    <div class="tribox-copy">
                                        <a href="<?php the_permalink() ?>">
                                            <strong><?php the_title_attribute(); ?></strong>
                                        </a>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No Related Posts.</p>
        <?php endif; ?>
    </div>
</section>