<?php
/*
Template Name: No Container Template
*/
?>
<?php get_header(); ?>
<?php
global $pintu_options;
$page_comment = (int) isset($pintu_options['page_comment']) ?  $pintu_options['page_comment']: 1;
$sidebar_width = (int) isset($pintu_options['sidebar_width']) ?  $pintu_options['sidebar_width']: 3;
$sidebar_width_md = $sidebar_width + 1;

$page_options = function_exists("fw_get_db_post_option")?fw_get_db_post_option(get_the_ID(), 'page_options'):array();
$page_titlebar = isset($page_options['page_titlebar'])&&$page_options['page_titlebar']?$page_options['page_titlebar']:'';

$sidebar_position = function_exists( 'fw_ext_sidebars_get_current_position' ) ? fw_ext_sidebars_get_current_position() : 'full';

$sidebar_class = 'col-md-'.$sidebar_width_md.' col-lg-'.$sidebar_width;
if($sidebar_position == 'left' || $sidebar_position == 'right'){
	$content_class = 'col-md-'.(12 - $sidebar_width_md).' col-lg-'.(12 - $sidebar_width);
}elseif($sidebar_position == 'left_right'){
	$content_width = 12 - 2*$sidebar_width;
	$content_class = 'col-md-'.(12 - 2*$sidebar_width_md).' col-lg-'.(12 - 2*$sidebar_width);
}else{
	$content_class = 'col-md-12';
}

if(!$page_titlebar){
	pintu_titlebar();
}
?>
	<div class="bt-main-content">
		<div class="row">
			<!-- Start Left Sidebar -->
			<?php if($sidebar_position == 'left' || $sidebar_position == 'left_right'){ ?>
				<div class="bt-sidebar bt-left-sidebar <?php echo esc_attr($sidebar_class); ?>">
					<?php echo get_sidebar('left'); ?>
				</div>
			<?php } ?>
			<!-- End Left Sidebar -->
			<!-- Start Content -->
			<div class="bt-content <?php echo esc_attr($content_class); ?>">
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>
					
					<?php if($page_comment){ ?>
						
							<?php if ( comments_open() || get_comments_number() ) comments_template(); ?>
						
					<?php } ?>

				<?php endwhile; ?>
			</div>
			<!-- End Content -->
			<!-- Start Right Sidebar -->
			<?php if($sidebar_position == 'right' || $sidebar_position == 'left_right'){ ?>
				<div class="bt-sidebar bt-right-sidebar <?php echo esc_attr($sidebar_class); ?>">
					<?php echo get_sidebar('right'); ?>
				</div>
			<?php } ?>
			<!-- End Right Sidebar -->
		</div>
	</div>
<?php get_footer(); ?>
