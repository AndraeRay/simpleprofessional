<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Simple Professional
 */

$NO_SIDEBAR_ID=99;
	/* return selected sidebar, and default to 1 */
	$sidebar = intval(get_field('selected_sidebar'));
	$sidebar = $sidebar == 0 ? 1 : $sidebar;

		
	if ( !is_active_sidebar($sidebar) || $sidebar === $NO_SIDEBAR_ID ) {
		simpleprofessional_load_no_sidebar_styles();
		return;
	} elseif (get_option('sidebar-position', 'left') == 'left') {
		simpleprofessional_load_left_sidebar_styles();
	} else {
		simpleprofessional_load_right_sidebar_styles();
	}

?>

<div id="secondary" class="widget-area" role="complementary">
	 

	<?php

	dynamic_sidebar( $sidebar );
	
	
	?>
</div><!-- #secondary -->
