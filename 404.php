<?php get_template_parts( array('parts/header') ); ?>
<div class="layout container-fluid">
<?php get_template_parts(array('parts/uplift-logo')); ?>
    <div class="row">
        <section class="col-md-8">
            <div class="alert alert-error">
                <h5>Page not found</h5>
                <p>We can't seem to find what you're looking for, but we hope you can find something of value here instead:</p>
                <ul>
                    <li><a href ="http://blog.caringbridge.org">Read one of our other blog posts</a></li>
                    <li><a href="http://caringbridge.org">Learn more about CaringBridge</a></li>
                </ul>
            </div>
        </section>
        <aside class="col-md-4">
            <?php get_template_parts(array('parts/sidebar') ); ?>
        </aside>
    </div>
    <?php get_template_parts(array('parts/footer') ); ?>
</div>
<?php get_template_parts(array('parts/fine-print') ); ?>
