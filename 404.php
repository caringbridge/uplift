<?php get_template_parts( array('parts/shared/header') ); ?>
<div class="fluid-container">
    <div class="row-fluid">
        <div class="span8">
            <div id="content" role="main">
                <?php get_template_parts(array('parts/shared/uplift-logo')); ?>


                 <div class="alert alert-error">

                <h5>Page not found</h5>

                <p>We can't seem to find what you're looking for, but we hope you can find something of value here instead:</p>
                <ul>
                  <li><a href ="http://blog.caringbridge.org">Read one of our other blog posts</a></li>
                  <li><a href="http://caringbridge.org">Learn more about CaringBridge</a></li>
                </ul>

                 </div>



            </div>
        </div>

        <div class="span4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<div class="home" id="happy-little-trees"></div>
<?php get_template_parts(array('parts/shared/footer') ); ?>