<?php

$options = array(
	'elearning_scroll_to_top_heading'      => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Scroll To Top', 'elearning' ),
		'section'      => 'elearning_footer_scroll_to_top',
		'sub_controls' => apply_filters(
			'elearning_scroll_to_top_sub_controls',
			array(
				'elearning_scroll_to_top'                  => array(
					'title'    => esc_html__( 'Enable', 'elearning' ),
					'default'  => true,
					'type'     => 'customind-toggle',
					'priority' => 5,
					'section'  => 'elearning_footer_scroll_to_top',
				),
				'elearning_scroll_to_top_background_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Background', 'elearning' ),
					'section'      => 'elearning_footer_scroll_to_top',
					'priority'     => 20,
					'sub_controls' => array(
						'elearning_scroll_to_top_bg_color' => array(
							'default'   => '#16181a',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_footer_scroll_to_top',
						),
						'elearning_scroll_to_top_bg_hover_color' => array(
							'default'   => '#1e7ba6',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_footer_scroll_to_top',
						),
					),
					'condition'    => array(
						'elearning_scroll_to_top' => true,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_scroll_to_top_accordion_collapsible', false ),
	),
	'elearning_scroll_to_top_icon_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Icon', 'elearning' ),
		'section'      => 'elearning_footer_scroll_to_top',
		'sub_controls' => apply_filters(
			'elearning_scroll_to_top_icon_sub_controls',
			array(
				'elearning_scroll_to_top_icon_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Color', 'elearning' ),
					'section'      => 'elearning_footer_scroll_to_top',
					'priority'     => 15,
					'sub_controls' => array(
						'elearning_scroll_to_top_color' => array(
							'default'   => '#ffffff',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_footer_scroll_to_top',
						),
						'elearning_scroll_to_top_hover_color' => array(
							'default'   => '#ffffff',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_footer_scroll_to_top',
						),
					),
					'condition'    => array(
						'elearning_scroll_to_top' => true,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_scroll_to_top_icon_accordion_collapsible', false ),
		'condition'    => array(
			'elearning_scroll_to_top' => true,
		),
	),
);

elearning_customind()->add_controls( $options );
