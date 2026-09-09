<?php
/**
 * Cart
 *
 * @package elearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( function_exists( 'elearning_is_woocommerce_active' ) && ! elearning_is_woocommerce_active() ) {
	return;
}

?>
<div class="tg-mini-cart">
	<?php echo eLearnning_WooCommerce::woocommerce_header_cart(); ?>
</div>

<?php
