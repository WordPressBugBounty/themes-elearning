<?php
/**
 * eLearning helper functions.
 *
 * @package elearning
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'elearning_is_script_debug_mode' ) ) {

	/**
	 * Check if dev mode is ON in wp-config.php file.
	 *
	 * TODO: @return boolean true if SCRIPT_DEBUG is enabled, false otherwise.
	 * @link https://wordpress.org/support/article/debugging-in-wordpress/#script_debug
	 *
	 * @since.
	 *
	 */
	function elearning_is_script_debug_mode() {

		return ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG );
	}
}

if ( ! function_exists( 'elearning_get_script_suffix' ) ) {

	/**
	 * Return suffix depending on if dev mode is ON or not.
	 *
	 * TODO: @return string
	 * @since 3.0.0
	 *
	 */
	function elearning_get_script_suffix() {

		return elearning_is_script_debug_mode() ? '' : '.min';
	}
}

if ( ! function_exists( 'elearning_get_parent_theme' ) ) {

	/**
	 * Return elearning parent theme header information.
	 *
	 * TODO: @return string|false string on success, false on failure.
	 * @since.
	 *
	 */
	function elearning_get_parent_theme( $header ) {

		return wp_get_theme( get_template() )->get( $header );
	}
}

if ( ! function_exists( 'elearning_is_woocommerce_active' ) ) {

	/**
	 * Check if WooCommerce plugin is active.
	 *
	 * @see https://docs.woocommerce.com/document/query-whether-woocommerce-is-activated/
	 */
	function elearning_is_woocommerce_active() {

		if ( class_exists( 'woocommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'elearning_footer_copyright' ) ) {

	/**
	 * Get Copyright text.
	 *
	 * @param string $section 'one' or 'two' only should be passed as param.
	 *
	 * @return array|string|string[]|null
	 */
	function elearning_footer_copyright( $section ) {

		if ( '1' === $section ) {
			$default = sprintf(
			/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
				esc_html__( 'Copyright &copy; %1$s %2$s. Powered by %3$s and %4$s.', 'elearning' ),
				'{the-year}',
				'{site-link}',
				'{theme-link}',
				'{wp-link}'
			);
		} else {
			$default = '';
		}

		$content      = get_theme_mod( "elearning_footer_bar_column_{$section}_html", $default );
		$theme_author = apply_filters(
			'elearning_theme_author',
			array(
				'theme_name'       => __( 'eLearning', 'elearning' ),
				'theme_author_url' => 'https://elearningtheme.com/',
			)
		);
		$site_link    = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" >' . get_bloginfo( 'name', 'display' ) . '</a>';
		$theme_link   = '<a href="' . esc_url( $theme_author['theme_author_url'] ) . '" target="_blank" title="' . esc_attr( $theme_author['theme_name'] ) . '" rel="nofollow">' . $theme_author['theme_name'] . '</a>';
		$wp_link      = '<a href="' . esc_url( 'https://wordpress.org/' ) . '" target="_blank" title="' . esc_attr__( 'WordPress', 'elearning' ) . '" rel="nofollow">' . __( 'WordPress', 'elearning' ) . '</a>';

		if ( $content || is_customize_preview() ) {
			$content = str_replace( '{the-year}', date_i18n( 'Y' ), $content );
			$content = str_replace( '{site-link}', $site_link, $content );
			$content = str_replace( '{theme-link}', $theme_link, $content );
			$content = str_replace( '{wp-link}', $wp_link, $content );
		}

		return $content;
	}
}

if ( ! function_exists( 'elearning_footer_builder_copyright' ) ) {

	/**
	 * Get Copyright text.
	 *
	 * @param string $section 'one' or 'two' only should be passed as param.
	 *
	 * @return array|string|string[]|null
	 */
	function elearning_footer_builder_copyright() {

			$default = sprintf(
			/* translators: 1: Current Year, 2: Site Name, 3: Theme Link, 4: WordPress Link. */
				esc_html__( 'Copyright &copy; %1$s %2$s. Powered by %3$s and %4$s.', 'elearning' ),
				'{the-year}',
				'{site-link}',
				'{theme-link}',
				'{wp-link}'
			);

		$content      = get_theme_mod( 'elearning_footer_copyright', $default );
		$theme_author = apply_filters(
			'elearning_theme_author',
			array(
				'theme_name'       => __( 'eLearning', 'elearning' ),
				'theme_author_url' => 'https://elearningtheme.com/',
			)
		);
		$site_link    = '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" >' . get_bloginfo( 'name', 'display' ) . '</a>';
		$theme_link   = '<a href="' . esc_url( $theme_author['theme_author_url'] ) . '" target="_blank" title="' . esc_attr( $theme_author['theme_name'] ) . '" rel="nofollow">' . $theme_author['theme_name'] . '</a>';
		$wp_link      = '<a href="' . esc_url( 'https://wordpress.org/' ) . '" target="_blank" title="' . esc_attr__( 'WordPress', 'elearning' ) . '" rel="nofollow">' . __( 'WordPress', 'elearning' ) . '</a>';

		if ( $content || is_customize_preview() ) {
			$content = str_replace( '{the-year}', date_i18n( 'Y' ), $content );
			$content = str_replace( '{site-link}', $site_link, $content );
			$content = str_replace( '{theme-link}', $theme_link, $content );
			$content = str_replace( '{wp-link}', $wp_link, $content );
		}

		return $content;
	}
}

if ( ! function_exists( 'elearning_get_menu_options' ) ) :

	/**
	 * Provides an array of Menu slug => name for dropdown.
	 *
	 *
	 * @param string $key Type of key in the menu item associative array.
	 *
	 * @return array
	 */
	function elearning_get_menu_options( $key = 'slug' ) {
		$all_menus = get_terms(
			array(
				'taxonomy'   => 'nav_menu',
				'hide_empty' => true,
			)
		);

		$menu_options         = array();
		$menu_options['none'] = esc_html__( 'None', 'elearning' );

		foreach ( $all_menus as $menu_item ) {
			if ( 'term_id' === $key ) {
				$menu_options[ $menu_item->term_id ] = esc_html( $menu_item->name );
			} else {
				$menu_options[ $menu_item->slug ] = esc_html( $menu_item->name );
			}
		}

		return $menu_options;
	}

endif;

if ( ! function_exists( 'elearning_parse_css' ) ) :

	/**
	 * Parses CSS.
	 *
	 * @param string|array $default_value Default value.
	 * @param string|array $output_value Updated value.
	 * @param array $css_output Array of CSS.
	 * @param string $min_media Min Media breakpoint.
	 * @param string $max_media Max Media breakpoint.
	 *
	 * @return string Generated CSS.
	 */
	function elearning_parse_css( $default_value, $output_value, $css_output = array(), $min_media = '', $max_media = '' ) {

		// Return if default value matches.
		if ( $default_value === $output_value ) {
			return;
		}

		$parse_css = '';

		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( null === $properties ) {
					break;
				}

				if ( ! count( $properties ) ) {
					continue;
				}

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue;
					}

					++$properties_added;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' !== $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = 'screen and (min-width:' . $min_media . 'px)';
				}

				if ( '' !== $max_media ) {
					$max_media_css = 'screen and (max-width:' . $max_media . 'px)';
				}

				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;
			}
		}

		return $parse_css;
	}
endif;

if ( ! function_exists( 'elearning_parse_background_css' ) ) :

	/**
	 * Returns the background CSS property for dynamic CSS generation.
	 *
	 * @param string|array $default_value Default value.
	 * @param string|array $output_value Updated value.
	 * @param string $selector CSS selector.
	 *
	 * @return string|void Generated CSS for background CSS property.
	 */
	function elearning_parse_background_css( $default_value, $output_value, $selector ) {

		if ( $default_value === $output_value ) {
			return;
		}

		$parse_css = $selector . '{';

		// For background color.
		if ( isset( $output_value['background-color'] ) && ! empty( $output_value['background-color'] ) && ( $output_value['background-color'] !== $default_value['background-color'] ) ) {
			$parse_css .= 'background-color:' . $output_value['background-color'] . ';';
		}

		// For background image.
		if ( isset( $output_value['background-image'] ) && ! empty( $output_value['background-image'] ) && ( $output_value['background-image'] !== $default_value['background-image'] ) ) {
			$parse_css .= 'background-image:url(' . $output_value['background-image'] . ');';
		}

		// For background position.
		if ( isset( $output_value['background-position'] ) && ! empty( $output_value['background-position'] ) && ( $output_value['background-position'] !== $default_value['background-position'] ) ) {
			$parse_css .= 'background-position:' . $output_value['background-position'] . ';';
		}

		// For background size.
		if ( isset( $output_value['background-size'] ) && ! empty( $output_value['background-size'] ) && ( $output_value['background-size'] !== $default_value['background-size'] ) ) {
			$parse_css .= 'background-size:' . $output_value['background-size'] . ';';
		}

		// For background attachment.
		if ( isset( $output_value['background-attachment'] ) && ! empty( $output_value['background-attachment'] ) && ( $output_value['background-attachment'] !== $default_value['background-attachment'] ) ) {
			$parse_css .= 'background-attachment:' . $output_value['background-attachment'] . ';';
		}

		// For background repeat.
		if ( isset( $output_value['background-repeat'] ) && ! empty( $output_value['background-repeat'] ) && ( $output_value['background-repeat'] !== $default_value['background-repeat'] ) ) {
			$parse_css .= 'background-repeat:' . $output_value['background-repeat'] . ';';
		}

		$parse_css .= '}';

		return $parse_css;
	}
endif;

if ( ! function_exists( 'elearning_parse_typography_css' ) ) :

	/**
	 * Returns the typography CSS property for dynamic CSS generation.
	 *
	 * @param string|array $default_value Default value.
	 * @param string|array $output_value Updated value.
	 * @param string $selector CSS selector.
	 * @param array $devices Devices for breakpoints.
	 *
	 * @return string|void Generated CSS for typography CSS.
	 */
	function elearning_parse_typography_css( $default_value, $output_value, $selector, $devices = array() ) {

		if ( $default_value === $output_value ) {
			return;
		}

		$parse_css = $selector . '{';

		// For font family.
		$default_value_font_family = isset( $default_value['font-family'] ) ? $default_value['font-family'] : '';
		if ( isset( $output_value['font-family'] ) && ! empty( $output_value['font-family'] ) && ( $output_value['font-family'] !== $default_value_font_family ) ) {
			$parse_css .= 'font-family:' . $output_value['font-family'] . ';';
		}

		// For font style.
		$default_value_font_style = isset( $default_value['font-style'] ) ? $default_value['font-style'] : '';
		if ( isset( $output_value['font-style'] ) && ! empty( $output_value['font-style'] ) && ( $output_value['font-style'] !== $default_value_font_style ) ) {
			$parse_css .= 'font-style:' . $output_value['font-style'] . ';';
		}

		// For text transform.
		$default_value_text_transform = isset( $default_value['text-transform'] ) ? $default_value['text-transform'] : '';
		if ( isset( $output_value['text-transform'] ) && ! empty( $output_value['text-transform'] ) && ( $output_value['text-transform'] !== $default_value_text_transform ) ) {
			$parse_css .= 'text-transform:' . $output_value['text-transform'] . ';';
		}

		// For text decoration.
		$default_value_text_decoration = isset( $default_value['text-decoration'] ) ? $default_value['text-decoration'] : '';
		if ( isset( $output_value['text-decoration'] ) && ! empty( $output_value['text-decoration'] ) && ( $output_value['text-decoration'] !== $default_value_text_decoration ) ) {
			$parse_css .= 'text-decoration:' . $output_value['text-decoration'] . ';';
		}

		// For font weight.
		$default_value_font_weight = isset( $default_value['font-weight'] ) ? $default_value['font-weight'] : '';
		if ( isset( $output_value['font-weight'] ) && ! empty( $output_value['font-weight'] ) && ( $output_value['font-weight'] !== $default_value_font_weight ) ) {
			$font_weight_value = $output_value['font-weight'];

			if ( 'italic' === $font_weight_value || 'regular' === $font_weight_value ) {
				$parse_css .= 'font-weight:' . 400 . ';';
			} else {
				$parse_css .= 'font-weight:' . str_replace( 'italic', '', $font_weight_value ) . ';';
			}
		}

		// For font size on desktop.
		$font_size_unit            = isset( $output_value['font-size']['desktop']['unit'] ) ? $output_value['font-size']['desktop']['unit'] : 'px';
		$default_desktop_font_size = isset( $default_value['font-size']['desktop']['size'] ) ? $default_value['font-size']['desktop']['size'] : '';
		if ( isset( $output_value['font-size']['desktop']['size'] ) && ! empty( $output_value['font-size']['desktop']['size'] ) && ( $output_value['font-size']['desktop']['size'] !== $default_desktop_font_size ) ) {
			$parse_css .= 'font-size:' . $output_value['font-size']['desktop']['size'] . $font_size_unit . ';';
		}

		// For line height on desktop.
		$line_height_unit_value      = isset( $output_value['line-height']['desktop']['unit'] ) ? $output_value['line-height']['desktop']['unit'] : 'px';
		$line_height_unit            = ( '-' !== $line_height_unit_value ) ? $line_height_unit_value : '';
		$default_desktop_line_height = isset( $default_value['line-height']['desktop']['size'] ) ? $default_value['line-height']['desktop']['size'] : '';

		if ( isset( $output_value['line-height']['desktop']['size'] ) && ! empty( $output_value['line-height']['desktop']['size'] ) && ( $output_value['line-height']['desktop']['size'] !== $default_desktop_line_height ) ) {
			$parse_css .= 'line-height:' . $output_value['line-height']['desktop']['size'] . $line_height_unit . ';';
		}

		// For letter spacing on desktop.
		$letter_spacing_unit            = isset( $output_value['letter-spacing']['desktop']['unit'] ) ? $output_value['letter-spacing']['desktop']['unit'] : 'px';
		$default_desktop_letter_spacing = isset( $default_value['letter-spacing']['desktop']['size'] ) ? $default_value['letter-spacing']['desktop']['size'] : '';

		if ( isset( $output_value['letter-spacing']['desktop']['size'] ) && ! empty( $output_value['letter-spacing']['desktop']['size'] ) && ( $output_value['letter-spacing']['desktop']['size'] !== $default_desktop_letter_spacing ) ) {
			$parse_css .= 'letter-spacing:' . $output_value['letter-spacing']['desktop']['size'] . $letter_spacing_unit . ';';
		}

		$parse_css .= '}';

		// For responsive devices.
		if ( is_array( $devices ) ) {

			foreach ( $devices as $device => $size ) {

				// For tablet devices.
				if ( 'tablet' === $device && $size ) {
					$default_tablet_font_size_spacing = isset( $default_value['font-size']['tablet']['size'] ) ? $default_value['font-size']['tablet']['size'] : '';
					if ( isset( $output_value['font-size']['tablet']['size'] ) && ! empty( $output_value['font-size']['tablet']['size'] ) && $output_value['font-size']['tablet']['size'] !== $default_tablet_font_size_spacing ) {

						$font_size_tablet_unit = $output_value['font-size']['tablet']['unit'] ? $output_value['font-size']['tablet']['unit'] : 'px';

						$parse_css .= '@media(max-width:' . $size . 'px){';
						$parse_css .= $selector . '{';
						$parse_css .= 'font-size:' . $output_value['font-size']['tablet']['size'] . $font_size_tablet_unit . ';';
						$parse_css .= '}';
						$parse_css .= '}';
					}

					$default_tablet_line_height_spacing = isset( $default_value['line-height']['tablet']['size'] ) ? $default_value['line-height']['tablet']['size'] : '';
					if ( isset( $output_value['line-height']['tablet']['size'] ) && ! empty( $output_value['line-height']['tablet']['size'] ) && $output_value['line-height']['tablet']['size'] !== $default_tablet_line_height_spacing ) {

						$line_height_tablet_unit_value = $output_value['line-height']['tablet']['unit'] ? $output_value['line-height']['tablet']['unit'] : '';
						$line_height_tablet_unit       = ( '-' !== $line_height_tablet_unit_value ) ? $line_height_tablet_unit_value : '';

						$parse_css .= '@media(max-width:' . $size . 'px){';
						$parse_css .= $selector . '{';
						$parse_css .= 'line-height:' . $output_value['line-height']['tablet']['size'] . $line_height_tablet_unit . ';';
						$parse_css .= '}';
						$parse_css .= '}';
					}

					$default_tablet_letter_spacing_spacing = isset( $default_value['letter-spacing']['tablet']['size'] ) ? $default_value['letter-spacing']['tablet']['size'] : '';
					if ( isset( $output_value['letter-spacing']['tablet']['size'] ) && ! empty( $output_value['letter-spacing']['tablet']['size'] ) && $output_value['letter-spacing']['tablet']['size'] !== $default_tablet_letter_spacing_spacing ) {

						$letter_spacing_tablet_unit = $output_value['letter-spacing']['tablet']['unit'] ? $output_value['letter-spacing']['tablet']['unit'] : 'px';

						$parse_css .= '@media(max-width:' . $size . 'px){';
						$parse_css .= $selector . '{';
						$parse_css .= 'letter-spacing:' . $output_value['letter-spacing']['tablet']['size'] . $letter_spacing_tablet_unit . ';';
						$parse_css .= '}';
						$parse_css .= '}';
					}
				}

				// For mobile devices.
				if ( 'mobile' === $device && $size ) {
					$default_mobile_font_size_spacing = isset( $default_value['font-size']['mobile']['size'] ) ? $default_value['font-size']['mobile']['size'] : '';
					if ( isset( $output_value['font-size']['mobile']['size'] ) && ! empty( $output_value['font-size']['mobile']['size'] ) && $output_value['font-size']['mobile']['size'] !== $default_mobile_font_size_spacing ) {

						$font_size_mobile_unit = $output_value['font-size']['mobile']['unit'] ? $output_value['font-size']['mobile']['unit'] : 'px';

						$parse_css .= '@media(max-width:' . $size . 'px){';
						$parse_css .= $selector . '{';
						$parse_css .= 'font-size:' . $output_value['font-size']['mobile']['size'] . $font_size_mobile_unit . ';';
						$parse_css .= '}';
						$parse_css .= '}';
					}

					$default_mobile_line_height_spacing = isset( $default_value['line-height']['mobile']['size'] ) ? $default_value['line-height']['mobile']['size'] : '';
					if ( isset( $output_value['line-height']['mobile']['size'] ) && ! empty( $output_value['line-height']['mobile']['size'] ) && $output_value['line-height']['mobile']['size'] !== $default_mobile_line_height_spacing ) {

						$line_height_mobile_unit_value = $output_value['line-height']['mobile']['unit'] ? $output_value['line-height']['mobile']['unit'] : '';
						$line_height_mobile_unit       = ( '-' !== $line_height_mobile_unit_value ) ? $line_height_mobile_unit_value : '';

						$parse_css .= '@media(max-width:' . $size . 'px){';
						$parse_css .= $selector . '{';
						$parse_css .= 'line-height:' . $output_value['line-height']['mobile']['size'] . $line_height_mobile_unit . ';';
						$parse_css .= '}';
						$parse_css .= '}';
					}

					$default_mobile_letter_spacing_spacing = isset( $default_value['letter-spacing']['mobile']['size'] ) ? $default_value['letter-spacing']['mobile']['size'] : '';
					if ( isset( $output_value['letter-spacing']['mobile']['size'] ) && ! empty( $output_value['letter-spacing']['mobile']['size'] ) && $output_value['letter-spacing']['mobile']['size'] !== $default_mobile_letter_spacing_spacing ) {

						$letter_spacing_mobile_unit = $output_value['letter-spacing']['mobile']['unit'] ? $output_value['letter-spacing']['mobile']['unit'] : 'px';

						$parse_css .= '@media(max-width:' . $size . 'px){';
						$parse_css .= $selector . '{';
						$parse_css .= 'letter-spacing:' . $output_value['letter-spacing']['mobile']['size'] . $letter_spacing_mobile_unit . ';';
						$parse_css .= '}';
						$parse_css .= '}';
					}
				}
			}
		}

		return $parse_css;
	}
endif;

if ( ! function_exists( 'elearning_parse_dimension_css' ) ) :

	/**
	 * Returns the background CSS property for dynamic CSS generation.
	 *
	 * @param string|array $default_value Default value.
	 * @param string|array $output_value Updated value.
	 * @param string $selector CSS selector.
	 * @param string $property CSS property.
	 *
	 * @return string|void Generated CSS for dimension CSS.
	 */
	function elearning_parse_dimension_css( $default_value, $output_value, $selector, $property ) {

		if ( $default_value === $output_value ) {
			return;
		}

		$parse_css = $selector . '{';

		$unit = isset( $output_value['unit'] ) ? $output_value['unit'] : ( isset( $default_value['unit'] ) ? $default_value['unit'] : 'px' );

		if ( 'border-width' === $property ) {

			if ( isset( $output_value['top'] ) && ! empty( $output_value['top'] ) && ( $output_value['top'] !== $default_value['top'] ) ) {
				$parse_css .= 'border-top-width:' . $output_value['top'] . $unit . ';';
			}

			if ( isset( $output_value['right'] ) && ! empty( $output_value['right'] ) && ( $output_value['right'] !== $default_value['right'] ) ) {
				$parse_css .= 'border-right-width:' . $output_value['right'] . $unit . ';';
			}

			if ( isset( $output_value['bottom'] ) && ! empty( $output_value['bottom'] ) && ( $output_value['bottom'] !== $default_value['bottom'] ) ) {
				$parse_css .= 'border-bottom-width:' . $output_value['bottom'] . $unit . ';';
			}

			if ( isset( $output_value['left'] ) && ! empty( $output_value['left'] ) && ( $output_value['left'] !== $default_value['left'] ) ) {
				$parse_css .= 'border-left-width:' . $output_value['left'] . $unit . ';';
			}
		} elseif ( 'border-radius' === $property ) {

			if ( isset( $output_value['top'] ) && ! empty( $output_value['top'] ) && ( $output_value['top'] !== $default_value['top'] ) ) {
				$parse_css .= 'border-top-left-radius:' . $output_value['top'] . $unit . ';';
			}

			if ( isset( $output_value['right'] ) && ! empty( $output_value['right'] ) && ( $output_value['right'] !== $default_value['right'] ) ) {
				$parse_css .= 'border-top-right-radius:' . $output_value['right'] . $unit . ';';
			}

			if ( isset( $output_value['bottom'] ) && ! empty( $output_value['bottom'] ) && ( $output_value['bottom'] !== $default_value['bottom'] ) ) {
				$parse_css .= 'border-bottom-right-radius:' . $output_value['bottom'] . $unit . ';';
			}

			if ( isset( $output_value['left'] ) && ! empty( $output_value['left'] ) && ( $output_value['left'] !== $default_value['left'] ) ) {
				$parse_css .= 'border-bottom-left-radius:' . $output_value['left'] . $unit . ';';
			}
		} else {
			if ( isset( $output_value['top'] ) && ! empty( $output_value['top'] ) && ( $output_value['top'] !== $default_value['top'] ) ) {
				$parse_css .= $property . '-top:' . $output_value['top'] . $unit . ';';
			}

			if ( isset( $output_value['right'] ) && ! empty( $output_value['right'] ) && ( $output_value['right'] !== $default_value['right'] ) ) {
				$parse_css .= $property . '-right:' . $output_value['right'] . $unit . ';';
			}

			if ( isset( $output_value['bottom'] ) && ! empty( $output_value['bottom'] ) && ( $output_value['bottom'] !== $default_value['bottom'] ) ) {
				$parse_css .= $property . '-bottom:' . $output_value['bottom'] . $unit . ';';
			}

			if ( isset( $output_value['left'] ) && ! empty( $output_value['left'] ) && ( $output_value['left'] !== $default_value['left'] ) ) {
				$parse_css .= $property . '-left:' . $output_value['left'] . $unit . ';';
			}
		}

		$parse_css .= '}';

		return $parse_css;
	}
endif;

if ( ! function_exists( 'elearning_parse_slider_css' ) ) :

	/**
	 * Returns the background CSS property for dynamic CSS generation.
	 *
	 * @param string|array $default_value Default value.
	 * @param string|array $output_value Updated value.
	 * @param string $selector CSS selector.
	 * @param string $property CSS property.
	 *
	 * @return string|void Generated CSS for dimension CSS.
	 */
	function elearning_parse_slider_css( $default_value, $output_value, $selector, $property ) {

		if ( $default_value === $output_value ) {

			return;
		}

		$parse_css = '';

		if ( isset( $output_value['size'] ) && ! empty( $output_value['size'] ) ) {

			if ( strpos( $selector, ',' ) !== false ) {

				$selector_array = explode( ',', $selector );
				$property_array = explode( ',', $property );

				foreach ( $selector_array as $selectors ) {

					$parse_css .= $selectors . '{';

					foreach ( $property_array as $properties ) {

						$unit       = isset( $output_value['unit'] ) ? $output_value['unit'] : ( isset( $default_value['unit'] ) ? $default_value['unit'] : 'px' );
						$parse_css .= $properties . ':' . $output_value['size'] . $unit . ';';
					}

					$parse_css .= '}';
				}
			} else {

				$parse_css .= $selector . '{';

				$unit       = isset( $output_value['unit'] ) ? $output_value['unit'] : ( isset( $default_value['unit'] ) ? $default_value['unit'] : 'px' );
				$parse_css .= $property . ':' . $output_value['size'] . $unit . ';';
				$parse_css .= '}';
			}
		}

		return $parse_css;
	}

endif;
