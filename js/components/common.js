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
	},

	/**
	 * Set properties and selectors.
	 *
	 * @return {void}
	 */
	setProps() {

		//Back to top
		const backToTopButton = $( '.bestlearner-back-to-top' );
		$( window ).scroll( function() {
			if ( 100 < $( this ).scrollTop() ) {
				backToTopButton.fadeIn();
			} else {
				backToTopButton.fadeOut();
			}
		} );

		backToTopButton.click( function() {
			$( 'body, html' ).animate( { scrollTop: 0 }, 500 );
		} );

		//Header sticky
		$( function() {
			createSticky( $( '.header__bottom-header' ) );
		} );

		function createSticky( sticky ) {
			if ( 'undefined'  !==  typeof sticky  && 600 <= $( window ).width()  ) {
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

		//Toggle the menu item.

		$( 'ul.menu-list li.menu-list__item a' ).each( function( i ) {
			if ( window.location.href.includes( $( 'ul.menu-list li.menu-list__item a' )[i].href ) ) {
				$( 'ul.menu-list li.menu-list__item a' ).removeClass( 'menu-item-active' );
				$( this ).addClass( 'menu-item-active' );
			}

		} );
	}

};

export default common;
