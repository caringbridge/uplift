<?php
/*
YARPP Template: Brooklyn Tribox
Description: Requires a theme which supports post thumbnails
Author: CaringBridge's Ridiculously Awesome Technology Team
*/ ?>

<h3>Related Posts</h3>
<div class="row-fluid">
    <?php if (have_posts()):?>
    <ul class="thumbnails">
        <?php while (have_posts()) : the_post(); ?>
            <?php if (has_post_thumbnail()):?>
                <li class="span4">
                <div class="thumbnail">
                    <?php the_post_thumbnail(); ?>
                    <div class="caption">
                        <a href="<?php the_permalink() ?>"><p><?php the_title_attribute(); ?></p></a>
                    </div>
                </div>
            </li>
            <?php endif; ?>
        <?php endwhile; ?>
    </ul>
    <?php else: ?>
        <p>No related photos.</p>
    <?php endif; ?>
</div>










