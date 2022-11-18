// remove from document popup
let removeDocumentBtn = document.querySelectorAll('.delete-doc-btn'),
	removeDocumentPopupContainer = document.querySelector('.remove-document-pop-container'),
	removeDocumentPopupWrapper = document.querySelector('.remove-document-pop-wrapper'),
	removeDocumentPopup = document.querySelectorAll('.remove-document-pop-container, .delete-doc-btn, .remove-document-cancel-btn');

removeDocumentBtn.forEach((b) => {
	b.addEventListener('click', () => {
		let id = b.getAttribute('id');
		removeDocumentPopupContainer.classList.remove('hidden');
		document.body.classList.add('body-height');
		setTimeout(() => {
			removeDocumentPopupContainer.classList.remove('opacity-0');
			removeDocumentPopupWrapper.classList.remove('opacity-0');
			removeDocumentPopupWrapper.classList.add('enlarged-img-wrapper-scale');
			document.querySelector('.remove-document-btn').addEventListener('click', () => {
				document.querySelector(`#document_form_${id}`).submit();
			});
		}, 100);
	});
});

window.addEventListener('click', (e) => {
	removeDocumentPopup.forEach((btn) => {
		if (e.target === btn) {
			removeDocumentPopupWrapper.classList.add('opacity-0');
			removeDocumentPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
			setTimeout(() => {
				removeDocumentPopupContainer.classList.add('opacity-0');
				removeDocumentPopupContainer.classList.add('hidden');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});
