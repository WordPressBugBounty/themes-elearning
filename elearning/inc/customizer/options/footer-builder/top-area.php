<?php
$options = array(
	'elearning_footer_top_area_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Top Area', 'elearning' ),
		'section'      => 'elearning_footer_builder_top_area',
		'sub_controls' => apply_filters(
			'elearning_footer_top_area_sub_controls',
			array(
				'elearning_footer_top_area_cols'         => array(
					'type'        => 'customind-slider',
					'title'       => 'Top row cols',
					'default'     => 4,
					'priority'    => 7,
					'section'     => 'elearning_footer_builder_top_area',
					'input_attrs' => array(
						'min'  => 1,
						'max'  => 6,
						'step' => 1,
					),
				),
				'elearning_footer_top_area_container'    => array(
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Container', 'elearning' ),
					'section'     => 'elearning_footer_builder_top_area',
					'transport'   => 'postMessage',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 400,
						'max'  => 1920,
						'step' => 1,
					),
				),
				'elearning_footer_top_area_height'       => array(
					'default'     => array(
						'size' => '',
						'unit' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Height', 'elearning' ),
					'section'     => 'elearning_footer_builder_top_area',
					'transport'   => 'postMessage',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 400,
						'step' => 1,
					),
				),
				'elearning_footer_top_area_color'        => array(
					'title'     => esc_html__( 'Color', 'elearning' ),
					'default'   => '',
					'type'      => 'customind-color',
					'section'   => 'elearning_footer_builder_top_area',
					'transport' => 'postMessage',
				),
				'elearning_footer_top_area_background'   => array(
					'default'   => array(
						'background-color'      => '',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'center center',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'      => 'customind-background',
					'title'     => esc_html__( 'Background', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_top_area',
				),

				'elearning_footer_top_area_padding'      => array(
					'default'     => array(
						'top'    => '20',
						'right'  => '',
						'bottom' => '20',
						'left'   => '',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => esc_html__( 'Padding', 'elearning' ),
					'section'     => 'elearning_footer_builder_top_area',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em' ),
					'defaultUnit' => 'px',
				),

				'elearning_footer_top_area_margin'       => array(
					'default'     => array(
						'top'    => '',
						'right'  => '',
						'bottom' => '',
						'left'   => '',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => esc_html__( 'Margin', 'elearning' ),
					'section'     => 'elearning_footer_builder_top_area',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em' ),
					'defaultUnit' => 'px',
				),

				'elearning_footer_top_area_border_width' => array(
					'default'     => array(
						'top'    => '0',
						'right'  => '0',
						'bottom' => '0',
						'left'   => '0',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => esc_html__( 'Border Width', 'elearning' ),
					'section'     => 'elearning_footer_builder_top_area',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em' ),
					'defaultUnit' => 'px',
				),

				'elearning_footer_top_area_border_color' => array(
					'title'     => esc_html__( 'Border Color', 'elearning' ),
					'default'   => '',
					'type'      => 'customind-color',
					'section'   => 'elearning_footer_builder_top_area',
					'transport' => 'postMessage',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_footer_top_area_background_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
