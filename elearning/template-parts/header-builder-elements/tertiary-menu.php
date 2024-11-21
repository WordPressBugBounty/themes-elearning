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

<nav id="tg-tertiary-nav" class="tg-tertiary-nav menu">
	<?php
	$tertiary_menu = get_theme_mod( 'elearning_header_tertiary_menu', 'none' );
	wp_nav_menu(
		array(
			'theme_location' => 'menu-tertiary',
			'menu_id'        => 'tg-tertiary-menu',
			'menu'           => $tertiary_menu,
			'menu_class'     => 'tg-tertiary-menu',
			'container'      => '',
			'depth'          => apply_filters( 'elearning_tertiary-menu_depth', -1 ),
		)
	);
	?>
</nav><!-- #tg-tertiary-nav -->

