<?php
/**
 * elearning Customizer Class
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/functions.php';

if ( ! class_exists( 'elearning_Customizer' ) ) :

	/**
	 * elearning Customizer class
	 */
	class eLearning_Customizer {
		/**
		 * Constructor - Setup customizer
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'elearning_customize_register' ) );
			add_action( 'customize_register', array( $this, 'on_customizer_register' ) );
			add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ), 11 );
			add_filter( 'customizer_widgets_section_args', [ $this, 'modify_widgets_panel' ], 10, 3 );
		}

		public function on_customizer_register( $wp_customize ) {
			$this->includes();
			do_action( 'elearning_customize_register', $wp_customize );
		}

		protected function includes() {
			require_once __DIR__ . '/panels-sections/panels-sections.php';
			require_once __DIR__ . '/options/options.php';
		}

		/**
		 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
		 *
		 * @since 3.0.0
		 */
		public function customize_preview_js() {

			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_enqueue_script(
				'elearning-customizer-preview',
				ELEARNING_PARENT_CUSTOMIZER_URI . '/assets/js/elearning-customize-preview' . $suffix . '.js',
				array(
					'customize-preview',
					'wp-hooks',
				),
				ELEARNING_THEME_VERSION,
				true
			);
		}

		/**
		 * Include the required files for extending the custom Customize controls.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		public function elearning_customize_register( $wp_customize ) {

			// Override default.
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/override-defaults.php';
			require ELEARNING_PARENT_CUSTOMIZER_DIR . '/class-elearning-customizer-partials.php';
		}

		/**
		 * Modify widgets panel.
		 *
		 * @param array      $section_args Array of Customizer widget section arguments.
		 * @param string     $section_id   Customizer section ID.
		 * @param int|string $sidebar_id   Sidebar ID.
		 */
		public function modify_widgets_panel( array $section_args, string $section_id, $sidebar_id ): array {
			$footer_widgets = [
				'footer-sidebar-1',
				'footer-sidebar-2',
				'footer-sidebar-3',
				'footer-sidebar-4',
				'footer-bar-left-sidebar',
				'footer-bar-right-sidebar',
			];
			$header_widgets = [
				'header-top-left-sidebar',
				'header-top-right-sidebar',
			];

			if ( in_array( $sidebar_id, $footer_widgets, true ) ) {
				$section_args['panel'] = 'elearning_footer_builder';
			}

			if ( in_array( $sidebar_id, $header_widgets, true ) ) {
				$section_args['panel'] = 'elearning_header_builder';
			}

			return $section_args;
		}
	}
	new eLearning_Customizer();
endif;
