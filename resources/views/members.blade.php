@extends('layouts.app-fox')

@section('content')
<div class="search">
										<form class="form-inline position-relative">
											<input type="search" class="form-control" id="people" placeholder="Search for people...">
											<button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
										</form>
										<button class="btn create" data-toggle="modal" data-target="#exampleModalCenter"><i class="material-icons">person_add</i></button>
									</div>
									<div class="list-group sort">
										<button class="btn filterMembersBtn active show" data-toggle="list" data-filter="all">All</button>
										<button class="btn filterMembersBtn" data-toggle="list" data-filter="online">Agents</button>
										<button class="btn filterMembersBtn" data-toggle="list" data-filter="offline">Paid</button>
									</div>						
									<div class="contacts">
										<h1>Contacts</h1>
										<div class="list-group" id="contacts" role="tablist">
											<a href="#" class="filterMembers all online contact" data-toggle="list">
												<img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Janette">
												<div class="status">
													<i class="material-icons online">fiber_manual_record</i>
												</div>
												<div class="data">
													<h5>Foxxy</h5>
													<p>Foxxy VIP Team</p>
												</div>
												<div class="person-add">
													<i class="material-icons">person</i>
												</div>
											</a>
											<a href="#" class="filterMembers all online contact" data-toggle="list">
												<img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Michael">
												<div class="status">
													<i class="material-icons online">fiber_manual_record</i>
												</div>
												<div class="data">
													<h5>Robert</h5>
													<p>Foxxy VIP Agent</p>
												</div>
												<div class="person-add">
													<i class="material-icons">person</i>
												</div>
											</a>
											<a href="#" class="filterMembers all online contact" data-toggle="list">
												<img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Lean">
												<div class="status">
													<i class="material-icons online">fiber_manual_record</i>
												</div>
												<div class="data">
													<h5>Username</h5>
													<p>Paid Member</p>
												</div>
												<div class="person-add">
													<i class="material-icons">person</i>
												</div>
											</a>
										</div>
									</div>
@endsection
