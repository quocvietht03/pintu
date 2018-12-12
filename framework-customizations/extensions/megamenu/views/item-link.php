<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var WP_Post $item
 * @var string $title
 * @var array $attributes
 * @var object $args
 * @var int $depth
 * @var FW_Extension_Megamenu $megamenu
 */

$megamenu = fw()->extensions->get( 'megamenu' );

$icon_class = '';
if ( $megamenu->show_icon() ) {
	if ( $icon = fw_mega_menu_get_meta( $item, 'icon' ) ) {
		$icon_class = '<i class="' . "$icon" . '"></i>';
	}
}

$badge_html = '';
if(isset($extra_options['badge']) && $extra_options['badge']['selected'] == 'yes') {
		$badge_text = $extra_options['badge']['yes']['badge_text'];
		$badge_bg_color = $extra_options['badge']['yes']['badge_background_color'];
		$badge_color = $extra_options['badge']['yes']['badge_color'];
		$badge_html = "<sup style='background-color: {$badge_bg_color}; color: {$badge_color}'>{$badge_text}</sup>";
}

// Make a menu WordPress way
$args_before = isset($args->before) ? $args->before :'';
$args_after = isset($args->after) ? $args->after :'';
$format = '%s<a %s>%s<span>%s</span>%s</a>%s';
echo sprintf($format, $args_before, fw_attr_to_html( $attributes ), $icon_class, $title, $badge_html, $args_after);
