function ajax_request() {
	var frm_data = $('form').serializeArray();

	$.ajax({
		method: 'POST',
		url: '/admin/slug-checker',
		data: frm_data
	}).done(function (obj) {
		if (obj.status == '1') {
			if (obj.cmd == 'slug') {
				$('#slug').val(obj.slug);
			}
		}
	});
}

jQuery(document).ready(function () {
	setTimeout(() => {
		let categroy = $('input[name=Category]').val();
		let search = $('input[name=Search]').val();
		let VendorSearch = $('input[name=VendorSearch]').val();
		let productSection = $('#productSection').val();

		let product_val = $('input[name=product_id]')
			.map(function () {
				return this.value;
			})
			.get();

		// console.log(product_val);
		let slug = '';
		if (categroy != undefined) {
			let geturl = categroy.split('/');
			let value1 = geturl[geturl.length - 1];
			let value2 = geturl[geturl.length - 2];
			slug = `${value2}/${value1}`;
		} else if (search != undefined) {
			slug = search;
		} else if (VendorSearch != undefined) {
			slug = VendorSearch;
		} else if (productSection != undefined) {
			slug = productSection;
		} else {
			let currentUrl = window.location.href;
			let geturl = currentUrl.split('/');
			slug = geturl[geturl.length - 1];
		}

		if (product_val.length != 0) {
			// $.ajax({
			// 	type: 'POST',
			// 	url: '/add-impression',
			// 	headers: {
			// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 	},
			// 	data: { product_val: product_val, slug: slug },
			// 	success: function (response) {
			// 		// console.log('done');
			// 	},
			// 	error: function (exception) {
			// 		console.log(exception);
			// 	}
			// });
		}
	}, 3000);

	$('[data-countdown]').each(function () {
		var $this = $(this),
			finalDate = $(this).data('countdown');
		$this.countdown(finalDate, function (event) {
			$this.html(
				event.strftime(
					'<div class="single-countdown"><span class="single-countdown__time">%D</span><span class="single-countdown__text">Days</span></div><div class="single-countdown"><span class="single-countdown__time">%H</span><span class="single-countdown__text">Hrs</span></div><div class="single-countdown"><span class="single-countdown__time">%M</span><span class="single-countdown__text">mins</span></div><div class="single-countdown"><span class="single-countdown__time">%S</span><span class="single-countdown__text">Secs</span></div>'
				)
			);
		});
	});

	/* Portfolio Filter & Popup Active */
	// $('.mesonry-list').imagesLoaded(function () {

	//     // filter items on button click
	//     $('.messonry-button').on('click', 'button', function () {
	//         var filterValue = $(this).attr('data-filter');
	//         $(this).siblings('.is-checked').removeClass('is-checked');
	//         $(this).addClass('is-checked');
	//         $grid.isotope({
	//             filter: filterValue
	//         });
	//     });

	//     // init Isotope
	//     var $grid = $('.mesonry-list').isotope({
	//         percentPosition: true,
	//         transitionDuration: '0.7s',
	//         layoutMode: 'masonry',
	//         masonry: {
	//             columnWidth: '.resizer',
	//         }
	//     });

	// });

	// $('.gallary-item').on('click', function (e) {

	//     let src = $(this).data('image');
	//     let href = $(this).data('image-link');
	//     let title = $(this).data('title');
	//     $('.gallary-item').removeClass('selected-product-image');
	//     $(this).addClass('selected-product-image');
	//     $('#main_image').attr('src', src);
	//     //$('.main_image_link').attr('href', href);
	//     $('.main_image_link').data('href', href);
	//     $('.main_image_link').data('title', title);

	// });

	$('.change_shipping_address').on('click', function () {
		$('#change_shipping_address').modal('show');
	});

	$('.main_image_link, .product-videos').on('click', function () {
		//console.log($('#product-view-gallery').html());
		$('#image_viewer_thumbnails').html($('#product-view-gallery').html());

		$('#image_viewer_thumbnails .gallary-item').on('click', function () {
			$('#image_viewer_thumbnails .gallary-item').removeClass('selected-product-image');
			$(this).addClass('selected-product-image');

			let html = '';

			if ($(this).data('type') == 'image') {
				html = '<img data-src="' + $(this).data('image-link') + '" class="lazyload img-fluid" alt="GerVetUSA Instrument Image">';
			} else {
				html = get_video_html($(this).data('video-id'), $(this).data('video-source'));
			}

			$('#image_viewer_title').html($(this).data('title'));
			$('#image_viewer_large').html(html);
		});

		let html = '';

		if ($(this).data('type') == 'image') {
			html = '<img data-src="' + $(this).data('href') + '" class="lazyload img-fluid" alt="GerVetUSA Instrument Image">';
		} else {
			html = get_video_html($(this).data('video-id'), $(this).data('video-source'));
		}

		$('#image_viewer_title').html($(this).data('title'));
		$('#image_viewer_large').html(html);

		$('#image_viewer').modal('show');
	});

	$('#image_viewer').on('hidden.bs.modal', function () {
		$('#image_viewer_large').html('');
	});

	$('#product_video_modal').on('hidden.bs.modal', function (e) {
		$('#video_modal').html('');
	});

	$('.qty-minus, .qty-plus').on('click', function () {
		let qty = $('#qty').val().toString();

		if ($(this).prop('id') == 'qty-plus') {
			qty++;
		} else {
			qty--;
		}

		if (qty < 1) qty = 1;

		$('#qty').val(qty);
	});

	// $('.frm_add_to_cart').on('submit', function (e) {
	//     e.preventDefault();

	//     // $(this).find('.btn_add_to_cart').text('Processing ...');
	//     // $(this).find('.btn_add_to_cart').attr('disabled', true);

	//     var frm_data = $(this).serialize();

	//     $.ajax({
	//         method: "POST",
	//         url: "/cart",
	//         data: frm_data
	//     })
	//     .done(function (msg) {
	//         if (msg.status == '1') {
	//             if ($('#cmd').val() == 'buynow')
	//                 location.href = '/cart';
	//             else if ($('#cmd').val() == 'add2cart') {
	//                 //$('#modal_alert_message').html(msg.message);
	//                 //$('#modal_alert').modal('show');
	//                 populateMiniCart(msg.cart, msg.sub_total, msg.total_qty);
	//                 addCartPopupContainer.classList.remove("hidden");
	//                 document.body.classList.add("body-height");
	//                 setTimeout(() => {
	//                     addCartPopupContainer.classList.remove("opacity-0");
	//                     addCartPopupWrapper.classList.remove("opacity-0");
	//                     addCartPopupWrapper.classList.add(
	//                         "enlarged-img-wrapper-scale"
	//                     );
	//                 }, 100);
	//                 // swal({
	//                 //     text: msg.message,
	//                 //     icon: 'success',
	//                 //     buttons: {
	//                 //         confirm: {
	//                 //             text: "View Cart",
	//                 //             value: true,
	//                 //             visible: true,
	//                 //             className: "ps-btn",
	//                 //             closeModal: true
	//                 //         },
	//                 //         cancel: {
	//                 //             text: "Continue Shopping",
	//                 //             value: false,
	//                 //             visible: true,
	//                 //             className: "ps-btn",
	//                 //             closeModal: true,
	//                 //         }
	//                 //     },
	//                 // }).then((result) => {
	//                 //     if (result) {
	//                 //         window.location.href = '/cart';
	//                 //     }
	//                 // });
	//             }
	//         }
	//     });

	//     // $(this).find('.btn_add_to_cart').text('Added to Cart');
	//     // $(this).find('.btn_add_to_cart').attr('disabled', true);

	// });

	$('.txt-product-qty').on('change', function () {
		if ($(this).val() < 0) $(this).val(0);
	});

	$('#sp_email').on('change', function () {
		$.ajax({
			method: 'GET',
			url: '/check-email-account',
			data: { email: $(this).val() }
		}).done(function (msg) {
			if (msg.status == 1) {
				$('#div_sp_email').html(
					'Hello <strong>' +
						msg.name +
						'</strong>!, you already have an account with us, would you like to login and place order? <a href="javascript:;" onclick="set_sp_email_login();" class="alert-link">Yes, I would like to Login</a> &nbsp;|&nbsp; <a href="javascript:;" onclick="$(\'#div_sp_email\').addClass(\'d-none\');">Cancel</a>'
				);
				$('#div_sp_email').removeClass('d-none');
			} else $('#div_sp_email').addClass('d-none');
		});
	});

	/*$('#frm_checkout_address').on('submit', function () {
        // show_overlay();
        let data = $('#frm_checkout_address').serialize();
        $.ajax({
            method: "POST",
            url: "/get-shipping-rates",
            data: data
        })
        .done(function (msg) {
            if (msg.status == '1') {
                print_shipping(msg);
                location.href='/';
                //move_page_to('acc_shipping_method');
            }
            else {
                $('#div_shipping_rates, #sp-shipping-error').html('<div class="alert alert-warning" role="alert">' + msg.message + '</div>');
            }
            // hide_overlay();
        });
        return false;
    });*/

	$('#btn-submit-shipping').on('click', function () {
		if ($('input[name="shipping_service"]:checked').length > 0) {
			$('#shipping_alert').addClass('d-none');
			// show_overlay();
			let data = $('#frm_checkout_shipping').serialize();
			$.ajax({
				method: 'POST',
				url: '/set-shipping-method',
				data: data
			}).done(function (msg) {
				console.log(msg);
				if (msg.status == '1') {
					//$('#acc_body_shipping_method').removeClass('show');
					//$('#acc_body_shipping_method').addClass('collapse');
					//$('#acc_body_payment_form').addClass('show');
					$('#sp_shipping_fee').html('$' + msg.data.rate);
					$('#sp_grand_total').html(msg.data.grand_total);
					$('#frm_checkout_shipping').submit();
				} else {
					// hide_overlay();
					alert('Having issues with shipping selection, please try again or contact support if you still receive this issue.');
				}
			});
		} else {
			$('#shipping_alert').removeClass('d-none');
		}
		return false;
	});

	$('#same_billing_info').on('change', function () {
		if ($(this).is(':checked')) {
			var shipping_info = JSON.parse($('#s_shipping_address').val());
			get_states(shipping_info.country, shipping_info.state);
			$('#bl_email').val(shipping_info.email);
			$('#bl_first_name').val(shipping_info.first_name);
			$('#bl_last_name').val(shipping_info.last_name);
			$('#bl_company').val(shipping_info.company);
			$('#bl_address1').val(shipping_info.address1);
			$('#bl_address2').val(shipping_info.address2);
			$('#bl_country').val(shipping_info.country);
			$('#bl_city').val(shipping_info.city);
			$('#bl_zip').val(shipping_info.zip);
			$('#bl_phone').val(shipping_info.phone);
		} else {
			$('#bl_email').val('');
			$('#bl_first_name').val('');
			$('#bl_last_name').val('');
			$('#bl_company').val('');
			$('#bl_address1').val('');
			$('#bl_address2').val('');
			$('#bl_country').val('');
			$('#state').val('');
			$('#bl_city').val('');
			$('#bl_zip').val('');
			$('#bl_phone').val('');
		}
	});

	$('#btn-billing-continue').on('click', function () {
		if ($('#bl_email').val() == '') {
			alert('Please enter your email address.');
			$('#bl_email').focus();
			return false;
		}
		if (!validate_email($('#bl_email').val())) {
			alert('Please enter a valid email address.');
			$('#bl_email').focus();
			return false;
		}
		if ($('#bl_first_name').val() == '') {
			alert('Please enter your first name.');
			$('#bl_first_name').focus();
			return false;
		}
		if ($('#bl_last_name').val() == '') {
			alert('Please enter your last name.');
			$('#bl_last_name').focus();
			return false;
		}
		if ($('#bl_address1').val() == '') {
			alert('Please enter your address.');
			$('#bl_address1').focus();
			return false;
		}
		if ($('#bl_country').val() == '') {
			alert('Please select your country.');
			$('#bl_country').focus();
			return false;
		}
		if ($('#state').prop('nodeName').toUpperCase() == 'SELECT') {
			if ($('#state option:selected').val() == '') {
				alert('Please select your state.');
				return false;
			}
		} else {
			if ($('#state').val() == '') {
				alert('Please enter your state.');
				$('#state').focus();
				return false;
			}
		}
		if ($('#bl_city').val() == '') {
			alert('Please enter your city.');
			$('#city').focus();
			return false;
		}
		if ($('#bl_zip').val() == '') {
			alert('Please enter your zip/postal code.');
			$('#bl_zip').focus();
			return false;
		}
		if ($('#bl_phone').val() == '') {
			alert('Please enter your phone number.');
			$('#bl_phone').focus();
			return false;
		}
		$('#acc_body_billing_address').addClass('collapse');
		$('#acc_body_card_details').addClass('show');
		move_page_to('acc_card_details');
		return;
	});

	$('#terms').on('click', function () {
		if ($(this).is(':checked')) {
			$('#btn_place_order').prop('disabled', false);
		} else {
			$('#btn_place_order').prop('disabled', true);
		}
	});

	$('#frm_payment').on('submit', function () {
		$('#btn_place_order').text('PROCESSING, PLEASE WAIT ...');
		$('#btn_place_order').prop('disabled', true);
		//show_overlay();
	});

	$('#add_shipping_address').on('click', function () {
		$('#div_saved_addresses').addClass('d-none');
		$('#div_shipping_address_new').removeClass('d-none');
	});

	$('#select_saved_shipping_address').on('click', function () {
		$('#div_saved_addresses').removeClass('d-none');
		$('#div_shipping_address_new').addClass('d-none');
	});

	$('#shipping_address_continue').on('click', function () {
		let checked = false;
		let sp_id = null;
		$("input[name='sp_id']").each(function () {
			if ($(this).prop('checked')) {
				checked = true;
				sp_id = $(this).val();
			}
		});

		if (checked) {
			show_overlay();
			$.ajax({
				method: 'get',
				url: '/set-shipping-address',
				data: { sp_id: sp_id }
			}).done(function (msg) {
				if (msg.status == '1') {
					print_shipping(msg);
				} else {
					$('#div_shipping_rates, #sp-shipping-error').html('<div class="alert alert-warning" role="alert">' + msg.message + '</div>');
				}

				hide_overlay();
			});
		} else {
			alert('Please select shipping address to continue.');
		}
	});

	/*$('#frm_enter_to_win').on('submit', function () {
        fbq('track', 'Lead');
    });

    $('#frm_request_session').on('submit', function () {
        fbq('track', 'Schedule');
    });

    $('.btn-checkout-track').on('click', function () {
        fbq('track', 'InitiateCheckout');
    });

    $('#frm_contact').on('submit', function () {
        fbq('track', 'Contact');
    });

    $('#frm_register').on('submit', function () {
        fbq('track', 'CompleteRegistration');
    });*/

	$('#frm_login, #frm_register, #frm_reset, #frm_forgot').on('submit', function () {
		let email = $('#email').val();
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
			return true;
		}
		alert('Please enter a valid email address');
		$('#email').focus();
		return false;
	});

	// $('#dismiss_instruments_notice').on('click', function(){
	//     $('.instruments-notice').addClass('d-none');
	//     localStorage.setItem('hide-instruments-notice', 'yes');
	// });

	// if(localStorage.getItem('hide-instruments-notice') != 'yes')
	// {
	//     $('.instruments-notice').removeClass('d-none');
	// }

	/*$('#cc_number').on('keyup', function(){

    });*/

	if ($('.tipster').length > 0) {
		$('.tipster').tooltipster({ side: 'left', theme: 'tooltipster-shadow' });
	}

	if ($('.tipster-discount').length > 0) {
		$('.tipster-discount').tooltipster({ trigger: 'click', side: 'top', theme: 'tooltipster-shadow' });
	}

	if ($('.product-right-tips').length > 0) {
		$('.product-right-tips').tooltipster({ trigger: 'click', side: 'left', theme: 'tooltipster-shadow' });
	}

	$('.fl-subscribe, .footer-subscribe').on('click', function () {
		$('#fl-subscribe-modal').modal('show');
	});

	$('#btn_show_calculate_shipping').on('click', function () {
		$('#modal_calculate_shipping_form').modal('show');
	});

	$('#frm_calculate_shipping_charges').on('submit', function (e) {
		if ($('#ship_zipcode').val() == '' && $('#ship_country').val() == '') {
			alert('Please enter US zipcode or select the shipping country.');
			$('#ship_zipcode').focus();
			return false;
		}

		$('#frm_calculate_shipping_charges').submit();
	});

	if (document.querySelector('#chat-content')) {
		setInterval(() => {
			Livewire.emit('popupMessageSent');
			//alert('hello');
		}, 5000);
	}

	let chatIcon = document.querySelector('.chat-icon');

	if (document.querySelector('#chat-box-container')) {
		let chatBox = document.querySelector('#chat-box-container');
		let chatClsBtn = document.querySelector('.chat-close-icon');

		chatIcon.addEventListener('click', () => {
			chatBox.classList.toggle('chat-active');
			scroll_chat_to_bottom();
		});

		chatClsBtn.addEventListener('click', () => {
			chatBox.classList.remove('chat-active');
		});
	}
	getMiniCart();
	resizeSlider();
});

$(window).resize(function () {
	resizeSlider();
});

document.addEventListener('DOMContentLoaded', () => {
	if ($('#cc_number').length) {
		var cc_type = 'unknown';
		var css = '';
		var cleave = new Cleave('#cc_number', {
			creditCard: true,
			delimiter: '-',
			onCreditCardTypeChanged: function (type) {
				cc_type = type;

				if (cc_type == 'mastercard') css = 'fab fa-cc-mastercard';
				else if (cc_type == 'visa') css = 'fab fa-cc-visa';
				else if (cc_type == 'jcb') css = 'fab fa-cc-jcb';
				else if (cc_type == 'discover') css = 'fab fa-cc-discover';
				else if (cc_type == 'amex') css = 'fab fa-cc-amex';
				else css = 'fas fa-credit-card';

				$('#fa_cc').removeClass();
				$('#fa_cc').addClass(css);

				$('#cc_type').val(cc_type);
			}
		});
	}
});

function set_selected_shipping_service(vendor_id) {
	var checked_input = $('#div-vendor-shipping-charges-' + vendor_id + ' input:checked');
	var vendor_id = $('#vendor_' + vendor_id).val();

	var url = {
		method: 'POST',
		url: '/cart/set-vendor-shipping-service',
		data: { vendor_id: vendor_id, shipping_enc: checked_input.val(), _token: $('meta[name="csrf-token"]').attr('content') }
	};

	$.ajax(url).done(function (msg) {
		if (msg.status == '1') {
			self.location.reload();
		}
	});
}

function validate_email(email) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
		return true;
	}

	return false;
}

function activate_card_details() {
	$('#acc_body_billing_address').addClass('collapse');
	$('#acc_body_card_details').addClass('show');
	$('#terms').prop('checked', true);
	$('#btn_place_order').prop('disabled', false);
	//move_page_to('acc_body_card_details');
}

function get_token() {
	return document.querySelector('meta[name="_token"]').getAttribute('content');
}

function get_video_html(video_id, source) {
	let html = '';

	if (source == 'Youtube') {
		html =
			'<iframe width="600" height="338" src="https://www.youtube.com/embed/' +
			video_id +
			'?controls=1&rel=0&autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
	} else {
		html = '<iframe src="https://player.vimeo.com/video/' + video_id + '?autoplay=1&portrait=0" width="600" height="338" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>';
	}

	return html;
}

function move_page_to(el) {
	var elmnt = document.getElementById(el);
	elmnt.scrollIntoView({ behavior: 'smooth' });
}

function resizeSlider() {
	let ev = findBootstrapEnvironment();

	/*if(ev == 'lg' || ev == 'xl')
    {
        $('.single-slider').css('height', '350px')
    }
    else */
	if (window.screen.width >= 1920) {
		$('.single-slider').css('height', '450px');
	} else if (ev == 'md' || ev == 'lg' || ev == 'xl') {
		$('.single-slider').css('height', '350px');
	} else {
		$('.single-slider').css('height', '200px');
	}
}

function findBootstrapEnvironment() {
	let envs = ['xs', 'sm', 'md', 'lg', 'xl'];

	let el = document.createElement('div');
	document.body.appendChild(el);

	let curEnv = envs.shift();

	for (let env of envs.reverse()) {
		el.classList.add(`d-${env}-none`);

		if (window.getComputedStyle(el).display === 'none') {
			curEnv = env;
			break;
		}
	}

	document.body.removeChild(el);
	return curEnv;
}

function print_shipping(msg) {
	let html = '';

	msg.data.rates.forEach(function (shipping) {
		let enc = shipping.enc;
		let chk = '';
		if (shipping.selected) chk = 'checked="checked"';
		html += '<div class="radio"><label><input type="radio" name="shipping_service" value="' + enc + '" ' + chk + '> ' + shipping.service + ' ($' + shipping.rate + ')</label></div>';
	});

	$('#sp-shipping-error').html('');
	$('#div_shipping_rates').html(html);
	$('#sp_shipping_fee').html('$0.00');
	$('#sp_grand_total').html(msg.grand_total);

	$('#acc_body_shipping_address').removeClass('show');
	$('#acc_body_shipping_address').addClass('collapse');
	$('#acc_body_payment_form').addClass('collapse');
	$('#acc_body_shipping_method').addClass('show');
}

function set_sp_email_login() {
	$('#email').val($('#sp_email').val());
	$('#sp_customer_login_link').click();
	$('#password').focus();
}

function getMiniCart() {
	$.ajax({
		method: 'GET',
		url: '/cart/get-cart'
	}).done(function (msg) {
		if (msg.status == '1') {
			// populateMiniCart(msg.cart, msg.sub_total, msg.total_qty);
		}
	});
}

function populateMiniCart(cart, sub_total, total_qty) {
	$('.mini-cart-total').text('$' + sub_total);
	// $('.mini-cart-count').text(total_qty);

	$('.mini-cart-items').remove();
	let html = '';

	let cart_is_empty = true;

	for (var item in cart) {
		cart_is_empty = false;

		let ct = cart[item];
		let product_name = ct.name;

		let price = ct.price;
		if (ct.attributes.discount > 0) {
			price = ct.attributes.price_discounted;
		}

		if (product_name.length > 20) product_name = product_name.substring(0, 40) + '...';

		let image = ct.attributes.image;
		// let path = 'https://vpc-assets.nyc3.digitaloceanspaces.com/products/images/thumbnails/' + image;
		// if (image != '') {
		//     // path = 'up_data/products/images/thumbnails/' + image;
		// } else {
		//     path = 'up_data/na.webp';
		// }

		let link = ct.attributes.link;

		html += `<a href="${link}" class="cart-item flex justify-between p-4 border-b border-solid border-gray-300 relative">
                    <img class="mr-2 w-16" src="${image}" alt="${ct.name}" />
                    <div class="cart-item-detail-wrapper flex flex-col mx-1">
                        <div class="cart-item-description lite-blue-color hover:text-black transition duration-300 ease-in-out">
                            ${product_name}</div>
                        <div class="cart-item-price mr-1 text-sm text-red-600">${ct.quantity} x $${price}</div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 delete-cart-item" fill="none"
                        viewBox="0 0 24 24" stroke="#777" onclick="remove_mini_cart_item('${ct.id}-rmv');return false;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </a>`;
	}

	// html = '<div class="mini-cart-items">' + html + '</div>';

	// $(html).insertBefore("#mini-cart-sub-total-row");
	// $(html).insertBefore("#mini-cart-sub-total-col");
	// $(html).insertBefore("#mini-cart-sub-total-footer");
	if (cart_is_empty || cart.length == 0) {
		$('.nav-whishlist-icon-wrapper').prop('href', 'javascript:;');
		// $('.single-cart').addClass('d-none');
		// $('.mini-cart-sorry').removeClass('d-none');
		html = `<p class="text-center py-2"><strong>Sorry!</strong>, your cart is empty!</p>`;
	} else {
		$('.nav-whishlist-icon-wrapper').prop('href', '/checkout');
		// $('.single-cart').removeClass('d-none');
		// $('.mini-cart-sorry').addClass('d-none');
	}
	$('#cart-items-header').html(html);
}

function remove_mini_cart_item(id) {
	$.ajax({
		method: 'GET',
		url: '/cart/delete/' + id
	}).done(function (msg) {
		if (msg.status == '1') {
			// populateMiniCart(msg.cart, msg.sub_total, msg.total_qty);
		}
	});
}

function remove_cart_item(id) {
	if (window.confirm('Are you sure you want to remove this item from your shopping cart?')) {
		$('#qty_' + id).val(0);
		$('#btn_update_cart').click();
	}
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
		/*$('.product-info').addClass('d-none');
        $('.sid-' + sid).removeClass('d-none');

        $('.btn-add-to-cart').removeClass('d-none');
        $('.btn-add-to-cart').data('product-id', sid);

        //console.log($('#product_id').val());
        $('#product_id').val(sid);

        //$("#product_id option[value='"+ sid +"']").prop('selected', true);

        $('#sp_' + sid).click();*/

		$('input:radio').each(function () {
			if ($(this).val() == sid) {
				$(this).prop('checked', true);
				$(this).change();

				$('.product-info').addClass('d-none');
				$('.sid-' + sid).removeClass('d-none');

				$('.btn-add-to-cart').removeClass('d-none');
				$('.btn-add-to-cart').data('product-id', $(this).val());

				//$('#sp_' + sid).click();
				$('.spimgs_' + sid)
					.first()
					.click();
				//setTimeout(function(){ $('#sp_'+sid).click(); }, 500);
			}
		});
	}
}

function open_video_modal(video) {
	video = '/up_data/products/videos/' + video;
	let video_tag = '<video width="700" controls autoplay><source src="' + video + '" id="product_video" type="video/mp4">Your browser does not support the video tag.</video>';
	$('#video_modal').html(video_tag);
	$('#product_video_modal').modal('show');
}

function get_states(country_id, state_id) {
	state_id = state_id || null;

	$.ajax({
		method: 'GET',
		url: '/get-states',
		data: { country_id: country_id }
	}).done(function (obj) {
		let html = '';

		if (obj.status == '1') {
			html += '<select name="state" required  id="state" class="form-control bg-white border border-solid justify-between overflow-hidden p-3 sm:text-base w-full"><option value="">Please select ...</option>';

			obj.data.forEach(function (data) {
				let sel = '';
				if (state_id != null && state_id == data.id) {
					sel = 'selected="selected"';
				}
				html += '<option value="' + data.id + '" ' + sel + '>' + data.name + '</option>';
			});

			html += '</select>';
		} else {
			let val = '';
			if (state_id != null) {
				val = state_id;
			}
			html = '<input class="form-control required bg-white border border-solid justify-between overflow-hidden p-3 sm:text-base w-full" placeholder="Enter state ..." name="state" type="text" id="state" value="' + val + '">';
		}

		$('#div_state').html(html);
	});
}

function select_shipping_address(sp_id) {
	$('.scheduler-border').removeClass('selected');
	$("input[name='sp_id']").each(function () {
		if ($(this).val() == sp_id) $(this).prop('checked', true);
		else $(this).prop('checked', false);
	});
	$('#fs_' + sp_id).addClass('selected');
}

function subscribe_us(form) {
	var email = $('#subs_email');
	if (email.val() == '') {
		alert('Please Enter Email Address.');
		email.focus();
		return false;
	}
	let valid_email = false;
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val())) {
		valid_email = true;
	}
	if (!valid_email) {
		alert('Please enter a valid email address.');
		email.focus();
		return false;
	}
	$('.btn-subscribe').val('Please wait!');
	$('.btn-subscribe').prop('disabled', true);
	$.ajax({
		method: form.attr('method'),
		url: form.attr('action'),
		data: form.serialize()
	}).done(function (msg) {
		if (msg.status == '1') {
			$('#msg_subscribe').removeClass('d-none');
			$('#response_div').removeClass('hidden');
			$('#response_div').text('User subscribed successfully!');
			setTimeout(function () {
				$('#response_div').addClass('hidden');
			}, 5000);
			
			$('#frm_subscribe')[0].reset();
			setTimeout(function () {
				$('#msg_subscribe').addClass('d-none');
			}, 5000);
		}
		else {
			$('#response_div').removeClass('hidden');
			$('#response_div').text('User is already subscribed.');
			setTimeout(function () {
				$('#response_div').addClass('hidden');
			}, 5000);
					
		}
		return false;
	});
}
$('#frm_subscribe').on('submit', function(e){
	e.preventDefault();
	subscribe_us($(this));
});
	// if ($('#subs_type').val() == 'popup') {
	// 	var type = 'popup';
	// 	var submit_text = 'Grab the Discount';
	// 	var name = $('#newsletter-name');
	// 	var email = $('#newsletter-email');
	// 	var phone = $('#newsletter-phone');
	// 	var speciality = $('#newsletter-speciality');
	// 	var role = $('#newsletter-role');
	// 	var company = $('#newsletter-company');
	// 	var frm_data = $('#frm_newsletter').serialize();
	// 	if (name.val() == '') {
	// 		alert('Please enter your name.');
	// 		name.focus();
	// 		return false;
	// 	}
	// 	if (email.val() == '') {
	// 		alert('Please enter email address.');
	// 		email.focus();
	// 		return false;
	// 	}
	// 	let valid_email = false;
	// 	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.val())) {
	// 		valid_email = true;
	// 	}
	// 	if (!valid_email) {
	// 		alert('Please enter a valid email address.');
	// 		email.focus();
	// 		return false;
	// 	}
	// 	if (phone.val() == '') {
	// 		alert('Please enter your phone.');
	// 		phone.focus();
	// 		return false;
	// 	}
	// 	if (speciality.val() == '') {
	// 		alert('Please select your speciality.');
	// 		speciality.focus();
	// 		return false;
	// 	}
	// 	if (role.val() == '') {
	// 		alert('Please select your role.');
	// 		role.focus();
	// 		return false;
	// 	}
	// 	if (company.val() == '') {
	// 		alert('Please enter your institute / company.');
	// 		company.focus();
	// 		return false;
	// 	}
	// 	$('.btn-subscribe').val('Please wait!');
	// 	$('.btn-subscribe').prop('disabled', true);
	// 	$.ajax({
	// 		method: 'POST',
	// 		url: '/subscribe',
	// 		data: frm_data
	// 	}).done(function (msg) {
	// 		$('#msg_subscribe').removeClass('d-none');
	// 		$('#div_popup_subscribe').addClass('d-none');
	// 		$('#frm_newsletter')[0].reset();
	// 		$('.btn-subscribe').val(submit_text);
	// 		$('.btn-subscribe').prop('disabled', false);
	// 	});
	// 	return false;
	// }


/*function subscribe() {
    var frm_data = $('#frm_subscribe').serialize();

    if ($('#subs_email').val() == '') {
        alert('Please enter email address');
        $('#subs_email').focus();
        return false;
    }

    let valid_email = false;

    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test($('#subs_email').val())) {
        valid_email = true;
    }

    if (!valid_email) {
        alert('Please enter a valid email address');
        $('#subs_email').focus();
        return false;
    }

    $.ajax({
        method: "POST",
        url: "/subscribe",
        data: frm_data
    })
        .done(function (msg) {
            if (msg.status == '1') {
                $('#msg_subscribe').removeClass('d-none');
                $('#frm_subscribe')[0].reset();
                setTimeout(function () { $('#msg_subscribe').addClass('d-none'); }, 5000);
            }
        });

    return false;
}

function show_bogo_products(id) {
    let cat = '.b-cat-' + id;
    let bli = '#b-li-' + id;
    $('.b-products').addClass('d-none');
    $(cat).removeClass('d-none');
    $('.b-lis').removeClass('active');
    $(bli).addClass('active');
}

/*
function track_order()
{
    var frm_data = $('#frm_track').serialize();

    if($('#tracking_code').val() == '')
    {
        alert('Please Your Order ID or UPS Shipping Number');
        $('#tracking_code').focus();
        return false;
    }

    $.ajax({
        method: "POST",
        url: "/track-order",
        data: frm_data
    })
        .done(function( msg ) {
            if(msg.status == '1')
            {
                $('#tracking_details').html(msg.data);
                $('#frm_track')[0].reset();
            }
        });

    return false;
}
*/

function copy_coupon(field_id) {
	var copyText = document.getElementById(field_id);

	copyText.select();
	copyText.setSelectionRange(0, 99999);

	document.execCommand('copy');

	$('#coupon-success_' + field_id).removeClass('d-none');
}

function show_overlay() {
	document.getElementById('overlay').style.display = 'block';
}

function hide_overlay() {
	document.getElementById('overlay').style.display = 'none';
}

$('#dismiss_instruments_notice').on('click', function (e) {
	e.preventDefault();
	$.ajax({
		method: 'GET',
		url: '/dismiss_instruments_notice',
		success: function () {
			$('.instruments-notice').addClass('d-none');
		}
	});
});

function productViews(id) {
	var viewed = JSON.parse(window.localStorage.getItem('viewed_products')) || [];
	if (viewed.indexOf(id) == -1) {
		viewed.push(id);
		let viewed_products = JSON.stringify(viewed);
		window.localStorage.setItem('viewed_products', viewed_products);
	}
}

$(document).ready(function () {
	if (window.localStorage !== undefined) {
		var fields = JSON.parse(window.localStorage.getItem('viewed_products'));
		let name = $('#productSection').val();
		// console.log(name);
		if (fields && name == 'Order You Like Page') {
			setTimeout(() => {
				$.ajax({
					type: 'POST',
					url: '/viewed_products',
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					data: { data: fields },
					success: function (response) {
						var tr_str = `<div class="ps-shopping-product">`;
						var csrf_token = response['csrf_token'];
						var url = response['url'];
						for (var i = 0; i < response['data'].length; i++) {
							var id = response['data'][i].id;
							var vendor_name = response['data'][i].vendor.name;
							var vendor_slug = response['data'][i].vendor.slug;
							var name = response['data'][i].name;
							var des = response['data'][i].short_description;
							var price_text = response['data'][i].price_catalog;
							var slug = response['data'][i].slug;
							var type = response['data'][i].type;
							var type = response['data'][i].type;
							var img_url = `up_data/products/images/thumbnails/${response['data'][i].image}`;
							if (des) {
								var description = des.substring(0, 100) + '.....';
								console.log(des);
							} else {
								var description = '';
							}

							if (type != 'variation') {
								price = `<p class="ps-product__price sale"><span>$${price_text}</span></p>`;
								var button = `<form class="frm_add_to_cart" method="POST" action="cart">
                                            <input type="hidden" name="_token" value="${csrf_token}" />
                                            <div class="ps-product__shopping d-flex">
                                                <input type="hidden" name="product_id" class="product_id" value="${id}">
                                                <button aria-label="Add to cart" type="submit" class="ps-btn ps-btn--black btn_add_to_cart mr-3" onclick="this.form.cmd.value='add2cart';">Add to cart</button>
                                                <button aria-label="Buy Now" type="submit" class="ps-btn" onclick="this.form.cmd.value='buynow';">Buy Now</button>

                                            </div>
                                        </form>`;
							} else {
								price = `<p class="ps-product__price sale"><span style="font-size: 1.4rem !important; ">Multiple SKUs Available</span></p>`;
								var button = `<div class="ps-product__shopping mt-3">
                                            <a class="ps-btn" href="${slug}" aria-label="Product Link">Details</a>
                                        </div>`;
							}
							tr_str += `
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail d-flex align-items-center">
                                    <a href="${slug}"  aria-label="${name}"><img data-src="${img_url}" class="lazyload" alt="${name}" width="189" height="189"></a>
                                </div>
                                <div class="p-5">
                                    <div class="ps-product__content"><a aria-label="${name}" class="ps-product__title" href="${slug}">${name}</a>
                                    <p class="ps-product__vendor">Sold by: <a href="/${vendor_slug}" aria-label="Vendor Link">${vendor_name}</a></p>
                                        <p>${description}</p>
                                            ${price}
                                            ${button}
                                    </div>
                                </div>
                            </div>
                        </div>`;
						}
						tr_str += `</div>`;
						$('#viewed_products_list').append(tr_str);
					},
					error: function (exception) {
						console.log(exception);
					}
				});
			}, 1000);
		}
	} else {
		tr_str += `<div class="ps-shopping-product"></div>`;
		$('#viewed_products_list').append(tr_str);
	}

	$('.product_id_delete').on('click', function (e) {
		e.preventDefault();

		let url = $(this).attr('href');

		swal({
			text: 'Are you sure',
			icon: 'warning',
			buttons: {
				confirm: {
					text: 'Yes',
					value: true,
					visible: true,
					className: 'ps-btn',
					closeModal: true
				},
				cancel: {
					text: 'No',
					value: false,
					visible: true,
					className: 'ps-btn',
					closeModal: true
				}
			}
		}).then((result) => {
			if (result) {
				$.ajax({
					method: 'DELETE',
					url: url,
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				}).done(function (msg) {
					if (msg) {
						window.location.href = '/dashboard/wishlist';
					}
				});
			}
		});
	});
});

function scroll_chat_to_bottom() {
	let chat_service = document.querySelector('.chat-msgs-inner-wrapper');
	let chat_box = document.querySelector('#chat-content');
	if(chat_service){
		chat_service.scrollTop = chat_service.scrollHeight;
	}
	document.querySelector('#chat-content').scrollTop= document.querySelector('#chat-content').scrollHeight;
}

window.addEventListener('scroll-chat-to-end', (event) => {
	scroll_chat_to_bottom();
});

window.addEventListener('refresh-window', (event) => {
	self.location.reload();
});
