<?php


class eLearning_Starter_Content {
	const HOME_SLUG = 'home';
	const BLOG_SLUG = 'blog';

	public function __construct() {
		add_filter( 'elearning_header_builder_default_options', array( $this, 'header_builder_options' ) );
		add_filter( 'elearning_footer_builder_default_options', array( $this, 'footer_builder_options' ) );
		//      add_action( 'wp_enqueue_scripts', array( $this, 'customizer_starter_css' ) );

		add_filter(
			'body_class',
			function ( $classes ) {
				$classes[] = 'tg-started-content';
				return $classes;
			}
		);
	}

	/**
	 * Return starter content definition.
	 *
	 * @return mixed|void
	 */
	public static function get() {

		$nav_items = [
			'page_courses' => [
				'title' => 'Courses',
				'url'   => '#',
			],
			'page_account' => [
				'title' => 'Account',
				'url'   => '#',
			],
		];

		$content = [
			'nav_menus'   =>
				[
					'menu-primary' => [
						'items' => $nav_items,
					],
				],
			'options'     => [
				'page_on_front'  => '{{' . self::HOME_SLUG . '}}',
				'page_for_posts' => '{{' . self::BLOG_SLUG . '}}',
				'show_on_front'  => 'page',
				'blogname'       => '',
			],
			'theme_mods'  => require __DIR__ . '/compatibility/starter-content/theme-mods.php',
			'attachments' => array(
				'featured-image-logo' => array(
					'post_title'   => 'Logo',
					'post_content' => 'Attachment Description',
					'post_excerpt' => 'Attachment Caption',
					'file'         => 'assets/img/starter/elearning-logo.png',
				),
			),
			'posts'       => [
				self::HOME_SLUG => require __DIR__ . '/compatibility/starter-content/home.php',
				self::BLOG_SLUG => [
					'post_name'  => self::BLOG_SLUG,
					'post_type'  => 'page',
					'post_title' => _x( 'Blog', 'Theme starter content', 'elearning' ),
				],
			],
		];

		return apply_filters( 'elearning_starter_content', $content );
	}

	public function customizer_starter_css() {
		if ( is_front_page() && is_customize_preview() ) {
			wp_enqueue_style( 'elearning-starter-content', get_template_directory_uri() . '/assets/css/starter-content.css', array(), '' );
		}
	}

	public function header_builder_options( $options ) {

		if ( ! get_option( 'fresh_site' ) ||
			! is_customize_preview() ) {
			return $options;
		}

		return array(
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
					'right'  => array( 'primary-menu', 'button' ),
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
					'left'   => array(),
					'center' => array(
						'logo',
					),
					'right'  => array(),
				),
				'bottom' => array(
					'left'   => array(
						'toggle-button',
					),
					'center' => array(),
					'right'  => array(),
				),
			),
			'offset'  => array(
				'mobile-menu',
				'button',
			),
		);
	}

	public function footer_builder_options( $options ) {
		if ( ! get_option( 'fresh_site' ) ||
			! is_customize_preview() ) {
			return $options;
		}

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
					'bottom-2' => array( '' ),
					'bottom-3' => array(),
					'bottom-4' => array(),
					'bottom-5' => array(),
				),
			),
		);
	}
}

return new eLearning_Starter_Content();
