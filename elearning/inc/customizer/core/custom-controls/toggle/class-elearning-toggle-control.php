<?php
/**
 * Extend WP_Customize_Control to add the switch toggle control.
 *
 * Class eLearning_Toggle_Control
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
 * Class to extend WP_Customize_Control to add the switch toggle customize control.
 *
 * Class eLearning_Toggle_Control
 */
class eLearning_Toggle_Control extends eLearning_Customize_Base_Additional_Control {

	/**
	 * Control's Type.
	 *
	 * @var string
	 */
	public $type = 'elearning-toggle';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}
		$this->json['value'] = $this->value();

		$this->json['link']        = $this->get_link();
		$this->json['id']          = $this->id;
		$this->json['label']       = esc_html( $this->label );
		$this->json['description'] = $this->description;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}

	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 */
	protected function content_template() {
		?>

		<div class="customizer-text">
			<# if ( data.label ) { #>
			<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>

			<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</div>

		<label for="toggle_{{ data.id }}"
			   class="<# if ( data.description ) { #>toggle-description<# } #>"
		>
			<input {{{ data.inputAttrs }}}
				   class="switch-toggle"
				   type="checkbox"
				   value="{{ data.value }}"
				   name="_customize-toggle-{{ data.id }}"
				   id="toggle_{{ data.id }}"
				   {{{ data.link }}}
			<# if ( data.value === true ) { #> checked="checked"<# } #>
			>

			<span class="switch"></span>
		</label>

		<?php
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 */
	public function render_content() {
	}

}
