<?php
// Portfolio
Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Portfolio', 'pintu' ),
	'id'               => 'bt_portfolio',
	'icon'             => 'el el-folder-open',
	'fields'           => array(
		array(
			'id'       => 'portfolio_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to have the content area display at 100% width according to the window size. Turn off to follow site width.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'portfolio_fullwidth_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Full Width Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the left/right padding the content area display.', 'pintu' ),
			'default'  => array(
				'padding-left'    => '15px',
				'padding-right' => '15px'
			),
			'required' 		=> array('portfolio_fullwidth' , '=', '1'),
			'output'    => array('.tax-fw-portfolio-category .bt-main-content')
		),
		array(
			'id'            => 'portfolio_columns',
			'type'          => 'slider',
			'title'         => esc_html__( 'Columns', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the number columns of list items.', 'pintu' ),
			'default'       => 1,
			'min'           => 1,
			'step'          => 1,
			'max'           => 4,
			'display_value' => 'text'
		),
		array(
			'id'            => 'portfolio_sidebar_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Sidebar Width', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the width of the left/right sidebar.', 'pintu' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 5,
			'display_value' => 'text'
		),
		array(
			'id'       => 'portfolio_titlebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Title Bar', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to display the title bar.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_titlebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Title Bar Background', 'pintu' ),
			'subtitle' => esc_html__( 'Control the background of the title bar.', 'pintu' ),
			'default'  => array(
				'background-color' => '#333333',
			),
			'required' 	=> array('portfolio_titlebar' , '=', '1'),
			'output'    => array('.tax-fw-portfolio-category .bt-titlebar .bt-titlebar-inner'),
		),
		array(
			'id'       => 'portfolio_content_sapce',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Main Content Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the content.', 'pintu' ),
			'default'  => array(
				'padding-top' => '0px',
				'padding-bottom' => '0px'
			),
			'output'   => array('.tax-fw-portfolio-category .bt-main-content')
		),
		array(
			'id'    => 'portfolio_post_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Post Settings', 'pintu' ),
			'desc'  => esc_html__( 'This is the options you can change the post on the portfolio page.', 'pintu' )
		),
		array(
			'id'       => 'portfolio_title',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Title', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to display the post title.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Title Typography', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography post title.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'default'  => array(
				'font-size'   => '28px',
				'font-family' => 'Poppins',
				'font-weight' => '700',
				'line-height' => '40px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('portfolio_title' , '=', '1'),
			'output'   => array('.tax-fw-portfolio-category .bt-post-item .bt-title')
		),
		array(
			'id'       => 'portfolio_featured',
			'type'     => 'switch',
			'title'    => esc_html__( 'Featured Image / Video', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the image / video.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_image_size',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Size', 'pintu' ),
			'subtitle' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'pintu' ),
			'default'  => 'full',
			'required' 		=> array('portfolio_featured' , '=', '1')
		),
		array(
			'id'       => 'portfolio_meta',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_meta_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Meta Typography', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography post meta.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'default'  => array(
				'font-size'   => '14px',
				'font-family' => 'Poppins',
				'font-weight' => '400',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('portfolio_meta' , '=', '1'),
			'output'   => array('.tax-fw-portfolio-category .bt-post-item .bt-meta > li')
		),
		array(
			'id'       => 'portfolio_meta_author',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Author', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field author.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('portfolio_meta' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_meta_date',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Date', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field author.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('portfolio_meta' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_meta_category',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Meta Field Category', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the meta field category.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('portfolio_meta' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_excerpt',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Excerpt', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the excerpt.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_excerpt_length',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Excerpt Length', 'pintu' ),
			'subtitle' => esc_html__( 'Please, Enter excerpt length number. Leave empty to use "55" for excerpt lenght.', 'pintu' ),
			'default'  => '55',
			'required' 		=> array('portfolio_excerpt' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_excerpt_more',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Excerpt More', 'pintu' ),
			'subtitle' => esc_html__( 'Please, Enter excerpt more. Leave empty to use "[...]" for excerpt more.', 'pintu' ),
			'default'  => '[...]',
			'required' 		=> array('portfolio_excerpt' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_readmore',
			'type'     => 'switch',
			'title'    => esc_html__( 'Read More button', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the read more button.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'portfolio_readmore_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Read More Button Typography', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography post read more button.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'default'  => array(
				'font-size'   => '14px',
				'font-family' => 'Poppins',
				'font-weight' => '700',
				'line-height' => '24px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('portfolio_readmore' , '=', '1'),
			'output'   => array('.tax-fw-portfolio-category .bt-post-item .bt-readmore')
		),
		array(
			'id'       => 'portfolio_readmore_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Meta Field Category Label', 'pintu' ),
			'subtitle' => esc_html__( 'Please, Enter label of the label read more button. Leave empty to use "Read More" label.', 'pintu' ),
			'default'  => 'Read More',
			'required' 		=> array('portfolio_readmore' , '=', '1'),
		),
		array(
			'id'       => 'portfolio_article_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Post Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the bottom margin the post.', 'pintu' ),
			'default'  => array(
				'margin-bottom' => '40px'
			),
			'output'    => array('.tax-fw-portfolio-category .bt-post-item')
		),
		
	)
) );

Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Single Portfolio', 'pintu' ),
	'id'               => 'bt_single_portolio',
	'subsection'       => true,
	'fields'           => array(
		array(
			'id'       => 'single_portolio_fullwidth',
			'type'     => 'switch',
			'title'    => esc_html__( 'Full Width (100%)', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to have the content area display at 100% width according to the window size. Turn off to follow site width.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'single_portolio_fullwidth_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'top'      => false,
			'bottom'   => false,
			'title'    => esc_html__( 'Full Width Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the left/right padding the content area display.', 'pintu' ),
			'default'  => array(
				'padding-left'    => '15px',
				'padding-right' => '15px'
			),
			'required' 		=> array('single_portolio_fullwidth' , '=', '1'),
			'output'    => array('.single-fw-portfolio .bt-main-content')
		),
		array(
			'id'            => 'single_portolio_sidebar_width',
			'type'          => 'slider',
			'title'         => esc_html__( 'Sidebar Width', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the width of the left/right sidebar.', 'pintu' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 5,
			'display_value' => 'text'
		),
		array(
			'id'       => 'single_portfolio_titlebar',
			'type'     => 'switch',
			'title'    => esc_html__( 'Title Bar', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to display the title bar.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'single_portolio_titlebar_bg',
			'type'     => 'background',
			'title'    => esc_html__( 'Title Bar Background', 'pintu' ),
			'subtitle' => esc_html__( 'Control the background of the title bar.', 'pintu' ),
			'default'  => array(
				'background-color' => '#333333',
			),
			'required' 	=> array('single_portfolio_titlebar' , '=', '1'),
			'output'    => array('.single-fw-portfolio .bt-titlebar .bt-titlebar-inner'),
		),
		array(
			'id'       => 'single_portfolio_content_sapce',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'padding',
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Main Content Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the top/bottom padding the content.', 'pintu' ),
			'default'  => array(
				'padding-top' => '0px',
				'padding-bottom' => '0px'
			),
			'output'   => array('.single-fw-portfolio .bt-main-content')
		),
		array(
			'id'    => 'single_portfolio_info',
			'type'  => 'info',
			'style' => 'info',
			'title' => esc_html__( 'Post Settings', 'pintu' ),
			'desc'  => esc_html__( 'This is the options you can change the post on the blog page or archive pages.', 'pintu' )
		),
		array(
			'id'       => 'single_portfolio_title',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Title', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to display the post title.', 'pintu' ),
			'default'  => false
		),
		array(
			'id'       => 'single_portfolio_title_font',
			'type'     => 'typography',
			'title'    => esc_html__( 'Post Title Typography', 'pintu' ),
			'subtitle' => esc_html__( 'These settings control the typography post title.', 'pintu' ),
			'subsets'   => false,
			'letter-spacing'   => true,
			'text-align'   => false,
			'text-transform'   => true,
			'color'   => false,
			'default'  => array(
				'font-size'   => '24px',
				'font-family' => 'Poppins',
				'font-weight' => '700',
				'line-height' => '28px',
				'letter-spacing' => '0'
			),
			'required' 		=> array('single_portfolio_title' , '=', '1'),
			'output'   => array('.single-fw-portfolio .fw-portfolio .bt-title')
		),
		array(
			'id'       => 'single_portfolio_image_size',
			'type'     => 'text',
			'title'    => esc_html__( 'Image Size', 'pintu' ),
			'subtitle' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "full" size.', 'pintu' ),
			'default'  => 'full'
		),
		array(
			'id'       => 'single_portfolio_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Post Shares', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the share.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'single_portfolio_share_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Post Share Label', 'pintu' ),
			'subtitle' => esc_html__( 'Please, Enter label of the share. Leave empty to use "Share:" label.', 'pintu' ),
			'default'  => 'Share',
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_facebook',
			'type'     => 'switch',
			'title'    => esc_html__( 'Facebook', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the facebook share.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_twitter',
			'type'     => 'switch',
			'title'    => esc_html__( 'Twitter', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the twitter share.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_google_plus',
			'type'     => 'switch',
			'title'    => esc_html__( 'Google Plus', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the google plus share.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_linkedin',
			'type'     => 'switch',
			'title'    => esc_html__( 'Linkedin', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the linkedin share.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_share_pinterest',
			'type'     => 'switch',
			'title'    => esc_html__( 'Pinterest', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the pinterest share.', 'pintu' ),
			'default'  => true,
			'required' 		=> array('single_portfolio_share' , '=', '1'),
		),
		array(
			'id'       => 'single_portolio_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Post Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the bottom margin the post.', 'pintu' ),
			'default'  => array(
				'margin-bottom' => '30px'
			),
			'output'    => array('.single-fw-portfolio .fw-portfolio')
		),
		array(
			'id'       => 'single_portfolio_related_post',
			'type'     => 'switch',
			'title'    => esc_html__( 'Related Post', 'pintu' ),
			'subtitle' => esc_html__( 'Turn on to show the related post.', 'pintu' ),
			'default'  => true
		),
		array(
			'id'       => 'single_portfolio_related_post_label',
			'type'     => 'text',
			'title'    => esc_html__( 'Related Post Label', 'pintu' ),
			'subtitle' => esc_html__( 'Please, Enter label of the related post. Leave empty to use "Portfolio Related" label.', 'pintu' ),
			'default'  => 'Portfolio Related',
			'required' 		=> array('single_portfolio_related_post' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_related_post_count',
			'type'     => 'text',
			'title'    => esc_html__( 'Related Post Count', 'pintu' ),
			'subtitle' => esc_html__( 'Please, Enter post count of the related post. Leave empty to use "3" for post count.', 'pintu' ),
			'default'  => '3',
			'required' 		=> array('single_portfolio_related_post' , '=', '1'),
		),
		array(
			'id'            => 'single_portfolio_related_post_per_row',
			'type'          => 'slider',
			'title'         => esc_html__( 'Related Post Per Row', 'pintu' ),
			'subtitle'      => esc_html__( 'Controls the post per row of the related post.', 'pintu' ),
			'default'       => 3,
			'min'           => 1,
			'step'          => 1,
			'max'           => 4,
			'display_value' => 'text',
			'required' 		=> array('single_portfolio_related_post' , '=', '1'),
		),
		array(
			'id'       => 'single_portfolio_related_space',
			'type'     => 'spacing',
			'units'    => array( 'em', 'px', '%' ),
			'mode'     => 'margin',
			'top'      => false,
			'right'   => false,
			'left'   => false,
			'title'    => esc_html__( 'Related Post Space', 'pintu' ),
			'subtitle' => esc_html__( 'Control the bottom margin the related post.', 'pintu' ),
			'default'  => array(
				'margin-bottom' => '30px'
			),
			'output'    => array('.single-fw-portfolio .bt-related')
		),
	)
) );
