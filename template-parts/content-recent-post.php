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

$new_post_id            = get_the_ID();
$new_post_date          = get_the_date();
$new_post_date          = date( 'F d Y', strtotime( $new_post_date ) );
$new_post_thumbnail_url = get_the_post_thumbnail_url( $new_post_id, 'post-thumbnail' );
$post_tags              = get_the_tags();
?>
<div class="box box--box-buttom-border box-round">
	<div class="box-contents">
		<?php if ( is_home() ) : ?>
		<p class="post-feature-type">
			<?php
				$categories = get_the_category( $new_post_id );
				printf(
					'<a href="%1$s">%2$s</a>',
					esc_url( get_category_link( $categories[0]->cat_ID ) ),
					esc_html( $categories[0]->name )
				);
			?>
		</p>
		<?php endif ?>
		<span class="box-contents__title line-break text text--uppercase"><a href="<?php echo esc_attr( get_permalink( $new_post_id ) ); ?>"><?php the_title(); ?></a></span>
		<span class="box-contents__author  text text--uppercase">by <span class="author-name green"> <?php echo esc_html( the_author_posts_link() ); ?> </span><?php echo esc_html( $new_post_date ); ?></span>
		<hr class="hr-line--green"/>
		<div class="box-contents__description">
			<?php
				$read_more = '&hellip; <a class="read-more-link" href="' . get_the_permalink() . '">Read Full Article</a>';
				echo wpautop(
					wp_trim_words(
						get_the_content(),
						40,
						$read_more
					)
				);
				?>
		</div>
		<div class="box-action">
			<ul class="box-action__tags">
			<?php
			if ( ! empty( $post_tags ) ) {
				foreach ( $post_tags as $tag ) {
					printf( '<li class="post-tag text--uppercase"><a href="%2$s">%1$s</a></li>', esc_html( $tag->name ), esc_attr( get_term_link( $tag->term_id ) ) );
				}
			}
			?>
			</ul>
			<span class="reader-count text--uppercase" title="Reader count">
			<?php
				$post_count_meta = get_post_meta( $new_post_id, 'post_count_meta' );
				echo esc_html( ( isset( $post_count_meta[0]['visit_count'] ) ? $post_count_meta[0]['visit_count'] : '0' ) );
			?>
			</span>
		</div>
	</div>
</div>
