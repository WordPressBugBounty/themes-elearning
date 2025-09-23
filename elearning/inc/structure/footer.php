<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_footer_markup' ) ) {

	/**
	 * Adds footer markup.
	 *
	 * @return void
	 */
	function elearning_footer_markup() {

		elearning_footer_builder_markup();
	}
	add_action( 'elearning_footer', 'elearning_footer_markup' );
}

if ( ! function_exists( 'elearning_scroll_to_top' ) ) {

	/**
	 * Scroll to top
	 */
	function elearning_scroll_to_top() {

		// If scroll to top is disabled.
		if ( ! get_theme_mod( 'elearning_scroll_to_top', true ) ) {
			return;
		}
		?>

		<a href="#" id="tg-scroll-to-top" class="<?php elearning_css_class( 'elearning_scroll_to_top_class' ); ?>">
			<i class="<?php echo esc_attr( apply_filters( 'elearning_scroll_to_top_icon_class', 'tg-icon' ) ); ?> <?php echo esc_attr( apply_filters( 'elearning_scroll_to_top_icon', 'tg-icon-arrow-up' ) ); ?>">
				<span class="screen-reader-text"><?php esc_html_e( 'Scroll to top', 'elearning' ); ?></span>
			</i>
		</a>
		<div class="tg-overlay-wrapper"></div>
		<?php
	}
	add_action( 'elearning_footer_bottom', 'elearning_scroll_to_top' );
}
