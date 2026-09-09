<?php
/**
 * Footer builder: CopyRight
 *
 * @package elearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

echo '<div class="tg-copyright">';
echo do_shortcode( wp_kses_post( elearning_footer_builder_copyright() ) );
echo '</div>';
