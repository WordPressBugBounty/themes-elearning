<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$html_1 = get_theme_mod( 'elearning_header_html_1', esc_html__( 'Insert Text Here', 'elearning' ) );
echo '<div class="tg-html-1">';
echo $html_1;
echo '</div>';
