<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link    https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package eLearning
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses elearning_header_style()
 */
function elearning_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'elearning_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1500,
				'height'             => 500,
				'flex-height'        => true,
				'flex-width'         => true,
				'video'              => true,
				'wp-head-callback'   => 'elearning_header_style',
			)
		)
	);
}

add_action( 'after_setup_theme', 'elearning_custom_header_setup' );

if ( ! function_exists( 'elearning_header_style' ) ) {

	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see elearning_custom_header_setup().
	 */
	function elearning_header_style() {

		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		//      if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
		//          return;
		//      }

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			<?php

			// Has the text been hidden?
			if ( empty( get_theme_mod( 'elearning_enable_site_identity', true ) ) ) :
				?>
			.site-title {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php endif; ?>

			<?php
			// Has the text been hidden?
			if ( empty( get_theme_mod( 'elearning_enable_site_tagline', true ) ) ) :
				?>
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

			<?php endif; ?>
		</style>
		<?php
	}
}
