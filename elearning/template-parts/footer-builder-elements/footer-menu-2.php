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

<nav id="tg-footer-nav-2" class="tg-footer-nav-2">
	<?php
	$footer_menu_2 = get_theme_mod( 'elearning_footer_menu_2', 'none' );
	wp_nav_menu(
		array(
			'theme_location' => 'menu-footer-2',
			'menu_id'        => 'tg-footer-menu-2',
			'menu'           => $footer_menu_2,
			'menu_class'     => 'tg-footer-menu-2',
			'container'      => '',
			'depth'          => apply_filters( 'elearning_footer-menu_2_depth', -1 ),
		)
	);
	?>
</nav><!-- #tg-footer-nav -->
