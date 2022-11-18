/* -----------------------------------------------------------------------------

File:           JS Core
Version:        1.0
Author:         

-------------------------------------------------------------------------------- */
;(function () {
	'use strict'

	var SaaSio = {
		init: function () {
			this.Basic.init()
		},

		Basic: {
			init: function () {
				this.Saasiopreloader()
				this.BackgroundImage()
				this.SaaSioOnePageNav()
				this.counterUp()
				// this.EiStickyMenu()
				this.JobscreenSlider()
				this.EiscreenSlider()
				this.EiscrollTop()
				this.EiTeamSlide()
				this.faqBg()
				this.EiScroller()
				this.EiServiceSLider()
				this.EiTestimonialSlider()
				this.EiPartnerSlider()
				this.APPSeoHeader()
				this.AppSeoSideInner()
				this.AppSeoMobileMenu()
				this.APSeoVideoPopUp()
				this.AppSeoPartner()
				// this.AppSeoTestimonial()
				this.SaaSMscroller()
				this.SaaSMMobileMenu()
				this.SaaSMOnePageNav()
				this.SaaSCMobileMenu()
				this.SaaSCmemberSLider()
				this.SaaSCOnePageNav()
				this.StrFeatureSlide()
				this.StrPortfolioSlide()
				this.StrBannerSlide()
				// this.StrProgressBar()
				this.StrMobileMenu()
				this.StrOnePageNav()
				this.StrTestimonial()
				this.StrPartnerSlider()
				this.StrBlogSlide()
				this.StrTeamSlide()
				this.DiaHeader()
				this.DiaSkillProgress()
				this.DiaMobileMenu()
				this.DiaPortSlider()
				this.DiaTeamSlide()
				this.DiaTestimonial()
				this.DiaCounterUp()
				this.DiaScrollImg()
				this.PmBlog()
				this.PmStickymenu()
				this.PmMobileMenu()
				this.PmScrollTop()
				this.PmPartnerSlider()
				this.Animation()
			},
			Saasiopreloader: function () {
				jQuery(window).on('load', function () {
					jQuery('#preloader').fadeOut('slow', function () {
						jQuery(this).remove()
					})
				})
			},
			BackgroundImage: function () {
				$('[data-background]').each(function () {
					$(this).css('background-image', 'url(' + $(this).attr('data-background') + ')')
				})
			},
			SaaSioOnePageNav: function () {
				$('.saasio_one_click ul li a').on('click', function () {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
						var target = $(this.hash)
						target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) + ']')
						if (target.length) {
							$('html, body').animate(
								{
									scrollTop: target.offset().top - 0
								},
								1000
							)
							return false
						}
					}
				})
				$('.appseo-main-navigation ul li a').on('click', function () {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
						var target = $(this.hash)
						target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) + ']')
						if (target.length) {
							$('html, body').animate(
								{
									scrollTop: target.offset().top - 50
								},
								1000
							)
							return false
						}
					}
				})
				$('.s2-main-navigation ul li a').on('click', function () {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
						var target = $(this.hash)
						target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) + ']')
						if (target.length) {
							$('html, body').animate(
								{
									scrollTop: target.offset().top - 50
								},
								1000
							)
							return false
						}
					}
				})
				$('.str-main-navigation ul li a').on('click', function () {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
						var target = $(this.hash)
						target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) + ']')
						if (target.length) {
							$('html, body').animate(
								{
									scrollTop: target.offset().top - 50
								},
								1000
							)
							return false
						}
					}
				})
				$('.pm-main-navigation ul li a').on('click', function () {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
						var target = $(this.hash)
						target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) + ']')
						if (target.length) {
							$('html, body').animate(
								{
									scrollTop: target.offset().top - 50
								},
								1000
							)
							return false
						}
					}
				})
			},
			// EiStickyMenu: function () {
			// 	jQuery(window).on('scroll', function () {
			// 		if (jQuery(window).scrollTop() > 100) {
			// 			jQuery('.desktop .main-header-eight').addClass('eisticky-menu-bg-overlay ')
			// 		} else {
			// 			jQuery('.desktop .main-header-eight').removeClass('eisticky-menu-bg-overlay ')
			// 		}
			// 	})
			// 	$('.appi-ei-open_mobile_menu').on('click', function () {
			// 		$('.appi-ei-mobile_menu_wrap').toggleClass('mobile_menu_on')
			// 	})
			// 	$('.appi-ei-open_mobile_menu').on('click', function () {
			// 		$('body').toggleClass('mobile_menu_overlay_on')
			// 	})
			// 	if ($('.appi-ei-mobile_menu li.dropdown ul').length) {
			// 		$('.appi-ei-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>')
			// 		$('.appi-ei-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
			// 			$(this).prev('ul').slideToggle(500)
			// 		})
			// 	}
			// },
			counterUp: function () {
				if ($('.odometer').length) {
					$('.odometer').appear()
					$(document.body).on('appear', '.odometer', function (e) {
						var odo = $('.odometer')
						odo.each(function () {
							var countNumber = $(this).attr('data-count')
							$(this).html(countNumber)
						})
						window.odometerOptions = {
							format: 'd'
						}
					})
				}
			},

			EiscreenSlider: function () {
				if ($('.ei-appScreenshotCarousel-container').length) {
					if ($('.ei-appScreenshotCarousel-container').length) {
						var swiper = new Swiper('.ei-appScreenshotCarousel-container', {
							loop: true,
							grabCursor: true,
							freeMode: true,
							preloadImages: false,
							lazy: true,
							watchSlidesProgress: true,
							slidesPerView: 1,
							spaceBetween: 20,
							speed: 1000,
							autoplay: {
								delay: 3000,
								disableOnInteraction: false
							},
							preventClicksPropagation: false,
							// lazyLoadingInPrevNext: true,
							navigation: {
								nextEl: '.swiper-button-next',
								prevEl: '.swiper-button-prev'
							},
							// coverflow: {
							// 	rotate: 0,
							// 	stretch: 0,
							// 	depth: 250,
							// 	modifier: 0.5,
							// 	slideShadows: false
							// },
							breakpoints: {
								1199: {
									slidesPerView: 3,
									spaceBetween: 75
								},
								1024: {
									slidesPerView: 3,
									spaceBetween: 40
								},
								991: {
									slidesPerView: 3,
									spaceBetween: 40
								},
								767: {
									slidesPerView: 3,
									spaceBetween: 30
								},
								380: {
									slidesPerView: 2,
									spaceBetween: 50
								}
							}
						})
					}
				}
			},

			JobscreenSlider: function () {
				if ($('.job-carasousel-container').length) {
					if ($('.job-carasousel-container').length) {
						var swiper = new Swiper('.job-carasousel-container', {
							loop: true,
							grabCursor: true,
							freeMode: true,
							preloadImages: false,
							lazy: true,
							watchSlidesProgress: true,
							slidesPerView: 1,
							spaceBetween: 20,
							speed: 1000,
							autoplay: {
								delay: 3000,
								disableOnInteraction: false
							},
							preventClicksPropagation: false,
							navigation: {
								nextEl: '.eg-fun-fact-section .swiper-button-next',
								prevEl: '.eg-fun-fact-section .swiper-button-prev'
							},
							breakpoints: {
								1199: {
									slidesPerView: 3,
									spaceBetween: 50
								},
								1024: {
									slidesPerView: 3,
									spaceBetween: 40
								},
								991: {
									slidesPerView: 2,
									spaceBetween: 30
								},
								767: {
									slidesPerView: 2,
									spaceBetween: 30
								},
								580: {
									slidesPerView: 2,
									spaceBetween: 20
								}
							}
						})
					}
				}
			},
			EiscrollTop: function () {
				$(window).on('scroll', function () {
					if ($(this).scrollTop() > 200) {
						$('#scrollup').fadeIn()
					} else {
						$('#scrollup').fadeOut()
					}
				})

				$('#scrollup').on('click', function () {
					$('html, body').animate(
						{
							scrollTop: 0
						},
						800
					)
					return false
				})
			},
			EiTeamSlide: function () {
				$('#ei-team-slide').owlCarousel({
					margin: 0,
					responsiveClass: true,
					nav: true,
					dots: false,
					loop: true,
					center: true,
					autoplay: false,
					navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 2
						},
						700: {
							items: 2
						},
						1000: {
							items: 3
						}
					}
				})
			},
			faqBg: function () {
				$(document).on('click', '.ei-faq', function () {
					$(this).addClass('faq_bg').siblings().removeClass('faq_bg')
				})
			},
			EiScroller: function () {
				$(window).on('load', function () {
					$('#how-workscrollbar').mCustomScrollbar({
						autoHideScrollbar: true
					})
				})
			},
			EiServiceSLider: function () {
				if ($('.ei-service-slide').length) {
					var customPagerSlider = $('.ei-service-slide').bxSlider({
						adaptiveHeight: true,
						controls: true,
						pause: 5000,
						speed: 1000,
						nextText: '<span class="control-icon fa fa-angle-right"></span>',
						prevText: '<span class="control-icon fa fa-angle-left"></span>',
						pagerCustom: '#banner-pager'
					})
				}
			},
			EiTestimonialSlider: function () {
				if ($('#testimonial-scroller').length) {
					$('#testimonial-scroller').owlCarousel({
						margin: 105,
						responsiveClass: true,
						nav: false,
						dots: true,
						autoplay: false,
						smartSpeed: 1000,
						responsive: {
							0: {
								items: 1
							},
							400: {
								items: 1
							},
							600: {
								items: 1
							},
							700: {
								items: 1
							},
							1000: {
								items: 1
							},
							1300: {
								items: 2
							}
						}
					})
				}
			},
			EiPartnerSlider: function () {
				if ($('#ei-partner-slide').length) {
					$('#ei-partner-slide').owlCarousel({
						margin: 105,
						autoplay: true,
						loop: true,
						responsiveClass: true,
						nav: false,
						dots: false,
						slideTransition: 'linear',
						autoplayTimeout: 10,
						autoplayHoverPause: false,
						autoplaySpeed: 4500,
						responsive: {
							0: {
								items: 2
							},
							400: {
								items: 3
							},
							600: {
								items: 4
							},
							700: {
								items: 4
							},
							1000: {
								items: 4
							}
						}
					})
				}
			},
			APPSeoHeader: function () {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).scrollTop() > 100) {
						jQuery('.appseo-main-header').addClass('appseo-sticky-header-overlay')
					} else {
						jQuery('.appseo-main-header').removeClass('appseo-sticky-header-overlay')
					}
				})
			},
			AppSeoSideInner: function () {
				$('.open_side_area').on('click', function () {
					$('.wide_side_inner').toggleClass('wide_side_on')
				})
				$('.open_side_area').on('click', function () {
					$('body').toggleClass('body_overlay_on')
				})
			},
			AppSeoMobileMenu: function () {
				$('.appseo-open_mobile_menu').on('click', function () {
					$('.appseo-mobile_menu_wrap').toggleClass('mobile_menu_on')
				})
				$('.appseo-open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on')
				})
				if ($('.appseo-mobile_menu li.dropdown ul').length) {
					$('.appseo-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>')
					$('.appseo-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
						$(this).prev('ul').slideToggle(500)
					})
				}
			},
			APSeoVideoPopUp: function () {
				if ($('.lightbox-image').length) {
					$('.lightbox-image').fancybox({
						openEffect: 'fade',
						closeEffect: 'fade',
						helpers: {
							media: {}
						}
					})
				}
			},
			AppSeoPartner: function () {
				$('#partner-slide').owlCarousel({
					margin: 95,
					responsiveClass: true,
					nav: false,
					dots: false,
					loop: true,
					autoplay: false,
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 2
						},
						400: {
							items: 2
						},
						600: {
							items: 3
						},
						700: {
							items: 4
						},
						1000: {
							items: 5
						}
					}
				})
			},
			SaaSMscroller: function () {
				$(window).on('load', function () {
					$('#featured_scroll').mCustomScrollbar({
						axis: 'x',
						mouseWheel: { enable: false },
						advanced: { autoExpandHorizontalScroll: true }
					})
				})
				$('#featured_scroll').removeClass('mCustomScrollbar')
			},
			SaaSMMobileMenu: function () {
				$('.open_mobile_menu').on('click', function () {
					$('.mobile_menu_wrap').toggleClass('mobile_menu_on')
				})
				$('.open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on')
				})
				$(document).on('click', '.mobile_menu_wrap ul li.dropdown > a', function (event) {
					$(this).parent().find('.dropdown-menu').slideToggle('slow')
					return false
				})
			},
			SaaSMOnePageNav: function () {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).scrollTop() > 100) {
						jQuery('.main_header').addClass('menu-bg-overlay')
					} else {
						jQuery('.main_header').removeClass('menu-bg-overlay')
					}
				})
				$('.main-navigation ul li a').on('click', function () {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
						var target = $(this.hash)
						target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) + ']')
						if (target.length) {
							$('html, body').animate(
								{
									scrollTop: target.offset().top - 50
								},
								1000
							)
							return false
						}
					}
				})
			},
			SaaSCMobileMenu: function () {
				$('.s2-open_mobile_menu').on('click', function () {
					$('.s2-mobile_menu_wrap').toggleClass('mobile_menu_on')
				})
				$('.s2-open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on')
				})
				if ($('.s2-mobile_menu li.dropdown ul').length) {
					$('.s2-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>')
					$('.s2-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
						$(this).prev('ul').slideToggle(500)
					})
				}
			},
			SaaSCmemberSLider: function () {
				if ($('#s2_team_slide').length) {
					$('#s2_team_slide').owlCarousel({
						margin: 30,
						responsiveClass: true,
						nav: true,
						dots: false,
						loop: false,
						navText: ["<i class='fas fa-long-arrow-alt-left'></i>", "<i class='fas fa-long-arrow-alt-right'></i>"],
						autoplay: false,
						smartSpeed: 1000,
						responsive: {
							0: {
								items: 1
							},
							400: {
								items: 1
							},
							600: {
								items: 2
							},
							700: {
								items: 2
							},
							1000: {
								items: 4
							}
						}
					})
				}
			},
			SaaSCOnePageNav: function () {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).scrollTop() > 100) {
						jQuery('.saas_two_main_header').addClass('saas_2-menu-bg-overlay ')
					} else {
						jQuery('.saas_two_main_header').removeClass('saas_2-menu-bg-overlay ')
					}
				})
			},
			StrFeatureSlide: function () {
				$('#str-slide').owlCarousel({
					margin: 30,
					responsiveClass: true,
					nav: true,
					dots: false,
					loop: true,
					autoplay: false,
					navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 2
						},
						700: {
							items: 3
						},
						1000: {
							items: 4
						}
					}
				})
			},
			StrPortfolioSlide: function () {
				$('#str-protfolio-slide').owlCarousel({
					margin: 30,
					responsiveClass: true,
					nav: true,
					dots: false,
					loop: true,
					center: true,
					autoplay: false,
					navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 1
						},
						700: {
							items: 1
						},
						1000: {
							items: 2
						}
					}
				})
			},
			StrBannerSlide: function () {
				if ($('#str-banner-slide').length) {
					$('#str-banner-slide').owlCarousel({
						animateOut: 'fadeOut',
						animateIn: 'fadeIn',
						loop: true,
						margin: 0,
						nav: true,
						autoHeight: true,
						navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
						smartSpeed: 500,
						responsive: {
							0: {
								items: 1
							},
							600: {
								items: 1
							},
							800: {
								items: 1
							},
							1024: {
								items: 1
							},
							1200: {
								items: 1
							}
						}
					})
				}
			},
			// StrProgressBar: function () {
			// 	$('#progress1').barfiller({ duration: 3000 })
			// 	$('#progress2').barfiller({ duration: 3000 })
			// 	$('#progress3').barfiller({ duration: 3000 })
			// 	if ($('.fill').length) {
			// 		var $progress_bar = $('.fill')
			// 		$progress_bar.appear()
			// 		$(document.body).on('appear', '.fill', function () {
			// 			var current_item = $(this)
			// 			if (!current_item.hasClass('appeared')) {
			// 				var percent = current_item.data('percent')
			// 			}
			// 		})
			// 	}
			// },
			StrMobileMenu: function () {
				$('.str-open_mobile_menu').on('click', function () {
					$('.str-mobile_menu_wrap').toggleClass('mobile_menu_on')
				})
				$('.str-open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on')
				})
				if ($('.str-mobile_menu li.dropdown ul').length) {
					$('.str-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>')
					$('.str-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
						$(this).prev('ul').slideToggle(500)
					})
				}
			},
			StrOnePageNav: function () {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).scrollTop() > 100) {
						jQuery('.str-main-header').addClass('str-sticky-menu')
					} else {
						jQuery('.str-main-header').removeClass('str-sticky-menu')
					}
				})
			},
			StrTestimonial: function () {
				$('ol.carousel-indicators2 li').on('click', function () {
					$('ol.carousel-indicators2 li.active').removeClass('active')
					$('ol.carousel-indicators li.active').removeClass('active')
					$(this).addClass('active')
					var indicators = $(this).data('slide-to')
					$('.carousel-indicators')
						.find("[data-slide-to='" + indicators + "']")
						.addClass('active')
				})
				$('.carousel').on('slid.bs.carousel', function () {
					var indicatorsAct = $('.carousel-indicators li.active').data('slide-to')
					$('.carousel-indicators2 li').removeClass('active')
					$('.carousel-indicators2')
						.find("[data-slide-to='" + indicatorsAct + "']")
						.addClass('active')
				})
			},
			StrPartnerSlider: function () {
				$('#str-partner-slide').owlCarousel({
					margin: 105,
					autoplay: true,
					loop: true,
					nav: false,
					dots: false,
					autoplay: true,
					autoplaySpeed: 6000,
					responsiveClass: true,
					autoplayTimeout: 6000,
					autoplayHoverPause: true,
					slideTransition: 'linear',
					responsive: {
						0: {
							items: 2
						},
						400: {
							items: 2
						},
						600: {
							items: 4
						},
						700: {
							items: 3
						},
						1000: {
							items: 4
						}
					}
				})
			},
			StrBlogSlide: function () {
				$('#str-blog-slide').owlCarousel({
					margin: 30,
					responsiveClass: true,
					nav: false,
					dots: true,
					autoplay: false,
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 1
						},
						700: {
							items: 2
						},
						1000: {
							items: 3
						}
					}
				})
			},
			StrTeamSlide: function () {
				$('#str-team-slide').owlCarousel({
					margin: 30,
					responsiveClass: true,
					nav: true,
					dots: false,
					loop: true,
					autoplay: false,
					navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 2
						},
						700: {
							items: 3
						},
						1000: {
							items: 4
						}
					}
				})
			},
			DiaHeader: function () {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).scrollTop() > 100) {
						jQuery('.dia-main-header').addClass('dia-sticky-menu')
					} else {
						jQuery('.dia-main-header').removeClass('dia-sticky-menu')
					}
				})
				$('.dia-main-navigation ul li a').on('click', function () {
					if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
						var target = $(this.hash)
						target = target.length ? target : $('[name="DCSext.Level"' + this.hash.slice(1) + ']')
						if (target.length) {
							$('html, body').animate(
								{
									scrollTop: target.offset().top - 0
								},
								1000
							)
							return false
						}
					}
				})
			},
			DiaSkillProgress: function () {
				if ($('.progress-bar').length) {
					var $progress_bar = $('.progress-bar')
					$progress_bar.appear()
					$(document.body).on('appear', '.progress-bar', function () {
						var current_item = $(this)
						if (!current_item.hasClass('appeared')) {
							var percent = current_item.data('percent')
							current_item
								.css('width', percent + '%')
								.addClass('appeared')
								.parent()
								.append('<span>' + percent + '%' + '</span>')
						}
					})
				}
			},
			DiaMobileMenu: function () {
				$('.dia-open_mobile_menu').on('click', function () {
					$('.dia-mobile_menu_wrap').toggleClass('mobile_menu_on')
				})
				$('.dia-open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on')
				})
				if ($('.dia-mobile_menu li.dropdown ul').length) {
					$('.dia-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>')
					$('.dia-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
						$(this).prev('ul').slideToggle(500)
					})
				}
			},
			DiaPortSlider: function () {
				$('#dia-portfolio-slider').owlCarousel({
					margin: 20,
					responsiveClass: true,
					nav: true,
					dots: false,
					loop: true,
					autoplay: false,
					navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 2
						},
						700: {
							items: 2
						},
						1000: {
							items: 3
						},
						1300: {
							items: 4
						},
						1600: {
							items: 5
						}
					}
				})
			},
			DiaTeamSlide: function () {
				$('#dia-team-slide').owlCarousel({
					margin: 0,
					responsiveClass: true,
					nav: true,
					dots: false,
					loop: true,
					center: true,
					autoplay: false,
					navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
					smartSpeed: 1000,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 2
						},
						700: {
							items: 2
						},
						1000: {
							items: 3
						}
					}
				})
			},
			DiaTestimonial: function () {
				$('ol.carousel-indicators2 li').on('click', function () {
					$('ol.carousel-indicators2 li.active').removeClass('active')
					$('ol.carousel-indicators li.active').removeClass('active')
					$(this).addClass('active')
					var indicators = $(this).data('slide-to')
					$('.carousel-indicators')
						.find("[data-slide-to='" + indicators + "']")
						.addClass('active')
				})
				$('.carousel').on('slid.bs.carousel', function () {
					var indicatorsAct = $('.carousel-indicators li.active').data('slide-to')
					$('.carousel-indicators2 li').removeClass('active')
					$('.carousel-indicators2')
						.find("[data-slide-to='" + indicatorsAct + "']")
						.addClass('active')
				})
			},
			DiaCounterUp: function () {
				if ($('.odometer').length) {
					$('.odometer').appear()
					$(document.body).on('appear', '.odometer', function (e) {
						var odo = $('.odometer')
						odo.each(function () {
							var countNumber = $(this).attr('data-count')
							$(this).html(countNumber)
						})
						window.odometerOptions = {
							format: 'd'
						}
					})
				}
			},
			DiaScrollImg: function () {
				;(function ($) {
					$.fn.visible = function (partial) {
						var $t = $(this),
							$w = $(window),
							viewTop = $w.scrollTop(),
							viewBottom = viewTop + $w.height(),
							_top = $t.offset().top,
							_bottom = _top + $t.height(),
							compareTop = partial === true ? _bottom : _top,
							compareBottom = partial === true ? _top : _bottom
						return compareBottom <= viewBottom && compareTop >= viewTop
					}
				})(jQuery)
				$(window).on('scroll', function () {
					$('.banner-img1, .banner-img2').each(function (i, el) {
						var el = $(el)
						if (el.visible(true)) {
							el.addClass('view-on')
						} else {
							el.removeClass('view-on')
						}
					})
				})
				$(document).on('ready', function () {
					$('.banner-img1, .banner-img2').each(function (i, el) {
						var el = $(el)
						if (el.visible(true)) {
							el.addClass('view-on')
						} else {
							el.removeClass('view-on')
						}
					})
				})
			},
			PmBlog: function () {
				$(document).on('click', '.pm-blog-img-text', function () {
					$(this).addClass('active').siblings().removeClass('active')
				})
			},
			PmStickymenu: function () {
				jQuery(window).on('scroll', function () {
					if (jQuery(window).scrollTop() > 100) {
						jQuery('.pm-main-header').addClass('pm-sticky-menu')
					} else {
						jQuery('.pm-main-header').removeClass('pm-sticky-menu')
					}
				})
			},
			PmMobileMenu: function () {
				$('.pm-open_mobile_menu').on('click', function () {
					$('.pm-mobile_menu_wrap').toggleClass('mobile_menu_on')
				})
				$('.pm-open_mobile_menu').on('click', function () {
					$('body').toggleClass('mobile_menu_overlay_on')
				})
				if ($('.pm-mobile_menu li.dropdown ul').length) {
					$('.pm-mobile_menu li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>')
					$('.pm-mobile_menu li.dropdown .dropdown-btn').on('click', function () {
						$(this).prev('ul').slideToggle(500)
					})
				}
			},
			PmScrollTop: function () {
				$(window).on('scroll', function () {
					if ($(this).scrollTop() > 200) {
						$('.pm-scrollup').fadeIn()
					} else {
						$('.pm-scrollup').fadeOut()
					}
				})

				$('.pm-scrollup').on('click', function () {
					$('html, body').animate(
						{
							scrollTop: 0
						},
						800
					)
					return false
				})
			},
			PmPartnerSlider: function () {
				$('#pm-partner-slide').owlCarousel({
					margin: 90,
					autoplay: true,
					loop: true,
					responsiveClass: true,
					nav: false,
					dots: false,
					slideTransition: 'linear',
					autoplayTimeout: 10,
					autoplayHoverPause: false,
					autoplaySpeed: 4500,
					responsive: {
						0: {
							items: 1
						},
						400: {
							items: 1
						},
						600: {
							items: 2
						},
						700: {
							items: 3
						},
						1000: {
							items: 4
						}
					}
				})
			},
			Animation: function () {
				AOS.init({
					once: true,
					duration: 1000
				})
				if ($('.wow').length) {
					var wow = new WOW({
						boxClass: 'wow',
						animateClass: 'animated',
						offset: 0,
						mobile: true,
						live: true
					})
					wow.init()
				}
			}

			/* End Of js
================================================*/
		}
	}
	jQuery(document).ready(function () {
		SaaSio.init()
	})
})()

Splitting()

gsap.registerPlugin(ScrollTrigger)

gsap.set('.hero-banner-change, .changing-text-wrapper .char', {
	autoAlpha: 0
})

let btnShowDuration = 0.0000001,
	heroBtn = document.querySelector('.desktop #shop-btn'),
	heroBtnText = document.querySelector('.desktop #shop-btn span')

let heroTl = gsap.timeline({ paused: true, repeat: -1, delay: 1, defaults: { duration: 1 } })

heroTl

	.add(() => (heroBtn.href = '/shop'))
	.add(() => (heroBtnText.innerHTML = 'MarketPlace'), '<')
	.fromTo(
		'.first-w .char',
		{
			autoAlpha: 0
		},
		{
			autoAlpha: 1,
			stagger: 0.05
		}
	)

	.fromTo(
		'.ei-banner-mbl-mockup .first-img',
		{
			autoAlpha: 0,
			xPercent: 50
		},
		{
			autoAlpha: 1,
			xPercent: 0
		},
		'<'
	)
	.to('.first-w .char', {
		autoAlpha: 0,
		stagger: {
			each: 0.05,
			from: 'end'
		}
	})
	.to(
		'.ei-banner-mbl-mockup .first-img',
		{
			delay: 0.5,
			autoAlpha: 0,
			xPercent: 50
		},
		'<'
	)

	.add(() => (heroBtn.href = '/resources/educational-programs'))
	.add(() => (heroBtnText.innerHTML = 'Resources'), '<')

	.fromTo(
		'.sec-w .char',
		{
			autoAlpha: 0
		},
		{
			autoAlpha: 1,
			stagger: 0.05
		}
	)
	.fromTo(
		'.ei-banner-mbl-mockup .sec-img',
		{
			autoAlpha: 0,
			xPercent: 50
		},
		{
			autoAlpha: 1,
			xPercent: 0
		},
		'<'
	)
	.to('.sec-w .char', {
		autoAlpha: 0,
		stagger: {
			each: 0.05,
			from: 'end'
		}
	})
	.to(
		'.ei-banner-mbl-mockup .sec-img',
		{
			delay: 0.5,
			autoAlpha: 0,
			xPercent: 100,
			duration: 1
		},
		'<'
	)

	.add(() => (heroBtn.href = '/speakers'))
	.add(() => (heroBtnText.innerHTML = 'Webinars'), '<')
	.fromTo(
		'.third-w .char',
		{
			autoAlpha: 0
		},
		{
			autoAlpha: 1,
			stagger: 0.05
		},
		'<'
	)
	.fromTo(
		'.ei-banner-mbl-mockup .third-img',
		{
			autoAlpha: 0,
			xPercent: 50
		},
		{
			autoAlpha: 1,
			xPercent: 0
		},
		'<'
	)
	.to('.third-w .char', {
		autoAlpha: 0,
		stagger: {
			each: 0.05,
			from: 'end'
		}
	})
	.to(
		'.ei-banner-mbl-mockup .third-img',
		{
			delay: 0.5,
			autoAlpha: 0,
			xPercent: 100
		},
		'<'
	)

	.add(() => (heroBtn.href = '/courses/categories'))
	.add(() => (heroBtnText.innerHTML = 'CE Courses'), '<')
	.fromTo(
		'.fourth-w .char',
		{
			autoAlpha: 0
		},
		{
			autoAlpha: 1,
			stagger: 0.05
		}
	)
	.fromTo(
		'.ei-banner-mbl-mockup .fourth-img',
		{
			autoAlpha: 0,
			xPercent: 50
		},
		{
			autoAlpha: 1,
			xPercent: 0
		},
		'<'
	)
	.to('.fourth-w .char', {
		autoAlpha: 0,
		stagger: {
			each: 0.05,
			from: 'end'
		}
	})
	.to(
		'.ei-banner-mbl-mockup .fourth-img',
		{
			delay: 0.5,
			autoAlpha: 0,
			xPercent: 100
		},
		'<'
	)

	.add(() => (heroBtn.href = '/resources/educational-programs'))
	.add(() => (heroBtnText.innerHTML = 'Education'), '<')
	.fromTo(
		'.fifth-w .char',
		{
			autoAlpha: 0
		},
		{
			autoAlpha: 1,
			stagger: 0.05
		}
	)
	.fromTo(
		'.ei-banner-mbl-mockup .fifth-img',
		{
			autoAlpha: 0,
			xPercent: 50
		},
		{
			autoAlpha: 1,
			xPercent: 0
		},
		'<'
	)
	.to('.fifth-w .char', {
		autoAlpha: 0,
		stagger: {
			each: 0.05,
			from: 'end'
		}
	})
	.to(
		'.ei-banner-mbl-mockup .fifth-img',
		{
			delay: 0.5,
			autoAlpha: 0,
			xPercent: 100
		},
		'<'
	)

	.add(() => (heroBtn.href = '/resources/online-resources'))
	.add(() => (heroBtnText.innerHTML = 'Guides'), '<')
	.fromTo(
		'.six-w .char',
		{
			autoAlpha: 0
		},
		{
			autoAlpha: 1,
			stagger: 0.05
		}
	)
	.fromTo(
		'.ei-banner-mbl-mockup .six-img',
		{
			autoAlpha: 0,
			xPercent: 50
		},
		{
			autoAlpha: 1,
			xPercent: 0
		},
		'<'
	)
	.to('.six-w .char', {
		autoAlpha: 0,
		stagger: {
			each: 0.05,
			from: 'end'
		}
	})
	.to(
		'.ei-banner-mbl-mockup .six-img',
		{
			autoAlpha: 0,
			xPercent: 100,
			duration: 1
		},
		'<'
	)

	$('.video-close-btn').on('click', function () {
		var iframe =document.getElementById('main-page-video-iframe');  
		var player = new Vimeo.Player(iframe);
		player.pause();
		player.setCurrentTime(0);    
	});

let videoCloseBtn = document.querySelectorAll('.video-close-btn, .video-close-btn path')

gsap.set('.video-player-container', {
	yPercent: 100,
	autoAlpha: 0
})
gsap.set('.video-player-inner-wrapper', {
	autoAlpha: 0
})

let videoTl = gsap.timeline({
	paused: true,
	defaults: {
		duration: 1
	}
})

videoTl
	.add(() => {
		document.body.classList.toggle('body-height')
	})
	.set('.video-player-container', { autoAlpha: 1 }, '<')
	.to(
		'.video-player-container',
		{
			yPercent: 0,
			ease: 'expo.inOut'
		},
		'<'
	)
	.set('.video-player-inner-wrapper', { autoAlpha: 1 })

	.fromTo(
		'.video-player-wrapper',
		{
			xPercent: -100
		},
		{
			xPercent: 0
		},
		'<'
	)
	.fromTo(
		'.video-player-wrapper .video-iframe',
		{
			xPercent: 100
		},
		{
			xPercent: 0
		},
		'<'
	)
	.from('.video-close-btn', {
		autoAlpha: 0,
		y: -100,
		duration: 0.7,
		// ease: 'elastic.out(1, .3)'
		ease: 'bounce.out(2)'
	})

document.querySelector('.video-btn').addEventListener('click', () => {
	videoTl.timeScale(1).play()
})

videoCloseBtn.forEach((btn) => {
	btn.addEventListener('click', () => {
		videoTl.timeScale(2).reverse()
	})
})

let videoIframe = document.querySelector('.video-iframe'),
	initialVideoSrc = videoIframe.getAttribute('data-src')

window.addEventListener('load', () => {
	let jobTitle = document.querySelectorAll('.job-carasousel-container .job-title')

	jobTitle.forEach((title) => {
		if (title.innerHTML.length > 50) {
			title.innerHTML = `${title.innerHTML.slice(0, 50)} ...`
		}
	})
	setTimeout(() => {
		videoIframe.src = initialVideoSrc
	}, 2000)
	ScrollTrigger.create({
		animation: heroTl,
		trigger: '#eight-banner',
		start: 'top bottom',
		end: 'bottom top',
		onEnter: () => heroTl.play(),
		onEnterBack: () => heroTl.resume(),
		onLeave: () => heroTl.pause(),
		onLeaveBack: () => heroTl.pause()
	})
})

let gifTl = gsap.timeline({ paused: true })

gifTl.fromTo(
	'.hw-mockup-img img',
	{
		autoAlpha: 0
	},
	{
		autoAlpha: 1,
		duration: 0.001,
		ease: 'none',
		repeat: -1,
		stagger: 0.75,
		repeatDelay: 0.75
	}
)

ScrollTrigger.create({
	animation: gifTl,
	trigger: '.how-work-mockup',
	start: 'top bottom',
	end: 'bottom top',
	onEnter: () => gifTl.play(),
	onEnterBack: () => gifTl.resume(),
	onLeave: () => gifTl.pause(),
	onLeaveBack: () => gifTl.pause()
})

let header = document.querySelector('.header-scrolled'),
	headerLinks = document.querySelectorAll('.desktop .main-header-eight .appheader-content .navigation-eight li a'),
	mobileMenuBtn = document.querySelector('.desktop .appi-ei-mobile_menu_button')

mobileMenuBtn.addEventListener('click', () => {
	document.body.classList.toggle('.mobile_menu_overlay_on')
	document.querySelector('.desktop .appi-ei-mobile_menu_wrap').classList.toggle('mobile_menu_on')
})

let menuCloseBtn = document.querySelectorAll('.appi-ei-mobile_menu_close i, .mobile_menu_overlay')

window.addEventListener('click', (e) => {
	menuCloseBtn.forEach((btn) => {
		if (e.target == btn) {
			document.body.classList.toggle('mobile_menu_overlay_on')
			document.querySelector('.appi-ei-mobile_menu_wrap').classList.toggle('mobile_menu_on')
		}
	})
})

// faq accordion
let accordionOpener = document.querySelectorAll('.accordion-wrapper'),
	textHider = document.querySelectorAll('.text-hider'),
	openIcons = document.querySelectorAll('.open-icon');
accordionOpener.forEach((e, r) => {
	e.querySelector('h3').addEventListener('click', () => {
		const e = textHider[r],
			t = openIcons[r];
		textHider.forEach((r) => {
			r != e &&
				r.classList.contains('acc-opened') &&
				(openIcons.forEach((e) => {
					e != t && e.classList.contains('icon-rotated') && (e.classList.remove('icon-rotated'), (e.style.transform = 'rotate(0deg)'));
				}),
				r.classList.remove('acc-opened'),
				(r.style.maxHeight = null));
		}),
			e.classList.contains('acc-opened')
				? (e.classList.remove('acc-opened'), t.classList.contains('icon-rotated') && (t.style.transform = 'rotate(0deg)'), (e.style.maxHeight = null))
				: (e.classList.add('acc-opened'), t.classList.add('icon-rotated'), (t.style.transform = 'rotate(180deg)'), (e.style.maxHeight = e.scrollHeight + 'px'));
	});
})
