<?php
/**
 * Set Up Child Theme
 * Register Scripts and Fonts, add Supports
 * and initialize Template Tags and Utilities
 * 
 * @package dahtheme-child
 */
namespace Inc;

use Inc\ChildTemplateTags;
use Inc\ChildHooks;

// Don't load directly
if ( ! defined('ABSPATH') ) exit;

class SetupChildTheme {

	private $version;
	private $theme;
	private $api_key;

	/**
	 * Class Constructor - Register Theme Hooks
	 */
	public function __construct() {
		$this->theme   = wp_get_theme( 'dahtheme-child' );
		// $this->version = microtime( __FILE__ );
		$this->version = $this->theme->Version;
		$this->api_key = get_option( 'options_google_codes_google_api_key' );

		add_action( 'after_setup_theme', array($this, 'theme_setup') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_scripts') );
		// add_action( 'admin_enqueue_scripts', array($this, 'enqueue_admin_scripts') );
	}

	/**
	 * Enqueue Theme Styles and Scripts
	 */
	public function enqueue_scripts() {
		$parent_style  = 'dahtheme-child-style';
		wp_enqueue_style( 'theme-fonts', $this->theme_fonts_url(), array(), $this->version );
		wp_enqueue_style( 'dahtheme-child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), $this->version, 'all' );
		wp_enqueue_script( 'dahtheme-child-script', get_stylesheet_directory_uri() . '/assets/theme/app.min.js', array('jquery'), $this->version, true );
	}

	/**
	 * Enqueue Admin Styles and Scripts
	 */
	public function enqueue_admin_scripts() {
		wp_enqueue_style( 'dahtheme-child-admin-style', get_template_directory_uri() . '/assets/admin/style.css', array(), $this->version, 'all' );
		wp_enqueue_script( 'dahtheme-child-admin-script', get_template_directory_uri() . '/assets/admin/app.min.js', array(), $this->version, true );

	}

	/**
	 * Add Theme Supports, Register Nav Menus and Add Editor Style
	 */
	public function theme_setup() {
		/* Add Image Size */
		if( function_exists( 'add_image_size' ) ) { 
			add_image_size( 'slider-cover', 1600, 800, true );
			add_image_size( 'medium-thumb', 400, 400, true );
			add_image_size( 'admin-thumbnail', 150, 150, true );
			add_image_size( 'featured-gallery', 480, 360, true );
			add_image_size( 'featured-tour', 500, 500, true );
			add_image_size( 'bio-thumb', 9999, 300, false );
		}
	}

	/**
	 * Set Theme Fonts
	 */
	protected function theme_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';


		/* translators: If there are characters in your language that are not supported by EB Garamond, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'EB Garamond font: on or off', 'dahtheme-child' ) ) {
			$fonts[] = 'EB+Garamond:400,700';
		}

		/* translators: If there are characters in your language that are not supported by PT Sans Narrow, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'PT Sans Narrow font: on or off', 'dahtheme-child' ) ) {
			$fonts[] = 'PT+Sans+Narrow:400,700';
		}

		if ( $fonts ) {
		    $fonts_url = add_query_arg( array(
		        'family' => implode( '|', $fonts ),
		        'subset' => $subsets,
		    ), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

}