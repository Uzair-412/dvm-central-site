// product thumbnail carasoul
let swiper3 = new Swiper('.product-img-gallery', {
	slidesPerView: 4,
	slidesPerGroup: 1,
	spaceBetween: 8,
	freeMode: true,
	watchSlidesProgress: true,
	breakpoints: {
		401: {
			slidesPerView: 5
		},
		769: {
			slidesPerView: 4
		},
		1025: {
			slidesPerView: 5
		}
	}
});

// related products carasoul
var swiper = new Swiper('.related-products-imgs-container', {
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

//enlarge img
let productImgWrapper = document.querySelector('.product-img-wrapper'),
	productMainImg = document.querySelector('.product-img-wrapper img'),
	enlargeBtn = document.querySelector('.product-img-container'),
	enlargedImgContainer = document.querySelector('.enlarged-img-container'),
	closeEnlargedImgContainer = document.querySelectorAll('.enlarged-img-container, .enlarged-close-btn'),
	enlargedImg = document.querySelector('.enlarged-img-wrapper');

productImgWrapper.addEventListener('click', () => {
	enlargedImgContainer.classList.remove('hidden');
	let check_iframe = document.querySelector('.enlarged-img-wrapper iframe');
	if(check_iframe!==null)
	{
		check_iframe.remove();
	}
	if(productMainImg.getAttribute('file-type')!== null)
	{
		document.querySelector('.enlarged-img-wrapper img').classList.add('hidden');
		document.querySelector('.enlarged-img-wrapper .product-img-gallery').classList.add('hidden');
		let pre_url = null;
		if(productMainImg.getAttribute('file-type') == 'youtube')
		{
			pre_url = 'https://www.youtube.com/embed/';
		}
		else if(productMainImg.getAttribute('file-type') == 'file'){
			pre_url = '/up_data/products/videos/';
		}
		else
		{
			pre_url = 'https://player.vimeo.com/video/';
		}
		let iframe = document.createElement('iframe');
		iframe.setAttribute('id', 'ytplayer');
		iframe.setAttribute('type', 'text/html');
		iframe.setAttribute('width', '100%');
		iframe.setAttribute('height', '500');
		iframe.setAttribute('src', pre_url+productMainImg.getAttribute('name'));
		iframe.setAttribute('frameborder', '0');
		// document.querySelector('.enlarged-img-wrapper').append(`<iframe id="ytplayer" type="text/html" width="120" height="100"  
		// src="https://www.youtube.com/embed/${productMainImg.getAttribute('name')}"
		// frameborder="0"/></iframe>`);
		document.querySelector('.enlarged-img-wrapper').append(iframe);
	}
	else
	{
		document.querySelector('.enlarged-img-wrapper img').classList.remove('hidden');
		document.querySelector('.enlarged-img-wrapper .product-img-gallery').classList.remove('hidden');
	}
	setTimeout(() => {
		enlargedImgContainer.classList.remove('opacity-0');
		enlargedImg.classList.add('popup-scale-1');
		enlargedImg.classList.remove('opacity-0');
		document.body.classList.add('body-height');
	}, 100);
});

window.addEventListener('click', (e) => {
	closeEnlargedImgContainer.forEach((btn) => {
		if (e.target === btn) {
			enlargedImg.classList.remove('popup-scale-1');
			enlargedImg.classList.add('opacity-0');

			setTimeout(() => {
				enlargedImgContainer.classList.add('opacity-0');
				document.body.classList.remove('body-height');
				enlargedImgContainer.classList.add('hidden');
			}, 300);
		}
	});
});

// product detail modal img gallary replacing img src on click
let popupProductModalImg = document.querySelector('.popup-product-detail-main-img'),
	popupProductModalGalleryImgs = document.querySelectorAll('.popup-product-detail-container .product-img-gallary-wrapper img');

popupProductModalGalleryImgs.forEach((img) => {
	img.addEventListener('click', () => {
		let clickedImgSrc = img.getAttribute('src');
		popupProductModalImg.src = clickedImgSrc;
		popupProductModalImg.setAttribute('default-src', clickedImgSrc);
	});
});

let reviewsBtn = document.querySelector('.reviews-btn'),
	warrantyBtn = document.querySelector('.warranty-btn'),
	pdfBtn = document.querySelector('.pdf-btn'),
	additInfoBtn = document.querySelector('.addit-info-btn'),
	descriptionBtn = document.querySelector('.description-btn'),
	productDetail = document.querySelector('.product-detail'),
	productAdditInfo = document.querySelector('.product-addit-info'),
	reviewPost = document.querySelector('.review-form'),
	productWarranty = document.querySelector('.product-warrant'),
	contentDetail = document.querySelectorAll('.product-detail-reviews .detail'),
	pdfDetail = document.querySelector('.pdf-form'),
	allBtnHeadings = document.querySelectorAll('.product-detail-review-title h2');

pdfBtn.addEventListener('click', () => {
	if (pdfDetail.classList.contains('hidden')) {
		contentDetail.forEach((detail) => {
			detail.classList.add('hidden');
		});

		pdfDetail.classList.remove('hidden');
	}
	allBtnHeadings.forEach((btn) => {
		btn.classList.remove('lite-blue-color');
	});
	pdfBtn.classList.add('lite-blue-color');
});

descriptionBtn.addEventListener('click', () => {
	if (productDetail.classList.contains('hidden')) {
		contentDetail.forEach((detail) => {
			detail.classList.add('hidden');
		});

		productDetail.classList.remove('hidden');
	}
	allBtnHeadings.forEach((btn) => {
		btn.classList.remove('lite-blue-color');
	});
	descriptionBtn.classList.add('lite-blue-color');
});

additInfoBtn.addEventListener('click', () => {
	if (productAdditInfo.classList.contains('hidden')) {
		contentDetail.forEach((detail) => {
			detail.classList.add('hidden');
		});

		productAdditInfo.classList.remove('hidden');
	}
	allBtnHeadings.forEach((btn) => {
		btn.classList.remove('lite-blue-color');
	});
	additInfoBtn.classList.add('lite-blue-color');
});

reviewsBtn.addEventListener('click', () => {
	if (reviewPost.classList.contains('hidden')) {
		contentDetail.forEach((detail) => {
			detail.classList.add('hidden');
		});

		reviewPost.classList.remove('hidden');
	}
	allBtnHeadings.forEach((btn) => {
		btn.classList.remove('lite-blue-color');
	});
	reviewsBtn.classList.add('lite-blue-color');
});

warrantyBtn.addEventListener('click', () => {
	if (productWarranty.classList.contains('hidden')) {
		contentDetail.forEach((detail) => {
			detail.classList.add('hidden');
		});

		productWarranty.classList.remove('hidden');
	}
	allBtnHeadings.forEach((btn) => {
		btn.classList.remove('lite-blue-color');
	});
	warrantyBtn.classList.add('lite-blue-color');
});

// product-quantity add or minus
let quantityWrapper = document.querySelectorAll('.product-page-product-wrapper .product-quantity-wrapper');

quantityWrapper.forEach((wrapper) => {
	let quantity = wrapper.querySelector('#qty'),
		qtyAddBtn = wrapper.querySelector('#qty-plus'),
		qtyMinusBtn = wrapper.querySelector('#qty-minus');

	qtyAddBtn.addEventListener('click', () => {
		quantity.value++;
	});
	qtyMinusBtn.addEventListener('click', () => {
		quantity.value--;
		if (quantity.value < 1) {
			quantity.value = 1;
		}
	});
});

window.addEventListener('load', () => {
	document.querySelectorAll('.popup-img').forEach((img) => {
		let initialImgSrc = img.getAttribute('data-src');
		img.src = initialImgSrc;
	});

	// product, variation thumbnails and enlarged img gallary replacing img src on hover
	
	// product and enlarged img gallary replacing img src on click
	let productGalleryImgs = document.querySelectorAll('.enlarged-img-container .product-img-gallary-wrapper img, .product-img-container .product-img-gallary-wrapper img');
	productGalleryImgs.forEach((img) => {
		img.addEventListener('mouseleave', () => {
			let mainImageWrapper = document.querySelector('.product-img-wrapper img');
			let ImageSrc = mainImageWrapper.getAttribute('default-src');
			mainImageWrapper.setAttribute('src', ImageSrc);
		});

		img.addEventListener('mouseover', async () => {
			let largeImage = null;
			
			if(img.getAttribute('file-type')!==null)
			{
				largeImage = await img.getAttribute('thumbnail-link');
				type="video";
			}
			else
			{
				largeImage = await img.src.replaceAll('thumbnails', 'large');
				type="image";
			}
			await setProductImage(largeImage, type);
		});

		img.addEventListener('click', async () => {
			let largeImage = null;
			
			if(img.getAttribute('file-type')!==null)
			{
				largeImage = await img.getAttribute('thumbnail-link');
				let large_image_element = document.querySelector('.product-img-wrapper img');
				large_image_element.setAttribute('name', img.getAttribute('name'));
				large_image_element.setAttribute('file-type', img.getAttribute('file-type'));
				type="video";
			}
			else
			{
				largeImage = await img.src.replace('thumbnails', 'large');
				let large_image_element = document.querySelector('.product-img-wrapper img');
				large_image_element.removeAttribute('name');
				large_image_element.removeAttribute('file-type');
				type="image";
			}
			await setProductImage(largeImage, type);
			document.querySelector('.product-img-wrapper img').setAttribute('default-src', largeImage);
		});
	});

	// replacing variation title on hover over variation imgs
	document.querySelector('.select-variation')?.addEventListener('change', async (e) => {
		let pId = e.target.value;

		let enlargImage;
		if (pId == 0) {
			document.querySelector('#product-description').classList.remove('hidden');
			enlargImage = document.querySelector(`.product-img-gallary-wrapper img[sub-pro-id='0']`);
		} else {
			enlargImage = document.querySelector(`.product-img-gallary-wrapper img[sub-pro-id='${pId}']`);
		}

		let largeImage = enlargImage.src.replace('thumbnails', 'large');
		await setProductImage(largeImage);
		document.querySelector('.product-img-wrapper img').setAttribute('default-src', largeImage);
		setTimeout(() => {
			$('.product-img-wrapper img').blowup({
				background: 'rgb(249,250,251)',
				width: 200,
				height: 200,
				border: '4px solid #000',
				scale: 1.5
			});
		}, 50);
	});

	let productImg = document.querySelectorAll('.enlarged-img, .product-img-wrapper img');
	async function setProductImage(image, type="image") {
		$('.product-img-wrapper img').blowup({
			background: 'rgb(249,250,251)',
			width: 200,
			height: 200,
			border: '4px solid #000',
			scale: 1.5
		});
		productImg.forEach(async (img) => {
			img.setAttribute('src', image);
			enlargedImg.setAttribute('src', image);
		});
		if(type=='video')
		{
			productImgWrapper.classList.add("video-thumbnail");
		}
		else
		{
			productImgWrapper.classList.remove("video-thumbnail");
		}
		return image;
	}

	setTimeout(() => {
		$('.product-img-wrapper img').blowup({
			background: 'rgb(249,250,251)',
			width: 200,
			height: 200,
			border: '4px solid #000',
			scale: 1.5
		});
	}, 300);
});
