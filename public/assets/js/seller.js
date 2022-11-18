// hot selling products carasoul
var swiper = new Swiper('.related-products-imgs-container', {
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

window.addEventListener('load', () => {
	setTimeout(() => {
		document.querySelectorAll('.popup-product-container img').forEach((img) => {
			let initialImgSrc = img.getAttribute('data-src');
			img.src = initialImgSrc;
		});
	}, 1000);
});

// toggeling of more links
let sellerMenuBtn = document.querySelector('.seller-menu-btn');

sellerMenuBtn.addEventListener('click', () => {
	showSellerHiddenLinks();
});

function showSellerHiddenLinks() {
	document.querySelector('.seller-hidden-menu').classList.toggle('hidden');
	setTimeout(() => {
		document.querySelector('.seller-hidden-menu').classList.toggle('scale-0');
	});
}

// appending seller links into more links
let sellerShownLinks = document.querySelectorAll('.seller-quick-links li'),
	sellerShownLinksWrapper = document.querySelector('.seller-quick-links'),
	firstLi = document.querySelector('.seller-quick-links li:first-child'),
	firstTwoLi = document.querySelectorAll('.seller-quick-links li:nth-child(-n + 2)'),
	firstFiveLis = sellerShownLinksWrapper.querySelectorAll('.seller-quick-links li:nth-child(-n + 5)'),
	firstSevenLis = sellerShownLinksWrapper.querySelectorAll('.seller-quick-links li:nth-child(-n + 7)'),
	firstTenLis = sellerShownLinksWrapper.querySelectorAll('.seller-quick-links li:nth-child(-n + 10)'),
	sellerHiddenMenu = document.querySelector('.seller-more-links-container ul'),
	sellerMenuBtnWrapper = document.querySelector('.seller-menu-btn-wrapper');

window.addEventListener('resize', () => showHideSellerLinks());

function showHideSellerLinks() {
	if (window.matchMedia('(max-width: 640px').matches) {
		if (sellerShownLinks.length > 2) {
			sellerMenuBtnWrapper.classList.remove('hidden');
			sellerShownLinks.forEach((li) => {
				li.classList.add('py-2', 'border-b', 'border-solid', 'border-gray-200', 'text-gray-500');
				sellerHiddenMenu.appendChild(li);
			});
			firstTwoLi.forEach((li) => {
				sellerShownLinksWrapper.appendChild(li);
				li.classList.remove('py-2', 'border-b', 'border-solid', 'border-gray-200');
				firstLi.classList.add('font-semibold', 'primary-black-color');
			});
		} else {
			sellerMenuBtnWrapper.classList.add('hidden');
			showAllLis();
		}
	}

	if (window.matchMedia('(min-width:641px) and (max-width: 767px').matches) {
		if (sellerShownLinks.length > 5) {
			sellerMenuBtnWrapper.classList.remove('hidden');
			sellerShownLinks.forEach((li) => {
				li.classList.add('py-2', 'border-b', 'border-solid', 'border-gray-200', 'text-gray-500');
				sellerHiddenMenu.appendChild(li);
			});
			firstFiveLis.forEach((li) => {
				sellerShownLinksWrapper.appendChild(li);
				li.classList.remove('py-2', 'border-b', 'border-solid', 'border-gray-200');
				firstLi.classList.add('font-semibold', 'primary-black-color');
			});
		} else {
			sellerMenuBtnWrapper.classList.add('hidden');
			showAllLis();
		}
	}

	if (window.matchMedia('(min-width:768px) and (max-width: 1440px').matches) {
		if (sellerShownLinks.length > 7) {
			sellerMenuBtnWrapper.classList.remove('hidden');
			sellerShownLinks.forEach((li) => {
				li.classList.add('py-2', 'border-b', 'border-solid', 'border-gray-200', 'text-gray-500');
				sellerHiddenMenu.appendChild(li);
			});

			firstSevenLis.forEach((li) => {
				sellerShownLinksWrapper.appendChild(li);
				li.classList.remove('py-2', 'border-b', 'border-solid', 'border-gray-200');
				firstLi.classList.add('font-semibold', 'primary-black-color');
			});
		} else {
			sellerMenuBtnWrapper.classList.add('hidden');
			showAllLis();
		}
	}

	if (window.matchMedia('(min-width: 1441px').matches) {
		if (sellerShownLinks.length > 10) {
			sellerMenuBtnWrapper.classList.remove('hidden');
			sellerShownLinks.forEach((li) => {
				li.classList.add('py-2', 'border-b', 'border-solid', 'border-gray-200', 'text-gray-500');
				sellerHiddenMenu.appendChild(li);
			});

			firstTenLis.forEach((li) => {
				sellerShownLinksWrapper.appendChild(li);
				li.classList.remove('py-2', 'border-b', 'border-solid', 'border-gray-200');
				firstLi.classList.add('font-semibold', 'primary-black-color');
			});
		} else {
			sellerMenuBtnWrapper.classList.add('hidden');
			showAllLis();
		}
	}
}

function showAllLis() {
	sellerShownLinks.forEach((li) => {
		sellerShownLinksWrapper.appendChild(li);
		li.classList.remove('py-2', 'border-b', 'border-solid', 'border-gray-200');
		firstLi.classList.add('font-semibold', 'primary-black-color');
	});
}

window.addEventListener('load', () => showHideSellerLinks());

let followForm = document.querySelector('#follow-form').addEventListener('submit', (e) => {
	e.preventDefault();
	$.ajax({
		url: e.target.getAttribute('action'),
		method: 'POST',
		data: {},
		headers: {
			'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
		},
		success: function (response) {
			if (response.success_message) {
				showAlert(response.success_message, {
					text: '',
					link: '',
					type: 'success'
				});
				e.target.querySelector('button.follow').innerText = 'Unfollow';
			} else if (response.error_message) {
				showAlert(response.error_message, {
					text: 'Login',
					link: '/login',
					type: 'error'
				});
			} else if (response.warning_message) {
				showAlert(response.warning_message, {
					text: '',
					link: '',
					type: 'error'
				});
				e.target.querySelector('button.follow').innerText = 'Follow';
			}
		}
	});
});

document.querySelector('.chat-close-icon')?.addEventListener('click', (e) => {
	document.querySelector('#chat-box-container').classList.toggle('hidden');
});

document.querySelectorAll('#chat-icon, .chat-btn').forEach((btn) => {
	btn.addEventListener('click', (e) => { 
		document.querySelector('#chat-box-container')?.classList.toggle('hidden');
	});
});
