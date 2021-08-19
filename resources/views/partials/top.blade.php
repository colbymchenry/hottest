                    <div class="top top-sticky">
						<div class="container">
								<div class="inside">												
									<div class="data">
										<!--<span>Active now</span>-->
										<a href="{{ url('/home') }}"><img class="logo" src="{{ asset('images/company/fantasyvip3.png') }}"></a>
										 <!--<form id="logout-form" action="{{ route('logout') }}" method="POST">
											@csrf
											<button class="btn power" type="submit"><i class="material-icons">power_settings_new</i></button>
										</form>-->
									</div>
									@auth
									@if(View::hasSection('admin_side'))
									<a href="{{ url('/') }}" class="btn" name="1">Back</a>
									@elseif(Auth::user()->is_admin)
									<a href="{{ url('/admin/dashboard') }}" class="btn" name="1">Admin</a>
									@endif
									<a href="{{ url('/notifications') }}" class="btn connect" name="1"><i data-eva="bell-outline"></i>
										<div class="noti new">
											<span>+3</span>
										</div>
									</a>
									<a href="{{ url('/chat') }}" class="btn connect" name="1"><i data-eva="message-square-outline"></i></a>
									<div class="dropdown">
										<a class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-eva="more-vertical-outline"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="{{ url('/settings') }}" class="dropdown-item connect" name="1"><i data-eva="settings-outline"></i>Settings</a>
											<a href="{{ url('/settings') }}" class="dropdown-item connect" name="1"><i data-eva="star-outline"></i>Subscriptions</a>
											<hr>
											<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        	document.getElementById('logout-form').submit();" class="dropdown-item connect">
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@honeypot
												@csrf
											</form><i data-eva="power-outline"></i>Logout
											</a>
											@if (((strpos(Request::path(), 'open') == true)) || ((strpos(Request::path(), 'model') == 'model')))
											<hr>
											<a href="#" data-toggle="modal" data-target="#ReportModal" class="dropdown-item text-secondary" ><i data-eva="alert-circle-outline"></i>Report Profile</a>
											@endif
										</div>
									</div>
									@endauth
									@guest
									<a href="{{ url('/login') }}" class="btn connect login" name="1"><i data-eva="log-in"></i></a>
									@endguest
								</div>
							</div>

                    </div>
