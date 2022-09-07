import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import AOS from "aos";
import * as utils from './utils';
import * as animations from './animations';
import * as interactions from './interactions';

// const Flickity = require('flickity');

// gsap settings
gsap.registerPlugin();
gsap.defaults({
	ease: "power2.out",
	duration: 0.3,
});

class App {
	constructor() {
		this.header = document.querySelector('header');
		this.body = document.body;

		window.addEventListener('resize', this.resize.bind(this), false);

		window.addEventListener('scroll', this.scroll.bind(this), false);
		this.scroll();

		// call animations
		new animations.Load(
			() => {
				console.log('done')
			}
		);

		// call interactions
		interactions.Header();
		interactions.Menu();
		interactions.FixGF();
	}

	// utils
	resize() {
	}

	scroll() {
		interactions.Header();
	}
}

window.onload = () => {
	new App();
	AOS.init();

	// after submitting form
	jQuery(document).on("gform_page_loaded", function (e, form_id) {
		interactions.Form();
	});
}
