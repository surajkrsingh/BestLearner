<?php
/**
 * Widget API: Top_Author class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Top Author widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class Top_Author extends WP_Widget {

	/**
	 * Sets up a new Top Authors widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'widget_recent_entries',
			'description'                 => __( 'Your site&#8217;s most top author.', 'lifestyle' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'top-Author', __( 'Top Author', 'lifestyle' ), $widget_ops );
		$this->alt_option_name = 'widget_recent_entries';
	}

	/**
	 * Outputs the content for the current top author widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filters the arguments for the top author widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_users()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent posts.
		 * @param array $instance Array of settings for the current widget.
		 */
		// Display pic of contributors.
		$users = get_users(
			array(
				'fields'  => array(
					'display_name',
					'ID',
					'user_url',
				),
				'orderby' => 'post_count',
				'number'  => 5,
				'order'   => 'DESC',
			)
		);

		if ( ! is_array( $users ) || empty( $users ) ) {
			return;
		}

		echo $args['before_widget']; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		echo '<div class="box-sidebar text text--uppercase">';
		if ( $title ) {
			echo $args['before_title'] . '<h4>' . $title . '</h4>' . $args['after_title']; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			echo '<hr class="hr-line--green"/>';
		}
		?>

		<?php
		foreach ( $users as $current_user ) :
			if ( ! empty( count_user_posts( $current_user->ID ) ) ) {
				?>
			<div class="author-item">
				<figure>
					<?php
					printf( '<a href="%3$s"><img src="%1$s" title="%2$s" alt="%2$s" class="author-item-dp"/></a>', esc_url( get_avatar_url( $current_user->ID ) ), esc_html( $current_user->display_name ), esc_url( get_author_posts_url( $current_user->ID ) ) );
					?>
					<span class="author-contents">
						<a href="<?php echo esc_url( get_author_posts_url( $current_user->ID ) ); ?>"><?php echo esc_html( $current_user->display_name ); ?></a>
					</span>
					<span class="float-right">
						( <?php echo esc_html( count_user_posts( $current_user->ID ) ); ?> )
					</span>
				</figure>
			</div>
			<hr/>
				<?php
			}
		endforeach;
		echo $args['after_widget']; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</div>';
	}

	/**
	 * Handles updating the settings for the current Top Author widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Top Authors widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>
		<p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'lifestyle' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>

		<p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_attr_e( 'Number of posts to show:', 'lifestyle' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="number" step="1" min="1" value="<?php echo esc_attr( $number ); ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_date' ) ); ?>" />
		<label for="<?php echo esc_attr( $this->get_field_id( 'show_date' ) ); ?>"><?php esc_html_e( 'Display post date?', 'lifestyle' ); ?></label></p>
		<?php
	}
}
