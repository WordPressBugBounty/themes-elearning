<?php
$options = apply_filters(
	'elearning_top_bar_options',
	array(
		'elearning_top_bar'               => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Top Bar', 'elearning' ),
			'section'      => 'elearning_header_top',
			'priority'     => 5,
			'sub_controls' => apply_filters(
				'elearning_top_bar_sub_controls',
				array(
					'elearning_top_bar_general_heading' => array(
						'type'     => 'customind-title',
						'title'    => esc_html__( 'General', 'elearning' ),
						'section'  => 'elearning_header_top',
						'priority' => 5,
					),
					'elearning_header_top'              => array(
						'title'    => esc_html__( 'Enable', 'elearning' ),
						'default'  => false,
						'type'     => 'customind-toggle',
						'section'  => 'elearning_header_top',
						'priority' => 5,
					),
					'elearning_top_bar_style_heading_divider' => array(
						'type'      => 'customind-divider',
						'variant'   => 'dashed',
						'section'   => 'elearning_header_top',
						'priority'  => 30,
						'condition' => array(
							'elearning_header_top' => true,
						),
					),
					'elearning_top_bar_style_heading'   => array(
						'type'      => 'customind-title',
						'title'     => esc_html__( 'Style', 'elearning' ),
						'section'   => 'elearning_header_top',
						'priority'  => 30,
						'condition' => array(
							'elearning_header_top' => true,
						),
					),
					'elearning_header_top_text_color'   => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => 'var(--elearning-color-7)',
						'type'      => 'customind-color',
						'section'   => 'elearning_header_top',
						'transport' => 'postMessage',
						'priority'  => 30,
						'condition' => array(
							'elearning_header_top' => true,
						),
					),
					'elearning_header_top_bg'           => array(
						'default'   => array(
							'background-color'      => '#e9ecef',
							'background-image'      => '',
							'background-repeat'     => 'repeat',
							'background-position'   => 'center center',
							'background-size'       => 'contain',
							'background-attachment' => 'scroll',
						),
						'type'      => 'customind-background',
						'title'     => esc_html__( 'Background', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_header_top',
						'condition' => array(
							'elearning_header_top' => true,
						),
						'priority'  => 30,
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_top_bar_accordion_collapsible', false ),
		),
		'elearning_top_bar_left_heading'  => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Left Content', 'elearning' ),
			'section'      => 'elearning_header_top',
			'sub_controls' => apply_filters(
				'elearning_top_bar_left_sub_controls',
				array(
					'elearning_header_top_left_content' => array(
						'default'   => 'text_html',
						'type'      => 'customind-select',
						'title'     => esc_html__( 'Content Type', 'elearning' ),
						'section'   => 'elearning_header_top',
						'choices'   => array(
							'none'      => esc_html__( 'None', 'elearning' ),
							'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
							'menu'      => esc_html__( 'Menu', 'elearning' ),
							'widget'    => esc_html__( 'Widget', 'elearning' ),
						),
						'priority'  => 40,
						'condition' => array(
							'elearning_header_top' => true,
						),
					),
					'elearning_header_top_left_content_html' => array(
						'default'   => '',
						'type'      => 'customind-editor',
						'title'     => esc_html__( 'Text/HTML for Left Content', 'elearning' ),
						'section'   => 'elearning_header_top',
						'priority'  => 45,
						'condition' => array(
							'elearning_header_top' => true,
							'elearning_header_top_left_content' => 'text_html',
						),
					),
					'elearning_header_top_left_content_menu' => array(
						'default'   => 'none',
						'type'      => 'customind-select',
						'title'     => esc_html__( 'Select a Menu for Left Content', 'elearning' ),
						'section'   => 'elearning_header_top',
						'choices'   => eLearning_Utils::get_menus(),
						'priority'  => 45,
						'condition' => array(
							'elearning_header_top' => true,
							'elearning_header_top_left_content' => 'menu',
						),
					),
					'elearning_top_bar_left_widget_navigation' => array(
						'title'     => esc_html__( 'Left Widget Navigation', 'elearning' ),
						'type'      => 'customind-navigation',
						'section'   => 'elearning_header_top',
						'to'        => 'sidebar-widgets-header-top-left-sidebar',
						'nav_type'  => 'section',
						'priority'  => 50,
						'condition' => array(
							'elearning_header_top' => true,
							'elearning_header_top_left_content' => 'widget',
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_top_bar_left_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_header_top' => true,
			),
		),
		'elearning_top_bar_right_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Right Content', 'elearning' ),
			'section'      => 'elearning_header_top',
			'sub_controls' => apply_filters(
				'elearning_top_bar_right_sub_controls',
				array(
					'elearning_header_top_right_content' => array(
						'default'   => 'none',
						'type'      => 'customind-select',
						'title'     => esc_html__( 'Content Type', 'elearning' ),
						'section'   => 'elearning_header_top',
						'choices'   => array(
							'none'      => esc_html__( 'None', 'elearning' ),
							'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
							'menu'      => esc_html__( 'Menu', 'elearning' ),
							'widget'    => esc_html__( 'Widget', 'elearning' ),
						),
						'priority'  => 50,
						'condition' => array(
							'elearning_header_top' => true,
						),
					),
					'elearning_header_top_right_content_html' => array(
						'default'   => '',
						'type'      => 'customind-editor',
						'title'     => esc_html__( 'Text/HTML for Right Content', 'elearning' ),
						'section'   => 'elearning_header_top',
						'priority'  => 55,
						'condition' => array(
							'elearning_header_top' => true,
							'elearning_header_top_right_content' => 'text_html',
						),
					),
					'elearning_header_top_right_content_menu' => array(
						'default'   => 'none',
						'type'      => 'customind-select',
						'title'     => esc_html__( 'Select a Menu for Right Content', 'elearning' ),
						'section'   => 'elearning_header_top',
						'choices'   => eLearning_Utils::get_menus(),
						'priority'  => 60,
						'condition' => array(
							'elearning_header_top' => true,
							'elearning_header_top_right_content' => 'menu',
						),
					),
					'elearning_top_bar_right_widget_navigation' => array(
						'title'     => esc_html__( 'Right Widget Navigation', 'elearning' ),
						'type'      => 'customind-navigation',
						'section'   => 'elearning_header_top',
						'to'        => 'sidebar-widgets-header-top-right-sidebar',
						'nav_type'  => 'section',
						'priority'  => 55,
						'condition' => array(
							'elearning_header_top' => true,
							'elearning_header_top_right_content' => 'widget',
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_top_bar_right_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_header_top' => true,
			),
		),
	)
);

elearning_customind()->add_controls( $options );
