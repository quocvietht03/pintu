<?php
function pintu_autoCompileLess($inputFile, $outputFile) {
    require_once ABSPATH.'/wp-admin/includes/file.php';	
	WP_Filesystem();
	if(!class_exists('lessc')){
		require_once get_template_directory().'/framework/inc/lessc.inc.php';
	}
	global $wp_filesystem, $pintu_options;
    $less = new lessc();
    $less->setFormatter("classic");
    $less->setPreserveComments(true);
	
	/*Styling Options*/
	$site_width = (isset($pintu_options['site_width'])&&$pintu_options['site_width'])?$pintu_options['site_width'].'px': '1200px';
	$mobile_width = (isset($pintu_options['mobile_width'])&&$pintu_options['mobile_width'])?$pintu_options['mobile_width'].'px': '991px';
	
	$main_color = (isset($pintu_options['main_color'])&&$pintu_options['main_color'])?$pintu_options['main_color']: '#477ae2';
	$secondary_color = (isset($pintu_options['secondary_color'])&&$pintu_options['secondary_color'])?$pintu_options['secondary_color']: '#39e1aa';
	
	$h1_menu_first_level_color_active = (isset($pintu_options['h1_menu_first_level_color']['active'])&&$pintu_options['h1_menu_first_level_color']['active'])?$pintu_options['h1_menu_first_level_color']['active']: '#477ae2';
	$h1_menu_sub_level_color_active = (isset($pintu_options['h1_menu_sub_level_color']['active'])&&$pintu_options['h1_menu_sub_level_color']['active'])?$pintu_options['h1_menu_sub_level_color']['active']: '#477ae2';
	$h1_menu_first_level_color_stick_active = (isset($pintu_options['h1_menu_first_level_color_stick']['active'])&&$pintu_options['h1_menu_first_level_color_stick']['active'])?$pintu_options['h1_menu_first_level_color_stick']['active']: '#477ae2';
	
	$h1_mobile_toggle_button_default = (isset($pintu_options['h1_mobile_toggle_button']['regular'])&&$pintu_options['h1_mobile_toggle_button']['regular'])?$pintu_options['h1_mobile_toggle_button']['regular']: '#171721';
	$h1_mobile_toggle_button_hover = (isset($pintu_options['h1_mobile_toggle_button']['hover'])&&$pintu_options['h1_mobile_toggle_button']['hover'])?$pintu_options['h1_mobile_toggle_button']['hover']: '#477ae2';
	
	$h1_menu_mobile_first_level_color_active = (isset($pintu_options['h1_menu_mobile_first_level_color']['active'])&&$pintu_options['h1_menu_mobile_first_level_color']['active'])?$pintu_options['h1_menu_mobile_first_level_color']['active']: '#477ae2';
	$h1_menu_mobile_sub_level_color_active = (isset($pintu_options['h1_menu_mobile_sub_level_color']['active'])&&$pintu_options['h1_menu_mobile_sub_level_color']['active'])?$pintu_options['h1_menu_mobile_sub_level_color']['active']: '#477ae2';
	
	$h2_menu_first_level_color_active = (isset($pintu_options['h2_menu_first_level_color']['active'])&&$pintu_options['h2_menu_first_level_color']['active'])?$pintu_options['h2_menu_first_level_color']['active']: '#477ae2';
	$h2_menu_sub_level_color_active = (isset($pintu_options['h2_menu_sub_level_color']['active'])&&$pintu_options['h2_menu_sub_level_color']['active'])?$pintu_options['h2_menu_sub_level_color']['active']: '#477ae2';
	$h2_menu_first_level_color_stick_active = (isset($pintu_options['h2_menu_first_level_color_stick']['active'])&&$pintu_options['h2_menu_first_level_color_stick']['active'])?$pintu_options['h2_menu_first_level_color_stick']['active']: '#477ae2';
	
	$h2_mobile_toggle_button_default = (isset($pintu_options['h2_mobile_toggle_button']['regular'])&&$pintu_options['h2_mobile_toggle_button']['regular'])?$pintu_options['h2_mobile_toggle_button']['regular']: '#171721';
	$h2_mobile_toggle_button_hover = (isset($pintu_options['h2_mobile_toggle_button']['hover'])&&$pintu_options['h2_mobile_toggle_button']['hover'])?$pintu_options['h2_mobile_toggle_button']['hover']: '#477ae2';
	
	$h2_menu_mobile_first_level_color_active = (isset($pintu_options['h2_menu_mobile_first_level_color']['active'])&&$pintu_options['h2_menu_mobile_first_level_color']['active'])?$pintu_options['h2_menu_mobile_first_level_color']['active']: '#477ae2';
	$h2_menu_mobile_sub_level_color_active = (isset($pintu_options['h2_menu_mobile_sub_level_color']['active'])&&$pintu_options['h2_menu_mobile_sub_level_color']['active'])?$pintu_options['h2_menu_mobile_sub_level_color']['active']: '#477ae2';
	
	$h3_menu_first_level_color_active = (isset($pintu_options['h3_menu_first_level_color']['active'])&&$pintu_options['h3_menu_first_level_color']['active'])?$pintu_options['h3_menu_first_level_color']['active']: '#477ae2';
	$h3_menu_sub_level_color_active = (isset($pintu_options['h3_menu_sub_level_color']['active'])&&$pintu_options['h3_menu_sub_level_color']['active'])?$pintu_options['h3_menu_sub_level_color']['active']: '#477ae2';
	$h3_menu_first_level_color_stick_active = (isset($pintu_options['h3_menu_first_level_color_stick']['active'])&&$pintu_options['h3_menu_first_level_color_stick']['active'])?$pintu_options['h3_menu_first_level_color_stick']['active']: '#477ae2';

	$h3_mobile_toggle_button_default = (isset($pintu_options['h3_mobile_toggle_button']['regular'])&&$pintu_options['h3_mobile_toggle_button']['regular'])?$pintu_options['h3_mobile_toggle_button']['regular']: '#171721';
	$h3_mobile_toggle_button_hover = (isset($pintu_options['h3_mobile_toggle_button']['hover'])&&$pintu_options['h3_mobile_toggle_button']['hover'])?$pintu_options['h3_mobile_toggle_button']['hover']: '#477ae2';

	$h3_menu_mobile_first_level_color_active = (isset($pintu_options['h3_menu_mobile_first_level_color']['active'])&&$pintu_options['h3_menu_mobile_first_level_color']['active'])?$pintu_options['h3_menu_mobile_first_level_color']['active']: '#477ae2';
	$h3_menu_mobile_sub_level_color_active = (isset($pintu_options['h3_menu_mobile_sub_level_color']['active'])&&$pintu_options['h3_menu_mobile_sub_level_color']['active'])?$pintu_options['h3_menu_mobile_sub_level_color']['active']: '#477ae2';	
	
	$honepage_menu_first_level_color_active = (isset($pintu_options['honepage_menu_first_level_color']['active'])&&$pintu_options['honepage_menu_first_level_color']['active'])?$pintu_options['honepage_menu_first_level_color']['active']: '#477ae2';
	$honepage_menu_sub_level_color_active = (isset($pintu_options['honepage_menu_sub_level_color']['active'])&&$pintu_options['honepage_menu_sub_level_color']['active'])?$pintu_options['honepage_menu_sub_level_color']['active']: '#477ae2';
	$honepage_menu_first_level_color_stick_active = (isset($pintu_options['honepage_menu_first_level_color_stick']['active'])&&$pintu_options['honepage_menu_first_level_color_stick']['active'])?$pintu_options['honepage_menu_first_level_color_stick']['active']: '#477ae2';
	
	$honepage_mobile_toggle_button_default = (isset($pintu_options['honepage_mobile_toggle_button']['regular'])&&$pintu_options['honepage_mobile_toggle_button']['regular'])?$pintu_options['honepage_mobile_toggle_button']['regular']: '#171721';
	$honepage_mobile_toggle_button_hover = (isset($pintu_options['honepage_mobile_toggle_button']['hover'])&&$pintu_options['honepage_mobile_toggle_button']['hover'])?$pintu_options['honepage_mobile_toggle_button']['hover']: '#477ae2';
	
	$honepage_menu_mobile_first_level_color_active = (isset($pintu_options['honepage_menu_mobile_first_level_color']['active'])&&$pintu_options['honepage_menu_mobile_first_level_color']['active'])?$pintu_options['honepage_menu_mobile_first_level_color']['active']: '#477ae2';
	$honepage_menu_mobile_sub_level_color_active = (isset($pintu_options['honepage_menu_mobile_sub_level_color']['active'])&&$pintu_options['honepage_menu_mobile_sub_level_color']['active'])?$pintu_options['honepage_menu_mobile_sub_level_color']['active']: '#477ae2';
	
	$hvertical_menu_first_level_color = (isset($pintu_options['hvertical_menu_first_level_color']['active'])&&$pintu_options['hvertical_menu_first_level_color']['active'])?$pintu_options['hvertical_menu_first_level_color']['active']: '#477ae2';
	$hvertical_menu_sub_level_color = (isset($pintu_options['hvertical_menu_sub_level_color']['active'])&&$pintu_options['hvertical_menu_sub_level_color']['active'])?$pintu_options['hvertical_menu_sub_level_color']['active']: '#477ae2';
	
	$hvertical_mobile_toggle_button_default = (isset($pintu_options['hvertical_mobile_toggle_button']['regular'])&&$pintu_options['hvertical_mobile_toggle_button']['regular'])?$pintu_options['hvertical_mobile_toggle_button']['regular']: '#171721';
	$hvertical_mobile_toggle_button_hover = (isset($pintu_options['hvertical_mobile_toggle_button']['hover'])&&$pintu_options['hvertical_mobile_toggle_button']['hover'])?$pintu_options['hvertical_mobile_toggle_button']['hover']: '#477ae2';
	
	$hminivertical_menu_first_level_color = (isset($pintu_options['hminivertical_menu_first_level_color']['active'])&&$pintu_options['hminivertical_menu_first_level_color']['active'])?$pintu_options['hminivertical_menu_first_level_color']['active']: '#477ae2';
	$hminivertical_menu_sub_level_color = (isset($pintu_options['hminivertical_menu_sub_level_color']['active'])&&$pintu_options['hminivertical_menu_sub_level_color']['active'])?$pintu_options['hminivertical_menu_sub_level_color']['active']: '#477ae2';
	
	$hminivertical_toggle_button_default = (isset($pintu_options['hminivertical_toggle_button']['regular'])&&$pintu_options['hminivertical_toggle_button']['regular'])?$pintu_options['hminivertical_toggle_button']['regular']: '#171721';
	$hminivertical_toggle_button_hover = (isset($pintu_options['hminivertical_toggle_button']['hover'])&&$pintu_options['hminivertical_toggle_button']['hover'])?$pintu_options['hminivertical_toggle_button']['hover']: '#477ae2';
	
	$hminivertical_mobile_toggle_button_default = (isset($pintu_options['hminivertical_mobile_toggle_button']['regular'])&&$pintu_options['hminivertical_mobile_toggle_button']['regular'])?$pintu_options['hminivertical_mobile_toggle_button']['regular']: '#171721';
	$hminivertical_mobile_toggle_button_hover = (isset($pintu_options['hminivertical_mobile_toggle_button']['hover'])&&$pintu_options['hminivertical_mobile_toggle_button']['hover'])?$pintu_options['hminivertical_mobile_toggle_button']['hover']: '#477ae2';
	
	$hminivertical_menu_mobile_first_level_color_active = (isset($pintu_options['hminivertical_menu_mobile_first_level_color']['active'])&&$pintu_options['hminivertical_menu_mobile_first_level_color']['active'])?$pintu_options['hminivertical_menu_mobile_first_level_color']['active']: '#477ae2';
	$hminivertical_menu_mobile_sub_level_color_active = (isset($pintu_options['hminivertical_menu_mobile_sub_level_color']['active'])&&$pintu_options['hminivertical_menu_mobile_sub_level_color']['active'])?$pintu_options['hminivertical_menu_mobile_sub_level_color']['active']: '#477ae2';
	
	
    $variables = array(
		"site-width" => $site_width,
		"mobile-width" => $mobile_width,
		
		"main-color" => $main_color,
		"secondary-color" => $secondary_color,
		
		"h1-menu-first-level-color-active" => $h1_menu_first_level_color_active,
		"h1-menu-sub-level-color-active" => $h1_menu_sub_level_color_active,
		"h1-menu-first-level-color-stick-active" => $h1_menu_first_level_color_stick_active,
		
		"h1-mobile-toggle-button-default" => $h1_mobile_toggle_button_default,
		"h1-mobile-toggle-button-hover" => $h1_mobile_toggle_button_hover,
		
		"h1-menu-mobile-first-level-color-active" => $h1_menu_mobile_first_level_color_active,
		"h1-menu-mobile-sub-level-color-active" => $h1_menu_mobile_sub_level_color_active,
		
		"h2-menu-first-level-color-active" => $h2_menu_first_level_color_active,
		"h2-menu-sub-level-color-active" => $h2_menu_sub_level_color_active,
		"h2-menu-first-level-color-stick-active" => $h2_menu_first_level_color_stick_active,
		
		"h2-mobile-toggle-button-default" => $h2_mobile_toggle_button_default,
		"h2-mobile-toggle-button-hover" => $h2_mobile_toggle_button_hover,
		
		"h2-menu-mobile-first-level-color-active" => $h2_menu_mobile_first_level_color_active,
		"h2-menu-mobile-sub-level-color-active" => $h2_menu_mobile_sub_level_color_active,
		
		"h3-menu-first-level-color-active" => $h3_menu_first_level_color_active,
		"h3-menu-sub-level-color-active" => $h3_menu_sub_level_color_active,
		"h3-menu-first-level-color-stick-active" => $h3_menu_first_level_color_stick_active,
		
		"h3-mobile-toggle-button-default" => $h3_mobile_toggle_button_default,
		"h3-mobile-toggle-button-hover" => $h3_mobile_toggle_button_hover,
		
		"h3-menu-mobile-first-level-color-active" => $h3_menu_mobile_first_level_color_active,
		"h3-menu-mobile-sub-level-color-active" => $h3_menu_mobile_sub_level_color_active,
		
		"honepage-menu-first-level-color-active" => $honepage_menu_first_level_color_active,
		"honepage-menu-sub-level-color-active" => $honepage_menu_sub_level_color_active,
		"honepage-menu-first-level-color-stick-active" => $honepage_menu_first_level_color_stick_active,
		
		"honepage-mobile-toggle-button-default" => $honepage_mobile_toggle_button_default,
		"honepage-mobile-toggle-button-hover" => $honepage_mobile_toggle_button_hover,
		
		"honepage-menu-mobile-first-level-color-active" => $honepage_menu_mobile_first_level_color_active,
		"honepage-menu-mobile-sub-level-color-active" => $honepage_menu_mobile_sub_level_color_active,
		
		"hvertical-menu-first-level-color" => $hvertical_menu_first_level_color,
		"hvertical-menu-sub-level-color" => $hvertical_menu_sub_level_color,
		
		"hvertical-mobile-toggle-button-default" => $hvertical_mobile_toggle_button_default,
		"hvertical-mobile-toggle-button-hover" => $hvertical_mobile_toggle_button_hover,
		
		"hminivertical-menu-first-level-color" => $hminivertical_menu_first_level_color,
		"hminivertical-menu-sub-level-color" => $hminivertical_menu_sub_level_color,
		
		"hminivertical-toggle-button-default" => $hminivertical_toggle_button_default,
		"hminivertical-toggle-button-hover" => $hminivertical_toggle_button_hover,
		
		"hminivertical-mobile-toggle-button-default" => $hminivertical_mobile_toggle_button_default,
		"hminivertical-mobile-toggle-button-hover" => $hminivertical_mobile_toggle_button_hover,
		
		"hminivertical-menu-mobile-first-level-color-active" => $hminivertical_menu_mobile_first_level_color_active,
		"hminivertical-menu-mobile-sub-level-color-active" => $hminivertical_menu_mobile_sub_level_color_active,
		
    );
	
    $less->setVariables($variables);
    $cacheFile = $inputFile.".cache";
    if (file_exists($cacheFile)) {
            $cache = unserialize($wp_filesystem->get_contents($cacheFile));
    } else {
            $cache = $inputFile;
    }
    $newCache = $less->cachedCompile($inputFile);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
            $wp_filesystem->put_contents($cacheFile, serialize($newCache));
            $wp_filesystem->put_contents($outputFile, $newCache['compiled']);
    }
}
function pintu_addLessStyle() {
	global $pintu_options;
	
	$less_design = (isset($pintu_options['less_design'])&&$pintu_options['less_design']) ? $pintu_options['less_design'] : true; 
	if($less_design){
		try {
			$inputFile = get_template_directory().'/assets/css/less/style.less';
			$outputFile = get_template_directory().'/assets/css/main_style.css';
			pintu_autoCompileLess($inputFile, $outputFile);
		} catch (Exception $e) {
			echo 'Caught exception: ', $e->getMessage(), "\n";
		}
	}
	
}
add_action('wp_enqueue_scripts', 'pintu_addLessStyle');
/* End less*/