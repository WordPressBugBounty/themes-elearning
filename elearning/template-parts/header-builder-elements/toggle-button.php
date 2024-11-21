<?php
/**
 * Mobile toggle icon template file.
 *
 * @package elearning
 *
 * @since 3.0.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<?php
$mobile_menu_label      = get_theme_mod( 'elearning_mobile_menu_text', '' );
$enable_header_button   = get_theme_mod( 'elearning_enable_mobile_header_button', '' );
$enable_header_button_2 = get_theme_mod( 'elearning_enable_mobile_header_button_2', '' );
$builder                = get_theme_mod( 'elearning_header_builder', elearning_header_default_builder() );

?>

<div class="elearning_mobile_component"

	<?php echo wp_kses_post( apply_filters( 'elearning_nav_toggle_data_attrs', '' ) ); ?>>

	<?php
	// @codingStandardsIgnoreStart
	echo apply_filters( 'elearning_before_mobile_menu_toggle', '' ); // WPCS: CSRF ok.
	// @codingStandardsIgnoreEnd
	?>

	<button class="tg-mobile-toggle" aria-label="<?php esc_attr_e( 'Primary Menu', 'elearning' ); ?>" >
		<i class="tg-icon tg-icon-bars"><?php echo esc_html( $mobile_menu_label ); ?></i>
	</button><!-- /.tg-menu-toggle -->

	<div id="mobile-navigation" class="<?php elearning_css_class( 'elearning_mobile_nav_class' ); ?>" <?php echo apply_filters( 'elearning_nav_data_attrs', '' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
		<?php


		foreach ( $builder['desktop'] as $area => $cols ) {
			foreach ( $cols as $element => $value ) {
				foreach ( $value as $key ) {
					if ( 'search' === $key ) {
						get_search_form();
					}
				}
			}
		}

		foreach ( $builder['offset'] as $cols ) {

			if ( isset( $cols ) ) {
				get_template_part( "template-parts/header-builder-elements/$cols", '' );
			}
		}
		?>
	</div> <!-- /#tg-mobile-nav-->

</div> <!-- /.tg-toggle-menu -->
