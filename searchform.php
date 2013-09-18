<?php
/**
 * The template for displaying search forms in CaringBridge
 *
 * @package WordPress
 * @subpackage CaringBridge
 */
?>

<form role="search" method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
    <div class="controls controls-row">
        <div class="input-append">
            <label class="visuallyhidden" for="s"><?php echo __('Search for:'); ?></label>

            <input type="search" id="s" name="s" class="search-query span10"
                   value="<?php echo get_search_query(); ?>"
                   placeholder="Search Uplift" />

            <button type="submit" class="btn" id="searchsubmit" >
                <span class="visuallyhidden">Search</span>
                <i class="icon-search"></i>
            </button>
        </div>
	</div>
</form>