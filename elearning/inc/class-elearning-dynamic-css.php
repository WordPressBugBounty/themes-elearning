<?php
/**
 * eLearning dynamic CSS generation file for theme options.
 *
 * class eLearning_Dynamic_CSS
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Dynamic_CSS' ) ) {

	/**
	 * elearning dynamic CSS generation file for theme options.
	 *
	 * class eLearning_Dynamic_CSS
	 */
	class eLearning_Dynamic_CSS {

		/**
		 * Return dynamic CSS output.
		 *
		 * @param string $dynamic_css          Dynamic CSS.
		 * @param string $dynamic_css_filtered Dynamic CSS Filters.
		 *
		 * @return string Generated CSS.
		 */
		public static function render_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			// Generate dynamic CSS.
			$parse_css = '';

			// Generate CSS variables for elearning color palette.
			$parse_css .= self::generate_color_palette_css_variables();

			// Container width.
			$container_width_default = array(
				'size' => 1160,
				'unit' => 'px',
			);

			$container_width = get_theme_mod( 'elearning_general_container_width', $container_width_default );
			$parse_css      .= elearning_parse_slider_css(
				$container_width_default,
				$container_width,
				'.tg-container',
				'max-width'
			);

			// Footer widget 1.
			$footer_widget_header_1_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widget_1_header          = get_theme_mod( 'elearning_footer_widget_1_heading_border', $footer_widget_header_1_default );
			$footer_widget_1_header_negative = array(
				'size' => - (float) $footer_widget_1_header['size'],
				'unit' => 'px',
			);

			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_1_default,
				$footer_widget_1_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-1 .widget-title,.tg-footer-builder .widget.widget-footer-sidebar-1 .wp-block-heading',
				'border-bottom-width'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_1_default,
				$footer_widget_1_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-1 .widget-title:before, .tg-footer-builder .widget.widget-footer-sidebar-1 .wp-block-heading:before',
				'height'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_1_default,
				$footer_widget_1_header_negative,
				'.tg-footer-builder .widget.widget-footer-sidebar-1 .widget-title:before, .tg-footer-builder .widget.widget-footer-sidebar-1 .wp-block-heading:before',
				'bottom'
			);

			$footer_widget_1_border_color     = get_theme_mod( 'elearning_footer_widget_1_heading_border_color', '' );
			$footer_widget_1_border_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-1 .widget-title, .tg-footer-builder .widget.widget-footer-sidebar-1 .wp-block-heading' => array(
					'border-color' => esc_html( $footer_widget_1_border_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_1_border_color, $footer_widget_1_border_color_css );

			$footer_widget_1_accent_color     = get_theme_mod( 'elearning_footer_widget_1_heading_border_accent_color', '' );
			$footer_widget_1_accent_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-1 .widget-title:before, .tg-footer-builder .widget.widget-footer-sidebar-1 .wp-block-heading:before' => array(
					'background-color' => esc_html( $footer_widget_1_accent_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_1_accent_color, $footer_widget_1_accent_color_css );

			// 2
			$footer_widget_header_2_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widget_2_header          = get_theme_mod( 'elearning_footer_widget_2_heading_border', $footer_widget_header_2_default );
			$footer_widget_2_header_negative = array(
				'size' => - (float) $footer_widget_2_header['size'],
				'unit' => 'px',
			);

			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_2_default,
				$footer_widget_2_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-2 .widget-title, .tg-footer-builder .widget.widget-footer-sidebar-2 .wp-block-heading',
				'border-bottom-width'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_2_default,
				$footer_widget_2_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-2 .widget-title:before, .tg-footer-builder .widget.widget-footer-sidebar-2 .wp-block-heading:before',
				'height'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_2_default,
				$footer_widget_2_header_negative,
				'.tg-footer-builder .widget.widget-footer-sidebar-2 .widget-title:before, .tg-footer-builder .widget.widget-footer-sidebar-2 .wp-block-heading:before',
				'bottom'
			);

			$footer_widget_2_border_color     = get_theme_mod( 'elearning_footer_widget_2_heading_border_color', '' );
			$footer_widget_2_border_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-2 .widget-title, .tg-footer-builder .widget.widget-footer-sidebar-2 .wp-block-heading' => array(
					'border-color' => esc_html( $footer_widget_2_border_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_2_border_color, $footer_widget_2_border_color_css );

			$footer_widget_2_accent_color     = get_theme_mod( 'elearning_footer_widget_2_heading_border_accent_color', '' );
			$footer_widget_2_accent_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-2 .widget-title:before,.tg-footer-builder .widget.widget-footer-sidebar-2 .wp-block-heading:before' => array(
					'background-color' => esc_html( $footer_widget_2_accent_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_2_accent_color, $footer_widget_2_accent_color_css );

			// 3
			$footer_widget_header_3_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widget_3_header          = get_theme_mod( 'elearning_footer_widget_3_heading_border', $footer_widget_header_3_default );
			$footer_widget_3_header_negative = array(
				'size' => - (float) $footer_widget_3_header['size'],
				'unit' => 'px',
			);

			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_3_default,
				$footer_widget_3_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-3 .widget-title, .tg-footer-builder .widget.widget-footer-sidebar-3 .wp-block-heading',
				'border-bottom-width'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_3_default,
				$footer_widget_3_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-3 .widget-title:before, .tg-footer-builder .widget.widget-footer-sidebar-3 .wp-block-heading:before',
				'height'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_3_default,
				$footer_widget_3_header_negative,
				'.tg-footer-builder .widget.widget-footer-sidebar-3 .widget-title:before,.tg-footer-builder .widget.widget-footer-sidebar-3 .wp-block-heading:before',
				'bottom'
			);

			$footer_widget_3_border_color     = get_theme_mod( 'elearning_footer_widget_3_heading_border_color', '' );
			$footer_widget_3_border_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-3 .widget-title, .tg-footer-builder .widget.widget-footer-sidebar-3 .wp-block-heading' => array(
					'border-color' => esc_html( $footer_widget_3_border_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_3_border_color, $footer_widget_3_border_color_css );

			$footer_widget_3_accent_color     = get_theme_mod( 'elearning_footer_widget_3_heading_border_accent_color', '' );
			$footer_widget_3_accent_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-3 .widget-title:before,.tg-footer-builder .widget.widget-footer-sidebar-3 .wp-block-heading:before' => array(
					'background-color' => esc_html( $footer_widget_3_accent_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_3_accent_color, $footer_widget_3_accent_color_css );

			//4
			$footer_widget_header_4_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widget_4_header          = get_theme_mod( 'elearning_footer_widget_4_heading_border', $footer_widget_header_4_default );
			$footer_widget_4_header_negative = array(
				'size' => - (float) $footer_widget_4_header['size'],
				'unit' => 'px',
			);

			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_4_default,
				$footer_widget_4_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-4 .widget-title, .tg-footer-builder .widget.widget-footer-sidebar-4 .wp-block-heading',
				'border-bottom-width'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_4_default,
				$footer_widget_4_header,
				'.tg-footer-builder .widget.widget-footer-sidebar-4 .widget-title:before, .tg-footer-builder .widget.widget-footer-sidebar-4 .wp-block-heading:before',
				'height'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_4_default,
				$footer_widget_4_header_negative,
				'.tg-footer-builder .widget.widget-footer-sidebar-4 .widget-title:before,.tg-footer-builder .widget.widget-footer-sidebar-4 .wp-block-heading:before',
				'bottom'
			);

			$footer_widget_4_border_color     = get_theme_mod( 'elearning_footer_widget_4_heading_border_color', '' );
			$footer_widget_4_border_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-4 .widget-title, .tg-footer-builder .widget.widget-footer-sidebar-4 .wp-block-heading' => array(
					'border-color' => esc_html( $footer_widget_4_border_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_4_border_color, $footer_widget_4_border_color_css );

			$footer_widget_4_accent_color     = get_theme_mod( 'elearning_footer_widget_4_heading_border_accent_color', '' );
			$footer_widget_4_accent_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-4 .widget-title:before,.tg-footer-builder .widget.widget-footer-sidebar-4 .wp-block-heading:before' => array(
					'background-color' => esc_html( $footer_widget_4_accent_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_4_accent_color, $footer_widget_4_accent_color_css );

			//5
			$footer_widget_header_5_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widget_5_header          = get_theme_mod( 'elearning_footer_widget_5_heading_border', $footer_widget_header_5_default );
			$footer_widget_5_header_negative = array(
				'size' => - (float) $footer_widget_5_header['size'],
				'unit' => 'px',
			);

			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_5_default,
				$footer_widget_5_header,
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar .widget-title, .tg-footer-builder .widget.widget-footer-bar-left-sidebar .wp-block-heading',
				'border-bottom-width'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_5_default,
				$footer_widget_5_header,
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar .widget-title:before, .tg-footer-builder .widget.widget-footer-bar-left-sidebar .wp-block-heading:before',
				'height'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_5_default,
				$footer_widget_5_header_negative,
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar .widget-title:before, .tg-footer-builder .widget.widget-footer-bar-left-sidebar .wp-block-heading:before',
				'bottom'
			);

			$footer_widget_5_border_color     = get_theme_mod( 'elearning_footer_widget_5_heading_border_color', '' );
			$footer_widget_5_border_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar .widget-title, .tg-footer-builder .widget.widget-footer-bar-left-sidebar .wp-block-heading' => array(
					'border-color' => esc_html( $footer_widget_5_border_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_5_border_color, $footer_widget_5_border_color_css );

			$footer_widget_5_accent_color     = get_theme_mod( 'elearning_footer_widget_5_heading_border_accent_color', '' );
			$footer_widget_5_accent_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar .widget-title:before, .tg-footer-builder .widget.widget-footer-bar-left-sidebar .wp-block-heading:before' => array(
					'background-color' => esc_html( $footer_widget_5_accent_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_5_accent_color, $footer_widget_5_accent_color_css );

			//6
			$footer_widget_header_6_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widget_6_header          = get_theme_mod( 'elearning_footer_widget_6_heading_border', $footer_widget_header_6_default );
			$footer_widget_6_header_negative = array(
				'size' => - (float) $footer_widget_6_header['size'],
				'unit' => 'px',
			);

			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_6_default,
				$footer_widget_6_header,
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar .widget-title, .tg-footer-builder .widget.widget-footer-bar-right-sidebar .wp-block-heading',
				'border-bottom-width'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_6_default,
				$footer_widget_6_header,
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar .widget-title:before, .tg-footer-builder .widget.widget-footer-bar-right-sidebar .wp-block-heading:before',
				'height'
			);
			$parse_css .= elearning_parse_slider_css(
				$footer_widget_header_6_default,
				$footer_widget_6_header_negative,
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar .widget-title:before, .tg-footer-builder .widget.widget-footer-bar-right-sidebar .wp-block-heading:before',
				'bottom'
			);

			$footer_widget_6_border_color     = get_theme_mod( 'elearning_footer_widget_6_heading_border_color', '' );
			$footer_widget_6_border_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar .widget-title, .tg-footer-builder .widget.widget-footer-bar-right-sidebar .wp-block-heading' => array(
					'border-color' => esc_html( $footer_widget_6_border_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_6_border_color, $footer_widget_6_border_color_css );

			$footer_widget_6_accent_color     = get_theme_mod( 'elearning_footer_widget_6_heading_border_accent_color', '' );
			$footer_widget_6_accent_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar .widget-title:before, .tg-footer-builder .widget.widget-footer-bar-right-sidebar .wp-block-heading:before' => array(
					'background-color' => esc_html( $footer_widget_6_accent_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '', $footer_widget_6_accent_color, $footer_widget_6_accent_color_css );

			// Content width.
			//          $content_width_default = array(
			//              'size' => 70,
			//              'unit' => '%',
			//          );
			//          $content_width         = get_theme_mod( 'elearning_general_content_width', $content_width_default );
			//          $parse_css            .= elearning_parse_slider_css(
			//              $content_width_default,
			//              $content_width,
			//              '#primary',
			//              'width'
			//          );

			// Sidebar Width
			$sidebar_width_default = array(
				'size' => 30,
				'unit' => '%',
			);

			$sidebar_width = get_theme_mod( 'elearning_general_sidebar_width', $sidebar_width_default );

			$content_width_css = array(
				'#primary' => array(
					'width' => ( 100 - (float) $sidebar_width['size'] ) . '%',
				),
			);

			$parse_css .= '@media screen and (min-width: ' . 768 . 'px) {';
			$parse_css .= elearning_parse_css( 70, ( 100 - (float) $sidebar_width['size'] ), $content_width_css );
			$parse_css .= elearning_parse_slider_css(
				$sidebar_width_default,
				$sidebar_width,
				'#secondary',
				'width'
			);
			$parse_css .= '}';

			// Content margin.
			$content_padding_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$content_padding = get_theme_mod( 'elearning_content_area_padding', $content_padding_default );

			$parse_css .= elearning_parse_dimension_css(
				$content_padding_default,
				$content_padding,
				'.site-content',
				'padding'
			);

			// Base primary color.
			$base_primary_color     = get_theme_mod( 'elearning_base_color_primary', 'var(--elearning-color-1, #269bd1)' );
			$base_primary_color_css = array(
				'a:hover, a:focus, .tg-primary-menu > div ul li:hover > a,  .tg-primary-menu > div ul li.current_page_item > a, .tg-primary-menu > div ul li.current-menu-item > a,  .tg-mobile-navigation > div ul li.current_page_item > a, .tg-mobile-navigation > div ul li.current-menu-item > a,  .entry-content a,  .tg-meta-style-two .entry-meta span, .tg-meta-style-two .entry-meta a, .entry-title a:hover, .entry-title a:focus' => array(
					'color' => esc_html( $base_primary_color ),
				),
				'.tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-left-border > div > ul > li.current-menu-item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div > ul > li.current_page_item > a::before, .tg-primary-menu.tg-primary-menu--style-right-border > div > ul > li.current-menu-item > a::before, .tg-scroll-to-top:hover, button, input[type="button"], input[type="reset"], input[type="submit"], .tg-primary-menu > div ul li.tg-header-button-wrap a, .tg-mini-cart .cart-page-link .count' => array(
					'background-color' => esc_html( $base_primary_color ),
				),
			);
			$parse_css             .= elearning_parse_css( 'var(--elearning-color-1, #269bd1)', $base_primary_color, $base_primary_color_css );

			// Base text color.
			$base_text_color     = get_theme_mod( 'elearning_base_color_text', 'var(--elearning-color-7)' );
			$base_text_color_css = array(
				'body, a' => array(
					'color' => esc_html( $base_text_color ),
				),
			);
			$parse_css          .= elearning_parse_css( 'var(--elearning-color-7)', $base_text_color, $base_text_color_css );

			// Base border color.
			$base_border_color     = get_theme_mod( 'elearning_base_color_border', '#e9ecef' );
			$base_border_color_css = array(
				'.tg-site-header, .tg-primary-menu, .tg-primary-menu > div ul li ul, .tg-primary-menu > div ul li ul li a, .posts-navigation, #comments, .widget ul li, .post-navigation, #secondary, .tg-site-footer .tg-site-footer-widgets, .tg-site-footer .tg-site-footer-bar .tg-container' => array(
					'border-color' => esc_html( $base_border_color ),
				),
				'hr .tg-container--separate' => array(
					'background-color' => esc_html( $base_border_color ),
				),
			);
			$parse_css            .= elearning_parse_css( '#e9ecef', $base_border_color, $base_border_color_css );

			$heading_color     = get_theme_mod( 'elearning_heading_color', 'var(--elearning-color-7, #16181a)' );
			$heading_color_css = array(
				'h1, h2, h3, h4, h5, h6, .entry-title a' => array(
					'color' => esc_html( $heading_color ),
				),
			);
			$parse_css        .= elearning_parse_css( 'var(--elearning-color-7, #16181a)', $heading_color, $heading_color_css );

			// Link colors.
			$link_color_normal     = get_theme_mod( 'elearning_link_color', 'var(--elearning-color-1, #269bd1)' );
			$link_color_normal_css = array(
				'.entry-content a' => array(
					'color' => esc_html( $link_color_normal ),
				),
			);
			$parse_css            .= elearning_parse_css( 'var(--elearning-color-1, #269bd1)', $link_color_normal, $link_color_normal_css );

			// Link hover color.
			$link_color_hover     = get_theme_mod( 'elearning_link_hover_color', 'var(--elearning-color-1, #269bd1)' );
			$link_color_hover_css = array(
				'.entry-content a:hover, .entry-content a:focus' => array(
					'color' => esc_html( $link_color_hover ),
				),
			);
			$parse_css           .= elearning_parse_css( 'var(--elearning-color-1, #269bd1)', $link_color_hover, $link_color_hover_css );

			// Inside container background color.
			$inside_container_bg_default = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$inside_container_bg         = get_theme_mod( 'elearning_inside_container_background', $inside_container_bg_default );
			$parse_css                  .= elearning_parse_background_css( $inside_container_bg_default, $inside_container_bg, '#main' );

			// Outside background.
			$outside_container_background_defaults = array(
				'background-color'      => '',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$outside_container_background          = get_theme_mod( 'elearning_outside_container_background', $outside_container_background_defaults );
			$parse_css                            .= elearning_parse_background_css( $outside_container_background_defaults, $outside_container_background, apply_filters( 'elearning_outside_container_background', 'body,body.page-template-pagebuilder' ) );

			$base_typography_body_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '15',
						'unit' => 'px',
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
			);
			$base_typography_body         = get_theme_mod( 'elearning_base_typography_body', $base_typography_body_default );
			$parse_css                   .= elearning_parse_typography_css(
				$base_typography_body_default,
				$base_typography_body,
				'body',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$base_typography_heading_default = apply_filters(
				'elearning_base_typography_heading_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '400',
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
				)
			);
			$base_typography_heading         = get_theme_mod( 'elearning_base_typography_heading', $base_typography_heading_default );
			$parse_css                      .= elearning_parse_typography_css(
				$base_typography_heading_default,
				$base_typography_heading,
				'h1, h2, h3, h4, h5, h6',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h1_default = apply_filters(
				'elearning_typography_h1_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2.5',
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
				)
			);
			$typography_h1         = get_theme_mod( 'elearning_typography_h1', $typography_h1_default );
			$parse_css            .= elearning_parse_typography_css(
				$typography_h1_default,
				$typography_h1,
				'h1',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h2_default = apply_filters(
				'elearning_typography_h2_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2.5',
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
				)
			);
			$typography_h2         = get_theme_mod( 'elearning_typography_h2', $typography_h2_default );
			$parse_css            .= elearning_parse_typography_css(
				$typography_h2_default,
				$typography_h2,
				'h2',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h3_default = apply_filters(
				'elearning_typography_h3_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2',
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
				)
			);
			$typography_h3         = get_theme_mod( 'elearning_typography_h3', $typography_h3_default );
			$parse_css            .= elearning_parse_typography_css(
				$typography_h3_default,
				$typography_h3,
				'h3',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h4_default = apply_filters(
				'elearning_typography_h4_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.75',
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
				)
			);
			$typography_h4         = get_theme_mod( 'elearning_typography_h4', $typography_h4_default );
			$parse_css            .= elearning_parse_typography_css(
				$typography_h4_default,
				$typography_h4,
				'h4',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h5_default = apply_filters(
				'elearning_typography_h5_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.313',
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
				)
			);
			$typography_h5         = get_theme_mod( 'elearning_typography_h5', $typography_h5_default );
			$parse_css            .= elearning_parse_typography_css(
				$typography_h5_default,
				$typography_h5,
				'h5',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_h6_default = apply_filters(
				'elearning_typography_h6_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.125',
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
				)
			);
			$typography_h6         = get_theme_mod( 'elearning_typography_h6', $typography_h6_default );
			$parse_css            .= elearning_parse_typography_css(
				$typography_h6_default,
				$typography_h6,
				'h6',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Button padding.
			$button_padding_default = array(
				'top'    => '10',
				'right'  => '15',
				'bottom' => '10',
				'left'   => '15',
				'unit'   => 'px',
			);
			$button_padding         = get_theme_mod( 'elearning_button_padding', $button_padding_default );
			$parse_css             .= elearning_parse_dimension_css(
				$button_padding_default,
				$button_padding,
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .tg-header-button a',
				'padding'
			);

			// Button typography.
			$button_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => array(
						'size' => '',
						'unit' => 'px',
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
			);
			$button_typography         = get_theme_mod( 'elearning_button_typography', $button_typography_default );
			$parse_css                .= elearning_parse_typography_css(
				$button_typography_default,
				$button_typography,
				'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-button .wp-block-button__link, :root .tg-site :where(.wp-element-button, .wp-block-button__link)',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header Button typography.
			$header_button_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => array(
						'size' => '',
						'unit' => 'px',
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
			);
			$header_button_typography         = get_theme_mod( 'elearning_header_button_typography', $header_button_typography_default );
			$parse_css                       .= elearning_parse_typography_css(
				$header_button_typography_default,
				$header_button_typography,
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Button text color.
			$button_text_color     = get_theme_mod( 'elearning_button_text_color', '#ffffff' );
			$button_text_color_css = array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .tg-header-button a, :root .tg-site :where(.wp-element-button, .wp-block-button__link)' => array(
					'color' => esc_html( $button_text_color ),
				),
			);
			$parse_css            .= elearning_parse_css( '#ffffff', $button_text_color, $button_text_color_css );

			// Button hover text color.
			$button_hover_text_color     = get_theme_mod( 'elearning_button_text_hover_color', '#ffffff' );
			$button_hover_text_color_css = array(
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover, :root .tg-site :where(.wp-element-button, .wp-block-button__link):hover' => array(
					'color' => esc_html( $button_hover_text_color ),
				),
			);
			$parse_css                  .= elearning_parse_css( '#ffffff', $button_hover_text_color, $button_hover_text_color_css );

			// Button background color.
			$button_bg_color     = get_theme_mod( 'elearning_button_bg_color', 'var(--elearning-color-1, #269bd1)' );
			$button_bg_color_css = array(
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .tg-header-button a,  :root :where(.wp-element-button, .wp-block-button__link)' => array(
					'background-color' => esc_html( $button_bg_color ),
				),
			);
			$parse_css          .= elearning_parse_css( 'var(--elearning-color-1, #269bd1)', $button_bg_color, $button_bg_color_css );

			// Button background hover color.
			$button_bg_hover_color     = get_theme_mod( 'elearning_button_bg_hover_color', 'var(--elearning-color-2)' );
			$button_bg_hover_color_css = array(
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover, .tg-header-button a:hover, :root :where(.wp-element-button, .wp-block-button__link):hover' => array(
					'background-color' => esc_html( $button_bg_hover_color ),
				),
			);
			$parse_css                .= elearning_parse_css( 'var(--elearning-color-2)', $button_bg_hover_color, $button_bg_hover_color_css );

			// border width.
			$button_border_width_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$button_border_width = get_theme_mod( 'elearning_header_button_border_width', $button_border_width_default );

			$parse_css .= elearning_parse_dimension_css(
				$button_border_width_default,
				$button_border_width,
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover, .tg-header-button a:hover, :root :where(.wp-element-button, .wp-block-button__link)',
				'border-width'
			);

			// button border color.
			$button_border_color     = get_theme_mod( 'elearning_header_button_border_color', '' );
			$button_border_color_css = array(
				'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, #infinite-handle span:hover, .tg-header-button a:hover, :root :where(.wp-element-button, .wp-block-button__link)' => array(
					'border-color' => esc_html( $button_border_color ),
				),
			);
			$parse_css              .= elearning_parse_css( '', $button_border_color, $button_border_color_css );

			// Button border roundness.
			$button_border_radius_default = array(
				'size' => 2,
				'unit' => 'px',
			);
			$button_border_radius         = get_theme_mod( 'elearning_button_roundness', $button_border_radius_default );
			$parse_css                   .= elearning_parse_slider_css(
				$button_border_radius_default,
				$button_border_radius,
				'button, input[type="button"], input[type="reset"], input[type="submit"], #infinite-handle span, .tg-header-button a, :where(.wp-block-button__link)',
				'border-radius'
			);

			$typography_site_title_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'subsets'        => array( 'latin' ),
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.313',
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
						'size' => '1.5',
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
			);
			$typography_site_title         = get_theme_mod( 'elearning_typography_site_title', $typography_site_title_default );
			$parse_css                    .= elearning_parse_typography_css(
				$typography_site_title_default,
				$typography_site_title,
				'.site-branding .site-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_site_description_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'subsets'        => array( 'latin' ),
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
			);
			$typography_site_description         = get_theme_mod( 'elearning_typography_site_description', $typography_site_description_default );
			$parse_css                          .= elearning_parse_typography_css(
				$typography_site_description_default,
				$typography_site_description,
				'.site-branding .site-description',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header top text color.
			$header_top_text_color     = get_theme_mod( 'elearning_header_top_text_color', 'var(--elearning-color-7)' );
			$header_top_text_color_css = array(
				'.tg-site-header .tg-site-header-top' => array(
					'color' => esc_html( $header_top_text_color ),
				),
			);
			$parse_css                .= elearning_parse_css( 'var(--elearning-color-7)', $header_top_text_color, $header_top_text_color_css );

			// Header top background.
			$header_top_bg_default = array(
				'background-color'      => '#e9ecef',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$header_top_bg         = get_theme_mod( 'elearning_header_top_bg', $header_top_bg_default );
			$parse_css            .= elearning_parse_background_css( $header_top_bg_default, $header_top_bg, '.tg-site-header .tg-site-header-top' );

			// Header main background.
			$header_main_bg_default = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$header_main_bg         = get_theme_mod( 'elearning_header_main_bg', $header_main_bg_default );
			$parse_css             .= elearning_parse_background_css( $header_main_bg_default, $header_main_bg, '.tg-site-header, .tg-container--separate .tg-site-header' );

			// Header main border bottom.
			$header_main_border_bottom_default = array(
				'size' => 0,
				'unit' => 'px',
			);
			$header_main_border_bottom         = get_theme_mod( 'elearning_header_main_border_bottom_size', $header_main_border_bottom_default );
			$parse_css                        .= elearning_parse_slider_css(
				$header_main_border_bottom_default,
				$header_main_border_bottom,
				'.tg-site-header',
				'border-bottom-width'
			);

			// Header main border bottom.
			$header_main_border_bottom_color     = get_theme_mod( 'elearning_header_main_border_bottom_color', '#e9ecef' );
			$header_main_border_bottom_color_css = array(
				'.tg-site .tg-site-header' => array(
					'border-bottom-color' => esc_html( $header_main_border_bottom_color ),
				),
			);
			$parse_css                          .= elearning_parse_css( '#e9ecef', $header_main_border_bottom_color, $header_main_border_bottom_color_css );

			// Header button padding.
			$header_button_padding_default = array(
				'top'    => '5',
				'right'  => '10',
				'bottom' => '5',
				'left'   => '10',
				'unit'   => 'px',
			);
			$header_button_padding         = get_theme_mod( 'elearning_header_button_padding', $header_button_padding_default );
			$parse_css                    .= elearning_parse_dimension_css(
				$header_button_padding_default,
				$header_button_padding,
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a',
				'padding'
			);

			// Header button text color.
			$header_button_text_color     = get_theme_mod( 'elearning_header_button_text_color', '#ffffff' );
			$header_button_text_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a' => array(
					'color' => esc_html( $header_button_text_color ),
				),
			);
			$parse_css                   .= elearning_parse_css( '#ffffff', $header_button_text_color, $header_button_text_color_css );

			// Header button hover text color.
			$header_button_hover_text_color     = get_theme_mod( 'elearning_header_button_text_hover_color', '#ffffff' );
			$header_button_hover_text_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a:hover' => array(
					'color' => esc_html( $header_button_hover_text_color ),
				),
			);
			$parse_css                         .= elearning_parse_css( '#ffffff', $header_button_hover_text_color, $header_button_hover_text_color_css );

			// Header background color.
			$header_button_bg_color     = get_theme_mod( 'elearning_header_button_bg_color', 'var(--elearning-color-1, #269bd1)' );
			$header_button_bg_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a' => array(
					'background-color' => esc_html( $header_button_bg_color ),
				),
			);
			$parse_css                 .= elearning_parse_css( 'var(--elearning-color-1, #269bd1)', $header_button_bg_color, $header_button_bg_color_css );

			// Header button hover background color.
			$header_button_bg_hover_color     = get_theme_mod( 'elearning_header_button_bg_hover_color', '#1e7ba6' );
			$header_button_bg_hover_color_css = array(
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a:hover' => array(
					'background-color' => esc_html( $header_button_bg_hover_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '#ffffff', $header_button_bg_hover_color, $header_button_bg_hover_color_css );

			// Header button border roundness.
			$header_button_border_radius_default = array(
				'size' => 0,
				'unit' => 'px',
			);
			$header_button_border_radius         = get_theme_mod( 'elearning_header_button_roundness', $header_button_border_radius_default );
			$parse_css                          .= elearning_parse_slider_css(
				$header_button_border_radius_default,
				$header_button_border_radius,
				'.main-navigation.tg-primary-menu > div ul li.tg-header-button-wrap a',
				'border-radius'
			);

			// Primary menu border bottom.
			$primary_menu_border_bottom_default = array(
				'size' => 0,
				'unit' => 'px',
			);
			$primary_menu_border_bottom         = get_theme_mod( 'elearning_primary_menu_border_bottom_size', $primary_menu_border_bottom_default );
			$parse_css                         .= elearning_parse_slider_css(
				$primary_menu_border_bottom_default,
				$primary_menu_border_bottom,
				'.tg-site-header .main-navigation',
				'border-bottom-width'
			);

			// Primary menu border bottom.
			$primary_menu_border_bottom_color     = get_theme_mod( 'elearning_primary_menu_border_bottom_color', '#e9ecef' );
			$primary_menu_border_bottom_color_css = array(
				'.tg-site-header .main-navigation' => array(
					'border-bottom-color' => esc_html( $primary_menu_border_bottom_color ),
				),
			);
			$parse_css                           .= elearning_parse_css( '#e9ecef', $primary_menu_border_bottom_color, $primary_menu_border_bottom_color_css );

			$typography_primary_menu_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => 'regular',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
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
			);
			$typography_primary_menu         = get_theme_mod( 'elearning_typography_primary_menu', $typography_primary_menu_default );
			$parse_css                      .= elearning_parse_typography_css(
				$typography_primary_menu_default,
				$typography_primary_menu,
				'.tg-primary-menu > div ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_primary_menu_dropdown_item_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
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
			);
			$typography_primary_menu_dropdown_item         = get_theme_mod( 'elearning_typography_primary_menu_dropdown_item', $typography_primary_menu_dropdown_item_default );
			$parse_css                                    .= elearning_parse_typography_css(
				$typography_primary_menu_dropdown_item_default,
				$typography_primary_menu_dropdown_item,
				'.tg-primary-menu > div ul li ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_mobile_menu_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
						'unit' => 'rem',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '1.6',
						'unit' => 'rem',
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
						'size' => '1.8',
						'unit' => '-',
					),
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);
			$typography_mobile_menu         = get_theme_mod( 'elearning_typography_mobile_menu', $typography_mobile_menu_default );
			$parse_css                     .= elearning_parse_typography_css(
				$typography_mobile_menu_default,
				$typography_mobile_menu,
				'.tg-mobile-navigation a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Page header padding.
			$page_title_padding_default = array(
				'top'    => '20',
				'right'  => '0',
				'bottom' => '20',
				'left'   => '0',
				'unit'   => 'px',
			);
			$page_title_padding         = get_theme_mod( 'elearning_page_title_padding', $page_title_padding_default );
			$parse_css                 .= elearning_parse_dimension_css(
				$page_title_padding_default,
				$page_title_padding,
				'.tg-page-header',
				'padding'
			);

			// Breadcrumbs typography.
			$breadcrumb_typography_default = array(
				'font-family' => 'default',
				'font-weight' => '500',
				'font-size'   => array(
					'desktop' => array(
						'size' => '16',
						'unit' => 'px',
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
			);
			$breadcrumb_typography         = get_theme_mod( 'elearning_breadcrumb_typography', $breadcrumb_typography_default );
			$parse_css                    .= elearning_parse_typography_css(
				$breadcrumb_typography_default,
				$breadcrumb_typography,
				apply_filters( 'elearning_breadcrumb_typography_selector', '.tg-page-header .breadcrumb-trail ul li' ),
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);
			// Page/Post title color.
			$post_page_title_color     = get_theme_mod( 'elearning_post_page_title_color', 'var(--elearning-color-7, #16181a)' );
			$post_page_title_color_css = array(
				'.tg-page-header .tg-page-header__title, .tg-page-content__title, .tg-page-header .archive-description > p' => array(
					'color' => esc_html( $post_page_title_color ),
				),
			);
			$parse_css                .= elearning_parse_css( 'var(--elearning-color-7, #16181a)', $post_page_title_color, $post_page_title_color_css );

			// Page header background.
			$page_header_bg_default = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-position'   => 'top left',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$page_header_bg         = get_theme_mod( 'elearning_page_title_bg', $page_header_bg_default );
			$parse_css             .= elearning_parse_background_css( $page_header_bg_default, $page_header_bg, '.tg-page-header, .tg-container--separate .tg-page-header' );

			// Breadcrumbs text color.
			$breadcrumb_text_color     = get_theme_mod( 'elearning_breadcrumbs_text_color', 'var(--elearning-color-7, #16181a)' );
			$breadcrumb_text_color_css = array(
				apply_filters( 'elearning_breadcrumbs_text_color_selector', '.tg-page-header .breadcrumb-trail ul li' ) => array(
					'color' => esc_html( $breadcrumb_text_color ),
				),
			);
			$parse_css                .= elearning_parse_css( 'var(--elearning-color-7, #16181a)', $breadcrumb_text_color, $breadcrumb_text_color_css );

			// Breadcrumbs separator color.
			$breadcrumb_separator_color     = get_theme_mod( 'elearning_breadcrumbs_seperator_color', 'var(--elearning-color-7)' );
			$breadcrumb_separator_color_css = array(
				apply_filters( 'elearning_breadcrumbs_separator_color_selector', '.tg-page-header .breadcrumb-trail ul li::after' ) => array(
					'color' => esc_html( $breadcrumb_separator_color ),
				),
			);
			$parse_css                     .= elearning_parse_css( 'var(--elearning-color-7)', $breadcrumb_separator_color, $breadcrumb_separator_color_css );

			// Breadcrumbs link color.
			$breadcrumb_link_color     = get_theme_mod( 'elearning_breadcrumbs_link_color', '' );
			$breadcrumb_link_color_css = array(
				apply_filters( 'elearning_breadcrumbs_link_color_selector', '.tg-page-header .breadcrumb-trail ul li a' ) => array(
					'color' => esc_html( $breadcrumb_link_color ),
				),
			);
			$parse_css                .= elearning_parse_css( '', $breadcrumb_link_color, $breadcrumb_link_color_css );

			// Breadcrumbs link hover color.
			$breadcrumb_link_hover_color     = get_theme_mod( 'elearning_breadcrumbs_link_hover_color', '' );
			$breadcrumb_link_hover_color_css = array(
				apply_filters( 'elearning_breadcrumbs_link_hover_color_selector', '.tg-page-header .breadcrumb-trail ul li a:hover ' ) => array(
					'color' => esc_html( $breadcrumb_link_hover_color ),
				),
			);
			$parse_css                      .= elearning_parse_css( '', $breadcrumb_link_hover_color, $breadcrumb_link_hover_color_css );

			$typography_post_page_title_default = apply_filters(
				'elearning_typography_post_page_title_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '2.5',
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
				)
			);
			$typography_post_page_title         = get_theme_mod( 'elearning_typography_post_page_title', $typography_post_page_title_default );
			$parse_css                         .= elearning_parse_typography_css(
				$typography_post_page_title_default,
				$typography_post_page_title,
				'.tg-page-header .tg-page-header__title, .tg-page-content__title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_blog_post_title_default = array(
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
			);
			$typography_blog_post_title         = get_theme_mod( 'elearning_typography_blog_post_title', $typography_blog_post_title_default );
			$parse_css                         .= elearning_parse_typography_css(
				$typography_blog_post_title_default,
				$typography_blog_post_title,
				apply_filters( 'elearning_typography_blog_post_title_selector', '.entry-title:not(.tg-page-content__title)' ),
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_widget_heading_default = apply_filters(
				'elearning_typography_widget_heading_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '500',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '1.2',
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
				)
			);
			$typography_widget_heading         = get_theme_mod( 'elearning_typography_widget_heading', $typography_widget_heading_default );
			$parse_css                        .= elearning_parse_typography_css(
				$typography_widget_heading_default,
				$typography_widget_heading,
				'.widget .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			$typography_widget_content_default = apply_filters(
				'elearning_typography_widget_content_filter',
				array(
					'font-family'    => 'inherit',
					'font-weight'    => '400',
					'subsets'        => array( 'latin' ),
					'font-size'      => array(
						'desktop' => array(
							'size' => '14',
							'unit' => 'px',
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
				)
			);
			$typography_widget_content         = get_theme_mod( 'elearning_typography_widget_content', $typography_widget_content_default );
			$parse_css                        .= elearning_parse_typography_css(
				$typography_widget_content_default,
				$typography_widget_content,
				'.widget',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer background.
			$footer_widgets_bg_defaults = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_widgets_bg          = get_theme_mod( 'elearning_footer_widgets_bg', $footer_widgets_bg_defaults );
			$parse_css                 .= elearning_parse_background_css( $footer_widgets_bg_defaults, $footer_widgets_bg, apply_filters( 'elearning_footer_widgets_bg_selector', '.tg-site-footer-widgets' ) );

			// Footer widgets title color.
			$footer_widgets_title_color     = get_theme_mod( 'elearning_footer_widgets_title_color', 'var(--elearning-color-7, #16181a)' );
			$footer_widgets_title_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets .widget-title' => array(
					'color' => esc_html( $footer_widgets_title_color ),
				),
			);
			$parse_css                     .= elearning_parse_css( 'var(--elearning-color-7, #16181a)', $footer_widgets_title_color, $footer_widgets_title_color_css );

			// Footer widgets text color.
			$footer_widgets_text_color     = get_theme_mod( 'elearning_footer_widgets_text_color', 'var(--elearning-color-7)' );
			$footer_widgets_text_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets, .tg-site-footer .tg-site-footer-widgets p' => array(
					'color' => esc_html( $footer_widgets_text_color ),
				),
			);
			$parse_css                    .= elearning_parse_css( 'var(--elearning-color-7)', $footer_widgets_text_color, $footer_widgets_text_color_css );

			// Footer widgets link color.
			$footer_widgets_link_color     = get_theme_mod( 'elearning_footer_widgets_link_color', 'var(--elearning-color-7, #16181a)' );
			$footer_widgets_link_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets a' => array(
					'color' => esc_html( $footer_widgets_link_color ),
				),
			);
			$parse_css                    .= elearning_parse_css( 'var(--elearning-color-7, #16181a)', $footer_widgets_link_color, $footer_widgets_link_color_css );

			// Footer widgets link hover color.
			$footer_widgets_link_hover_color     = get_theme_mod( 'elearning_footer_widgets_link_hover_color', 'var(--elearning-color-1, #269bd1)' );
			$footer_widgets_link_hover_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets a:hover, .tg-site-footer .tg-site-footer-widgets a:focus' => array(
					'color' => esc_html( $footer_widgets_link_hover_color ),
				),
			);
			$parse_css                          .= elearning_parse_css( 'var(--elearning-color-1, #269bd1)', $footer_widgets_link_hover_color, $footer_widgets_link_hover_color_css );

			// Footer widgets border top width.
			$footer_widgets_border_top_width_default = array(
				'size' => 1,
				'unit' => 'px',
			);
			$footer_widgets_border_top_width         = get_theme_mod( 'elearning_footer_widgets_border_top_width', $footer_widgets_border_top_width_default );
			$parse_css                              .= elearning_parse_slider_css(
				$footer_widgets_border_top_width_default,
				$footer_widgets_border_top_width,
				'.tg-site-footer .tg-site-footer-widgets',
				'border-top-width'
			);

			// Footer widgets border top color.
			$footer_widgets_border_top_color     = get_theme_mod( 'elearning_footer_widgets_border_top_color', '#e9ecef' );
			$footer_widgets_border_top_color_css = array(
				'.tg-site-footer .tg-site-footer-widgets' => array(
					'border-top-color' => esc_html( $footer_widgets_border_top_color ),
				),
			);
			$parse_css                          .= elearning_parse_css( '#e9ecef', $footer_widgets_border_top_color, $footer_widgets_border_top_color_css );

			// Footer widgets item border bottom width.
			$footer_widgets_item_border_bottom_width_default = array(
				'size' => 1,
				'unit' => 'px',
			);
			$footer_widgets_item_border_bottom_width         = get_theme_mod( 'elearning_footer_widgets_item_border_bottom_width', $footer_widgets_item_border_bottom_width_default );
			$parse_css                                      .= elearning_parse_slider_css(
				$footer_widgets_item_border_bottom_width_default,
				$footer_widgets_item_border_bottom_width,
				'.tg-site-footer .tg-site-footer-widgets ul li',
				'border-bottom-width'
			);

			// Footer widgets item border bottom color.
			$footer_widgets_item_border_bottom__color     = get_theme_mod( 'elearning_footer_widgets_item_border_bottom_color', '#e9ecef' );
			$footer_widgets_item_border_bottom__color_css = array(
				'.tg-site-footer .tg-site-footer-widgets ul li' => array(
					'border-bottom-color' => esc_html( $footer_widgets_item_border_bottom__color ),
				),
			);
			$parse_css                                   .= elearning_parse_css( '#e9ecef', $footer_widgets_item_border_bottom__color, $footer_widgets_item_border_bottom__color_css );

			// Footer bottom bar background.
			$footer_bar_bg_defaults = array(
				'background-color'      => '#ffffff',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_bar             = get_theme_mod( 'elearning_footer_bar_bg', $footer_bar_bg_defaults );
			$parse_css             .= elearning_parse_background_css( $footer_bar_bg_defaults, $footer_bar, '.tg-site-footer .tg-site-footer-bar' );

			// Footer bottom bar text color.
			$footer_bar_text_color     = get_theme_mod( 'elearning_footer_bar_text_color', 'var(--elearning-color-7)' );
			$footer_bar_text_color_css = array(
				'.tg-site-footer .tg-site-footer-bar' => array(
					'color' => esc_html( $footer_bar_text_color ),
				),
			);
			$parse_css                .= elearning_parse_css( 'var(--elearning-color-7)', $footer_bar_text_color, $footer_bar_text_color_css );

			// Footer bottom bar link color.
			$footer_bar_link_color     = get_theme_mod( 'elearning_footer_bar_link_color', 'var(--elearning-color-7, #16181a)' );
			$footer_bar_link_color_css = array(
				'.tg-site-footer .tg-site-footer-bar a' => array(
					'color' => esc_html( $footer_bar_link_color ),
				),
			);
			$parse_css                .= elearning_parse_css( 'var(--elearning-color-7, #16181a)', $footer_bar_link_color, $footer_bar_link_color_css );

			// Footer bottom bar link hover color.
			$footer_bar_link_hover_color     = get_theme_mod( 'elearning_footer_bar_link_hover_color', 'var(--elearning-color-1, #269bd1)' );
			$footer_bar_link_hover_color_css = array(
				'.tg-site-footer .tg-site-footer-bar a:hover, .tg-site-footer .tg-site-footer-bar a:focus' => array(
					'color' => esc_html( $footer_bar_link_hover_color ),
				),
			);
			$parse_css                      .= elearning_parse_css( 'var(--elearning-color-1, #269bd1)', $footer_bar_link_hover_color, $footer_bar_link_hover_color_css );

			// Footer bar border top width.
			$footer_bar_border_top_width_default = array(
				'size' => 0,
				'unit' => 'px',
			);
			$footer_bar_border_top_width         = get_theme_mod( 'elearning_footer_bar_border_top_width', $footer_bar_border_top_width_default );
			$parse_css                          .= elearning_parse_slider_css(
				$footer_bar_border_top_width_default,
				$footer_bar_border_top_width,
				'.tg-site-footer .tg-site-footer-bar',
				'border-top-width'
			);

			// Footer bar border top color.
			$footer_bar_border_top_color     = get_theme_mod( 'elearning_footer_bar_border_top_color', '#e9ecef' );
			$footer_bar_border_top_color_css = array(
				'.tg-site-footer .tg-site-footer-bar' => array(
					'border-top-color' => esc_html( $footer_bar_border_top_color ),
				),
			);
			$parse_css                      .= elearning_parse_css( '#e9ecef', $footer_bar_border_top_color, $footer_bar_border_top_color_css );

			$scroll_to_top_normal_bg_color     = get_theme_mod( 'elearning_scroll_to_top_bg_color', 'var(--elearning-color-7, #16181a)' );
			$scroll_to_top_normal_bg_color_css = array(
				'.tg-scroll-to-top' => array(
					'background-color' => esc_html( $scroll_to_top_normal_bg_color ),
				),
			);
			$parse_css                        .= elearning_parse_css( 'var(--elearning-color-7, #16181a)', $scroll_to_top_normal_bg_color, $scroll_to_top_normal_bg_color_css );

			$scroll_to_top_hover_bg_color     = get_theme_mod( 'elearning_scroll_to_top_bg_hover_color', '#1e7ba6' );
			$scroll_to_top_hover_bg_color_css = array(
				'.tg-scroll-to-top:hover' => array(
					'background-color' => esc_html( $scroll_to_top_hover_bg_color ),
				),
			);
			$parse_css                       .= elearning_parse_css( '#1e7ba6', $scroll_to_top_hover_bg_color, $scroll_to_top_hover_bg_color_css );

			$scroll_to_top_normal_color     = get_theme_mod( 'elearning_scroll_to_top_color', '#ffffff' );
			$scroll_to_top_normal_color_css = array(
				'.tg-scroll-to-top' => array(
					'color' => esc_html( $scroll_to_top_normal_color ),
				),
			);
			$parse_css                     .= elearning_parse_css( '#ffffff', $scroll_to_top_normal_color, $scroll_to_top_normal_color_css );

			$scroll_to_top_hover_color     = get_theme_mod( 'elearning_scroll_to_top_hover_color', '#ffffff' );
			$scroll_to_top_hover_color_css = array(
				'.tg-scroll-to-top:hover' => array(
					'color' => esc_html( $scroll_to_top_hover_color ),
				),
			);
			$parse_css                    .= elearning_parse_css( '#ffffff', $scroll_to_top_hover_color, $scroll_to_top_hover_color_css );

			$parse_css .= $dynamic_css;

			return apply_filters( 'elearning_theme_dynamic_css', $parse_css );
		}

		/**
		 * Return dynamic CSS output.
		 *
		 * @param string $dynamic_css Dynamic CSS.
		 * @param string $dynamic_css_filtered Dynamic CSS Filters.
		 *
		 * @return string Generated CSS.
		 */
		public static function render_builder_output( $dynamic_css ) {

			$parse_builder_css = '';

			/**
			 * Header builder top area height.
			 */
			$header_top_area_height_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_top_area_height = get_theme_mod( 'elearning_header_top_area_height', $header_top_area_height_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_top_area_height_default,
				$header_top_area_height,
				'.tg-header-builder .tg-top-row',
				'height'
			);

			/**
			 * Header builder top area container.
			 */
			$header_top_area_container_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_top_area_container = get_theme_mod( 'elearning_header_top_area_container', $header_top_area_container_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_top_area_container_default,
				$header_top_area_container,
				'.tg-header-builder .tg-header-top-row .tg-container',
				'max-width'
			);

			// Header builder top area background.
			$header_top_area_background_default = array(
				'background-color'      => '#e9ecef',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$header_top_area_background         = get_theme_mod( 'elearning_header_top_area_background', $header_top_area_background_default );
			$parse_builder_css                 .= elearning_parse_background_css( $header_top_area_background_default, $header_top_area_background, '.tg-header-builder .tg-header-top-row' );

			// Header builder top area padding.
			$header_top_area_padding_default = array(
				'top'    => '14',
				'right'  => '0',
				'bottom' => '14',
				'left'   => '0',
				'unit'   => 'px',
			);

			$header_top_area_padding = get_theme_mod( 'elearning_header_top_area_padding', $header_top_area_padding_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_top_area_padding_default,
				$header_top_area_padding,
				'.tg-header-builder .tg-header-top-row',
				'padding'
			);

			// Header builder top area border width.
			$header_top_area_border_width_default = array(
				'top'    => '0',
				'right'  => '0',
				'bottom' => '0',
				'left'   => '0',
				'unit'   => 'px',
			);

			$header_top_area_border_width = get_theme_mod( 'elearning_header_top_area_border_width', $header_top_area_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_top_area_border_width_default,
				$header_top_area_border_width,
				'.tg-header-builder .tg-header-top-row',
				'border-width'
			);

			// Header builder top area border color.
			$header_top_area_border_color     = get_theme_mod( 'elearning_header_top_area_border_color', '' );
			$header_top_area_border_color_css = array(
				'.tg-header-builder .tg-header-top-row' => array(
					'border-color' => esc_html( $header_top_area_border_color ),
				),
			);
			$parse_builder_css               .= elearning_parse_css( '', $header_top_area_border_color, $header_top_area_border_color_css );

			// Header builder top area color.
			$header_top_area_color     = get_theme_mod( 'elearning_header_top_area_color', '' );
			$header_top_area_color_css = array(
				'.tg-header-builder .tg-header-top-row' => array(
					'color' => esc_html( $header_top_area_color ),
				),
			);
			$parse_builder_css        .= elearning_parse_css( '', $header_top_area_color, $header_top_area_color_css );

			// Header builder top area height.
			$header_main_area_height_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_main_area_height = get_theme_mod( 'elearning_header_main_area_height', $header_main_area_height_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_main_area_height_default,
				$header_main_area_height,
				'.tg-header-builder .tg-main-row',
				'height'
			);

			// Header builder main area container.
			$header_main_area_container_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_main_area_container = get_theme_mod( 'elearning_header_main_area_container', $header_main_area_container_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_main_area_container_default,
				$header_main_area_container,
				'.tg-header-builder .tg-header-main-row .tg-container',
				'max-width'
			);

			// Header builder main area background.
			$header_main_area_background_default = array(
				'background-color'      => 'var(--elearning-color-3)',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$header_main_area_background         = get_theme_mod( 'elearning_header_main_area_background', $header_main_area_background_default );
			$parse_builder_css                  .= elearning_parse_background_css( $header_main_area_background_default, $header_main_area_background, '.tg-header-builder .tg-header-main-row' );

			// Header builder main area padding.
			$header_main_area_padding_default = array(
				'top'    => '20',
				'right'  => '20',
				'bottom' => '20',
				'left'   => '20',
				'unit'   => 'px',
			);

			$header_main_area_padding = get_theme_mod( 'elearning_header_main_area_padding', $header_main_area_padding_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_main_area_padding_default,
				$header_main_area_padding,
				'.tg-header-builder .tg-header-main-row',
				'padding'
			);

			// Header builder main area padding.
			$header_main_area_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$header_main_area_margin = get_theme_mod( 'elearning_header_main_area_margin', $header_main_area_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_main_area_margin_default,
				$header_main_area_margin,
				'.tg-header-builder .tg-header-main-row',
				'margin'
			);

			// Header builder main area border.
			$header_main_area_border_width_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$header_main_area_border_width = get_theme_mod( 'elearning_header_main_area_border_width', $header_main_area_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_main_area_border_width_default,
				$header_main_area_border_width,
				'.tg-header-builder .tg-header-main-row',
				'border-width'
			);

			// Header builder main area border color.
			$header_main_area_border_color     = get_theme_mod( 'elearning_header_main_area_border_color', '' );
			$header_main_area_border_color_css = array(
				'.tg-header-builder .tg-header-main-row' => array(
					'border-color' => esc_html( $header_main_area_border_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $header_main_area_border_color, $header_main_area_border_color_css );

			$header_main_area_color     = get_theme_mod( 'elearning_header_main_area_color', '' );
			$header_main_area_color_css = array(
				'.tg-header-builder .tg-header-main-row' => array(
					'color' => esc_html( $header_main_area_color ),
				),
			);
			$parse_builder_css         .= elearning_parse_css( '', $header_main_area_color, $header_main_area_color_css );

			// Header builder bottom area height.
			$header_bottom_area_height_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_bottom_area_height = get_theme_mod( 'elearning_header_bottom_area_height', $header_bottom_area_height_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_bottom_area_height_default,
				$header_bottom_area_height,
				'.tg-header-builder .tg-bottom-row',
				'height'
			);

			// Header builder bottom area container.
			$header_bottom_area_container_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_bottom_area_container = get_theme_mod( 'elearning_header_bottom_area_container', $header_bottom_area_container_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_bottom_area_container_default,
				$header_bottom_area_container,
				'.tg-header-builder .tg-header-bottom-row .tg-container',
				'max-width'
			);

			// Header builder bottom area background.
			$header_bottom_area_background_default = array(
				'background-color'      => '',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$header_bottom_area_background         = get_theme_mod( 'elearning_header_bottom_area_background', $header_bottom_area_background_default );
			$parse_builder_css                    .= elearning_parse_background_css( $header_bottom_area_background_default, $header_bottom_area_background, '.tg-header-builder .tg-header-bottom-row' );

			// Header builder bottom area padding.
			$header_bottom_area_padding_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$header_bottom_area_padding = get_theme_mod( 'elearning_header_bottom_area_padding', $header_bottom_area_padding_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_bottom_area_padding_default,
				$header_bottom_area_padding,
				'.tg-header-builder .tg-header-bottom-row',
				'padding'
			);

			// Header builder bottom area padding.
			$header_bottom_area_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$header_bottom_area_margin = get_theme_mod( 'elearning_header_bottom_area_margin', $header_bottom_area_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_bottom_area_margin_default,
				$header_bottom_area_margin,
				'.tg-header-builder .tg-header-bottom-row',
				'margin'
			);

			// Header builder bottom border width.
			$header_bottom_area_border_width_default = array(
				'top'    => '0',
				'right'  => '0',
				'bottom' => '0',
				'left'   => '0',
				'unit'   => 'px',
			);

			$header_bottom_area_border_width = get_theme_mod( 'elearning_header_bottom_area_border_width', $header_bottom_area_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_bottom_area_border_width_default,
				$header_bottom_area_border_width,
				'.tg-header-builder .tg-header-bottom-row',
				'border-width'
			);

			// Header builder bottom border color.
			$header_bottom_area_border_color     = get_theme_mod( 'elearning_header_bottom_area_border_color', '' );
			$header_bottom_area_border_color_css = array(
				'.tg-header-builder .tg-header-bottom-row' => array(
					'border-color' => esc_html( $header_bottom_area_border_color ),
				),
			);
			$parse_builder_css                  .= elearning_parse_css( '', $header_bottom_area_border_color, $header_bottom_area_border_color_css );

			// Header builder bottom area color.
			$header_bottom_area_color     = get_theme_mod( 'elearning_header_bottom_area_color', '' );
			$header_bottom_area_color_css = array(
				'.tg-header-builder .tg-header-bottom-row' => array(
					'color' => esc_html( $header_bottom_area_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_bottom_area_color, $header_bottom_area_color_css );

			// Header builder menu border.
			$header_menu_border_bottom_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_menu_border_bottom = get_theme_mod( 'elearning_header_menu_border_bottom_width', $header_menu_border_bottom_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_menu_border_bottom_default,
				$header_menu_border_bottom,
				'.tg-header-builder .tg-main-nav',
				'border-bottom-width'
			);

			// Header builder secondary menu border.
			$header_secondary_menu_border_bottom_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_secondary_menu_border_bottom = get_theme_mod( 'elearning_header_secondary_menu_border_bottom_width', $header_secondary_menu_border_bottom_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_secondary_menu_border_bottom_default,
				$header_secondary_menu_border_bottom,
				'.tg-header-builder .tg-secondary-nav',
				'border-bottom-width'
			);

			// Header builder tertiary menu border bottom.
			$header_tertiary_menu_border_bottom_default = array(
				'size' => '',
				'unit' => 'px',
			);
			$header_tertiary_menu_border_bottom         = get_theme_mod( 'elearning_header_tertiary_menu_border_bottom_width', $header_tertiary_menu_border_bottom_default );
			$parse_builder_css                         .= elearning_parse_slider_css(
				$header_tertiary_menu_border_bottom_default,
				$header_tertiary_menu_border_bottom,
				'.tg-header-builder .tg-tertiary-nav',
				'border-bottom-width'
			);

			// Header builder primary menu border bottom.
			$header_menu_border_bottom_color     = get_theme_mod( 'elearning_header_menu_border_bottom_color', '#e9ecef' );
			$header_menu_border_bottom_color_css = array(
				'.tg-header-builder .tg-main-nav' => array(
					'border-bottom-color' => esc_html( $header_menu_border_bottom_color ),
				),
			);
			$parse_builder_css                  .= elearning_parse_css( '#e9ecef', $header_menu_border_bottom_color, $header_menu_border_bottom_color_css );

			// Header builder secondary menu border bottom.
			$header_secondary_menu_border_bottom_color     = get_theme_mod( 'elearning_header_secondary_menu_border_bottom_color', '#e9ecef' );
			$header_secondary_menu_border_bottom_color_css = array(
				'.tg-header-builder .tg-secondary-nav' => array(
					'border-bottom-color' => esc_html( $header_secondary_menu_border_bottom_color ),
				),
			);
			$parse_builder_css                            .= elearning_parse_css( '#e9ecef', $header_secondary_menu_border_bottom_color, $header_secondary_menu_border_bottom_color_css );

			// Header builder tertiary menu border bottom.
			$header_tertiary_menu_border_bottom_color     = get_theme_mod( 'elearning_header_tertiary_menu_border_bottom_color', '#e9ecef' );
			$header_tertiary_menu_border_bottom_color_css = array(
				'.tg-header-builder .tg-tertiary-menu' => array(
					'border-bottom-color' => esc_html( $header_tertiary_menu_border_bottom_color ),
				),
			);
			$parse_builder_css                           .= elearning_parse_css( '#e9ecef', $header_tertiary_menu_border_bottom_color, $header_tertiary_menu_border_bottom_color_css );

			// Header builder primary menu item color.
			$header_menu_item_color_normal     = get_theme_mod( 'elearning_header_main_menu_color', '' );
			$header_menu_item_color_normal_css = array(
				'.tg-header-builder .tg-primary-nav ul li > a, .tg-header-builder .tg-main-nav.tg-primary-nav ul.tg-primary-menu > li > a, .tg-header-builder .tg-primary-nav.tg-menu-item--layout-2 > ul > li > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_menu_item_color_normal ),
				),
				'.tg-header-builder .tg-primary-nav ul li > a .tg-icon, .tg-header-builder .tg-main-nav.tg-primary-nav ul.tg-primary-menu li .tg-icon, .tg-header-builder .tg-primary-nav.tg-menu-item--layout-2 > ul > li > .tg-icon' => array(
					'fill' => esc_html( $header_menu_item_color_normal ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $header_menu_item_color_normal, $header_menu_item_color_normal_css );

			// Header builder secondary menu item color.
			$header_secondary_menu_item_color_normal     = get_theme_mod( 'elearning_header_secondary_menu_color', '' );
			$header_secondary_menu_item_color_normal_css = array(
				'.tg-header-builder .tg-secondary-nav > ul > li > a, .tg-header-builder .tg-main-nav.tg-secondary-nav ul.tg-secondary-menu > li > a, .tg-header-builder .tg-secondary-nav.tg-menu-item--layout-2 > ul > li > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_secondary_menu_item_color_normal ),
				),
				'.tg-header-builder .tg-secondary-nav > ul > li > a .tg-icon, .tg-header-builder .tg-main-nav.tg-secondary-nav ul.tg-secondary-menu li .tg-icon, .tg-header-builder .tg-secondary-nav.tg-menu-item--layout-2 > ul > li > .tg-icon' => array(
					'fill' => esc_html( $header_secondary_menu_item_color_normal ),
				),
			);
			$parse_builder_css                          .= elearning_parse_css( '', $header_secondary_menu_item_color_normal, $header_secondary_menu_item_color_normal_css );

			// Header builder tertiary menu item color.
			$header_tertiary_menu_item_color_normal     = get_theme_mod( 'elearning_header_tertiary_menu_color', '' );
			$header_tertiary_menu_item_color_normal_css = array(
				'.tg-header-builder .tg-tertiary-nav ul li > a, .tg-header-builder .tg-main-nav.tg-tertiary-nav ul.tg-tertiary-menu > li > a, .tg-header-builder .tg-tertiary-nav.tg-menu-item--layout-2 > ul > li > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_tertiary_menu_item_color_normal ),
				),
				'.tg-header-builder .tg-tertiary-nav ul li > a .tg-icon, .tg-header-builder .tg-main-nav.tg-tertiary-nav ul.tg-tertiary-menu li .tg-icon, .tg-header-builder .tg-tertiary-nav.tg-menu-item--layout-2 > ul > li > .tg-icon' => array(
					'fill' => esc_html( $header_tertiary_menu_item_color_normal ),
				),
			);
			$parse_builder_css                         .= elearning_parse_css( '', $header_tertiary_menu_item_color_normal, $header_tertiary_menu_item_color_normal_css );

			// Header builder quaternary menu item color.
			$header_quaternary_menu_item_color_normal     = get_theme_mod( 'elearning_header_quaternary_menu_color', '' );
			$header_quaternary_menu_item_color_normal_css = array(
				'.tg-header-builder .tg-quaternary-nav ul li > a, .tg-header-builder .tg-main-nav.tg-quaternary-nav ul.tg-quaternary-menu > li > a, .tg-header-builder .tg-quaternary-nav.tg-menu-item--layout-2 > ul > li > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_quaternary_menu_item_color_normal ),
				),
				'.tg-header-builder .tg-quaternary-nav ul li > a .tg-icon, .tg-header-builder .tg-main-nav.tg-quaternary-nav ul.tg-quaternary-menu li .tg-icon, .tg-header-builder .tg-quaternary-nav.tg-menu-item--layout-2 > ul > li > .tg-icon' => array(
					'fill' => esc_html( $header_quaternary_menu_item_color_normal ),
				),
			);
			$parse_builder_css                           .= elearning_parse_css( '', $header_quaternary_menu_item_color_normal, $header_quaternary_menu_item_color_normal_css );

			// Header builder primary menu item hover color.
			$header_menu_item_color_hover     = get_theme_mod( 'elearning_header_main_menu_hover_color', '' );
			$header_menu_item_color_hover_css = array(
				'.tg-header-builder .tg-primary-nav ul li:hover > a, .tg-header-builder .tg-primary-nav.tg-menu-item--layout-2 > ul > li:hover > a, .tg-header-builder .tg-primary-nav ul li:hover > a, .tg-header-builder .tg-main-nav.tg-primary-nav ul.tg-primary-menu li:hover > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_menu_item_color_hover ),
				),
				'.tg-header-builder .tg-primary-nav ul li:hover > a .tg-icon, .tg-header-builder .tg-main-nav.tg-primary-nav ul.tg-primary-menu li:hover .tg-icon, .tg-header-builder .tg-primary-nav.tg-menu-item--layout-2 > ul > li:hover > .tg-icon' => array(
					'fill' => esc_html( $header_menu_item_color_hover ),
				),
			);
			$parse_builder_css               .= elearning_parse_css( '', $header_menu_item_color_hover, $header_menu_item_color_hover_css );

			// Header builder secondary menu item hover color.
			$header_secondary_menu_item_color_hover     = get_theme_mod( 'elearning_header_secondary_menu_hover_color', '' );
			$header_secondary_menu_item_color_hover_css = array(
				'.tg-header-builder .tg-secondary-nav ul li:hover > a, .tg-header-builder .tg-secondary-nav.tg-menu-item--layout-2 > ul > li:hover > a, .tg-header-builder .tg-secondary-nav ul li:hover > a, .tg-header-builder .tg-main-nav.tg-secondary-nav ul.tg-secondary-menu li:hover > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_secondary_menu_item_color_hover ),
				),
				'.tg-header-builder .tg-secondary-nav ul li:hover > a .tg-icon, .tg-header-builder .tg-main-nav.tg-secondary-nav ul.tg-secondary-menu li:hover .tg-icon, .tg-header-builder .tg-secondary-nav.tg-menu-item--layout-2 > ul > li:hover > .tg-icon' => array(
					'fill' => esc_html( $header_secondary_menu_item_color_hover ),
				),
			);
			$parse_builder_css                         .= elearning_parse_css( '', $header_secondary_menu_item_color_hover, $header_secondary_menu_item_color_hover_css );

			// Header builder tertiary menu item hover color.
			$header_tertiary_menu_item_color_hover     = get_theme_mod( 'elearning_header_tertiary_menu_hover_color', '' );
			$header_tertiary_menu_item_color_hover_css = array(
				'.tg-header-builder .tg-tertiary-nav ul li:hover > a, .tg-header-builder .tg-tertiary-nav.tg-menu-item--layout-2 > ul > li:hover > a, .tg-header-builder .tg-tertiary-nav ul li:hover > a, .tg-header-builder .tg-main-nav.tg-tertiary-nav ul.tg-tertiary-menu li:hover > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_tertiary_menu_item_color_hover ),
				),
				'.tg-header-builder .tg-tertiary-nav ul li:hover > a .tg-icon, .tg-header-builder .tg-main-nav.tg-tertiary-nav ul.tg-tertiary-menu li:hover .tg-icon, .tg-header-builder .tg-tertiary-nav.tg-menu-item--layout-2 > ul > li:hover > .tg-icon' => array(
					'fill' => esc_html( $header_tertiary_menu_item_color_hover ),
				),
			);
			$parse_builder_css                        .= elearning_parse_css( '', $header_tertiary_menu_item_color_hover, $header_tertiary_menu_item_color_hover_css );

			// Header builder quaternary menu item hover color.
			$header_quaternary_menu_item_color_hover     = get_theme_mod( 'elearning_header_quaternary_menu_hover_color', '' );
			$header_quaternary_menu_item_color_hover_css = array(
				'.tg-header-builder .tg-quaternary-nav ul li:hover > a, .tg-header-builder .tg-quaternary-nav.tg-menu-item--layout-2 > ul > li:hover > a, .tg-header-builder .tg-quaternary-nav ul li:hover > a, .tg-header-builder .tg-main-nav.tg-quaternary-nav ul.tg-quaternary-menu li:hover > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_quaternary_menu_item_color_hover ),
				),
				'.tg-header-builder .tg-quaternary-nav ul li:hover > a .tg-icon, .tg-header-builder .tg-main-nav.tg-quaternary-nav ul.tg-quaternary-menu li:hover .tg-icon, .tg-header-builder .tg-quaternary-nav.tg-menu-item--layout-2 > ul > li:hover > .tg-icon' => array(
					'fill' => esc_html( $header_quaternary_menu_item_color_hover ),
				),
			);
			$parse_builder_css                          .= elearning_parse_css( '', $header_quaternary_menu_item_color_hover, $header_quaternary_menu_item_color_hover_css );

			// Header builder primary menu item active color.
			$header_menu_item_color_active     = get_theme_mod( 'elearning_header_main_menu_active_color', '' );
			$header_menu_item_color_active_css = array(
				'.tg-header-builder .tg-primary-menu > div ul li.current_page_item > a, .tg-header-builder .tg-primary-menu > div ul li.current-menu-item > a,.tg-header-builder .tg-primary-nav ul li:active > a, .tg-header-builder .tg-primary-nav ul > li:not(.tg-header-button).current_page_item > a, .tg-header-builder .tg-primary-nav ul > li:not(.tg-header-button).current_page_ancestor > a, .tg-header-builder .tg-primary-nav ul > li:not(.tg-header-button).current-menu-item > a, .tg-header-builder .tg-primary-nav ul > li:not(.tg-header-button).current-menu-ancestor > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_menu_item_color_active ),
				),
				'.tg-header-builder .tg-primary-nav ul li.current-menu-item > a .tg-icon, .tg-header-builder .tg-main-nav.tg-primary-nav ul.tg-primary-menu li.current-menu-item .tg-icon' => array(
					'fill' => esc_html( $header_menu_item_color_active ),
				),
				'.tg-header-builder .tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current_page_item > a::before, .tg-header-builder .tg-primary-menu.tg-primary-menu--style-underline > div > ul > li.current-menu-item > a::before' => array(
					'background' => esc_html( $header_menu_item_color_active ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $header_menu_item_color_active, $header_menu_item_color_active_css );

			// Header builder secondary menu item active color.
			$header_secondary_menu_item_color_active     = get_theme_mod( 'elearning_header_secondary_menu_active_color', '' );
			$header_secondary_menu_item_color_active_css = array(
				'.tg-header-builder .tg-secondary-nav ul li:active > a, .tg-header-builder .tg-secondary-nav ul > li:not(.tg-header-button).current_page_item > a, .tg-header-builder .tg-secondary-nav ul > li:not(.tg-header-button).current_page_ancestor > a, .tg-header-builder .tg-secondary-nav ul > li:not(.tg-header-button).current-menu-item > a, .tg-header-builder .tg-secondary-nav ul > li:not(.tg-header-button).current-menu-ancestor > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_secondary_menu_item_color_active ),
				),
				'.tg-header-builder .tg-secondary-nav ul li.current-menu-item > a .tg-icon, .tg-header-builder .tg-main-nav.tg-secondary-nav ul.tg-secondary-menu li.current-menu-item .tg-icon' => array(
					'fill' => esc_html( $header_secondary_menu_item_color_active ),
				),
			);
			$parse_builder_css                          .= elearning_parse_css( '', $header_secondary_menu_item_color_active, $header_secondary_menu_item_color_active_css );

			// Header builder tertiary menu item active color.
			$header_tertiary_menu_item_color_active     = get_theme_mod( 'elearning_header_tertiary_menu_active_color', '' );
			$header_tertiary_menu_item_color_active_css = array(
				'.tg-header-builder .tg-tertiary-nav ul li:active > a, .tg-header-builder .tg-tertiary-nav ul > li:not(.tg-header-button).current_page_item > a, .tg-header-builder .tg-tertiary-nav ul > li:not(.tg-header-button).current_page_ancestor > a, .tg-header-builder .tg-tertiary-nav ul > li:not(.tg-header-button).current-menu-item > a, .tg-header-builder .tg-tertiary-nav ul > li:not(.tg-header-button).current-menu-ancestor > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_tertiary_menu_item_color_active ),
				),
				'.tg-header-builder .tg-tertiary-nav ul li.current-menu-item > a .tg-icon, .tg-header-builder .tg-main-nav.tg-tertiary-nav ul.tg-tertiary-menu li.current-menu-item .tg-icon' => array(
					'fill' => esc_html( $header_tertiary_menu_item_color_active ),
				),
			);
			$parse_builder_css                         .= elearning_parse_css( '', $header_tertiary_menu_item_color_active, $header_tertiary_menu_item_color_active_css );

			// Header builder quaternary menu item active color.
			$header_quaternary_menu_item_color_active     = get_theme_mod( 'elearning_header_quaternary_menu_active_color', '' );
			$header_quaternary_menu_item_color_active_css = array(
				'.tg-header-builder .tg-quaternary-nav ul li:active > a, .tg-header-builder .tg-quaternary-nav ul > li:not(.tg-header-button).current_page_item > a, .tg-header-builder .tg-quaternary-nav ul > li:not(.tg-header-button).current_page_ancestor > a, .tg-header-builder .tg-quaternary-nav ul > li:not(.tg-header-button).current-menu-item > a, .tg-header-builder .tg-quaternary-nav ul > li:not(.tg-header-button).current-menu-ancestor > a'                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          => array(
					'color' => esc_html( $header_quaternary_menu_item_color_active ),
				),
				'.tg-header-builder .tg-quaternary-nav ul li.current-menu-item > a .tg-icon, .tg-header-builder .tg-main-nav.tg-quaternary-nav ul.tg-quaternary-menu li.current-menu-item .tg-icon' => array(
					'fill' => esc_html( $header_quaternary_menu_item_color_active ),
				),
			);
			$parse_builder_css                           .= elearning_parse_css( '', $header_quaternary_menu_item_color_active, $header_quaternary_menu_item_color_active_css );

			// Header builder primary menu typography.
			$header_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => 'regular',
				'font-size'      => array(
					'desktop' => array(
						'size' => '14',
						'unit' => 'px',
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
			);

			$header_menu_typography = get_theme_mod( 'elearning_header_main_menu_typography', $header_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_menu_typography_default,
				$header_menu_typography,
				'.tg-header-builder .tg-primary-nav ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder secondary menu typography.
			$header_secondary_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => 'regular',
				'font-size'      => array(
					'desktop' => array(
						'size' => '14',
						'unit' => 'px',
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
			);

			$header_secondary_menu_typography = get_theme_mod( 'elearning_header_secondary_menu_typography', $header_secondary_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_secondary_menu_typography_default,
				$header_secondary_menu_typography,
				'.tg-header-builder .tg-secondary-nav ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder tertiary menu typography.
			$header_tertiary_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => 'regular',
				'font-size'      => array(
					'desktop' => array(
						'size' => '14',
						'unit' => 'px',
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
			);

			$header_tertiary_menu_typography = get_theme_mod( 'elearning_header_tertiary_menu_typography', $header_tertiary_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_tertiary_menu_typography_default,
				$header_tertiary_menu_typography,
				'.tg-header-builder .tg-tertiary-nav ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder quaternary menu typography.
			$header_quaternary_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => 'regular',
				'font-size'      => array(
					'desktop' => array(
						'size' => '14',
						'unit' => 'px',
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
			);

			$header_quaternary_menu_typography = get_theme_mod( 'elearning_header_quaternary_menu_typography', $header_quaternary_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_quaternary_menu_typography_default,
				$header_quaternary_menu_typography,
				'.tg-header-builder .tg-quaternary-nav ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder primary sub menu typography.
			$header_sub_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '14',
						'unit' => 'px',
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
			);

			$header_sub_menu_typography = get_theme_mod( 'elearning_header_sub_menu_typography', $header_sub_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_sub_menu_typography_default,
				$header_sub_menu_typography,
				'.tg-header-builder .tg-primary-nav ul li ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder secondary sub menu typography.
			$header_secondary_sub_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '14',
						'unit' => 'px',
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
			);

			$header_secondary_sub_menu_typography = get_theme_mod( 'elearning_header_secondary_sub_menu_typography', $header_secondary_sub_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_secondary_sub_menu_typography_default,
				$header_secondary_sub_menu_typography,
				'.tg-header-builder .tg-primary-nav ul li ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder search icon color.
			$header_search_icon_color     = get_theme_mod( 'elearning_header_search_icon_color', '' );
			$header_search_icon_color_css = array(
				'.tg-header-builder .tg-header-search__toggle .tg-icon-search' => array(
					'color' => esc_html( $header_search_icon_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_search_icon_color, $header_search_icon_color_css );

			// Header builder search background.
			$header_search_background_default = array(
				'background-color'      => '',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$header_search_background         = get_theme_mod( 'elearning_header_search_background', $header_search_background_default );
			$parse_builder_css               .= elearning_parse_background_css( $header_search_background_default, $header_search_background, '.tg-header-builder .search-field' );

			// Header builder search text color.
			$header_search_text_color     = get_theme_mod( 'elearning_header_search_text_color', '' );
			$header_search_text_color_css = array(
				'.tg-header-builder .search-form .search-field, .tg-header-builder .search-form .search-field:focus' => array(
					'color' => esc_html( $header_search_text_color ),
				),
				'.tg-header-builder .tg-header-search__toggle .tg-icon-search' => array(
					'fill' => esc_html( $header_search_text_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_search_text_color, $header_search_text_color_css );

			// Header builder button text color.
			$header_button_text_color     = get_theme_mod( 'elearning_header_button_color', '#ffffff' );
			$header_button_text_color_css = array(
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button' => array(
					'color' => esc_html( $header_button_text_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '#ffffff', $header_button_text_color, $header_button_text_color_css );

			// Header builder button hover text color.
			$header_button_hover_text_color     = get_theme_mod( 'elearning_header_button_hover_color', '#ffffff' );
			$header_button_hover_text_color_css = array(
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button:hover' => array(
					'color' => esc_html( $header_button_hover_text_color ),
				),
			);
			$parse_builder_css                 .= elearning_parse_css( '#ffffff', $header_button_hover_text_color, $header_button_hover_text_color_css );

			// Header builder button background color.
			$header_button_background_color     = get_theme_mod( 'elearning_header_button_background_color', '#027abb' );
			$header_button_background_color_css = array(
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button' => array(
					'background-color' => esc_html( $header_button_background_color ),
				),
			);
			$parse_builder_css                 .= elearning_parse_css( '#027abb', $header_button_background_color, $header_button_background_color_css );

			// Header builder button hover background color.
			$header_button_background_hover_color     = get_theme_mod( 'elearning_header_button_background_hover_color', '' );
			$header_button_background_hover_color_css = array(
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button:hover' => array(
					'background-color' => esc_html( $header_button_background_hover_color ),
				),
			);
			$parse_builder_css                       .= elearning_parse_css( '#ffffff', $header_button_background_hover_color, $header_button_background_hover_color_css );

			// Header builder button padding.
			$header_button_padding_default = array(
				'top'    => '5',
				'right'  => '10',
				'bottom' => '5',
				'left'   => '10',
				'unit'   => 'px',
			);

			$header_button_padding = get_theme_mod( 'elearning_header_button_padding', $header_button_padding_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_button_padding_default,
				$header_button_padding,
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button',
				'padding'
			);

			// Header builder button border width.
			$header_button_border_width_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$header_button_border_width = get_theme_mod( 'elearning_header_button_border_width', $header_button_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_button_border_width_default,
				$header_button_border_width,
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button',
				'border-width'
			);

			// Header builder button border color.
			$header_button_border_color     = get_theme_mod( 'elearning_header_button_border_color', '' );
			$header_button_border_color_css = array(
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button' => array(
					'border-color' => esc_html( $header_button_border_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $header_button_border_color, $header_button_border_color_css );

			// Header builder button radius.
			$header_button_border_radius_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_button_border_radius = get_theme_mod( 'elearning_header_button_border_radius', $header_button_border_radius_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_button_border_radius_default,
				$header_button_border_radius,
				'.tg-header-builder .tg-header-buttons .tg-header-button .tg-button',
				'border-radius'
			);

			// Header builder html 1 color.
			$header_html_1_text_color     = get_theme_mod( 'elearning_header_html_1_text_color', '' );
			$header_html_1_text_color_css = array(
				'.tg-header-builder .tg-html-1' => array(
					'color' => esc_html( $header_html_1_text_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_html_1_text_color, $header_html_1_text_color_css );

			// Header builder html 1 link color.
			$header_html_1_link_color     = get_theme_mod( 'elearning_header_html_1_link_color', '' );
			$header_html_1_link_color_css = array(
				'.tg-header-builder .tg-html-1 a' => array(
					'color' => esc_html( $header_html_1_link_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_html_1_link_color, $header_html_1_link_color_css );

			// Header builder html 1 link hover color.
			$header_html_1_link_hover_color     = get_theme_mod( 'elearning_header_html_1_link_hover_color', '' );
			$header_html_1_link_hover_color_css = array(
				'.tg-header-builder .tg-html-1 a:hover' => array(
					'color' => esc_html( $header_html_1_link_hover_color ),
				),
			);
			$parse_builder_css                 .= elearning_parse_css( '', $header_html_1_link_hover_color, $header_html_1_link_hover_color_css );

			// Header builder html 1 font size.
			$header_html_1_font_size_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_html_1_font_size = get_theme_mod( 'elearning_header_html_1_font_size', $header_html_1_font_size_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_html_1_font_size_default,
				$header_html_1_font_size,
				'.tg-header-builder .tg-html-1 *',
				'font-size'
			);

			// Header builder html 1 margin.
			$header_html_1_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$header_html_1_margin = get_theme_mod( 'elearning_header_html_1_margin', $header_html_1_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_html_1_margin_default,
				$header_html_1_margin,
				'.tg-header-builder .tg-html-1',
				'margin'
			);

			// Header builder html 2 color.
			$header_html_2_text_color     = get_theme_mod( 'elearning_header_html_2_text_color', '' );
			$header_html_2_text_color_css = array(
				'.tg-header-builder .tg-html-2' => array(
					'color' => esc_html( $header_html_2_text_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_html_2_text_color, $header_html_2_text_color_css );

			// Header builder html 2 link color.
			$header_html_2_link_color     = get_theme_mod( 'elearning_header_html_2_link_color', '' );
			$header_html_2_link_color_css = array(
				'.tg-header-builder .tg-html-2 a' => array(
					'color' => esc_html( $header_html_2_link_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_html_2_link_color, $header_html_2_link_color_css );

			// Header builder html 2 link hover color.
			$header_html_2_link_hover_color     = get_theme_mod( 'elearning_header_html_2_link_hover_color', '' );
			$header_html_2_link_hover_color_css = array(
				'.tg-header-builder .tg-html-2 a:hover' => array(
					'color' => esc_html( $header_html_2_link_hover_color ),
				),
			);
			$parse_builder_css                 .= elearning_parse_css( '', $header_html_2_link_hover_color, $header_html_2_link_hover_color_css );

			// Header builder html 2 font size.
			$header_html_2_font_size_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_html_2_font_size = get_theme_mod( 'elearning_header_html_2_font_size', $header_html_2_font_size_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_html_2_font_size_default,
				$header_html_2_font_size,
				'.tg-header-builder .tg-html-2 p',
				'font-size'
			);

			// Header builder html 2 margin.
			$header_html_2_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$header_html_2_margin = get_theme_mod( 'elearning_header_html_2_margin', $header_html_2_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_html_2_margin_default,
				$header_html_2_margin,
				'.tg-header-builder .tg-html-2',
				'margin'
			);

			// Footer builder top area container.
			$footer_top_area_container_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_top_area_container = get_theme_mod( 'elearning_footer_top_area_container', $footer_top_area_container_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_top_area_container_default,
				$footer_top_area_container,
				'.tg-footer-builder .tg-footer-top-row .tg-container',
				'max-width'
			);

			// Footer builder top area height.
			$footer_top_area_height_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_top_area_height = get_theme_mod( 'elearning_footer_top_area_height', $footer_top_area_height_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_top_area_height_default,
				$footer_top_area_height,
				'.tg-footer-builder .tg-top-row',
				'height'
			);

			// Footer top area background.
			$footer_top_area_background_default = array(
				'background-color'      => '',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_top_area_background         = get_theme_mod( 'elearning_footer_top_area_background', $footer_top_area_background_default );
			$parse_builder_css                 .= elearning_parse_background_css( $footer_top_area_background_default, $footer_top_area_background, '.tg-footer-builder .tg-footer-top-row' );

			// Footer top area padding.
			$footer_top_area_padding_default = array(
				'top'    => '20',
				'right'  => '',
				'bottom' => '20',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_top_area_padding = get_theme_mod( 'elearning_footer_top_area_padding', $footer_top_area_padding_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_top_area_padding_default,
				$footer_top_area_padding,
				'.tg-footer-builder .tg-footer-top-row',
				'padding'
			);

			// Footer top area margin.
			$footer_top_area_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_top_area_margin = get_theme_mod( 'elearning_footer_top_area_margin', $footer_top_area_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_top_area_margin_default,
				$footer_top_area_margin,
				'.tg-footer-builder .tg-footer-top-row',
				'margin'
			);

			// Footer top area border width.
			$footer_top_area_border_width_default = array(
				'top'    => '0',
				'right'  => '0',
				'bottom' => '0',
				'left'   => '0',
				'unit'   => 'px',
			);

			$footer_top_area_border_width = get_theme_mod( 'elearning_footer_top_area_border_width', $footer_top_area_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_top_area_border_width_default,
				$footer_top_area_border_width,
				'.tg-footer-builder .tg-footer-top-row',
				'border-width'
			);

			// Footer builder top area border color.
			$footer_top_area_border_color     = get_theme_mod( 'elearning_footer_top_area_border_color', '' );
			$footer_top_area_border_color_css = array(
				'.tg-footer-builder .tg-footer-top-row' => array(
					'border-color' => esc_html( $footer_top_area_border_color ),
				),
			);
			$parse_builder_css               .= elearning_parse_css( '', $footer_top_area_border_color, $footer_top_area_border_color_css );

			// Footer builder main area height.
			$footer_main_area_height_default = array(

				'size' => '',
				'unit' => 'px',
			);

			$footer_main_area_height = get_theme_mod( 'elearning_footer_main_area_height', $footer_main_area_height_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_main_area_height_default,
				$footer_main_area_height,
				'.tg-footer-builder .tg-main-row',
				'height'
			);

			// Footer builder main area container.
			$footer_main_area_container_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_main_area_container = get_theme_mod( 'elearning_footer_main_area_container', $footer_main_area_container_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_main_area_container_default,
				$footer_main_area_container,
				'.tg-footer-builder .tg-footer-main-row .tg-container',
				'max-width'
			);

			// Footer builder main area background.
			$footer_main_area_background_default = array(
				'background-color'      => '',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_main_area_background         = get_theme_mod( 'elearning_footer_main_area_background', $footer_main_area_background_default );
			$parse_builder_css                  .= elearning_parse_background_css( $footer_main_area_background_default, $footer_main_area_background, '.tg-footer-builder .tg-footer-main-row' );

			// Footer builder main area padding.
			$footer_main_area_padding_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_main_area_padding = get_theme_mod( 'elearning_footer_main_area_padding', $footer_main_area_padding_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_main_area_padding_default,
				$footer_main_area_padding,
				'.tg-footer-builder .tg-footer-main-row',
				'padding'
			);

			// Footer builder main area margin.
			$footer_main_area_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_main_area_margin = get_theme_mod( 'elearning_footer_main_area_margin', $footer_main_area_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_main_area_margin_default,
				$footer_main_area_margin,
				'.tg-footer-builder .tg-footer-main-row',
				'margin'
			);

			// Footer builder main area border width.
			$footer_main_area_border_width_default = array(
				'top'    => '0',
				'right'  => '0',
				'bottom' => '0',
				'left'   => '0',
				'unit'   => 'px',
			);

			$footer_main_area_border_width = get_theme_mod( 'elearning_footer_main_area_border_width', $footer_main_area_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_main_area_border_width_default,
				$footer_main_area_border_width,
				'.tg-footer-builder .tg-footer-main-row',
				'border-width'
			);

			// Footer builder main area border color.
			$footer_main_area_border_color     = get_theme_mod( 'elearning_footer_main_area_border_color', '' );
			$footer_main_area_border_color_css = array(
				'.tg-footer-builder .tg-footer-main-row' => array(
					'border-color' => esc_html( $footer_main_area_border_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $footer_main_area_border_color, $footer_main_area_border_color_css );

			// Footer builder bottom area height.
			$footer_bottom_area_height_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_bottom_area_height = get_theme_mod( 'elearning_footer_bottom_area_height', $footer_bottom_area_height_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_bottom_area_height_default,
				$footer_bottom_area_height,
				'.tg-footer-builder .tg-bottom-row',
				'height'
			);

			// Footer builder bottom area container.
			$footer_bottom_area_container_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_bottom_area_container = get_theme_mod( 'elearning_footer_bottom_area_container', $footer_bottom_area_container_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_bottom_area_container_default,
				$footer_bottom_area_container,
				'.tg-footer-builder .tg-footer-bottom-row .tg-container',
				'max-width'
			);

			// Footer builder bottom area background.
			$footer_bottom_area_background_default = array(
				'background-color'      => 'var(--elearning-color-3, #FFFFFF)',
				'background-image'      => '',
				'background-repeat'     => 'repeat',
				'background-position'   => 'center center',
				'background-size'       => 'contain',
				'background-attachment' => 'scroll',
			);
			$footer_bottom_area_background         = get_theme_mod( 'elearning_footer_bottom_area_background', $footer_bottom_area_background_default );
			$parse_builder_css                    .= elearning_parse_background_css( $footer_bottom_area_background_default, $footer_bottom_area_background, '.tg-footer-builder .tg-footer-bottom-row' );

			// Footer builder bottom area padding.
			$footer_bottom_area_padding_default = array(
				'top'    => '24',
				'right'  => '0',
				'bottom' => '24',
				'left'   => '0',
				'unit'   => 'px',
			);

			$footer_bottom_area_padding = get_theme_mod( 'elearning_footer_bottom_area_padding', $footer_bottom_area_padding_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_bottom_area_padding_default,
				$footer_bottom_area_padding,
				'.tg-footer-builder .tg-footer-bottom-row',
				'padding'
			);

			// Footer builder bottom area margin.
			$footer_bottom_area_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_bottom_area_margin = get_theme_mod( 'elearning_footer_bottom_area_margin', $footer_bottom_area_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_bottom_area_margin_default,
				$footer_bottom_area_margin,
				'.tg-footer-builder .tg-footer-bottom-row',
				'margin'
			);

			// Footer builder bottom area border width.
			$footer_bottom_area_border_width_default = array(
				'top'    => '1',
				'right'  => '0',
				'bottom' => '0',
				'left'   => '0',
				'unit'   => 'px',
			);

			$footer_bottom_area_border_width = get_theme_mod( 'elearning_footer_bottom_area_border_width', $footer_bottom_area_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_bottom_area_border_width_default,
				$footer_bottom_area_border_width,
				'.tg-footer-builder .tg-footer-bottom-row',
				'border-width'
			);

			$footer_bottom_area_border_color     = get_theme_mod( 'elearning_footer_bottom_area_border_color', '#3F3F46' );
			$footer_bottom_area_border_color_css = array(
				'.tg-footer-builder .tg-footer-bottom-row' => array(
					'border-color' => esc_html( $footer_bottom_area_border_color ),
				),
			);
			$parse_builder_css                  .= elearning_parse_css( '#3F3F46', $footer_bottom_area_border_color, $footer_bottom_area_border_color_css );

			// Header builder mobile menu item text color.
			$header_mobile_menu_item_text_color     = get_theme_mod( 'elearning_header_mobile_menu_item_color', '' );
			$header_mobile_menu_item_text_color_css = array(
				'.tg-mobile-nav a' => array(
					'color' => esc_html( $header_mobile_menu_item_text_color ),
				),
				'.tg-mobile-nav li.page_item_has_children .tg-submenu-toggle .tg-icon, .tg-mobile-nav li.menu-item-has-children .tg-submenu-toggle .tg-icon' => array(
					'fill' => esc_html( $header_mobile_menu_item_text_color ),
				),
			);
			$parse_builder_css                     .= elearning_parse_css( '', $header_mobile_menu_item_text_color, $header_mobile_menu_item_text_color_css );

			// Header builder mobile menu item text hover color.
			$header_mobile_menu_item_hover_color     = get_theme_mod( 'elearning_header_mobile_menu_item_hover_color', '' );
			$header_mobile_menu_item_hover_color_css = array(
				'.tg-mobile-nav li:hover > a' => array(
					'color' => esc_html( $header_mobile_menu_item_hover_color ),
				),
			);
			$parse_builder_css                      .= elearning_parse_css( '', $header_mobile_menu_item_hover_color, $header_mobile_menu_item_hover_color_css );

			// Header builder mobile menu item text active color.
			$header_mobile_menu_item_active_color     = get_theme_mod( 'elearning_header_mobile_menu_item_active_color', '' );
			$header_mobile_menu_item_active_color_css = array(
				'.tg-mobile-nav .current_page_item a, .tg-mobile-nav > .menu ul li.current-menu-item > a' => array(
					'color' => esc_html( $header_mobile_menu_item_active_color ),
				),
			);
			$parse_builder_css                       .= elearning_parse_css( '', $header_mobile_menu_item_active_color, $header_mobile_menu_item_active_color_css );

			// Header builder mobile menu background color.
			$header_mobile_menu_background_color     = get_theme_mod( 'elearning_header_mobile_menu_background', '' );
			$header_mobile_menu_background_color_css = array(
				'.tg-mobile-nav, .search-form .search-field,.tg-mobile-navigation' => array(
					'background-color' => esc_html( $header_mobile_menu_background_color ),
				),
			);
			$parse_builder_css                      .= elearning_parse_css( '', $header_mobile_menu_background_color, $header_mobile_menu_background_color_css );

			// Header builder mobile menu item border bottom.
			$header_mobile_menu_item_border_bottom_default = array(
				'size' => 1,
				'unit' => 'px',
			);

			$header_mobile_menu_item_border_bottom = get_theme_mod( 'elearning_header_mobile_menu_item_border_bottom', $header_mobile_menu_item_border_bottom_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_mobile_menu_item_border_bottom_default,
				$header_mobile_menu_item_border_bottom,
				'.tg-mobile-nav li:not(:last-child)',
				'border-bottom-width'
			);

			// Header builer mobile menu item border bottom style.
			$header_mobile_menu_item_border_bottom_style     = get_theme_mod( 'elearning_header_mobile_menu_item_border_bottom_style', 'solid' );
			$header_mobile_menu_item_border_bottom_style_css = array(
				'.tg-mobile-nav li' => array(
					'border-bottom-style' => esc_html( $header_mobile_menu_item_border_bottom_style ),
				),
			);
			$parse_builder_css                              .= elearning_parse_css( 'solid', $header_mobile_menu_item_border_bottom_style, $header_mobile_menu_item_border_bottom_style_css );

			// Header builder mobile menu item border bottom color.
			$header_mobile_menu_item_border_bottom_color     = get_theme_mod( 'elearning_header_mobile_menu_item_border_bottom_color', '' );
			$header_mobile_menu_item_border_bottom_color_css = array(
				'.tg-mobile-nav li' => array(
					'border-color' => esc_html( $header_mobile_menu_item_border_bottom_color ),
				),
			);
			$parse_builder_css                              .= elearning_parse_css( '', $header_mobile_menu_item_border_bottom_color, $header_mobile_menu_item_border_bottom_color_css );

			// Header builder mobile menu typography.
			$header_mobile_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
						'unit' => 'rem',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '1.6',
						'unit' => 'rem',
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
						'size' => '1.8',
						'unit' => '-',
					),
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);

			$header_mobile_menu_typography = get_theme_mod( 'elearning_header_mobile_menu_typography', $header_mobile_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_mobile_menu_typography_default,
				$header_mobile_menu_typography,
				'.tg-mobile-menu a',
				array(
					'mobile' => 600,
					'tablet' => 768,
				)
			);

			// Header builder widget title color.
			$header_widget_title_color     = get_theme_mod( 'elearning_widget_1_title_color', '' );
			$header_widget_title_color_css = array(
				'.tg-header-builder .widget.widget-header-top-left-sidebar .widget-title' => array(
					'color' => esc_html( $header_widget_title_color ),
				),
			);
			$parse_builder_css            .= elearning_parse_css( '', $header_widget_title_color, $header_widget_title_color_css );

			// Header builder widget content color.
			$header_widget_content_color     = get_theme_mod( 'elearning_widget_1_content_color', '' );
			$header_widget_content_color_css = array(
				'.tg-header-builder .widget.widget-header-top-left-sidebar' => array(
					'color' => esc_html( $header_widget_content_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $header_widget_content_color, $header_widget_content_color_css );

			// Header builder widget link color.
			$header_widget_link_color     = get_theme_mod( 'elearning_widget_1_link_color', '' );
			$header_widget_link_color_css = array(
				'.tg-header-builder .widget.widget-header-top-left-sidebar a' => array(
					'color' => esc_html( $header_widget_link_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $header_widget_link_color, $header_widget_link_color_css );

			// Header builder widget title typography.
			$header_widget_1_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);

			$header_widget_1_title_typography = get_theme_mod( 'elearning_widget_1_title_typography', $header_widget_1_title_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_widget_1_title_typography_default,
				$header_widget_1_title_typography,
				'.tg-header-builder .widget.widget-header-top-left-sidebar .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder widget content typography.
			$header_widget_1_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);

			$header_widget_1_content_typography = get_theme_mod( 'elearning_widget_1_content_typography', $header_widget_1_content_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_widget_1_content_typography_default,
				$header_widget_1_content_typography,
				'.tg-header-builder .widget.widget-header-top-left-sidebar',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder widget 2 title color.
			$header_widget_2_title_color     = get_theme_mod( 'elearning_widget_2_title_color', '' );
			$header_widget_2_title_color_css = array(
				'.tg-header-builder .widget.widget-header-top-right-sidebar .widget-title' => array(
					'color' => esc_html( $header_widget_2_title_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $header_widget_2_title_color, $header_widget_2_title_color_css );

			// Header builder widget 2 content color.
			$header_widget_2_content_color     = get_theme_mod( 'elearning_widget_2_content_color', '' );
			$header_widget_2_content_color_css = array(
				'.tg-header-builder .widget.widget-header-top-right-sidebar' => array(
					'color' => esc_html( $header_widget_2_content_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $header_widget_2_content_color, $header_widget_2_content_color_css );

			// Header builder widget 2 link color.
			$header_widget_2_link_color     = get_theme_mod( 'elearning_widget_2_link_color', '' );
			$header_widget_2_link_color_css = array(
				'.tg-header-builder .widget.widget-header-top-right-sidebar a' => array(
					'color' => esc_html( $header_widget_2_link_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $header_widget_2_link_color, $header_widget_2_link_color_css );

			// Header builder widget title typography.
			$header_widget_2_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);

			$header_widget_2_title_typography = get_theme_mod( 'elearning_widget_2_title_typography', $header_widget_2_title_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_widget_2_title_typography_default,
				$header_widget_2_title_typography,
				'.tg-header-builder .widget.widget-header-top-right-sidebar .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder widget content typography.
			$header_widget_2_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);

			$header_widget_2_content_typography = get_theme_mod( 'elearning_widget_2_content_typography', $header_widget_2_content_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_widget_2_content_typography_default,
				$header_widget_2_content_typography,
				'.tg-header-builder .widget.widget-header-top-right-sidebar',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder html 1 color.
			$footer_html_1_text_color     = get_theme_mod( 'elearning_footer_html_1_text_color', '' );
			$footer_html_1_text_color_css = array(
				'.tg-footer-builder .tg-html-1 *' => array(
					'color' => esc_html( $footer_html_1_text_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $footer_html_1_text_color, $footer_html_1_text_color_css );

			// Footer builder html 1 link color.
			$footer_html_1_link_color     = get_theme_mod( 'elearning_footer_html_1_link_color', '' );
			$footer_html_1_link_color_css = array(
				'.tg-footer-builder .tg-html-1 a' => array(
					'color' => esc_html( $footer_html_1_link_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $footer_html_1_link_color, $footer_html_1_link_color_css );

			// Footer builder html 1 link hover color.
			$footer_html_1_link_hover_color     = get_theme_mod( 'elearning_footer_html_1_link_hover_color', '' );
			$footer_html_1_link_hover_color_css = array(
				'.tg-footer-builder .tg-html-1 a:hover' => array(
					'color' => esc_html( $footer_html_1_link_hover_color ),
				),
			);
			$parse_builder_css                 .= elearning_parse_css( '', $footer_html_1_link_hover_color, $footer_html_1_link_hover_color_css );

			// Footer builder html 1 font size.
			$footer_html_1_font_size_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_html_1_font_size = get_theme_mod( 'elearning_footer_html_1_font_size', $footer_html_1_font_size_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_html_1_font_size_default,
				$footer_html_1_font_size,
				'.tg-footer-builder .tg-html-1 *',
				'font-size'
			);

			// Footer builder html 1 margin.
			$footer_html_1_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_html_1_margin = get_theme_mod( 'elearning_footer_html_1_margin', $footer_html_1_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_html_1_margin_default,
				$footer_html_1_margin,
				'.tg-footer-builder .tg-html-1',
				'margin'
			);

			// Footer builder html 1 color.
			$footer_html_2_text_color     = get_theme_mod( 'elearning_footer_html_2_text_color', '' );
			$footer_html_2_text_color_css = array(
				'.tg-footer-builder .tg-html-2 *' => array(
					'color' => esc_html( $footer_html_2_text_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $footer_html_2_text_color, $footer_html_2_text_color_css );

			// Footer builder html 1 link color.
			$footer_html_2_link_color     = get_theme_mod( 'elearning_footer_html_2_link_color', '' );
			$footer_html_2_link_color_css = array(
				'.tg-footer-builder .tg-html-2 a' => array(
					'color' => esc_html( $footer_html_2_link_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $footer_html_2_link_color, $footer_html_2_link_color_css );

			// Footer builder html 1 link hover color.
			$footer_html_2_link_hover_color     = get_theme_mod( 'elearning_footer_html_2_link_hover_color', '' );
			$footer_html_2_link_hover_color_css = array(
				'.tg-footer-builder .tg-html-2 a:hover' => array(
					'color' => esc_html( $footer_html_2_link_hover_color ),
				),
			);
			$parse_builder_css                 .= elearning_parse_css( '', $footer_html_2_link_hover_color, $footer_html_2_link_hover_color_css );

			// Footer builder html 1 font size.
			$footer_html_2_font_size_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_html_2_font_size = get_theme_mod( 'elearning_footer_html_2_font_size', $footer_html_2_font_size_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_html_2_font_size_default,
				$footer_html_2_font_size,
				'.tg-footer-builder .tg-html-2 *',
				'font-size'
			);

			// Footer builder html 1 margin.
			$footer_html_2_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_html_2_margin = get_theme_mod( 'elearning_footer_html_2_margin', $footer_html_2_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_html_2_margin_default,
				$footer_html_2_margin,
				'.tg-footer-builder .tg-html-2',
				'margin'
			);

			// Footer builder widget title color.
			$footer_widget_title_color     = get_theme_mod( 'elearning_footer_widget_1_title_color', '' );
			$footer_widget_title_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-1 .widget-title' => array(
					'color' => esc_html( $footer_widget_title_color ),
				),
			);
			$parse_builder_css            .= elearning_parse_css( '', $footer_widget_title_color, $footer_widget_title_color_css );

			// Footer builder widget content color.
			$footer_widget_content_color     = get_theme_mod( 'elearning_footer_widget_1_content_color', '' );
			$footer_widget_content_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-1' => array(
					'color' => esc_html( $footer_widget_content_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_widget_content_color, $footer_widget_content_color_css );

			// Footer builder widget link color.
			$footer_widget_link_color     = get_theme_mod( 'elearning_footer_widget_1_link_color', '' );
			$footer_widget_link_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-1 a' => array(
					'color' => esc_html( $footer_widget_link_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $footer_widget_link_color, $footer_widget_link_color_css );

			// Footer builder widget title typography.
			$footer_widget_1_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);
			$footer_widget_1_title_typography         = get_theme_mod( 'elearning_footer_widget_1_title_typography', $footer_widget_1_title_typography_default );
			$parse_builder_css                       .= elearning_parse_typography_css(
				$footer_widget_1_title_typography_default,
				$footer_widget_1_title_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-1 .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget content typography.
			$footer_widget_1_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);
			$footer_widget_1_content_typography         = get_theme_mod( 'elearning_footer_widget_1_content_typography', $footer_widget_1_content_typography_default );
			$parse_builder_css                         .= elearning_parse_typography_css(
				$footer_widget_1_content_typography_default,
				$footer_widget_1_content_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-1',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 2 title color.
			$footer_widget_2_title_color     = get_theme_mod( 'elearning_footer_widget_2_title_color', '' );
			$footer_widget_2_title_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-2 .widget-title' => array(
					'color' => esc_html( $footer_widget_2_title_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_widget_2_title_color, $footer_widget_2_title_color_css );

			// Footer builder widget 2 content color.
			$footer_widget_2_content_color     = get_theme_mod( 'elearning_footer_widget_2_content_color', '' );
			$footer_widget_2_content_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-2' => array(
					'color' => esc_html( $footer_widget_2_content_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $footer_widget_2_content_color, $footer_widget_2_content_color_css );

			// Footer builder widget 2 link color.
			$footer_widget_2_link_color     = get_theme_mod( 'elearning_footer_widget_2_link_color', '' );
			$footer_widget_2_link_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-2 a' => array(
					'color' => esc_html( $footer_widget_2_link_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $footer_widget_2_link_color, $footer_widget_2_link_color_css );

			// Footer builder widget 2 title typography.
			$footer_widget_2_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);
			$footer_widget_2_title_typography         = get_theme_mod( 'elearning_footer_widget_2_title_typography', $footer_widget_2_title_typography_default );
			$parse_builder_css                       .= elearning_parse_typography_css(
				$footer_widget_2_title_typography_default,
				$footer_widget_2_title_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-2 .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 2 content typography.
			$footer_widget_2_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '2',
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
			);
			$footer_widget_2_content_typography         = get_theme_mod( 'elearning_footer_widget_2_content_typography', $footer_widget_2_content_typography_default );
			$parse_builder_css                         .= elearning_parse_typography_css(
				$footer_widget_2_content_typography_default,
				$footer_widget_2_content_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-2',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 3 title color.
			$footer_widget_3_title_color     = get_theme_mod( 'elearning_footer_widget_3_title_color', '' );
			$footer_widget_3_title_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-3 .widget-title' => array(
					'color' => esc_html( $footer_widget_3_title_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_widget_3_title_color, $footer_widget_3_title_color_css );

			// Footer builder widget 3 content color.
			$footer_widget_3_content_color     = get_theme_mod( 'elearning_footer_widget_3_content_color', '' );
			$footer_widget_3_content_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-3' => array(
					'color' => esc_html( $footer_widget_3_content_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $footer_widget_3_content_color, $footer_widget_3_content_color_css );

			// Footer builder widget 3 link color.
			$footer_widget_3_link_color     = get_theme_mod( 'elearning_footer_widget_3_link_color', '' );
			$footer_widget_3_link_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-3 a' => array(
					'color' => esc_html( $footer_widget_3_link_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $footer_widget_3_link_color, $footer_widget_3_link_color_css );

			// Footer builder widget 3 title typography.
			$footer_widget_3_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '3',
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
			);

			$footer_widget_3_title_typography = get_theme_mod( 'elearning_footer_widget_3_title_typography', $footer_widget_3_title_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$footer_widget_3_title_typography_default,
				$footer_widget_3_title_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-3 .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 3 content typography.
			$footer_widget_3_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '3',
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
			);

			$footer_widget_3_content_typography = get_theme_mod( 'elearning_footer_widget_3_content_typography', $footer_widget_3_content_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$footer_widget_3_content_typography_default,
				$footer_widget_3_content_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-3',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 4 title color.
			$footer_widget_4_title_color     = get_theme_mod( 'elearning_footer_widget_4_title_color', '' );
			$footer_widget_4_title_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-4 .widget-title' => array(
					'color' => esc_html( $footer_widget_4_title_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_widget_4_title_color, $footer_widget_4_title_color_css );

			// Footer builder widget 4 content color.
			$footer_widget_4_content_color     = get_theme_mod( 'elearning_footer_widget_4_content_color', '' );
			$footer_widget_4_content_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-4' => array(
					'color' => esc_html( $footer_widget_4_content_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $footer_widget_4_content_color, $footer_widget_4_content_color_css );

			// Footer builder widget 4 link color.
			$footer_widget_4_link_color     = get_theme_mod( 'elearning_footer_widget_4_link_color', '' );
			$footer_widget_4_link_color_css = array(
				'.tg-footer-builder .widget.widget-footer-sidebar-4 a' => array(
					'color' => esc_html( $footer_widget_4_link_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $footer_widget_4_link_color, $footer_widget_4_link_color_css );

			// Footer builder widget 4 title typography.
			$footer_widget_4_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '4',
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
			);

			$footer_widget_4_title_typography = get_theme_mod( 'elearning_footer_widget_4_title_typography', $footer_widget_4_title_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$footer_widget_4_title_typography_default,
				$footer_widget_4_title_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-4 .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 4 content typography.
			$footer_widget_4_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '4',
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
			);

			$footer_widget_4_content_typography = get_theme_mod( 'elearning_footer_widget_4_content_typography', $footer_widget_4_content_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$footer_widget_4_content_typography_default,
				$footer_widget_4_content_typography,
				'.tg-footer-builder .widget.widget-footer-sidebar-4',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder footer menu color.
			$footer_menu_color     = get_theme_mod( 'elearning_footer_menu_color', '' );
			$footer_menu_color_css = array(
				'.tg-footer-builder .tg-footer-nav ul li a' => array(
					'color' => esc_html( $footer_menu_color ),
				),
			);
			$parse_builder_css    .= elearning_parse_css( '', $footer_menu_color, $footer_menu_color_css );

			// Footer builder footer menu hover color.
			$footer_menu_hover_color     = get_theme_mod( 'elearning_footer_menu_hover_color', '' );
			$footer_menu_hover_color_css = array(
				'.tg-footer-builder .tg-footer-nav ul li a:hover' => array(
					'color' => esc_html( $footer_menu_hover_color ),
				),
			);
			$parse_builder_css          .= elearning_parse_css( '', $footer_menu_hover_color, $footer_menu_hover_color_css );

			// Footer builder footer menu typography.
			$footer_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '4',
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
			);

			$footer_menu_1_typography = get_theme_mod( 'elearning_footer_menu_1_typography', $footer_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$footer_menu_typography_default,
				$footer_menu_1_typography,
				'.tg-footer-builder .tg-footer-nav-1 ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder footer menu 2 color.
			$footer_menu_2_color     = get_theme_mod( 'elearning_footer_menu_2_color', '' );
			$footer_menu_2_color_css = array(
				'.tg-footer-builder .tg-footer-nav-2 ul li a' => array(
					'color' => esc_html( $footer_menu_2_color ),
				),
			);
			$parse_builder_css      .= elearning_parse_css( '', $footer_menu_2_color, $footer_menu_2_color_css );

			// Footer builder footer menu 2 hover color.
			$footer_menu_2_hover_color     = get_theme_mod( 'elearning_footer_menu_2_hover_color', '' );
			$footer_menu_2_hover_color_css = array(
				'.tg-footer-builder .tg-footer-nav-2 ul li a:hover' => array(
					'color' => esc_html( $footer_menu_2_hover_color ),
				),
			);
			$parse_builder_css            .= elearning_parse_css( '', $footer_menu_2_hover_color, $footer_menu_2_hover_color_css );

			// Footer builder footer menu 2 typography.
			$footer_menu_2_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '4',
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
			);

			$footer_menu_2_typography = get_theme_mod( 'elearning_footer_menu_2_typography', $footer_menu_2_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$footer_menu_2_typography_default,
				$footer_menu_2_typography,
				'.tg-footer-builder .tg-footer-nav-2 ul li a',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder copyright color.
			$footer_copyright_color     = get_theme_mod( 'elearning_footer_copyright_text_color', '' );
			$footer_copyright_color_css = array(
				'.tg-footer-builder .tg-copyright' => array(
					'color' => esc_html( $footer_copyright_color ),
				),
			);
			$parse_builder_css         .= elearning_parse_css( '', $footer_copyright_color, $footer_copyright_color_css );

			// Footer builder copyright color.
			$footer_copyright_link_color     = get_theme_mod( 'elearning_footer_copyright_link_color', '' );
			$footer_copyright_link_color_css = array(
				'.tg-footer-builder .tg-copyright a' => array(
					'color' => esc_html( $footer_copyright_link_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_copyright_link_color, $footer_copyright_link_color_css );

			// Footer builder copyright hover color.
			$footer_copyright_link_hover_color     = get_theme_mod( 'elearning_footer_copyright_link_hover_color', '' );
			$footer_copyright_link_hover_color_css = array(
				'.tg-footer-builder .tg-copyright a:hover' => array(
					'color' => esc_html( $footer_copyright_link_hover_color ),
				),
			);
			$parse_builder_css                    .= elearning_parse_css( '', $footer_copyright_link_hover_color, $footer_copyright_link_hover_color_css );

			// Footer builder copyright typography.
			$footer_copyright_typography_default = array(
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
			);

			$footer_copyright_typography = get_theme_mod( 'elearning_footer_copyright_typography', $footer_copyright_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$footer_copyright_typography_default,
				$footer_copyright_typography,
				'.tg-footer-builder .tg-copyright',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder copyright margin.
			$footer_copyright_margin_default = array(
				'top'    => '',
				'right'  => '',
				'bottom' => '',
				'left'   => '',
				'unit'   => 'px',
			);

			$footer_copyright_margin = get_theme_mod( 'elearning_footer_copyright_margin', $footer_copyright_margin_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$footer_copyright_margin_default,
				$footer_copyright_margin,
				'.tg-footer-builder .tg-copyright',
				'margin'
			);

			// Header builder site logo width.
			$header_site_logo_width_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$header_site_logo_width = get_theme_mod( 'elearning_header_site_logo_height', $header_site_logo_width_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$header_site_logo_width_default,
				$header_site_logo_width,
				'.tg-header-builder .site-branding .custom-logo-link img',
				'width'
			);

			// Header builder site title color.
			$header_site_title_color     = get_theme_mod( 'elearning_header_site_identity_color', '' );
			$header_site_title_color_css = array(
				'.tg-header-builder .site-title, .tg-header-builder .site-title a' => array(
					'color' => esc_html( $header_site_title_color ),
				),
			);
			$parse_builder_css          .= elearning_parse_css( '', $header_site_title_color, $header_site_title_color_css );

			// Header builder site title typography.
			$header_site_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => 'regular',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.313',
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
			);

			$header_site_title_typography = get_theme_mod( 'elearning_header_site_title_typography', $header_site_title_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_site_title_typography_default,
				$header_site_title_typography,
				'.tg-header-builder .site-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder site tagline color.
			$header_site_tagline_color     = get_theme_mod( 'elearning_header_site_tagline_color', '' );
			$header_site_tagline_color_css = array(
				'.tg-header-builder .site-description' => array(
					'color' => esc_html( $header_site_tagline_color ),
				),
			);
			$parse_builder_css            .= elearning_parse_css( '', $header_site_tagline_color, $header_site_tagline_color_css );

			// Header builder site tagline typography.
			$header_site_tagline_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => 'regular',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
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
			);

			$header_site_tagline_typography = get_theme_mod( 'elearning_header_site_tagline_typography', $header_site_tagline_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_site_tagline_typography_default,
				$header_site_tagline_typography,
				'.tg-header-builder .site-description',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder bottom area color.
			$footer_bottom_area_color     = get_theme_mod( 'elearning_footer_bottom_area_color', '' );
			$footer_bottom_area_color_css = array(
				'.tg-footer-builder .tg-footer-bottom-row' => array(
					'color' => esc_html( $footer_bottom_area_color ),
				),
			);
			$parse_builder_css           .= elearning_parse_css( '', $footer_bottom_area_color, $footer_bottom_area_color_css );

			// Footer builder top area color.
			$footer_top_area_color     = get_theme_mod( 'elearning_footer_top_area_color', '#FF0000' );
			$footer_top_area_color_css = array(
				'.tg-footer-builder .tg-footer-top-row' => array(
					'color' => esc_html( $footer_top_area_color ),
				),
			);
			$parse_builder_css        .= elearning_parse_css( '#FF0000', $footer_top_area_color, $footer_top_area_color_css );

			// Footer builder main area color.
			$footer_main_area_color     = get_theme_mod( 'elearning_footer_main_area_color', '' );
			$footer_main_area_color_css = array(
				'.tg-footer-builder .tg-footer-main-row' => array(
					'color' => esc_html( $footer_main_area_color ),
				),
			);
			$parse_builder_css         .= elearning_parse_css( '', $footer_main_area_color, $footer_main_area_color_css );

			// Footer builder main area link color.
			$footer_main_area_link_color     = get_theme_mod( 'elearning_footer_main_area_link_color', '' );
			$footer_main_area_link_color_css = array(
				'.tg-footer-builder .tg-footer-main-row a, .tg-footer-builder .tg-footer-main-row ul li a, .tg-footer-builder .tg-footer-main-row .widget ul li a' => array(
					'color' => esc_html( $footer_main_area_link_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_main_area_link_color, $footer_main_area_link_color_css );

			// Footer builder main area link hover color.
			$footer_main_area_link_hover_color     = get_theme_mod( 'elearning_footer_main_area_link_hover_color', '' );
			$footer_main_area_link_hover_color_css = array(
				'.tg-footer-builder .tg-footer-main-row a, .tg-footer-builder .tg-footer-main-row ul li a:hover, .tg-footer-builder .tg-footer-main-row .widget ul li a:hover' => array(
					'color' => esc_html( $footer_main_area_link_hover_color ),
				),
			);
			$parse_builder_css                    .= elearning_parse_css( '', $footer_main_area_link_hover_color, $footer_main_area_link_hover_color_css );

			// Header builder main border bottom.
			$is_header_transparent                          = '';
			$header_builder_main_border_bottom_css_selector = $is_header_transparent ? '.tg-header-builder.tg-layout-1-transparent .tg-header-transparent-wrapper' : '.tg-header-builder, .tg-header-sticky-wrapper .sticky-header';

			// Header builder border color.
			$header_builder_border_color     = get_theme_mod( 'elearning_header_builder_border_color', '' );
			$header_builder_border_color_css = array(
				$header_builder_main_border_bottom_css_selector => array(
					'border-color' => esc_html( $header_builder_border_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $header_builder_border_color, $header_builder_border_color_css );

			// Header builder border width.
			$header_builder_border_width_default = array(
				'top'    => '0',
				'right'  => '0',
				'bottom' => '1',
				'left'   => '0',
				'unit'   => 'px',
			);

			$header_builder_border_width = get_theme_mod( 'elearning_header_builder_border_width', $header_builder_border_width_default );

			$parse_builder_css .= elearning_parse_dimension_css(
				$header_builder_border_width_default,
				$header_builder_border_width,
				$header_builder_main_border_bottom_css_selector,
				'border-width'
			);

			// Header builder background.
			$header_builder_background_default = array(
				'background-color'      => '',
				'background-image'      => '',
				'background-position'   => 'center center',
				'background-size'       => 'auto',
				'background-attachment' => 'scroll',
				'background-repeat'     => 'repeat',
			);
			$header_builder_background         = get_theme_mod( 'elearning_header_builder_background', $header_builder_background_default );
			$parse_builder_css                .= elearning_parse_background_css( $header_builder_background_default, $header_builder_background, '.tg-header-builder' );

			// Footer builder widget title content color.
			$footer_widget_main_area_title_color     = get_theme_mod( 'elearning_footer_main_area_widget_title_color', '' );
			$footer_widget_main_area_title_color_css = array(
				'.tg-footer-builder .tg-footer-main-row .widget-title, .tg-footer-builder .tg-footer-main-row h1, .tg-footer-builder .tg-footer-main-row h2, .tg-footer-builder .tg-footer-main-row h3, .tg-footer-builder .tg-footer-main-row h4, .tg-footer-builder .tg-footer-main-row h5, .tg-footer-builder .tg-footer-main-row h6' => array(
					'color' => esc_html( $footer_widget_main_area_title_color ),
				),
			);
			$parse_builder_css                      .= elearning_parse_css( '', $footer_widget_main_area_title_color, $footer_widget_main_area_title_color_css );

			// Footer builder widget item border.
			$footer_widgets_item_border_bottom_width_default = array(
				'size' => '',
				'unit' => 'px',
			);

			$footer_widgets_item_border_bottom_width = get_theme_mod( 'elearning_footer_widgets_item_border_bottom_width', $footer_widgets_item_border_bottom_width_default );

			$parse_builder_css .= elearning_parse_slider_css(
				$footer_widgets_item_border_bottom_width_default,
				$footer_widgets_item_border_bottom_width,
				'.tg-footer-builder .tg-footer-main-row ul li',
				'border-bottom-width'
			);

			// Footer builder widgets item border bottom color.
			$footer_widgets_item_border_bottom__color     = get_theme_mod( 'elearning_footer_widgets_item_border_bottom_color', '#e9ecef' );
			$footer_widgets_item_border_bottom__color_css = array(
				'.tg-footer-builder .tg-footer-main-row ul li' => array(
					'border-bottom-color' => esc_html( $footer_widgets_item_border_bottom__color ),
				),
			);
			$parse_builder_css                           .= elearning_parse_css( '#e9ecef', $footer_widgets_item_border_bottom__color, $footer_widgets_item_border_bottom__color_css );

			// Footer builder widget 5 title color.
			$footer_widget_5_title_color     = get_theme_mod( 'elearning_footer_widget_5_title_color', '' );
			$footer_widget_5_title_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar .widget-title' => array(
					'color' => esc_html( $footer_widget_5_title_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_widget_5_title_color, $footer_widget_5_title_color_css );

			// Footer builder widget 5 content color.
			$footer_widget_5_content_color     = get_theme_mod( 'elearning_footer_widget_5_content_color', '' );
			$footer_widget_5_content_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar' => array(
					'color' => esc_html( $footer_widget_5_content_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $footer_widget_5_content_color, $footer_widget_5_content_color_css );

			// Footer builder widget 5 link color.
			$footer_widget_5_link_color     = get_theme_mod( 'elearning_footer_widget_5_link_color', '' );
			$footer_widget_5_link_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar a' => array(
					'color' => esc_html( $footer_widget_5_link_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $footer_widget_5_link_color, $footer_widget_5_link_color_css );

			// Footer builder widget 5 title typography.
			$footer_widget_5_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '5',
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
			);
			$footer_widget_5_title_typography         = get_theme_mod( 'elearning_footer_widget_5_title_typography', $footer_widget_5_title_typography_default );
			$parse_builder_css                       .= elearning_parse_typography_css(
				$footer_widget_5_title_typography_default,
				$footer_widget_5_title_typography,
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 5 content typography.
			$footer_widget_5_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '5',
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
			);
			$footer_widget_5_content_typography         = get_theme_mod( 'elearning_footer_widget_5_content_typography', $footer_widget_5_content_typography_default );
			$parse_builder_css                         .= elearning_parse_typography_css(
				$footer_widget_5_content_typography_default,
				$footer_widget_5_content_typography,
				'.tg-footer-builder .widget.widget-footer-bar-left-sidebar',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 6 title color.
			$footer_widget_6_title_color     = get_theme_mod( 'elearning_footer_widget_6_title_color', '' );
			$footer_widget_6_title_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar .widget-title' => array(
					'color' => esc_html( $footer_widget_6_title_color ),
				),
			);
			$parse_builder_css              .= elearning_parse_css( '', $footer_widget_6_title_color, $footer_widget_6_title_color_css );

			// Footer builder widget 6 content color.
			$footer_widget_6_content_color     = get_theme_mod( 'elearning_footer_widget_6_content_color', '' );
			$footer_widget_6_content_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar' => array(
					'color' => esc_html( $footer_widget_6_content_color ),
				),
			);
			$parse_builder_css                .= elearning_parse_css( '', $footer_widget_6_content_color, $footer_widget_6_content_color_css );

			// Footer builder widget 6 link color.
			$footer_widget_6_link_color     = get_theme_mod( 'elearning_footer_widget_6_link_color', '' );
			$footer_widget_6_link_color_css = array(
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar a' => array(
					'color' => esc_html( $footer_widget_6_link_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $footer_widget_6_link_color, $footer_widget_6_link_color_css );

			// Footer builder widget 6 title typography.
			$footer_widget_6_title_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '6',
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
			);
			$footer_widget_6_title_typography         = get_theme_mod( 'elearning_footer_widget_6_title_typography', $footer_widget_6_title_typography_default );
			$parse_builder_css                       .= elearning_parse_typography_css(
				$footer_widget_6_title_typography_default,
				$footer_widget_6_title_typography,
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar .widget-title',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Footer builder widget 6 content typography.
			$footer_widget_6_content_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '6',
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
			);
			$footer_widget_6_content_typography         = get_theme_mod( 'elearning_footer_widget_6_content_typography', $footer_widget_6_content_typography_default );
			$parse_builder_css                         .= elearning_parse_typography_css(
				$footer_widget_6_content_typography_default,
				$footer_widget_6_content_typography,
				'.tg-footer-builder .widget.widget-footer-bar-right-sidebar',
				array(
					'tablet' => 768,
					'mobile' => 600,
				)
			);

			// Header builder mobile menu typography.
			$header_builder_mobile_menu_typography_default = array(
				'font-family'    => 'inherit',
				'font-weight'    => '400',
				'font-size'      => array(
					'desktop' => array(
						'size' => '1.6',
						'unit' => 'rem',
					),
					'tablet'  => array(
						'size' => '',
						'unit' => '',
					),
					'mobile'  => array(
						'size' => '1.6',
						'unit' => 'rem',
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
						'size' => '1.8',
						'unit' => '-',
					),
				),
				'font-style'     => 'normal',
				'text-transform' => 'none',
			);

			$header_builder_mobile_menu_typography = get_theme_mod( 'elearning_header_mobile_menu_typography', $header_builder_mobile_menu_typography_default );

			$parse_builder_css .= elearning_parse_typography_css(
				$header_builder_mobile_menu_typography_default,
				$header_builder_mobile_menu_typography,
				'.tg-header-builder .tg-mobile-menu a',
				array(
					'mobile' => 600,
					'tablet' => 768,
				)
			);

			// Footer builder area cols.
			$footer_builder_top_col    = get_theme_mod( 'elearning_footer_top_area_cols', 4 );
			$footer_builder_main_col   = get_theme_mod( 'elearning_footer_main_area_cols', 4 );
			$footer_builder_bottom_col = get_theme_mod( 'elearning_footer_bottom_area_cols', 1 );
			$parse_builder_css        .= ":root{--top-grid-columns: {$footer_builder_top_col};
			--main-grid-columns: {$footer_builder_main_col};
			--bottom-grid-columns: {$footer_builder_bottom_col};
			}";

			if ( 1 == $footer_builder_top_col ) {
				$parse_builder_css .= ' .tg-footer-builder .tg-top-row{justify-items: center;} ';
				$parse_builder_css .= ' .tg-footer-builder .tg-top-row .tg-footer-top-1-col{ display: block;} ';
			} elseif ( 1 === $footer_builder_main_col ) {
				$parse_builder_css .= ' .tg-footer-builder .tg-main-row{justify-items: center;} ';
			} elseif ( 1 === $footer_builder_bottom_col ) {
				$parse_builder_css .= ' .tg-footer-builder .tg-bottom-row{justify-items: center;} ';
			}

			// Header cart color.
			$header_cart_color     = get_theme_mod( 'elearning_cart_color', '' );
			$header_cart_color_css = array(
				'.tg-header-builder .tg-icon--cart' => array(
					'fill' => esc_html( $header_cart_color ),
				),
			);
			$parse_builder_css    .= elearning_parse_css( '', $header_cart_color, $header_cart_color_css );

			// Footer widgets title color.
			$footer_widgets_title_color     = get_theme_mod( 'elearning_footer_widgets_title_color', '' );
			$footer_widgets_title_color_css = array(
				'.tg-footer-builder .tg-footer-main-row .widget-title, .tg-footer-builder .tg-footer-main-row h1, .tg-footer-builder .tg-footer-main-row h2, .tg-footer-builder .tg-footer-main-row h3, .tg-footer-builder .tg-footer-main-row h4, .tg-footer-builder .tg-footer-main-row h5, .tg-footer-builder .tg-footer-main-row h6' => array(
					'color' => esc_html( $footer_widgets_title_color ),
				),
			);
			$parse_builder_css             .= elearning_parse_css( '', $footer_widgets_title_color, $footer_widgets_title_color_css );

			// Footer bottom layout alignment.
			$footer_builder_bottom_layout = get_theme_mod( 'elearning_footer_bottom_inner_element_layout', 'column' );

			if ( ! empty( $footer_builder_bottom_layout ) ) {
				$parse_builder_css .= ".tg-footer-builder .tg-footer-bottom-row .tg-footer-col{flex-direction: $footer_builder_bottom_layout;}";
			}

			// Footer main layout alignment.
			$footer_builder_main_layout = get_theme_mod( 'elearning_footer_main_inner_element_layout', 'column' );

			if ( ! empty( $footer_builder_main_layout ) ) {
				$parse_builder_css .= ".tg-footer-builder .tg-footer-main-row .tg-footer-col{flex-direction: $footer_builder_main_layout;}";
			}

			// Footer top layout alignment.
			$footer_builder_top_layout = get_theme_mod( 'elearning_footer_top_inner_element_layout', 'column' );

			if ( ! empty( $footer_builder_top_layout ) ) {
				$parse_builder_css .= ".tg-footer-builder .tg-footer-top-row .tg-footer-col{flex-direction: $footer_builder_top_layout;}";
			}

			// Copyright alignment.
			$copyright_alignment = get_theme_mod( 'elearning_copyright_alignment', 'center' );

			$parse_builder_css .= ".tg-footer-builder .tg-copyright{text-align: $copyright_alignment;}";

			// Footer menu alignment.
			$footer_menu_alignment = get_theme_mod( 'elearning_footer_menu_alignment', 'center' );

			$parse_builder_css .= ".tg-footer-builder .tg-footer-nav{display: flex; justify-content: $footer_menu_alignment;}";

			// Footer menu 2 alignment.
			$footer_menu_alignment_2 = get_theme_mod( 'elearning_footer_menu_2_alignment', 'center' );

			$parse_builder_css .= ".tg-footer-builder .tg-footer-nav-2{display: flex; justify-content: $footer_menu_alignment_2;}";

			// Html alignment.
			$html_alignment = get_theme_mod( 'elearning_html_1_alignment', 'center' );

			$parse_builder_css .= ".tg-footer-builder .tg-html-1{text-align: $html_alignment;}";

			// Html 2 alignment.
			$html_alignment_2 = get_theme_mod( 'elearning_html_2_alignment', 'center' );

			$parse_builder_css .= ".tg-footer-builder .tg-html-2{text-align: $html_alignment_2;}";

			// Social alignment.
			$social_alignment = get_theme_mod( 'elearning_socials_alignment', '' );

			$parse_builder_css .= ".tg-footer-builder .footer-social-icons{text-align: $social_alignment;}";

			// Widget alignment.
			$widget_1_alignment = get_theme_mod( 'elearning_footer_widget_1_alignment', '' );

			$parse_builder_css .= ".tg-footer-builder .widget-footer-sidebar-1{text-align: $widget_1_alignment;}";

			// Widget 2 alignment.
			$widget_2_alignment = get_theme_mod( 'elearning_footer_widget_2_alignment', '' );

			$parse_builder_css .= ".tg-footer-builder .widget-footer-sidebar-2{text-align: $widget_2_alignment;}";

			// Widget 3 alignment.
			$widget_3_alignment = get_theme_mod( 'elearning_footer_widget_3_alignment', '' );

			$parse_builder_css .= ".tg-footer-builder .widget-footer-sidebar-3{text-align: $widget_3_alignment;}";

			// Widget 4 alignment.
			$widget_4_alignment = get_theme_mod( 'elearning_footer_widget_4_alignment', '' );

			$parse_builder_css .= ".tg-footer-builder .widget-footer-sidebar-4{text-align: $widget_4_alignment;}";

			// Widget 5 alignment.
			$widget_5_alignment = get_theme_mod( 'elearning_footer_widget_5_alignment', '' );

			$parse_builder_css .= ".tg-footer-builder .widget-footer-bar-left-sidebar{text-align: $widget_5_alignment;}";

			// Widget 6 alignment.
			$widget_6_alignment = get_theme_mod( 'elearning_footer_widget_6_alignment', '' );

			$parse_builder_css .= ".tg-footer-builder .widget-footer-bar-right-sidebar{text-align: $widget_6_alignment;}";

			$color_palette_default = array(
				'id'     => 'preset-1',
				'name'   => 'Preset 1',
				'colors' => array(
					'elearning-color-1' => '#269bd1',
					'elearning-color-2' => '#1e7ba6',
					'elearning-color-3' => '#FFFFFF',
					'elearning-color-4' => '#F9FEFD',
					'elearning-color-5' => '#27272A',
					'elearning-color-6' => '#16181A',
					'elearning-color-7' => '#51585f',
					'elearning-color-8' => '#FFFFFF',
					'elearning-color-9' => '#e4e4e7',
				),
			);

			// Color palette.
			$color_palette = get_theme_mod( 'elearning_color_palette', $color_palette_default );
			if ( ! empty( $color_palette ) ) {
				$parse_builder_css .= sprintf(
					' :root{%s}',
					array_reduce(
						array_keys( $color_palette['colors'] ?? [] ),
						function ( $acc, $curr ) use ( $color_palette ) {
							$acc .= "--{$curr}: {$color_palette['colors'][$curr]};";

							return $acc;
						},
						''
					)
				);
			}

			$parse_builder_css .= $dynamic_css;

			return apply_filters( 'elearning_theme_builder_dynamic_css', $parse_builder_css );
		}

		/**
		 * Generate CSS variables for elearning color palette.
		 *
		 * @return string Generated CSS variables.
		 */
		public static function generate_color_palette_css_variables() {
			$global_palette = get_theme_mod(
				'elearning_color_palette',
				array(
					'id'     => 'preset-1',
					'name'   => 'Preset 1',
					'colors' => array(
						'elearning-color-1' => '#269bd1',
						'elearning-color-2' => '#1e7ba6',
						'elearning-color-3' => '#FFFFFF',
						'elearning-color-4' => '#F9FEFD',
						'elearning-color-5' => '#27272A',
						'elearning-color-6' => '#16181A',
						'elearning-color-7' => '#51585f',
						'elearning-color-8' => '#FFFFFF',
						'elearning-color-9' => '#e4e4e7',
					),
				)
			);

			$css = ':root {';

			if ( isset( $global_palette['colors'] ) && is_array( $global_palette['colors'] ) ) {
				foreach ( $global_palette['colors'] as $color_key => $color_value ) {
					// Generate WordPress preset color variables
					$css .= '--wp--preset--color--' . $color_key . ':' . $color_value . ';';
				}
			}

			$css .= '}';

			return $css;
		}
	}
}
