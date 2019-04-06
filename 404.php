<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package lifestyle
 */

// Remove WordPress default header after login.
function remove_admin_login_header() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'remove_admin_login_header' );

get_header();
?>

<section class="section">
	<div class="box-container" style="margin: auto;">
		<div class="box box--large">
			<div class="box-contents">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'lifestyle' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'lifestyle' ); ?></p>

				<?php get_search_form(); ?>

				<?php
				/* translators: %1$s: smiley */
				$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'lifestyle' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
				?>

				<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
				</div>
			</div>
	</div><!-- #primary --
<?php
