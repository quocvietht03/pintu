<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$menu_slug_opt = array();
$menus_obj = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
$menu_slug_opt['auto'] = 'Auto';
foreach ( $menus_obj as $menu_obj ) {
	$menu_slug_opt[$menu_obj->slug] = $menu_obj->name;
}

$options = array(
	'page_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'page_general_setting' => array(
				'title' => esc_html__('General', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'page_titlebar' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Title Bar', 'pintu'),
						'desc' => esc_html__('Turn on to disable title bar in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					
				),
			),
			'page_header_setting' => array(
				'title' => esc_html__('Header', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'header_layout' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Header Layout', 'pintu'),
						'desc'  => esc_html__('Select a header layout in current page', 'pintu'),
						'choices' => array(
							'default' => esc_html__('Default', 'pintu'),
							'1' => esc_html__('Header 1', 'pintu'),
							'2' => esc_html__('Header 2', 'pintu'),
							'3' => esc_html__('Header 3', 'pintu'),
							'onepage' => esc_html__('Header One Page', 'pintu'),
							'onepagescroll' => esc_html__('Header One Page Scroll', 'pintu'),
							'vertical' => esc_html__('Header Vertical', 'pintu'),
							'minivertical' => esc_html__('Header Mini Vertical', 'pintu')
						)
					),
					'header_fullwidth' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Full Width (100%)', 'pintu'),
						'desc' => esc_html__('Turn on to disable header full width (100%) in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'header_absolute' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Absolute', 'pintu'),
						'desc' => esc_html__('Turn on to disable header absolute in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'header_top' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Top', 'pintu'),
						'desc' => esc_html__('Turn on to disable header top in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'header_logo' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Logo', 'pintu'),
						'desc'  => esc_html__('Select image to change the logo in current page.', 'pintu'),
					),
					'header_logo_height' => array(
						'type'  => 'short-text',
						'value' => '',
						'label' => esc_html__('Logo Height', 'pintu'),
						'desc'  => esc_html__('Controls the height of the logo in current page. EX: 50', 'pintu')
					),
					'header_menu_assign' => array(
						'type'  => 'select',
						'value' => 'default',
						'label' => esc_html__('Menu Assign', 'pintu'),
						'desc'  => esc_html__('Select a menu assign of header layout in current page', 'pintu'),
						'choices' => $menu_slug_opt
					),
					'header_stick' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Sticky', 'pintu'),
						'desc' => esc_html__('Turn on to disable header stick in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'header_logo_stick' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Logo Stick', 'pintu'),
						'desc'  => esc_html__('Select image to change the logo stick in current page.', 'pintu'),
					),
					'header_logo_stick_height' => array(
						'type'  => 'short-text',
						'value' => '',
						'label' => esc_html__('Logo Height', 'pintu'),
						'desc'  => esc_html__('Controls the height of the logo stick in current page. EX: 40', 'pintu')
					),
					'mobile_header_top' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Header Top Mobile', 'pintu'),
						'desc' => esc_html__('Turn on to disable header top mobile in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'logo_mobile' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Logo Mobile', 'pintu'),
						'desc'  => esc_html__('Select image to change the logo mobile in current page.', 'pintu'),
					),
					'logo_mobile_height' => array(
						'type'  => 'short-text',
						'value' => '',
						'label' => esc_html__('Logo Height', 'pintu'),
						'desc'  => esc_html__('Controls the height of the logo mobile in current page. EX: 30', 'pintu')
					),
					
				),
			),
			'page_titlebar_setting' => array(
				'title' => esc_html__('Title Bar', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'titlebar_layout' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Title Bar Layout', 'pintu'),
						'desc'  => esc_html__('Select a title bar layout in current page', 'pintu'),
						'choices' => array(
							'default' => esc_html__('Default', 'pintu'),
							'1' => esc_html__('Title Bar 1', 'pintu'),
							'2' => esc_html__('Title Bar 2', 'pintu')
						)
					),
					'page_titlebar_space' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Title Bar Space', 'pintu'),
						'desc' => esc_html__('Turn on to disable space between title bar and content in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'page_titlebar_background' => array(
						'type'  => 'upload',
						'value' => array(
							'url' => ''
						),
						'label' => esc_html__('Title Bar Background', 'pintu'),
						'desc'  => esc_html__('Select image to change the title bar background in current page.', 'pintu'),
					),
				),
			) ,
			'page_footer_setting' => array(
				'title' => esc_html__('Footer', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'footer_layout' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Footer Layout', 'pintu'),
						'desc'  => esc_html__('Select a footer layout in current page', 'pintu'),
						'choices' => array(
							'default' => esc_html__('Default', 'pintu'),
							'1' => esc_html__('Footer 1', 'pintu'),
							'2' => esc_html__('Footer 2', 'pintu')
						)
					),
					'page_footer_space' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Footer Space', 'pintu'),
						'desc' => esc_html__('Turn on to disable space between footer and content in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'footer_fixed' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Fixed', 'pintu'),
						'desc' => esc_html__('Turn on to disable footer fixed in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'footer_fullwidth' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Full Width (100%)', 'pintu'),
						'desc' => esc_html__('Turn on to disable footer full width (100%) in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
					'footer_top' => array(
						'type' => 'switch',
						'label' => esc_html__('Disable Footer Top', 'pintu'),
						'desc' => esc_html__('Turn on to disable footer top in current page.', 'pintu'),
						'value' => '',
						'left-choice' => array(
							'value' => '',
							'label' => esc_html__('Off', 'pintu'),
						),
						'right-choice' => array(
							'value' => '1',
							'label' => esc_html__('On', 'pintu'),
						),
					),
				),
			),
		),
	),
	
);