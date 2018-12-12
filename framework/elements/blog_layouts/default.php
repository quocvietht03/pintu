<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$media_arr = explode(',', $multi_media);
	$format = in_array($format, $media_arr) ? $format : 'standard';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	
?>
<div class="bt-item">
	<div class="bt-media <?php echo esc_attr($media_type.' '.$format); ?>">
		<?php require get_template_directory().'/framework/elements/blog_layouts/media.php'; ?>
		<h4 class="bt-term"><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></h4>
	</div>
	<div class="bt-content">
		<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<ul class="bt-meta">
			<li><?php echo '<i class="fa fa-user"></i> '.esc_html__('by ', 'pintu'); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
			<li><?php echo '<i class="fa fa-calendar"></i> '.esc_html__('on ', 'pintu'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></li>
		</ul>
		<?php
			echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
			if(!empty($readmore_text)) echo '<a class="bt-readmore" href="'.get_the_permalink().'">'.$readmore_text.'</a>';
		?>
	</div>
</div>