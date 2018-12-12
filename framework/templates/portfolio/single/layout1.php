<?php
global $pintu_options;
$post_title = isset($pintu_options['single_portfolio_title']) ? $pintu_options['single_portfolio_title']: false;
$post_image_size = isset($pintu_options['single_portfolio_image_size']) ? $pintu_options['single_portfolio_image_size']: '';

$portfolio_options = function_exists('fw_get_db_post_option')?fw_get_db_post_option(get_the_ID(), 'portfolio_options'):array();

$gallery_column = isset($portfolio_options['gallery-column'])?$portfolio_options['gallery-column']:'col-md-12';
$gallery_space = isset($portfolio_options['gallery-space'])?(int)$portfolio_options['gallery-space']:0;
$gallery_space_style = 'margin-bottom: '.$gallery_space.'px; padding: 0 '.($gallery_space/2).'px;';

$infor_title = isset($portfolio_options['infor-title'])?$portfolio_options['infor-title']:'';
$info_options = isset($portfolio_options['info-option'])?$portfolio_options['info-option']:array();

$info_item = array();
if(!empty($info_options)){
	foreach($info_options as $info_option){
		$info_item[] = '<li><span>'.$info_option['title'].'</span>'.$info_option['value'].'</li>';
	}
}

$post_share = isset($pintu_options['single_portfolio_share']) ? $pintu_options['single_portfolio_share']: true;
$post_share_label = isset($pintu_options['single_portfolio_share_label'])&&$pintu_options['single_portfolio_share_label'] ? $pintu_options['single_portfolio_share_label']: esc_html__('Share', 'pintu');
$social_item = array();
$share_facebook = isset($pintu_options['single_portfolio_share_facebook']) ? $pintu_options['single_portfolio_share_facebook']: true;
if($share_facebook){
	$social_item[] = '<li><a target="_blank" title="'.esc_attr__('Facebook', 'pintu').'" href="https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'" data-icon="fa fa-facebook"><i class="fa fa-facebook"></i></a></li>';
}
$share_twitter = isset($pintu_options['single_portfolio_share_twitter']) ? $pintu_options['single_portfolio_share_twitter']: true;
if($share_twitter){
	$social_item[] = '<li><a target="_blank" title="'.esc_attr__('Twitter', 'pintu').'" href="https://twitter.com/share?url='.get_the_permalink().'" data-icon="fa fa-twitter"><i class="fa fa-twitter"></i></a></li>';
}
$share_google_plus = isset($pintu_options['single_portfolio_share_google_plus']) ? $pintu_options['single_portfolio_share_google_plus']: true;
if($share_google_plus){
	$social_item[] = '<li><a target="_blank" title="'.esc_attr__('Google Plus', 'pintu').'" href="https://plus.google.com/share?url='.get_the_permalink().'" data-icon="fa fa-google-plus"><i class="fa fa-google-plus"></i></a></li>';
}
$share_linkedin = isset($pintu_options['single_portfolio_share_linkedin']) ? $pintu_options['single_portfolio_share_linkedin']: true;
if($share_linkedin){
	$social_item[] = '<li><a target="_blank" title="'.esc_attr__('Linkedin', 'pintu').'" href="https://www.linkedin.com/shareArticle?url='.get_the_permalink().'" data-icon="fa fa-linkedin"><i class="fa fa-linkedin"></i></a></li>';
}
$share_pinterest = isset($pintu_options['single_portfolio_share_pinterest']) ? $pintu_options['single_portfolio_share_pinterest']: true;
if($share_pinterest){
	$social_item[] = '<li><a target="_blank" title="'.esc_attr__('Pinterest', 'pintu').'" href="https://pinterest.com/pin/create/button/?url='.get_the_permalink().'" data-icon="fa fa-pinterest"><i class="fa fa-pinterest"></i></a></li>';
}

?>

<article <?php post_class('layout1'); ?>>
	<div class="row">
		<div class="col-md-12">
			<?php
				$project_gallery = function_exists('fw_ext_portfolio_get_gallery_images')?fw_ext_portfolio_get_gallery_images():array();
				if(!empty($project_gallery)){
					?>
						<div class="bt-gallery">
							<div class="row">
								<?php 
									foreach($project_gallery as $attachment){
										echo '<div class="'.esc_attr($gallery_column).'" style="'.esc_attr($gallery_space_style).'">
												<div class="bt-item">
													<img src="'.esc_url($attachment['url']).'" alt="'.esc_attr__('Thumbnail', 'pintu').'"/>
												</div>
											</div>';
									}
								?>
							</div>
						</div>
					<?php
				}else{
					?>
						<div class="bt-thumbnail">
							<?php echo pintu_post_featured_render($post_image_size); ?>
						</div>
					<?php
				}
			?>
		</div>
		<div class="col-md-8">
			<?php if($post_title){ ?>
				<h3 class="bt-title"><?php the_title(); ?></h3>
			<?php } ?>
			<div class="bt-term"><?php the_terms( get_the_ID(), 'fw-portfolio-category', '', ', ' ); ?></div>
			<div class="bt-desc"><?php the_content(); ?></div>
		</div>
		<div class="col-md-4">
			<div class="bt-info">
				<?php
					if($infor_title) echo '<h4>'.$infor_title.'</h4>';
					if(!empty($info_item)) echo '<ul>'.implode(' ', $info_item).'</ul>'; 
				?>
			</div>
			<?php if($post_share){ ?>
				<div class="bt-social">
					<?php
						if(!empty($social_item)){
							echo '<h4>'.$post_share_label.'</h4><ul>'.implode(' ', $social_item).'</ul>';
						}
					?>
				</div>
			<?php } ?>
		</div>
	</div>
</article>
