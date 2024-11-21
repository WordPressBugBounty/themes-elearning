<?php

$options = array(
	'elearning_footer_builder_widget_2_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Widget 2', 'elearning' ),
		'section'      => 'elearning_footer_builder_widget_2',
		'sub_controls' => apply_filters(
			'elearning_footer_builder_widget_2_sub_controls',
			array(
				'elearning_footer_widget_2_title_color'   => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Title Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_widget_2',
				),
				'elearning_footer_widget_2_title_typography' => array(
					'default'   => array(
						'font-family'    => 'default',
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
					'section'   => 'elearning_footer_builder_widget_2',
				),
				'elearning_footer_widget_2_link_divider'  => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_footer_builder_widget_2',
				),
				'elearning_footer_widget_2_link_color'    => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Link', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_widget_2',
				),
				'elearning_footer_widget_2_content_color_divider' => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_footer_builder_widget_2',
				),
				'elearning_footer_widget_2_content_color' => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Content Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_widget_2',
				),
				'elearning_footer_widget_2_content_typography' => array(
					'default'   => array(
						'font-family'    => 'default',
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
					'title'     => esc_html__( 'Content Typography', 'elearning' ),
					'section'   => 'elearning_footer_builder_widget_2',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_footer_builder_widget_2_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
