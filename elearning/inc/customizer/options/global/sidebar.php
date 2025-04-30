<?php

$sidebar_layout_choices = apply_filters(
	'elearning_site_layout_choices',
	array(
		'tg-site-layout--default'    => array(
			'label' => '',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/sidebar-default.svg',
		),
		'tg-site-layout--left'       => array(
			'label' => '',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/left-sidebar.svg',
		),
		'tg-site-layout--right'      => array(
			'label' => '',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/right-sidebar.svg',
		),
		'tg-site-layout--centered'   => array(
			'label' => 'Centered',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/sidebar-centered.svg',
		),
		'tg-site-layout--no-sidebar' => array(
			'label' => '',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/sidebar-contained.svg',
		),
		'tg-site-layout--stretched'  => array(
			'label' => '',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/sidebar-stretched.svg',
		),
	)
);

$options = apply_filters(
	'elearning_sidebar_options',
	array(
		'elearning_sidebar_general_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'General', 'elearning' ),
			'section'      => 'elearning_sidebar_layout',
			'sub_controls' => apply_filters(
				'elearning_general_sub_controls',
				array(
					'elearning_general_sidebar_width' => array(
						'default'     => array(
							'size' => 30,
							'unit' => '%',
						),
						'type'        => 'customind-slider',
						'title'       => esc_html__( 'Side Width', 'elearning' ),
						'section'     => 'elearning_sidebar_layout',
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
			'collapsible'  => apply_filters( 'elearning_general_sidebar_accordion_collapsible', false ),
		),
		'elearning_sidebar_layout'          => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Layout', 'elearning' ),
			'section'      => 'elearning_sidebar_layout',
			'sub_controls' => apply_filters(
				'elearning_sidebar_layout_sub_controls',
				array(
					'elearning_structure_default' => array(
						'default'     => 'tg-site-layout--right',
						'type'        => 'customind-radio-image',
						'title'       => esc_html__( 'Default', 'elearning' ),
						'section'     => 'elearning_sidebar_layout',
						'choices'     => array_slice( $sidebar_layout_choices, 1, count( $sidebar_layout_choices ) ),
						'priority'    => 5,
						'input_attrs' => array(
							'columns' => 2,
						),
					),
					'elearning_structure_archive' => array(
						'default'     => 'tg-site-layout--right',
						'type'        => 'customind-radio-image',
						'title'       => esc_html__( 'Archive', 'elearning' ),
						'section'     => 'elearning_sidebar_layout',
						'choices'     => $sidebar_layout_choices,
						'priority'    => 10,
						'input_attrs' => array(
							'columns' => 2,
						),
					),
					'elearning_structure_post'    => array(
						'default'     => 'tg-site-layout--right',
						'type'        => 'customind-radio-image',
						'title'       => esc_html__( 'Single Post', 'elearning' ),
						'section'     => 'elearning_sidebar_layout',
						'choices'     => $sidebar_layout_choices,
						'priority'    => 25,
						'input_attrs' => array(
							'columns' => 2,
						),
					),
					'elearning_structure_page'    => array(
						'default'     => 'tg-site-layout--right',
						'type'        => 'customind-radio-image',
						'title'       => esc_html__( 'Page', 'elearning' ),
						'section'     => 'elearning_sidebar_layout',
						'choices'     => $sidebar_layout_choices,
						'priority'    => 30,
						'input_attrs' => array(
							'columns' => 2,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_sidebar_layout_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
