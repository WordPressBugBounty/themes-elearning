<?php
/**
 * Page header options
 *
* @package eLearning
 */

defined( 'ABSPATH' ) || exit;

/*== CONTENT > PAGE HEADER ==*/
if ( ! class_exists( 'eLearning_Customize_Blog_General_Option' ) ) :

	/**
	 * Archive/Blog option.
	 */
	class eLearning_Customize_Blog_General_Option extends eLearning_Customize_Base_Option {

		/**
		 * Include customize options.
		 *
		 * @param array                 $options      Customize options provided via the theme.
		 * @param \WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return mixed|void Customizer options for registering panels, sections as well as controls.
		 */
		public function register_options( $options, $wp_customize ) {

			$configs = array(

				array(
					'name'     => 'elearning_page_title_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Page Title', 'elearning' ),
					'section'  => 'elearning_page_header',
					'priority' => 5,
				),

				array(
					'name'     => 'elearning_enable_page_title',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Enable', 'elearning' ),
					'section'  => 'elearning_page_header',
					'priority' => 5,
				),

				array(
					'name'     => 'elearning_page_title',
					'default'  => 'page-header',
					'type'     => 'control',
					'control'  => 'radio',
					'label'    => esc_html__( 'Position', 'elearning' ),
					'section'  => 'elearning_page_header',
					'choices'  => array(
						'page-header'  => esc_html__( 'Page Header', 'elearning' ),
						'content-area' => esc_html__( 'Content Area', 'elearning' ),
					),
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 10,
				),

				array(
					'name'       => 'elearning_page_title_markup',
					'default'    => 'h1',
					'type'       => 'control',
					'control'    => 'select',
					'label'      => esc_html__( 'Markup', 'elearning' ),
					'section'    => 'elearning_page_header',
					'choices'    => array(
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
					'priority'   => 15,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
							array(
								'elearning_page_title',
								'==',
								'page-header',
							),
						),
					),
				),

				array(
					'name'      => 'elearning_page_title_alignment',
					'default'   => 'tg-page-header--left-right',
					'type'      => 'control',
					'control'   => 'elearning-radio-image',
					'label'     => esc_html__( 'Alignment', 'elearning' ),
					'section'   => 'elearning_page_header',
					'transport' => 'postMessage',
					'image_col' => 2,
					'choices'   => array(
						'tg-page-header--left-right'  => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-right.png',
						),
						'tg-page-header--right-left'  => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-left.png',
						),
						'tg-page-header--both-center' => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/breadcrumb-center.png',
						),
						'tg-page-header--both-left'   => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/both-on-left.png',
						),
						'tg-page-header--both-right'  => array(
							'label' => '',
							'url'   => ELEARNING_PARENT_INC_ICON_URI . '/both-on-right.png',
						),
					),
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority'  => 20,
				),

				array(
					'name'     => 'elearning_breadcrumbs_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Breadcrumbs', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 30,
				),

				array(
					'name'     => 'elearning_breadcrumbs',
					'default'  => true,
					'type'     => 'control',
					'control'  => 'elearning-toggle',
					'label'    => esc_html__( 'Enable Breadcrumbs', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 30,
				),

				array(
					'name'        => 'elearning_breadcrumbs_font_size',
					'default'     => 16,
					'suffix'      => 'px',
					'type'        => 'control',
					'control'     => 'elearning-slider',
					'label'       => esc_html__( 'Font Size', 'elearning' ),
					'section'     => 'elearning_page_header',
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min'  => 8,
						'max'  => 26,
						'step' => 1,
					),
					'priority'    => 55,
					'dependency'  => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
					),
				),

				array(
					'name'     => 'elearning_page_title_dimensions_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Dimensions', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 65,
				),

				array(
					'name'      => 'elearning_page_title_padding',
					'default'   => array(
						'top'    => '20px',
						'right'  => '0px',
						'bottom' => '20px',
						'left'   => '0px',
					),
					'type'      => 'control',
					'control'   => 'elearning-dimensions',
					'label'     => esc_html__( 'Padding', 'elearning' ),
					'section'   => 'elearning_page_header',
					'transport' => 'postMessage',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority'  => 70,
				),

				array(
					'name'     => 'elearning_page_header_colors_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Colors', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 75,
				),

				array(
					'name'     => 'elearning_page_title_bg_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Background', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 80,
				),

				array(
					'name'      => 'elearning_page_title_bg',
					'default'   => array(
						'background-color'      => '#ffffff',
						'background-image'      => '',
						'background-repeat'     => 'repeat',
						'background-position'   => 'top left',
						'background-size'       => 'contain',
						'background-attachment' => 'scroll',
					),
					'type'      => 'sub-control',
					'control'   => 'elearning-background',
					'parent'    => 'elearning_page_title_bg_group',
					'section'   => 'elearning_page_header',
					'transport' => 'postMessage',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority'  => 80,
				),

				array(
					'name'     => 'elearning_post_page_title_color_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Post/Page Title', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 85,
				),

				array(
					'name'      => 'elearning_post_page_title_color',
					'default'   => '#16181a',
					'type'      => 'sub-control',
					'control'   => 'elearning-color',
					'parent'    => 'elearning_post_page_title_color_group',
					'section'   => 'elearning_page_header',
					'transport' => 'postMessage',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority'  => 85,
				),

				array(
					'name'       => 'elearning_breadcrumbs_text_color_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Text', 'elearning' ),
					'section'    => 'elearning_page_header',
					'priority'   => 90,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
					),
				),

				array(
					'name'       => 'elearning_breadcrumbs_text_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'section'    => 'elearning_page_header',
					'parent'     => 'elearning_breadcrumbs_text_color_group',
					'transport'  => 'postMessage',
					'priority'   => 90,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
					),
				),

				array(
					'name'       => 'elearning_breadcrumbs_seperator_color_group',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Separator', 'elearning' ),
					'section'    => 'elearning_page_header',
					'priority'   => 95,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
					),
				),

				array(
					'name'       => 'elearning_breadcrumbs_seperator_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'section'    => 'elearning_page_header',
					'parent'     => 'elearning_breadcrumbs_seperator_color_group',
					'transport'  => 'postMessage',
					'priority'   => 95,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
					),
				),

				array(
					'name'       => 'elearning_breadcrumbs_link_color_group',
					'default'    => '',
					'type'       => 'control',
					'control'    => 'elearning-group',
					'label'      => esc_html__( 'Link', 'elearning' ),
					'section'    => 'elearning_page_header',
					'priority'   => 100,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_breadcrumbs_link_color',
					'default'    => '#16181a',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_breadcrumbs_link_color_group',
					'tab'        => esc_html__( 'Normal', 'elearning' ),
					'section'    => 'elearning_page_header',
					'transport'  => 'postMessage',
					'priority'   => 100,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'       => 'elearning_breadcrumbs_link_hover_color',
					'default'    => '#269bd1',
					'type'       => 'sub-control',
					'control'    => 'elearning-color',
					'parent'     => 'elearning_breadcrumbs_link_color_group',
					'tab'        => esc_html__( 'Hover', 'elearning' ),
					'section'    => 'elearning_page_header',
					'transport'  => 'postMessage',
					'priority'   => 100,
					'dependency' => array(
						'conditions' => array(
							array(
								'elearning_breadcrumbs',
								'==',
								true,
							),
							array(
								'elearning_enable_page_title',
								'==',
								true,
							),
						),
						'operator'   => 'AND',
					),
				),

				array(
					'name'     => 'elearning_typography_page_header_heading',
					'type'     => 'control',
					'control'  => 'elearning-title',
					'label'    => esc_html__( 'Typography', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 101,
				),

				array(
					'name'     => 'elearning_typography_post_page_title_group',
					'type'     => 'control',
					'control'  => 'elearning-group',
					'label'    => esc_html__( 'Post/Page Title', 'elearning' ),
					'section'  => 'elearning_page_header',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority' => 105,
				),

				array(
					'name'        => 'elearning_typography_post_page_title',
					'default'     => apply_filters(
						'elearning_typography_post_page_title_filter',
						array(
							'font-family'    => 'default',
							'font-weight'    => '500',
							'subsets'        => array( 'latin' ),
							'font-size'      => array(
								'desktop' => '2.5rem',
								'tablet'  => '',
								'mobile'  => '',
							),
							'line-height'    => array(
								'desktop' => '1.3',
								'tablet'  => '',
								'mobile'  => '',
							),
							'font-style'     => 'normal',
							'text-transform' => 'none',
						)
					),
					'input_attrs' => array(
						'desktop' => array(
							'font-size'   => array(
								'step' => 1,
								'min'  => 14,
								'max'  => 40,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'tablet'  => array(
							'font-size'   => array(
								'step' => 1,
								'min'  => 14,
								'max'  => 40,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
						'mobile'  => array(
							'font-size'   => array(
								'step' => 1,
								'min'  => 14,
								'max'  => 40,
							),
							'line-height' => array(
								'step' => 0.1,
								'min'  => 0,
								'max'  => 3,
							),
						),
					),
					'type'        => 'sub-control',
					'control'     => 'elearning-typography',
					'parent'      => 'elearning_typography_post_page_title_group',
					'section'     => 'elearning_page_header',
					'transport'   => 'postMessage',
					'dependency' => array(
						'elearning_enable_page_title',
						'==',
						true,
					),
					'priority'    => 105,
				),
			);

			return array_merge( $options, $configs );
		}
	}
	new eLearning_Customize_Blog_General_Option();
endif;
