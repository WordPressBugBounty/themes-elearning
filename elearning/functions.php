<?php
/**
 * eLearning functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package eLearning
 * @since 1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Define constants.
 */
define( 'ELEARNING_THEME_VERSION', wp_get_theme( 'elearning' )->get( 'Version' ) );
define( 'ELEARNING_PARENT_DIR', get_template_directory() );
define( 'ELEARNING_PARENT_URI', get_template_directory_uri() );
define( 'ELEARNING_PARENT_INC_DIR', ELEARNING_PARENT_DIR . '/inc' );
define( 'ELEARNING_PARENT_INC_URI', ELEARNING_PARENT_URI . '/inc' );
define( 'ELEARNING_PARENT_INC_ICON_URI', ELEARNING_PARENT_URI . '/assets/img/icons' );
define( 'ELEARNING_PARENT_CUSTOMIZER_DIR', ELEARNING_PARENT_INC_DIR . '/customizer' );
define( 'ELEARNING_PARENT_CUSTOMIZER_URI', get_template_directory_uri() . '/inc/customizer' );

if ( ! function_exists( 'elearning_content_width' ) ) {

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	function elearning_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'elearning_content_width', 640 );
	}
	add_action( 'after_setup_theme', 'elearning_content_width', 0 );
}

// WooCommerce.
if ( class_exists( 'WooCommerce' ) ) {

	require ELEARNING_PARENT_INC_DIR . '/compatibility/woocommerce/class-elearning-woocommerce.php';
}

// AMP support files.
if ( defined( 'AMP__VERSION' ) && ( ! version_compare( AMP__VERSION, '1.0.0', '<' ) ) ) {
	require_once ELEARNING_PARENT_INC_DIR . '/compatibility/amp/class-elearning-amp.php';
}

/**
 * Include files.
 */
// Load customind.
require_once ELEARNING_PARENT_INC_DIR . '/customizer/customind/init.php';

/**
 * @var \Customind\Core\Customind
 */
global $customind;
$customind->set_css_var_prefix( 'elearning' );
$customind->set_i18n_data(
	[
		'domain' => 'elearning',
	]
);

add_action(
	'after_setup_theme',
	function () use ( $customind ) {
		$customind->set_section_i18n(
			[
				/* Translators: 1: Panel Title. */
				'customizing-action' => __( 'Customizing ▶ %s', 'elearning' ),
				'customizing'        => __( 'Customizing', 'elearning' ),
			]
		);
	}
);

require ELEARNING_PARENT_INC_DIR . '/class-elearning-utils.php';
require ELEARNING_PARENT_INC_DIR . '/hooks.php';
require ELEARNING_PARENT_INC_DIR . '/structure/header.php';
require ELEARNING_PARENT_INC_DIR . '/structure/content.php';
require ELEARNING_PARENT_INC_DIR . '/structure/footer.php';
require ELEARNING_PARENT_INC_DIR . '/core/custom-header.php';
require ELEARNING_PARENT_INC_DIR . '/class-elearning-dynamic-filter.php';
require ELEARNING_PARENT_INC_DIR . '/builder-template-tags.php';
require ELEARNING_PARENT_INC_DIR . '/template-tags.php';
require ELEARNING_PARENT_INC_DIR . '/template-functions.php';
// After setup theme.
require ELEARNING_PARENT_INC_DIR . '/core/class-elearning-after-setup-theme.php';

// Load scripts.
require ELEARNING_PARENT_INC_DIR . '/core/class-elearning-enqueue-scripts.php';

// Widget-related functionalities.
require ELEARNING_PARENT_INC_DIR . '/core/class-elearning-widgets.php';

/**
 * Helpers functions.
 */
require ELEARNING_PARENT_INC_DIR . '/helper/utils.php';

/**
 * Update migrations.
 */
require ELEARNING_PARENT_INC_DIR . '/migration/class-elearning-migration.php';
require ELEARNING_PARENT_INC_DIR . '/customizer/class-elearning-customizer.php';
require ELEARNING_PARENT_INC_DIR . '/class-elearning-css-classes.php';
require ELEARNING_PARENT_INC_DIR . '/class-elearning-dynamic-css.php';
defined( 'JETPACK__VERSION' ) && require ELEARNING_PARENT_INC_DIR . '/compatibility/jetpack/class-elearning-jetpack.php';

require ELEARNING_PARENT_INC_DIR . '/class-breadcrumb-trail.php';
require ELEARNING_PARENT_INC_DIR . '/compatibility/elementor/class-elearning-elementor-pro.php';
require ELEARNING_PARENT_INC_DIR . '/compatibility/masteriyo/class-elearning-masteriyo.php';

// Meta boxes.
require ELEARNING_PARENT_INC_DIR . '/meta-boxes/class-elearning-meta-box.php';
require ELEARNING_PARENT_INC_DIR . '/meta-boxes/class-elearning-meta-box-page-settings.php';
if ( is_admin() ) {

	// Theme options page.
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-admin.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-notice.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-welcome-notice.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-dashboard.php';
	require ELEARNING_PARENT_INC_DIR . '/admin/class-elearning-theme-review-notice.php';
}


function fresh_install_check() {
	if ( get_option( 'elearning_fresh_install_check' ) ) {
		return true;
	}

	if ( get_option( 'elearning_customizer_migration_v1' ) || get_option( 'elearning_outside_background_migration' ) || get_option( 'elearning_inside_background_migration' ) || get_option( 'elearning_builder_migration' ) ) {
		update_option( 'elearning_fresh_install_check', false );
		return false;
	} else {
		update_option( 'elearning_fresh_install_check', true );
		return true;
	}
}

function typography_should_migrate() {
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
	$current_typography_presets      = get_theme_mod( 'elearning_typography_presets', $default_typography_presets );
	$current_base_typography_body    = get_theme_mod( 'elearning_base_typography_body', $default_base_typography_body );
	$current_base_heading_typography = get_theme_mod( 'elearning_base_typography_heading', $default_base_heading_typography );

	// Check if current values are different from default values
	$should_migrate = false;

	// Check typography presets
	if ( $current_typography_presets !== $default_typography_presets ) {
		$should_migrate = true;
	}

	// Check base typography body
	if ( $current_base_typography_body !== $default_base_typography_body ) {
		$should_migrate = true;
	}

	// Check base heading typography
	if ( $current_base_heading_typography !== $default_base_heading_typography ) {
		$should_migrate = true;
	}

	return $should_migrate;
}
