<?php

$options = apply_filters(
	'elearning_footer_bottom_bar_options',
	array(
		'elearning_footer_bar_heading'             => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Footer Bar', 'elearning' ),
			'section'      => 'elearning_footer_bar',
			'priority'     => 5,
			'sub_controls' => apply_filters(
				'elearning_footer_bar_sub_controls',
				array(
					'elearning_footer_bar_style_heading' => array(
						'type'     => 'customind-title',
						'title'    => esc_html__( 'General', 'elearning' ),
						'section'  => 'elearning_footer_bar',
						'priority' => 10,
					),
					'elearning_footer_bar_style'         => array(
						'default'   => 'tg-site-footer-bar--center',
						'type'      => 'customind-radio-image',
						'title'     => esc_html__( 'Style', 'elearning' ),
						'section'   => 'elearning_footer_bar',
						'transport' => 'postMessage',
						'choices'   => apply_filters(
							'elearning_footer_bar_style_choices',
							array(
								'tg-site-footer-bar--left' => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-bar-left.svg',
								),
								'tg-site-footer-bar--center' => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-bar-center.svg',
								),
							)
						),
						'columns'   => 2,
						'priority'  => 10,
					),
					'elearning_footer_bar_style_divider' => array(
						'type'     => 'customind-divider',
						'variant'  => 'dashed',
						'section'  => 'elearning_footer_bar',
						'priority' => 20,
					),
					'elearning_footer_bar_background_heading' => array(
						'type'     => 'customind-title',
						'title'    => esc_html__( 'Style', 'elearning' ),
						'section'  => 'elearning_footer_bar',
						'priority' => 20,
					),
					'elearning_footer_bar_bg'            => array(
						'default'   => array(
							'background-color'      => '#ffffff',
							'background-image'      => '',
							'background-repeat'     => 'repeat',
							'background-position'   => 'center center',
							'background-size'       => 'contain',
							'background-attachment' => 'scroll',
						),
						'type'      => 'customind-background',
						'title'     => esc_html__( 'Background', 'elearning' ),
						'transport' => 'postMessage',
						'priority'  => 25,
						'section'   => 'elearning_footer_bar',
					),
					'elearning_footer_bar_border_top_width_divider' => array(
						'type'     => 'customind-divider',
						'variant'  => 'dashed',
						'section'  => 'elearning_footer_bar',
						'priority' => 50,
					),
					'elearning_footer_bar_border_top_width_heading' => array(
						'type'     => 'customind-title',
						'title'    => esc_html__( 'Border Top', 'elearning' ),
						'section'  => 'elearning_footer_bar',
						'priority' => 50,
					),
					'elearning_footer_bar_border_top_width' => array(
						'default'     => array(
							'size'  => 0,
							'units' => 'px',
						),
						'type'        => 'customind-slider',
						'title'       => esc_html__( 'Width', 'elearning' ),
						'section'     => 'elearning_footer_bar',
						'transport'   => 'postMessage',
						'priority'    => 50,
						'units'       => array( 'px' ),
						'defaultUnit' => 'px',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 100,
							'step' => 1,
						),
					),
					'elearning_footer_bar_border_top_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => '#e9ecef',
						'type'      => 'customind-color',
						'transport' => 'postMessage',
						'priority'  => 50,
						'section'   => 'elearning_footer_bar',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_bar_accordion_collapsible', false ),
		),
		'elearning_footer_bar_column_1_heading'    => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Left Content', 'elearning' ),
			'section'      => 'elearning_footer_bar',
			'priority'     => 10,
			'sub_controls' => apply_filters(
				'elearning_footer_bar_column_1_sub_controls',
				array(
					'elearning_footer_bar_section_one' => array(
						'default' => 'text_html',
						'type'    => 'customind-select',
						'title'   => esc_html__( 'Content Type', 'elearning' ),
						'section' => 'elearning_footer_bar',
						'choices' => apply_filters(
							'elearning_footer_bar_section_one_choices',
							array(
								'none'      => esc_html__( 'None', 'elearning' ),
								'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
								'menu'      => esc_html__( 'Menu', 'elearning' ),
								'widget'    => esc_html__( 'Widget', 'elearning' ),
							)
						),
					),
					'elearning_footer_bar_section_one_html' => array(
						'default'     => sprintf(
						/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
							esc_html__( 'Copyright &copy; %1$s %2$s. Powered by %3$s and %4$s.', 'elearning' ),
							'{the-year}',
							'{site-link}',
							'{theme-link}',
							'{wp-link}'
						),
						'type'        => 'customind-editor',
						'title'       => esc_html__( 'Text/HTML for Left Content', 'elearning' ),
						'description' => wp_kses(
							'<a href="' . esc_url( 'https://docs.elearningtheme.com/en/article/dynamic-strings-for-footer-copyright-content-13empt5/' ) . '" target="_blank">' . esc_html__( 'Docs Link', 'elearning' ) . '</a>',
							array(
								'a' => array(
									'href'   => true,
									'target' => true,
								),
							)
						),
						'section'     => 'elearning_footer_bar',
						'transport'   => 'postMessage',
						'partial'     => array(
							'selector'        => '.tg-site-footer-section-1',
							'render_callback' => 'Elearning_Customizer_Partials::customize_partial_footer_bar_section_one_html',
						),
						'condition'   => apply_filters(
							'elearning_footer_bar_section_one_html_cb',
							array(
								'elearning_footer_bar_section_one' => 'text_html',
							)
						),
					),
					'elearning_footer_bar_section_one_menu' => array(
						'default'   => 'none',
						'type'      => 'customind-select',
						'title'     => esc_html__( 'Select a Menu for Left Content', 'elearning' ),
						'section'   => 'elearning_footer_bar',
						'choices'   => eLearning_Utils::get_menus(),
						'condition' => apply_filters(
							'elearning_footer_bar_section_one_menu_cb',
							array(
								'elearning_footer_bar_section_one' => 'menu',
							)
						),
					),
					'elearning_footer_bar_section_one_menu_widget_navigation' => array(
						'title'     => esc_html__( 'Left Widget Navigation', 'elearning' ),
						'type'      => 'customind-navigation',
						'section'   => 'elearning_footer_bar',
						'to'        => 'sidebar-widgets-footer-bar-left-sidebar',
						'nav_type'  => 'section',
						'condition' => array(
							'elearning_footer_bar_section_one' => 'widget',
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_bar_column_1_accordion_collapsible', false ),
		),
		'elearning_footer_bar_section_two_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Right Content', 'elearning' ),
			'section'      => 'elearning_footer_bar',
			'priority'     => 20,
			'sub_controls' => apply_filters(
				'elearning_footer_bar_section_two_sub_controls',
				array(
					'elearning_footer_bar_section_two' => array(
						'default' => 'none',
						'type'    => 'customind-select',
						'title'   => esc_html__( 'Content Type', 'elearning' ),
						'section' => 'elearning_footer_bar',
						'choices' => apply_filters(
							'elearning_footer_bar_section_two_choices',
							array(
								'none'      => esc_html__( 'None', 'elearning' ),
								'text_html' => esc_html__( 'Text/HTML', 'elearning' ),
								'menu'      => esc_html__( 'Menu', 'elearning' ),
								'widget'    => esc_html__( 'Widget', 'elearning' ),
							)
						),
					),
					'elearning_footer_bar_section_two_html' => array(
						'default'   => '',
						'type'      => 'customind-editor',
						'title'     => esc_html__( 'Text/HTML for Right Content', 'elearning' ),
						'section'   => 'elearning_footer_bar',
						'transport' => 'postMessage',
						'partial'   => array(
							'selector'        => '.tg-site-footer-section-2',
							'render_callback' => 'Elearning_Customizer_Partials::customize_partial_footer_bar_section_two_html',
						),
						'condition' => apply_filters(
							'elearning_footer_bar_section_two_html_cb',
							array(
								'elearning_footer_bar_section_two' => 'text_html',
							)
						),
					),
					'elearning_footer_bar_section_two_menu' => array(
						'default'   => 'none',
						'type'      => 'customind-select',
						'title'     => esc_html__( 'Select a Menu for Right Content', 'elearning' ),
						'section'   => 'elearning_footer_bar',
						'choices'   => eLearning_Utils::get_menus(),
						'condition' => apply_filters(
							'elearning_footer_bar_section_two_menu_cb',
							array(
								'elearning_footer_bar_section_two' => 'menu',
							)
						),
					),
					'elearning_footer_bar_section_two_widget_navigation' => array(
						'title'     => esc_html__( 'Right Widget Navigation', 'elearning' ),
						'type'      => 'customind-navigation',
						'section'   => 'elearning_footer_bar',
						'to'        => 'sidebar-widgets-footer-bar-right-sidebar',
						'nav_type'  => 'section',
						'condition' => array(
							'elearning_footer_bar_section_two' => 'widget',
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_bar_column_2_accordion_collapsible', false ),
		),
		'elearning_footer_bar_content_heading'     => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Footer Content', 'elearning' ),
			'section'      => 'elearning_footer_bar',
			'priority'     => 40,
			'sub_controls' => apply_filters(
				'elearning_footer_bar_content_sub_controls',
				array(
					'elearning_footer_bar_text_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => '#51585f',
						'type'      => 'customind-color',
						'transport' => 'postMessage',
						'section'   => 'elearning_footer_bar',
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_bar_content_accordion_collapsible', false ),
		),
		'elearning_footer_bar_link_heading'        => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Link', 'elearning' ),
			'section'      => 'elearning_footer_bar',
			'priority'     => 50,
			'sub_controls' => apply_filters(
				'elearning_footer_bar_link_sub_controls',
				array(
					'elearning_footer_bar_link_color_group' => array(
						'type'         => 'customind-color-group',
						'title'        => esc_html__( 'Color', 'elearning' ),
						'section'      => 'elearning_footer_bar',
						'sub_controls' => array(
							'elearning_footer_bar_link_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Normal', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_footer_bar',
							),
							'elearning_footer_bar_link_hover_color' => array(
								'default'   => '',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Hover', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_footer_bar',
							),
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_bar_link_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
