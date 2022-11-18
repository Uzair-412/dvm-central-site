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

//Start disable button when click once

var disableButton = (e) => {
  $("#disable-button").prop("disabled", true);
  $('#disable-button').text('Processing, Please Wait ...');
  $('#disable-button').addClass('animate-pulse');
  $("#frm_payment").submit();
};
$(document).on("click", "#disable-button", disableButton);

//End

// remove all cart popup
let removeAllCartBtn = document.querySelector(".all-delete-wrapper"),
  removeAllCartPopupContainer = document.querySelector(
    ".remove-all-cart-pop-container"
  ),
  removeAllCartPopupWrapper = document.querySelector(
    ".remove-all-cart-pop-wrapper"
  ),
  removeAllCartPopup = document.querySelectorAll(
    ".remove-all-cart-pop-container, .remove-all-cart-pop-container .cancel-btn"
  );

removeAllCartBtn?.addEventListener("click", () => {
  removeAllCartPopupContainer.classList.remove("hidden");
  document.body.classList.add("body-height");
  setTimeout(() => {
    removeAllCartPopupContainer.classList.remove("opacity-0");
    removeAllCartPopupWrapper.classList.remove("opacity-0");
    removeAllCartPopupWrapper.classList.add("enlarged-img-wrapper-scale");
  }, 100);
});

removeAllCartPopup?.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    if (e.target === btn) {
      removeAllCartPopupWrapper.classList.add("opacity-0");
      removeAllCartPopupWrapper.classList.remove("enlarged-img-wrapper-scale");
      setTimeout(() => {
        removeAllCartPopupContainer.classList.add("opacity-0");
        removeAllCartPopupContainer.classList.add("hidden");
        document.body.classList.remove("body-height");
      }, 300);
    }
  });
});

// remove from cart popup
let removeCartBtn = document.querySelectorAll(".vendor-item-delete-icon"),
  removeCartPopupContainer = document.querySelector(
    ".remove-from-cart-pop-container"
  ),
  removeCartPopupWrapper = document.querySelector(
    ".remove-from-cart-pop-wrapper"
  ),
  removeCartPopup = document.querySelectorAll(
    ".remove-from-cart-pop-container, .cancel-btn, .remove-from-cart-pop-container .remove-btn"
  );

let cartId = "";
removeCartBtn?.forEach((btn) => {
  btn.addEventListener("click", () => {
    cartId = "";
    cartId = btn.getAttribute("cart-id");
    removeCartPopupContainer.classList.remove("hidden");
    document.body.classList.add("body-height");
    setTimeout(() => {
      removeCartPopupContainer.classList.remove("opacity-0");
      removeCartPopupWrapper.classList.remove("opacity-0");
      removeCartPopupWrapper.classList.add("enlarged-img-wrapper-scale");
    }, 100);
    removeCartPopupContainer
      .querySelector(".remove-btn")
      .addEventListener("click", () => {
        if (cartId != "") {
          Livewire.emit("removeCartItem", cartId);
        }
      });
  });
});

removeCartPopup?.forEach((btn) => {
  btn.addEventListener("click", (e) => {
    if (e.target === btn) {
      removeCartPopupWrapper.classList.add("opacity-0");
      removeCartPopupWrapper.classList.remove("enlarged-img-wrapper-scale");
      setTimeout(() => {
        removeCartPopupContainer.classList.add("opacity-0");
        removeCartPopupContainer.classList.add("hidden");
        document.body.classList.remove("body-height");
      }, 300);
    }
  });
});

let openShippingContainers = document.body.querySelectorAll(
    ".open-vendor-shipping-container"
  ),
  removeShippingContainerBtns = document.body.querySelectorAll(
    ".remove-shipping-pop-btns-wrapper .cancel-btn"
  );
openShippingContainers.forEach((btn) => {
  let vendor_id = btn.getAttribute("vendor-id");
  // When click on shipping cost then open multiple shipping cost options
  btn.addEventListener("click", () => {
    let shippingContainer = document.body.querySelector(
      `#shipping-container-${vendor_id}`
    );
    shippingContainer.classList.remove("hidden");
    document.body.classList.add("body-height");
    setTimeout(() => {
      shippingContainer.classList.remove("opacity-0");
      shippingContainer
        .querySelector(".vendor-shipping-wrapper")
        .classList.remove("opacity-0");
      shippingContainer
        .querySelector(".vendor-shipping-wrapper")
        .classList.add("enlarged-img-wrapper-scale");
    }, 100);
  });
});

removeShippingContainerBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    let vendor_id = btn.getAttribute("vendor-id");
    let shippingContainer = document.body.querySelector(
      `#shipping-container-${vendor_id}`
    );
    shippingContainer.classList.add("opacity-0");
    document.body.classList.remove("body-height");
    shippingContainer
      .querySelector(".vendor-shipping-wrapper")
      .classList.add("opacity-0");
    shippingContainer
      .querySelector(".vendor-shipping-wrapper")
      .classList.remove("enlarged-img-wrapper-scale");
    setTimeout(() => {
      shippingContainer.classList.add("hidden");
    }, 300);
  });
});

function set_selected_shipping_service(vendor_id) {
  var checked_input = $(
    "#div-vendor-shipping-charges-" + vendor_id + " input:checked"
  );
  var vendor_id = $("#vendor_" + vendor_id).val();

  var url = {
    method: "POST",
    url: "/cart/set-vendor-shipping-service",
    data: {
      vendor_id: vendor_id,
      shipping_enc: checked_input.val(),
      _token: $('meta[name="csrf-token"]').attr("content"),
    },
  };

  $.ajax(url).done(function (msg) {
    if (msg.status == "1") {
      self.location.reload();
    }
  });
}

couponForms = document.body.querySelectorAll(".vendor-title-wrapper form");
couponForms.forEach((couponForm) => {
  couponForm.addEventListener("submit", addCoupon);
});

function addCoupon(event) {
  event.preventDefault();
  let vendor_id = this.querySelector("button[type=submit]").getAttribute(
    "vendor-id"
  );
  let couponCode = this.querySelector(`#coupon_code-${vendor_id}`).value;
  $.ajax({
    type: "POST",
    url: "/cart/vendor-coupon",
    data: {
      couponCode: couponCode,
      vendor_id: vendor_id,
    },
    headers: {
      "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content"),
    },
    success: function (response) {
      if (response.error != undefined) {
        // $(`#coupon_code-${vendor_id}`).val('');
        // window.location.reload();
        showAlert(response.error, { text: "", link: "", type: "error" });
      } else {
        Livewire.emit("loadCart");
        setTimeout(() => {
          showAlert("Coupon added in cart");
        }, 1000);
      }
    },
  });
  return false;
}

// Change Existing Address
document.querySelector("#change_address")?.addEventListener("click", () => {
  document.body
    .querySelector(`.change-address-pop-container`)
    .classList.remove("hidden");
  document.body.classList.add("body-height");
  setTimeout(() => {
    document.body
      .querySelector(`.change-address-pop-container`)
      .classList.remove("opacity-0");
    document.body
      .querySelector(".change-address-pop-wrapper")
      .classList.remove("opacity-0");
    document.body
      .querySelector(".change-address-pop-wrapper")
      .classList.add("enlarged-img-wrapper-scale");
  }, 100);
});

document
  .querySelector(".change-addr-cancel-btn")
  ?.addEventListener("click", () => {
    document.body
      .querySelector(".change-address-pop-wrapper")
      .classList.add("opacity-0");
    document.body
      .querySelector(".change-address-pop-wrapper")
      .classList.remove("enlarged-img-wrapper-scale");
    setTimeout(() => {
      document.body
        .querySelector(`.change-address-pop-container`)
        .classList.add("opacity-0");
      document.body
        .querySelector(`.change-address-pop-container`)
        .classList.add("hidden");
      document.body.classList.remove("body-height");
    }, 300);
  });

document.querySelector("#add_new_address")?.addEventListener("click", () => {
  document.querySelector("#select_address_container").classList.add("hidden");
  document
    .querySelector("#shipping_address_detail_container")
    .classList.remove("hidden");
});

document.querySelector("#cancel_new_address")?.addEventListener("click", () => {
  document
    .querySelector("#select_address_container")
    .classList.remove("hidden");
  document
    .querySelector("#shipping_address_detail_container")
    .classList.add("hidden");
});


//Start disable button when click once

// const disableButton = document.querySelector('#disable-button');

// disableButton.addEventListener('click', () => {
// 	disableButton.getAttribute('disabled') = true;
// },

var disableButton = (e) => {
	$("#disable-button").prop("disabled", true);
	$("#frm_payment").submit();
  };
  $(document).on("click", "#disable-button", disableButton);
  //End