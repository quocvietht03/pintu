<?php
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'services_options'):array();
	
	$icon_font = isset($post_options['icon_font'])?$post_options['icon_font']:'';
	$icon_image = isset($post_options['icon_image'])?$post_options['icon_image']:'';
	
?>
<div class="bt-item">
	<div class="bt-icon">
		<?php
			if(!empty($icon_image['url'])){
				echo '<img src="'.esc_url($icon_image['url']).'" alt="'.esc_attr__('Icon', 'pintu').'"/>';
			}else{
				echo '<i class="'.esc_attr($icon_font).'"></i>';
			}
		?>
	</div>
	<div class="bt-content">
		<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="bt-term"><?php the_terms( get_the_ID(), 'bt_services_category', '', ', ' ); ?></div>
		<?php
			if($excerpt_limit != 0) echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
			if(!empty($readmore_text)) echo '<a class="bt-readmore" href="'.get_the_permalink().'">'.$readmore_text.'</a>';
		?>
	</div>
</div>
