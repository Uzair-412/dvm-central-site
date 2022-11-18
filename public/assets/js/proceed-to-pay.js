// remove from cart popup
let removeCartBtn = document.querySelectorAll('.vendor-item-delete-icon'),
	removeCartPopupContainer = document.querySelector('.remove-from-cart-pop-container'),
	removeCartPopupWrapper = document.querySelector('.remove-from-cart-pop-wrapper'),
	removeCartPopup = document.querySelectorAll('.remove-from-cart-pop-container, .cancel-btn');

removeCartBtn.forEach((btn) => {
	btn.addEventListener('click', () => {
		removeCartPopupContainer.classList.remove('hidden');
		document.body.classList.add('body-height');
		setTimeout(() => {
			removeCartPopupContainer.classList.remove('opacity-0');
			removeCartPopupWrapper.classList.remove('opacity-0');
			removeCartPopupWrapper.classList.add('enlarged-img-wrapper-scale');
		}, 100);
	});
});

window.addEventListener('click', (e) => {
	removeCartPopup.forEach((btn) => {
		if (e.target === btn) {
			removeCartPopupWrapper.classList.add('opacity-0');
			removeCartPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
			setTimeout(() => {
				removeCartPopupContainer.classList.add('opacity-0');
				removeCartPopupContainer.classList.add('hidden');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});

let cardInputWrapper = document.querySelector('.card-number-input-wrapper input');

cardInputWrapper.addEventListener('focus', (e) => {
	e.target.parentElement.style.borderColor = '#418ffe';
});

cardInputWrapper.addEventListener('focusout', (e) => {
	e.target.parentElement.style.borderColor = 'rgba(229,231,235,var(--tw-border-opacity))';
});
