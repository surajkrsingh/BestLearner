<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lifestyle
 */

get_header();
?>
<section class="section ">
	<?php get_sidebar( 'left' ); ?>
	<div class="box-container">
		<?php if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				?>
				<?php get_template_part( 'template-parts/content', 'recent-post' ); ?>
				<?php

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;

		lifestyle_pagination();
		?>
	</div >
<?php
get_sidebar( 'right' );
get_footer();
