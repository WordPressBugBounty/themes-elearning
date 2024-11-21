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
<nav id="site-navigation" class="tg-main-nav tg-mobile-nav tg-mobile-menu">
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'menu-mobile',
			'menu_id'         => 'mobile-menu',
			'menu_class'      => 'menu-mobile',
			'container_class' => 'menu',
			'fallback_cb'     => 'elearning_menu_fallback',
		)
	);
	?>
</nav>
