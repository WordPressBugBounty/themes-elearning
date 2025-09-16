<?php

$options = array(
	'elearning_scroll_to_top'                  => array(
		'title'    => esc_html__( 'Enable Scroll to top', 'elearning' ),
		'default'  => true,
		'type'     => 'customind-toggle',
		'priority' => 5,
		'section'  => 'elearning_footer_scroll_to_top',
	),
	'elearning_scroll_to_top_background_group' => array(
		'type'         => 'customind-color-group',
		'title'        => esc_html__( 'Background Color', 'elearning' ),
		'section'      => 'elearning_footer_scroll_to_top',
		'priority'     => 20,
		'sub_controls' => array(
			'elearning_scroll_to_top_bg_color'       => array(
				'default'   => 'var(--elearning-color-7)',
				'type'      => 'customind-color',
				'title'     => esc_html__( 'Normal', 'elearning' ),
				'transport' => 'postMessage',
				'section'   => 'elearning_footer_scroll_to_top',
			),
			'elearning_scroll_to_top_bg_hover_color' => array(
				'default'   => 'var(--elearning-color-1)',
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
	'elearning_scroll_to_top_icon_color_group' => array(
		'type'         => 'customind-color-group',
		'title'        => esc_html__( 'Icon Color', 'elearning' ),
		'section'      => 'elearning_footer_scroll_to_top',
		'priority'     => 15,
		'sub_controls' => array(
			'elearning_scroll_to_top_color'       => array(
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
);

elearning_customind()->add_controls( $options );
