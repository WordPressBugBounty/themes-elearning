<?php
$menus        = wp_get_nav_menus();
$menu_choices = array();

foreach ( $menus as $menu ) {
	$menu_choices[ $menu->term_id ] = $menu->name;
}
$options = array(
	'elearning_header_primary_menu_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Primary Menu', 'elearning' ),
		'section'      => 'elearning_header_builder_primary_menu',
		'priority'     => 9,
		'sub_controls' => apply_filters(
			'elearning_header_primary_menu_sub_controls',
			array(
				'elearning_header_primary_menu_navigation' => array(
					'title'    => esc_html__( 'Select Menu Navigation', 'elearning' ),
					'type'     => 'customind-navigation',
					'section'  => 'elearning_header_builder_primary_menu',
					'to'       => 'menu_locations',
					'nav_type' => 'section',
					'priority' => 5,
				),
				'elearning_primary_menu_extra'             => array(
					'title'    => esc_html__( 'Priority plus navigation', 'elearning' ),
					'default'  => false,
					'type'     => 'customind-toggle',
					'section'  => 'elearning_header_builder_primary_menu',
					'priority' => 5,
				),
				'elearning_primary_menu_border_bottom_width_divider' => array(
					'type'    => 'customind-divider',
					'variant' => 'dashed',
					'section' => 'elearning_header_builder_primary_menu',
				),
				'elearning_primary_menu_border_bottom_width_heading' => array(
					'type'    => 'customind-title',
					'title'   => esc_html__( 'Border Bottom', 'elearning' ),
					'section' => 'elearning_header_builder_primary_menu',
				),
				'elearning_header_menu_border_bottom_width' => array(
					'default'     => array(
						'size'  => '',
						'units' => 'px',
					),
					'type'        => 'customind-slider',
					'title'       => esc_html__( 'Border Bottom Width', 'elearning' ),
					'section'     => 'elearning_header_builder_primary_menu',
					'transport'   => 'postMessage',
					'units'       => array( 'px' ),
					'defaultUnit' => 'px',
					'input_attrs' => array(
						'min'  => 0,
						'step' => 1,
						'max'  => 20,
					),
				),
				'elearning_header_menu_border_bottom_color' => array(
					'title'     => esc_html__( 'Border Bottom Color', 'elearning' ),
					'default'   => '#e9ecef',
					'type'      => 'customind-color',
					'transport' => 'postMessage',
					'section'   => 'elearning_header_builder_primary_menu',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_primary_menu_accordion_collapsible', false ),
	),
	'elearning_header_main_menu_heading'    => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Main Menu', 'elearning' ),
		'section'      => 'elearning_header_builder_primary_menu',
		'sub_controls' => apply_filters(
			'elearning_header_main_menu_sub_controls',
			array(
				'elearning_primary_menu_text_active_effect' => array(
					'default'   => 'tg-primary-menu--style-underline',
					'type'      => 'customind-radio-image',
					'title'     => esc_html__( 'Advanced Style', 'elearning' ),
					'section'   => 'elearning_header_builder_primary_menu',
					'transport' => 'postMessage',
					'priority'  => 6,
					'choices'   => apply_filters(
						'elearning_main_menu_layout_1_style_choices',
						array(
							'tg-primary-menu--style-none' => array(
								'label' => 'None',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/menu-active-none.svg',
							),
							'tg-primary-menu--style-underline' => array(
								'label' => 'Underline Border',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/menu-active-underline.svg',
							),
							'tg-primary-menu--style-left-border' => array(
								'label' => 'Left Border',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/menu-active-left.svg',
							),
							'tg-primary-menu--style-right-border' => array(
								'label' => 'Right Border',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/menu-active-right.svg',
							),
						)
					),
					'columns'   => 2,
					'condition' => array(
						'elearning_main_menu_layout!' => 'layout-2',
					),
				),
				'elearning_header_main_menu_color_group' => array(
					'type'            => 'customind-color-group',
					'title'           => 'Color',
					'section'         => 'elearning_header_builder_primary_menu',
					'priority'        => 7,
					'sub_controls'    => array(
						'elearning_header_main_menu_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_primary_menu',
						),
						'elearning_header_main_menu_hover_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_primary_menu',
						),
						'elearning_header_main_menu_active_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Active', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_header_builder_primary_menu',
						),
					),
					'active_callback' => function () {
						if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && get_theme_mod( 'elearning_enable_primary_menu', true ) ) {
							return true;
						}

						return false;
					},
				),
				'elearning_header_main_menu_typography'  => array(
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
					'section'   => 'elearning_header_builder_primary_menu',
					'priority'  => 9,
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_main_menu_accordion_collapsible', false ),
	),
	'elearning_header_sub_menu_heading'     => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Sub Menu', 'elearning' ),
		'section'      => 'elearning_header_builder_primary_menu',
		'sub_controls' => apply_filters(
			'elearning_header_sub_menu_sub_controls',
			array(
				'elearning_header_sub_menu_typography' => array(
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
					'section'   => 'elearning_header_builder_primary_menu',
					'priority'  => 11,
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_sub_menu_accordion_collapsible', false ),
	),

);

elearning_customind()->add_controls( $options );
