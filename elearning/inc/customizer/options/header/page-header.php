<?php
$options = array(
	'elearning_page_header_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Page Header', 'elearning' ),
		'section'      => 'elearning_page_header',
		'sub_controls' => apply_filters(
			'elearning_page_header_sub_controls',
			array(
				'elearning_enable_page_title'              => array(
					'title'   => esc_html__( 'Enable', 'elearning' ),
					'default' => true,
					'type'    => 'customind-toggle',
					'section' => 'elearning_page_header',
				),
				'elearning_page_title_alignment'           => array(
					'default'     => 'tg-page-header--left-right',
					'type'        => 'customind-radio-image',
					'title'       => esc_html__( 'Layout', 'elearning' ),
					'section'     => 'elearning_page_header',
					'choices'     => array(
						'tg-page-header--left-right'  => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-right.svg',
						),
						'tg-page-header--right-left'  => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-left.svg',
						),
						'tg-page-header--both-center' => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-center.svg',
						),
						'tg-page-header--both-left'   => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-both-on-left.svg',
						),
						'tg-page-header--both-right'  => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-both-on-right.svg',
						),
					),
					'input_attrs' => array(
						'columns' => 2,
					),
					'condition'   => array(
						'elearning_enable_page_title' => true,
					),
				),
				'elearning_page_header_background_divider' => array(
					'type'      => 'customind-divider',
					'variant'   => 'dashed',
					'section'   => 'elearning_page_header',
					'condition' => array(
						'elearning_enable_page_title' => true,
					),
				),
				'elearning_page_header_background_heading' => array(
					'type'      => 'customind-title',
					'title'     => esc_html__( 'Style', 'elearning' ),
					'section'   => 'elearning_page_header',
					'condition' => array(
						'elearning_enable_page_title' => true,
					),
				),
				'elearning_page_title_bg'                  => array(
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
					'section'   => 'elearning_page_header',
					'condition' => array(
						'elearning_enable_page_title' => true,
					),
				),
				'elearning_page_title_padding'             => array(
					'default'     => array(
						'top'    => '20',
						'right'  => '0',
						'bottom' => '20',
						'left'   => '0',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => esc_html__( 'Padding', 'elearning' ),
					'section'     => 'elearning_page_header',
					'units'       => array( 'px', 'em', 'rem', '%' ),
					'transport'   => 'postMessage',
					'defaultUnit' => 'px',
					'condition'   => array(
						'elearning_enable_page_title' => true,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_page_header_accordion_collapsible', false ),
	),

	'elearning_page_title_heading'  => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Page Title', 'elearning' ),
		'section'      => 'elearning_page_header',
		'sub_controls' => apply_filters(
			'elearning_page_title_sub_controls',
			array(
				'elearning_page_title'                 => array(
					'default'   => 'page-header',
					'type'      => 'customind-radio',
					'title'     => esc_html__( 'Position', 'elearning' ),
					'section'   => 'elearning_page_header',
					'choices'   => array(
						'page-header'  => esc_html__( 'Page Header', 'elearning' ),
						'content-area' => esc_html__( 'Content Area', 'elearning' ),
					),
					'condition' => array(
						'elearning_enable_page_title' => true,
					),
				),
				'elearning_page_title_markup'          => array(
					'default'   => 'h1',
					'type'      => 'customind-select',
					'title'     => esc_html__( 'Markup', 'elearning' ),
					'section'   => 'elearning_page_header',
					'choices'   => array(
						'h1'   => esc_html__( 'Heading 1', 'elearning' ),
						'h2'   => esc_html__( 'Heading 2', 'elearning' ),
						'h3'   => esc_html__( 'Heading 3', 'elearning' ),
						'h4'   => esc_html__( 'Heading 4', 'elearning' ),
						'h5'   => esc_html__( 'Heading 5', 'elearning' ),
						'h6'   => esc_html__( 'Heading 6', 'elearning' ),
						'span' => esc_html__( 'Span', 'elearning' ),
						'p'    => esc_html__( 'Paragraph', 'elearning' ),
						'div'  => esc_html__( 'Div', 'elearning' ),
					),
					'condition' => array(
						'elearning_enable_page_title' => true,
						'elearning_page_title'        => 'page-header',
					),
				),
				'elearning_post_page_title_color'      => array(
					'title'     => esc_html__( 'Color', 'elearning' ),
					'default'   => '#16181a',
					'type'      => 'customind-color',
					'transport' => 'postMessage',
					'section'   => 'elearning_page_header',
					'condition' => array(
						'elearning_enable_page_title' => true,
					),
				),
				'elearning_typography_post_page_title' => array(
					'default'   => apply_filters(
						'elearning_typography_post_page_title_filter',
						array(
							'font-family'    => 'Default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => array(
									'size' => '2.5',
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
									'size' => '1.3',
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
						)
					),
					'type'      => 'customind-typography',
					'title'     => esc_html__( 'Typography', 'elearning' ),
					'section'   => 'elearning_page_header',
					'transport' => 'postMessage',
					'condition' => array(
						'elearning_enable_page_title' => true,
					),
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_page_title_accordion_collapsible', false ),
		'condition'    => array(
			'elearning_enable_page_title' => true,
		),
	),
);

elearning_customind()->add_controls( $options );
