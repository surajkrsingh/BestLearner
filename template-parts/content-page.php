<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package lifestyle
 */

?>
<?php the_title( '<h4 class="text text--uppercase">', '</h4>' ); ?>
<hr class="hr-line--green"/>
<div id="post-<?php echo get_the_ID(); ?>" class="box">
	<div class="entry-content clearfix">
		<?php
		if ( has_post_thumbnail() ) {
			?>
				<figure class="figure">
					<img class="box__img" src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID() ) ); ?>"/>
				</figure>
			<?php
		}
		?>
		<div class="box-contents">
			<?php the_content(); ?>
		</div>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lifestyle' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'lifestyle' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</div><!-- #post-## -->
