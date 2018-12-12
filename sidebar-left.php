<?php
/* Left Sidebar */
if(function_exists( 'fw_ext_sidebars_get_current_position' )){
	$sidebar_position = fw_ext_sidebars_get_current_position();
	echo fw_ext_sidebars_show('blue');
}else{
	if (is_active_sidebar('main-sidebar')) { 
		dynamic_sidebar('main-sidebar'); 
	}
}
