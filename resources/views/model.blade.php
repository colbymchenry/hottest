@extends('layouts.app-fox')

@section('title', $model->getUser()->name)

@section('content')

  <div class="model-container @if(sizeof($model->getVIPPhotos()) > 0) dark @endif" id="model-cont"> 
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="tab-profile">
                <div class="top top-models">
						
						<div class="inside">
                            @if(Auth::user()->name == $model->getUser()->name)
                           <!-- <a href="{{ url('/uploads') }}" class="blank-icon"><i data-eva="image-outline" data-eva-animation="pulse"></i></a>-->
                            <a href="{{ url('/top') }}" class="blank-icon" data-toggle="tooltip" data-placement="right" title="#54"><i data-eva="award" data-eva-animation="pulse"></i></a>
                            <!-- might make this an upload button -->
                            @else
                            <a href="{{ url('/top') }}" class="blank-icon" data-toggle="tooltip" data-placement="right" title="#54"><i data-eva="award" data-eva-animation="pulse"></i></a>
							<!--<a href="javascript:history.back()" class="blank-icon side-areas"><i data-eva="arrow-ios-back" data-eva-animation="pulse"></i></a>-->
                            @endif
							<div class="profile text-sm-center">

                                <h5>{{ $model->getUser()->name }}</h5>
                              
                            </div>	
                            
                           
                            <div class="side-areas">
                                <h6 class="text-center mb-0">VIP</h6>
                                        <label class="switch grid-filter-toggle" data-toggle="tooltip" data-placement="left" title="{{ (sizeof($model->getVIPPhotos())) }} VIP">
                                            <input type="checkbox" @if(sizeof($model->getVIPPhotos()) > 0) checked="" @else disabled @endif data-filter=".public">
                                            <span class="slider round"></span>
                                        </label>
                            </div>
                            <!--<div class="dropdown">
                                <a class="btn blank-icon" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i data-eva="more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <span class="dropdown-item connect"><i data-eva="star-outline"></i>Subscribe</span>
                                    <span class="dropdown-item connect" data-toggle="modal" data-target="#ReportModal"><i data-eva="alert-circle-outline"></i>Report Page</span>
                                </div>
                            </div>-->
                        
						</div>
						
                    </div>
                    
                <div class="profile top-gap">
                <!--@if(Auth::user()->is_model)
                    <div class="stats">

                        <div class="item">
                            <a href="{{ url('/uploads') }}"><i class="material-icons md-30">photo</i> <p>Unlisted Photos</p></a>
                        </div>
 
                        <div class="item">
                            <a href="#" data-toggle="modal" data-target="#PrivateSettingsModal"><i class="material-icons md-30">stars</i> <p>Private Prices</p></a>
                        </div>  

                        <div class="item">
                            <a href="/model/{{ $model->getUser()->name }}/analytics"><i class="material-icons md-30">insert_chart</i> <p>Analytics</p></a>
                        </div>
                      
                     
                    </div>
                    @endif
                -->

                    <!--@if(((count($images)) < 4) && (Auth::user()->is_model))
                    <div class="alert alert-primary" role="alert">
                    Congratulations. You are now a model!
                
                    </div>
                    @endif-->

                    <div class="row view-mainbill">
                    @if(Auth::user()->name == $model->getUser()->name)
                            <div class="col-6">
                                <a href="#" data-toggle="modal" data-target="#PrivateSettingsModal" class="btn edit-button">
                                    VIP Settings
                                </a>
                            </div>
                            <div class="col-6">

                                <a href="/model/{{ $model->getUser()->name }}/analytics" class="btn analytics-button">
                                    Analytics
                                </a>

                            </div>
                    @endif

                    <!-- start -->
                        <div class="grid-item col-12 private public mainbill">
                        
                        <!--<h1>{{ $model->getUser()->name }}</h1>-->
                            <div class="box-profile banner-image">
                                
                                <div class="box-cover profile">
                                    <div class="box-img-profile" id="ModelBanner"
                                         style="background-image: url('{{ $model->getBanner() }}')"></div>

                                        <div class="box-hover">
                                                <span class="verified" data-toggle="tooltip" data-placement="top"
                                                    title="Verified">
                                                        <i class="material-icons">check</i>
                                                    </span>
                                        </div>
                                        <button class="btn snp {{ $model->getPricing(ProductType::$SNAPCHAT) != null ? 'bg-private' : 'disabled' }}" data-toggle="modal" data-target="#SnapChatModal" id="SnapChatButton">
                                                @if(Auth::user()->name == $model->getUser()->name)
                                                <div class="edit-add {{ $model->getPricing(ProductType::$SNAPCHAT) != null ? 'hidden' : '' }}" id="snp-add">
													<span><i class="fas fa-plus-circle"></i></span>
                                                </div>
                                                <div class="cost {{ $model->getPricing(ProductType::$SNAPCHAT) != null ? '' : 'hidden' }}" id="snp-cost">
													<span><i class="fas fa-star"></i></span>
                                                </div>
                                                @endif
                                                <span class="fab fa-snapchat-ghost"></span>
                                        </button>
                                        <button class="btn msg {{ $model->getPricing(ProductType::$MESSAGE) != null ? 'bg-private' : 'disabled' }}" data-toggle="modal" @if((Auth::user()->is_model) or (Request::path() == 'model/create'))data-target="#MessageModal"@else data-target="#startnewchat" @endif id="MessageButton">
                                                @if(Auth::user()->name == $model->getUser()->name)                                     
                                                <div class="edit-add {{ $model->getPricing(ProductType::$MESSAGE) != null ? 'hidden' : '' }}" id=msg-add>
													<span><i class="fas fa-plus-circle"></i></span>
                                                </div>
                                                <div class="cost {{ $model->getPricing(ProductType::$MESSAGE) != null ? '' : 'hidden' }}" id="msg-cost">
													<span><i class="fas fa-star"></i></span>
                                                </div>
                                                @endif
                                                <span class="fas fa-comment"></span>
                                        </button>

                                    <div class="photo" id="avatar-div"> 
                                        <img class="avatar-xxl"
                                             src="{{ $model->getUser()->getAvatar() }}"
                                             alt="{{ $model->getUser()->name }}">
                                            @if((Auth::user()->name == $model->getUser()->name) && (!$model->getUser()->getAvatar()))
                                            <div class="edit-pic">
                                                <span><a href="/settings?avatar=true"><i class="fas fa-plus-circle"></i></a></span>
                                            </div> 
                                            @endif                                           
                                    </div>

                                    <div class="box-inner-model">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="badges">
                                                        @if(sizeof($model->getVIPPhotos()) > 0)<div class="badge-private">VIP</div>@endif
                                                        @if(sizeof($model->getPublicPhotos()) > 0)<div class="badge-model">Model</div>@endif
                                                        @if((sizeof($model->getPublicPhotos()) == 0) || (sizeof($model->getVIPPhotos()) == 0))<div class="badge-model">User</div>@endif
                                                    </div>
                                                
                                                @if(Auth::user()->name == $model->getUser()->name)
                                                    <!--<div class="col-6">
                                                        <a id="editsettingsref" class="btn edit-button">
                                                            Settings
                                                        </a>
                                                    </div>
                                                    <div class="col-6">

                                                        <a href="/model/{{ $model->getUser()->name }}/analytics" class="btn analytics-button disabled">
                                                            Analytics
                                                        </a>

                                                    </div>-->
                                                    <button id="follow-btn"
                                                            class="follow-button" data-toggle="modal" data-target="#FollowersModal">
                                                        Followers
                                                    </button>
                                                @else
                                               
                                                @if(Auth::user()->isFollowing($model->getUser()->id))
                                                    <button id="follow-btn"
                                                            class="follow-button button-icon-follow">
                                                        Following
                                                        <i class="fas fa-check m-l-3"></i></button>
                                                @else
                                                    <button id="follow-btn"
                                                            class="follow-button button-icon-follow">
                                                        Follow
                                                    </button>
                                                @endif
                                                   
                                               
                                                
                                                   <!--
                                                    <h1 class="ribbon">
                                                        <strong class="ribbon-content">{{ $model->getUser()->name }}</strong>
                                                    </h1> -->

                                                @endif
                                                   
                                                </div>

                                              <!-- <div class="col-12">
                                                    <div class="filtr-btn grid-filter-toggle buttons-left" data-toggle="tooltip"
                                                         data-placement="bottom" title="Public Content">
                                                         @if(sizeof($model->getPublicPhotos()) > 0)
                                                        <span class="badge bg-public"
                                                              data-filter=".public">{{ sizeof($model->getPublicPhotos()) }} <i
                                                                    class="fas fa-eye"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="filtr-btn grid-filter-toggle buttons-right" data-toggle="tooltip"
                                                         data-placement="bottom" title="Private Content">
                                                         @if(sizeof($model->getVIPPhotos()) > 0)
                                                        <span class="badge bg-public"
                                                                      data-toggle="modal"
                                                                      data-target="#vipagree"
                                                                      data-filter=".vip"
                                                                      onclick="unlockVIP('{{ $model->getUser()->id }}')">{{ sizeof($model->getVIPPhotos()) }} <i class="fas fa-star"></i>
                                                                </span>
                                                               
                                                        @endif
                                                    </div>
                                                </div>-->



                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="model">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="filtr_tray">
                                    
                                    <div class="filtr-btn tags">
                                 
                                        <span class="badge-model grid-filter-toggle"
                                          data-filter=".public">Car</span>
                                          <span class="badge-model grid-filter-toggle"
                                          data-filter=".public">Tesla</span>
                                          <span class="badge-model grid-filter-toggle"
                                          data-filter=".public">Engine</span>
                                          <span class="badge-private grid-filter-toggle"
                                          data-filter=".vip">VIP</span>
                                    </div>


                                    <!--<div class="filtr-btn images">
                                        <span class="">VIP</span>
                                        <label class="switch">
                                            <input type="checkbox" checked="">
                                            <span class="slider round"></span>
                                        </label>
                                      <div class="dropdown">
                                            <a class="btn" data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false"><i
                                                        class="material-icons md-30">sort</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <span data-filter="*" class="dropdown-item connect" name="1"><i
                                                        class="material-icons">photo</i>All</span>
                                                <span data-filter=".public" class="dropdown-item connect" name="1"><i
                                                            class="material-icons">remove_red_eye</i>Public</span>
                                                <span data-filter=".vip" class="dropdown-item connect" name="1"><i
                                                            class="material-icons">star</i>Private</span>
                                            </div>
                                        </div>

                                    </div>-->
                                </div>
                            </div>
                        </div>
                     
                        @include('profile/model-grid')
                        
                        <div class="row mb-20">
                            <div class="col-md-12">

                            @if(((count($images)) < 4) && (Auth::user()->name == $model->getUser()->name))
                            <button class="btn create-button w-100 @if((count($images)) < 3) disabled @endif" @if((count($images)) < 3) disabled @endif>Submit Profile for Review</button>
                            @endif

                            </div>
                        </div>
                        
                    </div>
 


                </div>
            </div>
        </div>
    </div>

</div>

    <div id="pay-for-vip-modal" class="hidden">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="photo mb-20" id="avatar-div">   
                        <div class="vip-pic">
                            <span><i class="fas fa-star"></i></span>
                        </div>                   
                        <img class="avatar-xxl"
                        src="{{ $model->getUser()->getAvatar() }}"
                        alt="{{ $model->getUser()->name }}">
                    </div>
                    <h3>{{ $model->getUser()->name }}</h3>
                    <h5 class="mb-20">See {{ sizeof($model->getVIPPhotos()) }} <b>VIP Photo{{ (sizeof($model->getVIPPhotos())) > 1 ? 's' : '' }}</b> now!</h5>
                   <!-- <form class="mb-20" action="/paypal/create-agreement/{{ $model->getUser()->id }}/VIP" method="POST">
                        @csrf
                        @honeypot
                        <button class="btn tokens-container locked">	
                            <div class="tip">
                                <i class="fas fa-unlock"></i>
                            </div>	                                                                       
                            <div class="tip-control">{{ $model->getPricing(ProductType::$VIP)->price }}</div>
                            <i class="fas fa-star tip-icon"></i>	
                        </button>
                    </form>   -->                    
                    <form action="/paypal/create-agreement/{{ $model->getUser()->id }}/VIP" method="POST">
                        @csrf
                        @honeypot
                        <button action="submit" class="btn subscribe-container">									
                            <div class="price-control">Subscribe</div>
                            <i class="fas fa-star icon"></i>			
                        </button>
                        <p>${{ $model->getPricing(ProductType::$VIP)->price }} per month</p>	
                    </form>
                    <hr>
                    <p><span>Unsubscribe anytime.</span></p>
                    <form action="/paypal/create-checkout/{{ $model->getUser()->id }}/VIP" method="POST">
                        @csrf
                        @honeypot
                        <p><small>Models set VIP content price. Support {{ $model->getUser()->name }}'s career monthly or <a href="#" onclick="$(this).closest('form').submit()">one time.</a></small></p>
                    </form>

                </div>       
            </div>


            
         

                
                
           <!-- <div class="row" style="padding-bottom: 2em;">
                <div class="container">
                    <img src="{{ asset('images/pp_cc.png') }}" style="max-width:100%;max-height:100%;"/>
                </div>
            </div>-->
            </div>
        </div>
    </div>



@endsection

@section('js_after')

    <script>
        var isModel = "{{ $model->getUser()->id === Auth::user()->id }}" == '1';
        function unlockVIP() {
            if(isModel) return;
            Swal.fire({
                title: '',
                type: '',
                html: $('#pay-for-vip-modal').html(),
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false,
            });
        }
    </script>

    @auth
        @include('scripts.following')
        @if(Auth::user()->is_model)
            @include('scripts/connect_with_paypal')
            @include('profile/media/edit-image-js')
        @endif
    @endauth

    <script>
        function likeImage(imgID) {
            if (!imgID) return;
            imgID = imgID.replace('img', '').replace('t', '');
            $.ajax({
                url: '/model/like-img/' + imgID,
                type: 'GET',
                dataType: 'json',
            }).done(function (msg) {
            });
        }
 
        $(document).ready(function() {

            $('div .locked').on('click touchend', function(e) {
               unlockVIP();
            });
 
            $('.setbanner').on('click touchend', function(e) {
               var imgID = $(this).parent().parent().parent().parent().find('div .modal-ui-open').prop('id').replace('imgMainimg', '').replace('t', '');
                $.ajax({
                    url: '/model/set_banner/' + imgID,
                    data: {
                      _token: token
                    },
                    type: 'POST',
                    dataType: 'json',
                }).done(function (msg) {
                    if(msg['success']) {
                        Swal.fire({
                            type: 'success',
                            title: 'Success!',
                            text: 'Banner updated!',
                        });
 
                        $('#ModelBanner').css("background-image", "url('" + msg['url'] + "')");
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: msg['msg'],
                        });
                    }
                });
            });
        })
    </script>
@endsection