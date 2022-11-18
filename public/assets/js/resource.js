let lazyImgs = document.querySelectorAll('.lazy-img');

window.addEventListener('load', () => {
	lazyImgs.forEach((img) => {
		let initialSrc = img.getAttribute('data-src');
		setTimeout(() => {
			img.src = initialSrc;
		}, 1000);
	});
});
