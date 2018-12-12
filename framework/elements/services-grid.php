<?php
class WPBakeryShortCode_bt_services_grid extends WPBakeryShortCode {
	
	protected function content( $atts, $content = null ) {

		extract(shortcode_atts(array(
			'layout_type' => 'bt-grid-auto',
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
			
			'layout' => 'default',
			'style' => 'icon-top',
			'align' => 'text-left',
			'img_size' => '',
			'excerpt_limit' => 15,
			'excerpt_more' => '.',
			'readmore_text' => 'Read More',
			
			'columns_md' => '',
			'columns_sm' => '',
			'columns_xs' => '',
			
			'css' => ''
			
		), $atts));
		
		$css_class = array(
			$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
			'bt-element',
			'bt-services-grid-element',
			$layout_type,
			$layout,
			$style,
			apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts )
		);
		
		if($style == 'icon-top') $css_class[] = $align;
		
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
			'post_type' => 'bt_services',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$taxonomy = array();
			foreach ((array) $cats as $cat){
				$taxonomy[] = trim($cat);
			}
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'bt_services_category',
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
			<div class="<?php echo esc_attr(implode(' ', $css_class)); ?>"  <?php echo esc_attr(implode(' ', $wrapper_attributes)); ?>>
				<div class="row">
					<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
						<div <?php echo implode(' ', $item_attributes); ?>>
							<?php require get_template_directory().'/framework/elements/services_layouts/'.$layout.'.php'; ?>
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
	'name' => esc_html__('Services Grid', 'pintu'),
	'base' => 'bt_services_grid',
	'category' => esc_html__('BT Elements', 'pintu'),
	'icon' => 'bt-icon',
	'params' => array(
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Layout', 'pintu'),
			'param_name' => 'layout_type',
			'value' => array(
				esc_html__('Auto', 'pintu') => 'bt-grid-auto',
				esc_html__('Fixed Row', 'pintu') => 'bt-grid-fixed',
				esc_html__('Masonry', 'pintu') => 'bt-grid-masonry'
			),
			'admin_label' => true,
			'description' => esc_html__('Select layout display in this element.', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns', 'pintu'),
			'param_name' => 'columns',
			'value' => array(
				esc_html__('4 Columns', 'pintu') => 'col-lg-3',
				esc_html__('3 Columns', 'pintu') => 'col-lg-4',
				esc_html__('2 Columns', 'pintu') => 'col-lg-6',
				esc_html__('1 Column', 'pintu') => 'col-lg-12'
			),
			'description' => esc_html__('Select columns display in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Item Space', 'pintu'),
			'param_name' => 'space',
			'value' => 30,
			'description' => esc_html__('Please, enter number space in this element.', 'pintu')
		),
		array(
			'type' => 'checkbox',
			'heading' => esc_html__('Show Pagination', 'pintu'),
			'param_name' => 'show_pagination',
			'value' => '',
			'description' => esc_html__('Show or not pagination in this element.', 'pintu')
		),
		vc_map_add_css_animation(),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Element ID', 'pintu'),
			'param_name' => 'el_id',
			'value' => '',
			'description' => esc_html__('Enter element ID (Note: make sure it is unique and valid).', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Extra Class', 'pintu'),
			'param_name' => 'el_class',
			'value' => '',
			'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'pintu')
		),
		array (
			'type' => 'bt_taxonomy',
			'taxonomy' => 'bt_services_category',
			'heading' => esc_html__('Categories', 'pintu'),
			'param_name' => 'category',
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__('Note: By default, all your projects will be displayed. If you want to narrow output, select category(s) above. Only selected categories will be displayed.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Post IDs', 'pintu'),
			'param_name' => 'post_ids',
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__('Enter post IDs to be excluded (Note: separate values by commas (,)).', 'pintu'),
		),
		array (
			'type' => 'textfield',
			'heading' => esc_html__('Count', 'pintu'),
			'param_name' => 'posts_per_page',
			'value' => '10',
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__('The number of posts to display on each page. Set to "-1" for display all posts on the page.', 'pintu')
		),
		array (
			'type' => 'dropdown',
			'heading' => esc_html__('Order by', 'pintu'),
			'param_name' => 'orderby',
			'value' => array (
					esc_html__('None', 'pintu') => 'none',
					esc_html__('Title', 'pintu') => 'title',
					esc_html__('Date', 'pintu') => 'date',
					esc_html__('ID', 'pintu') => 'ID'
			),
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__('Select order type.', 'pintu')
		),
		array (
			'type' => 'dropdown',
			'heading' => esc_html__('Order', 'pintu'),
			'param_name' => 'order',
			'value' => Array (
					esc_html__('None', 'pintu') => 'none',
					esc_html__('ASC', 'pintu') => 'ASC',
					esc_html__('DESC', 'pintu') => 'DESC'
			),
			'group' => esc_html__('Data Setting', 'pintu'),
			'description' => esc_html__('Select sorting order.', 'pintu')
		),
		array(
			'type' => 'bt_layout',
			'folder' => 'services',
			'heading' => esc_html__('Layout', 'pintu'),
			'param_name' => 'layout',
			'value' => array(
				esc_html__('Default', 'pintu') => 'default',
				esc_html__('Layout Icon 1', 'pintu') => 'layout1',
				esc_html__('Layout Image 1', 'pintu') => 'layout-img1',
				esc_html__('Layout Image 2', 'pintu') => 'layout-img2',
				esc_html__('Layout Image 3', 'pintu') => 'layout-img3',
				esc_html__('Layout Image 4', 'pintu') => 'layout-img4',
				esc_html__('Layout Image 5', 'pintu') => 'layout-img5'
			),
			'admin_label' => true,
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Select layout of items display in this element.', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'pintu'),
			'param_name' => 'style',
			'value' => array(
				esc_html__('Icon Top', 'pintu') => 'icon-top',
				esc_html__('Icon Left', 'pintu') => 'icon-left',
				esc_html__('Icon Right', 'pintu') => 'icon-right'
			),
			'dependency' => array(
				'element'=>'layout',
				'value'=> array('default', 'layout1')
			),
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Select layout style in this elment.', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Align', 'pintu'),
			'param_name' => 'align',
			'value' => array(
				esc_html__('Left', 'pintu') => 'text-left',
				esc_html__('Center', 'pintu') => 'text-center',
				esc_html__('Right', 'pintu') => 'text-right',
			),
			'dependency' => array(
				'element'=>'style',
				'value'=> 'icon-top'
			),
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Select layout align in this elment.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Image size', 'pintu'),
			'param_name' => 'img_size',
			'value' => 'full',
			'dependency' => array(
				'element'=>'layout',
				'value'=> array('layout-img1', 'layout-img2', 'layout-img3', 'layout-img4')
			),
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'pintu'),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Excerpt Limit', 'pintu'),
			'param_name' => 'excerpt_limit',
			'value' => 15,
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Please, Enter number excerpt limit of post in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Excerpt More', 'pintu'),
			'param_name' => 'excerpt_more',
			'value' => '.',
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Please, Enter text excerpt more of post in this element.', 'pintu')
		),
		array(
			'type' => 'textfield',
			'heading' => esc_html__('Readmore Text', 'pintu'),
			'param_name' => 'readmore_text',
			'value' => 'Read More',
			'group' => esc_html__('Item Setting', 'pintu'),
			'description' => esc_html__('Please, Enter text of label button readmore in this element.', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Medium Screen', 'pintu'),
			'param_name' => 'columns_md',
			'value' => array(
				esc_html__('Auto', 'pintu') => '',
				esc_html__('4 Columns', 'pintu') => 'col-md-3',
				esc_html__('3 Columns', 'pintu') => 'col-md-4',
				esc_html__('2 Columns', 'pintu') => 'col-md-6',
				esc_html__('1 Column', 'pintu') => 'col-md-12'
			),
			'group' => esc_html__('Responsive', 'pintu'),
			'description' => esc_html__('Select columns display in this element (Screen width >=992px and <1199px).', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Small Screen', 'pintu'),
			'param_name' => 'columns_sm',
			'value' => array(
				esc_html__('Auto', 'pintu') => '',
				esc_html__('4 Columns', 'pintu') => 'col-sm-3',
				esc_html__('3 Columns', 'pintu') => 'col-sm-4',
				esc_html__('2 Columns', 'pintu') => 'col-sm-6',
				esc_html__('1 Column', 'pintu') => 'col-sm-12'
			),
			'group' => esc_html__('Responsive', 'pintu'),
			'description' => esc_html__('Select columns display in this element (Screen width >=768px and <992px).', 'pintu')
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_html__('Columns Extra Screen', 'pintu'),
			'param_name' => 'columns_xs',
			'value' => array(
				esc_html__('Auto', 'pintu') => '',
				esc_html__('4 Columns', 'pintu') => 'col-xs-3',
				esc_html__('3 Columns', 'pintu') => 'col-xs-4',
				esc_html__('2 Columns', 'pintu') => 'col-xs-6',
				esc_html__('1 Column', 'pintu') => 'col-xs-12'
			),
			'group' => esc_html__('Responsive', 'pintu'),
			'description' => esc_html__('Select columns display in this element (Screen <768px).', 'pintu')
		),
		
		array(
			'type' => 'css_editor',
			'heading' => esc_html__('CSS box', 'pintu'),
			'param_name' => 'css',
			'group' => esc_html__('Design Options', 'pintu'),
		)
	)
));
