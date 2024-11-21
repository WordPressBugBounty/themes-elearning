<?php

$options = apply_filters(
	'elearning_blog_options',
	array(
		'elearning_blog_post_date_type_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Post Date Type', 'elearning' ),
			'section'      => 'elearning_blog',
			'priority'     => 15,
			'sub_controls' => apply_filters(
				'elearning_blog_post_date_type_sub_controls',
				array(
					'elearning_blog_post_date_type' => array(
						'default' => 'published-date',
						'type'    => 'customind-select',
						'title'   => esc_html__( 'Post Date Type', 'elearning' ),
						'section' => 'elearning_blog',
						'choices' => apply_filters(
							'elearning_blog_post_date_type_choices',
							array(
								'published-date' => esc_html__( 'Published Date', 'elearning' ),
								'modified-date'  => esc_html__( 'Modified Date', 'elearning' ),
							)
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_blog_post_date_type_accordion_collapsible', false ),
		),
		'elearning_blog_post_elements_heading'  => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Elements', 'elearning' ),
			'section'      => 'elearning_blog',
			'priority'     => 15,
			'sub_controls' => apply_filters(
				'elearning_blog_post_elements_sub_controls',
				array(
					'elearning_archive_blog_post_elements' => array(
						'type'        => 'customind-sortable',
						'title'       => esc_html__( 'Post Elements', 'elearning' ),
						'section'     => 'elearning_blog',
						'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'elearning' ),
						'choices'     => array(
							'thumbnail' => esc_attr__( 'Featured Image', 'elearning' ),
							'header'    => esc_attr__( 'Title', 'elearning' ),
							'meta'      => esc_attr__( 'Meta', 'elearning' ),
							'content'   => esc_attr__( 'Content', 'elearning' ),
						),
						'default'     => array(
							'thumbnail',
							'header',
							'meta',
							'content',
						),
						'condition'   => apply_filters( 'elearning_structure_archive_blog_order', false ),
					),
					'elearning_blog_meta'                  => array(
						'type'        => 'customind-sortable',
						'title'       => esc_html__( 'Meta Elements', 'elearning' ),
						'section'     => 'elearning_blog',
						'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'elearning' ),
						'choices'     => array(
							'comments' => esc_attr__( 'Comments', 'elearning' ),
							'category' => esc_attr__( 'Categories', 'elearning' ),
							'author'   => esc_attr__( 'Author', 'elearning' ),
							'date'     => esc_attr__( 'Date', 'elearning' ),
							'tags'     => esc_attr__( 'Tags', 'elearning' ),
						),
						'default'     => array(
							'author',
							'date',
							'category',
							'tags',
							'comments',
						),
						'condition'   => apply_filters( 'elearning_structure_archive_blog_order', false ),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_blog_post_elements_accordion_collapsible', false ),
		),
		'elearning_blog_post_title_heading'     => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Post title', 'elearning' ),
			'section'      => 'elearning_blog',
			'priority'     => 25,
			'sub_controls' => apply_filters(
				'elearning_blog_post_title_sub_controls',
				array(
					'elearning_typography_blog_post_title' => array(
						'default'   => array(
							'font-family'    => 'Default',
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
						'title'     => esc_html__( 'Typography', 'elearning' ),
						'transport' => 'postMessage',
						'section'   => 'elearning_blog',
						'priority'  => 15,
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_blog_post_title_accordion_collapsible', false ),
		),
		'elearning_blog_excerpt_heading'        => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Excerpt', 'elearning' ),
			'section'      => 'elearning_blog',
			'priority'     => 35,
			'sub_controls' => apply_filters(
				'elearning_blog_excerpt_sub_controls',
				array(
					'elearning_archive_blog_content' => array(
						'default' => 'excerpt',
						'type'    => 'customind-radio',
						'title'   => esc_html__( 'Type', 'elearning' ),
						'section' => 'elearning_blog',
						'choices' => array(
							'excerpt' => esc_html__( 'Excerpt', 'elearning' ),
							'content' => esc_html__( 'Full Content', 'elearning' ),
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_blog_excerpt_accordion_collapsible', false ),
		),
		'elearning_blog_button_heading'         => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Button', 'elearning' ),
			'section'      => 'elearning_blog',
			'priority'     => 40,
			'sub_controls' => apply_filters(
				'elearning_blog_button_sub_controls',
				array(
					'elearning_archive_blog_read_more' => array(
						'title'     => esc_html__( 'Enable', 'elearning' ),
						'default'   => true,
						'type'      => 'customind-toggle',
						'section'   => 'elearning_blog',
						'condition' => array(
							'elearning_archive_blog_content' => 'excerpt',
						),
					),
					'elearning_blog_archive_read_more_style' => array(
						'default'   => 'left',
						'type'      => 'customind-radio-image',
						'title'     => esc_html__( 'Style', 'elearning' ),
						'section'   => 'elearning_blog',
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
								'elearning_archive_blog_content'  => 'excerpt',
								'elearning_archive_blog_read_more' => true,
							)
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_blog_button_accordion_collapsible', false ),
			'condition'    => array(
				'elearning_archive_blog_content' => 'excerpt',
			),
		),
	)
);

elearning_customind()->add_controls( $options );
