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
		<h4>RELATED POST</h4>
		<hr class="hr-line--green"/>
		<?php
		global $post;
		$categories        = get_the_category();
		$categories_option = array();
		foreach ( $categories as $category ) {
			$categories_option[] = $category->slug;
		}

		$args = array(
			'post__not_in'  => array( get_the_ID() ),
			'numberposts'   => 10,
			'category_slug' => $categories_option,
		);
		// Here need the filter post so avoid phpcs.
		$posts = get_posts( $args ); //phpcs:ignore 

		if ( 1 > count( $posts ) ) {
			esc_html_e( 'Sorry no more post for this category.' );
		} else {
			foreach ( $posts as $post ) { //phpcs:ignore 
				setup_postdata( $post );
				$new_post_id   = get_the_ID();
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
		}
		?>
	</div>
</div>
