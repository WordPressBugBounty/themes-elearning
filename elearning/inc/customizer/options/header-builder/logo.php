<?php

$options = array(
	'elearning_header_site_identity_general_heading' => array(
		'type'     => 'customind-title',
		'title'    => esc_html__( 'Site Identity', 'elearning' ),
		'section'  => 'elearning_header_builder_logo',
		'priority' => 3,
	),
	'elearning_header_site_logo_heading'             => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Site Logo', 'elearning' ),
		'section'      => 'elearning_header_builder_logo',
		'priority'     => 9,
		'sub_controls' => apply_filters(
			'elearning_header_site_logo_sub_controls',
			array(
				'custom_logo'                       => array(
					'type'        => 'customind-image',
					'title'       => esc_html__( 'Logo', 'elearning' ),
					'section'     => 'elearning_header_builder_logo',
					'input_attrs' => array(
						'crop' => array(
							'width'  => 170,
							'height' => 60,
						),
					),
				),
				'elearning_retina_logo'             => array(
					'type'        => 'customind-image',
					'title'       => esc_html__( 'Retina Logo', 'elearning' ),
					'section'     => 'elearning_header_builder_logo',
					'description' => esc_html__( 'Upload 2X times the size of your current logo. Eg: If your current logo size is 120*60 then upload 240*120 sized logo.', 'elearning' ),

				),
				'elearning_header_site_logo_height' => array(
					'default'     => array(
						'size'  => '',
						'units' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Height', 'elearning' ),
					'transport'   => 'postMessage',
					'section'     => 'elearning_header_builder_logo',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 400,
						'step' => 1,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_site_logo_accordion_collapsible', false ),
	),
	'elearning_header_site_identity_heading'         => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Site Title', 'elearning' ),
		'section'      => 'elearning_header_builder_logo',
		'priority'     => 11,
		'sub_controls' => apply_filters(
			'elearning_header_site_identity_sub_controls',
			array(
				'elearning_enable_site_identity'         => array(
					'title'    => esc_html__( 'Enable', 'elearning' ),
					'default'  => true,
					'type'     => 'customind-toggle',
					'section'  => 'elearning_header_builder_logo',
					'priority' => 10,
				),
				'elearning_header_site_identity_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Color', 'elearning' ),
					'section'      => 'elearning_header_builder_logo',
					'sub_controls' => apply_filters(
						'elearning_header_site_identity_color_sub_controls',
						array(
							'elearning_header_site_identity_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Normal', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_colors',
							),
						)
					),
					'condition'    => array(
						'elearning_enable_site_identity' => true,
					),
				),
				'elearning_header_site_title_typography' => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => '400',
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
								'size' => '1.5',
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
					'title'     => esc_html__( 'Typography', 'elearning' ),
					'section'   => 'elearning_header_builder_logo',
					'transport' => 'postMessage',
					'priority'  => 14,
					'condition' => array(
						'elearning_enable_site_identity' => true,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_site_identity_accordion_collapsible', false ),
	),
	'elearning_header_tagline_heading'               => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Tagline', 'elearning' ),
		'section'      => 'elearning_header_builder_logo',
		'priority'     => 11,
		'sub_controls' => apply_filters(
			'elearning_tagline_sub_controls',
			array(
				'elearning_enable_site_tagline'            => array(
					'default'  => true,
					'type'     => 'customind-toggle',
					'title'    => 'Enable',
					'section'  => 'elearning_header_builder_logo',
					'priority' => 16,
				),
				'elearning_header_site_tagline_color'      => array(
					'title'     => esc_html__( 'Color', 'elearning' ),
					'default'   => '',
					'type'      => 'customind-color',
					'section'   => 'elearning_header_builder_logo',
					'transport' => 'postMessage',
					'priority'  => 16,
					'condition' => array(
						'elearning_enable_site_tagline' => true,
					),
				),
				'elearning_header_site_tagline_typography' => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => '400',
						'subsets'        => array( 'latin' ),
						'font-size'      => array(
							'desktop' => array(
								'size' => '1',
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
					'title'     => esc_html__( 'Typography', 'elearning' ),
					'section'   => 'elearning_header_builder_logo',
					'transport' => 'postMessage',
					'priority'  => 18,
					'condition' => array(
						'elearning_enable_site_tagline' => true,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_tagline_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
