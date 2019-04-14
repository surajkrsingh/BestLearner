<?php
/**
 * BestLearner file includes and definitions
 *
 * @package bestlearner
 */

namespace BestLearner;

if ( ! defined( 'BESTLEARNER_VERSION' ) ) {
	define( 'BESTLEARNER_VERSION', 1.0 );
}
if ( ! defined( 'BESTLEARNER_TEMP_DIR' ) ) {
	define( 'BESTLEARNER_TEMP_DIR', get_template_directory() );
}
if ( ! defined( 'BESTLEARNER_BUILD_URI' ) ) {
	define( 'BESTLEARNER_BUILD_URI', get_template_directory_uri() . '/build' );
}

do_action( 'bestlearner_before' );

require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-base.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-bestlearner.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/custom-functions.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/template-tags.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/template-tags.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-top-commented-post.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-top-post-contributors.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-bestlearner-slider.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-bestlearner-info.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-top-author.php';
require_once BESTLEARNER_TEMP_DIR . '/inc/classes/class-top-visited-post.php';



$bestlearner = new BestLearner();

/**
 * Get BestLearner instance.
 *
 * @return BestLearner
 */
function get_theme_instance() {
	global $bestlearner;
	return $bestlearner;
}

do_action( 'bestlearner_after' );

/**
 * Register the widget for sidebar and footer.
 */
function wp_register_custom_widget() {
	register_widget( 'Top_Post_Contributors' );
	register_widget( 'Top_Commented_Post' );
	register_widget( 'Top_Visited_Post' );
	register_widget( 'Top_Author' );
}
add_action( 'widgets_init', 'BestLearner\wp_register_custom_widget' );
