/**
 * bestLearner JS.
 *
 * @type {Object}
 */
const bestLearner = {

	/**
	 * Initialize.
	 *
	 * @return {void}
	 */
	init() {
		this.setProps();
	},

	/**
	 * Set properties and selectors.
	 *
	 * @return {void}
	 */
	setProps() {

		// Subscribe form validation.
		jQuery( '#bl_subscribe_submit_button' ).click( function() {
			let userName  = jQuery( '#bl_subscribe_name' ).val();
			let userEmail = jQuery( '#bl_subscribe_email' ).val();
			const regex   = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
			if ( '' === userName || '' === userEmail || ! regex.test( userEmail ) ) {
				alert( 'Please enter correct info' );
				return false;
			}
			return true;
		} );

		// Suggest an article form validation.
		jQuery( '#save_suggested_article' ).click( function() {
			let articleTitle    = jQuery( '#bl_article_title' ).val();
			let articleContents = jQuery( '#bl_article_description' ).val();
			let articleCategory = jQuery( '#bl_article_category' ).val();
			var correctCaptcha = function( response ) {
				alert( response );
			};
			if ( '' === articleTitle || '' === articleContents || '' === articleCategory ) {
				alert( 'Please enter correct info' );
				return false;
			}
			return true;
		} );
	}
};

export default bestLearner;
