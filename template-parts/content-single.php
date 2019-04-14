<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bestlearner
 */

$new_post_id            = get_the_ID();
$new_post_date          = get_the_date();
$new_post_date          = date( 'F d Y', strtotime( $new_post_date ) );
$new_post_thumbnail_url = get_the_post_thumbnail_url( $new_post_id, 'post-thumbnail' );

// Post visit count.
$post_count_meta = get_post_meta( $new_post_id, 'post_count_meta' );
if ( ! empty( $post_count_meta ) && is_array( $post_count_meta ) ) {
	$post_count_meta = array(
		'visit_count' => $post_count_meta[0]['visit_count'] + 1,
		'like'        => null,
	);
} else {
	$post_count_meta = array(
		'visit_count' => 1,
		'like'        => null,
	);
}
update_post_meta( $new_post_id, 'post_count_meta', $post_count_meta );
?>
<div class="box">
	<?php
	if ( ! empty( $new_post_thumbnail_url ) ) {
		?>
	<figure class="figure">
		<img class="box__img" src="<?php echo esc_html( $new_post_thumbnail_url ); ?>"/>
	</figure>
	<?php } ?>
	<div class="box-contents">
		<p class="post-feature-type">
			<?php
				$categories = get_the_category( $new_post_id );
				printf(
					'<a href="%1$s">%2$s</a>',
					esc_url( get_category_link( $categories[0]->cat_ID ) ),
					esc_html( $categories[0]->name )
				);
				?>
		</p>
		<span class="box-contents__title line-break text text--uppercase"><a href="<?php echo esc_attr( get_permalink( $new_post_id ) ); ?>"><?php the_title(); ?></a></span>
		<span class="box-contents__author  text text--uppercase">by <span class="author-name green"> <?php echo esc_html( the_author_posts_link() ); ?> </span><?php echo esc_html( $new_post_date ); ?></span>
		<hr class="hr-line--green"/>
		<div class="box-contents__description">
			<?php the_content(); ?>
		</div>
		<div class="box-action">
			<ul class="box-action__tags">
			<?php
			$post_tags = get_the_tags();
			if ( ! empty( $post_tags ) ) {
				foreach ( $post_tags as $tag ) { //phpcs:ignore
					printf( '<li class="post-tag text--uppercase"><a href="%2$s">%1$s</a></li>', esc_html( $tag->name ), esc_attr( get_term_link( $tag->term_id ) ) );
				}
				wp_reset_postdata();
			}
			?>
			</ul>
			<ul class="box-action-social">
				<li class="post-tag post-tag--bg-color-facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li class="post-tag post-tag--bg-color-twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
				<li class="post-tag post-tag--bg-color-linkedin"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				<li class="post-tag post-tag--bg-color-instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>
<div class="pagination"><?php the_post_navigation(); ?></div>
