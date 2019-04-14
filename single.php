<?php
/**
 * The template for displaying all single posts.
 *
 * @package bestlearner
 */

get_header();
?>
<section class="section">
	<?php get_sidebar( 'left' ); ?>
	<div class="box-container">
		<?php
		while ( have_posts() ) :
			the_post();
			// single post.
			get_template_part( 'template-parts/content', 'single' );

			// About user.
			get_template_part( 'template-parts/content', 'about-author' );

			// Popular post.
			get_template_part( 'template-parts/content', 'related-post' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php
get_sidebar( 'right' );
get_footer();
