<?php

$options = array(
	'elearning_button_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Button', 'elearning' ),
		'section'      => 'elearning_button',
		'sub_controls' => apply_filters(
			'elearning_button_sub_controls',
			array(
				'elearning_button_general_heading'        => array(
					'type'     => 'customind-title',
					'title'    => esc_html__( 'General', 'elearning' ),
					'priority' => 5,
					'section'  => 'elearning_button',
				),
				'elearning_button_color_group'            => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Color', 'elearning' ),
					'section'      => 'elearning_button',
					'priority'     => 5,
					'sub_controls' => array(
						'elearning_button_text_color' => array(
							'default'   => '#ffffff',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_button',
						),
						'elearning_button_text_hover_color' => array(
							'default'   => '#ffffff',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_button',
						),
					),
				),
				'elearning_button_background_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Background', 'elearning' ),
					'section'      => 'elearning_button',
					'priority'     => 10,
					'sub_controls' => array(
						'elearning_button_bg_color'       => array(
							'default'   => '#269bd1',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_button',
						),
						'elearning_button_bg_hover_color' => array(
							'default'   => '#1e7ba6',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_button',
						),
					),
				),
				'elearning_button_padding'                => array(
					'default'     => array(
						'top'    => '10',
						'right'  => '15',
						'bottom' => '10',
						'left'   => '15',
						'unit'   => 'px',
					),
					'priority'    => 20,
					'type'        => 'customind-dimensions',
					'title'       => esc_html__( 'Padding', 'elearning' ),
					'section'     => 'elearning_button',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em', '%', 'rem' ),
					'defaultUnit' => 'px',
				),
				'elearning_button_border_radius_divider'  => array(
					'type'     => 'customind-divider',
					'variant'  => 'dashed',
					'priority' => 40,
					'section'  => 'elearning_button',
				),
				'elearning_button_border_radius_heading'  => array(
					'type'     => 'customind-title',
					'title'    => esc_html__( 'Border', 'elearning' ),
					'priority' => 40,
					'section'  => 'elearning_button',
				),
				'elearning_button_roundness'              => array(
					'title'       => esc_html__( 'Radius', 'elearning' ),
					'default'     => array(
						'size' => 0,
						'unit' => 'px',
					),
					'priority'    => 55,
					'type'        => 'customind-slider',
					'section'     => 'elearning_button',
					'transport'   => 'postMessage',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_button_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
