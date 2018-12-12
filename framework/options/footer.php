<?php
// Footer
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Footer', 'pintu' ),
	'id'               => 'bt_footer',
	'icon'             => 'el el-website',
	'fields'           => array(
		array(
			'id'       => 'footer_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Footer Layout', 'pintu' ),
			'subtitle' => esc_html__( 'Select a footer layout default. Foreach pages, you can change the layout by page option', 'pintu' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Footer layout 1',
					'img' => get_template_directory_uri() . '/assets/images/footers/footer-v1.jpg'
				),
				'2' => array(
					'alt' => 'Footer layout 2',
					'img' => get_template_directory_uri() . '/assets/images/footers/footer-v2.jpg'
				)
			),
			'default'  => '-1'
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Footer Style 01', 'pintu' ),
	'id'               => 'bt_footer_style1',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'footer_layout_1',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'pintu' ),
			'subtitle' => esc_html__( 'This is the options you can change for footer style 01', 'pintu' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Footer layout 1',
					'img' => get_template_directory_uri() . '/assets/images/footers/footer-v1.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'f1_fixed',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Fixed', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer fixed.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'f1_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'f1_footer_margin_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'right'    => false,
			'bottom'   => false,
			'left'     => false,
			'title'    => esc_html__( 'Footer Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top margin the footer.', 'pintu' ),
			'default'  => array(
				'margin-top' => '60px'
			),
			'output'    => array('.bt-footer-v1')
		),
		
		array(
			'id'    => 'f1_footer_top_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Footer Top Settings', 'pintu' ),
			'desc'  => esc_html__( 'This is the options you can change for footer top.', 'pintu' )
		),
		array(
			'id'       => 'f1_footer_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Top', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer top.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'            => 'f1_footer_top_columns',
			'type'          => 'slider',
			'title'         => esc_html__( 'Footer Top Columns', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the columns number of the footer top.', 'pintu' ),
			'default'       => 4,
			'min'           => 1,
			'step'          => 1,
			'max'           => 4,
			'display_value' => 'label',
			'required' 		=> array('f1_footer_top' , '=', '1'),
		),
		array(
			'id'       => 'f1_footer_top_col_1',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 1', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 1.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array('f1_footer_top' , '=', '1'),
		),
		array(
			'id'       => 'f1_footer_top_col_2',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 2', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 2.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array(
				array('f1_footer_top' , '=', '1'),
				array('f1_footer_top_columns' , '>', '1')
			),
		),
		array(
			'id'       => 'f1_footer_top_col_3',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 3', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 2.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array(
				array('f1_footer_top' , '=', '1'),
				array('f1_footer_top_columns' , '>', '2')
			),
		),
		array(
			'id'       => 'f1_footer_top_col_4',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 4', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 4.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array(
				array('f1_footer_top' , '=', '1'),
				array('f1_footer_top_columns' , '>', '3')
			),
		),
		array(
			'id'       => 'f1_footer_top_columns_class',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Top Columns Class', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer top columns class.', 'pintu' ),
			'default'  => false,
			'required' 		=> array('f1_footer_top' , '=', '1'),
		),
		array(
			'id'       => 'f1_footer_top_col_1_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 1 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 1', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f1_footer_top' , '=', '1'),
				array('f1_footer_top_columns_class' , '=', '1')
			),
		),
		array(
			'id'       => 'f1_footer_top_col_2_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 2 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 2', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f1_footer_top' , '=', '1'),
				array('f1_footer_top_columns_class' , '=', '1'),
				array('f1_footer_top_columns' , '>', '1')
			),
		),
		array(
			'id'       => 'f1_footer_top_col_3_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 3 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 3', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f1_footer_top' , '=', '1'),
				array('f1_footer_top_columns_class' , '=', '1'),
				array('f1_footer_top_columns' , '>', '2')
			),
		),
		array(
			'id'       => 'f1_footer_top_col_4_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 4 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 4', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f1_footer_top' , '=', '1'),
				array('f1_footer_top_columns_class' , '=', '1'),
				array('f1_footer_top_columns' , '>', '3')
			),
		),
		array(
			'id'       => 'f1_footer_top_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Footer Top Background', 'pintu' ),
			'subtitle' => esc_html__( 'Control the background of the footer top.', 'pintu' ),
			'default'  => array(
				'background-color' => '#1a1a1a',
			),
			'required' 		=> array('f1_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v1 .bt-footer-top'),
		),
		array(
			'id'       => 'f1_footer_top_overlay',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Footer Top Overlay Color', 'pintu' ),
			'subtitle' => esc_html__( 'Control the overlay color of the footer top.', 'pintu' ),
			'default'  => array(
				'color' => '',
				'alpha' => '1'
			),
			'mode'     => 'background',
			'required' 		=> array('f1_footer_top' , '=', '1'),
			'output'   => array( '.bt-footer-v1 .bt-footer-top .bt-overlay' ),
		),
		array(
			'id'       => 'f1_footer_top_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Footer Top Padding Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the footer top.', 'pintu' ),
			'default'  => array(
				'padding-top'    => '90px',
				'padding-right'  => '0px',
				'padding-bottom' => '60px',
				'padding-left' 	=> '0px'
			),
			'required' 		=> array('f1_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v1 .bt-footer-top')
		),
		array(
			'id'       => 'f1_footer_top_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Footer Top Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography footer top.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#dcdcdc',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('f1_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v1 .bt-footer-top')
		),
		array(
			'id'       => 'f1_footer_top_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer Top Link Color', 'pintu' ),
			'subtitle' => esc_html__( 'Controls the link color of footer top.', 'pintu' ),
			'active'    => false,
			'default'  => array(
				'regular'  => '#ffffff',
				'hover'    => '#477ae2'
			),
			'required' 		=> array('f1_footer_top' , '=', '1'),
			'output'   => array('.bt-footer-v1 .bt-footer-top a')
		),
		array(
			'id'       => 'f1_footer_top_widget_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Footer Top Widget Titile Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography footer top widget title.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'default'  => array(
				'color'       => '#ffffff',
				'font-size'   => '20px',
				'line-height' => '30px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('f1_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v1 .bt-footer-top .wg-title')
		),
		
		array(
			'id'    => 'f1_footer_bottom_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Footer Bottom Settings', 'pintu' ),
			'desc'  => esc_html__( 'This is the options you can change for footer bottom.', 'pintu' )
		),
		array(
			'id'            => 'f1_footer_bottom_columns',
			'type'          => 'slider',
			'title'         => esc_html__( 'Footer Bottom Columns', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the columns number of the footer bottom.', 'pintu' ),
			'default'       => 2,
			'min'           => 1,
			'step'          => 1,
			'max'           => 2,
			'display_value' => 'label'
		),
		array(
			'id'       => 'f1_footer_bottom_col_1',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Bottom Content Column 1', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer bottom column 1.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => ''
		),
		array(
			'id'       => 'f1_footer_bottom_col_2',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Bottom Content Column 2', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer bottom column 2.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array('f1_footer_bottom_columns' , '>', '1')
		),
		array(
			'id'       => 'f1_footer_bottom_columns_class',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Bottom Columns Class', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer bottom columns class.', 'pintu' ),
			'default'  => false,
			'required' 		=> array('footer_layout' , '=', '1')
		),
		array(
			'id'       => 'f1_footer_bottom_col_1_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Bottom Column 1 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer bottom column 1', 'pintu'),
			'default'  => 'col-md-6',
			'required' 		=> array('f1_footer_bottom_columns_class' , '=', '1')
		),
		array(
			'id'       => 'f1_footer_bottom_col_2_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Bottom Column 2 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer bottom column 2', 'pintu'),
			'default'  => 'col-md-6',
			'required' 		=> array(
				array('f1_footer_bottom_columns_class' , '=', '1'),
				array('f1_footer_bottom_columns' , '>', '1')
			),
		),
		array(
			'id'       => 'f1_footer_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Footer Bottom Background', 'pintu' ),
			'subtitle' => esc_html__( 'Control the background of the footer bottom.', 'pintu' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#121212',
			),
			'output'    => array('.bt-footer-v1 .bt-footer-bottom'),
		),
		array(
			'id'       => 'f1_footer_bottom_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Footer Bottom Padding Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the footer bottom.', 'pintu' ),
			'default'  => array(
				'padding-top'    => '10px',
				'padding-right'  => '0px',
				'padding-bottom' => '10px',
				'padding-left' 	=> '0px'
			),
			'output'    => array('.bt-footer-v1 .bt-footer-bottom')
		),
		array(
			'id'       => 'f1_footer_bottom_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Footer Bottom Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography footer bottom.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#dcdcdc',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'output'    => array('.bt-footer-v1 .bt-footer-bottom')
		),
		array(
			'id'       => 'f1_footer_bottom_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer Bottom Link Color', 'pintu' ),
			'subtitle' => esc_html__( 'Controls the link color of footer bottom.', 'pintu' ),
			'active'    => false,
			'default'  => array(
				'regular' => '#ffffff',
				'hover'   => '#477ae2',
			),
			'output'   => array('.bt-footer-v1 .bt-footer-bottom a')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Footer Style 02', 'pintu' ),
	'id'               => 'bt_footer_style2',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'footer_layout_2',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Layout Selected', 'pintu' ),
			'subtitle' => esc_html__( 'This is the options you can change for footer style 02', 'pintu' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Footer layout 2',
					'img' => get_template_directory_uri() . '/assets/images/footers/footer-v2.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'f2_fixed',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Fixed', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer fixed.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'f2_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to have the header area display at 100% width according to the window size. Turn off to follow site width.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'f2_footer_margin_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'right'    => false,
			'bottom'   => false,
			'left'     => false,
			'title'    => esc_html__( 'Footer Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top margin the footer.', 'pintu' ),
			'default'  => array(
				'margin-top' => '60px'
			),
			'output'    => array('.bt-footer-v2')
		),
		
		array(
			'id'    => 'f2_footer_top_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Footer Top Settings', 'pintu' ),
			'desc'  => esc_html__( 'This is the options you can change for footer top.', 'pintu' )
		),
		array(
			'id'       => 'f2_footer_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Top', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer top.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'            => 'f2_footer_top_columns',
			'type'          => 'slider',
			'title'         => esc_html__( 'Footer Top Columns', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the columns number of the footer top.', 'pintu' ),
			'default'       => 4,
			'min'           => 1,
			'step'          => 1,
			'max'           => 4,
			'display_value' => 'label',
			'required' 		=> array('f2_footer_top' , '=', '1'),
		),
		array(
			'id'       => 'f2_footer_top_col_1',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 1', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 1.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array('f2_footer_top' , '=', '1'),
		),
		array(
			'id'       => 'f2_footer_top_col_2',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 2', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 2.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array(
				array('f2_footer_top' , '=', '1'),
				array('f2_footer_top_columns' , '>', '1')
			),
		),
		array(
			'id'       => 'f2_footer_top_col_3',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 3', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 2.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array(
				array('f2_footer_top' , '=', '1'),
				array('f2_footer_top_columns' , '>', '2')
			),
		),
		array(
			'id'       => 'f2_footer_top_col_4',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Top Content Column 4', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer top column 4.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array(
				array('f2_footer_top' , '=', '1'),
				array('f2_footer_top_columns' , '>', '3')
			),
		),
		array(
			'id'       => 'f2_footer_top_columns_class',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Top Columns Class', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer top columns class.', 'pintu' ),
			'default'  => false,
			'required' 		=> array('f2_footer_top' , '=', '1'),
		),
		array(
			'id'       => 'f2_footer_top_col_1_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 1 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 1', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f2_footer_top' , '=', '1'),
				array('f2_footer_top_columns_class' , '=', '1')
			),
		),
		array(
			'id'       => 'f2_footer_top_col_2_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 2 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 2', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f2_footer_top' , '=', '1'),
				array('f2_footer_top_columns_class' , '=', '1'),
				array('f2_footer_top_columns' , '>', '1')
			),
		),
		array(
			'id'       => 'f2_footer_top_col_3_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 3 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 3', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f2_footer_top' , '=', '1'),
				array('f2_footer_top_columns_class' , '=', '1'),
				array('f2_footer_top_columns' , '>', '2')
			),
		),
		array(
			'id'       => 'f2_footer_top_col_4_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Top Column 4 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer top column 4', 'pintu'),
			'default'  => 'col-sm-6 col-md-3',
			'required' 		=> array(
				array('f2_footer_top' , '=', '1'),
				array('f2_footer_top_columns_class' , '=', '1'),
				array('f2_footer_top_columns' , '>', '3')
			),
		),
		array(
			'id'       => 'f2_footer_top_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Footer Top Background', 'pintu' ),
			'subtitle' => esc_html__( 'Control the background of the footer top.', 'pintu' ),
			'default'  => array(
				'background-color' => '#1a1a1a',
			),
			'required' 		=> array('f2_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v2 .bt-footer-top'),
		),
		array(
			'id'       => 'f2_footer_top_overlay',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Footer Top Overlay Color', 'pintu' ),
			'subtitle' => esc_html__( 'Control the overlay color of the footer top.', 'pintu' ),
			'default'  => array(
				'color' => '',
				'alpha' => '1'
			),
			'mode'     => 'background',
			'required' 		=> array('f2_footer_top' , '=', '1'),
			'output'   => array( '.bt-footer-v2 .bt-footer-top .bt-overlay' ),
		),
		array(
			'id'       => 'f2_footer_top_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Footer Top Padding Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the footer top.', 'pintu' ),
			'default'  => array(
				'padding-top'    => '30px',
				'padding-right'  => '0px',
				'padding-bottom' => '30px',
				'padding-left' 	=> '0px'
			),
			'required' 		=> array('f2_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v2 .bt-footer-top')
		),
		array(
			'id'       => 'f2_footer_top_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Footer Top Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography footer top.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#dcdcdc',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('f2_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v2 .bt-footer-top')
		),
		array(
			'id'       => 'f2_footer_top_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer Top Link Color', 'pintu' ),
			'subtitle' => esc_html__( 'Controls the link color of footer top.', 'pintu' ),
			'active'    => false,
			'default'  => array(
				'regular' => '#ffffff',
				'hover'   => '#477ae2',
			),
			'required' 		=> array('f2_footer_top' , '=', '1'),
			'output'   => array('.bt-footer-v2 .bt-footer-top a')
		),
		array(
			'id'       => 'f2_footer_top_widget_titile_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Footer Top Widget Titile Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography footer top widget title.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'default'  => array(
				'color'       => '#ffffff',
				'font-size'   => '20px',
				'line-height' => '30px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('f2_footer_top' , '=', '1'),
			'output'    => array('.bt-footer-v2 .bt-footer-top .wg-title')
		),
		
		array(
			'id'    => 'f2_footer_bottom_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Footer Bottom Settings', 'pintu' ),
			'desc'  => esc_html__( 'This is the options you can change for footer bottom.', 'pintu' )
		),
		array(
			'id'            => 'f2_footer_bottom_columns',
			'type'          => 'slider',
			'title'         => esc_html__( 'Footer Bottom Columns', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the columns number of the footer bottom.', 'pintu' ),
			'default'       => 2,
			'min'           => 1,
			'step'          => 1,
			'max'           => 2,
			'display_value' => 'label'
		),
		array(
			'id'       => 'f2_footer_bottom_col_1',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Bottom Content Column 1', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer bottom column 1.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => ''
		),
		array(
			'id'       => 'f2_footer_bottom_col_2',
			'type'     => 'select',
			'multi'    => true,
			'title'    => esc_html__('Footer Bottom Content Column 2', 'pintu'), 
			'subtitle' => esc_html__('Controls the content that displays in the footer bottom column 2.', 'pintu'),
			'options'  => pintu_get_sidebars(),
			'default'  => '',
			'required' 		=> array('f2_footer_bottom_columns' , '>', '1')
		),
		array(
			'id'       => 'f2_footer_bottom_columns_class',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Footer Bottom Columns Class', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable footer bottom columns class.', 'pintu' ),
			'default'  => false,
			'required' 		=> array('footer_layout' , '=', '1')
		),
		array(
			'id'       => 'f2_footer_bottom_col_1_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Bottom Column 1 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer bottom column 1', 'pintu'),
			'default'  => 'col-md-6',
			'required' 		=> array('f2_footer_bottom_columns_class' , '=', '1')
		),
		array(
			'id'       => 'f2_footer_bottom_col_2_class',
			'type'     => 'text',
			'title'    => esc_html__('Footer Bottom Column 2 Class', 'pintu'),
			'subtitle' => esc_html__('Controls the column width with bootstrap class and extra class of footer bottom column 2', 'pintu'),
			'default'  => 'col-md-6',
			'required' 		=> array(
				array('f2_footer_bottom_columns_class' , '=', '1'),
				array('f2_footer_bottom_columns' , '>', '1')
			),
		),
		array(
			'id'       => 'f2_footer_bottom_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Footer Bottom Background', 'pintu' ),
			'subtitle' => esc_html__( 'Control the background of the footer bottom.', 'pintu' ),
			'background-repeat' => false,
			'background-attachment' => false,
			'background-position' => false,
			'background-image' => false,
			'background-size' => false,
			'preview' => false,
			'default'  => array(
				'background-color' => '#121212',
			),
			'output'    => array('.bt-footer-v2 .bt-footer-bottom'),
		),
		array(
			'id'       => 'f2_footer_bottom_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'title'    => esc_html__( 'Footer Bottom Padding Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the footer bottom.', 'pintu' ),
			'default'  => array(
				'padding-top'    => '30px',
				'padding-right'  => '0px',
				'padding-bottom' => '30px',
				'padding-left' 	=> '0px'
			),
			'output'    => array('.bt-footer-v2 .bt-footer-bottom')
		),
		array(
			'id'       => 'f2_footer_bottom_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Footer Bottom Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography footer bottom.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#dcdcdc',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'output'    => array('.bt-footer-v2 .bt-footer-bottom')
		),
		array(
			'id'       => 'f2_footer_bottom_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Footer Bottom Link Color', 'pintu' ),
			'subtitle' => esc_html__( 'Controls the link color of footer bottom.', 'pintu' ),
			'active'    => false,
			'default'  => array(
				'regular' => '#ffffff',
				'hover'   => '#477ae2',
			),
			'output'   => array('.bt-footer-v2 .bt-footer-bottom a')
		),
		
	)
) );
