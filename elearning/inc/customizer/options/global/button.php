<?php

$options = array(
	'elearning_button_color_group'            => array(
		'type'         => 'customind-color-group',
		'title'        => esc_html__( 'Color', 'elearning' ),
		'section'      => 'elearning_button',
		'sub_controls' => array(
			'elearning_button_text_color'       => array(
				'default' => 'var(--elearning-color-3)',
				'type'    => 'customind-color',
				'title'   => esc_html__( 'Normal', 'elearning' ),
				'section' => 'elearning_button',
			),
			'elearning_button_text_hover_color' => array(
				'default' => 'var(--elearning-color-3)',
				'type'    => 'customind-color',
				'title'   => esc_html__( 'Hover', 'elearning' ),
				'section' => 'elearning_button',
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
				'default' => 'var(--elearning-color-1)',
				'type'    => 'customind-color',
				'title'   => esc_html__( 'Normal', 'elearning' ),
				'section' => 'elearning_button',
			),
			'elearning_button_bg_hover_color' => array(
				'default' => 'var(--elearning-color-2)',
				'type'    => 'customind-color',
				'title'   => esc_html__( 'Hover', 'elearning' ),
				'section' => 'elearning_button',
			),
		),
	),
	'elearning_button_typography'             => array(
		'default'   => array(
			'font-family'    => 'inherit',
			'font-weight'    => '400',
			'subsets'        => array( 'latin' ),
			'font-size'      => array(
				'desktop' => array(
					'size' => '',
					'unit' => 'px',
				),
				'tablet'  => array(
					'size' => '',
					'unit' => '',
				),
				'mobile'  => array(
					'size' => '',
					'unit' => '',
				),
			),
			'line-height'    => array(
				'desktop' => array(
					'size' => '1.8',
					'unit' => '-',
				),
				'tablet'  => array(
					'size' => '',
					'unit' => '',
				),
				'mobile'  => array(
					'size' => '',
					'unit' => '',
				),
			),
			'font-style'     => 'normal',
			'text-transform' => 'none',
		),
		'type'      => 'customind-typography',
		'transport' => 'postMessage',
		'title'     => esc_html__( 'Typography', 'elearning' ),
		'section'   => 'elearning_button',
	),
	'elearning_button_padding'                => array(
		'default'     => array(
			'top'    => '10',
			'right'  => '15',
			'bottom' => '10',
			'left'   => '15',
			'unit'   => 'px',
		),
		'type'        => 'customind-dimensions',
		'title'       => esc_html__( 'Padding', 'elearning' ),
		'section'     => 'elearning_button',
		'transport'   => 'postMessage',
		'units'       => array( 'px', 'em', '%', 'rem' ),
		'defaultUnit' => 'px',
	),
	'elearning_button_border_radius_divider'  => array(
		'type'    => 'customind-divider',
		'variant' => 'dashed',
		'section' => 'elearning_button',
	),
	'elearning_button_border_radius_heading'  => array(
		'type'    => 'customind-title',
		'title'   => esc_html__( 'Border', 'elearning' ),
		'section' => 'elearning_button',
	),
	'elearning_button_border_width'           => array(
		'default'     => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
			'unit'   => 'px',
		),
		'type'        => 'customind-dimensions',
		'title'       => esc_html__( 'Border Width', 'elearning' ),
		'section'     => 'elearning_button',
		'units'       => array( 'px', 'em' ),
		'defaultUnit' => 'px',
	),
	'elearning_button_border_color'           => array(
		'default' => '',
		'type'    => 'customind-color',
		'title'   => esc_html__( 'Border Color', 'elearning' ),
		'section' => 'elearning_button',
	),
	'elearning_button_roundness'              => array(
		'title'       => esc_html__( 'Radius', 'elearning' ),
		'default'     => array(
			'size' => 2,
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
			'max'  => 200,
			'step' => 1,
		),
	),
);

elearning_customind()->add_controls( $options );
