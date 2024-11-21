<?php

$options = apply_filters(
	'elearning_header_search_options',
	array(
		'elearning_search_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Search', 'elearning' ),
			'section'      => 'elearning_header_search',
			'sub_controls' => apply_filters(
				'elearning_search_sub_controls',
				array(
					'elearning_header_search' => array(
						'title'   => esc_html__( 'Enable', 'elearning' ),
						'default' => true,
						'type'    => 'customind-toggle',
						'section' => 'elearning_header_search',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_search_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
