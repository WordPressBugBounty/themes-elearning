<?php

$options = array(
	'elearning_footer_copyright_heading' => array(
		'type'         => 'customind-accordion',
		'title'        => esc_html__( 'Copyright', 'elearning' ),
		'section'      => 'elearning_footer_builder_copyright',
		'sub_controls' => apply_filters(
			'elearning_footer_copyright_sub_controls',
			array(
				'elearning_footer_copyright'            => array(
					'default'     => sprintf(
					/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
						esc_html__( 'Copyright &copy; %1$s %2$s. Powered by %3$s and %4$s.', 'elearning' ),
						'{the-year}',
						'{site-link}',
						'{theme-link}',
						'{wp-link}'
					),
					'type'        => 'customind-editor',
					'title'       => esc_html__( 'Copyright', 'elearning' ),
					'description' => wp_kses(
						'<a href="' . esc_url( 'https://docs.elearningtheme.com/en/article/dynamic-strings-for-footer-copyright-content-13empt5/' ) . '" target="_blank">' . esc_html__( 'Docs Link', 'elearning' ) . '</a>',
						array(
							'a' => array(
								'href'   => true,
								'target' => true,
							),
						)
					),
					'section'     => 'elearning_footer_builder_copyright',
				),
				'elearning_footer_copyright_text_color' => array(
					'title'     => esc_html__( 'Color', 'elearning' ),
					'default'   => 'var(--elearning-color-7)',
					'type'      => 'customind-color',
					'section'   => 'elearning_footer_builder_copyright',
					'transport' => 'postMessage',
				),
				'elearning_footer_copyright_link_color_group' => array(
					'type'         => 'customind-color-group',
					'title'        => esc_html__( 'Links', 'elearning' ),
					'section'      => 'elearning_footer_builder_copyright',
					'sub_controls' => apply_filters(
						'elearning_footer_copyright_link_color_sub_controls',
						array(
							'elearning_footer_copyright_link_color'       => array(
								'default'   => 'var(--elearning-color-7)',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Normal', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_footer_builder_copyright',
							),
							'elearning_footer_copyright_link_hover_color' => array(
								'default'   => 'var(--elearning-color-1)',
								'type'      => 'customind-color',
								'title'     => esc_html__( 'Hover', 'elearning' ),
								'transport' => 'postMessage',
								'section'   => 'elearning_footer_builder_copyright',
							),
						)
					),
				),
				'elearning_footer_copyright_typography' => array(
					'default'   => array(
						'font-family'    => 'inherit',
						'font-weight'    => 'regular',
						'font-size'      => array(
							'desktop' => array(
								'size' => '1',
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
					'section'   => 'elearning_footer_builder_copyright',
				),
				'elearning_footer_copyright_margin'     => array(
					'default'     => array(
						'top'    => '',
						'right'  => '',
						'bottom' => '',
						'left'   => '',
						'unit'   => 'px',
					),
					'type'        => 'customind-dimensions',
					'title'       => 'Margin',
					'section'     => 'elearning_footer_builder_copyright',
					'transport'   => 'postMessage',
					'units'       => array( 'px', 'em', '%', 'rem' ),
					'defaultUnit' => 'px',
				),
			)
		),
		'collapsible'  => apply_filters( 'elearning_footer_copyright_accordion_collapsible', false ),
	),
);

elearning_customind()->add_controls( $options );
