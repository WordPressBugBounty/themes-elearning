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

<nav id="site-navigation" class="tg-main-nav tg-primary-nav <?php elearning_css_class( 'elearning_nav_class' ); ?> <?php elearning_primary_menu_class(); ?>">
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'menu-primary',
			'menu_id'         => 'primary-menu',
			'menu_class'      => 'menu-primary',
			'container_class' => 'menu',
			'fallback_cb'     => 'elearning_menu_fallback',
		)
	);
	?>
</nav><!-- #tg-primary-nav -->

