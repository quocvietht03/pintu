<?php
class WPBakeryShortCode_bt_portfolio_grid extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'layout_type' => 'bt-grid-auto',
			'layout' => 'default',
			'columns' =>  '',
			'space' =>  30,
			'show_pagination' => 0,
			'css_animation' => '',
			'el_id' => '',
			'el_class' => '',
			
			'category' => '',
			'post_ids' => '',
			'posts_per_page' => 10,
			'orderby' => 'none',
			'order' => 'none',
			
			'img_size' => '',
			
			'columns_md' => '',
			'columns_sm' => '',
			'columns_xs' => '',
			
			
			'css' => ''
			
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element',
			'bt-portfolio-grid-element',
			$layout_type,
			$layout,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		$wrapper_attributes = array();
		if ( ! empty( $el_id ) ) {
			$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
		}
		
		/* Space */
		$item_style = array();
		$item_style[] = 'padding-left: '.($space/2).'px;';
		$item_style[] = 'padding-right: '.($space/2).'px;';
		$item_style[] = 'margin-bottom: '.$space.'px;';
		
		$item_attributes = array();
		if ( ! empty( $item_style ) ) {
			$item_attributes[] = 'style="' . esc_attr( implode(' ', $item_style) ) . '"';
		}
		
		/* Columns */
		$column_class = array();
		$column_class[] = (!empty($columns)) ? $columns: 'col-lg-3';
		if($columns != 'col-lg-12'){
			$column_class[] = (!empty($columns_md)) ? $columns_md : 'col-md-4';
			$column_class[] = (!empty($columns_sm)) ? $columns_sm : 'col-sm-6';
			$column_class[] = (!empty($columns_xs)) ? $columns_xs : 'col-xs-12';
		}
		
		if ( ! empty( $column_class ) ) {
			$item_attributes[] = 'class="' . esc_attr( implode(' ', $column_class) ) . '"';
		}
		
		/* Query */
		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		
		$args = array(
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => 'fw-portfolio',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$taxonomy = array();
			foreach ((array) $cats as $cat){
				$taxonomy[] = trim($cat);
			}
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'fw-portfolio-category',
					'field' => 'slug',
					'terms' => $taxonomy
				)
			);
		}
		if (isset($post_ids) && $post_ids != '') {
			$ids = explode(',', $post_ids);
			$p_ids = array();
			foreach ((array) $ids as $id){
				$p_ids[] = trim($id);
			}
			$args['post__in'] = $p_ids;
		}
		$wp_query = new WP_Query($args);
		
		if($layout_type == 'bt-grid-masonry') wp_enqueue_script('isotope');
		
		ob_start();
		if ( $wp_query->have_posts() ) {
		?>
			<div class="<?php echo esc_attr(implode(' ', $css_class)); ?>">
				<div class="row">
					<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
						<div <?php echo implode(' ', $item_attributes); ?>>
							<?php require get_template_directory().'/framework/elements/portfolio_layouts/'.$layout.'.php'; ?>
						</div>
					<?php } ?>
				</div>
				<?php if ($show_pagination) pintu_paginate_links($wp_query); ?>
			</div>
		<?php
		} else {
			esc_html_e('Post not found!', 'pintu');
		}
		wp_reset_query();
		return ob_get_clean();
	}
}

vc_map(array(
	'name' => esc_html__('Portfolio Grid', 'pintu'),
	'base' => 'bt_portfolio_grid',
	'category' => esc_html__('BT Elements', 'pintu'),
	'icon' => 'bt-icon',
	'params' => array(
		array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__('Layout', 'pintu'),
			'param_name' => 'layout_type',
			'value' => array(
				'Auto' => 'bt-grid-auto',
				'Fixed Row' => 'bt-grid-fixed',
				'Masonry' => 'bt-grid-masonry'
			),
			'admin_label' => true,
			'description' => esc_html__('Select layout display in this element.', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__('Columns', 'pintu'),
			'param_name' => 'columns',
			'value' => array(
				'4 Columns' => 'col-lg-3',
				'3 Columns' => 'col-lg-4',
				'2 Columns' => 'col-lg-6',
				'1 Column' => 'col-lg-12'
			),
			'description' => esc_html__('Select columns display in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__('Item Space', 'pintu'),
			'param_name' => 'space',
			'value' => 30,
			'description' => esc_html__( 'Please, enter number space in this element.', 'pintu' )
		),
		array(
			'type' => 'checkbox',
			'class' => '',
			'heading' => esc_html__('Show Pagination', 'pintu'),
			'param_name' => 'show_pagination',
			'value' => '',
			'description' => esc_html__('Show or not pagination in this element.', 'pintu')
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__('Element ID', 'pintu'),
			'param_name' => 'el_id',
			'value' => '',
			'description' => esc_html__( 'Enter element ID (Note: make sure it is unique and valid).', 'pintu' )
		),
		array(
			'type' => 'textfield',
			'class' => '',
			'heading' => esc_html__('Extra Class', 'pintu'),
			'param_name' => 'el_class',
			'value' => '',
			'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'pintu' )
		),
		array (
			'type' => 'bt_taxonomy',
			'taxonomy' => 'fw-portfolio-category',
			'heading' => esc_html__( 'Categories', 'pintu' ),
			'param_name' => 'category',
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__( 'Note: By default, all your projects will be displayed. If you want to narrow output, select category(s) above. Only selected categories will be displayed.', 'pintu' )
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Post IDs', 'pintu' ),
			'param_name' => 'post_ids',
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__( 'Enter post IDs to be excluded (Note: separate values by commas (,)).', 'pintu' ),
		),
		array (
			'type' => 'textfield',
			'heading' => esc_html__( 'Count', 'pintu' ),
			'param_name' => 'posts_per_page',
			'value' => '10',
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__( 'The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'pintu' )
		),
		array (
			'type' => 'dropdown',
			'heading' => esc_html__( 'Order by', 'pintu' ),
			'param_name' => 'orderby',
			'value' => array (
					'None' => 'none',
					'Title' => 'title',
					'Date' => 'date',
					'ID' => 'ID'
			),
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__( 'Select order type.', 'pintu' )
		),
		array (
			'type' => 'dropdown',
			'heading' => esc_html__( 'Order', 'pintu' ),
			'param_name' => 'order',
			'value' => Array (
					'None' => 'none',
					'ASC' => 'ASC',
					'DESC' => 'DESC'
			),
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__( 'Select sorting order.', 'pintu' )
		),
		array(
			'type' => 'bt_layout',
			'folder' => 'portfolio',
			'heading' => esc_html__('Layout', 'pintu'),
			'param_name' => 'layout',
			'value' => array(
				'Default' => 'default',
				'Layout 1' => 'layout1',
				'Layout 2' => 'layout2'
			),
			'admin_label' => true,
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Select layout of items display in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image size', 'pintu' ),
			'param_name' => 'img_size',
			'value' => 'full',
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'pintu' ),
		),
		array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__('Columns Medium Screen', 'pintu'),
			'param_name' => 'columns_md',
			'value' => array(
				'Auto' => '',
				'4 Columns' => 'col-md-3',
				'3 Columns' => 'col-md-4',
				'2 Columns' => 'col-md-6',
				'1 Column' => 'col-md-12'
			),
			'group' => esc_html__('Responsive', 'pintu'),
			'description' => esc_html__('Select columns display in this element (Screen width >=992px and <1199px).', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__('Columns Small Screen', 'pintu'),
			'param_name' => 'columns_sm',
			'value' => array(
				'Auto' => '',
				'4 Columns' => 'col-sm-3',
				'3 Columns' => 'col-sm-4',
				'2 Columns' => 'col-sm-6',
				'1 Column' => 'col-sm-12'
			),
			'group' => esc_html__('Responsive', 'pintu'),
			'description' => esc_html__('Select columns display in this element (Screen width >=768px and <992px).', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'class' => '',
			'heading' => esc_html__('Columns Extra Screen', 'pintu'),
			'param_name' => 'columns_xs',
			'value' => array(
				'Auto' => '',
				'4 Columns' => 'col-xs-3',
				'3 Columns' => 'col-xs-4',
				'2 Columns' => 'col-xs-6',
				'1 Column' => 'col-xs-12'
			),
			'group' => esc_html__('Responsive', 'pintu'),
			'description' => esc_html__('Select columns display in this element (Screen <768px).', 'pintu')
		),
		
		array(
			'type' => 'css_editor',
			'heading' => esc_html__( 'CSS box', 'pintu' ),
			'param_name' => 'css',
			'group' => esc_html__( 'Design Options', 'pintu' ),
		)
	)
));
