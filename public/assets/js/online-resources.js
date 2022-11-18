var elem = document.querySelector('.masonry-col');
var msnry = new Masonry(elem, {
	itemSelector: '.grid-item',
	percentPosition: true,
	masonry: {
		columnWidth: '.grid-item'
	}
});
