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
	'elearning_blog_options',
	array(
		'elearning_blog_container_tab_group'     => array(
			'type'    => 'customind-tabs',
			'title'   => esc_html__( 'Blog', 'elearning' ),
			'section' => 'elearning_blog',
			'tabs'    => array(
				'general' => esc_html__( 'General', 'elearning' ),
				'style'   => esc_html__( 'Style', 'elearning' ),
			),
			'default' => 'general',
		),
		'elearning_blog_container_layout'        => array(
			'default'   => 'default',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Container Layout', 'elearning' ),
			'section'   => 'elearning_blog',
			'tab_group' => 'elearning_blog_container_tab_group',
			'tab'       => 'general',
			'choices'   => $container_layout_choices,
			'columns'   => 2,
			'priority'  => 10,
		),
		'elearning_blog_sidebar_layout_divider'  => array(
			'type'       => 'customind-divider',
			'variant'    => 'dashed',
			'tab_group'  => 'elearning_blog_container_tab_group',
			'tab'        => 'general',
			'section'    => 'elearning_blog',
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					// Simple condition
					array(
						'id'       => 'elearning_blog_container_layout',
						'operator' => '===',
						'value'    => 'tg-site-layout--no-sidebar',
					),
					// Nested condition
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'elearning_blog_container_layout',
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
		'elearning_blog_sidebar_layout'          => array(
			'default'    => 'default',
			'type'       => 'customind-radio-image',
			'title'      => esc_html__( 'Sidebar Layout', 'elearning' ),
			'section'    => 'elearning_blog',
			'tab_group'  => 'elearning_blog_container_tab_group',
			'tab'        => 'general',
			'choices'    => $sidebar_layout_choices,
			'columns'    => 2,
			'priority'   => 10,
			'conditions' => array(
				'relation' => 'OR',
				'terms'    => array(
					array(
						'id'       => 'elearning_blog_container_layout',
						'operator' => '===',
						'value'    => 'tg-site-layout--no-sidebar',
					),
					array(
						'relation' => 'AND',
						'terms'    => array(
							array(
								'id'       => 'elearning_blog_container_layout',
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
		'elearning_blog_layout_divider'          => array(
			'type'      => 'customind-divider',
			'variant'   => 'dashed',
			'tab'       => 'general',
			'tab_group' => 'elearning_blog_container_tab_group',
			'section'   => 'elearning_blog',
		),
		'elearning_blog_post_date_heading'       => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Post Date', 'elearning' ),
			'section'   => 'elearning_blog',
			'tab'       => 'general',
			'tab_group' => 'elearning_blog_container_tab_group',
		),
		'elearning_blog_post_date_type'          => array(
			'default'   => 'published-date',
			'type'      => 'customind-select',
			'tab'       => 'general',
			'section'   => 'elearning_blog',
			'tab_group' => 'elearning_blog_container_tab_group',
			'choices'   => apply_filters(
				'elearning_blog_post_date_type_choices',
				array(
					'published-date' => esc_html__( 'Published Date', 'elearning' ),
					'modified-date'  => esc_html__( 'Modified Date', 'elearning' ),
				)
			),
		),
		'elearning_blog_post_elements_heading'   => array(
			'type'        => 'customind-heading',
			'tab_group'   => 'elearning_blog_container_tab_group',
			'title'       => esc_html__( 'Post Elements', 'elearning' ),
			'section'     => 'elearning_blog',
			'description' => esc_html__( 'Manage the post elements such as Post Format, Category, Title, Meta, Content, etc.', 'elearning' ),
			'tab'         => 'general',
		),
		'elearning_archive_blog_post_elements'   => array(
			'type'      => 'customind-sortable',
			'section'   => 'elearning_blog',
			'tab'       => 'general',
			'tab_group' => 'elearning_blog_container_tab_group',
			'choices'   => array(
				'thumbnail' => esc_attr__( 'Featured Image', 'elearning' ),
				'header'    => esc_attr__( 'Title', 'elearning' ),
				'meta'      => esc_attr__( 'Meta', 'elearning' ),
				'content'   => esc_attr__( 'Content', 'elearning' ),
			),
			'default'   => array(
				'thumbnail',
				'header',
				'meta',
				'content',
			),
			'condition' => apply_filters( 'elearning_structure_archive_blog_order', false ),
		),
		'elearning_blog_post_meta_heading'       => array(
			'type'      => 'customind-heading',
			'title'     => esc_html__( 'Post Meta', 'elearning' ),
			'section'   => 'elearning_blog',
			'tab'       => 'general',
			'tab_group' => 'elearning_blog_container_tab_group',
		),
		'elearning_blog_meta'                    => array(
			'type'      => 'customind-sortable',
			'section'   => 'elearning_blog',
			'tab_group' => 'elearning_blog_container_tab_group',
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
			'condition' => apply_filters( 'elearning_structure_archive_blog_order', false ),
		),
		'elearning_typography_blog_post_title'   => array(
			'default'   => array(
				'font-family'    => 'inherit',
				'font-weight'    => '500',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => array(
						'size' => '2.25',
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
			),
			'type'      => 'customind-typography',
			'title'     => esc_html__( 'Post Title', 'elearning' ),
			'transport' => 'postMessage',
			'tab'       => 'style',
			'tab_group' => 'elearning_blog_container_tab_group',
			'section'   => 'elearning_blog',
			'priority'  => 15,
		),
		'elearning_blog_content_heading'         => array(
			'type'      => 'customind-heading',
			'tab_group' => 'elearning_blog_container_tab_group',
			'title'     => esc_html__( 'Excerpt', 'elearning' ),
			'section'   => 'elearning_blog',
			'tab'       => 'general',
		),
		'elearning_archive_blog_content'         => array(
			'default'   => 'excerpt',
			'type'      => 'customind-radio',
			'section'   => 'elearning_blog',
			'tab_group' => 'elearning_blog_container_tab_group',
			'tab'       => 'general',
			'choices'   => array(
				'excerpt' => esc_html__( 'Excerpt', 'elearning' ),
				'content' => esc_html__( 'Full Content', 'elearning' ),
			),
		),
		'elearning_blog_button_heading'          => array(
			'type'      => 'customind-heading',
			'tab_group' => 'elearning_blog_container_tab_group',
			'title'     => esc_html__( 'Button', 'elearning' ),
			'section'   => 'elearning_blog',
			'tab'       => 'general',
		),
		'elearning_archive_blog_read_more'       => array(
			'title'     => esc_html__( 'Enable', 'elearning' ),
			'default'   => true,
			'type'      => 'customind-toggle',
			'section'   => 'elearning_blog',
			'tab_group' => 'elearning_blog_container_tab_group',
			'tab'       => 'general',
			'condition' => array(
				'elearning_archive_blog_content' => 'excerpt',
			),
		),
		'elearning_blog_archive_read_more_style' => array(
			'default'   => 'left',
			'type'      => 'customind-radio-image',
			'title'     => esc_html__( 'Style', 'elearning' ),
			'section'   => 'elearning_blog',
			'tab_group' => 'elearning_blog_container_tab_group',
			'tab'       => 'general',
			'choices'   => apply_filters(
				'elearning_blog_button_alignment',
				array(
					'left'  => array(
						'label' => '',
						'url'   => ELEARNING_PARENT_INC_ICON_URI . '/read-more-left.svg',
					),
					'right' => array(
						'label' => '',
						'url'   => ELEARNING_PARENT_INC_ICON_URI . '/read-more-right.svg',
					),
				)
			),
			'columns'   => 2,
			'priority'  => 31,
			'condition' => apply_filters(
				'elearning_blog_button_alignment_dependency',
				array(
					'elearning_archive_blog_content'   => 'excerpt',
					'elearning_archive_blog_read_more' => true,
				)
			),
		),
		'elearning_site_identity_navigation'     => array(
			'title'    => esc_html__( 'Site Identity', 'elearning' ),
			'type'     => 'customind-navigation',
			'section'  => 'title_tagline',
			'to'       => 'elearning_header_builder_logo',
			'nav_type' => 'section',
			'priority' => 1,
		),
	)
);

elearning_customind()->add_controls( $options );
