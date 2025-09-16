<?php
$menus        = wp_get_nav_menus();
$menu_choices = array();

foreach ( $menus as $menu ) {
	$menu_choices[ $menu->term_id ] = $menu->name;
}
$options = array(
	'elearning_header_secondary_menu_heading'      => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Secondary Menu', 'elearning' ),
		'section'      => 'elearning_header_builder_secondary_menu',
		'sub_controls' => apply_filters(
			'elearning_header_secondary_menu_sub_controls',
			array(
				'elearning_header_secondary_menu_navigation' => array(
					'title'    => esc_html__( 'Select Menu Navigation', 'elearning' ),
					'type'     => 'customind-navigation',
					'section'  => 'elearning_header_builder_secondary_menu',
					'to'       => 'menu_locations',
					'nav_type' => 'section',
				),
				'elearning_header_secondary_menu_border_bottom_width' => array(
					'default'     => array(
						'size'  => '',
						'units' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Border Bottom Width', 'elearning' ),
					'section'     => 'elearning_header_builder_secondary_menu',
					'transport'   => 'postMessage',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 20,
					),
				),
				'elearning_header_secondary_menu_border_bottom_color' => array(
					'title'     => esc_html__( 'Border Bottom Color', 'elearning' ),
					'default'   => '#e9ecef',
					'type'      => 'customind-color',
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_secondary_menu',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_secondary_menu_accordion_collapsible', false ),
	),
	'elearning_header_main_secondary_menu_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Main Menu', 'elearning' ),
		'section'      => 'elearning_header_builder_secondary_menu',
		'sub_controls' => apply_filters(
			'elearning_header_secondary_menu_sub_controls',
			array(
				'elearning_header_secondary_menu_color_group' => array(
					'type'            => 'customind-color-group',
					'title'           => 'Color',
					'section'         => 'elearning_header_builder_secondary_menu',
					'sub_controls'    => array(
						'elearning_header_secondary_menu_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_secondary_menu',
						),
						'elearning_header_secondary_menu_hover_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_secondary_menu',
						),
						'elearning_header_secondary_menu_active_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Active', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_secondary_menu',
						),
					),
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'elearning_secondary_menu_item_style', 'default' ) ) {
							return true;
						}

						return false;
					},
				),
				'elearning_header_secondary_menu_typography'  => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => 'regular',
						'font-size'      => array(
							'desktop' => array(
								'size' => '14',
								'unit' => 'px',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => '1.8',
								'unit' => '-',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'font-style'     => 'normal',
						'text-transform' => 'none',
					),
					'type'      => 'customind-typography',
					'title'     => esc_html__( 'Typography', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_secondary_menu',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_secondary_menu_accordion_collapsible', false ),
	),
	'elearning_header_secondary_sub_menu_heading'  => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Sub Menu', 'elearning' ),
		'section'      => 'elearning_header_builder_secondary_menu',
		'sub_controls' => apply_filters(
			'elearning_header_secondary_sub_menu_sub_controls',
			array(
				'elearning_header_secondary_sub_menu_typography' => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => '400',
						'font-size'      => array(
							'desktop' => array(
								'size' => '14',
								'unit' => 'px',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'line-height'    => array(
							'desktop' => array(
								'size' => '1.8',
								'unit' => '-',
							),
							'tablet'  => array(
								'size' => '',
								'unit' => '',
							),
							'mobile'  => array(
								'size' => '',
								'unit' => '',
							),
						),
						'font-style'     => 'normal',
						'text-transform' => 'none',
					),
					'type'      => 'customind-typography',
					'title'     => esc_html__( 'Typography', 'elearning' ),
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_secondary_menu',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_secondary_sub_menu_accordion_collapsible', false ),
	),

);

elearning_customind()->add_controls( $options );
