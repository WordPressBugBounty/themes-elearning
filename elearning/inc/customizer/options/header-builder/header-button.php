<?php

$options = array(
	'elearning_header_button_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Button 1', 'elearning' ),
		'section'      => 'elearning_header_builder_button_1',
		'sub_controls' => apply_filters(
			'elearning_header_button_sub_controls',
			array(
				'elearning_header_button_text'          => array(
					'default' => '',
					'title'   => esc_html__( 'Text', 'elearning' ),
					'type'    => 'customind-text',
					'section' => 'elearning_header_builder_button_1',
				),
				'elearning_header_button_link'          => array(
					'default'     => '',
					'title'       => esc_html__( 'Link', 'elearning' ),
					'type'        => 'customind-text',
					'section'     => 'elearning_header_builder_button_1',
					'input_attrs' => array(
						'placeholder' => esc_attr__( 'https://example.com', 'elearning' ),
					),
				),
				'elearning_header_button_target'        => array(
					'default' => false,
					'title'   => esc_html__( 'Open link in a new tab', 'elearning' ),
					'type'    => 'customind-toggle',
					'section' => 'elearning_header_builder_button_1',
				),
				'elearning_header_button_color_group'   => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Color', 'elearning' ),
					'section'      => 'elearning_header_builder_button_1',
					'sub_controls' => array(
						'elearning_header_button_color' => array(
							'default'   => '#ffffff',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_button_1',
						),
						'elearning_header_button_hover_color' => array(
							'default'   => '#ffffff',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_button_1',
						),
					),
				),
				'elearning_header_button_background_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Background', 'elearning' ),
					'section'      => 'elearning_header_builder_button_1',
					'sub_controls' => array(
						'elearning_header_button_background_color'       => array(
							'default'   => '#027abb',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_button_1',
						),
						'elearning_header_button_background_hover_color' => array(
							'default'   => '#ffffff',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_button_1',
						),
					),
				),
				'elearning_header_button_typography'    => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => '400',
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
					'section'   => 'elearning_header_builder_button_1',
				),
				'elearning_header_button_padding'       => array(
					'default'     => array(
						'top'    => '5',
						'right'  => '10',
						'bottom' => '5',
						'left'   => '10',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => esc_html__( 'Padding', 'elearning' ),
					'section'     => 'elearning_header_builder_button_1',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em', '%' ),
					'defaultUnit' => 'px',
				),
				'elearning_header_button_border_width'  => array(
					'default'     => array(
						'top'    => '',
						'right'  => '',
						'bottom' => '',
						'left'   => '',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => esc_html__( 'Border Width', 'elearning' ),
					'section'     => 'elearning_header_builder_button_1',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em' ),
					'defaultUnit' => 'px',
				),
				'elearning_header_button_border_color'  => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Border Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_button_1',
				),
				'elearning_header_button_border_radius' => array(
					'default'     => array(
						'size'  => '',
						'units' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Border Radius', 'elearning' ),
					'section'     => 'elearning_header_builder_button_1',
					'transport'   => 'postMessage',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 200,
						'step' => 1,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_button_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
