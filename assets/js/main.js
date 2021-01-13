import { utils } from './utils.js';

/** on load **/
window.onload = function() {

	// gsap settings
	gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
	gsap.defaults({
		duration: 0.3
	});

	// init function
	init();
	function init() {
		console.log('HEY');
	}

	headerInteraction();
	function headerInteraction() {
		const header = document.querySelector('header');
		const pageY = window.scrollY;
		(pageY > 0) ?
			header.classList.add('is-scrolled') :
			header.classList.remove('is-scrolled');
	}

	menuInteraction();
	function menuInteraction() {
		const burgerMenu = document.querySelector('.burger-menu');
		burgerMenu.addEventListener('click', () => {
			header.classList.toggle('is-active');
		});
	}

	/** scroll **/
	window.addEventListener('scroll', function() {
		headerInteraction();
	});

	/** resize **/
	window.addEventListener('resize', function() {
		init();
	});

}
/** on load ends **/

