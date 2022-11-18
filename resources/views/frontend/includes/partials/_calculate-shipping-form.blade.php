<!-- Modal -->
<div class="shipping-cost-detail-wrapper hidden opacity-0 fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center overflow-y-scroll md:overflow-hidden transition duration-300 ease-in-out">
    <div class="shipping-cost-form bg-white relative opacity-0 delay-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute -top-6 -right-1 sm:-right-6 close-btn cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="#fff">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        <div class="text-lg p-3 bg-gray-100 border-b border-solid border-gray-200 font-semibold">Enter your location</div>

        <form action="{{ route('frontend.cart.set-shipping-location') }}" method="post" id="frm_calculate_shipping_charges">
            @csrf
            <div class="da-zip-code-wrapper flex flex-col px-2 sm:px-4 py-2">
                <label for="da-zip-code" class="pb-1 text-sm text-gray-500 inline-block">Please enter a US zipcode</label>
                <input id="da-zip-code" type="text" name="ship_zipcode" class="border border-solid border-gray-200 p-2" />
            </div>

            <div class="px-2 sm:px-4 pt-1">Or</div>

            <div class="da-select-country-wrapper flex flex-col px-2 sm:px-4 py-2 text-sm text-gray-500">
                <label for="da-select-country" class="pb-1 inline-block">Please select your country</label>
                <select id="da-select-country" name="ship_country" class="border border-solid border-gray-200 pl-1 pr-2 py-2">
                    <option selected>Ship outside the US</option>
                    @foreach($countries as $key => $value)
                        <option value="{{ $value['iso2'] }}">{{ $value['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="delivery-rates-warn text-sm text-gray-500 px-2 sm:px-4 py-2">Delivery rates and time may vary depending the location</div>

            <div class="da-form-btn-wrapper flex justify-end p-2 sm:p-4 pt-2">
                <button type="button" class="relative overflow-hidden px-4 py-2 text-white red-btn red-bg z-10 btn cancel-btn">Cancel</button>
                <button type="submit" class="btn blue-btn lite-blue-bg-color relative overflow-hidden px-4 py-2 text-white ml-2 done-btn z-10">Done</button>
            </div>
        </form>
    </div>
</div>