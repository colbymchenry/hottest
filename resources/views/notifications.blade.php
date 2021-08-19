@extends('layouts.app-fox')

@section('content')
<div class="row">
	<div class="col-md-12 col-lg-10 offset-lg-1">
				
		<div class="list-group sort">
			<button class="btn filterNotificationsBtn active show" data-toggle="list" data-filter="all">All</button>
			<button class="btn filterNotificationsBtn" data-toggle="list" data-filter="favorites">Favorites</button>
			<button class="btn filterNotificationsBtn" data-toggle="list" data-filter="followers">Followers</button>
			<button class="btn filterNotificationsBtn" data-toggle="list" data-filter="subscribers">Subscribers</button>
		</div>						
		<div class="notifications">
			
			<div class="list-group" id="alerts" role="tablist">
				
			<a href="#" class="filterNotifications all followers notification" data-toggle="list">
					<div class="status">
						<i class="material-icons model">stars</i>
					</div>
					<img class="avatar-md" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}" data-toggle="tooltip" data-placement="top" title="Julianne" alt="avatar" data-original-title="Jullianne">
					<div class="data">
						<p>Modelname has started following you.</p>
						<span>2 hours ago</span>
					</div>
				</a>

				<a href="#" class="filterNotifications all subscribers notification" data-toggle="list">
					<div class="status">
						<i class="material-icons offline">adjust</i>
					</div>	
				<img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Michael">
					<div class="data">
						<p>Username has started a new subscription.</p>
						<span>3 days ago</span>
					</div>
				</a>

				@for ($i = 0; $i < 20; $i++)
				<a href="#" class="filterNotifications all favorites notification" data-toggle="list" id="{{ $i }}">
					<div class="status">
						<i class="material-icons online">adjust</i>
					</div>	
					<img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Mariette">
					<div class="data">
						<p>Username has favorited your photo.</p>
						<span>Feb 15, 2018</span>
					</div>
				</a>
				@endfor
											
			</div>
		</div>
	</div>
</div>
@endsection