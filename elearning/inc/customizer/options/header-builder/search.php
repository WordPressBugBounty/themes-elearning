<?php

$options = array(
	'elearning_search_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Search', 'elearning' ),
		'section'      => 'elearning_header_builder_search',
		'sub_controls' => apply_filters(
			'elearning_search_sub_controls',
			array(
				'elearning_header_search_icon_color' => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_primary_menu',
				),
				'elearning_header_search_text_color' => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Text Color', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_primary_menu',
				),
				'elearning_header_search_background' => array(
					'default'   => array(
						'background-color'      => '',
						'background-image'      => '',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
						'background-repeat'     => 'repeat',
					),
					'type'      => 'customind-background',
					'title'     => esc_html__( 'Background', 'elearning' ),
					'section'   => 'elearning_header_builder_search',
					'transport' => 'postMessage',
					'priority'  => 20,
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_search_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
