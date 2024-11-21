<?php
/**
 * Additional setup After theme setup.
 *
 * @package elearning
 *
 * TODO: @since.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_After_Setup_Theme' ) ) {

	/**
	 * After setup theme.
	 */
	class eLearning_After_Setup_Theme {

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

			add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
			add_action( 'init', array( $this, 'version_check' ) );
		}

		/**
		 * Checks the current theme version against the stored version.
		 * If the current version is greater, it updates the stored version and triggers an action.
		 *
		 * @return void
		 */
		public function version_check() {
			$old_version = get_option( 'elearning_version' );

			if ( empty( $old_version ) || version_compare( $old_version, ELEARNING_THEME_VERSION, '<' ) ) {
				// Update the version number.
				update_option( 'elearning_version', ELEARNING_THEME_VERSION );

				do_action( 'elearning_version_update', ELEARNING_THEME_VERSION, $old_version );
			}
		}

		/**
		 * Set up theme defaults and registers support for various WordPress features.
		 *
		 * @return void
		 */
		public function setup_theme() {

			// Make theme available for translation.
			load_theme_textdomain( 'elearning', get_template_directory() . '/languages' );

			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );

			// Let WordPress manage the document title.
			add_theme_support( 'title-tag' );

			// Enable support for Post Thumbnails on posts and pages.
			add_theme_support( 'post-thumbnails' );

			// Register menu.
			$menus = array(
				'menu-primary'   => esc_html__( 'Primary Menu', 'elearning' ),
				'menu-secondary' => esc_html__( 'Secondary Menu', 'elearning' ),
				'menu-mobile'    => esc_html__( 'Mobile Menu', 'elearning' ),
			);

			register_nav_menus( $menus );

			/*
			 * Switch default core markup for search form, comment form, and comments
			 * to output valid HTML5.
			 */
			add_theme_support(
				'html5',
				array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
				)
			);

			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );

			/**
			 * Add support for core custom logo.
			 *
			 * @link https://codex.wordpress.org/Theme_Logo
			 */
			add_theme_support(
				'custom-logo',
				array(
					'width'       => 170,
					'height'      => 60,
					'flex-width'  => true,
					'flex-height' => true,
				)
			);

			// Custom background support.
			add_theme_support( 'custom-background' );

			// Gutenberg Wide/fullwidth support.
			add_theme_support( 'align-wide' );

			// Add support for Block Styles.
			add_theme_support( 'wp-block-styles' );

			// AMP support.
			if ( defined( 'AMP__VERSION' ) && ( ! version_compare( AMP__VERSION, '1.0.0', '<' ) ) ) {

				add_theme_support(
					'amp',
					apply_filters(
						'elearning_amp_support_filter',
						array(
							'paired' => true,
						)
					)
				);
			}
		}
	}
}

eLearning_After_Setup_Theme::get_instance();
