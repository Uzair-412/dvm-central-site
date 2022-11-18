// Create a Stripe client.
var stripe = Stripe(document.getElementById('frm_payment').getAttribute('publishable-key'));
// Create an instance of Elements.
var elements = stripe.elements();
// Set up Stripe.js and Elements to use in checkout form
var style = {
	base: {
		color: '#32325d'
	}
};

var card = elements.create('card', {
	iconStyle: 'solid',
	style: {
		base: {
			iconColor: '#333333',
			color: '#333333',
			fontWeight: 500,
			fontFamily: 'Titillium Web, Open Sans, Segoe UI, sans-serif',
			fontSize: '18px',
			fontSmoothing: 'antialiased',

			':-webkit-autofill': {
				color: '#fce883'
			},
			'::placeholder': {
				color: '#666666'
			}
		},
		invalid: {
			iconColor: '#FF0000',
			color: '#FF0000'
		}
	}
});
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function (event) {
	var displayError = document.getElementById('card-errors');
	if (event.error) {
		displayError.classList.remove('d-none');
		displayError.textContent = event.error.message;
	} else {
		displayError.classList.add('d-none');
		displayError.textContent = '';
	}
});

// Handle form submission.
var form = document.getElementById('frm_payment');
form.addEventListener('submit', function (event) {
	//show_overlay();

	event.preventDefault();
	console.log(event);
	return false;
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
	// Insert the token ID into the form so it gets submitted to the server
	var form = document.getElementById('frm_payment');
	var hiddenInput = document.createElement('input');
	hiddenInput.setAttribute('type', 'hidden');
	hiddenInput.setAttribute('name', 'stripeToken');
	hiddenInput.setAttribute('value', token.id);
	form.appendChild(hiddenInput);

	// Submit the form
	form.submit();
}

$(function () {
	$('#btn_stripe_pay').on('click', function () {
		$('#modal_stripe').modal('show');
	});
});
