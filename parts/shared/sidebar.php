<div class="rss">
    <a href="<?php bloginfo('rss2_url'); ?>" class="btn btn-default btn-block" role="button">
        <i class="icon-rss"></i> Uplift Blog RSS Feed
    </a>
</div>
<div class="panel panel-author">
    <div class="panel-heading">
        <h3 class="panel-title">About</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <p>We’re here to inform and to inspire, in the spirit of <strong><a href="http://www.caringbridge.org/who-we-are" target="_blank">our mission</a></strong>. We hope you’ll share what you find here — and add your voice to the conversation. Learn more about CaringBridge <strong><a href="http://www.caringbridge.org/what-we-offer" target="_blank">offerings</a></strong>.</p>
            </div>
        </div>
        <?php if ( is_single() ): ?>
        <hr/>
        <div>
            <div class="pull-left">
                <img class="author-thumb img-profile" <?php echo get_avatar (get_the_author_email(), 90); ?>
            </div>
            <p><strong>About the Author:</strong><br/>
            <?php the_author_meta( 'description' ); ?></p>
        </div>
        <?php endif ?>
    </div>
</div>
<form role="search" method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
    <div class="form-group">
        <label class="visuallyhidden" for="s">
            <?php echo __('Search for:'); ?>
        </label>
        <div class="input-group">
            <input type="search"
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
<?php get_sidebar(); ?>