<?php
// Colors
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Colors', 'pintu' ),
	'id'               => 'bt_colors',
	'icon'             => 'el el-tint',
	'fields'           => array(
		array(
			'id'       => 'main_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Main Color', 'pintu' ),
			'subtitle' => esc_html__( 'Control the main highlight color throughout the theme. Class apply: bt-main-color', 'pintu' ),
			'default'  => '#477ae2',
			'output'   => array('.bt-main-color')
		),
		array(
			'id'       => 'secondary_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Secondary Color', 'pintu' ),
			'subtitle' => esc_html__( 'Control the secondary highlight color throughout the theme. Class apply: bt-secondary-color', 'pintu' ),
			'default'  => '#39e1aa',
			'output'   => array('.bt-secondary-color')
		),
		array(
			'id'       => 'body_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Body Color', 'pintu' ),
			'subtitle' => esc_html__( 'Controls the color of all text body.', 'pintu' ),
			'active'    => false,
			'default'  => '#555555',
			'output'   => array('body')
		),
		array(
			'id'       => 'heading_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Heading Color', 'pintu' ),
			'subtitle' => esc_html__( 'Controls the color of all heading.', 'pintu' ),
			'active'    => false,
			'default'  => '#333333',
			'output'   => array('h1, h2, h3, h4, h5, h6')
		),
		array(
			'id'       => 'link_color',
			'type'     => 'link_color',
			'title'    => esc_html__( 'Link Color', 'pintu' ),
			'subtitle' => esc_html__( 'Controls the color of all text links.', 'pintu' ),
			'active'    => false,
			'default'  => array(
				'regular'  => '#555555',
				'hover'    => '#477ae2'
			),
			'output'   => array('a')
		),
		
	)
) );
