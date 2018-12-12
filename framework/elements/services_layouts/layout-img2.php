<?php
	$post_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'services_options'):array();
	
	$info_option = isset($post_options['info_option'])?$post_options['info_option']:array();

	$options = array();
	if(!empty($info_option)){
		foreach($info_option as $item){
			$options[] = '<li>'.$item['option'].'</li>';
		}
	}
?>
<div class="bt-item">
	<div class="bt-media">
		<?php
			$thumb_size = (!empty($img_size))?$img_size:'full'; 
			$thumbnail = wpb_getImageBySize( array(
				'post_id' => get_the_ID(),
				'attach_id' => null,
				'thumb_size' => $thumb_size,
				'class' => ''
			) );
			echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
		?>
	</div>
	<div class="bt-content">
		<h3 class="bt-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<?php
			if($excerpt_limit != 0) echo '<div class="bt-excerpt">'.wp_trim_words(get_the_excerpt(), $excerpt_limit, $excerpt_more).'</div>';
			if(!empty($readmore_text)) echo '<a class="bt-readmore" href="'.get_the_permalink().'">'.$readmore_text.'</a>';
		?>
	</div>
</div>
