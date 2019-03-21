<?php
/**
 * The slider template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package lifestyle
 */

$slider_id = get_option( 'primary_slider' );
if ( isset( $slider_id ) ) {

	$post_meta  = get_post_meta( $slider_id );
	$slide_info = maybe_unserialize( $post_meta['slideshow'][0] );
	?>

<section class="slider" id="primary-slider">
	<div class="arrow">
		<div  class="arrow-icon" id="prev"><a href="javascript:void(0)"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></div>
		<div  class="arrow-icon" id="next"><a href="javascript:void(0)"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
	</div>
	<?php
	foreach ( $slide_info as $key => $slide ) {
		if ( ! isset( wp_get_attachment_image_src( $slide['slide'] )[0] ) ) {
			continue;
		}
		?>
		<figure class="figure de-active fade" id="figure-<?php echo esc_attr( $key ); ?>">
			<figure-caption class="slider-contents">
					<h1 class="text text--uppercase" id="slider_title"><?php echo esc_html( $slide['title'] ?? '' ); ?> </h1>
					<h4 id="slider-description"><?php echo esc_html( wp_strip_all_tags( $slide['description'] ?? '' ) ); ?></h4> 
			</figure-caption>
			<img class="slider__img" src="<?php echo esc_url( wp_get_attachment_image_src( $slide['slide'], array( '700', '600' ) )[0] ); ?>" alt="<?php echo esc_html( $slide['title'] ?? '' ) . 'image'; ?>" title="slider image" id="slider-image"/>
		</figure>
		<?php
	}
	?>
</section>
	<?php
}
