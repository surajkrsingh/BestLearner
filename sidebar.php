<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package bestlearner
 */

?>
<aside class="sidebar" id="secondary">
	<h4>
		<?php
		if ( is_home() ) {
			esc_html_e( 'SIDEBAR', 'bestlearner' );
		}
		?>
	</h4>
	<hr class='hr--pink'/>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>
