<?php
/**
 * Enqueue theme assets.
 *
 * @package bestlearner
 */

namespace BestLearner;

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

		$json_data   = BESTLEARNER_TEMP_DIR . '/build/manifest.json';
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
			return sprintf( '%1$s/%2$s', BESTLEARNER_BUILD_URI, $asset_paths[ $filename ] );
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
			$file_location = sprintf( '%1$s/build/%2$s', BESTLEARNER_TEMP_DIR, $asset_paths[ $filename ] );
		}

		return filemtime( $file_location );
	}

	/**
	 * Register scripts.
	 *
	 * @action wp_enqueue_scripts
	 */
	public function register_scripts() {

		wp_register_script( 'bestlearner-main', self::asset_path( 'main.js' ), array( 'jquery' ), self::asset_version( 'main.js' ), true );
		wp_register_script( 'bestlearner-home', self::asset_path( 'home.js' ), array( 'jquery' ), self::asset_version( 'home.js' ), true );
		wp_register_script( 'bestlearner-single', self::asset_path( 'single.js' ), array( 'jquery' ), self::asset_version( 'single.js' ), true );
		wp_register_style( 'bestlearner-font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), self::asset_version() );
		wp_register_style( 'bestlearner-google-font', 'https://fonts.googleapis.com/css?family=Raleway:600', array(), self::asset_version() );
		wp_enqueue_script( 'bestlearner-main' );
		wp_enqueue_style( 'bestlearner-font-awesome' );
		wp_enqueue_style( 'bestlearner-google-font' );
		wp_register_script( 'google-analytics-script', 'https://www.googletagmanager.com/gtag/js?id=UA-138286791-1', null, '1.0.0', true );
		wp_register_script( 'google-recaptch-script', 'https://www.google.com/recaptcha/api.js', null, '1.0.0', true );
		wp_enqueue_script( 'google-recaptch-script' );

		if ( is_home() ) {
			wp_enqueue_script( 'bestlearner-home' );
		}

		if ( is_single() ) {
			wp_enqueue_script( 'bestlearner-single' );
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

		wp_register_style( 'bestlearner-main', self::asset_path( 'main.css' ), array(), self::asset_version( 'main.css' ) );
		wp_register_style( 'bestlearner-home', self::asset_path( 'home.css' ), array( 'bestlearner-main' ), self::asset_version( 'home.css' ) );
		wp_register_style( 'bestlearner-single', self::asset_path( 'single.css' ), array( 'bestlearner-main' ), self::asset_version( 'single.css' ) );

		wp_enqueue_style( 'bestlearner-main' );

		if ( is_home() ) {
			wp_enqueue_style( 'bestlearner-home' );
		}

		if ( is_single() ) {
			wp_enqueue_style( 'bestlearner-single' );
		}
	}

}
