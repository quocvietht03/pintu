<?php
if ( ! class_exists( 'Pintu_Widget_Subtitle' ) ) :

class Pintu_Widget_Subtitle {

	/**
	 * PHP5 constructor that calls specific hooks within WordPress
	 */
	function __construct( ) {
		add_action( 'in_widget_form', array( $this, 'in_widget_form'), 10, 3 );
		add_filter( 'widget_update_callback', array( $this, 'widget_update_callback' ), 10, 4 );
		add_filter( 'dynamic_sidebar_params', array( $this, 'dynamic_sidebar_params' ) );
	}

	/**
     * Add a subtitle input field into the form
     */
	function in_widget_form( $widget, $return, $instance ) {

		$instance = wp_parse_args( (array) $instance, array( 'widget_subtitle' => '' ) );
		$return = null;
		?>

		<p>
			<label><?php esc_html_e( 'Subtitle:', 'pintu' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr($widget->get_field_id( 'widget_subtitle' )) ?>" name="<?php echo esc_attr($widget->get_field_name( 'widget_subtitle' )); ?>" type="text" value="<?php echo esc_attr( strip_tags( $instance['widget_subtitle'] ) ); ?>"/>
		</p>

	<?php
	}

	/**
     * Filter the widget’s settings before saving, return false to cancel saving (keep the old settings if updating).
     */
	function widget_update_callback( $instance, $new_instance, $old_instance, $widget ) {

		$instance['widget_subtitle'] = $new_instance['widget_subtitle'];
		return $instance;

	}

	/**
     * Gets called from within the dynamic_sidebar function which displays a widget container.
     * This filter gets called for each widget instance in the sidebar.
     */
	function dynamic_sidebar_params( $params ) {

		global $wp_registered_sidebars, $wp_registered_widgets;

		$widget_id = $params[0]['widget_id'];
		$widget = $wp_registered_widgets[$widget_id];

		// Get instance settings
		if ( array_key_exists( 'callback', $widget ) ) {

			$instance = get_option( $widget['callback'][0]->option_name );

			// Check if there's an instance of the widget
			if ( array_key_exists( $params[1]['number'], $instance ) ) {

				$instance = $instance[$params[1]['number']];

				// Add the subtitle
				if ( ! empty( $instance['widget_subtitle'] ) ) {

					// The 'after_title' tag wrapper
					$after_title_tag = $params[0]['after_title'];

					// Filters for both subtitle class and tag
					$subtitle_tag = apply_filters( 'widget_subtitle_tag', 'div' );
					$subtitle_class = apply_filters( 'widget_subtitle_class', array( 'bt-subtitle' ) );
					$subtitle_class = is_array( $subtitle_class ) ? ' class="' . implode( ' ', $subtitle_class ) . '"' : '';

					// Start the output
					$subtitle = '<' . $subtitle_tag . $subtitle_class . '>';
					$subtitle .= $instance['widget_subtitle'];
					$subtitle .= '</' . $subtitle_tag . '>';

					$output = $subtitle . $after_title_tag;
					$params[0]['after_title'] = apply_filters( 'widget_subtitle_position', $output, $after_title_tag, $subtitle );

				}
			}
		}
		return $params;
	}

}

endif;

$widget_subtitle = new Pintu_Widget_Subtitle();
