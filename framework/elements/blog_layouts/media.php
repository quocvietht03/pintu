<?php
	$media_arr = explode(',', $multi_media);
	$thumb_size = (!empty($img_size))?$img_size:'full'; 
	$thumbnail = wpb_getImageBySize( array(
		'post_id' => get_the_ID(),
		'attach_id' => null,
		'thumb_size' => $thumb_size,
		'class' => ''
	) );
	if($media_type == 'multi' && in_array($format, $media_arr)){
		switch ($format) {
			case 'gallery':
				$gallery_images = isset($post_options['gallery_images'])?$post_options['gallery_images']:array();
				if(!empty($gallery_images)){
					$date = time() . '_' . uniqid(true);
					?>
						<div id="<?php echo esc_attr( 'carousel-generic'.$date ) ?>" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							<?php
								foreach($gallery_images as $key => $gallery_image){
									$cl_active = ($key == 0) ? 'active' : '';
									$thumbnail_image = wpb_getImageBySize( array(
										'post_id' => null,
										'attach_id' => $gallery_image['attachment_id'],
										'thumb_size' => $thumb_size,
										'class' => 'item bt-gallery '.$cl_active
									) );
									echo (!empty($thumbnail_image))?$thumbnail_image['thumbnail']:'';
								}
							?>
						  </div>
							<a class="left carousel-control" href="<?php echo esc_attr( '#carousel-generic'.$date ) ?>" role="button" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							</a>
							<a class="right carousel-control" href="<?php echo esc_attr( '#carousel-generic'.$date ) ?>" role="button" data-slide="next">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					<?php
				}else{
					echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
				}
			break;
			case 'video':
				$video_url = isset($post_options['video_url'])?$post_options['video_url']:'';
				$video_poster = isset($post_options['video_poster'])?$post_options['video_poster']:array();
				$video_caption = isset($post_options['video_caption'])?$post_options['video_caption']:'';
				
				if(!empty($video_url)){
					?>
						<div class="bt-overlay">
							<a href="<?php echo esc_url($video_url); ?>" class="html5lightbox" data-group=""  data-thumbnail="" data-width="800" data-height="450" title="<?php echo esc_attr($video_caption); ?>"><i class="fa fa-play"></i></a>
						</div>
					<?php
					if(!empty($video_poster)){
						$thumbnail_poster = wpb_getImageBySize( array(
							'post_id' => null,
							'attach_id' => $video_poster['attachment_id'],
							'thumb_size' => $thumb_size,
							'class' => ''
						) );
						echo (!empty($thumbnail_poster))?$thumbnail_poster['thumbnail']:'';
					}else{
						echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
					}
				}else{
					echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
				}
			break;
			case 'audio':
				$audio_type = isset($post_options['audio_type']['type'])?$post_options['audio_type']['type']:'';
				if($audio_type == 'html5') {
					$audio_format = isset($post_options['audio_type']['html5']['format'])?$post_options['audio_type']['html5']['format']:'';
					$audio_src = isset($post_options['audio_type']['html5']['src'])?$post_options['audio_type']['html5']['src']:'';
					if($audio_src){
						echo '<audio controls>
								<source src="'.esc_url($audio_src).'" type="'.esc_attr($audio_format).'">
							</audio>';
					}else{
						if($img_size){
							$thumb_size = (!empty($img_size))?$img_size:'full'; 
							$thumbnail = wpb_getImageBySize( array(
								'post_id' => get_the_ID(),
								'attach_id' => null,
								'thumb_size' => $thumb_size,
								'class' => ''
							) );
							echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
						}else{
							if (has_post_thumbnail()) the_post_thumbnail('full');
						}
					}
				} else {
					$audio_embed = isset($post_options['audio_type']['embed']['iframe'])?$post_options['audio_type']['embed']['iframe']:'';
					if($audio_embed){
						echo '<div class="bt-soundcluond">'.$audio_embed.'</div>';
					}else{
						if($img_size){
							$thumb_size = (!empty($img_size))?$img_size:'full'; 
							$thumbnail = wpb_getImageBySize( array(
								'post_id' => get_the_ID(),
								'attach_id' => null,
								'thumb_size' => $thumb_size,
								'class' => ''
							) );
							echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
						}else{
							if (has_post_thumbnail()) the_post_thumbnail('full');
						}
					}
				}
			break;
			case 'quote':
				$quote_text = isset($post_options['quote_text'])?$post_options['quote_text']:'';
				if($quote_text){
					echo '<blockquote>'.$quote_text.'</blockquote>';
				}else{
					if($img_size){
						$thumb_size = (!empty($img_size))?$img_size:'full'; 
						$thumbnail = wpb_getImageBySize( array(
							'post_id' => get_the_ID(),
							'attach_id' => null,
							'thumb_size' => $thumb_size,
							'class' => ''
						) );
						echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
					}else{
						if (has_post_thumbnail()) the_post_thumbnail('full');
					}
				}
			break;
			case 'link':
				$url = isset($post_options['url'])?$post_options['url']:'';
				if($url){
					echo '<a href="'.esc_url($url).'" target="_blank">'.$url.'</a>';
				}else{
					if($img_size){
						$thumb_size = (!empty($img_size))?$img_size:'full'; 
						$thumbnail = wpb_getImageBySize( array(
							'post_id' => get_the_ID(),
							'attach_id' => null,
							'thumb_size' => $thumb_size,
							'class' => ''
						) );
						echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
					}else{
						if (has_post_thumbnail()) the_post_thumbnail('full');
					}
				}
			break;
			default:
				echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
		}
	}else{
		echo (!empty($thumbnail))?$thumbnail['thumbnail']:'';
	}
?>