<?php

$options = apply_filters(
	'elearning_single_blog_post_options',
	array(
		'elearning_single_post_elements_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Post Elements', 'elearning' ),
			'section'      => 'elearning_single_blog_post',
			'sub_controls' => apply_filters(
				'elearning_single_post_elements_sub_controls',
				array(
					'elearning_single_post_elements' => array(
						'type'        => 'customind-sortable',
						'title'       => esc_html__( 'Post Elements', 'elearning' ),
						'section'     => 'elearning_single_blog_post',
						'description' => esc_html__( 'Drag & Drop items to re-arrange the order', 'elearning' ),
						'choices'     => array(
							'thumbnail' => esc_attr__( 'Featured Image', 'elearning' ),
							'header'    => esc_attr__( 'Title', 'elearning' ),
							'meta'      => esc_attr__( 'Meta Tags', 'elearning' ),
							'content'   => esc_attr__( 'Content', 'elearning' ),
						),
						'default'     => array(
							'thumbnail',
							'header',
							'meta',
							'content',
						),
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_single_post_elements_accordion_collapsible', false ),
		),
		'elearning_single_meta_elements_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Meta Elements', 'elearning' ),
			'section'      => 'elearning_single_blog_post',
			'sub_controls' => apply_filters(
				'elearning_single_meta_elements_sub_controls',
				array(
					'elearning_single_post_meta' => array(
						'type'        => 'customind-sortable',
						'title'       => esc_html__( 'Meta Elements', 'elearning' ),
						'section'     => 'elearning_single_blog_post',
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
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_single_meta_elements_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
