<?php
/**
 * eLearning customizer class for theme customize options.
 *
 * Class eLearning_Customizer_FrameWork
 *
 * @package    ThemeGrill
 * @subpackage eLearning
 * @since      eLearning 3.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Include Customind base options file.
require dirname( __FILE__ ) . '/class-elearning-customize-base-option.php';

// Include the Customind webfont loader file.
require dirname( __FILE__ ) . '/elearning-webfont-loader.php';

// Include the Customind typography control fonts file.
require dirname( __FILE__ ) . '/class-elearning-fonts.php';
require dirname( __FILE__ ) . '/class-elearning-generate-fonts.php';



/**
 * eLearning customizer class.
 *
 * Class eLearning_Customizer_FrameWork
 */
class eLearning_Customizer_FrameWork {

	/**
	 * Customizer Dependency Array.
	 *
	 * @var array
	 */
	public static $dependency_array = array();

	/**
	 * All groups parent-child relation array data.
	 *
	 * @var array
	 */
	public static $group_configs = array();

	/**
	 * Customizer setup constructor.
	 *
	 * eLearning_Customizer_FrameWork constructor.
	 */
	public function __construct() {

		// Include the custom extending customize panels and sections files for customize options.
		add_action( 'customize_register', array( $this, 'customize_custom_panels_sections_includes' ) );

		// Include the custom controls for customize options.
		add_action( 'customize_register', array( $this, 'customize_custom_controls_includes' ) );

		// Register eLearning customize panels, sections and controls type.
		add_action( 'customize_register', array( $this, 'register_panels_sections_controls' ) );

		// Include the required customize options.
		add_action( 'customize_register', array( $this, 'get_customizer_configurations' ) );

		// Include the required register customize settings array.
		add_action( 'customize_register', array( $this, 'register_customize_settings' ) );

		// Include the required customizer sanitizations, callbacks and partials files.
		add_action( 'customize_register', array( $this, 'customize_sanitize_callback_include' ) );

		// Enqueue the required scripts for the custom customize controls for extending panels, sections and controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customize_controls' ) );

		// Enqueue the preview JS for customize options.
		add_action( 'customize_preview_init', array( $this, 'customize_preview_js' ) );

	}

	/**
	 * Include the required files for extending the custom Customize controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_custom_panels_sections_includes( $wp_customize ) {

		// Include the required customizer nested panels and sections files.
		require dirname( __FILE__ ) . '/extend-customizer/class-elearning-wp-customize-panel.php';
		require dirname( __FILE__ ) . '/extend-customizer/class-elearning-wp-customize-section.php';
		require dirname( __FILE__ ) . '/extend-customizer/class-elearning-wp-customize-separator.php';
		require dirname( __FILE__ ) . '/extend-customizer/class-elearning-upsell-section.php';

	}

	/**
	 * Include the required files for extending the custom Customize controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */

	/**
	 * Include the required files for extending the custom Customize controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function customize_custom_controls_includes( $wp_customize ) {

		// Include the customize base controls file.
		require dirname( __FILE__ ) . '/custom-controls/class-elearning-customize-base-control.php';
		require dirname( __FILE__ ) . '/custom-controls/class-elearning-customize-base-additional-control.php';

		// Include the required customize controls file.
		require dirname( __FILE__ ) . '/custom-controls/radio-image/class-elearning-radio-image-control.php';
		require dirname( __FILE__ ) . '/custom-controls/heading/class-elearning-heading-control.php';
		require dirname( __FILE__ ) . '/custom-controls/navigate/class-elearning-navigate-control.php';
		require dirname( __FILE__ ) . '/custom-controls/editor/class-elearning-editor-control.php';
		require dirname( __FILE__ ) . '/custom-controls/gradient/class-elearning-gradient-control.php';
		require dirname( __FILE__ ) . '/custom-controls/color/class-elearning-color-control.php';
		require dirname( __FILE__ ) . '/custom-controls/buttonset/class-elearning-buttonset-control.php';
		require dirname( __FILE__ ) . '/custom-controls/toggle/class-elearning-toggle-control.php';
		require dirname( __FILE__ ) . '/custom-controls/divider/class-elearning-divider-control.php';
		require dirname( __FILE__ ) . '/custom-controls/slider/class-elearning-slider-control.php';
		require dirname( __FILE__ ) . '/custom-controls/custom/class-elearning-custom-control.php';
		require dirname( __FILE__ ) . '/custom-controls/dropdown-categories/class-elearning-dropdown-categories-control.php';
		require dirname( __FILE__ ) . '/custom-controls/background/class-elearning-background-control.php';
		require dirname( __FILE__ ) . '/custom-controls/typography/class-elearning-typography-control.php';
		require dirname( __FILE__ ) . '/custom-controls/hidden/class-elearning-hidden-control.php';
		require dirname( __FILE__ ) . '/custom-controls/sortable/class-elearning-sortable-control.php';
		require dirname( __FILE__ ) . '/custom-controls/group/class-elearning-group-control.php';
		require dirname( __FILE__ ) . '/custom-controls/title/class-elearning-title-control.php';
		require dirname( __FILE__ ) . '/custom-controls/dimensions/class-elearning-dimensions-control.php';
		require dirname( __FILE__ ) . '/custom-controls/upgrade/class-elearning-upgrade-control.php';
		require dirname( __FILE__ ) . '/custom-controls/fontawesome/class-elearning-fontawesome-control.php';
		require dirname( __FILE__ ) . '/custom-controls/date/class-elearning-date-control.php';

	}

	/**
	 * Register eLearning customize panels, sections and controls type.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function register_panels_sections_controls( $wp_customize ) {

		// Register panels and sections.
		$wp_customize->register_panel_type( 'eLearning_WP_Customize_Panel' );
		$wp_customize->register_section_type( 'eLearning_WP_Customize_Section' );
		$wp_customize->register_section_type( 'eLearning_WP_Customize_Separator' );
		$wp_customize->register_panel_type( 'eLearning_WP_Customize_Panel' );
		$wp_customize->register_section_type( 'eLearning_Upsell_Section' );

		// Overrides sanitize callback if theme supports custom-background.
		if ( current_theme_supports( 'custom-background' ) ) {

			remove_filter(
				'customize_sanitize_background_color',
				$wp_customize->get_setting( 'background_color' )->sanitize_callback
			);

			$wp_customize->get_setting( 'background_color' )->sanitize_callback = array(
				'eLearning_Customizer_FrameWork_Sanitizes',
				'sanitize_alpha_color',
			);

			add_filter(
				'customize_sanitize_background_color',
				array( 'eLearning_Customizer_FrameWork_Sanitizes', 'sanitize_alpha_color' ),
				10,
				2
			);
		}

		// Overrides sanitize callback if theme supports custom-header.
		if ( current_theme_supports( 'custom-header' ) ) {

			remove_filter(
				'customize_sanitize_header_textcolor',
				$wp_customize->get_setting( 'header_textcolor' )->sanitize_callback
			);

			$wp_customize->get_setting( 'header_textcolor' )->sanitize_callback = array(
				'eLearning_Customizer_FrameWork_Sanitizes',
				'sanitize_alpha_color',
			);

			add_filter(
				'customize_sanitize_header_textcolor',
				array( 'eLearning_Customizer_FrameWork_Sanitizes', 'sanitize_alpha_color' ),
				10,
				2
			);
		}

		/**
		 * Register controls.
		 */
		/**
		 * WordPress default controls.
		 */
		// Checkbox control.
		eLearning_Customize_Base_Control::add_control(
			'checkbox',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_checkbox',
				),
			)
		);

		// Radio control.
		eLearning_Customize_Base_Control::add_control(
			'radio',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_radio_select',
				),
			)
		);

		// Select control.
		eLearning_Customize_Base_Control::add_control(
			'select',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_radio_select',
				),
			)
		);

		// Text control.
		eLearning_Customize_Base_Control::add_control(
			'text',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_nohtml',
				),
			)
		);

		// Number control.
		eLearning_Customize_Base_Control::add_control(
			'number',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_number',
				),
			)
		);

		// Email control.
		eLearning_Customize_Base_Control::add_control(
			'email',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_email',
				),
			)
		);

		// URL control.
		eLearning_Customize_Base_Control::add_control(
			'url',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_url',
				),
			)
		);

		// Textarea control.
		eLearning_Customize_Base_Control::add_control(
			'textarea',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_html',
				),
			)
		);

		// Dropdown pages control.
		eLearning_Customize_Base_Control::add_control(
			'dropdown-pages',
			array(
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_dropdown_pages',
				),
			)
		);

		// Color control.
		eLearning_Customize_Base_Control::add_control(
			'color',
			array(
				'callback'          => 'WP_Customize_Color_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_hex_color',
				),
			)
		);

		// Image upload control.
		eLearning_Customize_Base_Control::add_control(
			'image',
			array(
				'callback'          => 'WP_Customize_Image_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_image_upload',
				),
			)
		);

		/**
		 * Controls created via the theme.
		 */
		// Radio image control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-radio-image',
			array(
				'callback'          => 'eLearning_Radio_Image_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_radio_select',
				),
			)
		);

		// Heading control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-heading',
			array(
				'callback'          => 'eLearning_Heading_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_false_values',
				),
			)
		);

		// Navigate control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-navigate',
			array(
				'callback'          => 'eLearning_Navigate_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_false_values',
				),
			)
		);

		// Editor control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-editor',
			array(
				'callback'          => 'eLearning_Editor_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_html',
				),
			)
		);

		// Color control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-color',
			array(
				'callback'          => 'eLearning_Color_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_alpha_color',
				),
			)
		);

		// Buttonset control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-buttonset',
			array(
				'callback'          => 'eLearning_Buttonset_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_radio_select',
				),
			)
		);

		// Toggle control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-toggle',
			array(
				'callback'          => 'eLearning_Toggle_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_checkbox',
				),
			)
		);

		// Divider control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-divider',
			array(
				'callback'          => 'eLearning_Divider_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_false_values',
				),
			)
		);

		// Slider control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-slider',
			array(
				'callback'          => 'eLearning_Slider_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_number',
				),
			)
		);

		// Custom control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-custom',
			array(
				'callback'          => 'eLearning_Custom_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_false_values',
				),
			)
		);

		// Dropdown categories control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-dropdown-categories',
			array(
				'callback'          => 'eLearning_Dropdown_Categories_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_dropdown_categories',
				),
			)
		);

		// Background control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-background',
			array(
				'callback'          => 'eLearning_Background_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_background',
				),
			)
		);

		// Typography control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-typography',
			array(
				'callback'          => 'eLearning_Typography_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_typography',
				),
			)
		);

		// Gradient control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-gradient',
			array(
				'callback'          => 'eLearning_Gradient_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_gradient',
				),
			)
		);

		// Hidden control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-hidden',
			array(
				'callback'          => 'eLearning_Hidden_Control',
				'sanitize_callback' => '',
			)
		);

		// Sortable control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-sortable',
			array(
				'callback'          => 'eLearning_Sortable_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_sortable',
				),
			)
		);

		// Group control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-group',
			array(
				'callback' => 'eLearning_Group_Control',
			)
		);

		// Title control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-title',
			array(
				'callback' => 'eLearning_Title_Control',
			)
		);

		// Dimensions control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-dimensions',
			array(
				'callback' => 'eLearning_Dimensions_Control',
			)
		);

		// Upgrade control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-upgrade',
			array(
				'callback' => 'eLearning_Upgrade_Control',
			)
		);

		// Fontawesome control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-fontawesome',
			array(
				'callback'          => 'eLearning_Fontawesome_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_radio_select',
				),
			)
		);

		// Date Control
		eLearning_Customize_Base_Control::add_control(
			'elearning-date',
			array(
				'callback'          => 'eLearning_Date_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
					'sanitize_date',
				),
			)
		);

		// Gradient control.
		eLearning_Customize_Base_Control::add_control(
			'elearning-gradient',
			array(
				'callback'          => 'eLearning_Gradient_Control',
				'sanitize_callback' => array(
					'eLearning_Customizer_FrameWork_Sanitizes',
				),
			)
		);
	}

	/**
	 * Include the required customize options.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 *
	 * @return array Customizer options for registering panels, sections as well as controls.
	 */
	public function get_customizer_configurations( $wp_customize ) {

		/**
		 * Filter for customizer options.
		 *
		 * @since   1.0.0
		 */
		return apply_filters( 'elearning_customizer_options', array(), $wp_customize );

	}

	/**
	 * Return default values for the Customize Configurations.
	 *
	 * @return array
	 */
	public function get_elearning_customizer_default_configuration() {

		$default_configuration = array(
			'priority'             => null,
			'title'                => null,
			'label'                => null,
			'name'                 => null,
			'type'                 => null,
			'description'          => null,
			'capability'           => 'edit_theme_options',
			'datastore_type'       => 'theme_mod',
			'settings'             => null,
			'active_callback'      => null,
			'sanitize_callback'    => null,
			'sanitize_js_callback' => null,
			'theme_supports'       => null,
			'transport'            => null,
			'default'              => null,
			'selector'             => null,
			'elearning_fields'      => array(),
		);

		/**
		 * Filter for customizer default configuration.
		 *
		 * @since   1.0.0
		 */
		return apply_filters( 'elearning_customizer_default_configuration', $default_configuration );

	}

	/**
	 * Process and Register Customizer Panels, Sections, Settings and Controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Reference to WP_Customize_Manager.
	 *
	 * @return void
	 */
	public function register_customize_settings( $wp_customize ) {

		$configurations = $this->get_customizer_configurations( $wp_customize );

		foreach ( $configurations as $key => $config ) {
			$config = wp_parse_args(
				$config,
				$this->get_elearning_customizer_default_configuration()
			);

			switch ( $config['type'] ) {

				case 'panel':
					// Remove `panel` type from configuration for registering it in different way.
					unset( $config['type'] );

					$this->register_panel( $config, $wp_customize );

					break;

				case 'section':
					// Remove `section` type from configuration for registering it in different way.
					unset( $config['type'] );

					$this->register_section( $config, $wp_customize );

					break;

				case 'sub-control':
					// Remove `sub-control` type from configuration for registering it in different way.
					unset( $config['type'] );

					$this->register_sub_control_setting( $config, $wp_customize );

					break;

				case 'control':
					// Remove `control` type from configuration for registering it in different way.
					unset( $config['type'] );

					$this->register_setting_control( $config, $wp_customize );

					break;
			}
		}

	}

	/**
	 * Register Customizer Panel.
	 *
	 * @param array                $config       Customize options configuration settings.
	 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
	 *
	 * @return void
	 */
	public function register_panel( $config, $wp_customize ) {

		$wp_customize->add_panel(
			new eLearning_WP_Customize_Panel(
				$wp_customize,
				$config['name'],
				$config
			)
		);

	}

	/**
	 * Register Customizer Section.
	 *
	 * @param array                $config       Customize options configuration settings.
	 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
	 *
	 * @return void
	 */
	public function register_section( $config, $wp_customize ) {

		$section_callback = isset( $config['section_callback'] ) ? $config['section_callback'] : 'eLearning_WP_Customize_Section';

		$wp_customize->add_section(
			new $section_callback(
				$wp_customize,
				$config['name'],
				$config
			)
		);

	}

	/**
	 * Register Customizer Sub Control.
	 *
	 * @param array                $config       Customize options configuration settings.
	 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
	 *
	 * @return void
	 */
	public function register_sub_control_setting( $config, $wp_customize ) {

		$sub_control_name = $config['name'];

		if ( isset( $wp_customize->get_control( $sub_control_name )->id ) ) {
			return;
		}

		$parent = $config['parent'];
		$tab    = ( isset( $config['tab'] ) ) ? $config['tab'] : '';

		if ( empty( self::$group_configs[ $parent ] ) ) {
			self::$group_configs[ $parent ] = array();
		}

		if ( array_key_exists( 'tab', $config ) ) {
			self::$group_configs[ $parent ]['tabs'][ $tab ][] = $config;
		} else {
			self::$group_configs[ $parent ][] = $config;
		}

		// For adding settings.
		$sanitize_callback = isset( $config['sanitize_callback'] ) ? $config['sanitize_callback'] : eLearning_Customize_Base_Control::get_sanitize_callback( $config['control'] );
		$transport         = isset( $config['transport'] ) ? $config['transport'] : 'refresh';
		$customize_config  = array(
			'name'              => $sub_control_name,

			/**
			 * Filter for customize data store type.
			 *
			 * @since   1.0.0
			 */
			'datastore_type'    => apply_filters( 'elearning_customize_datastore_type', 'theme_mod' ),
			'control'           => 'elearning-hidden',
			'section'           => $config['section'],
			'default'           => $config['default'],
			'transport'         => $transport,
			'sanitize_callback' => $sanitize_callback,
		);

		$wp_customize->add_setting(
			$customize_config['name'],
			array(
				'default'           => $customize_config['default'],
				'type'              => $customize_config['datastore_type'],
				'transport'         => $customize_config['transport'],
				'sanitize_callback' => $customize_config['sanitize_callback'],
			)
		);

		// For adding controls.
		$control_type = eLearning_Customize_Base_Control::get_control_instance( $customize_config['control'] );

		if ( false !== $control_type ) {
			$wp_customize->add_control(
				new $control_type(
					$wp_customize,
					$customize_config['name'],
					$customize_config
				)
			);
		} else {
			$wp_customize->add_control(
				$customize_config['name'],
				$customize_config
			);
		}

	}

	/**
	 * Register Customizer Control.
	 *
	 * @param array                $config       Customize options configuration settings.
	 * @param WP_Customize_Manager $wp_customize Instance of WP_Customize_Manager.
	 *
	 * @return void
	 */
	public function register_setting_control( $config, $wp_customize ) {

		// For adding settings.
		$sanitize_callback = isset( $config['sanitize_callback'] ) ? $config['sanitize_callback'] : eLearning_Customize_Base_Control::get_sanitize_callback( $config['control'] );
		$transport         = isset( $config['transport'] ) ? $config['transport'] : 'refresh';

		if ( 'elearning-group' === $config['control'] ) {
			$sanitize_callback = false;
		}

		$wp_customize->add_setting(
			$config['name'],
			array(
				'default'           => $config['default'],
				'type'              => $config['datastore_type'],
				'transport'         => $transport,
				'sanitize_callback' => $sanitize_callback,
			)
		);

		// For adding controls.
		$control_type   = eLearning_Customize_Base_Control::get_control_instance( $config['control'] );
		$config['type'] = $config['control'];

		if ( false !== $control_type ) {
			$wp_customize->add_control(
				new $control_type(
					$wp_customize,
					$config['name'],
					$config
				)
			);
		} else {
			$wp_customize->add_control(
				$config['name'],
				$config
			);
		}

		// For adding selective refresh.
		$selective_refresh = isset( $config['partial'] ) ? true : false;
		$render_callback   = isset( $config['partial']['render_callback'] ) ? $config['partial']['render_callback'] : '';

		if ( $selective_refresh ) {

			if ( isset( $wp_customize->selective_refresh ) ) {
				$wp_customize->selective_refresh->add_partial(
					$config['name'],
					array(
						'selector'        => $config['partial']['selector'],
						'render_callback' => $render_callback,
					)
				);
			}
		}

		// For dependency array.
		if ( isset( $config['dependency'] ) ) {
			$this->update_dependency_array( $config['name'], $config['dependency'] );
		}

	}

	/**
	 * Update dependency in the dependency array for controls and sections.
	 *
	 * @param string $key        Name of the Setting/Control for which the dependency is added.
	 * @param array  $dependency Dependency of the $name Setting/Control.
	 *
	 * @return void
	 */
	private function update_dependency_array( $key, $dependency ) {
		self::$dependency_array[ $key ] = $dependency;
	}

	/**
	 * Get dependency array.
	 *
	 * @return array Dependencies discovered when registering controls and settings.
	 */
	private function get_dependency_array() {
		return self::$dependency_array;
	}

	/**
	 * Include the required customizer sanitization, callbacks and partials file.
	 */
	public function customize_sanitize_callback_include() {

		require dirname( __FILE__ ) . '/class-elearning-customizer-sanitizes.php';
		require dirname( __FILE__ ) . '/class-elearning-customizer-callbacks.php';

	}

	/**
	 * Enqueue custom scripts for customize panels, sections and controls.
	 */
	public function enqueue_customize_controls() {

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		/**
		 * Enqueue required Customize Controls CSS files.
		 */
		// Extend customizer CSS file.
		wp_enqueue_style(
			'elearning-extend-customizer',
			$this->get_assets_url() . '/assets/css/extend-customizer' . $suffix . '.css',
			array(),
			ELEARNING_THEME_VERSION
		);
		wp_style_add_data( 'elearning-extend-customizer', 'rtl', 'replace' );

		/**
		 * Enqueue required Customize Controls JS files.
		 */
		// Extend customizer JS file.
		wp_enqueue_script(
			'elearning-extend-customizer',
			$this->get_assets_url() . '/assets/js/extend-customizer' . $suffix . '.js',
			array(
				'jquery',
			),
			ELEARNING_THEME_VERSION,
			true
		);

		// Customizer controls toggle JS file.
		wp_enqueue_script(
			'elearning-customizer-controls-toggle',
			$this->get_assets_url() . '/assets/js/customizer-controls-toggle' . $suffix . '.js',
			array(),
			ELEARNING_THEME_VERSION,
			true
		);

		// Customizer controls JS file.
		wp_enqueue_script(
			'elearning-customizer-controls',
			$this->get_assets_url() . '/assets/js/customizer-controls' . $suffix . '.js',
			array(
				'elearning-customizer-controls-toggle',
			),
			ELEARNING_THEME_VERSION,
			true
		);

		// Customizer dependency control JS file.
		wp_enqueue_script(
			'elearning-customizer-dependency',
			$this->get_assets_url() . '/assets/js/customizer-dependency' . $suffix . '.js',
			array(
				'elearning-customizer-controls-toggle',
				'elearning-customizer-controls',
				'elearning-extend-customizer',
			),
			ELEARNING_THEME_VERSION,
			true
		);

		// Localize for customizer controls toggle.
		wp_localize_script(
			'elearning-customizer-controls-toggle',
			'eLearningCustomizerControlsToggle',
			$this->get_dependency_array()
		);

	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 *
	 * @since eLearning 3.0.0
	 */
	public function customize_preview_js() {

		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		wp_enqueue_script(
			'elearning-customizer',
			$this->get_assets_url() . '/assets/js/customize-preview' . $suffix . '.js',
			array(
				'customize-preview',
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

return new eLearning_Customizer_FrameWork();
