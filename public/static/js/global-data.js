$(document).ready(function () {
	if (window.localStorage !== undefined) {
		var fields = JSON.parse(window.localStorage.getItem('viewed_products'));
		let pageName = $('#pageTitle').val();
		if (fields && pageName == 'Home Page') {
			setTimeout(() => {
				$.ajax({
					type: 'POST',
					url: '/viewed_products',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: { data: fields },
					success: function (response) {
						var tr_str = ``;
						var csrf_token = response['csrf_token'];
						var url = response['url'];
						for (var i = 0; response['data'].length - 1 >= 6 ? i <= 6 : i <= response['data'].length - 1; i++) {
							var id = response['data'][i].id;
							var name = response['data'][i].name;
							var slug = response['data'][i].slug;
							var img_url = `up_data/products/images/thumbnails/${response['data'][i].image}`;
							var featured = response['data'][i].featured;
							var hot = response['data'][i].hot;
							var newly = response['data'][i].new;
							var deals_of_the_day = response['data'][i].deals_of_the_day;
							var type = response['data'][i].type;
							var caption = '';
							if (featured == 'Y') {
								caption = 'Featured!';
							} else if (hot == 'Y') {
								caption = 'Hot!';
							} else if (newly == 'Y') {
								caption = 'New!';
							} else if (deals_of_the_day == 'Y') {
								caption = 'Deals Of The Day!';
							}
							if (caption != '') {
								caption = caption ? `<div class="ps-product__badge"><span class="onsale-badge">${caption}</span></div>` : '';
							}
							var active = '';
							if (i < 7) {
								active = 'active';
							}
							if (type != 'variation') {
								var btn_link = `<div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
									<form class="frm_add_to_cart" method="post" action="cart" style="display:contents;">
									<input type="hidden" name="_token" value="${csrf_token}" />
									<input type="hidden" name="product_id" class="product_id" value="${id}" />
									<input type="hidden" name="cmd" id="cmd" value="add2cart" />
									
									
										<button type="submit" style="display: contents;">
											<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
												<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
											</svg>
											<div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
										</button>
									</form>
								</div>`;
							} else {
								var btn_link = `<div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
									<a href="${slug}">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-cart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
										</svg>
										<div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Cart</div>
									</a>
								</div>`;
							}
							tr_str += `<div class="order-you-like flex flex-col justify-center items-center relative text-center border border-solid border-gray-200 overflow-hidden card bg-white">
								<span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
								<span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
								<span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
								<span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
								<a href="${slug}" class="order-you-like-img-wrapper overflow-hidden inline-block">
										<div class="sale-notify absolute top-0 left-0 text-xs bg-red-500 w-max text-white px-2 py-1">Featured!</div>
										<img class="lazyload order-you-like-img" data-src="${img_url}" alt="${name}" />
								</a>
								<div class="order-you-like-icons-container carasoul-icon-container h-full text-white z-10 absolute right-0 bottom-0 p-3 text-sm w-max flex flex-col justify-around">
										${btn_link}
									<div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
										<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="productQuickViews(${id})">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
										</svg>
										<div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Quick View</div>
									</div>

									<div class="carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer">
										<form class="frm_add_to_wishlist" method="post" action="${url}">
											<input type="hidden" name="_token" value="${csrf_token}" />
											<input type="hidden" name="product_id" class="product_id" value="${id}" />
												<button type="submit" style="display: contents;">
													<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 carasoul-heart-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
															<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
													</svg>
												</button>
												<div class="tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1">Add To Whishlist</div>
										</form>
									</div>
								</div>
							</div>`;
							//  <form method='post' action='comparison-search'>
							// 		<input type='hidden' name='_token' value='${csrf_token}' />
							// 		<input type='hidden' name='name' value='${name}' />

							// 		<div class='carasoul-icon-wrapper relative lite-blue-bg-color hover:bg-black transition-all duration-300 ease-linear rounded-full p-2 cursor-pointer'>
							// 			<svg xmlns='http://www.w3.org/2000/svg' class='h-6 w-6 carasoul-compare-icon' fill='none' viewBox='0 0 24 24' stroke='currentColor'>
							// 				<path
							// 					stroke-linecap='round'
							// 					stroke-linejoin='round'
							// 					stroke-width='2'
							// 					d='M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
							// 				/>
							// 			</svg>
							// 			<div class='tooltip absolute text-xs lite-blue-bg-color text-white w-max p-1'>Compare</div>
							// 		</div>
							// 	</form>;
						}
						if (pageName == 'Home Page') {
							$('#viewed_products').append(tr_str);
						} else {
							$('#viewed_products_list').append(tr_str);
						}
						recallableProductsEvents();
					},
					error: function (exception) {
						console.log(exception);
					}
				});
			}, 500);
		}
	} else {
		console.log('Storage Failed. Try refreshing');
	}

	$('#review_form').on('submit', function (e) {
		e.preventDefault();
		if ($('#comments').val() == '') {
			alert('Please enter your comments.');
			$('#comments').focus();
			return false;
		}
		// console.log(a);
		if ($('#name').val() == '') {
			alert('Please enter your name.');
			$('#name').focus();
			return false;
		}

		if ($('#email').val() == '') {
			alert('Please enter your email.');
			$('#email').focus();
			return false;
		}

		var frm_data = $('#review_form').serialize();
		$.ajax({
			method: 'POST',
			url: '/save-review',
			data: frm_data
		}).done(function (msg) {
			if (msg.status == '1') {
				$('#message').removeClass('hidden');
				$('#review_form')[0].reset();
				$('#review_message').removeClass('d-none', function () {});
				$('#review_message').addClass('d-block', function () {});
			}
		});
	});

	recallableProductsEvents();

	// Close alert popup
	let alertVars = document.querySelectorAll('.alert-pop-container, .alert-pop-wrapper .close-alert-popup, .alert-pop-wrapper .close-alert-popup path, .alert-pop-wrapper .alert-continue-shopping-btn');
	let closeContainer = document.querySelector('.alert-pop-container');

	closeContainer.addEventListener('click', (e) => {
		alertVars.forEach((alertVar) => {
			if (e.target === alertVar) {
				hideAlert();
				return false;
			}
		});
	});
});

// Wishlist and Add to cart events
function recallableProductsEvents() {
	$('.frm_add_to_cart').on('submit', function (e) {
		e.preventDefault();
		try {
			var frm_data = $(this).serializeArray();
			$.ajax({
				method: 'POST',
				url: '/cart',
				data: frm_data,
			}).done(async function (msg) {
				if (msg.status == '1') {
					if ($('#cmd').val() == 'buynow')
					{
						location.href = '/cart';
					}
					else if ($('#cmd').val() == 'add2cart')
					{
						if (msg.same_products.length > 0) {
							document.querySelector('#items-you-might-like-in-popup').classList.remove('hidden');
							document.querySelector('.might-like-items-container').classList.remove('hidden');
							document.querySelector('.might-like-items-container').nextElementSibling.classList.remove('hidden');
							let html_product = '';
							for (let i = 0; i <= 5; i++) {
								if (msg.same_products[i] != undefined) {
									html_product += `<div class="might-like-item swiper-slide flex flex-col justify-center relative border border-solid border-gray-200 overflow-hidden card bg-white"
									id="item_0">
									<span
										class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
									<span
										class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
									<span
										class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
									<span
										class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>
	
									<div class="might-like-item-img-container relative overflow-hidden flex justify-center xl:w-full">
										<a href="${msg.same_products[i].url}" class="might-like-item-img-wrapper overflow-hidden flex justify-center p-2 w-full">
											<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
											<img class="might-like-item-img swiper-lazy" src="${msg.same_products[i].path}" data-src="${msg.same_products[i].path}" alt="Product" />
										</a>
									</div>
									<a href="${msg.same_products[i].vendor.slug}"
										class="sold-by mx-2 py-2 border-b border-solid border-gray-200">${msg.same_products[i].vendor.name}</a>
									<a href="{{$url}}" class="p-2">
										<div class="might-like-item-title lite-blue-color leading-snug">${msg.same_products[i].name}</div>
									</a>
								</div>`;
								}
							}
							$('.might-like-items-container .might-like-items-wrapper').html(html_product);
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
						} else {
							document.querySelector('#items-you-might-like-in-popup').classList.add('hidden');
							document.querySelector('.might-like-items-container').classList.add('hidden');
							document.querySelector('.might-like-items-container').nextElementSibling.classList.add('hidden');
						}

						let addCartPopupContainer = document.querySelector('.add-to-cart-pop-container'),
							addCartPopupWrapper = document.querySelector('.add-to-cart-pop-wrapper');
						addCartPopupContainer.classList.remove('hidden');
						document.body.classList.add('body-height');
						setTimeout(() => {
							addCartPopupContainer.classList.remove('opacity-0');
							addCartPopupWrapper.classList.remove('opacity-0');
							addCartPopupWrapper.classList.add('enlarged-img-wrapper-scale');
						}, 100);
						Livewire.emit('updateMiniCart');
					}
				}
				else if(msg.status==2)
				{
					if(document.querySelector('#qty-exceed-error'))
					{
						document.querySelector('#qty-exceed-error').innerHTML = '';
						document.querySelector('#qty-exceed-error').innerHTML = msg.message;
						document.querySelector('#qty-exceed-error').classList.remove('hidden');
					}
					else
					{
						showAlert(msg.message, {
							text: '',
							link: '',
							type: 'error',
							isContinueShoping: false
						});
					}
				}
				else
				{
					showAlert(msg.message, {
						text: 'Login',
						link: '/login',
						type: 'error',
						isContinueShoping: false
					});
				}
			});
		} catch (error) {
			console.log('error', error);
		}

		return false;
	});

	$('.frm_add_to_wishlist').on('submit', function (e) {
		e.preventDefault();
		var frm_data = $(this).serialize();
		$.ajax({
			method: 'POST',
			url: '/dashboard/wishlist/store',
			data: frm_data,
			error: function (err) {
				showAlert('Please login to add this item in wishlist', {
					text: 'Login',
					link: '/login',
					type: 'error'
				});
			}
		}).done(function (msg) {
			if (msg.status == 1) {
				$('#heart').remove();
				tr_star = `<i id="heart">${msg.total}</i>`;
				$('#wishlist').append(tr_star);

				showAlert('Product added in wishlist', {
					text: 'View Wishlist',
					link: '/dashboard/wishlist'
				});
				Livewire.emit('loadCart');
				Livewire.emit('updateCartCounts');
			}else if(msg.status == 2) {
				$('#heart').remove();
				tr_star = `<i id="heart">${msg.total}</i>`;
				$('#wishlist').append(tr_star);

				showAlert('Product is Already Added on Wishlist', {
					text: 'View Wishlist',
					link: '/dashboard/wishlist'
				});
				Livewire.emit('loadCart');
				Livewire.emit('updateCartCounts');
			}
			 if(msg.status==0){
				showAlert(msg.message, {
					text: '',
					link: '',
					type: 'error'
				});
			}
		});
	});
}

function productQuickViews(id, session_num) {
	if (id) {
		try {
			$.ajax({
				type: 'POST',
				url: '/modal_products',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: { data: id },
				success: function (response) {
					var id = response['data'].id;
					var name = response['data'].name;
					var slug = response['data'].slug;
					var price = response['data'].price;
					var price_catalog = response['data'].price_catalog;
					var price_discounted = response['data'].price_discounted;
					var short_description = response['data'].short_description;
					var price_discounted_end = response['data'].price_discounted_end;
					var sku = response['data'].sku;
					var type = response['data'].type;
					var csrf_token = response['csrf_token'];
					var person_name = response['data'].vendor.name;
					var person_slug = response['data'].vendor.slug;
					var today = new Date();
					var dd = String(today.getDate()).padStart(2, '0');
					var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
					var yyyy = today.getFullYear();

					today = yyyy + '-' + mm + '-' + dd;
					let discount = '';
					let del_price = '';
					if (price_discounted_end >= today) {
						price = response['data'].price;
					} else {
						if (price_discounted != 0 || price_discounted != '') {
							percent_price = Math.round(((price_discounted - price_catalog) / price_catalog) * 100);
							percent_price = percent_price.toFixed(2);
							// price = `${price} <del>$${price_catalog}</del> <small>(${percent_price}%)</small>`;
							del_price = price_catalog;
							discount = percent_price;
						} else {
							rice = response['data'].price;
						}
					}
					if (type != 'variation') {
						var cart_link = `
                    <input type="hidden" name="_token" value="${csrf_token}"/>
                    <input type="hidden" name="ajax" value="0" />
                    <input type="hidden" name="product_id" class="product_id" value="${id}" />
                    <input type="hidden" name="cmd" id="cmd" value="add2cart" />
                    <div class="product-quantity-wrapper py-4 flex items-center border-b border-t border-solid border-gray-200">
                        <div class="mr-6">Quantity</div>
                        <button type="button" id="quantity-minus"
                            class="quantity quantity-minus py-2 px-3.5 lite-blue-bg-color text-white text-normal">-</button>
                        <input name="qty" id="qty" type="text" size="4"
                            class="border-gray-300 border-solid border text-center inline-block py-2" value="1" />
                        <button type="button" id="quantity-add"
                            class="quantity quantity-add py-2 px-3 lite-blue-bg-color text-white text-normal">+</button>
                    </div>
                    <div class="popup-product-btn-wrapper flex flex-col sm:flex-row mt-4">
                        <button type="submit" class="btn popup-cart-btn blue-btn relative overflow-hidden mb-2 sm:mr-4 lite-blue-bg-color text-white px-4 py-2 sm:py-3 z-10 w-max" onclick="this.form.cmd.value='add2cart';">Add To Cart</button>
                        <button type="submit" class="btn black-btn bg-black relative overflow-hidden text-white px-4 py-2 sm:py-3 z-10 w-max" onclick="this.form.cmd.value='buynow';"> Buy Now </button>
                    </div>
						  <input type="hidden" name="session_num" id="session_num" value="${session_num}" />
						  <div id="qty-exceed-error" class="text-red-500 font-semibold"></div>`;
					} else {
						var cart_link = `<a href="${slug}" class="underline-anchors relative overflow-hidden inline-block ml-1" aria-label="${name}">Click for Details</a>`;
					}

					$('#product_detail_model_imgs .popup-product').attr('src', 'up_data/products/images/medium/' + response['data'].images[0].name);
					$('#product_detail_model_imgs .popup-product').attr('alt', response['data'].name);

					let product_image_gallary = '';
					for (var i = 0; i < response['img_url'].length; i++) {
						product_image_gallary += `<img class="opacity-60 border border-solid border-gray-300 cursor-pointer popup-img" src="${response['img_url'][i]}" alt="${name}" />`;
					}
					$('#product_detail_model_imgs .product-img-gallary-wrapper').html(product_image_gallary);
					$('#product_detail_model_title').text(name);

					if (type != 'variation') {
						$('#product_detail_model_price').show();
						$('#product_detail_model_del').show();
						$('#product_detail_model_discount').show();

						$('#product_detail_model_price').text('$' + price);
						del_price != '' && del_price != null && $('#product_detail_model_del').text('$' + del_price);
						discount != '' && discount != null && $('#product_detail_model_discount').text('(' + discount + '%)');
					} else {
						$('#product_detail_model_price').hide();
						$('#product_detail_model_del').hide();
						$('#product_detail_model_discount').hide();
					}

					$('#sold_by_name').html(`<a href="/${person_slug}" rel="noopener" rel="noreferrer" class="sold-by">${person_name}</a>`);

					$('#sku_code').text(sku);
					$('#short_description').html(short_description);
					$('#product_form').html(cart_link);

					let popupContainer = document.querySelector('.popup-product-container'),
						popupWrapper = document.querySelector('.popup-product-outer-wrapper');
					popupContainer.classList.remove('hidden');
					setTimeout(() => {
						popupContainer.classList.remove('opacity-0');
						popupWrapper.classList.add('popup-scale-1');
						popupWrapper.classList.remove('opacity-0');
						document.body.classList.add('body-height');
					}, 100);

					// product and enlarged img gallary replacing img src on click
					let variationPopupModalMainImg = document.querySelector('.popup-main-img'),
						variationModalGalleryImgs = document.querySelectorAll('.product-img-gallary-wrapper img');
					variationModalGalleryImgs.forEach((e) => {
						var t = e.getAttribute('src');
						e.addEventListener('click', () => {
							variationPopupModalMainImg.src = t;
						});
					});

					let quantity = document.querySelector('#qty'),
						qtyAddBtn = document.querySelector('#quantity-add'),
						qtyMinusBtn = document.querySelector('#quantity-minus');
					qtyAddBtn?.addEventListener('click', () => {
						quantity.value++;
					});

					qtyMinusBtn?.addEventListener('click', () => {
						quantity.value--, quantity.value < 1 && (quantity.value = 1);
					});
				},
				error: function (exception) {
					console.log(exception);
				}
			});
		} catch (error) {
			console.log(error);
		}
	} else {
		console.log('Id is null');
	}
}

function showAlert(text = '', btnObject = { text: '', link: '', type: 'success', isContinueShoping:true }) {
	let alertPopupContainer = document.querySelector('.alert-pop-container'),
		alertPopupWrapper = document.querySelector('.alert-pop-wrapper');
	alertPopupContainer.classList.remove('hidden');
	document.body.classList.add('body-height');
	if (btnObject.text.trim() != '' && btnObject.link.trim() != '') {
		document.querySelector('.view-alert-btn').classList.remove('hidden');
	} else {
		document.querySelector('.view-alert-btn').classList.add('hidden');
	}
	if (btnObject.type == 'error') {
		document.querySelector('.alert-pop-container svg.error').classList.remove('hidden');
		document.querySelector('.alert-pop-container svg.success').classList.add('hidden');
	} else {
		document.querySelector('.alert-pop-container svg.error').classList.add('hidden');
		document.querySelector('.alert-pop-container svg.success').classList.remove('hidden');
	}
	if(btnObject.isContinueShoping)
	{
		document.querySelector('.alert-continue-shopping-btn').classList.remove('hidden');
	}
	else
	{
		document.querySelector('.alert-continue-shopping-btn').classList.add('hidden');
	}
	setTimeout(() => {
		alertPopupContainer.classList.remove('opacity-0');
		alertPopupWrapper.classList.remove('opacity-0');
		alertPopupWrapper.classList.add('enlarged-img-wrapper-scale');
		alertPopupWrapper.querySelector('.alert-popup-msg').innerHTML = text;

		if (btnObject.text.trim() != '' && btnObject.link.trim() != '') {
			document.querySelector('.view-alert-btn').innerHTML = btnObject.text;
			document.querySelector('.view-alert-btn').setAttribute('href', btnObject.link);
		}
	}, 100);
}

function setVariation(sid, is_hash) {
	is_hash = is_hash || false;
	if (is_hash) {
		sid = sid.replace('#', '').replace('%20', ' ').toUpperCase();
		$(function () {
			$('*[data-sku="' + sid + '"]').click();
			//$('*[data-sku="' + sid + '"]').attr('selected','selected');
		});
	} else {
		$('input:radio').each(function () {
			if ($(this).val() == sid) {
				$('.product-info').addClass('d-none');
				$('.sid-' + sid).removeClass('d-none');

				$('.btn-add-to-cart').removeClass('d-none');
				$('.btn-add-to-cart').data('product-id', $(this).val());

				$('.spimgs_' + sid)
					.first()
					.click();
			}
		});
	}
}

function hideAlert() {
	let alertPopupContainer = document.querySelector('.alert-pop-container'),
		alertPopupWrapper = document.querySelector('.alert-pop-wrapper');
	alertPopupWrapper.classList.add('opacity-0');
	alertPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
	setTimeout(() => {
		alertPopupContainer.classList.add('opacity-0');
		alertPopupContainer.classList.add('hidden');
		document.body.classList.remove('body-height');
	}, 300);
}
