// vendor card quantity add or less
let vendorQuantityWrapper = document.querySelectorAll('.vendor-wishlist-item');

vendorQuantityWrapper.forEach((wrapper) => {
	let vendorItemquantity = wrapper.querySelectorAll('.vendor-item-quantity'),
		vendorQtyAddBtn = wrapper.querySelectorAll('.vendor-item-quantity-add'),
		vendorQtyMinusBtn = wrapper.querySelectorAll('.vendor-item-quantity-less');

	vendorQtyAddBtn.forEach((btn) => {
		btn.addEventListener('click', () => {
			vendorItemquantity.forEach((val) => {
				val.value++;
			});
		});
	});
	vendorQtyMinusBtn.forEach((btn) => {
		btn.addEventListener('click', () => {
			vendorItemquantity.forEach((val) => {
				val.value--;
				if (val.value < 1) {
					val.value = 1;
				}
			});
		});
	});
});

// window.addEventListener('click', (e) => {
// 	removeWishlistPopup.forEach((btn) => {
// 		if (e.target === btn) {
// 			removeWishlistPopupWrapper.classList.add('opacity-0');
// 			removeWishlistPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
// 			setTimeout(() => {
// 				removeWishlistPopupContainer.classList.add('opacity-0');
// 				removeWishlistPopupContainer.classList.add('hidden');
// 				document.body.classList.remove('body-height');
// 			}, 4000);
// 		}
// 	});
// });

// add to cart button opens added to cart pop up
// let addCartBtn = document.querySelectorAll('.add-cart-btn'),
// 	addCartPopupContainer = document.querySelector('.add-to-cart-pop-container'),
// 	addCartPopupWrapper = document.querySelector('.add-to-cart-pop-wrapper'),
// 	removeAddCartPopup = document.querySelectorAll('.add-to-cart-pop-container, .continue-shopping-btn, .close-cart-popup');

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
// var swiper2 = new Swiper('.might-like-items-container', {
// 	slidesPerView: 1,
// 	spaceBetween: 20,
// 	grabCursor: true,
// 	freeMode: true,
// 	preloadImages: false,
// 	lazy: true,
// 	watchSlidesProgress: true,
// 	speed: 1500,
// 	autoplay: {
// 		delay: 4000,
// 		disableOnInteraction: false
// 	},
// 	navigation: {
// 		nextEl: '.swiper-button-next',
// 		prevEl: '.swiper-button-prev'
// 	},
// 	scrollbar: {
// 		el: '.swiper-scrollbar-1',
// 		hide: false
// 	},
// 	breakpoints: {
// 		641: {
// 			slidesPerView: 2,
// 			slidesPerGroup: 2
// 		},
// 		769: {
// 			slidesPerView: 3,
// 			slidesPerGroup: 2
// 		},
// 		1025: {
// 			slidesPerView: 3,
// 			slidesPerGroup: 2
// 		},
// 		1441: {
// 			slidesPerView: 4,
// 			slidesPerGroup: 2
// 		}
// 	}
// });

var swiper = new Swiper('.mySwiper', {
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
