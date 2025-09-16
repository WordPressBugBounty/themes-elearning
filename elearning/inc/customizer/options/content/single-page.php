<?php
$container_layout_choices = apply_filters(
	'elearning_container_layout_choices',
	array(
		'default'                    => array(
			'label' => 'Inherit',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/inherit.svg',
		),
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
		'default'               => array(
			'label' => 'Inherit',
			'url'   => ELEARNING_PARENT_INC_ICON_URI . '/inherit.svg',
		),
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
$options                = apply_filters(
	'elearning_single_page_options',
	array(
		'elearning_single_page_container_layout'       => array(
			'default'   => 'default',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Container Layout', 'elearning' ),
			'section'   => 'elearning_single_page_section',
			'tab_group' => 'elearning_single_page_container_tab_group',
			'choices'   => $container_layout_choices,
			'columns'   => 2,
			'priority'  => 10,
		),
		'elearning_single_page_sidebar_layout_divider' => array(
			'type'       => 'customind-divider',
			'variant'    => 'dashed',
			'section'    => 'elearning_single_page_section',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'elearning_single_page_container_layout',
						'operator' => '===',
						'value'    => 'tg-site-layout--no-sidebar',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'elearning_single_page_container_layout',
								'operator' => '===',
								'value'    => 'default',
							),
							array(
								'id'       => 'elearning_global_container_layout',
								'operator' => '===',
								'value'    => 'tg-site-layout--no-sidebar',
							),
						),
					),
				),
			),
		),
		'elearning_single_page_sidebar_layout'         => array(
			'default'    => 'default',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'elearning' ),
			'section'    => 'elearning_single_page_section',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'priority'   => 10,
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'elearning_single_page_container_layout',
						'operator' => '===',
						'value'    => 'tg-site-layout--no-sidebar',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'elearning_single_page_container_layout',
								'operator' => '===',
								'value'    => 'default',
							),
							array(
								'id'       => 'elearning_global_container_layout',
								'operator' => '===',
								'value'    => 'tg-site-layout--no-sidebar',
							),
						),
					),
				),
			),
		),
	)
);

elearning_customind()->add_controls( $options );
