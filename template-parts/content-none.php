<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bestlearner
 */

?>

<section class="box">
	<div class="box-contents">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'bestlearner' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) {
				?>
				<p>
					<?php
					printf(
						wp_kses(
							/* translators: 1. is add new post url */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'bestlearner' ),
							array(
								'a' => array(
									'href' => array(),
								),
							)
						),
						esc_url( admin_url( 'post-new.php' ) )
					);
					?>
				</p>
				<?php
			} elseif ( is_search() ) {
				?>
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bestlearner' ); ?></p>
				<?php
				get_search_form();
			} else {
				?>
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bestlearner' ); ?></p>
				<?php
				get_search_form();
			}
			?>
		</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->
