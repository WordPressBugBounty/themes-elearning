<?php

$options = apply_filters(
	'elearning_footer_widgets_options',
	array(
		'elearning_footer_widgets_heading'               => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Footer Column', 'elearning' ),
			'section'      => 'elearning_footer_widgets',
			'sub_controls' => apply_filters(
				'elearning_footer_widgets_sub_controls',
				array(
					'elearning_footer_widgets'         => array(
						'title'    => esc_html__( 'Enable', 'elearning' ),
						'default'  => false,
						'type'     => 'customind-toggle',
						'priority' => 5,
						'section'  => 'elearning_footer_widgets',
					),
					'elearning_footer_widgets_style'   => array(
						'default'   => 'tg-footer-widget-col--four',
						'type'      => 'customind-radio-image',
						'title'     => esc_html__( 'Advanced Style', 'elearning' ),
						'section'   => 'elearning_footer_widgets',
						'priority'  => 8,
						'choices'   => apply_filters(
							'elearning_footer_widgets_style_choices',
							array(
								'tg-footer-widget-col--one' => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-column-one.svg',
								),
								'tg-footer-widget-col--two' => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-column-two.svg',
								),
								'tg-footer-widget-col--three' => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-column-three.svg',
								),
								'tg-footer-widget-col--four' => array(
									'label' => '',
									'url'   => ELEARNING_PARENT_INC_ICON_URI . '/footer-column-four.svg',
								),
							)
						),
						'columns'   => 2,
						'condition' => array(
							'elearning_footer_widgets' => true,
							'elearning_footer_widgets_layout!' => 'layout-2',
						),
					),
					'elearning_footer_widgets_divider' => array(
						'type'      => 'customind-divider',
						'variant'   => 'dashed',
						'section'   => 'elearning_footer_widgets',
						'priority'  => 11,
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_style_heading' => array(
						'type'      => 'customind-title',
						'title'     => esc_html__( 'Style', 'elearning' ),
						'section'   => 'elearning_footer_widgets',
						'priority'  => 11,
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_bg'      => array(
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
						'section'   => 'elearning_footer_widgets',
						'priority'  => 11,
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_border_divider' => array(
						'type'      => 'customind-divider',
						'variant'   => 'dashed',
						'section'   => 'elearning_footer_widgets',
						'priority'  => 15,
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_border_heading' => array(
						'title'     => esc_html__( 'Border Top', 'elearning' ),
						'type'      => 'customind-title',
						'section'   => 'elearning_footer_widgets',
						'priority'  => 15,
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_border_top_width' => array(
						'default'     => array(
							'size'  => 1,
							'units' => 'px',
						),
						'type'        => 'customind-slider',
						'title'       => esc_html__( 'Size', 'elearning' ),
						'section'     => 'elearning_footer_widgets',
						'transport'   => 'postMessage',
						'units'       => array( 'px' ),
						'defaultUnit' => 'px',
						'priority'    => 20,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
						'condition'   => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_border_top_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => '#e9ecef',
						'type'      => 'customind-color',
						'section'   => 'elearning_footer_widgets',
						'transport' => 'postMessage',
						'priority'  => 25,
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_widgets_accordion_collapsible', false ),
		),
		'elearning_footer_widgets_text_heading'          => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Text', 'elearning' ),
			'section'      => 'elearning_footer_widgets',
			'sub_controls' => apply_filters(
				'elearning_footer_widgets_text_sub_controls',
				array(
					'elearning_footer_widgets_text_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => 'var(--elearning-color-7)',
						'type'      => 'customind-color',
						'section'   => 'elearning_footer_widgets',
						'transport' => 'postMessage',
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_widgets_text_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_footer_widgets' => true,
			),
		),
		'elearning_footer_widgets_widget_link_heading'   => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Link', 'elearning' ),
			'section'      => 'elearning_footer_widgets',
			'sub_controls' => apply_filters(
				'elearning_footer_widgets_widget_link_sub_controls',
				array(
					'elearning_footer_widgets_widget_link_color_group'   => array(
						'type'         => 'customind-color-group',
						'title'        => esc_html__( 'Color', 'elearning' ),
						'section'      => 'elearning_footer_widgets',
						'sub_controls' => array(
							'elearning_footer_widgets_link_color'       => array(
								'default'   => 'var(--elearning-color-7, #16181a)',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Normal', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_footer_widgets',
							),
							'elearning_footer_widgets_link_hover_color' => array(
								'default' => 'var(--elearning-color-1, #269bd1)',
								'type'    => 'customind-color',
								'title'   => esc_html__( 'Hover', 'elearning' ),
								'section' => 'elearning_footer_widgets',
							),
						),
						'condition'    => array(
							'elearning_footer_widgets' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_widgets_widget_link_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_footer_widgets' => true,
			),
		),
		'elearning_footer_widgets_widgets_title_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Widget', 'elearning' ),
			'section'      => 'elearning_footer_widgets',
			'sub_controls' => apply_filters(
				'elearning_footer_widgets_widgets_title_sub_controls',
				array(
					'elearning_footer_widgets_widgets_heading' => array(
						'priority'  => 5,
						'type'      => 'customind-title',
						'title'     => esc_html__( 'Title', 'elearning' ),
						'section'   => 'elearning_footer_widgets',
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_title'       => array(
						'title'     => esc_html__( 'Hide Widget Title', 'elearning' ),
						'default'   => false,
						'type'      => 'customind-toggle',
						'section'   => 'elearning_footer_widgets',
						'priority'  => 5,
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_title_color' => array(
						'title'     => esc_html__( 'Color', 'elearning' ),
						'default'   => 'var(--elearning-color-7, #16181a)',
						'type'      => 'customind-color',
						'transport' => 'postMessage',
						'priority'  => 5,
						'section'   => 'elearning_footer_widgets',
						'condition' => array(
							'elearning_footer_widgets' => true,
							'elearning_footer_widgets_title' => true,
						),
					),
				)
			),
			'priority'     => 20,
			'collapsible'  => apply_filters( 'elearning_footer_widgets_widgets_title_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_footer_widgets' => true,
			),
		),
		'elearning_footer_widgets_list_item_heading'     => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Widget List Item', 'elearning' ),
			'section'      => 'elearning_footer_widgets',
			'priority'     => 25,
			'sub_controls' => apply_filters(
				'elearning_footer_widgets_list_item_sub_controls',
				array(
					'elearning_footer_widgets_item_border_bottom_width' => array(
						'default'     => array(
							'size'  => 1,
							'units' => 'px',
						),
						'type'        => 'customind-slider',
						'title'       => esc_html__( 'Border Bottom Width', 'elearning' ),
						'section'     => 'elearning_footer_widgets',
						'transport'   => 'postMessage',
						'units'       => array( 'px' ),
						'defaultUnit' => 'px',
						'priority'    => 15,
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 20,
							'step' => 1,
						),
						'condition'   => array(
							'elearning_footer_widgets' => true,
						),
					),
					'elearning_footer_widgets_item_border_bottom_color' => array(
						'title'     => esc_html__( 'Border Bottom Color', 'elearning' ),
						'default'   => '#e9ecef',
						'type'      => 'customind-color',
						'section'   => 'elearning_footer_widgets',
						'priority'  => 15,
						'transport' => 'postMessage',
						'condition' => array(
							'elearning_footer_widgets' => true,
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_footer_widgets_list_item_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_footer_widgets' => true,
			),
		),
	)
);

elearning_customind()->add_controls( $options );
