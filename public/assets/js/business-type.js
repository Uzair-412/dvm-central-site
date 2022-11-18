let btAccordionOpener = document.querySelectorAll('.bt-accordion-wrapper'),
	btTextHider = document.querySelectorAll('.bt-text-hider'),
	btOpenIcons = document.querySelectorAll('.bt-open-icon');
btAccordionOpener.forEach((e, r) => {
	e.querySelector('svg').addEventListener('click', () => {
		const e = btTextHider[r],
			t = btOpenIcons[r];
		btTextHider.forEach((r) => {
			r != e &&
				r.classList.contains('acc-opened') &&
				(btOpenIcons.forEach((e) => {
					e != t && e.classList.contains('icon-rotated') && (e.classList.remove('icon-rotated'), (e.style.transform = 'translate(2.5%, -50%) rotate(0deg)'));
				}),
				setTimeout(() => r.classList.remove('border-t'), 200),
				r.classList.remove('acc-opened'),
				(r.style.maxHeight = null));
		}),
			e.classList.contains('acc-opened')
				? (e.classList.remove('acc-opened'), setTimeout(() => e.classList.remove('border-t'), 200), t.classList.contains('icon-rotated') && (t.style.transform = 'translate(2.5%, -50%) rotate(0deg)'), (e.style.maxHeight = null))
				: (e.classList.add('acc-opened'), e.classList.add('border-t'), t.classList.add('icon-rotated'), (t.style.transform = 'translate(2.5%, -50%) rotate(180deg)'), (e.style.maxHeight = e.scrollHeight + 'px'));
	});
});

// hot selling products carasoul
var swiper = new Swiper('.hs-products-imgs-container', {
	slidesPerView: 1,
	spaceBetween: 20,
	grabCursor: true,
	freeMode: true,
	preloadImages: false,
	lazy: true,
	watchSlidesProgress: true,
	speed: 1500,
	autoplay: {
		delay: 4000,
		disableOnInteraction: false
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev'
	},
	scrollbar: {
		el: '.swiper-scrollbar',
		hide: false
	},
	breakpoints: {
		401: {
			slidesPerView: 2,
			slidesPerGroup: 2
		},
		769: {
			slidesPerView: 3,
			slidesPerGroup: 2
		},
		1025: {
			slidesPerView: 3,
			slidesPerGroup: 2
		},
		1441: {
			slidesPerView: 4,
			slidesPerGroup: 2
		}
	}
});
