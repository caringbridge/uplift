<?php if (has_action('addthis_widget')): ?>
<p>Share this Post:</p>
<div class="sharing-buttons">
    <?php do_action('addthis_widget',get_permalink($post->ID), get_the_title($post->ID), 'small_toolbox'); ?>
</div>
<?php endif; ?>
