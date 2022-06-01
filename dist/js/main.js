import { utils } from './utils.js';
import { animations } from './animations.js';

// gsap settings
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);
gsap.defaults({
	duration: 0.3
});

// header interaction
function headerInteraction() {
	const header = document.querySelector('header');
	const pageY = window.scrollY;
	(pageY > 0) ?
		header.classList.add('is-scrolled') :
		header.classList.remove('is-scrolled');
}

// menu interaction
function menuInteraction() {
	const burgerMenu = document.querySelector('.burger-menu');
	burgerMenu.addEventListener('click', () => {
		header.classList.toggle('is-active');
	});

	const parentMenuItems = document.querySelectorAll('.menu-item-has-children');
	if(parentMenuItems) {
		parentMenuItems.forEach(item => {
			item.addEventListener('click', function() {
				this.classList.toggle('sub-menu-is-active');
			})
		})
	}
}

// overlay animation
function overlayAnimation() {
	const overlay = document.querySelector('#overlay');
	const parts = overlay.querySelectorAll('#bottom, #center, #top');
	const parts2 = overlay.querySelectorAll('#top, #center, #bottom');
	const tl = gsap.timeline({
		delay: .3,
		onComplete: () => {
			overlay.style.display = 'none';	
		}
	});

	const gap = 50;

	tl.set(parts, {
		y: `+=${gap}`,
	})

	tl
		.to(parts, {
			opacity: 1,
			rotation: 0,
			y: `-=${gap}`,
			stagger: .1
		})
		.to(parts2, {
			delay: .15,
			opacity: 0,
			rotation: 0,
			y: `-=${gap}`,
			stagger: .1
		})
		.to(overlay, {
			opacity: 0,
		})
}

// faq interaction
function faqInteraction() {
	const wrapper = document.querySelector('.faq-list');
	if(wrapper) {
		const items = wrapper.querySelectorAll('.faq-item');
		items.forEach(item => {
			const question = item.querySelector('.faq-question');
			question.addEventListener('click', () => {
				item.classList.toggle('is-active');
			})
		})
	}
}

// contact interaction
let textAreaRows = 1;
function contactInteraction() {
	const gformWrapper = document.querySelector(".gform_wrapper");
	if (gformWrapper) {
    	const textArea = gformWrapper.querySelector("textarea");
		if(textArea) {
			textArea.rows = textAreaRows;
			textArea.addEventListener("keyup", function () {
				textAreaRows = this.value.split("\n").length;
				this.rows = textAreaRows;
			});
		}
	}
}

// before load
contactInteraction();

// after submitting form
$(document).on("gform_page_loaded", function (e, form_id) {
	contactInteraction();
});

// scroll
window.addEventListener('scroll', function() {
	headerInteraction();
});

// resize
window.addEventListener('resize', function() {
	updateOverlay();
});

// load
window.addEventListener('DOMContentLoaded', (event) => {
	headerInteraction();
	menuInteraction();

	AOS.init({
		duration: 600,
		ease: 'ease-out',
		once: true
	});
});

