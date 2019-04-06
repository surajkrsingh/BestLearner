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

$user_id        = get_post_field( 'post_author', get_the_ID() );
$user           = get_user_meta( $user_id );
$facebook_link  = $user['facebook'][0] ?? '';
$instagram_link = $user['instagram'][0] ?? '';
$linkedin_link  = $user['linkedin'][0] ?? '';
$twitter_link   = $user['twitter'][0] ?? '';

?>
<div class="box author-profile">
	<div class="author-contents">
		<img class="figure-author__dp" src="<?php echo esc_url( get_avatar_url( $user_id ) ); ?>"/>
		<span class="reply-right"><a href="<?php echo esc_url( get_author_posts_url( $user_id ) ); ?>" class="green">ALL POST</a></span>
		<span class="box-contents__title text text--uppercase"><?php echo esc_url( the_author_posts_link() ); ?></span>
		<hr class="hr-line--green"/>
		<div class="box-contents__description">
			<?php echo esc_html( $user['description'][0] ); ?>
		</div>
		<div class="box-action">
			<p class="box-action__tags">
				<?php
					printf( '<a href="%1$s" class="author-url">  %1$s </a>', esc_url( get_userdata( $user_id )->user_url ) );
				?>
			</p>
			<ul class="box-action-social">
				<?php
				if ( ! empty( $facebook_link ) ) {
					printf(
						'<li class="post-tag post-tag--bg-color-facebook">
							<a href="%s">
								<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
						</li>',
						esc_url( $facebook_link )
					);
				}
				if ( ! empty( $twitter_link ) ) {
					printf(
						'<li class="post-tag post-tag--bg-color-twitter">
							<a href="%s">
								<i class="fa fa-twitter" aria-hidden="true"></i>
							</a>
						</li>',
						esc_url( 'https://twitter.com/' . $twitter_link )
					);
				}
				if ( ! empty( $instagram_link ) ) {
					printf(
						'<li class="post-tag post-tag--bg-color-instagram">
							<a href="%s">
								<i class="fa fa-instagram" aria-hidden="true"></i>
							</a>
						</li>',
						esc_url( $instagram_link )
					);
				}
				if ( ! empty( $linkedin_link ) ) {
					printf(
						'<li class="post-tag post-tag--bg-color-linkedin">
							<a href="%s">
								<i class="fa fa-linkedin" aria-hidden="true"></i>
							</a>
						</li>',
						esc_url( $linkedin_link )
					);
				}
				?>
			</ul>
		</div>
	</div>
</div>
