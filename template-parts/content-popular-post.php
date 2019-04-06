<?php
/**
 * The template for displaying all single posts.
 *
 * @package lifestyle
 */

?>
<!--Popular post-->
<div class="box">
	<div class="box-contents">
		<h4 class="box-contents__title">RELATED POST</h4>
		<hr class="hr-line--green"/>
		<?php
		// Here need the filter post so avoid phpcs.
		$old_post_id = $post->ID;
		$posts       = get_posts(
			array(
				'category__in' => wp_get_post_categories( $old_post_id ),
				'numberposts'  => 5,
			)
		);

		if ( 1 >= count( $posts ) ) {
			esc_html_e( 'Sorry no more post for this category.' );
		} else {
			foreach ( $posts as $post ) { //phpcs:ignore 
				setup_postdata( $post );
				$new_post_id = get_the_ID();
				if ( $old_post_id === $new_post_id ) {
					continue;
				}
				$new_post_date = get_the_date();
				$new_post_date = date( 'F d Y', strtotime( $new_post_date ) );
				?>
				<div class="popular-post">
					<h4>
						<a href="<?php echo esc_html( get_permalink( $new_post_id ) ); ?>"><?php the_title(); ?></a>
					</h4>
					<div class="popular-post-bg-author text text--uppercase">BY 
						<span class="author-name green"><?php echo esc_url( the_author_posts_link() ); ?></span>
							<span class="popular-post-time"> <?php echo esc_html( $new_post_date ); ?>
						</span>
					</div>
				</div>
				<?php
			}
			wp_reset_postdata();
		}
		?>
	</div>
</div>
