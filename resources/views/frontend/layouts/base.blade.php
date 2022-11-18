<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="@yield('meta_author', appName())">
        <meta name="keywords" content="@yield('meta_keywords')">
        <meta name="description" content="@yield('meta_description')">
		<base href="/">
        @yield('meta')
		<title>@yield('title', appName() . ' - Virtual Events Platform')</title>
        @stack('before-styles')
		<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link rel="stylesheet" href="/static/css/events-styles.css" />
		<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
		@livewireStyles
		@stack('after-styles')
        @stack('head-area')
	</head>

	<body class="bg-white-100">
		
		{{ $slot }}
		
		@stack('before-scripts')
		@livewireScripts
		<script src="js/event-scripts.js"></script>
		<script src="js/bootstrap.js"></script>
		<script>
			// Avatar dropdown
			function dropdownHandler(element) {
				let single = element.getElementsByTagName('ul')[0]
				single.classList.toggle('hidden')
			}
			//Hamburger and mobile menu
			function MenuHandler(el, val) {
				let MainList = el.parentElement.parentElement.getElementsByTagName('ul')[0]
				let closeIcon = el.parentElement.parentElement.getElementsByClassName('close-m-menu')[0]
				let showIcon = el.parentElement.parentElement.getElementsByClassName('show-m-menu')[0]
				if (val) {
					MainList.classList.remove('hidden')
					el.classList.add('hidden')
					closeIcon.classList.remove('hidden')
				} else {
					showIcon.classList.remove('hidden')
					MainList.classList.add('hidden')
					el.classList.add('hidden')
				}
			}
		</script>
		@stack('after-scripts')
	</body>
</html>