<?php
/*
 * Taxonomy checkbox list field
 */
function pintu_taxonomy_settings_field($settings, $value) {
    $dependency = function_exists('vc_generate_dependencies_attributes') ? vc_generate_dependencies_attributes($settings) : '';
    $terms_fields = array();
    $value_arr = $value;

    if (!is_array($value_arr)) {
        $value_arr = array_map('trim', explode(',', $value_arr));
    }

    if (!empty($settings['taxonomy'])) {
        $terms = get_terms($settings['taxonomy'], 'orderby=count&hide_empty=0');

        if ($terms && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $terms_fields[] = sprintf(
                        '<label><input onclick="changeCategory(this);" id="%s" class="tb-check-taxonomy %s" type="checkbox" name="%s" value="%s" %s/>%s</label>', $settings['param_name'] . '-' . $term->slug, $settings['param_name'] . ' ' . $settings['type'], $settings['param_name'], $term->slug, checked(in_array($term->slug, $value_arr), true, false), $term->name
				);
            }
        }
    }

    return '<div class="tb-taxonomy-block">'
            . '<input type="hidden" name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-checkboxes ' . $settings['param_name'] . ' ' . $settings['type'] . '_field" value="' . $value . '" ' . $dependency . ' />'
            . '<div class="tb-taxonomy-terms">'
            . implode($terms_fields)
            . '</div>'
            . '</div>';
}
pintu_add_extra_parame('bt_taxonomy', 'pintu_taxonomy_settings_field', get_template_directory_uri().'/assets/vc_extend/vc_taxonomy.js');

/*
 * Layout select list field
 */
function pintu_layout_settings_field($settings, $value) {
    $dependency = function_exists('vc_generate_dependencies_attributes') ? vc_generate_dependencies_attributes($settings) : '';

    if (isset($settings['value']) && !empty($settings['value'])){
		$count = 0; $layout_preview ='';
		foreach ($settings['value'] as $key => $val) {
			if($val == $value){
				$layout_default = $val;
				$layout_preview = '<img src="'.esc_url(get_template_directory_uri().'/assets/vc_extend/'.$settings['folder'].'/'.$val.'.jpg').'" alt="'.esc_attr($key).'"/>';
			}
			$layout_option[] = '<option class="'.esc_attr($key).'" value="'.esc_attr($val).'" '.selected($val, $value).' data-name="'.esc_attr($key).'" data-url="'.esc_url(get_template_directory_uri().'/assets/vc_extend/'.$settings['folder'].'/'.$val.'.jpg').'">'.$key.'</option>';
			$count++;
		}
	}

    return '<div class="tb-layout-block">'
            . '<div class="bt-preview">'.$layout_preview.'</div>'
			. '<select name="'.esc_attr( $settings['param_name'] ).'" class="tb-layout-field wpb_vc_param_value wpb-input wpb-select '.esc_attr( $settings['param_name'] ).' '.esc_attr( $settings['type'] ).' '.esc_attr( $value ).'" data-option="'.esc_attr( $value ).'" '.esc_attr($dependency).' onchange="changeLayout(this);">'
            . implode($layout_option)
            . '</select>'
            . '</div>';
}
pintu_add_extra_parame('bt_layout', 'pintu_layout_settings_field', get_template_directory_uri().'/assets/vc_extend/vc_layout.js');
