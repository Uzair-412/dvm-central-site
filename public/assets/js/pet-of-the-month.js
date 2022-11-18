//pet of the month imgs thumbnails

var thumbnailsSwiper = new Swiper('.pet-month-thumbsSlider', {
	spaceBetween: 5,
	slidesPerView: 3,
	freeMode: true,
	watchSlidesProgress: true,
	breakpoints: {
		361: {
			slidesPerView: 4,
			slidesPerGroup: 4
		},
		641: {
			slidesPerView: 6,
			slidesPerGroup: 6
		},
		769: {
			slidesPerView: 5,
			slidesPerGroup: 5
		},
		1441: {
			slidesPerView: 6,
			slidesPerGroup: 2
		}
	}
});

// pet of the month imgs
var swiper = new Swiper('.pet-month-imgs-container', {
	slidesPerView: 1,
	spaceBetween: 30,
	grabCursor: true,
	preloadImages: false,
	lazy: true,
	watchSlidesProgress: true,
	speed: 1000,
	autoplay: {
		delay: 3000,
		disableOnInteraction: false
	},
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev'
	},
	thumbs: {
		swiper: thumbnailsSwiper
	}
});

// others pets of the month
var swiper = new Swiper('.other-pets-month-container', {
	slidesPerView: 1,
	spaceBetween: 30,
	grabCursor: true,
	freeMode: true,
	preloadImages: false,
	lazy: true,
	watchSlidesProgress: true,
	speed: 1000,
	autoplay: {
		delay: 3000,
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
			slidesPerView: 4,
			slidesPerGroup: 2
		},
		1441: {
			slidesPerView: 5,
			slidesPerGroup: 2
		}
	}
});

let lazyImg = document.querySelector('.lazy-img');

window.addEventListener('load', () => {
	let initialSrc = lazyImg.getAttribute('data-src');
	setTimeout(() => {
		lazyImg.src = initialSrc;
	}, 1000);
});
