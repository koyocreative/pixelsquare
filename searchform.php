<?php
/**
 * The searchform.php template
 *
 * Used any time that get_search_form() is called.
 */

?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/')); ?>">
	
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'pixelsquare') ?>" value="<?php echo get_search_query(); ?>" name="s" autocomplete="off">

	<button type="submit" class="search-submit" value="search" ><i class='fas fa-search'></i></button>
</form> 