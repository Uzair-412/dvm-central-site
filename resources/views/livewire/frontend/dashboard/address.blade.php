<div>
    @push('after-styles')
        <link rel="stylesheet" href="/assets/styles/my-address.css" />
    @endpush
    <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200">My Address</div>
        <div class="mt-5 w-full overflow-x-scroll lg:overflow-x-hidden">
            <div class="remove-address-pop-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center bg-black bg-opacity-70 @if(!@$addressid){{'hidden opacity-0'}}@endif">
                <div class="remove-address-pop-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 sm:px-20 @if(!@$addressid){{'opacity-0'}}@else{{'enlarged-img-wrapper-scale'}}@endif transform scale-125 transition-all duration-300 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="#EF4444" wire:click="cancelDel()">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="remove-address-popup-msg text-gray-500 mt-2 text-sm md:text-base">This address will be removed from your cart.</div>
                    <div class="remove-address-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-4">
                        <button type="button" class="remove-addr-cancel-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max text-center" wire:click="cancelDel()"> Cancel </button>
                        <button type="button" wire:click="destroy()" class="remove-addr-btn btn red-bg red-btn text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Remove</button>
                    </div>
                </div>
            </div>
            @include('includes.partials.messages')
            @if($is_create_address || @$address)
                @if(@$address)
                    {{-- {!! Form::model($address, ['method' => 'PUT', 'route' => ['frontend.user.addresses.update', $address->id]]) !!} --}}
                    <form id="address_form" method="POST" action="/dashboard/addresses/{{ $address->id }}">
                    <input name="_method" type="hidden" value="PUT" />
                @else
                    {{-- {!! Form::open(['route' => ['frontend.user.addresses.store'], 'method' => 'POST']) !!} --}}
                    <form id="address_form" method="POST" action="/dashboard/addresses">
                @endif
                    @csrf
                    @livewire('frontend.dashboard.address-form',['address' => $address,'countries' => $countries])
                    <input type="hidden" name="latitude" id="latitude" value="" />
                    <input type="hidden" name="longitude" id="longitude" value="" />
                    <button type="submit" class="ml-2 sm:ml-4 btn px-6 py-3 tracking-widest relative overflow-hidden mt-2 btn blue-btn z-10 lite-blue-bg-color text-white">Submit</button>
                    <button type="button" class="ml-2 sm:ml-4 btn px-6 py-3 tracking-widest relative overflow-hidden mt-2 btn blue-btn z-10 bg-red-500 text-white" wire:click="createAddress(false)">Cancel</button>
                {!! Form::close() !!}
                <script>
                    setTimeout(async () => {
                        let address_form = document.querySelector('#address_form');
                        address_form.addEventListener('submit', (e)=>{
                            e.preventDefault();
                            let address_1 = e.target.querySelector('input[name=address1]').value;
                            let address_2 = e.target.querySelector('input[name=address2]').value;
                            
                            let address = address_1;
                            if(address_2!=null && address_2!='')
                            {
                                address += ', '+address_2;
                            }
                            address +=`, ${e.target.querySelector('input[name=city]').value}, ${e.target.querySelector('select[name=state]').value}, ${e.target.querySelector('input[name=zip]').value}`;
                            let geocoder = new google.maps.Geocoder();
                            geocoder.geocode({'address': address}, function(results, status) {
                                if (status == 'OK') {
                                    e.target.querySelector('input[name=latitude]').value = results[0].geometry.location.lat();
                                    e.target.querySelector('input[name=longitude]').value = results[0].geometry.location.lng();
                                    e.target.submit();
                                } else {
                                    console.log('Geocode was not successful for the following reason: ' + status);
                                }
                            });
                        });
                    }, 300);
                </script>
            @else
                <a id="create-address" class="cursor-pointer text-white w-max inline-block primary-black-bg mb-6 btn black-btn relative overflow-hidden z-10" wire:click="createAddress(true)">
                    <button class="flex items-center relative overflow-hidden px-5 py-3 pl-4 text-white w-max">
                        <svg xmlns=http://www.w3.org/2000/svg class="h-6 w-6 mr-1" fill=none viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Create Address
                    </button>
                </a>
                <div class="table-heading-container">
                    <div class="table-heading-wrapper grid grid-cols-7 lg:grid-cols-8 items-center bg-gray-100 px-4 py-2 border border-solid border-gray-200 font-semibold text-sm md:text-base">
                        <div class="table-heading">Name</div>
                        <div class="table-heading lg:col-span-2">Company</div>
                        <div class="table-heading col-span-2">Address</div>
                        <div class="table-heading text-center">Phone</div>
                        <div class="table-heading text-center leading-snug">Default Shipping</div>
                        <div class="table-heading text-center">Actions</div>
                    </div>
                    @if(count($addresses)>0)
                        @foreach($addresses as $key => $address)
                            <div class="db-detail-wrapper text-gray-500 text-xs md:text-sm">
                                <div class="db-detail grid grid-cols-7 lg:grid-cols-8 items-center mt-5 px-4 py-2 bg-white border border-solid border-gray-200 db-links relative overflow-hidden z-10">
                                    <div id="user-name">{{ $address->first_name . ' ' . $address->last_name }}</div>
                                    <div id="user-company" class="lg:col-span-2">@if(trim($address->company) != null) {{ $address->company }} @else N/A @endif</div>
                                    <div class="col-span-2" id="user-address">{{ $address->address1.' '.$address->address2.', '.$address->city.', '. \App\Models\State::get_state_name($address->state) .', '.$address->zip.', '. \App\Models\Country::get_country_name($address->country) }}</div>
                                    <div id="user-phone" class="text-center">@if(trim($address->phone) != null) {{ $address->phone }} @else N/A @endif</div>
                                    <div id="default-shipping-wrapper" class="flex justify-center items-start">
                                        @if($address->default_shipping == 'Y')
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="#418ffe">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="#DF3734">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="actions-wrapper flex justify-center items-start">
                                        <a class="cursor-pointer transition-all duration-300 ease-in-out hover:bg-black rounded-full w-8 h-8 inline-flex items-center justify-center" wire:click="setAddress({{ $address->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                            </svg>
                                        </a>
                                        <form wire:submit.prevent="destroy({{ $address->id }})" method="POST" id="address_form_{{ $address->id }}" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <div class="cursor-pointer ml-2 delete-addr-btn rounded-full transition-all duration-500 ease-in-out hover:bg-black w-8 h-8 inline-flex items-center justify-center" id="{{ $address->id }}">
                                            <svg xmlns=http://www.w3.org/2000/svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="#DF3734" wire:click="delete_address_func({{ $address->id }})" >
                                                <path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>												
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center mt-2 text-blue-500">
                            <strong class="text-blue-500">Sorry</strong>, no address found.
                        </div>
                    @endif
                </div>
            @endif
        </div>
        @push('after-scripts')
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHOn1pUHE2ctZTKuN_s49A9rt0wAtqGFI" ></script>
            <script defer src="/assets/js/my-address.js"></script>
            {{-- <script type="text/javascript">
                document.addEventListener('DOMContentLoaded', function () {
                    @this.on('addressid', userId => {
                        console.log("address", userId);
                    });
                })
            </script> --}}
        @endpush
</div>
