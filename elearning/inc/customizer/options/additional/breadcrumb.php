<?php

$options = apply_filters(
	'elearning_breadcrumbs_options',
	array(
		'elearning_breadcrumbs'                  => array(
			'title'   => esc_html__( 'Enable Breadcrumbs', 'elearning' ),
			'default' => false,
			'type'    => 'customind-toggle',
			'section' => 'elearning_breadcrumb',
		),
		'elearning_breadcrumb_typography'        => array(
			'default'   => apply_filters(
				'elearning_breadcrumb_typography_filter',
				array(
					'font-family' => 'Default',
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
				)
			),
			'type'      => 'customind-typography',
			'title'     => esc_html__( 'Breadcrumbs Typography', 'elearning' ),
			'transport' => 'postMessage',
			'section'   => 'elearning_breadcrumb',
			'condition' => array(
				'elearning_breadcrumbs' => true,
			),
		),
		'elearning_breadcrumbs_text_color'       => array(
			'title'     => esc_html__( 'Text Color', 'elearning' ),
			'default'   => 'var(--elearning-color-7)',
			'type'      => 'customind-color',
			'transport' => 'postMessage',
			'section'   => 'elearning_breadcrumb',
			'condition' => array(
				'elearning_breadcrumbs' => true,
			),
		),
		'elearning_breadcrumbs_seperator_color'  => array(
			'title'     => esc_html__( 'Separator Color', 'elearning' ),
			'default'   => 'var(--elearning-color-7)',
			'type'      => 'customind-color',
			'transport' => 'postMessage',
			'section'   => 'elearning_breadcrumb',
			'condition' => array(
				'elearning_breadcrumbs' => true,
			),
		),
		'elearning_breadcrumbs_link_color_group' => array(
			'type'         => 'customind-color-group',
			'title'        => esc_html__( 'Link Color', 'elearning' ),
			'section'      => 'elearning_breadcrumb',
			'sub_controls' => array(
				'elearning_breadcrumbs_link_color'       => array(
					'default'   => 'var(--elearning-color-7)',
					'type'      => 'customind-color',
					'transport' => 'postMessage',
					'title'     => esc_html__( 'Normal', 'elearning' ),
					'section'   => 'elearning_breadcrumb',
				),
				'elearning_breadcrumbs_link_hover_color' => array(
					'default'   => 'var(--elearning-color-1)',
					'type'      => 'customind-color',
					'transport' => 'postMessage',
					'title'     => esc_html__( 'Hover', 'elearning' ),
					'section'   => 'elearning_breadcrumb',
				),
			),
			'condition'    => array(
				'elearning_breadcrumbs' => true,
			),
		),
	)
);

elearning_customind()->add_controls( $options );
