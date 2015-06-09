<div class="panel panel-custom">
    <div class="panel-heading">
        <h3 class="panel-title">Why We’re Here</h3>
    </div>
    <div class="panel-body">
        <p>CaringBridge brings together personal stories and expert information to uplift, educate and inspire. Join the conversation, tell us your thoughts, and please share our stories if they can help someone you know.</p>
    </div>
</div>
<form role="search" method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
    <div class="form-group">
        <div class="input-group">
            <label class="placeholder-fallback" for="find-site">
                <?php echo __('Search Uplift Blog:'); ?>
            </label>
            <input type="search"
                   id="s"
                   name="s"
                   class="form-control"
                   value="<?php echo get_search_query(); ?>"
                   placeholder="Search Uplift Blog"/>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default" id="searchsubmit">
                    <span class="visuallyhidden">Visit</span>
                    <i class="icon-search"></i>
                </button>
            </span>
        </div>
    </div>
</form>
<?php if ( is_single() ): ?>
    <?php related_posts(); ?>
<?php endif ?>
<?php get_sidebar(); ?>
