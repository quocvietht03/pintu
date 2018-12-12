<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'post_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'post_general' => array(
				'title' => esc_html__('General', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'titlebar_background' => array(
						'label' => esc_html__( 'Title Bar Background', 'pintu' ),
						'desc'  => esc_html__( 'Upload title bar background image.', 'pintu' ),
						'type'  => 'upload',
					),
				),
			),
			'post_gallery' => array(
				'title' => esc_html__('Gallery', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'gallery_images' => array(
						'label' => esc_html__( 'Add Images', 'pintu' ),
						'desc'  => esc_html__( 'Upload gallery images.', 'pintu' ),
						'type'  => 'multi-upload',
					),
				),
			),
			'post_video' => array(
				'title' => esc_html__('Video', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'video_url' => array(
						'label' => esc_html__( 'Video Url', 'pintu' ),
						'desc'  => esc_html__( 'Please video url(vimeo/youtube/mp4). Ex: https://www.youtube.com/embed/YE7VzlLtp-4?rel=0', 'pintu' ),
						'type'  => 'text',
					),
					'video_poster' => array(
						'label' => esc_html__( 'Add Image', 'pintu' ),
						'desc'  => esc_html__( 'Upload video poster image.', 'pintu' ),
						'type'  => 'upload',
					),
					'video_caption' => array(
						'label' => esc_html__( 'Video Caption', 'pintu' ),
						'desc'  => esc_html__( 'Please video caption.', 'pintu' ),
						'type'  => 'text',
					),
				),
			),
			'post_audio' => array(
				'title' => esc_html__('Audio', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'audio_type' => array(
						'type' => 'multi-picker',
						'label' => false,
						'desc' => false,
						'picker' => array(
							'type' => array(
								'type' => 'short-select',
								'label' => esc_html__('Audio Types', 'pintu'),
								'desc' => esc_html__('Choose the audio type.', 'pintu'),
								'value' => 'html5',
								'choices' => array(
									'html5' => esc_html__('HTML5', 'pintu'),
									'embed' => esc_html__('Embed', 'pintu')
								),
							),
						),
						'choices' => array(
							'html5' => array(
								'format' => array(
									'type'  => 'short-select',
									'value' => 'mp3',
									'label' => esc_html__('Format', 'pintu'),
									'desc'  => esc_html__('Choose the audio format.', 'pintu'),
									'choices' => array(
										'audio/mpeg' => esc_html__('MP3', 'pintu'),
										'audio/ogg' => esc_html__('Ogg', 'pintu'),
										'audio/wav' => esc_html__('Wav', 'pintu')
									)
								),
								'src' => array(
									'label' => esc_html__('Src', 'pintu'),
									'desc' => esc_html__('Enter url audio (Ex: http://yourdomain.com/audio.mp3)', 'pintu'),
									'type' => 'text',
									'value' => ''
								),
							),
							'embed' => array(
								'iframe' => array(
									'label' => esc_html__('Embed', 'pintu'),
									'desc' => esc_html__('Please enter embed code(SoundCloud, ...)', 'pintu'),
									'type' => 'textarea',
									'value' => '',
								),
							),
							
						),
					),
				),
			) ,
			'post_quote' => array(
				'title' => esc_html__('Quote', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'quote_text' => array(
						'label' => esc_html__( 'Quote Text', 'pintu' ),
						'desc'  => esc_html__( 'Please enter quote.', 'pintu' ),
						'type'  => 'textarea',
					),
				),
			),
			'post_link' => array(
				'title' => esc_html__('Link', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'url' => array(
						'label' => esc_html__( 'Url', 'pintu' ),
						'desc'  => esc_html__( 'Please enter url.', 'pintu' ),
						'type'  => 'text',
					),
				),
			),
			
		),
	),
	
);
