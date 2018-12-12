<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
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
 * @version     3.3.0
 */
?>

<?php
//Get layout on page reload
if(isset($_GET['layout'])){
	$layout = $_GET['layout'];
}else{
	$layout = 'grid3col';
}
?>
<form class="woocommerce-ordering" method="get">
	<div class="layout-view">
		<span class="<?php if($layout == 'grid3col') echo 'active'; ?>"><input type="radio" name="layout" value="grid3col" <?php if($layout == 'grid3col') echo 'checked="checked"'; ?> onchange="this.form.submit()"><i class="fa fa-th"></i></span>
		<span class="<?php if($layout == 'grid2col') echo 'active'; ?>"><input type="radio" name="layout" value="grid2col" <?php if($layout == 'grid2col') echo 'checked="checked"'; ?> onchange="this.form.submit()"><i class="fa fa-th-large"></i></span>
		<span class="<?php if($layout == 'list') echo 'active'; ?>"><input type="radio" name="layout" value="list" <?php if($layout == 'list') echo 'checked="checked"'; ?> onchange="this.form.submit()"><i class="fa fa-list"></i></span>
	</div>
	<div class="sort-by">
		<span><i class="fa fa-filter"></i> <?php esc_html_e('Filter', 'pintu'); ?></span>
		<select name="orderby" class="orderby">
			<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
				<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	<?php
		// Keep query string vars intact
		foreach ( $_GET as $key => $val ) {
			if ( 'orderby' === $key || 'submit' === $key ) {
				continue;
			}
			if ( is_array( $val ) ) {
				foreach( $val as $innerVal ) {
					echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
				}
			}elseif($key != 'layout'){
				echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
			}
		}
	?>
</form>