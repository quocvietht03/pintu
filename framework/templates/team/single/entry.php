<?php
global $pintu_options;
$post_title = isset($pintu_options['single_team_title']) ? $pintu_options['single_team_title']: false;

$team_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'team_options'):array();

$positon = isset($team_options['position'])?$team_options['position']:'';
$email = isset($team_options['email'])?$team_options['email']:'';
$phone = isset($team_options['phone'])?$team_options['phone']:'';
$social = isset($team_options['social'])?$team_options['social']:array();

$social_item = array();
if(!empty($social)){
	foreach($social as $item){
		$social_item[] = '<li><a href="'.esc_url($item['link']).'" data-icon="'.esc_attr($item['icon']).'"><i class="'.esc_attr($item['icon']).'"></i></a></li>';
	}
}
?>
<article <?php post_class(); ?>>
	<div class="row">
		<div class="col-md-6">
			<div class="bt-thumb">
				<?php if (has_post_thumbnail()) the_post_thumbnail('full'); ?>
			</div>
		</div>
		<div class="col-md-6">
			<?php if($post_title){ ?>
				<h3 class="bt-title"><?php the_title(); ?></h3>
			<?php } ?>
			<div class="bt-position"><?php echo esc_html($positon); ?></div>
			<div class="bt-content"><?php the_content(); ?></div>
			<div class="bt-info">
				<h4><?php esc_html_e('Information', 'pintu'); ?></h4>
				<ul>
					<li><?php echo '<strong>Phone: </strong><a class="bt-phone" href="tel:'.esc_attr($phone).'">'.$phone.'</a>'; ?></li>
					<li><?php echo '<strong>Email: </strong><a class="bt-email" href="mailto:'.esc_attr($email).'">'.$email.'</a>'; ?></li>
				</ul>
			</div>
			<div class="bt-social">
				<h4><?php esc_html_e('Social', 'pintu'); ?></h4>
				<?php if(!empty($social_item)) echo '<ul class="bt-socials">'.implode(' ', $social_item).'</ul>'; ?>
			</div>
		</div>
	</div>
</article>