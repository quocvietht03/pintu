<?php
$manifest = array();

$manifest['id']                  = 'pintu';
$manifest['skin']                = 'main';
$manifest['name']                = esc_html__( 'Bearsthemes', 'pintu' );
$manifest['uri']                 = 'http://bearsthemespremium.com/theme/pintu/';
$manifest['description']         = esc_html__( 'WordPress Theme', 'pintu' );
$manifest['version']             = '1.0.0';
$manifest['author']              = 'Bearsthemes';
$manifest['author_uri']          = 'http://bearsthemes.com/';
$manifest['requirements']        = array(
	'wordpress' => array(
		'min_version' => '4.0',
		/*'max_version' => '100.0.0'*/
	),
	/*'framework'  => array(
		'min_version' => '0.0.0',
		'max_version' => '100.0.0'
	),*/
	/*'extensions' => array(
		'extension_name' => array(
			'min_version' => '0.0.0',
			'max_version' => '100.0.0'
		)
	)*/
);
$manifest['server_requirements'] = array(
	'server' => array(
		'wp_memory_limit'          => '256M', // use M for MB, G for GB
		'php_version'              => '5.2.4',
		'post_max_size'            => '8M',
		'php_time_limit'           => '1500',
		'php_max_input_vars'       => '4000',
		'suhosin_post_max_vars'    => '3000',
		'suhosin_request_max_vars' => '3000',
		'mysql_version'            => '5.0',
		'max_upload_size'          => '8M',
	),
);


$manifest['supported_extensions'] = array(
	'sidebars'     => array(),
	'portfolio'    => array(),
	'backups'      => array(),
	'megamenu'     => array(),
	//'social'       => array(),
	//'breadcrumbs'  => array(),
	// 'page-builder' => array(),
	// 'seo'          => array(),
	// 'forms'        => array(),
	// 'mailer'       => array(),
	// 'slider'       => array(),
	// 'events'       => array(),
	// 'analytics'    => array(),
	// 'wp-shortcodes' => array(),
);
