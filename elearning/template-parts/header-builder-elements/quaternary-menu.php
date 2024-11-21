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

<nav id="tg-quaternary-nav" class="tg-quaternary-nav menu">
	<?php
	$quaternary_menu = get_theme_mod( 'elearning_header_quaternary_menu', 'none' );
	wp_nav_menu(
		array(
			'theme_location' => 'menu-quaternary',
			'menu_id'        => 'tg-quaternary-menu',
			'menu'           => $quaternary_menu,
			'menu_class'     => 'tg-quaternary-menu',
			'container'      => '',
			'depth'          => apply_filters( 'elearning_quaternary-menu_depth', -1 ),
		)
	);
	?>
</nav><!-- #tg-quaternary-nav -->

