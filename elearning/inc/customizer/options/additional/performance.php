<?php

$options = array(
	'elearning_load_google_fonts_locally' => array(
		'default' => 0,
		'title'   => esc_html__( 'Load Google Font Locally', 'elearning' ),
		'type'    => 'customind-toggle',
		'section' => 'elearning_performance',
	),
	'elearning_demo_migrated_heading'     => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Demo Migrated', 'elearning' ),
		'section'      => 'elearning_performance',
		'sub_controls' => apply_filters(
			'elearning_demo_migrated_sub_controls',
			array(
				'demo_migrated_to_builder' => array(
					'default' => 0,
					'title'   => esc_html__( 'Demo migrated', 'elearning' ),
					'type'    => 'customind-toggle',
					'section' => 'elearning_performance',
				),
			),
		),
		'collapsible'  => apply_filters( 'elearning_demo_migrated_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
