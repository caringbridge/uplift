<?php
/**
 * The template for displaying search forms in CaringBridge
 *
 * @package WordPress
 * @subpackage CaringBridge
 */
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	<div class="searchFormContainer"><label class="screen-reader-text" for="s"><?php echo __('Search for:'); ?></label>
		<input placeholder="search our blog" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Search'); ?>" />
	</div>
</form>
