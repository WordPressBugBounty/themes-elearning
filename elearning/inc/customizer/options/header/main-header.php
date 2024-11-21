<?php

$options = apply_filters(
	'elearning_main_header_options',
	array(
		'elearning_main_header_heading'            => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Main Header', 'elearning' ),
			'section'      => 'elearning_main_header',
			'priority'     => 10,
			'sub_controls' => apply_filters(
				'elearning_main_header_sub_controls',
				array(
					'elearning_header_main_style' => array(
						'default'  => 'tg-site-header--left',
						'type'     => 'customind-radio-image',
						'title'    => esc_html__( 'Style', 'elearning' ),
						'section'  => 'elearning_main_header',
						'priority' => 10,
						'choices'  => apply_filters(
							'elearning_header_main_style_choices',
							array(
								'tg-site-header--left'   => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/header-left.svg',
								),
								'tg-site-header--center' => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/header-center.svg',
								),
								'tg-site-header--right'  => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/header-right.svg',
								),
							)
						),
						'columns'  => 2,

					),
					'elearning_main_header_background_color_divider' => array(
						'type'     => 'customind-divider',
						'variant'  => 'dashed',
						'section'  => 'elearning_main_header',
						'priority' => 20,
					),
					'elearning_main_header_background_color_heading' => array(
						'type'     => 'customind-title',
						'title'    => esc_html__( 'Style', 'elearning' ),
						'section'  => 'elearning_main_header',
						'priority' => 20,
					),
					'elearning_header_main_bg'    => array(
						'default'   => array(
							'background-color'      => '#ffffff',
							'background-image'      => '',
							'background-repeat'     => 'repeat',
							'background-position'   => 'center center',
							'background-size'       => 'contain',
							'background-attachment' => 'scroll',
						),
						'priority'  => 20,
						'type'      => 'customind-background',
						'title'     => esc_html__( 'Background', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_main_header',
					),
					'elearning_blog_post_box_border_gap_divider' => array(
						'type'     => 'customind-divider',
						'variant'  => 'dashed',
						'section'  => 'elearning_main_header',
						'priority' => 30,
					),
					'elearning_main_header_border_bottom_heading' => array(
						'title'    => esc_html__( 'Border Bottom', 'elearning' ),
						'type'     => 'customind-title',
						'section'  => 'elearning_main_header',
						'priority' => 30,
					),
					'elearning_header_main_border_bottom_size' => array(
						'default'     => array(
							'size'  => 1,
							'units' => 'px',
						),
						'type'        => 'customind-slider',
						'title'       => esc_html__( 'Width', 'elearning' ),
						'section'     => 'elearning_main_header',
						'units'       => array( 'px' ),
						'defaultUnit' => 'px',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
						'priority'    => 30,
					),
					'elearning_header_main_border_bottom_color' => array(
						'title'    => esc_html__( 'Color', 'elearning' ),
						'default'  => '#e9ecef',
						'type'     => 'customind-color',
						'section'  => 'elearning_main_header',
						'priority' => 30,
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_main_header_accordion_collapsible', false ),
		),
		'elearning_main_header_components_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Components', 'elearning' ),
			'section'      => 'elearning_main_header',
			'priority'     => 50,
			'sub_controls' => apply_filters(
				'elearning_main_header_components_sub_controls',
				array(
					'elearning_search_navigation_info' => array(
						'title'    => esc_html__( 'Header Search Navigation', 'elearning' ),
						'type'     => 'customind-navigation',
						'section'  => 'elearning_main_header',
						'to'       => 'elearning_header_search',
						'nav_type' => 'section',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_main_header_components_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
