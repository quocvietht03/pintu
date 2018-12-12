<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @internal */
function pintu_filter_theme_ext_mega_menu_wp_nav_menu_args($args) {
	$args['walker'] = new FW_Ext_Mega_Menu_Custom_Walker();

	return $args;
}
add_filter('wp_nav_menu_args', 'pintu_filter_theme_ext_mega_menu_wp_nav_menu_args');

if(!function_exists('pintu_menu_item_dynamic_sidebar')) {
	function pintu_menu_item_dynamic_sidebar( $content = '', $item ) {
		// extra options
		$extra_options = array();
		$sidebar_content = '';
		if ($item_type = fw_ext_mega_menu_get_db_item_option($item->ID, 'type')) {
		    $extra_options = fw_ext_mega_menu_get_db_item_option($item->ID, $item_type);
		    $extra_options['menu_item_type'] = $item_type;
			
			if(isset($extra_options['mega_menu_item_type']['type'])&&$extra_options['mega_menu_item_type']['type'] == 'sidebar'){
				ob_start();
				dynamic_sidebar( $extra_options['mega_menu_item_type']['sidebar']['sidebar_id'] );
				$sidebar_content = ob_get_clean();
				$content = '<div class="menu-item-custom-wrap sidebar-container">' . $sidebar_content . '</div>';
			}
		}

	return $content;
	}
}
add_filter( 'walker_nav_menu_start_el_custom', 'pintu_menu_item_dynamic_sidebar', 10, 2 );
