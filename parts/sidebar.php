<div class="row">
    <div class="col-xs-12 col-supp-8 col-sm-12">
        <div class="panel panel-author">
            <div class="panel-heading">
                <h3 class="panel-title">Why We’re Here</h3>
            </div>
            <div class="panel-body">
                <p>CaringBridge brings together personal stories and expert information to uplift, educate and inspire. Join the conversation, tell us your thoughts, and please share our stories if they can help someone you know.</p>
            </div>
        </div>
        <form role="search" method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
            <div class="form-group">
                <label class="visuallyhidden" for="s">
                    <?php echo __('Search for:'); ?>
                </label>
                <div class="input-group">
                    <input
                        type="search"
                        id="s"
                        name="s"
                        class="form-control"
                        value="<?php echo get_search_query(); ?>"
                        placeholder="Search Uplift"
                    />
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" id="searchsubmit">
                            <span class="visuallyhidden">Search</span>
                            <i class="icon-search"></i>
                        </button>
                    </span>
                </div>
            </div>
        </form>
        <?php if ( is_single() ): ?>
            <?php related_posts(); ?>
        <?php endif ?>
    </div>

    <div class="col-xs-12 col-supp-4 col-sm-12">
        <?php get_sidebar(); ?>
    </div>
</div>