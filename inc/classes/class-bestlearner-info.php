<?php
/**
 * BestLearner Informaion.
 *
 * @link  https://github.com/rtCamp/suraj-singh/tree/wp-themes
 * @since 1.0
 *
 * @package bestlearner
 */

/**
 * Class BestLearner_Info for settings.
 *
 * @package bestlearner
 *
 * @author Suraj Singh <suraj.sk243@gmail.comgmail.com>
 */
class BestLearner_Info {

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
	 * @return BestLearner_Info instance.
	 */
	final public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new BestLearner_Info();
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
		add_action( 'admin_menu', array( $this, 'bestlearner_admin_menu' ) );

		// add_action( 'publish_post', array( $this, 'send_mail_notification_on_new_post' ) );
	}

	/**
	 * Sending mail to users when new post publish.
	 *
	 * @param int $post_ID  This post it when is recently post.
	 */
	public function send_mail_notification_on_new_post( $post_ID ) {
		$blogusers = get_users( array( 'fields' => array( 'user_email' ) ) );
		$all_users = array();
		foreach ( $blogusers as $user ) {
			if ( ! empty( $user->user_email ) ) {
				$all_users[] = $user->user_email;
			}
		}
		$all_users     = implode( ',', $all_users );
		$headers       = array( 'From: BestLeaerner.org <bitscamp@gmail.com>' );
		$post_title    = get_the_title( $post_ID );
		$post_contents = get_post_field( 'post_content', $post_ID );
		wp_mail( $all_users, $post_title, $post_contents, $headers );
		return $post_ID;
	}

	/**
	 * Add menu for bestlearner admin menu.
	 */
	public function bestlearner_admin_menu() {
		add_menu_page(
			__( 'Best-Learner Information', 'bestlearner' ),
			'BestLearner',
			'manage_options',
			'best-learner',
			array( $this, 'bestlearner_admin_html_page' ),
			'dashicons-media-text',
			2
		);
	}
	/**
	 * Create html page along with elements for bestlearner.
	 */
	public function bestlearner_admin_html_page() {
		include_once BESTLEARNER_TEMP_DIR . '/inc/bestlearner-info-page.php';
	}

}
BestLearner_Info::get_instance();
