<?php

$options = apply_filters(
	'elearning_header_button_options',
	array(
		'elearning_header_button_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Button 1', 'elearning' ),
			'section'      => 'elearning_header_button',
			'sub_controls' => apply_filters(
				'elearning_header_button_sub_controls',
				array(
					'elearning_header_button_general_heading' => array(
						'type'    => 'customind-title',
						'title'   => esc_html__( 'General', 'elearning' ),
						'section' => 'elearning_header_button',
					),
					'elearning_header_button_text'        => array(
						'default' => '',
						'title'   => esc_html__( 'Text', 'elearning' ),
						'type'    => 'customind-text',
						'section' => 'elearning_header_button',
					),
					'elearning_header_button_link'        => array(
						'default'     => '',
						'title'       => esc_html__( 'Link', 'elearning' ),
						'type'        => 'customind-text',
						'section'     => 'elearning_header_button',
						'input_attrs' => array(
							'placeholder' => esc_attr__( 'https://example.com', 'elearning' ),
						),
					),
					'elearning_header_button_target'      => array(
						'default' => false,
						'title'   => esc_html__( 'Open link in a new tab', 'elearning' ),
						'type'    => 'customind-toggle',
						'section' => 'elearning_header_button',
					),
					'elearning_header_button_style_divider' => array(
						'type'    => 'customind-divider',
						'section' => 'elearning_menu',
					),
					'elearning_header_button_style'       => array(
						'type'    => 'customind-title',
						'title'   => esc_html__( 'Style', 'elearning' ),
						'section' => 'elearning_menu',
					),
					'elearning_header_button_color_group' => array(
						'type'         => 'customind-color-group',
						'title'        => esc_html__( 'Color', 'elearning' ),
						'section'      => 'elearning_header_button',
						'sub_controls' => array(
							'elearning_header_button_text_color' => array(
								'default' => '#ffffff',
								'type'    => 'customind-color',
								'title'   => esc_html__( 'Normal', 'elearning' ),
								'section' => 'elearning_header_button',
							),
							'elearning_header_button_text_hover_color' => array(
								'default' => '#ffffff',
								'type'    => 'customind-color',
								'title'   => esc_html__( 'Hover', 'elearning' ),
								'section' => 'elearning_header_button',
							),
						),
					),
					'elearning_header_button_background_color_group' => array(
						'type'         => 'customind-color-group',
						'title'        => esc_html__( 'Background', 'elearning' ),
						'section'      => 'elearning_header_button',
						'sub_controls' => array(
							'elearning_header_button_bg_color'       => array(
								'default' => 'var(--elearning-color-1, #269bd1)',
								'type'    => 'customind-color',
								'title'   => esc_html__( 'Normal', 'elearning' ),
								'section' => 'elearning_header_button',
							),
							'elearning_header_button_bg_hover_color' => array(
								'default' => '#1e7ba6',
								'type'    => 'customind-color',
								'title'   => esc_html__( 'Hover', 'elearning' ),
								'section' => 'elearning_header_button',
							),
						),
					),
					'elearning_header_button_padding'     => array(
						'default'     => array(
							'top'    => '5',
							'right'  => '10',
							'bottom' => '5',
							'left'   => '10',
							'unit'   => 'px',
						),
						'type'        => 'customind-dimensions',
						'title'       => esc_html__( 'Padding', 'elearning' ),
						'section'     => 'elearning_header_button',
						'priority'    => 20,
						'units'       => array( 'px', 'em', '%' ),
						'defaultUnit' => 'px',
					),
					'elearning_header_button_border_divider' => array(
						'type'     => 'customind-divider',
						'section'  => 'elearning_menu',
						'priority' => 20,
					),
					'elearning_header_button_border_heading' => array(
						'type'     => 'customind-title',
						'title'    => esc_html__( 'Border', 'elearning' ),
						'section'  => 'elearning_menu',
						'priority' => 20,
					),
					'elearning_header_button_roundness'   => array(
						'default'     => array(
							'size'  => 0,
							'units' => 'px',
						),
						'type'        => 'customind-slider',
						'title'       => esc_html__( 'Radius', 'elearning' ),
						'section'     => 'elearning_header_button',
						'priority'    => 35,
						'units'       => array( 'px' ),
						'defaultUnit' => 'px',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 30,
							'step' => 1,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_header_button_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
