
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @if (trim($__env->yieldContent('title')))
    <title>@yield('title') | Flame</title>
    @else
    <title>Hottest</title>
    @endif
    <meta name="description" content="#">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
		<!-- Core CSS -->
    <link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- Image Cropping and Manipulation CSS -->
    <link rel="stylesheet" href="{{ asset('croppie/croppie.css') }}" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/site/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/site/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/site/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/site/site.webmanifest.json') }}">
    <link rel="mask-icon" href="{{ asset('images/site/safari-pinned-tab.svg') }}" color="#000000">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta name="application-name" content="Hottest">
    <meta name="apple-mobile-web-app-title" content="Hottest">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{{ asset('dist/img/favicon.png') }}" type="image/png" rel="icon">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">   
    <!-- iPhone Xs Max (1242px x 2688px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" href="/apple-launch-1242x2688.png"> 
    <!-- iPhone Xr (828px x 1792px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" href="/apple-launch-828x1792.png"> 
    <!-- iPhone X, Xs (1125px x 2436px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" href="{{ asset('images/site/launchscreens/LaunchImage-1125@3x~iphoneX-portrait_1125x2436.png') }}"> 
    <!-- iPhone 8 Plus, 7 Plus, 6s Plus, 6 Plus (1242px x 2208px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 414px) and (device-height: 736px) and (-webkit-device-pixel-ratio: 3)" href="{{ asset('images/site/launchscreens/LaunchImage-1242@3x~iphone6s-portrait_1242x2208.png') }}"> 
    <!-- iPhone 8, 7, 6s, 6 (750px x 1334px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" href="{{ asset('images/site/launchscreens/LaunchImage-750@2x~iphone6-portrait_750x1334.png') }}">  
    <!-- iPad Pro 12.9" (2048px x 2732px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" href="{{ asset('images/site/launchscreens/LaunchImage-Portrait@2x~ipad_2048x2732.png') }}"> 
    <!-- iPad Pro 11” (1668px x 2388px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" href="{{ asset('images/site/launchscreens/LaunchImage-Portrait@2x~ipad_1668x2224.png') }}"> 
    <!-- iPad Pro 10.5" (1668px x 2224px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" href="{{ asset('images/site/launchscreens/LaunchImage-Portrait@2x~ipad_1668x2224.png') }}"> 
    <!-- iPad Mini, Air (1536px x 2048px) --> 
    <link rel="apple-touch-startup-image" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" href="{{ asset('images/site/launchscreens/LaunchImage-Portrait@2x~ipad_1536x2048.png') }}">
    @yield('admin_before')
<style>
.ad2hs-prompt{background-color:#3b86c4;border:none;display:none;color:#fff;padding:15px 32px;text-align:center;text-decoration:none;font-size:16px;position:fixed;bottom:0;margin-right:auto;margin-left:auto;margin:0 1rem 1rem;left:0;right:0;bottom:0;width:calc(100% - 32px)}.ios-prompt{background-color:#fcfcfc;border:1px solid #666;border-radius:6px;display:none;padding:.8rem 1rem 0 .5rem;text-decoration:none;font-size:16px;color:#555;z-index:10000;position:fixed;bottom:0;margin-right:auto;margin-left:auto;margin:0 auto .3rem;left:1rem;right:1rem;bottom:0}
  </style>
</head>
<body>
<main>
  
@if (((strpos(Request::path(), 'open') == 'open')) || ((strpos(Request::path(), 'chat') == 'chat')) || ((strpos(Request::path(), 'uploads') == 'uploads')))
<div class="layout zero">
        <span class="mobile-gone">@include('partials/header')</span>
        <div class="foxxy-app" id="sidebar">
			<span class="mobile-gone">@include('partials/top')</span>
            @yield('content') 
        </div>
        @yield('popup')

</div>
@elseif (((strpos(Request::path(), 'login') == 'login')) || ((strpos(Request::path(), 'register') == 'register')))
<div class="layout zero">
			
      <div class="foxxy-app" id="sidebar">					
      
      @yield('content')

      </div>		

    </div>
@elseif (((strpos(Request::path(), 'model/') == 'model/')) && ((strpos(Request::path(), 'model/username/media') != 'model/username/media')))
<div class="layout zero @if(sizeof($model->getVIPPhotos()) > 0) dark-bg @endif">
        @include('partials/header')
        <div class="foxxy-app animated zoomIn faster" id="sidebar">
			<span class="mobile-gone">@include('partials/top')</span>
            @yield('content') 
        </div>
        @yield('popup')

</div>  
@else
    <div class="layout">
        @include('partials/header')
        <div class="foxxy-app" id="sidebar">
            @include('partials/top')
            <div class="container around">

                @yield('content')

            </div>
        </div>
        @yield('popup')
    </div>
    @endif
</main>
@if ((strpos(Request::path(), 'feed') == 'feed'))
<button type="button" class="ad2hs-prompt">Install Web App</button>
    <div class="ios-prompt">
      <span style="color: rgb(187, 187, 187); float: right; margin-top: -14px; margin-right: -11px;">&times;</span>
      <img src="{{ asset('images/site/add2home.svg') }}" style="float: left; height: 80px; width: auto; margin-top: -8px; margin-right: 1rem;">
      <p style="margin-top: -3px;padding-bottom:10px; line-height: 1.3rem;">To install this Web App on your iPhone/iPad press <img src="{{ asset('images/site/share.svg') }}" style="display: inline-block; margin-top: 0px; margin-bottom: 0px; height: 20px; width: auto;"> and then Add to Home Screen.</p>
    </div>
@endif
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

@include('layouts/includes/popups')
<script src="{{ asset('croppie/croppie.js') }}"></script>
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
@include('scripts.chat')
@include('scripts.search_for_model')
 
  <script type="text/javascript">
      // TODO: IDK why but this causing all sorts of issues
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('service-worker.js')
          .then(() => console.log('service worker installed'))
          .catch(err => console.error('Error', err));
      }
      function addToHomeScreen() {
        let a2hsBtn = document.querySelector(".ad2hs-prompt");  // hide our user interface that shows our A2HS button
        a2hsBtn.style.display = 'none';  // Show the prompt
        deferredPrompt.prompt();  // Wait for the user to respond to the prompt
        deferredPrompt.userChoice
          .then(function(choiceResult){
        if (choiceResult.outcome === 'accepted') {
          console.log('User accepted the A2HS prompt');
        } else {
          console.log('User dismissed the A2HS prompt');
        }
        deferredPrompt = null;
      });}
      function showAddToHomeScreen() {
        let a2hsBtn = document.querySelector(".ad2hs-prompt");
        a2hsBtn.style.display = "block";
        a2hsBtn.addEventListener("click", addToHomeScreen);
      }
      let deferredPrompt;
      window.addEventListener('beforeinstallprompt', function (e) {
        // Prevent Chrome 67 and earlier from automatically showing the prompt
        e.preventDefault();
        // Stash the event so it can be triggered later.
        deferredPrompt = e;
        showAddToHomeScreen();
      });
    
      function showIosInstall() {
        let iosPrompt = document.querySelector(".ios-prompt");
        iosPrompt.style.display = "block";
        iosPrompt.addEventListener("click", () => {
          iosPrompt.style.display = "none";
        });
      }
    
      // Detects if device is on iOS
      const isIos = () => {
        const userAgent = window.navigator.userAgent.toLowerCase();
        return /iphone|ipad|ipod/.test( userAgent );
      }
      // Detects if device is in standalone mode
      const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);
      // Checks if should display install popup notification:
      if (isIos() && !isInStandaloneMode()) {
        // this.setState({ showInstallMessage: true });
        showIosInstall();
      }
    </script>

<script>
  var mySwiper = new Swiper ('.swiper-containerr', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,

    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },

    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
  })
	</script>
	  <script>
    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      loop:true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    });
  </script>

<script>
 
    // init Isotope
    var $grid = $('.feed-grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });
 
        // filter functions
    var filterFns = {
      // show if number is greater than 50
      numberGreaterThan50: function() {
        var number = $(this).find('.number').text();
        return parseInt( number, 10 ) > 50;
      },
      // show if name ends with -ium
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };
 

        // init Isotope
        var $grid = $('.profile-grid').isotope({
        itemSelector: '.grid-item',
        layoutMode: 'fitRows'
    });
 
        // filter functions
    var filterFns = {
      // show if number is greater than 50
      numberGreaterThan50: function() {
        var number = $(this).find('.number').text();
        return parseInt( number, 10 ) > 50;
      },
      // show if name ends with -ium
      ium: function() {
        var name = $(this).find('.name').text();
        return name.match( /ium$/ );
      }
    };
 
    // bind filter button click
    $filters = $('.grid-filter-toggle').on('click', 'input', function () {
        var $this = $(this);
        var filterValue;
        if ($this.is('.active')) {
            // uncheck
            filterValue = '*';
            $(".model-container").addClass("dark");
            $(".layout").addClass("dark-bg");           
        } else {
            filterValue = '.public';
            filterValue = $this.attr('data-filter');
            $filters.find('.active').removeClass('active');
            $(".model-container").removeClass("dark");
            $(".layout").removeClass("dark-bg");
        }
        $this.toggleClass('active');
 
        // use filterFn if matches value
        filterValue = filterFns[filterValue] || filterValue;
        $grid.isotope({filter: filterValue});
    });
 
    /*$('.filtr-btn').on('click', 'span', function () {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({
            filter: filterValue
        });
        $('.filtr-btn span').removeClass('active');
        $(this).addClass('active');
    });*/
    
 
</script>

<script>
    var forms = document.querySelectorAll("form:not(.no-block)");
    forms.forEach(function (form) {
        form.addEventListener('submit', formSubmitted);
    });


    function formSubmitted(e) {
        var submitButtons = e.target.querySelectorAll("button[type=submit],input[type=submit]");
        submitButtons.forEach(function (submitButton) {
            if (submitButton.tagName === "INPUT") {
                submitButton.innerHTML = "Please wait...";
                submitButton.value = "Please wait...";
                submitButton.text = "Please wait...";
            } else {
                // submitButton.innerHTML = '<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>';
            }
            submitButton.disabled = true;
        });

        // var overlay = document.createElement("div");
        // overlay.className = "submit-overlay";
        // document.body.appendChild(overlay);
    }
</script>



<script>var token = $('meta[name="csrf-token"]').attr('content');</script>

@include('alerts')
@auth
    @if(Auth::user()->is_model)
        @include('profile.media.upload-image-js')
    @endif
@endauth
@yield('js_after')
@yield('admin_after')
</body>
</html>