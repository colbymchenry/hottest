@extends('layouts.app-fox')

@section('content')
<h1>Apply</h1>

<div class="row">

<div class="col-md-8 offset-md-2">
    <div class="settings">
        <div class="profile">
            <img class="avatar-xl" src="{{ asset('images/defaults/user_logo.png') }}" alt="avatar">
            <h1><a href="#">John Doe</a></h1>
            <span>New Flame</span>

        </div>
        <div class="categories" id="accordionSettings">
            <h1>Build your profile</h1>

            <div class="row">

                <div class="col-md-12">

                    <div class="content">
                        <div class="upload">
                            <div class="data">
                                <img class="avatar-xl"
                                    src="{{ asset('images/defaults/user_logo.png') }}" alt="image">
                                <label>
                                    <input type="file">
                                    <span class="btn button">Upload avatar</span>
                                </label>
                            </div>
                            <p>For best results, use an image at least 256px by 256px in either .jpg or
                                .png format!</p>
                        </div>

                        <div class="parent">
                            <div class="field">
                                    <label for="firstName">First name <span>*</span></label>
                                    <input type="text" class="form-control" id="firstName"
                                        placeholder="First name" required="">
                            </div>
                            <div class="field">
                                    <label for="lastName">Last name <span>*</span></label>
                                    <input type="text" class="form-control" id="lastName"
                                        placeholder="Last name" required="">
                            </div>
                        </div>

                            <div class="field"> <!-- should already show -->
                                    <label for="email">Email <span>*</span></label>
                                    <input type="email" class="form-control" id="email"
                                               placeholder="Enter your email address" value="johndoe@gmail.com"
                                               required="">
                            </div>   
                            <div class="field">
                                    <label for="lastName">Bio <span>*</span></label>
                                    <textarea type="text" rows="3" class="form-control" id="bio" placeholder="What do you do?"
                                         required=""></textarea>
                            </div> 

                            <div class="parent">
                                <div class="field">
                                        <label for="instagram">Instagram </label>
                                        <input type="text" class="form-control" id="instagram"
                                                placeholder="Instagram">
                                </div>        
                                <div class="field">
                                        <label for="instagram">Follower Count </label>
                                        <input type="text" class="form-control" id="instagram">
                                </div>                                                      
                            </div>

                            <div class="parent">
                                <div class="field">
                                        <label for="instagram">SnapChat </label>
                                        <input type="text" class="form-control" id="snapchat"
                                                placeholder="Snapchat">
                                </div>        
                                <div class="field">
                                        <label for="instagram">Follower Count </label>
                                        <input type="text" class="form-control" id="snapchat">
                                </div>                                                      
                            </div>   


           


                 

                        <div class="field"> 
                            <label for="public">Public Examples <span>*</span></label>
                            
                            <p>Upload 3 example public images. These will be set to unlisted once account is approved.</p>
                            <div class="row">
                                @for ($i = 0; $i < 3; $i++)
                                <!-- Upload 3 Public images -->
                                <div class="grid-item anime-item work-item col-4 private public" id="{{ $i }}">

                                    <a href="#" data-toggle="tab" class="box edit-modal upload-image modal-ui-trigger" style="padding-top:300px;">
                                    <!--- padding-top must change dpending on photo height... also, remove data-toggle continues below-->
                                    <!--  "upload-image" toggles to edit-image or locked-image or nothing if being sent as public-->
                                        <div class="box-cover">
                                            <div class="modal-img" style="background-image: url('')"></div>
                                            <div class="box-hover">
                                                <!-- <span class="status">
                                                    <i class="material-icons">lock</i>
                                                </span>-->
                                            </div>
                                            <div class="main-details">

                                                    <div class="icons-row"><!--
                                                        <div class="icons-column">
                                                                <div class="name">Miss Julianne</div>
                                                        </div>-->	
                                                        <div class="icons-column">
                                                                <i class="material-icons">lock_open</i> Public
                                                        </div>	                                      								   							   
                                                    </div>
                                                </div>                             
                                        </div>
                                    </a>
                                    <a href="#" data-type="page-transition">
                                        <div class="work-info">
                                            <div class="box-inner">
                                                <h4 class="box-inner__search"><i class="material-icons">search</i></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- / -->
                                @endfor

                            </div>
                        </div>   
                    
                        <div class="field"> 
                            <label for="private">Private Examples </label>
                            
                            <p>Upload 3 example private images. These will be set to unlisted once account is approved.</p>
                            <div class="row">
                                @for ($i = 0; $i < 3; $i++)
                                <!-- Upload 3 Public images -->
                                <div class="grid-item anime-item work-item col-4 private public" id="{{ $i }}">

                                    <a href="#" data-toggle="tab" class="box edit-modal upload-image modal-ui-trigger" style="padding-top:300px;">
                                    <!--- padding-top must change dpending on photo height... also, remove data-toggle continues below-->
                                    <!--  "upload-image" toggles to edit-image or locked-image or nothing if being sent as public-->
                                        <div class="box-cover">
                                            <div class="modal-img" style="background-image: url('')"></div>
                                            <div class="box-hover">
                                                <!-- <span class="status">
                                                    <i class="material-icons">lock</i>
                                                </span>-->
                                            </div>
                                            <div class="main-details">

                                                    <div class="icons-row"><!--
                                                        <div class="icons-column">
                                                                <div class="name">Miss Julianne</div>
                                                        </div>-->	
                                                        <div class="icons-column">
                                                                <i class="material-icons">lock_open</i> Private
                                                        </div>	                                      								   							   
                                                    </div>
                                                </div>                             
                                        </div>
                                    </a>
                                    <a href="#" data-type="page-transition">
                                        <div class="work-info">
                                            <div class="box-inner">
                                                <h4 class="box-inner__search"><i class="material-icons">search</i></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- / -->
                                @endfor

                            </div>
                        </div>    

                        <div class="row"> 
 
                        <div class="field"> 
                            <div class="col-md-4"> 
                                <label for="public">Attraction</label>
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ad-instagram">
                                        <label class="custom-control-label" for="ad-instagram">Instagram Bio</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ad-instagram-post">
                                        <label class="custom-control-label" for="ad-instagram-post">Instagram Posts</label>
                                </div> 
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ad-snapchat">
                                        <label class="custom-control-label" for="ad-snapchat">Snapchat</label>
                                </div>  
                                <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="ad-other">
                                        <label class="custom-control-label" for="ad-other">Other</label>
                                </div>                                                                               
                            </div> 
                            <div class="col-md-8"> 
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <label for="public">Upload Schedule</label>
                                        <select class="custom-select" id="schdule" required="">
                                            <option value="">Select a timeline...</option>
                                            <option>Once per day</option>
                                            <option>Once per week</option>
                                            <option>Once per month</option>
                                        </select>
                                    </div>  
                                    <div class="col-md-6"> 
                                        <label for="public">Mostly</label>
                                        <select class="custom-select" id="schdule" required="">
                                            <option value="">Upload mostly...</option>
                                            <option>Public Photos</option>
                                            <option>Private Photos</option>
                                            <option>Both the same</option>
                                        </select>
                                    </div>   
                                    <div class="col-md-12"> 
                                        <label for="public">Monetize content?</label>
                                        <select class="custom-select" id="schdule" required="">
                                            <option value="">Upload mostly...</option>
                                            <option>Private Photos</option>
                                            <option>Snapchat</option>
                                            <option>Both the same</option>
                                        </select>
                                    </div> 
                                </div>
                            </div>  
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-12"> 
                                <div class="field"> 
                                <label for="public">So close to Flame VIP model status!</label>
                                    <p>We encourage anyone to apply! We'll get back to you if we think any changes will need to be made before we approve your account. Please be aware of our rules and guidelines. Expect an email within 2 days!</p>
                                   
                                </div>
                                <button type="submit" class="btn button">Apply!</button>
                            </div>
                        </div>     


                </div>

            </div>
        </div>
    </div>

    <!-- end col -->
</div>


@endsection