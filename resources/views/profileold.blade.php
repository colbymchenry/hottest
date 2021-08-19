@extends('layouts.app-fox')

@section('content')
<div class="model">
   <div class="row">
	   <div class="col-xl-10 offset-xl-1 col-lg-12">


	   <div class="tab-content">
			<div id="grid" class="tab-pane fade show active">		   


			@if(Auth::user()->is_model)
		    <li class="profile-buttons">
		   		
				   <a id="editsettingsref" href="#editsettings" data-toggle="tab"><button type="submit" class="btn edit-button">VIP Settings</button></a>
				   <a href="#analytics" data-toggle="tab"><button type="submit" class="btn analytics-button">View Analytics</button></a>
			</li>
			@endif

		   <div class="profile bg">
			   <div class="dark-overlay">
					@if(Auth::user()->name != $model->getUser()->name)
					   <button class="btn folw"><i class="material-icons">star</i></button>
					   <button class="btn msg" data-toggle="modal" data-target="#startnewchat"><i class="material-icons">chat_bubble</i></button>
				   	@endif
					   <img class="avatar-xxl" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}" alt="Miss Julianne">
					   <!--<h1>{{ $model->getUser()->name }}</h1>-->
					   <h1>Miss Julianne</h1>
					   <!--<span>Super Model</span>-->
					   <div class="award-tray">
						   
						   <i class="material-icons awards top-poster" data-toggle="tooltip" data-placement="top" title="Top Poster">trending_up</i>
						   <i class="material-icons awards most-hearts" data-toggle="tooltip" data-placement="top" title="Most Hearts">favorite</i>
						   <i class="material-icons awards most-subscribers" data-toggle="tooltip" data-placement="top" title="Top 10 Followers">star</i>
						   <i class="material-icons awards most-active" data-toggle="tooltip" data-placement="top" title="Top VIP Poster">lock</i>
						   <i class="material-icons awards super-model" data-toggle="tooltip" data-placement="top" title="Super Model Status">stars</i>
						   
					   </div>

				   <!--<div class="col-3">
					   <ul>
						   <li><span class="badge badge-primary">21 years old</span></li>
						   <li><span class="badge badge-primary">brazillian</span></li>
						   <li><span class="badge badge-primary">5' 10</span></li>
						   <li><span class="badge badge-primary">brown hair</span></li>
					   </ul>
				   </div>-->
				   <div class="stats">
		   
						   <!--<div class="item">
							   <h2>22</h2>
							   <h3>Photos</h3>
						   </div>-->
						   <div class="item">
						   <button class="btn vip-view" data-toggle="modal" data-target="#vipagree" data-filter=".private"><i class="material-icons">lock</i></button>
							   <h2>Snapchat</h2>
						   </div>	
						   <div class="item grid-filter-toggle" data-toggle="tooltip" data-placement="bottom" title="Unlock Content">
							   <button class="btn vip-view" data-toggle="modal" data-target="#vipagree" data-filter=".private"><i class="material-icons">lock</i></button>
							   <h2>VIP Content</h2>
						   </div>																			
						   <div class="item">
						   <button class="btn vip-view" data-toggle="modal" data-target="#vipagree" data-filter=".private"><i class="material-icons">lock</i></button>
							   <h2>Message</h2>
						   </div>																																				
					   
				   	</div>
				</div>
			   
			</div>

				<div class="row">
					<div class="col-md-12 filtr_tray">
						<div class="filtr-btn tags">
							<p>Top Tags: </p>
							<span class="badge badge-primary" data-filter=".public">Sexy</span>
							<span class="badge badge-primary" data-filter=".unlisted">Romanian</span>
							<span class="badge badge-primary" data-filter=".private">Outside</span>
							<span class="badge badge-dark" data-filter=".unlisted">VIP</span>
						</div>


						<div class="filtr-btn images">
						<div class="dropdown">
									<a class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">sort</i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<span data-filter=".public"" class="dropdown-item connect" name="1"><i class="material-icons">settings</i>Public</span>
											<span data-filter=".private" class="dropdown-item connect" name="1"><i class="material-icons">star</i>VIP Private</span>
											<span data-filter=".unlisted" class="dropdown-item connect" name="1"><i class="material-icons">star</i>Unlisted</span>
										</div>
									</div>

						</div>						
					</div>					
				</div>
				@include('profile/grid')
					
				</div>

				@if(Auth::user()->is_model)
				<div id="editsettings" class="tab-pane fade">
					@include('profile/edit')
				</div>
				@endif

			</div>
	   </div>
   </div>

</div>

@include('profile.media.upload-image-form')
@endsection

@section('js_after')
	@include('scripts.connect_with_paypal')
	@include('profile.media.upload-image-js')

	@if(Session::has('view_settings'))
		{{ Session::remove('view_settings') }}
		<script>
			$(document).ready(function() {
				$('#editsettingsref').trigger('click');
			});
		</script>
	@endif



	@yield('js')
@endsection