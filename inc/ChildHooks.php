<?php
/**
 * Hooks
 * 
 * @package dahtheme-child
 */
namespace Inc;

use UpInc\TemplateTags;
// use Add\ChildGutenbergModules;

// Don't load directly
if ( ! defined('ABSPATH') ) exit;

class ChildHooks {

	public function __construct() {
		// add_action( 'init', array($this, 'enable_theme_addons'), 1 );
		// add_filter( 'acf_post_related_args_filter', array($this, 'acf_set_post_related_args') );
	}

	/**
	 * Enable Theme Addons
	 * 
	 * Custom Gutenberg Modules
	 * Advanced Custom Fields
	 */
	public function enable_theme_addons() {
		$modules = new ChildGutenbergModules();
	}

	/**
	 * Filter Post Related Field Display Args
	 * 
	 * @uses $field_id = related_{post_type}_{location}
	 * @uses acf_post_related_args_filter
	 */
	public function acf_set_post_related_args() {
		$args = array(
			'related_solution_sector' => array(
				'label'     => __('Solutions', 'enerqos'),
				'post_type' => 'solution',
				'location'  => 'sector'
			),
			'related_solution' => array(
				'label'     => __('Solutions', 'enerqos'),
				'post_type' => 'solution',
				'location'  => 'project'
			),
			'related_sector' => array(
				'label'     => __('Sectors', 'enerqos'),
				'post_type' => 'sector',
				'location'  => 'project'
			),
		);

		return $args;
	}

}