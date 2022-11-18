@extends('frontend.layouts.home')
@section('main')
    <!-- Start of header section
                          ============================================= -->
    <header id="header-eight" class="main-header-eight">
        <div class="appheader-content">
            <div class="site-logo float-left">
                <a href="#"><img class="lp-logo-img" src="splash/assets/img/vet-tech/logo.svg" alt="DVM Central" /></a>
            </div>
            <div class="nav-wrapper">
                <nav class="navigation-eight ul-li saasio_one_click">
                    <ul>
                        <li><a class="nav-link" href="#vet-and-tech">Vet & Tech </a></li>
                        {{-- <li><a class="nav-link" href="#ei-appdownload">App </a></li> --}}
                        <li><a class="nav-link" href="#vet-resources">Vet Resources</a></li>
                        <li><a class="nav-link" href="#webinar-speakers">Webinar Speakers</a></li>
                        <li><a class="nav-link" href="#events"> Events</a></li>
                        <li><a class="nav-link" href="#seller-portal">Seller Portal</a></li>
                        <li><a class="nav-link" href="#buy-direct"> Buy Direct </a></li>
                        <li><a class="nav-link" href="#faq">FAQs</a></li>
                        {{-- <li><a class="nav-link" href="#ei-faq">Support </a></li> --}}
                    </ul>
                </nav>
                <div class="login-button">
					@livewire('login' )
                </div>

            </div>
        </div>
        <!-- desktop-menu -->
			<div class="appi-ei-mobile_menu relative-position">
				<div class="appi-ei-mobile_menu_button appi-ei-open_mobile_menu">
					<i class="fas fa-bars"></i>
				</div>
				<div class="appi-ei-mobile_menu_wrap">
					<div class="mobile_menu_overlay appi-ei-open_mobile_menu"></div>
					<div class="appi-ei-mobile_menu_content">
						<div class="appi-ei-mobile_menu_close appi-ei-open_mobile_menu">
							<i class="far fa-times-circle"></i>
						</div>
						<div class="m-brand-logo text-center">
							<img src="splash/assets/img/vet-tech/logo.svg" alt="DVM Central" />
						</div>
						<nav class="appi-ei-mobile-main-navigation saasio_one_click clearfix ul-li">
							<ul id="main-nav" class="navbar-nav text-capitalize clearfix">
								<li><a class="nav-link" href="#vet-and-tech">Vet & Tech </a></li>
                        		{{-- <li><a class="nav-link" href="#ei-appdownload">App </a></li> --}}
								<li><a class="nav-link" href="#vet-resources">Vet Resources</a></li>
								<li><a class="nav-link" href="#webinar-speakers">Webinar Speakers</a></li>
								<li><a class="nav-link" href="#events"> Events</a></li>
								<li><a class="nav-link" href="#seller-portal">Seller Portal</a></li>
								<li><a class="nav-link" href="#buy-direct"> Buy Direct </a></li>
								<li><a class="nav-link" href="#faq">FAQs</a></li>
                        		{{-- <li><a class="nav-link" href="#ei-faq">Support </a></li> --}}

							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- /mobile-menu -->
		</header>
		<!-- End of header section
        ============================================= -->

		

		<!-- Start of Hero section
        ============================================= -->
		<section id="vet-and-tech" class="eight-banner-section position-relative">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="eight-banner-content">
							<div class="banner-content-box appeight-headline pera-content">

								<h1 class="cd-headline clip is-full-width">
									Single Source For
									<div class="changing-text-container">
										<span class="changing-text-wrapper first-w">
											<span class="changing-text" data-splitting>Marketplace </span>
										</span>
										{{-- <span class="changing-text-wrapper sec-w">
											<span class="changing-text" data-splitting>VetandTech App - Now Available</span>
										</span> --}}
										<span class="changing-text-wrapper relative sec-w">
											<span class="changing-text" data-splitting>Educational Resources</span>
										</span>
										<span class="changing-text-wrapper third-w">
											<span class="changing-text" data-splitting>Webinars</span>
										</span>
										<span class="changing-text-wrapper fourth-w">
											<span class="changing-text" data-splitting>CE Courses</span>
										</span>
										<span class="changing-text-wrapper fifth-w">
											<span class="changing-text" data-splitting>Educational Programs</span>
										</span>
										<span class="changing-text-wrapper six-w">
											<span class="changing-text" data-splitting>Guides </span>
										</span>
									</div>
								</h1>
								<div class="ei-banner-btn">
									<a id="shop-btn" href="/shop"><i class="fas fa-power-off"></i> Explore <span>MarketPlace</span></a>
								</div>
							</div>
							<div class="ei-banner-mbl-mockup">
								<div class="hero-banner-change first-img">
									<img src="splash/assets/img/vet-tech/hero-banners/marketplace.png" alt="Marketplace" />
								</div>

								{{-- <div class="hero-banner-change sec-img">
									<img src="splash/assets/img/vet-tech/hero-banners/trends.png" alt="Latest Trends" />
								</div> --}}

								<div class="hero-banner-change sec-img">
									<img src="splash/assets/img/vet-tech/hero-banners/edu-res.png" alt="Educational Resources" />
								</div>
								<div class="hero-banner-change third-img">
									<img src="splash/assets/img/vet-tech/hero-banners/webinar.png" alt="Webinars" />
								</div>

								<div class="hero-banner-change fourth-img">
									<img src="splash/assets/img/vet-tech/hero-banners/courses.png" alt="CE Courses" />
								</div>

								<div class="hero-banner-change fifth-img">
									<img src="splash/assets/img/vet-tech/hero-banners/edu-pro.png" alt="Educational Programs" />
								</div>

								<div class="hero-banner-change six-img">
									<img src="splash/assets/img/vet-tech/hero-banners/guides.png" alt="Guides" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="waveWrapper waveAnimation">
				<div class="waveWrapperInner bgTop">
					<div class="wave waveTop" style="background-image: url('splash/assets/img/vet-tech/shape/b-shapeup.png')"></div>
				</div>
				<div class="waveWrapperInner bgMiddle">
					<div class="wave waveMiddle" style="background-image: url('splash/assets/img/vet-tech/shape/b-shapemiddle.png')"></div>
				</div>
				<div class="waveWrapperInner bgBottom">
					<div class="wave waveBottom" style="background-image: url('splash/assets/img/vet-tech/shape/b-shapemiddle.png')"></div>
				</div>
			</div>
		</section>
		<!-- End of Banner section
        ============================================= -->

		<!-- Start of App Download  section
        ============================================= -->
		{{-- <section id="ei-appdownload" class="ei-appdownload-section position-relative" data-background="splash/assets/img/vet-tech/background/appbg1.png">
			<div class="container">
				<div class="ei-appdownload-content">
					<div class="row">
						
						<div class="col-lg-6">
							<div class="ei-app-down-text wow fadeFromLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
								<div class="eight-section-title appeight-headline pera-content text-left">
									<span class="eg-title-tag">
										Download App<i class="square-shape"><i></i><i></i><i></i><i></i></i>
									</span>
									<h2>
										VetAndTech - Now Available
										<span>On Both Android And iPhone Devices</span>
									</h2>
									<p>Download the VetAndTech App And Get Access To Your One-Stop-Resource For Your Veterinary Practices.</p>
								</div>
								<!-- /title -->
								<div class="app-down-btn">
									<a href="https://play.google.com/store/apps/details?id=com.gtechsources.vetandtech.app" target="_blank"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/btn1.png" alt="Blob" /></a>
									<a href="https://apps.apple.com/pk/app/vet-and-tech/id1634400448" target="_blank"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/btn2.png" alt="Blob" /></a>
								</div>
								<div class="ei-download-btn pera-content">
									<a href="/about-us">Learn More About Us... </a>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<div class="ei-app-mockup-img wow fadeFromRight" data-wow-delay="100ms" data-wow-duration="1500ms">
								<img class="lazyload" data-src="splash/assets/img/vet-tech/download-app/mobile-app-2.png" alt="Mobile App" />
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="ei-appdownloaad-shape app-shape1" data-parallax='{"y" : -100}'><img class="lazyload" data-src="splash/assets/img/vet-tech/background/apps1.png" alt="Blob" /></div>
			<div class="ei-appdownloaad-shape app-shape2" data-parallax='{"x" : -120}'><img class="lazyload" data-src="splash/assets/img/vet-tech/background/apps2.png" alt="Blob" /></div>
			<div class="ei-appdownloaad-shape app-shape3" data-parallax='{"y" : -100}'><img class="lazyload" data-src="splash/assets/img/vet-tech/background/apps3.png" alt="Blob" /></div>
		</section> --}}
		<!-- End of App Download section
        ============================================= -->

		<!-- Start of Vet Resources  section
        ============================================= -->
		<section id="vet-resources" class="feature-eight-section position-relative">
			<div class="container">
				<div class="eight-section-title appeight-headline pera-content text-center">
					<span class="eg-title-tag">
						Veterinary Resources <i class="square-shape"><i></i><i></i> <i></i> <i></i> </i>
					</span>
					<h2>Free Vet Tech Resources For <span>Everyone</span></h2>
					<p>Get Free Access To Educational Programs, Webinars, Guides & CE Courses.</p>
				</div>
				<!-- /title -->

				<div class="eight-feature-content">
					<div class="row justify-content-md-center">
						<div class="col-lg-3 col-md-6 wow fadeFromUp" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="eight-feature-box text-center position-relative">
								<div class="feature-icon8 position-relative">
									<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
										<defs>
											<style>
												.cls-1 {
													fill: url(#linear-gradient);
												}
												.cls-2 {
													fill: url(#linear-gradient-2);
												}
												.cls-3 {
													fill: url(#linear-gradient-3);
												}
												.cls-4 {
													fill: url(#linear-gradient-4);
												}
												.cls-5 {
													fill: url(#linear-gradient-5);
												}
												.cls-6 {
													fill: url(#linear-gradient-6);
												}
												.cls-7 {
													fill: url(#linear-gradient-7);
												}
											</style>
											<linearGradient id="linear-gradient" x1="22.75" y1="37.76" x2="22.75" y2="8.48" gradientUnits="userSpaceOnUse">
												<stop offset="0" stop-color="#52c6f6" />
												<stop offset="1" stop-color="#f021da" />
											</linearGradient>
											<linearGradient id="linear-gradient-2" x1="30.43" y1="42.56" x2="30.43" y2="25.61" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-3" x1="30.14" y1="18.84" x2="30.14" y2="15.68" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-4" x1="15.34" y1="22.83" x2="15.34" y2="19.67" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-5" x1="30.14" y1="22.83" x2="30.14" y2="19.67" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-6" x1="15.34" y1="18.85" x2="15.34" y2="15.68" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-7" x1="14.14" y1="26.4" x2="14.14" y2="23.94" xlink:href="#linear-gradient" />
										</defs>
										<path
											class="cls-1"
											d="M7.07,9a1.19,1.19,0,0,1,1.52-.39c4.17,1.32,8.34,2.62,12.52,3.93,1.75.55,1.75.54,3.53,0L36.77,8.7a4.94,4.94,0,0,1,.55-.15.84.84,0,0,1,1,.66,2.81,2.81,0,0,1,.06.65c0,4.77,0,9.53,0,14.3a3,3,0,0,1-.08.73.87.87,0,0,1-.81.69.91.91,0,0,1-.86-.75,4.54,4.54,0,0,1,0-.74V10.58l-13,4.07v8.82a4.53,4.53,0,0,1-.08,1,.78.78,0,0,1-.81.67.84.84,0,0,1-.84-.66,2.93,2.93,0,0,1,0-.73V14.58l-13-4.07V32.73c.49.17,1,.35,1.52.51l8.53,2.67a3.38,3.38,0,0,1,.69.26A.85.85,0,0,1,19,37.75a4.61,4.61,0,0,1-.64-.16Q13.27,36,8.14,34.36a6.83,6.83,0,0,1-1.07-.56Z"
										/>
										<path
											class="cls-2"
											d="M44.05,36.59c-.34.38-.71.69-1.28.43-.12-.06-.31,0-.46,0a.87.87,0,0,1-1.08-1.2s0-.06,0-.08c.79-1.38.38-2.88.49-4.42l-3.59,1c-2.41.72-4.82,1.44-7.22,2.18a2.5,2.5,0,0,1-1.6,0c-1.85-.57-3.71-1.12-5.67-1.7-.06,2.46,0,4.85,0,7.33a35.4,35.4,0,0,0,13,0V38.36c0-.85,0-1.69,0-2.54a2.22,2.22,0,0,1,.09-.73.78.78,0,0,1,.83-.53.75.75,0,0,1,.74.55,2.69,2.69,0,0,1,.11.81c0,1.5,0,3,0,4.51,0,.94-.23,1.3-1.23,1.48a38.13,38.13,0,0,1-9.23.58c-1.72-.11-3.42-.39-5.13-.63-.78-.11-1-.4-1-1.23V32.37l-1.4-.45-2.75-.83c-.64-.2-.9-.48-.9-.92s.28-.73.91-.92c2.64-.8,5.28-1.58,7.93-2.37,1.31-.39,2.62-.77,3.93-1.18a1.83,1.83,0,0,1,1.11,0l11.78,3.52c.89.26,1,.41,1,1.34s0,2.13,0,3.2a4.1,4.1,0,0,0,.6,2.17Zm-4.81-6.34v-.16c-2.93-.88-5.86-1.77-8.79-2.62a1.67,1.67,0,0,0-.88.07l-5.49,1.64L21,30.1a.66.66,0,0,0,.37.25c2.69.81,5.39,1.6,8.08,2.44a2.33,2.33,0,0,0,1.43,0c2.45-.75,4.91-1.48,7.37-2.22Z"
										/>
										<path
											class="cls-3"
											d="M32.38,15.68a.88.88,0,0,1,.94.64.8.8,0,0,1-.38.91,1.75,1.75,0,0,1-.44.2l-4.3,1.34a1.27,1.27,0,0,1-.64,0,.78.78,0,0,1-.61-.69.79.79,0,0,1,.37-.84,2,2,0,0,1,.52-.23c1.36-.43,2.71-.85,4.07-1.26A3.68,3.68,0,0,1,32.38,15.68Z"
										/>
										<path class="cls-4" d="M17.54,22.83a3.68,3.68,0,0,1-.47-.11l-4-1.24a2.14,2.14,0,0,1-.6-.26.83.83,0,0,1-.32-.94.86.86,0,0,1,.87-.61,3.5,3.5,0,0,1,.64.15l3.9,1.23a2.85,2.85,0,0,1,.46.17.85.85,0,0,1-.5,1.61Z" />
										<path
											class="cls-5"
											d="M27.88,22.83a.88.88,0,0,1-.91-.55.85.85,0,0,1,.37-1,2.39,2.39,0,0,1,.52-.22l4.07-1.27a1.91,1.91,0,0,1,.47-.12.88.88,0,0,1,.9.58.83.83,0,0,1-.36,1,1.46,1.46,0,0,1-.44.2l-4.14,1.29A3.77,3.77,0,0,1,27.88,22.83Z"
										/>
										<path
											class="cls-6"
											d="M13.14,15.68l.45.13c1.33.4,2.67.81,4,1.23a2.17,2.17,0,0,1,.6.27.79.79,0,0,1,.32.93.84.84,0,0,1-.86.61,1.13,1.13,0,0,1-.32-.06l-4.46-1.4a1.69,1.69,0,0,1-.36-.17.86.86,0,0,1-.34-.94C12.27,15.9,12.59,15.68,13.14,15.68Z"
										/>
										<path class="cls-7" d="M16.16,25.47a.82.82,0,0,1-1,.9,24.79,24.79,0,0,1-2.49-.79.81.81,0,0,1-.49-1.07A.85.85,0,0,1,13.23,24c.79.22,1.57.48,2.34.74A.76.76,0,0,1,16.16,25.47Z" />
									</svg>
									<span class="ei-icon-bg"></span>
								</div>
								<div class="feature-text8 appeight-headline pera-content">
									<h3>Education Programs</h3>
									<p>Committed To Positively Impacting The Veterinary Community And Helping Professionals Reach New Heights Of Growth And Success.</p>
								</div>
								<a class="resource-card-btn" href="{{ route('frontend.resources.programs') }}"> Learn More </a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 wow fadeFromUp" data-wow-delay="100ms" data-wow-duration="1500ms">
							<div class="eight-feature-box text-center position-relative">
								<div class="feature-icon8 position-relative">
									<svg class="webinar-icon" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
										<defs>
											<style>
												.cls-1 {
													fill: url(#linear-gradient);
												}
												.cls-2 {
													fill: url(#linear-gradient-2);
												}
												.cls-3 {
													fill: url(#linear-gradient-3);
												}
												.cls-4 {
													fill: url(#linear-gradient-4);
												}
												.cls-5 {
													fill: url(#linear-gradient-5);
												}
												.cls-6 {
													fill: url(#linear-gradient-6);
												}
												.cls-7 {
													fill: url(#linear-gradient-7);
												}
												.cls-8 {
													fill: url(#linear-gradient-8);
												}
												.cls-9 {
													fill: url(#linear-gradient-9);
												}
												.cls-10 {
													fill: url(#linear-gradient-10);
												}
												.cls-11 {
													fill: url(#linear-gradient-11);
												}
											</style>
											<linearGradient id="linear-gradient" x1="26" y1="40.85" x2="26" y2="7.15" gradientUnits="userSpaceOnUse">
												<stop offset="0" stop-color="#52c6f6" />
												<stop offset="1" stop-color="#f021da" />
											</linearGradient>
											<linearGradient id="linear-gradient-2" x1="29.57" y1="30.2" x2="29.57" y2="26.94" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-3" x1="23.56" y1="31.08" x2="23.56" y2="27.82" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-4" x1="29.41" y1="26.63" x2="29.41" y2="22.57" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-5" x1="17.6" y1="30.13" x2="17.6" y2="26.93" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-6" x1="23.61" y1="31.85" x2="23.61" y2="21.85" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-7" x1="17.79" y1="26.63" x2="17.79" y2="22.57" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-8" x1="23.6" y1="27.56" x2="23.6" y2="23.51" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-9" x1="32.5" y1="13.28" x2="34.53" y2="13.28" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-10" x1="35.53" y1="13.28" x2="37.56" y2="13.28" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-11" x1="38.56" y1="13.28" x2="40.59" y2="13.28" xlink:href="#linear-gradient" />
										</defs>
										<path
											class="cls-1"
											d="M39.34,19.37a8.48,8.48,0,0,0,5-2.72,4.63,4.63,0,0,0-.09-6.53,9.25,9.25,0,0,0-2.53-1.85,11.45,11.45,0,0,0-8-.71A8.74,8.74,0,0,0,29.34,10a4.76,4.76,0,0,0-.15,6.67,4.38,4.38,0,0,0-.8-.06H10.21A1.27,1.27,0,0,0,9,17.75a4.91,4.91,0,0,0,0,.78V35.48c0,.23,0,.46,0,.71l0,.6H7.86c-.25,0-.49,0-.77,0l-.76.05V38c0,.54,0,1,0,1.55,0,.94.36,1.26,1.34,1.31h32a1.12,1.12,0,0,0,1.19-1.18c0-.53,0-1.06,0-1.65V36.79H38.13V19.52C38.55,19.48,39,19.44,39.34,19.37Zm-8.2-.13-1.2,2.49.87-.11A6.36,6.36,0,0,0,34.38,20a1.45,1.45,0,0,1,1.15-.37V34.36H11.72V19.24ZM30,10.64A7.81,7.81,0,0,1,34,8.48a12.09,12.09,0,0,1,2.93-.38,10.09,10.09,0,0,1,4.46,1,8.5,8.5,0,0,1,2.27,1.66,3.73,3.73,0,0,1,0,5.24,7.55,7.55,0,0,1-4.49,2.41,16.61,16.61,0,0,1-3.57.2,2.38,2.38,0,0,0-1.85.61,5.67,5.67,0,0,1-2.16,1.25l.6-1.25h.23l-.14-.17.44-.93-.87-.57c-.32-.2-.61-.38-.89-.58a4.5,4.5,0,0,1-2.1-3.35A3.85,3.85,0,0,1,30,10.64ZM9.86,18.49a3.76,3.76,0,0,1,0-.58c0-.27.16-.33.36-.34H28.39a1.9,1.9,0,0,1,1.48.47l.3.27H10.77v17H36.48V20.21l.7,0V36.06H9.89a5.78,5.78,0,0,1,0-.58ZM26.73,37a1.3,1.3,0,0,0-.46.47,1.31,1.31,0,0,1-.46.06h-4.5a3.43,3.43,0,0,0-.4,0,1.47,1.47,0,0,0-.49-.5Zm13.39,1c0,.59,0,1.11,0,1.63,0,.32-.12.43-.44.44h-32c-.6,0-.6,0-.62-.57s0-1,0-1.52v-.41h.06c.25,0,.48,0,.71,0h11.4c.53,0,.79,0,1,.37s.5.38,1,.39c1.51,0,3,0,4.52,0,.57,0,.9-.12,1.05-.37s.54-.4,1.09-.39H40.11Z"
										/>
										<path
											class="cls-2"
											d="M27.33,30.16l1.46,0,1.42,0c.74,0,1.49,0,2.24-.1l.25,0,0-.25a3.27,3.27,0,0,0-6.17-1.07l-.06.12.77,1.29Zm2.55-2.71a2.7,2.7,0,0,1,2.26,2.2c-1.12.09-2.25.07-3.35.05H27.47l-.5-.84A2.71,2.71,0,0,1,29.88,27.45Z"
										/>
										<path class="cls-3" d="M20.3,31.08h6.52v-.25a3.19,3.19,0,0,0-3.16-3,3.24,3.24,0,0,0-3.33,3Zm3.33-2.78a2.67,2.67,0,0,1,2.68,2.3H20.83A2.77,2.77,0,0,1,23.63,28.3Z" />
										<path
											class="cls-4"
											d="M29.4,26.63a2,2,0,0,0,2-2h0a2.08,2.08,0,0,0-.61-1.5,2,2,0,0,0-1.46-.6,2,2,0,0,0-2,2.05,1.92,1.92,0,0,0,2,2Zm-1.54-2a1.54,1.54,0,0,1,1.51-1.58h0A1.57,1.57,0,0,1,31,24.66a1.49,1.49,0,0,1-1.56,1.5h0A1.44,1.44,0,0,1,27.86,24.63Z"
										/>
										<path class="cls-5" d="M20.75,28.83l-.07-.12A3.21,3.21,0,0,0,17.17,27a3.28,3.28,0,0,0-2.68,2.87l0,.27H20ZM15,29.66a2.81,2.81,0,0,1,5.19-.83l-.46.83Z" />
										<path
											class="cls-6"
											d="M13.72,30.92h5.65a1.21,1.21,0,0,0,1.39.93h.13c1.85,0,3.71,0,5.52,0a1.49,1.49,0,0,0,1.11-.29,1,1,0,0,0,.25-.58H30.9c.53,0,1.08,0,1.63,0a.86.86,0,0,0,1-1.15,3.67,3.67,0,0,0-.11-.5l0-.12a4.19,4.19,0,0,0-2-2.53c1.09-1.58,1.08-3,0-4.06a2.78,2.78,0,0,0-3.62-.15c-1.31,1.05-1.4,2.39-.28,4.21L26,27.85l-.47-.27c1.08-1.59,1.07-3,0-4.07a2.76,2.76,0,0,0-3.7-.11c-1.23,1-1.29,2.43-.16,4.16l-.45.28-1.47-1.21c1.1-1.45,1.11-2.93,0-4a2.79,2.79,0,0,0-3.7-.14,2.73,2.73,0,0,0-1,1.88,2.89,2.89,0,0,0,.86,2.29,4.12,4.12,0,0,0-2.16,4Zm2.62-4,.26-.15-.2-.22a2.65,2.65,0,0,1-.93-2.13A2.32,2.32,0,0,1,19.38,23c1,.93.9,2.22-.18,3.53l-.15.18,2.1,1.74,1.14-.74-.14-.2c-1.11-1.6-1.13-2.82,0-3.72a2.27,2.27,0,0,1,3.06.08c1.24,1.17.59,2.63-.17,3.66l-.16.21,1.22.72,2-1.69-.11-.18c-1.09-1.68-1.07-2.84.06-3.75A2.35,2.35,0,0,1,31,23c1.23,1.15.58,2.62-.19,3.65l-.16.22.24.13a3.85,3.85,0,0,1,2,2.36l0,.13a3.2,3.2,0,0,1,.1.42.81.81,0,0,1,0,.5q-.09.11-.48.12c-.53,0-1.08,0-1.6,0H27.7a.32.32,0,0,0-.14,0l-.27.07v.19a.61.61,0,0,1-.12.43c-.14.15-.47.16-.77.16-.91,0-1.83,0-2.76,0s-1.84,0-2.76,0c-.66,0-1-.06-1.09-.73l0-.21h-5.6A3.7,3.7,0,0,1,16.34,26.93Z"
										/>
										<path
											class="cls-7"
											d="M17.78,26.63a2,2,0,0,0,2-2,2,2,0,0,0-3.43-1.51,2.11,2.11,0,0,0-.62,1.51,1.92,1.92,0,0,0,2,2Zm-1.54-2a1.58,1.58,0,0,1,.47-1.17A1.54,1.54,0,0,1,17.78,23h0a1.57,1.57,0,0,1,1.51,1.6h0a1.49,1.49,0,0,1-1.56,1.52h0A1.45,1.45,0,0,1,16.24,24.65Z"
										/>
										<path
											class="cls-8"
											d="M23.59,27.56a2,2,0,1,0,0-4h0a1.93,1.93,0,0,0-2,2,2,2,0,0,0,2,2Zm-1.54-2A1.45,1.45,0,0,1,23.56,24a1.51,1.51,0,0,1,1.59,1.49,1.54,1.54,0,0,1-.44,1.14,1.57,1.57,0,0,1-1.14.47A1.52,1.52,0,0,1,22.05,25.53Z"
										/>
										<circle class="cls-9" cx="33.52" cy="13.28" r="1.02" />
										<circle class="cls-10" cx="36.55" cy="13.28" r="1.02" />
										<circle class="cls-11" cx="39.57" cy="13.28" r="1.02" />
									</svg>
									<span class="ei-icon-bg"></span>
								</div>
								<div class="feature-text8 appeight-headline pera-content">
									<h3>Webinars</h3>
									<p>Earn CE Credits With Free Access To Webinars Providing Information And Updates On The Latest Veterinary Practices And Protocols.</p>
								</div>
								<a class="resource-card-btn" href="/events"> Learn More </a>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 wow fadeFromUp" data-wow-delay="200ms" data-wow-duration="1500ms">
							<div class="eight-feature-box text-center position-relative">
								<div class="feature-icon8 position-relative">
									<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
										<defs>
											<style>
												.cls-1 {
													fill: url(#linear-gradient);
												}
												.cls-2 {
													fill: url(#linear-gradient-2);
												}
											</style>
											<linearGradient id="linear-gradient" x1="26.02" y1="37.11" x2="26.02" y2="12.16" gradientUnits="userSpaceOnUse">
												<stop offset="0" stop-color="#52c6f6" />
												<stop offset="1" stop-color="#f021da" />
											</linearGradient>
											<linearGradient id="linear-gradient-2" x1="35.88" y1="40.22" x2="35.88" y2="24.59" xlink:href="#linear-gradient" />
										</defs>
										<path
											class="cls-1"
											d="M26.9,30a6.53,6.53,0,0,1,1.57-4.12,6.74,6.74,0,0,1,8.16-1.73A6.6,6.6,0,0,1,40,27.94a6.88,6.88,0,0,1-.13,5l1.63,1c.17-.22.09-.49.09-.74V17.9c0-.69,0-1.38,0-2.06a1.55,1.55,0,0,0-.81-1.45,13.87,13.87,0,0,0-8.86-2.15,13.43,13.43,0,0,0-5.23,1.67l-.67.35c-.78-.37-1.49-.76-2.24-1.06A13.4,13.4,0,0,0,11.1,14.46a6,6,0,0,0-.65.59V36.6c.65.62.93.66,1.68.19A12.46,12.46,0,0,1,17,35a11.72,11.72,0,0,1,7.08,1.2c.43.23.85.49,1.27.75a1.1,1.1,0,0,0,1.12.08l2.83-1.54A6.82,6.82,0,0,1,26.9,30ZM39,23.21a.76.76,0,0,1-.8.4,1.47,1.47,0,0,1-.42-.13,7.75,7.75,0,0,0-4.18-.95,7.67,7.67,0,0,0-4,.93,1.25,1.25,0,0,1-.41.14.75.75,0,0,1-.86-.42.72.72,0,0,1,.14-.94,3.79,3.79,0,0,1,.8-.52,8.46,8.46,0,0,1,3-.84A11.48,11.48,0,0,1,37,21.3a12.64,12.64,0,0,1,1.42.61,1.57,1.57,0,0,1,.47.34A.82.82,0,0,1,39,23.21Zm-10.4-5a6.07,6.07,0,0,1,2.43-1,12.27,12.27,0,0,1,5.62.1,12.51,12.51,0,0,1,1.83.74,1.44,1.44,0,0,1,.49.43.78.78,0,0,1,0,.84.88.88,0,0,1-.86.42,5.12,5.12,0,0,1-.49-.2,8.21,8.21,0,0,0-4.76-.9,7.59,7.59,0,0,0-3.44,1,.83.83,0,1,1-.86-1.42Zm-15.35,0a6.42,6.42,0,0,1,2.59-1c.8-.13,1.61-.18,2.42-.27a11.46,11.46,0,0,1,3.9.71,6.6,6.6,0,0,1,1.17.63.82.82,0,0,1,.26,1.1.83.83,0,0,1-1.09.33.93.93,0,0,1-.2-.1,8.38,8.38,0,0,0-4.92-.9,7.4,7.4,0,0,0-3.3.95A.81.81,0,0,1,13,19.37.85.85,0,0,1,13.28,18.17Zm10.34,5a.87.87,0,0,1-1.09.34l-.2-.11a6.36,6.36,0,0,0-2.5-.82,9.91,9.91,0,0,0-4.65.38c-.39.13-.75.36-1.13.53a.84.84,0,0,1-.83-1.45,2.35,2.35,0,0,1,.57-.33A17.7,17.7,0,0,1,16,21a20.82,20.82,0,0,1,2.26-.26,11.45,11.45,0,0,1,3.76.67,8,8,0,0,1,1.3.67A.82.82,0,0,1,23.62,23.21Zm0,7.8a.8.8,0,0,1-1.16.26,7,7,0,0,0-2.2-.82,9.71,9.71,0,0,0-5.07.31,10.32,10.32,0,0,0-1.06.51A.85.85,0,0,1,13,31a.84.84,0,0,1,.32-1.2,7.46,7.46,0,0,1,1.81-.8c1-.26,2.11-.38,2.8-.49a12.9,12.9,0,0,1,4.34.73,6.1,6.1,0,0,1,1.1.59A.84.84,0,0,1,23.61,31Zm0-3.86a.83.83,0,0,1-1.16.24,8.3,8.3,0,0,0-4.68-1,7.67,7.67,0,0,0-3.53.92,1.32,1.32,0,0,1-.68.21.73.73,0,0,1-.67-.5.83.83,0,0,1,.17-.9,2.92,2.92,0,0,1,.54-.38,7.86,7.86,0,0,1,2.71-.89c.65-.1,1.31-.13,1.88-.18a11.24,11.24,0,0,1,4.39.87,5.19,5.19,0,0,1,.76.44A.85.85,0,0,1,23.6,27.15Z"
										/>
										<path
											class="cls-2"
											d="M41.63,35.71a5.68,5.68,0,0,0-2.2-1.7,1.49,1.49,0,0,1-.73-.77c-.08-.17.13-.49.23-.74A5.85,5.85,0,0,0,39.26,29a5.64,5.64,0,0,0-11.16,1.4,5.61,5.61,0,0,0,6.72,5.34c.64-.14,1.25-.4,1.92-.62a2.35,2.35,0,0,1,.94,1.13,2.59,2.59,0,0,0,.55.85c.39.44.82.85,1.24,1.26s.88.93,1.36,1.35a1.67,1.67,0,0,0,2.53-.23l.3-.41V37.93A12.6,12.6,0,0,0,41.63,35.71Zm-4-5.44a3.88,3.88,0,1,1-3.85-3.89A3.83,3.83,0,0,1,37.6,30.27Z"
										/>
									</svg>
									<span class="ei-icon-bg"></span>
								</div>
								<div class="feature-text8 appeight-headline pera-content">
									<h3>Guides</h3>
									<p>Access Guides And Other Resources To Further Your Careers And Be Updated With Latest Veterinary Practices, Innovations & Instruments.</p>
								<a class="resource-card-btn" href="{{ route('frontend.resources.online-resources') }}"> Learn More </a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 wow fadeFromUp" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="eight-feature-box text-center position-relative">
								<div class="feature-icon8 position-relative">
									<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
										<defs>
											<style>
												.cls-1 {
													fill: url(#linear-gradient);
												}
												.cls-2 {
													fill: url(#linear-gradient-2);
												}
												.cls-3 {
													fill: url(#linear-gradient-3);
												}
												.cls-4 {
													fill: url(#linear-gradient-4);
												}
												.cls-5 {
													fill: url(#linear-gradient-5);
												}
											</style>
											<linearGradient id="linear-gradient" x1="26" y1="41.45" x2="26" y2="11.37" gradientUnits="userSpaceOnUse">
												<stop offset="0" stop-color="#52c6f6" />
												<stop offset="1" stop-color="#f021da" />
											</linearGradient>
											<linearGradient id="linear-gradient-2" x1="25.99" y1="23.96" x2="25.99" y2="16.37" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-3" x1="26.01" y1="26.38" x2="26.01" y2="25.1" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-4" x1="25.98" y1="31.38" x2="25.98" y2="30.1" xlink:href="#linear-gradient" />
											<linearGradient id="linear-gradient-5" x1="26" y1="28.89" x2="26" y2="27.6" xlink:href="#linear-gradient" />
										</defs>
										<path
											class="cls-1"
											d="M41,35.15c0,.34-.05.64-.11.92a6.4,6.4,0,0,1-3.66,5,4.09,4.09,0,0,1-1.79.38c-5.59,0-11.17,0-16.76,0a3.92,3.92,0,0,1-4-4q0-9.48,0-18.95V17.7H11a3.64,3.64,0,0,1,0-.54,6.19,6.19,0,0,1,4.12-5.45,6.59,6.59,0,0,1,2-.32c5.14,0,10.27,0,15.41,0a5.18,5.18,0,0,1,2.94.8,4.17,4.17,0,0,1,1.79,3.16A13.67,13.67,0,0,1,37.29,17c0,5,0,9.91,0,14.86v.45c0,.29-.12.38-.39.37-.6,0-1.2,0-1.8,0-.27,0-.41-.1-.4-.38s0-.3,0-.45c0-5,0-10.07,0-15.1a6.42,6.42,0,0,0-.13-1.39A1.74,1.74,0,0,0,33.13,14a5.45,5.45,0,0,0-1-.1H16.59l-.48,0a4,4,0,0,1,1.16,3.4c0,5.27,0,10.53,0,15.8,0,1.24,0,2.47,0,3.7a3.3,3.3,0,0,0,.13.89,1.18,1.18,0,0,0,1.83.71,3.06,3.06,0,0,0,1-1,11.67,11.67,0,0,0,.86-2c.1-.3.23-.41.52-.4h18.6C40.5,35.11,40.73,35.13,41,35.15Z"
										/>
										<path
											class="cls-2"
											d="M26,24a2.65,2.65,0,0,1-.54-.25,1.57,1.57,0,0,0-1.06-.34,1,1,0,0,1-1.06-.79,1.22,1.22,0,0,0-.55-.73c-.56-.4-.64-.6-.43-1.22a1.41,1.41,0,0,0,0-1,.83.83,0,0,1,.4-1.19,1.35,1.35,0,0,0,.6-.82.92.92,0,0,1,1-.72,1.69,1.69,0,0,0,1.11-.35.85.85,0,0,1,1.11,0,1.7,1.7,0,0,0,1.11.36.94.94,0,0,1,1,.76,1.3,1.3,0,0,0,.58.78c.53.37.61.58.41,1.18a1.46,1.46,0,0,0,0,1,.8.8,0,0,1-.38,1.15,1.44,1.44,0,0,0-.64.85.85.85,0,0,1-.91.7,1.82,1.82,0,0,0-1.25.4A2.17,2.17,0,0,1,26,24Zm-1.24-4.1-.53.46.14-.05,1.23,1.39,2.25-2.33-.52-.52-1.76,1.77Z"
										/>
										<path class="cls-3" d="M31,25.19v1.19H21V25.2C21.38,25.08,30.36,25.06,31,25.19Z" />
										<path class="cls-4" d="M21,31.38V30.21c.38-.12,9.36-.15,10,0v1.2Z" />
										<path class="cls-5" d="M29.71,28.89H22.22c0-.36,0-.72,0-1.07,0-.07.14-.16.23-.2a.75.75,0,0,1,.3,0h6.49c.55,0,.55,0,.55.57,0,.18,0,.37,0,.55S29.74,28.81,29.71,28.89Z" />
									</svg>
									<span class="ei-icon-bg"></span>
								</div>
								<div class="feature-text8 appeight-headline pera-content">
									<h3>CE Courses</h3>
									<p>Stay Updated With the Veterinary Treatment Protocols, connect with veterinary professionals and Earn CE Credits With DVM Central.</p>
								<a class="resource-card-btn" href="{{ route('frontend.course.category') }}"> Learn More </a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 wow fadeFromUp sm-icon" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="eight-feature-box text-center position-relative">
								<div class="feature-icon8 position-relative">
									<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:url(#linear-gradient-2);}</style><linearGradient id="linear-gradient" x1="23.63" y1="69.03" x2="25.39" y2="10.85" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#52c6f6"/><stop offset="0.12" stop-color="#58bff5"/><stop offset="0.29" stop-color="#6aacf2"/><stop offset="0.49" stop-color="#888eec"/><stop offset="0.71" stop-color="#b163e5"/><stop offset="0.95" stop-color="#e52cdc"/><stop offset="1" stop-color="#f021da"/></linearGradient><linearGradient id="linear-gradient-2" x1="20.46" y1="68.93" x2="22.22" y2="10.75" xlink:href="#linear-gradient"/></defs><title>website icons update</title><path class="cls-1" d="M32.25,36.7l-4.82-4.81a9,9,0,0,1-12.09-.77v.59c0,5,0,10,0,15A3.22,3.22,0,0,1,9.79,49a9.29,9.29,0,0,1-1.68.87,3.18,3.18,0,0,1-4-3.12c0-4.6,0-9.2,0-13.8v-.68H3.2A3.21,3.21,0,0,1,0,29C0,26.3,0,23.6,0,20.9a9.45,9.45,0,0,1,5.88-8.81l.33-.16a6.45,6.45,0,0,1-3-6,6.19,6.19,0,0,1,2.25-4.4,6.46,6.46,0,1,1,7.63,10.39,9.92,9.92,0,0,1,5.27,4.85,8.93,8.93,0,0,1,4.71-.55,8.79,8.79,0,0,1,4.27,1.91l4.71-4.73c-.53-.59-1.13-1.18-1.64-1.85a7.16,7.16,0,0,1-.29-8.21,7.25,7.25,0,1,1,4,10.85.71.71,0,0,0-.56.1c-1.66,1.62-3.29,3.26-4.93,4.9l-.09.15a9.11,9.11,0,0,1,2,4.81h4.9a7.29,7.29,0,0,1,3.79-5.55,7,7,0,0,1,4.87-.73,7.26,7.26,0,1,1-8.67,7.92H30.62a9.11,9.11,0,0,1-2,4.84,1.18,1.18,0,0,0,.17.2l4.77,4.78a.55.55,0,0,0,.65.17,7.23,7.23,0,1,1-2.45,1.28ZM11.88,29.65a5.07,5.07,0,0,0-.87.86,2.22,2.22,0,0,0-.48,1.16c0,5,0,10,0,15.06a1.93,1.93,0,0,0,.32,1,1.5,1.5,0,0,0,1.78.57,1.61,1.61,0,0,0,1.11-1.67q0-8.79,0-17.58a2,2,0,0,0-.15-.72,8.1,8.1,0,0,1-.29-5.67,10.19,10.19,0,0,0,.45-3.5c0-.6,0-1.21,0-1.81a3.6,3.6,0,0,1,0-.36h1.59v1.88L17,17.51a7.92,7.92,0,0,0-3-3.35,22,22,0,0,1-4.27,9,22.3,22.3,0,0,1-4.24-9c-.18.11-.31.18-.43.27a7.86,7.86,0,0,0-3.37,6.49c0,2.58,0,5.17,0,7.75a1.81,1.81,0,0,0,2.46,1.89V17H5.67V46.34a5.23,5.23,0,0,0,0,.56,1.62,1.62,0,0,0,1.43,1.46,1.57,1.57,0,0,0,1.68-1.08,2.93,2.93,0,0,0,.1-.84c0-4.78,0-9.57,0-14.35a4.31,4.31,0,0,1,1.89-3.59ZM29,25a7.25,7.25,0,1,0-7.29,7.24A7.26,7.26,0,0,0,29,25ZM14.53,6.46A4.83,4.83,0,1,0,9.7,11.3,4.84,4.84,0,0,0,14.53,6.46Zm17.11,3.9L33.8,8.52c-1-1.67-.95-3.25.3-4.42a3.22,3.22,0,0,1,4.08-.25,3.18,3.18,0,0,1,1.23,1.79,3.22,3.22,0,0,1-.62,2.87L41,10.36a5.49,5.49,0,0,0-.72-7.13,5.61,5.61,0,0,0-7.9,0A5.47,5.47,0,0,0,31.64,10.36ZM47.4,28.09a5.48,5.48,0,0,0-.81-7.2,5.61,5.61,0,0,0-7.86.15A5.48,5.48,0,0,0,38,28c.35-.3.71-.61,1.08-.89s.78-.56,1.17-.83c-1.08-1.67-1-3.23.19-4.41a3.21,3.21,0,0,1,4.07-.37,3.13,3.13,0,0,1,1.28,1.75,3.21,3.21,0,0,1-.59,3ZM41,45.83c1.66-2,1.19-5.55-1.05-7.43a5.64,5.64,0,0,0-7.91.68c-2,2.29-1.52,5.49-.35,6.73L33.79,44c-1-1.82-.9-3.39.41-4.51a3.2,3.2,0,0,1,4.12-.06c1.37,1.11,1.52,2.66.48,4.57ZM32.84,11.65c1.65,1.65,5.36,1.64,6.91,0a4,4,0,0,0-6.91,0ZM39.3,29.4a5.37,5.37,0,0,0,6.87,0A4,4,0,0,0,39.3,29.4Zm.46,17.71A4,4,0,0,0,36,45.17a3.83,3.83,0,0,0-3.12,2A5.48,5.48,0,0,0,39.76,47.11ZM36.34,4.85a1.61,1.61,0,1,0-.06,3.22,1.61,1.61,0,0,0,.06-3.22Zm8,19.35a1.61,1.61,0,1,0-1.6,1.6A1.62,1.62,0,0,0,44.35,24.2ZM36.29,43.53a1.61,1.61,0,1,0-1.6-1.6A1.62,1.62,0,0,0,36.29,43.53ZM9.67,20.22a1.61,1.61,0,0,0,.63-1.37c-.07-1.08-.16-2.17-.23-3.26-.06-.8-.11-1.6-.18-2.4,0-.1-.14-.18-.2-.27a1.44,1.44,0,0,0-.18.25.68.68,0,0,0,0,.25c-.12,1.63-.21,3.27-.38,4.91A2.2,2.2,0,0,0,9.67,20.22Zm1.83-7.07L11.71,16a10,10,0,0,0,.59-1.75C12.52,13.35,12.51,13.35,11.5,13.15Zm-3.63,0a4.48,4.48,0,0,0-.67.2c-.09,0-.22.19-.2.27.17.78.37,1.56.56,2.35l.13,0,.18-2.29C7.88,13.5,7.87,13.35,7.87,13.13Z"/><path class="cls-2" d="M20.18,22.58c0,.29,0,.52,0,.76a.8.8,0,0,0,.85.85H22.6A2.4,2.4,0,0,1,25,26.59c0,.79,0,1.58,0,2.44H22.6v1.59H21V29.09c-1.64-.38-2.39-1.14-2.41-2.45h1.54c.28.68.42.78,1.16.78H23.4c0-.29,0-.54,0-.78a.8.8,0,0,0-.83-.83c-.52,0-1,0-1.56,0a2.4,2.4,0,0,1-2.44-2.42c0-.78,0-1.57,0-2.39H21v-1.6h1.62v1.55a2.42,2.42,0,0,1,2,1.06,8,8,0,0,1,.57,1.37H23.43c-.12-.67-.6-.83-1.22-.8S20.9,22.58,20.18,22.58Z"/></svg>
									<span class="ei-icon-bg"></span>
								</div>
								<div class="feature-text8 appeight-headline pera-content">
									<h3>Associations</h3>
									<p>Explore Several Affiliated Associations And Government Organizations Dedicated To Bringing Advancements In Veterinary Medicine.</p>
								<a class="resource-card-btn" href="{{ route('frontend.resources.associations') }}"> Learn More </a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 wow fadeFromUp sm-icon" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="eight-feature-box text-center position-relative">
								<div class="feature-icon8 position-relative">
									<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:url(#linear-gradient-2);}.cls-3{fill:url(#linear-gradient-3);}</style><linearGradient id="linear-gradient" x1="25" y1="51.06" x2="25" y2="9.8" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#5dbbf4"/><stop offset="1" stop-color="#f021da"/></linearGradient><linearGradient id="linear-gradient-2" x1="9.95" y1="51.13" x2="9.95" y2="7.05" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-3" x1="33.04" y1="51.19" x2="33.04" y2="4.88" xlink:href="#linear-gradient"/></defs><title>website icons update</title><path class="cls-1" d="M17.17,50A.62.62,0,0,1,17,50a1,1,0,0,1-.76-.64,1.07,1.07,0,0,1,.22-1c1.06-1.34,2.1-2.71,3.15-4.07L24.36,38l-.19-.12c-.28-.19-.55-.38-.84-.54s-.76-.4-1.14-.6-.72-.36-1.08-.56a.35.35,0,0,0-.16-.06s-.09,0-.2.13c-1.17,1.19-2.36,2.37-3.54,3.55l-.73.73a1.41,1.41,0,0,1-.92.52,1.4,1.4,0,0,1-.93-.53L10.08,36c-4.31,1.8-6.69,4.14-7.69,7.58A12.48,12.48,0,0,0,2,47.48c0,.52,0,1,0,1.56A.91.91,0,0,1,1,50c-.63,0-1-.38-1-.89a17.27,17.27,0,0,1,.89-7.23,12.49,12.49,0,0,1,5.6-6.27c.78-.43,1.57-.84,2.37-1.25l1.39-.72a3,3,0,0,0,1.66-3.24.57.57,0,0,0-.17-.1l-1-.31c-.55-.16-1.09-.32-1.62-.51a5.33,5.33,0,0,1-3.52-5.12c0-.78,0-1.55,0-2.35V21.1H5.14A2.24,2.24,0,0,1,3,19.6,2.35,2.35,0,0,1,3.46,17a1,1,0,0,0,.2-.5c0-.76,0-1.52,0-2.28,0-1.12,0-2.25,0-3.38A10.55,10.55,0,0,1,5.52,5.29a1.17,1.17,0,0,1,.85-.49,1.25,1.25,0,0,1,.9.72,1.18,1.18,0,0,1-.21.92A9.68,9.68,0,0,0,5.77,9.8a7.5,7.5,0,0,0-.14,1.3c0,1.34,0,2.67,0,4v.35c.06-.92.32-1,1.53-1.11A16.88,16.88,0,0,0,17,10l.66-.61.5-.47a3.89,3.89,0,0,1,2.63-1.07,4.22,4.22,0,0,1,1.63.34,3.5,3.5,0,0,1,2.2,3.49c0,1,0,2.07,0,3.11v1.55h.09a1.85,1.85,0,0,0,0-.23v-1.2c0-1.11,0-2.23,0-3.34A9.55,9.55,0,0,0,15.14,2h-.2A9.57,9.57,0,0,0,9.27,4a1.56,1.56,0,0,1-.87.33H8.28a1,1,0,0,1-.71-.77A1.21,1.21,0,0,1,8,2.58,11.35,11.35,0,0,1,13.73.1,1.22,1.22,0,0,0,14,0l.13,0h2L17,.17A16.61,16.61,0,0,1,18.77.6,11.52,11.52,0,0,1,26.7,11.49c0,.86,0,1.72,0,2.59v2.58a.82.82,0,0,0,.13.4,2.33,2.33,0,0,1,.38,2.65A2.28,2.28,0,0,1,25,21.1h-.36v.47c0,.55,0,1.09,0,1.63v.51a8.49,8.49,0,0,1-.12,1.74,5.22,5.22,0,0,1-3.24,3.93,23.33,23.33,0,0,1-2.36.77c-.22.06-.23.08-.24.28a3.21,3.21,0,0,0,2,3.37c1.19.57,2.38,1.2,3.52,1.82l1.39.73,1.09-1.42q1.32-1.73,2.65-3.44c.14-.18.13-.25,0-.41a12.83,12.83,0,0,1-.64-1.22,2.29,2.29,0,0,1,0-2,2.19,2.19,0,0,1,1.52-1.17c2-.44,4-.8,5.55-1.07l.4,0a2.25,2.25,0,0,1,2,1.3.48.48,0,0,0,.27.23,5.85,5.85,0,0,1,3.61,2.37c.33.46.67.91,1,1.36l1.15,1.55a.85.85,0,0,0,.77.41h1.62c.24,0,.49,0,.73,0h.24A2.29,2.29,0,0,1,50,34.38l0,.86-.18.62-.39,1.21a6.2,6.2,0,0,1-5.8,4.21H37.3c-.57,0-.64,0-.85.58l-.27.69c-.17.43-.34.86-.52,1.29a.94.94,0,0,1-.88.69,1.08,1.08,0,0,1-.38-.08,1,1,0,0,1-.54-1.31l.06-.16c.27-.7.53-1.4.83-2.09a2.39,2.39,0,0,1,2.34-1.55h6.48a4.18,4.18,0,0,0,3.5-1.86,4.75,4.75,0,0,1-1.72-2.75h-.5a2.67,2.67,0,0,1-2.11-1.14c-.49-.7-1-1.38-1.52-2.06l-.75-1A3.66,3.66,0,0,0,38.15,29L36,35.26a2.19,2.19,0,0,1-2,1.57h-.21a2.19,2.19,0,0,1-2-1.26l-1.26-2.39-.1.12L18.05,49.41A1.14,1.14,0,0,1,17.17,50ZM15.6,38.6l3.47-3.48a5.19,5.19,0,0,1-2.34-4.55H13.89a5.14,5.14,0,0,1-2,4.33Zm32.28-3v-.05a2.12,2.12,0,0,0,0-.82s-.05,0-.12,0l-.3,0h-.12ZM36.15,27.54l-.2,0c-1.64.3-3.28.62-4.92.94-.39.08-.51.17-.54.23s0,.2.16.54l2.76,5.24c.15.3.22.4.39.4s.29-.12.39-.43l2.2-6.3.08-.27C36.48,27.6,36.35,27.54,36.15,27.54ZM7.56,24.26a3.42,3.42,0,0,0,2.35,3.41,14.38,14.38,0,0,0,5.21,1h0a14.38,14.38,0,0,0,5.21-1,3.46,3.46,0,0,0,2.38-3.44V11.67a1.79,1.79,0,0,0-1.85-1.89h-.19a2.18,2.18,0,0,0-1.39.74,19.85,19.85,0,0,1-7.51,4.8,29.49,29.49,0,0,1-3,.79l-1.24.29S7.55,22.39,7.56,24.26Zm-2.36-6c-.21,0-.3.05-.37.2a.67.67,0,0,0,0,.52.36.36,0,0,0,.38.2l.26,0h.09v-.87ZM25,19.16c.25,0,.34-.05.41-.22a.65.65,0,0,0,0-.51.39.39,0,0,0-.37-.18l-.29,0h-.07v.87Z"/><path class="cls-2" d="M10,50c-.6,0-1-.42-1-1.11V47.57H7.59a1,1,0,0,1-.86-.43,1,1,0,0,1,.83-1.51H9V44.32c0-.9.51-1.1.93-1.1h0a1,1,0,0,1,1,1.09c0,.35,0,.69,0,1.07v.24h1.32c.68,0,1.08.37,1.08,1a1,1,0,0,1-1.07,1H10.93v.27c0,.35,0,.69,0,1,0,.68-.37,1.09-.95,1.1Z"/><path class="cls-3" d="M32.75,50a1.18,1.18,0,0,1-1-.48.89.89,0,0,1-.09-.84c.28-.76.57-1.51.88-2.25a1,1,0,0,1,.9-.64,1.13,1.13,0,0,1,.36.06,1,1,0,0,1,.54,1.28c-.3.81-.57,1.54-.9,2.25a1.38,1.38,0,0,1-.44.48l-.1.08-.07.07Z"/></svg>
									<span class="ei-icon-bg"></span>
								</div>
								<div class="feature-text8 appeight-headline pera-content">
									<h3>Surgical Procedures</h3>
									<p>Find Authentic Information And Latest Updates On A Comprehensive Range Of Veterinary Surgical Procedures To Ensure Animal Care.</p>
								<a class="resource-card-btn" href="{{ route('frontend.resources.surgical-procedures') }}"> Learn More </a>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 wow fadeFromUp sm-icon" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="eight-feature-box text-center position-relative">
								<div class="feature-icon8 position-relative">
									<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50"><defs><style>.cls-1{fill:url(#linear-gradient);}.cls-2{fill:url(#linear-gradient-2);}.cls-3{fill:url(#linear-gradient-3);}.cls-4{fill:url(#linear-gradient-4);}.cls-5{fill:url(#linear-gradient-5);}.cls-6{fill:url(#linear-gradient-6);}.cls-7{fill:url(#linear-gradient-7);}</style><linearGradient id="linear-gradient" x1="26.99" y1="48.98" x2="27.13" y2="-0.01" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#52c6f6"/><stop offset="0.12" stop-color="#58bff5"/><stop offset="0.29" stop-color="#6aacf2"/><stop offset="0.49" stop-color="#888eec"/><stop offset="0.71" stop-color="#b163e5"/><stop offset="0.95" stop-color="#e52cdc"/><stop offset="1" stop-color="#f021da"/></linearGradient><linearGradient id="linear-gradient-2" x1="19.02" y1="48.96" x2="19.15" y2="-0.03" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-3" x1="22.16" y1="48.97" x2="22.29" y2="-0.02" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-4" x1="23.79" y1="48.98" x2="23.92" y2="-0.02" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-5" x1="17.8" y1="48.96" x2="17.94" y2="-0.03" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-6" x1="28.37" y1="48.99" x2="28.5" y2="-0.01" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-7" x1="14.44" y1="48.95" x2="14.57" y2="-0.04" xlink:href="#linear-gradient"/></defs><title>website icons update</title><path class="cls-1" d="M23.57,46q-3.26,0-6.51,0a13.43,13.43,0,0,1-2.69-.39l-1.06-.21-2.82-.52-1.74-.33A3.48,3.48,0,0,1,5.8,40.69a.52.52,0,0,0-.13-.32,3.51,3.51,0,0,1-1.43-4A3.45,3.45,0,0,1,7.65,34H8A3.51,3.51,0,0,1,11,30.57s-4.18-4.19-4.18-4.19A2.27,2.27,0,0,1,6.54,26a.88.88,0,0,1,.08-1.19.9.9,0,0,1,.64-.29,1,1,0,0,1,.55.18,1.46,1.46,0,0,1,.32.28l.92.92q3.84,3.82,7.67,7.67a2.26,2.26,0,0,1,.23.31,3.79,3.79,0,0,1,2.55-1,6,6,0,0,1,1.58.24l.4.07.25,0,.83.15c.74.14,1.48.28,2.21.45a.47.47,0,0,0,.16,0c.09,0,.15,0,.27-.24a36.1,36.1,0,0,1,5-7.44,14.9,14.9,0,0,1,5.09-4,9.27,9.27,0,0,1,1.44-.46c.26-.07.53-.13.79-.21a1.31,1.31,0,0,0,.48-.25,9,9,0,0,0,1.17-11.24c-.3-.46-.62-1.14.05-1.59a.87.87,0,0,1,.51-.17c.35,0,.69.25,1,.76a10.93,10.93,0,0,1-.3,12.22l-.13.19H48.7a1.35,1.35,0,0,1,1.26.56l0,.05v.55a1.17,1.17,0,0,1-1.2.72h-.74l-5,0c-1.24,0-2.47,0-3.7-.05h-.27a8.21,8.21,0,0,0-5.46,2.13,25.09,25.09,0,0,0-5.1,6.14c-.58.92-1.12,1.89-1.64,2.83l-.42.77c-.27.47-.49.71-.94.71a2.8,2.8,0,0,1-.45-.05l-1.25-.25-4.11-.78a2.07,2.07,0,0,0-.35,0,1.82,1.82,0,0,0-1.77,1.4,1.79,1.79,0,0,0,1.19,2.21c2.73.84,5.42,1.62,7.45,2.2a1.93,1.93,0,0,0,.58.08,2.61,2.61,0,0,0,1.49-.53l5.78-4,2.53-1.73.25-.16a1.06,1.06,0,0,1,.51-.14.92.92,0,0,1,.75.4A.94.94,0,0,1,38,35.9c-.16.13-.34.25-.52.37L34.84,38c-1.8,1.23-3.6,2.45-5.4,3.69a4.48,4.48,0,0,1-2.6.87,4.9,4.9,0,0,1-1.43-.23c-.58-.19-1.16-.35-1.75-.52s-1.4-.4-2.1-.62A7.93,7.93,0,0,0,19,40.78h-.47q-.35,0-.69,0a19.68,19.68,0,0,1-3.93-.53c-.56-.11-1.12-.23-1.69-.32s-1-.18-1.49-.28l-1.22-.23-.28,0A1.58,1.58,0,0,0,7.7,40.67a1.65,1.65,0,0,0,.22,1.27,1.54,1.54,0,0,0,1,.65l6.26,1.17,1.63.3a1.67,1.67,0,0,0,.32,0h8l6.49,0h0a5,5,0,0,0,3.52-1.32q2.22-2,4.46-3.94c1.27-1.11,2.55-2.23,3.81-3.35A5.2,5.2,0,0,1,47,34.1h1c.25,0,.5,0,.75,0h0a1.31,1.31,0,0,1,1.2.57l0,.05v.55a1.11,1.11,0,0,1-1.09.72H47a3.45,3.45,0,0,0-2.41.91c-1.44,1.28-2.89,2.54-4.33,3.81l-4.07,3.58A6.45,6.45,0,0,1,31.79,46H23.57ZM9.15,37.57a6.46,6.46,0,0,1,1,.11L12,38l4.34.81-.62-1.56-.5-.08c-.53-.08-1.08-.16-1.62-.26a.91.91,0,0,1-.59-.39.89.89,0,0,1-.13-.69.93.93,0,0,1,.93-.75h.13a3.43,3.43,0,0,1,.34.06,1.8,1.8,0,0,0,.32.06l1.09.1.14,0-.09-.11-.41-.4a6.59,6.59,0,0,1-.86-.89A4.53,4.53,0,0,0,12,32.5a1.66,1.66,0,0,0-.49-.07,1.58,1.58,0,0,0-1.56,1.28c-.11.58-.09.6.48.73a1.25,1.25,0,0,1,.72.41.84.84,0,0,1,.15.74.89.89,0,0,1-.94.7l-.28,0-.77-.14a16.49,16.49,0,0,0-1.69-.27H7.43A1.53,1.53,0,0,0,6,37a1.55,1.55,0,0,0,.65,1.73A3.62,3.62,0,0,1,9.15,37.57Z"/><path class="cls-2" d="M4.84,24a1.08,1.08,0,0,1-.7-.29,11.83,11.83,0,0,1-4-6.89,10.81,10.81,0,0,1,2-8.27A10.72,10.72,0,0,1,9.38,4.16,13.23,13.23,0,0,1,11,4.06a10.79,10.79,0,0,1,7.87,3.35l2.39,2.4L22.05,9c.65-.68,1.28-1.34,1.94-2A10.92,10.92,0,0,1,37.42,5.77a2.79,2.79,0,0,1,.55.4.93.93,0,0,1-.63,1.58A1.09,1.09,0,0,1,37,7.67a2.33,2.33,0,0,1-.34-.2,9.26,9.26,0,0,0-5.1-1.57,9.06,9.06,0,0,0-6.35,2.62c-.65.63-1.3,1.28-1.94,1.93l-1.1,1.11a1.36,1.36,0,0,1-.87.48,1.28,1.28,0,0,1-.85-.48l-1-1C18.66,9.81,18,9.09,17.21,8.4A9.07,9.07,0,0,0,2.14,12.91a8.83,8.83,0,0,0,2.25,8.36c.18.19.37.37.55.55l.5.51A.93.93,0,0,1,4.84,24Z"/><path class="cls-3" d="M20.13,30.16a3.64,3.64,0,0,1-2.78-5.94,2.64,2.64,0,0,0,.59-1.65A3.61,3.61,0,0,1,21.1,19a3.07,3.07,0,0,1,.53-.05A3.65,3.65,0,0,1,25,21.43a2.67,2.67,0,0,0,1.19,1.46,3.48,3.48,0,0,1,1.73,2.85,3.93,3.93,0,0,1-1.07,2.78,3.59,3.59,0,0,1-2.6,1.09,4.74,4.74,0,0,1-.74-.07,2.48,2.48,0,0,0-.54-.06,2.78,2.78,0,0,0-1.2.29A3.7,3.7,0,0,1,20.13,30.16Zm1.47-9.31-.25,0a1.75,1.75,0,0,0-1.53,1.63,4.73,4.73,0,0,1-1.1,3,1.7,1.7,0,0,0,.06,2.12,1.82,1.82,0,0,0,1.37.67,1.52,1.52,0,0,0,.69-.16A4.82,4.82,0,0,1,23,27.62a5.31,5.31,0,0,1,1,.1,1.53,1.53,0,0,0,.3,0h0a1.62,1.62,0,0,0,1.14-.49,2,2,0,0,0,.56-1.42,1.62,1.62,0,0,0-.82-1.34,4.42,4.42,0,0,1-2-2.5A1.73,1.73,0,0,0,21.6,20.85Z"/><path class="cls-4" d="M23.85,18.39a2.87,2.87,0,0,1,0-5.73,2.87,2.87,0,1,1,0,5.73Zm0-3.85a1,1,0,0,0-1,1,1,1,0,0,0,1,1h0a1,1,0,0,0,.72-.31,1,1,0,0,0-.72-1.67v0Z"/><path class="cls-5" d="M17.87,19.18a2.79,2.79,0,0,1-2-.85,2.86,2.86,0,1,1,4.06-4,2.84,2.84,0,0,1,.83,2,2.9,2.9,0,0,1-2.87,2.85Zm0-3.87a1,1,0,0,0,0,2,1,1,0,0,0,1-1,1,1,0,0,0-.29-.7,1,1,0,0,0-.72-.3v0Z"/><path class="cls-6" d="M28.44,22.49a2.87,2.87,0,1,1,2-.86,2.83,2.83,0,0,1-2,.86Zm0-3.86a1,1,0,0,0-.71.3,1,1,0,0,0-.29.71,1,1,0,1,0,1-1v0Z"/><path class="cls-7" d="M14.49,24.31a2.87,2.87,0,0,1,0-5.73,2.83,2.83,0,0,1,2.85,2.86,2.88,2.88,0,0,1-2.87,2.87Zm0-3.86a1,1,0,0,0-.71,1.68,1,1,0,0,0,.71.3,1,1,0,0,0,1-1,1,1,0,0,0-1-1v0Z"/></svg>
									<span class="ei-icon-bg"></span>
								</div>
								<div class="feature-text8 appeight-headline pera-content">
									<h3>Animal Diseases</h3>
									<p>Insights About Medicine And Treatments For Commonly Found Diseases In Animals To Safeguard The Health And Welfare Of Animals.</p>
								<a class="resource-card-btn" href="/resources/common-diseases"> Learn More </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ei-feature-shape"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/f-shape1.png" alt="Blob" /></div>
		</section>
		<!-- End of Vet Resources section
        ============================================= -->

		<!-- Start of speakers section
    	============================================= -->
		<section id="webinar-speakers" class="ei-testimonial-section position-relative" data-background="splash/assets/img/vet-tech/speakers/tbg.jpg">
			<div class="container">
				<div class="eight-section-title appeight-headline pera-content text-center">
					<span class="eg-title-tag">
						Our Speakers<i class="square-shape"> <i></i><i></i><i></i><i></i> </i>
					</span>
					<h2>
						Learn With Our 
						<span>Influential Speakers</span>
					</h2>
					{{-- <p>As a SAAS web crawler expert, I help organizations adjust to the expanding significance of internet promoting.</p> --}}
				</div>
				<!-- /title -->
				<div class="ei-testimonial-content">
					<div class="speakers-wrapper">
						@foreach($speakers as $key => $speaker)
							<div class="speaker">
								<img src="{{asset('up_data/speakers/'.$speaker->profile)}}" alt="">
								<h4 class="speaker-name">{{$speaker->first_name . ' ' . $speaker->last_name}}</h4>
								<p class="education">{{$speaker->practice_role}}</p>
								<div class="university">{{$speaker->institute}}</div>
							</div>
						@endforeach
					</div>
					<a href="/speakers" class="get-started-btn">View All</a>
				</div>
			</div>
			<div class="testimonial-floatingimg testimonial-float-img1 ul-li-block">
				<ul>
					<li><img src="assets/img/app-landing/testimonial/tf1.jpg" alt=""></li>
					<li><img src="assets/img/app-landing/testimonial/tf3.jpg" alt=""></li>
					<li><img src="assets/img/app-landing/testimonial/tst1.jpg" alt=""></li>
					<li><img src="assets/img/app-landing/testimonial/tst2.jpg" alt=""></li>
				</ul>
			</div>
			<div class="testimonial-floatingimg testimonial-float-img2 ul-li-block">
				<ul>
					<li><img src="assets/img/app-landing/testimonial/tf1.jpg" alt=""></li>
					<li><img src="assets/img/app-landing/testimonial/tf3.jpg" alt=""></li>
					<li><img src="assets/img/app-landing/testimonial/tst1.jpg" alt=""></li>
					<li><img src="assets/img/app-landing/testimonial/tst2.jpg" alt=""></li>
				</ul>
			</div>
		</section>
		<!-- End of speakers section
    	============================================= -->

		<!-- Start of events section
        ============================================= -->
		<section id="events" class="ei-screenshots-section position-relative">
			<div class="container">
				<div class="eight-section-title appeight-headline pera-content text-center">
					<span class="eg-title-tag">
						Upcoming Conferences\Events <i class="square-shape"> <i></i><i></i><i></i><i></i></i
					></span>
					<h2>Insights About <span> Upcoming Vet Shows</span></h2>
					<p>Learn About Veterinary Practices And Protocols With Upcoming Conferences.</p>
				</div>
				<!-- /title -->

				<div class="row ei-appScreenshotCarousel-container swiper-container">
					<div class="swiper-wrapper">
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/1.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/2.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/3.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/4.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/5.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/1.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/2.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/3.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/4.jpg" alt="Upcoming Events" /></div>
						<div class="swiper-slide"><img src="splash/assets/img/vet-tech/upcoming-conf/5.jpg" alt="Upcoming Events" /></div>
					</div>
					<!-- Add Arrows -->
				</div>
				<!-- Navigations -->
				<div class="banner-navigation">
					<div class="swiper-button-prev"></div>
					<div class="swiper-button-next"></div>
				</div>
			</div>
			<div class="screenshoot-vector screenshoot-shape1 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/ss-shape1.png" alt="Blob" /></div>
			<div class="screenshoot-vector screenshoot-shape2 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/ss-shape2.png" alt="Blob" /></div>
		</section>
		<!-- End of events section
        ============================================= -->

		<!-- Start of Why Sell on VetandTech  section
        ============================================= -->
		<section id="seller-portal" class="eight-service-section position-relative">
			<div class="container">
				<div class="eight-service-slide clearfix wow fadeFromLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
						{{-- <h2 class="d-lg-none">Why Sell On DVM Central?</h2> --}}
					<div class="ei-service-slide-btn ul-li-block clearfix">
						<div class="banner-pager clearfix" id="banner-pager">
							<a class="pager" data-slide-index="0">
								<div class="ei-service-icon-text text-right appeight-headline pera-content">
									<div class="ei-service-icon float-right text-center">
										<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
											<defs>
												<style>
													.cls-1 {
														fill: url(#linear-gradient);
													}
													.cls-2 {
														fill: #b1e3f4;
													}
													.cls-3 {
														fill: url(#linear-gradient-2);
													}
													.cls-4 {
														fill: #00152b;
													}
													.cls-5 {
														fill: #48525e;
													}
													.cls-6 {
														fill: #4b5561;
													}
													.cls-7 {
														fill: #10172a;
													}
													.cls-8 {
														fill: #f9fcfd;
													}
													.cls-9 {
														fill: #f7f7f7;
													}
													.cls-10 {
														fill: #061c2f;
													}
													.cls-11 {
														fill: #141e2f;
													}
													.cls-12 {
														fill: #3c5262;
													}
													.cls-13 {
														fill: #fefefe;
													}
													.cls-14 {
														fill: #fdfefe;
													}
													.cls-15 {
														fill: #fcfdfe;
													}
													.cls-16 {
														fill: #263342;
													}
													.cls-17 {
														fill: #b0e1f2;
													}
													.cls-18 {
														fill: #fcfcfc;
													}
													.cls-19 {
														fill: #fafbfb;
													}
													.cls-20 {
														fill: #253342;
													}
												</style>
												<linearGradient id="linear-gradient" x1="24.91" y1="42.04" x2="24.91" y2="11.04" gradientUnits="userSpaceOnUse">
													<stop offset="0" stop-color="#52c6f6" />
													<stop offset="1" stop-color="#f021da" />
												</linearGradient>
												<linearGradient id="linear-gradient-2" x1="41.35" y1="43.52" x2="41.35" y2="22.6" xlink:href="#linear-gradient" />
											</defs>
											<path
												class="cls-1"
												d="M10.52,37.15a2.67,2.67,0,0,1-2.19-1.59c-.08-.17-.18-.33-.27-.49V13.14a3.37,3.37,0,0,0,.21-.31,2.89,2.89,0,0,1,2.67-1.78H38.52a2.94,2.94,0,0,1,2.72,1.42,4.23,4.23,0,0,1,.46,1.65c.08.78,0,1.57.06,2.36s0,1.67,0,2.51c0,.61,0,1.22,0,1.82a.84.84,0,0,1-.41.59.49.49,0,0,1-.73-.36l0-.17-.07-4.41.06,0a.56.56,0,0,0,0-.88,4.43,4.43,0,0,0-.51-.06H9.79a3,3,0,0,0-.51.07,2.14,2.14,0,0,0-.16.53q0,8,0,15.94a2.21,2.21,0,0,0,.16.54.09.09,0,0,1,0,.12c.29.32.47.34.86.05l0-.06,1,0H32.89l1,0,.22.17c.06.19.45.27.19.57l-.13.19a.1.1,0,0,0-.07.07l-.2.1c-.7,0-1.4.08-2.1.09H11.29c-.32,0-.64,0-1,.05H9.38c-.3.82.26,1.28.64,1.8.05.06.2.07.3.08.41,0,.81.07,1.22.07H32.92c.2,0,.4,0,.61,0,.5,0,.81.27.81.62s-.3.59-.81.6H29.81v3.59c.61,0,1.19,0,1.76,0s.78.23.58,1l-.39.2c-1.52,0-3,.06-4.54.06h-8.4c-.31,0-.63-.05-.94-.08l-.25-.16c-.26-.38-.27-.57.25-.8.68-.32,1.36-.06,2.1-.27V37.21a1.55,1.55,0,0,0-.51-.2H11A1.62,1.62,0,0,0,10.52,37.15Zm10.71,3.66c.16.07.32.22.48.22,2.09,0,4.18,0,6.27,0,.14,0,.28-.12.43-.18a4.35,4.35,0,0,0,.13-.58c0-.87,0-1.74,0-2.62a2.06,2.06,0,0,0-.13-.47c-.12-.06-.24-.17-.36-.17H21.63c-.13,0-.27.13-.41.21ZM9.29,14.33c.21.39.57.21.86.21q14.76,0,29.52,0a4.14,4.14,0,0,0,.61,0c.08,0,.15-.14.22-.22a1.93,1.93,0,0,0-1.22-2c-.23-.35-.58-.17-.87-.18H11.31a3.84,3.84,0,0,0-.8.18A1.85,1.85,0,0,0,9.29,14.33Z"
											/>
											<path
												class="cls-2"
												d="M33.85,32.78l-1,0H11.1l-1,0c0-.35,0-.7,0-1V17.81c0-1.21.13-1.34,1.36-1.34H32.65l7.81,0,.07,4.41a.15.15,0,0,0,0,.17.49.49,0,0,0,.73.36.84.84,0,0,0,.41-.59c.06-.6,0-1.21,0-1.82,0-.84,0-1.68,0-2.51.7.13.85.25.86.84,0,1.55,0,3.09,0,4.71-.25,0-.47.06-.69.06H37.72a2.75,2.75,0,0,0-2.82,2.79c0,2.92,0,5.85,0,8.77v1a6.3,6.3,0,0,1-.71.07H11.32c-.86,0-.86,0-1-.71.32,0,.64-.05,1-.05H31.76c.7,0,1.4-.06,2.1-.09l.2-.1a.1.1,0,0,1,.07-.07l.13-.19c.26-.3-.13-.38-.19-.57ZM24.85,21H38.09a.46.46,0,0,0,.49-.5c0-.73,0-1.46,0-2.19a.64.64,0,0,0-.61-.63,4.14,4.14,0,0,0-.61,0H11.75a.49.49,0,0,0-.53.55c0,.76,0,1.52,0,2.28a.45.45,0,0,0,.48.5H24.85ZM11.21,26.79c0,1.34,0,2.69,0,4,0,.67.08.74.76.75s1.64,0,2.46,0c.44,0,.63-.18.63-.62,0-2.69,0-5.38,0-8.07,0-.54-.25-.77-.8-.79q-1.14,0-2.28,0c-.68,0-.76.08-.76.76C11.21,24.16,11.21,25.48,11.21,26.79Zm11.32-4.7h-4.2c-.33,0-.74,0-.82.32a3.6,3.6,0,0,0-.07,1.53c.1.47.61.43,1,.43q3.72,0,7.44,0c1.6,0,1.45.11,1.45-1.47,0-.74-.07-.8-.8-.81C25.22,22.08,23.88,22.09,22.53,22.09Zm-5,3.5a3.28,3.28,0,0,0-.13.52c0,.85,0,1.69,0,2.53,0,.65.18.8.85.81s1.4,0,2.1,0,.87-.09.88-.92,0-1.4,0-2.1c0-.91,0-.91-.91-.84-.2,0-.4,0-.61,0ZM30,25.65c0,1.14-.17,2.21-.15,3.33,0,.36.3.47.63.47.82,0,1.63,0,2.45,0,.55,0,.73-.19.74-.76,0-.84,0-1.69,0-2.54,0-.41-.19-.56-.59-.56C32,25.6,31.13,25.65,30,25.65Zm-2.82.07c-1.19.06-2.25-.16-3.37-.11a11.37,11.37,0,0,0-.14,3.15,3.17,3.17,0,0,0,.29.69c1,0,1.86,0,2.76,0,.57,0,.68-.12.69-.66q0-1.3,0-2.61C27.37,25.94,27.23,26,27.15,25.72Zm2.66-1.63c.2.11.36.25.51.25.91,0,1.81.05,2.72,0a.64.64,0,0,0,.63-.7c0-.27,0-.53,0-.79,0-.51-.26-.75-.76-.77-.81,0-1.63,0-2.45,0-.55,0-.63.12-.65.7C29.8,23.2,29.81,23.6,29.81,24.09Zm-10.52,7.5h1.4a.45.45,0,0,0,.52-.46c0-.35-.15-.58-.49-.59q-1.39,0-2.79,0a.52.52,0,0,0-.54.57c0,.35.25.5.59.49Zm12.39,0h0c.43,0,.87,0,1.31,0s.65-.12.61-.44a.86.86,0,0,0-.56-.61c-.89-.07-1.8,0-2.7,0a.5.5,0,0,0-.53.56c0,.38.22.51.56.51Zm-4.55,0c.38-.9.29-1.06-.56-1.07H24.22c-.39,0-.6.18-.59.58s.24.49.57.49C25.16,31.58,26.12,31.59,27.13,31.59Z"
											/>
											<path
												class="cls-3"
												d="M47.23,24.53l0,11.27c0,1.93,0,3.85,0,5.77v.16a2.1,2.1,0,0,1-2.24,1.76H38.56c-.29,0-.57,0-.86,0A2.22,2.22,0,0,1,35.47,41c0-5.33,0-10.67,0-16a5.46,5.46,0,0,1,.08-.68c.32-.11.18-.36.18-.57a1.91,1.91,0,0,1,1.88-1.16c2.48,0,5,0,7.43,0a2.14,2.14,0,0,1,2.11,1.77l0,.17ZM38.29,24c-.31-.61-.49-.7-1.06-.55a1.28,1.28,0,0,0-.94,1.39q0,8.22,0,16.44a1.27,1.27,0,0,0,.05.52c.15.3.2.71.65.75a7.67,7.67,0,0,0,1,.18c2.28,0,4.56,0,6.83,0a1.44,1.44,0,0,0,1.61-1.64q0-8.06,0-16.12a4.43,4.43,0,0,0-.28-1,1.31,1.31,0,0,0-1.47-.58c-.43.74-.47.77-1.23.77l-4.36,0Z"
											/>
											<path class="cls-4" d="M10.52,37.15A1.62,1.62,0,0,1,11,37h8.49a1.55,1.55,0,0,1,.51.2l-8.5,0C11.16,37.19,10.84,37.17,10.52,37.15Z" />
											<path class="cls-5" d="M35.74,23.78c0,.21.14.46-.18.57Z" />
											<path class="cls-6" d="M31.76,42l.39-.2Z" />
											<path class="cls-7" d="M47.18,24.55l0-.17Z" />
											<path class="cls-6" d="M17.63,41.79l.25.16Z" />
											<path class="cls-8" d="M40.46,16.45l-7.81,0H11.53c-1.23,0-1.36.13-1.36,1.34V31.67c0,.35,0,.7,0,1l0,.06-.86-.05a.09.09,0,0,0,0-.12v-17a3,3,0,0,1,.51-.07H40a4.43,4.43,0,0,1,.51.06l0,.88Z" />
											<path class="cls-9" d="M28.41,37.18a2.06,2.06,0,0,1,.13.47c0,.88,0,1.75,0,2.62a4.35,4.35,0,0,1-.13.58l-7.18,0V37.22Z" />
											<path class="cls-4" d="M28.41,37.18l-7.19,0c.14-.08.28-.21.41-.21h6.42C28.17,37,28.29,37.12,28.41,37.18Z" />
											<path class="cls-10" d="M21.23,40.81l7.18,0c-.15.06-.29.18-.43.18-2.09,0-4.18,0-6.27,0C21.55,41,21.39,40.88,21.23,40.81Z" />
											<path class="cls-11" d="M9.3,32.73l.86.05C9.77,33.07,9.59,33.05,9.3,32.73Z" />
											<path class="cls-12" d="M33.85,32.78l.22.17Z" />
											<path class="cls-12" d="M34.26,33.52l-.13.19Z" />
											<path class="cls-12" d="M34.06,33.78l-.2.1Z" />
											<path class="cls-7" d="M40.55,21a.15.15,0,0,1,0-.17Z" />
											<path class="cls-7" d="M47.16,41.73v-.16A.18.18,0,0,1,47.16,41.73Z" />
											<path class="cls-13" d="M24.85,21H11.7a.45.45,0,0,1-.48-.5c0-.76,0-1.52,0-2.28a.49.49,0,0,1,.53-.55h25.6a4.14,4.14,0,0,1,.61,0,.64.64,0,0,1,.61.63c0,.73,0,1.46,0,2.19a.46.46,0,0,1-.49.5H24.85Z" />
											<path
												class="cls-14"
												d="M11.21,26.79c0-1.31,0-2.63,0-3.94,0-.68.08-.75.76-.76s1.52,0,2.28,0c.55,0,.8.25.8.79,0,2.69,0,5.38,0,8.07,0,.44-.19.63-.63.62-.82,0-1.64,0-2.46,0s-.76-.08-.76-.75C11.21,29.48,11.21,28.13,11.21,26.79Z"
											/>
											<path class="cls-15" d="M22.53,22.09c1.35,0,2.69,0,4,0,.73,0,.8.07.8.81,0,1.58.15,1.47-1.45,1.47q-3.72,0-7.44,0c-.42,0-.93,0-1-.43a3.6,3.6,0,0,1,.07-1.53c.08-.34.49-.33.82-.32Z" />
											<path class="cls-15" d="M29.81,24.09c0-.49,0-.89,0-1.3,0-.58.1-.68.65-.7.82,0,1.64,0,2.45,0,.5,0,.72.26.76.77,0,.26,0,.52,0,.79a.64.64,0,0,1-.63.7c-.91,0-1.81,0-2.72,0C30.17,24.34,30,24.2,29.81,24.09Z" />
											<path class="cls-16" d="M19.29,31.59H18c-.34,0-.58-.14-.59-.49a.52.52,0,0,1,.54-.57q1.39,0,2.79,0c.34,0,.51.24.49.59a.45.45,0,0,1-.52.46Z" />
											<path class="cls-16" d="M25.48,31.59H24.17c-.34,0-.58-.14-.59-.49a.52.52,0,0,1,.54-.57q1.39,0,2.79,0c.34,0,.51.24.49.59a.45.45,0,0,1-.52.46Z" />
											<path class="cls-16" d="M31.7,31.59H30.39c-.35,0-.58-.14-.59-.49a.52.52,0,0,1,.53-.57c.93,0,1.86,0,2.8,0a.48.48,0,0,1,.48.59.45.45,0,0,1-.51.46Z" />
											<path
												class="cls-17"
												d="M46.45,25a4.43,4.43,0,0,0-.28-1c-.26,0-.5,0-.64.32s-.5.41-.89.41c-1.59,0-3.19,0-4.79,0-.37,0-.72,0-.74-.5L38.29,24A1.35,1.35,0,0,0,37,25.37c0,.21,0,.41,0,.62q0,8.28,0,16.56a7.67,7.67,0,0,0,1,.18c2.28,0,4.56,0,6.83,0a1.44,1.44,0,0,0,1.61-1.64Q46.46,33,46.45,25Zm-8.13,9.89a.55.55,0,0,1,.43-.34c.72,0,1.44,0,2.25,0a10.43,10.43,0,0,1,0,2.68H38.47A4.82,4.82,0,0,1,38.32,34.86Zm0-3.84c.83,0,1.47,0,2.1,0s.67.08.69.64,0,.93,0,1.39a.54.54,0,0,1-.59.6H38.91a.58.58,0,0,1-.62-.6C38.26,32.4,38.28,31.74,38.28,31Zm2.53,9.85c-.66,0-1.25,0-1.83,0s-.67-.14-.7-.67,0-1,0-1.49a.59.59,0,0,1,.66-.64,13.87,13.87,0,0,1,1.58,0c.18,0,.5.23.5.36A4.34,4.34,0,0,1,40.81,40.87ZM38.47,30a3.6,3.6,0,0,1-.22-.78c0-.53,0-1.05,0-1.58s.25-.79.8-.8h4.72c.44,0,.63.2.62.64,0,.61,0,1.22,0,1.83s-.1.69-.73.7C42,30,40.27,30,38.47,30Z"
											/>
											<path
												class="cls-18"
												d="M38.29,24A1.35,1.35,0,0,0,37,25.37c0,.21,0,.41,0,.62q0,8.28,0,16.56c-.45,0-.5-.45-.65-.75a1.27,1.27,0,0,1-.05-.52q0-8.22,0-16.44a1.28,1.28,0,0,1,.94-1.39C37.8,23.3,38,23.39,38.29,24Z"
											/>
											<path class="cls-19" d="M46.17,24c-.26,0-.5,0-.64.32s-.5.41-.89.41c-1.59,0-3.19,0-4.79,0-.37,0-.72,0-.74-.5l4.36,0c.76,0,.8,0,1.23-.77A1.31,1.31,0,0,1,46.17,24Z" />
											<path class="cls-13" d="M38.47,30a3.6,3.6,0,0,1-.22-.78c0-.53,0-1.05,0-1.58s.25-.79.8-.8h4.72c.44,0,.63.2.62.64,0,.61,0,1.22,0,1.83s-.1.69-.73.7C42,30,40.27,30,38.47,30Z" />
											<rect class="cls-20" x="38.24" y="30.9" width="2.88" height="2.88" rx="0.41" />
											<rect class="cls-20" x="17.37" y="25.58" width="3.86" height="3.86" rx="0.41" />
											<rect class="cls-20" x="23.56" y="25.58" width="3.86" height="3.86" rx="0.41" />
											<rect class="cls-20" x="29.78" y="25.58" width="3.86" height="3.86" rx="0.41" />
											<rect class="cls-15" x="29.78" y="22.08" width="3.86" height="2.27" rx="0.41" />
											<rect class="cls-20" x="38.24" y="34.4" width="2.88" height="2.88" rx="0.41" />
											<rect class="cls-20" x="38.24" y="38.02" width="2.88" height="2.88" rx="0.41" />
										</svg>
									</div>
									<div class="ei-service-text">
										<h3>Seller Central Portal</h3>
										<p><strong>One Platform For All Your Possible Needs:</strong> Showcase your entire product range with custom store pages and detailed sales analytics</p>
									</div>
								</div>
							</a>

							<a class="pager" data-slide-index="1">
								<div class="ei-service-icon-text text-right appeight-headline pera-content">
									<div class="ei-service-icon float-right text-center">
										<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
											<defs>
												<style>
													.cls-1 {
														fill: url(#linear-gradient);
													}
													.cls-2 {
														fill: url(#linear-gradient-2);
													}
													.cls-3 {
														fill: url(#linear-gradient-3);
													}
												</style>
												<linearGradient id="linear-gradient" x1="27.35" y1="27.29" x2="27.35" y2="11.03" gradientUnits="userSpaceOnUse">
													<stop offset="0" stop-color="#52c6f6" />
													<stop offset="1" stop-color="#f021da" />
												</linearGradient>
												<linearGradient id="linear-gradient-2" x1="27.35" y1="43.45" x2="27.35" y2="27.79" xlink:href="#linear-gradient" />
												<linearGradient id="linear-gradient-3" x1="27.35" y1="37.65" x2="27.35" y2="28.37" xlink:href="#linear-gradient" />
											</defs>
											<path
												class="cls-1"
												d="M44.64,24.56c-.1.22-.21.45-.31.68a3.32,3.32,0,0,1-2.86,2,3.2,3.2,0,0,1-2.5-.95c-.15-.14-.28-.31-.39-.43-.59.38-1.14.82-1.75,1.14a2.7,2.7,0,0,1-2.16.07,4,4,0,0,1-1.77-1.32,3.43,3.43,0,0,1-2.73,1.51,3.33,3.33,0,0,1-2.78-1.52,3.73,3.73,0,0,1-2.77,1.51,3.35,3.35,0,0,1-2.8-1.5A3.63,3.63,0,0,1,19,27.28a3.39,3.39,0,0,1-2.74-1.45c-.32.28-.61.55-.93.8a3.23,3.23,0,0,1-4.76-1,11.46,11.46,0,0,1-.5-1.19V22.71c.16-.42.3-.86.49-1.27,1.39-3.16,2.81-6.3,4.18-9.47A1.36,1.36,0,0,1,16.18,11c4.07,0,8.13,0,12.2,0,3.56,0,7.11,0,10.67,0a1.19,1.19,0,0,1,1.31.87c1.4,3.51,2.85,7,4.28,10.49ZM39.21,12.31H16c-.12.24-.25.46-.35.69l-2.1,4.7c-.6,1.35-1.19,2.71-1.8,4.06A4.15,4.15,0,0,0,11.3,24a2.15,2.15,0,0,0,1.41,1.92,2,2,0,0,0,2.18-.5A2.37,2.37,0,0,0,15.57,24a3,3,0,0,1,.1-.52.53.53,0,0,1,.59-.39.56.56,0,0,1,.54.47c0,.17,0,.36.05.53a2.3,2.3,0,0,0,2,2,2.17,2.17,0,0,0,2.18-1.7,3.65,3.65,0,0,0,.07-.46c0-.15.06-.3.1-.44a.56.56,0,0,1,.6-.39.52.52,0,0,1,.53.47c0,.15,0,.31,0,.46a2.42,2.42,0,0,0,1.4,1.89,2.1,2.1,0,0,0,2.8-1.4,3.75,3.75,0,0,0,.18-.82.63.63,0,0,1,.57-.62c.28,0,.49.19.58.59s.08.5.15.75A2.16,2.16,0,0,0,29.75,26a2,2,0,0,0,2-.81,2.74,2.74,0,0,0,.56-1.55.61.61,0,0,1,.59-.59.6.6,0,0,1,.59.51c0,.2,0,.41.08.61a2.11,2.11,0,0,0,3.45,1.36,2.27,2.27,0,0,0,.8-1.44c0-.15,0-.31,0-.46a.61.61,0,0,1,1.21,0c0,.15,0,.31,0,.46a2.3,2.3,0,0,0,2,1.92,2.1,2.1,0,0,0,2.16-1.61A3.91,3.91,0,0,0,43.19,22c-.82-2-1.62-3.93-2.43-5.89Z"
											/>
											<path
												class="cls-2"
												d="M27.28,43.45H15.6a1.92,1.92,0,0,1-2.14-2.14q0-3.3,0-6.61c0-1.87,0-3.74,0-5.61a4.79,4.79,0,0,1,.09-.83.48.48,0,0,1,.51-.47.59.59,0,0,1,.6.5,3.16,3.16,0,0,1,0,.69V40.89c0,1.32,0,1.32,1.32,1.32H39.13c.73,0,.86-.14.88-.84,0-.13,0-.26,0-.39V28.92a4.16,4.16,0,0,1,0-.61.55.55,0,0,1,.5-.5.52.52,0,0,1,.6.38,1.67,1.67,0,0,1,.11.59c0,4.2,0,8.4,0,12.6a1.81,1.81,0,0,1-1.82,2,5,5,0,0,1-.77,0Z"
											/>
											<path
												class="cls-3"
												d="M27.36,37.64c-2.77,0-5.54,0-8.3,0a2.88,2.88,0,0,1-1-.16A1.6,1.6,0,0,1,17,35.85V31.24c0-.33,0-.66,0-1a1.72,1.72,0,0,1,1.87-1.86h16.9a1.92,1.92,0,0,1,1.54.55A1.6,1.6,0,0,1,37.74,30c0,2,0,4,0,6A1.65,1.65,0,0,1,36,37.63c-.76,0-1.53,0-2.3,0Zm0-8c-2.76,0-5.52,0-8.29,0-.8,0-.87.07-.87.88,0,1.61,0,3.23,0,4.84,0,1,0,1.06,1.09,1.06H35.94c.42,0,.53-.15.56-.58,0-.25,0-.51,0-.76V30.53c0-.85-.07-.91-.93-.91-.1,0-.2,0-.31,0Z"
											/>
										</svg>
									</div>
									<div class="ei-service-text">
										<h3>3D Virtual Booth</h3>
										<p>DVM Central also enable manufacturers & suppliers to showcase their products interactively by using 3D Virtual Booths to attract more customers.</p>
									</div>
								</div>
							</a>

							<a class="pager" data-slide-index="2">
								<div class="ei-service-icon-text text-right appeight-headline pera-content">
									<div class="ei-service-icon float-right text-center">
										<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
											<defs>
												<style>
													.cls-1 {
														fill: url(#linear-gradient);
													}
													.cls-2 {
														fill: url(#linear-gradient-2);
													}
													.cls-3 {
														fill: url(#linear-gradient-3);
													}
													.cls-4 {
														fill: url(#linear-gradient-4);
													}
													.cls-5 {
														fill: url(#linear-gradient-5);
													}
												</style>
												<linearGradient id="linear-gradient" x1="27.22" y1="36.77" x2="27.22" y2="10.99" gradientUnits="userSpaceOnUse">
													<stop offset="0" stop-color="#52c6f6" />
													<stop offset="1" stop-color="#f021da" />
												</linearGradient>
												<linearGradient id="linear-gradient-2" x1="35.49" y1="44.6" x2="35.49" y2="38.13" xlink:href="#linear-gradient" />
												<linearGradient id="linear-gradient-3" x1="24.29" y1="44.6" x2="24.29" y2="38.13" xlink:href="#linear-gradient" />
												<linearGradient id="linear-gradient-4" x1="29.88" y1="23.21" x2="29.88" y2="21.34" xlink:href="#linear-gradient" />
												<linearGradient id="linear-gradient-5" x1="29.89" y1="27.85" x2="29.89" y2="25.94" xlink:href="#linear-gradient" />
											</defs>
											<path
												class="cls-1"
												d="M9.09,11.41a1.32,1.32,0,0,1,1.68-.22c1.06.51,2.14,1,3.24,1.42a2.12,2.12,0,0,1,1.38,1.72c.14.76.32,1.52.49,2.37H43.1A2.12,2.12,0,0,1,45.35,18v1.29c-.3,1.32-.62,2.65-.9,4-.51,2.44-1,4.88-1.5,7.33a1.91,1.91,0,0,1-2.23,1.81H19.12l.51,2.47H40.21a4.33,4.33,0,0,1,.88,0,.9.9,0,0,1,.75.91.92.92,0,0,1-.79.89,4.33,4.33,0,0,1-.72,0q-10.15,0-20.3,0c-1.48,0-2-.43-2.32-1.89-1.33-6.49-2.68-13-4-19.46A1.64,1.64,0,0,0,12.55,14,22.67,22.67,0,0,1,10,12.88a5.46,5.46,0,0,1-.87-.67Zm32,19.11,2.44-11.87c-1.58-.21-26.55-.13-27.19.11l2.42,11.76Z"
											/>
											<path
												class="cls-2"
												d="M32.25,41.35a3.24,3.24,0,0,1,6.48,0,3.31,3.31,0,0,1-3.25,3.24A3.28,3.28,0,0,1,32.25,41.35Zm4.56,0A1.36,1.36,0,0,0,35.45,40a1.41,1.41,0,0,0-1.33,1.36,1.33,1.33,0,0,0,1.38,1.34A1.27,1.27,0,0,0,36.81,41.36Z"
											/>
											<path
												class="cls-3"
												d="M27.51,41.37a3.24,3.24,0,0,1-3.23,3.23,3.29,3.29,0,0,1-3.22-3.26,3.23,3.23,0,1,1,6.45,0Zm-1.86,0A1.4,1.4,0,0,0,24.29,40,1.36,1.36,0,0,0,23,41.31a1.28,1.28,0,0,0,1.26,1.37A1.32,1.32,0,0,0,25.65,41.39Z"
											/>
											<path class="cls-4" d="M29.89,23.21H24c-1,0-1.41-.28-1.43-.92s.43-.94,1.38-.94c3.51,0,7,0,10.54,0,.51,0,1,0,1.52,0,.76,0,1.16.35,1.14.94s-.42.91-1.17.92Z" />
											<path
												class="cls-5"
												d="M29.8,27.84c-1.69,0-3.39,0-5.08,0a2.58,2.58,0,0,1-.87-.12.82.82,0,0,1-.57-.88.85.85,0,0,1,.66-.82,2.89,2.89,0,0,1,.72-.07H35.13c.89,0,1.34.32,1.37.91s-.46,1-1.39,1C33.34,27.85,31.57,27.84,29.8,27.84Z"
											/>
										</svg>
									</div>
									<div class="ei-service-text">
										<h3>Personalized Store Pages</h3>
										<p><strong>Full Authority:</strong> Setup Personalized Store pages by customizing headers, adding more pages for information, placing product banners, and listing all of their products.</p>
									</div>
								</div>
							</a>

							<a href="/seller" class="get-started-btn">Get Started</a>

						</div>
					</div>
				</div>
				<div class="eight-service-text position-relative appeight-headline wow fadeFromRight" data-wow-delay="200ms" data-wow-duration="1500ms">
					<!-- <div class="ei-service-slide-mbl" data-background="splash/assets/img/vet-tech/291x631-Banners-04.png"> -->
					<div class="ei-service-slide-mbl" data-background="">
						<div class="slide-inner">
							<div class="ei-service-slide">
								<div class="slide-item">
									<div class="image">
										<img src="splash/assets/img/vet-tech/sell-on-vetntech/1.png" alt="Seller Central Portal" />
									</div>
								</div>
								<div class="slide-item">
									<div class="image">
										<img src="splash/assets/img/vet-tech/sell-on-vetntech/2.png" alt="3D Virtual Booth" />
									</div>
								</div>
								<div class="slide-item">
									<div class="image">
										<img src="splash/assets/img/vet-tech/sell-on-vetntech/3.png" alt="Personalized Store Pages" />
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- <h2 class="d-none d-lg-block">Why Sell On DVM Central?</h2> --}}
				</div>
			</div>
			<div class="s-shape-bg1" data-parallax='{"x" : -70}'><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/s-shape3.png" alt="Blob" /></div>
			<div class="s-shape-bg2 text-center"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/s-shape4.png" alt="Blob" /></div>
		</section>
		<!-- End of Why Sell on VetandTech  section
        ============================================= -->

		<!-- Start of Buy Instruments  section
        ============================================= -->
		<section id="buy-direct" class="eg-how-work-section position-relative">
			<div class="how-work-bg-shape position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/hws.png" alt="Blob" /></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="ei-how-work-content-item wow fadeFromUp" data-wow-delay="100ms" data-wow-duration="1500ms">
							<div class="eight-section-title appeight-headline pera-content text-left">
								<span class="eg-title-tag">
									Buy Direct, Save More<i class="square-shape"><i></i><i></i><i></i><i></i></i>
								</span>
								<h2>
									Buy Instruments At The Right Price
									<span>From Leading Manufacturers</span>
								</h2>
							</div>
							<!-- /title -->
							<div id="how-workscrollbar" class="how-work-scroller">
								<div class="eg-how-work-content">
									<div class="eg-how-work-icon-text position-relative">
										<span class="scroller-no">1</span>
										<div class="eg-how-work-icon float-left text-center">
											<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
												<defs>
													<style>
														.cls-1 {
															fill: url(#linear-gradient);
														}
														.cls-2 {
															fill: url(#linear-gradient-2);
														}
													</style>
													<linearGradient id="linear-gradient" x1="27.7" y1="44.17" x2="27.7" y2="9.48" gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="#52c6f6" />
														<stop offset="1" stop-color="#f021da" />
													</linearGradient>
													<linearGradient id="linear-gradient-2" x1="36.67" y1="44.17" x2="36.67" y2="29.17" xlink:href="#linear-gradient" />
												</defs>
												<path
													class="cls-1"
													d="M43.28,34.38l-1.45-.77A15.62,15.62,0,0,0,43.28,28H37.94l-.33,3.36-1.44-.77C35.9,30.44,36,30.2,36,30c0-.65.11-1.3.16-2H28.63v6.45c.29,0,.59,0,.88,0a.51.51,0,0,1,.57.44c.1.4.22.79.35,1.27H28.72a42.28,42.28,0,0,0-.07,6.12,3.44,3.44,0,0,0,1.58-.58c.49-.3.94-.65,1.49-1l.78,2.71A17.29,17.29,0,0,1,16,14.07a17.31,17.31,0,0,1,27.3,20.31Zm-14.66-8.2H36.2A25.3,25.3,0,0,0,35,18.84l-6.37.38Zm-1.83,0v-7l-6.32-.38a24.19,24.19,0,0,0-1.22,7.35Zm-6.32,8.64,6.33-.39V28H19.27A23.9,23.9,0,0,0,20.47,34.83Zm-2.95-8.65A28.27,28.27,0,0,1,18.7,18.6l-3.81-.71a15.26,15.26,0,0,0-2.77,8.29Zm25.8,0a15.19,15.19,0,0,0-2.8-8.3l-3.79.71a28.82,28.82,0,0,1,1.19,7.59ZM17.52,28c-1.83,0-3.58,0-5.4,0a15.59,15.59,0,0,0,2.78,7.78l3.8-.71A28.73,28.73,0,0,1,17.52,28ZM34.31,17.17c-1.05-3-3.57-5.62-5.64-5.83a39.08,39.08,0,0,0,.06,6.13Zm-7.5.23V11.34c-2.15.32-5.32,3.63-5.57,5.8A46.61,46.61,0,0,0,26.81,17.4Zm0,25V36.26a42.92,42.92,0,0,0-5.58.27,1.77,1.77,0,0,0,0,.19,12,12,0,0,0,3.06,4.35A5.17,5.17,0,0,0,26.8,42.35ZM19.3,16.93a16.45,16.45,0,0,1,2.77-4.61c-1.88.51-5.12,2.78-5.86,4.09Zm16.83,0,3.15-.55a14.13,14.13,0,0,0-5.92-4.07A16.36,16.36,0,0,1,36.13,16.94Zm-20,20.33A14.74,14.74,0,0,0,22,41.33a18.1,18.1,0,0,1-2.73-4.6Z"
												/>
												<path
													class="cls-2"
													d="M36.52,39.44l-2.19,4h-.16a5.89,5.89,0,0,1-.24-.58l-2.77-9.67c-.3-1.07-.61-2.14-.91-3.2-.06-.22-.1-.43-.19-.81.34.15.56.22.76.32l9.93,5.28,1.91,1c.17.09.33.21.62.39-1.51.64-3,.86-4.5,1.45.2.27.35.49.51.69l2.93,3.6c.49.61.48.7-.12,1.19l-.91.74c-.56.45-.67.44-1.14-.14Q38.52,41.85,37,40Z"
												/>
											</svg>
										</div>
										<div class="eg-how-work-text appeight-headline pera-content">
											<h3>Visit DVM Central</h3>
											<p>Featuring Products from Leading Manufacturers & Suppliers, DVM Central Give Buyers The Best User Experience.</p>
										</div>
									</div>
									<div class="eg-how-work-icon-text position-relative">
										<span class="scroller-no">2</span>
										<div class="eg-how-work-icon float-left text-center">
											<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
												<defs>
													<style>
														.cls-1 {
															fill: url(#linear-gradient);
														}
														.cls-2 {
															fill: url(#linear-gradient-2);
														}
														.cls-3 {
															fill: url(#linear-gradient-3);
														}
														.cls-4 {
															fill: url(#linear-gradient-4);
														}
													</style>
													<linearGradient id="linear-gradient" x1="20.87" y1="26.76" x2="20.87" y2="14.34" gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="#52c6f6" />
														<stop offset="1" stop-color="#f021da" />
													</linearGradient>
													<linearGradient id="linear-gradient-2" x1="20.87" y1="40.96" x2="20.87" y2="28.54" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-3" x1="35.09" y1="26.76" x2="35.09" y2="14.34" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-4" x1="35.98" y1="42.76" x2="35.98" y2="28.54" xlink:href="#linear-gradient" />
												</defs>
												<path
													class="cls-1"
													d="M20.88,14.34h3.95A2.28,2.28,0,0,1,27,16.16a3.07,3.07,0,0,1,0,.53v7.7a2.28,2.28,0,0,1-2.33,2.36c-2.59,0-5.17,0-7.76,0a2.29,2.29,0,0,1-2.34-2.37V16.72A2.3,2.3,0,0,1,17,14.34Zm4.42,6.22V16.73a.54.54,0,0,0-.61-.61H17a.54.54,0,0,0-.61.61v7.63a.55.55,0,0,0,.63.62h7.61a.55.55,0,0,0,.63-.63Z"
												/>
												<path
													class="cls-2"
													d="M27.08,34.76v3.81A2.31,2.31,0,0,1,24.69,41H17a2.31,2.31,0,0,1-2.39-2.4V30.91a2.31,2.31,0,0,1,2-2.35H17c2.58,0,5.16,0,7.74,0a2.29,2.29,0,0,1,2.33,2,2.82,2.82,0,0,1,0,.41Zm-6.22-4.44H17a.54.54,0,0,0-.61.61v7.65a.55.55,0,0,0,.62.61h7.63a.55.55,0,0,0,.62-.63V31a.55.55,0,0,0-.63-.63Z"
												/>
												<path
													class="cls-3"
													d="M28.87,20.54c0-1.26,0-2.53,0-3.79a2.3,2.3,0,0,1,2.4-2.41h7.61a2.31,2.31,0,0,1,2.41,2.41v7.6a2.31,2.31,0,0,1-2.41,2.41H31.28a2.3,2.3,0,0,1-2.4-2.41C28.87,23.08,28.87,21.81,28.87,20.54Zm6.22-4.42H31.32c-.48,0-.67.18-.67.67v7.52c0,.48.2.67.67.67h7.54c.47,0,.67-.2.67-.66V16.76c0-.45-.2-.64-.65-.64Z"
												/>
												<path
													class="cls-4"
													d="M38.93,39.82a6.26,6.26,0,0,1-5.31,1.07,6,6,0,0,1-3.57-2.43,6.27,6.27,0,1,1,10.11.12l1.12,1.11,1.54,1.54a.89.89,0,0,1-.17,1.41.89.89,0,0,1-1.11-.18L39,40A1.71,1.71,0,0,1,38.93,39.82Zm-3.78-9.5a4.49,4.49,0,1,0,4.49,4.49A4.51,4.51,0,0,0,35.15,30.32Z"
												/>
											</svg>
										</div>
										<div class="eg-how-work-text appeight-headline pera-content">
											<h3>Search By Category</h3>
											<p>Narrow Down Your Search For The Product You Are Looking For By Selecting A Category.</p>
										</div>
									</div>
									<div class="eg-how-work-icon-text position-relative">
										<span class="scroller-no">3</span>
										<div class="eg-how-work-icon float-left text-center">
											<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
												<defs>
													<style>
														.cls-1 {
															fill: url(#linear-gradient);
														}
														.cls-2 {
															fill: url(#linear-gradient-2);
														}
														.cls-3 {
															fill: url(#linear-gradient-3);
														}
														.cls-4 {
															fill: url(#linear-gradient-4);
														}
														.cls-5 {
															fill: url(#linear-gradient-5);
														}
														.cls-6 {
															fill: url(#linear-gradient-6);
														}
														.cls-7 {
															fill: url(#linear-gradient-7);
														}
														.cls-8 {
															fill: url(#linear-gradient-8);
														}
														.cls-9 {
															fill: url(#linear-gradient-9);
														}
													</style>
													<linearGradient id="linear-gradient" x1="25.45" y1="28.2" x2="25.45" y2="11.26" gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="#52c6f6" />
														<stop offset="1" stop-color="#f021da" />
													</linearGradient>
													<linearGradient id="linear-gradient-2" x1="36.51" y1="42.74" x2="36.51" y2="30.58" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-3" x1="20.98" y1="40.64" x2="20.98" y2="33.89" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-4" x1="24.84" y1="20.23" x2="24.84" y2="18.01" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-5" x1="24.84" y1="27" x2="24.84" y2="24.79" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-6" x1="22.63" y1="33.77" x2="22.63" y2="31.54" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-7" x1="13.66" y1="29.35" x2="13.66" y2="22.65" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-8" x1="13.64" y1="21.49" x2="13.64" y2="19.26" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-9" x1="13.69" y1="32.73" x2="13.69" y2="30.54" xlink:href="#linear-gradient" />
												</defs>
												<path
													class="cls-1"
													d="M25.37,11.26h9.2a3.46,3.46,0,0,1,3.84,3.81c0,3.89,0,7.79,0,11.68,0,.94-.39,1.45-1.11,1.45s-1.12-.53-1.12-1.44c0-3.87,0-7.74,0-11.61,0-1.3-.36-1.66-1.66-1.65L16,13.62c-.93,0-1.29.38-1.31,1.32,0,.61,0,1.22,0,1.84,0,.8-.45,1.28-1.12,1.29s-1.09-.49-1.11-1.29,0-1.44,0-2.16a3.29,3.29,0,0,1,3.28-3.24c3.2,0,6.4,0,9.6,0Z"
												/>
												<path
													class="cls-2"
													d="M39.53,38.17c.85.83,1.7,1.64,2.52,2.46.65.65.71,1.23.22,1.75s-1.13.47-1.8-.19-1.41-1.38-2.09-2.1a.65.65,0,0,0-.88-.18,4.91,4.91,0,0,1-7.06-4,5,5,0,0,1,4.43-5.26,4.92,4.92,0,0,1,5.34,4.2A5.21,5.21,0,0,1,39.53,38.17Zm-4.16-5.33a2.68,2.68,0,0,0-2.7,2.67,2.7,2.7,0,1,0,2.7-2.67Z"
												/>
												<path
													class="cls-3"
													d="M22,40.64H16.25A3.37,3.37,0,0,1,12.58,37c0-.66,0-1.33,0-2s.51-1.19,1.17-1.13a1,1,0,0,1,1,1.18c0,.62,0,1.23,0,1.84,0,1.08.43,1.51,1.51,1.51l11-.08h.56c1,0,1.53.41,1.52,1.14s-.53,1.07-1.48,1.07H22Z"
												/>
												<path class="cls-4" d="M24.88,20.23H19.53c-.89,0-1.39-.39-1.41-1.06S18.62,18,19.54,18q5.33,0,10.63,0c.9,0,1.37.4,1.39,1.09s-.46,1.12-1.41,1.13Z" />
												<path class="cls-5" d="M24.87,24.79h5.35c.9,0,1.35.4,1.34,1.12S31.11,27,30.26,27q-5.43,0-10.86,0a1.14,1.14,0,0,1-1.28-1.12c0-.65.51-1.07,1.32-1.08Z" />
												<path class="cls-6" d="M22.64,31.54h3.28a1.09,1.09,0,0,1,1.22,1.08A1.08,1.08,0,0,1,26,33.75q-3.33,0-6.64,0a1.11,1.11,0,0,1-1.2-1.13,1.15,1.15,0,0,1,1.24-1.08Z" />
												<path class="cls-7" d="M14.77,26c0,.75,0,1.49,0,2.24a1,1,0,0,1-1,1.07,1,1,0,0,1-1.13-1c-.06-1.57-.08-3.14,0-4.7a1,1,0,0,1,1.2-1,1.06,1.06,0,0,1,1,1.14V26Z" />
												<path class="cls-8" d="M13.59,21.48H12.47a1,1,0,0,1-1.06-1,1,1,0,0,1,.85-1.16,15.19,15.19,0,0,1,2.78,0,1,1,0,0,1,.82,1.1,1,1,0,0,1-1,1,10.76,10.76,0,0,1-1.27,0Z" />
												<path class="cls-9" d="M13.65,32.72c-.39,0-.8,0-1.19,0a1,1,0,0,1-1-1,1,1,0,0,1,.93-1.09,24.1,24.1,0,0,1,2.55,0,.94.94,0,0,1,.93,1A1,1,0,0,1,15,32.7a12.32,12.32,0,0,1-1.36,0Z" />
											</svg>
										</div>
										<div class="eg-how-work-text appeight-headline pera-content">
											<h3>Seach By Name</h3>
											<p>The Dynamic Search Bar The Platform Features Can Find Your Product In a Matter Of Seconds.</p>
										</div>
									</div>
									<div class="eg-how-work-icon-text position-relative">
										<span class="scroller-no">4</span>
										<div class="eg-how-work-icon float-left text-center">
											<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
												<defs>
													<style>
														.cls-1 {
															fill: url(#linear-gradient);
														}
														.cls-2 {
															fill: url(#linear-gradient-2);
														}
														.cls-3 {
															fill: url(#linear-gradient-3);
														}
														.cls-4 {
															fill: url(#linear-gradient-4);
														}
													</style>
													<linearGradient id="linear-gradient" x1="34.71" y1="35.23" x2="34.71" y2="17.57" gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="#52c6f6" />
														<stop offset="1" stop-color="#f021da" />
													</linearGradient>
													<linearGradient id="linear-gradient-2" x1="21.3" y1="41.94" x2="21.3" y2="24.24" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-3" x1="23.44" y1="26.94" x2="23.44" y2="12.06" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-4" x1="23.69" y1="23.92" x2="23.69" y2="17.84" xlink:href="#linear-gradient" />
												</defs>
												<path
													class="cls-1"
													d="M36.2,17.58A5.54,5.54,0,0,1,40,19.14c.31.31.62.61.92.93a5.73,5.73,0,0,1-.38,8.3c-1.87,1.68-3.66,3.46-5.49,5.19a5.73,5.73,0,0,1-4.68,1.64,5.31,5.31,0,0,1-2.64-1A2.41,2.41,0,0,1,27,31.5a2.52,2.52,0,0,1,2.09-1.73,2.39,2.39,0,0,1,1.44.23.93.93,0,0,0,1.24-.19c1.76-1.69,3.54-3.35,5.3-5,.63-.6.63-.81.06-1.45L37,23.22c-.73-.78-.93-.8-1.7-.09s-1.44,1.34-2.14,2a2.42,2.42,0,0,1-2.88.47,2.62,2.62,0,0,1-1.42-2.58,1.89,1.89,0,0,1,.57-1.23c1.09-1,2.15-2.12,3.3-3.09A5,5,0,0,1,36.2,17.58ZM31.09,34A3.87,3.87,0,0,0,34,32.91q3-2.82,6-5.68A4.39,4.39,0,0,0,40.2,21c-.31-.34-.64-.67-1-1a4.48,4.48,0,0,0-6-.22c-1,.84-1.88,1.73-2.79,2.62a1.18,1.18,0,0,0-.06,1.78,1.25,1.25,0,0,0,1.85.18c.2-.16.38-.35.57-.53l2-1.91a1.82,1.82,0,0,1,1.43-.53,3.3,3.3,0,0,1,2.42,2.33A2,2,0,0,1,38,25.54c-1.2,1.1-2.36,2.23-3.54,3.34-.7.66-1.4,1.32-2.1,2a1.75,1.75,0,0,1-2.08.35,2.88,2.88,0,0,0-.49-.18,1.35,1.35,0,0,0-1.64.8,1.28,1.28,0,0,0,.65,1.61A4,4,0,0,0,31.09,34Z"
												/>
												<path
													class="cls-2"
													d="M24.87,24.24a6.05,6.05,0,0,1,3,.87A2.45,2.45,0,0,1,29.05,28a2.62,2.62,0,0,1-2.32,1.82,3.18,3.18,0,0,1-1.25-.29.93.93,0,0,0-1.17.16c-1.82,1.75-3.66,3.48-5.48,5.22-.48.47-.47.65,0,1.18.91,1.11,1.09,1.12,2.1.14.67-.64,1.34-1.28,2-1.91a2.45,2.45,0,0,1,3.45.08,2.4,2.4,0,0,1,.09,3.49c-1,.94-1.94,1.91-3,2.79A5.59,5.59,0,0,1,16,40.39a8.86,8.86,0,0,1-1.93-2.33,5.68,5.68,0,0,1,1.18-6.77l3.54-3.35,2.35-2.2A5.68,5.68,0,0,1,24.87,24.24Zm-5,16.51a3.94,3.94,0,0,0,2.69-.9c1.06-.9,2.05-1.88,3-2.85a1.37,1.37,0,0,0,.35-.76,1.28,1.28,0,0,0-.8-1.32,1.14,1.14,0,0,0-1.43.25c-.81.78-1.63,1.56-2.47,2.33a1.89,1.89,0,0,1-2.78-.08,5.73,5.73,0,0,0-.54-.56A2,2,0,0,1,18,33.93c1-.79,1.83-1.69,2.73-2.54L23.6,28.7a1.8,1.8,0,0,1,2.16-.39,2.18,2.18,0,0,0,.47.21,1.41,1.41,0,0,0,1.61-.73,1.22,1.22,0,0,0-.46-1.6,2.77,2.77,0,0,0-.76-.4,4.47,4.47,0,0,0-4.9,1c-.87.81-1.73,1.63-2.59,2.45-1.11,1.06-2.26,2.09-3.31,3.21a4.34,4.34,0,0,0-.14,5.86,9.76,9.76,0,0,0,1.26,1.31A4.33,4.33,0,0,0,19.86,40.75Z"
												/>
												<path
													class="cls-3"
													d="M24.08,12.06l3.31.78-.51,2.26,1.36,1,2-1.17L32,17.84l-2.41,1.47-.64-1,1.38-.91-.53-.9-1.69,1-2.59-1.89.4-1.93-1-.24-.51,1.91-3.17.48-1.05-1.64-.93.53,1,1.72L18.44,19l-2-.38-.2,1,1,.28.82.23.53,3.16L17,24.38l.52.92,1.4-.81.66,1-2.42,1.49-1.8-3,2-1.22-.21-1.55c-.66-.43-1.49-.36-2.26-.72.12-.52.24-1.05.37-1.58s.27-1.06.43-1.69l2.24.48.95-1.35-1.14-2,2.91-1.8,1.23,1.94,1.65-.25Z"
												/>
												<path class="cls-4" d="M23.46,23.92a3,3,0,0,1-2.74-2.17,3.08,3.08,0,0,1,5-3.12,2.86,2.86,0,0,1,.68,3.49l-.93-.42c0-.26.06-.48.07-.71a1.88,1.88,0,0,0-3.68-.6,1.87,1.87,0,0,0,1,2.24c.21.1.42.17.66.27Z" />
											</svg>
										</div>
										<div class="eg-how-work-text appeight-headline pera-content">
											<h3>Connect With Manufacturer</h3>
											<p>Connect With Manufacturers Directly To Get Product Insights Or Submit An Order For a Customized Instrument.</p>
										</div>
									</div>
									<div class="eg-how-work-icon-text position-relative">
										<span class="scroller-no">5</span>
										<div class="eg-how-work-icon float-left text-center">
											<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54 54">
												<defs>
													<style>
														.cls-1 {
															fill: url(#linear-gradient);
														}
														.cls-2 {
															fill: url(#linear-gradient-2);
														}
														.cls-3 {
															fill: url(#linear-gradient-3);
														}
														.cls-4 {
															fill: url(#linear-gradient-4);
														}
													</style>
													<linearGradient id="linear-gradient" x1="27" y1="35.42" x2="27" y2="16.3" gradientUnits="userSpaceOnUse">
														<stop offset="0" stop-color="#52c6f6" />
														<stop offset="1" stop-color="#f021da" />
													</linearGradient>
													<linearGradient id="linear-gradient-2" x1="29.97" y1="28.94" x2="29.97" y2="12.59" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-3" x1="23.18" y1="41.41" x2="23.18" y2="37.36" xlink:href="#linear-gradient" />
													<linearGradient id="linear-gradient-4" x1="36" y1="41.41" x2="36" y2="37.36" xlink:href="#linear-gradient" />
												</defs>
												<path
													class="cls-1"
													d="M13.1,18.12V16.61a3.29,3.29,0,0,1,4.55,1.87l5,13.26c.13.34.28.67.39,1a1.32,1.32,0,0,0,1.42,1c2.34,0,4.69,0,7,0l3.38,0c1,0,1.09-.1,1.41-1,.92-2.65,1.82-5.31,2.74-8,.08-.25.18-.49.31-.84l1.55.54-1.53,4.47c-.51,1.5-1,3-1.53,4.5A2.69,2.69,0,0,1,35,35.41H24.42a2.76,2.76,0,0,1-2.93-2.05l-5.24-13.8-.17-.47c-.37-.9-.47-1-1.48-1C14.14,18.11,13.68,18.12,13.1,18.12Z"
												/>
												<path class="cls-2" d="M30,28.94l-8-8a2,2,0,0,1,2.83.22c1.16,1.13,2.3,2.28,3.45,3.42l.85.79V12.59h1.63V25.48c.69-.68,1.22-1.22,1.75-1.75.85-.84,1.68-1.69,2.53-2.52A2.06,2.06,0,0,1,38,21Z" />
												<path class="cls-3" d="M23.15,41.41a2,2,0,0,1,0-4,2,2,0,1,1,0,4Z" />
												<path class="cls-4" d="M36.05,37.36a2,2,0,1,1-2.11,2A2.07,2.07,0,0,1,36.05,37.36Z" />
											</svg>
										</div>
										<div class="eg-how-work-text appeight-headline pera-content">
											<h3>Buy Direct</h3>
											<p>We Are Committed To Promoting The Culture Of Direct Buying Without Any Third-Part Involved To Avoid Any Hassle.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="how-work-mockup position-relative wow fadeFromUp" data-wow-delay="200ms" data-wow-duration="1500ms">
							<div class="hw-mockup-img">
								<img class="lazyload" data-src="splash/assets/img/vet-tech/buy-instruments/1.png" alt="Buy Instruments" />
								<img class="lazyload" data-src="splash/assets/img/vet-tech/buy-instruments/2.png" alt="Buy Instruments" />
								<img class="lazyload" data-src="splash/assets/img/vet-tech/buy-instruments/3.png" alt="Buy Instruments" />
								<img class="lazyload" data-src="splash/assets/img/vet-tech/buy-instruments/4.png" alt="Buy Instruments" />
								<img class="lazyload" data-src="splash/assets/img/vet-tech/buy-instruments/5.png" alt="Buy Instruments" />

							</div>
							<div class="hw-shape1 position-absolute" data-parallax='{"x" : 40}'><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/fc1.png" alt="Blob" /></div>
							<div class="hw-shape2 position-absolute" data-parallax='{"x" : -30}'><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/fc2.png" alt="Blob" /></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End  of Buy Instruments  section
        ============================================= -->

		<!-- Start of jobs section
        ============================================= -->
		{{-- <section id="fun-fact" class="eg-fun-fact-section position-relative">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="eg-funfact-content clearfix position-relative">
							
							<div class="eg-funfact-text wow fadeFromRight" data-wow-delay="300ms" data-wow-duration="1500ms">
								<div class="eight-section-title appeight-headline pera-content text-center">
									<span class="eg-title-tag">
										
										Explore Jobs<i class="square-shape"><i></i><i></i><i></i><i></i></i
									></span>
									<h2>Search For Your <span>Dream Jobs</span></h2>
								</div>

								<div class="job-carasousel-outer-container position-relative">
									<div class="row job-carasousel-container swiper-container">					
										<div class="job-wrapper swiper-wrapper">
											@foreach($jobs as $key => $job)
											<div class="swiper-slide">
												<div class="job-card">
														<h4 class="job-title">{{$job->title}}</h4>
														<div class="job-detail">
															<div class="company">Company:<span> {{$job->vendor->name}}</span></div>
															<div class="state">State:<span> {{$job->state->name}}</span></div>
															<div class="country">Country:<span> {{$job->country->name}}</span></div>
															
														</div>
													</div>
												</div>
											@endforeach
										</div>
									</div>
								
								
									<div class="swiper-button-prev"></div>
									<div class="swiper-button-next"></div>
								
								</div>
								<a href="/jobs/listing" class="get-started-btn">View All</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="screenshoot-vector screenshoot-shape1 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/ss-shape1.png" alt="Blob" /></div>
			<div class="screenshoot-vector screenshoot-shape2 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/ss-shape2.png" alt="Blob" /></div>
		</section> --}}
		<!-- End of jobs  section
        ============================================= -->

		<!-- Start of faq section
        ============================================= -->
		<section id="faq" class="ei-faq-section position-relative">
			<div class="container">
				<div class="eight-section-title appeight-headline pera-content text-center">
					<span class="eg-title-tag"
						>Frequently Asked Questions <i class="square-shape"><i></i><i></i><i></i><i></i></i
					></span>
					<h2>
						Got a Question?
						<span> We Are Here to Answer!</span>
					</h2>
					{{-- <p>Connect With Experts Available 24/7 To Provide The Best Support And Resolve Your Concerns.</p> --}}
				</div>

				<div class="accordion-container">
					<ul class="accordion-wrapper">
						<li>
							<h3>
								<span class=mr-2> What is VetandTech? </span>
								<svg xmlns=http://www.w3.org/2000/svg class="open-icon" fill=none viewBox="0 0 24 24" stroke=#000>
								<path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 9l-7 7-7-7"/>
								</svg>
							</h3>
						</li>
						<div class=text-hider>
							<p class="p-4 sm:p-6"> VetandTech is a single-source veterinary platform promoting the culture of direct buying from the manufacturers by connecting manufacturers and suppliers of veterinary health products with customers. Except for that, VetandTech offers many educational resources such as CE courses, Webinars, Trade Shows, and Guides for veterinary professionals, students, nurses, technicians, and support staff.</p>
						</div>
					</ul>
					<ul class="accordion-wrapper">
						<li>
							<h3>
								<span class=mr-2> Why should I join VetandTech? </span>
								<svg xmlns=http://www.w3.org/2000/svg class="open-icon" fill=none viewBox="0 0 24 24" stroke=#000>
								<path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 9l-7 7-7-7"/>
								</svg>
							</h3> 
						</li>
						<div class=text-hider>
							<p class="p-4 sm:p-6">  If you are a manufacturer or wholeseller of veterinary products, you can join the VetandTech platform to grow your business. On the other hand, if you are a buyer of animal health products, VetandTech is the best place to buy directly from the manufacturers at a cost-efficient price. Also, joining VetandTech will provide you with the most reliable educational programs to earn credit hours and improve your practice. </p>
						</div>
					</ul>
					
					<ul class="accordion-wrapper">
						<li>
							<h3>
								<span class=mr-2> What information do I need to provide to become a Vendor? </span>
								<svg xmlns=http://www.w3.org/2000/svg class="open-icon" fill=none viewBox="0 0 24 24" stroke=#000>
								<path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 9l-7 7-7-7"/>
								</svg>
							</h3> 
						</li>
						<div class=text-hider>
							<p class="p-4 sm:p-6"> You must provide basic information such as your name, company name, E-mail address, and phone number. You will be contacted within 48 hours for verification and additional information. </p>
						</div>
					</ul>

					<ul class="accordion-wrapper">
						<li>
							<h3>
								<span class=mr-2>Are educational resources free on VetandTech?</span>
								<svg xmlns=http://www.w3.org/2000/svg class="open-icon" fill=none viewBox="0 0 24 24" stroke=#000>
								<path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 9l-7 7-7-7"/>
								</svg>
							</h3> 
						</li>
						<div class=text-hider>
							<p class="p-4 sm:p-6"> VetandTech provides both free and paid educational resources. The live online courses will have fees. It also depends on the instructor whether to charge the course fees or not. </p>
						</div>
					</ul>

					<ul class="accordion-wrapper">
						<li>
							<h3>
								<span class=mr-2>Can I earn credits through CE courses?</span>
								<svg xmlns=http://www.w3.org/2000/svg class="open-icon" fill=none viewBox="0 0 24 24" stroke=#000>
								<path stroke-linecap=round stroke-linejoin=round stroke-width=2 d="M19 9l-7 7-7-7"/>
								</svg>
							</h3> 
						</li>
						<div class=text-hider>
							<p class="p-4 sm:p-6"> Yes, veterinary students, nurses, and professionals can join our CE Courses and earn credit hours accordingly. Each course has different credit hours with varying credibilities.  </p>
						</div>
					</ul>


				</div>

				<a href="/faqs" class="get-started-btn">View More</a>
			</div>

			<span class="ei-faq-shape fq-shape-style1 d-none d-sm-block" data-parallax='{"x" : 50}'><img src="splash/assets/img/vet-tech/shape/fq-shape1.png" alt="Blob" /></span>
			<span class="ei-faq-shape fq-shape-style2 d-none d-sm-block"><img src="splash/assets/img/vet-tech/shape/fq-shape2.png" alt="Blob" /></span>
			<span class="ei-faq-shape fq-shape-style3 d-none d-lg-block"><img src="splash/assets/img/vet-tech/shape/fq-shape3.png" alt="Blob" /></span>
			<span class="ei-faq-shape fq-shape-style4 d-none d-lg-block" data-parallax='{"y" : 60}'><img src="splash/assets/img/vet-tech/shape/fq-shape4.png" alt="Blob" /></span>
			<span class="ei-faq-shape fq-shape-style5"><img src="splash/assets/img/vet-tech/shape/fq-shape5.png" alt="Blob" /></span>
			<span class="ei-faq-shape fq-shape-style6"><img src="splash/assets/img/vet-tech/shape/fq-shape6.png" alt="Blob" /></span>
			<span class="ei-faq-shape fq-shape-style8"><img src="splash/assets/img/vet-tech/shape/fq-shape8.png" alt="Blob" /></span>
			<span class="ei-faq-shape fq-shape-style7"><img src="splash/assets/img/vet-tech/shape/fq-shape7.png" alt="Blob" /><img src="splash/assets/img/vet-tech/shape/fq-shape7.png" alt="Blob" /> <img src="splash/assets/img/vet-tech/shape/fq-shape7.png" alt="Blob" /></span>
		</section>
		<!-- End of Faq section
        ============================================= -->

		<!-- Start of video player section
        ============================================= -->
		<div class="video-player-container position-fixed">
			<div class="video-player-inner-wrapper position-relative">
				<svg xmlns="http://www.w3.org/2000/svg" class="video-close-btn" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2">
					<path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
				</svg>

				<div class="video-player-wrapper position-relative">
					<iframe class="video-iframe" id="main-page-video-iframe" data-src="https://player.vimeo.com/video/727050480?h=8b0760cbcf" width="640" height="564" frameborder="0" allow="autoplay; fullscreen"></iframe>
				</div>
			</div>
		</div>
		<section class="ei-screenshots-section position-relative video-section">
			<div class="container">
				<div class="eight-section-title appeight-headline pera-content text-center">
					<span class="eg-title-tag">
						Introducing DVM Central <i class="square-shape"> <i></i><i></i><i></i><i></i></i
					></span>
					<h2>DVM Central - Your Ultimate Source Featuring <span> Animal Health Products & Free Educational Resources</span></h2>
				</div>
				<!-- /title -->

				<div class="video-icon-container d-flex justify-content-center w-100">
					<div class="wrapper">
						<div class="video-main">
							<div class="promo-video">
								<div class="waves-block">
									<div class="waves wave-1"></div>
									<div class="waves wave-2"></div>
									<div class="waves wave-3"></div>
								</div>
							</div>
							<div class="video-btn video-popup mfp-iframe" data-lity><i class="fa fa-play"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="screenshoot-vector screenshoot-shape1 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/ss-shape1.png" alt="Blob" /></div>
			<div class="screenshoot-vector screenshoot-shape2 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/ss-shape2.png" alt="Blob" /></div>
		</section>
		<!-- End  of video player section
        ============================================= -->

		

	

		<!-- Start of events section
       

		

	

		<!-- Start of Partner  section
        ============================================= -->
		<!-- <section id="ei-partner" class="ei-partner-section">
			<div class="container">
				<div class="ei-partner-content">
					<div id="ei-partner-slide" class="partner-slide-area owl-carousel">
						<div class="partner-img">
							<img src="splash/assets/img/vet-tech/partner/p1.png" alt="" />
						</div>
						<div class="partner-img">
							<img src="splash/assets/img/vet-tech/partner/p2.png" alt="" />
						</div>
						<div class="partner-img">
							<img src="splash/assets/img/vet-tech/partner/p3.png" alt="" />
						</div>
						<div class="partner-img">
							<img src="splash/assets/img/vet-tech/partner/p4.png" alt="" />
						</div>

						<div class="partner-img">
							<img src="splash/assets/img/vet-tech/partner/p2.png" alt="" />
						</div>
						<div class="partner-img">
							<img src="splash/assets/img/vet-tech/partner/p3.png" alt="" />
						</div>
					</div>
					<div class="ei-partner-text appeight-headline pera-content">
						<div class="ei-partner-icon text-center float-left">
							<i class="fas fa-gem"></i>
						</div>
						<h4>Trusted by 12,00 companies!</h4>
						<p>We have more than 1200+ trusted clients around World wide.</p>
					</div>
				</div>
			</div>
		</section> -->
		<!-- End  of Partner  section
        ============================================= -->

		<!-- Start of Newslatter  section
        ============================================= -->
		<section id="ei-newslatter" class="ei-newslatter-section position-relative">
			<div class="ei-newslatter-box position-relative">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="ei-newslatter-contnet appeight-headline pera-content">
								<h3>Sign Up For Our <span>Newsletter!</span></h3>
								<div class="ei-newslatter-form position-relative">
									<form class="flex flex-col sm:flex-row sm:items-center" id="frm_subscribe"
										name="frm_subscribe" action="/subscribe" method="POST">
										@csrf
										<input type="email" id="subs_email" name="email" placeholder="Enter your email address" />
										<input type="hidden" name="subs_type" id="sub_type" value="footer" />
										<div class="nws-button position-absolute text-capitalize">
											<button class="hover-btn" type="submit" value="Submit">Subscribe Now</button>
										</div>
										<p>Get Updates On Latest Trends, Webinars, Education Resources, Conference & New Products.</p>
									</form>
									<div class="hidden response-div text-center text-white w-full" id="response_div">
    								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="ei-news-vector1 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/n-shape1.png" alt="Blob" /></div>
				<div class="ei-news-vector2 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/n-shape2.png" alt="Blob" /></div>
				<div class="ei-news-vector3 position-absolute" data-parallax='{"x" : 50}'><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/n-shape3.png" alt="Blob" /></div>
			</div>
			<div class="ei-newslatter-mockup">
				<img class="lazyload" data-src="splash/assets/img/vet-tech/signup.png" alt="Singup for Newsletter" />
			</div>
		</section>
		<!-- End of Newslatter  section
        ============================================= -->

		<!-- Start of Footer  section
        ============================================= -->
		<section id="ei-footer" class="ei-footer-section position-relative">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3">
						<div class="ei-footer-widget pera-content appeight-headline">
							<div class="ei-footer-logo">
								<img class="lp-logo-img lazyload" data-src="splash/assets/img/vet-tech/logo.svg" alt="DVM Central" />
							</div>
							{{-- <p>
								One-Stop-Resource For Your Veterinary Practices, Committed To Promote The Culture Of Direct Buying From Leading Manufacturers And Help Veterinary Practitioners Further Their Career To Reach New Heights Of Growth And
								Success!
							</p> --}}
							
							<div style="color: #5e5e5e;">
								<div>1201 North Market Street, Suite 111, Wilmington, DE 19801</div>
								<span style="color:#373a5b;margin-right:0.5rem;">Ph: </span><a href="tel:+13024097530">302-409-7530</a>
							</div>

							<ul class="footer-links list-unstyled">
								<li class="social-info pl-0 pt-2">
									<a href="https://www.facebook.com/vetandtech" target="_blank">
										<img class="lazyload" data-src="splash/assets/img/vet-tech/footer/facebook.svg" alt="facebook account" />
									</a>
									<a href="https://twitter.com/VetandTech" target="_blank">
										<img class="lazyload" data-src="splash/assets/img/vet-tech/footer/twitter.svg" alt="twitter account" />
									</a>
									<a href="https://www.linkedin.com/company/vetandtech" target="_blank">
										<img class="lazyload" data-src="splash/assets/img/vet-tech/footer/linkedin.svg" class="linkedin" alt="linkedin account" />
									</a>
									<a href="https://www.instagram.com/vetandtechofficial" target="_blank">
										<img class="lazyload" data-src="splash/assets/img/vet-tech/footer/instagram.svg" alt="instagram account" />
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6 col-lg-3">
						<div class="ei-footer-widget appeight-headline ul-li-block">
							<h3 class="ei-widget-title">Buy With Confidence</h3>
							<ul class="footer-links">
								{{-- <li><a href="#">Satisfaction Guaranteed</a></li>
								<li><a href="#">Testimonials</a></li> --}}
								<li><a href="/about-us">About Us</a></li>
								<li><a href="/faqs">FAQ's</a></li>
								<li><a href="/our-mission">Our Mission</a></li>
								<li><a href="/contact-us">Contact</a></li>
								<li><a href="{{ route('frontend.privacy-policy') }}">Privacy Policy </a></li>
							</ul>
						</div>
						<div class="app-down-btn mt-2">
							<a href="https://play.google.com/store/apps/details?id=com.gtechsources.vetandtech.app" target="_blank"><img width="125px" class=" lazyloaded" data-src="splash/assets/img/vet-tech/shape/btn1.png" alt="Blob" src="splash/assets/img/vet-tech/shape/btn1.png"></a>
							<a href="https://apps.apple.com/pk/app/vet-and-tech/id1634400448" target="_blank"><img width="125px" class=" lazyloaded" data-src="splash/assets/img/vet-tech/shape/btn2.png" alt="Blob" src="splash/assets/img/vet-tech/shape/btn2.png"></a>
						</div>
					</div>

					<div class="col-sm-6 col-lg-3">
						<div class="ei-footer-widget appeight-headline ul-li-block">
							<h3 class="ei-widget-title">Vet Resources</h3>
							<ul class="footer-links">
								<li><a href="/courses/categories">Courses</a></li>
								<li><a href="{{ route('frontend.resources.programs') }}">Educational Programs</a></li>
								<!-- <li><a href="/resources/online-resources">Online Resources</a></li> -->
								<li><a href="{{ route('frontend.resources.associations') }}">Associations</a></li>
								<li><a href="/resources/surgical-procedures">Surgical Procedures</a></li>
								<li><a href="/trade-shows">Trade Shows</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-6 col-lg-3">
						<div class="ei-footer-widget appeight-headline ul-li-block">
							<h3 class="ei-widget-title">Business</h3>
							<ul class="footer-links">
								<li><a href="/shop">Shop</a></li>
								<li><a href="{{route('frontend.vendors')}}">Vendors</a></li>
								<li><a href="/checkout">Checkout</a></li>
								@if (\App\Models\Customer::logged_in())
									<li><a href="/dashboard">My Account</a></li>
								@elseif(\App\Models\customer::admin_check())
									<li><a href="/admin/dashboard">Dashboard</a></li>
								@else
									<li><a href="/login">Login</a></li>
									<li><a href="/register">Register</a></li>
								@endif
								
								<li class="ei-payment-mathod">
									<img class="lazyload" data-src="splash/assets/img/vet-tech/footer/Stripe-3.svg" alt="Stripe" />
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="ei-footer-copyright">
				<div class="container">
					<div class="ei-footer-copyright-content">
						<div class="row">
							<div class="col-md-5">
								<div class="ei-copyright-text">
									<p>
										Copyright © 2022 <a href="#"><strong>VetandTech</strong></a
										>. All Rights Reserved
									</p>
								</div>
							</div>
							<div class="col-md-7">
								<div class="ei-copyright-menu">
									<a href="{{ route('frontend.terms-and-conditions') }}">Returns</a>
									<a href="{{ route('frontend.terms-and-conditions') }}">Terms & Conditions </a>
									<!-- <a href="{{ route('frontend.privacy-policy') }}">Privacy Policy </a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="ei-footer-shape1 position-absolute" data-parallax='{"x" : 60}'><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/fo-shape1.png" alt="Blob" /></div>
			<div class="ei-footer-shape2 position-absolute" data-parallax='{"y" : 60}'><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/fo-shape2.png" alt="Blob" /></div>
			<div class="ei-footer-shape3 position-absolute"><img class="lazyload" data-src="splash/assets/img/vet-tech/shape/eimap.png" alt="Blob" /></div>
		</section>
		<!-- End of Footer  section
        ============================================= -->
@endsection
