<?php
/**
 * The main template file.
 *
 * This is the veticle box post tamplate.
 *
 * @package lifestyle
 */

$new_post_id            = get_the_ID();
$new_post_date          = get_the_date();
$new_post_date          = date( 'F d Y', strtotime( $new_post_date ) );
$new_post_thumbnail_url = get_the_post_thumbnail_url( $new_post_id, 'post-thumbnail' );

?>
<div class="box row-wise">
<?php if ( isset( $new_post_thumbnail_url ) ) { ?>
	<figure class="figure box--horizontal">
		<img class="box__img--horizonal" src="<?php echo esc_html( $new_post_thumbnail_url ); ?>"/>
	</figure>
<?php } ?>
	<div class="box-contents">
		<span class="box-contents__title line-break text text--uppercase"><?php echo esc_html( get_the_title() ); ?></span>
		<span class="box-contents__author line-break text text--uppercase">by <span class="green"> <?php echo esc_url( the_author_posts_link() ); ?> </span><?php echo esc_html( $new_post_date ); ?></span>
		<hr class="hr-line--green"/>
		<div class="box-contents__description">
			<?php echo esc_html( get_the_excerpt() ); ?>
		</div>
		<div class="box-action">
		<a href="<?php echo esc_html( get_permalink( $new_post_id ) ); ?>" class="button button--green text text--uppercase">countinue reading</a>
		<ul class="box-action social">
			<li class="post-tag"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li class="post-tag"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<li class="post-tag"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
			<li class="post-tag"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
		</ul>
		</div>
	</div>
</div>
