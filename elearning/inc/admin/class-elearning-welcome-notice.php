<?php
// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

class eLearning_Welcome_Notice {

	public function __construct() {
		add_action( 'wp_ajax_elearning-install-tdi-plugin', array( $this, 'install_tdi_plugin' ) );
	}

	public function install_tdi_plugin() {
		check_ajax_referer( 'elearning_tdi_install_nonce', 'security' );

		if ( ! current_user_can( 'manage_options' ) ) {
			wp_send_json_error(
				array(
					'errorCode'    => 'permission_denied',
					'errorMessage' => __( 'You do not have permission to perform this action.', 'elearning' ),
				)
			);
			exit;
		}

		$state = '';

		if ( class_exists( 'themegrill_demo_importer' ) ) {
			$state = 'activated';
		} elseif ( file_exists( WP_PLUGIN_DIR . '/themegrill-demo-importer/themegrill-demo-importer.php' ) ) {
			$state = 'installed';
		}

		if ( 'activated' === $state ) {
			$response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all' );
		} elseif ( 'installed' === $state ) {
			$response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all' );
			if ( current_user_can( 'activate_plugins' ) ) {
				$result = activate_plugin( 'themegrill-demo-importer/themegrill-demo-importer.php' );

				if ( is_wp_error( $result ) ) {
					$response['errorCode']    = $result->get_error_code();
					$response['errorMessage'] = $result->get_error_message();
				}
			}
		} else {
			wp_enqueue_style( 'plugin-install' );
			wp_enqueue_script( 'plugin-install' );

			$response['redirect'] = admin_url( '/themes.php?page=demo-importer&browse=all' );

			/**
			 * Install Plugin.
			 */
			include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
			include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

			$api = plugins_api(
				'plugin_information',
				array(
					'slug'   => sanitize_key( wp_unslash( 'themegrill-demo-importer' ) ),
					'fields' => array(
						'sections' => false,
					),
				)
			);

			$skin     = new WP_Ajax_Upgrader_Skin();
			$upgrader = new Plugin_Upgrader( $skin );
			$result   = $upgrader->install( $api->download_link );

			if ( $result ) {
				$response['installed'] = 'succeed';
			} else {
				$response['installed'] = 'failed';
			}

			// Activate plugin.
			if ( current_user_can( 'activate_plugins' ) ) {
				$result = activate_plugin( 'themegrill-demo-importer/themegrill-demo-importer.php' );

				if ( is_wp_error( $result ) ) {
					$response['errorCode']    = $result->get_error_code();
					$response['errorMessage'] = $result->get_error_message();
				}
			}
		}
		wp_send_json( $response );
		exit();
	}
}

new eLearning_Welcome_Notice();
