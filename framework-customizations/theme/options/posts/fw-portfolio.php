<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'portfolio_options' => array(
		'type' => 'multi',
		'label' => false,
		'inner-options' => array(
			'portfolio-layout' => array(
				'title' => esc_html__('Layout Settings', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'titlebar_background' => array(
						'label' => esc_html__( 'Title Bar Background', 'pintu' ),
						'desc'  => esc_html__( 'Upload title bar background image.', 'pintu' ),
						'type'  => 'upload',
					),
					'layout' => array(
						'type'  => 'select',
						'value' => 'default',
						'label' => esc_html__('Layout', 'pintu'),
						'desc'  => esc_html__('Select a layout of project', 'pintu'),
						'choices' => array(
							'default' => esc_html__('Default(Image Left)', 'pintu'),
							'layout1' => esc_html__('Layout 1(Image Top)', 'pintu'),
							'layout2' => esc_html__('Layout 2(Image Bottom)', 'pintu')
						)
					),
					'gallery-column' => array(
						'type'  => 'short-select',
						'value' => 'default',
						'label' => esc_html__('Select Gallery Columns', 'pintu'),
						'desc'  => esc_html__('Select gallery columns of project', 'pintu'),
						'choices' => array(
							'col-md-12' => esc_html__('1 Column', 'pintu'),
							'col-md-6' => esc_html__('2 Columns', 'pintu'),
							'col-md-4' => esc_html__('3 Columns', 'pintu'),
							'col-md-3' => esc_html__('4 Columns', 'pintu')
						)
					),
					'gallery-space' => array(
						'type'  => 'short-text',
						'value' => '30',
						'label' => esc_html__('Gallery Space', 'pintu'),
						'desc'  => esc_html__('Please, enter gallery space of project.', 'pintu'),
					),
				),
			),
			'portfolio-meta' => array(
				'title' => esc_html__('Meta Fields', 'pintu'),
				'type' => 'tab',
				'options' => array(
					'infor-title' =>  array( 
						'type' => 'text',
						'value' => 'Infomation',
						'label' => esc_html__('Info Title', 'pintu'),
						'desc'  => esc_html__('Please, enter info title of project.', 'pintu'),
					),
					'info-option' => array(
						'type'  => 'addable-popup',
						'value' => array(
							array(
								'title' => 'Client:',
								'value' => 'Bearsthemes'
							),
							array(
								'title' => 'Date:',
								'value' => 'May 14, 2018'
							),
							array(
								'title' => 'Tags:',
								'value' => 'photography, agency, creative'
							),
							array(
								'title' => 'Project Type:',
								'value' => 'Multipurpose Template'
							)
						),
						'label' => esc_html__('Info Option', 'pintu'),
						'desc'  => esc_html__('Please configs info option of project', 'pintu'),
						'popup-options' => array(
							'title' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Title', 'pintu'),
								'desc'  => esc_html__('Please, enter title of project item.', 'pintu'),
							),
							'value' => array( 
								'type' => 'text',
								'value' => '',
								'label' => esc_html__('Value', 'pintu'),
								'desc'  => esc_html__('Please, enter value of project item.', 'pintu'),
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