<?php 
	global $pintu_options;
	
?>
<div class="bt-menu-toggle"></div>
<header id="bt_header" class="bt-header bt-header-vertical">
	
	<div class="bt-header-inner">
		<div class="bt-logo">
			<?php
				$logo = isset($pintu_options['hvertical_logo']['url'])?$pintu_options['hvertical_logo']['url']:'';
				
				$logo_height = (isset($pintu_options['hvertical_logo_height'])&&$pintu_options['hvertical_logo_height'])?$pintu_options['hvertical_logo_height']:'24';
				
				pintu_logo($logo, $logo_height); 
			?>
		</div>
		
		<div class="bt-vertical-menu-wrap">
			<?php
				$menu_assign = isset($pintu_options['hvertical_menu_assign'])&&($pintu_options['hvertical_menu_assign'] != 'auto')?$pintu_options['hvertical_menu_assign']:'';
				pintu_nav_menu($menu_assign, 'main_navigation', 'bt-menu-list');
			?>
		</div>
		
		<div class="bt-sidebar">
			<?php
				if(isset($pintu_options['hvertical_content_bottom_element'])&&$pintu_options['hvertical_content_bottom_element']&&isset($pintu_options['hvertical_content_bottom_element'])&&$pintu_options['hvertical_content_bottom_element']){
					echo '<div class="bt-menu-content-right">';
						foreach($pintu_options['hvertical_content_bottom_element'] as $sidebar_id){
							dynamic_sidebar( $sidebar_id );
						}
					echo '</div>'; 
				}
			?>
		</div>
		
	</div>
		
</header>