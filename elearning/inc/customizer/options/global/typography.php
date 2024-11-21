<?php

$options = apply_filters(
	'elearning_typography_options',
	array(
		'elearning_body_typography_heading'     => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Body', 'elearning' ),
			'section'      => 'elearning_typography',
			'sub_controls' => apply_filters(
				'elearning_body_typography_sub_controls',
				array(
					'elearning_base_typography_body' => array(
						'default'   => array(
							'font-family'    => 'Default',
							'font-weight'    => '400',
							'font-size'      => array(
								'desktop' => array(
									'size' => '15',
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
						'title'     => esc_html__( 'Body', 'elearning' ),
						'section'   => 'elearning_typography',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_body_typography_accordion_collapsible', false ),
		),
		'elearning_headings_typography_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Headings', 'elearning' ),
			'section'      => 'elearning_typography',
			'sub_controls' => apply_filters(
				'zakar_headings_typography_sub_controls',
				array(
					'elearning_base_typography_heading' => array(
						'default'            => apply_filters(
							'elearning_base_typography_heading_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '400',
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
							)
						),
						'type'               => 'customind-typography',
						'title'              => esc_html__( 'Heading', 'elearning' ),
						'transport'          => 'postMessage',
						'section'            => 'elearning_typography',
						'allowed_properties' => array(
							'font-family',
							'font-weight',
							'line-height',
							'font-style',
							'text-transform',
						),
					),
					'elearning_typography_h1'           => array(
						'default'   => apply_filters(
							'elearning_typography_h1_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '500',
								'subsets'        => array( 'latin' ),
								'font-size'      => array(
									'desktop' => array(
										'size' => '2.5',
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
							)
						),
						'type'      => 'customind-typography',
						'transport' => 'postMessage',
						'title'     => esc_html__( 'H1', 'elearning' ),
						'section'   => 'elearning_typography',
					),
					'elearning_typography_h2'           => array(
						'default'   => apply_filters(
							'elearning_typography_h2_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '500',
								'subsets'        => array( 'latin' ),
								'font-size'      => array(
									'desktop' => array(
										'size' => '2.5',
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
							)
						),
						'type'      => 'customind-typography',
						'transport' => 'postMessage',
						'title'     => esc_html__( 'H2', 'elearning' ),
						'section'   => 'elearning_typography',
					),
					'elearning_typography_h3'           => array(
						'default'   => apply_filters(
							'elearning_typography_h3_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '500',
								'subsets'        => array( 'latin' ),
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
							)
						),
						'type'      => 'customind-typography',
						'title'     => esc_html__( 'H3', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_typography',
					),
					'elearning_typography_h4'           => array(
						'default'   => apply_filters(
							'elearning_typography_h4_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '500',
								'subsets'        => array( 'latin' ),
								'font-size'      => array(
									'desktop' => array(
										'size' => '1.75',
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
							)
						),
						'type'      => 'customind-typography',
						'title'     => esc_html__( 'H4', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_typography',
					),
					'elearning_typography_h5'           => array(
						'default'   => apply_filters(
							'elearning_typography_h5_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '500',
								'subsets'        => array( 'latin' ),
								'font-size'      => array(
									'desktop' => array(
										'size' => '1.313',
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
							)
						),
						'type'      => 'customind-typography',
						'title'     => esc_html__( 'H5', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_typography',
					),
					'elearning_typography_h6'           => array(
						'default'   => apply_filters(
							'elearning_typography_h6_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '500',
								'subsets'        => array( 'latin' ),
								'font-size'      => array(
									'desktop' => array(
										'size' => '1.125',
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
							)
						),
						'type'      => 'customind-typography',
						'title'     => esc_html__( 'H6', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_typography',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_headings_typography_accordion_collapsible', false ),
		),
	),
);

elearning_customind()->add_controls( $options );
