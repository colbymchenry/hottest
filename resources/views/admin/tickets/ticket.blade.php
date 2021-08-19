@extends('layouts.app-fox')

@section('title', 'Ticket ID')

@section('admin_before')
<link href="{{ asset('css/admin.css') }}" type="text/css" rel="stylesheet" />
@stop

@section('admin_side')
    @include('admin/includes/side')
@stop


@section('content')

<!--page title-->
<div class="page-title mb-4 d-flex align-items-center">
    <div class="mr-auto">
        <h4 class="weight500 d-inline-block pr-3 mr-3 border-right">Tickets</h4>
        <nav aria-label="breadcrumb" class="d-inline-block">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="/admin/dashboard">Admin</a></li>
                <li class="breadcrumb-item"><a href="/admin/tickets">Tickets</a></li>
                <li class="breadcrumb-item active" aria-current="page">Open</li>
            </ol>
        </nav>
    </div>
</div>

<!--/page title-->
<div class="row">
<div class="col-md-8">
        <div class="card card-shadow mb-4">
        <div class="card-header border-0">
                <div class="custom-title-wrap bar-warning">
                    <div class="custom-title">Ticket ID #1 <div class="badge badge-danger">Priority</div> (4 hours)</div>
                    <div class=" widget-action-link">
                        <div class="dropdown">
                            <a href="#" class="btn btn-transparent text-secondary dropdown-hover p-0" data-toggle="dropdown">
                                Action <i class="fa fa-caret-down pl-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right vl-dropdown">
                                <a class="dropdown-item" href="#"> Priority</a>
                                <a class="dropdown-item" href="#"> Close</a>
                                <a class="dropdown-item" href="#"> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!--<div class="rates">

            <div class="profile">

                <div class="stats">
                    <div class="item">
                        <h2>2 <i class="material-icons md-18">star</i></h2>
                        <h3>Message</h3>
                    </div>
                    <div class="item">
                        <a href="#"><i class="material-icons md-36">star</i> <p>Add Credit</p></a>
                    </div>
                    <div class="item">
                        <h2>10 <i class="material-icons md-18">star</i></h2>
                        <h3>Balance</h3>
                    </div>
                </div>

            </div>
            
        </div>-->

        

    
    <div class="chat">

        <div class="content" id="content">
            <div class="container">
                
                
                <div class="col-md-12" id="chat-container">
                    <div class="date">
                        <hr>
                        <span>Yesterday</span>
                        <hr>
                    </div>

                            <div class="message">
                                <img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username">
                                <div class="text-main">
                                    <div class="text-group">
                                        <div class="text">
                                            <p>I am facing some trouble with my payment. When i click the</p>
                                        </div>
                                    </div>
                                    <span data-timestamp="000"></span>
                                </div>
                            </div>
  
                            <div class="message me">
                                <div class="text-main">
                                    <div class="text-group me">
                                        <div class="text me">
                                            <p>Yeah for sur we can hep with dis</p>
                                        </div>
                                    </div>
                                    <span data-timestamp="000"></span>
                                </div>
                            </div>

                    {{-- USED FOR SENDING IMAGES --}}
                    {{--<div class="message">--}}
                        {{--<img class="avatar-md" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username">--}}
                        {{--<div class="text-main">--}}
                            {{--<div class="text-group">--}}
                                {{--<div class="text">--}}
                                    {{--<div class="attachment">--}}
                                        {{--<button class="btn attach"><i class="material-icons md-18">insert_drive_file</i></button>--}}
                                        {{--<div class="file">--}}
                                            {{--<h5><a href="#">Noods.jpg</a></h5>--}}
                                            {{--<span>24mb Photo</span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<span>11:07 PM</span>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                </div>
            </div>
        </div>
        {{-- TODO: Implement form --}}
        <form id="form-reply-chat">
            <div class="container">
                <div class="col-md-12">
                    <div class="bottom">
                        <div class="position-relative w-100">

                            <textarea class="form-control" name="message" id="chat-response-box" placeholder="Reply here..." rows="1"></textarea>
                            <button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
                            <button type="submit" class="btn send" id="sendButton" data-credit="0"><i class="material-icons text-success">check</i><i class="material-icons">lock</i></button>
                            <!--<button type="submit" class="btn send"><i class="material-icons">send</i></button>-->
                        </div>
                        <!-- file sending is probably a terrible idea
                        <label>
                            <input type="file">
                            <span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
                        </label> -->
                    </div>
                </div>
            </div>
        </form>
</div>
</div>
</div>



<div class="col-md-4">
        <div class="container">
            <div class="top">
                            
                <div class="inside mb-20">
                                
                    <a href="#"><img class="avatar-md" src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username"></a>

                    <div class="them">
                        <h5><a href="#">Miss Julianne</a></h5>
                        <span>Model <div class="badge bg-private">Private</div></span> <!-- or user -->
                    </div>
                </div>

                    <ul class="listnone h6">
                        <li>Total tickets: 45 <button type="submit" href="admin/tickets" class="badge badge-light">view</button></li> <!-- show tickets list with a filter for the username -->
                        <li>Total chats: 23 <button type="submit" class="badge badge-light" data-toggle="modal" data-target="#chatsOpen">view</button></li> <!-- can see a list of chats by the user and go to them -->
                        <hr>
                        <li>Total posts: 345</li>
                        <li>Total public: 45</li>
                        <li>Total private: 45</li>
                        <hr>
                        <li>Subscribers: 45 <button type="submit" class="badge badge-light">view</button></li>
                        <li>Income: $5,340.00 <button type="submit" class="badge badge-light">view</button></li>
                    </ul>
            </div>
        </div>
    </div>


</div>
    

<!-- End of Chat 1 -->

            </div>

        </div>
    </div>
</div>

@endsection

@section('admin_after')

<!--datatables-->
<script src="{{ asset('vendor/data-tables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/data-tables/dataTables.bootstrap4.min.js') }}"></script>

@include('admin/tickets/tickets-js')
@include('admin/popups/chats')
<!-- admin page js -->
<script src="{{ asset('js/admin.js') }}"></script>

@stop