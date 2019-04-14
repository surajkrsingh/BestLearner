<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package bestlearner
 */

if ( isset( $_POST['bl_subscribe_submit_button'] ) ) {

	if ( wp_verify_nonce( sanitize_key( $_POST['submit_post'] ), 'bl_subscribe_nonce_action' ) ) { //phpcs:ignore
		$bl_subscribe_name  = sanitize_text_field( filter_input( INPUT_POST, 'bl_subscribe_name', FILTER_SANITIZE_STRING ) );
		$bl_subscribe_email = sanitize_text_field( filter_input( INPUT_POST, 'bl_subscribe_email', FILTER_SANITIZE_EMAIL ) );

		$bl_subscribe_username = strtolower( trim( preg_replace( '/\s+/', ' ', $bl_subscribe_name ) ) );

		if ( ! empty( $bl_subscribe_email ) && ! email_exists( $bl_subscribe_email ) && ! username_exists( $bl_subscribe_username ) && ! empty( $bl_subscribe_username ) ) {
			$usermeta = array(
				'user_login' => $bl_subscribe_username,
				'user_pass'  => null,
				'user_email' => $bl_subscribe_email,
				'role'       => 'subscriber',
			);
			$user_id  = wp_insert_user( $usermeta );
			if ( ! is_wp_error( $user_id ) ) {
				$error_message = esc_html__( 'Thank you for subscribe us !!', 'bestlearner' );
				echo "<script type='text/javascript'>alert('$error_message');</script>"; //phpcs:ignore
			}
		} else {
			$error_message = esc_html__( 'Already subscribed by you', 'bestlearner' );
			echo "<script type='text/javascript'>alert('$error_message');</script>"; //phpcs:ignore
		}
	} else {
		$error_message = esc_html__( 'Failed Nonce Verification ', 'bestlearner' );
		echo "<script type='text/javascript'>alert('$error_message');</script>"; //phpcs:ignore
	}
}

?>
</section>
</main>
	<button type="button" class="bestlearner-back-to-top" ><i class="fa fa-arrow-circle-up"></i></button>
	<footer class="footer">
		<section class="footer__footer-top">
			<!-- Static Contents for tweets and subscribe -->
			<div class="footer-box">
				<h4 class="footer-box__title text text--uppercase">Contact Us</h4>
				<hr class="hr-line--green"/>
				<span class="line-break caption-text">
					Address : Pune Maharashtra ( India )
				</span>
				<span class="line-break caption-text">
					Email : bestlearner.org@gmail.com

				</span>
				<span class="line-break caption-text">
					Site : <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank">www.bestlearner.org</a>
				</span>
				<div class="col">
					<a href="#" class="button button--default text text--uppercase">More</a>
				</div>
			</div>
			<div class="footer-box">
				<h4 class="footer-box__title text text--uppercase">
					Google map
				</h4>
				<hr class="hr-line--green"/>
				<div class="map-container">
					<iframe class="map-container__google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1891.5097121579201!2d73.95554806899476!3d18.52802434232243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTjCsDMxJzQwLjgiTiA3M8KwNTcnMjMuOSJF!5e0!3m2!1sen!2sin!4v1554310329979!5m2!1sen!2sin"  frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			<?php } ?>
			<div class="footer-box">
				<h4 class="footer-box__title text text--uppercase">subscribe & newsletter</h4>
				<hr class="hr-line--green"/>
				<span class="line-break caption-text">
				Subscribe and get notification when new article come.
				</span>
				<form class="form" method="post">
					<?php wp_nonce_field( 'bl_subscribe_nonce_action', 'submit_post' ); ?>
					<div class="col">
						<label for="subscribe name"></label>
						<input type="text" class="input input-box" placeholder="YOUR NAME" name="bl_subscribe_name" id="bl_subscribe_name"/>
					</div>
					<div class="col">
						<label for="subscribe email"></label>
						<input type="text" class="input input-box" placeholder="YOUR EMAIL ID" name="bl_subscribe_email" id="bl_subscribe_email"/>
					</div>
					<div class="col">
						<button type="submit" class="button button--subscribe text text--uppercase" id="bl_subscribe_submit_button" name="bl_subscribe_submit_button">subscribe now</button>
					</div>
				</form>
			</div>
		</section>
		<section class="footer__footer-bottom">
			<div class="footer-bottom__social">
				<ul class="menu-list">
					<li class="menu-list__item--square post-tag--bg-color-rss"><a href="<?php echo esc_url( home_url( '/feed' ) ); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square post-tag--bg-color-twitter"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square post-tag--bg-color-tumblr"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square post-tag--bg-color-instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square post-tag--bg-color-facebook"><a href="https://www.facebook.com/Best-Learner-564158077408955/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square post-tag--bg-color-linkedin"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square post-tag--bg-color-youtube"><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				</ul>
			</div>
			<div class="footer-copy-text">© Copyright 2019. All Rights Reserved.</div>
		</section>
		<progress class="progress-bar" id="progressbar" value="0"></progress>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
<?php
