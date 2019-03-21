class Slider {

	/**
	 *Constructor.
	 *
	 *It inialize the all data member for class.
	 *
	 *@return  { void }
	 */
	init() {
		this.activeIndex = 0;
		this.itemList = document.getElementById( 'primary-slider' ).getElementsByTagName( 'figure' );
		this.itemList[0].className 	= 'figure active';
		this.arrowButton = document.getElementsByClassName( 'arrow-icon' );
		this.length = this.itemList.length;
		this.eventHandlerForNext();
		this.eventHandlerForPrev();

		if ( ! this.itemList || ! this.arrowButton ) {
			return;
		}

	}

	/**
	 * Event Handler For Next Arrow.
	 *
	 * It handle the next arrow for slider to get next image.
	 *
	 *@return  { void }
	 */
	eventHandlerForNext() {
		this.arrowButton[1].addEventListener( 'click', this.nextSlide.bind( this ) );
	}

	/**
	 * Event Handler For Prev Arrow.
	 *
	 * It handle the previus arrow for slider to get next image.
	 *
	 * @return  { void }
	 */
	eventHandlerForPrev() {
		this.arrowButton[0].addEventListener( 'click', this.prevSlide.bind( this ) );
	}

	/**
	 * Prev callback.
	 *
	 * This function decrese the index value so slider image can be get by previous one.
	 *
	 * @return  { void }
	 */
	prevSlide() {
		let currentIndex =  Math.abs( this.activeIndex ) % this.length ;
		let prevIndex = currentIndex - 1;
		if ( 0 === currentIndex ) {
			prevIndex = this.length - 1;
			this.activeIndex = prevIndex;
		} else {
			this.activeIndex--;
		}
		this.itemList[currentIndex].className 	= 'figure de-active';
		this.itemList[prevIndex ].className 	= 'figure active fade';

	}

	/**
	 * Show SLider.
	 *
	 * This function actually show the slider image on large-box as main slider.
	 *
	 * @return  { void }
	 */
	nextSlide( event ) {

		this.activeIndex++;
		let currentIndex =  Math.abs( this.activeIndex ) % this.length ;
		if ( ! this.itemList ) {
			return;
		}

		let prevIndex = currentIndex - 1;
		if ( 0 === currentIndex ) {
			prevIndex = this.length - 1;
		}
		this.itemList[prevIndex].className 	= 'figure de-active fade';
		this.itemList[currentIndex ].className 	= 'figure active fade';
	}
}
const ChangeTime = 5000,
	slider = new Slider();
window.setInterval( function () {
	slider.nextSlide();
}, ChangeTime );

export default slider;
