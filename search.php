<?php
/**
 * The template for displaying search results pages.
 *
 * @package lifestyle
 */

get_header();
?>
<section class="section ">
	<?php get_sidebar( 'left' ); ?>
	<div class="box-container">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h4 class="page-title">
					<?php
					/* translators: %s: search phrase */
					printf( esc_html__( 'Search Results for: %s', 'lifestyle' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h4>
				<hr class="hr-line--green"/>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :

				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				?>
				<div class="box">
					<div class="box-contents">
					<?php get_template_part( 'template-parts/content', 'search' ); ?>
					</div>
				</div>
				<?php
			endwhile;
		else :
			?>
		<div class="box">
			<div class="box-contents">
			<?php
				get_template_part( 'template-parts/content', 'none' );
			?>
			</div>
		</div>
			<?php
		endif;
			lifestyle_pagination();
		?>
	</div>
<?php
get_sidebar( 'right' );
get_footer();
