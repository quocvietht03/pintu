<?php

$cfg = array();

/**
 * Config example
 */

$cfg['sidebar_positions'] = array(
	'full' => array(
		'icon_url' => 'full.png',
		'sidebars_number' => 0
	),
	'left' => array(
		'icon_url' => 'left.png',
		'sidebars_number' => 1
	),
	'right' => array(
		'icon_url' => 'right.png',
		'sidebars_number' => 1
	),
	'left_right' => array(
		'icon_url' => 'left_right.png',
		'sidebars_number' => 2
	),
);

$cfg['dynamic_sidebar_args'] = array(
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="wg-title">',
	'after_title'   => '</h4>',
);

/**
 * Render sidebar metabox in post types.
 */
$cfg['show_in_post_types'] = false;
