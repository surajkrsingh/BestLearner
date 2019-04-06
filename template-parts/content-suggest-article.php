<?php
/**
 * Suggestion for an article.
 *
 * @package the-suraj
 */

if ( isset( $_POST['save_suggested_article'] ) ) {
	if ( wp_verify_nonce( sanitize_key( $_POST['submit_post'] ), 'bl_suggest_article_nonce_action' ) ) {
		$bl_article_title       = sanitize_text_field( filter_input( INPUT_POST, 'bl_article_title', FILTER_SANITIZE_STRING ) );
		$bl_article_description = sanitize_text_field( filter_input( INPUT_POST, 'bl_article_description', FILTER_SANITIZE_STRING ) );
		$bl_article_category    = sanitize_text_field( filter_input( INPUT_POST, 'bl_article_category', FILTER_SANITIZE_NUMBER_INT ) );

		if ( isset( $_POST['g-recaptcha-response'] ) && ! empty( $_POST['g-recaptcha-response'] ) ) {
			$secret          = '6LdMapsUAAAAAJVmWwzau7FKw5vMZ6yPOww9YZAe';
			$verify_response = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response'] );
			$response_data   = json_decode( $verify_response );
			if ( $response_data->success ) {
				if ( ! empty( $bl_article_title ) && ! empty( $bl_article_description ) && ! empty( $bl_article_category ) ) {
					$postmeta = array(
						'post_title'    => $bl_article_title,
						'post_content'  => $bl_article_description,
						'post_status'   => 'Draft',
						'post_author'   => 1,
						'post_category' => array( $bl_article_category ),
					);
					$post_id  = wp_insert_post( $postmeta );
					if ( ! is_wp_error( $post_id ) ) {
						$error_message = 'Thank you for a article suggestion !!';
						echo "<script type='text/javascript'>alert('$error_message');</script>";
					}
					wp_reset_postdata();
				} else {
					$error_message = esc_html__( 'Please enter value', 'life-styel' );
					echo "<script type='text/javascript'>alert('$error_message');</script>";
				}
			} else {
				$error_message = esc_html__( 'please fill captcha proper ', 'life-styel' );
				echo "<script type='text/javascript'>alert('$error_message');</script>";
			}
		} else {
			$error_message = esc_html__( 'Invalid Request', 'life-styel' );
			echo "<script type='text/javascript'>alert('$error_message');</script>";
		}
	} else {
		$error_message = esc_html__( 'Failed Nonce Verification ', 'life-styel' );
		echo "<script type='text/javascript'>alert('$error_message');</script>";
	}
}
?>
<div class="model">
	<div class="model-box">
		<span class="close-icon" title="close">
			<i class="fa fa-close" aria-hidden="true"></i>
		</span>
		<div class="model-box__content">
			<h2>Suggest an article</h2>
			<p> Please suggest any topic/article for post .</p>
			<form class="model-box__content__form" method="post">
				<?php wp_nonce_field( 'bl_suggest_article_nonce_action', 'submit_post' ); ?>
				<input type="text" name="bl_article_title" id='bl_article_title' placeholder="Article title"/>
				<textarea placeholder="Short description about article" id='bl_article_description' name="bl_article_description"></textarea>
				<select name="bl_article_category" id="bl_article_category">
				<option value="">Select article type</option>
				<?php
				$categories_list = get_terms(
					array(
						'taxonomy'     => 'category',
						'orderby'      => 'name',
						'hierarchical' => true,
						'order'        => 'ASC',
						'hide_empty'   => false,
					)
				);
				if ( is_array( $categories_list ) && ! empty( $categories_list ) ) {
					foreach ( $categories_list as $cat ) {
						printf( '<option value="%1$s"> %2$s </option>', esc_attr( $cat->term_id ), esc_html( $cat->name ) );
					}
				}
				wp_reset_postdata();
				?>
				</select>
				<span class="msg-error error"></span>
				<div id="recaptcha" class="g-recaptcha" data-sitekey="6LdMapsUAAAAAKZ04Hf1mXSR5_v5A6KGzzc9hOjD"></div>
				<button type="submit" name="save_suggested_article" id="save_suggested_article">Post</button>
			</form>
		</div>
	</div>
</div>
