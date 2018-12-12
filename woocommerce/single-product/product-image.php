<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		$custom_script = "jQuery(document).ready(function($) {
								$('.woocommerce-product-zoom__image').zoom();
							});";
							
		wp_add_inline_script( 'pintu-main', $custom_script );
		wp_enqueue_script('zoom-master');

		$attachment_ids = $product->get_gallery_image_ids();

		if ( sizeof($attachment_ids) > 1 && has_post_thumbnail() ) {
			$custom_script = "jQuery(document).ready(function($) {
								$('.woocommerce-product-gallery-carousel').slick({
									slidesToShow: 1,
									slidesToScroll: 1,
									fade: true,
									asNavFor: '.woocommerce-product-gallery-carousel-nav',
									prevArrow: '<button type=\"button\" class=\"slick-prev\"><i class=\"fa fa-angle-left\"></i></button>',
									nextArrow: '<button type=\"button\" class=\"slick-next\"><i class=\"fa fa-angle-right\"></i></button>'
								});
								$('.woocommerce-product-gallery-carousel-nav').slick({
									slidesToShow: 6,
									slidesToScroll: 1,
									arrows: false,
									focusOnSelect: true,
									asNavFor: '.woocommerce-product-gallery-carousel'
								});
							});";
			
			wp_add_inline_script( 'pintu-main', $custom_script );
			wp_enqueue_script('slick-slider');
			wp_enqueue_style('slick-slider');

			?>
			<div class="woocommerce-product-gallery-carousel">
				<?php
					foreach ( $attachment_ids as $attachment_id ) {
						$full_size_image = wp_get_attachment_image_src( $attachment_id, 'full' );
						$thumbnail       = wp_get_attachment_image_src( $attachment_id, 'shop_thumbnail' );
						$attributes      = array(
							'title'                   => get_post_field( 'post_title', $attachment_id ),
							'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
							'data-src'                => $full_size_image[0],
							'data-large_image'        => $full_size_image[0],
							'data-large_image_width'  => $full_size_image[1],
							'data-large_image_height' => $full_size_image[2],
						);

						$html  = '<div data-thumb="' . esc_url( $thumbnail[0] ) . '" class="woocommerce-product-gallery__image woocommerce-product-zoom__image">';
						$html .= wp_get_attachment_image( $attachment_id, 'shop_single', false, $attributes );
						$html .= '</div>';

						echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id );
					}
				?>
			</div>

			<div class="woocommerce-product-gallery-carousel-nav">
				<?php do_action( 'woocommerce_product_thumbnails' ); ?>
			</div>
			<?php
		} else {

			$attributes = array(
				'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
				'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
				'data-src'                => $full_size_image[0],
				'data-large_image'        => $full_size_image[0],
				'data-large_image_width'  => $full_size_image[1],
				'data-large_image_height' => $full_size_image[2],
			);

			if ( has_post_thumbnail() ) {
				$html  = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image woocommerce-product-zoom__image">';
				$html .= get_the_post_thumbnail( $post->ID, 'shop_single', $attributes );
				$html .= '</div>';
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'pintu' ) );
				$html .= '</div>';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );

		}
		?>
	</figure>
</div>
