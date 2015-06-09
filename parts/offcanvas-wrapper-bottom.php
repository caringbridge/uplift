<?php
    /* The following divs all open in parts/off-canvas-wrapper-top.php
       Dirty? yes, but it also cuts down on redundant markup */ ?>
                        </section>
                        <aside class="col-md-4">
                            <?php get_template_parts(array('parts/sidebar') ); ?>
                        </aside>
                    </div>
                </div>
            </div>
            <?php get_template_parts(array('parts/fat-footer') ); ?>
        </div>
        <div class="col-xs-9 sidebar-offcanvas" id="sidebar" role="navigation">
            <?php get_template_parts(array('parts/offcanvas') ); ?>
        </div>
    </div>
</div>
<?php wp_footer(); ?> 
</body>
</html>
