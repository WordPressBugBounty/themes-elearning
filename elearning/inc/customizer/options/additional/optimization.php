<?php

$options = array(
	'elearning_load_google_fonts_locally_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Load Google fonts locally', 'elearning' ),
		'section'      => 'elearning_optimization',
		'sub_controls' => apply_filters(
			'elearning_load_google_fonts_locally_sub_controls',
			array(
				'elearning_load_google_fonts_locally' => array(
					'default' => 0,
					'title'   => esc_html__( 'Enable', 'elearning' ),
					'type'    => 'customind-toggle',
					'section' => 'elearning_optimization',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_load_google_fonts_locally_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
