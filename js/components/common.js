/**
 * Common JS.
 *
 * @type {Object}
 */
const common = {

	/**
	 * Initialize.
	 *
	 * @return {void}
	 */
	init() {
		this.setProps();
		this.bindEvents();
	},

	/**
	 * Bind events.
	 *
	 * @return {void}
	 */
	bindEvents() {
		this.backToTopButton.on( 'click', this.goBackToTop );
	},

	/**
	 * Set properties and selectors.
	 *
	 * @return {void}
	 */
	setProps() {
		this.backToTopButton = $( '#lifestyle-back-to-top' );
		this.bodyHtml = $( 'body, html' );

		//Header sticky
		$( function() {
			createSticky( $( '.header__bottom-header' ) );
		} );

		function createSticky( sticky ) {
			if ( 'undefined'  !==  typeof sticky  ) {
				let	pos = sticky.offset().top,
					win = $( window );
				win.on( 'scroll', function() {
					win.scrollTop() >= pos ? sticky.addClass( 'sticky-header' ) : sticky.removeClass( 'sticky-header' );
				} );
			}
		}

		//POPUP setup.
		$( '.open' ).on( 'click', function() {
			$( '.model' ).addClass( 'active' );
		} );

		$( '.close-icon' ).on( 'click', function() {
			$( '.model' ).removeClass( 'active' );
		} );

		//Menu open
		$( '#menu-open' ).on( 'click', function() {

			let clicks = $( this ).data( 'clicks' );
			if ( clicks ) {
				$( '.header__bottom-header' ).removeClass( 'active' );
			} else {
				$( '.header__bottom-header' ).addClass( 'active' );
			}

			$( this ).data( 'clicks', ! clicks );
		} );
	},

	/**
	 * Handles back to top.
	 *
	 * @return {void}
	 */
	goBackToTop() {
		const animationDuration = 600;

		this.bodyHtml.animate( {
			scrollTop: 0
		}, animationDuration );
	}

};

export default common;
