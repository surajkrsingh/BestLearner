/**
 * Main scripts, loaded on all pages.
 *
 * @package bestlearner
 */

import '../sass/main.scss';
import * as components from './components';

//Google Analytics
window.dataLayer = window.dataLayer || [];
function gtag() {
	dataLayer.push( arguments );
}
gtag( 'js', new Date() );
gtag( 'config', 'UA-138286791-1' );

window.$ = window.$ || jQuery;

// Initialize common scripts.
components.WebFont.init();
components.common.init();
components.bestLearner.init();

