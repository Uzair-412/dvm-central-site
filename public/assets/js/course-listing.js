let coursePopupContainer = document.querySelector('.course-popup-container'),
	coursePopupWrapper = document.querySelector('.course-popup-wrapper'),
	popupOpenBtn = document.querySelectorAll('.popup-open-btn'),
	closePopup = document.querySelectorAll('.course-popup-container, .popup-close-btn, .popup-close-btn path');

popupOpenBtn.forEach((btn) => {
	btn.addEventListener('click', () => {
		coursePopupContainer.classList.remove('hidden');
		document.body.classList.add('body-height');
		setTimeout(() => {
			coursePopupContainer.classList.remove('opacity-0');
			coursePopupWrapper.classList.remove('opacity-0');
			coursePopupWrapper.classList.add('popup-scale-1');
		}, 300);
	});
});

window.addEventListener('click', (e) => {
	closePopup.forEach((btn) => {
		if (e.target === btn) {
			Livewire.emit('closeModel');
			coursePopupWrapper.classList.add('opacity-0');
			coursePopupWrapper.classList.remove('popup-scale-1');

			setTimeout(() => {
				coursePopupContainer.classList.add('opacity-0');
				coursePopupContainer.classList.add('hidden');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});
