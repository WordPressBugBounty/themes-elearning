<?php
$menus        = wp_get_nav_menus();
$menu_choices = array();

foreach ( $menus as $menu ) {
	$menu_choices[ $menu->term_id ] = $menu->name;
}
$options = array(
	'elearning_header_mobile_menu_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Mobile Menu', 'elearning' ),
		'section'      => 'elearning_header_builder_mobile_menu',
		'priority'     => 9,
		'sub_controls' => apply_filters(
			'elearning_header_mobile_menu_sub_controls',
			array(
				'elearning_header_mobile_menu_typography' => array(
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
					'section'   => 'elearning_header_builder_mobile_menu',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_header_mobile_menu_accordion_collapsible', false ),
	),

);


elearning_customind()->add_controls( $options );
