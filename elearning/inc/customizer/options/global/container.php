<?php

$options = array(
	'elearning_container_heading'            => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Container', 'elearning' ),
		'section'      => 'elearning_container',
		'sub_controls' => apply_filters(
			'elearning_container_sub_controls',
			array(
				'elearning_container_layout_general_heading' => array(
					'type'    => 'customind-title',
					'title'   => esc_html__( 'General', 'elearning' ),
					'section' => 'elearning_container',
				),
				'elearning_general_container_style'       => array(
					'default'  => 'tg-container--wide',
					'type'     => 'customind-radio-image',
					'title'    => esc_html__( 'Layout', 'elearning' ),
					'section'  => 'elearning_container',
					'choices'  => array(
						'tg-container--wide'     => array(
							'label' => esc_html__( 'Wide', 'elearning' ),
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/container-wide.svg',
						),
						'tg-container--boxed'    => array(
							'label' => esc_html__( 'Boxed', 'elearning' ),
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/container-box.svg',
						),
						'tg-container--separate' => array(
							'label' => esc_html__( 'Separate', 'elearning' ),
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/separate.svg',
						),
					),
					'columns'  => 2,
					'priority' => 10,
				),
				'elearning_container_width_style_divider' => array(
					'variant' => 'dashed',
					'type'    => 'customind-divider',
					'section' => 'elearning_container',
				),
				'elearning_container_width_style_heading' => array(
					'type'    => 'customind-title',
					'title'   => esc_html__( 'Style', 'elearning' ),
					'section' => 'elearning_container',
				),
				'elearning_general_container_width'       => array(
					'default'     => array(
						'size' => 1160,
						'unit' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Container Width', 'elearning' ),
					'section'     => 'elearning_container',
					'transport'   => 'postMessage',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 768,
						'max'  => 1920,
						'step' => 1,
					),
				),
				'elearning_general_content_width'         => array(
					'default'     => array(
						'size' => 70,
						'unit' => '%',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Content Width', 'elearning' ),
					'section'     => 'elearning_container',
					'transport'   => 'postMessage',
					'units'       => array( '%' ),
					'defaultUnit' => '%',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'elearning_general_sidebar_width'         => array(
					'default'     => array(
						'size' => 30,
						'unit' => '%',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Side Width', 'elearning' ),
					'section'     => 'elearning_container',
					'transport'   => 'postMessage',
					'units'       => array( '%' ),
					'defaultUnit' => '%',
					'input_attrs' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_container_accordion_collapsible', false ),
	),
	'elearning_container_background_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Background', 'elearning' ),
		'section'      => 'elearning_container',
		'sub_controls' => apply_filters(
			'elearning_container_background_sub_controls',
			array(
				'elearning_inside_container_background'  => array(
					'default'   => array(
						'background-color'      => '#ffffff',
						'background-image'      => '',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
						'background-repeat'     => 'repeat',
					),
					'type'      => 'customind-background',
					'title'     => esc_html__( 'Inside Background', 'elearning' ),
					'section'   => 'elearning_container',
					'transport' => 'postMessage',
					'priority'  => 20,
				),
				'elearning_outside_container_background' => array(
					'default'   => array(
						'background-color'      => '',
						'background-image'      => '',
						'background-position'   => 'center center',
						'background-size'       => 'auto',
						'background-attachment' => 'scroll',
						'background-repeat'     => 'repeat',
					),
					'type'      => 'customind-background',
					'title'     => esc_html__( 'Outside Background', 'elearning' ),
					'section'   => 'elearning_container',
					'transport' => 'postMessage',
					'priority'  => 20,
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_container_background_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
