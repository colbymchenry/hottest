<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<title>Flame VIP - @yield('title')</title>
    	<meta name="description" content="#">
    	<meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
    	<meta name="csrf-token" content="{{ csrf_token() }}">
    	<!-- Bootstrap core CSS -->
    	<link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    	<link href="https://fonts.googleapis.com/css?family=Material+Icons"
          rel="stylesheet">
    	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
					<!-- Foxxy core CSS -->
		<link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">
    	<!-- Image Cropping and Manipulation CSS -->
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.min.css"
          integrity="sha256-/n6IXDwJAYIh7aLVfRBdduQfdrab96XZR+YjG42V398=" crossorigin="anonymous"/>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css"
          integrity="sha256-/KLAk4A9xEOKGyr4umt11boYQJtP40gBLT+WrfWImuY=" crossorigin="anonymous"/>
		
	</head>
	<body>
		<main>
			<div class="layout zero">
			
				<div class="foxxy-app" id="sidebar">					
				
				@yield('content')

				</div>		

			</div>
		</main>

		@include('layouts/includes/popups')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
				integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"
				integrity="sha256-QT8oUxSZbywEwAPBgej6iNFH1ephgQV3q2pzjIso5pk=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.min.js"
				integrity="sha256-Wd32IfNltJOMackwSCRiOCJUgL0CrUAoKLNp5d8Y4OQ=" crossorigin="anonymous"></script>
		{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous') }}"></script>--}}
		{{--<script>window.jQuery || document.write('<script src="{{ asset('js/vendor/jquery.min.js') }}"><\/script>')</script>--}}
		<script src="{{ asset('js/vendor/eva.min.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
		<script src="{{ asset('js/functions.js') }}"></script>
		<script src="{{ asset('js/vendor/popper.min.js') }}"></script>
		<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/vendor/isotope.min.js') }}"></script>
		<script src="{{ asset('js/vendor/sticker.min.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
		<script src="https://js.pusher.com/3.1/pusher.min.js"></script>
		<script>var token = $('meta[name="csrf-token"]').attr('content');</script>
		@include('scripts.chat')
		@include('scripts.search_for_model')
		@include('alerts')
		@yield('js_after')
	</body>
</html>