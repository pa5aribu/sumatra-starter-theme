import { gsap  } from "gsap";

export const isMobile = {
	Android: function () {
		return navigator.userAgent.match(/Android/i);
	},
	BlackBerry: function () {
		return navigator.userAgent.match(/BlackBerry/i);
	},
	iOS: function () {
		return navigator.userAgent.match(/iPhone|iPod/i);
	},
	iPad: function () {
		return navigator.userAgent.match(/iPad/i);
	},
	Opera: function () {
		return navigator.userAgent.match(/Opera Mini/i);
	},
	Windows: function () {
		return navigator.userAgent.match(/IEMobile/i);
	},
	any: function () {
		return (
			isMobile.Android() ||
			isMobile.BlackBerry() ||
			isMobile.iOS() ||
			isMobile.Opera() ||
			isMobile.Windows()
		);
	},
}

export const toArray = likeArray => {
	return [].slice.call(likeArray);
}

export const squareImages = () => {
	const squares = document.querySelectorAll(".square");
	if (squares) {
		toArray(squares).forEach(square => {
			square.style.height = square.clientWidth + "px";
		});
	}
}

export const strechImages = () => {
	const images = document.querySelectorAll(".image-is-bleed");
	if (images) {
		toArray(images).forEach(wrapper => {
			const image = wrapper.querySelector("img");
			const parent = image.parentElement;
			const diff = window.innerWidth - image.getBoundingClientRect().width;
			parent.style.margin = "unset";
			parent.style = `margin: 0 -${diff / 2}px;`;
		});
	}
}
