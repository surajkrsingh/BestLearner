<form method="post" action="options.php"> 
<?php
/**
 *
 * Custom setting for slider.
 *
 * @since   1.0
 * @package bestlearner
 */

settings_fields( 'slider-settings-group' );
do_settings_sections( 'slider-settings-group' );

$slider_id            = get_option( 'primary_slider' );
$primary_slider_title = get_the_title( $slider_id );

$primary_slider_title = isset( $primary_slider_title ) ? $primary_slider_title : 'Select slider';

?>
<div class="wrap" role="main">
	<h3><?php esc_html_e( 'Primary Slider Setting', 'bestlearner' ); ?></h3>  
		<label for="primary_slider"><?php esc_html_e( 'Select slider', 'bestlearner' ); ?>
			<select id="primary_slider" name="primary_slider">
				<option value="<?php echo esc_attr( $slider_id ); ?>" selected><?php echo esc_html( $primary_slider_title ); ?></option>   
				<?php

				$args = array(
					'post_type' => 'slider_post',
				);

				$all_posts = get_posts( $args );
				if ( $all_posts ) {
					foreach ( $all_posts as $current_post ) {
						setup_postdata( $current_post );
						printf(
							'<option value="%1$s">%2$s</option>',
							esc_attr( $current_post->ID ),
							esc_html( $current_post->post_title )
						);
					}
				}

				?>
			</select>
			</label>
		<?php submit_button(); ?> 
</div>
</form>
