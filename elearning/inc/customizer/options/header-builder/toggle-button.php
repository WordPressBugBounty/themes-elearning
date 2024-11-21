<?php

$options = array(
	'elearning_header_builder_toggle_button_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Load Google fonts locally', 'elearning' ),
		'section'      => 'elearning_header_builder_toggle_button',
		'sub_controls' => apply_filters(
			'elearning_header_builder_toggle_button_sub_controls',
			array(
				'elearning_header_builder_toggle_button' => array(
					'default' => 0,
					'title'   => esc_html__( 'Enable', 'elearning' ),
					'type'    => 'customind-toggle',
					'section' => 'elearning_header_builder_toggle_button',
				),
			)
		),
		'input_attrs'  => array(
			'collapsible' => apply_filters( 'elearning_header_builder_toggle_button_accordion_collapsible', false ),
		),
	),
);

elearning_customind()->add_controls( $options );
