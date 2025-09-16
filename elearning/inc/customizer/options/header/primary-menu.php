<?php

$options = apply_filters(
	'elearning-primary_menu_options',
	array(
		'elearning_primary_menu_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Primary Menu', 'elearning' ),
			'section'      => 'elearning_menu',
			'sub_controls' => apply_filters(
				'elearning_primary_menu_sub_controls',
				array(
					'elearning_primary_menu_general_heading' => array(
						'type'    => 'customind-title',
						'title'   => esc_html__( 'General', 'elearning' ),
						'section' => 'elearning_menu',
					),
					'elearning_primary_menu'       => array(
						'title'   => esc_html__( 'Disable Primary Menu', 'elearning' ),
						'default' => false,
						'type'    => 'customind-toggle',
						'section' => 'elearning_menu',
					),
					'elearning_primary_menu_extra' => array(
						'title'     => esc_html__( 'Priority plus navigation', 'elearning' ),
						'default'   => false,
						'type'      => 'customind-toggle',
						'section'   => 'elearning_menu',
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
					'elearning_primary_menu_border_bottom_width_divider' => array(
						'type'      => 'customind-divider',
						'variant'   => 'dashed',
						'section'   => 'elearning_menu',
						'priority'  => 35,
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
					'elearning_primary_menu_border_bottom_width_heading' => array(
						'type'      => 'customind-title',
						'title'     => esc_html__( 'Border Bottom', 'elearning' ),
						'section'   => 'elearning_blog',
						'priority'  => 35,
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
					'elearning_primary_menu_border_bottom_size' => array(
						'default'     => array(
							'size'  => 0,
							'units' => 'px',
						),
						'type'        => 'customind-slider',
						'title'       => esc_html__( 'Width', 'elearning' ),
						'section'     => 'elearning_menu',
						'transport'   => 'postMessage',
						'units'       => array( 'px' ),
						'defaultUnit' => 'px',
						'priority'    => 35,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
						'condition'   => array(
							'elearning_primary_menu' => false,
						),
					),
					'elearning_primary_menu_border_bottom_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => '#e9ecef',
						'type'      => 'customind-color',
						'section'   => 'elearning_menu',
						'priority'  => 40,
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_primary_menu_accordion_collapsible', false ),
		),
		'elearning_main_menu_heading'    => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Main Menu', 'elearning' ),
			'section'      => 'elearning_menu',
			'sub_controls' => apply_filters(
				'elearning_main_menu_sub_controls',
				array(
					'elearning_primary_menu_text_active_effect' => array(
						'default'         => 'tg-primary-menu--style-underline',
						'type'            => 'customind-radio-image',
						'title'           => esc_html__( 'Active Menu Item Style', 'elearning' ),
						'section'         => 'elearning_menu',
						'transport'       => 'postMessage',
						'choices'         => apply_filters(
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
						'columns'         => 2,
						'active_callback' => function () {
							if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && get_theme_mod( 'elearning_primary_menu', tfalse ) && 'layout-2' !== get_theme_mod( 'elearning_main_menu_layout', 'layout-1' ) ) {
								return true;
							}

							return false;
						},
					),
					'elearning_main_menu_color_divider' => array(
						'type'      => 'customind-divider',
						'variant'   => 'dashed',
						'section'   => 'elearning_menu',
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
					'elearning_main_menu_color_heading' => array(
						'type'      => 'customind-title',
						'title'     => esc_html__( 'Style', 'elearning' ),
						'section'   => 'elearning_blog',
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
					'elearning_main_menu_color_group'   => array(
						'type'            => 'customind-color-group',
						'title'           => 'Color',
						'section'         => 'elearning_menu',
						'sub_controls'    => array(
							'elearning_primary_menu_text_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Normal', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_menu',
							),
							'elearning_primary_menu_text_hover_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Hover', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_menu',
							),
							'elearning_primary_menu_text_active_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Active', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_menu',
							),
						),
						'active_callback' => function () {
							if ( 'default' === get_theme_mod( 'elearning_primary_menu_item_style', 'default' ) && get_theme_mod( 'elearning_primary_menu', tfalse ) ) {
								return true;
							}

							return false;
						},
					),
					'elearning_typography_primary_menu' => array(
						'default'   => array(
							'font-family'    => 'inherit',
							'font-weight'    => 'regular',
							'font-size'      => array(
								'desktop' => array(
									'size' => '1.6',
									'unit' => 'rem',
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
						'section'   => 'elearning_menu',
						'transport' => 'postMessage',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_main_menu_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_primary_menu' => false,
			),
		),
		'elearning_sub_menu_heading'     => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Sub Menu', 'elearning' ),
			'section'      => 'elearning_menu',
			'sub_controls' => apply_filters(
				'elearning_sub_menu_sub_controls',
				array(
					'elearning_typography_primary_menu_dropdown_item' => array(
						'default'   => array(
							'font-family'    => 'inherit',
							'font-weight'    => '400',
							'font-size'      => array(
								'desktop' => array(
									'size' => '1',
									'unit' => 'rem',
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
						'section'   => 'elearning_menu',
						'priority'  => 15,
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_sub_menu_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_primary_menu' => false,
			),
		),
		'elearning_mobile_menu_heading'  => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Mobile Menu', 'elearning' ),
			'section'      => 'elearning_menu',
			'sub_controls' => apply_filters(
				'elearning_mobile_menu_sub_controls',
				array(
					'elearning_typography_mobile_menu' => array(
						'default'   => array(
							'font-family'    => 'inherit',
							'font-weight'    => '400',
							'font-size'      => array(
								'desktop' => array(
									'size' => '1.6',
									'unit' => 'rem',
								),
								'tablet'  => array(
									'size' => '',
									'unit' => '',
								),
								'mobile'  => array(
									'size' => '1.6',
									'unit' => 'rem',
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
									'size' => '1.8',
									'unit' => '-',
								),
							),
							'font-style'     => 'normal',
							'text-transform' => 'none',
						),
						'type'      => 'customind-typography',
						'priority'  => 15,
						'title'     => esc_html__( 'Typography', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_menu',
						'condition' => array(
							'elearning_primary_menu' => false,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_mobile_menu_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_primary_menu' => false,
			),
		),
	)
);

elearning_customind()->add_controls( $options );
