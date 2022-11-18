// add to cart popup carasoul
var swiper = new Swiper('.might-like-items-container', {
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

let gridBtn = document.querySelector('.grid-active'),
	colBtn = document.querySelector('.col-active'),
	listing = document.querySelector('.product-listing-wrapper');

colBtn.addEventListener('click', () => {
	if (listing.classList.contains('grid')) {
		listing.classList.remove('grid');
		gridBtn.classList.remove('show-grid-col')
		gridBtn.classList.remove('white-svg')
		// gridBtn.classList.add('gray-svg')
		colBtn.classList.add('show-grid-col')
		colBtn.classList.add('white-svg')
		listing.classList.add('flex');
		listing.querySelectorAll('.product-listing').forEach((list) => {
			list.classList.remove('bg-white');
			list.classList.remove('card');
			list.classList.remove('w-auto');
			list.classList.add('w-full');
			list.classList.remove('border');
			list.classList.add('border-b');
			list.querySelector('.product-listing-icons-container').classList.add('hidden');
			list.querySelector('.product-listing-img-container').classList.remove('justify-center');
			list.querySelector('.span-wrapper').classList.add('hidden');
			list.querySelector('.product-listing-img-wrapper').classList.remove('m-4');
			list.querySelector('.product-listing-img-wrapper').classList.add('border');
			list.querySelector('.product-listing-description').classList.remove('hidden');
			list.querySelector('.seller-rating-wrapper-grid').classList.add('hidden');
			list.querySelector('.seller-rating-wrapper-flex').classList.remove('hidden');
			list.querySelector('.product-listing-button-sec').classList.remove('hidden');
		});
	}
});

gridBtn.addEventListener('click', () => {
	if (listing.classList.contains('flex')) {
		gridBtn.classList.add('show-grid-col')
		gridBtn.classList.add('white-svg')
		colBtn.classList.remove('show-grid-col')
		colBtn.classList.remove('white-svg')
		// colBtn.classList.add('gray-svg')
		listing.classList.remove('flex');
		listing.classList.add('grid');
		listing.querySelectorAll('.product-listing').forEach((list) => {
			list.classList.add('card');
			list.classList.remove('w-full');
			list.classList.add('w-auto');
			list.classList.add('border');
			list.classList.add('bg-white');
			list.querySelector('.product-listing-icons-container').classList.remove('hidden');
			list.querySelector('.product-listing-img-container').classList.add('justify-center');
			list.querySelector('.span-wrapper').classList.remove('hidden');
			list.querySelector('.product-listing-img-wrapper').classList.add('m-4');
			list.querySelector('.product-listing-img-wrapper').classList.remove('border');
			list.querySelector('.product-listing-description').classList.add('hidden');
			list.querySelector('.seller-rating-wrapper-grid').classList.remove('hidden');
			list.querySelector('.seller-rating-wrapper-flex').classList.add('hidden');
			list.querySelector('.product-listing-button-sec').classList.add('hidden');
		});
	}
});
