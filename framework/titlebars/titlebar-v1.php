<?php
	global $pintu_options;
	$fullwidth = isset($pintu_options['titlebar_fullwidth'])&&$pintu_options['titlebar_fullwidth'] ? 'fullwidth': 'container';
	$titlebar_align = isset($pintu_options['titlebar_align']) ? $pintu_options['titlebar_align']: 'text-center';
?>
<div class="bt-titlebar bt-titlebar-v1">
	<div class="bt-titlebar-inner">
		<div class="bt-overlay"></div>
		<div class="bt-subheader">
			<div class="bt-subheader-inner <?php echo esc_attr($fullwidth); ?>">
				<div class="bt-subheader-cell bt-center">
					<div class="bt-content <?php echo esc_attr($titlebar_align); ?>">
						<div class="bt-page-title">
							<?php
								if(isset($pintu_options['titlebar_page_title_before'])&&$pintu_options['titlebar_page_title_before']&&isset($pintu_options['titlebar_page_title_before_content'])&&$pintu_options['titlebar_page_title_before_content']){
									echo '<div class="bt-before">'.$pintu_options['titlebar_page_title_before_content'].'</div>';
								}
							?>
							<h2><?php echo pintu_page_title(); ?></h2>
							<?php
								if(isset($pintu_options['titlebar_page_title_after'])&&$pintu_options['titlebar_page_title_after']&&isset($pintu_options['titlebar_page_title_after_content'])&&$pintu_options['titlebar_page_title_after_content']){
									echo '<div class="bt-after">'.$pintu_options['titlebar_page_title_after_content'].'</div>';
								}
							?>
						</div>
						<div class="bt-breadcrumb">
							<?php
								if(isset($pintu_options['titlebar_breadcrumb_before'])&&$pintu_options['titlebar_breadcrumb_before']&&isset($pintu_options['titlebar_breadcrumb_before_content'])&&$pintu_options['titlebar_breadcrumb_before_content']){
									echo '<div class="bt-before">'.$pintu_options['titlebar_breadcrumb_before_content'].'</div>';
								}
							?>
							<div class="bt-path">
								<?php
									$home_text = (isset($pintu_options['titlebar_breadcrumb_home_text'])&&$pintu_options['titlebar_breadcrumb_home_text'])?$pintu_options['titlebar_breadcrumb_home_text']: 'Home';
									$delimiter = (isset($pintu_options['titlebar_breadcrumb_delimiter'])&&$pintu_options['titlebar_breadcrumb_delimiter'])?$pintu_options['titlebar_breadcrumb_delimiter']: '-';
									
									echo pintu_page_breadcrumb($home_text, $delimiter);
								?>
							</div>
							<?php
								if(isset($pintu_options['titlebar_breadcrumb_after'])&&$pintu_options['titlebar_breadcrumb_after']&&isset($pintu_options['titlebar_breadcrumb_after_content'])&&$pintu_options['titlebar_breadcrumb_after_content']){
									echo '<div class="bt-after">'.$pintu_options['titlebar_breadcrumb_after_content'].'</div>';
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>