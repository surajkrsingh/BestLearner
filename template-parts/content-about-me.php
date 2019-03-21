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

$user_id = get_post_field( 'post_author', get_the_ID() );
$user    = get_user_meta( $user_id );
?>
<div class="box author-profile">
	<figure class="figure-author">
		<img class="figure-author__dp" src="<?php echo esc_url( get_avatar_url( $user_id ) ); ?>"/>
	</figure>
	<div class="author-contents">
		<span class="reply-right"><a href="#" class="green">ALL POST</a></span>
		<span class="box-contents__title text text--uppercase"><?php echo esc_url( the_author_posts_link() ); ?></span>
		<hr class="hr-line--green"/>
		<div class="box-contents__description">
			<?php echo esc_html( $user['description'][0] ); ?>
		</div>
	</div>
</div>
