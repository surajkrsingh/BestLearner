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

if ( isset( $new_post_thumbnail_url ) ) {
	?>
	<div class="float-icon"><a href="#"><i class="fa fa-camera" aria-hidden="true"></i></a> </div>
		<figure class="figure">
		<img class="box__img" src="<?php echo esc_html( $new_post_thumbnail_url ); ?>"/>
		</figure>
	<?php } ?>

	<div class="box-contents">
	<span class="box-contents__title line-break text text--uppercase"><?php echo esc_html( get_the_title() ); ?></span>
	<span class="box-contents__author line-break text text--uppercase">by <span class="green"> <?php echo the_author_posts_link(); ?></span><?php echo esc_html( ' ' . $new_post_date ); ?></span>
	<hr class="hr-line--green"/>
	<div class="box-contents__description">
		<?php echo get_the_excerpt(); ?>
	</div>
	<div class="box-action">
		<a href="<?php echo esc_html( get_permalink( $new_post_id ) ); ?>" class="button button--default">READ MORE</a>
		<ul class="box-action social">
			<li class="post-tag"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li class="post-tag"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li class="post-tag"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
			<li class="post-tag"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</div>
