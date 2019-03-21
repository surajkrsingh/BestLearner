<?php
/**
 * The front-page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lifestyle
 */

get_header();
if ( is_home() ) {
	//get_template_part( 'template-parts/content', 'slider' );
}
?>
<section class="section">
	<?php get_sidebar( 'left' ); ?>
	<div class="box-container">
	<?php
	$recent_posts = wp_get_recent_posts(
		array(
			'numberposts' => 10,
			'post_status' => 'publish',
		)
	);

	$count = 0;
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content', 'recent-post' );
		}
	};
	?>
	<?php wp_reset_postdata(); ?>
	</div>
<?php
get_sidebar( 'right' );
get_footer();
