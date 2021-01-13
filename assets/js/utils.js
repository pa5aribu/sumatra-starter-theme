// UTILS
export const utils = {

	isMobile: {
		Android: function () {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function () {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function () {
			return navigator.userAgent.match(/iPhone|iPod/i);
		},
		Opera: function () {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function () {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function () {
			return (
				utils.isMobile.Android() ||
				utils.isMobile.BlackBerry() ||
				utils.isMobile.iOS() ||
				utils.isMobile.Opera() ||
				utils.isMobile.Windows()
			);
		},
	},

	square: function(selector) {
		let els = document.querySelectorAll(selector);
		els = [].slice.call(els);
		els.forEach((el) => {
			el.style.objectFit = 'cover';
			el.style.height = el.clientWidth + 'px';

			let mobile = false;
			if(el.classList.contains('mobile-false')) mobile = true;

			// mobile
			if(utils.isMobile.any() && mobile) {
				el.style.height = 'unset';
			}

		})
	},

	landspace: function(selector) {
		let els = document.querySelectorAll(selector);
		els = [].slice.call(els);
		els.forEach((el) => {
			let multiplier = 0.633;
			if(el.hasAttribute('data-multiplier')) {
				multiplier = el.getAttribute('data-multiplier');
			}
			el.style.objectFit = 'cover';
			el.style.height = (el.clientWidth * multiplier) + 'px';
		})
	},

	bleed: function(selector) {
		const bleedEls = document.querySelectorAll(selector);
		if (bleedEls) {
			gsap.utils.toArray(bleedEls).forEach((el) => {
				const children = el.children[0];
				let gap = 0;
				const elRect = el.getBoundingClientRect();
				gap = window.innerWidth - (Math.round(elRect.left) + Math.round(elRect.width));

				children.style.maxWidth = 'unset';
				children.style.width = `calc(100% + ${gap}px)`;
			});
		}
	},

	stickyPos: function() {
		const els = document.querySelectorAll('.pos-sticky');
		const header = document.querySelector('header');
		gsap.utils.toArray(els).forEach((el) => {
			const rect = el.getBoundingClientRect();
			const sectionNavigation = document.querySelector('.section-navigation');
			let offset = window.innerHeight + header.clientHeight - rect.height;
			if(sectionNavigation) {
				console.log(sectionNavigation.clientHeight);
				offset += sectionNavigation.clientHeight;
			}
			el.style.top = offset/2 + 'px';
		})
	}
};
