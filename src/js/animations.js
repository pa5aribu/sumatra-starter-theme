import { gsap  } from "gsap";
import * as utils from './utils';

/* ======================== */

export class Load {
	constructor(onComplete) {
		const template = document.body.dataset.template;
		this.body = gsap.utils.selector('body');

		this.tl = gsap.timeline({
			defaults: {
				duration: .5
			},
			onStart: () => {
			},
			onComplete: () => {
				gsap.set(this.body('#overlay'), { display: 'none' });
				onComplete();
			}
		});

		this.animateDefault();
	}

	animateDefault() {
		this.tl
			.set(this.body('#overlay'), {
				transformOrigin: "top",
			})
			.to(this.body('#overlay'), {
				opacity: 0,
				duration: .01
			})
			// .to(this.body('#overlay .logo'), {
			// 	opacity: 0,
			// 	y: -25,
			// })
			// .to(this.body('#overlay'), {
			// 	scaleY: 0,
			// })
	}
}

// fade in animation
class fadeIn {
	constructor() {
		this.gap = 25;
		this.items = document.querySelectorAll('.anim');
		this.staggerItems = document.querySelectorAll('.stagger-anim');
	}

	setup() {
		if(this.items) {
			gsap.set(this.items, {
				y: this.gap,
				opacity: 0
			})
		}
		if(this.staggerItems) {
			utils.toArray(this.staggerItems).forEach(item => {
				const children = item.querySelectorAll('.anim-child');
				gsap.set(children, {
					y: this.gap,
					opacity: 0
				})
			})
		}
	}

	// single anim
	animate() {
		if(this.items) {
			utils.toArray(this.items).forEach(item => {
				gsap.to(item, {
					y: 0,
					opacity: 1,
					ease: "power2.out",
					scrollTrigger: {
						trigger: item,
						start: "top 75%",
						// markers: true
					},
				});
			})
		}
		if(this.staggerItems) {
			utils.toArray(this.staggerItems).forEach(item => {
				const children = item.querySelectorAll('.anim-child');
				gsap.to(children, {
					y: 0,
					opacity: 1,
					stagger: .15,
					ease: "power2.out",
					scrollTrigger: {
						trigger: item,
						start: "top 75%",
						// markers: true
					},
				});
			})
		}
	}
}
