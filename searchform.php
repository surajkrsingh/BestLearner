<?php
/**
 * Custom search form.
 *
 * @package lifestyle
 */

?>

<form role="search" method="get" class="lifestyle-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search For :', 'lifestyle' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'lifestyle' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'lifestyle' ); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'lifestyle' ); ?>" />
</form>
