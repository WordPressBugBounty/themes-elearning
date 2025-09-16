<?php

$options = array(
	'elearning_footer_builder_widget_3_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Widget 3', 'elearning' ),
		'section'      => 'elearning_footer_builder_widget_3',
		'sub_controls' => apply_filters(
			'elearning_footer_builder_widget_3_sub_controls',
			array(
				'elearning_footer_widget_3_title_color'    => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Title Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_widget_3',
				),
				'elearning_footer_widget_3_title_typography' => array(
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
					'section'   => 'elearning_footer_builder_widget_3',
				),
				'elearning_footer_widget_3_link_divider'   => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_footer_builder_widget_3',
				),
				'elearning_footer_widget_3_link_color'     => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Link', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_widget_3',
				),
				'elearning_footer_widget_3_content_color_divider' => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_footer_builder_widget_3',
				),
				'elearning_footer_widget_3_content_color'  => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Content Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_widget_3',
				),
				'elearning_footer_widget_3_content_typography' => array(
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
					'title'     => esc_html__( 'Content Typography', 'elearning' ),
					'section'   => 'elearning_footer_builder_widget_3',
				),
				'elearning_footer_widget_3_heading_border_divider' => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_footer_builder_widget_1',
				),
				'elearning_footer_widget_3_heading_border' => array(
					'default'     => array(
						'size'  => '',
						'units' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Border Bottom Width', 'elearning' ),
					'section'     => 'elearning_header_builder_primary_menu',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 20,
					),
				),
				'elearning_footer_widget_3_heading_border_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Border Color', 'elearning' ),
					'section'      => 'elearning_colors',
					'sub_controls' => apply_filters(
						'elearning_link_color_sub_controls',
						array(
							'elearning_footer_widget_3_heading_border_color'       => array(
								'default' => '',
								'type'    => 'customind-color',
								'title'   => esc_html__( 'Normal', 'elearning' ),
								'section' => 'elearning_colors',
							),
							'elearning_footer_widget_3_heading_border_accent_color' => array(
								'default' => '',
								'type'    => 'customind-color',
								'title'   => esc_html__( 'Accent', 'elearning' ),
								'section' => 'elearning_colors',
							),
						)
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_footer_builder_widget_3_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
