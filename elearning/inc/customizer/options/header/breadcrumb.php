<?php

$options = apply_filters(
	'elearning_breadcrumbs_options',
	array(
		'elearning_breadcrumbs_heading'          => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Breadcrumbs', 'elearning' ),
			'section'      => 'elearning_breadcrumb',
			'sub_controls' => apply_filters(
				'elearning_breadcrumbs_sub_controls',
				array(
					'elearning_breadcrumbs_general_heading' => array(
						'type'    => 'customind-title',
						'title'   => esc_html__( 'General', 'elearning' ),
						'section' => 'elearning_breadcrumb',
					),
					'elearning_breadcrumbs'               => array(
						'title'   => esc_html__( 'Enable', 'elearning' ),
						'default' => true,
						'type'    => 'customind-toggle',
						'section' => 'elearning_breadcrumb',
					),
					'elearning_breadcrumbs_style_divider' => array(
						'type'     => 'customind-divider',
						'variant'  => 'dashed',
						'section'  => 'elearning_breadcrumb',
						'priority' => 30,
					),
					'elearning_breadcrumbs_style_heading' => array(
						'type'     => 'customind-title',
						'title'    => esc_html__( 'Style', 'elearning' ),
						'section'  => 'elearning_breadcrumb',
						'priority' => 30,
					),
					'elearning_breadcrumb_typography'     => array(
						'default'   => apply_filters(
							'elearning_breadcrumb_typography_filter',
							array(
								'font-family' => 'Default',
								'font-weight' => '500',
								'font-size'   => array(
									'desktop' => array(
										'size' => '16',
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
							)
						),
						'type'      => 'customind-typography',
						'title'     => esc_html__( 'Typography', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_breadcrumb',
						'priority'  => 30,
						'condition' => array(
							'elearning_breadcrumbs' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_breadcrumbs_accordion_collapsible', false ),
		),
		'elearning_breadcrumb_text_heading'      => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Text', 'elearning' ),
			'section'      => 'elearning_breadcrumb',
			'sub_controls' => apply_filters(
				'elearning_breadcrumb_text_sub_controls',
				array(
					'elearning_breadcrumbs_text_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => '#16181a',
						'type'      => 'customind-color',
						'transport' => 'postMessage',
						'section'   => 'elearning_breadcrumb',
						'condition' => array(
							'elearning_breadcrumbs' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_breadcrumb_text_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_breadcrumbs' => true,
			),
		),
		'elearning_breadcrumb_separator_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Separator', 'elearning' ),
			'section'      => 'elearning_breadcrumb',
			'sub_controls' => apply_filters(
				'elearning_breadcrumb_separator_sub_controls',
				array(
					'elearning_breadcrumbs_seperator_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => '#16181a',
						'type'      => 'customind-color',
						'transport' => 'postMessage',
						'section'   => 'elearning_breadcrumb',
						'condition' => array(
							'elearning_breadcrumbs' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_breadcrumb_separator_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_breadcrumbs' => true,
			),
		),
		'elearning_breadcrumb_link_heading'      => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Link', 'elearning' ),
			'section'      => 'elearning_breadcrumb',
			'sub_controls' => apply_filters(
				'elearning_breadcrumb_link_sub_controls',
				array(
					'elearning_breadcrumbs_link_color_group' => array(
						'type'         => 'customind-color-group',
						'title'        => esc_html__( 'Color', 'elearning' ),
						'section'      => 'elearning_breadcrumb',
						'sub_controls' => array(
							'elearning_breadcrumbs_link_color' => array(
								'default'   => '#16181a',
								'type'      => 'customind-color',
								'transport' => 'postMessage',
								'title'     => esc_html__( 'Normal', 'elearning' ),
								'section'   => 'elearning_breadcrumb',
							),
							'elearning_breadcrumbs_link_hover_color' => array(
								'default'   => '#027abb',
								'type'      => 'customind-color',
								'transport' => 'postMessage',
								'title'     => esc_html__( 'Hover', 'elearning' ),
								'section'   => 'elearning_breadcrumb',
							),
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_breadcrumb_link_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_breadcrumbs' => true,
			),
		),
	)
);

elearning_customind()->add_controls( $options );
