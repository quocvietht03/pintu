<?php
class pintu_Icon_Info_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'icon_info_widget', // Base ID
                esc_html__('Icon Info', 'pintu'), // Name
                array('description' => esc_html__('Icon Info Widget', 'pintu'),) // Args
        );
    }
    function widget($args, $instance) {
        extract($args);
		$cl_class = !empty($instance['cl_class']) ? $instance['cl_class'] : "";
        $font_icon = !empty($instance['font_icon']) ? esc_attr($instance['font_icon']) : '';
        $meta_info = !empty($instance['meta_info']) ? esc_attr($instance['meta_info']) : '';
        
		// no 'class' attribute - add one with the value of width
        if (strpos($before_widget, 'class') === false) {
            $before_widget = str_replace('>', 'class="' . esc_attr($cl_class) . '"', $before_widget);
        }
        // there is 'class' attribute - append width value to it
        else {
            $before_widget = str_replace('class="', 'class="' . esc_attr($cl_class) . ' ', $before_widget);
        }
		
        ob_start();
        echo apply_filters('bt_before_widget_filter', $before_widget);
        ?>
       <div class="bt-icon-box">
			<div class="icon"><i class="<?php echo esc_attr($font_icon); ?>"></i></div>
			<div class="text"><?php echo html_entity_decode($meta_info); ?></div>
		</div>
        <?php
        echo apply_filters('bt_after_widget_filter', $after_widget);
        echo ob_get_clean();
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['font_icon'] = $new_instance['font_icon'];
        $instance['meta_info'] = $new_instance['meta_info'];
        $instance['cl_class'] = $new_instance['cl_class'];
        return $instance;
    }

    function form($instance) {
        $font_icon = isset($instance['font_icon']) ? esc_attr($instance['font_icon']) : '';
        $meta_info = isset($instance['meta_info']) ? esc_attr($instance['meta_info']) : '';
        $cl_class = isset($instance['cl_class']) ? esc_attr($instance['cl_class']) : '';
		?>
		<p>
			<label for="<?php echo esc_url($this->get_field_id('font_icon')); ?>"><?php _e('Icon:', 'pintu');
		 ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('font_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('font_icon')); ?>" type="text" value="<?php echo esc_attr($font_icon); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_url($this->get_field_id('meta_info')); ?>"><?php _e('Text:', 'pintu');
		 ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('meta_info')); ?>" name="<?php echo esc_attr($this->get_field_name('meta_info')); ?>"><?php echo esc_attr($meta_info); ?></textarea>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cl_class')); ?>"><?php _e('Extra Class:', 'pintu'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('cl_class')); ?>" name="<?php echo esc_attr($this->get_field_name('cl_class')); ?>" value="<?php echo esc_attr($cl_class); ?>" />
        </p>
        <?php
    }
}
/**
 * Class pintu_Social_Widget
 */
function pintu_register_icon_info_widget() {
    register_widget('pintu_Icon_Info_Widget');
}
add_action('widgets_init', 'pintu_register_icon_info_widget');
?>
