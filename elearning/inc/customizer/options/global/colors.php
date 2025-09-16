<?php
use function Customind\Core\get_social_networks;

/**
 * Global Colors Options
 *
 * @package elearning
 */

//       '1': 'Main Accent'
//      '2': 'Secondary Accent'
//      '3': 'Main Background'
//      '4': 'Surface Background'
//      '5': 'Contrast Background'
//      '6': 'Title Text'
//      '7': 'Regular Text'
//      '8': 'Text on Contrast'
//      '9': 'Muted Color'
$options = apply_filters(
	'elearning_global_color_options',
	array(
		'elearning_color_palettes'               => array(
			'type'     => 'customind-heading',
			'priority' => 5,
			'title'    => esc_html__( 'Color Palette', 'elearning' ),
			'section'  => 'elearning_colors',
		),
		'elearning_color_palette'                => array(
			'type'              => 'customind-color-palette',
			'title'             => esc_html__( 'Color palette', 'elearning' ),
			'section'           => 'elearning_colors',
			'maxCustomPalettes' => 2,
			'priority'          => 5,
			'default'           => array(
				'id'     => 'preset-5',
				'name'   => 'Default',
				'colors' => array(
					'elearning-color-1' => '#269bd1',
					'elearning-color-2' => '#1e7ba6',
					'elearning-color-3' => '#FFFFFF',
					'elearning-color-4' => '#F9FEFD',
					'elearning-color-5' => '#27272A',
					'elearning-color-6' => '#16181A',
					'elearning-color-7' => '#51585f',
					'elearning-color-8' => '#FFFFFF',
					'elearning-color-9' => '#e4e4e7',
				),
			),
			'presets'           => array(
				array(
					'id'     => 'preset-5',
					'name'   => 'Default',
					'colors' => array(
						'elearning-color-1' => '#269bd1',
						'elearning-color-2' => '#1e7ba6',
						'elearning-color-3' => '#FFFFFF',
						'elearning-color-4' => '#F9FEFD',
						'elearning-color-5' => '#27272A',
						'elearning-color-6' => '#16181A',
						'elearning-color-7' => '#51585f',
						'elearning-color-8' => '#FFFFFF',
						'elearning-color-9' => '#e4e4e7',
					),
				),
				array(
					'id'     => 'preset-6',
					'name'   => 'Coral Red',
					'colors' => array(
						'elearning-color-1' => '#F44336',
						'elearning-color-2' => '#D12729',
						'elearning-color-3' => '#FFFFFF',
						'elearning-color-4' => '#FEF6F4',
						'elearning-color-5' => '#0F000A',
						'elearning-color-6' => '#252020',
						'elearning-color-7' => '#7E7777',
						'elearning-color-8' => '#FFFFFF',
						'elearning-color-9' => '#C1BDBD',
					),
				),
				array(
					'id'     => 'preset-7',
					'name'   => 'Apple Green',
					'colors' => array(
						'elearning-color-1' => '#4CAF50',
						'elearning-color-2' => '#379643',
						'elearning-color-3' => '#FFFFFF',
						'elearning-color-4' => '#FAFEF6',
						'elearning-color-5' => '#000504',
						'elearning-color-6' => '#141614',
						'elearning-color-7' => '#858585',
						'elearning-color-8' => '#FFFFFF',
						'elearning-color-9' => '#BDBDBD',
					),
				),
				array(
					'id'     => 'preset-8',
					'name'   => 'Neon Carrot',
					'colors' => array(
						'elearning-color-1' => '#FFA726',
						'elearning-color-2' => '#DB851B',
						'elearning-color-3' => '#FFFFFF',
						'elearning-color-4' => '#FFFDF6',
						'elearning-color-5' => '#0B0A0A',
						'elearning-color-6' => '#121110',
						'elearning-color-7' => '#828282',
						'elearning-color-8' => '#FFFFFF',
						'elearning-color-9' => '#B7B5B3',
					),
				),
			),
		),
		'elearning_theme_colors'                 => array(
			'type'    => 'customind-heading',
			'title'   => esc_html__( 'Theme Colors', 'elearning' ),
			'section' => 'elearning_colors',
		),
		'elearning_base_color_primary'           => array(
			'title'   => esc_html__( 'Primary', 'elearning' ),
			'default' => 'var(--elearning-color-1)',
			'type'    => 'customind-color',
			'section' => 'elearning_colors',
		),
		'elearning_base_color_text'              => array(
			'title'     => esc_html__( 'Base', 'elearning' ),
			'default'   => 'var(--elearning-color-7)',
			'type'      => 'customind-color',
			'section'   => 'elearning_colors',
			'transport' => 'postMessage',
		),
		'elearning_base_color_border'            => array(
			'title'     => esc_html__( 'Border', 'elearning' ),
			'default'   => 'var(--elearning-color-9)',
			'type'      => 'customind-color',
			'section'   => 'elearning_colors',
			'transport' => 'postMessage',
		),
		'elearning_heading_color'                => array(
			'title'     => esc_html__( 'Heading Color ( H1 - H6 )', 'elearning' ),
			'default'   => 'var(--elearning-color-6)',
			'type'      => 'customind-color',
			'section'   => 'elearning_colors',
			'transport' => 'postMessage',
		),
		'elearning_link_color_group'             => array(
			'type'         => 'customind-color-group',
			'title'        => esc_html__( 'Links', 'elearning' ),
			'section'      => 'elearning_colors',
			'sub_controls' => apply_filters(
				'elearning_link_color_sub_controls',
				array(
					'elearning_link_color'       => array(
						'default'   => 'var(--elearning-color-1)',
						'type'      => 'customind-color',
						'title'     => esc_html__( 'Normal', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_colors',
					),
					'elearning_link_hover_color' => array(
						'default'   => 'var(--elearning-color-2)',
						'type'      => 'customind-color',
						'title'     => esc_html__( 'Hover', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_colors',
					),
				)
			),
		),
		'elearning_inside_container_background'  => array(
			'default'   => array(
				'background-color'      => 'var(--elearning-color-3)',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			),
			'type'      => 'customind-background',
			'title'     => esc_html__( 'Inside Background', 'elearning' ),
			'section'   => 'elearning_colors',
			'transport' => 'postMessage',
		),
		'elearning_outside_container_background' => array(
			'default'   => array(
				'background-color'      => 'var(--elearning-color-4)',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			),
			'type'      => 'customind-background',
			'title'     => esc_html__( 'Outside Background', 'elearning' ),
			'section'   => 'elearning_colors',
			'transport' => 'postMessage',
		),
	)
);


elearning_customind()->add_controls( $options );
