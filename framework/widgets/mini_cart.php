<?php

class pintu_Widget_Mini_Cart extends WC_Widget {
	
	function __construct() {
		$this->widget_cssclass    = 'woocommerce pintu_widget_mini_cart';
		$this->widget_description = esc_html__( "Display the user's Cart in the sidebar.", 'pintu' );
		$this->widget_id          = 'pintu_widget_mini_cart';
		$this->widget_name        = esc_html__( 'Mini Cart', 'pintu' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Cart', 'pintu' ),
				'label' => esc_html__( 'Title', 'pintu' )
			),
			'hide_if_empty' => array(
				'type'  => 'checkbox',
				'std'   => 0,
				'label' => esc_html__( 'Hide if cart is empty', 'pintu' )
			)
		);

		parent::__construct();
	}
	
	function widget( $args, $instance ) {
		$wg_class = 'widget bt-mini-cart';
		$hide_if_empty = empty( $instance['hide_if_empty'] ) ? 0 : 1;
		if ( $hide_if_empty ) {
			$wg_class .= ' hide_cart_widget_if_empty';
		}
		
		echo '<div class="'.esc_attr($wg_class).'">'
		
				.'<a class="bt-toggle-btn" title="'.esc_attr($instance['title']).'" href="#"><i class="fa fa-shopping-basket"></i><span class="cart_total" ></span></a>'
				
				.'<div class="bt-cart-content"><h3 class="bt-title">'.__('My Shopping Cart', 'pintu').'</h3><div class="widget_shopping_cart_content"></div></div>'
				
			.'</div>';
		
	}
}
add_filter('add_to_cart_fragments', 'woocommerce_icon_add_to_cart_fragment');
if(!function_exists('woocommerce_icon_add_to_cart_fragment')){
	function woocommerce_icon_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>
		<span class="cart_total"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
		<?php
		$fragments['span.cart_total'] = ob_get_clean();
		return $fragments;
	}
}

/**
 * Class pintu_Widget_Mini_Cart
 */
function register_pintu_widget_mini_cart() {
    register_widget('pintu_Widget_Mini_Cart');
}
add_action('widgets_init', 'register_pintu_widget_mini_cart');
