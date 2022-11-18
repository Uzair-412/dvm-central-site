window.addEventListener('load', () => {
	let errorTl = gsap.timeline()

	errorTl

		.add(() => {
			document.querySelector('#error-page').style.visibility = 'visible'
		})
		.fromTo(
			'#error-page h1:first-of-type span',
			{
				x: 500,

				scaleX: 1.5,
				autoAlpha: 0
			},
			{
				delay: .3,
				x: 0,
				scaleX: 1,
				autoAlpha: 1,
				stagger: 0.075,
				ease: 'back.out(2)',
				duration: 0.75
			}
		)
		.fromTo(
			'#error-page h1:last-of-type span',
			{
				x: -500,

				scaleX: 1.5,
				autoAlpha: 0
			},
			{
				x: 0,
				scaleX: 1,
				autoAlpha: 1,
				stagger: 0.075,
				ease: 'back.out(2)',
				duration: 0.75
			},
			'<'
		)

		.fromTo(
			'.wave-loader',
			{
				scale: 0,
				x: '50vw',
				z: -400
			},
			{
				x: 0,
				z: 0,
				scale: 1,
				stagger: 0.15,
				ease: 'back.out(2)',
				duration: 2
			},
			'<90%'
		)

		.fromTo(
			'#error-page h2, #error-page p ',
			{
				y: 25,
				autoAlpha: 0
			},
			{
				y: 0,
				autoAlpha: 1,
				stagger: 0.1
			},
			'<90%'
		)
		.fromTo(
			'.error-btn-wrapper a',
			{
				y: 25,
				autoAlpha: 0
			},
			{
				y: 0,
				autoAlpha: 1,
				stagger: 0.1
			},
			'<70%'
		)
})
