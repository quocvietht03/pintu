<?php
//vc_section
vc_add_params( 'vc_section', array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Particles Effect', 'pintu'),
		'param_name' => 'particles_effect',
		'value' => array(
			esc_html__('None', 'pintu') => 'none',
			esc_html__('Default', 'pintu') => 'default',
			esc_html__('Nasa', 'pintu') => 'nasa',
			esc_html__('Bubble', 'pintu') => 'bubble',
			esc_html__('Snow', 'pintu') => 'snow',
			esc_html__('Nyan', 'pintu') => 'nyan',
			esc_html__('Custom', 'pintu') => 'custom'
		),
		'group' => esc_html__('Particles', 'pintu'),
		'description' => esc_html__('Select particles effect in this section.', 'pintu')
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__('Particles Json', 'pintu'),
		'param_name' => 'particles_json',
		'value' => '',
		'group' => esc_html__('Particles', 'pintu'),
		'dependency' => array(
			'element'=>'particles_effect',
			'value'=> 'custom'
		),
		'description' => esc_html__('Enter text json config particles effect.', 'pintu')
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Disable Background Image', 'pintu'),
		'param_name' => 'disable_bg_image',
		'value' => array(
			esc_html__('None', 'pintu') => 'none',
			esc_html__('Screen less than 1200', 'pintu') => 'md',
			esc_html__('Screen less than 992', 'pintu') => 'sm',
			esc_html__('Screen less than 768', 'pintu') => 'xs'
		),
		'group' => esc_html__('Design Options', 'pintu'),
		'description' => esc_html__('Disable background image in this section.', 'pintu')
	),
) );

//vc_row
vc_add_params( 'vc_row', array(
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Row Style', 'pintu'),
		'param_name' => 'row_container',
		'value' => array(
			esc_html__('Full Width', 'pintu') => 'fullwidth',
			esc_html__('Container', 'pintu') => 'container'
		),
		'weight' => 1,
		'description' => esc_html__('Select row style.', 'pintu')
	),
	array(
		'type' => 'textfield',
		'heading' => esc_html__('Content Max Width', 'pintu'),
		'param_name' => 'row_content_max_width',
		'value' => '',
		'weight' => 1,
		'dependency' => array(
			'element'=>'row_container',
			'value'=> 'fullwidth'
		),
		'description' => esc_html__('Enter number with px to set content max with. Ex: 1240px', 'pintu')
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_html__('Columns no gap', 'pintu'),
		'param_name' => 'columns_no_gap',
		'value' => '',
		'weight' => 1,
		'description' => esc_html__('Enable no gap between columns in row.', 'pintu')
	),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Delay', 'pintu'),
        'param_name' => 'animate_delay',
        'value' => '0.3',
		'group' => esc_html__('Animation', 'pintu'),
        'description' => esc_html__('Animate delay (s). Example: 0.5', 'pintu')
    ),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Duration', 'pintu'),
        'param_name' => 'animate_duration',
        'value' => '1.2',
		'group' => esc_html__('Animation', 'pintu'),
        'description' => esc_html__('Animate duration (s). Example: 0.6', 'pintu')
    ),
	array(
		'type' => 'dropdown',
		'heading' => esc_html__('Particles Effect', 'pintu'),
		'param_name' => 'particles_effect',
		'value' => array(
			esc_html__('None', 'pintu') => 'none',
			esc_html__('Default', 'pintu') => 'default',
			esc_html__('Nasa', 'pintu') => 'nasa',
			esc_html__('Bubble', 'pintu') => 'bubble',
			esc_html__('Snow', 'pintu') => 'snow',
			esc_html__('Nyan', 'pintu') => 'nyan',
			esc_html__('Custom', 'pintu') => 'custom'
		),
		'group' => esc_html__('Particles', 'pintu'),
		'description' => esc_html__('Enable particles effect in this section.', 'pintu')
	),
	array(
		'type' => 'textarea',
		'heading' => esc_html__('Particles Json', 'pintu'),
		'param_name' => 'particles_json',
		'value' => '',
		'group' => esc_html__('Particles', 'pintu'),
		'dependency' => array(
			'element'=>'particles_effect',
			'value'=> 'custom'
		),
		'description' => esc_html__('Enter text json config particles effect.', 'pintu')
	)
) );

vc_remove_param( "vc_row", "full_width" );
vc_remove_param( "vc_row", "gap" );

//vc_column
vc_add_params( 'vc_column', array(
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Delay', 'pintu'),
        'param_name' => 'animate_delay',
        'value' => '0.3',
		'group' => esc_html__('Animation', 'pintu'),
        'description' => esc_html__('Animate delay (s). Example: 0.5', 'pintu')
    ),
	array(
        'type' => 'textfield',
        'heading' => esc_html__('Animate Duration', 'pintu'),
        'param_name' => 'animate_duration',
        'value' => '1.2',
		'group' => esc_html__('Animation', 'pintu'),
        'description' => esc_html__('Animate duration (s). Example: 0.6', 'pintu')
    )
) );

//vc_custom_heading
vc_add_param( 'vc_custom_heading', array(
    'type' => 'textarea',
    'heading' => esc_html__('Custom Style', 'pintu'),
    'param_name' => 'custom_style',
    'value' => '',
    'description' => esc_html__('Enter custom style for heading element', 'pintu'),
	'group' => esc_html__('Extra Options', 'pintu')
) );

// vc_hoverbox
vc_add_param( 'vc_hoverbox', array(
    'type' => 'textfield',
    'heading' => esc_html__('Oder Number', 'pintu'),
    'param_name' => 'oder_number',
    'value' => '',
	'weight' => 1,
    'description' => esc_html__('Enter oder number.', 'pintu')
) );
