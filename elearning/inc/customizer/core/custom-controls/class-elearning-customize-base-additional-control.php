<?php
/**
 * eLearning customizer base additional control class for theme customize options.
 *
 * Class eLearning_Customize_Base_Additional_Control
 *
 * @package    ThemeGrill
 * @subpackage eLearning
 * @since      eLearning 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class eLearning_Customize_Base_Additional_Control
 */
class eLearning_Customize_Base_Additional_Control extends WP_Customize_Control {

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		/**
		 * Enqueue required Customize Controls CSS files.
		 */
		// SelectWoo CSS library file.
		wp_enqueue_style(
			'selectWoo',
			$this->get_assets_url() . '/assets/css/selectWoo' . $suffix . '.css',
			array(),
			ELEARNING_THEME_VERSION
		);

		wp_enqueue_style(
			'jquery-ui',
			$this->get_assets_url() . '/assets/css/jquery-ui/jquery-ui' . $suffix . '.css',
			array(),
			ELEARNING_THEME_VERSION
		);
		wp_style_add_data( 'jquery-ui', 'rtl', 'replace' );

		// Main CSS file.
		wp_enqueue_style(
			'elearning-customize-controls',
			$this->get_assets_url() . '/assets/css/customize-controls' . $suffix . '.css',
			array( 'wp-color-picker' ),
			ELEARNING_THEME_VERSION
		);
		wp_style_add_data( 'elearning-customize-controls', 'rtl', 'replace' );

		/**
		 * Enqueue required Customize Controls JS files.
		 */
		// SelectWoo JS library file.
		wp_enqueue_script(
			'selectWoo',
			$this->get_assets_url() . '/assets/js/selectWoo' . $suffix . '.js',
			array(),
			ELEARNING_THEME_VERSION,
			true
		);

		// WP Color Picker Alpha JS library file.
		wp_enqueue_script(
			'wp-color-picker-alpha',
			$this->get_assets_url() . '/assets/js/wp-color-picker-alpha' . $suffix . '.js',
			array(
				'wp-color-picker',
			),
			ELEARNING_THEME_VERSION,
			true
		);

		// Main JS file.
		wp_enqueue_script(
			'elearning-customize-controls',
			$this->get_assets_url() . '/assets/js/customize-controls' . $suffix . '.js',
			array(
				'jquery',
				'jquery-ui-datepicker',
				'wp-tinymce',
			),
			ELEARNING_THEME_VERSION,
			true
		);

	}

	public function get_assets_url() {
		// Get correct URL and path to wp-content.
		$content_url = untrailingslashit( dirname( dirname( get_stylesheet_directory_uri() ) ) );
		$content_dir = wp_normalize_path( untrailingslashit( WP_CONTENT_DIR ) );

		$url = str_replace( $content_dir, $content_url, wp_normalize_path( __DIR__ ) );
		$url = set_url_scheme( $url );

		return $url;
	}

}
