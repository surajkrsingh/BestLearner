<?php
/**
 * This is footer widget for Top_Post_Contributors.
 *
 * @link  https://github.com/rtCamp/suraj-singh/tree/wp-themes
 * @since 1.0
 *
 * @package bestlearner
 */

/**
 * Class Top_Post_Contributors for set a particluar user info.
 *
 * @package bestlearner
 *
 * @author Suraj Singh <suraj.sk243@gmail.comgmail.com>
 */
class Top_Post_Contributors extends WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct(
			'top-post-contributors-widget',
			__( 'Top Post Contributors', 'bestlearner' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	/**
	 * Display the widget.
	 *
	 * @param Array $args .
	 * @param Array $instance .
	 */
	public function widget( $args, $instance ) {

		// Display the widget.
		echo '<div class="footer-box">';

		// Display widget title if defined.
		echo ( '<h4 class="footer-box__title text text--uppercase">Top Contributors</h4>' );
		echo ( '<hr class="hr-line--green"/>' );

		// Display pic of contributors.
		$users = get_users(
			array(
				'fields'  => array(
					'display_name',
					'ID',
					'user_url',
				),
				'orderby' => 'post_count',
				'order'   => 'DESC',
			)
		);

		if ( ! is_array( $users ) || empty( $users ) ) {
			return;
		}
		?>
		<figure class="figure figure-contributors">
			<?php
			foreach ( $users as $user ) {
				if ( ! empty( count_user_posts( $user->ID ) ) ) {
					printf( '<a href="%3$s"><img src="%1$s" title="%2$s" alt="%2$s"/></a>', esc_url( get_avatar_url( $user->ID ) ), esc_html( $user->display_name ), esc_url( $user->user_url ) );
				}
			}
			?>
		</figure>
	</div>
			<?php
	}
}
