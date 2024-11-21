<?php

$options = apply_filters(
	'elearning_blog_sidebar_options',
	array(
		'elearning_widget_title_heading'   => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Widget Title', 'elearning' ),
			'section'      => 'elearning_sidebar',
			'priority'     => 15,
			'sub_controls' => apply_filters(
				'elearning_widget_title_sub_controls',
				array(
					'elearning_typography_widget_heading' => array(
						'default'   => apply_filters(
							'elearning_typography_widget_heading_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '500',
								'subsets'        => array( 'latin' ),
								'font-size'      => array(
									'desktop' => array(
										'size' => '1.2',
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
						'title'     => esc_html__( 'Typography', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_sidebar',
						'priority'  => 20,
						'condition' => array(
							'elearning_enable_sidebar_widgets_title!' => false,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_widget_title_accordion_collapsible', false ),
		),
		'elearning_widget_content_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Widget Content', 'elearning' ),
			'section'      => 'elearning_sidebar',
			'priority'     => 15,
			'sub_controls' => apply_filters(
				'elearning_widget_content_sub_controls',
				array(
					'elearning_typography_widget_content' => array(
						'default'   => apply_filters(
							'elearning_typography_widget_content_filter',
							array(
								'font-family'    => 'Default',
								'font-weight'    => '400',
								'subsets'        => array( 'latin' ),
								'font-size'      => array(
									'desktop' => array(
										'size' => '14',
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
							)
						),
						'type'      => 'customind-typography',
						'title'     => esc_html__( 'Typography', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_sidebar',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_widget_content_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
