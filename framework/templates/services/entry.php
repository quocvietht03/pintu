<?php
	global $pintu_options;
	$post_title = isset($pintu_options['services_title']) ? $pintu_options['services_title']: true;
	$post_featured = isset($pintu_options['services_featured']) ? $pintu_options['services_featured']: true;
	$post_image_size = isset($pintu_options['services_image_size']) ? $pintu_options['services_image_size']: '';
	$post_meta = isset($pintu_options['services_meta']) ? $pintu_options['services_meta']: true;
	$post_excerpt = isset($pintu_options['services_excerpt']) ? $pintu_options['services_excerpt']: true;
	$post_excerpt_length = (int) isset($pintu_options['services_excerpt_length']) ? $pintu_options['services_excerpt_length']: 55;
	$post_excerpt_more = isset($pintu_options['services_excerpt_more']) ? $pintu_options['services_excerpt_more']: '[...]';
	$post_readmore = isset($pintu_options['services_readmore']) ? $pintu_options['services_readmore']: true;
	$post_readmore_label = isset($pintu_options['services_readmore_label'])&&$pintu_options['services_readmore_label'] ? $pintu_options['services_readmore_label']: esc_html__('Read More', 'pintu');
	
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'services_options'):array();

	$icon_font = isset($post_options['icon_font'])?$post_options['icon_font']:'';
	$icon_image = isset($post_options['icon_image'])?$post_options['icon_image']:'';
?>
<article <?php post_class(); ?>>
	<div class="bt-post-item">
		<?php if($post_featured && has_post_thumbnail()){ ?>
			<div class="bt-media">
				<?php echo pintu_post_featured_render($post_image_size); ?>
			</div>
		<?php } ?>
		<?php if($post_meta || $post_title){ ?>
			<div class="bt-header">
				<div class="bt-icon">
					<?php
						if($icon_font){
							echo '<i class="'.esc_attr($icon_font).'"></i>';
						}else{
							echo '<img src="'.esc_url($icon_image['url']).'" alt="'.esc_attr__('Icon', 'pintu').'"/>';
						}
					?>
				</div>
				<div class="bt-content">
					<?php if($post_meta) the_terms( get_the_ID(), 'bt_services_category', '<div class="bt-term">', ', ', '</div>' ); ?>
					<?php if($post_title){ ?>
						<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
		<?php if($post_excerpt){ ?>
			<div class="bt-excerpt">
				<?php echo wp_trim_words(get_the_excerpt(), $post_excerpt_length, $post_excerpt_more); ?>
			</div>
		<?php } ?>
		
		<?php if($post_readmore){ ?>
			<a class="bt-readmore" href="<?php the_permalink(); ?>"><?php echo esc_html($post_readmore_label); ?></a>
		<?php } ?>
	</div>
</article>
