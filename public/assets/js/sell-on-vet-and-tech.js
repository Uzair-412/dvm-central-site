let getStartedBtn = document.querySelector('.get-started-btn'),
	formContainer = document.querySelector('.get-started-container');

getStartedBtn.addEventListener('click', () => {
	formContainer.classList.remove('hidden');
	getStartedBtn.style.display = 'none';

	setTimeout(() => {
		formContainer.classList.remove('opacity-0');
		formContainer.scrollIntoView({
			behavior: 'smooth',
			block: 'top'
		});
	}, 100);
});

let lazyImg = document.querySelector('.lazy-imgs');

window.addEventListener('load', () => {
	let initialSrc = lazyImg.getAttribute('data-src');
	lazyImg.src = initialSrc;
});


document.querySelectorAll('#frm_contact input.required, #frm_contact select.required, #frm_contact textarea.required').forEach((inputs) => {
	inputs.addEventListener('change', (e) => {
		if (e.target.value == '') {
			e.target.classList.add('border-red-500');
			setTimeout(() => {
				e.target.classList.remove('border-red-500');
			}, 2000);
		} else {
			e.target.classList.remove('border-red-500');
		}
		if (e.target.getAttribute('type') == 'email') {
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(e.target.value)) {
				e.target.classList.remove('border-red-500');
				document.querySelector('#error_email').innerHTML = '';
			} else {
				e.target.classList.add('border-red-500');
				document.querySelector('#error_email').innerHTML = 'Email is not valid!';
				setTimeout(() => {
					e.target.classList.remove('border-red-500');
				}, 2000);
			}
		}
	});
});

document.querySelector('#frm_contact').addEventListener('submit', async (e) => {
	e.preventDefault();
	let submission = true;
	await document.querySelectorAll('#frm_contact input.required,  #frm_contact select.required, #frm_contact textarea.required').forEach((inputs) => {
		if (inputs.value == '') {
			inputs.classList.add('border-red-500');
			setTimeout(() => {
				e.target.classList.remove('border-red-500');
			}, 2000);
			submission = false;
		} else {
			inputs.classList.remove('border-red-500');
		}
		if (inputs.getAttribute('type') == 'email' && inputs.value != '') {
			if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(inputs.value)) {
				inputs.classList.remove('border-red-500');
				document.querySelector('#error_email').innerHTML = '';
			} else {
				inputs.classList.add('border-red-500');
				document.querySelector('#error_email').innerHTML = 'Email is not valid!';
				submission = false;
				setTimeout(() => {
					e.target.classList.remove('border-red-500');
				}, 2000);
			}
		}
	});
	if (submission == true) {
		document.querySelector('#frm_contact').submit();
	}
	// return false;
});
