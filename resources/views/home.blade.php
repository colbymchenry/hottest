@extends('layouts.app-fox')

@section('title')

@section('content')



    <div class="row top-gap">
        <div class="col-md-8 offset-md-2">
        <h1>Daily Pics</h1>
        <h1>Featured</h1>
            <!-- Slider main container -->
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide text-center">                 
                            <div class="photo" id="avatar-div">
                                <img class="avatar-xxl"
                                        src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}"
                                        alt="Modelname">
                            </div>
                           
                            <span class="badge badge-secondary" style="margin-bottom:10px;">Daily Featured</span>
                        </div>
                        <div class="swiper-slide">                 
                            <div class="photo" id="avatar-div">
                                <img class="avatar-xxl"
                                        src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}"
                                        alt="Modelname">
                            </div>
   
                            <span class="badge badge-secondary" style="margin-bottom:10px;">Daily Featured</span>                
                        </div>
                        <div class="swiper-slide">                 
                            <div class="photo" id="avatar-div">
                                <img class="avatar-xxl"
                                        src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}"
                                        alt="Modelname">
                            </div>
 
                        </div>
                        <div class="swiper-slide">                 
                            <div class="photo" id="avatar-div">
                                <img class="avatar-xxl"
                                        src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19.png') }}"
                                        alt="Modelname">
                            </div>
                    
                        </div>
                        <div class="swiper-slide">                 
                            <div class="photo" id="avatar-div">
                                <img class="avatar-xxl"
                                        src="{{ asset('dist/users/01_miss_julianne/uploads/profile/user_upload_profile_27-02-19_old.png') }}"
                                        alt="Modelname">
                            </div>
                       
                        </div>
                    </div>
                </div>      
                <div class="swiper-container gallery-top">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">

                        @include('home/model')      
                        </div> 
                        <div class="swiper-slide">

                        @include('home/model')      
                        </div>    
                        <div class="swiper-slide">

                        @include('home/model')      
                        </div>  
                        <div class="swiper-slide">

                        @include('home/model')      
                        </div>     
                        <div class="swiper-slide">

                        @include('home/model')      
                        </div>                                          
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>           
                </div>

                            <!-- If we need navigation buttons -->
                <div class="swiper-button-prev mobile-gone"></div>
                <div class="swiper-button-next mobile-gone"></div>
            
            <h1>Competitions</h1>
        </div>
    </div>

@endsection