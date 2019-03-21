<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after.
 *
 * @package lifestyle
 */

?>
</section>
</main>
	<footer class="footer">
		<section class="footer__footer-top">
			<!-- Static Contents for tweets and subscribe -->
			<div class="footer-box">
				<h4 class="footer-box__title text text--uppercase">Contact Us</h4>
				<hr class="hr-line--green"/>
				<span class="line-break caption-text">
					Address : 1 Ground floor Pyramid icon business hub near jhhagriya circle palanpur jakatnaka Surat-395005
				</span>
				<span class="line-break caption-text">
					Contact No : +917284970941 
				</span>
				<span class="line-break caption-text">
					Email : bitscamp@gmail.com
				</span>
				<span class="line-break caption-text">
					Site : <a href="www.bitscamp.com">www.bitscamp.com</a>
				</span>
				<div class="col">
					<a href="#" class="button button--green text text--uppercase">More</a>
				</div>
			</div>
			<div class="footer-box">
				<h4 class="footer-box__title text text--uppercase">
					Google map
				</h4>
				<hr class="hr-line--green"/>
				<div class="map-container">
					<iframe class="map-container__google-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d464.92734145750995!2d72.78190328576677!3d21.21523790669608!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04c3f9f31b41f%3A0x6fb6c46a45175dc0!2sPiramyd+Icon!5e0!3m2!1sen!2sin!4v1552673672943"  frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			<?php } ?>
			<div class="footer-box">
				<h4 class="footer-box__title text text--uppercase">subscribe & newsletter</h4>
				<hr class="hr-line--green"/>
				<span class="line-break caption-text">
				Subscribe and get notification when new atricles come.
				</span>
				<div class="form">
					<div class="col">
						<label for="subscribe name"></label>
						<input type="text" class="input input-box" placeholder="YOUR NAME"/>
					</div>
					<div class="col">
						<label for="subscribe email"></label>
						<input type="text" class="input input-box" placeholder="YOUR EMAIL ID"/>
					</div>
					<div class="col">
						<button type="submit" class="button button--subscribe text text--uppercase">subscribe now</button>
					</div>
				</div>
			</div>
		</section>
		<section class="footer__footer-bottom">
			<div class="footer-bottom__social">
				<ul class="menu-list">
					<li class="menu-list__item--square divider divider--left"><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square divider divider--left"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square divider divider--left"><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square divider divider--left"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li class="menu-list__item--square divider divider--left divider--right"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</section>
	</footer>
	<div class="lifestyle-back-to-top" id="lifestyle-back-to-top"></div>
	<?php wp_footer(); ?>
</body>
</html>
