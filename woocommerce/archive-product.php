<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
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
 * @version   3.4.0
 */

global $pintu_options;
$fullwidth = isset($pintu_options['shop_fullwidth'])&&$pintu_options['shop_fullwidth'] ? 'fullwidth': 'container';
$sidebar_width = (int) isset($pintu_options['shop_sidebar_width']) ? $pintu_options['shop_sidebar_width']: 3;
$sidebar_width_md = $sidebar_width + 1;

$shop_top_bar = isset($pintu_options['shop_top_bar']) ? $pintu_options['shop_top_bar']: false;
$shop_product_per_row = (int) isset($pintu_options['shop_product_per_row']) ? $pintu_options['shop_product_per_row']: 3;

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
					<?php if ( have_posts() ) : ?>
						<?php if($shop_top_bar){ ?>
							<div class="top-bar">
								<div class="sort">
									<div class="inner">
										<?php do_action( 'woocommerce_catalog_ordering' ); ?>
									</div>
								</div>
								<div class="result">
									<div class="inner">
										<?php do_action( 'woocommerce_result_count' ); ?>
									</div>
								</div>
							</div>
						<?php } ?>
						<div class="row products">
							<?php
								$item_wrap_class = array();
								if(isset($_GET['layout'])){
									$layout = $_GET['layout'];
								}else{
									$layout = 'grid3col';
								}
								$item_wrap_class[] = $layout;

								if($layout == 'grid3col'){
									$item_wrap_class[] = 'col-xs-12 col-sm-6 col-md-'.(12/$shop_product_per_row);
								}elseif($layout == 'grid2col'){
									$item_wrap_class[] = 'col-xs-12 col-sm-6 col-md-6';
								}else{
									$item_wrap_class[] = 'col-md-12';
								}
							?>


							<?php while ( have_posts() ) : the_post(); ?>

								<div class="<?php echo esc_attr(implode(' ', $item_wrap_class)); ?>" style="margin-bottom: 30px;">

									<?php
										if($layout == 'list'){
											wc_get_template_part( 'content', 'product-list' );
										}else{
											wc_get_template_part( 'content', 'product-grid' );
										}
									?>

								</div>

							<?php endwhile; ?>

						</div>

						<?php
							/**
							 * woocommerce_after_shop_loop hook.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

						<?php
							/**
							 * woocommerce_no_products_found hook.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						?>

					<?php endif; ?>
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

<?php get_footer( 'shop' ); ?>
