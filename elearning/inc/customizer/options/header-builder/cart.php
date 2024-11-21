<?php

$options = array(
	'elearning_header_builder_cart_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Cart', 'elearning' ),
		'section'      => 'elearning_header_builder_cart',
		'sub_controls' => apply_filters(
			'elearning_header_builder_cart_sub_controls',
			array(
				'elearning_cart_color' => array(
					'default'   => '',
					'transport' => 'postMessage',
					'type'      => 'customind-color',
					'title'     => esc_html__( 'Color', 'elearning' ),
					'section'   => 'elearning_header_builder_cart',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_builder_cart_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
