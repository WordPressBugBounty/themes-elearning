<?php
/**
 * Load CSS & Javascript files.
 *
 * @package elearning
 *
 * TODO: @since.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Enqueue_Scripts' ) ) {

	/**
	 * Enqueue Scripts.
	 */
	class eLearning_Enqueue_Scripts {

		/**
		 * Instance.
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator.
		 */
		public static function get_instance() {

			if ( ! isset( self::$instance ) ) {

				self::$instance = new self();
			}

			return self::$instance;
		}

		/**
		 * Constructor.
		 */
		private function __construct() {

			$this->setup_hooks();
		}

		/**
		 * Define hooks.
		 *
		 * @return void
		 */
		public function setup_hooks() {

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
			add_action( 'enqueue_block_editor_assets', array( $this, 'block_editor_styles' ), 1 );
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'elearning_inline_customizer_css' ) );
		}

		/**
		 * Enqueue scripts and styles.
		 *
		 * @return void
		 * TODO: Refactor this, split code inside method.
		 */
		public function enqueue_scripts() {

			$suffix = elearning_get_script_suffix();

			// FontAwesome.
			global $customind;

			$fontawesome_path = $customind->get_asset_url( 'all.min.css', 'assets/fontawesome/v6/css', false );

			wp_enqueue_style( 'font-awesome-all', $fontawesome_path, array(), '6.2.4' );

			// Local Google fonts locally.
			$host_fonts_locally = get_theme_mod( 'elearning_load_google_fonts_locally', false );

			$typography_ids = apply_filters(
				'elearning_enqueue_scripts_typography_ids',
				array(
					'elearning_typography_blog_post_title',
					'elearning_typography_widget_heading',
					'elearning_typography_widget_content',
					'elearning_footer_copyright_typography',
					'elearning_footer_menu_2_typography',
					'elearning_footer_menu_typography',
					'elearning_footer_widget_1_title_typography',
					'elearning_footer_widget_1_content_typography',
					'elearning_footer_widget_2_title_typography',
					'elearning_footer_widget_2_content_typography',
					'elearning_footer_widget_3_title_typography',
					'elearning_footer_widget_3_content_typography',
					'elearning_footer_widget_4_title_typography',
					'elearning_footer_widget_5_title_typography',
					'elearning_footer_widget_6_title_typography',
					'elearning_footer_widget_4_content_typography',
					'elearning_footer_widget_5_content_typography',
					'elearning_footer_widget_6_content_typography',
					'elearning_base_typography_body',
					'elearning_base_typography_heading',
					'elearning_typography_h1',
					'elearning_typography_h2',
					'elearning_typography_h3',
					'elearning_typography_h4',
					'elearning_typography_h5',
					'elearning_typography_h6',
					'elearning_header_site_title_typography',
					'elearning_header_site_tagline_typography',
					'elearning_header_mobile_menu_typography',
					'elearning_header_main_menu_typography',
					'elearning_header_sub_menu_typography',
					'elearning_header_quaternary_menu_typography',
					'elearning_header_secondary_menu_typography',
					'elearning_header_secondary_sub_menu_typography',
					'elearning_header_tertiary_menu_typography',
					'elearning_header_tertiary_sub_menu_typography',
					'elearning_widget_1_title_typography',
					'elearning_widget_2_title_typography',
					'elearning_widget_1_content_typography',
					'elearning_widget_2_content_typography',
					'elearning_breadcrumb_typography',
					'elearning_typography_post_page_title',
					'elearning_typography_primary_menu',
					'elearning_typography_primary_menu_dropdown_item',
					'elearning_typography_mobile_menu',
					'elearning_typography_site_title',
					'elearning_typography_site_description',
					'elearning_button_typography',
					'elearning_header_button_typography',
				)
			);

			$google_fonts_url = \Customind\Core\get_google_fonts_url_by_ids( $typography_ids, $host_fonts_locally );

			if ( $google_fonts_url ) {
				wp_enqueue_style( 'elearning_google_fonts', $google_fonts_url, array(), ELEARNING_THEME_VERSION, 'all' );
			}

			// Theme style.
			wp_register_style(
				'elearning-style',
				get_stylesheet_uri(),
				array(),
				ELEARNING_THEME_VERSION
			);

			wp_enqueue_style( 'elearning-style' );

			// Support RTL.
			wp_style_add_data( 'elearning-style', 'rtl', 'replace' );

			/**
			 * Dynamic CSS.
			 */
			// Dynamically generated styles from options.
			add_filter( 'elearning_dynamic_theme_css', array( 'eLearning_Dynamic_CSS', 'render_output' ) );
			add_filter( 'elearning_dynamic_theme_css', array( 'eLearning_Dynamic_CSS', 'render_builder_output' ) );

			// Generate dynamic CSS to add inline styles for the theme.
			$theme_dynamic_css = apply_filters( 'elearning_dynamic_theme_css', '' );

			// Load dynamic CSS.
			wp_add_inline_style( 'elearning-style', $theme_dynamic_css );

			wp_enqueue_style( 'elearning-mto-style', get_template_directory_uri() . '/masteriyo.css', array( 'masteriyo-public' ), ELEARNING_THEME_VERSION );

			/**
			 * Scripts.
			 */
			// Do not load scripts if AMP.
			if ( elearning_is_amp() ) {
				return;
			}

			wp_enqueue_script( 'elearning-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . '.js', array(), ELEARNING_THEME_VERSION, true );
			wp_enqueue_script( 'elearning-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), ELEARNING_THEME_VERSION, true );
			wp_enqueue_script( 'elearning-custom', get_template_directory_uri() . '/assets/js/elearning-custom' . $suffix . '.js', array(), ELEARNING_THEME_VERSION, true );

			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Enqueue block editor styles.
		 *
		 * TODO: @since.
		 */
		public function block_editor_styles() {

			wp_enqueue_style( 'elearning-block-editor-styles', ELEARNING_PARENT_URI . '/style-editor-block.css', array(), ELEARNING_THEME_VERSION );
		}

		public function elearning_inline_customizer_css() {
			wp_add_inline_style(
				'customize-controls',
				'
		        #customize-control-elearning_header_site_identity_general_heading .customind-control .font-normal{
		        font-weight: 600;
		        }

		        #customize-control-elearning_header_media_heading .customind-control .font-normal{
		        font-weight: 600;
		        }

		        #customize-control-elearning_header_media_heading .customind-control {
		        border-bottom: 1px solid #e5e5e5;
		        }

		        #customize-control-elearning_header_site_identity_general_heading .customind-control {
		        border-bottom: 1px solid #e5e5e5;
		        height: 40px;
		        }

		        #customize-control-blogname #_customize-input-blogname {
		        height: 40px;
		        padding-top: 18px;
		        }

		        #customize-control-blogdescription #_customize-input-blogdescription {
		        height: 40px;
		        }

		        .control-section .customind-control:not([data-control-type="customind-builder"]) {
				   max-width: unset;
				}

				.customind-control[data-control-type="customind-accordion"] .-mx-4 > label {
					height: 56px;
				}

				#customize-control-elearning_demo_migrated_heading {
				display: none;
				}

				#sub-accordion-section-elearning_header_builder_section {
                     background: #F0F0F1 !important;
				}


			#accordion-section-elearning_transparent_header {
			    display: block !important;
			}

			#accordion-section-elearning_transparent_header {
				    position: absolute;
				    bottom: 40px;
				    width: 100%;
			}

			#accordion-section-elearning_transparent_header {
			    display: block !important;
			}

			#accordion-section-elearning_transparent_header {
				    position: absolute;
				    bottom: 40px;
				    width: 100%;
			}

			#accordion-section-elearning_transparent_header .accordion-section-title{
			    margin: 0 10px;
                border-radius: 4px;
			}

			#accordion-section-elearning_transparent_header .accordion-section-title button{
			 font-weight: 400;
			}

			#sub-accordion-panel-elearning_header_builder.current-panel {
			    height: 840px !important;
                 position: relative;
                     background: #F0F0F1;
				}

				#customize-control-site_icon {
			    padding: 0px 12px;
			    width: 93%;
				}

				#customize-control-blogname {
			    padding: 0px 12px;
				    width: 92%;
				    padding-top: 10px;
				    margin-top: 0;
				    background: #FFF;
				}

				#customize-control-blogdescription {
			    padding: 0px 12px;
			    width: 90%;
				}

				#sub-accordion-section-elearning_footer_builder_section {
				background: #F0F0F1 !important;
				}

				.accordion-section-title button.accordion-trigger:focus{
				    box-shadow: 0 0 0 0 #2271b1;
			}

			#accordion-section-title_tagline {
			    margin-top: 32px;
			    border-top: 1px solid #dcdcde !important;
			}

			#customize-control-header_video,.customize-section-description-container,#customize-control-external_header_video,#customize-control-header_image {
			padding: 0 10px;
			width: 94%;
			}

			#customize-controls .customize-info{
			margin-bottom: 0;
			}

			#accordion-section-elearning_customize_review_link_section .accordion-section-title{
			    padding: 10px 30px 11px 14px;
			}

			.customind-footer-types {
			display:none !important;
			}

			.control-section-customind-section.open .section-meta:has(not(.customize-control-customind-tabs)){
			margin-bottom: 10px !important;
			}

			.customize-section-title-nav_menus-heading {
			margin-top:10px;
			}
		    '
			);
		}
	}

}

eLearning_Enqueue_Scripts::get_instance();
