<?php
/**
 * Template part for displaying 404 content.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package eLearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
	<section class="error-404 not-found">
		<img
			src="<?php echo esc_url( get_template_directory_uri() . '/assets/svg/404.svg' ); ?>" alt=""
		/>

		<header class="tg-content-header">
			<p><?php esc_html_e( 'Oops! Page Not Found', 'elearning' ); ?></p>
		</header>

		<div class="tg-page-content">
			<p>
				<?php esc_html_e( 'We’re sorry, the page you requested could not be found. Please go back to the homepage', 'elearning' ); ?>
			</p>
		</div><!-- .tg-page-content -->

		<a class="tg-button" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span>
				<?php esc_html_e( 'Go Back', 'elearning' ); ?>
			</span>
		</a><!-- .button -->
	</section><!-- .tg-error-404 -->
