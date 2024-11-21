<?php

$panel_options_id = array(
	'elearning_global'         => array(
		'title'    => esc_html__( 'Global', 'elearning' ),
		'priority' => 10,
	),
	'elearning_header_builder' => array(
		'title'    => esc_html__( 'Header Builder', 'elearning' ),
		'priority' => 10,
	),
	'elearning_header'         => array(
		'title'    => esc_html__( 'Page Element', 'elearning' ),
		'priority' => 10,
	),
	'elearning_content'        => array(
		'title'    => esc_html__( 'Content', 'elearning' ),
		'priority' => 10,
	),
	'elearning_footer'         => array(
		'title'    => esc_html__( 'Footer', 'elearning' ),
		'priority' => 10,
	),
	'elearning_footer_builder' => array(
		'title'    => esc_html__( 'Footer Builder', 'elearning' ),
		'priority' => 10,
	),
	'elearning_additional'     => array(
		'title'    => esc_html__( 'Additional', 'elearning' ),
		'priority' => 10,
	),
);

$section_option_id = array(
	'elearning_builder'                        => array(
		'title'    => esc_html__( 'Builder', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 1,
	),
	'elearning_colors'                         => array(
		'title'    => esc_html__( 'Colors', 'elearning' ),
		'panel'    => 'elearning_global',
		'priority' => 5,
	),
	'elearning_container'                      => array(
		'title'    => esc_html__( 'Container', 'elearning' ),
		'panel'    => 'elearning_global',
		'priority' => 10,
	),
	'elearning_content_area'                   => array(
		'title'    => esc_html__( 'Content Area', 'elearning' ),
		'panel'    => 'elearning_global',
		'priority' => 15,
	),
	'elearning_sidebar_layout'                 => array(
		'title'    => esc_html__( 'Sidebar', 'elearning' ),
		'panel'    => 'elearning_global',
		'priority' => 20,
	),
	'elearning_typography'                     => array(
		'title'    => esc_html__( 'Typography', 'elearning' ),
		'panel'    => 'elearning_global',
		'priority' => 25,
	),
	'elearning_button'                         => array(
		'title'    => esc_html__( 'Button', 'elearning' ),
		'panel'    => 'elearning_global',
		'priority' => 30,
	),
	'elearning_header_top'                     => array(
		'title'    => esc_html__( 'Top Bar', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 5,
	),
	'elearning_header_builder_section'         => array(
		'title'    => esc_html__( 'Header Builder', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 15,
	),
	'elearning_footer_builder_section'         => array(
		'title'    => esc_html__( 'Footer Builder', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 15,
	),
	'elearning_main_header'                    => array(
		'title'    => esc_html__( 'Main Header', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 15,
	),
	'elearning_menu'                           => array(
		'title'    => esc_html__( 'Primary Menu', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 20,
	),
	'elearning_header_search'                  => array(
		'title'    => esc_html__( 'Header Search', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 25,
	),
	'elearning_header_button'                  => array(
		'title'    => esc_html__( 'Header Button', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 30,
	),
	'header_image'                             => array(
		'title'    => esc_html__( 'Header Media', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 35,
	),
	'elearning_page_header'                    => array(
		'title'    => esc_html__( 'Page Header', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 40,
	),
	'elearning_breadcrumb'                     => array(
		'title'    => esc_html__( 'Breadcrumb', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 45,
	),
	'elearning_transparent_header'             => array(
		'title'    => esc_html__( 'Transparent Header', 'elearning' ),
		'panel'    => 'elearning_header',
		'priority' => 45,
	),
	'elearning_header_builder_socials'         => array(
		'title'    => esc_html__( 'Socials', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 45,
	),
	'elearning_footer_builder_socials'         => array(
		'title'    => esc_html__( 'Socials', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 45,
	),
	'elearning_footer_builder_copyright'       => array(
		'title'    => esc_html__( 'Copyright', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 45,
	),
	'elearning_blog'                           => array(
		'title'    => esc_html__( 'Blog', 'elearning' ),
		'panel'    => 'elearning_content',
		'priority' => 5,
	),
	'elearning_single_blog_post'               => array(
		'title'    => esc_html__( 'Single Post', 'elearning' ),
		'panel'    => 'elearning_content',
		'priority' => 10,
	),
	'elearning_meta'                           => array(
		'title'    => esc_html__( 'Meta', 'elearning' ),
		'panel'    => 'elearning_content',
		'priority' => 15,
	),
	'elearning_sidebar'                        => array(
		'title'    => esc_html__( 'Sidebar', 'elearning' ),
		'panel'    => 'elearning_content',
		'priority' => 20,
	),
	'elearning_footer_widgets'                 => array(
		'title'    => esc_html__( 'Footer Column', 'elearning' ),
		'panel'    => 'elearning_footer',
		'priority' => 5,
	),
	'elearning_footer_bar'                     => array(
		'title'    => esc_html__( 'Footer Bar', 'elearning' ),
		'panel'    => 'elearning_footer',
		'priority' => 10,
	),
	'elearning_footer_scroll_to_top'           => array(
		'title'    => esc_html__( 'Scroll to Top', 'elearning' ),
		'panel'    => 'elearning_additional',
		'priority' => 15,
	),
	'elearning_optimization'                   => array(
		'title'    => esc_html__( 'Optimization', 'elearning' ),
		'panel'    => 'elearning_additional',
		'priority' => 5,
	),
	'elearning_woocommerce_sidebar_layout'     => array(
		'title'    => esc_html__( 'Sidebar Layout', 'elearning' ),
		'panel'    => 'woocommerce',
		'priority' => 10,
	),
	'elearning_header_builder_logo'            => array(
		'title'    => esc_html__( 'Logo', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_primary_menu'    => array(
		'title'    => esc_html__( 'Primary Menu', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_secondary_menu'  => array(
		'title'    => esc_html__( 'Secondary Menu', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_tertiary_menu'   => array(
		'title'    => esc_html__( 'Tertiary Menu', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_quaternary_menu' => array(
		'title'    => esc_html__( 'Quaternary Menu', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_mobile_menu'     => array(
		'title'    => esc_html__( 'Mobile Menu', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_footer_menu'     => array(
		'title'    => esc_html__( 'Menu 1', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_footer_menu_2'   => array(
		'title'    => esc_html__( 'Menu 2', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_header_builder_offset_area'     => array(
		'title'    => esc_html__( 'Offset Area', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_button_1'        => array(
		'title'    => esc_html__( 'Header Button', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_search'          => array(
		'title'    => esc_html__( 'Search', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_html_1'          => array(
		'title'    => esc_html__( 'HTML 1', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_html_2'          => array(
		'title'    => esc_html__( 'HTML 2', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_widget_1'        => array(
		'title'    => esc_html__( 'Widget 1', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_widget_2'        => array(
		'title'    => esc_html__( 'Widget 2', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_widget_1'        => array(
		'title'    => esc_html__( 'Widget 1', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_widget_2'        => array(
		'title'    => esc_html__( 'Widget 2', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_widget_3'        => array(
		'title'    => esc_html__( 'Widget 3', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_widget_4'        => array(
		'title'    => esc_html__( 'Widget 4', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_widget_5'        => array(
		'title'    => esc_html__( 'Widget 5', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_widget_6'        => array(
		'title'    => esc_html__( 'Widget 6', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_header_builder_cart'            => array(
		'title'    => esc_html__( 'Cart', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_toggle_button'   => array(
		'title'    => esc_html__( 'Toggle Button', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_top_area'        => array(
		'title'    => esc_html__( 'Top Area', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_main_area'       => array(
		'title'    => esc_html__( 'Main Area', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_header_builder_bottom_area'     => array(
		'title'    => esc_html__( 'Bottom Area', 'elearning' ),
		'panel'    => 'elearning_header_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_top_area'        => array(
		'title'    => esc_html__( 'Top Area', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_main_area'       => array(
		'title'    => esc_html__( 'Main Area', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_bottom_area'     => array(
		'title'    => esc_html__( 'Bottom Area', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_html_1'          => array(
		'title'    => esc_html__( 'HTML 1', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_footer_builder_html_2'          => array(
		'title'    => esc_html__( 'HTML 2', 'elearning' ),
		'panel'    => 'elearning_footer_builder',
		'priority' => 10,
	),
	'elearning_customize_review_link_section'  => array(
		'type'             => 'upsell-section',
		'title'            => esc_html__( 'Leave a Review on .org', 'elearning' ),
		'url'              => 'https://wordpress.org/support/theme/elearning/reviews/?filter=5/#new-post',
		'section_callback' => \Customind\Core\Types\UpsellSection::class,
		'priority'         => 200,
	),

);


elearning_customind()->add_panels( $panel_options_id );
elearning_customind()->add_sections( $section_option_id );
