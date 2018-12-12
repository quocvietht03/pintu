<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version   3.3.3
 */
global $pintu_options;
$fullwidth = isset($pintu_options['product_fullwidth'])&&$pintu_options['product_fullwidth'] ? 'fullwidth': 'container';
$sidebar_width = (int) isset($pintu_options['product_sidebar_width']) ?  $pintu_options['product_sidebar_width']: 3;
$sidebar_width_md = $sidebar_width + 1;

$sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'full';

$sidebar_class = 'col-md-'.$sidebar_width_md.' col-lg-'.$sidebar_width;
if($sidebar_position == 'left' || $sidebar_position == 'right'){
	$content_class = 'col-md-'.(12 - $sidebar_width_md).' col-lg-'.(12 - $sidebar_width);
}elseif($sidebar_position == 'left_right'){
	$content_width = 12 - 2*$sidebar_width;
	$content_class = 'col-md-'.(12 - 2*$sidebar_width_md).' col-lg-'.(12 - 2*$sidebar_width);
}else{
	$content_class = 'col-md-12';
}
?>
<?php get_header( 'shop' ); ?>
<?php pintu_titlebar(); ?>

	<div class="bt-main-content">
		<div class="<?php echo esc_attr($fullwidth); ?>">
			<div class="row">
				<!-- Start Left Sidebar -->
				<?php if($sidebar_position == 'left' || $sidebar_position == 'left_right'){ ?>
					<div class="bt-sidebar bt-left-sidebar <?php echo esc_attr($sidebar_class); ?>">
						<?php echo get_sidebar('left'); ?>
					</div>
				<?php } ?>
				<!-- End Left Sidebar -->
				<!-- Start Content -->
				<div class="bt-content <?php echo esc_attr($content_class); ?>">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; // end of the loop. ?>
				</div>
				<!-- End Content -->
				<!-- Start Right Sidebar -->
				<?php if($sidebar_position == 'right' || $sidebar_position == 'left_right'){ ?>
					<div class="bt-sidebar bt-right-sidebar <?php echo esc_attr($sidebar_class); ?>">
						<?php echo get_sidebar('right'); ?>
					</div>
				<?php } ?>
				<!-- End Right Sidebar -->
			</div>
		</div>
	</div>

<?php get_footer( 'shop' );
