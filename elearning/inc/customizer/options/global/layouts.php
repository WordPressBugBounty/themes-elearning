<?php
$container_layout_choices = apply_filters(
	'elearning_container_layout_choices',
	array(
		'tg-site-layout--no-sidebar' => array(
			'label' => 'Normal',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/normal.svg',
		),
		'tg-site-layout--centered'   => array(
			'label' => 'Narrow',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/narrow.svg',
		),
		'tg-site-layout--stretched'  => array(
			'label' => 'Full Width',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/full-width.svg',
		),
	)
);

$sidebar_layout_choices = apply_filters(
	'elearning_sidebar_layout_choices',
	array(
		'no_sidebar'            => array(
			'label' => 'No Sidebar',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/no-sidebar.svg',
		),
		'tg-site-layout--right' => array(
			'label' => 'Right Sidebar',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/right-sidebar.svg',
		),
		'tg-site-layout--left'  => array(
			'label' => 'Left Sidebar',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/left-sidebar.svg',
		),
	)
);
$options                = array(
	'elearning_container_heading'       => array(
		'type'    => 'customind-heading',
		'title'   => esc_html__( 'Container', 'elearning' ),
		'section' => 'elearning_container',
	),
	'elearning_global_container_layout' => array(
		'default' => 'tg-site-layout--no-sidebar',
		'type'    => 'customind-radio-image',
		'title'   => esc_html__( 'Layout', 'elearning' ),
		'section' => 'elearning_container',
		'choices' => $container_layout_choices,
		'columns' => 2,
	),
	'elearning_general_container_style' => [
		'type'    => 'customind-toggle-button',
		'default' => 'tg-container--wide',
		'title'   => esc_html__( 'Style', 'elearning' ),
		'section' => 'elearning_container',
		'choices' => [
			'tg-container--wide'     => esc_html__( 'Wide', 'elearning' ),
			'tg-container--boxed'    => esc_html__( 'Boxed', 'elearning' ),
			'tg-container--separate' => esc_html__( 'Separate', 'elearning' ),
		],
	],
	'elearning_general_container_width' => array(
		'default'     => array(
			'size' => 1160,
			'unit' => 'px',
		),
		'type'        => 'customind-slider',
		'title'       => esc_html__( 'Container Width', 'elearning' ),
		'section'     => 'elearning_container',
		'transport'   => 'postMessage',
		'units'       => array( 'px' ),
		'defaultUnit' => 'px',
		'input_attrs' => array(
			'min'  => 768,
			'max'  => 1920,
			'step' => 1,
		),
	),
	'elearning_content_area_padding'    => array(
		'default'     => array(
			'top'    => '',
			'right'  => '',
			'bottom' => '',
			'left'   => '',
			'unit'   => 'px',
		),
		'type'        => 'customind-dimensions',
		'title'       => esc_html__( 'Padding', 'elearning' ),
		'section'     => 'elearning_container',
		'units'       => array( 'px', 'em', '%', 'rem' ),
		'defaultUnit' => 'px',
	),
	'elearning_sidebar_general_heading' => array(
		'type'      => 'customind-heading',
		'title'     => esc_html__( 'Sidebar', 'elearning' ),
		'section'   => 'elearning_container',
		'condition' => array(
			'elearning_global_container_layout' => 'tg-site-layout--no-sidebar',
		),
	),
	'elearning_global_sidebar_layout'   => array(
		'default'   => 'no_sidebar',
		'type'      => 'customind-radio-image',
		'title'     => esc_html__( 'Layout', 'elearning' ),
		'section'   => 'elearning_container',
		'choices'   => $sidebar_layout_choices,
		'columns'   => 2,
		'condition' => array(
			'elearning_global_container_layout' => 'tg-site-layout--no-sidebar',
		),
	),
	'elearning_general_sidebar_width'   => array(
		'default'     => array(
			'size' => 30,
			'unit' => '%',
		),
		'type'        => 'customind-slider',
		'title'       => esc_html__( 'Width', 'elearning' ),
		'section'     => 'elearning_container',
		'transport'   => 'postMessage',
		'units'       => array( '%' ),
		'defaultUnit' => '%',
		'input_attrs' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'condition'   => array(
			'elearning_global_sidebar_layout!' => 'no_sidebar',
		),
	),
);

elearning_customind()->add_controls( $options );
