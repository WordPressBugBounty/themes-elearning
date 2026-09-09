<?php
/**
 * Hooks for Header HTML markups.
 *
 * @package eLearning
 * @since   1.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_header_markup' ) ) {

	/**
	 * Adds header markup.
	 *
	 * @return void
	 */
	function elearning_header_markup() {

		eLearning_Utils::has_transparent_header() && print( '<div class="tg-header-transparent-wrapper">' );

		elearning_header_builder_markup();

		eLearning_Utils::has_transparent_header() && print( '</div>' );
	}
	add_action( 'elearning_header', 'elearning_header_markup' );
}

if ( ! function_exists( 'elearning_page_header' ) ) {

	/**
	 * Page header.
	 */
	function elearning_page_header() {

		$meta = get_post_meta( eLearning_Utils::get_post_id(), 'elearning_page_header' );

		if (
			( 'page-header' !== eLearning_Utils::has_page_title() && ! eLearning_Utils::has_breadcrumbs() ) ||
			( isset( $meta[0] ) && ! $meta[0] ) || ( is_home() && is_front_page() )
		) {
			return;
		}

		get_template_part( 'template-parts/page-header/page-header' );
	}
}

if ( ! function_exists( 'elearning_breadcrumbs' ) ) {

	/**
	 * Adds breadcrumbs.
	 */
	function elearning_breadcrumbs() {

		elearning_breadcrumb_trail(
			array(
				'show_browse' => false,
			)
		);
	}
}

if ( ! function_exists( 'elearning_change_logo_attr' ) ) {

	/**
	 * Change the logo image attr while retina logo is set.
	 *
	 * @param $attr
	 * @param $attachment
	 * @param $size
	 *
	 * @return mixed
	 */
	function elearning_change_logo_attr( $attr, $attachment, $size ) {

		$custom_logo = get_theme_mod( 'custom_logo' );
		$retina_logo = get_theme_mod( 'elearning_retina_logo' );
		if ( $custom_logo && $retina_logo && isset( $attr['class'] ) && 'custom-logo' === $attr['class'] ) {
			$custom_logo_src = wp_get_attachment_image_src( $custom_logo, 'full' );
			if ( ! $custom_logo_src ) {
				return $attr;
			}       $custom_logo_url = $custom_logo_src[0];
			if ( is_numeric( $retina_logo ) ) {
				$retina_logo_attachment = wp_get_attachment_image_src( $retina_logo, 'full' );
				if ( isset( $retina_logo_attachment[0] ) ) {
					$retina_logo_src = $retina_logo_attachment[0];
				}
			} else {
				$retina_logo_id         = attachment_url_to_postid( $retina_logo );
				$retina_logo_attachment = wp_get_attachment_image_src( $retina_logo_id, 'full' );
				if ( isset( $retina_logo_attachment[0] ) ) {
					$retina_logo_src = $retina_logo_attachment[0];
				}
			}         if ( isset( $retina_logo_src ) ) {
				$attr['srcset'] = $custom_logo_url . ' 1x, ' . $retina_logo_src . ' 2x';
			}
		}    return $attr;
	}
	add_filter( 'wp_get_attachment_image_attributes', 'elearning_change_logo_attr', 10, 3 );
}
