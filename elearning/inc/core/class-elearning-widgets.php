<?php
/**
 * Register widget areas.
 *
 * @package elearning
 *
 * TODO: @since.
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearning_Widgets' ) ) {

	/**
	 * Widgets.
	 */
	class eLearning_Widgets {

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

			add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		}

		/**
		 * Register sidebars.
		 *
		 * @return void
		 */
		public function widgets_init() {

			$sidebars = $this->get_sidebars_list();

			foreach ( $sidebars as $id => $name ) {
				register_sidebar(
					apply_filters(
						'elearning_sidebars_widget_args',
						array(
							'id'            => $id,
							'name'          => $name,
							'description'   => esc_html__( 'Add widgets here.', 'elearning' ),
							'before_widget' => '<section id="%1$s" class="widget %2$s widget-' . $id . '">',
							'after_widget'  => '</section>',
							'before_title'  => '<h2 class="widget-title">',
							'after_title'   => '</h2>',
						)
					)
				);
			}
		}

		/**
		 * Get information of sidebars to be registered.
		 *
		 * @return array
		 */
		public function get_sidebars_list() {

			$sidebars = apply_filters(
				'elearning_sidebars_args',
				array(
					'sidebar-right'            => esc_html__( 'Sidebar Right', 'elearning' ),
					'sidebar-left'             => esc_html__( 'Sidebar Left', 'elearning' ),
					'header-top-left-sidebar'  => esc_html__( 'Header Top Bar Left Sidebar', 'elearning' ),
					'header-top-right-sidebar' => esc_html__( 'Header Top Bar Right Sidebar', 'elearning' ),
					'footer-sidebar-1'         => esc_html__( 'Footer One', 'elearning' ),
					'footer-sidebar-2'         => esc_html__( 'Footer Two', 'elearning' ),
					'footer-sidebar-3'         => esc_html__( 'Footer Three', 'elearning' ),
					'footer-sidebar-4'         => esc_html__( 'Footer Four', 'elearning' ),
					'footer-bar-left-sidebar'  => esc_html__( 'Footer Bottom Bar Left Sidebar', 'elearning' ),
					'footer-bar-right-sidebar' => esc_html__( 'Footer Bottom Bar Right Sidebar', 'elearning' ),
				)
			);

			return apply_filters( 'elearning_sidebars_args', $sidebars );
		}
	}

}

eLearning_Widgets::get_instance();
