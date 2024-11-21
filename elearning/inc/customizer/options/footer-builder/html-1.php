<?php

$options = array(
	'elearning_footer_html_1_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'HTML 1', 'elearning' ),
		'section'      => 'elearning_footer_builder_html_1',
		'sub_controls' => apply_filters(
			'elearning_footer_html_1_sub_controls',
			array(
				'elearning_footer_html_1'                  => array(
					'default'  => '',
					'type'     => 'customind-editor',
					'title'    => esc_html__( 'Text/HTML for HTML 1', 'elearning' ),
					'section'  => 'elearning_footer_builder_html_1',
					'priority' => 30,
				),
				'elearning_footer_html_1_text_color'       => array(
					'title'     => esc_html__( 'Color', 'elearning' ),
					'default'   => '',
					'type'      => 'customind-color',
					'section'   => 'elearning_footer_builder_html_1',
					'transport' => 'postMessage',
				),
				'elearning_footer_html_1_link_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Links', 'elearning' ),
					'section'      => 'elearning_footer_builder_html_1',
					'sub_controls' => apply_filters(
						'elearning_footer_html_1_link_color_sub_controls',
						array(
							'elearning_footer_html_1_link_color'       => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Normal', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_footer_builder_html_1',
							),
							'elearning_footer_html_1_link_hover_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Hover', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_footer_builder_html_1',
							),
						)
					),
				),
				'elearning_footer_html_1_font_size'        => array(
					'title'       => esc_html__( 'Font Size', 'elearning' ),
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'type'        => 'customind-slider',
					'section'     => 'elearning_footer_builder_html_1',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em', 'rem' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'elearning_footer_html_1_margin'           => array(
					'default'     => array(
						'top'    => '',
						'right'  => '',
						'bottom' => '',
						'left'   => '',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => 'Margin',
					'section'     => 'elearning_footer_builder_html_1',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em', '%', 'rem' ),
					'defaultUnit' => 'px',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_footer_html_1_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
