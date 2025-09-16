<?php
/**
 * Migrate options on theme updates.
 *
 * @package elearning
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Migration' ) ) {

	/**
	 * eLearning_Migration class.
	 *
	 */
	class eLearning_Migration {
		/**
		 * @var array|false
		 */
		private $old_theme_mods;

		public function __construct() {

			add_action( 'themegrill_ajax_demo_imported', [ $this, 'customizer_migration_v1' ] );
			if ( self::maybe_run_migration() || self::demo_import_migration() ) {
				/**
				 * eLearning revamp migrations.
				 */
				$this->old_theme_mods = get_theme_mods();
				add_action( 'after_setup_theme', [ $this, 'customizer_migration_v1' ] );
			}
			if ( get_option( 'elearning_customizer_migration_v1' ) && ! get_option( 'elearning_builder_migration' ) ) {
				add_action( 'after_setup_theme', [ $this, 'elearning_builder_migration' ], 25 );
			}
			add_action( 'themegrill_ajax_demo_imported', [ $this, 'elearning_builder_migration' ], 25 );
			add_action( 'after_setup_theme', [ $this, 'elearning_outside_background_migration' ], 25 );

			$theme_installed_time = get_option( 'elearning_theme_installed_time' ); // timestamp
			$today                = strtotime( '2025-09-15' );

			if ( ! fresh_install_check() || $theme_installed_time < $today ) {
				add_action( 'after_setup_theme', [ $this, 'elearning_container_migration' ], 25 );
			}
			add_action( 'themegrill_ajax_demo_imported', [ $this, 'elearning_container_migration' ], 25 );

			if ( fresh_install_check() ) {
				add_action( 'after_setup_theme', [ $this, 'elearning_container_width' ], 25 );
			}

			add_action( 'after_setup_theme', [ $this, 'elearning_typography_migration' ], 30 );
		}

		public function elearning_typography_migration() {

			if ( get_option( 'elearning_typography_migration' ) ) {
				return;
			}

			// Default values for comparison
			$default_typography_presets   = '';
			$default_base_typography_body = array(
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

			$default_base_heading_typography = array(
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
			);

			// Get current values
			$current_base_typography_body    = get_theme_mod( 'elearning_base_typography_body', $default_base_typography_body );
			$current_base_heading_typography = get_theme_mod( 'elearning_base_typography_heading', $default_base_heading_typography );

			// Check if current values are different from default values
			$should_migrate = false;

			// Check base typography body
			if ( $current_base_typography_body !== $default_base_typography_body ) {
				$should_migrate = true;
			}

			// Check base heading typography
			if ( $current_base_heading_typography !== $default_base_heading_typography ) {
				$should_migrate = true;
			}

			// Only run migration if current values are different from default values
			if ( ! $should_migrate ) {
				return;
			}

			remove_theme_mod( 'elearning_typography_presets' );

			$base_typography = get_theme_mod(
				'elearning_base_typography_body',
				$default_base_typography_body
			);

			set_theme_mod( 'elearning_base_typography_body', $base_typography );

			$base_heading_typography = get_theme_mod(
				'elearning_base_typography_heading',
				$default_base_heading_typography
			);

			set_theme_mod( 'elearning_base_typography_heading', $base_heading_typography );

			update_option( 'elearning_typography_migration', true );
		}

		public static function elearning_container_width() {
			if ( get_option( 'elearning_container_width_migration' ) ) {
				return;
			}
			set_theme_mod( 'elearning_general_container_width', 1200 );
			set_theme_mod( 'elearning_enable_page_title', false );

			update_option( 'elearning_container_width_migration', true );
		}

		public function elearning_container_migration() {

			$should_run = false;
			if ( doing_action( 'themegrill_ajax_demo_imported' ) ) {
				$should_run = true;
			} elseif ( ! get_option( 'elearning_container_migration' ) ) {
				$should_run = true;
			}

			if ( ! $should_run ) {
				return;
			}

			$default_sidebar = get_theme_mod( 'elearning_structure_default', '' );
			$archive_sidebar = get_theme_mod( 'elearning_structure_archive', '' );
			$post_sidebar    = get_theme_mod( 'elearning_structure_post', '' );
			$page_sidebar    = get_theme_mod( 'elearning_structure_page', '' );
			if ( $default_sidebar ) {
				if ( 'tg-site-layout--right' === $default_sidebar ) {
					set_theme_mod( 'elearning_global_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_global_sidebar_layout', 'tg-site-layout--right' );
				} elseif ( 'tg-site-layout--left' === $default_sidebar ) {
					set_theme_mod( 'elearning_global_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_global_sidebar_layout', 'tg-site-layout--left' );
				} elseif ( 'tg-site-layout--centered' === $default_sidebar ) {
					set_theme_mod( 'elearning_global_container_layout', 'tg-site-layout--centered' );
					set_theme_mod( 'elearning_global_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--no-sidebar' === $default_sidebar ) {
					set_theme_mod( 'elearning_global_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_global_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--stretched' === $default_sidebar ) {
					set_theme_mod( 'elearning_global_container_layout', 'tg-site-layout--stretched' );
					set_theme_mod( 'elearning_global_sidebar_layout', 'no_sidebar' );
				}
			}

			if ( $archive_sidebar ) {
				if ( 'tg-site-layout--right' === $archive_sidebar ) {
					set_theme_mod( 'elearning_blog_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_blog_sidebar_layout', 'tg-site-layout--right' );
				} elseif ( 'tg-site-layout--left' === $archive_sidebar ) {
					set_theme_mod( 'elearning_blog_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_blog_sidebar_layout', 'tg-site-layout--left' );
				} elseif ( 'tg-site-layout--centered' === $archive_sidebar ) {
					set_theme_mod( 'elearning_blog_container_layout', 'tg-site-layout--centered' );
					set_theme_mod( 'elearning_blog_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--no-sidebar' === $archive_sidebar ) {
					set_theme_mod( 'elearning_blog_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_blog_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--stretched' === $archive_sidebar ) {
					set_theme_mod( 'elearning_blog_container_layout', 'tg-site-layout--stretched' );
					set_theme_mod( 'elearning_blog_sidebar_layout', 'no_sidebar' );
				}
			}

			if ( $post_sidebar ) {
				if ( 'tg-site-layout--right' === $post_sidebar ) {
					set_theme_mod( 'elearning_single_post_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_single_post_sidebar_layout', 'tg-site-layout--right' );
				} elseif ( 'tg-site-layout--left' === $post_sidebar ) {
					set_theme_mod( 'elearning_single_post_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_single_post_sidebar_layout', 'tg-site-layout--left' );
				} elseif ( 'tg-site-layout--centered' === $post_sidebar ) {
					set_theme_mod( 'elearning_single_post_container_layout', 'tg-site-layout--centered' );
					set_theme_mod( 'elearning_single_post_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--no-sidebar' === $post_sidebar ) {
					set_theme_mod( 'elearning_single_post_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_single_post_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--stretched' === $post_sidebar ) {
					set_theme_mod( 'elearning_single_post_container_layout', 'tg-site-layout--stretched' );
					set_theme_mod( 'elearning_single_post_sidebar_layout', 'no_sidebar' );
				}
			}

			if ( $page_sidebar ) {
				if ( 'tg-site-layout--right' === $page_sidebar ) {
					set_theme_mod( 'elearning_single_page_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_single_page_sidebar_layout', 'tg-site-layout--right' );
				} elseif ( 'tg-site-layout--left' === $page_sidebar ) {
					set_theme_mod( 'elearning_single_page_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_single_page_sidebar_layout', 'tg-site-layout--left' );
				} elseif ( 'tg-site-layout--centered' === $page_sidebar ) {
					set_theme_mod( 'elearning_single_page_container_layout', 'tg-site-layout--centered' );
					set_theme_mod( 'elearning_single_page_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--no-sidebar' === $page_sidebar ) {
					set_theme_mod( 'elearning_single_page_container_layout', 'tg-site-layout--no-sidebar' );
					set_theme_mod( 'elearning_single_page_sidebar_layout', 'no_sidebar' );
				} elseif ( 'tg-site-layout--stretched' === $page_sidebar ) {
					set_theme_mod( 'elearning_single_page_container_layout', 'tg-site-layout--stretched' );
					set_theme_mod( 'elearning_single_page_sidebar_layout', 'no_sidebar' );
				}
			}

			// Post meta migration.
			$arg       = [
				'post_type'      => 'any',
				'posts_per_page' => - 1,
			];
			$the_query = new WP_Query( $arg );

			// The loop.
			while ( $the_query->have_posts() ) :
				$the_query->the_post();

				// Layout.
				$post_id                   = get_the_ID();
				$post_meta_style_old_value = get_post_meta( $post_id, 'elearning_layout', true );

				if ( $post_meta_style_old_value ) {
					if ( 'tg-site-layout--right' === $post_meta_style_old_value ) {
						update_post_meta( $post_id, 'elearning_container_layout', 'tg-site-layout--no-sidebar' );
						update_post_meta( $post_id, 'elearning_sidebar_layout', 'tg-site-layout--right' );
					} elseif ( 'tg-site-layout--left' === $post_meta_style_old_value ) {
						update_post_meta( $post_id, 'elearning_container_layout', 'tg-site-layout--no-sidebar' );
						update_post_meta( $post_id, 'elearning_sidebar_layout', 'tg-site-layout--left' );
					} elseif ( 'tg-site-layout--centered' === $post_meta_style_old_value ) {
						update_post_meta( $post_id, 'elearning_container_layout', 'tg-site-layout--centered' );
						update_post_meta( $post_id, 'elearning_sidebar_layout', 'no_sidebar' );
					} elseif ( 'tg-site-layout--no-sidebar' === $post_meta_style_old_value ) {
						update_post_meta( $post_id, 'elearning_container_layout', 'tg-site-layout--no-sidebar' );
						update_post_meta( $post_id, 'elearning_sidebar_layout', 'no_sidebar' );
					} elseif ( 'tg-site-layout--stretched' === $post_meta_style_old_value ) {
						update_post_meta( $post_id, 'elearning_container_layout', 'tg-site-layout--stretched' );
						update_post_meta( $post_id, 'elearning_sidebar_layout', 'no_sidebar' );
					}

					delete_post_meta( $post_id, 'elearning_layout' );
				}

				$container_padding = get_theme_mod( 'elearning_content_area_padding', '' );
				if ( $container_padding ) {
					$size  = $container_padding['size'] ? $container_padding['size'] : '';
					$value = array(
						'top'    => $size,
						'right'  => $size,
						'bottom' => $size,
						'left'   => $size,
						'unit'   => 'px',
					);
					update_post_meta( $post_id, 'elearning_content_area_padding', $value );
				}

				// Check if color_palette has colors and is properly structured
				if ( ! empty( $color_palette ) && is_array( $color_palette ) && isset( $color_palette['colors'] ) && is_array( $color_palette['colors'] ) && ! empty( $color_palette['colors'] ) ) {
					$colors_keys = array_map(
						function ( $color ) {
							return 'var(--' . $color . ')';
						},
						array_keys( $color_palette['colors'] )
					);
					$colors      = array_combine(
						$colors_keys,
						array_values( $color_palette['colors'] )
					);
				} else {
					// If no valid color palette, set default preset
					$default_preset = array(
						'id'     => 'preset-1',
						'name'   => 'Preset 1',
						'colors' => array(
							'elearning-color-1' => '#eaf3fb',
							'elearning-color-2' => '#bfdcf3',
							'elearning-color-3' => '#94c4eb',
							'elearning-color-4' => '#6aace2',
							'elearning-color-5' => '#257bc1',
							'elearning-color-6' => '#1d6096',
							'elearning-color-7' => '#15446b',
							'elearning-color-8' => '#0c2941',
							'elearning-color-9' => '#040e16',
						),
					);

					$colors_keys = array_map(
						function ( $color ) {
							return 'var(--' . $color . ')';
						},
						array_keys( $default_preset['colors'] )
					);
					$colors      = array_combine(
						$colors_keys,
						array_values( $default_preset['colors'] )
					);

				}

				$color_id = array(
					array( 'elearning_base_color_primary', '#269bd1' ),
					array( 'elearning_base_color_text', '#51585f' ),
					array( 'elearning_base_color_border', '#E4E4E7' ),
					array( 'elearning_heading_color', '#16181a' ),
					array( 'elearning_link_color', '#269bd1' ),
					array( 'elearning_link_hover_color', '#1e7ba6' ),
					array( 'elearning_button_text_color', '#ffffff' ),
					array( 'elearning_button_text_hover_color', '#ffffff' ),
					array( 'elearning_button_bg_color', '#269bd1' ),
					array( 'elearning_button_bg_hover_color', '#1e7ba6' ),
					array( 'elearning_header_button_text_color', '#ffffff' ),
					array( 'elearning_header_button_text_hover_color', '#ffffff' ),
					array( 'elearning_header_button_bg_color', '#269bd1' ),
					array( 'elearning_header_button_bg_hover_color', '#1e7ba6' ),
					array( 'elearning_header_main_border_bottom_color', '#e9ecef' ),
					array( 'elearning_post_page_title_color', '#16181a' ),
					array( 'elearning_primary_menu_border_bottom_color', '#e9ecef' ),
					array( 'elearning_primary_menu_text_color', '#51585f' ),
					array( 'elearning_primary_menu_text_hover_color', '#269bd1' ),
					array( 'elearning_primary_menu_text_active_color', '#269bd1' ),
					array( 'elearning_site_identity_color', '#16181a' ),
					array( 'elearning_site_tagline_color', '#51585f' ),
					array( 'elearning_site_identity_color', '#16181a' ),
					array( 'elearning_header_top_text_color', '#51585f' ),
					array( 'elearning_header_bottom_area_color', '#f8f9fa' ),
					array( 'elearning_header_bottom_area_border_color', '#e9ecef' ),
					array( 'elearning_cart_color', '#51585f' ),
					array( 'elearning_header_button_border_color', '#269bd1' ),
					array( 'elearning_header_button_color', '#ffffff' ),
					array( 'elearning_header_button_hover_color', '#ffffff' ),
					array( 'elearning_header_button_background_color', '#269bd1' ),
					array( 'elearning_header_button_background_hover_color', '#1e7ba6' ),
					array( 'elearning_header_button_border_color', '#269bd1' ),
					array( 'elearning_header_html_1_text_color', '#51585f' ),
					array( 'elearning_header_html_1_link_color', '#269bd1' ),
					array( 'elearning_header_html_1_link_hover_color', '#1e7ba6' ),
					array( 'elearning_header_html_2_text_color', '#51585f' ),
					array( 'elearning_header_html_2_link_color', '#269bd1' ),
					array( 'elearning_header_html_2_link_hover_color', '#1e7ba6' ),
					array( 'elearning_header_site_identity_color', '#16181a' ),
					array( 'elearning_header_site_tagline_color', '#51585f' ),
					array( 'elearning_header_main_area_color', '#ffffff' ),
					array( 'elearning_header_main_area_border_color', '#e9ecef' ),
					array( 'elearning_header_mobile_menu_background', '#ffffff' ),
					array( 'elearning_header_menu_border_bottom_color', '#e9ecef' ),
					array( 'elearning_header_main_menu_color', '#51585f' ),
					array( 'elearning_header_main_menu_hover_color', '#269bd1' ),
					array( 'elearning_header_main_menu_active_color', '#269bd1' ),
					array( 'elearning_header_quaternary_menu_color', '#51585f' ),
					array( 'elearning_header_quaternary_menu_hover_color', '#269bd1' ),
					array( 'elearning_header_quaternary_menu_active_color', '#269bd1' ),
					array( 'elearning_header_search_icon_color', '#51585f' ),
					array( 'elearning_header_search_text_color', '#51585f' ),
					array( 'elearning_header_secondary_menu_border_bottom_color', '#e9ecef' ),
					array( 'elearning_header_secondary_menu_color', '#51585f' ),
					array( 'elearning_header_secondary_menu_hover_color', '#269bd1' ),
					array( 'elearning_header_secondary_menu_active_color', '#269bd1' ),
					array( 'elearning_header_tertiary_menu_border_bottom_color', '#e9ecef' ),
					array( 'elearning_header_tertiary_menu_color', '#51585f' ),
					array( 'elearning_header_tertiary_menu_hover_color', '#269bd1' ),
					array( 'elearning_header_tertiary_menu_active_color', '#269bd1' ),
					array( 'elearning_widget_1_title_color', '#16181a' ),
					array( 'elearning_widget_1_link_color', '#269bd1' ),
					array( 'elearning_widget_1_content_color', '#51585f' ),
					array( 'elearning_widget_2_title_color', '#16181a' ),
					array( 'elearning_widget_2_link_color', '#269bd1' ),
					array( 'elearning_widget_2_content_color', '#51585f' ),
				);

				$color_palette = get_theme_mod( 'elearning_color_palette', array() );

					// Set colors from the palette.
				if ( ! empty( $colors ) ) {
					foreach ( $color_id as $color_setting ) {
						$color_value = get_theme_mod( $color_setting[0], '' );
						if ( strpos( $color_value, 'var(--elearning-color' ) === 0 ) {
							$key = str_replace( 'var(--', '', $color_value );
							$key = str_replace( ')', '', $key );
							if ( isset( $colors[ $key ] ) ) {
								set_theme_mod( $color_setting[0], $colors[ $key ] );
							}
						} else {
							// If the value is not a CSS variable, ensure it's saved as is.
							if ( ! empty( $color_value ) ) {
								set_theme_mod( $color_setting[0], $color_value );
							} elseif ( ! empty( $color_setting[1] ) ) {
								set_theme_mod( $color_setting[0], $color_setting[1] );
							}
						}
					}
				}

				if ( ! empty( $colors ) ) {
					$bg_id = [
						'elearning_outside_container_background',
						'elearning_inside_container_background',
						'elearning_page_title_bg',
						'elearning_header_bottom_area_background',
						'elearning_header_main_area_background',
						'elearning_header_search_background',
					];

					foreach ( $bg_id as $color_setting ) {
						$value = get_theme_mod( $color_setting, '' );
						if ( is_array( $value ) && isset( $value['background-color'] ) ) {
							$color_value = $value['background-color'];
							if ( strpos( $color_value, 'var(--elearning-color' ) === 0 ) {
								$key = str_replace( 'var(--', '', $color_value );
								$key = str_replace( ')', '', $key );
								if ( isset( $colors[ $key ] ) ) {
									$value['background-color'] = $colors[ $key ];
									set_theme_mod( $color_setting, $value );
								}
							}
						}
					}
				}

				set_theme_mod( 'elearning_color_palette', array() );

				update_option( 'elearning_container_migration', true );

				endwhile;
		}

		/**
		 * Performs customizer migration for version 1 of the theme.
		 *
		 * This function handles the migration of various theme customizer settings
		 * from older versions to the current version. It includes the following migrations:
		 *
		 * 1. Site identity and tagline display settings
		 * 2. Site identity and tagline color
		 * 3. Slider control migration for various theme elements
		 * 4. Typography options migration
		 *
		 * The function performs the following key operations:
		 * - Migrates header text color to site identity color
		 * - Converts slider control values to new format with size and unit
		 * - Migrates typography settings for various theme elements
		 * - Handles font size and line height conversions for different devices
		 *
		 * @return void
		 *
		 * @since 3.0.0
		 */
		public function customizer_migration_v1() {

			/**
			 * Revamp migration.
			 */
			// Site identity and tagline display.
			if ( 'blank' === get_theme_mod( 'header_textcolor' ) ) {

				set_theme_mod( 'elearning_enable_site_identity', false );
				set_theme_mod( 'elearning_enable_site_tagline', false );
			}

			// Site identity and tagline color.
			$header_text_color = get_theme_mod( 'header_textcolor' );

			if ( $header_text_color ) {

				set_theme_mod( 'elearning_site_identity_color', '#' . $header_text_color );
				remove_theme_mod( 'header_textcolor' );
			}

			// Slider control migration.
			$slider_options = [
				[
					'old_key' => 'elearning_footer_bar_border_top_width',
					'new_key' => 'elearning_footer_bar_border_top_width',
					'default' => [
						'size' => 0,
						'unit' => 'px',
					],
				],
				[
					'old_key' => 'elearning_footer_widgets_border_top_width',
					'new_key' => 'elearning_footer_widgets_border_top_width',
					'default' => [
						'size' => 1,
						'unit' => 'px',
					],
				],
				[
					'old_key' => 'elearning_footer_widgets_item_border_bottom_width',
					'new_key' => 'elearning_footer_widgets_item_border_bottom_width',
					'default' => [
						'size' => 1,
						'unit' => 'px',
					],
				],
				[
					'old_key' => 'elearning_button_roundness',
					'new_key' => 'elearning_button_roundness',
					'default' => [
						'size' => 0,
						'unit' => 'px',
					],
				],
				[
					'old_key' => 'elearning_general_container_width',
					'new_key' => 'elearning_general_container_width',
					'default' => [
						'size' => 1160,
						'unit' => 'px',
					],
				],
				[
					'old_key' => 'elearning_general_content_width',
					'new_key' => 'elearning_general_content_width',
					'default' => [
						'size' => 70,
						'unit' => '%',
					],
				],
				[
					'old_key' => 'elearning_general_sidebar_width',
					'new_key' => 'elearning_general_sidebar_width',
					'default' => [
						'size' => 30,
						'unit' => '%',
					],
				],
				[
					'old_key' => 'elearning_header_main_border_bottom_size',
					'new_key' => 'elearning_header_main_border_bottom_size',
					'default' => [
						'size' => 1,
						'unit' => 'px',
					],
				],
				[
					'old_key' => 'elearning_primary_menu_border_bottom_size',
					'new_key' => 'elearning_primary_menu_border_bottom_size',
					'default' => [
						'size' => 0,
						'unit' => 'px',
					],
				],
				[
					'old_key' => 'elearning_header_button_roundness',
					'new_key' => 'elearning_header_button_roundness',
					'default' => [
						'size' => 0,
						'unit' => 'px',
					],
				],
			];

			// Loop through the options and migrate their values.
			foreach ( $slider_options as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				if ( isset( $old_value ) ) {

					set_theme_mod(
						$option['new_key'],
						[
							'size' => $old_value,
							'unit' => $option['default']['unit'],
						]
					);
				}
			}

			// Extract size and unit from the value.
			$typography_converted_value = function ( $value ) {
				$unit_list = [ 'px', 'em', 'rem', '%', '-', 'vw', 'vh', 'pt', 'pc', '' ];

				if ( ! $value ) {
					return [
						'size' => '',
						'unit' => '',
					];
				}

				if ( is_string( $value ) ) {
					preg_match( '/^(\d+(?:\.\d+)?)(.*)$/', $value, $matches );
				}

				$size = isset( $matches[1] ) ? (float) $matches[1] : '';
				$unit = isset( $matches[2] ) ? $matches[2] : '';

				if ( 'rem' === $unit ) {

					$size = $size * ( 14.4 / 10 );
				}

				if ( ! in_array( $unit, $unit_list ) ) {

					$unit = 'px';
				}

				$validUnits = [ 'px', 'em', 'rem' ];

				if ( ! in_array( $unit, $validUnits ) ) {

					switch ( $unit ) {
						case 'pc':
							$size *= 16;
							$unit  = 'px';
							break;
						case 'vw':
							$size *= 19.2;
							$unit  = 'px';
							break;
						case 'vh':
							$size *= 10.8;
							$unit  = 'px';
							break;
						case '%':
							$size *= 1.6;
							$unit  = 'px';
							break;
						case 'pt':
							$size *= 1.333;
							$unit  = 'px';
							break;
						default:
							break;
					}
				}

				return [
					'size' => $size,
					'unit' => $unit,
				];
			};

			$dimension_converted_value = function ( $value ) {
				$unit_list = [ 'px', 'em', 'rem', '%', '-', 'vw', 'vh', 'pt', 'pc' ];

				if ( ! $value ) {
					return [
						'size' => '',
						'unit' => 'px',
					];
				}

				preg_match( '/^(\d+(?:\.\d+)?)(.*)$/', $value, $matches );

				$size = isset( $matches[1] ) ? (float) $matches[1] : 0;
				$unit = isset( $matches[2] ) ? $matches[2] : '';

				if ( ! in_array( $unit, $unit_list ) ) {

					$unit = 'px';
				}

				if ( 'px' !== $unit ) {

					switch ( $unit ) {
						case 'em':
						case 'pc':
						case 'rem':
							$size *= 14.4;
							$unit  = 'px';
							break;
						case 'vw':
							$size *= 19.2;
							$unit  = 'px';
							break;
						case 'vh':
							$size *= 10.8;
							$unit  = 'px';
							break;
						case '%':
							$size *= 1.6;
							$unit  = 'px';
							break;
						case 'pt':
							$size *= 1.333;
							$unit  = 'px';
							break;
						default:
							break;
					}
				}

				return [
					'size' => $size,
					'unit' => $unit,
				];
			};

			// Migrate the typography options.
			$typography_options = [
				[
					'old_key' => 'elearning_typography_blog_post_title',
					'new_key' => 'elearning_typography_blog_post_title',
				],
				[
					'old_key' => 'elearning_typography_widget_heading',
					'new_key' => 'elearning_typography_widget_heading',
				],
				[
					'old_key' => 'elearning_typography_widget_content',
					'new_key' => 'elearning_typography_widget_content',
				],
				[
					'old_key' => 'elearning_typography_widget_content',
					'new_key' => 'elearning_typography_widget_content',
				],
				[
					'old_key' => 'elearning_base_typography_body',
					'new_key' => 'elearning_base_typography_body',
				],
				[
					'old_key' => 'elearning_base_typography_heading',
					'new_key' => 'elearning_base_typography_heading',
				],
				[
					'old_key' => 'elearning_typography_h1',
					'new_key' => 'elearning_typography_h1',
				],
				[
					'old_key' => 'elearning_typography_h2',
					'new_key' => 'elearning_typography_h2',
				],
				[
					'old_key' => 'elearning_typography_h3',
					'new_key' => 'elearning_typography_h3',
				],
				[
					'old_key' => 'elearning_typography_h4',
					'new_key' => 'elearning_typography_h4',
				],
				[
					'old_key' => 'elearning_typography_h5',
					'new_key' => 'elearning_typography_h5',
				],
				[
					'old_key' => 'elearning_typography_h6',
					'new_key' => 'elearning_typography_h6',
				],
				[
					'old_key' => 'elearning_typography_post_page_title',
					'new_key' => 'elearning_typography_post_page_title',
				],
				[
					'old_key' => 'elearning_typography_primary_menu',
					'new_key' => 'elearning_typography_primary_menu',
				],
				[
					'old_key' => 'elearning_typography_primary_menu_dropdown_item',
					'new_key' => 'elearning_typography_primary_menu_dropdown_item',
				],
				[
					'old_key' => 'elearning_typography_mobile_menu',
					'new_key' => 'elearning_typography_mobile_menu',
				],
				[
					'old_key' => 'elearning_typography_site_title',
					'new_key' => 'elearning_typography_site_title',
				],
				[
					'old_key' => 'elearning_typography_site_description',
					'new_key' => 'elearning_typography_site_description',
				],
			];

			foreach ( $typography_options as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				if ( $old_value ) {

					$new_desktop_font = isset( $old_value['font-size']['desktop'] ) ? $typography_converted_value( $old_value['font-size']['desktop'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_tablet_font = isset( $old_value['font-size']['tablet'] ) ? $typography_converted_value( $old_value['font-size']['tablet'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_mobile_font = isset( $old_value['font-size']['mobile'] ) ? $typography_converted_value( $old_value['font-size']['mobile'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_desktop_line_height = isset( $old_value['line-height']['desktop'] ) ? $typography_converted_value( $old_value['line-height']['desktop'] ) : [
						'size' => '',
						'unit' => '-',
					];

					if ( empty( $new_desktop_line_height['unit'] ) ) {

						$new_desktop_line_height['unit'] = '-';
					}

					$new_tablet_line_height = isset( $old_value['line-height']['tablet'] ) ? $typography_converted_value( $old_value['line-height']['tablet'] ) : [
						'size' => '',
						'unit' => '-',
					];

					if ( empty( $new_tablet_line_height['unit'] ) ) {

						$new_tablet_line_height['unit'] = '-';
					}

					$new_mobile_line_height = isset( $old_value['line-height']['mobile'] ) ? $typography_converted_value( $old_value['line-height']['mobile'] ) : [
						'size' => '',
						'unit' => '-',
					];

					if ( empty( $new_mobile_line_height['unit'] ) ) {

						$new_mobile_line_height['unit'] = '-';
					}

					$new_desktop_letter_spacing = isset( $old_value['letter-spacing']['desktop'] ) ? $typography_converted_value( $old_value['letter-spacing']['desktop'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_tablet_letter_spacing = isset( $old_value['letter-spacing']['tablet'] ) ? $typography_converted_value( $old_value['letter-spacing']['tablet'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_mobile_letter_spacing = isset( $old_value['letter-spacing']['mobile'] ) ? $typography_converted_value( $old_value['letter-spacing']['mobile'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_value = [
						'font-family'    => isset( $old_value['font-family'] ) ? $old_value['font-family'] : '',
						'font-weight'    => isset( $old_value['font-weight'] ) ? $old_value['font-weight'] : '',
						'subsets'        => isset( $old_value['subsets'] ) ? $old_value['subsets'] : '',
						'font-size'      => [
							'desktop' => [
								'size' => $new_desktop_font['size'],
								'unit' => $new_desktop_font['unit'],
							],
							'tablet'  => [
								'size' => $new_tablet_font['size'],
								'unit' => $new_tablet_font['unit'],
							],
							'mobile'  => [
								'size' => $new_mobile_font['size'],
								'unit' => $new_mobile_font['unit'],
							],
						],
						'line-height'    => [
							'desktop' => [
								'size' => $new_desktop_line_height['size'],
								'unit' => $new_desktop_line_height['unit'],
							],
							'tablet'  => [
								'size' => $new_tablet_line_height['size'],
								'unit' => $new_tablet_line_height['unit'],
							],
							'mobile'  => [
								'size' => $new_mobile_line_height['size'],
								'unit' => $new_mobile_line_height['unit'],
							],
						],
						'letter-spacing' => [
							'desktop' => [
								'size' => $new_desktop_letter_spacing['size'],
								'unit' => $new_desktop_letter_spacing['unit'],
							],
							'tablet'  => [
								'size' => $new_tablet_letter_spacing['size'],
								'unit' => $new_tablet_letter_spacing['unit'],
							],
							'mobile'  => [
								'size' => $new_mobile_letter_spacing['size'],
								'unit' => $new_mobile_letter_spacing['unit'],
							],
						],
						'font-style'     => isset( $old_value['font-style'] ) ? $old_value['font-style'] : '',
						'text-transform' => isset( $old_value['text-transform'] ) ? $old_value['text-transform'] : '',
					];

					set_theme_mod( $option['new_key'], $new_value );
				}
			}

			// Breadcrumb typography.
			$breadcrumb_typography = get_theme_mod( 'elearning_breadcrumbs_font_size' );

			if ( $breadcrumb_typography ) {

				$new_value = [
					'font-family' => '',
					'font-weight' => '',
					'font-size'   => [
						'desktop' => [
							'size' => $breadcrumb_typography,
							'unit' => 'px',
						],
						'tablet'  => [
							'size' => '',
							'unit' => '',
						],
						'mobile'  => [
							'size' => '',
							'unit' => '',
						],
					],
				];

				set_theme_mod( 'elearning_breadcrumb_typography', $new_value );
				remove_theme_mod( 'elearning_breadcrumbs_font_size' );
			}

			// Dimension control migration.
			$dimension_option = [
				[
					'old_key' => 'elearning_button_padding',
					'new_key' => 'elearning_button_padding',
				],
				[
					'old_key' => 'elearning_header_button_padding',
					'new_key' => 'elearning_header_button_padding',
				],
				[
					'old_key' => 'elearning_page_title_padding',
					'new_key' => 'elearning_page_title_padding',
				],
			];

			foreach ( $dimension_option as $option ) {

				$old_value = get_theme_mod( $option['old_key'] );

				// Check if the old value have unit key on or not.
				if ( false !== strpos( wp_json_encode( $old_value ), 'unit' ) ) {
					continue;
				}

				if ( $old_value ) {

					$new_top = isset( $old_value['top'] ) ? $dimension_converted_value( $old_value['top'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_right  = isset( $old_value['right'] ) ? $dimension_converted_value( $old_value['right'] ) : [
						'size' => '',
						'unit' => 'px',
					];
					$new_bottom = isset( $old_value['bottom'] ) ? $dimension_converted_value( $old_value['bottom'] ) : [
						'size' => '',
						'unit' => 'px',
					];
					$new_left   = isset( $old_value['left'] ) ? $dimension_converted_value( $old_value['left'] ) : [
						'size' => '',
						'unit' => 'px',
					];

					$new_value = [
						'top'    => $new_top['size'],
						'right'  => $new_right['size'],
						'bottom' => $new_bottom['size'],
						'left'   => $new_left['size'],
						'unit'   => $new_top['unit'],
					];

					set_theme_mod( $option['new_key'], $new_value );

					if ( $option['old_key'] !== $option['new_key'] ) {

						remove_theme_mod( $option['old_key'] );
					}
				}
			}

			// Set flag not to repeat the migration process, run it only once.
			update_option( 'elearning_customizer_migration_v1', true );
		}

		/**
		 * Performs migration for the eLearning theme builder configuration.
		 *
		 * This function handles the migration of the header builder configuration
		 * from an older version to the current version. It performs the following tasks:
		 *
		 * 1. Checks if the migration has already been performed to avoid duplicate migrations.
		 * 2. Sets up a default header builder configuration for desktop and mobile layouts.
		 * 3. Migrates top bar settings if enabled, including left and right content.
		 * 4. Migrates main header settings based on the header style (left, center, right).
		 * 5. Handles the migration of primary menu, header search, and header button placements.
		 * 6. Ensures mobile menu configuration is set up properly.
		 *
		 * The function modifies theme mods to update the header builder configuration
		 * and removes old theme mods that are no longer needed after the migration.
		 *
		 * @return void
		 *
		 * @since 2.0.0
		 */
		public function elearning_builder_migration() {

			$header_builder_config = [
				'desktop' => [
					'top'    => [
						'left'   => [],
						'center' => [],
						'right'  => [],
					],
					'main'   => [
						'left'   => [],
						'center' => [],
						'right'  => [],
					],
					'bottom' => [
						'left'   => [],
						'center' => [],
						'right'  => [],
					],
				],
				'mobile'  => [
					'top'    => [
						'left'   => [],
						'center' => [],
						'right'  => [],
					],
					'main'   => [
						'left'   => [ 'logo' ],
						'center' => [],
						'right'  => [ 'toggle-button' ],
					],
					'bottom' => [
						'left'   => [],
						'center' => [],
						'right'  => [],
					],
				],
				'offset'  => [],
			];

			// Top bar.
			$top_bar_enable = get_theme_mod( 'elearning_header_top', false );
			if ( $top_bar_enable ) {
				$left_content  = get_theme_mod( 'elearning_header_top_left_content', 'text_html' );
				$right_content = get_theme_mod( 'elearning_header_top_right_content', 'text_html' );

				switch ( $left_content ) {
					case 'text_html':
						$left_content_html = get_theme_mod( 'elearning_header_top_left_content_html', '' );
						if ( $left_content_html ) {
							set_theme_mod( 'elearning_header_html_1', $left_content_html );
							remove_theme_mod( 'elearning_header_top_left_content_html' );
						}
						$header_builder_config['desktop']['top']['left'] = [
							'html-1',
						];
						break;
					case 'menu':
						$left_content_menu = get_theme_mod( 'elearning_header_top_left_content_menu', '' );
						if ( $left_content_menu ) {
							set_theme_mod( 'elearning_header_tertiary_menu', $left_content_menu );
							$header_builder_config['desktop']['top']['left'] = [
								'tertiary-menu',
							];
						}
						break;
					case 'widget':
						$header_builder_config['desktop']['top']['left'] = [
							'widget-1',
						];
						break;
				}

				switch ( $right_content ) {
					case 'text_html':
						$right_content_html = get_theme_mod( 'elearning_header_top_right_content_html', '' );
						if ( $right_content_html ) {
							set_theme_mod( 'elearning_header_html_2', $right_content_html );
							remove_theme_mod( 'elearning_header_top_right_content_html' );
						}
						$header_builder_config['desktop']['top']['right'] = [
							'html-2',
						];
						break;
					case 'menu':
						$right_content_menu = get_theme_mod( 'elearning_header_top_right_content_menu', '' );
						if ( $right_content_menu ) {
							set_theme_mod( 'elearning_header_quaternary_menu', $right_content_menu );
							$header_builder_config['desktop']['top']['right'] = [
								'quaternary-menu',
							];
						}
						break;
					case 'widget':
						$header_builder_config['desktop']['top']['right'] = [
							'widget-2',
						];
						break;
				}
			}

			// Main header.
			$primary_menu_enable  = get_theme_mod( 'elearning_primary_menu', false );
			$header_search_enable = get_theme_mod( 'elearning_header_search', true );
			$header_button_text   = get_theme_mod( 'elearning_header_button_text', '' );

			$main_header_style = get_theme_mod( 'elearning_header_main_style', 'tg-site-header--left' );

			switch ( $main_header_style ) {
				case 'tg-site-header--left':
					$header_builder_config['desktop']['main']['left'] = [
						'logo',
					];
					if ( ! $primary_menu_enable ) {
						$header_builder_config['desktop']['main']['right'][] = 'primary-menu';
					}
					if ( $header_button_text ) {
						$header_builder_config['desktop']['main']['right'][] = 'button';
					}
					if ( $header_search_enable ) {
						$header_builder_config['desktop']['main']['right'][] = 'search';
					}
					break;
				case 'tg-site-header--center':
					$header_builder_config['desktop']['main']['center'] = [
						'logo',
					];
					if ( ! $primary_menu_enable ) {
						$header_builder_config['desktop']['bottom']['center'][] = 'primary-menu';
					}
					if ( $header_button_text ) {
						$header_builder_config['desktop']['bottom']['center'][] = 'button';
					}
					if ( $header_search_enable ) {
						$header_builder_config['desktop']['bottom']['center'][] = 'search';
					}
					break;
				case 'tg-site-header--right':
					if ( ! $primary_menu_enable ) {
						$header_builder_config['desktop']['main']['left'][] = 'primary-menu';
					}
					if ( $header_button_text ) {
						$header_builder_config['desktop']['main']['left'][] = 'button';
					}
					if ( $header_search_enable ) {
						$header_builder_config['desktop']['main']['left'][] = 'search';
					}
					$header_builder_config['desktop']['main']['right'] = [
						'logo',
					];
					break;
			}

			// Get the current menu locations
			$menu_locations = get_theme_mod( 'nav_menu_locations' );

			// Check if 'menu-mobile' is set
			if ( ! isset( $menu_locations['menu-mobile'] ) && isset( $menu_locations['menu-primary'] ) ) {
				// Set 'menu-mobile' to the value of 'primary' menu location
				$menu_locations['menu-mobile'] = $menu_locations['menu-primary'];

				// Update the theme mod with the new menu locations
				set_theme_mod( 'nav_menu_locations', $menu_locations );
			}

			$header_builder_config['offset'] = [ 'mobile-menu' ];

			self::fix_components_indices( $header_builder_config );

			set_theme_mod( 'elearning_header_builder', $header_builder_config );

			// Footer builder migration.
			$footer_builder_config = [
				'desktop' => [
					'top'    => [
						'top-1' => [],
						'top-2' => [],
						'top-3' => [],
						'top-4' => [],
						'top-5' => [],
					],
					'main'   => [
						'main-1' => [],
						'main-2' => [],
						'main-3' => [],
						'main-4' => [],
						'main-5' => [],
					],
					'bottom' => [
						'bottom-1' => [],
						'bottom-2' => [],
						'bottom-3' => [],
						'bottom-4' => [],
						'bottom-5' => [],
					],
				],
				'offset'  => [],
			];
			$footer_bar_style      = get_theme_mod( 'elearning_footer_bar_style', 'tg-site-footer-bar--center' );
			$footer_bar_content_1  = get_theme_mod( 'elearning_footer_bar_section_one', 'text_html' );
			$footer_bar_content_2  = get_theme_mod( 'elearning_footer_bar_section_two', 'none' );

			switch ( $footer_bar_content_1 ) {
				case 'text_html':
					$footer_bar_html = get_theme_mod( 'elearning_footer_bar_section_one_html', '' );
					if ( $footer_bar_html ) {
						set_theme_mod( 'elearning_footer_copyright', $footer_bar_html );
						remove_theme_mod( 'elearning_footer_bar_section_one_html' );
					}

					if ( 'tg-site-footer-bar--center' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 1 );
						self::remove_component( 'copyright', $footer_builder_config );
						$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'copyright';
					} elseif ( 'tg-site-footer-bar--left' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 2 );
						self::remove_component( 'copyright', $footer_builder_config );
						$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'copyright';
					}
					break;
				case 'menu':
					$footer_bar_menu = get_theme_mod( 'elearning_footer_bar_section_one_menu', 'none' );
					if ( $footer_bar_menu ) {
						set_theme_mod( 'elearning_footer_menu', $footer_bar_menu );
						remove_theme_mod( 'elearning_footer_bar_section_one_menu' );

						if ( 'tg-site-footer-bar--center' === $footer_bar_style ) {
							set_theme_mod( 'elearning_footer_bottom_area_cols', 1 );
							$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'footer-menu';
						} elseif ( 'tg-site-footer-bar--left' === $footer_bar_style ) {
							set_theme_mod( 'elearning_footer_bottom_area_cols', 2 );
							$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'footer-menu';
						}
					}
					break;
				case 'widget':
					if ( 'tg-site-footer-bar--center' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 1 );
						$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'widget-5';
					} elseif ( 'tg-site-footer-bar--left' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 2 );
						$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'widget-5';
					}
					break;
			}

			switch ( $footer_bar_content_2 ) {
				case 'text_html':
					$footer_bar_html_2 = get_theme_mod( 'elearning_footer_bar_section_two_html', '' );
					if ( $footer_bar_html_2 ) {
						set_theme_mod( 'elearning_footer_html_1', $footer_bar_html_2 );
						remove_theme_mod( 'elearning_footer_bar_section_two_html' );
					}

					if ( 'tg-site-footer-bar--center' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 1 );
						$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'html-1';
					} elseif ( 'tg-site-footer-bar--left' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 2 );
						$footer_builder_config['desktop']['bottom']['bottom-2'][] = 'html-1';
					}
					break;
				case 'menu':
					$footer_bar_menu_2 = get_theme_mod( 'elearning_footer_bar_section_two_menu', '' );
					if ( $footer_bar_menu_2 ) {
						set_theme_mod( 'elearning_footer_menu_2', $footer_bar_menu_2 );
						remove_theme_mod( 'elearning_footer_bar_section_two_menu' );

						if ( 'tg-site-footer-bar--center' === $footer_bar_style ) {
							set_theme_mod( 'elearning_footer_bottom_area_cols', 1 );
							$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'footer-menu-2';
						} elseif ( 'tg-site-footer-bar--left' === $footer_bar_style ) {
							set_theme_mod( 'elearning_footer_bottom_area_cols', 2 );
							$footer_builder_config['desktop']['bottom']['bottom-2'][] = 'footer-menu-2';
						}
					}
					break;
				case 'widget':
					if ( 'tg-site-footer-bar--center' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 1 );
						$footer_builder_config['desktop']['bottom']['bottom-1'][] = 'widget-6';
					} elseif ( 'tg-site-footer-bar--left' === $footer_bar_style ) {
						set_theme_mod( 'elearning_footer_bottom_area_cols', 2 );
						$footer_builder_config['desktop']['bottom']['bottom-2'][] = 'widget-6';
					}
					break;
			}

			// Footer column.
			$footer_column_enable = get_theme_mod( 'elearning_footer_widgets', true );
			if ( $footer_column_enable ) {
				$footer_column_style = get_theme_mod( 'elearning_footer_widgets_style', 'tg-footer-widget-col--four' );

				switch ( $footer_column_style ) {
					case 'tg-footer-widget-col--one':
						set_theme_mod( 'elearning_footer_main_area_cols', 1 );
						if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
							$footer_builder_config['desktop']['main']['main-1'][] = 'widget-1';
						}
						break;
					case 'tg-footer-widget-col--two':
						set_theme_mod( 'elearning_footer_main_area_cols', 2 );
						if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
							$footer_builder_config['desktop']['main']['main-1'][] = 'widget-1';
						}
						if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
							$footer_builder_config['desktop']['main']['main-2'][] = 'widget-2';
						}
						break;
					case 'tg-footer-widget-col--three':
						set_theme_mod( 'elearning_footer_main_area_cols', 3 );
						if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
							$footer_builder_config['desktop']['main']['main-1'][] = 'widget-1';
						}
						if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
							$footer_builder_config['desktop']['main']['main-2'][] = 'widget-2';
						}
						if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
							$footer_builder_config['desktop']['main']['main-3'][] = 'widget-3';
						}
						break;
					case 'tg-footer-widget-col--four':
						set_theme_mod( 'elearning_footer_main_area_cols', 4 );
						if ( is_active_sidebar( 'footer-sidebar-1' ) ) {
							$footer_builder_config['desktop']['main']['main-1'][] = 'widget-1';
						}
						if ( is_active_sidebar( 'footer-sidebar-2' ) ) {
							$footer_builder_config['desktop']['main']['main-2'][] = 'widget-2';
						}
						if ( is_active_sidebar( 'footer-sidebar-3' ) ) {
							$footer_builder_config['desktop']['main']['main-3'][] = 'widget-3';
						}
						if ( is_active_sidebar( 'footer-sidebar-4' ) ) {
							$footer_builder_config['desktop']['main']['main-4'][] = 'widget-4';
						}
						break;
				}
			}

			self::fix_components_indices( $footer_builder_config );
			set_theme_mod( 'elearning_footer_builder', $footer_builder_config );

			// Normal options to builder options.
			function normal_to_builder_option( $old_mod, $new_mod, $_default = '' ) {
				$value = get_theme_mod( $old_mod, '' );
				if ( $value ) {
					set_theme_mod( $new_mod, $value );
					if ( 'elearning_footer_column_widget_text_color' !== $old_mod ) {
						remove_theme_mod( $old_mod );
					}
				} elseif ( $_default ) {
					set_theme_mod( $new_mod, $_default );
				}
			}

			normal_to_builder_option( 'elearning_header_top_text_color', 'elearning_header_top_area_color', '#51585f' );
			normal_to_builder_option(
				'elearning_header_top_bg',
				'elearning_header_top_area_background',
				array(
					'background-color'      => '#e9ecef',
					'background-image'      => '',
					'background-repeat'     => 'repeat',
					'background-position'   => 'center center',
					'background-size'       => 'contain',
					'background-attachment' => 'scroll',
				)
			);
			normal_to_builder_option(
				'elearning_header_main_bg',
				'elearning_header_main_area_background',
				array(
					'background-color'      => '#ffffff',
					'background-image'      => '',
					'background-repeat'     => 'repeat',
					'background-position'   => 'center center',
					'background-size'       => 'contain',
					'background-attachment' => 'scroll',
				)
			);

			$main_header_border_size = get_theme_mod(
				'elearning_header_main_border_bottom_size',
				array(
					'size' => 1,
					'unit' => 'px',
				)
			);
			if ( $main_header_border_size ) {
				$value = [
					'top'    => '0',
					'right'  => '0',
					'bottom' => $main_header_border_size['size'],
					'left'   => '0',
					'units'  => 'px',
				];
				set_theme_mod( 'elearning_header_main_area_border_width', $value );
				remove_theme_mod( 'elearning_header_main_border_bottom_size' );
			}
			normal_to_builder_option( 'elearning_header_main_border_bottom_color', 'elearning_header_main_area_border_color' );
			normal_to_builder_option( 'elearning_typography_site_title', 'elearning_header_site_title_typography' );
			normal_to_builder_option( 'elearning_typography_site_description', 'elearning_header_site_tagline_typography' );
			normal_to_builder_option( 'elearning_site_identity_color', 'elearning_header_site_identity_color' );
			normal_to_builder_option( 'elearning_primary_menu_border_bottom_size', 'elearning_header_menu_border_bottom_width' );
			normal_to_builder_option( 'elearning_primary_menu_border_bottom_color', 'elearning_header_menu_border_bottom_color' );
			normal_to_builder_option( 'elearning_primary_menu_text_color', 'elearning_header_main_menu_color' );
			normal_to_builder_option( 'elearning_primary_menu_text_hover_color', 'elearning_header_main_menu_hover_color' );
			normal_to_builder_option( 'elearning_header_main_menu_active_color', 'elearning_primary_menu_text_active_color' );
			normal_to_builder_option( 'elearning_typography_primary_menu', 'elearning_header_main_menu_typography' );
			normal_to_builder_option( 'elearning_typography_primary_menu_dropdown_item', 'elearning_header_sub_menu_typography' );
			normal_to_builder_option( 'elearning_header_button_text_color', 'elearning_header_button_color', '#ffffff' );
			normal_to_builder_option( 'elearning_header_button_text_hover_color', 'elearning_header_button_hover_color', '#ffffff' );
			normal_to_builder_option( 'elearning_header_button_bg_color', 'elearning_header_button_background_color', 'var(--elearning-color-1, #269bd1)' );
			normal_to_builder_option( 'elearning_header_button_bg_hover_color', 'elearning_header_button_background_hover_color', '#1e7ba6' );
			normal_to_builder_option( 'elearning_header_button_roundness', 'elearning_header_button_border_radius' );
			normal_to_builder_option( 'elearning_footer_bar_text_color', 'elearning_footer_bottom_area_color' );
			normal_to_builder_option( 'elearning_footer_bar_link_color', 'elearning_footer_copyright_link_color' );
			normal_to_builder_option( 'elearning_footer_bar_link_hover_color', 'elearning_footer_copyright_link_hover_color' );
			normal_to_builder_option( 'elearning_footer_bar_border_top_color', 'elearning_footer_bottom_area_border_color', '#e9ecef' );
			normal_to_builder_option( 'elearning_footer_widgets_border_top_color', 'elearning_footer_main_area_border_color', '#e9ecef' );
			normal_to_builder_option( 'elearning_footer_widgets_item_border_bottom_width', 'elearning_footer_widgets_item_border_bottom_width' );
			normal_to_builder_option( 'elearning_footer_widgets_item_border_bottom_color', 'elearning_footer_widgets_item_border_bottom_color', '#e9ecef' );

			normal_to_builder_option(
				'elearning_footer_bar_bg',
				'elearning_footer_bottom_area_background',
				array(
					'background-color'      => '#ffffff',
					'background-image'      => '',
					'background-repeat'     => 'repeat',
					'background-position'   => 'center center',
					'background-size'       => 'contain',
					'background-attachment' => 'scroll',
				)
			);

			$footer_bar_border_width = get_theme_mod(
				'elearning_footer_bar_border_top_width',
				array(
					'size' => 0,
					'unit' => 'px',
				)
			);
			if ( $footer_bar_border_width ) {
				$value = [
					'top'    => $footer_bar_border_width['size'],
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0',
					'units'  => 'px',
				];
				set_theme_mod( 'elearning_footer_bottom_area_border_width', $value );
				remove_theme_mod( 'elearning_footer_bar_border_top_width' );
			}

			normal_to_builder_option(
				'elearning_footer_widgets_bg',
				'elearning_footer_main_area_background',
				array(
					'background-color'      => '#ffffff',
					'background-image'      => '',
					'background-repeat'     => 'repeat',
					'background-position'   => 'center center',
					'background-size'       => 'contain',
					'background-attachment' => 'scroll',
				)
			);

			$widget_title_color = get_theme_mod( 'elearning_footer_widgets_title_color', '' );
			if ( $widget_title_color ) {
				set_theme_mod( 'elearning_footer_widget_1_title_color', $widget_title_color );
				set_theme_mod( 'elearning_footer_widget_2_title_color', $widget_title_color );
				set_theme_mod( 'elearning_footer_widget_3_title_color', $widget_title_color );
				set_theme_mod( 'elearning_footer_widget_4_title_color', $widget_title_color );
				set_theme_mod( 'elearning_footer_widget_5_title_color', $widget_title_color );
				set_theme_mod( 'elearning_footer_widget_6_title_color', $widget_title_color );
				set_theme_mod( 'elearning_footer_widget_7_title_color', $widget_title_color );
				remove_theme_mod( 'elearning_footer_widgets_title_color' );
			}

			$widget_content_color = get_theme_mod( 'elearning_footer_widgets_text_color', '' );
			if ( $widget_content_color ) {
				set_theme_mod( 'elearning_footer_widget_1_content_color', $widget_content_color );
				set_theme_mod( 'elearning_footer_widget_2_content_color', $widget_content_color );
				set_theme_mod( 'elearning_footer_widget_3_content_color', $widget_content_color );
				set_theme_mod( 'elearning_footer_widget_4_content_color', $widget_content_color );
				set_theme_mod( 'elearning_footer_widget_5_content_color', $widget_content_color );
				set_theme_mod( 'elearning_footer_widget_6_content_color', $widget_content_color );
				set_theme_mod( 'elearning_footer_widget_7_content_color', $widget_content_color );
				remove_theme_mod( 'elearning_footer_widgets_text_color' );
			}

			$widget_link_color = get_theme_mod( 'elearning_footer_widgets_link_color', '' );
			if ( $widget_link_color ) {
				set_theme_mod( 'elearning_footer_widget_1_link_color', $widget_link_color );
				set_theme_mod( 'elearning_footer_widget_2_link_color', $widget_link_color );
				set_theme_mod( 'elearning_footer_widget_3_link_color', $widget_link_color );
				set_theme_mod( 'elearning_footer_widget_4_link_color', $widget_link_color );
				set_theme_mod( 'elearning_footer_widget_5_link_color', $widget_link_color );
				set_theme_mod( 'elearning_footer_widget_6_link_color', $widget_link_color );
				set_theme_mod( 'elearning_footer_widget_7_link_color', $widget_link_color );
				remove_theme_mod( 'elearning_footer_widgets_link_color' );
			}

			$widget_link_hover_color = get_theme_mod( 'elearning_footer_widgets_link_hover_color', '' );
			if ( $widget_link_hover_color ) {
				set_theme_mod( 'elearning_footer_widget_1_link_hover_color', $widget_link_hover_color );
				set_theme_mod( 'elearning_footer_widget_2_link_hover_color', $widget_link_hover_color );
				set_theme_mod( 'elearning_footer_widget_3_link_hover_color', $widget_link_hover_color );
				set_theme_mod( 'elearning_footer_widget_4_link_hover_color', $widget_link_hover_color );
				set_theme_mod( 'elearning_footer_widget_5_link_hover_color', $widget_link_hover_color );
				set_theme_mod( 'elearning_footer_widget_6_link_hover_color', $widget_link_hover_color );
				set_theme_mod( 'elearning_footer_widget_7_link_hover_color', $widget_link_hover_color );
				remove_theme_mod( 'elearning_footer_widgets_link_hover_color' );
			}

			$footer_widget_border_width = get_theme_mod(
				'elearning_footer_widgets_border_top_width',
				array(
					'size' => 1,
					'unit' => 'px',
				)
			);
			if ( $footer_widget_border_width ) {
				$value = [
					'top'    => $footer_widget_border_width['size'],
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0',
					'units'  => 'px',
				];
				set_theme_mod( 'elearning_footer_main_area_border_width', $value );
				remove_theme_mod( 'elearning_footer_widgets_border_top_width' );
			}

			$transparent_header = get_theme_mod( 'elearning_transparent_header' );
			if ( $transparent_header ) {
				set_theme_mod( 'elearning_header_search_icon_color', '#ffffff' );
				set_theme_mod( 'elearning_transparent_header', true );
			}

			$transparent_header_latest_posts = get_theme_mod( 'elearning_transparent_header_latest_posts' );
			if ( $transparent_header_latest_posts ) {
				set_theme_mod( 'elearning_transparent_header_latest_posts', true );
			}

			$transparent_header_404 = get_theme_mod( 'elearning_transparent_header_custom' );
			if ( $transparent_header_404 ) {
				set_theme_mod( 'elearning_transparent_header_custom', true );
			}

			update_option( 'elearning_builder_migration', true );
		}

		/**
		 * Migrates outside background settings to a new theme mod.
		 *
		 * This function handles the migration of various background-related theme mods
		 * to a single, consolidated theme mod. It performs the following operations:
		 *
		 * 1. Checks if the migration has already been performed to avoid duplicate migrations.
		 * 2. Retrieves individual background-related theme mods (color, image, preset, position, size, repeat, attachment).
		 * 3. If any of these theme mods exist, it consolidates them into a single array.
		 * 4. Sets the new consolidated theme mod 'elearning_outside_container_background'.
		 * 5. Removes the old individual theme mods.
		 * 6. Updates an option to mark the migration as complete.
		 *
		 * This migration is necessary to update the theme's handling of background settings,
		 * moving from individual settings to a more flexible, consolidated approach.
		 *
		 * @return void
		 *
		 * @since 2.0.0
		 */
		public function elearning_outside_background_migration() {

			if ( get_option( 'elearning_outside_background_migration' ) ) {
				return;
			}

			$background_color      = get_theme_mod( 'background_color' );
			$background_image      = get_theme_mod( 'background_image' );
			$background_preset     = get_theme_mod( 'background_preset' );
			$background_position   = get_theme_mod( 'background_position' );
			$background_size       = get_theme_mod( 'background_size' );
			$background_repeat     = get_theme_mod( 'background_repeat' );
			$background_attachment = get_theme_mod( 'background_attachment' );

			if ( $background_color || $background_image || $background_preset || $background_position || $background_size || $background_repeat || $background_attachment ) {
				$background_value = array(
					'background-color'      => $background_color,
					'background-image'      => $background_image,
					'background-repeat'     => $background_repeat,
					'background-position'   => $background_position,
					'background-size'       => $background_size,
					'background-attachment' => $background_attachment,
				);

				set_theme_mod( 'elearning_outside_container_background', $background_value );
				remove_theme_mod( 'background_color' );
				remove_theme_mod( 'background_image' );
				remove_theme_mod( 'background_preset' );
				remove_theme_mod( 'background_position' );
				remove_theme_mod( 'background_size' );
				remove_theme_mod( 'background_attachment' );
				remove_theme_mod( 'background_repeat' );
			}

			update_option( 'elearning_outside_background_migration', true );
		}

		/**
		 * Recursively removes a specified component from an array.
		 *
		 * This static function traverses through a multidimensional array and removes
		 * all occurrences of a specified component. It performs the following operations:
		 *
		 * 1. Iterates through each element of the input array.
		 * 2. If an element is an array, it recursively calls itself on that sub-array.
		 * 3. If an element matches the component to remove, it unsets that element.
		 * 4. After processing, if the array keys are sequential integers, it reindexes the array.
		 *
		 * @param mixed $component_to_remove The component to be removed from the array.
		 * @param array &$_array             The array to remove the component from (passed by reference).
		 *
		 * @return void The function modifies the input array directly.
		 *
		 * @since 2.0.0
		 */
		public static function remove_component( $component_to_remove, &$_array ) {
			foreach ( $_array as $key => &$value ) {
				if ( is_array( $value ) ) {
					self::remove_component( $component_to_remove, $value );
				} else { // phpcs:ignore
					if ( $value === $component_to_remove ) {
						unset( $_array[ $key ] );
					}
				}
			}
			if ( array_values( $_array ) === $_array ) {
				$_array = array_values( $_array );
			}
		}

		/**
		 * Recursively fixes the indices of components in a multidimensional array.
		 *
		 * This static function traverses through a multidimensional array and ensures
		 * that any sub-arrays with numeric keys are reindexed to have sequential integer keys.
		 * It performs the following operations:
		 *
		 * 1. Iterates through each element of the input array.
		 * 2. If an element is an array, it recursively calls itself on that sub-array.
		 * 3. Checks if the current sub-array has all numeric keys.
		 * 4. If all keys are numeric, it reindexes the array using array_values().
		 *
		 * @param array &$_array The array to fix indices for (passed by reference).
		 *
		 * @return bool Returns true if any changes were made, false otherwise.
		 *
		 * @since 2.0.0
		 */
		public static function fix_components_indices( &$_array ) {
			$fixed = false;

			foreach ( $_array as &$value ) {
				if ( is_array( $value ) ) {
					if ( ! self::fix_components_indices( $value ) ) {
						$numeric_keys = false;
						$all_numeric  = true;
						foreach ( array_keys( $value ) as $key ) {
							if ( is_numeric( $key ) ) {
								$numeric_keys = true;
							} else {
								$all_numeric = false;
								break;
							}
						}
						if ( $numeric_keys && $all_numeric ) {
							$value = array_values( $value );
							$fixed = true;
						}
					}
				}
			}

			return $fixed;
		}

		/**
		 * Return the value for customize migration on demo import.
		 *
		 * @return bool
		 */
		public static function demo_import_migration() {

			if ( isset( $_GET['elearning_notice_dismiss'] ) && isset( $_GET['_elearning_demo_import_migration_notice_dismiss_nonce'] ) ) {

				if ( ! wp_verify_nonce( wp_unslash( $_GET['_elearning_demo_import_migration_notice_dismiss_nonce'] ), 'elearning_demo_import_migration_notice_dismiss_nonce' ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

					wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'elearning' ) );
				}

				return true;
			}

			return false;
		}

		/**
		 * Determines whether to run the customizer migration.
		 *
		 * This static function checks if the customizer migration needs to be executed.
		 * It performs the following checks:
		 *
		 * 1. Verifies if the migration has already been run by checking a specific option.
		 * 2. If the migration has been run before, it returns false.
		 * 3. If not previously migrated, it checks for the presence of old theme mods.
		 * 4. Specifically looks for theme mods with the 'elearning_' prefix.
		 *
		 * The function is designed to prevent unnecessary migrations and ensure
		 * that the migration only runs when old theme data is present.
		 *
		 * @return bool Returns true if migration should be run, false otherwise.
		 *
		 * @since 2.0.0
		 */
		public static function maybe_run_migration() {

			/**
			 * Check migration is already run or not.
			 * If migration is already run then return false.
			 *
			 */
			$migrated = get_option( 'elearning_customizer_migration_v1' );

			if ( $migrated ) {

				return false;
			}

			/**
			 * If user don't import the demo and upgrade the theme.
			 * Then we need to run the migration.
			 *
			 */
			$result     = false;
			$theme_mods = get_theme_mods();

			update_option( 'elearning_customizer_old_data', $theme_mods );

			foreach ( $theme_mods as $key => $_ ) {

				if ( strpos( $key, 'elearning_' ) !== false ) {

					$result = true;
					break;
				}
			}

			return $result;
		}
	}

	new eLearning_Migration();

}
