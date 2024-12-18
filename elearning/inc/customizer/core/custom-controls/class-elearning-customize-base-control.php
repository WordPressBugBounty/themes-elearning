<?php
/**
 * eLearning customizer base control class for theme customize options.
 *
 * Class eLearning_Customize_Base_Control
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
 * eLearning customizer base control class.
 *
 * Class eLearning_Customize_Base_Control
 */
class eLearning_Customize_Base_Control {

	/**
	 * Registered Controls.
	 *
	 * @var array
	 */
	public static $controls;

	/**
	 * Add Control to self::$controls and register custom controls to WordPress Customizer.
	 *
	 * @param string $name       Slug for the control.
	 * @param array  $attributes Control Attributes.
	 *
	 * @return void
	 */
	public static function add_control( $name, $attributes ) {

		global $wp_customize;
		self::$controls[ $name ] = $attributes;

		if ( isset( $attributes['callback'] ) ) {
			$wp_customize->register_control_type( $attributes['callback'] );
		}

	}

	/**
	 * Returns control instance.
	 *
	 * @param string $control_type Control type.
	 *
	 * @return string
	 */
	public static function get_control_instance( $control_type ) {

		$control_class = self::get_control( $control_type );

		if ( isset( $control_class['callback'] ) ) {
			return class_exists( $control_class['callback'] ) ? $control_class['callback'] : false;
		}

		return false;

	}

	/**
	 * Returns control and its attributes.
	 *
	 * @param string $control_type Control type.
	 *
	 * @return array
	 */
	public static function get_control( $control_type ) {

		if ( isset( self::$controls[ $control_type ] ) ) {
			return self::$controls[ $control_type ];
		}

		return array();

	}

	/**
	 * Returns santize callback for control.
	 *
	 * @param string $control Control type for customize option.
	 *
	 * @return string
	 */
	public static function get_sanitize_callback( $control ) {

		if ( isset( self::$controls[ $control ]['sanitize_callback'] ) ) {
			return self::$controls[ $control ]['sanitize_callback'];
		}

		return false;

	}

}

return new eLearning_Customize_Base_Control();
