<?php
/* Right Sidebar */
if(function_exists( 'fw_ext_sidebars_get_current_position' )){
	$sidebar_position = fw_ext_sidebars_get_current_position();
	if($sidebar_position == 'right'){
		echo fw_ext_sidebars_show('blue');
	}
	if($sidebar_position == 'left_right'){
		echo fw_ext_sidebars_show('yellow');
	}
}else{
	if (is_active_sidebar('main-sidebar')) { 
		dynamic_sidebar('main-sidebar'); 
	}
}


