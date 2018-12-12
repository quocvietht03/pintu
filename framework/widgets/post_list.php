<?php
class pintu_Post_List_Widget extends pintu_Widget {
	function __construct() {
		parent::__construct(
			'pintu_post_list', // Base ID
			esc_html__('Post List', 'pintu'), // Name
			array('description' => esc_html__('Display a list of your posts on your site.', 'pintu'),) // Args
        );
		
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Post List', 'pintu' ),
				'label' => esc_html__( 'Title', 'pintu' )
			),
			'category' => array(
				'type'   => 'pintu_taxonomy',
				'std'    => '',
				'label'  => esc_html__( 'Categories', 'pintu' ),
			),
			'posts_per_page' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 3,
				'label' => esc_html__( 'Number of posts to show', 'pintu' )
			),
			'orderby' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order by', 'pintu' ),
				'options' => array(
					'none'   => esc_html__( 'None', 'pintu' ),
					'comment_count'  => esc_html__( 'Comment Count', 'pintu' ),
					'title'  => esc_html__( 'Title', 'pintu' ),
					'date'   => esc_html__( 'Date', 'pintu' ),
					'ID'  => esc_html__( 'ID', 'pintu' ),
				)
			),
			'order' => array(
				'type'  => 'select',
				'std'   => 'none',
				'label' => esc_html__( 'Order', 'pintu' ),
				'options' => array(
					'none'  => esc_html__( 'None', 'pintu' ),
					'asc'  => esc_html__( 'ASC', 'pintu' ),
					'desc' => esc_html__( 'DESC', 'pintu' ),
				)
			),
			'el_class'  => array(
				'type'  => 'text',
				'std'   => '',
				'label' => esc_html__( 'Extra Class', 'pintu' )
			)
		);
	}

	function widget( $args, $instance ) {
		
		global $post;
		extract( $args );
        
		$title                  = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category               = isset($instance['category'])? $instance['category'] : '';
		$posts_per_page         = absint( $instance['posts_per_page'] );
		$orderby                = sanitize_title( $instance['orderby'] );
		$order                  = sanitize_title( $instance['order'] );
		$el_class               = sanitize_title( $instance['el_class'] );
        
		$query_args = array(
			'posts_per_page' => $posts_per_page,
			'orderby' => $orderby,
			'order' => $order,
			'post_type' => 'post',
			'post_status' => 'publish');
		if (isset($category) && $category != '') {
			$cats = explode(',', $category);
			$category = array();
			foreach ((array) $cats as $cat) :
			$category[] = trim($cat);
			endforeach;
			$query_args['tax_query'] = array(
									array(
										'taxonomy' => 'category',
										'field' => 'slug',
										'terms' => $category
									)
							);
		}
		
		$wp_query = new WP_Query($query_args);                
		
		ob_start();
		
		echo apply_filters('bt_before_widget_filter', $before_widget);

		echo !empty($title) ? $before_title . $title . $after_title : ''; 
		
		if ($wp_query->have_posts()){
			?>
			<ul class="bt-post-list">
				<?php while ($wp_query->have_posts()){ $wp_query->the_post(); ?>
					<li>
						<?php 
							/* get thumbnail */
							if( has_post_thumbnail() ){
								$thumbnail_data = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'thumbnail' );
								echo '<a href="'.get_the_permalink().'"><div class="bt-thumb" style="background: url('.esc_url($thumbnail_data[0]).') no-repeat center center / cover, #333"></div></a>';
							}
						?>
						<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<h4 class="bt-date"><?php echo get_the_date(get_option('date_format')); ?></h4>
					</li>
				<?php } ?>
			</ul>
		<?php 
		}
		
		wp_reset_postdata();

		echo apply_filters('bt_after_widget_filter', $after_widget);
		echo ob_get_clean();
		
	}
}
/* Class pintu_Post_List_Widget */
function pintu_post_list_widget() {
    register_widget('pintu_Post_List_Widget');
}

add_action('widgets_init', 'pintu_post_list_widget');
