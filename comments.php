<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lifestyle
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="box">
	<div class="box-contents">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
		<?php

		$comments_number = get_comments_number();

		if ( 1 === $comments_number ) {

			printf(
				/* translators: %s: post title */
				esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'lifestyle' ),
				'<span>' . esc_html( get_the_title() ) . '</span>'
			);

		} else {

			printf(
				'<h4 class="text text--uppercase">' .
				esc_html(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'lifestyle'
					)
				),
				filter_var( number_format_i18n( $comments_number ), FILTER_VALIDATE_INT ),
				filter_var( get_the_title(), FILTER_SANITIZE_STRING ),
				'<h4>'
			);

		}
		?>
		<hr class="hr-line--green"/>
		</h2>

		<?php
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // Are there comments to navigate through?
			?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'lifestyle' ); ?></h2>
				<div class="nav-links clearfix">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'lifestyle' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'lifestyle' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-above -->
			<?php
		} // Check for comment navigation.

		// Show all the comments along with childs.
		wp_list_comments(
			array(
				'callback'  => 'lifestyle_post_comment',
				'type'      => 'comment',
				'max_depth' => '5',
			)
		);

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // Are there comments to navigate through?
			?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'lifestyle' ); ?></h2>
				<div class="nav-links clearfix">

					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'lifestyle' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'lifestyle' ) ); ?></div>

				</div><!-- .nav-links -->
			</nav><!-- #comment-nav-below -->
			<?php
		} // Check for comment navigation.

	} // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
		?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'lifestyle' ); ?></p>
		<?php
	}
	?>
	</div>
</div><!-- #comments -->

<!-- #comments form-->
<div class="form-container">
	<div class="box-contents__title"><?php esc_html_e( 'LEAVE A COMMENT', 'lifestyle' ); ?></div>
	<hr class="hr-line--green"/>
		<div class="form">
			<?php
			comment_form();
			?>
		</div>	
	</div>
</div>

<?php
/**
 * Comments display in custom UI.
 *
 * @param WP_Comment $comment It store the comment it.
 * @param array      $args It contain attributes.
 * @param int        $depth It contain depth level.
 */
function lifestyle_post_comment( $comment, $args, $depth ) {
	?>
	<div class="comment-post" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> >
		<!-- Avtar for commentor. -->
		<figure class="figure">
			<a href="<?php get_comment_author_link(); ?>">
				<img src="<?php echo esc_url( get_avatar_url( $comment ) ); ?>" class="comment-post-user" />
			</a>
		</figure>

		<!-- Full comment details. -->
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-post-contents">
			<!--- Reply link for particular comment. -->
			<span class="reply-right">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
				?>
			</span>
			<!-- Author name and date & time. -->
			<?php
			printf( '<span >%s</span>', get_comment_author_link() );
			printf(
				'<br/><span class="popular-post-time">%1$s at %2$s<span>',
				esc_html( get_comment_date() ),
				esc_html( get_comment_time() )
			);
			edit_comment_link( __( '(Edit)', 'lifestyle' ), '  ', '' );
			comment_text();
			?>
		</div>

		<?php
		if ( 0 === $comment->comment_approved ) {
			?>
		<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'lifestyle' ); ?></em>
		<?php } ?>	
		</div>
		<hr/>
	<?php
}

