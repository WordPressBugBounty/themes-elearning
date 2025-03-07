<?php
/**
 * Extend WP_Customize_Control to include group control.
 *
 * Class eLearning_Group_Control
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
 * Class to extend WP_Customize_Control to add the group customize control.
 *
 * Class eLearning_Group_Control
 */
class eLearning_Group_Control extends eLearning_Customize_Base_Additional_Control {

	/**
	 * Control's Type.
	 *
	 * @var string
	 */
	public $type = 'elearning-group';

	/**
	 * The control name.
	 *
	 * @var string
	 */
	public $name = '';

	/**
	 * The control tab value.
	 *
	 * @var string
	 */
	public $tab = '';

	/**
	 * The fields for group.
	 *
	 * @var string
	 */
	public $elearning_fields = '';

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {

		parent::enqueue();

		// Enqueue jQuery UI tabs.
		wp_enqueue_script( 'jquery-ui-tabs' );

		$tmpl  = '<div class="elearning-field-settings-modal">';
		$tmpl .= '<ul class="elearning-fields-wrap">';
		$tmpl .= '</ul>';
		$tmpl .= '</div>';

		wp_localize_script(
			'elearning-customize-controls',
			'eLearningCustomizerControlGroup',
			array(
				'group_modal_tmpl' => $tmpl,
			)
		);

	}

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

		$this->json['name'] = $this->name;
		$config             = array();

		if ( isset( eLearning_Customizer_FrameWork::$group_configs[ $this->name ]['tabs'] ) ) {

			$tab = array_keys( eLearning_Customizer_FrameWork::$group_configs[ $this->name ]['tabs'] );

			foreach ( $tab as $key => $value ) {
				$config['tabs'][ $value ] = wp_list_sort( eLearning_Customizer_FrameWork::$group_configs[ $this->name ]['tabs'][ $value ], 'priority' );
			}
		} else {

			if ( isset( eLearning_Customizer_FrameWork::$group_configs[ $this->name ] ) ) {
				$config = wp_list_sort( eLearning_Customizer_FrameWork::$group_configs[ $this->name ], 'priority' );
			}
		}

		$this->json['elearning_fields'] = $config;

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

		<div class="elearning-group-wrap">
			<div class="customizer-text">
				<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>

				<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<span
					class="elearning-group-toggle-icon dashicons <# if ( data.description ) { #>toggle-description<# } #>"
					data-control="{{ data.name }}"></span>
			</div>
		</div>

		<div class="elearning-field-settings-wrap">
		</div>

		<?php
	}

	/**
	 * Don't render the control content from PHP, as it's rendered via JS on load.
	 */
	public function render_content() {
	}

}
