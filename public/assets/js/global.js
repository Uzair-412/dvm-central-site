let shopByBtn = document.querySelector('.shop-by-container'),
	headerLogo = document.querySelector('.first-logo');
window.addEventListener('scroll', () => {
	if (window.matchMedia('(min-width:1280px').matches) {
		if (window.scrollY > 0) {
			shopByBtn.classList.add('show-shopby');
			headerLogo.classList.add('hide-logo');
		} else {
			headerLogo.classList.remove('hide-logo');
			shopByBtn.classList.remove('show-shopby');
		}
	}
});

// shop by department
let accordionOpener = document.querySelectorAll('.accordion-wrapper');
let linksHider = document.querySelectorAll('.links-hider');
let openIcons = document.querySelectorAll('.accordion-opener .open-icon');

accordionOpener.forEach((acc, index) => {
	// looping through
	acc.querySelector('.accordion-opener').addEventListener('click', () => {
		const thisText = linksHider[index];
		const thisOpenIcon = openIcons[index];

		//looping through text parent div & checking if other accordion is opened
		linksHider.forEach((hider) => {
			if (hider != thisText && hider.classList.contains('acc-opened')) {
				openIcons.forEach((icon) => {
					if (icon != thisOpenIcon && icon.classList.contains('icon-rotated')) {
						icon.classList.remove('icon-rotated');
						icon.style.transform = 'rotate(0deg)';
					}
				});

				hider.classList.remove('acc-opened');
				hider.style.maxHeight = 0;
			}
		});

		if (thisText.classList.contains('acc-opened')) {
			thisText.classList.remove('acc-opened');

			if (thisOpenIcon.classList.contains('icon-rotated')) {
				thisOpenIcon.style.transform = 'rotate(0deg)';
			}

			thisText.style.maxHeight = 0;
		} else {
			thisText.classList.add('acc-opened');

			thisOpenIcon.classList.add('icon-rotated');

			thisOpenIcon.style.transform = 'rotate(180deg)';

			thisText.style.maxHeight = thisText.scrollHeight + 'px';
		}
	});
});

let navBD = document.querySelector('.nav-backdrop'),
	nav = document.querySelector('.nav-backdrop nav'),
	leftNavClsBtn = document.querySelectorAll('.left-nav-close-icon, .left-nav-close-icon path, .nav-backdrop'),
	shopBtn = document.querySelectorAll('.shop-by-wrapper, .nav-category-icon-wrapper');

shopBtn.forEach((btn) => {
	btn.addEventListener('click', () => {
		navBD.classList.add('show-nav-bd');
		document.body.classList.add('body-height');
		setTimeout(() => {
			nav.classList.add('show-nav');
		}, 100);
	});
});

window.addEventListener('click', (e) => {
	leftNavClsBtn.forEach((left_nav_close_target) => {
		if (e.target === left_nav_close_target) {
			nav.classList.remove('show-nav');
			setTimeout(() => {
				navBD.classList.remove('show-nav-bd');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});

let subMenuWrapper = document.querySelectorAll('.sub-menu-wrapper');

subMenuWrapper.forEach((subMenu) => {
	subMenu.querySelector('.nav-sub-heading').addEventListener('click', () => {
		nav.scrollTo(0, 0);
		subMenu.querySelector('.sub-links-hider').classList.add('show-sub-links');
		nav.classList.add('remove-scroll');
		nav.classList.add('body-height');
	});
	subMenu.querySelector('.back-to-menu').addEventListener('click', () => {
		subMenu.querySelector('.sub-links-hider').classList.remove('show-sub-links');
		nav.classList.remove('remove-scroll');
		nav.classList.remove('body-height');
	});
});

// mob search container
let pageNavigationContainer = document.querySelector('.page-navigation-container'),
	pageNavigationWrapper = document.querySelector('.page-navigation-wrapper'),
	pageNavigationClsBtn = document.querySelectorAll('.page-navigation-close-btn, .page-navigation-container'),
	pageNavigationOpenBtn = document.querySelectorAll('.page-navigation-icon-wrapper');

pageNavigationOpenBtn.forEach((btn) => {
	btn.addEventListener('click', () => {
		pageNavigationContainer.classList.remove('hidden');
		pageNavigationContainer.classList.remove('opacity-0');
		document.body.classList.add('body-height');
		setTimeout(() => {
			pageNavigationWrapper.classList.add('show-nav');
		}, 100);
	});
});

window.addEventListener('click', (e) => {
	pageNavigationClsBtn.forEach((btn) => {
		if (e.target === btn) {
			pageNavigationWrapper.classList.remove('show-nav');
			setTimeout(() => {
				pageNavigationContainer.classList.add('opacity-0');
				pageNavigationContainer.classList.add('hidden');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});

// desktop search bar and search results
let searchContainer = document.querySelectorAll('.input-container');

window.addEventListener('click', (e) => {
	searchContainer.forEach((cont) => {
		if (e.target === cont.querySelector('input')) {
			document.body.classList.add('body-height');
			if (cont.querySelector('.header-input-bg')) {
				cont.querySelector('.header-input-bg').classList.remove('hidden');
				setTimeout(() => {
					cont.querySelector('.header-input-bg').classList.remove('opacity-0');
				}, 100);
			}
		}
		if (e.target === cont.querySelector('.header-input-bg')) {
			if (cont.querySelector('.header-input-bg')) {
				cont.querySelector('.header-input-bg').classList.add('opacity-0');
			}
			cont.querySelector('.search-results-container').classList.add('opacity-0');
			setTimeout(() => {
				cont.querySelector('.search-results-container').classList.add('hidden');
				if (cont.querySelector('.header-input-bg')) {
					cont.querySelector('.header-input-bg').classList.add('hidden');
				}
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});

// mob search container
let mobSearchContainer = document.querySelector('.mob-search-container'),
	mobSearchWrapper = document.querySelector('.mob-search-wrapper'),
	mobSearchClsBtn = document.querySelectorAll('.mob-search-close-btn, .mob-search-close-btn path, .mob-search-container'),
	mobSearchOpenBtn = document.querySelectorAll('.nav-search-icon-wrapper');

mobSearchOpenBtn.forEach((btn) => {
	btn.addEventListener('click', () => {
		mobSearchContainer.classList.remove('hidden');
		mobSearchContainer.classList.remove('opacity-0');
		document.body.classList.add('body-height');
		setTimeout(() => {
			mobSearchWrapper.classList.add('show-nav');
		}, 100);
	});
});

window.addEventListener('click', (e) => {
	mobSearchClsBtn.forEach((btn) => {
		if (e.target === btn) {
			mobSearchWrapper.classList.remove('show-nav');
			mobSearchContainer.querySelector('.search-results-container').classList.add('opacity-0');
			setTimeout(() => {
				mobSearchContainer.querySelector('.search-results-container').classList.add('hidden');
				mobSearchContainer.classList.add('opacity-0');
				mobSearchContainer.classList.add('hidden');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});

// page loader
let pageContent = document.body;

window.addEventListener('load', () => {
	pageContent.style.visibility = 'visible';

	let footerImgs = document.querySelectorAll('footer img');
	setTimeout(() => {
		footerImgs.forEach((e) => {
			let t = e.getAttribute('data-src');
			e.src = t;
		});
	}, 1000);
});

// popup modal for quick view for products eye icon click
let quickViewBtn = document.querySelectorAll('.carasoul-eye-icon'),
	popupContainer = document.querySelector('.popup-product-container'),
	popupWrapper = document.querySelector('.popup-product-outer-wrapper'),
	popupCloseBtn = document.querySelectorAll('.popup-product-container, .popup-close-btn, .popup-close-btn path');

window.addEventListener('click', (e) => {
	popupCloseBtn.forEach((btn) => {
		if (e.target === btn) {
			popupWrapper.classList.remove('popup-scale-1');
			popupWrapper.classList.add('opacity-0');

			setTimeout(() => {
				popupContainer.classList.add('opacity-0');
				document.body.classList.remove('body-height');
				popupContainer.classList.add('hidden');
			}, 300);
		}
	});
});

// add to cart button opens added to cart pop up
let addCartBtn = document.querySelectorAll('.popup-cart-btn, .carasoul-cart-icon'),
	addCartPopupContainer = document.querySelector('.add-to-cart-pop-container'),
	addCartPopupWrapper = document.querySelector('.add-to-cart-pop-wrapper'),
	removeAddCartPopup = document.querySelectorAll('.continue-shopping-btn, .close-cart-popup, .close-cart-popup path');

window.addEventListener('click', (e) => {
	removeAddCartPopup.forEach((btn) => {
		if (e.target === btn) {
			addCartPopupWrapper.classList.add('opacity-0');
			addCartPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
			setTimeout(() => {
				addCartPopupContainer.classList.add('opacity-0');
				addCartPopupContainer.classList.add('hidden');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});

// Calculate shipping cost
let shippingCostContainer = document.querySelector('.shipping-cost-detail-wrapper'),
	shippingCostWrapper = document.querySelector('.shipping-cost-form'),
	shippingCalculaterOpen = document.querySelectorAll('.shipping-cost-calculater'),
	shippingCalculaterClose = document.querySelectorAll('.shipping-cost-detail-wrapper, .shipping-cost-detail-wrapper .close-btn, .cancel-btn');
shippingCalculaterOpen.forEach((shippingCalculate) => {
	shippingCalculate.addEventListener('click', () => {
		shippingCostContainer.classList.remove('hidden');
		document.body.classList.add('body-height');
		setTimeout(() => {
			shippingCostContainer.classList.remove('opacity-0');
			shippingCostWrapper.classList.remove('opacity-0');
			shippingCostWrapper.classList.add('popup-scale-1');
		}, 100);
	});
});

shippingCostContainer.addEventListener('click', (e) => {
	shippingCalculaterClose.forEach((btn) => {
		if (e.target === btn) {
			shippingCostWrapper.classList.add('opacity-0');
			shippingCostWrapper.classList.remove('popup-scale-1');

			setTimeout(() => {
				shippingCostContainer.classList.add('hidden');
				shippingCostContainer.classList.add('opacity-0');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});
