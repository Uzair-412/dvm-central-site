<footer class="inline-grid mt-20 w-full">
    <!-- newsletter -->
    <div class="newsletters flex">
        <div
            class="newsletters-wrapper width border-t border-b border-solid border-gray-200 py-12 grid md:grid-cols-2 gap-4">
            <div class="flex flex-col relative">
                <h3 class="font-semibold text-xl sm:text-3xl">Newsletter</h3>
                <p class="text-gray-500 mt-3 leading-snug text-sm sm:text-base">Subscribe to get information about
                    products and coupons</p>
            </div>
            <div class="newsletters-input-wrapper">
                <form class="flex flex-col sm:flex-row sm:items-center" id="frm_subscribe"
                    name="frm_subscribe" action="/subscribe" method="POST">
                    @csrf
                    <input type="email" id="subs_email" name="email" placeholder="Email Address ...."
                        class="border border-solid border-gray-200 p-3 w-full sm:w-8/12 newsletter-input h-auto" />
                    <input type="hidden" name="subs_type" id="sub_type" value="footer" />
                    <button type="submit"
                        class="btn blue-btn lite-blue-bg-color text-white w-max sm:w-4/12 px-6 py-3 h-auto relative overflow-hidden z-10 mt-4 sm:mt-0">Subscribe</button>
                </form>
                <div class="hidden response-div text-green-600 w-full" id="response_div">
                </div>
            </div>
        </div>

    </div>
    <div
        class="footer-wrapper grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 lg:flex justify-between width py-12">
        <div class="footer-contact-details">
            <h3 class="footer-heading text-xl font-semibold">Find Us</h3>
            <ul class="footer-contact-details-wrapper grid grid-cols-1 gap-3 text-sm sm:text-base text-gray-500">
                <!-- <li class="mt-6">
                    <a class="underline-links relative inline w-max overflow-hidden" href="/contact">Google Map</a>
                </li>
                <li>Monday - Friday 9AM&#x2013;5PM (EST) </li> -->
                <li>
                    <address>1201 North Market Street, Suite 111, Wilmington, DE 19801</address>
                </li>
                <li>
                    <span>Ph: </span><a href="tel:+13024097530">302-409-7530</a>
                </li>
                <li class="social-info flex mt-4">
                    <a href="https://www.facebook.com/vetandtech" target="_blank">
                        <img class="mr-3" data-src="assets/icons/facebook.svg" alt="facebook account" />
                    </a>
                    <a href="https://twitter.com/VetandTech" target="_blank">
                        <img class="mr-3" data-src="assets/icons/twitter.svg" alt="twitter account" />
                    </a>
                    <a href="https://www.linkedin.com/company/vetandtech" target="_blank">
                        <img class="mr-3 linkedin" data-src="assets/icons/linkedin.svg" alt="linkedin account" />
                    </a>
                    <a href="https://www.instagram.com/vetandtechofficial" target="_blank">
                        <img class="mr-3" data-src="assets/icons/instagram.svg" alt="instagram account" />
                    </a>
                </li>
            </ul>
            <div class="app-down-btn mt-6 flex flex-row">
                <a href="https://play.google.com/store/apps/details?id=com.gtechsources.vetandtech.app" target="_blank"><img width="125px" class=" lazyloaded" data-src="splash/assets/img/vet-tech/shape/btn1.png" alt="Blob" src="splash/assets/img/vet-tech/shape/btn1.png"></a>
                <a href="https://apps.apple.com/pk/app/vet-and-tech/id1634400448" target="_blank"><img width="125px" class="ml-1 lazyloaded" data-src="splash/assets/img/vet-tech/shape/btn2.png" alt="Blob" src="splash/assets/img/vet-tech/shape/btn2.png"></a>
            </div>
        </div>

        <div class="footer-about-details">
            <h3 class="footer-heading text-xl font-semibold">Buy With Confidence</h3>
            <ul class="footer-about-details-wrapper grid grid-cols-1 gap-3 text-sm sm:text-base text-gray-500">
                {{-- <li class="mt-6">
                    <a class="underline-links relative inline-block w-max overflow-hidden" href="#">Satisfaction
                        Guaranteed
                    </a>
                </li> --}}
                {{-- <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="#">Testimonials</a>
                </li> --}}
                <li class="mt-6">
                    <a class="underline-links relative inline-block w-max overflow-hidden" href="{{ route('frontend.about-us') }}">About Us
                    </a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.faqs') }}">FAQ's</a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.our-mission') }}">Our Mission</a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="/contact-us">Contact</a>
                </li>

                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.privacy-policy') }}">Privacy Policy</a>
                </li>


                {{-- <li class="underline-links relative inline-block w-max overflow-hidden">
                    <a href="{{ route('frontend.pages', ['warranty']) }}">Warranty</a>
                </li> --}}
                {{-- <li class="underline-links relative inline-block w-max overflow-hidden">
                    <a href="#">Sitemap</a>
                </li> --}}
            </ul>
        </div>

        <div class="footer-support-details text-sm sm:text-base">
            <h3 class="footer-heading text-xl font-semibold">Vet Resources</h3>
            <ul class="footer-support-details-wrapper grid grid-cols-1 gap-3 text-gray-500">
                <li class="mt-6">
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="/courses/categories">Courses</a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.resources.programs') }}">Educational Programs</a>
                </li>
                <!-- <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.resources.online-resources') }}">Online Resources</a>
                </li> -->
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.resources.associations') }}">Associations</a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.resources.surgical-procedures') }}">Surgical Procedures</a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden"
                        href="{{ route('frontend.shows') }}">Trade Shows</a>
                </li>
                {{-- <li class="underline-links relative inline-block w-max overflow-hidden mt-6">
                    <a href="{{ route('frontend.pages', ['privacy-policy']) }}">Privacy Policy</a>
                </li>
                <li class="underline-links relative inline-block w-max overflow-hidden">
                    <a href="{{ route('frontend.pages', ['terms-and-conditions']) }}">Terms & Conditions</a>
                </li> --}}
            </ul>
        </div>

        <div class="footer-business-details">
            <h3 class="footer-heading text-xl font-semibold">Business</h3>
            <ul class="footer-business-details-wrapper grid grid-cols-1 gap-3 text-sm sm:text-base text-gray-500">
                <li class="mt-6">
                    <a class="underline-links relative inline-block w-max overflow-hidden" aria-label="Shop"
                        href="/shop">Shop</a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden" aria-label="Vendors" href="{{route('frontend.vendors')}}">Vendors</a>
                </li>
                <li>
                    <a class="underline-links relative inline-block w-max overflow-hidden" aria-label="Checkout"
                        href="{{ route('frontend.checkout') }}">Checkout</a>
                </li>
                @if (\App\Models\Customer::logged_in())
                    <li>
                        <a class="underline-links relative inline-block w-max overflow-hidden" aria-label="My Account"
                            href="/dashboard">My Account</a>
                    </li>
                @elseif(\App\Models\customer::admin_check())
                    <li>
                        <a class="underline-links relative inline-block w-max overflow-hidden" aria-label="Dashboard"
                            href="/admin/dashboard">Dashboard</a>
                    </li>
                @else
                    <li>
                        <a class="underline-links relative inline-block w-max overflow-hidden"
                            href="/login">Login</a>
                    </li>
                    <li>
                        <a class="underline-links relative inline-block w-max overflow-hidden"
                            href="/register">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="copy-right-container bg-white border-t border-solid border-gray-200 text-xs md:text-sm text-gray-500">
        <div class="copy-right-wrapper grid sm:grid-cols-2 lg:grid-cols-3 gap-4 items-center width py-4">
            <div class="copy-right leading-snug">Copyright © 2022 <strong class="primary-black-color">Vet and
                    Tech</strong>. All Rights Reserved</div>
            <div class="policy-links flex sm:justify-center">
                <!-- <a class="underline-links relative block w-max overflow-hidden"
                    href="{{ route('frontend.privacy-policy') }}">Privacy
                    Policy</a>
                <span class="mx-1">/</span> -->
                {{-- <a class="underline-links relative block w-max overflow-hidden"
                    href="{{ route('frontend.terms-and-conditions') }}">Returns</a>
                <span class="mx-1">/</span> --}}
                <a class="underline-links relative block w-max overflow-hidden"
                    href="{{ route('frontend.terms-and-conditions') }}">Terms & Condition</a>
            </div>
            <div class="secure-payments flex flex-col sm:flex-row md:justify-end sm:items-center mt-4 md:mt-0">
                <span class="mr-2">Payment we accept :</span>
                <img class="ftr-stripe-logo w-8/12 sm:w-5/12 mt-2 sm:mt-0"
                    data-src="{{ asset('assets/imgs/Stripe-3.svg') }}" alt="secure-payments" />
            </div>
        </div>
    </div>
</footer>

@push('after-scripts')
    {{-- @livewire('login-popup') --}}
@endpush
