let assocAccordionOpener = document.querySelectorAll('.assoc-accordion-wrapper'),
	assocTextHider = document.querySelectorAll('.assoc-text-hider'),
	assocOpenIcons = document.querySelectorAll('.assoc-open-icon');

assocAccordionOpener.forEach((acc) => {
	acc.querySelector('div:first-of-type').addEventListener('click', () => {
		if (!acc.classList.contains('active')) {
			acc.classList.add('active');
			acc.querySelector('.assoc-text-hider').style.maxHeight = acc.querySelector('.assoc-text-hider').scrollHeight + 'px';
			acc.querySelector('.assoc-open-icon').classList.add('ass-icon-rotated');
			acc.querySelector('.assoc-open-icon').style.transform = 'translate(2.5%, -50%) rotate(180deg)';
		} else {
			acc.classList.remove('active');
			acc.querySelector('.assoc-text-hider').style.maxHeight = null;
			acc.querySelector('.assoc-open-icon').classList.remove('ass-icon-rotated');
			acc.querySelector('.assoc-open-icon').style.transform = 'translate(2.5%, -50%) rotate(0)';
		}
	});
});
