<?php
/**
 * Starter content theme mods definition.
 *
 * @package elearning\Compatibility\Starter_Content
 */
return array(
	'elearning_header_builder'                       => array(
		'desktop' => array(
			'top'    => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
			'main'   => array(
				'left'   => array(
					'logo',
				),
				'center' => array(),
				'right'  => array( 'primary-menu', 'button' ),
			),
			'bottom' => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
		),
		'mobile'  => array(
			'top'    => array(
				'left'   => array(),
				'center' => array(),
				'right'  => array(),
			),
			'main'   => array(
				'left'   => array(),
				'center' => array(
					'logo',
				),
				'right'  => array(),
			),
			'bottom' => array(
				'left'   => array(
					'toggle-button',
				),
				'center' => array(),
				'right'  => array(),
			),
		),
		'offset'  => array(
			'mobile-menu',
			'button',
		),
	),
	'elearning_footer_builder'                       => array(
		'desktop' => array(
			'top'    => array(
				'top-1' => array(),
				'top-2' => array(),
				'top-3' => array(),
				'top-4' => array(),
				'top-5' => array(),
			),
			'main'   => array(
				'main-1' => array(),
				'main-2' => array(),
				'main-3' => array(),
				'main-4' => array(),
				'main-5' => array(),
			),
			'bottom' => array(
				'bottom-1' => array( 'copyright' ),
				'bottom-2' => array(),
				'bottom-3' => array(),
				'bottom-4' => array(),
				'bottom-5' => array(),
			),
		),
	),
	'elearning_header_button_text'                   => esc_html__( 'Get Masteriyo Now', 'elearning' ),
	'elearning_header_button_link'                   => '#',
	'elearning_header_button_background_color'       => '#FFFFFF',
	'elearning_header_button_background_hover_color' => '#56c361',
	'elearning_header_button_border_color'           => '#56c361',
	'elearning_header_button_color'                  => '#56c361',
	'elearning_header_button_hover_color'            => '#FFFFFF',
	'blogname'                                       => 'Masteriyo',
	'elearning_enable_site_identity'                 => true,
	'elearning_header_button_border_radius'          => array(
		'size'  => 100,
		'units' => 'px',
	),
	'elearning_header_button_border_width'           => array(
		'top'    => '2',
		'right'  => '2',
		'bottom' => '2',
		'left'   => '2',
		'units'  => 'px',
	),
	'elearning_header_main_menu_color'               => '#222222',
	'elearning_header_main_menu_hover_color'         => '#787dff',
	'elearning_header_main_menu_active_color'        => '#787dff',
	'elearning_header_builder_toggle_button_color'   => '#FFFFFF',
	'elearning_header_site_identity_color'           => '#222222',
	'elearning_footer_copyright_text_color'          => '#555555',
	'elearning_scroll_to_top_bg_color'               => '#56c361',
	'elearning_scroll_to_top_bg_hover_color'         => '#48a251',
	'elearning_page_title_enable'                    => false,
	'elearning_single_page_sidebar_layout'           => 'no_sidebar',
	'elearning_footer_copyright'                     => sprintf(
	/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
		esc_html__( 'Copyright &copy; %1$s %2$s  Masteriyo Default Demo. Powered by %3$s and %4$s.', 'elearning' ),
		'{the-year}',
		'{site-link}',
		'{theme-link}',
		'{wp-link}'
	),
	'elearning_enable_page_header'                   => false,
	'elearning_enable_site_tagline'                  => false,
	'elearning_header_button_typography'             => array(
		'font-family' => 'Inter',
		'font-weight' => '400',
		'font-size'   => array(
			'desktop' => array(
				'size' => '16',
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
	),
	'elearning_header_main_menu_typography'          => array(
		'font-family' => 'Inter',
		'font-weight' => '600',
		'font-size'   => array(
			'desktop' => array(
				'size' => '16',
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
	),
	'elearning_header_site_title_typography'         => array(
		'font-family' => 'DM Sans',
		'font-weight' => '600',
		'font-size'   => array(
			'desktop' => array(
				'size' => '24',
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
	),
	'elearning_footer_copyright_typography'          => array(
		'font-family' => 'Inter',
		'font-weight' => '400',
		'font-size'   => array(
			'desktop' => array(
				'size' => '16',
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
	),
	'elearning_base_typography_body'                 => array(
		'font-family' => 'Inter',
		'font-weight' => '400',
		'font-size'   => array(
			'desktop' => array(
				'size' => '16',
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
	),
	'elearning_typography_h1'                        => array(
		'font-family' => 'Inter',
		'font-weight' => '600',
		'font-size'   => array(
			'desktop' => array(
				'size' => '43',
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
	),
	'elearning_typography_h2'                        => array(
		'font-family' => 'Inter',
		'font-weight' => '600',
		'font-size'   => array(
			'desktop' => array(
				'size' => '54',
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
	),
	'elearning_typography_h3'                        => array(
		'font-family' => 'Inter',
		'font-weight' => '600',
		'font-size'   => array(
			'desktop' => array(
				'size' => '20',
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
	),
	'elearning_typography_h5'                        => array(
		'font-family' => 'Inter',
		'font-weight' => '500',
		'font-size'   => array(
			'desktop' => array(
				'size' => '16',
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
	),
	'elearning_footer_bottom_area_background'        => array(
		'background-color'      => '#e9eaff',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'contain',
		'background-attachment' => 'scroll',
	),
	'elearning_content_area_padding'                 => array(
		'top'    => '40',
		'right'  => '',
		'bottom' => '0',
		'left'   => '',
		'unit'   => 'px',
	),
	'elearning_header_button_padding'                => array(
		'top'    => '12',
		'right'  => '28',
		'bottom' => '12',
		'left'   => '28',
		'unit'   => 'px',
	),
	'elearning_color_palette'                        => array(
		'id'     => 'preset-5123123',
		'name'   => 'Demo',
		'colors' => array(
			'elearning-color-1' => '#787dff',
			'elearning-color-2' => '#6064ca',
			'elearning-color-3' => '#FFFFFF',
			'elearning-color-4' => '#f2f3ff',
			'elearning-color-5' => '#e9eaff',
			'elearning-color-6' => '#222222',
			'elearning-color-7' => '#555555',
			'elearning-color-8' => '#FFFFFF',
			'elearning-color-9' => '#e4e4e7',
		),
	),
);
