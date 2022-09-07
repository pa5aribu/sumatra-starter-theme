import { gsap  } from "gsap";
import { ScrollTrigger  } from "gsap/ScrollTrigger";

export function ScrollWork() {
	const header = document.querySelector('header');
	const works = document.querySelector("#works");

	if (works) {
		const progressBar = works.querySelector(".progress-bar");
		let workItems = works.querySelectorAll(".work");
		workItems = gsap.utils.toArray(workItems);
		let fixedImages = works.querySelectorAll(".fixed-images .image-wrapper");
		fixedImages = gsap.utils.toArray(fixedImages);

		ScrollTrigger.create({
			trigger: "#works",
			start: "top top",
			end: "bottom bottom",
			pin: ".fixed-images",
			pinSpacing: false,
			// markers: true,
			onEnter: ({ progress, direction, isActive }) => {
				header.classList.add("no-bg");
			},
			onEnterBack: ({ progress, direction, isActive }) => {
				header.classList.add("no-bg");
			},
			onLeave: ({ progress, direction, isActive }) => {
				header.classList.remove("no-bg");
			},
			onLeaveBack: ({ progress, direction, isActive }) => {
				header.classList.remove("no-bg");
			},
			onUpdate: ({ progress, direction, isActive }) => {
				const percentage = progress * 100;
				progressBar.style.height = percentage + "%";
			},
		});

		gsap.utils.toArray(workItems).forEach((item, index) => {
			const image = fixedImages[index];
			ScrollTrigger.create({
				trigger: item,
				start: "top 50%",
				end: "bottom bottom",
				// markers: true,
				onToggle: (self) => {
					image.classList.toggle("is-active");
				},
				onUpdate: ({ progress, direction, isActive }) => {
					const percentage = progress * 100;
					image.setAttribute(
						"style",
						`
						clip-path: inset(${100 - percentage}% 0 0 0);
						-webkit-clip-path: inset(${100 - percentage}% 0 0 0)
					`
					);
				},
			});
		});
	}
}

export function Iframes() {
	const iframes = document.querySelectorAll(".slide-content iframe");
	if (iframes) {
		gsap.utils.toArray(iframes).forEach((iframe) => {
			const parent = iframe.parentElement;
			parent.style.paddingTop = "56.25%";
		});
	}
}

export function Accordion() {
	const items = document.querySelectorAll('.accordion-item');
	if(items) {
		items.forEach(item => {
			const trigger = item.querySelector('.accordion-trigger');
			const content = item.querySelector('.accordion-content');
			const items = item.querySelectorAll('.accordion-content li');
			let state = false;
			trigger.addEventListener('click', () => {
				if(!state) {
					const tl = gsap.timeline({});
					tl
						.to(content, {
							height: 'auto'
						})
						.from(items, {
							y: 15,
							opacity: 0,
							stagger: 0.05
						}, 0)
				} else {
					const tl = gsap.timeline({});
					tl
						.to(content, {
							height: 0,
						})
				}

				state = !state;
			})
		});
	}
}

export function Slider(Flickity) {
	const teamCarousel = document.querySelector(".team-carousel");
	if (teamCarousel) {
		const flickity = new Flickity(teamCarousel, {
			cellAlign: "left",
			contain: true,
			prevNextButtons: false,
			pageDots: false,
		});

		ScrollTrigger.create({
			trigger: "#about-team",
			start: "top 50%",
			onEnter: () => {
				flickity.playPlayer();
			},
		});
	}

	const animalCarousel = document.querySelector("#animal-carousel");
	if (animalCarousel) {
		const flickity = new Flickity(animalCarousel, {
			cellAlign: "left",
			contain: true,
			prevNextButtons: true,
			pageDots: false,
			autoPlay: 3000,
		});

		flickity.stopPlayer();

		ScrollTrigger.create({
			trigger: "#animal-carousel",
			start: "top 50%",
			// markers: true,
			onEnter: () => {
				flickity.playPlayer();
			},
		});

		const currentIndex = document.querySelector(
			".animal-carousel-wrapper .current-index"
		);
		flickity.on("change", function (index) {
			currentIndex.textContent = index + 1;
		});
	}
}

export function Video() {
	const template = document.body.dataset.template;
	const is = {
		home: false,
		work: false
	}

	if(template == 'templates/template-home.php') is.home = true;
	if(template == 'templates/template-work.php') is.work = true;

	let videoWrapper, video, playVideo;
	const poplite = document.querySelector('#poplite');
	const options = {
		play: false,
		mute: true
	};

	if(is.home) options.mute = false;

	if (is.work || is.home) {
		playVideo = document.querySelector(".play-video");
		videoWrapper = document.querySelector(".internal-video-wrapper");
		video = videoWrapper.querySelector("video");

		playVideo.addEventListener("click", function () {
			console.log('yo')
			if(is.home) poplite.classList.add('is-active');
			videoWrapper.classList.add("is-playing");
			video.play();
			options.play = true;
		});

		video.addEventListener("ended", function () {
			if(is.home) poplite.classList.remove('is-active');
			videoWrapper.classList.remove("is-playing");
			options.play = false;
		});

		const playButton = videoWrapper.querySelector(".play-button");
		const muteButton = videoWrapper.querySelector(".mute-button");
		playButton.addEventListener("click", function () {
			if (options.play) {
				video.pause();
			} else {
				video.play();
			}
			this.classList.toggle("is-active");
			options.play = !options.play;
		});

		muteButton.addEventListener("click", function () {
			options.mute = !options.mute;
			video.muted = options.mute;
			this.classList.toggle("is-active");
		});
	}

	// close
	if(is.home) {
		const popupCloser = document.querySelector('.popup-closer');
		popupCloser.addEventListener('click', () => {
			if(is.home) poplite.classList.remove('is-active');
			videoWrapper.classList.remove("is-playing");
			options.play = false;
			video.pause();
			video.currentTime = 0;
		})
	}
}

export function ScrollTo() {
	const scrollTo = document.querySelector(".scroll-to");
	const header = document.querySelector('header');
	if (scrollTo) {
		const firstSection = document.querySelector("main > section");
		const nextSection = firstSection.nextElementSibling;
		scrollTo.addEventListener("click", (e) => {
			e.preventDefault();
			gsap.to(window, {
				duration: 0.6,
				scrollTo: {
					y: nextSection,
					offsetY: header.clientHeight,
				},
				ease: "power2.out",
			});
		});
	}
}

export function Form() {
	let textAreaRows = 1;
	const gformWrapper = document.querySelector(".gform_wrapper");

	if (gformWrapper) {
		const gformFooter = gformWrapper.querySelector(".gform_footer");
		const submitButton = gformFooter.querySelector('[type="submit"]');
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

export function Menu() {
	const burgerMenuWrapper = document.querySelector(".burger-menu");
	const header = document.querySelector('header');
	burgerMenuWrapper.addEventListener("click", () => {
		header.classList.toggle("is-active");
	});
}

export function Header() {
	const pageY = window.scrollY;
	const header = document.querySelector('header');
	const animalHero = document.querySelector("#animal-hero");
	if (animalHero) {
		if (pageY > animalHero.clientHeight - header.clientHeight) {
			header.classList.add("is-scrolled");
		} else {
			header.classList.remove("is-scrolled");
		}
	} else {
		pageY > 0
			? header.classList.add("is-scrolled")
			: header.classList.remove("is-scrolled");
	}
}

export function FixGF() {
	jQuery(document).ready(function($) {
		jQuery('#gform_ajax_frame_1').on('load', function() {
			var contents = jQuery(this).contents().find('*').html();
			var is_postback = contents.indexOf('GF_AJAX_POSTBACK') >= 0;
			if (!is_postback) {
				return;
			}
			var form_content = jQuery(this).contents().find('#gform_wrapper_1');
			var is_confirmation = jQuery(this).contents().find('#gform_confirmation_wrapper_1').length > 0;
			var is_redirect = contents.indexOf('gformRedirect(){') >= 0;
			var is_form = form_content.length > 0 && !is_redirect && !is_confirmation;
			var mt = parseInt(jQuery('html').css('margin-top'), 10) + parseInt(jQuery('body').css('margin-top'), 10) + 100;

			// added by bhakti
			mt += 50;

			if (is_form) {
				jQuery('#gform_wrapper_1').html(form_content.html());
				if (form_content.hasClass('gform_validation_error')) {
					jQuery('#gform_wrapper_1').addClass('gform_validation_error');
				} else {
					jQuery('#gform_wrapper_1').removeClass('gform_validation_error');
				}
				setTimeout(function() {
					/* delay the scroll by 50 milliseconds to fix a bug in chrome */
					jQuery(document).scrollTop(jQuery('#gform_wrapper_1').offset().top - mt);
				}, 50);
				if (window['gformInitDatepicker']) {
					gformInitDatepicker();
				}
				if (window['gformInitPriceFields']) {
					gformInitPriceFields();
				}
				var current_page = jQuery('#gform_source_page_number_1').val();
				jQuery(document).trigger('gform_page_loaded', [1, current_page]);
				window['gf_submitting_1'] = false;
			} else if (!is_redirect) {
				var confirmation_content = jQuery(this).contents().find('.GF_AJAX_POSTBACK').html();
				if (!confirmation_content) {
					confirmation_content = contents;
				}
				setTimeout(function() {
					jQuery('#gform_wrapper_1').replaceWith(confirmation_content);
					jQuery(document).scrollTop(jQuery('#gf_1').offset().top - mt);
					jQuery(document).trigger('gform_confirmation_loaded', [1]);
					window['gf_submitting_1'] = false;
				}, 50);
			} else {
				jQuery('#gform_1').append(contents);
				if (window['gformRedirect']) {
					gformRedirect();
				}
			}
			jQuery(document).trigger('gform_post_render', [1, current_page]);
		});
	});
}
