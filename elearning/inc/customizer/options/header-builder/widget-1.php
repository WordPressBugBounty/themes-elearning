<?php

$options = array(
	'elearning_header_builder_widget_1_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Widget 1', 'elearning' ),
		'section'      => 'elearning_header_builder_widget_1',
		'sub_controls' => apply_filters(
			'elearning_header_builder_widget_1_sub_controls',
			array(
				'elearning_widget_1_title_color'           => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Title Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_widget_1',
				),
				'elearning_widget_1_title_typography'      => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => '400',
						'font-size'      => array(
							'desktop' => array(
								'size' => '2',
								'unit' => 'rem',
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
								'size' => '1.3',
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
					'title'     => esc_html__( 'Title Typography', 'elearning' ),
					'section'   => 'elearning_header_builder_widget_1',
				),
				'elearning_widget_1_link_divider'          => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_blog',
				),
				'elearning_widget_1_link_color'            => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Link', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_widget_1',
				),
				'elearning_widget_1_content_color_divider' => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_blog',
				),
				'elearning_widget_1_content_color'         => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Content Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_widget_1',
				),
				'elearning_widget_1_content_typography'    => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => '400',
						'font-size'      => array(
							'desktop' => array(
								'size' => '1.4',
								'unit' => 'rem',
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
					'title'     => esc_html__( 'Content Typography', 'elearning' ),
					'section'   => 'elearning_header_builder_widget_1',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_builder_widget_1_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
