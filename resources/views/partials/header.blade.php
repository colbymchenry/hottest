<!-- Start of Navigation -->    
@if(View::hasSection('admin_side'))<div class="navigation white">@else<div class="navigation">@endif
	<div class="container">
		<div class="inside">
			<div class="nav nav-tab menu">
			
				@auth	
					@if(Auth::user()->is_model)
					<a href="{{ url('/model/' . Auth::user()->name) }}" class="btn"><img class="avatar-xl active" src="{{ Auth::user()->getAvatar() }}" alt="{{ Auth::user()->name }}"></a>
					@else
					<a href="{{ url('/settings') }}" class="btn"><img class="avatar-xl active" src="{{ Auth::user()->getAvatar() }}" alt="{{ Auth::user()->name }}"></a>
					@endif
				@endauth
				@guest
					<a href="{{ url('/login') }}" class="btn"><img class="avatar-xl active" src="{{ asset('images/defaults/user_logo3.png') }}" alt="Login"></a>
				@endguest

				@if(View::hasSection('admin_side'))
					@yield('admin_side')
				@else
					<!-- they automatically follow us and we push photos to this feed, they can unfollow -->	
					<a href="{{ url('/feed') }}" @if (Request::path() == 'feed')class="active"@endif><i data-eva="star-outline" data-eva-animation="pulse"></i><span>your feed</span></a>	
					<a href="{{ url('/models') }}" @if (Request::path() == 'models')class="active"@endif><i data-eva="search-outline" data-eva-animation="pulse"></i><span>discover</span></a>		
					<a href="{{ url('/favorites') }}" @if (Request::path() == 'favorites')class="active"@endif><i data-eva="heart-outline" data-eva-animation="pulse"></i><span>favorites</span></a>	

					<div class="f-grow1"></div>	
					
					<!--<a id="upload-img-btn" href="#" data-toggle="modal" data-target="#uploadImageModal"><i data-eva="plus-square-outline" data-eva-animation="pulse"></i><span>upload</span></a>-->
					@auth
					@if(Auth::user()->is_model)
					<a href="#" data-toggle="modal" data-target="#uploadImageModal"><i data-eva="plus-square-outline" data-eva-animation="pulse"></i><span>upload</span></a>	
					@endif
					@endauth
				@endif				
			</div>
		</div>
	</div>
</div>
<!-- End of Navigation -->