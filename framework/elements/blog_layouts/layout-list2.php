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
		</div>
	</div>
	<div class="bt-content bt-center-vertical-inner">
		<div class="bt-content-inner">
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
		</div>
	</div>
</div>