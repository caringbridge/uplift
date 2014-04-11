<?php
/**
 * The template for displaying search forms in CaringBridge
 *
 * @package WordPress
 * @subpackage CaringBridge
 */
?>
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