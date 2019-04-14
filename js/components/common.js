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
		var backToTopButton = $( '.bestlearner-back-to-top' );
		$( window ).scroll( function() {
			if ( 10 < $( this ).scrollTop() ) {
				backToTopButton.fadeIn();
			} else {
				backToTopButton.fadeOut();
			}
		} );

		backToTopButton.click( function() {
			$( 'body, html' ).animate( { scrollTop: 0 }, 500 );
		} );

		//Page scrolling progress.
		$( document ).ready( function () {
			$( window ).scroll( function () {
				let s = $( document ).scrollTop(),
					d = $( document ).height() - $( window ).height();
				$( '#progressbar' ).attr( 'max', d );
				$( '#progressbar' ).attr( 'value', s );
			} );
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

		//Replace home text to icon.
		const home = jQuery( '.menu-list__item' ).children()[0];
		if ( 0 !== home.lenght && 'home' === home.text.toLowerCase() ) {
			home.setAttribute( 'style', 'font-size:20px;padding:14px 15px;' );
			home.innerHTML = ( '<i class="fa fa-home" aria-hidden="true"></i>' );
		}

		//Page load Progess bar.
		document.onreadystatechange = function( e ) {
			if ( 'interactive'  === document.readyState ) {
				const all = document.getElementsByTagName( '*' );
				for ( let i = 0, max = all.length; i < max; i++ ) {
					progress( all[i] );
				}
			}
		};
		function progress( currentElememet ) {
			const all         = document.getElementsByTagName( '*' );
			let perIncrement = 100 / all.length;

			if ( $( currentElememet ).on() ) {
				let progressValue = Number( jQuery( '#progress-holder' ).val() ) + perIncrement;
				jQuery( '#progress-holder' ).val( progressValue );
				jQuery( '#progress' ).animate( { width: progressValue + '%' }, 10, function() {
					if ( '100%' == document.getElementById( 'progress' ).style.width ) {
						jQuery( '#progress' ).fadeOut( 'slow' );
					}
				} );
			} else {
				progress( currentElememet );
			}
		}
	}
};

export default common;
