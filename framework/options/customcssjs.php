<?php
// Custom Css & Js
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Custom Css & Js', 'pintu' ),
	'id'               => 'bt_customcssjs',
	'icon'             => 'el el-css',
	'fields'		   => array(
		array(
			'id'       => 'custom_css_code',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'CSS Code', 'pintu' ),
			'subtitle' => esc_html__( 'Paste your custom CSS code here.', 'pintu' ),
			'mode'     => 'css',
			'theme'    => 'monokai',
			'default'  => ''
		),
		array(
			'id'       => 'custom_js_code',
			'type'     => 'ace_editor',
			'title'    => esc_html__( 'JS Code', 'pintu' ),
			'subtitle' => esc_html__( 'Paste your custom JS code here.', 'pintu' ),
			'mode'     => 'javascript',
			'theme'    => 'chrome',
			'default'  => ''
		),
	)
) );
