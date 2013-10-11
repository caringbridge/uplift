<script type='text/javascript'>
/* <![CDATA[ */
	function onTopNavChange(val) {
		if (val == 0) {
			return false;
			}
			
		location.href = val;
	}
/* ]]> */
</script>

<div id="uplift-header" class="row">
    <div class="span5 uplift-logo-container">
    <a href="/"><img src="<?php bloginfo('template_directory'); ?>/img/uplift-logo.png" alt="Uplift Logo" data-svg="<?php bloginfo('template_directory'); ?>/img/uplift-logo.svg"></a>
    </div>
    
    
    
     <div class="span3 cat">
     
       
    
    <select name="catNav" id="catNav" onchange="onTopNavChange(this.value);">
    <option value="0">Select a Category</option>
    
    <?php    
    $cat_options = array(
	'type'                     => 'post',
	'child_of'                 => 0,
	'parent'                   => '',
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'taxonomy'                 => 'category',
	'pad_counts'               => false );
    
    foreach(get_categories($cat_options) as $cat) {
	    echo '<option value="' . get_category_link($cat->term_id) . '" ' . ($cat->term_id == get_query_var('cat') ? 'selected' : '') . '>' . $cat->name . '</option>';
    }
    ?>
    
    </select>
    
    
    
        
    </div>
</div>
