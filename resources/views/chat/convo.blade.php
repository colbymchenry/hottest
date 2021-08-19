<!-- Start Chat 1 -->

<div class="row">


    <div class="col-md-12 col-lg-10 offset-lg-1">
        <!--<a href="{{ url('/chat') }}" class="nav-item btn bck"><i class="material-icons">arrow_left</i></a>-->

        <div class="top top-chat">

            <div class="inside">
                <a href="{{ url('/chat') }}" class="round-icon"><i data-eva="arrow-ios-back"></i></a>


                <div class="them text-sm-center">
                    <a href="#" class="mobile-gone"><img class="avatar-md" src="{{ $participant->getAvatar() }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="{{ $participant->name }}"></a>

                    <h5>
                        @if($participant->is_model)
                            <a href="/model/{{ $participant->name }}">{{ $participant->name }}</a>
                        @else
                            <a href="#">{{ $participant->name }}</a>
                        @endif
                    </h5>
                    <span>{{ $participant->is_model ? 'Model' : 'Member' }}</span>
                </div>
                <!--<div class="field them">
								<span>Rate</span>
									<h3 id="model-rate">{{ $price }}</h3>
							</div>-->
                {{--@if(!Auth::user()->is_model)--}}
                <div class="balance">
                    <button class="tokens-button" data-toggle="modal" data-target="#creditsModal"><span id="credits-balance">{{ Auth::user()->credits }}</span><i class="fas fa-star"></i>
                    </button>
                    <p class="mobile-gone">
                        <small>Credits</small>
                    </p>
                </div>
                {{--<div class="field me mobile-gone">--}}
                {{--<span>Rate</span>--}}
                {{--<input type="text" class="form-control"--}}
                {{--required="true" placeholder="My Rate" value="0">--}}
                {{--</div>--}}
                {{--@endif--}}

                <!-- 						<button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-30">phone_in_talk</i></button>
							<button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-36">videocam</i></button> -->
                <!--<div class="me mobile-gone">
								<h5><a href="#">You</a></h5>
								<span>{{ Auth::user()->is_model ? 'Model' : 'Member' }}</span>
							</div>		
							<a href="#" class="mobile-gone"><img class="avatar-md me" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="{{ Auth::user()->name }}"></a>
							--->

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





                        @foreach($messages as $message)
                        @if($message->sender_id == Auth::user()->id)

                        <!-- this is what model sees when they get a tip -->
                        {{--<div class="message me">--}}
                        {{--<div class="text-main">--}}
                        {{--<div class="text-group me">--}}
                        {{--You've recieved a tip!--}}
                        {{--</div>--}}
                        {{--<div class="text-group me">--}}
                        {{----}}
                        {{----}}
                        {{--<div class="tokens-container gift" data-amount="25">	--}}
                        {{--<div class="tip">--}}
                        {{--<i class="fas fa-gift"></i>--}}
                        {{--</div> --}}
                        {{--<div class="tip-control">25</div>--}}
                        {{--<i class="fas fa-star tip-icon"></i>			--}}
                        {{--</div>--}}
                        {{----}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div> --}}

                        <div class="message me">
                            <div class="text-main">
                                <div class="text-group me">

                                    @if($message->img_id === null)
                                    <div class="text me">
                                        <p>{{ $message->message }}</p>
                                    </div>
                                    @else
                                    <div class="text image me">

                                        <!-- what the model sees when its paid for -->
                                        <div class="grid-item anime-item work-item col-12 private public" id="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}t">

                                            <div class="box modal-ui-trigger" id="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}" data-idt="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}t" data-ido="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}o" data-height="{{ ModelImage::where('id', $message->img_id)->get()[0]->height }}" data-width="{{ ModelImage::where('id', $message->img_id)->get()[0]->width }}" data-url="{{ ModelImage::where('id', $message->img_id)->get()[0]->getLink() }}" data-vip="0" data-access="">
                                                <div class="box-cover">
                                                    <div class="box-img" style="background-image: url('{{ ModelImage::where('id', $message->img_id)->get()[0]->getLink() }}')"></div>
                                                    <div class="box-hover">

                                                    </div>

                                                    <div class="main-details">
                                                        <div class="tokens-container unlocked">
                                                            <div class="tip">
                                                                <i class="fas fa-check"></i>
                                                                <!-- if not paid <i class="fas fa-lock"></i> -->
                                                            </div>
                                                            <div class="tip-control">25</div>
                                                            <i class="fas fa-star tip-icon"></i>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mobile-gone">
                                                <div class="work-info">
                                                    <div class="box-inner">
                                                        <h4 class="box-inner__search"></h4>
                                                        <p class="box-inner__title">H: {{ ModelImage::where('id', $message->img_id)->get()[0]->height }} W: {{ ModelImage::where('id', $message->img_id)->get()[0]->width }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    @endif

                                </div>
                                <span data-timestamp="{{ $message->getTimeStamp() }}" data-datestamp="{{ $message->created_at }}"></span>
                            </div>
                        </div>
                        @else

                        <!-- this is what user sees when they send a tip, tip amount not shown so they dont keep track -->
                        {{--<div class="message">--}}
                        {{--<img class="avatar-md" src="{{ $participant->getAvatar() }}"--}}
                        {{--data-toggle="tooltip" data-placement="top" title="" alt="avatar"--}}
                        {{--data-original-title="{{ $participant->name }}">--}}
                        {{--<div class="text-main">--}}
                        {{--<div class="text-group">--}}
                        {{--You sent a tip!--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        <div class="message">
                            <img class="avatar-md" src="{{ $participant->getAvatar() }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="{{ $participant->name }}">
                            <div class="text-main">
                                <div class="text-group">

                                    @if($message->img_id === null)
                                    <div class="text">
                                        <p>{{ $message->message }}</p>
                                    </div>
                                    @else
                                    <div class="text image">

                                        <!-- locked image not yet paid for by the user -->
                                        <div class="grid-item anime-item locked-image work-item col-12 private public" id="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}t">

                                            <div class="box locked modal-ui-trigger" id="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}" data-idt="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}t" data-ido="img{{ ModelImage::where('id', $message->img_id)->get()[0]->id }}o" data-height="{{ ModelImage::where('id', $message->img_id)->get()[0]->height }}" data-width="{{ ModelImage::where('id', $message->img_id)->get()[0]->width }}" data-url="{{ ModelImage::where('id', $message->img_id)->get()[0]->getLink() }}" data-vip="0" data-access="">
                                                <div class="box-cover">
                                                    <div class="box-img" style="background-image: url('{{ ModelImage::where('id', $message->img_id)->get()[0]->getLink() }}')"></div>
                                                    <div class="box-hover">

                                                    </div>

                                                    <div class="main-details">
                                                        <!-- once paid remove this section so they dont keep track of when /where they spent money lol -->
                                                        <div class="tokens-container locked" data-amount="25">
                                                            <div class="tip">
                                                                <i class="fas fa-unlock"></i>
                                                            </div>
                                                            <div class="tip-control">25</div>
                                                            <i class="fas fa-star tip-icon"></i>
                                                        </div>



                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mobile-gone">
                                                <div class="work-info">
                                                    <div class="box-inner">
                                                        <h4 class="box-inner__search"></h4>
                                                        <p class="box-inner__title">H: {{ ModelImage::where('id', $message->img_id)->get()[0]->height }} W: {{ ModelImage::where('id', $message->img_id)->get()[0]->width }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    @endif

                                </div>
                                <span data-timestamp="{{ $message->getTimeStamp() }}" data-datestamp="{{ $message->created_at }}"></span>
                            </div>
                        </div>
                        @endif
                        @endforeach

                        {{--<div class="message">--}}
                        {{--<img class="avatar-md" src="{{ asset('images/defaults/user_logo.png') }}" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Username">--}}
                        {{--<div class="text-main">--}}
                        {{--<div class="text-group">--}}
                        {{--<div class="text">--}}
                        {{--<p>Display the first bit of the message so they wanna kn... <i>read more for 50 stars</i> <a href="#" class="unlock-button" data-toggle="modal" data-target="#creditsModal">unlock <i class="material-icons">lock</i></a>--}}
                        {{--<!----}}
                        {{--<p class="badge badge-primary color-private float-right">Unlock</p>--}}
                        {{--<button class="btn tokens-container">													--}}
                        {{--<div class="price-control">unlock</div>--}}
                        {{--<i class="fas fa-star icon"></i>			--}}
                        {{--</button>--}}
                        {{--</p>-->--}}

                        {{--</p>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<span data-timestamp="" data-datestamp=""></span>--}}
                        {{--</div>--}}
                        {{--</div>--}}


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
            <form id="form-reply-chat">
                <div class="container chat-container">

                    <div class="bottom">

                        <div class="position-relative w-100">

                            <textarea class="form-control" name="message" id="chat-response-box" placeholder="Message..." rows="1" {{ !Auth::user()->is_model && $price > Auth::user()->credits ? 'readonly' : ''  }}></textarea>
                            <button type="button" class="btn addimage" onclick="chatSelectImage();"><i class="material-icons">add_photo_alternate</i></button>


                        </div>


                        <div class="input-container">
                            @if(Auth::user()->is_model)
                            <input type="text" class="price-control" placeholder="0" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Unlock Price">
                            @else
                            <input type="text" class="price-control" placeholder="@if ($price > 0){{ $price }}@else 0 @endif" data-toggle="tooltip" data-placement="top" title="" alt="avatar" data-original-title="Tip">
                            @endif
                            <i class="fas fa-star icon"></i>
                            <button type="submit" class="sender" id="sendButton" id="sendButton" data-credit="0"><i class="material-icons">send</i></button>

                        </div>
                        <!-- end if -->

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<form class="hidden" enctype="multipart/form-data" id="msg-img-form" role="form" method="POST" action="">
    <input type="file" class="form-control" id="msg-img-input" name="user_photo">
</form>

<!-- End of Chat 1 -->