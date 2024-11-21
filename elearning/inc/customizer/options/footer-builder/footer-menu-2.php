<?php
$menus        = wp_get_nav_menus();
$menu_choices = array();

foreach ( $menus as $menu ) {
	$menu_choices[ $menu->term_id ] = $menu->name;
}
$options = array(
	'elearning_footer_menu_2_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Footer Menu', 'elearning' ),
		'section'      => 'elearning_footer_builder_footer_menu_2',
		'sub_controls' => apply_filters(
			'elearning_footer_menu_2_sub_controls',
			array(
				'elearning_footer_menu_2'             => array(
					'default' => 'none',
					'type'    => 'customind-select',
					'title'   => esc_html__( 'Select a Menu', 'elearning' ),
					'section' => 'elearning_footer_builder_footer_menu_2',
					'choices' => elearning_get_menu_options(),
				),
				'elearning_footer_menu_2_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => 'Color',
					'section'      => 'elearning_footer_builder_footer_menu_2',
					'sub_controls' => array(
						'elearning_footer_menu_2_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Normal', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_footer_builder_footer_menu_2',
						),
						'elearning_footer_menu_2_hover_color' => array(
							'default'   => '',
							'type'      => 'customind-color',
							'title'     => esc_html__( 'Hover', 'elearning' ),
							'transport' => 'postMessage',
							'section'   => 'elearning_footer_builder_footer_menu_2',
						),
					),
				),
				'elearning_footer_menu_2_typography'  => array(
					'default'   => array(
						'font-family'    => 'Default',
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
					'transport' => 'postMessage',
					'section'   => 'elearning_footer_builder_footer_menu_2',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_footer_menu_2_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
