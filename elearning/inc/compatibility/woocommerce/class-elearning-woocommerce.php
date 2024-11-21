<?php
/**
 * WooCommerce Compatibility.
 *
 * @package elearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'eLearnning_WooCommerce' ) ) {

	/**
	 * Class eLearnning_WooCommerce
	 */
	class eLearnning_WooCommerce {

		/**
		 * eLearnning_WooCommerce constructor.
		 */
		public function __construct() {

			add_action( 'after_setup_theme', array( $this, 'woocommerce_setup' ) );
			add_filter( 'body_class', array( $this, 'woocommerce_active_body_class' ) );

			add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'woocommerce_header_add_to_cart_fragment' ) );
			add_filter( 'elearning_woocommerce_header_cart', array( __CLASS__, 'woocommerce_header_cart' ) );
		}

		/**
		 * WooCommerce setup function.
		 *
		 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
		 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
		 *
		 * @return void
		 */
		public function woocommerce_setup() {
			add_theme_support( 'woocommerce' );
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}

		/**
		 * Add 'woocommerce-active' class to the body tag.
		 *
		 * @param  array $classes CSS classes applied to the body tag.
		 * @return array $classes modified to include 'woocommerce-active' class.
		 */
		public function woocommerce_active_body_class( $classes ) {

			$classes[] = 'woocommerce-active';

			return $classes;
		}

		/**
		 * After Content.
		 *
		 * WooCommerce shopping cart.
		 *
		 * @param array $fragments Section to refresh via AJAX.
		 * @return array
		 */
		public function woocommerce_header_add_to_cart_fragment( $fragments ) {

			ob_start();

			echo self::woocommerce_cart_link(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			$fragments['.cart-page-link'] = ob_get_clean();

			return $fragments;
		}

		/**
		 * Cart Link.
		 *
		 * Displayed a link to the cart including the number of items present and the cart total.
		 *
		 * @return string
		 */
		public static function woocommerce_cart_link() {

			$output          = '<a class="cart-page-link" href="' . esc_url( wc_get_cart_url() ) . '" title="' . __( 'View your shopping cart', 'elearning' ) . '">';
			$item_count_text = sprintf(
				/* translators: number of items in the mini cart. */
				'%d',
				WC()->cart->get_cart_contents_count()
			);
			$output .= '<svg class="tg-icon tg-icon--cart" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 24 24"><path d="M18.5 22c-1 0-1.8-.8-1.8-1.8s.8-1.8 1.8-1.8 1.8.8 1.8 1.8-.8 1.8-1.8 1.8zm0-2c-.2 0-.2 0-.2.2s0 .2.2.2.2 0 .2-.2 0-.2-.2-.2zm-8.9 2c-1 0-1.8-.8-1.8-1.8s.8-1.8 1.8-1.8 1.8.8 1.8 1.8-.8 1.8-1.8 1.8zm0-2c-.2 0-.2 0-.2.2s0 .2.2.2.2 0 .2-.2 0-.2-.2-.2zm8.4-2.9h-7.9c-1.3 0-2.4-.9-2.6-2.2L6.1 8.2v-.1L5.4 4H3c-.6 0-1-.4-1-1s.4-1 1-1h3.3c.5 0 .9.4 1 .8L8 7h12.9c.3 0 .6.1.8.4.2.2.3.5.2.8L20.6 15c-.3 1.3-1.3 2.1-2.6 2.1zM8.3 9l1.2 5.6c.1.4.4.5.6.5H18c.1 0 .5 0 .6-.5L19.7 9H8.3z"/></svg>';
			$output .= '<span class="count">' . esc_html( $item_count_text ) . '</span>';
			$output .= '</a>';

			return $output;
		}

		/**
		 * Display Header Cart.
		 *
		 * @return string
		 */
		public static function woocommerce_header_cart() {

			$output = '';

			$output .= self::woocommerce_cart_link();

			return $output;
		}
	}

	new eLearnning_WooCommerce();
}

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
