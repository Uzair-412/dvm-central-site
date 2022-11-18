
// remove from address popup
/*
let removeAddressBtn = document.querySelectorAll('.delete-addr-btn'),
	removeAddressPopupContainer = document.querySelector('.remove-address-pop-container'),
	removeAddressPopupWrapper = document.querySelector('.remove-address-pop-wrapper'),
	removeAddressPopup = document.querySelectorAll('.remove-address-pop-container, .delete-addr-btn, .remove-addr-cancel-btn');

removeAddressBtn.forEach((b) => {
	b.addEventListener('click', () => {
		let id = b.getAttribute('id');
		removeAddressPopupContainer.classList.remove('hidden');
		document.body.classList.add('body-height');
		setTimeout(() => {
			removeAddressPopupContainer.classList.remove('opacity-0');
			removeAddressPopupWrapper.classList.remove('opacity-0');
			removeAddressPopupWrapper.classList.add('enlarged-img-wrapper-scale');
			document.querySelector('.remove-addr-btn').addEventListener('click', () => {
				document.querySelector(`#address_form_${id}`).submit();
			});
		}, 100);
	});
});

window.addEventListener('click', (e) => {
	removeAddressPopup.forEach((btn) => {
		if (e.target === btn) {
			removeAddressPopupWrapper.classList.add('opacity-0');
			removeAddressPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
			setTimeout(() => {
				removeAddressPopupContainer.classList.add('opacity-0');
				removeAddressPopupContainer.classList.add('hidden');
				document.body.classList.remove('body-height');
			}, 300);
		}
	});
});
*/
async function getLatLng(address)
{
    let geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address}, function(results, status) {
        if (status == 'OK') {
            let latitude = results[0].geometry.location.lat;
            let longitude = results[0].geometry.location.lng;
            console.log("results", results);
            console.log({latitude, longitude});
            // $.ajax({
            //     url:'/latitude-longitude/save',
            //     data:{latitude, longitude},
            //     method:"POST",
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     success: function(response){}
            // });
        } else {
            console.log('Geocode was not successful for the following reason: ' + status);
        }
    });
}