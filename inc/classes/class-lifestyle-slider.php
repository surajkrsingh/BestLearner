<?php
/**
 * Custom post type slider for dynamic slider.
 *
 * @link  https://github.com/rtCamp/suraj-singh/tree/wp-themes
 * @since 1.0
 *
 * @package lifestyle
 */

/**
 * Class Lifestyle_Slider for settings.
 *
 * @package lifestyle
 *
 * @author Suraj Singh <suraj.sk243@gmail.comgmail.com>
 */
class Lifestyle_Slider {

	/**
	 * Instance of this class.
	 *
	 * @since  1.0
	 * @access protected
	 * @var    object    $instance    Instance of this class.
	 */
	protected static $instance;
	/**
	 * Returns new or existing instance.
	 *
	 * @since 1.0
	 *
	 * @return Lifestyle_Slider instance.
	 */
	final public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new Lifestyle_Slider();
			static::$instance->setup();
		}
		return self::$instance;
	}
	/**
	 * Setup hooks.
	 *
	 * @since 1.0
	 */
	protected function setup() {
		add_action( 'init', array( $this, 'create_post_type_slider' ) );
		add_action( 'admin_menu', array( $this, 'slider_settings_menu' ) );
		add_action( 'fm_post_slider_post', array( $this, 'field_manager_editor' ) );
		add_action( 'admin_init', array( $this, 'register_slider_settings' ) );
	}

	/**
	 * Create custom post type Lifestyle_Slider.
	 */
	public function create_post_type_slider() {
		$labels = array(
			'name'               => __( 'Sliders', 'lifestyle' ),
			'singular_name'      => __( 'Slider', 'lifestyle' ),
			'menu_name'          => __( 'Slider', 'lifestyle' ),
			'name_admin_bar'     => __( 'Slider', 'lifestyle' ),
			'add_new'            => __( 'Add New Slider', 'lifestyle' ),
			'add_new_item'       => __( 'Add New Slider', 'lifestyle' ),
			'new_item'           => __( 'New Slider', 'lifestyle' ),
			'edit_item'          => __( 'Edit Slider', 'lifestyle' ),
			'view_item'          => __( 'View Slider', 'lifestyle' ),
			'all_items'          => __( 'All Sliders', 'lifestyle' ),
			'search_items'       => __( 'Search Sliders', 'lifestyle' ),
			'parent_item_colon'  => __( 'Parent Sliders:', 'lifestyle' ),
			'not_found'          => __( 'No Slider found.', 'lifestyle' ),
			'not_found_in_trash' => __( 'No Slider found in Trash.', 'lifestyle' ),
		);
		$args   = array(
			'labels'          => $labels,
			'description'     => __( 'This is custom post type slider.', 'lifestyle' ),
			'public'          => true,
			'rewrite'         => array( 'slug' => 'slider_post' ),
			'capability_type' => 'post',
			'has_archive'     => true,
			'supports'        => array( 'title' ),
		);
		register_post_type( 'slider_post', $args );
	}

	/**
	 * Add field manager editor.
	 */
	public function field_manager_editor() {
		$fm = new Fieldmanager_Group(
			array(
				'name'           => 'slideshow',
				'limit'          => 0,
				'label'          => 'New Slide',
				'label_macro'    => array( 'Slide: %s', 'title' ),
				'add_more_label' => 'Add another slide',
				'sortable'       => true,
				'children'       => array(
					'title'       => new Fieldmanager_Textfield( 'Slide Title' ),
					'slide'       => new Fieldmanager_Media( 'Slide' ),
					'description' => new Fieldmanager_RichTextarea(
						'Description'
					),
				),
			)
		);
		$fm->add_meta_box( 'Slider Editor', 'slider_post' );
	}

	/**
	 * Add menu for slider setting.
	 */
	public function slider_settings_menu() {
		add_submenu_page(
			'edit.php?post_type=slider_post',
			'Slider-Settings',
			__( 'Slider Settings', 'lifestyle' ),
			'manage_options',
			'slider_settings_menu',
			array( $this, 'slider_settings_html_page' )
		);
	}
	/**
	 * Create html page along with elements for book setting.
	 */
	public function slider_settings_html_page() {
		include_once LIFESTYLE_TEMP_DIR . '/inc/slider-settings.php';
	}
	/**
	 * Register slider setting options.
	 */
	public function register_slider_settings() {
		register_setting( 'slider-settings-group', 'primary_slider' );
	}
}
Lifestyle_Slider::get_instance();
