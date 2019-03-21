<?php
/**
 * Enqueue theme assets.
 *
 * @package lifestyle
 */

namespace Lifestyle;

/**
 * Class Assets
 */
class Assets extends Base {

	/**
	 * Hold asset path.
	 *
	 * @var array
	 */
	public static $asset_paths = array();

	/**
	 * Get asset path.
	 *
	 * @return array
	 */
	public static function get_asset_path() {
		if ( ! empty( self::$asset_paths ) ) {
			return self::$asset_paths;
		}

		$json_data   = LIFESTYLE_TEMP_DIR . '/build/manifest.json';
		$asset_array = file_get_contents( $json_data ); // phpcs:ignore

		self::$asset_paths = ( $asset_array ) ? json_decode( $asset_array, true ) : [];

		return self::$asset_paths;
	}

	/**
	 * Retrive asset path.
	 *
	 * @param string $filename File name of which hash path retrive.
	 *
	 * @return bool|string
	 */
	public static function asset_path( $filename ) {

		if ( ! $filename ) {
			return false;
		}

		$asset_paths = self::get_asset_path();

		if ( ! empty( $asset_paths[ $filename ] ) ) {
			return sprintf( '%1$s/%2$s', LIFESTYLE_BUILD_URI, $asset_paths[ $filename ] );
		}

		return false;

	}

	/**
	 * Return timestamp when file is changes.
	 * This is used for cache busting assets.
	 *
	 * @param string $filename File name you want to get timestamp from.
	 *
	 * @return bool|int Timestamp.
	 */
	public static function asset_version( $filename = null ) {

		if ( ! $filename ) {
			return false;
		}

		$file_location = null;
		$asset_paths   = self::get_asset_path();

		if ( ! empty( $asset_paths[ $filename ] ) ) {
			$file_location = sprintf( '%1$s/build/%2$s', LIFESTYLE_TEMP_DIR, $asset_paths[ $filename ] );
		}

		return filemtime( $file_location );
	}

	/**
	 * Register scripts.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_scripts() {

		wp_register_script( 'lifestyle-main', self::asset_path( 'main.js' ), array( 'jquery' ), self::asset_version( 'main.js' ), true );
		wp_register_script( 'lifestyle-home', self::asset_path( 'home.js' ), array( 'jquery' ), self::asset_version( 'home.js' ), true );
		wp_register_script( 'lifestyle-single', self::asset_path( 'single.js' ), array( 'jquery' ), self::asset_version( 'single.js' ), true );
		wp_register_style( 'lifestyle-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), self::asset_version() );
		wp_register_style( 'lifestyle-google-font', 'https://fonts.googleapis.com/css?family=Raleway:600', array(), self::asset_version() );
		wp_enqueue_script( 'lifestyle-main' );

		wp_enqueue_style( 'lifestyle-font-awesome' );
		wp_enqueue_style( 'lifestyle-google-font' );

		if ( is_home() ) {
			wp_enqueue_script( 'lifestyle-home' );
		}

		if ( is_single() ) {
			wp_enqueue_script( 'lifestyle-single' );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Register styles.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_styles() {

		wp_register_style( 'lifestyle-main', self::asset_path( 'main.css' ), array(), self::asset_version( 'main.css' ) );
		wp_register_style( 'lifestyle-home', self::asset_path( 'home.css' ), array( 'lifestyle-main' ), self::asset_version( 'home.css' ) );
		wp_register_style( 'lifestyle-single', self::asset_path( 'single.css' ), array( 'lifestyle-main' ), self::asset_version( 'single.css' ) );

		wp_enqueue_style( 'lifestyle-main' );

		if ( is_home() ) {
			wp_enqueue_style( 'lifestyle-home' );
		}

		if ( is_single() ) {
			wp_enqueue_style( 'lifestyle-single' );
		}
	}

}
