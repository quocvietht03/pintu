<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$media_arr = explode(',', $multi_media);
	$format = in_array($format, $media_arr) ? $format : 'standard';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	
?>
<div class="bt-item">
	<div class="bt-media <?php echo esc_attr($format); ?>">
		<?php require get_template_directory().'/framework/elements/blog_layouts/media.php'; ?>
	</div>
	<div class="bt-content">
		<h4 class="bt-date"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></h4>
		<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<ul class="bt-meta">
			<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
			<?php if(comments_open()){ ?>
				<li><a href="<?php comments_link(); ?>"><?php comments_number( esc_html__('0 Comments', 'pintu'), esc_html__('1 Comment', 'pintu'), esc_html__('% Comments', 'pintu') ); ?></a></li>
			<?php } ?>
			<li><?php the_terms( get_the_ID(), 'category', '', ', ' ); ?></li>
		</ul>
		<?php
			echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
			if(!empty($readmore_text)) echo '<a class="bt-readmore" href="'.get_the_permalink().'">'.$readmore_text.'</a>';
		?>
	</div>
</div>