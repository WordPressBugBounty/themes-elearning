<?php

$options = apply_filters(
	'elearning_post_meta_options',
	array(
		'elearning_post_meta_heading' => array(
			'type'         => 'customind-accordion',
			'title'        => esc_html__( 'Meta', 'elearning' ),
			'section'      => 'elearning_meta',
			'sub_controls' => apply_filters(
				'elearning_post_meta_sub_controls',
				array(
					'elearning_meta_style' => array(
						'default' => 'tg-meta-style-one',
						'type'    => 'customind-radio-image',
						'title'   => esc_html__( 'Meta Style', 'elearning' ),
						'section' => 'elearning_meta',
						'choices' => array(
							'tg-meta-style-one' => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/meta-style-one.svg',
							),
							'tg-meta-style-two' => array(
								'label' => '',
								'url'   => ELEARNING_PARENT_INC_ICON_URI . '/meta-style-two.svg',
							),
						),
						'columns' => 2,
					),
				)
			),
			'collapsible'  => apply_filters( 'elearning_post_meta_accordion_collapsible', false ),
		),
	)
);

elearning_customind()->add_controls( $options );
