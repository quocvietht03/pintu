<?php
class WPBakeryShortCode_bt_counter extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'css_animation' => '',
			'el_id' => '',
			'el_class' => '',
			
			'number' => '',
			'number_font_size' => '',
			'number_font_weight' => '',
			'number_line_height' => '',
			'number_letter_spacing' => '',
			'number_color' => '',
			'title' => '',
			'title_font_size' => '',
			'title_font_weight' => '',
			'title_line_height' => '',
			'title_letter_spacing' => '',
			'title_color' => '',
			'sub_title' => '',
			'sub_title_font_size' => '',
			'sub_title_font_weight' => '',
			'sub_title_line_height' => '',
			'sub_title_letter_spacing' => '',
			'sub_title_color' => '',
			
			'css' => ''
			
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element',
			'bt-counter-element',
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrapper_attributes = array();
		if ( ! empty( $el_id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		/* Number */
		$number_attributes = $style_number = array();
		if($number_font_size) $style_number[] = 'font-size: '.$number_font_size.';';
		if($number_font_weight) $style_number[] = 'font-weight: '.$number_font_weight.';';
		if($number_line_height) $style_number[] = 'line-height: '.$number_line_height.';';
		if($number_letter_spacing) $style_number[] = 'letter-spacing: '.$number_letter_spacing.';';
		if($number_color) $style_number[] = 'color: '.$number_color.';';
		
		if ( ! empty( $style_number ) ) {
			$number_attributes[] = 'style="' . esc_attr( implode(' ', $style_number) ) . '"';
		}
		
		/* Title */
		$title_attributes = $style_title = array();
		if($title_font_size) $style_title[] = 'font-size: '.$title_font_size.';';
		if($title_font_weight) $style_title[] = 'font-weight: '.$title_font_weight.';';
		if($title_line_height) $style_title[] = 'line-height: '.$title_line_height.';';
		if($title_letter_spacing) $style_title[] = 'letter-spacing: '.$title_letter_spacing.';';
		if($title_color) $style_title[] = 'color: '.$title_color.';';
		
		if ( ! empty( $style_title ) ) {
			$title_attributes[] = 'style="' . esc_attr( implode(' ', $style_title) ) . '"';
		}
		
		/* Sub Title */
		$sub_title_attributes = $style_sub_title = array();
		if($sub_title_font_size) $style_sub_title[] = 'font-size: '.$sub_title_font_size.';';
		if($sub_title_font_weight) $style_sub_title[] = 'font-weight: '.$sub_title_font_weight.';';
		if($sub_title_line_height) $style_sub_title[] = 'line-height: '.$sub_title_line_height.';';
		if($sub_title_letter_spacing) $style_sub_title[] = 'letter-spacing: '.$sub_title_letter_spacing.';';
		if($sub_title_color) $style_sub_title[] = 'color: '.$sub_title_color.';';
		
		if ( ! empty( $style_sub_title ) ) {
			$sub_title_attributes[] = 'style="' . esc_attr( implode(' ', $style_sub_title) ) . '"';
		}
		
		wp_enqueue_script('counterup');
		wp_enqueue_script('waypoints');
		
		ob_start();
		?>
			<div class="<?php echo esc_attr(implode(' ', $css_class)); ?>" <?php echo esc_attr(implode(' ', $wrapper_attributes)); ?>>
				<?php
					if($number) echo '<span class="bt-number" '.implode(' ', $number_attributes).'>'.number_format($number).'</span>';
					if($title) echo '<h4 class="bt-title" '.implode(' ', $title_attributes).'>'.$title.'</h4>';
					if($sub_title) echo '<div class="bt-subtitle" '.implode(' ', $sub_title_attributes).'>'.$sub_title.'</div>';
				?>
			</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Counter', 'pintu'),
	'base' => 'bt_counter',
	'category' => esc_html__('BT Elements', 'pintu'),
	'icon' => 'bt-icon',
    'params' => array(
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'pintu'),
			'param_name' => 'el_id',
			'value' => '',
			'description' => esc_html__('Enter element ID (Note: make sure it is unique and valid).', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra Class', 'pintu'),
			'param_name' => 'el_class',
			'value' => '',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'holder' => 'div',
			'heading' => esc_html__('Number', 'pintu'),
			'param_name' => 'number',
			'value' => '',
			'group' => esc_html__('Number', 'pintu'),
			'description' => esc_html__('Please, enter number in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'pintu'),
			'param_name' => 'number_font_size',
			'value' => '',
			'group' => esc_html__('Number', 'pintu'),
			'description' => esc_html__('Please, enter number with px font size number in this element. Ex: 45px', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Weight', 'pintu'),
			'param_name' => 'number_font_weight',
			'value' => '',
			'group' => esc_html__('Number', 'pintu'),
			'description' => esc_html__('Please, enter number font weight number in this element. Ex: 700', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Line Height', 'pintu'),
			'param_name' => 'number_line_height',
			'value' => '',
			'group' => esc_html__('Number', 'pintu'),
			'description' => esc_html__('Please, enter number with px line height number in this element. Ex: 50px', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Letter Spacing', 'pintu'),
			'param_name' => 'number_letter_spacing',
			'value' => '',
			'group' => esc_html__('Number', 'pintu'),
			'description' => esc_html__('Please, enter number with px letter spacing number in this element. Ex: 1.2px', 'pintu')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'pintu'),
			'param_name' => 'number_color',
			'value' => '',
			'group' => esc_html__('Number', 'pintu'),
			'description' => esc_html__('Select color number in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Title', 'pintu'),
			'param_name' => 'title',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter title in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'pintu'),
			'param_name' => 'title_font_size',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number with px font size title in this element. Ex: 20px', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Weight', 'pintu'),
			'param_name' => 'title_font_weight',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number font weight title in this element. Ex: 400', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Line Height', 'pintu'),
			'param_name' => 'title_line_height',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number with px line height title in this element. Ex: 24px', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Letter Spacing', 'pintu'),
			'param_name' => 'title_letter_spacing',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number with px letter spacing title in this element. Ex: 1.2px', 'pintu')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'pintu'),
			'param_name' => 'title_color',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Select color title in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Sub Title', 'pintu'),
			'param_name' => 'sub_title',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter sub title in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Size', 'pintu'),
			'param_name' => 'sub_title_font_size',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number with px font size sub title in this element. Ex: 14px', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Weight', 'pintu'),
			'param_name' => 'sub_title_font_weight',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number font weight sub title in this element. Ex: 400', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Line Height', 'pintu'),
			'param_name' => 'sub_title_line_height',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number with px line height sub title in this element. Ex: 24px', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Letter Spacing', 'pintu'),
			'param_name' => 'sub_title_letter_spacing',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Please, enter number with px letter spacing sub title in this element. Ex: 1.2px', 'pintu')
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_html__('Color', 'pintu'),
			'param_name' => 'sub_title_color',
			'value' => '',
			'group' => esc_html__('Title', 'pintu'),
			'description' => esc_html__('Select color sub title in this element.', 'pintu')
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('CSS box', 'pintu'),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'pintu'),
		)
	)
));
