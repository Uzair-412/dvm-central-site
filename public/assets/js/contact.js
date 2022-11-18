
$('#contact-us-button').on('click', function () {
    let data = $('#frm_contact').serialize();
    document.querySelector('#contact-us-button').setAttribute("disabled", "");
    $.ajax({
        method: "POST",
        url: "contact/send",
        data: data
    })
    .done(function (msg) {
        if (msg.status == '1') {
            showAlert(error_message ='Thank you for Contacting us. We will get back to you soon.', {
                text: 'Login',
                type: 'error'
            });
            document.querySelector('#contact-us-button').removeAttribute('disabled');
            document.getElementById("frm_contact").reset();
        }
    });
    return false;
});

function showAlert(text = '') {
	let alertPopupContainer = document.querySelector('.alert-pop-container'),
		alertPopupWrapper = document.querySelector('.alert-pop-wrapper');
	alertPopupContainer.classList.remove('hidden');
	document.body.classList.add('body-height');
    document.querySelector('.alert-pop-btns-wrapper').classList.add('hidden');
	setTimeout(() => {
		alertPopupContainer.classList.remove('opacity-0');
		alertPopupWrapper.classList.remove('opacity-0');
		alertPopupWrapper.classList.add('enlarged-img-wrapper-scale');
		alertPopupWrapper.querySelector('.alert-popup-msg').innerHTML = text;

	}, 100);
}

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

$(document).keydown(function(e) {
    // ESCAPE key pressed
    if (e.keyCode == 27) {
        hideAlert();
    }
});