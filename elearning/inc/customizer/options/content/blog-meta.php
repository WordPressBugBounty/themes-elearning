<?php

$options = apply_filters(
	'elearning_post_meta_options',
	array(
		'elearning_post_meta_heading' => array(
			'type'    => 'customind-heading',
			'title'   => esc_html__( 'Post Meta', 'elearning' ),
			'section' => 'elearning_meta',
		),
		'elearning_meta_style'        => array(
			'default' => 'tg-meta-style-one',
			'type'    => 'customind-radio-image',
			'title'   => esc_html__( 'Style', 'elearning' ),
			'section' => 'elearning_meta',
			'choices' => array(
				'tg-meta-style-one' => array(
					'label' => 'Style 1',
					'url'   => ELEARNING_PARENT_INC_ICON_URI . '/meta-style-one.svg',
				),
				'tg-meta-style-two' => array(
					'label' => 'Style 2',
					'url'   => ELEARNING_PARENT_INC_ICON_URI . '/meta-style-two.svg',
				),
			),
			'columns' => 2,
		),
	)
);

elearning_customind()->add_controls( $options );
