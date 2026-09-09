<?php
/**
 * Theme hooks.
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_header' ) ) {

	/**
	 * Header.
	 *
	 * @return void
	 */
	function elearning_header() {

		/**
		 * Hook for header.
		 *
		 * @hooked elearning_header_markup - 10.
		 */
		do_action( 'elearning_header' );
	}
}

if ( ! function_exists( 'elearning_content' ) ) {

	/**
	 * eLearning content.
	 *
	 * @return void
	 */
	function elearning_content() {

		/**
		 * Hook for content.
		 *
		 * @hooked elearning_content_loop - 10.
		 */
		do_action( 'elearning_content' );
	}
}

if ( ! function_exists( 'elearning_content_search' ) ) {

	/**
	 * eLearning content search.
	 *
	 * @return void
	 */
	function elearning_content_search() {

		/**
		 * Hook for content search.
		 *
		 * @hooked elearning_content_loop - 10
		 */
		do_action( 'elearning_content_search' );
	}
}

if ( ! function_exists( 'elearning_content_archive' ) ) {

	/**
	 * eLearning content archive.
	 *
	 * @return void
	 */
	function elearning_content_archive() {

		/**
		 * Hook for archive content.
		 *
		 * @hooked elearning_content_loop - 10
		 */
		do_action( 'elearning_content_archive' );
	}
}

if ( ! function_exists( 'elearning_content_single' ) ) {

	/**
	 * Content single.
	 *
	 * @return void
	 */
	function elearning_content_single() {

		/**
		 * Hook for single content.
		 *
		 * @hooked elearning_content_loop - 10
		 */
		do_action( 'elearning_content_single' );
	}
}

if ( ! function_exists( 'elearning_content_page' ) ) {

	/**
	 * Content single.
	 *
	 * @return void
	 */
	function elearning_content_page() {

		/**
		 * Hook for single content.
		 *
		 * @hooked elearning_content_loop - 10
		 */
		do_action( 'elearning_content_page' );
	}
}

if ( ! function_exists( 'elearning_footer' ) ) {

	/**
	 * Footer.
	 */
	function elearning_footer() {

		/**
		 * Hook for footer markup
		 *
		 * @hooked elearning_footer_markup - 10
		 */
		do_action( 'elearning_footer' );
	}
}

if ( ! function_exists( 'elearning_footer_bottom' ) ) {

	/**
	 * Footer bottom.
	 *
	 * @return void
	 */
	function elearning_footer_bottom() {

		/**
		 * @hooked elearning_scroll_to_top - 10.
		 */
		do_action( 'elearning_footer_bottom' );
	}
}

if ( ! function_exists( 'elearning_content_404' ) ) {

	function elearning_content_404() {

		/**
		 * Hook for 404 content;
		 */
		do_action( 'elearning_content_404' );
	}
}
