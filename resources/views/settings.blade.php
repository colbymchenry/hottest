@extends('layouts.app-fox')

@section('content')
    <div class="row top-gap-big">

        <div class="col-md-8 offset-md-2">
            <div class="settings">
                <div class="profile">
                    <img class="avatar-xl" src="{{ Auth::user()->getAvatar() }}" alt="avatar">
                    <h1><a href="#">{{ Auth::user()->name }}</a></h1>
                    <span>{{ Auth::user()->is_model ? 'Model' : 'User' }}</span>
                    <button class="btn underline-button">Apply to be a Model</button>
                </div>
                <div class="categories" id="accordionSettings">
                    <h1>Settings</h1>

                    <div class="row">
                        <div class="col-xl-6">
                            <!-- Start of My Account -->
                            <div class="category">
                                <a href="#" class="title collapsed" id="headingOne" data-toggle="collapse"
                                   data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="material-icons md-30 online">person_outline</i>
                                    <div class="data">
                                        <h5>My Account</h5>
                                        <p>Update your profile details</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseOne" aria-labelledby="headingOne"
                                     data-parent="#accordionSettings">
                                    <div class="content">
                                        <div class="upload">
                                            <div class="data">
                                                <img class="avatar-xl"
                                                     src="{{ Auth::user()->getAvatar() }}" alt="image">
                                                <label>
                                                    <span class="btn button" id="upload-avatar-btn">Upload avatar</span>
                                                </label>
                                            </div>
                                            <p>For best results, use an image at least 256px by 256px in either .jpg or
                                                .png format!</p>

                                            <div id="avatar-edit-box" class="container" style="display: none">
                                                <div class="row">
                                                    <div class="container centered" style="width: 360px;height: 360px;overflow:hidden;">
                                                        <img id="avatarimg" style="width: 256px;height: 256px;" src="demo/demo.jpg" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="container" style="text-align: right;">
                                                       <button class="btn" onclick="updateAvatar()"><i class="fa fa-check"></i></button>
                                                       <button class="btn" onclick="cancelAvatar()"><i class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <form>
                                            <div class="parent">
                                                <div class="field">
                                                    <label for="firstName">First name <span>*</span></label>
                                                    <input type="text" class="form-control" id="firstName"
                                                           placeholder="First name" value="John" required="">
                                                </div>
                                                <div class="field">
                                                    <label for="lastName">Last name <span>*</span></label>
                                                    <input type="text" class="form-control" id="lastName"
                                                           placeholder="Last name" value="Doe" required="">
                                                </div>
                                            </div>
                                            <div class="field">
                                                <label for="email">Email <span>*</span></label>
                                                <input type="email" class="form-control" id="email"
                                                       placeholder="Enter your email address" value="johndoe@gmail.com"
                                                       required="">
                                            </div>
                                            <div class="field">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                       placeholder="Enter a new password" value="password" required="">
                                            </div>
                                            <button class="btn btn-link w-100">Delete Account</button>
                                            <button type="submit" class="btn button w-100">Apply</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End of My Account -->

                            <!-- Start of VIP Settings -->
                        <!-- <div class="category">
                                <a href="#" class="title collapsed" id="headingThree" data-toggle="collapse"
                                   data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <i class="material-icons md-30 online">attach_money</i>
                                    <div class="data">
                                        <h5>VIP Content</h5>
                                        <p>Set prices and how you get paid.</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree"
                                     data-parent="#accordionSettings">
                                    <div class="content layer">
                                        <div class="history">
                                            <p>Monetize your VIP content.</p>
                                            <p>Link a PayPal account then set the price. Get paid everyday.</p>
                                            <form>
                                                <div class="field">
                                                    <label for="text">Link PayPal Account<span>*</span></label>
                                                    @if(PayPalToken::hasTokens(Auth::user()->id) === false)
                            <button id="connect-paypal" type="submit"
                                    class="btn button w-100"
                                    style="background-color:#e21f1f;"><i
                                        class="material-icons">error</i> PayPal
                            </button>
@else
                            <button type="submit" class="btn button w-100"><i
                                        class="material-icons">check</i> PayPal
                            </button>
@endif

                                </div>
                                <div class="parent">
                                    <div class="field">
                                        <label for="text">VIP Foxxy (USD / month) <span>*</span></label>
                                        <input type="text" class="form-control" id="vip-content-price"
                                               placeholder="Enter your email address" value="0.00"
                                               disabled>
                                    </div>
                                    <div class="field">
                                        <label for="text">VIP ProductSnapchat (USD / month)
                                            <span>*</span></label>
                                        <input type="text" class="form-control" id="vip-message-price"
                                               placeholder="Enter your email address" value="0.00"
                                               disabled>
                                    </div>
                                </div>
                                <button type="submit" class="btn button bg-green w-100">Accept Terms &
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>-->
                            <!-- End of VIP Settings -->

                            <!-- Start of Chat History -->
                            <div class="category">
                                <a href="#" class="title collapsed" id="headingTwo" data-toggle="collapse"
                                   data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                    <i class="material-icons md-30 online">mail_outline</i>
                                    <div class="data">
                                        <h5>Chats</h5>
                                        <p>Check your chat history</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo"
                                     data-parent="#accordionSettings">
                                    <div class="content layer">
                                        <div class="history">
                                            <p>When you clear your conversation history, the messages will be deleted
                                                from your own device.</p>
                                            <p>The messages won't be deleted or cleared on the devices of the people you
                                                chatted with.</p>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="same-address">
                                                <label class="custom-control-label" for="same-address">Hide will archive
                                                    your chat history.</label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="save-info">
                                                <label class="custom-control-label" for="save-info">Delete will remove
                                                    your chat history from the site.</label>
                                            </div>
                                            <button type="submit" class="btn button w-100">Clear blah-blah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Chat History -->

                        </div>
                        <div class="col-xl-6">

                            <!-- Start of Connections -->
                        <!--<div class="category">
                                <a href="#" class="title collapsed" id="headingFour" data-toggle="collapse"
                                   data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    <i class="material-icons md-30 online">sync</i>
                                    <div class="data">
                                        <h5>Connections</h5>
                                        <p>Sync your social accounts</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseFour" aria-labelledby="headingFour"
                                     data-parent="#accordionSettings">
                                    <div class="content">
                                        <div class="app">
                                            <img src="dist/img/integrations/instagram.svg" alt="app">
                                            <div class="permissions">
                                                <h5>Instagram</h5>
                                                <p>Read, Write, Comment</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked="">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="app">
                                            <img src="dist/img/integrations/dropbox.svg" alt="app">
                                            <div class="permissions">
                                                <h5>Dropbox</h5>
                                                <p>Read, Write, Upload</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked="">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="app">
                                            <img src="dist/img/integrations/facebook.svg" alt="app">
                                            <div class="permissions">
                                                <h5>Facebook</h5>
                                                <p>No permissions set</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="app">
                                            <img src="dist/img/integrations/twitter.svg" alt="app">
                                            <div class="permissions">
                                                <h5>Twitter</h5>
                                                <p>No permissions set</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <!-- End of Connections -->

                            <!-- Start of Language -->
                            <div class="category">
                                <a href="#" class="title collapsed" id="headingSix" data-toggle="collapse"
                                   data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                                    <i class="material-icons md-30 online">language</i>
                                    <div class="data">
                                        <h5>Language</h5>
                                        <p>Select preferred language</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseSix" aria-labelledby="headingSix"
                                     data-parent="#accordionSettings">
                                    <div class="content layer">
                                        <div class="language">
                                            <label for="country">Language</label>
                                            <select class="custom-select" id="country" required="">
                                                <option value="">Select an language...</option>
                                                <option>English, UK</option>
                                                <option>English, US</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Language --->
                            <!-- Start of Privacy & Safety -->
                            <div class="category">
                                <a href="#" class="title collapsed" id="headingSeven" data-toggle="collapse"
                                   data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                                    <i class="material-icons md-30 online">lock_outline</i>
                                    <div class="data">
                                        <h5>Privacy &amp; Safety</h5>
                                        <p>Control your privacy settings</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                                <div class="collapse" id="collapseSeven" aria-labelledby="headingSeven"
                                     data-parent="#accordionSettings">
                                    <div class="content no-layer">
                                        <div class="set">
                                            <div class="details">
                                                <h5>Keep Me Safe</h5>
                                                <p>Automatically scan and reject direct messages you receive from
                                                    everyone that contain explict content.</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="set">
                                            <div class="details">
                                                <h5>Only VIP say hello</h5>
                                                <p>If enabled scans direct messages from everyone unless they are listed
                                                    as a VIP subscriber.</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked="">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="set">
                                            <div class="details">
                                                <h5>Everyone can message me</h5>
                                                <p>If enabled anyone in or out your VIP Subscribers list can send you a
                                                    message.</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox" checked="">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="set">
                                            <div class="details">
                                                <h5>Data to Improve</h5>
                                                <p>This settings allows us to use and process information for analytical
                                                    purposes.</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="set">
                                            <div class="details">
                                                <h5>Data to Customize</h5>
                                                <p>This settings allows us to use your information to customize Foxxy
                                                    VIP for you.</p>
                                            </div>
                                            <label class="switch">
                                                <input type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Privacy & Safety -->
                            <!-- Start of Logout -->
                            <div class="category mobile">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" class="title collapsed">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                    <i class="material-icons md-30 online">power_settings_new</i>
                                    <div class="data">
                                        <h5>Power Off</h5>
                                        <p>Log out of your account</p>
                                    </div>
                                    <i class="material-icons">keyboard_arrow_right</i>
                                </a>
                            </div>
                            <!-- End of Logout -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- end col -->
        </div>

    </div>

    <form class="hidden" enctype="multipart/form-data" id="avatar-img-form" role="form" method="POST" action="" >
        <input type="file" class="form-control" name="user_photo">
    </form>
@endsection

@section('js_after')
    @if(isset($avatar) && $avatar == true)
    <script>
        $('#headingOne').trigger('click');
    </script>
    @endif

    <script>

        var vanilla = null;
        $(document).ready(function() {
            $('#upload-avatar-btn').on('click', function() {
               chatSelectImage();
            });

            $("#avatar-img-form input").on("change", function() {
                var path = $(this).val();


                var file = this.files[0];
                var reader = new FileReader();
                reader.onloadend = function () {
                    $('#model-upload-prev').css('background-image', 'url("' + reader.result + '")');
                };

                if (file) {
                    reader.readAsDataURL(file);
                    var _URL = window.URL || window.webkitURL;
                    var img = new Image();
                    img.onload = function () {

                    };
                    img.src = _URL.createObjectURL(file);
                } else {

                }

                $('#avatarimg').attr('src', img.src);

                var el = document.getElementById('avatarimg');
                vanilla = new Croppie(el, {
                    viewport: { width: 200, height: 200, type: 'circle' },
                    boundary: { width: 300, height: 300 },
                    enableOrientation: true
                });

                // TODO: Rob make this animate down or something
                $('#avatar-edit-box').show( "slow" );

            });
        });

        function chatSelectImage() {
            $('#avatar-img-form input').trigger("click");
        }

        function updateAvatar() {
            vanilla.result('blob').then(function(blob) {
                var fd = new FormData();
                fd.append('fname', 'test.png');
                fd.append('data', blob);
                fd.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    type: 'POST',
                    url: '/update_avatar',
                    data: fd,
                    processData: false,
                    contentType: false
                }).done(function(data) {
                    location.reload();
                });
            });
        }

        function cancelAvatar() {
            vanilla.destroy();
            $('#avatarimg').attr('src', '');
            $('#avatar-edit-box').addClass('hidden');
        }
    </script>

@endsection