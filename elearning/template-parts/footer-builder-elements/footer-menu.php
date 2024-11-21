<?php
/**
 * Site navigation template file.
 *
 * @package elearning
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<nav id="tg-footer-nav" class="tg-footer-nav">
	<?php
	$footer_menu = get_theme_mod( 'elearning_footer_menu', 'none' );
	wp_nav_menu(
		array(
			'theme_location' => 'menu-footer',
			'menu_id'        => 'tg-footer-menu',
			'menu'           => $footer_menu,
			'menu_class'     => 'tg-footer-menu',
			'container'      => '',
			'depth'          => apply_filters( 'elearning_footer-menu_depth', -1 ),
		)
	);
	?>
</nav><!-- #tg-footer-nav -->
