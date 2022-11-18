<div>
    @php
        if(auth()->user()->type == 'admin'){
            Auth::logout();
            return redirect('/login');
        }
    @endphp
    <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200">Wishlist Products
    </div>
    <div class="mt-4 w-full">
        <div class="vendor-container mt-4 p-2 sm:py-4 sm:px-2  bg-white border border-solid border-gray-200">
            {{-- <div class="vendor-title-container border-b border-solid border-gray-200 pb-2 sm:pb-4">
                <div class="vendor-title-wrapper flex items-center">
                    <a href="#" class="vendor-name flex items-center w-max">
                        <span class="mr-0.5">GerDentUSA</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline" fill="none" viewBox="0 0 24 24"
                            stroke="#333">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div> --}}
            @forelse ($info as $item)
                @if (isset($item->product))
                    @php 
                        $path = 'products/images/thumbnails/' . $item->product->image;
                    @endphp
                    <div class="vendor-wishlist-item flex sm:items-center mt-4 w-full">

                            <div class="flex items-center">
                                <input value="{{ $item->id }}" type="checkbox" name="item[]" class="wishlist-checkbox w-3 h-3 mr-2 text-blue-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                        <a href="{{ $item->product->slug }}"
                            class="wishlist-img-wrapper sm:p-2 border border-solid border-gray-200 w-max relative overflow-hidden">
                            <img class="wishlist-img absolute top-0 left-0 w-full h-full object-contain"
                                src="{{Storage::disk('ds3')->exists($path) ? Storage::disk('ds3')->url($path) : 'https://via.placeholder.com/189X189.png?text=Image+Not+Available+In+The+Bucket'}}"
                                alt="{{$item->product->name}}" />
                        </a>

                        <div class="flex flex-col sm:flex-row w-full justify-between">
                            <div class="wishlist-item-detail flex flex-col sm:flex-row sm:items-center ml-2 sm:mx-4 w-full">
                                <div class="wishlist-item-detail flex flex-col sm:w-9/12 sm:mr-2">
                                    <a href="{{ $item->product->slug }}"
                                        class="wishlist-item-title lite-blue-color text-sm sm:text-base">{{$item->product->name}}</a>
                                    @if ($item->product->type != "variation")
                                    <div class="wishlist-item-sku mt-1 text-xs sm:text-sm text-gray-500">{{$item->product->sku}}
                                    </div>
                                    @else
                                    <div class="wishlist-item-sku mt-1 text-xs sm:text-sm text-red-500">Multiple SKUs, Click for
                                        Details</div>
                                    @endif
                                </div>
                                <div class="flex flex-col sm:items-center sm:w-3/12 mt-2 sm:mt-0">
                                    <div
                                        class="vendor-item-price-col flex flex-row items-center sm:flex-col w-full sm:w-max ml-2 text-right mt-2 sm:mt-0 justify-self-end sm:w-3/12">
                                        @if($item->product->in_stock == 'Y')
                                        @if ($item->product->price_discounted_end > date('Y-m-d'))
                                        <div class="vendor-item-new-price-wrapper font-semibold flex justify-end items-end @if($item->product->type == "variation") hidden @else visible @endif">
                                            <span class="currency mr-1">$</span>
                                            <span class="vendor-item-new-price">{{ $item->product->price }}</span>
                                        </div>
                                        <div
                                            class="vendor-cart-item-old-price text-xs sm:text-sm text-red-500 sm:mt-2 line-through mx-2 sm:mx-0">
                                            ${{$item->product->price_catalog}}</div>

                                        <div
                                            class="vendor-cart-item-disc text-xs sm:text-sm text-gray-500 sm:mt-2 hidden sm:inline-block">
                                            {{round((((($item->product->price_catalog)-$item->product->price))/$item->product->price_catalog)*100,2)}}%
                                            Off</div>
                                        @else
                                        <div class="vendor-item-new-price-wrapper font-semibold flex justify-end items-end @if($item->product->type == "variation") hidden @else visible @endif">
                                            <span class="currency mr-1">$</span>
                                            <span class="vendor-item-new-price">{{
                                                number_format($item->product->price_catalog,2) }}</span>
                                        </div>
                                        @endif
                                        @else
                                        <span class="bg-red-500 text-white text-xs p-1">Out of Stock</span>
                                        @endif

                                        {{-- <div class="vendor-icon-wrapper flex sm:mt-2 justify-end">
                                            <form id="wishlist_item_delete{{ $item->id }}" method="POST" action="{{route('frontend.user.wishlist.destroy', $item->id)}}">
                                                @csrf
                                                @method("DELETE")
                                            </form>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 cursor-pointer vendor-item-delete-icon" fill="none"
                                                viewBox="0 0 24 24" stroke="#333" id="{{ $item->id }}">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </div> --}}
                                    </div>
                                </div>

                                @if ($item->product->type == "variation")
                                <div class="flex sm:items-center sm:w-max sm:ml-2 mt-2 sm:mt-0">
                                    <a href="/{{ $item->product->slug }}"
                                        class="add-cart-btn btn blue-btn lite-blue-bg-color text-white w-max z-10 inline-block relative overflow-hidden p-1 md:p-2 text-xs">More
                                        Details</a>
                                </div>
                                @else
                                <form class="frm_add_to_cart flex flex-col sm:items-center sm:w-max sm:ml-2 mt-2 sm:mt-0"
                                    method="post" action="cart">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$item->product_id}}" />
                                    <input type="hidden" name="cmd" id="cmd" value="add2cart" />
                                    {{-- <div class="vendor-item-quantity-wrapper flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 inline cursor-pointer vendor-item-quantity-add vendor-item-quantity-add"
                                            fill="none" viewBox="0 0 24 24" stroke="#333">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <input type="text" size="4" id="qty" name="qty"
                                            class="vendor-item-quantity h-max mx-2 border-gray-200 border-solid border text-center inline-block sm:py-1"
                                            value="1" />
                                        <svg id="vendor-item-quantity-less" xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 inline cursor-pointer vendor-item-quantity-less" fill="none"
                                            viewBox="0 0 24 24" stroke="#333">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div> --}}
                                    <button type="submit"
                                        class="add-cart-btn btn blue-btn lite-blue-bg-color text-white w-max z-10 inline-block relative overflow-hidden mt-4 p-1 md:p-2 text-xs"
                                        onclick="this.form.cmd.value='add2cart';">Add To Cart</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>

                @elseif(auth()->user()->type == 'admin')
                    @php
                        Auth::logout();
                        return redirect('/login');  
                    @endphp
                @endif
            @empty
                <div class="text-center text-red-500">Your items wishlist is empty</div>
            @endforelse
        </div>
        @if(count($info) > 0)
            <span class="note animate-pulse text-gray-500 text-sm">You can remove multiple wishlist products by checking each of them</span>
            <div wire:ignore class="vendor-icon-wrapper flex sm:mt-2 justify-start">
                <button disabled class="vendor-item-delete-icon btn blue-btn bg-blue-500 text-white border rounded px-3 py-2 flex">Delete 
                </button>
            </div> 
        @endif
        @if($info->hasPages()  && count($info) > 0)
            <div class="flex">
                <div class=" mt-2 wishlist-pagination">
                    <div class="page">
                        {{ $info->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div wire:ignore
        class="remove-wishlist-pop-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center hidden opacity-0">
        <div
            class="remove-wishlist-pop-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 sm:px-20 opacity-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="#EF4444">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="remove-wishlist-popup-msg text-gray-500 mt-2 text-sm md:text-base">Are You Sure You Want To Remove The Selected Items.</div>
            <div class="remove-wishlist-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-4">
                <button
                    class="remove-wl-cancel-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max text-center">Cancel</button>
                <button
                    class="remove-wl-btn btn red-bg red-btn text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Remove</button>
            </div>
        </div>
    </div>
    <div class="user-title text-xl md:text-2xl font-semibold pb-4 border-b border-dashed border-gray-200 mt-4">Wishlist Jobs
    </div>
    {{-- @include('includes.partials.messages') --}}
    <div class="mt-4 w-full">
        <div class="vendor-container mt-4 p-2 sm:p-4 bg-gray-100 border border-solid border-gray-200">
            @forelse ($jobs as $job)
                <div class="job-card bg-white border border-solid border-gray-200 p-2 md:p-4 mt-2 card relative overflow-hidden">
                    <span class="left absolute top-0 left-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-top delay-200"></span>
                    <span class="right absolute top-0 right-0 w-px h-full lite-blue-bg-color transition-all duration-300 transform origin-bottom delay-200"></span>
                    <span class="top absolute top-0 right-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-right delay-200"></span>
                    <span class="bottom absolute bottom-0 left-0 w-full h-px lite-blue-bg-color transition-all duration-300 transform origin-left"></span>

                    <div class="job-title-wrapper flex justify-between items-center">

                        <div class="flex">
                            <div class="flex items-center">
                                <input value="{{ $job->id }}" type="checkbox" name="jobs[]" class="wishlist-jobs-checkbox w-3 h-3 mr-2 text-blue-600 bg-gray-100 rounded border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            </div>
                            <a class="underline-links relative overflow-hidden inline-block"
                                href="/jobs/detail/{{ $job->vendor_job->slug }}">
                                <h3 class="job-title font-semibold text-base md:text-xl">{{ $job->vendor_job->title }}</h3>
                            </a>
                        </div>
                        {{-- <button wire:click="delete_wishlist_job({{ $job->job_id }})"
                            class="rounded-full p-1 transition duration-300 ease-in-out hover:bg-gray-100 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 cursor-pointer " fill="none"
                                viewBox="0 0 24 24" stroke="#333">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button> --}}
                    </div>
                    <div class="job-info text-gray-500 flex flex-wrap text-xs">
                        <div class="mt-2 mr-2 md:mr-4">
                            <span>Company : </span>
                            <span
                                class="job-compnay font-semibold primary-black-color">{{ $job->vendor_job->vendor->name }}</span>
                        </div>
                        <div class="mt-2 mr-2 md:mr-4">
                            <span>Posted On : </span>
                            <span
                                class="job-post-date font-semibold primary-black-color">{{ date('m-d-Y', $job->vendor_job->created_time) }}</span>
                        </div>
                        <div class="mt-2 mr-2 md:mr-4">
                            <span>Salary : </span>
                            <span class=" font-semibold primary-black-color">
                                <span class="mr-0.25 salary-amount">${{ $job->vendor_job->salary }}</span>
                                <span class="salary-type">{{ $job->vendor_job->salary_type_->name }}</span>
                            </span>
                        </div>
                        <div class="mt-2 mr-2 md:mr-4">
                            <span>State : </span>
                            <span class="font-semibold primary-black-color state">
                                {!! \App\Models\State::get_state_name($job->vendor_job->state_id) !!}
                            </span>
                        </div>
                        <div class="mt-2 mr-2 md:mr-4">
                            <span>Country : </span>
                            <span class="font-semibold primary-black-color state">
                                {!! \App\Models\Country::get_country_name($job->vendor_job->country_id) !!}
                            </span>
                        </div>
                        <div class="mt-2 mr-2 md:mr-4 job-card-job-type font-semibold lite-blue-color">
                            {!! \App\Models\JobWorkingTime::job_working_time($job->vendor_job->working_time_id) !!}
                        </div>
                    </div>
                    @if ($job->vendor_job->urgent_hiring)
                        <div>
                            <div class="mt-2 mr-2 md:mr-4 job-card-job-type font-semibold text-sm">
                                <span class="flex flex-wrap items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-4 w-4 mr-1 lite-blue-color rounded-full" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    urgent hiring
                                </span>
                            </div>
                        </div>
                    @endif
                    <p class="job-description text-xs md:text-sm text-gray-500 mt-2">
                    <div class="text-sm text-gray-500">
                        {!! $job->vendor_job->description !!}
                    </div>
                    </p>

                    <div class="job-hashtag-wrapper mt-2 flex flex-wrap">
                        @foreach ($job->vendor_job->job_categories as $key => $category)
                            @if(@$category->category->name)
                                <button class="cursor-pointer hashtag relative overflow-hidden inline-block z-10 lite-blue-bg-color text-white px-2 py-1 text-xs mr-2">
                                    {{ $category->category->name }}
                                </button>
                            @endif
                        @endforeach
                    </div>
                </div>
            @empty
            <div class="text-center text-red-500">Your jobs wishlist is empty</div>
            @endforelse
        </div>
        @if(count($jobs) > 0)
            <span class="note animate-pulse text-gray-500 text-sm">You can remove multiple wishlist jobs by checking each of them</span>
            <div class="vendor-icon-wrapper flex sm:mt-2 justify-start">
                <button wire:ignore disabled class="vendor-jobs-delete-icon btn blue-btn bg-blue-500 text-white border rounded px-3 py-2 flex">Delete 
                </button>
            </div> 
        @endif
        @if($jobs->hasPages() && count($jobs) > 0)
            <div class="flex style">
                <div class="ml-3 mt-2 jobs-pagination">
                    {{ $jobs->links('pagination::tailwind') }}
                </div>
            </div>
        @endif
    </div>

    <div
        class="remove-wishlist-pop-container fixed top-0 left-0 w-screen h-screen z-50 flex justify-center items-center hidden opacity-0">
        <div
            class="remove-wishlist-pop-wrapper flex flex-col justify-center items-center bg-white py-6 px-6 sm:px-20 opacity-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="#EF4444">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div class="remove-wishlist-popup-msg text-gray-500 mt-2 text-sm md:text-base">This item will be removed from your wishlist.</div>
            <div class="remove-wishlist-pop-btns-wrapper flex justify-center items-center flex-col sm:flex-row mt-4">
                <button
                    class="remove-wl-cancel-btn btn blue-btn lite-blue-bg-color text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max text-center">Cancel</button>
                <button
                    class="remove-wl-btn btn red-bg red-btn text-white z-10 py-2 px-4 md:px-6 overflow-hidden relative block w-max sm:ml-4 mt-2 sm:mt-0">Remove</button>
            </div>
        </div>
    </div>
</div>
@push('after-scripts')

    <script>

        setInterval(() => {
        Livewire.emit('loadWishlist');
        // alert('hello');
        }, 3000);
    </script>
    <script>
        setInterval(() => {
            // Product wishlist button on click check if any item selected otherwise disabled the button
            let wishlistCheckboxes = document.querySelectorAll('.wishlist-checkbox');
            wishlistCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener('click', () => {
                    let inputObj;
                    let selectedCount = 0;
                        for(let count1 = 0; count1 < wishlistCheckboxes.length; count1++) {
                            inputObj = wishlistCheckboxes[count1];
                            let type = inputObj.getAttribute("type");
                            if (type == 'checkbox' && inputObj.checked) {
                                selectedCount++;
                            }
                        }
                    if(selectedCount < 1){
                        document.querySelector('.vendor-item-delete-icon').disabled =true;
                    }else{
                        document.querySelector('.vendor-item-delete-icon').disabled =false;
                    }
                });
            });

            // Job wishlist button on click check if any item selected otherwise disabled the button
            let jobWishlistCheckboxes = document.querySelectorAll('.wishlist-jobs-checkbox');
            jobWishlistCheckboxes.forEach((checkbox) => {
                checkbox.addEventListener('click', () => {
                    let inputObj;
                    let selectedCount = 0;
                        for(let count1 = 0; count1 < jobWishlistCheckboxes.length; count1++) {
                            inputObj = jobWishlistCheckboxes[count1];
                            let type = inputObj.getAttribute("type");
                            if (type == 'checkbox' && inputObj.checked) {
                                selectedCount++;
                            }
                        }
                    if(selectedCount < 1){
                        document.querySelector('.vendor-jobs-delete-icon').disabled =true;
                    }else{
                        document.querySelector('.vendor-jobs-delete-icon').disabled =false;
                    }
                });
            });
        }, 2000);

        setInterval(() => {
        // remove from wishlist popup
        let removeWishlistBtn = document.querySelectorAll('.vendor-item-delete-icon'),
            removeWishlistPopupContainer = document.querySelector('.remove-wishlist-pop-container'),
            removeWishlistPopupWrapper = document.querySelector('.remove-wishlist-pop-wrapper'),
            removeWishlistPopup = document.querySelectorAll('.remove-wishlist-pop-container, .remove-wl-cancel-btn');

        removeWishlistBtn.forEach((btn) => {
            btn?.addEventListener('click', () => {
                let itemId = btn.getAttribute('id');
                removeWishlistPopupContainer.classList.remove('hidden');
                document.body.classList.add('body-height');
                setTimeout(() => {
                    removeWishlistPopupContainer.classList.remove('opacity-0');
                    removeWishlistPopupWrapper.classList.remove('opacity-0');
                    removeWishlistPopupWrapper.classList.add('enlarged-img-wrapper-scale');
                }, 100);

                document.querySelector(`.remove-wishlist-pop-container .remove-wl-btn`).addEventListener('click', () => {
                    removeWishlistPopupWrapper.classList.add('opacity-0');
                    removeWishlistPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
                    removeWishlistPopupContainer.classList.add('opacity-0');
                        removeWishlistPopupContainer.classList.add('hidden');
                        document.body.classList.remove('body-height');
                    wishlist_array =[];
                    markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
                    for (var checkbox of markedCheckbox) {
                        wishlist_array.push(checkbox.value);
                    }
                    var url = {
                        method: "DELETE",
                        url: "/dashboard/wishlist/"+wishlist_array,
                        data: {
                        data: wishlist_array,
                        _token: $('meta[name="csrf-token"]').attr("content"),
                        },
                    };
                    
                    $.ajax(url).done(function (msg) {
                        if (msg.status == "1") {
                            Livewire.emit('updateCartCounts');
                        }
                    });
                });
            });
        });


        // remove from wishlist Job popup
        let removeWishlistJobsBtn = document.querySelector('.vendor-jobs-delete-icon');
        removeWishlistJobsBtn?.addEventListener('click', () => {
                removeWishlistPopupContainer.classList.remove('hidden');
                document.body.classList.add('body-height');
                setTimeout(() => {
                    removeWishlistPopupContainer.classList.remove('opacity-0');
                    removeWishlistPopupWrapper.classList.remove('opacity-0');
                    removeWishlistPopupWrapper.classList.add('enlarged-img-wrapper-scale');
                }, 100);

            document.querySelector(`.remove-wishlist-pop-container .remove-wl-btn`).addEventListener('click', () => {
                removeWishlistPopupWrapper.classList.add('opacity-0');
                removeWishlistPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
                removeWishlistPopupContainer.classList.add('opacity-0');
                    removeWishlistPopupContainer.classList.add('hidden');
                    document.body.classList.remove('body-height');
                wishlist_array =[];
                markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
                for (var checkbox of markedCheckbox) {
                    wishlist_array.push(checkbox.value);
                }
                var url = {
                    method: "DELETE",
                    url: "dashboard/wishlist/remove-all-jobs/"+wishlist_array,
                    data: {
                    data: wishlist_array,
                    _token: $('meta[name="csrf-token"]').attr("content"),
                },
                };
                
                $.ajax(url).done(function (msg) {
                if (msg.status == "1") {
                }
                });
            });
        });
        window.addEventListener('click', (e) => {
            removeWishlistPopup.forEach((btn) => {
                if (e.target === btn) {
                    removeWishlistPopupWrapper.classList.add('opacity-0');
                    removeWishlistPopupWrapper.classList.remove('enlarged-img-wrapper-scale');
                    setTimeout(() => {
                        removeWishlistPopupContainer.classList.add('opacity-0');
                        removeWishlistPopupContainer.classList.add('hidden');
                        document.body.classList.remove('body-height');
                    }, 1000);
                }
            });
        });
    }, 3000);
    </script>
@endpush