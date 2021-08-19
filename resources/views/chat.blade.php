@extends('layouts.app-fox')

@section('content')

		<div class="row">

			<div class="col-md-12 col-lg-10 offset-lg-1">

					<div class="top top-chat">
						
						<div class="inside">
							
							<a href="{{ url('/feed') }}" class="round-icon desktop-gone"><i data-eva="arrow-ios-back"></i></a>

							<div class="them text-sm-center">
								<a href="#" class="mobile-gone"><img class="avatar-md" src="{{ Auth::user()->getAvatar() }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username"></a>

								<h5><a href="#">{{ Auth::user()->name }}</a>
									@if(sizeof(Message::getAllUnreadMessages(Auth::user()->id)) > 0)
									<div class="badge badge-danger">{{ sizeof(Message::getAllUnreadMessages(Auth::user()->id)) }}</div>
									@endif
								</h5>
								
							</div>	
						
							<a href="#" data-toggle="modal" data-target="#startnewchat" class="round-icon create-btn"><i data-eva="plus-circle-outline"></i></a>
								
						</div>
						
					</div>

			
		
			<!--<div class="list-group sort">
					<button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">All</button>
					<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Read</button>
					<button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Unread</button>
				</div>	-->
				
				<div class="container">
				@include('chat/list')
				</div>
			</div>

		</div>

@endsection