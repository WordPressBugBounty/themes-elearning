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
	'elearning_single_blog_post_options',
	array(
		'elearning_single_post_container_layout'       => array(
			'default'   => 'tg-site-layout--centered',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Container Layout', 'elearning' ),
			'section'   => 'elearning_single_blog_post',
			'tab_group' => 'elearning_single_post_container_tab_group',
			'tab'       => 'general',
			'choices'   => $container_layout_choices,
			'columns'   => 2,
			'priority'  => 10,
		),
		'elearning_single_post_sidebar_layout_divider' => array(
			'type'       => 'customind-divider',
			'variant'    => 'dashed',
			'tab'        => 'general',
			'section'    => 'elearning_single_blog_post',
			'tab_group'  => 'elearning_single_post_container_tab_group',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'elearning_single_post_container_layout',
						'operator' => '===',
						'value'    => 'tg-site-layout--no-sidebar',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'elearning_single_post_container_layout',
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
		'elearning_single_post_sidebar_layout'         => array(
			'default'    => 'default',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'elearning' ),
			'section'    => 'elearning_single_blog_post',
			'tab_group'  => 'elearning_single_post_container_tab_group',
			'tab'        => 'general',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'priority'   => 10,
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'elearning_single_post_container_layout',
						'operator' => '===',
						'value'    => 'tg-site-layout--no-sidebar',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'elearning_single_post_container_layout',
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
		'elearning_single_post_layout_divider'         => array(
			'type'      => 'customind-divider',
			'variant'   => 'dashed',
			'tab'       => 'general',
			'section'   => 'elearning_single_blog_post',
			'tab_group' => 'elearning_single_post_container_tab_group',
		),
		'elearning_single_post_elements_heading'       => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Post Elements', 'elearning' ),
			'section'   => 'elearning_single_blog_post',
			'tab_group' => 'elearning_single_post_container_tab_group',
			'tab'       => 'general',
		),
		'elearning_single_post_elements'               => array(
			'type'      => 'customind-sortable',
			'section'   => 'elearning_single_blog_post',
			'tab_group' => 'elearning_single_post_container_tab_group',
			'tab'       => 'general',
			'choices'   => array(
				'thumbnail' => esc_attr__( 'Featured Image', 'elearning' ),
				'header'    => esc_attr__( 'Title', 'elearning' ),
				'meta'      => esc_attr__( 'Meta Tags', 'elearning' ),
				'content'   => esc_attr__( 'Content', 'elearning' ),
			),
			'default'   => array(
				'thumbnail',
				'header',
				'meta',
				'content',
			),
		),
		'elearning_single_meta_elements_heading'       => array(
			'type'        => 'customind-heading',
			'title'       => esc_html__( 'Post Meta', 'elearning' ),
			'section'     => 'elearning_single_blog_post',
			'description' => esc_html__( 'Manage the post meta elements such as Categories, Author, Date, Comments, Tags, etc.', 'elearning' ),
			'tab_group'   => 'elearning_single_post_container_tab_group',
			'tab'         => 'general',
		),
		'elearning_single_post_meta'                   => array(
			'type'      => 'customind-sortable',
			'section'   => 'elearning_single_blog_post',
			'tab_group' => 'elearning_single_post_container_tab_group',
			'tab'       => 'general',
			'choices'   => array(
				'comments' => esc_attr__( 'Comments', 'elearning' ),
				'category' => esc_attr__( 'Categories', 'elearning' ),
				'author'   => esc_attr__( 'Author', 'elearning' ),
				'date'     => esc_attr__( 'Date', 'elearning' ),
				'tags'     => esc_attr__( 'Tags', 'elearning' ),
			),
			'default'   => array(
				'author',
				'date',
				'category',
				'tags',
				'comments',
			),
		),
	)
);

elearning_customind()->add_controls( $options );
