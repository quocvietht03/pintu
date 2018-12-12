<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.3
 */

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<article <?php post_class(); ?>>
	<div class="thumb">
		<?php
			do_action('woocommerce_template_loop_product_link_open');
			do_action('woocommerce_show_product_loop_sale_flash');
			do_action('woocommerce_template_loop_product_thumbnail');
			do_action('woocommerce_template_loop_product_link_close');
		?>
		<div class="overlay">
			<div class="inner">
				<?php
					do_action('woocommerce_template_loop_add_to_cart');
				?>
			</div>
		</div>
	</div>
	<div class="content">
		<?php
			do_action('woocommerce_template_loop_product_link_open');
			do_action('woocommerce_template_loop_product_title');
			do_action('woocommerce_template_loop_product_link_close');
			do_action('woocommerce_template_loop_price');
			do_action('woocommerce_template_loop_rating');
			do_action('woocommerce_template_single_excerpt');
		?>
	</div>
</article>
