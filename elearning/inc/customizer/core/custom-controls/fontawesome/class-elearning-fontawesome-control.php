<?php
/**
 * Extend WP_Customize_Control to add the fontawesome control.
 *
 * Class eLearning_Fontawesome_Control
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
 * Class to extend WP_Customize_Control to add the fontawesome customize control.
 *
 * Class eLearning_Fontawesome_Control
 */
class eLearning_Fontawesome_Control extends eLearning_Customize_Base_Additional_Control {

	/**
	 * Control's Type.
	 *
	 * @var string
	 */
	public $type = 'elearning-fontawesome';

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {

		parent::enqueue();

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		/**
		 * Filter for fontawesome source.
		 *
		 * @since   1.0.0
		 */
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . apply_filters( 'elearning_fontawesome_src', '/font-awesome/css/font-awesome' ) . $suffix . '.css', false, '4.7.0' );

		// Get choices.
		$fontawesome_array = $this->choices;

		wp_localize_script(
			'elearning-customize-controls',
			'eLearningCustomizerControlFontawesome' . $this->id,
			$fontawesome_array
		);
	}

		/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {

		parent::to_json();

		$this->json['choices']     = $this->choices;
		$this->json['id']          = $this->id;
		$this->json['label']       = esc_html( $this->label );
		$this->json['description'] = $this->description;
		$this->json['inputAttrs']  = '';

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
		<label for="_elearning-fontawesome-{{{ data.id }}}">
			<# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
			<# if ( data.description ) { #><span class="description customize-control-description">{{{ data.description }}}</span><# } #>
		</label>
		<div class="elearning-fontawesome-wrapper">
			<select {{{ data.inputAttrs }}}  id="_elearning-fontawesome-{{{ data.id }}}"></select>
		</div> <!-- /.elearning-fontawesome-wrapper -->
		<?php
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 */
	public function render_content() {
	}
}
