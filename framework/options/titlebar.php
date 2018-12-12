<?php
// Title Bar
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Title Bar', 'pintu' ),
	'id'               => 'bt_titlebar',
	'icon'             => 'el el-map-marker',
	'fields'           => array(
		array(
			'id'       => 'titlebar_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Title Bar Layout', 'pintu' ),
			'subtitle' => esc_html__( 'Select a title bar layout default. Foreach pages, you can change the layout by page option', 'pintu' ),
			'options'  => array(
				'1' => array(
					'alt' => 'Title Bar layout 1',
					'img' => get_template_directory_uri() . '/assets/images/titlebars/titlebar-v1.jpg'
				),
				'2' => array(
					'alt' => 'Title Bar layout 2',
					'img' => get_template_directory_uri() . '/assets/images/titlebars/titlebar-v2.jpg'
				)
			),
			'default'  => '1'
		),
		array(
			'id'       => 'titlebar_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to have the content area display at 100% width according to the window size. Turn off to follow site width.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'titlebar_fullwidth_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Full Width Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the left/right padding the content area display.', 'pintu' ),
			'default'  => array(
				'padding-left'    => '15px',
				'padding-right' => '15px'
			),
			'required' 		=> array('titlebar_fullwidth' , '=', '1'),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-subheader-inner')
		),
		array(
			'id'       => 'titlebar_align',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Title Bar Align', 'pintu' ),
			'subtitle' => esc_html__( 'Control align of the title bar.', 'pintu' ),
			'options'  => array(
				'text-left' => 'Left',
				'text-center' => 'Center',
				'text-right' => 'Right'
			),
			'default'  => 'text-center',
			'required' 		=> array('titlebar_layout' , '=', '1')
		),
		array(
			'id'       => 'titlebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Title Bar Background', 'pintu' ),
			'subtitle' => esc_html__( 'Control the background of the title bar.', 'pintu' ),
			'default'  => array(
				'background-color' => '#171721',
			),
			'output'    => array('.bt-titlebar .bt-titlebar-inner'),
		),
		array(
			'id'       => 'titlebar_overlay',
			'type'     => 'color_rgba',
			'title'    => esc_html__( 'Title Bar Overlay Color', 'pintu' ),
			'subtitle' => esc_html__( 'Control the overlay color of the title bar.', 'pintu' ),
			'default'  => array(
				'color' => '',
				'alpha' => '1'
			),
			'mode'     => 'background',
			'output'   => array( '.bt-titlebar .bt-titlebar-inner .bt-overlay' ),
		),
		array(
			'id'       => 'titlebar_padding_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Title Bar Padding Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the title bar.', 'pintu' ),
			'default'  => array(
				'padding-top'    => '45px',
				'padding-bottom' => '45px'
			),
			'output'    => array('.bt-titlebar .bt-titlebar-inner')
		),
		array(
			'id'       => 'titlebar_margin_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'	   => false,
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Title Bar Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the bottom margin the title bar.', 'pintu' ),
			'default'  => array(
				'padding-bottom' => '90px'
			),
			'output'    => array('.bt-titlebar')
		),
	)
) );
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Page Title', 'pintu' ),
	'id'               => 'bt_titlebar_pagetitle',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'titlebar_page_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Page Title Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography page title.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'default'  => array(
				'color'       => '#FFFFFF',
				'font-size'   => '30px',
				'font-family' => 'Poppins',
				'font-weight' => '700',
				'line-height' => '36px',
				'letter-spacing' => '0'
			),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-page-title h2')
		),
		array(
			'id'       => 'titlebar_page_title_margin_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Page Title Padding Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the page title.', 'pintu' ),
			'default'  => array(
				'padding-top'    => '5px',
				'padding-bottom' => '5px'
			),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-page-title')
		),
		array(
			'id'       => 'titlebar_page_title_before',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Page Title Before', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable page title before content.', 'pintu' ),
			'default'  => false,
		),
		array(
			'id'=>'titlebar_page_title_before_content',
			'type' => 'textarea',
			'title' => esc_html__('Page Title Before Content', 'pintu'), 
			'subtitle' => esc_html__('Please enter custom text before page title(Alow some html tags: br, em, strong, span)', 'pintu'),
			'validate' => 'html_custom',
			'default' => '',
			'allowed_html' => array(
				'span' => array(
					'class' => array(),
					'style' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			),
			'required' 		=> array('titlebar_page_title_before' , '=', '1')
		),
		array(
			'id'       => 'titlebar_page_title_before_content_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Page Title Before Content Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography page title before content.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#FFFFFF',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('titlebar_page_title_before' , '=', '1'),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-page-title .bt-before')
		),
		array(
			'id'       => 'titlebar_page_title_after',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Page Title After', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable page title after content.', 'pintu' ),
			'default'  => false,
		),
		array(
			'id'=>'titlebar_page_title_after_content',
			'type' => 'textarea',
			'title' => esc_html__('Page Title After Content', 'pintu'), 
			'subtitle' => esc_html__('Please enter custom text after page title(Alow some html tags: br, em, strong, span)', 'pintu'),
			'validate' => 'html_custom',
			'default' => '',
			'allowed_html' => array(
				'span' => array(
					'class' => array(),
					'style' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			),
			'required' 		=> array('titlebar_page_title_after' , '=', '1')
		),
		array(
			'id'       => 'titlebar_page_title_after_content_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Page Title After Content Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography page title after content.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#FFFFFF',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('titlebar_page_title_after' , '=', '1'),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-page-title .bt-after')
		),
	)
) );
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Breadcrumb', 'pintu' ),
	'id'               => 'bt_titlebar_breadcrumb',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'titlebar_breadcrumb_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Breadcrumb Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography breadcrumb.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'default'  => array(
				'color'       => '#FFFFFF',
				'font-size'   => '14px',
				'font-family' => 'Poppins',
				'font-weight' => '400',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-breadcrumb .bt-path')
		),
		array(
			'id'       => 'titlebar_breadcrumb_home_text',
			'type'     => 'text',
			'title'    => esc_html__('Breadcrumb Home Text', 'pintu'),
			'subtitle' => esc_html__('Controls the home text of breadcrumb(Alow some html tags: br, em, strong, span)', 'pintu'),
			'allowed_html' => array(
				'span' => array(
					'class' => array(),
					'style' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			),
			'default'  => 'Home'
		),
		array(
			'id'       => 'titlebar_breadcrumb_delimiter',
			'type'     => 'text',
			'title'    => esc_html__('Breadcrumb Delimiter', 'pintu'),
			'subtitle' => esc_html__('Controls the delimiter of breadcrumb(Alow some html tags: br, em, strong, span)', 'pintu'),
			'allowed_html' => array(
				'span' => array(
					'class' => array(),
					'style' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			),
			'default'  => '-'
		),
		array(
			'id'       => 'titlebar_breadcrumb_margin_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'    => false,
			'left'     => false,
			'title'    => esc_html__( 'Breadcrumb Padding Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the breadcrumb.', 'pintu' ),
			'default'  => array(
				'padding-top'    => '5px',
				'padding-bottom' => '5px'
			),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-breadcrumb')
		),
		array(
			'id'       => 'titlebar_breadcrumb_before',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Breacrumb Before', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable breadcrumb before content.', 'pintu' ),
			'default'  => false,
		),
		array(
			'id'=>'titlebar_breadcrumb_before_content',
			'type' => 'textarea',
			'title' => esc_html__('Breadcrumb Before Content', 'pintu'), 
			'subtitle' => esc_html__('Please enter custom text before breadcrumb(Alow some html tags: br, em, strong, span)', 'pintu'),
			'validate' => 'html_custom',
			'default' => '',
			'allowed_html' => array(
				'span' => array(
					'class' => array(),
					'style' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			),
			'required' 		=> array('titlebar_breadcrumb_before' , '=', '1')
		),
		array(
			'id'       => 'titlebar_breadcrumb_before_content_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Breadcrumb Before Content Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography breadcrumb before content.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#FFFFFF',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('titlebar_breadcrumb_before' , '=', '1'),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-breadcrumb .bt-before')
		),
		array(
			'id'       => 'titlebar_breadcrumb_after',
			'type'     => 'switch',
			'title'    => esc_html__( 'Enable Breadcrumb After', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to enable breadcrumb after content.', 'pintu' ),
			'default'  => false,
		),
		array(
			'id'=>'titlebar_breadcrumb_after_content',
			'type' => 'textarea',
			'title' => esc_html__('Breadcrumb After Content', 'pintu'), 
			'subtitle' => esc_html__('Please enter custom text after breadcrumb(Alow some html tags: br, em, strong, span)', 'pintu'),
			'validate' => 'html_custom',
			'default' => '',
			'allowed_html' => array(
				'span' => array(
					'class' => array(),
					'style' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array()
			),
			'required' 		=> array('titlebar_breadcrumb_after' , '=', '1')
		),
		array(
			'id'       => 'titlebar_breadcrumb_after_content_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Breadcrumb After Content Font', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography breadcrumb after content.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'default'  => array(
				'color'       => '#FFFFFF',
				'font-size'   => '14px',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('titlebar_breadcrumb_after' , '=', '1'),
			'output'    => array('.bt-titlebar .bt-titlebar-inner .bt-breadcrumb .bt-after')
		),
	)
) );
