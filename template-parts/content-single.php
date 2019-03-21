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
 * @package lifestyle
 */

$new_post_id            = get_the_ID();
$new_post_date          = get_the_date();
$new_post_date          = date( 'F d Y', strtotime( $new_post_date ) );
$new_post_thumbnail_url = get_the_post_thumbnail_url( $new_post_id, 'post-thumbnail' );

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
		<span class="box-contents__title line-break text text--uppercase"><?php echo esc_html( get_the_title() ); ?></span> 
		<span class="box-contents__author line-break text text--uppercase">by <span class="green"> <?php echo esc_url( the_author_posts_link() ); ?></span><?php echo esc_html( ' ' . $new_post_date ); ?></span>
		<hr class="hr-line--green"/>
		<div class="box-contents__description">
			<?php the_content(); ?>
		</div>
		<div class="box-action">
		<ul class="box-action__tags">
		<?php
		$post_tags = get_the_tags();
		if ( ! empty( $post_tags ) ) {
			foreach ( $post_tags as $tag ) {
				printf( '<li class="post-tag text--uppercase"><a href="%2$s">%1$s</a></li>', esc_html( $tag->name ), esc_attr( get_term_link( $tag->term_id ) ) );
			}
		}
		?>
		</ul>
		<ul class="box-action social">
			<li class="post-tag post-tag--bg-color-facebook"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li class="post-tag post-tag--bg-color-twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li class="post-tag post-tag--bg-color-tumblr"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
			<li class="post-tag post-tag--bg-color-google"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
		</ul>
		</div>
	</div>
</div>
<div class="pagination"><?php the_post_navigation(); ?></div>
