const swiper = new Swiper('.home-hero .swiper', {
	direction: 'horizontal',
	loop: true,
	slidesPerView: 1,
	speed: 1500,
	preloadImages: false,

	autoplay: {
		delay: 3000,
		disableOnInteraction: true
	},

	navigation: {
		nextEl: '.hm-swiper-button-next',
		prevEl: '.hm-swiper-button-prev'
	}
});

// lazyloading slider imgs
window.addEventListener('load', () => {
	let lazyImgs = document.querySelectorAll('.lazy-slider-img');
	lazyImgs.forEach((img) => {
		let initialSrc = img.getAttribute('data-src'),
			initialSrcset = img.getAttribute('data-srcset');

		setTimeout(() => {
			img.src = initialSrc;
			img.srcset = initialSrcset;
		}, 1500);
	});
});

window.addEventListener('load', () => {
	let productGalleryImgs = document.querySelectorAll('.popup-product-container img');

	productGalleryImgs.forEach((img) => {
		let initialSrc = img.getAttribute('data-src');

		setTimeout(() => {
			img.src = initialSrc;
		}, 1000);
	});
});

// product and enlarged img gallary replacing img src on click
// let variationPopupModalMainImg = document.querySelector('.popup-main-img'),
// 	variationModalGalleryImgs = document.querySelectorAll('.product-img-gallary-wrapper img');
// variationModalGalleryImgs.forEach((e) => {
// 	var t = e.getAttribute('data-src');
// 	e.addEventListener('click', () => {
// 		variationPopupModalMainImg.src = t;
// 	});
// });

// popup modal for quick view for products eye icon click

// let quickViewBtn = document.querySelectorAll('.carasoul-eye-icon'),
// 	popupContainer = document.querySelector('.popup-product-container'),
// 	popupWrapper = document.querySelector('.popup-product-outer-wrapper'),
// 	popupCloseBtn = document.querySelectorAll('.popup-product-container, .popup-close-btn, .popup-close-btn path');

// quickViewBtn.forEach((btn) => {
// 	btn.addEventListener('click', () => {
// 		popupContainer.classList.remove('hidden');
// 		setTimeout(() => {
// 			popupContainer.classList.remove('opacity-0');
// 			popupWrapper.classList.add('popup-scale-1');
// 			popupWrapper.classList.remove('opacity-0');
// 			document.body.classList.add('body-height');
// 		}, 100);
// 	});
// });

// window.addEventListener('click', (e) => {
// 	popupCloseBtn.forEach((btn) => {
// 		if (e.target === btn) {
// 			popupWrapper.classList.remove('popup-scale-1');
// 			popupWrapper.classList.add('opacity-0');

// 			setTimeout(() => {
// 				popupContainer.classList.add('opacity-0');
// 				document.body.classList.remove('body-height');
// 				popupContainer.classList.add('hidden');
// 			}, 300);
// 		}
// 	});
// });

// add to cart button opens added to cart pop up

// let addCartBtn = document.querySelectorAll('.popup-cart-btn, .carasoul-cart-icon'),
// 	addCartPopupContainer = document.querySelector('.add-to-cart-pop-container'),
// 	addCartPopupWrapper = document.querySelector('.add-to-cart-pop-wrapper'),
// 	removeAddCartPopup = document.querySelectorAll('.add-to-cart-pop-container, .continue-shopping-btn, .close-cart-popup, .close-cart-popup path');

// addCartBtn.forEach((btn) => {
// 	btn.addEventListener('click', () => {
// 		addCartPopupContainer.classList.remove('hidden');
// 		document.body.classList.add('body-height');
// 		setTimeout(() => {
// 			addCartPopupContainer.classList.remove('opacity-0');
// 			addCartPopupWrapper.classList.remove('opacity-0');
// 			addCartPopupWrapper.classList.add('enlarged-img-wrapper-scale');
// 		}, 100);
// 	});
// });

// window.addEventListener('click', (e) => {
// 	removeAddCartPopup.forEach((btn) => {
// 		if (e.target === btn) {
// 			addCartPopupWrapper.classList.add('opacity-0');
// 			addCartPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
// 			setTimeout(() => {
// 				addCartPopupContainer.classList.add('opacity-0');
// 				addCartPopupContainer.classList.add('hidden');
// 				document.body.classList.remove('body-height');
// 			}, 300);
// 		}
// 	});
// });

// add to cart popup carasoul
var swiper2 = new Swiper('.might-like-items-container', {
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
		el: '.swiper-scrollbar-1',
		hide: false
	},
	breakpoints: {
		641: {
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
