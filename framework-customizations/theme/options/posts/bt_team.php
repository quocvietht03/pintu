<?php if ( ! defined( 'FW' ) ) die( 'Forbidden' );

$options = array(
	'team_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'team-meta' => array(
				'title' => esc_html__('Meta Fields', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'position' => array(
						'type'  => 'text',
						'value' => 'Ceo/Founder',
						'label' => esc_html__('Position', 'pintu'),
						'desc'  => esc_html__('Please, enter position of member.', 'pintu'),
					),
					'email' => array(
						'type'  => 'text',
						'value' => 'bearsthemes@gmail.com',
						'label' => esc_html__('Email', 'pintu'),
						'desc'  => esc_html__('Please, enter email of member.', 'pintu'),
					),
					'phone' => array(
						'type'  => 'text',
						'value' => '(1200)-0989-568-331',
						'label' => esc_html__('Phone', 'pintu'),
						'desc'  => esc_html__('Please, enter phone number of member.', 'pintu'),
					),
					
				),
			),
			'team-social' => array(
				'title' => esc_html__('Social', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'social' => array(
						'type'  => 'addable-popup',
						'value' => array(
							array(
								'title' => 'Facebook',
								'icon' => 'fa fa-facebook',
								'link' => '#'
							),
							array(
								'title' => 'Twitter',
								'icon' => 'fa fa-twitter',
								'link' => '#'
							),
							array(
								'title' => 'Google Plus',
								'icon' => 'fa fa-google-plus',
								'link' => '#'
							)
						),
						'label' => esc_html__('Social', 'pintu'),
						'desc'  => esc_html__('Please configs social of member', 'pintu'),
						'popup-options' => array(
							'title' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Title', 'pintu'),
								'desc'  => esc_html__('Please, enter title of social item.', 'pintu'),
							),
							'icon' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Icon', 'pintu'),
								'desc'  => esc_html__('Please, enter icon of social item.', 'pintu'),
							),
							'link' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Url(Link)', 'pintu'),
								'desc'  => esc_html__('Please, enter link of social item.', 'pintu'),
							)
						),
						'template' => '{{- title }}',
						'add-button-text' => esc_html__('Add', 'pintu'),
						'sortable' => true,
					)
					
				),
			),
			
		)
	)
	
);