// let shippingCostContainer = document.querySelector('.shipping-cost-detail-wrapper'),
// 	shippingCostWrapper = document.querySelector('.shipping-cost-form'),
// 	shippingCalculaterOpen = document.querySelector('.shipping-cost-calculater'),
// 	shippingCalculaterClose = document.querySelectorAll('.shipping-cost-detail-wrapper, .shipping-cost-detail-wrapper .close-btn, .cancel-btn');

// shippingCalculaterOpen.addEventListener('click', () => {
// 	shippingCostContainer.classList.remove('hidden');
// 	document.body.classList.add('body-height');
// 	setTimeout(() => {
// 		shippingCostContainer.classList.remove('opacity-0');
// 		shippingCostWrapper.classList.remove('opacity-0');
// 		shippingCostWrapper.classList.add('popup-scale-1');
// 	}, 100);
// });

// window.addEventListener('click', (e) => {
// 	shippingCalculaterClose.forEach((btn) => {
// 		if (e.target === btn) {
// 			shippingCostWrapper.classList.add('opacity-0');
// 			shippingCostWrapper.classList.remove('popup-scale-1');

// 			setTimeout(() => {
// 				shippingCostContainer.classList.add('hidden');
// 				shippingCostContainer.classList.add('opacity-0');
// 				document.body.classList.remove('body-height');
// 			}, 300);
// 		}
// 	});
// });

// // remove from cart popup
// let removeCartBtn = document.querySelectorAll('.vendor-item-delete-icon'),
// 	removeCartPopupContainer = document.querySelector('.remove-from-cart-pop-container'),
// 	removeCartPopupWrapper = document.querySelector('.remove-from-cart-pop-wrapper'),
// 	removeCartPopup = document.querySelectorAll('.remove-from-cart-pop-container, .cancel-btn');

// removeCartBtn.forEach((btn) => {
// 	btn.addEventListener('click', () => {
// 		removeCartPopupContainer.classList.remove('hidden');
// 		document.body.classList.add('body-height');
// 		setTimeout(() => {
// 			removeCartPopupContainer.classList.remove('opacity-0');
// 			removeCartPopupWrapper.classList.remove('opacity-0');
// 			removeCartPopupWrapper.classList.add('enlarged-img-wrapper-scale');
// 		}, 100);
// 	});
// });

// window.addEventListener('click', (e) => {
// 	removeCartPopup.forEach((btn) => {
// 		if (e.target === btn) {
// 			removeCartPopupWrapper.classList.add('opacity-0');
// 			removeCartPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
// 			setTimeout(() => {
// 				removeCartPopupContainer.classList.add('opacity-0');
// 				removeCartPopupContainer.classList.add('hidden');
// 				document.body.classList.remove('body-height');
// 			}, 300);
// 		}
// 	});
// });
let countrychange = document.querySelector('#country')?.addEventListener('change', (e) => {
	let state_id = e.target.getAttribute('state-id');
	$.ajax({
		method: 'GET',
		url: '/get-states',
		data: { country_id: country_id }
	}).done(function (obj) {
		let html = '';

		if (obj.status == '1') {
			html += `<select name="state" id="state" class="form-control"><option value="">Please select ...</option>`;
			obj.data.forEach(function (data) {
				let sel = '';
				if (state_id != null && state_id == data.id) {
					sel = 'selected="selected"';
				}
				html += `<option value="${data.id}" ${sel}>${data.name} </option>`;
			});
			html += '</select>';
		} else {
			let val = '';
			if (state_id != null) {
				val = state_id;
			}
			html = '<input class="form-control" placeholder="Enter state ..." name="state" type="text" id="state" value="' + val + '">';
		}

		$('#div_state').html(html);
	});
});
