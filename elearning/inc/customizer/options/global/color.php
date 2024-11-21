<?php
use function Customind\Core\get_social_networks;
$options = apply_filters(
	'elearning_global_color_options',
	array(
		'elearning_color_palettes' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Customized Color palette', 'elearning' ),
			'section'      => 'elearning_colors',
			'sub_controls' => array(
				'elearning_color_palette' => array(
					'type'      => 'customind-color-palette',
					'title'     => esc_html__( 'Customized Color palette', 'elearning' ),
					'section'   => 'elearning_colors',
					'priority'  => 5,
					'transport' => 'postMessage',
					'default'   => array(
						'id'     => 'preset-1',
						'name'   => 'Preset 1',
						'colors' => array(
							'elearning-color-1' => '#eaf3fb',
							'elearning-color-2' => '#bfdcf3',
							'elearning-color-3' => '#94c4eb',
							'elearning-color-4' => '#6aace2',
							'elearning-color-5' => '#257bc1',
							'elearning-color-6' => '#1d6096',
							'elearning-color-7' => '#15446b',
							'elearning-color-8' => '#0c2941',
							'elearning-color-9' => '#040e16',
						),
					),
					'presets'   => array(
						array(
							'id'     => 'preset-1',
							'name'   => 'Preset 1',
							'colors' => array(
								'elearning-color-1' => '#eaf3fb',
								'elearning-color-2' => '#bfdcf3',
								'elearning-color-3' => '#94c4eb',
								'elearning-color-4' => '#6aace2',
								'elearning-color-5' => '#257bc1',
								'elearning-color-6' => '#1d6096',
								'elearning-color-7' => '#15446b',
								'elearning-color-8' => '#0c2941',
								'elearning-color-9' => '#040e16',
							),
						),
						array(
							'id'     => 'preset-2',
							'name'   => 'Preset 2',
							'colors' => array(
								'elearning-color-1' => '#fbebf6',
								'elearning-color-2' => '#f3c0e3',
								'elearning-color-3' => '#eb95d0',
								'elearning-color-4' => '#e36abc',
								'elearning-color-5' => '#c22590',
								'elearning-color-6' => '#971d70',
								'elearning-color-7' => '#6c1550',
								'elearning-color-8' => '#420c31',
								'elearning-color-9' => '#170411',
							),
						),
						array(
							'id'     => 'preset-3',
							'name'   => 'Preset 3',
							'colors' => array(
								'elearning-color-1' => '#fafbeb',
								'elearning-color-2' => '#f0f3c0',
								'elearning-color-3' => '#e5eb95',
								'elearning-color-4' => '#dbe36a',
								'elearning-color-5' => '#b8c225',
								'elearning-color-6' => '#8f971d',
								'elearning-color-7' => '#676c15',
								'elearning-color-8' => '#3e420c',
								'elearning-color-9' => '#161704',
							),
						),
						array(
							'id'     => 'preset-4',
							'name'   => 'Preset 4',
							'colors' => array(
								'elearning-color-1' => '#fbeeeb',
								'elearning-color-2' => '#f3c8c0',
								'elearning-color-3' => '#eba395',
								'elearning-color-4' => '#e37e6a',
								'elearning-color-5' => '#c23f25',
								'elearning-color-6' => '#97311d',
								'elearning-color-7' => '#6c2315',
								'elearning-color-8' => '#42150c',
								'elearning-color-9' => '#170704',
							),
						),
					),
				),
			),
			'priority'     => 5,
			'collapsible'  => apply_filters( 'elearning_theme_colors_accordion_collapsible', false ),
		),
		'elearning_theme_colors'   => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Theme Colors', 'elearning' ),
			'section'      => 'elearning_colors',
			'sub_controls' => apply_filters(
				'elearning_theme_colors_sub_controls',
				array(
					'elearning_base_color_primary' => array(
						'title'    => esc_html__( 'Primary', 'elearning' ),
						'default'  => '#269bd1',
						'type'     => 'customind-color',
						'section'  => 'elearning_colors',
						'priority' => 5,
					),
					'elearning_base_color_text'    => array(
						'title'     => esc_html__( 'Base', 'elearning' ),
						'default'   => '#51585f',
						'type'      => 'customind-color',
						'section'   => 'elearning_colors',
						'transport' => 'postMessage',
						'priority'  => 5,
					),
					'elearning_base_color_border'  => array(
						'title'     => esc_html__( 'Border', 'elearning' ),
						'default'   => '#E4E4E7',
						'type'      => 'customind-color',
						'section'   => 'elearning_colors',
						'transport' => 'postMessage',
						'priority'  => 5,
					),
					'elearning_heading_color'      => array(
						'title'     => esc_html__( 'Heading Color ( H1 - H6 )', 'elearning' ),
						'default'   => '#16181a',
						'type'      => 'customind-color',
						'section'   => 'elearning_colors',
						'transport' => 'postMessage',
						'priority'  => 5,
					),
				)
			),
			'priority'     => 5,
			'collapsible'  => apply_filters( 'elearning_theme_colors_accordion_collapsible', false ),
		),
		'elearning_link_colors'    => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Links', 'elearning' ),
			'section'      => 'elearning_colors',
			'sub_controls' => apply_filters(
				'elearning_link_colors_sub_controls',
				array(
					'elearning_link_color_group' => array(
						'type'         => 'customind-color-group',
						'title'        => esc_html__( 'Links', 'elearning' ),
						'section'      => 'elearning_colors',
						'sub_controls' => apply_filters(
							'elearning_link_color_sub_controls',
							array(
								'elearning_link_color' => array(
									'default'   => '#269bd1',
									'type'      => 'customind-color',
									'title'     => esc_html__( 'Normal', 'elearning' ),
									'transport' => 'postMessage',
									'section'   => 'elearning_colors',
								),
								'elearning_link_hover_color' => array(
									'default'   => '#1e7ba6',
									'type'      => 'customind-color',
									'title'     => esc_html__( 'Hover', 'elearning' ),
									'transport' => 'postMessage',
									'section'   => 'elearning_colors',
								),
							)
						),
					),
				)
			),
			'priority'     => 15,
			'collapsible'  => apply_filters( 'elearning_link_colors_accordion_collapsible', false ),
		),
	)
);


elearning_customind()->add_controls( $options );
