<?php
/*
Template Name: 404 Template
*/
?>
<?php get_header(); pintu_titlebar(); ?>
	<div class="bt-main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="bt-error404-wrap">
						<h3><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'pintu'); ?></h3>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>