<?php
$options = apply_filters(
	'elearning_transparent_header_options',
	array(
		'elearning_transparent_header_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Transparent Header', 'elearning' ),
			'section'      => 'elearning_transparent_header',
			'sub_controls' => apply_filters(
				'elearning_transparent_header_sub_controls',
				array(
					'elearning_transparent_header_general_heading' => array(
						'type'    => 'customind-title',
						'title'   => esc_html__( 'General', 'elearning' ),
						'section' => 'elearning_transparent_header',
					),
					'elearning_transparent_header'        => array(
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
					'elearning_transparent_header_latest_posts' => array(
						'default'   => '',
						'type'      => 'customind-checkbox',
						'title'     => esc_html__( 'Front Page (Latest Posts)', 'elearning' ),
						'section'   => 'elearning_transparent_header',
						'condition' => array(
							'elearning_transparent_header' => true,
						),
					),
					'elearning_transparent_header_custom' => array(
						'default'   => '',
						'type'      => 'customind-checkbox',
						'title'     => esc_html__( '404 Page', 'elearning' ),
						'section'   => 'elearning_transparent_header',
						'condition' => array(
							'elearning_transparent_header' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_transparent_header_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
