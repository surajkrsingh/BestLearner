<?php
/**
 * Lifestyle file includes and definitions
 *
 * @package lifestyle
 */

namespace Lifestyle;

if ( ! defined( 'LIFESTYLE_VERSION' ) ) {
	define( 'LIFESTYLE_VERSION', 2.0 );
}
if ( ! defined( 'LIFESTYLE_TEMP_DIR' ) ) {
	define( 'LIFESTYLE_TEMP_DIR', get_template_directory() );
}
if ( ! defined( 'LIFESTYLE_BUILD_URI' ) ) {
	define( 'LIFESTYLE_BUILD_URI', get_template_directory_uri() . '/build' );
}

do_action( 'lifestyle_before' );

require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-base.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-lifestyle.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/custom-functions.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/template-tags.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/template-tags.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-top-popular-post.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-wp-custom-widget-recent-posts.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-wp-custom-widget-categories.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-wp-custom-widget-about-me.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-lifestyle-slider.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-bestlearner-info.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-top-author.php';
require_once LIFESTYLE_TEMP_DIR . '/inc/classes/class-top-visited-post.php';



$lifestyle = new Lifestyle();

/**
 * Get lifestyle instance.
 *
 * @return Lifestyle
 */
function get_theme_instance() {
	global $lifestyle;
	return $lifestyle;
}

do_action( 'lifestyle_after' );

/**
 * Register the widget for sidebar and footer.
 */
function wp_register_custom_widget() {
	register_widget( 'WP_Custom_Widget_Categories' );
	register_widget( 'WP_Custom_Widget_Recent_Posts' );
	register_widget( 'WP_Custom_Widget_About_Me' );
	register_widget( 'Top_Popular_Post' );
	register_widget( 'Top_Visited_Post' );
	register_widget( 'Top_Author' );
}
add_action( 'widgets_init', 'Lifestyle\wp_register_custom_widget' );
