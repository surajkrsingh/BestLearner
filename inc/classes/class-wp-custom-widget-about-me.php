<?php
/**
 * This is footer widget for about me.
 *
 * @link  https://github.com/rtCamp/suraj-singh/tree/wp-themes
 * @since 1.0
 *
 * @package lifestyle
 */

/**
 * Class WP_Custom_Widget_About_Me for set a particluar user info.
 *
 * @package lifestyle
 *
 * @author Suraj Singh <suraj.sk243@gmail.comgmail.com>
 */
class WP_Custom_Widget_About_Me extends WP_Widget {

	/**
	 * Constructor.
	 */
	public function __construct() {
		parent::__construct(
			'about-me-widget',
			__( 'About Me Widget', 'lifestyle' ),
			array(
				'customize_selective_refresh' => true,
			)
		);
	}

	/**
	 * The widget form (for the backend ).
	 *
	 * @param Object $instance .
	 */
	public function form( $instance ) {
		$defaults = array(
			'title'  => '',
			'select' => '',
		);
		?>

		<!-- Title textbox -->
		<div class="meta-options wpbp_field">
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Widget Title', 'lifestyle' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</div>
		<!--Select box for user list-->
		<div class="meta-options wpbp_field">
			<label for="<?php echo esc_html( $this->get_field_id( 'select' ) ); ?>"><?php esc_html_e( 'Select', 'lifestyle' ); ?></label>
			<select name="<?php echo esc_html( $this->get_field_name( 'select' ) ); ?>" id="<?php echo esc_html( $this->get_field_id( 'select' ) ); ?>" class="widefat">
			<?php
			$users = get_users( array( 'fields' => array( 'display_name', 'ID' ) ) );

			if ( ! is_array( $users ) || empty( $users ) ) {
				return;
			}
			foreach ( $users as $user ) {
				printf( '<option value="%1$s" id="%1$s" selected( %2$s, %1$s, $3$s )> %4$s</option>', esc_attr( $user->ID ), esc_attr( $instance['select'] ), false, esc_html( $user->display_name ) );
			}
			?>
			</select>
		</div>
		<?php
	}

	/**
	 * Update widget settings.
	 *
	 * @param Array $new_instance .
	 * @param Array $old_instance .
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		$instance['title']  = isset( $new_instance['title'] ) ? wp_strip_all_tags( $new_instance['title'] ) : '';
		$instance['select'] = isset( $new_instance['select'] ) ? wp_strip_all_tags( $new_instance['select'] ) : '';

		return $instance;
	}

	/**
	 * Display the widget.
	 *
	 * @param Array $args .
	 * @param Array $instance .
	 */
	public function widget( $args, $instance ) {

		// Check the widget options.
		$title  = isset( $instance['title'] ) ? apply_filters( 'widget_title', $instance['title'] ) : '';
		$select = isset( $instance['select'] ) ? $instance['select'] : '';
		// Display the widget.
		echo '<div class="footer-box">';

		// Display widget title if defined.
		if ( isset( $title ) ) {
			echo ( '<h4 class="footer-box__title text text--uppercase">' . esc_html( $title ) . '</h4>' );
			echo ( '<hr class="hr-line--green"/>' );
		}

		// Display pic of contributors.
		$users = get_users( array( 'fields' => array( 'display_name', 'ID', 'user_url' ) ) );

		if ( ! is_array( $users ) || empty( $users ) ) {
			return;
		}
		?>
		<figure class="figure figure-contributors">
			<?php
			foreach ( $users as $user ) {
				printf( '<a href="%3$s"><img src="%1$s" title="%2$s" alt="%2$s"/></a>', esc_url( get_avatar_url( $user->ID ) ), esc_html( $user->display_name ), esc_url( $user->user_url ) );
			}
			?>
		</figure>
	</div>
			<?php
	}
}

