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

<nav id="tg-secondary-nav" class="tg-secondary-nav menu">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-secondary',
			'menu_id'        => 'tg-secondary-menu',
			'menu_class'     => 'tg-secondary-menu',
			'container'      => '',
			'fallback_cb'    => 'elearning_menu_fallback',
		)
	);
	?>
</nav><!-- #tg-secondary-nav -->

