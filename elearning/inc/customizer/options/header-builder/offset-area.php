<?php

$options = array(
	'elearning_header_builder_offset_area_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Offset Area', 'elearning' ),
		'section'      => 'elearning_header_builder_offset_area',
		'sub_controls' => apply_filters(
			'elearning_header_builder_offset_area_sub_controls',
			array(
				'elearning_header_mobile_menu_background' => array(
					'default'   => '',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Background', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_offset_area',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_builder_offset_area_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
