<?php

function customind_get_header_components() {

	return apply_filters(
		'elearning_header_builder_components',
		array(
			'desktop' => array_filter(
				array(
					array(
						'name'    => __( 'Site Title & Logo', 'elearning' ),
						'section' => 'elearning_header_builder_logo',
						'id'      => 'logo',
					),
					array(
						'name'    => __( 'Primary Menu', 'elearning' ),
						'section' => 'elearning_header_builder_primary_menu',
						'id'      => 'primary-menu',
					),
					array(
						'name'    => __( 'Secondary Menu', 'elearning' ),
						'section' => 'elearning_header_builder_secondary_menu',
						'id'      => 'secondary-menu',
					),
					array(
						'name'    => __( 'Tertiary Menu', 'elearning' ),
						'section' => 'elearning_header_builder_tertiary_menu',
						'id'      => 'tertiary-menu',
					),
					array(
						'name'    => __( 'Quaternary Menu', 'elearning' ),
						'section' => 'elearning_header_builder_quaternary_menu',
						'id'      => 'quaternary-menu',
					),
					array(
						'name'    => __( 'Button 1', 'elearning' ),
						'section' => 'elearning_header_builder_button_1',
						'id'      => 'button',
					),
					array(
						'name'    => __( 'Search', 'elearning' ),
						'section' => 'elearning_header_builder_search',
						'id'      => 'search',
					),
					array(
						'name'    => __( 'HTML 1', 'elearning' ),
						'section' => 'elearning_header_builder_html_1',
						'id'      => 'html-1',
					),
					array(
						'name'    => __( 'HTML 2', 'elearning' ),
						'section' => 'elearning_header_builder_html_2',
						'id'      => 'html-2',
					),
					array(
						'name'     => __( 'Widget 1', 'elearning' ),
						'section'  => 'elearning_header_builder_widget_1',
						'id'       => 'widget-1',
						'section2' => 'sidebar-widgets-header-top-left-sidebar',
					),
					array(
						'name'     => __( 'Widget 2', 'elearning' ),
						'section'  => 'elearning_header_builder_widget_2',
						'id'       => 'widget-2',
						'section2' => 'sidebar-widgets-header-top-right-sidebar',
					),
					array(
						'name'    => __( 'Social', 'elearning' ),
						'section' => 'elearning_header_builder_socials',
						'id'      => 'socials',
					),
					class_exists( 'WooCommerce' ) ? array(
						'name'    => __( 'Cart', 'elearning' ),
						'section' => 'elearning_header_builder_cart',
						'id'      => 'cart',
					) : false,
				)
			),
			'mobile'  => array_filter(
				array(
					array(
						'name'    => __( 'Logo', 'elearning' ),
						'section' => 'elearning_header_builder_logo',
						'id'      => 'logo',
					),
					array(
						'name'    => __( 'Mobile Menu', 'elearning' ),
						'section' => 'elearning_header_builder_mobile_menu',
						'id'      => 'mobile-menu',
					),
					array(
						'name'    => __( 'Button', 'elearning' ),
						'section' => 'elearning_header_builder_button_1',
						'id'      => 'button',
					),
					array(
						'name'    => __( 'HTML 1', 'elearning' ),
						'section' => 'elearning_header_builder_html_1',
						'id'      => 'html-1',
					),
					array(
						'name'    => __( 'HTML 2', 'elearning' ),
						'section' => 'elearning_header_builder_html_2',
						'id'      => 'html-2',
					),
					array(
						'name'     => __( 'Widget 1', 'elearning' ),
						'section'  => 'elearning_header_builder_widget_1',
						'id'       => 'widget-1',
						'section2' => 'sidebar-widgets-header-top-left-sidebar',
					),
					array(
						'name'     => __( 'Widget 2', 'elearning' ),
						'section'  => 'elearning_header_builder_widget_2',
						'id'       => 'widget-2',
						'section2' => 'sidebar-widgets-header-top-right-sidebar',
					),
					array(
						'name'    => __( 'Toggle Button', 'elearning' ),
						'section' => 'elearning_header_builder_toggle_button',
						'id'      => 'toggle-button',
					),
					class_exists( 'WooCommerce' ) ? array(
						'name'    => __( 'Cart', 'elearning' ),
						'section' => 'elearning_header_builder_cart',
						'id'      => 'cart',
					) : false,
				)
			),
		)
	);
}

$options = array(
	'elearning_header_builder_components' => array(
		'type'    => 'customind-builder-components',
		'choices' => customind_get_header_components(),
		'context' => 'header',
		'group'   => 'elearning_header_builder',
		'section' => 'elearning_header_builder_section',

	),
	'elearning_header_builder'            => array(
		'section'     => 'elearning_header_builder_section',
		'type'        => 'customind-header-builder',
		'transport'   => 'postMessage',
		'components'  => customind_get_header_components(),
		'default'     => array(
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
					'right'  => array(
						'primary-menu',
						'search',
					),
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
					'left'   => array(
						'logo',
					),
					'center' => array(),
					'right'  => array(
						'toggle-button',
					),
				),
				'bottom' => array(
					'left'   => array(),
					'center' => array(),
					'right'  => array(),
				),
			),
			'offset'  => array(
				'mobile-menu',
			),
		),
		'areas'       => array(
			array(
				'name'    => __( 'Builder area top', 'elearning' ),
				'id'      => 'top',
				'section' => 'elearning_header_builder_top_area',
				'areas'   => array(
					array(
						'name'    => __( 'Builder area top left', 'elearning' ),
						'id'      => 'left',
						'section' => '',
					),
					array(
						'name'    => __( 'Builder area top middle', 'elearning' ),
						'id'      => 'center',
						'section' => '',
					),
					array(
						'name'    => __( 'Builder area top right', 'elearning' ),
						'id'      => 'right',
						'section' => '',
					),
				),
			),
			array(
				'name'    => __( 'Builder Main area', 'elearning' ),
				'id'      => 'main',
				'section' => 'elearning_header_builder_main_area',
				'areas'   => array(
					array(
						'name'    => __( 'Builder area middle left', 'elearning' ),
						'id'      => 'left',
						'section' => '',
					),
					array(
						'name'    => __( 'Main center', 'elearning' ),
						'id'      => 'center',
						'section' => '',
					),
					array(
						'name'    => __( 'Main right', 'elearning' ),
						'id'      => 'right',
						'section' => '',
					),
				),
			),
			array(
				'name'    => __( 'Bottom', 'elearning' ),
				'id'      => 'bottom',
				'section' => 'elearning_header_builder_bottom_area',
				'areas'   => array(
					array(
						'name'    => __( 'Bottom left', 'elearning' ),
						'id'      => 'left',
						'section' => '',
					),
					array(
						'name'    => __( 'Bottom center', 'elearning' ),
						'id'      => 'center',
						'section' => '',
					),
					array(
						'name'    => __( 'Bottom right', 'elearning' ),
						'id'      => 'right',
						'section' => '',
					),
				),
			),
		),
		'offset_area' => array(
			'name'    => __( 'Offset Area', 'elearning' ),
			'id'      => 'offset',
			'section' => 'elearning_header_builder_offset_area',
		),
		'partial'     => array(
			'selector'            => '.zak-header-builder',
			'container_inclusive' => true,
			'render_callback'     => function () {
				elearning_header_builder_markup();
			},
		),
	),
);

elearning_customind()->add_controls( $options );
