<?php
$options = apply_filters(
	'elearning_transparent_header_options',
	array(
		'elearning_transparent_header'                    => array(
			'title'   => esc_html__( 'Enable', 'elearning' ),
			'default' => false,
			'type'    => 'customind-toggle',
			'section' => 'elearning_transparent_header',
		),
		'elearning_transparent_header_conditions_heading' => array(
			'type'      => 'customind-title',
			'title'     => esc_html__( 'Conditions', 'elearning' ),
			'section'   => 'elearning_transparent_header',
			'condition' => array(
				'elearning_transparent_header' => true,
			),
		),
		'elearning_transparent_header_latest_posts'       => array(
			'default'   => '',
			'type'      => 'customind-checkbox',
			'title'     => esc_html__( 'Front Page (Latest Posts)', 'elearning' ),
			'section'   => 'elearning_transparent_header',
			'condition' => array(
				'elearning_transparent_header' => true,
			),
		),
		'elearning_transparent_header_custom'             => array(
			'default'   => '',
			'type'      => 'customind-checkbox',
			'title'     => esc_html__( '404 Page', 'elearning' ),
			'section'   => 'elearning_transparent_header',
			'condition' => array(
				'elearning_transparent_header' => true,
			),
		),
	)
);

elearning_customind()->add_controls( $options );
