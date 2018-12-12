<?php
class WPBakeryShortCode_bt_icon_video_popup extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'align' => 'text-left',
			'css_animation' => '',
			'el_id' => '',
			'el_class' => '',
			
			'icon_type' => 'font_icon',
			'font_icon' => '',
			'image_icon' => '',
			'icon_style' => '',
			
			'css' => ''
			
		), $atts));
		
		$content = wpb_js_remove_wpautop($content, true);
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element',
			'bt-icon-video-popup-element',
			$align,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrapper_attributes = array();
		if ( ! empty( $el_id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		if($icon_type == 'font_icon'){
			$icon = $font_icon?'<i class="'.esc_attr($font_icon).'"></i>':'';
		}else{
			$attachment_image = wp_get_attachment_image_src($image_icon, 'full', false);
			$icon = $attachment_image[0]?'<img src="'.esc_url($attachment_image[0]).'" alt="'.esc_attr__('Thumbnail', 'pintu').'"/>':'';
		}
		
		$video_link = isset($atts['video_link'])?vc_build_link( $atts['video_link'] ):array();
		$video_link_attributes = array();
		if(!empty($video_link)){
			if ( ! empty( $video_link['url'] ) ) {
				$video_link_attributes[] = 'href="' . esc_attr( $video_link['url'] ) . '"';
			}
			
			if ( ! empty( $video_link['target'] ) ) {
				$video_link_attributes[] = 'target="' . esc_attr( $video_link['target'] ) . '"';
			}
			
			if ( ! empty( $video_link['rel'] ) ) {
				$video_link_attributes[] = 'rel="' . esc_attr( $video_link['rel'] ) . '"';
			}
			
			if ( ! empty( $video_link['title'] ) ) {
				$video_link_attributes[] = 'title ="'.esc_attr($video_link['title']).'"';
			}
		}
		
		ob_start();
		?>
		<div class="<?php echo esc_attr(implode(' ', $css_class)); ?>" <?php echo esc_attr(implode(' ', $wrapper_attributes)); ?>>
			<?php if($icon) echo '<a class="html5lightbox " '.implode(' ', $video_link_attributes).'>'.$icon.'</a>'; ?>
		</div>
		<?php
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Icon Video Popup', 'pintu'),
	'base' => 'bt_icon_video_popup',
	'category' => esc_html__('BT Elements', 'pintu'),
	'icon' => 'bt-icon',
	'params' => array(
		array(
			'type' => 'vc_link',
			'heading' => esc_html__('Video URL (Link)', 'pintu'),
			'param_name' => 'video_link',
			'description' => esc_html__('Add video link of the icon in this element.', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Align', 'pintu'),
			'param_name' => 'align',
			'value' => array(
				esc_html__('Left', 'pintu') => 'text-left',
				esc_html__('Center', 'pintu') => 'text-center',
				esc_html__('Right', 'pintu') => 'text-right',
			),
			'dependency' => array(
				'element'=>'style',
				'value'=> 'icon-top'
			),
			'description' => esc_html__('Select layout align in this elment.', 'pintu')
		),
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
			'type' => 'dropdown',
			'heading' => esc_html__('Icon Type', 'pintu'),
			'param_name' => 'icon_type',
			'value' => array(
				esc_html__('Font Icon', 'pintu') => 'font_icon',
				esc_html__('Image Icon', 'pintu') => 'image_icon'
			),
			'group' => esc_html__('Icon', 'pintu'),
			'description' => esc_html__('Select type icon in this elment.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Font Icon', 'pintu'),
			'param_name' => 'font_icon',
			'value' => '',
			'group' => esc_html__('Icon', 'pintu'),
			'dependency' => array(
				'element'=>'icon_type',
				'value'=> 'font_icon'
			),
			'description' => esc_html__('Please, enter class font icon in this element.', 'pintu')
		),
		array(
			'type' => 'attach_image',
			'heading' => esc_html__('Image Icon', 'pintu'),
			'param_name' => 'image_icon',
			'value' => '',
			'group' => esc_html__('Icon', 'pintu'),
			'dependency' => array(
				'element'=>'icon_type',
				'value'=> 'image_icon'
			),
			'description' => esc_html__('Select box image icon in this element.', 'pintu')
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('CSS box', 'pintu'),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'pintu'),
		)
	)
));
