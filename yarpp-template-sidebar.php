<?php
/*
YARPP Template: Brooklyn Sidebar
Description: Requires a theme which supports post thumbnails
Author: CaringBridge's Ridiculously Awesome Technology Team
*/ ?>
<div class="panel panel-custom">
    <div class="panel-heading">
        <h3 class="panel-title">Related Content</h3>
    </div>
    <div class="panel-body">
        <?php if (have_posts()):?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="clearfix">
                    <div class="pull-left">
                        <a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">
                            <?php the_post_thumbnail('thumbnail', array('class' => 'strongarm')); ?>
                        </a>
                    </div>
                    <a href="<?php the_permalink() ?>">
                        <strong><?php the_title_attribute(); ?></strong>
                    </a>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No Related Posts.</p>
        <?php endif; ?>
    </div>
</div>
