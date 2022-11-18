<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Vet Tech Marketplace: Buy and Sell Items | Animal Healthcare</title>

		<meta name="description" content="DVM Central is a platform designed to help veterinarians search and order veterinary supplies, equipment, pharmaceuticals, educational programs and more." />
		<meta name="keywords" content="Vet Tech Marketplace, Animal Healthcare, Animal Health Supplies, Animal Health Solutions, VetandTech, DVM Central" />
		<meta name="author" content="GermedUSAIT" />

		<meta name="msapplication-TileColor" content="#fff" />
		<meta name="msapplication-TileImage" content="splash/assets/favicon/logox32.png" />
		<meta name="msapplication-config" content="splash/assets/favicon/browserconfig.xml" />

		<meta property="og:title" content="Vet Tech Marketplace: Buy and Sell Items | Animal Healthcare" />
		<meta property="og:site_name" content="Vet Tech Marketplace: Buy and Sell Items | Animal Healthcare" />
		<meta property="og:url" content="https://www.dvmcentral.com/" />
		<meta property="og:description" content="DVM Central is a platform designed to help veterinarians search and order veterinary supplies, equipment, pharmaceuticals, educational programs and more." />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="splash/assets/favicon/social-bg.png" />
		<meta property="og:image:width" content="694" />
		<meta property="og:image:height" content="347" />

		<meta name="twitter:card" content="summary_large_image" />
		<meta name="twitter:site" content="https://twitter.com/GerVetUSA" />
		<meta name="twitter:creator" content="https://twitter.com/GerVetUSA" />
		<meta name="twitter:title" content="DVM Central | The Veterinarian's Choice - dvmcentral.com" />
		<meta name="twitter:description" content="DVM Central is a platform designed to help veterinarians search and order veterinary supplies, equipment, pharmaceuticals, educational programs and more." />
		<meta name="twitter:image" content="splash/assets/favicon/social-bg.png" />

		<link rel="shortcut icon" type="image/png" sizes="16x16" href="splash/assets/favicon/logox16.png" />
		<link rel="shortcut icon" type="image/png" sizes="32x32" href="splash/assets/favicon/logox32.png" />
		<link rel="apple-touch-icon" sizes="180x180" type="image/png" href="splash/assets/favicon/logox180.png" />
		<link rel="shortcut icon" type="image/x-icon" href="splash/assets/favicon/favicon.ico" />
		<link rel="mask-icon" href="splash/assets/favicon/white-logo.svg" color="#fff" />

		<link rel="stylesheet" href="splash/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="splash/assets/css/animate.css" />
		<link rel="stylesheet" href="splash/assets/css/newfont.css" />
		<link rel="stylesheet" href="splash/assets/css/split.css" />
		<link rel="stylesheet" href="splash/assets/css/owl.carousel.css" />
		<link rel="stylesheet" href="splash/assets/css/fontawesome-all.css" />
		<link rel="stylesheet" href="splash/assets/css/swiper.css?v=3" />
		<link rel="stylesheet" href="splash/assets/css/jquery.bxslider.min.css" />
		<link rel="stylesheet" href="splash/assets/css/jquery.mCustomScrollbar.min.css" />
		<link rel="stylesheet" href="splash/assets/css/style.css?v=4" />
		@stack('head-area')
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-229669771-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-229669771-1');
		</script>

		<!-- End Google Tag Manager -->
		<style>
			.user-dropdown-menu-link:hover .user-dropdown-menu {
				visibility: visible;
				opacity: 1;
				top: 1.5rem;
				z-index: 20;
			}
			ul.user-dropdown-menu li svg {
				color: #000 !important;
				width: 20px;
				height: 20px;
			}
			ul.user-dropdown-menu li a {
				color: #1a1a1a !important;
				z-index: 111;
			}
			ul.user-dropdown-menu li {
				display: flex;
				width: max-content;
    			align-items: center;
			}
			ul.user-dropdown-menu {
				visibility: hidden;
				list-style: none;
				width: 180px;
				position: absolute;
				right: 0;
				border-radius: 15px;
				top: 2.2rem !important;
			}
			ul.user-dropdown-menu,
			ul.user-dropdown-menu li form button {
				background: #e7f8ff;
			}
			ul.user-dropdown-menu li:hover {
					text-decoration: underline;
					transition: transform 2s ease, opacity .5s ease-out;
				}
			}
		</style>
	</head>

	<body class="app-eight-home desktop" data-spy="scroll" data-target=".navigation-eight" data-offset="100">
		
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3GQNLN"
			height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		
		<!-- preloader - start -->
		<div id="preloader" class="ei-preloader"></div>
		<div class="ei-up">
			<div id="scrollup" class="ei-scrollup text-center">
				<div class="top-icon-wrapper"><i class="fas fa-angle-up"></i></div>
			</div>
		</div>
         @yield('main')
		<!-- JS library -->
		<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"name": "DVM Central",
			"alternateName": "DVM Central | The Veterinarian's Choice - dvmcentral.com",
			"url": "https://www.dvmcentral.com/",
			"logo": "https://www.dvmcentral.com/splash/assets/img/vet-tech/logo.svg",
			"sameAs": [
			"https://www.facebook.com/vetandtech",
			"https://twitter.com/VetandTech",
			"https://www.instagram.com/vetandtechofficial",
			"https://www.linkedin.com/company/vetandtech",
			"https://www.dvmcentral.com/"
			]
		}
		</script>
		<script type="application/ld+json">
		{
			"@context": "https://schema.org/",
			"@type": "WebSite",
			"name": "DVM Central",
			"url": "https://www.dvmcentral.com/",
			"potentialAction": {
			"@type": "SearchAction",
			"target": "https://www.dvmcentral.com/search-results?s={search_term_string}https://www.dvmcentral.com/search-results?s=GV+Dental+Kits+and+packs+",
			"query-input": "required name=search_term_string"
			}
		}
		</script>
		<script src="splash/assets/js/lazy.js"></script>
		<script src="splash/assets/js/jquery.js"></script>
		<script src="splash/assets/js/bootstrap.min.js"></script>
		<script src="splash/assets/js/owl.js"></script>
		<script src="splash/assets/js/wow.min.js"></script>
		<script src="splash/assets/js/aos.js"></script>
		<script src="splash/assets/js/bxslider.js"></script>
		<script src="splash/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="splash/assets/js/parallax-scroll.js"></script>
		<script src="splash/assets/js/swiper.min.js"></script>
		<script src="splash/assets/js/split.js"></script>
		<script src="splash/assets/js/gsap.js"></script>
		<script src="splash/assets/js/st.js"></script>
		<script src="splash/assets/js/script.js?v=5"></script>
		<script src="static/js/custom.js?version=0.1"></script>
		<script src="https://player.vimeo.com/api/player.js"></script>
	</body>
</html>