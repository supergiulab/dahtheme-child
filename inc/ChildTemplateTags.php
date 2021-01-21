<?php
/**
 * Template Tags
 * 
 * @package dahtheme-child
 */
namespace Inc;

use UpInc\TemplateTags;

// Don't load directly
if ( ! defined('ABSPATH') ) exit;

class ChildTemplateTags {
	public function __construct() {
		// Tempate Tags Hooks
		// add_action( 'after_setup_theme', array($this, 'add_template_tags'), 10 );
		// add_action( 'wp', array($this, 'replace_template_tags'), 10 );
		// add_action( 'init', array($this, 'remove_template_tags'), 20 );
	}

	/**
	 * Add Template Tags
	 * 
	 * @uses  after_setup_theme
	 * @param $priority = 10
	 */
	public function add_template_tags() {
		global $tags;
	}

	/**
	 * Replace Template Tags
	 * 
	 * @uses wp | $post
	 */
	public function replace_template_tags() {
        // Init global Parent Theme Template Tags
		// global $tags, $post;

		// // Loop - set posts nav only for 'post'
		// if ( get_post_type( $post ) == 'post' ) {
		// 	add_action( 'loop_after', array($tags, 'post_nav'), 10 );
		// }
    }
    
    /**
	 * Remove Template Tags
	 * 
	 * @uses after_setup_theme
	 */
	public function remove_template_tags() {
		// Init global Parent Theme Template Tags
		// global $tags;
		// Remove Breadcrumbs
		// remove_action( 'open_main_tag', array($tags, 'do_breadcrumbs'), 23 );
	}

}