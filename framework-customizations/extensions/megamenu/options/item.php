<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'mega_menu_item_type' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'type' => array(
				'type' => 'short-select',
				'label' => esc_html__( 'Type', 'pintu' ),
				'desc' => esc_html__( 'Please select menu type', 'pintu' ),
				'value' => '',
				'choices' => array(
					'default' => esc_html__('Default', 'pintu'),
					'sidebar' => esc_html__('Sidebar', 'pintu'),
				),
			),
		),
		'choices' => array(
			'sidebar' => array(
				'sidebar_id' => array(
					'type' => 'select',
					'label' => esc_html__( 'Sidebar', 'pintu' ),
					'desc' => esc_html__( 'Please select sitebar', 'pintu' ),
					'value' => '',
					'choices' => pintu_get_sidebars(),
				),
			),
		),
	),
	'badge' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'selected' => array(
				'type' => 'switch',
				'value' => 'no',
				'label' => esc_html__('Badge', 'pintu'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'pintu'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'pintu'),
				)
			),
		),
		'choices' => array(
			'yes' => array(
				'badge_group' => array(
					'type' => 'group',
					'attr' => array('class' => ''),
					'options' => array(
						'badge_text' => array(
							'type' => 'short-text',
							'html' => '',
							'value' => '',
							'label' => esc_html__('Text', 'pintu'),
						),
						'badge_background_color' => array(
							'value' => '#E23F3F',
							'type' => 'color-picker',
							'label' => esc_html__('Background Color', 'pintu'),
						),
						'badge_color' => array(
							'value' => '#FFFFFF',
							'type' => 'color-picker',
							'label' => esc_html__('Color', 'pintu'),
						),
					),
				),
			),
		),
	),
);
