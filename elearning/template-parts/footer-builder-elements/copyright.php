<?php
/**
 * Footer builder: CopyRight
 *
 * @package elearning
 */
echo '<div class="tg-copyright">';
echo do_shortcode( wp_kses_post( elearning_footer_builder_copyright() ) );
echo '</div>';
