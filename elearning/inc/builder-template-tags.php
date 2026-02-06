<?php

if ( ! function_exists( 'elearning_header_default_builder' ) ) {
	/**
	 * Header builder markup for this theme
	 *
	 * @package elearning
	 * @return array
	 *
	 * @since 1.0.0
	 */
	function elearning_header_default_builder() {
		$header_builder_default = apply_filters(
			'elearning_header_builder_default_options',
			array(
				'desktop' => array(
					'top'    => array(
						'left'   => array(),
						'center' => array(),
						'right'  => array(),
					),
					'main'   => array(
						'left'   => array(
							'logo',
						),
						'center' => array(),
						'right'  => array(
							'primary-menu',
							'search',
						),
					),
					'bottom' => array(
						'left'   => array(),
						'center' => array(),
						'right'  => array(),
					),
				),
				'mobile'  => array(
					'top'    => array(
						'left'   => array(),
						'center' => array(),
						'right'  => array(),
					),
					'main'   => array(
						'left'   => array(
							'logo',
						),
						'center' => array(),
						'right'  => array(
							'toggle-button',
						),
					),
					'bottom' => array(
						'left'   => array(),
						'center' => array(),
						'right'  => array(),
					),
				),
				'offset'  => array(
					'mobile-menu',
				),
			)
		);
		return $header_builder_default;
	}
}

if ( ! function_exists( 'elearning_render_header_cols' ) ) {
	/**
	 * Processes column elements for a specific area.
	 *
	 * @param array  $cols      An array of elements to be processed.
	 * @param string $cols_area The area of the columns (e.g., 'left', 'center', 'right').
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 * @version 1.1.0
	 */
	function elearning_render_header_cols( $cols, $cols_area ) {
		echo '<div class="tg-header-' . esc_attr( $cols_area ) . '-col">';
		foreach ( $cols as $element ) {
			do_action( 'elearning_header_template_parts', $element );
			get_template_part( "template-parts/header-builder-elements/$element", '' );
		}
		echo '</div>';
	}
}

if ( ! function_exists( 'elearning_header_builder_markup' ) ) {
	/**
	 * Hook for builder inside markup.
	 *
	 * @hooked elearning_header_builder_inside_markup - 10.
	 */
	function elearning_header_builder_markup() {

		do_action( 'elearning_header_builder_inside_markup' );
	}
}

if ( ! function_exists( 'elearning_header_builder_inside_markup' ) ) {
	/**
	 * Renders the inside markup for the header builder.
	 *
	 * This function generates the HTML structure for both desktop and mobile header layouts.
	 * It retrieves the header builder configuration from the theme mod, applies filters,
	 * and then renders the appropriate rows for desktop and mobile views.
	 *
	 * The function performs the following steps:
	 * 1. Retrieves the header builder configuration.
	 * 2. Renders the desktop header layout.
	 * 3. Renders the mobile header layout.
	 *
	 * @since 1.0.0
	 * @action elearning_header_builder_inside_markup
	 *
	 * @return void
	 */
	function elearning_header_builder_inside_markup() {

		$builder = get_theme_mod( 'elearning_header_builder', elearning_header_default_builder() );
		$builder = apply_filters( 'elearning_header_builder_options', $builder );

		echo '<div class="tg-row tg-desktop-row  tg-main-header">';
		$desktop_builder = filter_areas( $builder, 'desktop' );
		elearning_render_header_rows( $desktop_builder, 'desktop' );
		echo '</div>';

		echo '<div class="tg-row tg-mobile-row">';
		$mobile_builder = filter_areas( $builder, 'mobile' );
		elearning_render_header_rows( $mobile_builder, 'mobile' );
		echo '</div>';
	}
	add_action( 'elearning_header_builder_inside_markup', 'elearning_header_builder_inside_markup' );
}

if ( ! function_exists( 'filter_areas' ) ) {
	/**
	 * Filters the builder areas for a specific device.
	 *
	 * This function takes a builder configuration and a device type, and filters
	 * out empty rows from the builder layout for the specified device. If the
	 * device-specific configuration doesn't exist, it falls back to the default
	 * header builder configuration.
	 *
	 * @param array  $builder The builder configuration array.
	 * @param string $device  The device type (e.g., 'desktop', 'mobile').
	 *
	 * @return array Filtered array of non-empty rows for the specified device.
	 *
	 * @since 1.0.0
	 */
	function filter_areas( $builder, $device ) {
		return array_filter(
			isset( $builder[ $device ] ) ? $builder[ $device ] : elearning_header_default_builder()[ $device ],
			function ( $row ) {
				foreach ( $row as $cols ) {
					if ( ! empty( $cols ) ) {
						return true;
					}
				}
				return false;
			}
		);
	}
}

if ( ! function_exists( 'elearning_render_header_rows' ) ) {
	/**
	 * Renders the header rows for a specific device.
	 *
	 * This function iterates through the builder configuration and renders each header row.
	 * It handles different areas (top, middle, bottom) and applies specific actions and filters.
	 *
	 * The function performs the following steps:
	 * 1. Loops through each area in the builder configuration.
	 * 2. Applies actions before and after the header top area for desktop devices.
	 * 3. Checks if the current area should be disabled using a filter.
	 * 4. Renders the HTML structure for each row, including container and area-specific classes.
	 * 5. Calls elearning_render_header_cols() to render the columns within each row.
	 *
	 * @param array  $builder The builder configuration array.
	 * @param string $device  The device type (e.g., 'desktop', 'mobile').
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	function elearning_render_header_rows( $builder, $device ) {

		foreach ( $builder as $area => $row ) {
			if ( 'desktop' === $device && 'top' === $area ) {
				do_action( 'elearning_before_header_top' );
			}

			if ( apply_filters( 'elearning_disable_header_area', false, $area, $row, $builder ) ) {
				continue;
			}

			echo '<div class="tg-header-' . esc_attr( $area ) . '-row">';
			echo '<div class="tg-container">';
			echo '<div class="tg-' . esc_attr( $area ) . '-row">';

			foreach ( $row as $cols_area => $cols ) {
				elearning_render_header_cols( $cols, $cols_area );
			}

			echo '</div>';
			echo '</div>';
			echo '</div>';

			if ( 'desktop' === $device && 'top' === $area ) {
				do_action( 'elearning_after_header_top' );
			}
		}
	}
}

if ( ! function_exists( 'elearning_footer_builder_default' ) ) {
	/**
	 * Footer builder markup for this theme.
	 *
	 * @package elearning
	 * @return array
	 *
	 * @since 1.0.0
	 */
	function elearning_footer_builder_default() {
		return array(
			'desktop' => array(
				'top'    => array(
					'top-1' => array(),
					'top-2' => array(),
					'top-3' => array(),
					'top-4' => array(),
					'top-5' => array(),
				),
				'main'   => array(
					'main-1' => array(),
					'main-2' => array(),
					'main-3' => array(),
					'main-4' => array(),
					'main-5' => array(),
				),
				'bottom' => array(
					'bottom-1' => array( 'copyright' ),
					'bottom-2' => array(),
					'bottom-3' => array(),
					'bottom-4' => array(),
					'bottom-5' => array(),
				),
			),
			'offset'  => array(
				'mobile-menu',
			),
		);
	}
}

if ( ! function_exists( 'elearning_render_footer_cols' ) ) {
	/**
	 * Renders the footer columns for a specific area.
	 *
	 * This function generates the HTML structure for footer columns and populates
	 * them with the specified elements. It performs the following steps:
	 * 1. Creates a div with a class specific to the footer area.
	 * 2. Iterates through the provided elements.
	 * 3. Includes the template part for each element.
	 * 4. Closes the div container.
	 *
	 * @param array  $cols      An array of elements to be rendered in the footer columns.
	 * @param string $cols_area The specific area of the footer (e.g., 'left', 'center', 'right').
	 *
	 * @return void Outputs the HTML directly.
	 *
	 * @since 1.0.0
	 */
	function elearning_render_footer_cols( $cols, $cols_area ) {
		echo '<div class="tg-footer-' . esc_attr( $cols_area ) . '-col">';
		foreach ( $cols as $element ) {
			get_template_part( "template-parts/footer-builder-elements/$element", '' );
		}
		echo '</div>';
	}
}

if ( ! function_exists( 'elearning_footer_builder_markup' ) ) {
	/**
	 * Generates and outputs the footer builder markup.
	 *
	 * This function retrieves the footer builder configuration from theme mods,
	 * applies filters, and then constructs the HTML structure for the footer.
	 * It handles different areas (top, main, bottom) and their respective columns.
	 *
	 * The function performs the following steps:
	 * 1. Retrieves and filters the footer builder configuration.
	 * 2. Checks if the configuration is empty and returns early if so.
	 * 3. Outputs the opening footer tags with appropriate classes.
	 * 4. Iterates through each area of the footer (top, main, bottom):
	 *    - Filters out empty rows.
	 *    - Applies a filter to potentially disable specific areas.
	 *    - Generates the HTML structure for each area, including containers and rows.
	 *    - Renders columns within each row using elearning_render_footer_cols().
	 * 5. Closes all opened HTML tags.
	 *
	 * @return void Outputs the footer HTML directly.
	 *
	 * @since 1.0.0
	 */
	function elearning_footer_builder_markup() {
		$footer_builder = get_theme_mod( 'elearning_footer_builder', elearning_footer_builder_default() );
		$footer_builder = apply_filters( 'elearning_footer_builder_options', $footer_builder );

		if ( empty( $footer_builder ) ) {
			return;
		}
		echo '<div class="tg-row tg-footer-desktop-row">';
		foreach ( $footer_builder['desktop'] as $area => $row ) {
			$non_empty_row = array_filter(
				array_map(
					function ( $r ) {
						return ! empty( $r );
					},
					$row
				)
			);

			if ( empty( $non_empty_row ) ) {
				continue;
			}

			if ( apply_filters( 'elearning_disable_footer_area', false, $area, $row, $footer_builder ) ) {
				continue;
			}

			echo '<div class="tg-footer-' . esc_attr( $area ) . '-row" >';
			echo '<div class="tg-container" >';
			$classes = apply_filters(
				'elearning_footer_row_classes',
				array(
					'tg-' . esc_attr( $area ) . '-row',
				),
				$area
			);
			echo '<div class="' . esc_attr( implode( ' ', $classes ) ) . '">';
			$i       = 1;
			$top_row = get_theme_mod( 'elearning_footer_' . $area . '_area_cols', ( 'top' === $area || 'main' === $area ) ? 4 : 1 );
			$top_row = apply_filters( 'elearning_footer_' . $area . '_area_cols', $top_row );

			foreach ( $row as $cols_area => $cols ) {
				if ( $i <= $top_row ) {
					elearning_render_footer_cols( $cols, $cols_area );
				}
				++$i;
			}
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
	}
}
