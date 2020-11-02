/** on load **/
window.onload = function() {

	var header = document.querySelector('header');

	headerInteraction();
	function headerInteraction() {
		var pageY = window.scrollY;
		(pageY > 0) ?
			header.classList.add('is-scrolled') :
			header.classList.remove('is-scrolled');
	}

	/** window on scroll **/
	window.addEventListener('scroll', function() {
		headerInteraction();
	});

}
/** on load ends **/
