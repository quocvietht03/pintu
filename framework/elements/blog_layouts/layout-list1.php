<?php
	$format = get_post_format() ? get_post_format() : 'standard';
	$icon_url = get_template_directory_uri().'/assets/images/icon-'.$format.'.png';
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'post_options'):array();
	if(!$zigzag) $count = 0;
	$type_class = ($count % 2 == 0) ? 'bt-even' : 'bt-odd';
?>
<div class="bt-item bt-center-vertical-wrap <?php echo esc_attr($type_class); ?>">
	<div class="bt-media bt-center-vertical-inner <?php echo esc_attr($format); ?>">
		<div class="bt-content-inner">
			<?php
				if (has_post_thumbnail()){
					$media_arr = explode(',', $multi_media);
					$thumb_size = (!empty($img_size))?$img_size:'full'; 
					$thumbnail = wpb_getImageBySize( array(
						'post_id' => get_the_ID(),
						'attach_id' => null,
						'thumb_size' => $thumb_size,
						'class' => ''
					) );
					echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
				}
			?>
			<div class="bt-format-icon"><img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($format); ?>" /></div>
		</div>
	</div>
	<div class="bt-content bt-center-vertical-inner">
		<div class="bt-content-inner">
			<ul class="bt-meta">
				<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a></li>
				<li><a href="<?php the_permalink(); ?>"><?php echo get_the_date(get_option('date_format')); ?></a></li>
			</ul>
			<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php
				echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
				if(!empty($readmore_text)) echo '<a class="bt-readmore" href="'.get_the_permalink().'">'.$readmore_text.'</a>';
			?>
		</div>
	</div>
	<div class="bt-media bt-center-vertical-inner <?php echo esc_attr($format); ?>">
		<div class="bt-content-inner">
			<?php
				if (has_post_thumbnail()){
					$media_arr = explode(',', $multi_media);
					$thumb_size = (!empty($img_size))?$img_size:'full'; 
					$thumbnail = wpb_getImageBySize( array(
						'post_id' => get_the_ID(),
						'attach_id' => null,
						'thumb_size' => $thumb_size,
						'class' => ''
					) );
					echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
				}
			?>
			<div class="bt-format-icon"><img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($format); ?>" /></div>
		</div>
	</div>
</div>